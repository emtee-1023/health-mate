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
            <h1>Add Impact</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Impact Add</li>
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
            <form method="post" action="add-impact.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Name/Title</label>
                <input type="text" id="inputName" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                    <label for="summernote2">Impact Text</label>
                    <textarea id="summernote2" class="form-control" name="impact_text" rows="5" required></textarea>
                </div>


              <div class="row">
                <div class="form-group col-12">
                  <label for="inputName">Quote</label>
                  <input type="text" id="inputName" name="quote" class="form-control" required>
                </div>

                <div class="row">
                <div class="form-group col-12">
                  <label for="inputName">Speaker</label>
                  <input type="text" id="inputName" name="speaker" class="form-control required>
                </div>

               
                <div class="form-group col-12">
                    <label for="project_image">Poster/Cover Image (Preferred ratio: 3:2 or 16:9)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="impact_image" id="impact_image" accept="image/*" onchange="previewImage(event)" required>
                        <label class="custom-file-label" id="fileName"  for="exampleInputFile">Choose image</label>
                      </div>
                    </div>
              </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" value="Add impact" name="new-event" class="btn btn-success float-right mr-3">
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
