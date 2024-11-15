<?php
session_start();
require "../includes/connect.php";

date_default_timezone_set('Africa/Nairobi');
$currentTimestamp = date('Y-m-d H:i:s');
$_10Expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));


if (isset($_GET['logout'])) {
    session_destroy();

    session_start();
    $_SESSION['success'] = "Logged Out Successfully!";
    header('location: ../login.php');
} elseif (isset($_POST['add-patient'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $blood_group = $_POST['blood-group'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi'];
    $bmi_res = $_POST['bmi-res'];
    $pfp = 'defaultpfp.png';
    $userid = $_POST['userid'];

    $stmt = $conn->prepare('INSERT INTO patients (FName, LName, DOB, Sex, BloodGroupID, Weight, Height, BMI, BMIInterpretation, Pfp, CreatedAt, UserID) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssssissssssi', $fname, $lname, $dob, $sex, $blood_group, $weight, $height, $bmi, $bmi_res, $pfp, $currentTimestamp, $userid);
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Problem Occured When Registering Patient";
        header('location: new-patient.php');
        exit();
    }
    $_SESSION['success'] = "Patient Profile Added Successfuly";
    header('location: patient-profiles.php');
    exit();
} elseif (isset($_POST['edit-patient'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $blood_group = $_POST['blood-group'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi'];
    $bmi_res = $_POST['bmi-res'];
    $pfp = 'defaultpfp.png';
    $patientid = $_POST['patientid'];

    $stmt = $conn->prepare('UPDATE patients SET FName=?,LName=?,DOB=?,Sex=?,BloodGroupID=?,Weight=?,Height=?,BMI=?,BMIInterpretation=?,Pfp=?,LastUpdate=? WHERE Patientid=?');
    $stmt->bind_param('ssssissssssi', $fname, $lname, $dob, $sex, $blood_group, $weight, $height, $bmi, $bmi_res, $pfp, $currentTimestamp, $patientid);
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Problem Occured When Updating Patient's Details";
        header('location: edit-patient.php');
        exit();
    }
    $_SESSION['success'] = "Patient Profile Updated Successfuly";
    header('location: patient-profiles.php');
    exit();
}
