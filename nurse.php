<?php
// Include the database connection
include 'includes/connect.php';

// Queries to get data for different sections
$patientQuery = "SELECT id, name, age, diagnosis, appointment_date FROM patients ORDER BY appointment_date DESC LIMIT 5";
$appointmentQuery = "SELECT patient_id, appointment_date, purpose FROM appointments WHERE appointment_date >= CURDATE() ORDER BY appointment_date ASC LIMIT 5";
$medicationRequestQuery = "SELECT request_id, patient_id, medication, status FROM medication_requests WHERE status = 'Pending' ORDER BY request_id DESC LIMIT 5";

// Execute queries
$patientResult = $connection->query($patientQuery);
$appointmentResult = $connection->query($appointmentQuery);
$medicationRequestResult = $connection->query($medicationRequestQuery);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nurse Dashboard</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .card {
        margin-bottom: 30px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }
    .card-header {
        color: #fff;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 10px 15px;
    }
    .card-header.bg-success {
        background-color: #28a745; /* Green color for patient records */
    }
    .card-header.bg-info {
        background-color: #17a2b8; /* Info color for upcoming appointments */
    }
    .card-header.bg-warning {
        background-color: #ffc107; /* Warning color for medication requests */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #0056b3; /* Table header background color */
        color: #fff;
    }
    .total {
        font-weight: bold;
        color: #333;
    }
</style>

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Nurse Dashboard</h1>

        <!-- Patient Records Section -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4>Recent Patient Records</h4>
            </div>
            <div class="card-body">
                <?php if ($patientResult && $patientResult->num_rows > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Diagnosis</th>
                                <th>Appointment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $patientResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                                    <td><?php echo htmlspecialchars($row['diagnosis']); ?></td>
                                    <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No recent patient records found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Upcoming Appointments Section -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h4>Upcoming Appointments</h4>
            </div>
            <div class="card-body">
                <?php if ($appointmentResult && $appointmentResult->num_rows > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Appointment Date</th>
                                <th>Purpose</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $appointmentResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['purpose']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No upcoming appointments found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Medication Requests Section -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-white">
                <h4>Pending Medication Requests</h4>
            </div>
            <div class="card-body">
                <?php if ($medicationRequestResult && $medicationRequestResult->num_rows > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Patient ID</th>
                                <th>Medication</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $medicationRequestResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['request_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['medication']); ?></td>
                                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No pending medication requests.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$connection->close();
?>
