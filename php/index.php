<?php include 'header.php'; ?>

<main>
    <section id="hero">
        <div class="container">
            <h2>Le meilleur du marché, directement dans votre cuisine.</h2>
            <p>Des légumes de saison, cueillis avec soin par nos producteurs locaux.</p>
            <a href="#featured-products" class="cta-button">Découvrir notre sélection</a>
        </div>
    </section>

    <section id="featured-products">
        <div class="container">
            <h3>Les incontournables du moment</h3>
            
            <div class="search-container">
                <input type="text" id="search-input" placeholder="🔍 Rechercher une tomate, une carotte...">
            </div>
            <div class="products-grid">
            
                <article class="product-card">
                    <img src="assets/img/tomates.png" alt="Grappe de tomates bio juteuses">
                    <div class="card-content">
                        <h4>Tomates Cœur de Bœuf Bio</h4>
                        <p class="product-price">4.50€ / kg</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="tomate01">
                            <input type="hidden" name="product_name" value="Tomates Cœur de Bœuf Bio">
                            <input type="hidden" name="product_price" value="4.50">
                            <input type="hidden" name="product_image" value="../assets/img/tomates.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card">
                    <img src="assets/img/carottes.png" alt="Botte de carottes nouvelles">
                    <div class="card-content">
                        <h4>Carottes des Sables</h4>
                        <p class="product-price">2.80€ / botte</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="carotte01">
                            <input type="hidden" name="product_name" value="Carottes des Sables">
                            <input type="hidden" name="product_price" value="2.80">
                            <input type="hidden" name="product_image" value="../assets/img/carottes.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                <article class="product-card">
                    <img src="assets/img/courgette.png" alt="Courgettes vertes bio">
                    <div class="card-content">
                        <h4>Courgettes Vertes Bio</h4>
                        <p class="product-price">3.20€ / kg</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="courgette01">
                            <input type="hidden" name="product_name" value="Courgettes Vertes Bio">
                            <input type="hidden" name="product_price" value="3.20">
                            <input type="hidden" name="product_image" value="../assets/img/courgette.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>
                
                <article class="product-card">
                    <img src="assets/img/haricots_verts.png" alt="Haricots verts frais">
                    <div class="card-content">
                        <h4>Haricots verts Bio</h4>
                        <p class="product-price">2.50€ / kg</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="haricot_vert01">
                            <input type="hidden" name="product_name" value="Haricots verts Bio">
                            <input type="hidden" name="product_price" value="2.50">
                            <input type="hidden" name="product_image" value="../assets/img/haricots_verts.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>
                
                <article class="product-card">
                    <img src="assets/img/haricots_blancs.png" alt="Haricots blancs secs">
                    <div class="card-content">
                        <h4>Haricots</h4>
                        <p class="product-price">2.00€ / kg</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="haricot_blanc01">
                            <input type="hidden" name="product_name" value="Haricots">
                            <input type="hidden" name="product_price" value="2.00">
                            <input type="hidden" name="product_image" value="../assets/img/haricots_blancs.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>
                
                <article class="product-card">
                    <img src="assets/img/céleri.png" alt="Branche de céleri fraîche">
                    <div class="card-content">
                        <h4>Branche de céleri Bio</h4>
                        <p class="product-price">1.00€ / branche</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="celeri01">
                            <input type="hidden" name="product_name" value="Branche de céleri Bio">
                            <input type="hidden" name="product_price" value="1.00">
                            <input type="hidden" name="product_image" value="../assets/img/céleri.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                 <article class="product-card">
                    <img src="assets/img/aubergine.png" alt="Aubergine bio">
                    <div class="card-content">
                        <h4>Aubergine bio</h4>
                        <p class="product-price">2.00€</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="aubergine01">
                            <input type="hidden" name="product_name" value="Aubergine bio">
                            <input type="hidden" name="product_price" value="2.00">
                            <input type="hidden" name="product_image" value="../assets/img/aubergine.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                 <article class="product-card">
                    <img src="assets/img/agata.jpg" alt="Pomme de terre Agata bio">
                    <div class="card-content">
                        <h4>Pomme de terre Agata bio</h4>
                        <p class="product-price">4.00€ / kg</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="agata01">
                            <input type="hidden" name="product_name" value="Pomme de terre Agata bio">
                            <input type="hidden" name="product_price" value="4.00">
                            <input type="hidden" name="product_image" value="../assets/img/agata.jpg">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                 <article class="product-card">
                    <img src="assets/img/broco.png" alt="Brocolis bio">
                    <div class="card-content">
                        <h4>Brocolis bio</h4>
                        <p class="product-price">3.00€ / botte</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="brocoli01">
                            <input type="hidden" name="product_name" value="Brocolis bio">
                            <input type="hidden" name="product_price" value="3.00">
                            <input type="hidden" name="product_image" value="../assets/img/brocolis.jpg">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                 <article class="product-card">
                    <img src="assets/img/radis_roses.jpg" alt="Radis roses bio">
                    <div class="card-content">
                        <h4>Radis roses bio</h4>
                        <p class="product-price">1.75€ / botte</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="radis01">
                            <input type="hidden" name="product_name" value="Radis roses bio">
                            <input type="hidden" name="product_price" value="1.75">
                            <input type="hidden" name="product_image" value="../assets/img/radis_roses.jpg">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                 <article class="product-card">
                    <img src="assets/img/poivron.jpg" alt="Poivron rouge bios">
                    <div class="card-content">
                        <h4>Poivron rouge bio</h4>
                        <p class="product-price">0.75€</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="poivron01">
                            <input type="hidden" name="product_name" value="Poivron rouge bio">
                            <input type="hidden" name="product_price" value="0.75">
                            <input type="hidden" name="product_image" value="../assets/img/poivron.png">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

                 <article class="product-card">
                    <img src="assets/img/poireaux.jpg" alt="Poireaux bio">
                    <div class="card-content">
                        <h4>Poireau bio</h4>
                        <p class="product-price">1.00€</p>
                        <form action="ajout_panier.php" method="post">
                            <input type="hidden" name="product_id" value="poireau01">
                            <input type="hidden" name="product_name" value="Poireau bio">
                            <input type="hidden" name="product_price" value="1.00">
                            <input type="hidden" name="product_image" value="../assets/img/poireaux.jpg">
                            <button type="submit" class="add-to-cart-button">Ajouter au panier</button>
                        </form>
                    </div>
                </article>

            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>