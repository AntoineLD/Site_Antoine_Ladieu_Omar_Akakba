<?php include 'header.php'; ?>

<?php
require_once 'db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '') $errors[] = 'Le nom est requis.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email invalide.';
    if (strlen($password) < 6) $errors[] = 'Mot de passe trop court (6 caractères min).';

    if (empty($errors)) {
        $pdo = getPDO();

        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            $errors[] = 'Un compte existe déjà avec cet email.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $pdo->prepare('INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, NOW())');
            $insert->execute(['name' => $name, 'email' => $email, 'password' => $hash]);
            header('Location: login.php?registered=1');
            exit();
        }
    }
}
?>

<main>
    <div class="container">
        <h1 style="text-align:center; margin:2rem 0;">Inscription</h1>

        <?php if (!empty($errors)): ?>
            <div style="background:#ffe6e6; padding:1rem; border-radius:6px; margin-bottom:1rem;">
                <ul>
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" style="max-width:480px;margin:0 auto;">
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="cta-button">Créer mon compte</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
