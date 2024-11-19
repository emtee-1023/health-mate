<?php
session_start();
require "../includes/connect.php";

date_default_timezone_set('Africa/Nairobi');
$currentTimestamp = date('Y-m-d H:i:s');
$_10Expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));
$fileDir = "uploads/files/";

if (isset($_GET['logout'])) {
    session_destroy();
    session_start();
    $_SESSION['success'] = "Logged Out Successfully!";
    header('location: ../login.php');
    exit();
} elseif (isset($_POST['add-prescription'])) {
    $patientid = $_POST['patientid'];
    $doctorid = $_POST['docid'];
    $prescription = $_POST['prescription'];

    $stmt1 = $conn->prepare('SELECT userid FROM patients where patientid = ?');
    $stmt1->bind_param('i', $patientid);
    $stmt1->execute();
    $stmt1->bind_result($userid);
    $stmt1->fetch();
    $stmt1->close();

    $stmt = $conn->prepare('INSERT into prescriptions (patientid, userid, doctorid, prescription, createdat) values (?, ?, ?, ?, ?)');
    $stmt->bind_param('iiiss', $patientid, $userid, $doctorid, $prescription, $currentTimestamp);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Prescription Created Successfuly";
        header('location: prescriptions.php');
        exit();
    } else {
        $_SESSION['error'] = "Prescription Could not be added";
        header('location: new-prescription.php');
        exit();
    }
}
