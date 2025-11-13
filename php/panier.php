<?php include 'header.php'; ?>

<main>
    <div class="container">
        <h1 style="text-align: center; margin: 2rem 0;">Votre Panier</h1>
        <link href="style.css" rel="stylesheet">

        <?php if (empty($_SESSION['cart'])): ?>
            <p style="text-align: center;">Votre panier est vide.</p>
        <?php else: 
            $total = 0;
        ?>
            <div class="cart-items">
                <?php foreach ($_SESSION['cart'] as $id => $product): ?>
                    <div class="cart-item">
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="cart-item-image">
                        <div class="cart-item-details">
                            <h4><?= htmlspecialchars($product['name']) ?></h4>
                            <p>Prix unitaire : <?= number_format($product['price'], 2) ?> €</p>
                            <p>Quantité : <?= $product['quantity'] ?></p>
                        </div>
                        <div class="cart-item-actions">
                             <p><strong>Sous-total : <?= number_format($product['price'] * $product['quantity'], 2) ?> €</strong></p>
                             <a href="rmpanier.php?id=<?= $id ?>" class="remove-button">Retirer</a>
                        </div>
                    </div>
                    <?php $total += $product['price'] * $product['quantity']; ?>
                <?php endforeach; ?>
            </div>

            <div class="cart-total">
                <h2>Total du panier : <?= number_format($total, 2) ?> €</h2>
                <a href="confirmation.php" class="cta-button">Valider la commande</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'footer.php'; ?>