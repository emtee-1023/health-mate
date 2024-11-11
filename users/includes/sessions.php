<?php
if (!isset($_SESSION["uid"])) {
    $_SESSION['error'] = "User Account Cannot Be Retreived";
    header('location: ../login.php');
    exit();
} else {
    $userid = $_SESSION["uid"];
}
