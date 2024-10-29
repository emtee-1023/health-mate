<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Mate Sign Up</title>
    <style>
        /* Primary Color Variables */
        :root {
            --primary-color: #218838;
            --primary-hover-color: #218838;
            --white-color: #ffffff;
            --form-background: #f8f9fa;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--form-background);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: var(--white-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .signup-container h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 20px;
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
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: var(--primary-color);
            color: var(--white-color);
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: var(--primary-hover-color);
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Create Your Health Mate Account</h2>
        <form action="user-register.php" method="post">
            <div class="form-group">
                <label for="role">Sign Up As</label>
                <select id="role" name="role" required>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                    <option value="nurse">Nurse</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input type="submit" value="sign up" class="btn">
        </form>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function () {
            const adminPasscodeField = document.getElementById('admin-passcode');
            if (this.value === 'admin') {
                adminPasscodeField.classList.remove('hidden');
            } else {
                adminPasscodeField.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
