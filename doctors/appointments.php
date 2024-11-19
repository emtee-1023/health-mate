<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$res = $conn->query("
    SELECT 
        appointments.AppointmentID, 
        appointments.PatientID, 
        appointments.DoctorID, 
        appointments.AppointmentDate, 
        appointments.ConsultationFee, 
        CONCAT(patients.fname,' ',patients.lname) AS PatientName,
        CONCAT(doctors.fname,' ',doctors.lname) AS DoctorName
    FROM appointments
    LEFT JOIN patients ON appointments.patientid = patients.patientid
    LEFT JOIN doctors ON appointments.DoctorID = doctors.DoctorID
    WHERE appointments.doctorid = $docid
    ORDER BY appointments.AppointmentID ASC
");

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
              <h1 class="m-0">Appointments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Appointments</li>
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
                    <th>Patient's Name</th>
                    <th>Doctor's Name</th>
                    <th>Scheduled Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $res->fetch_assoc()) {


                  ?>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['PatientName']; ?></span>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['DoctorName']; ?></span>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['AppointmentDate']; ?></span>
                        </div>
                      </td>

                      <td class="text-nowrap">
                        <a href="edit-users.php?id=<?php echo $row["PatientID"]; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>

                        <a href="processes.php?delete-event=<?php echo $row["PatientID"]; ?>" class="btn btn-sm btn-danger deleteBtn"><i class="fas fa-trash"></i> Delete</a>
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