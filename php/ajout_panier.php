<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    
    if (isset($_POST['quantity'])) {
        $quantity = (int)$_POST['quantity']; // On prend le chiffre envoyé
    } else {
        $quantity = 1; // Sécurité si jamais ça bug (en gros on met 1 par défaut)
    }

    // Petite sécurité pour ne pas ajouter 0 ou -1
    if ($quantity < 1) { 
        $quantity = 1; 
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        // On AJOUTE la quantité choisie à ce qu'il y a déjà
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // On crée le produit avec la quantité choisie
        $_SESSION['cart'][$product_id] = [
            'name'      => $product_name,
            'price'     => $product_price,
            'image'     => $product_image,
            'quantity'  => $quantity 
        ];
    }
}

header('Location: index.php#prod-' . $product_id);
exit();
?>