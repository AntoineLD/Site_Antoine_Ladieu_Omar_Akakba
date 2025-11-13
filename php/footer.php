<?php
date_default_timezone_set('Europe/Paris'); //pas le choix de def heure pour eviter erreur PHP
?>

<footer class="site-footer">
    <div class="container">
        
        <div class="footer-nav">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="#">Mentions Légales</a></li>
                <li><a href="#">Conditions Générales de Vente</a></li>
                <li><a href="contact.php">Contactez-nous</a></li>
            </ul>
        </div>

        <div class="footer-social">
            <h4>Suivez-nous</h4>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>

        <p class="copyright">&copy; <?php echo date('Y'); ?> FreshVeg. Tous droits réservés.</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const searchInput = document.getElementById('search-input');
        const productCards = document.querySelectorAll('.product-card');

        if (searchInput) {
            searchInput.addEventListener('keyup', function(event) {
                const textUtilisateur = event.target.value.toLowerCase();

                productCards.forEach(function(card) {
                    const titreProduit = card.querySelector('h4').textContent.toLowerCase();

                    if (titreProduit.includes(textUtilisateur)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }
    });
</script>

</body>
</html>