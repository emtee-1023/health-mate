<?php
session_start();
include 'includes/connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = stripcslashes($email);  
    $password = stripcslashes($pass);  
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password); 

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
        $_SESSION['UserId'] = $users['UserId'];
        $_SESSION['email'] = $users['email'];
        $_SESSION['UserCat'] = $users['UserCat'];

        if ($users['UserCat'] == 'Admin' || $users['UserCat'] == 1){
            header("Location: index.php");
        } elseif ($users['UserCat'] == 'Patient' || $users['UserCat'] == 2 || $users['UserCat'] == 'patient'){
            header("Location: index.php");
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

