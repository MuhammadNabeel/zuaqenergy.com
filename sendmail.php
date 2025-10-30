<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@zuaqenergy.com";
    $subject = "New Quote Request from Zuaq Energy Website";
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $mobile = htmlspecialchars($_POST["mobile"]);
    $service = htmlspecialchars($_POST["service"]);
    $note = htmlspecialchars($_POST["note"]);

    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Mobile: $mobile\n";
    $message .= "Service: $service\n";
    $message .= "Note: $note\n";

    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for contacting us. We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    echo "Invalid request.";
}
?>