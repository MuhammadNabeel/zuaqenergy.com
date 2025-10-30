<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer via Composer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $service = htmlspecialchars($_POST['service']);
    $note = htmlspecialchars($_POST['note']);

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'your-email-password'; // Replace with your Gmail password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Content
        $mail->setFrom('noreply@zuaqenergy.com', 'Zuaq Energy');
        $mail->addAddress('info@zuaqenergy.com');
        $mail->addReplyTo($email, $name);

        $mail->isHTML(false);
        $mail->Subject = "New Contact Form Submission";
        $mail->Body = "Name: $name\nEmail: $email\nMobile: $mobile\nService: $service\nNote: $note";

        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send the message. Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: /"); // Redirect to the homepage
    exit;
}
?>
