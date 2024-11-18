<?php
include 'includes/connect.php';

if (isset($_GET['department_id'])) {
    $department_id = $_GET['department_id'];

    // Fetch doctors for the selected department
    $sql = "SELECT DoctorID, DoctorName FROM doctors WHERE DepartmentID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $department_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $doctors = [];
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }

    // Return JSON response
    echo json_encode($doctors);
}

$conn->close();
?>
