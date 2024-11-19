<?php
// Include your database connection
require_once 'includes/connect.php';

// Query to get all departments
$query = "SELECT DepartmentID, DepartmentName FROM departments";
$result = $conn->query($query);


?>
    <h4>Choose a Clinic</h4>
<?php

if ($result->num_rows > 0) {
    echo '<select id="departmentSelect" name="department">';
    echo '<option value="">Select Clinic</option>'; 

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['DepartmentID'] . '">' . $row['DepartmentName'] . '</option>';
    }

    echo '</select>';
} else {
    echo 'No departments found.';
}

$conn->close();
?>
