<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing and Invoice Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }

        .section {
            margin: 20px 0;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            margin-top: 0;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-container {
            text-align: right;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            color: #fff;
            background-color: #333;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <header>
        <h1>Billing and Invoice Management</h1>
    </header>

    <div class="container">

        <!-- Payment and Invoice Management Section -->
        <section class="section">
            <h2>Appointment Payments</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Service Provided</th>
                            <th>Amount ($)</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12345</td>
                            <td>John Doe</td>
                            <td>General Consultation</td>
                            <td>150</td>
                            <td>Pending</td>
                            <td><button class="btn btn-primary">Mark as Paid</button></td>
                        </tr>
                        <tr>
                            <td>67890</td>
                            <td>Jane Smith</td>
                            <td>Follow-up</td>
                            <td>100</td>
                            <td>Paid</td>
                            <td><button class="btn btn-secondary" disabled>Paid</button></td>
                        </tr>
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Daily Account Summary Section -->
        <section class="section">
            <h2>Daily Account Summary</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total Income ($)</th>
                            <th>Total Appointments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-08-29</td>
                            <td>250</td>
                            <td>2</td>
                        </tr>
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
            </div>
            <div class="total-container">
                <p>Total Income Today: $250</p>
            </div>
        </section>

        <!-- Total Income Section -->
        <section class="section">
            <h2>Total Income</h2>
            <div class="total-container">
                <p>Total Income to Date: $10,000</p>
            </div>
        </section>

        <!-- Generate Invoice Section -->
        <section class="section">
            <h2>Generate Invoice</h2>
            <form>
                <div class="form-group">
                    <label for="appointment-id">Appointment ID</label>
                    <input type="text" id="appointment-id" name="appointment-id" required>
                </div>
                <div class="form-group">
                    <label for="patient-name">Patient Name</label>
                    <input type="text" id="patient-name" name="patient-name" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount ($)</label>
                    <input type="number" id="amount" name="amount" required>
                </div>
                <div class="form-group">
                    <label for="service">Service Provided</label>
                    <input type="text" id="service" name="service" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Generate Invoice</button>
                </div>
            </form>
        </section>

        <!-- Invoice History Section -->
        <section class="section">
            <h2>Invoice History</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Patient Name</th>
                            <th>Amount ($)</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>INV12345</td>
                            <td>John Doe</td>
                            <td>150</td>
                            <td>2024-08-29</td>
                            <td>Paid</td>
                        </tr>
                        <tr>
                            <td>INV67890</td>
                            <td>Jane Smith</td>
                            <td>100</td>
                            <td>2024-08-29</td>
                            <td>Paid</td>
                        </tr>
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</body>

</html>