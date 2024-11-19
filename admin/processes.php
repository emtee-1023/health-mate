<?php
session_start();
require "../includes/connect.php";
require "config.php";
//include "../includes/mailer.php";
date_default_timezone_set("Africa/Nairobi");
$date = date("Y-m-d H:i:s");
$filedate = date("Y_m_d_H_i_s");

if (isset($_POST["login"])) {
    $_SESSION['chid'] = "1";
    $_SESSION['chname'] = "FFM Admin";
    header("location:  dashboard.php");
} elseif (isset($_POST["new-service"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $sdesc = mysqli_real_escape_string($conn, $_POST["sdesc"]);
    $ldesc = mysqli_real_escape_string($conn, $_POST["ldesc"]);
    $slag = str_replace(' ', '-', $name);
    $name = ucwords($name);
    $slag = strtolower($slag);

    $image = $_FILES['photos']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));



    $file_name = $_FILES["photos"]["name"];
    $_FILES["photos"]["type"];
    $tmp_file = $_FILES["photos"]["tmp_name"];

    $destination = "../uploads/" . $file_name;

    move_uploaded_file($tmp_file, $destination);
    $new = $filedate . $file_name;
    $new_name = rename('../uploads/' . $file_name, '../uploads/' . $new);


    $insert = "INSERT INTO service (name, slag, short_desc, long_desc, image, date_created) VALUES ('$name',  '$slag', '$sdesc', '$ldesc', '$new', '$date')";

    if ($conn->query($insert) === TRUE) {
        $pk = $conn->insert_id;

        $_SESSION["success"] = "New Service Added Sucessfully.";
        header("location: edit-service.php?id=$pk");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location:  add-service.php");
    }
} elseif ((isset($_POST['form_name']) && $_POST['form_name'] == 'edit-impacts')) {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $impact_id = $_POST['rid'];
    $name = $_POST["name"];
    $impact_text = $_POST["impact_text"];
    $quote = $_POST["quote"];
    $speaker = $_POST["speaker"];

    if (isset($_FILES['impact_image']) && $_FILES['impact_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['impact_image']['tmp_name'];
        $fileName = $_FILES['impact_image']['name'];
        $fileSize = $_FILES['impact_image']['size'];
        $fileType = $_FILES['impact_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $impact_image = $fileName;
            } else {
                die("Error moving the uploaded file.");
            }
        } else {
            die("Unsupported file type.");
        }
    } else {
        $stmt = $pdo->prepare('SELECT impact_image FROM impacts WHERE impact_id = :impact_id');
        $stmt->execute(['impact_id' => $impact_id]);
        $current_impact = $stmt->fetch();

        if ($current_impact) {
            $impact_image = $current_impact['impact_image'];
        }
    }

    $sql = "UPDATE impacts SET impact_title=?, impact_image=?, impact_text=?, quote=?, speaker=? WHERE impact_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $impact_image, $impact_text, $quote, $speaker, $impact_id);

    if ($stmt->execute()) {
        $_SESSION["success"] = "Impact updated Sucessfully.";
        header("location: impacts.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} elseif (isset($_POST["new-prof"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $name = ucwords($name);



    $insert = "INSERT INTO profile (name, description, date_created) VALUES ('$name', '$desc', '$date')";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Testimonial Added Sucessfully.";
        header("location: profile.php");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: new-profile.php");
    }
} elseif (isset($_POST["edit-prof"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $id = mysqli_real_escape_string($conn, $_POST["sid"]);
    $name = ucwords($name);



    $insert = "UPDATE `profile` SET `name`='$name',`description`='$desc', `status`='$status' WHERE profile_id='$id'";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Testimonial Updated Sucessfully.";
        header("location: edit-profile.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-profile.php?id=$id");
    }
} elseif (isset($_POST["edit-doctor"])) {
    $id = mysqli_real_escape_string($conn, $_POST["rid"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);

    $insert = "UPDATE `doctors` SET `verificationStatus`='$status' WHERE DoctorID='$id'";

    if ($conn->query($insert) === TRUE) {


        $_SESSION["success"] = "Project Updated Sucessfully.";
        header("location: doctors.php");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-doctor.php?id=$id");
    }
} elseif (isset($_POST["add-pkg-act"])) {
    $id = mysqli_real_escape_string($conn, $_POST["pkid"]);
    $act = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);



    $insert = "INSERT INTO package_exp (package_id, experience_name, description, price) VALUES ('$id', '$act', '$desc', '$price')";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Package Updated Sucessfully.";
        header("location: edit-package.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-package.php?id=$id");
    }
} elseif (isset($_POST["add-pkg-acc"])) {
    $id = mysqli_real_escape_string($conn, $_POST["pkid"]);
    $act = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $sprice = mysqli_real_escape_string($conn, $_POST["sprice"]);
    $dprice = mysqli_real_escape_string($conn, $_POST["dprice"]);



    $insert = "INSERT INTO package_acc (package_id, accommodation, acc_desc, double_p, single) VALUES ('$id', '$act', '$desc', '$sprice', '$dprice')";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Package Updated Sucessfully.";
        header("location: edit-package.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-package.php?id=$id");
    }
} elseif (isset($_GET["del_pkg_act"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $act = mysqli_real_escape_string($conn, $_GET["del_pkg_act"]);

    $qry = "DELETE FROM package_exp WHERE package_exp_id='$act'";
    if ($conn->query($qry) === TRUE) {

        $_SESSION["success"] = "Package Item Deleted Sucessfully.";
        header("location: edit-package.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-package.php?id=$id");
    }
} elseif (isset($_GET["del_pkg_acc"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $act = mysqli_real_escape_string($conn, $_GET["del_pkg_acc"]);

    $qry = "DELETE FROM package_acc WHERE package_acc_id ='$act'";
    if ($conn->query($qry) === TRUE) {

        $_SESSION["success"] = "Package Item Deleted Sucessfully.";
        header("location: edit-package.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-package.php?id=$id");
    }
} elseif (isset($_POST["new-dest"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);



    $insert = "INSERT INTO destination (destination_name, destination_desc, date_created) VALUES ('$name', '$desc', '$date')";

    if ($conn->query($insert) === TRUE) {

        $id = $conn->insert_id;
        $_SESSION["success"] = "Destination Added Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_POST["edit-dest"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $id = mysqli_real_escape_string($conn, $_POST["pkid"]);

    $qry = "UPDATE destination SET destination_name='$name', destination_desc='$desc', destination_status='$status' WHERE destination_id='$id'";

    if ($conn->query($qry) === TRUE) {

        $_SESSION["success"] = "Destination Updated Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_POST["add-dest-act"])) {
    $id = mysqli_real_escape_string($conn, $_POST["pkid"]);
    $act = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);



    $insert = "INSERT INTO destination_activities (destination_id, act_name, act_desc, act_price) VALUES ('$id', '$act', '$desc', '$price')";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Destination Updated Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_POST["add-dest-acc"])) {
    $id = mysqli_real_escape_string($conn, $_POST["pkid"]);
    $act = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $sprice = mysqli_real_escape_string($conn, $_POST["sprice"]);
    $dprice = mysqli_real_escape_string($conn, $_POST["dprice"]);



    $insert = "INSERT INTO destination_accommodation (destination_id, acc_name, acc_desc, acc_single, acc_double) VALUES ('$id', '$act', '$desc', '$sprice', '$dprice')";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Destination Updated Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_POST["add-trans-act"])) {
    $id = mysqli_real_escape_string($conn, $_POST["pkid"]);
    $act = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);



    $insert = "INSERT INTO destination_transport (destination_id, trans_name, trans_desc, trans_price) VALUES ('$id', '$act', '$desc', '$price')";

    if ($conn->query($insert) === TRUE) {

        $_SESSION["success"] = "Destination Updated Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_GET["del_dest_trans"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $act = mysqli_real_escape_string($conn, $_GET["del_dest_trans"]);

    $qry = "DELETE FROM destination_transport WHERE dest_trans_id ='$act'";
    if ($conn->query($qry) === TRUE) {

        $_SESSION["success"] = "Destination Item Deleted Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_GET["del_dest_acc"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $act = mysqli_real_escape_string($conn, $_GET["del_dest_acc"]);

    $qry = "DELETE FROM destination_accommodation WHERE dest_acc_id ='$act'";
    if ($conn->query($qry) === TRUE) {

        $_SESSION["success"] = "Destination Item Deleted Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
} elseif (isset($_GET["del_dest_act"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $act = mysqli_real_escape_string($conn, $_GET["del_dest_act"]);

    $qry = "DELETE FROM destination_activities WHERE dest_act_id ='$act'";
    if ($conn->query($qry) === TRUE) {

        $_SESSION["success"] = "Destination Item Deleted Sucessfully.";
        header("location: edit-destination.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-destination.php?id=$id");
    }
}

// Add new Blog
elseif (isset($_POST["add-medicine"])) {
    $tit = mysqli_real_escape_string($conn, $_POST["tit"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);

    $slag = str_replace(' ', '-', $tit);
    $tit = ucwords($tit);
    $slag = strtolower($slag);

    if (isset($_FILES['MedicinePhoto']) && $_FILES['MedicinePhoto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['MedicinePhoto']['tmp_name'];
        $fileName = $_FILES['MedicinePhoto']['name'];
        $fileSize = $_FILES['MedicinePhoto']['size'];
        $fileType = $_FILES['MedicinePhoto']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $MedicinePhoto = $fileName;
            } else {
                die("There was an error moving the uploaded file.");
            }
        } else {
            die("Unsupported file type.");
        }
    } else {
        die("No file uploaded or there was an upload error.");
    }


    $cat_insert = "INSERT INTO medicine(MedicineName, MedicinePhoto, UseCase, MedicinePrice, AvailableStock) VALUES ('$tit', '$MedicinePhoto', '$content', '$price', '$stock')";

    if ($conn->query($cat_insert) === TRUE) {

        $last_id = $conn->insert_id;
        $_SESSION["success"] = "New Medicine Added Sucessfully.";
        header('location: medicine.php');
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header('location: new-medicine.php');
    }
} elseif (isset($_POST["edit-medicine"])) {
    $tit = mysqli_real_escape_string($conn, $_POST["tit"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
    $id = mysqli_real_escape_string($conn, $_POST["MedicineID"]);

    $slag = str_replace(' ', '-', $tit);
    $slag = strtolower($slag);
    $tit = ucwords($tit);


    $updqry = "UPDATE medicine SET MedicineName='$tit', UseCase='$content', MedicinePrice='$price', AvailableStock='$stock' WHERE MedicineID  = '$id'";

    if ($conn->query($updqry) === TRUE) {

        $_SESSION["success"] = "Medicine Details Updated Sucessfully.";
        header("location: medicine.php");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-medicine.php?id=$id");
    }
} elseif (isset($_POST["edit-medicine-img"])) {
    $cat_id = mysqli_real_escape_string($conn, $_POST["edit-medicine-img"]);

    $image = $_FILES['photos']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));


    $file_name = $_FILES["photos"]["name"];
    $_FILES["photos"]["type"];
    $tmp_file = $_FILES["photos"]["tmp_name"];

    $destination = "../uploads/" . $file_name;

    move_uploaded_file($tmp_file, $destination);
    $new = $filedate . $file_name;
    $new_name = rename('../uploads/' . $file_name, '../uploads/' . $new);

    $updqry = "UPDATE medicine SET MedicinePhoto ='$new'  WHERE MedicineID  = '$cat_id'";

    if ($conn->query($updqry) === TRUE) {

        $_SESSION["success"] = "Medicine Image Updated Sucessfully.";
        header("location: edit-medicine.php?id=$cat_id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-medicine.php?id=$cat_id");
    }
} elseif (isset($_POST["seo-blog"])) {
    $tit = mysqli_real_escape_string($conn, $_POST["tit"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $kw = mysqli_real_escape_string($conn, $_POST["kw"]);
    $id = mysqli_real_escape_string($conn, $_POST["elemid"]);



    $cat_insert = "UPDATE blog SET seo_title='$tit', seo_description='$desc', seo_keywords='$kw' WHERE blog_id  = '$id'";

    if ($conn->query($cat_insert) === TRUE) {


        $_SESSION["success"] = "SEO Information Updated Sucessfully.";
        header("location: edit-blog.php?id=$id");
    } else {
        $_SESSION["error"] = "Error Occured. Please Try Again" . $conn->error;
        header("location: edit-blog.php?id=$id");
    }
} elseif (isset($_GET['logout'])) {
    session_destroy();
    session_start();
    $_SESSION['success'] = "Logged Out Successfully!";
    header('location: ../login.php');
}
