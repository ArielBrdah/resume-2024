<?php
$posted = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$posted = true;
    // Récupérer les données du formulaire
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Valider et nettoyer les données (optionnel)

    // Envoi par email
    // $to = "acberdah@gmail.com";
    // $subject_email = "New Inquiry: $subject";
    // $message_email = "You have received a new inquiry from $fname $lname.\n\n";
    // $message_email .= "Email: $email\n";
    // $message_email .= "Message:\n$message";

    // $headers = "From: $email\r\n";
    // $headers .= "Reply-To: $email\r\n";

    // Envoyer l'email
    // if (mail($to, $subject_email, $message_email, $headers)) {
    //     echo "Thank you for your message. We will contact you shortly.";
    // } else {
    //     echo "Oops! Something went wrong. Please try again later.";
    // }

    // Enregistrement dans un fichier CSV
    $data = array($fname, $lname, $email, $subject, $message);
    $file = 'csv/interested.csv';

    // Vérifier si le fichier existe, sinon créer le fichier avec les en-têtes
    if (!file_exists($file)) {
        $fp = fopen($file, 'w');
        fputcsv($fp, array('First Name', 'Last Name', 'Email', 'Subject', 'Message'));
    } else {
        $fp = fopen($file, 'a');
    }

    // Écrire les données dans le fichier CSV
    fputcsv($fp, $data);

    // Fermer le fichier CSV
    fclose($fp);
}
$msg = 'Message submitted successfully!';
if( $posted ) require(__DIR__.'/index.php');
else  {
	http_response_code(403);
	exit();
}
?>
