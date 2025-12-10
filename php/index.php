<?php include 'header.php'; ?>

<main>
 <section id="hero">
        <div class="container">
            <div class="hero-glass-card">
                <h2>Le meilleur du marché, directement dans votre cuisine.</h2>
                <p>Des légumes de saison, cueillis avec soin par nos producteurs locaux.</p>
                <a href="#featured-products" class="cta-button">Découvrir notre sélection</a>
            </div>
            </div>
    </section>

    <section id="featured-products">
        <div class="container">
            <h3>Nos 12 Légumes de Saison</h3>
            
            <div class="search-container">
                <input type="text" id="search-input" placeholder="🔍 Rechercher (ex: radis, poireau)...">
            </div>
            
            <div class="products-grid">
                <?php
                // Charger les produits depuis la base de données
                require_once 'db.php';
                try {
                    $pdo = getPDO();
                    $stmt = $pdo->query('SELECT sku, name, description, price, image FROM products ORDER BY id ASC');
                    $products = $stmt->fetchAll();
                } catch (Exception $e) {
                    $products = [];
                }

                if (empty($products)) {
                    echo '<p>Aucun produit disponible pour le moment.</p>';
                } else {
                    foreach ($products as $p):
                        // utiliser le sku comme identifiant public
                        $sku = htmlspecialchars($p['sku']);
                        $pname = htmlspecialchars($p['name']);
                        $pprice = number_format($p['price'], 2);
                        $pimage = htmlspecialchars($p['image']);
                ?>

                <article class="product-card" id="prod-<?= $sku ?>">
                    <img src="<?= $pimage ?>" alt="<?= $pname ?>">
                    <div class="card-content">
                        <h4><?= $pname ?></h4>
                        <p class="product-price"><?= $pprice ?>€</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="<?= $sku ?>">
                            <input type="hidden" name="product_name" value="<?= $pname ?>">
                            <input type="hidden" name="product_price" value="<?= $p['price'] ?>">
                            <input type="hidden" name="product_image" value="<?= $pimage ?>">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <?php
                    endforeach;
                }
                ?>

                <article class="product-card" id="prod-haricot_vert01">
                    <img src="assets/img/haricots_verts.png" alt="Haricots Verts">
                    <div class="card-content">
                        <h4>Haricots verts Bio</h4>
                        <p class="product-price">2.50€ / kg</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="haricot_vert01">
                            <input type="hidden" name="product_name" value="Haricots verts Bio">
                            <input type="hidden" name="product_price" value="2.50">
                            <input type="hidden" name="product_image" value="assets/img/haricots_verts.png">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-haricot_blanc01">
                    <img src="assets/img/haricots_blancs.png" alt="Haricots Blancs">
                    <div class="card-content">
                        <h4>Haricots Blancs</h4>
                        <p class="product-price">2.00€ / kg</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="haricot_blanc01">
                            <input type="hidden" name="product_name" value="Haricots Blancs">
                            <input type="hidden" name="product_price" value="2.00">
                            <input type="hidden" name="product_image" value="assets/img/haricots_blancs.png">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-celeri01">
                    <img src="assets/img/céleri.png" alt="Céleri">
                    <div class="card-content">
                        <h4>Branche de céleri Bio</h4>
                        <p class="product-price">1.00€ / branche</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="celeri01">
                            <input type="hidden" name="product_name" value="Branche de céleri Bio">
                            <input type="hidden" name="product_price" value="1.00">
                            <input type="hidden" name="product_image" value="assets/img/céleri.png">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-patate01">
                    <img src="assets/img/agata.jpg" alt="Pommes de terre">
                    <div class="card-content">
                        <h4>Pommes de Terre Bio</h4>
                        <p class="product-price">1.90€ / kg</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="patate01">
                            <input type="hidden" name="product_name" value="Pommes de Terre Agata Bio">
                            <input type="hidden" name="product_price" value="1.90">
                            <input type="hidden" name="product_image" value="assets/img/agata.jpg">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-poivron01">
                    <img src="assets/img/poivron.jpg" alt="Poivrons Rouges">
                    <div class="card-content">
                        <h4>Poivrons Rouges Bio</h4>
                        <p class="product-price">4.90€ / kg</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="poivron01">
                            <input type="hidden" name="product_name" value="Poivrons Rouges Bio">
                            <input type="hidden" name="product_price" value="4.90">
                            <input type="hidden" name="product_image" value="assets/img/poivron.jpg">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-aubergine01">
                    <img src="assets/img/aubergine.png" alt="Aubergines">
                    <div class="card-content">
                        <h4>Aubergines Violettes Bio</h4>
                        <p class="product-price">3.50€ / kg</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="aubergine01">
                            <input type="hidden" name="product_name" value="Aubergines Violettes Bio">
                            <input type="hidden" name="product_price" value="3.50">
                            <input type="hidden" name="product_image" value="assets/img/aubergine.png">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-radis01">
                    <img src="assets/img/radis_roses.jpg" alt="Radis Roses">
                    <div class="card-content">
                        <h4>Botte de Radis Bio</h4>
                        <p class="product-price">1.50€ / botte</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="radis01">
                            <input type="hidden" name="product_name" value="Botte de Radis Roses Bio">
                            <input type="hidden" name="product_price" value="1.50">
                            <input type="hidden" name="product_image" value="assets/img/radis_roses.jpg">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-brocoli01">
                    <img src="assets/img/broco.png" alt="Brocolis">
                    <div class="card-content">
                        <h4>Brocoli Vert Bio</h4>
                        <p class="product-price">2.20€ / pièce</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="brocoli01">
                            <input type="hidden" name="product_name" value="Brocoli Vert Bio">
                            <input type="hidden" name="product_price" value="2.20">
                            <input type="hidden" name="product_image" value="assets/img/broco.png">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card" id="prod-poireau01">
                    <img src="assets/img/poireaux.jpg" alt="Poireaux">
                    <div class="card-content">
                        <h4>Poireaux d'Hiver Bio</h4>
                        <p class="product-price">2.90€ / kg</p>
                        <form action="ajout_panier.php" method="post" class="ajax-form">
                            <input type="hidden" name="product_id" value="poireau01">
                            <input type="hidden" name="product_name" value="Poireaux d'Hiver Bio">
                            <input type="hidden" name="product_price" value="2.90">
                            <input type="hidden" name="product_image" value="assets/img/poireaux.jpg">
                            
                            <div class="quantity-selector">
                                <button type="button" class="qty-btn minus">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="qty-input" readonly>
                                <button type="button" class="qty-btn plus">+</button>
                            </div>
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>