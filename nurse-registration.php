<?php
include 'includes/connect.php';

// Define the test_input() function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["firstname"]);
    $lname = test_input($_POST["lastname"]);
    $uname = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $specialization = test_input($_POST["specification"]);
    $lnumber = test_input($_POST["license"]);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO nurses (Fname, Lname, Username, Email, Password, Specification, LicenseNumber) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Bind the parameters
    $stmt->bind_param("sssssss", $fname, $lname, $uname, $email, $hashedPassword, $specialization, $lnumber);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page or login page
        echo '<script>';
        echo 'window.location.href = "login-nurse.php";';
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
