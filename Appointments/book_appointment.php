<?php
include '../includes/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['AppointmentDate'];
    $appointment_time = $_POST['AppointmentTime'];

    // Check if slot is still available
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE DoctorID = ? AND AppointmentDate = ? AND AppointmentTime = ?");
    $stmt->bind_param("iss", $doctor_id, $appointment_date, $appointment_time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Slot is available, insert appointment
        $stmt = $conn->prepare("INSERT INTO appointments (DoctorID, UserID, AppointmentDate, AppointmentTime) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $doctor_id, $patient_id, $appointment_date, $appointment_time);
        if ($stmt->execute()) {
            echo "Appointment booked successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "This time slot is already booked.";
    }

    $stmt->close();
}

$conn->close();
?>
