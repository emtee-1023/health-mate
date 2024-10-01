<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On-Call Test Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .test-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-img {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .profile-info div {
            margin-left: 10px;
        }

        .actions button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .actions button:hover {
            background-color: #45a049;
        }

        .actions button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            width: 90%;
            position: relative;
        }

        .modal-content img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }

        .close:hover {
            color: #f00;
        }

        .view-map-button {
            background-color: #2196F3;
        }

        .view-map-button:hover {
            background-color: #1976D2;
        }

        .modal-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h1>On-Call Test Requests</h1>
        <p>Manage and track on-call test requests for patients.</p>
    </header>

    <main>
        <section class="card-container">
            <!-- Card 1 -->
            <div class="test-card">
                <div class="profile-info">
                    <img src="profile-image1.jpg" alt="Profile Image" class="profile-img">
                    <div>
                        <h2>John Doe</h2>
                        <p>Location: 123 Elm Street, Apt 4B, Springfield, IL</p>
                    </div>
                </div>
                <button onclick="showModal('patient1')">View</button>
            </div>

            <!-- Card 2 -->
            <div class="test-card">
                <div class="profile-info">
                    <img src="profile-image2.jpg" alt="Profile Image" class="profile-img">
                    <div>
                        <h2>Jane Smith</h2>
                        <p>Location: 456 Oak Avenue, Suite 3, Springfield, IL</p>
                    </div>
                </div>
                <button onclick="showModal('patient2')">View</button>
            </div>

            <!-- Card 3 -->
            <div class="test-card">
                <div class="profile-info">
                    <img src="profile-image3.jpg" alt="Profile Image" class="profile-img">
                    <div>
                        <h2>Mike Johnson</h2>
                        <p>Location: 789 Pine Road, Apt 1, Springfield, IL</p>
                    </div>
                </div>
                <button onclick="showModal('patient3')">View</button>
            </div>

            <!-- Card 4 -->
            <div class="test-card">
                <div class="profile-info">
                    <img src="profile-image4.jpg" alt="Profile Image" class="profile-img">
                    <div>
                        <h2>Emily Davis</h2>
                        <p>Location: 101 Maple Street, Springfield, IL</p>
                    </div>
                </div>
                <button onclick="showModal('patient4')">View</button>
            </div>

            <!-- Card 5 -->
            <div class="test-card">
                <div class="profile-info">
                    <img src="profile-image5.jpg" alt="Profile Image" class="profile-img">
                    <div>
                        <h2>David Wilson</h2>
                        <p>Location: 202 Birch Lane, Springfield, IL</p>
                    </div>
                </div>
                <button onclick="showModal('patient5')">View</button>
            </div>
        </section>

        <!-- Modal for Patient Details -->
        <div id="patientModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h1>Patient Details</h1>
                <div id="modalDetails">
                    <!-- Patient details will be dynamically inserted here -->
                </div>
                <div class="actions">
                    <button class="view-map-button" id="viewMapButton">View Map</button>
                    <button class="modal-button" onclick="markAsCompleted()">Completed</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        const patients = {
            patient1: {
                name: "John Doe",
                id: "12345",
                testKits: ["Blood collection kit", "Urine collection kit"],
                samples: ["Blood: 5 ml", "Urine: 50 ml"],
                location: "123 Elm Street, Apt 4B, Springfield, IL",
                phone: "(555) 123-4567",
                email: "john.doe@example.com",
                profileImage: "profile-image1.jpg"
            },
            patient2: {
                name: "Jane Smith",
                id: "67890",
                testKits: ["Blood collection kit", "Saliva collection kit"],
                samples: ["Blood: 10 ml", "Saliva: 5 ml"],
                location: "456 Oak Avenue, Suite 3, Springfield, IL",
                phone: "(555) 987-6543",
                email: "jane.smith@example.com",
                profileImage: "profile-image2.jpg"
            },
            patient3: {
                name: "Mike Johnson",
                id: "11223",
                testKits: ["Blood collection kit"],
                samples: ["Blood: 10 ml"],
                location: "789 Pine Road, Apt 1, Springfield, IL",
                phone: "(555) 456-7890",
                email: "mike.johnson@example.com",
                profileImage: "profile-image3.jpg"
            },
            patient4: {
                name: "Emily Davis",
                id: "33445",
                testKits: ["Urine collection kit"],
                samples: ["Urine: 50 ml"],
                location: "101 Maple Street, Springfield, IL",
                phone: "(555) 678-9012",
                email: "emily.davis@example.com",
                profileImage: "profile-image4.jpg"
            },
            patient5: {
                name: "David Wilson",
                id: "55667",
                testKits: ["Saliva collection kit"],
                samples: ["Saliva: 5 ml"],
                location: "202 Birch Lane, Springfield, IL",
                phone: "(555) 345-6789",
                email: "david.wilson@example.com",
                profileImage: "profile-image5.jpg"
            }
        };

        function showModal(patientId) {
            const patient = patients[patientId];
            const modal = document.getElementById('patientModal');
            const modalDetails = document.getElementById('modalDetails');
            const viewMapButton = document.getElementById('viewMapButton');

            modalDetails.innerHTML = `
                <div style="display: flex; align-items: center; gap: 15px;">
                    <img src="${patient.profileImage}" alt="Profile Image" style="border-radius: 50%; width: 100px; height: 100px;">
                    <div>
                        <h2>${patient.name}</h2>
                        <p>ID: ${patient.id}</p>
                        <h3>Test Kits:</h3>
                        <ul>
                            ${patient.testKits.map(kit => `<li>${kit}</li>`).join('')}
                        </ul>
                        <h3>Samples to be Taken:</h3>
                        <ul>
                            ${patient.samples.map(sample => `<li>${sample}</li>`).join('')}
                        </ul>
                        <h3>Location:</h3>
                        <p>${patient.location}</p>
                        <h3>Contact Information:</h3>
                        <p>Phone: ${patient.phone}</p>
                        <p>Email: ${patient.email}</p>
                    </div>
                </div>
            `;

            viewMapButton.onclick = () => viewMap(patient.location);

            modal.style.display = 'flex';
        }

        function closeModal() {
            const modal = document.getElementById('patientModal');
            modal.style.display = 'none';
        }

        function viewMap(location) {
            const encodedLocation = encodeURIComponent(location);
            const mapUrl = `https://www.google.com/maps/search/?api=1&query=${encodedLocation}`;
            window.open(mapUrl, '_blank');
        }

        function markAsCompleted() {
            alert('Test marked as completed.');
            closeModal();
        }
    </script>
</body>

</html>
