<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'mouhameddabidelli@gmail.com';

// Check if the PHP Email Form library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Initialize the PHP_Email_Form class
$contact = new PHP_Email_Form;
$contact->ajax = true; // Enable AJAX submission

// Set email details
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
    'host' => 'smtp.example.com', // Your SMTP server (e.g., smtp.gmail.com)
    'username' => 'your-email@example.com', // Your email address
    'password' => 'your-email-password', // Your email password
    'port' => '587', // SMTP port (usually 587 for TLS)
    'encryption' => 'tls' // Encryption type (tls or ssl)
);
*/

// Add form data to the email message
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10); // The number 10 limits the message to 10 lines

// Send the email and return the result
echo $contact->send();
?>