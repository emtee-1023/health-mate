<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$stmt1 = $conn->prepare('SELECT p.*, b.bloodgroupname FROM patients p LEFT JOIN blood_groups b ON p.bloodgroupid = b.bloodgroupid WHERE UserID = ? ORDER BY CreatedAt ASC');
$stmt1->bind_param('i', $userid);
$stmt1->execute();
$res1 = $stmt1->get_result();

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
              <h1 class="m-0">Your Patient Profiles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Patient Profiles</li>
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
            <div class="card-header">
              <div class="card-tools">
                <a href="new-patient.php" class="btn btn-primary bg-gradient-primary"><i class="fa fa-plus"></i> Create New Patient Profile</a>
              </div>
            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>Patient's Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>BMI</th>
                    <th>Last Appointment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $res1->fetch_assoc()) {


                  ?>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <img class="rounded-circle" src="../uploads/defaultpfp.jpg" alt="profile" style="height: 50px;">
                          <span class="ml-2"><?php echo $row['FName'] . ' ' . $row['LName']; ?></span>
                        </div>
                      </td>
                      <td><?php echo $row["Sex"]; ?></td>
                      <td><?php echo (new DateTime())->diff(new DateTime($row['DOB']))->y; ?></td>
                      <td><?php echo $row["bloodgroupname"]; ?></td>
                      <td><?php echo $row["Weight"] . ' Kg'; ?></td>
                      <td><?php echo $row["Height"] . ' Cm'; ?></td>
                      <td><?php echo $row["BMI"]; ?></td>
                      <td><?php echo ($row['LastAppointment'] != NULL) ? date('D d M Y \a\t h.iA', strtotime($row['LastAppointment'])) : 'Not yet Seen'; ?></td>

                      <td class="text-nowrap">
                        <a href="edit-patient.php?id=<?php echo $row["PatientID"]; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
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
function doctorStatus($status)
{
  if ($status == 0) {
    $output = "<span class='badge badge-danger'>Unverified</span>";
  } elseif ($status == 1) {
    $output = "<span class='badge badge-success'>Verified</span>";
  }

  return $output;
}
?>