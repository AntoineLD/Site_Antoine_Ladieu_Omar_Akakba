<?php
date_default_timezone_set('Europe/Paris');
// Déterminer le chemin racine basé sur le fichier qui inclut ce footer
$basePath = dirname($_SERVER['SCRIPT_FILENAME']);
$basePath = strpos($basePath, 'pages') !== false || strpos($basePath, 'api') !== false ? '../../' : '';
?>

<footer class="site-footer">
    <div class="container">
        
        <div class="footer-nav">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="#">Mentions Légales</a></li>
                <li><a href="#">Conditions Générales de Vente</a></li>
                <li><a href="<?= $basePath ?>pages/contact/index.php">Contactez-nous</a></li>
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

<script src="<?= $basePath ?>js/script.js"></script>

</body>
</html>
