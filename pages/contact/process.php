<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php'; 

include '../../utils/header.php'; 
?>

<main>
    <div class="container" style="text-align: center; padding: 4rem 0;">

    <?php
    $errors = [];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // --- VALIDATION DES DONNÉES ---
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $message = isset($_POST['message']) ? trim($_POST['message']) : '';
        
        // Vérifier que les champs ne sont pas vides
        if ($name === '') {
            $errors[] = 'Le nom est requis.';
        } elseif (strlen($name) < 2 || strlen($name) > 100) {
            $errors[] = 'Le nom doit contenir entre 2 et 100 caractères.';
        }
        
        if ($email === '') {
            $errors[] = 'L\'email est requis.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email n\'est pas valide.';
        }
        
        if ($message === '') {
            $errors[] = 'Le message est requis.';
        } elseif (strlen($message) < 10) {
            $errors[] = 'Le message doit contenir au moins 10 caractères.';
        } elseif (strlen($message) > 5000) {
            $errors[] = 'Le message ne doit pas dépasser 5000 caractères.';
        }
        
        // Vérifier les injections XSS - caractères suspects
        if (preg_match('/<script|<iframe|javascript:|on\w+\s*=/i', $name . $message)) {
            $errors[] = 'Contenu suspecté détecté dans votre message.';
        }
        
        // Si pas d'erreur, traiter l'email
        if (empty($errors)) {
            // Échapper les données pour affichage sécurisé
            $name_safe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $email_safe = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $message_safe = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
            $message_safe_html = nl2br($message_safe); // Préserver les retours à la ligne

            // Création de l'objet PHPMailer
            $mail = new PHPMailer(true);

            try {
                // --- CONFIGURATION DU SERVEUR (SMTP GMAIL) ---
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                
                // Tes identifiants
                $mail->Username   = 'antoine.ladieu@gmail.com'; 
                $mail->Password   = 'uiid eiqt daob yxtu'; // Ton mot de passe d'application
                
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // --- DESTINATAIRES ---
                $mail->setFrom('antoine.ladieu@gmail.com', 'Site Web Contact');
                $mail->addAddress('antoine.ladieu@gmail.com');
                // Ajouter l'email de l'utilisateur en réponse
                $mail->addReplyTo($email_safe, $name_safe);
                
                // --- CONTENU DU MESSAGE ---
                $mail->isHTML(true);
                $mail->Subject = "Nouveau message de contact: " . $name_safe;
                $mail->Body = "<h2>Nouveau message de contact</h2>
                              <p><strong>Nom:</strong> $name_safe</p>
                              <p><strong>Email:</strong> $email_safe</p>
                              <p><strong>Message:</strong></p>
                              <p>$message_safe_html</p>";
                
            
                $mail->send();
                
                echo '<div style="background:#e8f6e8; padding:1rem; border-radius:6px; margin-bottom:1rem;">';
                echo '<h2>✅ Message envoyé avec succès !</h2>';
                echo '<p>Nous vous répondrons dans les plus brefs délais.</p>';
                echo '</div>';
                
            } catch (Exception $e) {
                echo '<div style="background:#ffe6e6; padding:1rem; border-radius:6px; margin-bottom:1rem;">';
                echo '<h2>❌ Erreur lors de l\'envoi du message</h2>';
                echo '<p>Une erreur technique s\'est produite. Veuillez réessayer plus tard.</p>';
                echo '</div>';
            }
        } else {
            // Afficher les erreurs de validation (si besoi)
            echo '<div style="background:#ffe6e6; padding:1rem; border-radius:6px; margin-bottom:1rem;">';
            echo '<h2>❌ Erreurs dans le formulaire</h2>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    } else {
        echo '<p>Veuillez soumettre le formulaire de contact.</p>';
    }
    ?>
    
    </div>
</main>

<?php include '../../utils/footer.php'; ?>
