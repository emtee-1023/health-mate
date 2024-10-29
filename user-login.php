<?php
include 'includes/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input
    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check user login
    $stmt = $conn->prepare("SELECT * FROM doctors WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        

        // Verify the password (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            // Redirect based on UserType
            if ($user['user_type'] == 'doctor') {
                header("Location: login-doctor.php"); // Doctor's homepage
            } elseif ($user['user_type'] == 'nurse') {
                header("Location: login-nurse.php"); // Nurse's homepage
            } elseif ($user['user_type'] == 'patient') {
                header("Location: p-login.php"); // Patient's homepage
            } else {
                echo "<script>alert('User type not recognized.');</script>";
            }
            exit();
        } else {
            echo "<script>alert('Invalid password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No account found with that email. Please sign up.');</script>";
    }

    // Close statement and connection
    $stmt->close();
}
$conn->close();
?>
