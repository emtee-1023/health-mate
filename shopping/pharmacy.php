<?php
include '../includes/connect.php';
include 'functions.php';

// Default items per page
$defaultItemsPerPage = 8; // Set a default
$itemsOptions = [4, 6, 8]; // Options for items per page

// Get current page number from URL, defaulting to 1 if not set or invalid
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

// Get items per page from URL, defaulting to the default if not set or invalid
$NumberOfMedicineOnEachPage = isset($_GET['items']) && in_array($_GET['items'], $itemsOptions) ? (int)$_GET['items'] : $defaultItemsPerPage;

// Query to get total number of medicines
$totalStmt = $conn->prepare('SELECT COUNT(*) AS total FROM medicine');
$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalRow = $totalResult->fetch_assoc();
$totalMedicines = (int)$totalRow['total'];
$totalStmt->close();

// Prepare SQL statement for pagination
$stmt = $conn->prepare('SELECT * FROM medicine ORDER BY MedicineName ASC LIMIT ?, ?');
$offset = ($current_page - 1) * $NumberOfMedicineOnEachPage;
$stmt->bind_param('ii', $offset, $NumberOfMedicineOnEachPage);
$stmt->execute();
$result = $stmt->get_result();

// Fetch all medicines
$medicines = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Calculate total pages
$totalPages = ceil($totalMedicines / $NumberOfMedicineOnEachPage);
if ($totalMedicines === 0) {
    echo "No medicines found.";
    exit; // Stop execution if no medicines found
}
?>
<?= template_header('Pharmacy') ?>

<div class="products content-wrapper">
    <h1><strong>Pharmacy Shop</strong></h1>

    <form method="GET" action="pharmacy.php" style="margin-bottom: 20px; display:flex; gap:10px; align-items:flex-start">
        <label for="itemsPerPage">Items per page:</label>
        <select style="width: 50px;" id="itemsPerPage" name="items" onchange="this.form.submit()">
            <?php foreach ($itemsOptions as $option): ?>
                <option value="<?= $option ?>" <?= $option == $NumberOfMedicineOnEachPage ? 'selected' : '' ?>><?= $option ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="p" value="<?= htmlspecialchars($current_page) ?>"> <!-- Maintain current page -->
    </form>

    <p style="text-align: start;">Displaying <?= htmlspecialchars($NumberOfMedicineOnEachPage) ?> out of <?= htmlspecialchars($totalMedicines) ?> Medications</p>

    <div class="products-wrapper">
        <?php foreach ($medicines as $medicine): ?>
            <a style="display:flex; flex-direction:column; align-items:center" class="product" href="medicine.php?MedicineID=<?= htmlspecialchars($medicine['MedicineID']); ?>">
                <img src="../uploads/<?= htmlspecialchars($medicine['MedicinePhoto']); ?>" width="200" height="200" alt="<?= htmlspecialchars($medicine['MedicineName']); ?>">
                <span style="text-align: center;" class="name"><?= htmlspecialchars($medicine['MedicineName']); ?></span>
                <span style="text-align: center;" class="price">Kes. <?= htmlspecialchars($medicine['MedicinePrice']); ?></span>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="pagination-buttons" style="display: flex; justify-content: space-between; align-items: center;">
        <?php if ($current_page > 1): ?>
            <a class="buttons" href="pharmacy.php?p=<?= $current_page - 1 ?>&items=<?= $NumberOfMedicineOnEachPage ?>" style="text-align: left;">Prev</a>
        <?php endif; ?>

        <span>Page <?= htmlspecialchars($current_page) ?> of <?= htmlspecialchars($totalPages) ?></span>



        <?php if ($current_page < $totalPages): ?>
            <a class="buttons" href="pharmacy.php?p=<?= $current_page + 1 ?>&items=<?= $NumberOfMedicineOnEachPage ?>" style="text-align: right;">Next</a>
        <?php endif; ?>
    </div>
</div>

<?= template_footer() ?>