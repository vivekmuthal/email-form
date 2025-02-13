

<?php
// send_mail.php

// Make sure this file is hosted on a PHP-enabled server

// Load Composer's autoloader for PHPMailer
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// // Only allow POST requests
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     header('HTTP/1.1 405 Method Not Allowed');
//     exit('405 Method Not Allowed');
// }

// Sanitize and validate form inputs
$name          = htmlspecialchars($_POST['name'] ?? '');
$email         = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$number        = htmlspecialchars($_POST['number'] ?? '');
$subject       = htmlspecialchars($_POST['subject'] ?? 'No Subject');
$messageContent= htmlspecialchars($_POST['message'] ?? '');
$options       = htmlspecialchars($_POST['options'] ?? '');
$contactMethod = htmlspecialchars($_POST['contact_method'] ?? '');
$subscribe     = isset($_POST['subscribe']) ? 'Yes' : 'No';

// Prepare the email body using the submitted form data
$body  = "You have received a new contact form submission:\n\n";
$body .= "Name: {$name}\n";
$body .= "Email: {$email}\n";
$body .= "Number: {$number}\n";
$body .= "Subject: {$subject}\n";
$body .= "Message: {$messageContent}\n";
$body .= "Options: {$options}\n";
$body .= "Preferred Contact Method: {$contactMethod}\n";
$body .= "Subscribe: {$subscribe}\n";

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'vivekmuthal07@gmail.com';  // Replace with your Gmail address
    $mail->Password   = 'kblc jrei jlfn olog';             // Replace with your Gmail app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('vivekmuthal07@gmail.com', 'Your Name');  // Sender info
    $mail->addAddress('ritikawankhede06@gmail.com', 'Recipient Name'); // Recipient info

    // Email content
    $mail->isHTML(false);
    $mail->Subject = 'Contact Form Submission: ' . $subject;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
