<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report and Analytics</title>
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

        .chart-container {
            margin: 20px 0;
        }

        .chart {
            width: 100%;
            height: 400px;
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <header>
        <h1>Report and Analytics</h1>
    </header>

    <div class="container">

        <!-- Appointment Summary Section -->
        <section class="section">
            <h2>Appointment Summary</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total Appointments</th>
                            <th>Completed</th>
                            <th>Cancelled</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-08-29</td>
                            <td>10</td>
                            <td>8</td>
                            <td>2</td>
                        </tr>
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Financial Report Section -->
        <section class="section">
            <h2>Financial Report</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total Income ($)</th>
                            <th>Total Expenses ($)</th>
                            <th>Net Income ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-08-29</td>
                            <td>250</td>
                            <td>50</td>
                            <td>200</td>
                        </tr>
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Appointment Statistics Chart -->
        <section class="section">
            <h2>Appointment Statistics</h2>
            <div class="chart-container">
                <canvas id="appointmentChart" class="chart"></canvas>
            </div>
        </section>

        <!-- Income Statistics Chart -->
        <section class="section">
            <h2>Income Statistics</h2>
            <div class="chart-container">
                <canvas id="incomeChart" class="chart"></canvas>
            </div>
        </section>

        <!-- Filter Options Section -->
        <section class="section">
            <h2>Filter Reports</h2>
            <form>
                <div class="form-group">
                    <label for="report-type">Report Type</label>
                    <select id="report-type" name="report-type">
                        <option value="appointments">Appointments</option>
                        <option value="financial">Financial</option>
                        <option value="both">Both</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start-date">Start Date</label>
                    <input type="date" id="start-date" name="start-date">
                </div>
                <div class="form-group">
                    <label for="end-date">End Date</label>
                    <input type="date" id="end-date" name="end-date">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
            </form>
        </section>

    </div>

    <!-- Include Chart.js for Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data for charts
        const appointmentData = {
            labels: ['2024-08-01', '2024-08-02', '2024-08-03', '2024-08-04'],
            datasets: [{
                label: 'Appointments',
                data: [10, 12, 8, 9],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const incomeData = {
            labels: ['2024-08-01', '2024-08-02', '2024-08-03', '2024-08-04'],
            datasets: [{
                label: 'Income ($)',
                data: [200, 250, 150, 180],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };

        // Initialize Appointment Chart
        const appointmentCtx = document.getElementById('appointmentChart').getContext('2d');
        new Chart(appointmentCtx, {
            type: 'bar',
            data: appointmentData,
            options: {
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });

        // Initialize Income Chart
        const incomeCtx = document.getElementById('incomeChart').getContext('2d');
        new Chart(incomeCtx, {
            type: 'line',
            data: incomeData,
            options: {
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

</body>

</html>
