<?php
session_start();
require('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealthMate | Register</title>

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
    <div class="container col-lg-9 shadow-lg rounded">
        <div class="content">

            <div class="row text-center justify-content-center mt-5">
                <h1 class="fw-bold">SIGN UP</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card card-primary card-outline mt-5">
                        <div class="card-header">
                            <h5 class="card-title m-0">Select Registration Method</h5>
                        </div>
                        <form action="user-login.php" method="post">
                            <div class="form-group">
                                <label for="role" class="col-xl-3 col-form-label text-center">Register As</label>
                                <select id="role" name="role" required onchange="showForm()" class="col-xl-8 col-form-label">
                                    <option value="" disabled selected>Choose Registration Method</option>
                                    <option value="user">Register as a User</option>
                                    <option value="doctor">Apply as a Doctor</option>
                                    <!-- <option value="nurse">Apply as a Nurse</option> -->
                                    <option value="pharmacist">Apply as a Pharmacist</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Different forms for each role -->
        <div id="userForm" class="role-form" style="display: none;">
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form class="vstack gap-4" enctype="multipart/form-data" method="post" action="processes.php">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h3 class="card-title">Provide User Details</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row g-3">
                                        <div class="col-4 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="fname" placeholder="Enter First Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth" required>
                                        </div>

                                        <!--
                                    <div class="col-12">
                                        <label class="form-label">Long Description (50 Words)</label>
                                        <textarea class="form-control" rows="6" name="ldesc" placeholder="Enter Description"></textarea>
                                    </div>-->

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter Email Address" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone-number" placeholder="Enter Phone Number" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="sex" class="form-control" required>
                                                <option value="" disabled selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="intersex">Intersex</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control pass" type="password" placeholder="Enter Password" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control confirmPass" type="password" name="password" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="passwordFeedback" style="color: red; display: none;">Passwords do not match.</p>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Enable Two Factor Authentication</label>
                                            <input type="checkbox" name="_2fa">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0">
                                    <div class="text-end">
                                        <button type="submit" name="add-user" class="btn btn-primary mb-0 submitButton" disabled>Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div id="doctorForm" class="role-form" style="display: none;">
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form class="vstack gap-4" enctype="multipart/form-data" method="post" action="processes.php">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h3 class="card-title">Submit Doctor's Application</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row g-3">
                                        <div class="col-4 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="fname" placeholder="Enter First Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth" required>
                                        </div>

                                        <!--
                                    <div class="col-12">
                                        <label class="form-label">Long Description (50 Words)</label>
                                        <textarea class="form-control" rows="6" name="ldesc" placeholder="Enter Description"></textarea>
                                    </div>-->

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter Email Address" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone-number" placeholder="Enter Phone Number" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="sex" class="form-control" required>
                                                <option value="" disabled selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="intersex">Intersex</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control pass" type="password" placeholder="Enter Password" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control confirmPass" type="password" name="password" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="passwordFeedback" style="color: red; display: none;">Passwords do not match.</p>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" rows="6" name="bio" placeholder="Enter Bio"></textarea>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Upload Medical Certificate (PDF)</label>
                                            <input class="form-control" type="file" name='medCert' accept=".pdf, .jpg, .png" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Choose Specialization Clinic</label>
                                            <select class="form-control" name="clinic" id="clinic">
                                                <option value="" disabled selected>Choose area of Specialization</option>
                                                <?php
                                                $stmt6 = $conn->prepare('SELECT * FROM clinics ORDER BY ClinicID ASC');
                                                $stmt6->execute();
                                                $res6 = $stmt6->get_result();
                                                while ($row = $res6->fetch_assoc()):
                                                ?>
                                                    <option value="<?= $row['ClinicID'] ?>"><?= $row['ClinicName'] ?></option>
                                                <?php endwhile ?>
                                            </select>
                                            <input class="" type="checkbox" name="_2fa" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0">
                                    <div class="text-end">
                                        <button type="submit" name="doctor-apply" class="btn btn-primary mb-0 submitButton" disabled>Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div id="nurseForm" class="role-form" style="display: none;">
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form class="vstack gap-4" enctype="multipart/form-data" method="post" action="processes.php">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h3 class="card-title">Submit Nurse's Application</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row g-3">
                                        <div class="col-4 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="fname" placeholder="Enter First Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth" required>
                                        </div>

                                        <!--
                                    <div class="col-12">
                                        <label class="form-label">Long Description (50 Words)</label>
                                        <textarea class="form-control" rows="6" name="ldesc" placeholder="Enter Description"></textarea>
                                    </div>-->

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter Email Address" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone-number" placeholder="Enter Phone Number" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="sex" class="form-control" required>
                                                <option value="" disabled selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="intersex">Intersex</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control pass" type="password" placeholder="Enter Password" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control confirmPass" type="password" name="password" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="passwordFeedback" style="color: red; display: none;">Passwords do not match.</p>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" rows="6" name="bio" placeholder="Enter Bio"></textarea>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Upload Medical Certificate (PDF)</label>
                                            <input class="form-control" type="file" name="medCert" accept=".pdf, .jpg, .png" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Enable Two Factor Authentication</label>
                                            <input type="checkbox" name="_2fa">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0">
                                    <div class="text-end">
                                        <button type="submit" name="nurse-apply" class="btn btn-primary mb-0 submitButton" disabled>Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div id="pharmacistForm" class="role-form" style="display: none;">
            <section class="content">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <form class="vstack gap-4" enctype="multipart/form-data" method="post" action="processes.php">
                            <div class="card card-primary shadow">
                                <div class="card-header">
                                    <h3 class="card-title">Submit Pharmacist's Application</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row g-3">
                                        <div class="col-4 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="fname" placeholder="Enter First Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth" required>
                                        </div>

                                        <!--
                                    <div class="col-12">
                                        <label class="form-label">Long Description (50 Words)</label>
                                        <textarea class="form-control" rows="6" name="ldesc" placeholder="Enter Description"></textarea>
                                    </div>-->

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter Email Address" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone-number" placeholder="Enter Phone Number" required>
                                        </div>

                                        <div class="col-4 mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="sex" class="form-control" required>
                                                <option value="" disabled selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="intersex">Intersex</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control pass" type="password" placeholder="Enter Password" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control confirmPass" type="password" name="password" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <p class="passwordFeedback" style="color: red; display: none;">Passwords do not match.</p>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" rows="6" name="bio" placeholder="Enter Bio"></textarea>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Upload Medical Certificate (PDF)</label>
                                            <input class="form-control" type="file" name="medCert" accept=".pdf, .jpg, .png" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label class="form-label">Enable Two Factor Authentication</label>
                                            <input type="checkbox" name="_2fa">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0">
                                    <div class="text-end">
                                        <button type="submit" name="pharmacist-apply" class="btn btn-primary mb-0 submitButton" disabled>Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="row text-center justify-content-center mt-5">
            <p class="fw-bold"><a href="login.php">already have an account? login</a></p>
        </div>

    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Select all forms on the page
            const forms = document.querySelectorAll('form');

            // Loop through each form to add event listeners
            forms.forEach(form => {
                const pass = form.querySelector('.pass');
                const confirmPassword = form.querySelector('.confirmPass');
                const submitButton = form.querySelector('.submitButton');
                const feedback = form.querySelector('.passwordFeedback');

                // Ensure all necessary elements are present before adding event listeners
                if (pass && confirmPassword && submitButton && feedback) {
                    function checkPasswordsMatch() {
                        if (pass.value && confirmPassword.value) {
                            if (pass.value === confirmPassword.value) {
                                submitButton.disabled = false;
                                feedback.style.display = 'none';
                            } else {
                                submitButton.disabled = true;
                                feedback.style.display = 'block';
                                feedback.textContent = 'Passwords do not match.';
                            }
                        } else {
                            submitButton.disabled = true;
                            feedback.style.display = 'none';
                        }
                    }

                    // Attach input listeners to password fields
                    pass.addEventListener('input', checkPasswordsMatch);
                    confirmPassword.addEventListener('input', checkPasswordsMatch);
                }
            });
        });

        function showForm() {
            // Hide all role forms
            document.querySelectorAll('.role-form').forEach(form => {
                form.style.display = 'none';
                // Reset form fields and feedback when hiding
                form.querySelectorAll('input').forEach(input => input.value = '');
                const feedback = form.querySelector('.passwordFeedback');
                if (feedback) feedback.style.display = 'none';
            });

            // Show the selected form
            const role = document.getElementById('role').value;
            const formToShow = document.getElementById(role + 'Form');
            if (formToShow) {
                formToShow.style.display = 'block';
            }
        }
    </script>

</body>

</html>