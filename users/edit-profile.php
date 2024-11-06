<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$sid = $_GET['id'];
$res=$conn->query("SELECT * FROM profile WHERE profile_id='$sid' ");
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
            <h1>Edit Testimonial </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Testimonial Edit</li>
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
              <h3 class="card-title">Enter details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form method="post" action="processes.php" enctype="multipart/form-data">
            <input type="hidden" name="sid" value="<?php echo $sid;?>" >
              <div class="form-group">
                <label for="inputName">Beneficiary Name</label>
                <input type="text" id="inputName" name="name" value="<?php echo $row['name'];?>" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="">Testimonial</label>
                <textarea id="" class="form-control" name="desc" rows="4" required><?php echo $row['description'];?></textarea>
              </div>

              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select" name="status" required>
                <option <?php if($row['status'] == 1){echo "selected";}?> value="1">Visible</option>
                <option <?php if($row['status'] == 2){echo "selected";}?> value="2">Hidden</option>
                </select>
            </div>

              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" value="Update Testimonial" name="edit-prof" class="btn btn-success float-right mr-3">
                </form>
            </div>
          </div>
          <!-- /.card -->
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
