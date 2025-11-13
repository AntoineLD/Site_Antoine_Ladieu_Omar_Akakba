<?php include 'header.php'; ?>

<main>
    <div class="container">
        
        <?php
        
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            
            // jedois vider le panier 
            unset($_SESSION['cart']);
            
            // faux nuémro sinon ça marche pas 
            $order_number = rand(10000, 99999);
        ?>

            <div class="confirmation-box">
                <div class="success-icon">✅</div>
                <h1>Merci pour votre commande !</h1>
                <p class="order-ref">Commande n°<?php echo $order_number; ?></p>
                <p>Vos légumes frais sont en cours de préparation.</p>
                <p>Un email de confirmation vient d'être envoyé à votre adresse.</p>
                
                <a href="index.php" class="cta-button">Retourner à l'accueil</a>
            </div>

        <?php 
        } else { 
            // Si le gars arrive ici avec un panier vide (en rafraîchissant la page par exemple)
        ?>
            <div class="confirmation-box">
                <h1>Oups !</h1>
                <p>Votre panier est déjà vide ou votre commande a déjà été traitée.</p>
                <a href="index.php" class="cta-button">Retourner faire des courses</a>
            </div>
        <?php } ?>

    </div>
</main>

<?php include 'footer.php'; ?>