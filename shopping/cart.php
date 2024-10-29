<?php
session_start();
include '../includes/connect.php';
include 'functions.php';


    if(isset($_POST['MedicineID'], $_POST['Quantity']) && is_numeric($_POST['MedicineID']) && is_numeric($_POST['Quantity']))
    {
        $MedicineID = (int)$_POST['MedicineID'];
        $Quantity = (int)$_POST['Quantity'];

        $stmt = $pdo->prepare('SELECT * FROM medicine WHERE MedicineID = ?');
        $stmt->bind_param("i", $MedicineID);
        $stmt->execute();
        $result = $stmt->get_result();
        $medicine = $result->fetch_assoc();
        if ($medicine && $Quantity > 0) {
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($MedicineID, $_SESSION['cart'])) {
                    $_SESSION['cart'][$MedicineID] = $Quantity;
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
    //Updating item quantities
    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'Quantity') !== false && is_numeric($v)) {
                $MedicineID = str_replace('Quantity-', '', $k);
                $Quantity = (int)$v;
                if (is_numeric($MedicineID) && isset($_SESSION['cart'][$MedicineID]) && $Quantity > 0) {
                    $_SESSION['cart'][$MedicineID] = $Quantity;
                }
            }
        }
        header('Location: cart.php');
        exit;
    }

    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: placeorder.php');
        exit;
    }

    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    if ($products_in_cart) {
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $pdo->prepare('SELECT * FROM medicine WHERE MedicineID IN (' . $array_to_question_marks . ')');

       $types = str_repeat('i', count($products_in_cart));
       $stmt->bind_param($types, ...array_keys($products_in_cart));

       $stmt->execute();

       $result = $stmt->get_result();
       $products = $result->fetch_all(MYSQLI_ASSOC); 
        foreach ($products as $product) {
            $subtotal += (float)$product['MedicinePrice'] * (int)$products_in_cart[$product['MedicineID']];
        }
    }
?>

<?=template_header('Cart')?>
<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Item</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                <td class="img">
                        <a href="medicine.php?MedicineID=<?=$product['MedicineID']?>">
                            <img src="../uploads/<?=$product['MedicinePhoto']?>" width="50" height="50" alt="<?=$product['MedicineName']?>">
                        </a>
                    </td>
                    <td>
                        <a href="medicine.php?MedicineID=<?=$product['MedicineID']?>"><?=$product['MedicineName']?></a>
                        <br>
                        <a href="cart.php?remove=<?=$product['MedicineID']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">Kes. <?=$product['MedicinePrice']?></td>
                    <td class="quantity">
                        <input type="number" name="Quantity-<?=$product['MedicineID']?>" value="<?=$products_in_cart[$product['MedicineID']]?>" min="1" max="<?=$product['AvailableStock'];?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">Kes. <?=$product['MedicinePrice'] * $products_in_cart[$product['MedicineID']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">Kes. <?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

<?=template_footer()?>
