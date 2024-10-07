<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$pkid = $_GET['id'];

$res=$conn->query("SELECT * FROM projects p WHERE p.project_id='$pkid'");
$row = $res->fetch_assoc();

$imgres = $conn->query("SELECT * FROM `event_gallery` WHERE event_id='$pkid'");

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
            <h1>Edit Project </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
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
                <label for="inputName">Name/Title</label>
                <input type="text" id="inputName" name="name"  value="<?php echo $row['project_name'];?>"  class="form-control" required>
              </div>


              <div class="form-group">
                    <label for="summernote2">About Project</label>
                    <textarea id="summernote2" class="form-control" name="desc" rows="5" required><?php echo $row['about_project'];?></textarea>
                </div>


              <div class="row">
              
                <div class="form-group col-12">
                  <label for="inputName">Venue</label>
                  <input type="text" id="inputName" name="loc" value="<?php echo $row['venue'];?>" class="form-control" required>
              </div>


                <div class="form-group col-md-6">
                    <label for="inputName">Date</label>
                    <input type="date" id="inputName"  value="<?php echo $row['project_date'];?>"  name="st" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputName">No. of girls impacted</label>
                  <input type="number" id="inputName" name="slots" value="<?php echo $row['girls_impacted'];?>" class="form-control">
                </div>

               
                <div class="form-group col-md-6">
                <label for="inputStatus">Visibility</label>
                <select id="inputStatus" class="form-control custom-select" name="status" required>
                <option <?php if($row['status'] == 0){echo "selected";}?> value="0">Hidden</option>
                <option <?php if($row['status'] == 1){echo "selected";}?> value="1">Visible</option>
                </select>
                </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" value="Save Changes" name="edit-event" class="btn btn-success float-right mr-3">
                </form>
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-secondary" id="img">
            <div class="card-header">
                <h3 class="card-title">Cover Image</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="processes.php" enctype="multipart/form-data">
                   <input type="hidden" name="edit-event-img" value="<?php echo $pkid;?>" >
                <div>
                    <img src="../uploads/<?php echo $row['project_image'];?>" style="max-width: 400px">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Choose image (Preferred ratio: 3:2 or 16:9)</label>
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


        <div class="card card-danger card-outline" id="gallery">
            <div class="card-header">
                <h3 class="card-title">Project Gallery</h3>

                <div class="card-tools">
                <form method="post" action="processes.php" enctype="multipart/form-data">
                  <input type="hidden" name="add-gallery" value="<?php echo $pkid;?>" >
                    <div class="form-group py-0">
                      <div class="btn btn-success btn-file">
                        <i class="fas fa-plus"></i> Add New Image
                        <input type="file" name="photos" onchange="this.form.submit();" id="exampleInputFile">
                      </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <?php while($imgrow = $imgres->fetch_assoc()){?> 
                  <div class="col-sm-4 px-1 mb-4 bg-light shadow">
                    <img src="../uploads/<?php echo $imgrow['image'];?>" class="img-fluid">
                    <div class="py-2 text-center">
                      <a class="btn btn-sm btn-default" href="processes.php?eid=<?php echo $pkid;?>&del-gallery=<?php echo $imgrow['event_gallery_id'];?>"><i class="fas fa-times"></i> Remove</a>
                    </div>
                  </div>
                  <?php } ?>

                </div>
            </div>
            <!-- /.card-body -->
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
