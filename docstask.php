<?php
// Include the database connection
include 'includes/connect.php';

// Queries to get data for different sections
$appointmentQuery = "SELECT patient_id, appointment_date, purpose FROM appointments WHERE appointment_date >= CURDATE() ORDER BY appointment_date ASC LIMIT 5";
$followupQuery = "SELECT patient_id, followup_date FROM followups WHERE followup_date >= CURDATE() ORDER BY followup_date ASC LIMIT 5";
$labTestQuery = "SELECT patient_id, test_name, received_date FROM lab_tests ORDER BY received_date DESC LIMIT 5";
$emergencyQuery = "SELECT patient_id, issue FROM emergencies ORDER BY reported_time DESC LIMIT 5";
$patientQuery = "SELECT id, name, age, diagnosis, appointment_date FROM patients ORDER BY appointment_date DESC LIMIT 5";
$messageQuery = "SELECT patient_id, message FROM patient_messages ORDER BY message_date DESC LIMIT 5";

// Execute queries
$appointmentResult = $connection->query($appointmentQuery);
$followupResult = $connection->query($followupQuery);
$labTestResult = $connection->query($labTestQuery);
$emergencyResult = $connection->query($emergencyQuery);
$patientResult = $connection->query($patientQuery);
$messageResult = $connection->query($messageQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Doctor's Dashboard">
    <meta name="author" content="Your Name">
    <title>Doctor's Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        background-color: #0056b3; /* Section header background color */
    }
    h4 {
        margin: 0;
    }
    ul {
        padding-left: 20px;
    }
    li {
        margin-bottom: 10px;
        color: #555;
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
    <div class="container">
        <h1 class="text-center">Doctor's Dashboard</h1>

        <!-- Notifications Section -->
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4>Notifications</h4>
            </div>
            <div class="card-body">
                <h5>Upcoming Appointments</h5>
                <ul>
                    <?php if ($appointmentResult && $appointmentResult->num_rows > 0): ?>
                        <?php while ($row = $appointmentResult->fetch_assoc()): ?>
                            <li>Patient ID: <?php echo htmlspecialchars($row['patient_id']); ?> - Date: <?php echo htmlspecialchars($row['appointment_date']); ?> (Purpose: <?php echo htmlspecialchars($row['purpose']); ?>)</li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li>No upcoming appointments.</li>
                    <?php endif; ?>
                </ul>

                <h5>Follow-ups</h5>
                <ul>
                    <?php if ($followupResult && $followupResult->num_rows > 0): ?>
                        <?php while ($row = $followupResult->fetch_assoc()): ?>
                            <li>Patient ID: <?php echo htmlspecialchars($row['patient_id']); ?> - Follow-up Date: <?php echo htmlspecialchars($row['followup_date']); ?></li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li>No follow-ups scheduled.</li>
                    <?php endif; ?>
                </ul>

                <h5>Received Lab Tests</h5>
                <ul>
                    <?php if ($labTestResult && $labTestResult->num_rows > 0): ?>
                        <?php while ($row = $labTestResult->fetch_assoc()): ?>
                            <li>Patient ID: <?php echo htmlspecialchars($row['patient_id']); ?> - Test: <?php echo htmlspecialchars($row['test_name']); ?> - Received on: <?php echo htmlspecialchars($row['received_date']); ?></li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li>No lab tests received.</li>
                    <?php endif; ?>
                </ul>

                <h5>Emergencies</h5>
                <ul>
                    <?php if ($emergencyResult && $emergencyResult->num_rows > 0): ?>
                        <?php while ($row = $emergencyResult->fetch_assoc()): ?>
                            <li>Patient ID: <?php echo htmlspecialchars($row['patient_id']); ?> - Issue: <?php echo htmlspecialchars($row['issue']); ?></li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li>No emergencies reported.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Patient Records Section -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4>Patient Records</h4>
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

        <!-- Messages from Patients Section -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-white">
                <h4>Messages from Patients</h4>
            </div>
            <div class="card-body">
                <?php if ($messageResult && $messageResult->num_rows > 0): ?>
                    <ul>
                        <?php while ($row = $messageResult->fetch_assoc()): ?>
                            <li>Patient ID: <?php echo htmlspecialchars($row['patient_id']); ?> - Message: <?php echo htmlspecialchars($row['message']); ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center">No new messages from patients.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Manage Tasks Section -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h4>Manage Tasks</h4>
            </div>
            <div class="card-body">
                <p>Task management functionality will be implemented here.</p>
                <button class="btn btn-primary">View Tasks</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$connection->close();
?>
