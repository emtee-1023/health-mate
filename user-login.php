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
        $users = $result->fetch_assoc();
        $_SESSION['pid'] = $users['UserID'];
        $_SESSION['email'] = $users['email'];
        $_SESSION['UserType'] = $users['UserType'];

        if ($users['UserType'] == 'doctor' || $users['UserType'] == 1){
            header("Location: dashp.php?UserID=1");
        } elseif ($users['UserType'] == 'Patient' || $users['UserType'] == 2 || $users['UserType'] == 'patient'){
            header("Location: dashp.php");
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
