<?php include 'header.php'; ?>

<main>
    <div class="container">
        
        <?php
        
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            
            require_once 'db.php';
            $pdo = getPDO();

            
            $total = 0;
            foreach ($_SESSION['cart'] as $sku => $prod) {
                $total += floatval($prod['price']) * intval($prod['quantity']);
            }

           
            $order_number = 'FV' . time() . rand(100, 999);

           
            $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

            
            $stmt = $pdo->prepare('INSERT INTO orders (order_number, user_id, total, created_at) VALUES (:order_number, :user_id, :total, NOW())');
            $stmt->execute(['order_number' => $order_number, 'user_id' => $user_id, 'total' => $total]);
            $order_id = $pdo->lastInsertId();

            
            $insertItem = $pdo->prepare('INSERT INTO order_items (order_id, product_id, sku, product_name, unit_price, quantity) VALUES (:order_id, :product_id, :sku, :product_name, :unit_price, :quantity)');
            $findProduct = $pdo->prepare('SELECT id FROM products WHERE sku = :sku LIMIT 1');

            foreach ($_SESSION['cart'] as $sku => $prod) {
                
                $findProduct->execute(['sku' => $sku]);
                $row = $findProduct->fetch();
                $product_id = $row ? $row['id'] : null;

                $insertItem->execute([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'sku' => $sku,
                    'product_name' => $prod['name'],
                    'unit_price' => $prod['price'],
                    'quantity' => $prod['quantity']
                ]);
            }

            
            unset($_SESSION['cart']);

        ?>

            <div class="confirmation-box">
                <div class="success-icon">✅</div>
                <h1>Merci pour votre commande !</h1>
                <p class="order-ref">Commande n°<?php echo htmlspecialchars($order_number); ?></p>
                <p>Vos légumes frais sont en cours de préparation.</p>
                <p>Un email de confirmation vient d'être envoyé à votre adresse.</p>
                
                <a href="index.php" class="cta-button">Retourner à l'accueil</a>
            </div>

        <?php 
        } else { 
            
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