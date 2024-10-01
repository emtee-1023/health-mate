<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Doctor's Dashboard">
    <meta name="author" content="Your Name">
    <title>Doctor's Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 30px;
        }

        .card {
            margin-bottom: 20px;
        }

        .notification-item {
            cursor: pointer;
            margin: 5px 0;
            padding: 5px;
        }

        .notification-item:hover {
            background-color: #e9ecef;
        }

        .view-btn {
            margin-top: 10px;
        }

        .task-btn {
            margin-top: 10px;
        }

        .message-box {
            margin-top: 10px;
        }

        .message-btn {
            margin-top: 10px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header .close {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-body {
            padding: 20px;
        }

        .patient-card {
            margin-bottom: 20px;
        }

        .patient-card button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Notification Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Notifications</h4>
                    </div>
                    <div class="card-body">
                        <div class="notification-item" onclick="showModal('appointments')">Upcoming Appointments</div>
                        <div class="notification-item" onclick="showModal('followups')">Follow-ups</div>
                        <div class="notification-item" onclick="showModal('labtests')">Received Lab Tests</div>
                        <div class="notification-item" onclick="showModal('emergencies')">Emergencies</div>
                        <!-- Add more notifications as needed -->
                    </div>
                </div>
            </div>

            <!-- View Patient Records Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Records</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary view-btn" onclick="showModal('patientRecords')">View Patient
                            Records</button>
                    </div>
                </div>
            </div>

            <!-- Patient Message Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Messages from Patients</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary message-btn" onclick="showModal('patientMessages')">View
                            Messages</button>
                    </div>
                </div>
            </div>

            <!-- Task Management Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Management</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary task-btn" onclick="showModal('manageTasks')">Manage
                            Tasks</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Information</h5>
                    <span class="close" onclick="hideModal()">&times;</span>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- Dynamic content will be inserted here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Day Schedule Card -->
    <div class="card">
        <div class="card-header">
            <h5>Day Schedule</h5>
        </div>
        <div class="card-body">
            <ul class="schedule-card">
                <li>09:00 AM - Visual Checkup</li>
                <li>10:00 AM - On Call</li>
                <li>11:00 AM - Follow-ups</li>
                <li>12:00 PM - Break</li>
                <li>01:00 PM - Lunch Break</li>
                <li>02:00 PM - Surgery</li>
                <li>03:00 PM - Closed</li>
            </ul>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Show the modal with dynamic content
        function showModal(type) {
            const modalContent = document.getElementById('modalContent');
            let content = '';

            switch (type) {
                case 'appointments':
                    content = `
            <h4>Upcoming Appointments</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: John Doe</h5>
                <p>Date: 2024-09-05</p>
                <p>Time: 10:00 AM</p>
                <button class="btn btn-primary">View Details</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Jane Smith</h5>
                <p>Date: 2024-09-06</p>
                <p>Time: 2:00 PM</p>
                <button class="btn btn-primary">View Details</button>
              </div>
            </div>
          `;
                    break;
                case 'followups':
                    content = `
            <h4>Follow-ups</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: James Brown</h5>
                <p>Date: 2024-09-07</p>
                <button class="btn btn-primary">Schedule Follow-up</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Emily White</h5>
                <p>Date: 2024-09-08</p>
                <button class="btn btn-primary">Schedule Follow-up</button>
              </div>
            </div>
          `;
                    break;
                case 'labtests':
                    content = `
            <h4>Received Lab Tests</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Mark Lee</h5>
                <p>Test: Blood Work</p>
                <button class="btn btn-primary">View & Update</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Sarah Green</h5>
                <p>Test: X-Ray</p>
                <button class="btn btn-primary">View & Update</button>
              </div>
            </div>
          `;
                    break;
                case 'emergencies':
                    content = `
            <h4>Emergencies</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Michael King</h5>
                <p>Issue: Heart Attack</p>
                <button class="btn btn-danger">View Emergency</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Laura Bell</h5>
                <p>Issue: Car Accident</p>
                <button class="btn btn-danger">View Emergency</button>
              </div>
            </div>
          `;
                    break;
                case 'patientRecords':
                    content = `
            <h4>Patient Records</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Anna Roberts</h5>
                <button class="btn btn-primary">View Details</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Kevin Anderson</h5>
                <button class="btn btn-primary">View Details</button>
              </div>
            </div>
          `;
                    break;
                case 'patientMessages':
                    content = `
            <h4>Messages from Patients</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: Rachel Adams</h5>
                <p>Message: "I'm feeling dizzy, what should I do?"</p>
                <textarea class="form-control message-box" rows="2" placeholder="Reply"></textarea>
                <button class="btn btn-primary mt-2">Send</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Patient: David Blake</h5>
                <p>Message: "When is my next appointment?"</p>
                <textarea class="form-control message-box" rows="2" placeholder="Reply"></textarea>
                <button class="btn btn-primary mt-2">Send</button>
              </div>
            </div>
          `;
                    break;
                case 'manageTasks':
                    content = `
            <h4>Manage Tasks</h4>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Task: Complete Patient Follow-up</h5>
                <p>Due: 2024-09-04</p>
                <button class="btn btn-primary">Complete Task</button>
              </div>
            </div>
            <div class="patient-card card">
              <div class="card-body">
                <h5>Task: Review Lab Results</h5>
                <p>Due: 2024-09-05</p>
                <button class="btn btn-primary">Complete Task</button>
              </div>
            </div>
          `;
                    break;
                default:
                    content = '<p>Information not available.</p>';
            }

            modalContent.innerHTML = content;
            const modal = new bootstrap.Modal(document.getElementById('infoModal'));
            modal.show();
        }

        // Hide the modal
        function hideModal() {
            const modal = bootstrap.Modal.getInstance(document.getElementById('infoModal'));
            modal.hide();
        }
    </script>
</body>

</html>