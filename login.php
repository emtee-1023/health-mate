<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealthMate | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body>
    <div class="container">
        <div class="container col-lg-9 shadow-lg rounded">
            <div class="content">
                <div class="row text-center justify-content-center mt-5">
                    <h1 class="fw-bold">Login</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card card-primary card-outline mt-5">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Select Login Method</h5>
                                </div>
                                <form action="user-login.php" method="post">
                                    <div class="form-group">
                                        <label for="role" class="col-xl-3 col-form-label text-center">Login As</label>
                                        <select id="role" name="role" required onchange="showForm()" class="col-xl-8 col-form-label">
                                            <option value="" disabled selected>Choose Login Method</option>
                                            <option value="user">Login as a User</option>
                                            <option value="doctor">Login as a Doctor</option>
                                            <option value="nurse">Login as a Nurse</option>
                                            <option value="pharmacist">Login as a Pharmacist</option>
                                            <option value="admin">Login as an Admin</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Different forms for each role -->
            <div id="userForm" class="role-form" style="display: none;">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="card card-primary card-outline mt-5">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">User Login</h5>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="processes.php">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-xl-4 col-form-label">Email / Phone Number</label>
                                                <div class="col-xl-8">
                                                    <input type="text" name="email-or-number" class="form-control" id="inputEmail3" placeholder="Email / Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-xl-4 col-form-label">Password</label>
                                                <div class="col-xl-8">
                                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <button type="submit" name="user-login" class="btn btn-primary float-right">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="doctorForm" class="role-form" style="display: none;">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="card card-primary card-outline mt-5">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Doctor Login</h5>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="processes.php">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-xl-4 col-form-label">Email / Phone Number</label>
                                                <div class="col-xl-8">
                                                    <input type="text" name="email-or-number" class="form-control" id="inputEmail3" placeholder="Email / Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-xl-4 col-form-label">Password</label>
                                                <div class="col-xl-8">
                                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <button type="submit" name="doctor-login" class="btn btn-primary float-right">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="nurseForm" class="role-form" style="display: none;">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="card card-primary card-outline mt-5">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Nurse Login</h5>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="processes.php">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-xl-4 col-form-label">Email / Phone Number</label>
                                                <div class="col-xl-8">
                                                    <input type="text" name="email-or-number" class="form-control" id="inputEmail3" placeholder="Email / Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-xl-4 col-form-label">Password</label>
                                                <div class="col-xl-8">
                                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <button type="submit" name="nurse-login" class="btn btn-primary float-right">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="adminForm" class="role-form" style="display: none;">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="card card-primary card-outline mt-5">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Admin Login</h5>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="processes.php">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-xl-4 col-form-label">Email / Phone Number</label>
                                                <div class="col-xl-8">
                                                    <input type="text" name="email-or-number" class="form-control" id="inputEmail3" placeholder="Email / Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-xl-4 col-form-label">Password</label>
                                                <div class="col-xl-8">
                                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <button type="submit" name="admin-login" class="btn btn-primary float-right">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pharmacistForm" class="role-form" style="display: none;">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="card card-primary card-outline mt-5">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Pharmacist Login</h5>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="processes.php">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-xl-4 col-form-label">Email / Phone Number</label>
                                                <div class="col-xl-8">
                                                    <input type="text" name="email-or-number" class="form-control" id="inputEmail3" placeholder="Email / Phone Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-xl-4 col-form-label">Password</label>
                                                <div class="col-xl-8">
                                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <button type="submit" name="pharmacist-login" class="btn btn-primary float-right">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center justify-content-center mt-5">
                <p class="fw-bold"><a href="register.php">don't have an account? signup</a></p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="../plugins/toastr/toastr.min.js"></script>

    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <script>
            // Display an informational Toastr notification
            toastr.success("<?php echo $_SESSION['success']; ?>", "Success");
        </script>
    <?php
        unset($_SESSION['success']);
    }
    ?>
    <?php
    if (isset($_SESSION['error'])) {
    ?>
        <script>
            // Display an informational Toastr notification
            toastr.danger("<?php echo $_SESSION['error']; ?>", "Error");
        </script>
    <?php
        unset($_SESSION['error']);
    }
    ?>

    <script>
        function showForm() {
            // Hide all role forms
            document.querySelectorAll('.role-form').forEach(form => form.style.display = 'none');

            // Get the selected role
            const role = document.getElementById('role').value;

            // Show the selected role form
            const formId = role + 'Form';
            const formToShow = document.getElementById(formId);

            if (formToShow) {
                formToShow.style.display = 'block';
            }
        }
    </script>

</body>

</html>