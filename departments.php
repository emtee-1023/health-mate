<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Departments</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaf7ea;
            color: #343a40;
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

        /* Header */
        h1 {
            text-align: center;
            color: #216731;
            margin-top: 20px;
        }

        /* Departments Section */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .department {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        .card {
            background-color: white;
            border: 1px solid #216731;
            border-radius: 8px;
            padding: 15px;
            width: 30%;
            /* Adjust card width for better layout */
            text-align: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            color: #216731;
            font-size: 1.5rem;
        }

        .view-btn {
            background-color: #216731;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-size: 1rem;
        }

        .view-btn:hover {
            background-color: #216731;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 500px;
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            color: #216731;
        }

        .close-btn {
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            padding: 8px;
        }

        .doctor-card {
            background-color: #f8f9fa;
            padding: 15px;
            border: 1px solid#216731;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .doctor-card h4 {
            color: #343a40;
        }

        .doctor-card p {
            color: #6c757d;
        }

        .appointment-btn {
            background-color: #216731;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 1rem;
        }

        .appointment-btn:hover {
            background-color: #216731;
        }

        /* Footer */
        footer {
            background-color: #216731;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="bg-success">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="departments.php">Departments</a></li>
            <li><a href="pharmacy.php">Pharmacy</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1>Medical Departments</h1>

        <!-- Departments Section -->
        <div class="department  bg-success">
            <div class="card">
                <h3>Cardiology</h3>
                <button class="view-btn" onclick="showDoctors('cardiology')">View Doctors</button>
            </div>
            <div class="card">
                <h3>Neurology</h3>
                <button class="view-btn" onclick="showDoctors('neurology')">View Doctors</button>
            </div>
            <div class="card">
                <h3>Orthopedics</h3>
                <button class="view-btn" onclick="showDoctors('orthopedics')">View Doctors</button>
            </div>
        </div>
        <div class="department">
            <div class="card">
                <h3>Pediatrics</h3>
                <button class="view-btn" onclick="showDoctors('pediatrics')">View Doctors</button>
            </div>
            <div class="card">
                <h3>Dermatology</h3>
                <button class="view-btn" onclick="showDoctors('dermatology')">View Doctors</button>
            </div>
            <div class="card">
                <h3>Psychiatry</h3>
                <button class="view-btn" onclick="showDoctors('psychiatry')">View Doctors</button>
            </div>
        </div>
    </div>

    <!-- Modal for doctor profiles -->
    <div id="doctor-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title">Doctors</h2>
                <button class="close-btn" onclick="closeModal()">X</button>
            </div>
            <div id="doctor-list">
                <!-- Doctor profiles will load here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 HealthMate. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript to handle modal and doctor profiles -->
    <script>
        function showDoctors(department) {
            const doctors = {
                'cardiology': [
                    { name: 'Dr. Mark Talamson', specialty: 'Cardiology', experience: '10 years', fee: 'Ksh 1500' },
                    { name: 'Dr. Jada Walubiri', specialty: 'Cardiology', experience: '8 years', fee: 'Ksh 1400' }
                ],
                'neurology': [
                    { name: 'Dr. Zarah Isiaho', specialty: 'Neurology', experience: '12 years', fee: '   Ksh 2000' }
                ],
                'orthopedics': [
                    { name: 'Dr. Ben Kyalo', specialty: 'Orthopedics', experience: '9 years', fee: 'Ksh 1800' }
                ]
                // Add more departments and doctors
            };

            let doctorList = doctors[department] || [];
            let doctorContainer = document.getElementById('doctor-list');
            doctorContainer.innerHTML = ''; // Clear previous content

            doctorList.forEach(doctor => {
                let doctorCard = `
                    <div class="doctor-card">
                        <h4>${doctor.name}</h4>
                        <p>Specialty: ${doctor.specialty}</p>
                        <p>Experience: ${doctor.experience}</p>
                        <p>Consultation Fee: ${doctor.fee}</p>
                        <button class="appointment-btn" onclick="bookAppointment('${doctor.name}')">Book Appointment</button>
                    </div>
                `;
                doctorContainer.innerHTML += doctorCard;
            });

            document.getElementById('doctor-modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('doctor-modal').style.display = 'none';
        }

        function bookAppointment(doctorName) {
            window.location.href = `appointmentbook.php?doctor=${encodeURIComponent(doctorName)}`;
        }
    </script>

</body>

</html>
