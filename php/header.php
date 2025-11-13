<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vente en ligne de légumes frais et locaux.">
    <title>FreshVeg - Vos légumes frais en ligne</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="site-header">
        <div class="container">
            <a href="index.php" id="logo">FreshVeg 🥕</a>


            <nav class="main-nav" id="nav-menu">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php#featured-products">Nos Produits</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>

            <div class="user-actions">
                
                <?php
                $total_articles = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $p) {
                        $total_articles += $p['quantity'];
                    }
                }
                ?>

                <a href="panier.php" class="nav-button" style="position: relative;">
                    Panier 🛒
                    <?php if ($total_articles > 0): ?>
                        <span class="cart-badge"><?= $total_articles ?></span>
                    <?php endif; ?>
                </a>

                <a href="login.php" class="nav-button">Connexion 👤</a>
            </div>
        </div>
    </header>