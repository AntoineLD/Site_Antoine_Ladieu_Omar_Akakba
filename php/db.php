<?php
require_once __DIR__ . '/config/parameters.php';

// Cette version tente automatiquement les ports MySQL courants (MAMP: 8889 / système: 3306)

function getPDO()
{
   

   
    $envPort = DB_PORT ?: null;
    $portsToTry = [];
    if ($envPort) {
        $portsToTry[] = (int)$envPort;
    }
    
    $portsToTry[] = 8889;
    $portsToTry[] = 3306;

    $lastException = null;

    foreach ($portsToTry as $port) {
        
        static $seen = [];
        if (in_array($port, $seen, true)) continue;
        $seen[] = $port;

        $dsn = "mysql:host=" . DB_HOST . ";port=" . $port . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            echo "Échec de la connexion avec le port $port : " . $e->getMessage() . "\n";
            $lastException = $e;
            
        }
    }


    $msg = 'Erreur de connexion à la base de données : ' . ($lastException ? $lastException->getMessage() : 'connexion impossible') . 
           '. Vérifiez que MySQL (MAMP) est démarré, que le port et les identifiants dans php/db.php sont corrects.';
    
    die($msg);
}

?>
