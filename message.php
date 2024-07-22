<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Stripe\Stripe;
use Stripe\Checkout\Session;

// load variable of hub
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// setting of stripe
Stripe::setApiKey($_ENV['APP_PASSWORD_STRIPE']);

// get the session id el ID for stripe
$session_id = $_GET['session_id'] ?? null;


//if not exist a session id show a error
if (!$session_id) {
    header("Location: links/error.php");
    exit();
}

// connection with the database
require 'library/database.php';
$connection=connect_database();
$query = "SELECT * FROM license WHERE session_id = '$session_id'";
$result=mysqli_query($connection,$query);

//this is for know if all continue success and not exist a error
$continue=true;

//we see if exist a error to connection the database
if (!$result){
    header("Location: links/error.php");
    exit();
}

// if we can connection the database, read all the results
if (mysqli_num_rows($result) > 0) {
    //we will get the data of the buy old
    while ($row = mysqli_fetch_assoc($result)) {
        // get the data of the buy
        $customer_email = $row['customer_email'];
        $customer_name = $row['customer_name'];
        $token = $row['token'];
        $password = $row['password'];
    }
} else {
    //we will see if the buy is success
    try {
        $session = Session::retrieve($session_id); //get the session id
        if ($session->payment_status === 'paid'){
            //get the data of the buy
            $customer_email = $session->customer_details->email;
            $customer_name = $session->customer_details->name;
            $token=create_token();
            $password=create_password();

            // save the information in the database
            if (!save_data_token($connection, $session_id, $customer_email, $customer_name, $token, $password)){
                //if the information not can save in the database show a message of error
                header("Location: links/error.php");
                exit();
            }

            require 'library/sendEmail.php';
            $link='https://capacitatkocina.com/message.php?session_id='.$session_id;
            send_email($link,$customer_email, $recipient_name, $token, $password);
        } else {
            echo "La compra no se completó.";
            $continue=false;
        }
    } catch (Exception $e) {
        echo "Error al verificar el pago: " . $e->getMessage();
        $continue=false;
    }
}

// close connection
mysqli_close($connection);


//if exist a error, render the error UI 
if(!$continue){
    header("Location: links/error.php");
    exit();
}





function create_password(){
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
    return $password;
}

function create_token(){
    // Caracteres permitidos para el token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $token = '';

    // Generar un token de 5 caracteres
    for ($i = 0; $i < 5; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }

    return $token;
}

function save_data_token($connection, $session_id, $customer_email, $customer_name, $token, $password) {
    $session_id = mysqli_real_escape_string($connection, $session_id);
    $customer_email = mysqli_real_escape_string($connection, $customer_email);
    $customer_name = mysqli_real_escape_string($connection, $customer_name);
    $token = mysqli_real_escape_string($connection, $token);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "INSERT INTO license (session_id, customer_email, customer_name, token, password) VALUES ('$session_id', '$customer_email', '$customer_name', '$token', '$password')";
    
    $result = mysqli_query($connection, $query);

    if ($result) {
        return true;
    } else {
        return false;
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
            <p><strong>Token:</strong> $token</p>
            <p><strong>Password:</strong> $password</p>
            <center><a href='BestPoint.zip' class='button-download'>Descargar</a></center>
        </div>
    </div>
</body>
</html>";
echo $purchase_details;
?>
