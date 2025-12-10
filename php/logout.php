<?php
session_start();
// Détruire uniquement les données d'auth
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

header('Location: index.php');
exit();
