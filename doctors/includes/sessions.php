<?php
if (!isset($_SESSION["docid"])) {
    $_SESSION['error'] = "Doctor Account Cannot Be Retreived";
    header('location: ../login.php');
    exit();
} else {
    $docid = $_SESSION["docid"];
}
