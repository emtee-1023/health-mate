<?php
include '../../includes/connect.php';
include '../../includes/config.php';
include 'functions.php';

try{
        if(isset($_GET['MedicineID']))
        {
            $MedicineID = $_GET['MedicineID'];

            $stmt = $conn->prepare('SELECT * FROM medicine WHERE MedicineID = ?');
            $stmt->bind_param('i', $MedicineID);
            $stmt->execute();
            $result = $stmt->get_result();
            $medicine = $result->fetch_assoc();
            
            if (!$medicine) {
                echo 'Medicine not found.';
                die();
            }
        } else {
            echo 'No medicine ID provided.';
            die();
        }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}
?>
<?=template_header('Medicine')?>

<div class="product content-wrapper">
    <img src="../../uploads/<?php echo htmlspecialchars($medicine['MedicinePhoto']);?>" width="400" height="400" alt="<?php echo htmlspecialchars($medicine['MedicineName']);?>">
    <div>
        <h1><?php echo htmlspecialchars($medicine['MedicineName']);?></h1>
        <span class="price">Kes. <?php echo htmlspecialchars($medicine['MedicinePrice']);?></span>
        <br>
        <span>Available in stock <strong><?php echo htmlspecialchars($medicine['AvailableStock']);?></strong></span>

        <form action="cart.php" method="post">
                <label for="quantity">Quantity:</label>
                <input type="number" name="Quantity" value="1" min="1" max="<?=$medicine['AvailableStock']?>" placeholder="Quantity" required>
                <input type="hidden" name="MedicineID" value="<?=$medicine['MedicineID']?>">
                <input type="submit" value="Add To Cart">
        </form>

        <div class="description">
                <?=$medicine['UseCase']?>
        </div>
    </div>
</div>
<?=template_footer()?>