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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create new Prescription</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Add Prescription</li>
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
              <!-- Cab Detail START -->
              <div class="card card-primary shadow">
                <div class="card-header">
                  <h3 class="card-title">Enter Prescription Details</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="row g-3">
                    <!-- Car name -->
                    <div class="col-12 mb-3">
                      <label class="form-label">Choose Patient</label>
                      <select name="patientid" id="pid" class="form-control">
                        <option value="" disabled selected>Choose a patient</option>
                        <?php
                        $stmt1 = $conn->prepare('SELECT patientid, CONCAT(FName," ",LName) AS patientname FROM patients Order By fname DESC');
                        $stmt1->execute();
                        $res1 = $stmt1->get_result();
                        while ($row = $res1->fetch_assoc()):
                        ?>
                          <option value="<?= $row['patientid'] ?>"><?= $row['patientname'] ?></option>
                        <?php endwhile ?>
                      </select>
                    </div>

                    <input type="text" name="docid" value="<?= $docid ?>" hidden>

                    <div class="col-12">
                      <label class="form-label">Prescription Details</label>
                      <textarea class="form-control" rows="2" name="prescription" placeholder="Enter Prescription" id="summernote"></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-end">
                    <button type="submit" name="add-prescription" class="btn btn-primary mb-0">Add Prescription</button>
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