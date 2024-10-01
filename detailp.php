<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eaf7ea;
            margin: 0;
            padding: 0;
        }

        .carousel {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .carousel-item {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            transition: transform 0.5s ease;
        }

        h2 {
            color: #216731;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"],
        select,
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #216731;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #1d5e3a;
        }

        .next-btn {
            float: right;
        }

        .prev-btn {
            float: left;
        }

        .submit-btn {
            background-color: #004d00;
        }

        .submit-btn:hover {
            background-color: #003a00;
        }
    </style>
</head>

<body>
    <div class="carousel">
        <!-- Personal Details Form -->
        <div class="carousel-item" id="personal-details">
            <h2>Personal Details</h2>
            <form id="personal-form">
                <label for="id">National Id/Passport NO:</label>
                <input type="number" id="id" name="id" required>

                <label for="id-photo">Upload ID Photo:</label>
                <input type="file" id="id-photo" name="id-photo" accept="image/*" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="location">Location Area:</label>
                <input type="text" id="location" name="location" required>

                <label for="profile-photo">Upload Profile Photo:</label>
                <input type="file" id="profile-photo" name="profile-photo" accept="image/*" required>

                <button type="button" class="next-btn">Next</button>
            </form>
        </div>

        <!-- Medical Details Form -->
        <div class="carousel-item" id="medical-details">
            <h2>Medical Details</h2>
            <form id="medical-form">
                <label for="medical-history">Medical History:</label>
                <textarea id="medical-history" name="medical-history" rows="4" required></textarea>

                <label for="conditions">Current Conditions:</label>
                <input type="text" id="conditions" name="conditions" required>

                <label for="weight">weight:</label>
                <input type="number" id="weight" name="weight" required>

                <label for="height">height:</label>
                <input type="height" id="height" name="height" required>

                <label for="blood-group">Blood Group:</label>
                <input type="text" id="blood-group" name="blood-group" required>

                <label for="medications">Medications Required:</label>
                <input type="text" id="medications" name="medications" required>

                <button type="button" class="prev-btn">Previous</button>
                <button type="button" class="next-btn">Next</button>
            </form>
        </div>

        <!-- Financial Details Form -->
        <div class="carousel-item" id="financial-details">
            <h2>Financial Details</h2>
            <form id="financial-form">
                <label for="mpesa-number">MPESA Number:</label>
                <input type="text" id="mpesa-number" name="mpesa-number" required>

                <label for="link-cards">Link Cards:</label>
                <input type="text" id="link-cards" name="link-cards" required>

                <label for="medical-insurance">Medical Insurance:</label>
                <input type="text" id="medical-insurance" name="medical-insurance" required>

                <label for="insurance-photo">Upload Insurance Photo:</label>
                <input type="file" id="insurance-photo" name="insurance-photo" accept="image/*" required>

                <button type="button" class="prev-btn">Previous</button>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const nextBtns = document.querySelectorAll('.next-btn');
            const prevBtns = document.querySelectorAll('.prev-btn');
            const carouselItems = document.querySelectorAll('.carousel-item');
            let currentIndex = 0;

            function showSlide(index) {
                carouselItems.forEach((item, i) => {
                    item.style.transform = `translateX(${(i - index) * 100}%)`;
                });
            }

            nextBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (currentIndex < carouselItems.length - 1) {
                        const currentForm = carouselItems[currentIndex].querySelector('form');
                        if (currentForm.checkValidity()) {
                            currentIndex++;
                            showSlide(currentIndex);
                        } else {
                            currentForm.reportValidity();
                        }
                    }
                });
            });

            prevBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        showSlide(currentIndex);
                    }
                });
            });

            showSlide(currentIndex);
        });
    </script>
</body>

</html>