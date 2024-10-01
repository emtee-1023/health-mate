<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emergency Response - Health Mate</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .emergency-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .emergency-card {
            padding: 20px;
            margin-bottom: 20px;
            background-color: #ffffff;
            border-left: 5px solid #dc3545;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .emergency-card:hover {
            background-color: #f8d7da;
        }

        .patient-details,
        .emergency-details,
        .contact-info {
            margin-bottom: 10px;
        }

        .action-button,
        .map-button {
            margin-top: 10px;
            display: block;
        }

        .map-button {
            background-color: #007bff;
            color: white;
        }

        .map-button:hover {
            background-color: #0056b3;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #343a40;
            padding: 20px;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #495057;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #6c757d;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h3>Health Mate</h3>
        <a href="#">Dashboard</a>
        <a href="#">Pending On-Call Tests</a>
        <a href="#">All Tests Carried Out</a>
        <a href="#">Patient Results</a>
        <a href="#">Emergency Responses</a>
        <a href="#">Patient Visits</a>
        <a href="#">Location Requests</a>
    </div>

    <div class="content">
        <div class="emergency-container">
            <h2>Emergency Response</h2>

            <!-- Emergency 1 -->
            <div class="emergency-card">
                <div class="patient-details"><strong>Patient:</strong> John Doe</div>
                <div class="location"><strong>Location:</strong> 123 Maple Street, Springfield</div>
                <div class="emergency-details"><strong>Emergency:</strong> Severe chest pain, possible heart attack.
                </div>
                <div class="contact-info"><strong>Contact:</strong> +1 234 567 890</div>
                <button class="btn btn-danger action-button">Respond to Emergency</button>
                <button class="btn map-button" onclick="viewMap('123 Maple Street, Springfield')">View on Map</button>
            </div>

            <!-- Emergency 2 -->
            <div class="emergency-card">
                <div class="patient-details"><strong>Patient:</strong> Jane Smith</div>
                <div class="location"><strong>Location:</strong> 456 Oak Avenue, Springfield</div>
                <div class="emergency-details"><strong>Emergency:</strong> Difficulty breathing, asthma attack.</div>
                <div class="contact-info"><strong>Contact:</strong> +1 345 678 901</div>
                <button class="btn btn-danger action-button">Respond to Emergency</button>
                <button class="btn map-button" onclick="viewMap('456 Oak Avenue, Springfield')">View on Map</button>
            </div>

            <!-- Emergency 3 -->
            <div class="emergency-card">
                <div class="patient-details"><strong>Patient:</strong> Bob Johnson</div>
                <div class="location"><strong>Location:</strong> 789 Pine Road, Springfield</div>
                <div class="emergency-details"><strong>Emergency:</strong> High fever and vomiting, suspected infection.
                </div>
                <div class="contact-info"><strong>Contact:</strong> +1 456 789 012</div>
                <button class="btn btn-danger action-button">Respond to Emergency</button>
                <button class="btn map-button" onclick="viewMap('789 Pine Road, Springfield')">View on Map</button>
            </div>

            <!-- Emergency 4 -->
            <div class="emergency-card">
                <div class="patient-details"><strong>Patient:</strong> Alice Brown</div>
                <div class="location"><strong>Location:</strong> 101 Cedar Street, Springfield</div>
                <div class="emergency-details"><strong>Emergency:</strong> Severe allergic reaction, possible
                    anaphylaxis.</div>
                <div class="contact-info"><strong>Contact:</strong> +1 567 890 123</div>
                <button class="btn btn-danger action-button">Respond to Emergency</button>
                <button class="btn map-button" onclick="viewMap('101 Cedar Street, Springfield')">View on Map</button>
            </div>

            <!-- Emergency 5 -->
            <div class="emergency-card">
                <div class="patient-details"><strong>Patient:</strong> Michael White</div>
                <div class="location"><strong>Location:</strong> 202 Birch Lane, Springfield</div>
                <div class="emergency-details"><strong>Emergency:</strong> Suspected stroke, slurred speech, and
                    weakness.</div>
                <div class="contact-info"><strong>Contact:</strong> +1 678 901 234</div>
                <button class="btn btn-danger action-button">Respond to Emergency</button>
                <button class="btn map-button" onclick="viewMap('202 Birch Lane, Springfield')">View on Map</button>
            </div>
        </div>
    </div>

    <script>
        function viewMap(location) {
            const encodedLocation = encodeURIComponent(location);
            const mapUrl = `https://www.google.com/maps/search/?api=1&query=${encodedLocation}`;
            window.open(mapUrl, '_blank');
        }
    </script>
</body>

</html>
