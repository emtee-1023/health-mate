<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$res = $conn->query("SELECT p.* FROM patients p JOIN appointments a ON p.patientid = a.patientid WHERE doctorid = $docid  ORDER BY UserID ASC");
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
              <h1 class="m-0">Patients Seen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Patients</li>
              </ol>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Default box -->
          <div class="card">
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>PatientID</th>
                    <th>Patient's Name</th>
                    <th>Gender</th>
                    <th>BMI analysis</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $res->fetch_assoc()) {


                  ?>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['PatientID']; ?></span>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['FName'] . ' ' . $row['LName']; ?></span>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['Sex']; ?></span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['BMIInterpretation']; ?></span>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

        </div>
        <!-- /.container-fluid -->
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

<?php
function eventStatus($status)
{
  if ($status == 0) {
    $output = "<span class='badge badge-danger'>Hidden</span>";
  } elseif ($status == 1) {
    $output = "<span class='badge badge-success'>Visible</span>";
  }

  return $output;
}
?>