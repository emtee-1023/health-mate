<?php
include '../includes/connect.php';
include 'functions.php';

$NumberOfMedicineOnEachPage = 8;
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
$stmt = $conn->prepare('SELECT * FROM medicine ORDER BY MedicineName ASC LIMIT ?, ?');
$offset = ($current_page - 1) * $NumberOfMedicineOnEachPage;
$stmt->bind_param('ii', $offset, $NumberOfMedicineOnEachPage);
$stmt->execute();
$result = $stmt->get_result();
$medicines = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

if ($result->num_rows > 0) {
    $result = $result->num_rows;
} else {
    echo "No medicines found.";
}
?>
<?=template_header('Pharmacy')?>

<div class="products content-wrapper">
    <h1><strong>Pharmacy Shop</strong></h1>
    <p><?=$result?> Medications</p>

    <div class="products-wrapper">
        <?php foreach($medicines as $medicine): ?>
            <a class="product" href="medicine.php?MedicineID=<?php echo htmlspecialchars($medicine['MedicineID']);?>">
                <img src="../uploads/<?php echo htmlspecialchars($medicine['MedicinePhoto']);?>" width="200" height="200" alt="<?php echo htmlspecialchars($medicine['MedicineName']);?>">
                <span class="name"><?php echo htmlspecialchars($medicine['MedicineName']);?></span>
                <span class="price">Kes. <?php echo htmlspecialchars($medicine['MedicinePrice']);?></span>
            </a>
        <?php endforeach;?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="pharmacyphp&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($result > ($current_page * $NumberOfMedicineOnEachPage) - $NumberOfMedicineOnEachPage + count($medicines)): ?>
        <a href="pharmacy.php&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>