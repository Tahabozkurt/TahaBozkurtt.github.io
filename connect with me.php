<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alın
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $message = htmlspecialchars($_POST['message']);

    // Hedef e-posta adresi (gönderilecek kişi)
    $to = "taabzkrt@gmail.com"; // Burada e-postanız tanımlı

    // E-posta konusu
    $subject = "New Contact Form Message";

    // E-posta içeriği
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Address: $address\n";
    $email_content .= "Message:\n$message\n";

    // E-posta başlıkları
    $headers = "From: $email";

    // E-posta gönderme işlemi
    if (mail($to, $subject, $email_content, $headers)) {
        // Başarılı mesajı
        echo "<div style='color: green;'>Thank you! Your message has been sent.</div>";
    } else {
        // Hata mesajı
        echo "<div style='color: red;'>Unable to send your message. Please try again.</div>";
    }
} else {
    echo "Invalid request method.";
}
?>
