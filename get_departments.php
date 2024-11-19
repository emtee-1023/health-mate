<?php
// Include your database connection
require_once 'includes/connect.php';

// Query to get all departments
$query = "SELECT ClinicID, ClinicName FROM clinics";
$result = $conn->query($query);


?>
<h4>Choose a Clinic</h4>
<?php

if ($result->num_rows > 0) {
    echo '<select id="departmentSelect" name="department">';
    echo '<option value="">Select Clinic</option>';

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['ClinicID'] . '">' . $row['ClinicName'] . '</option>';
    }

    echo '</select>';
} else {
    echo 'No departments found.';
}

$conn->close();
?>