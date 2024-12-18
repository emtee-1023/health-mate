<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .patient-list {
            margin-bottom: 20px;
        }

        .patient-list div {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .patient-list div:hover {
            background-color: #f9f9f9;
        }

        .patient-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 90%;
            max-width: 600px;
        }

        .patient-popup h2 {
            margin-top: 0;
        }

        .patient-popup .close-btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 500;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Patient Records</h1>
        <div class="search-bar">
            <input type="text" id="search-bar" placeholder="Search by Patient ID or Name..." onkeyup="filterPatients()">
        </div>
        <div class="patient-list" id="patient-list">
            <div data-id="P12345" onclick="showPatientPopup('john')">John Doe</div>
            <div data-id="P67890" onclick="showPatientPopup('jane')">Jane Smith</div>
        </div>
    </div>

    <div id="overlay" class="overlay"></div>

    <div id="patient-popup" class="patient-popup">
        <button class="close-btn" onclick="closePatientPopup()">Close</button>
        <div id="patient-details"></div>
    </div>

    <script>
        const patients = {
            'john': {
                name: 'John Doe',
                dob: '1985-03-25',
                id: 'P12345',
                history: [
                    {
                        date: '2024-06-01',
                        doctor: 'Dr. Alice Brown',
                        diagnosis: 'Hypertension',
                        medication: 'Lisinopril 10mg',
                        report: 'Blood pressure consistently high. Medication prescribed.'
                    },
                    {
                        date: '2024-08-10',
                        doctor: 'Dr. David Green',
                        diagnosis: 'Type 2 Diabetes',
                        medication: 'Metformin 500mg',
                        report: 'Blood sugar levels elevated. Medication prescribed.'
                    }
                ]
            },
            'jane': {
                name: 'Jane Smith',
                dob: '1990-07-14',
                id: 'P67890',
                history: [
                    {
                        date: '2024-07-20',
                        doctor: 'Dr. Emily White',
                        diagnosis: 'Asthma',
                        medication: 'Albuterol Inhaler',
                        report: 'Patient experiencing breathing difficulties. Inhaler prescribed.'
                    },
                    {
                        date: '2024-08-22',
                        doctor: 'Dr. Michael Grey',
                        diagnosis: 'Migraine',
                        medication: 'Sumatriptan 50mg',
                        report: 'Severe headaches reported. Medication prescribed.'
                    }
                ]
            }
        };

        function filterPatients() {
            const searchTerm = document.getElementById('search-bar').value.toLowerCase();
            const patientList = document.getElementById('patient-list');
            const patientsDiv = patientList.getElementsByTagName('div');

            for (let i = 0; i < patientsDiv.length; i++) {
                const name = patientsDiv[i].innerText.toLowerCase();
                const id = patientsDiv[i].dataset.id.toLowerCase();

                if (name.includes(searchTerm) || id.includes(searchTerm)) {
                    patientsDiv[i].style.display = '';
                } else {
                    patientsDiv[i].style.display = 'none';
                }
            }
        }

        function showPatientPopup(patientId) {
            const patient = patients[patientId];
            if (patient) {
                let detailsHtml = `
                <h2>${patient.name}</h2>
                <p><strong>Date of Birth:</strong> ${patient.dob}</p>
                <p><strong>Patient ID:</strong> ${patient.id}</p>
                <h3>Medical History</h3>
            `;

                patient.history.forEach(entry => {
                    detailsHtml += `
                    <div>
                        <p><strong>Date:</strong> ${entry.date}</p>
                        <p><strong>Doctor:</strong> ${entry.doctor}</p>
                        <p><strong>Diagnosis:</strong> ${entry.diagnosis}</p>
                        <p><strong>Medication:</strong> ${entry.medication}</p>
                        <p><strong>Report:</strong> ${entry.report}</p>
                        <hr>
                    </div>
                `;
                });

                document.getElementById('patient-details').innerHTML = detailsHtml;
                document.getElementById('patient-popup').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            }
        }

        function closePatientPopup() {
            document.getElementById('patient-popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>

</body>

</html>
