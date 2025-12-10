<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $product_price = $_POST['product_price'] ?? null;
    $product_image = $_POST['product_image'] ?? null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    if ($quantity < 1) $quantity = 1;

  
    if (!isset($_SESSION['user'])) {
       
        $_SESSION['pending_add'] = [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'quantity' => $quantity
        ];

        // Réponse JSON avec code 401 pour fetch côté client
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'auth_required', 'login' => 'login.php']);
        exit();
    }

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
header('Location: index.php');
exit();
?>