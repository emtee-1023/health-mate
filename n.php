// get_calendly_link.php
<?php
// Include your database connection
require_once 'includes/connect.php';

if (isset($_POST['DoctorID'])) {
    $DoctorID = $_POST['DoctorID'];
    
    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT CalendlyLink FROM doctors WHERE DoctorID = ?");
    $stmt->bind_param("i", $DoctorID);
    $stmt->execute();
    $stmt->bind_result($CalendlyLink);
    
    // Fetch the result
    if ($stmt->fetch()) {
        echo $CalendlyLink;
    } else {
        echo "Error: Doctor not found";
    }

    $stmt->close();
    $conn->close();
}
?>
<!-- HTML to select a doctor -->
<select id="doctorSelect">
    <option value="">Select a Doctor</option>
    <!-- Dynamically populate this dropdown with doctor options -->
    <option value="1">Dr. John Doe</option>
    <option value="2">Dr. Jane Smith</option>
    <option value="3">Dr. Lawry Ochieng</option>
</select>

<!-- Display the Calendly link -->
<p>Your appointment link: <a id="calendlyLink" href="#" target="_blank">Book an Appointment</a></p>

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // When the doctor is selected
    $('#doctorSelect').change(function() {
        var doctor_id = $(this).val();

        // If a valid doctor is selected
        if (doctor_id) {
            $.ajax({
                url: 'get_calendly_link.php',
                type: 'POST',
                data: { doctor_id: doctor_id },
                success: function(response) {
                    // Update the Calendly link with the fetched link
                    $('#calendlyLink').attr('href', response);
                    $('#calendlyLink').text('Book an Appointment with this Doctor');
                },
                error: function() {
                    alert('Error fetching Calendly link');
                }
            });
        }
    });
});
</script>

