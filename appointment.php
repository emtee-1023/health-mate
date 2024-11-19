<?php
include 'includes/connect.php';

$res = $conn->query("SELECT * FROM departments ORDER BY DepartmentID ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Mate - Book An Appointment</title>
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .hero {
            flex: 1;
            background-color: #1e293b;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(circle at center, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            z-index: 1;
        }
        .logo {
            display: flex;
            align-items: center;
            color: white;
            font-weight: bold;
            z-index: 2;
        }
        .hero h1 {
            font-size: 3rem;
            color: white;
            margin-bottom: 1rem;
            z-index: 2;
        }
        .hero-image {
            width: 100%;
            max-width: 500px;
            border-radius: 8px;
            z-index: 2;
        }
        .booking {
            flex: 1;
            padding: 2rem;
            background-color: #f8fafc;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .service {
            text-align: center;
            padding: 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .service-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 0.5rem;
        }
        form {
            display: grid;
            gap: 1rem;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
        }
        button:hover {
            background-color: #2563eb;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div  style="background-image: url('img/welcome.png'); background-size: cover" class="hero">
            <div>
                <div class="logo">
                    <img style="width: 150px; height: auto; border-radius: 10px;" src="img/healthmate-logo.jpg" alt="Logo">
                </div>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; align-items:left; justify-content:center;" class="booking">
            <h2>Book an Appointment</h2>
            <p style="margin-bottom: 1rem;">Medical care can be simple and made to work for you. Just book an appointment!!</p>

            <div id="departmentSection">

            </div>

                <br><br><br>

            <div id="doctorSection">

            </div>

            <br><br><br>

            <a href="#" id="calendlyLink" style="display: none; text-decoration:none; background-color:blue; color:white; padding:10px; border-radius:8px; text-align:center; height:50px; font-weight:bold;" onclick="openCalendlyWidget(); return false;">Select An Appointment Time</a>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            

            <script>
            function openCalendlyWidget() {
                var DoctorID = $('#doctorSelect').val();  

                if (DoctorID) {
                    $.ajax({
                        url: 'get_calendly_link.php',
                        type: 'POST',
                        data: { DoctorID: DoctorID },
                        success: function(response) {
                            Calendly.initPopupWidget({ url: response });
                        },
                        error: function() {
                            alert('Error fetching Calendly link');
                        }
                    });
                } else {
                    alert('Please select a doctor.');
                }
            }

            $(document).ready(function() {
                $.ajax({
                    url: 'get_departments.php', 
                    type: 'GET',
                    success: function(response) {
                        $('#departmentSection').html(response); 
                    },
                    error: function() {
                        alert('Error fetching departments');
                    }
                });

                $(document).on('change', '#departmentSelect', function() {
                    var DepartmentID = $(this).val();

                    if (DepartmentID) {
                        $.ajax({
                            url: 'get_doctors_by_department.php', 
                            type: 'POST',
                            data: { DepartmentID: DepartmentID },
                            success: function(response) {
                                $('#doctorSection').html(response); 
                                $('#calendlyLink').hide(); 
                            },
                            error: function() {
                                alert('Error fetching doctors');
                            }
                        });
                    } else {
                        $('#doctorSection').html(''); 
                    }
                });

                $(document).on('change', '#doctorSelect', function() {
                    var DoctorID = $(this).val();

                    if (DoctorID) {
                        $.ajax({
                            url: 'get_calendly_link.php',
                            type: 'POST',
                            data: { DoctorID: DoctorID },
                            success: function(response) {
                                $('#calendlyLink').attr('href', response);
                                $('#calendlyLink').show(); 
                            },
                            error: function() {
                                alert('Error fetching Calendly link');
                            }
                        });
                    } else {
                        $('#calendlyLink').hide(); 
                    }
                });
            });
            </script>


</body>
</html>