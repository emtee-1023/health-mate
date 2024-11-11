<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/header.php"; ?>

  <script>
    function previewImage(event) {
      const file = event.target.files[0];
      const fileType = file['type'];
      const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

      if (!validImageTypes.includes(fileType)) {
        alert("Only image files (jpg, png, gif) are allowed.");
        event.target.value = "";
        document.getElementById('fileName').textContent = "Choose image";
        return;
      }

      if (file.size > 2 * 1024 * 1024) {
        alert("File size must be less than 2MB.");
        event.target.value = "";
        document.getElementById('fileName').textContent = "Choose image";
        return;
      }

      const reader = new FileReader();
      reader.onload = function() {
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
      };
      reader.readAsDataURL(file);


      document.getElementById('fileName').textContent = file.name;
    }
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <?php include "includes/navbar.php"; ?>


    <?php include "includes/sidebar.php"; ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create New Patient Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Add a Patient</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <form class="vstack gap-4" enctype="multipart/form-data" method="post" action="processes.php">
              <div class="card card-primary shadow">
                <div class="card-header">
                  <h3 class="card-title">Provide Patient's Details</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body pb-0">
                  <input type="text" name="userid" value="<?= $userid ?>" hidden>
                  <div class="row g-3">
                    <div class="col-6 mb-3">
                      <label class="form-label">First Name</label>
                      <input class="form-control" type="text" name="fname" placeholder="Enter First Name" required>
                    </div>

                    <div class="col-6 mb-3">
                      <label class="form-label">Last Name</label>
                      <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" required>
                    </div>

                    <div class="col-4 mb-3">
                      <label class="form-label">Date of Birth</label>
                      <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth" required>
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
                    <div class="col-4 mb-3">
                      <label class="form-label">Blood Group</label>
                      <select name="blood-group" class="form-control">
                        <option value="" disabled selected>Choose Blood Group</option>
                        <?php
                        $stmt5 = $conn->prepare('SELECT * FROM blood_groups');
                        $stmt5->execute();
                        $res5 = $stmt5->get_result();

                        while ($row5 = $res5->fetch_assoc()):
                        ?>
                          <option value="<?= $row5['BloodGroupID'] ?>"><?= $row5['BloodGroupName'] ?></option>
                        <?php endwhile; ?>

                      </select>
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">Weight (Kg)</label>
                      <input class="form-control" type="decimal" id="weight" name="weight" placeholder="Enter Weight in Kg">
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">Height (cm)</label>
                      <input class="form-control" type="decimal" id="height" name="height" placeholder="Enter Height in cm">
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">BMI (Body Mass Index)</label>
                      <input class="form-control" type="decimal" id="bmi" name="bmi" placeholder="BMI" readonly>
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">BMI interpretation</label>
                      <input class="form-control" type="text" id="bmi-res" name="bmi-res" placeholder="BMI Interpretation" readonly>
                    </div>
                  </div>
                </div>
                <div class="card-footer pt-0">
                  <div class="text-end">
                    <button type="submit" name="add-patient" class="btn btn-primary mb-0 submitButton">Submit</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
        <!-- Cab Detail END -->


        <!-- Button -->

    </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "includes/footer.php"; ?>

  </div>
  <!-- ./wrapper -->

  <?php include "includes/scripts.php"; ?>
</body>

</html>