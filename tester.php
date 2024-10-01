<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h2 {
            margin-top: 0;
        }

        .action-buttons button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
        }

        .action-buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>Doctor's Dashboard</h1>
    </div>

    <div class="sidebar">
        <a href="#">Home</a>
        <a href="#">Appointment Booking</a>
        <a href="#">Patient History</a>
        <a href="#">Patient Records</a>
        <a href="#">Prescription Management</a>
        <a href="#">Messaging System</a>
        <a href="#">Task Management</a>
        <a href="#">Billing & Invoices</a>
        <a href="#">Telemedicine</a>
        <a href="#">Reports & Analytics</a>
        <a href="#">Settings</a>
    </div>

    <div class="main-content">
        <div class="card">
            <h2>Upcoming Appointments</h2>
            <p>You have 3 appointments scheduled for today.</p>
        </div>

        <div class="card">
            <h2>Patient Records</h2>
            <p>Access patient records, including medical history, treatments, and more.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">View Records</button>
                <button onclick="window.location.href='#'">Add New Record</button>
            </div>
        </div>

        <div class="card">
            <h2>Prescription Management</h2>
            <p>Manage and send prescriptions to pharmacies.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">Manage Prescriptions</button>
                <button onclick="window.location.href='#'">New Prescription</button>
            </div>
        </div>

        <div class="card">
            <h2>Messages</h2>
            <p>Securely communicate with patients and other healthcare professionals.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">View Messages</button>
                <button onclick="window.location.href='#'">Send Message</button>
            </div>
        </div>

        <div class="card">
            <h2>Task Management</h2>
            <p>Track your tasks, including follow-ups and administrative duties.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">View Tasks</button>
                <button onclick="window.location.href='#'">New Task</button>
            </div>
        </div>

        <div class="card">
            <h2>Billing & Invoices</h2>
            <p>Manage patient billing, view payment history, and send invoices.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">View Billing</button>
                <button onclick="window.location.href='#'">New Invoice</button>
            </div>
        </div>

        <div class="card">
            <h2>Telemedicine</h2>
            <p>Start a video or audio consultation with your patients.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">Start Consultation</button>
            </div>
        </div>

        <div class="card">
            <h2>Reports & Analytics</h2>
            <p>View insights on patient care, treatment outcomes, and more.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">View Reports</button>
            </div>
        </div>

        <div class="card">
            <h2>Settings</h2>
            <p>Manage your profile, availability, and notification preferences.</p>
            <div class="action-buttons">
                <button onclick="window.location.href='#'">Edit Settings</button>
            </div>
        </div>
    </div>

</body>

</html>