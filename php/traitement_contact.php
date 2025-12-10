<?php include 'header.php'; ?>

<main>
    <div class="container" style="text-align: center; padding: 4rem 0;">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        $destinataire = "antoine.ladieu@gmail.com";
        $sujet = "Nouveau message du site de " . $name;
        $corps_du_message = "Message de : " . $name . " (" . $email . ")\n\n" . $message;

         mail($destinataire, $sujet, $corps_du_message);

        // Message de confirmation
        echo "<h1>Merci, " . $name . " !</h1>";
        echo "<p>Votre message a bien été reçu.</p>";
        echo '<a href="index.php" class="cta-button" style="margin-top: 2rem;">Retour à l\'accueil</a>';

    } else {
        echo "<h1>Accès non autorisé</h1>";
        echo "<p>Veuillez utiliser le formulaire de contact.</p>";
    }
    ?>

    </div>
</main>

<?php include 'footer.php'; ?>