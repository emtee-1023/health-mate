<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$pkid = $_GET['id'];

$res=$conn->query("SELECT * FROM impacts i WHERE i.impact_id='$pkid'");
$row = $res->fetch_assoc();

//$imgres = $conn->query("SELECT * FROM `event_gallery` WHERE event_id='$pkid'");

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
            <h1>Edit Impact </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Impact Edit</li>
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
            <input type="hidden" name="form_name" value="edit-impacts">
            <input type="hidden" name="rid" value="<?php echo $pkid;?>" >

              <div class="form-group">
                <label for="inputName">Name/Title</label>
                <input type="text" id="inputName" name="name"  value="<?php echo $row['impact_title'];?>"  class="form-control" required>
              </div>


              <div class="form-group">
                    <label for="summernote2">Impact Text</label>
                    <textarea id="summernote2" class="form-control" name="impact_text" rows="18" required><?php echo htmlspecialchars($row['impact_text']); ?></textarea>
                </div>


              <div class="row">
              
                <div class="form-group col-12">
                  <label for="inputName">Quote</label>
                  <textarea type="text" id="inputName" name="quote" rows="3" class="form-control" required><?php echo $row['quote'];?></textarea>
              </div>

                <div class="form-group col-md-6">
                  <label for="inputName">Speaker</label>
                  <input type="text" id="inputName" name="speaker" value="<?php echo $row['speaker'];?>" class="form-control">
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
                    <img src="../uploads/<?php echo $row['impact_image'];?>" style="max-width: 400px">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Choose cover image (Preferred ratio: 3:2 or 16:9)</label>
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
