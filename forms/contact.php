<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Remplacez par votre adresse email de réception
$receiving_email_address = 'mouhameddabidelli@gmail.com';

// Chemin vers la bibliothèque PHP Email Form
$php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';

// Vérifiez si la bibliothèque existe
if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Initialisation de la classe PHP_Email_Form
$contact = new PHP_Email_Form;
$contact->ajax = true; // Activer la soumission AJAX

// Configuration de l'email
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'Unknown';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'no-reply@example.com';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'New Form Submission';

// Configuration SMTP (décommentez et remplissez avec vos informations SMTP)
/*
$contact->smtp = array(
    'host' => 'smtp.example.com', // Votre serveur SMTP (ex: smtp.gmail.com)
    'username' => 'your-email@example.com', // Votre adresse email
    'password' => 'your-email-password', // Votre mot de passe email
    'port' => '587', // Port SMTP (généralement 587 pour TLS)
    'encryption' => 'tls' // Type de chiffrement (tls ou ssl)
);
*/
$contact->smtp = array(
    'host' => 'smtp.gmail.com', // Serveur SMTP de Gmail
    'username' => 'your-email@gmail.com', // Votre adresse Gmail
    'password' => 'your-gmail-password', // Votre mot de passe Gmail
    'port' => '587', // Port SMTP pour TLS
    'encryption' => 'tls' // Chiffrement TLS
);
// Ajout des données du formulaire au message
$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : 'No message provided', 'Message', 10);

// Envoi de l'email et retour du résultat
echo $contact->send();
?>