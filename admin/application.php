<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$pkid = $_GET['id'];

$res=$conn->query("SELECT * FROM applications e WHERE e.application_id='$pkid'");
$row = $res->fetch_assoc();

$imgres = $conn->query("SELECT * FROM `app_image` WHERE application_id='$pkid'");

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
            <h1>Application Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Application Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">#<?php echo $row['application_id'];?></h3>

            </div>
            <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4 mb-2">First Name</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['firstname'];?></dd>

                  <dt class="col-sm-4 mb-2">Last Name</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['lastname'];?></dd>
                  
                  <dt class="col-sm-4 mb-2">Street Address</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['street'];?></dd>

                  <dt class="col-sm-4 mb-2">Street Address Line 2</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['street_two'];?></dd>

                  <dt class="col-sm-4 mb-2">City</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['city'];?></dd>

                  <dt class="col-sm-4 mb-2">Country</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['country'];?></dd>

                  <dt class="col-sm-4 mb-2">Postal/Zip Code</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['zip'];?></dd>

                  <dt class="col-sm-4 mb-2">Phone Number</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['phone'];?></dd>

                  <dt class="col-sm-4 mb-2">Email</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['email'];?></dd>

                  <dt class="col-sm-4 mb-2">How did you hear about us?</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['hear'];?></dd>
                  <dd class="col-sm-8 mb-2 offset-sm-4"><?php echo $row['other'];?></dd>

                  <dt class="col-sm-4 mb-2">Tell us about yourself and what you do in Church.</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['description'];?></dd>

                  <dt class="col-sm-4 mb-2">In need Food:</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['food_need'];?></dd>

                  <dt class="col-sm-4 mb-2">You are NOT OBLIGED to tell us about the name of your MINISTRY or CHURCH but we need some evidences from your end.</dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['evidence'];?></dd>

                  <dt class="col-sm-4 mb-2">To reach as many MINISTERS as possible and in need, we need your help. You are NOT OBLIGED to but will you be willing to recommend us through a short video clip? Please note, all videos clips are to be sent to our email: foodforministers@gmail.com. </dt>
                  <dd class="col-sm-8 mb-2"><?php echo $row['video_rec'];?></dd>


                  <dt class="col-sm-4 mb-2">Date Applied</dt>
                  <dd class="col-sm-8 mb-2"><?php echo date('M d, Y H:m A', strtotime($row['date_created']));?></dd>

                
                </dl>
              </div>
              <!-- /.card-body -->
            <div class="card-footer">
                
            </div>
          </div>
          <!-- /.card -->


          <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Image Evidence</h4>
              </div>
              <div class="card-body">
                <div class="row">
                <?php if($imgres->num_rows == 0){?>
                  <div class="col-sm-4 mx-auto text-center">
                    <p>No Images Uploaded by this Applicant!</p>
                  </div>
                <?php } else{
                   while($imgrow = $imgres->fetch_assoc()){?>
                  <div class="col-sm-2">
                    <a href="../uploads/<?php echo $imgrow['image'];?>" data-toggle="lightbox" data-title="" data-gallery="gallery">
                      <img src="../uploads/<?php echo $imgrow['image'];?>" class="img-fluid mb-2" alt=""/>
                    </a>
                  </div>
                  <?php } } ?>

                </div>
              </div>
            </div>



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
