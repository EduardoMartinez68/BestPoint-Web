<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Stripe\Stripe;
use Stripe\Checkout\Session;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configuración de Stripe
Stripe::setApiKey($_ENV['APP_PASSWORD_STRIPE']);

// Obtener el ID de la sesión de pago de Stripe
$session_id = $_GET['session_id'] ?? null;

if (!$session_id) {
    echo "No se ha proporcionado un ID de sesión.";
    exit();
}

// Consultar la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=BestPoint', 'root', ''); // Asegúrate de usar las credenciales correctas
$stmt = $pdo->prepare("SELECT * FROM license WHERE session_id = :session_id");
$stmt->execute([':session_id' => $session_id]);
$license = $stmt->fetch();

$button="<center><a href='BestPoint.zip' class='button-download'>Descargar</a></center>";

if ($license) {
    // obtenemos los datos guardados con anterioridad en la base de datos
    $customer_email = $license['customer_email'];
    $customer_name = $license['customer_name'];
    $password = $license['password'];
} else {
    try {
        $session = Session::retrieve($session_id);

        if ($session->payment_status === 'paid') {
            //crearemos una password para el usuario 
            $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numeros = '0123456789';
        
            $password = '';
        
            // Añadir 5 caracteres aleatorios
            for ($i = 0; $i < 5; $i++) {
                $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }
        
            // Añadir 3 números aleatorios
            for ($i = 0; $i < 3; $i++) {
                $password .= $numeros[rand(0, strlen($numeros) - 1)];
            }
        
            // Mezclar la contraseña para garantizar una distribución aleatoria
            $password = str_shuffle($password);


            $customer_email = $session->customer_details->email;
            $customer_name = $session->customer_details->name;
            // Guarda la información en la base de datos
            $stmt = $pdo->prepare("INSERT INTO license (session_id, customer_email, customer_name) VALUES (:session_id, :customer_email, :customer_name, :password)");
            $stmt->execute([
                ':session_id' => $session_id,
                ':customer_email' => $customer_email,
                ':customer_name' => $customer_name,
                ':password' => $password
            ]);
        } else {
            echo "La compra no se completó.";
        }
    } catch (Exception $e) {
        echo "Error al verificar el pago: " . $e->getMessage();
    }
}


// Imprimir los datos de la compra
$purchase_details = "
<!DOCTYPE html>
<html lang=\"es\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
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
        a.button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        a.button:active {
            background-color: #004080;
        }

        a.button-download {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #28a745; /* Verde para el botón de descarga */
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a.button-download:hover {
            background-color: #218838;
        }

        a.button-download:active {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class=\"thank-you-container\">
        <img src=\"image/4.png\" alt=\"BestPoint Software\">
        <h1>Gracias por tu compra</h1>
        <p>Has adquirido BestPoint, el mejor software punto de venta de México.</p>
        <div class=\"contact-info\">
            <p>Si tienes cualquier duda, contáctanos:</p>
            <p>Tel: +52 444 304 2129</p>
        </div>
        <div class=\"credentials\">
            <p><strong>Email:</strong> $customer_email</p>
            <p><strong>Nombre:</strong> $customer_name</p>
            <p><strong>Password:</strong> $password</p>
            $button
        </div>
    </div>
</body>
</html>";
echo $purchase_details;
?>
