<?php

$name = $_POST["name"];
$from = $_POST["email"];
$subject = "Wiadomośc z formularza na stronie";
$to = "jakubpachut@gmail.com";
$message = $_POST["msg"];

$txt = "Imię: " . $name . "\r\n" . "Email: " . $from . "\r\n" . "Treść: " . $message;

$headers = "From:" . $from . "\r\n";
$headers .= "Reply-To:" . $from . "\r\n";

$mail_status = mail($to, $subject, $txt, $headers);

if ($mail_status) {
    header("Location: /lump_society/contact.html?mail_status=sent");
} else {
    header("Location: /lump_society/contact.html?mail_status=error");
}
