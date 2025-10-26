<?php
// On démarre la session AU TOUT DÉBUT du fichier. Indispensable !
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="index.php" id="logo">FreshVeg 🥕</a>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php#featured-products">Nos Produits</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>

            <div class="user-actions">
                <a href="panier.php" class="nav-button">Panier 🛒</a>
                <a href="#" class="nav-button">Connexion 👤</a>
            </div>
        </div>
    </header>