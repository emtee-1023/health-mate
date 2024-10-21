<?php
session_start();
if (!isset($_SESSION['pid'])) {
    header('location: login.php');
    exit();
}
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Health Mate Home</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .card {
            cursor: pointer;
            transition: transform 0.2s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            color: #333;
            /* Dark text color */
        }

        .card:hover {
            transform: scale(1.05);
            background-color: #f1f1f1;
        }

        .card-body {
            flex: 1;
        }

        .departments-list,
        .doctor-profile,
        .emergency-contacts,
        .pharmacy-page {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .list-item,
        .pharmacy-item {
            margin-bottom: 10px;
            cursor: pointer;
            color: #333;
            /* Dark text color */
        }

        .list-item:hover,
        .pharmacy-item:hover {
            background-color: #f9f9f9;
        }

        .cover-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .row-cols-md-3 .col {
            display: flex;
        }
    </style>
</head>

<body class="d-flex h-100 text-center text-white bg-success">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0"><b>HEALTHMATE</b></h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link active text-dark" aria-current="page" href="#">Home</a>
                    <a class="nav-link text-white" href="dashp.php">Dashboard</a>
                    <a class="nav-link  text-white" href="index.php">Back</a>
                </nav>

            </div>
        </header>

        <main class="px-3">
            <h1>Welcome to HealthMate</h1>
            <p class="lead">Explore our features and get the medical assistance you need from the comfort of your home.
            </p>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Departments Card -->
                <div class="col">
                    <div class="card text-center bg-light" onclick="toggleDepartments()">
                        <div class="card-body">
                            <h5 class="card-title">Medical Departments</h5>
                            <p class="card-text">View and explore various medical departments.</p>
                            <button
                                style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;"
                                onclick="window.location.href='departments.php'">
                                View Departments
                            </button>

                        </div>
                    </div>
                </div>

                <!-- Emergency Contacts Card -->
                <div class="col">
                    <div class="card text-center bg-light" onclick="showEmergencyContacts()">
                        <div class="card-body">
                            <h5 class="card-title">Emergency Contacts</h5>
                            <p class="card-text"> Find important emergency contact numbers.🚨☎</p>
                            <P><button
                                    style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;"
                                    onclick="window.location.href='tel:0768140549'">
                                    Call Now
                                </button>
                            </P>
                        </div>
                    </div>
                </div>

                <!-- Pharmacy Card -->
                <div class="col">
                    <div class="card text-center bg-light" onclick="showPharmacyPage()">
                        <div class="card-body">
                            <h5 class="card-title">Pharmacy</h5>
                            <p class="card-text">Browse and order medications from our pharmacy.</p>
                            <button
                                style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;"
                                onclick="window.location.href='shopping/pharmacy.php'">
                                View Pharmacy
                            </button>

                        </div>
                    </div>
                </div>
            </div>


        </main>

        <footer class="mt-auto text-white-50">
            <p>HealthMate by LarryDon</p>
    </div>


</body>

</html>