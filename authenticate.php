<?php
// Nom d'utilisateur et mot de passe autorisés
$USERNAME = 'ab020390';
$PASSWORD = '020390ab';

// Fonction d'authentification
function authenticate() {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Please authenticate to continue, thank you!';
    exit;
}

// Vérifie si l'utilisateur a fourni des informations d'authentification
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    authenticate();
} else {
    // Compare les informations fournies avec celles attendues
    if ($_SERVER['PHP_AUTH_USER'] !== $USERNAME && $_SERVER['PHP_AUTH_PW'] !== $PASSWORD) {
        // Utilisateur non authentifié
        authenticate();
    }
}
?>
