
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .prescription-history {
            margin-top: 20px;
        }

        .prescription-history h3 {
            margin-bottom: 10px;
        }

        .history-list {
            list-style-type: none;
            padding: 0;
        }

        .history-list li {
            padding: 10px;
            background-color: #f9f9f9;
            margin-bottom: 5px;
            border-left: 5px solid #28a745;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Prescription Management System</h2>

        <!-- Prescription Form -->
        <div class="form-group">
            <label for="patient">Select Patient:</label>
            <select id="patient">
                <option value="patient1">Patient 1</option>
                <option value="patient2">Patient 2</option>
                <!-- Add more patients as needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="medicine">Medicine Name:</label>
            <input type="text" id="medicine" placeholder="Enter medicine name">
        </div>

        <div class="form-group">
            <label for="dosage">Dosage:</label>
            <input type="text" id="dosage" placeholder="Enter dosage instructions">
        </div>

        <div class="form-group">
            <label for="notes">Additional Notes:</label>
            <textarea id="notes" rows="4" placeholder="Enter any additional notes for the prescription"></textarea>
        </div>

        <button onclick="sendPrescription()">Send Prescription</button>

        <!-- Prescription History -->
        <div class="prescription-history">
            <h3>Prescription History</h3>
            <ul id="history-list" class="history-list">
                <!-- Previous prescriptions will be listed here -->
            </ul>
        </div>
    </div>

    <script>
        function sendPrescription() {
            const patient = document.getElementById('patient').value;
            const medicine = document.getElementById('medicine').value;
            const dosage = document.getElementById('dosage').value;
            const notes = document.getElementById('notes').value;

            if (patient && medicine && dosage) {
                const prescription = `Patient: ${patient}, Medicine: ${medicine}, Dosage: ${dosage}, Notes: ${notes}`;

                // Add prescription to history
                const historyList = document.getElementById('history-list');
                const newPrescription = document.createElement('li');
                newPrescription.textContent = prescription;
                historyList.appendChild(newPrescription);

                // Forward prescription to patient's history and pharmacy (mocked here)
                console.log('Prescription sent to patient history and pharmacy:', prescription);

                // Clear form
                document.getElementById('patient').value = '';
                document.getElementById('medicine').value = '';
                document.getElementById('dosage').value = '';
                document.getElementById('notes').value = '';
            } else {
                alert('Please fill out all required fields.');
            }
        }
    </script>
</body>

</html>
