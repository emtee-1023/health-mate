<?php
// Include the database connection
include 'includes/connect.php';

// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email and password fields are not empty
    if (!empty($email) && !empty($password)) {
        // Query to check if the nurse exists in the database
        $query = "SELECT * FROM nurses WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        // If the user exists, verify the password
        if (mysqli_num_rows($result) == 1) {
            $nurse = mysqli_fetch_assoc($result);
         
            
            // Verify the password
            if (password_verify($password, $nurse['password'])) {
                // Set session variables
                $_SESSION['nurse_id'] = $nurse['id'];
                $_SESSION['nurse_name'] = $nurse['name'];
                
                // Redirect to the nurse's dashboard
                header("Location: nurse.php");
                exit();
            } else {
                echo "<p class='text-danger'>Incorrect password. Please try again.</p>";
            }
        } else {
            echo "<p class='text-danger'>No nurse found with that email address.</p>";
        }
    } else {
        echo "<p class='text-danger'>Please fill in both email and password fields.</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
