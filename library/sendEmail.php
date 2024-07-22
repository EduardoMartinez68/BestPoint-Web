<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar las librerías de PHPMailer
require 'vendor/autoload.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; // Cambia esto por tu servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@example.com'; // Cambia esto por tu correo electrónico
    $mail->Password   = 'your_email_password'; // Cambia esto por tu contraseña de correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remitente y destinatario
    $mail->setFrom('your_email@example.com', 'BestPoint');
    $mail->addAddress('recipient@example.com'); // Cambia esto por el correo del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Gracias por tu compra';
    $mail->Body    = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gracias por tu compra</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .thank-you-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
                width: 100%;
            }
            .thank-you-container img {
                max-width: 100px;
                margin-bottom: 20px;
            }
            .thank-you-container h1 {
                font-size: 24px;
                color: #004AAD;
                margin-bottom: 10px;
            }
            .thank-you-container p {
                font-size: 18px;
                color: #333;
                margin-bottom: 20px;
            }
            .contact-info {
                font-size: 16px;
                color: #333;
                margin-bottom: 20px;
            }
            .credentials {
                background-color: #e0e0e0;
                padding: 10px;
                border-radius: 5px;
                text-align: left;
            }
            .credentials p {
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <div class="thank-you-container">
            <img src="https://cdn-icons-png.flaticon.com/512/1347/1347498.png" alt="BestPoint Software">
            <h1>Gracias por tu compra</h1>
            <p>Has adquirido BestPoint, el mejor software de punto de venta.</p>
            <div class="contact-info">
                <p>Si tienes cualquier duda, contáctanos:</p>
                <p>Tel: +52 444 304 2129</p>
            </div>
            <div class="credentials">
                <p><strong>Usuario:</strong> [tu_usuario]</p>
                <p><strong>Contraseña:</strong> [tu_contraseña]</p>
            </div>
        </div>
    </body>
    </html>
    ';

    $mail->send();
    echo 'Correo enviado con éxito';
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Mailer Error: {$mail->ErrorInfo}";
}
?>