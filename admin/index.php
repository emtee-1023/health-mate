<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";


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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Welcome Back <?= $_SESSION['fname'] ?></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <!-- /.row -->
          <!-- Main row -->
          <div class="row ">
            <div class="col-sm-6 mx-auto text-center">
              <p>Analytics</p>
            </div>
          </div>
          <div class="container mt-5">
            <div class="row">
              <!-- Total Appointments -->
              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Users</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT COUNT(*) AS total FROM users");
                      $row = $result->fetch_assoc();
                      echo $row['total'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Number of Users on the system</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Patients</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT COUNT(*) AS total FROM patients");
                      $row = $result->fetch_assoc();
                      echo $row['total'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Number of Patients on the system</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Applied Doctors</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT COUNT(*) AS total FROM doctors");
                      $row = $result->fetch_assoc();
                      echo $row['total'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Total Number of Doctors by doctors</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Authorized Doctors</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT COUNT(*) AS total FROM doctors WHERE QualiStatus  = 1");
                      $row = $result->fetch_assoc();
                      echo $row['total'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Total Number of Approved Doctors</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Patient Profiles</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT COUNT(*) AS total FROM patients");
                      $row = $result->fetch_assoc();
                      echo $row['total'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Total Patient Profiles</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Drugs Sold</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT SUM(MedicineID) AS TotalSold FROM pharmacy_purchases;");
                      $row = $result->fetch_assoc();
                      echo $row['TotalSold'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Total Drugs Sold from E-Pharma</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Total Appointments Booked</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php
                      // Example PHP query to get total appointments
                      $result = $conn->query("SELECT SUM(AppointmentID) AS TotalAppointments FROM appointments;");
                      $row = $result->fetch_assoc();
                      echo $row['TotalAppointments'] ?? 0; // Display total or 0 if null
                      ?>
                    </h5>
                    <p class="card-text">Total Appointments on D.O.C</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
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