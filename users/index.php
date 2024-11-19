<?php
session_start();
include "includes/sessions.php";
include "../includes/connect.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/header.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php include "includes/navbar.php"; ?>


        <?php include "includes/sidebar.php"; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Welcome Back <?= $_SESSION['fname'] ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row ">
                        <div class="col-sm-6 mx-auto text-center">
                            <p>Analytics</p>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row">
                            <!-- Total Appointments -->
                            <div class="col-md-4">
                                <div class="card text-white bg-secondary mb-3">
                                    <div class="card-header">Total Drugs Bought</div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php
                                            // Example PHP query to get total appointments
                                            $result = $conn->query("SELECT COUNT(MedicineID) AS total FROM pharmacy_purchases WHERE UserID = $userid");
                                            $row = $result->fetch_assoc();
                                            echo $row['total'] ?? 0; // Display total or 0 if null
                                            ?>
                                        </h5>
                                        <p class="card-text">Number of drugs Purchased</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-white bg-secondary mb-3">
                                    <div class="card-header">Total Purchases</div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php
                                            // Example PHP query to get total appointments
                                            $result = $conn->query("SELECT SUM(TotalCost) AS TotalSales FROM pharmacy_purchases WHERE UserID = $userid;");
                                            $row = $result->fetch_assoc();
                                            echo 'Ksh. ' . $row['TotalSales'] ?? 0; // Display total or 0 if null
                                            ?>
                                        </h5>
                                        <p class="card-text">Total Money spent on E-Pharma</p>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-4">
                                <div class="card text-white bg-secondary mb-3">
                                    <div class="card-header">Total Patient Profiles</div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php
                                            // Example PHP query to get total appointments
                                            $result = $conn->query("SELECT COUNT(PatientID) AS total FROM patients WHERE UserID = $userid");
                                            $row = $result->fetch_assoc();
                                            echo $row['total'] ?? 0; // Display total or 0 if null
                                            ?>
                                        </h5>
                                        <p class="card-text">Number of Patients under you</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "includes/footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <?php include "includes/scripts.php"; ?>

</body>

</html>