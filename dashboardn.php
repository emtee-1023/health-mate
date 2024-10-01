<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Health Mate - Nurse Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 0.875rem;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding: 1rem;
            position: fixed;
        }

        .sidebar a {
            color: white;
            padding: 10px;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .card-title {
            color: #007bff;
        }

        .nav-link.active {
            background-color: #495057;
            border-radius: 5px;
        }

        .badge {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4 class="text-white">Nurse Dashboard</h4>
        <a href="#" class="nav-link active">Dashboard Overview</a>
        <a href="#">Emergency Responses</a>
        <a href="#">Pending On-Call Tests</a>
        <a href="#">Completed Tests</a>
        <a href="#">Test Results</a>
        <a href="#">Patient Visit Requests</a>
        <a href="#">Account & Payments</a>
        <a href="#">Location Requests</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Health Mate</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications <span class="badge">3</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <!-- Emergency Responses -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Emergency Responses</h5>
                        <p class="card-text">Manage and respond to ongoing emergencies. <span class="badge">2
                                Active</span></p>
                        <a href="#" class="btn btn-primary">View Emergencies</a>
                    </div>
                </div>
            </div>

            <!-- Pending On-Call Tests -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pending On-Call Tests</h5>
                        <p class="card-text">View and manage all pending on-call tests for patients. <span
                                class="badge">5 Pending</span></p>
                        <a href="#" class="btn btn-primary">View Pending Tests</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Completed Tests -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Completed Tests</h5>
                        <p class="card-text">Review all tests that have been completed.</p>
                        <a href="#" class="btn btn-primary">View Completed Tests</a>
                    </div>
                </div>
            </div>

            <!-- Test Results -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Test Results</h5>
                        <p class="card-text">Manage and send test results to the respective doctors.</p>
                        <a href="#" class="btn btn-primary">Manage Results</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Patient Visit Requests -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Patient Visit Requests</h5>
                        <p class="card-text">Manage requests for patient visits for tests.</p>
                        <a href="#" class="btn btn-primary">View Requests</a>
                    </div>
                </div>
            </div>

            <!-- Account & Payments -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account & Payments</h5>
                        <p class="card-text">View charges paid and patient account balances.</p>
                        <a href="#" class="btn btn-primary">View Account Info</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Location Requests -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Requests</h5>
                        <p class="card-text">Manage location data and requests for tests at specific locations.</p>
                        <a href="#" class="btn btn-primary">Manage Locations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
