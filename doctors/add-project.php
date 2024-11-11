<?php
    session_start();
    include "includes/sessions.php";
    include "../includes/connect.php";

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $loc = $_POST['loc'];
    $date = $_POST['date'];
    $girls_impacted = $_POST['girls_impacted'];
    $summary = $_POST['summary'];

    if (isset($_FILES['project_image']) && $_FILES['project_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['project_image']['tmp_name'];
        $fileName = $_FILES['project_image']['name'];
        $fileSize = $_FILES['project_image']['size'];
        $fileType = $_FILES['project_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
    
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;
    
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $project_image = $fileName;
            } else {
                die("There was an error moving the uploaded file.");
            }
        } else {
            die("Unsupported file type.");
        }
    } else {
        die("No file uploaded or there was an upload error.");
    }

    $sql = "INSERT INTO projects(project_name, project_image, about_project, project_date, venue, girls_impacted, summary) VALUES(?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $name, $project_image, $desc, $date, $loc, $girls_impacted, $summary);

    if ($stmt->execute()) {
        echo '<script type="text/javascript">';
        echo 'alert("New Project created successfully");';
        echo 'window.location.href = "projects.php";';
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
    $conn->close();

?>