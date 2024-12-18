<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alın
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $message = htmlspecialchars($_POST['message']);

    // Hedef e-posta adresi (gönderilecek kişi)
    $to = "your_email@example.com"; // Kendi e-posta adresinizi yazın
    $subject = "New Contact Form Message";

    // E-posta içeriği
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Address: $address\n";
    $email_content .= "Message:\n$message\n";

    // E-posta başlıkları
    $headers = "From: $email";

    // E-posta gönderme
    if (mail($to, $subject, $email_content, $headers)) {
        // Başarılı mesajı
        echo "Thank you! Your message has been sent.";
    } else {
        // Hata mesajı
        echo "Unable to send your message. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
