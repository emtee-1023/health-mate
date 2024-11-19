<?php
require_once 'includes/connect.php';

if (isset($_POST['DepartmentID'])) {
    $DepartmentID = $_POST['DepartmentID'];
    
    // Query to get doctors from the selected department
    $query = "SELECT DoctorID, DoctorName FROM doctors WHERE DepartmentID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $DepartmentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    ?>
    <h4>Choose Your Preffered Doctor</h4>
    <?php
    if ($result->num_rows > 0) {
        echo '<select id="doctorSelect" name="doctor">';
        echo '<option value="">Select Doctor</option>'; // Placeholder option

        // Loop through the result set and populate the doctor dropdown
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['DoctorID'] . '">' . $row['DoctorName'] . '</option>';
        }

        echo '</select>';
    } else {
        echo 'No doctors found for this department.';
    }

    $stmt->close();
    $conn->close();
}
?>
