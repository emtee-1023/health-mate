<?php
session_start();
include 'includes/connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = stripcslashes($email);  
    $password = stripcslashes($password);  
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password); 

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
        $_SESSION['pid'] = $users['UserID'];
        $_SESSION['email'] = $users['email'];
        $_SESSION['UserType'] = $users['UserType'];

        if ($users['UserType'] == 'doctor' || $users['UserType'] == 1){
            header("Location: home.php");
        } elseif ($users['UserType'] == 'Patient' || $users['UserType'] == 2 || $users['UserType'] == 'patient'){
            header("Location: home.php");
        } else {
            echo "<script>alert('Login failed. Invalid username or password. Please sign up if you do not have an account.');</script>";
            echo "<script>window.location.href = 'register.php';</script>";
        }
        exit();

        $stmt->close();
    }
}
$conn->close();
?>

