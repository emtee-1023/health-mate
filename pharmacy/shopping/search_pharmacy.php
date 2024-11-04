<?php
include '../includes/connect.php';

// Get the search query from the URL
$search_query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (!empty($search_query)) {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM medicine WHERE MedicineName LIKE ?");
    $like_query = "%" . $search_query . "%";
    $stmt->bind_param("s", $like_query);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate the HTML for the search results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='item'>";
            echo "<h3>" . htmlspecialchars($row['MedicineName']) . "</h3>";
            echo "<p>Price: $" . htmlspecialchars($row['MedicinePrice']) . "</p>";
            echo "<p>" . htmlspecialchars($row['UseCase']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No items found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Type to search for items.</p>";
}
?>
