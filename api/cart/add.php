<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : null;
    $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : null;
    $product_image = isset($_POST['product_image']) ? $_POST['product_image'] : null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    if ($quantity < 1) $quantity = 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = [
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => $quantity
        ];
    }

    // Si tout OK, renvoyer JSON pour le traitement AJAX
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit();
}

// Si pas POST
header('Location: ../../pages/home/index.php');
exit();
?>
