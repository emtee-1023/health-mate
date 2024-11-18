<?php
include 'includes/connect.php';
// Fetch departments
$departments = $conn->query("SELECT * FROM departments");

// Fetch doctors by department
if (isset($_POST['DepartmentId'])) {
    $DepartmentId = intval($_POST['DepartmentId']);
    $doctors = $conn->query("SELECT * FROM doctors WHERE DepartmentId = $DepartmentId");
    $doctors_list = [];
    while ($row = $doctors->fetch_assoc()) {
        $doctors_list[] = $row;
    }
    echo json_encode($doctors_list);
    exit;
}

// Check doctor availability
if (isset($_POST['DoctorID'])) {
    $DoctorID = intval($_POST['DoctorID']);
    $availability = $conn->query("
        SELECT AppointmentTime 
        FROM appointments 
        WHERE DoctorID = $DoctorID
          AND AppointmentTime > NOW()
    ");
    $taken_slots = [];
    while ($row = $availability->fetch_assoc()) {
        $taken_slots[] = $row['AppointmentTime'];
    }
    echo json_encode($taken_slots);
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Book an Appointment</h1>

    <form action="processes.php" method="post">
    <label for="department">Department:</label>
    <select id="department">
        <option value="">Select a department</option>
        <?php while ($row = $departments->fetch_assoc()): ?>
            <option value="<?= $row['DepartmentId'] ?>"><?= $row['DepartmentName'] ?></option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <label for="doctor">Doctor:</label>
    <select id="doctor">
        <option value="">Select a doctor</option>
        <option value="1">Lawrie Ochieng</option>
    </select>

    <br><br>

    <label for="AppointmentTime">Appointment Time:</label>
    <input type="datetime-local" id="AppointmentTime">

    <br><br>

    <input type="submit" id="book_appointment" name="book_appointment" value="Book Appointment">
    </form>
    <br><br><br>

    <!-- Calendly link widget begin -->
<!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/lawry-ochieng-strathmore/appointment-booking" style="min-width:320px;height:700px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Calendly inline widget end -->

    <script>
        $('#department').change(function() {
            let DepartmentId = $(this).val();
            $.post('appointment.php', { DepartmentId: departmentId }, function(response) {
                let doctors = JSON.parse(response);
                $('#doctor').empty().append('<option value="">Select a doctor</option>');
                doctors.forEach(doc => {
                    $('#doctor').append(`<option value="${doc.doctor_id}">${doc.doctor_name}</option>`);
                });
            });
        });

        $('#book_appointment').click(function() {
            let patientId = 1; // Replace with logged-in patient ID
            let doctorId = $('#doctor').val();
            let appointmentTime = $('#appointment_time').val();

            $.post('appointment.php', {
                book_appointment: true,
                patient_id: patientId,
                doctor_id: doctorId,
                appointment_time: appointmentTime,
                patient_name: 'John Doe', // Replace with patient name
                patient_email: 'john.doe@example.com' // Replace with patient email
            }, function(response) {
                let result = JSON.parse(response);
                if (result.success) {
                    alert('Appointment booked! Confirmation link: ' + result.event_link);
                }
            });
        });
    </script>
</body>
</html>















