<?php
if (!isset($_SESSION["phaid"])) {
    $_SESSION['error'] = "Pharmacist Account Cannot Be Retreived";
    header('location: ../login.php');
    exit();
} else {
    $phaid = $_SESSION["phaid"];
}
