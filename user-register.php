
<?php 
include 'includes/connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["firstname"]);
    $lname = test_input($_POST["lastname"]);
    $uname = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $role = test_input($_POST["role"]);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password, first_name, last_name, email, user_type) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $uname, $hashedPassword, $fname, $lname, $email, $role);

    if ($stmt->execute()) {
        // Redirect based on user role
        echo '<script>';
        if ($role == 'doctor') {
            echo 'window.location.href = "doctor-register.php";';
        } elseif ($role == 'nurse') {
            echo 'window.location.href = "nurse-register.php";';
        } elseif ($role == 'patient') {
            echo 'window.location.href = "login.php";';
        }
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>