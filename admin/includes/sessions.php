<?php
if (!isset($_SESSION["adminid"])) {
    $_SESSION['error'] = "Problem  encountered retreiving admins account";
    header('location: ../login.php');
    exit();
} else {
    $adminid = $_SESSION["adminid"];
}
