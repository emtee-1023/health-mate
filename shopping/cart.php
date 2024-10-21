<?php
    if(isset($_POST['MedicineId'], $_POST['Quantity']) && is_numeric($_POST['MedicineID']) && is_numeric($_POST['Quantity']))
    {
        $MedicineID = (int)$_POST['MedicineID'];
        $Quantity = (int)$_POST['Quantity'];

        $stmt = $pdo->prepare('SELECT * FROM medicine WHERE MedicineID = ?');
        $stmt->execute([$_POST['MedicineID']]);
        $medicine = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($medicine && $Quantity > 0) {
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($MedicineID, $_SESSION['cart'])) {
                    $_SESSION['cart'][$MedicineID] += $Quantity;
                } else {
                    $_SESSION['cart'][$MedicineID] = $Quantity;
                }
            } else {
                $_SESSION['cart'] = array($MedicineID => $Quantity);
            }
        }
        header('location: cart.php');
        exit;
    }
    
    //Removing the item from cart
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        unset($_SESSION['cart'][$_GET['remove']]);
    }
?>
