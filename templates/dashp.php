<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMate - Patient Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaf7ea;
            color: #333;
        }

        .navbar {
            background-color: #216731;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #216731;
            text-align: left;
            margin-bottom: 10px;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .profile img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }

        .profile h2 {
            margin: 0;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
            color: #216731;
        }

        .card ul,
        .card table {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }

        .card ul li,
        .card table td {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .card ul li:last-child,
        .card table td:last-child {
            border-bottom: none;
        }

        .card a.view-btn {
            padding: 5px 10px;
            background-color: #216731;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            font-size: 0.8rem;
            margin-left: 10px;
        }

        .card a.view-btn:hover {
            background-color: #216731;
        }

        .dashboard-grid .vitals,
        .dashboard-grid .history,
        .dashboard-grid .prescriptions {
            grid-column: span 2;
        }



        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #216731;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #216731;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        .navbar {
            background-color: #216731;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .welcome-section {
            background-color: #e8f5e9;
            /* Pale green background */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .welcome-section h2 {
            color: #216731;
            margin: 0;
        }

        .welcome-section p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .health-tip {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
        }

        .vitals-cards {
            display: flex;
            justify-content: space-between;
        }

        .vital-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 32%;
        }

        .vital-card h3 {
            color: #216731;
        }

        .vital-card p {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .footer {
            background-color: #216731;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #28a745;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }

        .map-container {
            height: 400px;
            width: 100%;
            position: relative;
            margin: 20px 0;
        }

        .map-section {
            margin: 20px;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .map {
            height: 100%;
            width: 100%;
        }
    </style>
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HealthMate - Patient Dashboard</title>
        <style>

        </style>
    </head>

    <body>

        <!-- Navigation Bar -->
        <div class="navbar">
            <h1>HealthMate</h1>
            <div>
                <a href="home.html">Home</a>
                <a href="appointmentbook.html">Appointments</a>
                <a href="pharmacy.html">pharmacy</a>
                <a href="#">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>

        <!-- Welcome Section -->
        <div class="container">
            <div class="welcome-section">
                <h2>Welcome, LarryDon</h2>
                <p class="health-tip" id="healthTip">Tip of the day: Stay hydrated by drinking water regularly.</p>
                <div class="container">
                    <div class="profile">
                        <img src="https://via.placeholder.com/100" alt="Patient Profile Photo">
                        <div>
                            <p>Patient ID: P12345</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Vitals Cards Section -->
            <div class="vitals-cards">
                <div class="vital-card">
                    <h3>Steps Today</h3>
                    <p>7,800</p>
                </div>
                <div class="vital-card">
                    <h3>Hydration Level</h3>
                    <p>65%</p>
                </div>
                <div class="vital-card">
                    <h3>Heart Rate</h3>
                    <p>72 BPM</p>
                </div>
            </div>
        </div>


        <!-- JavaScript for Changing Health Tip -->
        <script>
            const healthTips = [
                'Tip of the day: Stay hydrated by drinking water regularly.',
                'Tip of the day: Take short breaks during work to relax your mind.',
                'Tip of the day: Add more fruits and vegetables to your meals.',
                'Tip of the day: Get at least 30 minutes of physical activity every day.',
                'Tip of the day: Maintain a regular sleep schedule for better health.'
            ];

            let tipIndex = 0;
            const tipElement = document.getElementById('healthTip');

            function changeTip() {
                tipIndex = (tipIndex + 1) % healthTips.length;
                tipElement.textContent = healthTips[tipIndex];
            }

            setInterval(changeTip, 4000); // Change tip every 2 seconds
        </script>


        <!-- Welcome Section -->


        <!-- Dashboard Grid -->
        <div class="dashboard-grid">

            <!-- Pending Appointments -->
            <div class="card">
                <h3>Pending Appointments</h3>
                <ul>
                    <li>Dr. Jane Smith - Neurology | <strong>10th Sep, 2024</strong>
                        <a href="appointment.html" class="view-btn">View</a>
                    </li>
                    <li>Dr. Michael Brown - Cardiology | <strong>15th Sep, 2024</strong>
                        <a href="appointment.html" class="view-btn">View</a>
                    </li>
                </ul>
            </div>

            <!-- Received Appointments -->
            <div class="card">
                <h3>Accepted Appointments</h3>
                <ul>
                    <li>Dr. Lisa Adams - Dermatology | <strong>5th Sep, 2024</strong>
                        <a href="appointment.html" class="view-btn">View</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <h3>Doctors Report</h3>
                <ul>
                    <li>Dr. Lisa Adams - Dermatology | <strong>5th Sep, 2024</strong>
                        <a href="" class="view-btn">View</a>
                    </li>
                </ul>
            </div>

            <!-- Pending Lab Tests -->
            <div class="card">
                <h3>Pending Lab Tests</h3>
                <ul>
                    <li>Blood Test | Scheduled: <strong>12th Sep, 2024</strong>
                        <a href="tests.html" class="view-btn">View</a>
                    </li>
                    <li>Stool Test | Scheduled: <strong>16th Sep, 2024</strong>
                        <a href="tests.html" class="view-btn">View</a>
                    </li>
                </ul>
            </div>

            <!-- Received Lab Tests -->
            <div class="card">
                <h3>Received Lab Tests</h3>
                <ul>
                    <li>Blood Test | <strong>Results Received</strong>
                        <a href="results.html" class="view-btn">View</a>
                    </li>
                </ul>
            </div>

            <!-- Pending Results -->
            <div class="card">
                <h3>Pending Results</h3>
                <ul>
                    <li>Blood Test - Results Pending</li>
                    <li>Stool Test - Results Pending</li>
                    <li>Doctor's Report - Results Pending</li>
                </ul>
            </div>

            <!-- Medical History -->
            <div class="card history">
                <h3>Medical History</h3>
                <ul>
                    <li>Consultation with Dr. John - 5th Aug, 2024
                        <a href="history.html" class="view-btn">View</a>
                    </li>
                    <li>Blood Test - 6th Aug, 2024 |
                        <a href="history.html" class="view-btn">View Report</a>
                    </li>
                    <li>Prescription - 7th Aug, 2024 |
                        <a href="pharmacy.html" class="view-btn">Check at Pharmacy</a>
                    </li>
                    <li>Insurance Uploaded: <strong>Yes</strong></li>
                </ul>
            </div>

            <!-- Prescriptions -->
            <div class="card prescriptions">
                <h3>Prescriptions Received</h3>
                <ul>
                    <li>Prescription from Dr. John - <strong>7th Aug, 2024</strong>
                        <a href="pharmacy.html" class="view-btn">View</a>
                    </li>
                </ul>
            </div>

            <!-- Vitals and Hydration -->
            <div class="card vitals">
                <h3>Vitals & Daily Tips</h3>
                <table>
                    <tr>
                        <td>Steps Today:</td>
                        <td><strong>7,800</strong></td>
                    </tr>
                    <tr>
                        <td>Hydration Level:</td>
                        <td><strong>65%</strong></td>
                    </tr>
                    <tr>
                        <td>Blood Pressure:</td>
                        <td><strong>120/80 mmHg</strong></td>
                    </tr>
                    <tr>
                        <td>Heart Rate:</td>
                        <td><strong>72 BPM</strong></td>
                    </tr>
                </table>
                <a href="#" class="btn">Update Vitals</a>
            </div>


            <div class="map-section">
                <div class="section-title">On-Call Tracking in Nairobi</div>
                <div id="doctor-map" class="map-container"></div>
            </div>

            <div class="map-section">
                <div class="section-title">Medical Deliveries Tracking</div>
                <div id="delivery-map" class="map-container"></div>
            </div>

            <script>
                function initMap() {
                    // On-Call Doctors Map
                    const doctorMap = new google.maps.Map(document.getElementById('doctor-map'), {
                        center: { lat: -1.286389, lng: 36.817223 }, // Nairobi coordinates
                        zoom: 12
                    });

                    // Example doctors' locations in Nairobi
                    const doctorLocations = [
                        { lat: -1.290270, lng: 36.821946, name: 'Dr. Jane Doe' },
                        { lat: -1.308491, lng: 36.790350, name: 'Dr. John Smith' },
                        { lat: -1.286389, lng: 36.817223, name: 'Dr. Alice Johnson' }
                    ];

                    doctorLocations.forEach(location => {
                        new google.maps.Marker({
                            position: location,
                            map: doctorMap,
                            title: location.name
                        });
                    });

                    // Medical Deliveries Map
                    const deliveryMap = new google.maps.Map(document.getElementById('delivery-map'), {
                        center: { lat: -1.286389, lng: 36.817223 }, // Nairobi coordinates
                        zoom: 12
                    });

                    // Example delivery locations in Nairobi
                    const deliveryLocations = [
                        { lat: -1.293167, lng: 36.821946, info: 'Delivery 1 - Near Kenyatta National Hospital' },
                        { lat: -1.292066, lng: 36.821945, info: 'Delivery 2 - Near Sarit Center' },
                        { lat: -1.279940, lng: 36.821946, info: 'Delivery 3 - Near Jomo Kenyatta International Airport' }
                    ];

                    deliveryLocations.forEach(location => {
                        new google.maps.Marker({
                            position: location,
                            map: deliveryMap,
                            title: location.info
                        });
                    });
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async></script>

            <div>
                <!-- Footer -->
                <footer class="footer">
                    <p>&copy; 2024 HealthMate. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a
                            href="#">Contact
                            Us</a>
                    </p>
                </footer>
            </div>

    </body>

    </html>
