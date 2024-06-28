<?php
// Inclure le script d'authentification
include 'authenticate.php';

// Chemin du fichier à télécharger
$file = __DIR__.'/csv/interested.csv';

// // Vérifier que le fichier existe
// if (file_exists($file)) {
//     // Définir les en-têtes pour le téléchargement du fichier
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="' . basename($file) . '"');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($file));

//     // Lire le fichier et envoyer le contenu
//     readfile($file);
//     exit;
// } else {
//     echo 'Le fichier demandé n\'existe pas.';
// }


?>
<?php 
    $csvFile = __DIR__.'/csv/interested.csv'; 
    // Ouverture du fichier CSV
    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
        // Lire les en-têtes du CSV
        $headers = fgetcsv($handle, 1000, ',');
    
        // Initialiser le tableau pour les messages
        $messages = [];
    
        // Lire chaque ligne du fichier CSV et la stocker dans le tableau $messages
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $messages[] = array_combine($headers, $data);
        }
    
        // Fermer le fichier CSV
        fclose($handle);
    }
    ?>


<?php 
// echo var_dump($messages); 
include(__DIR__.'/sections/header.php'); ?>
<title>Ariel Berdah | Tickets</title>
<div id="fh5co-blog" class="fh5co-bg-dark">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Last Messages</h2>
                <p>Last messages received from users.</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($messages as $message): ?>
                <div class="col-md-4">
                    <div class="fh5co-blog animate-box">
                        <!-- Image placeholder, replace with appropriate image handling if needed -->
                        <div class="blog-text">
                            <span class="posted_on"><?php echo $message['subject']; ?></span>
                            <h3><?php echo $message['fname'] . ' ' . $message['lname']; ?></h3>
                            <p><?php echo $message['message']; ?></p>
                            <ul class="stuff">
                                <!-- Email as a mailto link, can be hidden or handled differently if sensitive -->
                                <li><a href="#<?php echo isset($message['posted_at']) ? $message['posted_at'] : "" ; ?>"><?php echo isset($message['posted_at']) ? $message['posted_at'] : "" ; ?></a></li>
                                <li><a href="mailto:<?php echo $message['email']; ?>"><?php echo $message['email']; ?></a></li>
                            </ul>
                        </div> 
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once(__DIR__.'/sections/footer.php'); ?>