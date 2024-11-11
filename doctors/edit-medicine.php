<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";


$MedicineID = $_GET['id'];

$res = $conn->query("SELECT * FROM medicine WHERE MedicineID='$MedicineID'");
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
            <h1>Edit Medicine Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Medicine Details</li>
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
                                <h3 class="card-title">Enter Medicine Details</h3>
              
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
								<div class="col-12">
									<label class="form-label">Medicine Name</label>
									<input class="form-control" type="text" name="tit" value="<?php echo $row['MedicineName'];?>" placeholder="Enter Medicine Name">
								</div>

								<div class="col-12">
									<label class="form-label">Use Case</label>
									<textarea class="form-control" name="content"><?php echo $row['UseCase'];?></textarea>
								</div>

                <div class="col-12">
									<label class="form-label">Medicine Price</label>
									<input class="form-control" type="text" name="price" value="<?php echo $row['MedicinePrice'];?>" placeholder="Enter Medicine Price">
								</div>

                <div class="col-12">
									<label class="form-label">Available Stock</label>
									<input class="form-control" type="text" name="stock" value="<?php echo $row['AvailableStock'];?>" placeholder="Enter Stock">
								</div>


								<input type="hidden" name="MedicineID" value="<?php echo $MedicineID;?>">

								
							</div>
						</div>
                        <div class="card-footer">
                            <div class="text-end">
                                <button type="submit" name="edit-medicine" class="btn btn-primary mb-0">Update Medicine <Details></Details></button>
                                </form>
                            </div>
                        </div>
					</div>
					<!-- Cab Detail END card-->

<hr class="my-2">

<form class="vstack gap-4" enctype="multipart/form-data" method="post" action="processes.php">
                    
    <!-- Cab Detail START -->
    <div class="card shadow mt-3">
        <div class="card-header">
            Change Image
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="row g-3">
                <!-- Car name -->
                <div class="col-8 mx-auto" >
                    <img src="../uploads/<?php echo $row['MedicinePhoto'];?>" style="max-width:400px">
                </div>

                <!-- Desc -->
                <div class="col-12">
                    <label class="form-label">Change Photo (Recommended 1:1)</label>
                    <input class="form-control" type="file" accept="image/*" name="photos" oninput="this.form.submit();" placeholder="Choose Photo">
                    <input type="hidden" name="edit-medicine-img" value="<?php echo $MedicineID;?>">
                </div>
                
                                                
            </div>
        </div>
    </div>
    <!-- Cab Detail END -->
    </form>
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
