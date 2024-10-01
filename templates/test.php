<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tests and Results Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            position: fixed;
            width: 220px;
            top: 0;
            left: 0;
            overflow-y: auto;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar .active {
            background-color: #007bff;
            color: #fff;
        }

        .container-fluid {
            padding-left: 0;
        }

        .content {
            padding: 20px;
            margin-left: 220px;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-contact {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-contact:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .review-section {
            margin-top: 20px;
            display: none;
        }

        .section-title {
            font-size: 1.5rem;
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar">
                <a href="#" class="active">Dashboard</a>
                <a href="#">Pending Tests</a>
                <a href="#">Completed Tests</a>
                <a href="#">Emergency Responses</a>
                <a href="#">Patient Records</a>
            </nav>

            <!-- Main Content -->
            <main class="content col-md-9 col-lg-10">
                <h2>Tests and Results Management</h2>

                <!-- Pending Tests Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="section-title">Pending Tests</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Patient: John Doe</h5>
                                <p>Test: Blood Test</p>
                                <p>Location: 123 Health St.</p>
                                <p>Contact Info: +123 456 7890</p>
                                <button class="btn btn-contact btn-sm" onclick="contactPatient('+123 456 7890')">Contact
                                    Patient</button>
                            </div>
                            <div class="col-md-4">
                                <h5>Patient: Jane Smith</h5>
                                <p>Test: X-Ray</p>
                                <p>Location: 456 Wellness Ave.</p>
                                <p>Contact Info: +987 654 3210</p>
                                <button class="btn btn-contact btn-sm" onclick="contactPatient('+987 654 3210')">Contact
                                    Patient</button>
                            </div>
                            <div class="col-md-4">
                                <h5>Patient: Robert Brown</h5>
                                <p>Test: MRI</p>
                                <p>Location: 789 Care Rd.</p>
                                <p>Contact Info: +555 678 9101</p>
                                <button class="btn btn-contact btn-sm" onclick="contactPatient('+555 678 9101')">Contact
                                    Patient</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Tests Section -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="section-title">Completed Tests</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Patient: Alice Green</h5>
                                <p>Test: Ultrasound</p>
                                <p>Result: Normal</p>
                                <button class="btn btn-primary btn-sm"
                                    onclick="reviewTest('Alice Green', 'Dr. Williams', 'Ultrasound', 'Normal')">Review &
                                    Send</button>
                            </div>
                            <div class="col-md-4">
                                <h5>Patient: Michael Johnson</h5>
                                <p>Test: CT Scan</p>
                                <p>Result: Abnormal</p>
                                <button class="btn btn-primary btn-sm"
                                    onclick="reviewTest('Michael Johnson', 'Dr. Brown', 'CT Scan', 'Abnormal')">Review &
                                    Send</button>
                            </div>
                            <div class="col-md-4">
                                <h5>Patient: Emily Davis</h5>
                                <p>Test: Blood Test</p>
                                <p>Result: Normal</p>
                                <button class="btn btn-primary btn-sm"
                                    onclick="reviewTest('Emily Davis', 'Dr. Thompson', 'Blood Test', 'Normal')">Review &
                                    Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review and Send Section -->
                <div class="card review-section" id="review-section">
                    <div class="card-header">
                        <h4 class="section-title">Review and Send Test Results</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 id="review-patient-name">Patient: </h5>
                                <p id="review-test-type">Test: </p>
                                <p id="review-result">Result: </p>
                            </div>
                            <div class="col-md-6">
                                <h5 id="review-doctor-name">Doctor: </h5>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm" onclick="sendToPatientRecord()">Send to Patient
                            Record</button>
                        <button class="btn btn-success btn-sm" onclick="sendToDoctor()">Send to Doctor</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function contactPatient(phoneNumber) {
            alert(`Contacting patient at ${phoneNumber}`);
        }

        function reviewTest(patientName, doctorName, testType, result) {
            document.getElementById('review-patient-name').textContent = `Patient: ${patientName}`;
            document.getElementById('review-doctor-name').textContent = `Doctor: ${doctorName}`;
            document.getElementById('review-test-type').textContent = `Test: ${testType}`;
            document.getElementById('review-result').textContent = `Result: ${result}`;
            document.getElementById('review-section').style.display = 'block';
        }

        function sendToPatientRecord() {
            alert('Test result sent to patient record successfully.');
        }

        function sendToDoctor() {
            alert('Test result sent to the doctor successfully.');
        }
    </script>
</body>

</html>
