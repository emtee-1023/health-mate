<?php
include '../includes/connect.php';

// Fetch all appointments for a doctor
$doctor_id = 1; // Example doctor ID
$stmt = $conn->prepare("SELECT AppointmentDate, AppointmentTime FROM appointments WHERE DoctorID = ?");
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();

$appointments = [];
while ($row = $result->fetch_assoc()) {
    $appointments[] = [
        'title' => date("g:i A", strtotime($row['AppointmentTime'])), // Display time in a readable format
        'start' => $row['AppointmentDate'] . 'T' . $row['AppointmentTime'] // FullCalendar requires date and time in ISO format
    ];
}

$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>
<body>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: <?php echo json_encode($appointments); ?>, // Pass PHP appointments array to JavaScript
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek,timeGridDay'
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
