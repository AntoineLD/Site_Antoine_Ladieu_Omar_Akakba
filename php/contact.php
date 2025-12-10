<?php include 'header.php'; ?>

<main>
    <div class="container">
        <h1 style="text-align: center; margin: 2rem 0;">Contactez-nous</h1>

        <p style="text-align: center; margin-bottom: 2rem;">Une question, une suggestion ou un problème ? Remplissez le formulaire ci-dessous.</p>

        <form action="traitement_contact.php" method="post" class="contact-form">
            
            <div class="form-group">
                <label for="name">Votre Nom et Prénom :</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Votre Email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="message">Votre Message :</label>
                <textarea id="message" name="message" rows="6" required></textarea>
            </div>

            <button type="submit" class="cta-button">Envoyer le message</button>

        </form>
    </div>
</main>

<?php include 'footer.php'; ?>