<?php
// send_mail.php

// Optional: If running via a web server, allow only GET and POST requests.
// If running from the command line (CLI), this check is bypassed.
if (php_sapi_name() !== 'cli') {
    $allowedMethods = ['GET', 'POST'];
    if (!in_array($_SERVER['REQUEST_METHOD'], $allowedMethods)) {
        header('Allow: ' . implode(', ', $allowedMethods));
        header('HTTP/1.1 405 Method Not Allowed');
        exit('405 Method Not Allowed');
    }
}

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                       // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                              // Enable SMTP authentication
    $mail->Username   = 'vivekmuthal07@gmail.com';         // Your Gmail address
    $mail->Password   = 'kblc jrei jlfn olog';              // Your Gmail app password (or real password if 2FA is off)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also available
    $mail->Port       = 587;                               // TCP port to connect to

    // Recipients
    $mail->setFrom('vivekmuthal07@gmail.com', 'Your Name');
    $mail->addAddress('vivekmuthal07@gmail.com', 'Recipient Name');  // Add a recipient

    // Content
    $mail->isHTML(false);                                  // Set email format to plain text
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = "This is a test email sent from PHPMailer via the command line or HTTP request.";

    // Send the email
    $mail->send();

    // Output success message
    echo "Message sent successfully!" . PHP_EOL;
} catch (Exception $e) {
    // Output error message if email sending fails
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" . PHP_EOL;
}
?>
