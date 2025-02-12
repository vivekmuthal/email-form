<?php
// send_mail.php

// If running via a web server, allow only GET, POST, and OPTIONS requests.
// (When running via CLI, this check is bypassed.)
if (php_sapi_name() !== 'cli') {
    $allowedMethods = ['GET', 'POST', 'OPTIONS'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    // If the method is not allowed, send a 405 response.
    if (!in_array($requestMethod, $allowedMethods)) {
        header('Allow: ' . implode(', ', $allowedMethods));
        header('HTTP/1.1 405 Method Not Allowed');
        exit('405 Method Not Allowed');
    }

    // If the method is OPTIONS, respond immediately with 200 OK.
    if ($requestMethod === 'OPTIONS') {
        header('HTTP/1.1 200 OK');
        exit();
    }
}

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'vivekmuthal07@gmail.com';   // Replace with your Gmail address
    $mail->Password   = 'kblc jrei jlfn olog';        // Replace with your Gmail app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('vivekmuthal07@gmail.com', 'Your Name');
    $mail->addAddress('vivekmuthal07@gmail.com', 'Recipient Name');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = "This is a test email sent from PHPMailer.";

    $mail->send();
    echo "Message sent successfully!" . PHP_EOL;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" . PHP_EOL;
}
?>
