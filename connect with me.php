<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alın
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $message = htmlspecialchars($_POST['message']);

    // E-posta adresinizi kontrol edin
    $to = "taabzkrt@gmail.com"; // Alıcı e-posta adresi

    // E-posta konusu
    $subject = "New Contact Form Message";

    // E-posta içeriği
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Address: $address\n";
    $email_content .= "Message:\n$message\n";

    // E-posta başlıkları
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // E-posta gönderimi
    if (mail($to, $subject, $email_content, $headers)) {
        // Başarılı yanıt
        echo "<div style='color: green; font-weight: bold;'>Thank you! Your message has been sent.</div>";
    } else {
        // Hata yanıtı
        echo "<div style='color: red; font-weight: bold;'>Unable to send your message. Please try again later.</div>";
    }
} else {
    echo "Invalid request method.";
}
?>
