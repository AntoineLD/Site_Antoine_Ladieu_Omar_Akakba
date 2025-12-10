<?php include 'header.php'; ?>

<?php
require_once 'db.php';

$errors = [];

if (isset($_GET['registered'])) {
    echo '<div class="container" style="max-width:600px;margin:1rem auto;"><p style="background:#e8f6e8;padding:12px;border-radius:6px;">Inscription réussie, vous pouvez vous connecter.</p></div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email invalide.';
    if ($password === '') $errors[] = 'Mot de passe requis.';

    if (empty($errors)) {
        $pdo = getPDO();
        $stmt = $pdo->prepare('SELECT id, name, email, password FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Authentification OK
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];

            // Si une tentative d'ajout était en attente, l'appliquer alors on redirige vers le panier
            if (isset($_SESSION['pending_add'])) {
                $pending = $_SESSION['pending_add'];
                if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
                $pid = $pending['product_id'];
                $qty = max(1, (int)$pending['quantity']);

                if (isset($_SESSION['cart'][$pid])) {
                    $_SESSION['cart'][$pid]['quantity'] += $qty;
                } else {
                    $_SESSION['cart'][$pid] = [
                        'name' => $pending['product_name'] ?? '',
                        'price' => $pending['product_price'] ?? 0,
                        'image' => $pending['product_image'] ?? '',
                        'quantity' => $qty
                    ];
                }
                unset($_SESSION['pending_add']);
                header('Location: panier.php');
                exit();
            }

            // Redirection normale
            $next = $_GET['next'] ?? null;
            if ($next) {
                header('Location: ' . $next);
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $errors[] = 'Email ou mot de passe incorrect.';
        }
    }
}
?>

<main>
    <div class="container">
        <h1 style="text-align:center; margin:2rem 0;">Connexion</h1>

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
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="cta-button">Se connecter</button>
        </form>

        <p style="text-align:center; margin-top:1rem;">Pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
    </div>
</main>

<?php include 'footer.php'; ?>
