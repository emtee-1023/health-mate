<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$patientID = $_GET['id'];

$stmt1 = $conn->prepare('SELECT p.*, b.bloodgroupname FROM patients p LEFT JOIN blood_groups b ON p.bloodgroupid = b.bloodgroupid WHERE PatientID = ? ORDER BY CreatedAt ASC');
$stmt1->bind_param('i', $patientID);
$stmt1->execute();
$res = $stmt1->get_result();
$row = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/header.php"; ?>
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
              <h1>Edit Patient's Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Patient's Details</li>
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
                  <input type="text" name="patientid" value="<?= $patientID ?>" hidden>
                  <div class="row g-3">
                    <div class="col-6 mb-3">
                      <label class="form-label">First Name</label>
                      <input class="form-control" type="text" name="fname" placeholder="Enter First Name" value="<?= $row['FName'] ?>" required>
                    </div>

                    <div class="col-6 mb-3">
                      <label class="form-label">Last Name</label>
                      <input class="form-control" type="text" name="lname" placeholder="Enter Last Name" value="<?= $row['LName'] ?>" required>
                    </div>

                    <div class="col-4 mb-3">
                      <label class="form-label">Date of Birth</label>
                      <input class="form-control" type="date" name="dob" placeholder="Enter Date of Birth" value="<?= $row['DOB'] ?>" required>
                    </div>

                    <div class="col-4 mb-3">
                      <label class="form-label">Gender</label>
                      <select name="sex" class="form-control" required>
                        <option value="" disabled>Choose Gender</option>
                        <option value="male" <?= ($row['Sex'] == 'male') ? 'selected' : '' ?>>Male</option>
                        <option value="female" <?= ($row['Sex'] == 'female') ? 'selected' : '' ?>>Female</option>
                        <option value="intersex" <?= ($row['Sex'] == 'intersex') ? 'selected' : '' ?>>Intersex</option>
                      </select>
                    </div>
                    <div class="col-4 mb-3">
                      <label class="form-label">Blood Group</label>
                      <select name="blood-group" class="form-control">
                        <option value="" disabled>Choose Blood Group</option>
                        <?php
                        $stmt5 = $conn->prepare('SELECT * FROM blood_groups');
                        $stmt5->execute();
                        $res5 = $stmt5->get_result();

                        while ($row5 = $res5->fetch_assoc()):
                        ?>
                          <option value="<?= $row5['BloodGroupID'] ?>" <?= ($row['BloodGroupID'] == $row5['BloodGroupID']) ? 'selected' : '' ?>>
                            <?= $row5['BloodGroupName'] ?>
                          </option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">Weight (Kg)</label>
                      <input class="form-control" type="decimal" id="weight" name="weight" value="<?= $row['Weight'] ?>" placeholder="Enter Weight in Kg">
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">Height (cm)</label>
                      <input class="form-control" type="decimal" id="height" name="height" value="<?= $row['Height'] ?>" placeholder="Enter Height in cm">
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">BMI (Body Mass Index)</label>
                      <input class="form-control" type="decimal" id="bmi" name="bmi" placeholder="BMI" value="<?= $row['BMI'] ?>" readonly>
                    </div>
                    <div class="col-3 mb-3">
                      <label class="form-label">BMI interpretation</label>
                      <input class="form-control" type="text" id="bmi-res" name="bmi-res" placeholder="BMI Interpretation" value="<?= $row['BMIInterpretation'] ?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="card-footer pt-0">
                  <div class="text-end">
                    <button type="submit" name="edit-patient" class="btn btn-primary mb-0 submitButton">Edit</button>
                  </div>
                </div>
            </form>
          </div>
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