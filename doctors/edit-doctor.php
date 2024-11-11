<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$pkid = $_GET['id'];

$res=$conn->query("SELECT * FROM doctors WHERE DoctorID='$pkid'");
$row = $res->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include "includes/header.php";?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    <?php include "includes/navbar.php";?>


    <?php include "includes/sidebar.php";?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Doctor Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Doctor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Enter Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form method="post" action="processes.php" enctype="multipart/form-data">
                
            <input type="hidden" name="rid" value="<?php echo $pkid;?>" >

              <div class="form-group">
                <label for="inputName">Doctor Name</label>
                <input disabled type="text" id="inputName" name="name"  value="<?php echo $row['DoctorName'];?>"  class="form-control" required>
              </div>


              <div class="form-group">
                    <label for="summernote2">Specialization</label>
                    <input disabled id="inputName" class="form-control" name="specialization" value="<?php echo $row['Specialization'];?>" required>
                </div>
               
                <div class="form-group col-md-6">
                <label for="inputStatus">Verification Status</label>
                <select id="inputStatus" class="form-control custom-select" name="status" required>
                <option <?php if($row['verificationStatus'] == 0){echo "selected";}?> value="0">Unverifired</option>
                <option <?php if($row['verificationStatus'] == 1){echo "selected";}?> value="1">Verified</option>
                </select>
                </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" value="Save Changes" name="edit-doctor" class="btn btn-success float-right mr-3">
                </form>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include "includes/footer.php";?>
 
</div>
<!-- ./wrapper -->

<?php include "includes/scripts.php";?>
</body>
</html>
