<?php
include 'includes/connect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name= $_POST["fullname"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $role= $_POST["role"];
}

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "INSERT INTO users (UserName, email, Password, UserType) VALUES ('$name', '$email', '$password', '$role')";

    if(mysqli_query($conn, $sql)){
        echo '<script type="text/javascript">';
        echo 'alert("New user created successfully");';
        echo 'window.location.href = "login.php";'; 
        echo '</script>';
    } else {
        echo "Error " . $sql. "<br>".mysqli_error($conn);
    }

    mysqli_close($conn);
?>