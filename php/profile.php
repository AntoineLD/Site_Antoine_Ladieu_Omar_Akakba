<?php include 'header.php'; ?>

<?php
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];
?>

<main>
    <div class="container">
        <h1 style="text-align:center; margin:2rem 0;">Mon profil</h1>

        <div style="max-width:600px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 6px 20px rgba(0,0,0,0.06);">
            <p><strong>Nom :</strong> <?= htmlspecialchars($user['name']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p style="margin-top:1rem;"><a href="logout.php" class="cta-button">Se déconnecter</a></p>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
