<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$sid = $_GET['id'];
$res=$conn->query("SELECT * FROM service WHERE service_id='$sid' ORDER BY service_id DESC");
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
            <h1>Edit Service </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Service Edit</li>
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
              <h3 class="card-title">Enter service details</h3>

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
                <label for="inputName">Service Name</label>
                <input type="text" id="inputName" name="name" value="<?php echo $row['name'];?>" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="inputDescription">Short Description </label>
                <textarea id="inputDescription" class="form-control" name="sdesc" rows="4" required><?php echo $row['short_desc'];?></textarea>
              </div>


              <div class="form-group">
                <label for="summernote2">Detailed Description</label>
                <textarea id="summernote2" class="form-control" name="ldesc" rows="4" required><?php echo $row['long_desc'];?></textarea>
              </div>

              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select" name="status" required>
                <option <?php if($row['status'] == 1){echo "selected";}?> value="1">Active</option>
                <option <?php if($row['status'] == 2){echo "selected";}?> value="2">Inactive</option>
                </select>
            </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" value="Update Service" name="edit-service" class="btn btn-success float-right mr-3">
                </form>
            </div>
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Package image</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="processes.php" enctype="multipart/form-data">
                           <input type="hidden" name="edit-srv-img" value="<?php echo $sid;?>" >
                        <div>
                            <img src="../uploads/<?php echo $row['image'];?>" style="max-width: 400px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Choose image (Preferred ratio: 1:1)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photos" onchange="this.form.submit();" id="exampleInputFile">
                                    <label class="custom-file-label"  for="exampleInputFile">Choose image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </form>
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
