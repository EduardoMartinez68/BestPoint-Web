<?php
    // Cargar la biblioteca dotenv
    require 'vendor/autoload.php';

    use Dotenv\Dotenv;
    // Inicializar dotenv y cargar las variables del archivo .env
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Ahora puedes acceder a las variables de entorno
    $stripeSecret = $_ENV['APP_PASSWORD_STRIPE'];
    $stripePublic = $_ENV['APP_PASSWORD_STRIPE_PUBLIC'];
    $stripeSecretTest = $_ENV['APP_PASSWORD_STRIPE_SECRET_TESTER'];

    //esto es para cargar las librerias de stripe
    require 'vendor/autoload.php';
    \Stripe\Stripe::setApiKey($stripeSecret);

    $link='http://localhost/BestPoint'; //este debe ser el link de la pagina

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $YOUR_DOMAIN = $link;
    
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => 'BestPoint Software Punto de Venta',
                        ],
                        'unit_amount' => 120000, // El precio en centavos (1200.00 MXN)
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/message.php?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $YOUR_DOMAIN . '/index.php',
        ]);
        
        header("Location: " . $checkout_session->url);
        
        exit();
    }
?>
