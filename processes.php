<?php
session_start();
require 'includes/connect.php';

date_default_timezone_set('Africa/Nairobi');
$currentTimestamp = date('Y-m-d H:i:s');
$_10Expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));
$fileDir = "uploads/files/";

if (isset($_POST['add-user'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone-number'];
    $sex = $_POST['sex'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pfp = 'defaultuser.png';
    if (isset($_POST['_2fa'])) {
        $_2fa = 1;
    } else {
        $_2fa = 0;
    }

    $stmt1 = $conn->prepare('INSERT INTO users (FName,LName,Email,PhoneNum,Password,Sex,Pfp,DOB,_2FAStatus,CreatedAt) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt1->bind_param('ssssssssis', $fname, $lname, $email, $phone, $password, $sex, $pfp,  $dob, $_2fa, $currentTimestamp);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = 'Problem Encountered During Registration';
        header('location: register.php');
        exit();
    }
    $_SESSION['success'] = 'Account Created Successfuly';
    header('location: login.php');
    exit();
} else if (isset($_POST['doctor-apply'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone-number'];
    $sex = $_POST['sex'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $bio = $_POST['bio'];
    $pfp = 'defaultuser.png';
    if (isset($_POST['_2fa'])) {
        $_2fa = 1;
    } else {
        $_2fa = 0;
    }

    if (isset($_FILES["medCert"])) {
        $cert = $fileDir . uniqid() . "-" . basename($_FILES["fileUpload"]["name"]);

        // Check for file upload errors
        if ($_FILES["medCert"]["error"] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = "Error encountered during file upload";
            header('location: register.php');
            exit();
        }

        if (!move_uploaded_file($_FILES["medCert"]["tmp_name"], $cert)) {
            $_SESSION['error'] = "Error encountered during file upload";
            header('location: register.php');
            exit();
        }
    } else {
        $cert = '';
    }

    $stmt1 = $conn->prepare('INSERT INTO doctors(FName,LName,Email,PhoneNum,Password,Sex,Pfp,Bio,MedicCert,DOB,_2FAStatus,CreatedAt) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt1->bind_param('ssssssssssis', $fname, $lname, $email, $phone, $password, $sex, $pfp, $bio, $cert, $dob, $_2fa, $currentTimestamp);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = "Unable to create account";
        header('register.php');
        exit();
    }
    $_SESSION['success'] = "Account Created Successfuly";
    header('location: login.php');
    exit();
} else if (isset($_POST['nurse-apply'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone-number'];
    $sex = $_POST['sex'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $bio = $_POST['bio'];
    $pfp = 'defaultuser.png';
    if (isset($_POST['_2fa'])) {
        $_2fa = 1;
    } else {
        $_2fa = 0;
    }

    if (isset($_FILES["medCert"])) {
        $cert = $fileDir . uniqid() . "-" . basename($_FILES["fileUpload"]["name"]);

        // Check for file upload errors
        if ($_FILES["medCert"]["error"] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = "Error encountered during file upload";
            header('location: register.php');
            exit();
        }

        if (!move_uploaded_file($_FILES["medCert"]["tmp_name"], $cert)) {
            $_SESSION['error'] = "Error encountered during file upload";
            header('location: register.php');
            exit();
        }
    } else {
        $cert = '';
    }

    $stmt1 = $conn->prepare('INSERT INTO nurses(FName,LName,Email,PhoneNum,Password,Sex,Pfp,Bio,MedicCert,DOB,_2FAStatus,CreatedAt) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt1->bind_param('ssssssssssis', $fname, $lname, $email, $phone, $password, $sex, $pfp, $bio, $cert, $dob, $_2fa, $currentTimestamp);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = "Unable to create account";
        header('register.php');
        exit();
    }
    $_SESSION['success'] = "Account Created Successfuly";
    header('location: login.php');
    exit();
} else if (isset($_POST['pharmacist-apply'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone-number'];
    $sex = $_POST['sex'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $bio = $_POST['bio'];
    $pfp = 'defaultuser.png';
    if (isset($_POST['_2fa'])) {
        $_2fa = 1;
    } else {
        $_2fa = 0;
    }

    if (isset($_FILES["medCert"])) {
        $cert = $fileDir . uniqid() . "-" . basename($_FILES["fileUpload"]["name"]);

        // Check for file upload errors
        if ($_FILES["medCert"]["error"] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = "Error encountered during file upload";
            header('location: register.php');
            exit();
        }

        if (!move_uploaded_file($_FILES["medCert"]["tmp_name"], $cert)) {
            $_SESSION['error'] = "Error encountered during file upload";
            header('location: register.php');
            exit();
        }
    } else {
        $cert = '';
    }

    $stmt1 = $conn->prepare('INSERT INTO pharmacists(FName,LName,Email,PhoneNum,Password,Sex,Pfp,Bio,MedicCert,DOB,_2FAStatus,CreatedAt) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt1->bind_param('ssssssssssis', $fname, $lname, $email, $phone, $password, $sex, $pfp, $bio, $cert, $dob, $_2fa, $currentTimestamp);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = "Unable to create account";
        header('register.php');
        exit();
    }
    $_SESSION['success'] = "Account Created Successfuly";
    header('location: login.php');
    exit();
} else if (isset($_POST['user-login'])){
    $emailOrNumber = $_POST['email-or-number'];
    $password = $_POST['password'];

    $stmt1 = $conn->prepare('SELECT * FROM users WHERE Email = ? OR PhoneNum = ?');
    $stmt1->bind_param('ss',$emailOrNumber,$emailOrNumber);
    if(!$stmt1->execute()){
        $_SESSION['error'] = "Error retreiving user account";
        header('location: login.php');
        exit();
     }
     $res1 = $stmt1->get_result();

     if($res1->num_rows > 0){
        $usr = $res1->fetch_assoc();
        if(password_verify($password, $usr['Password'])){
            $_SESSION['uid'] = $usr['']
        }
     }
}
