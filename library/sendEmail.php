<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar las librerías de PHPMailer
require 'vendor/autoload.php';

function send_email($link,$customer_email, $recipient_name, $token, $password) {
    // Recibe los datos del formulario
    $name = $recipient_name;
    $email = $customer_email;

    // Dirección de correo electrónico a la que se enviará el correo
    $destinatario = $email;

    // Asunto del correo
    $asunto = "Compra de BestPoint";

    // Cuerpo del correo
    $cuerpo = "Token: $token\n";
    $cuerpo .= "Password:\n$password";
    $cuerpo .= "Nombre: $name\n";
    $cuerpo .= "Correo electrónico: $email\n";
    $cuerpo .= "Link: $link\n";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envía el correo
    $mail_enviado = mail($destinatario, $asunto, $cuerpo, $headers);
}
?>