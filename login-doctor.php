<?php
include 'includes/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $license = mysqli_real_escape_string($conn, $_POST['license']);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert doctor data into the doctors table
    $sql = "INSERT INTO doctors (Fname, Lname, Email, Password, Specialization, LicenseNumber) 
            VALUES ('$fname', '$lname', '$email', '$hashedPassword', '$specialization', '$license')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful! Please login.'); window.location.href = 'login.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Registration</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Doctor Registration</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" class="form-control" id="specialization" name="specialization" required>
        </div>
        <div class="form-group">
            <label for="license">License Number:</label>
            <input type="text" class="form-control" id="license" name="license" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Register</button>
    </form>
</div>
</body>
</html>
