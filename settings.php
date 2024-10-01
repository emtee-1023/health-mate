<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Settings Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
            cursor: pointer;
        }

        .profile-header input[type="file"] {
            display: none;
        }

        .profile-header button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-header button:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 100px;
        }

        .form-group button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #218838;
        }

        .calendar-container {
            margin-top: 20px;
        }

        .calendar-container h3 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Doctor's Settings</h1>
        <div class="profile-header">
            <label for="profile-pic">
                <img id="profile-pic-preview" src="https://via.placeholder.com/150" alt="Profile Picture">
            </label>
            <input type="file" id="profile-pic" onchange="previewImage(event)">
            <button onclick="document.getElementById('profile-pic').click()">Upload Profile Picture</button>
        </div>

        <form id="settings-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" value="Dr. John Doe" />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" value="john.doe@example.com" />
            </div>

            <div class="form-group">
                <label for="specialty">Specialty:</label>
                <input type="text" id="specialty" value="Cardiology" />
            </div>

            <div class="form-group">
                <label for="experience">Experience:</label>
                <input type="text" id="experience" value="10 years" />
            </div>

            <div class="form-group">
                <label for="expertise">Expertise:</label>
                <input type="text" id="expertise" value="Advanced Cardiovascular Care" />
            </div>

            <div class="form-group">
                <label for="availability">Set Availability:</label>
                <input type="date" id="availability-date" />
                <input type="time" id="availability-time" />
            </div>

            <div class="form-group">
                <button type="submit">Save Changes</button>
            </div>
        </form>

        <div class="calendar-container">
            <h3>Availability Calendar</h3>
            <!-- You would need a JavaScript calendar library here, such as FullCalendar -->
            <!-- Example of a static calendar view for illustration -->
            <div>
                <p>Selected Date: <span id="selected-date"></span></p>
                <p>Available Times: <span id="available-times"></span></p>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profile-pic-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>
