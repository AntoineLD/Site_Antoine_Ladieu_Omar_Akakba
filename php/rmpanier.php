<?php
session_start();

if (isset($_GET['id'])) {
    $product_id_to_remove = $_GET['id'];
    if (isset($_SESSION['cart'][$product_id_to_remove])) {
        unset($_SESSION['cart'][$product_id_to_remove]);
    }
}

header('Location: panier.php');
exit();
?>