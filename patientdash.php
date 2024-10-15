<?php
include 'includes/connect.php';

$patient_id = 1; // Replace with the actual patient ID

// Fetch patient details
$patient_query = $conn->prepare("SELECT UserName FROM users WHERE UserID = ?");
$patient_query->bind_param('i', $patient_id);  // 'i' for integer
$patient_query->execute();
$patient_result = $patient_query->get_result();
$patient = $patient_result->fetch_assoc();  // Fetch single row as associative array

// Fetch appointment details
$appointments_query = $conn->prepare("
    SELECT d.DoctorName, a.AppointmentDate, a.ConsultationFee
    FROM appointments a
    JOIN doctors d ON a.DoctorID = d.DoctorID
    WHERE a.UserID = ?
");
$appointments_query->bind_param('i', $patient_id);
$appointments_query->execute();
$appointments_result = $appointments_query->get_result();
$appointments = $appointments_result->fetch_all(MYSQLI_ASSOC);  // Fetch all rows as associative array

// Fetch total spent on doctors
$total_spent_doctors_query = $conn->prepare("
    SELECT SUM(ConsultationFee) AS total_spent_on_doctors
    FROM appointments
    WHERE UserID = ?
");
$total_spent_doctors_query->bind_param('i', $patient_id);
$total_spent_doctors_query->execute();
$total_spent_doctors_result = $total_spent_doctors_query->get_result();
$total_spent_doctors = $total_spent_doctors_result->fetch_assoc()['total_spent_on_doctors'];

// Fetch pharmacy purchases
$pharmacy_query = $conn->prepare("
    SELECT ph.MedicineName, pp.PurchaseDate, pp.TotalCost
    FROM pharmacy_purchases pp
    JOIN medicine ph ON pp.MedicineID = ph.MedicineID
    WHERE pp.UserID = ?
");
$pharmacy_query->bind_param('i', $patient_id);
$pharmacy_query->execute();
$pharmacy_result = $pharmacy_query->get_result();
$pharmacy_purchases = $pharmacy_result->fetch_all(MYSQLI_ASSOC);

// Fetch total spent on pharmacy
$total_spent_pharmacy_query = $conn->prepare("
    SELECT SUM(TotalCost) AS total_spent_on_pharmacy
    FROM pharmacy_purchases
    WHERE UserId = ?
");
$total_spent_pharmacy_query->bind_param('i', $patient_id);
$total_spent_pharmacy_query->execute();
$total_spent_pharmacy_result = $total_spent_pharmacy_query->get_result();
$total_spent_pharmacy = $total_spent_pharmacy_result->fetch_assoc()['total_spent_on_pharmacy'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .section {
            margin-bottom: 30px;
        }
        .section h2 {
            color: #0056b3;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
        }
        .appointments, .pharmacy {
            width: 100%;
            border-collapse: collapse;
        }
        .appointments th, .pharmacy th, .appointments td, .pharmacy td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .appointments th, .pharmacy th {
            background-color: #0056b3;
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
        <h1>Patient Dashboard - <?php echo $patient['UserName']; ?></h1>

        <!-- Appointments Section -->
        <div class="section">
            <h2>Doctor Appointments</h2>
            <table class="appointments">
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Consultation Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment) { ?>
                        <tr>
                            <td><?php echo $appointment['DoctorName']; ?></td>
                            <td><?php echo $appointment['AppointmentDate']; ?></td>
                            <td>Kes.<?php echo number_format($appointment['ConsultationFee'], 2); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" class="total">Total Spent on Doctors</td>
                        <td class="total">Kes.<?php echo number_format($total_spent_doctors, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pharmacy Section -->
        <div class="section">
            <h2>Pharmacy Purchases</h2>
            <table class="pharmacy">
                <thead>
                    <tr>
                        <th>Medicine</th>
                        <th>Date</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pharmacy_purchases as $purchase) { ?>
                        <tr>
                            <td><?php echo $purchase['MedicineName']; ?></td>
                            <td><?php echo $purchase['PurchaseDate']; ?></td>  <!-- Fixed typo here -->
                            <td>Kes.<?php echo number_format($purchase['TotalCost'], 2); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" class="total">Total Spent on Pharmacy</td>
                        <td class="total">Kes.<?php echo number_format($total_spent_pharmacy, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
