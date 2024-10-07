<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include "includes/header.php";?>

 <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

            if (!validImageTypes.includes(fileType)) {
                alert("Only image files (jpg, png, gif) are allowed.");
                event.target.value = "";  
                document.getElementById('fileName').textContent = "Choose image";
                return;
            }

            if (file.size > 2 * 1024 * 1024) { 
                alert("File size must be less than 2MB.");
                event.target.value = "";  
                document.getElementById('fileName').textContent = "Choose image";
                return;
            }

            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(file);

            
            document.getElementById('fileName').textContent = file.name;
        }

        
    </script>
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
              <h1>Add new Medicine </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Medicine</li>
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
								<div class="col-12 mb-3">
									<label class="form-label">Medicine Name</label>
									<input class="form-control" type="text" name="tit" placeholder="Enter Medicine Name">
								</div>

                                <!-- Desc 
								<div class="col-12">
									<label class="form-label">Long Description (50 Words)</label>
									<textarea class="form-control" rows="6" name="ldesc" placeholder="Enter Description"></textarea>
								</div>-->

                                 <!-- Desc -->
								<div class="col-12 mb-3">
									<label class="form-label">Use Case</label>
                  <textarea class="form-control" name="content"></textarea>
								</div>

                <div class="col-12 mb-3">
									<label class="form-label">Medicine Price</label>
									<input class="form-control" type="number" name="price" placeholder="Enter Medicine price">
								</div>

								<!-- Desc -->
								<div class="form-group col-12">
                    <label for="project_image">Poster/Cover Image (Preferred ratio: 1:1)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="MedicinePhoto" id="MedicinePhoto" accept="image/*" onchange="previewImage(event)" required>
                        <label class="custom-file-label" id="fileName"  for="exampleInputFile">Choose image</label>
                      </div>
                    </div>
              </div>

								
							</div>
						</div>
                        <div class="card-footer">
                            <div class="text-end">
                                <button type="submit" name="add-medicine" class="btn btn-primary mb-0">Add Medicine</button>
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
  
  <?php include "includes/footer.php";?>
 
</div>
<!-- ./wrapper -->

<?php include "includes/scripts.php";?>
</body>
</html>
