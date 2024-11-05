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
                event.target.value = "";  // Clear the input
                document.getElementById('fileName').textContent = "Choose image";
                return;
            }

            if (file.size > 2 * 1024 * 1024) { // 2MB limit
                alert("File size must be less than 2MB.");
                event.target.value = "";  // Clear the input
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

            // Update the file name label
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
            <h1>Add Project </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
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
            <form method="post" action="add-project.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Name/Title</label>
                <input type="text" id="inputName" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                    <label for="summernote2">About Project</label>
                    <textarea id="summernote2" class="form-control" name="desc" rows="5" required></textarea>
                </div>


              <div class="row">
                <div class="form-group col-12">
                  <label for="inputName">Venue</label>
                  <input type="text" id="inputName" name="loc" class="form-control" required>
                </div>

                <div class="row">
                <div class="form-group col-12">
                  <label for="inputName">Summary</label>
                  <input type="text" id="inputName" name="summary" class="form-control" placeholder="eg See how we changed lives at Thika women's prison" required>
                </div>


                <div class="form-group col-md-6">
                    <label for="inputName">Project Date</label>
                    <input type="date" id="inputName" name="date" class="form-control" required>
                </div>  
                
                <div class="form-group">
                <label for="inputName">Number of girls impacted</label>
                <input type="text" id="inputName" name="girls_impacted" class="form-control" required>
              </div>

               
                <div class="form-group col-12">
                    <label for="project_image">Poster/Cover Image (Preferred ratio: 3:2 or 16:9)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="project_image" id="project_image" accept="image/*" onchange="previewImage(event)" required>
                        <label class="custom-file-label" id="fileName"  for="exampleInputFile">Choose image</label>
                      </div>
                    </div>
              </div>

              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" value="Add Project" name="new-event" class="btn btn-success float-right mr-3">
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
