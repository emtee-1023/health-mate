<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$res = $conn->query("SELECT * FROM prescriptions WHERE DoctorID = $docid");
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
              <h1 class="m-0">Prescriptions By You</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Prescriptions</li>
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
                <a href="new-prescription.php" class="btn btn-primary bg-gradient-primary"><i class="fa fa-plus"></i> Create New Prescription</a>
              </div>
            </div>
            <div class="card-body">

              <div class="card card-warning card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">All Prescriptions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Approved</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Pending</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Cancelled</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Prescription Number</th>
                            <th>Patient Name</th>
                            <th>Date Prescribed</th>
                            <th>Date Approved</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $pstmt = "SELECT p.*, CONCAT(p1.fname,' ',p1.lname) AS patientname FROM prescriptions p LEFT JOIN patients p1 ON p1.patientid=p.patientid WHERE doctorid = $docid ORDER BY p.createdat DESC";
                          $pres = $conn->query($pstmt);
                          if ($pres->num_rows == 0) {
                            echo '<tr>
                                  <td class="text-center" colspan=9>No prescriptions to display!</td>
                                  <tr/>';
                          } else {
                            while ($prow = $pres->fetch_assoc()) {


                              if ($prow["ApprovalStatus"] == 0) {
                                $status = '<span class="badge badge-info">Pending</span>';
                              } elseif ($prow["ApprovalStatus"] == 1) {
                                $status = '<span class="badge badge-success">Approved</span>';
                              } elseif ($prow["ApprovalStatus"] == 2) {
                                $status = '<span class="badge badge-danger">Cancelled</span>';
                              }
                          ?>
                              <tr>
                                <td>PRESC/<?php echo $prow["PrescriptionID"]; ?></td>
                                <td><?php echo $prow["patientname"] ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["CreatedAt"])); ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["ApprovedAt"])); ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                  <a href="prescription-details.php?presc=<?php echo $prow["PrescriptionID"]; ?>" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-ord"><i class="fa fa-search"></i>View</a>

                                  <!-- <a href="processes.php?complete=<?php echo $prow["order_id"]; ?>" class="btn btn-xs btn-success"><i class="fas fa-check-circle"></i> Complete</a> -->

                                  <a href="processes.php?cancel=<?php echo $prow["PrescriptionID"]; ?>" onClick="return confirm('Are you sure you want to cancel prescription?');" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
                                </td>
                              </tr>
                          <?php }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Prescription Number</th>
                            <th>Patient Name</th>
                            <th>Date Prescribed</th>
                            <th>Date Approved</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $pstmt = "SELECT p.*, CONCAT(p1.fname,' ',p1.lname) AS patientname FROM prescriptions p JOIN patients p1 ON p1.patientid=p.patientid WHERE ApprovalStatus = 1 AND doctorid = $docid ORDER BY p.createdat DESC";
                          $pres = $conn->query($pstmt);
                          if ($pres->num_rows == 0) {
                            echo '<tr>
                                  <td class="text-center" colspan=9>No approved prescriptions to display!</td>
                                  <tr/>';
                          } else {
                            while ($prow = $pres->fetch_assoc()) {


                              if ($prow["ApprovalStatus"] == 0) {
                                $status = '<span class="badge badge-info">Pending</span>';
                              } elseif ($prow["ApprovalStatus"] == 1) {
                                $status = '<span class="badge badge-success">Approved</span>';
                              } elseif ($prow["ApprovalStatus"] == 2) {
                                $status = '<span class="badge badge-danger">Cancelled</span>';
                              }
                          ?>
                              <tr>
                                <td>PRESC/<?php echo $prow["PrescriptionID"]; ?></td>
                                <td><?php echo $prow["patientname"] ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["CreatedAt"])); ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["ApprovedAt"])); ?></td>
                                <td>
                                  <a href="prescription-details.php?presc=<?php echo $prow["PrescriptionID"]; ?>" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-ord"><i class="fa fa-search"></i>View</a>

                                  <!-- <a href="processes.php?complete=<?php echo $prow["order_id"]; ?>" class="btn btn-xs btn-success"><i class="fas fa-check-circle"></i> Complete</a> -->

                                  <a href="processes.php?cancel=<?php echo $prow["PrescriptionID"]; ?>" onClick="return confirm('Are you sure you want to cancel prescription?');" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
                                </td>
                              </tr>
                          <?php }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Prescription Number</th>
                            <th>Patient Name</th>
                            <th>Date Prescribed</th>
                            <th>Date Approved</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $pstmt = "SELECT p.*, CONCAT(p1.fname,' ',p1.lname) AS patientname FROM prescriptions p JOIN patients p1 ON p1.patientid=p.patientid WHERE ApprovalStatus = 0  AND doctorid = $docid ORDER BY p.createdat DESC";
                          $pres = $conn->query($pstmt);
                          if ($pres->num_rows == 0) {
                            echo '<tr>
                                  <td class="text-center" colspan=9>No pending prescriptions to display!</td>
                                  <tr/>';
                          } else {
                            while ($prow = $pres->fetch_assoc()) {


                              if ($prow["ApprovalStatus"] == 0) {
                                $status = '<span class="badge badge-info">Pending</span>';
                              } elseif ($prow["ApprovalStatus"] == 1) {
                                $status = '<span class="badge badge-success">Approved</span>';
                              } elseif ($prow["ApprovalStatus"] == 2) {
                                $status = '<span class="badge badge-danger">Cancelled</span>';
                              }
                          ?>
                              <tr>
                                <td>PRESC/<?php echo $prow["PrescriptionID"]; ?></td>
                                <td><?php echo $prow["patientname"] ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["CreatedAt"])); ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["ApprovedAt"])); ?></td>
                                <td>
                                  <a href="prescription-details.php?presc=<?php echo $prow["PrescriptionID"]; ?>" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-ord"><i class="fa fa-search"></i>View</a>

                                  <!-- <a href="processes.php?complete=<?php echo $prow["order_id"]; ?>" class="btn btn-xs btn-success"><i class="fas fa-check-circle"></i> Complete</a> -->

                                  <a href="processes.php?cancel=<?php echo $prow["PrescriptionID"]; ?>" onClick="return confirm('Are you sure you want to cancel prescription?');" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
                                </td>
                              </tr>
                          <?php }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Prescription Number</th>
                            <th>Patient Name</th>
                            <th>Date Prescribed</th>
                            <th>Date Approved</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $pstmt = "SELECT p.*, CONCAT(p1.fname,' ',p1.lname) AS patientname FROM prescriptions p JOIN patients p1 ON p1.patientid=p.patientid WHERE ApprovalStatus = 2  AND doctorid = $docid ORDER BY p.createdat DESC";
                          $pres = $conn->query($pstmt);
                          if ($pres->num_rows == 0) {
                            echo '<tr>
                                  <td class="text-center" colspan=9>No cancelled prescriptions to display!</td>
                                  <tr/>';
                          } else {
                            while ($prow = $pres->fetch_assoc()) {


                              if ($prow["ApprovalStatus"] == 0) {
                                $status = '<span class="badge badge-info">Pending</span>';
                              } elseif ($prow["ApprovalStatus"] == 1) {
                                $status = '<span class="badge badge-success">Approved</span>';
                              } elseif ($prow["ApprovalStatus"] == 2) {
                                $status = '<span class="badge badge-danger">Cancelled</span>';
                              }
                          ?>
                              <tr>
                                <td>PRESC/<?php echo $prow["PrescriptionID"]; ?></td>
                                <td><?php echo $prow["patientname"] ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["CreatedAt"])); ?></td>
                                <td><?php echo date('Y-M-d H:i', strtotime($prow["ApprovedAt"])); ?></td>
                                <td>
                                  <a href="prescription-details.php?presc=<?php echo $prow["PrescriptionID"]; ?>" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-ord"><i class="fa fa-search"></i>View</a>

                                  <!-- <a href="processes.php?complete=<?php echo $prow["order_id"]; ?>" class="btn btn-xs btn-success"><i class="fas fa-check-circle"></i> Complete</a> -->

                                  <a href="processes.php?cancel=<?php echo $prow["PrescriptionID"]; ?>" onClick="return confirm('Are you sure you want to cancel prescription?');" class="btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
                                </td>
                              </tr>
                          <?php }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "ordering": true,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.view_ord').click(function() {
        var ord_id = $(this).attr("id");
        $.ajax({
          url: "order_row.php",
          method: "POST",
          data: {
            ord_id: ord_id
          },
          success: function(data) {
            $('#odetails').html(data);
            $('#dataModal').modal("show");
          }
        });
      });
    });
  </script>
</body>

</html>

<?php
function blogStatus($status)
{
  if ($status == 1) {
    $output = "<span class='badge badge-success'>Active</span>";
  } elseif ($status == 2) {
    $output = "<span class='badge badge-warning'>Inactive</span>";
  }

  return $output;
}
?>