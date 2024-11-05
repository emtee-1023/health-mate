<?php
    session_start();
    include "includes/sessions.php";
    include "../includes/connect.php";

    $name = $_POST['name'];
    $impact_text = $_POST['impact_text'];
    $quote = $_POST['quote'];
    $speaker = $_POST['speaker'];

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
    
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $impact_image = $fileName;
            } else {
                die("There was an error moving the uploaded file.");
            }
        } else {
            die("Unsupported file type.");
        }
    } else {
        die("No file uploaded or there was an upload error.");
    }
    $sql = "INSERT INTO impacts(impact_title, impact_image, impact_text, quote, speaker) VALUES(?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $impact_image, $impact_text, $quote, $speaker);

    if ($stmt->execute()) {
        echo '<script type="text/javascript">';
        echo 'alert("New Impact created successfully");';
        echo 'window.location.href = "impacts.php";';
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
    $conn->close();

