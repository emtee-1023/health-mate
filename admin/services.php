<?php 
session_start();
include "includes/sessions.php";
include "../includes/connect.php";

$res=$conn->query("SELECT * FROM service ORDER BY service_id DESC");
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Services</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Services</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
                    <div class="container-fluid">
                        <!-- Default box -->
                        <div class="card">
                        <div class="card-header">
                                <div class="card-tools">
                                    <a href="new-service.php" class="btn btn-info bg-gradient-info"><i class="fa fa-plus"></i> Add New Services</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $res->fetch_assoc()){
                                         ?>
                                        <tr>
                                            <td>
                                              <div class="d-flex">
                                                    <span><img src="../uploads/<?php echo $row['image'];?>" width="60"></span>
                                                    <span class="ml-2"><?php echo $row['name'];?></span>
                                                </div>
                                            </td>
                                            <td><?php echo $row["short_desc"];?></td>
                                            <td><span class="text-nowrap"><?php echo pkgStatus($row['status']);?></span></td>
                                            <td><span class="text-nowrap"><?php echo date('d/m/Y', strtotime($row['date_created']));?></span></td>
                                            
                                            <td class="text-nowrap">
                                                <a href="edit-service.php?id=<?php echo $row["service_id"];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.container-fluid -->
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

<?php
function pkgStatus($status){
  if($status == 1){
    $output = "<span class='badge badge-success'>Active</span>";
  }elseif($status == 2){
    $output = "<span class='badge badge-warning'>Inactive</span>";
  }

  return $output;
}
?>
