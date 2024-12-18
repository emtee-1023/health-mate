<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaf7ea;
            color: #343a40;
        }

        h1 {
            text-align: center;
            color: #216731;
            margin-top: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #216731;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
        }

        .submit-btn {
            background-color: #216731;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-size: 1rem;
        }

        .submit-btn:hover {
            background-color: #216731;
        }

        .success-message {
            color: #216731;
            text-align: center;
            font-size: 1.2rem;
            margin-top: 20px;
            display: none;
        }

        .wallet-info {
            background-color: #d4edda;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .wallet-info h4 {
            color: #155724;
        }

        footer {
            background-color: #216731;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }

        /* Navigation Bar */
        nav {
            background-color: #216731;
            /* Success theme */
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #f8f9fa;
        }
    </style>
</head>

<body>
    <nav class="bg-success">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="departments.php">Departments</a></li>
            <li><a href="pharmacy.php">Pharmacy</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>

    <h1>Book an Appointment</h1>

    <div class="container">
        <form id="appointmentForm">

            <!-- Patient Personal Information (Automatically attached to form submission) -->
            <div class="wallet-info">
                <h4>Patient's Personal Details</h4>
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Patient ID:</strong> P12345</p>
                <p><strong>Wallet Balance:</strong> $500</p>
            </div>

            <!-- Appointment Details -->
            <div class="form-group">
                <label for="doctor">Select Doctor:</label>
                <select id="doctor" required>
                    <option value="Dr. John Doe">Dr. John Doe - Cardiology</option>
                    <option value="Dr. Jane Smith">Dr. Jane Smith - Neurology</option>
                    <option value="Dr. Michael Brown">Dr. Michael Brown - Orthopedics</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Preferred Date:</label>
                <input type="date" id="date" required>
            </div>

            <div class="form-group">
                <label for="time">Preferred Time:</label>
                <input type="time" id="time" required>
            </div>

            <div class="form-group">
                <label for="type">Appointment Type:</label>
                <select id="type" required>
                    <option value="Video Call">Video Call</option>
                    <option value="Audio Call">Audio Call</option>
                    <option value="Chat">Chat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Describe Your Symptoms or Reason for Appointment:</label>
                <textarea id="description" rows="5" placeholder="Provide detailed information here..."
                    required></textarea>
            </div>

            <!-- Submit button -->
            <button type="button" class="submit-btn" onclick="submitAppointment()">Send Appointment Request</button>

        </form>

        <div id="confirmationMessage" class="success-message">
            Appointment request sent successfully! Awaiting doctor's acceptance.
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 HealthMate. All Rights Reserved.</p>
    </footer>

    <script>
        function submitAppointment() {
            // Fetch form data
            const doctor = document.getElementById('doctor').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const type = document.getElementById('type').value;
            const description = document.getElementById('description').value;

            // Simulate form data submission and wallet deduction
            if (doctor && date && time && type && description) {
                // Simulate sending form data and appointment details to the server
                console.log('Sending appointment request to:', doctor);
                console.log('Appointment Date:', date);
                console.log('Appointment Time:', time);
                console.log('Appointment Type:', type);
                console.log('Symptoms/Reason:', description);
                console.log('Wallet deduction pending doctor acceptance...');

                // Show confirmation message
                document.getElementById('confirmationMessage').style.display = 'block';

                // Simulate wallet deduction upon doctor's acceptance
                setTimeout(() => {
                    alert('Doctor has accepted the appointment. Your wallet has been charged for the consultation fee.');
                    // Update the wallet balance or redirect the patient to a confirmation page
                }, 3000);  // Simulating the time for doctor to accept
            } else {
                alert('Please fill out all the required fields!');
            }
        }
    </script>

</body>

</html>
