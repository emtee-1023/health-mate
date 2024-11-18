<?php
// Include your database connection
require_once 'includes/connect.php';

if (isset($_POST['DoctorID'])) {
    $DoctorID = $_POST['DoctorID'];
    
    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT CalendlyLink FROM doctors WHERE DoctorID = ?");
    $stmt->bind_param("i", $DoctorID);
    $stmt->execute();
    $stmt->bind_result($CalendlyLink);
    
    // Fetch the result
    if ($stmt->fetch()) {
        echo $CalendlyLink;
    } else {
        echo "Error: Doctor not found";
    }

    $stmt->close();
    $conn->close();
}
?>