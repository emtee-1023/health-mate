<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$res = $conn->query("SELECT * FROM doctors");
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
              <h1 class="m-0">Our Doctors</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Doctors</li>
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
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Last Login</th>
                    <th>Qualification Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if ($res && $res->num_rows > 0): ?>
                  <?php while ($row = $res->fetch_assoc()):
                  ?>
                    <tr>
                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo $row['DoctorID']; ?></span>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <?php echo $row["FName"] . ' ' . $row["LName"]; ?>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <?php echo $row["PhoneNum"]; ?>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex">
                          <?php echo $row["Email"]; ?>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <span class="ml-2"><?php echo date('D d M Y \a\t h.iA', strtotime($row['LastLogin'])); ?></span>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex">
                          <?php echo doctorStatus($row["QualiStatus"]); ?>
                        </div>
                      </td>

                      <td class="text-nowrap">
                        <a href="edit-doctor.php?id=<?php echo $row["DoctorID"]; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>

                        <a href="processes.php?delete-event=<?php echo $row["DoctorID"]; ?>" class="btn btn-sm btn-danger deleteBtn"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  <?php endwhile ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="8">No doctors found.</td>
                    </tr>
                  <?php endif; ?>
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
    $output = "<span class='badge badge-danger'>UnAuthorized</span>";
  } elseif ($status == 1) {
    $output = "<span class='badge badge-success'>Authorized</span>";
  }

  return $output;
}
?>