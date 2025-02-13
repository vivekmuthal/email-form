


<?php
// send_mail.php

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
    $mail->Username   = 'vivekmuthal07@gmail.com';      // Replace with your Gmail address
    $mail->Password   = 'kblc jrei jlfn olog';           // Use an app-specific password if using 2FA
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('vivekmuthal07@gmail.com', 'Your Name');
    $mail->addAddress('vivekmuthal07@gmail.com', 'Recipient Name');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = "This is a test email sent from PHPMailer via the command line.";

    $mail->send();
    echo "Message sent successfully!" . PHP_EOL;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" . PHP_EOL;
}
?>

