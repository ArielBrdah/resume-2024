<?php
// Inclure le script d'authentification
include 'authenticate.php';

// Chemin du fichier à télécharger
$file = __DIR__.'/csv/interested.csv';

// Vérifier que le fichier existe
if (file_exists($file)) {
    // Définir les en-têtes pour le téléchargement du fichier
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Lire le fichier et envoyer le contenu
    readfile($file);
    exit;
} else {
    echo 'Le fichier demandé n\'existe pas.';
}
?>
