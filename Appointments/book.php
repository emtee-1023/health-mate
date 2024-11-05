<?php
include '../includes/connect.php';

$doctor_id = 1; // Example doctor ID
$selected_date = $_POST['AppointmentDate'] ?? date('Y-m-d');

// Generate time slots
$slots = [];
for ($hour = 9; $hour < 17; $hour++) {
    if ($hour != 13) { // Skip lunch hour (1:00 PM)
        $slots[] = sprintf("%02d:00:00", $hour);
    }
}

// Check for unavailable slots
$stmt = $conn->prepare("SELECT AppointmentTime FROM appointments WHERE DoctorID = ? AND AppointmentDate = ?");
$stmt->bind_param("is", $doctor_id, $selected_date);
$stmt->execute();
$result = $stmt->get_result();

$unavailable_slots = [];
while ($row = $result->fetch_assoc()) {
    $unavailable_slots[] = $row['AppointmentTime'];
}

$stmt->close();
?>

<form method="post" action="book_appointment.php">
    <label for="AppointmentDate">Select Date:</label>
    <input type="date" name="AppointmentDate" value="<?php echo $selected_date; ?>" required><br><br>

    <label for="AppointmentTime">Select Time Slot:</label>
    <select name="AppointmentTime" required>
        <?php
        foreach ($slots as $slot) {
            if (!in_array($slot, $unavailable_slots)) {
                // Only display available time slots
                echo "<option value='$slot'>" . date("g:i A", strtotime($slot)) . "</option>";
            }
        }
        ?>
    </select><br><br>

    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
    <input type="hidden" name="patient_id" value="1"> <!-- Example patient ID -->
    <input type="submit" value="Book Appointment">
</form>
