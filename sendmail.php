<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $service = htmlspecialchars($_POST['service']);
    $note = htmlspecialchars($_POST['note']);

    $to = "info@zuaqenergy.com";
    $subject = "New Contact Form Submission";
    $message = "Name: $name\nEmail: $email\nMobile: $mobile\nService: $service\nNote: $note";
    $headers = "From: noreply@zuaqenergy.com\r\n"; // Use a verified domain email
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
} else {
    header("Location: /"); // Redirect to the homepage
    exit;
}
?>
