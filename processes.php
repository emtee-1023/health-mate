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
    $pfp = 'defualtpfp.jpg';
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
    $pfp = 'defualtpfp.jpg';
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
    $pfp = 'defualtpfp.jpg';
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
    $pfp = 'defualtpfp.jpg';
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
} else if (isset($_POST['user-login'])) {
    $emailOrNumber = $_POST['email-or-number'];
    $password = $_POST['password'];

    $stmt1 = $conn->prepare('SELECT * FROM users WHERE Email = ? OR PhoneNum = ?');
    $stmt1->bind_param('ss', $emailOrNumber, $emailOrNumber);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = "Error retreiving user account";
        header('location: login.php');
        exit();
    }
    $res1 = $stmt1->get_result();

    if ($res1->num_rows > 0) {
        $usr = $res1->fetch_assoc();
        if (password_verify($password, $usr['Password'])) {
            $_SESSION['uid'] = $usr['UserID'];
            $_SESSION['fname'] = $usr['FName'];
            $_SESSION['lname'] = $usr['LName'];
            $_SESSION['pfp'] = $usr['Pfp'];
            header('location: users/index.php');
        } else {
            $_SESSION['error'] = "Invalid Credentials";
            header('location: login.php');
            exit();
        }
    }
} else if (isset($_POST['submit-appointment'])) {
    $usr = $_SESSION['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department_id = $_POST['department_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    $stmt1 = $conn->prepare('INSERT INTO leads(UserName,Email,PhoneNum,DoctorName,DepartmentName,Date,Message) values(?, ?, ?, ?, ?, ?, ?)');
    $stmt1->bind_param('sssssss', $name, $email, $phone, $department_id, $doctor_id, $date, $message);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = "Message Not Sent";
        header('index.php');
        exit();
    }
    $_SESSION['success'] = "Message Sent Successfully";
    header('location: index.php');
    exit();
} else if (isset($_POST['doctor-login'])) {
    $emailOrNumber = $_POST['email-or-number'];
    $password = $_POST['password'];

    $stmt1 = $conn->prepare('SELECT * FROM doctors WHERE Email = ? OR PhoneNum = ?');
    $stmt1->bind_param('ss', $emailOrNumber, $emailOrNumber);
    if (!$stmt1->execute()) {
        $_SESSION['error'] = "Error retreiving doctor's account";
        header('location: login.php');
        exit();
    }
    $res1 = $stmt1->get_result();

    if ($res1->num_rows > 0) {
        $doc = $res1->fetch_assoc();
        if (password_verify($password, $doc['Password'])) {
            $_SESSION['docid'] = $doc['DoctorID'];
            $_SESSION['fname'] = $doc['FName'];
            $_SESSION['lname'] = $doc['LName'];
            $_SESSION['pfp'] = $doc['Pfp'];
            header('location: doctors/index.php');
        } else {
            $_SESSION['error'] = "Invalid Credentials";
            header('location: login.php');
            exit();
        }
    }
}
