<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestPoint - El software punto de venta más fácil y económico</title>
    <style>
    </style>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.4.2/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.2/uicons-brands/css/uicons-brands.css'>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stores.css">
    <link rel="stylesheet" href="css/prices.css">
    <link rel="stylesheet" href="css/sections.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <header>
        <div class="container">
            <br>
            <h1><b><i class="fi fi-ss-rocket-lunch"></i> BestPoint el mejor punto de venta de México</b></h1><br>
            <label>Administra mejor tu negocio, atiende más rápido a tus clientes e incrementa tus ventas. ¡Descárgalo
                Gratis por 100 días!</label>
            <br><br>
            <div class="buttons">
                <a onclick="scrollToPricing()" class="buttons-buy">Comprar</a>
                <a onclick="scrollToPricing()">Demo</a>
            </div>
        </div>
    </header>


    <div class="container">
        <h2 style="color: rgba(0,0,0,.25);">El software POS más fácil y económico del mercado</h2>
        <div class="content-section">
            <div class="content-text">
                <h1>Realiza ventas más fácil que nunca</h1>
                <label>
                    Con una interfaz amigable y diseñada para la máxima eficiencia, llevar a cabo tus transacciones
                    nunca ha sido tan sencillo y rápido. Cada paso se simplifica para que puedas centrarte en lo que
                    realmente importa: tu negocio.
                </label>
                <br><br>
                <button class="btn-whatsapp" onclick="contactarPorWhatsApp()"><i class="fi fi-brands-whatsapp"></i> Contactarme con alguien</button>
            </div>
            <div class="content-image">
                <img src="image/1.png" alt="Interfaz amigable">
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <div class="section-title">
            <h1>Compatible con cualquier Giro Comercial</h1>
            <h2>BestPoint se adapta con facilidad a cualquier giro comercial como: abarrotes, farmacias, supermercados,
                refaccionarias y muchos más.</h2>
        </div>

        <div class="cards-container">
            <div class="card-shop" data-name="abarrotes" onclick="scrollToPricing()">
                <i class="fi fi-sr-store-alt"></i>
                <h3>Abarrotes</h3>
            </div>
            <div class="card-shop" data-name="farmacias" onclick="scrollToPricing()">
                <i class="fi fi-ss-pharmacy"></i>
                <h3>Farmacias</h3>
            </div>
            <div class="card-shop" data-name="ferreterias" onclick="scrollToPricing()">
                <i class="fi fi-br-tools"></i>
                <h3>Ferreterías</h3>
            </div>
            <div class="card-shop" data-name="refaccionarias" onclick="scrollToPricing()">
                <i class="fi fi-bs-car"></i>
                <h3>Refaccionarias</h3>
            </div>
            <div class="card-shop" data-name="boutique" onclick="scrollToPricing()">
                <i class="fi fi-sr-tshirt"></i>
                <h3>Boutique</h3>
            </div>
            <div class="card-shop" data-name="papeleria" onclick="scrollToPricing()">
                <i class="fi fi-ss-pencil-ruler"></i>
                <h3>Papelería</h3>
            </div>
            <div class="card-shop" data-name="carniceria" onclick="scrollToPricing()">
                <i class="fi fi-sr-meat"></i>
                <h3>Carnicería</h3>
            </div>
            <div class="card-shop" data-name="zapateria" onclick="scrollToPricing()">
                <i class="fi fi-sr-boot-heeled"></i>
                <h3>Zapatería</h3>
            </div>
            <div class="card-shop" data-name="licoreria" onclick="scrollToPricing()">
                <i class="fi fi-sr-cocktail-alt"></i>
                <h3>Licorería</h3>
            </div>
            <div class="card-shop" data-name="supermercado" onclick="scrollToPricing()">
                <i class="fi fi-sr-shopping-cart"></i>
                <h3>Supermercado</h3>
            </div>
        </div>
    </div>

    <main>
        <section>
            <h3>¿Listo para comenzar?</h3>
            <p>Elige el plan que mejor se adapte a las necesidades tuyas y de tu negocio.</p>
        </section>
    </main>

    <section class="pricing" id="pricing">
        <div class="card">
            <h3>Compra Ahora</h3>
            <p class="price">1,200$ MXN</p>
            <hr>
            <img src="image/c1.png" alt="">
            <p class="">Accede a todas las funciones del software de manera indefinida.</p>
            <ul>
                <li><i class="fi fi-sr-check-circle"></i> 1 Licencia para una sola computadora</li>
                <li><i class="fi fi-sr-check-circle"></i> Soporte Técnico</li>
                <li><i class="fi fi-sr-check-circle"></i> Actualizaciones por 12 meses</li>
            </ul>
            <ul id="feature-list" class="hidden">
                <li class=""><i class="fi fi-sr-check-circle"></i> Ventas: Realiza transacciones rápidas y seguras.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Crédito: Administra créditos de manera eficiente.
                </li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Clientes: Mantén un registro detallado de tus
                    clientes.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Productos: Gestiona tu inventario de productos
                    fácilmente.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Inventario: Control total sobre tus existencias.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Compras: Registra y controla todas tus compras.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Configuraciones: Personaliza tu POS según tus
                    necesidades.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Corte de Caja: Realiza cierres de caja precisos y
                    confiables.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Reportes: Genera reportes detallados para tomar
                    mejores decisiones.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Enviar Correo: Comunícate con tus clientes
                    directamente desde el POS.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Agregar Más Carritos: Gestiona múltiples carritos de
                    compra.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Editar Cantidad de Productos: Ajusta las cantidades
                    de tus productos con facilidad.</li>
                <li><i class="fi fi-sr-check-circle"></i> Editar Precios: Actualiza los precios de tus productos
                    rápidamente.</li>
            </ul>
            <div class="button-container">
                <a class="read-most" id="toggle-button">Leer Más</a>
            </div>
            <br>
            <form action="buy.php" method="POST">
                <button type="submit"><i class="fi fi-sr-shopping-cart"></i> Comprar</button>
            </form>
        </div>
        <div class="card card-demo">
            <h3>Descarga Ahora Gratis</h3>
            <p class="price">0$ MXN</p>
            <hr>
            <img src="image/c3.png" alt="">
            <p class="">Accede a todas las funciones del software por 100 días sin costo.</p>
            <ul>
                <li><i class="fi fi-sr-check-circle"></i> 1 Licencia para una sola computadora</li>
                <li><i class="fi fi-sr-circle-xmark"></i> Soporte Técnico</li>
                <li><i class="fi fi-sr-circle-xmark"></i> Actualizaciones por 12 meses</li>
            </ul>
            <ul id="feature-list-2" class="hidden">
                <li class=""><i class="fi fi-sr-check-circle"></i> Ventas: Realiza transacciones rápidas y seguras.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Crédito: Administra créditos de manera eficiente.
                </li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Clientes: Mantén un registro detallado de tus
                    clientes.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Productos: Gestiona tu inventario de productos
                    fácilmente.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Inventario: Control total sobre tus existencias.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Compras: Registra y controla todas tus compras.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Configuraciones: Personaliza tu POS según tus
                    necesidades.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Corte de Caja: Realiza cierres de caja precisos y
                    confiables.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Reportes: Genera reportes detallados para tomar
                    mejores decisiones.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Enviar Correo: Comunícate con tus clientes
                    directamente desde el POS.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Agregar Más Carritos: Gestiona múltiples carritos de
                    compra.</li>
                <li class=""><i class="fi fi-sr-check-circle"></i> Editar Cantidad de Productos: Ajusta las cantidades
                    de tus productos con facilidad.</li>
                <li><i class="fi fi-sr-check-circle"></i> Editar Precios: Actualiza los precios de tus productos
                    rápidamente.</li>
            </ul>
            <div class="button-container">
                <a class="read-most" id="toggle-button-2" style="color: black;">Leer Más</a>
            </div>
            <br>
            <button onclick="location.href='#comprar'"><i class="fi fi-sr-shopping-cart"></i> Descargar Demo</button>
        </div>
    </section>


    <footer>
        <div class="container">
            <h2><i class="fi fi-ss-rocket-lunch"></i> BestPoint</h2>
            <p>¡Gracias por visitar nuestra página!</p>
            <br>
            <p onclick="contactarPorWhatsApp()" style="cursor: pointer;">Para más información, contáctanos al: +52 444 304 2129</p>
        </div>
    </footer>
</body>

</html>

<script>
    document.getElementById('toggle-button').addEventListener('click', function () {
        var additionalList = document.getElementById('feature-list');
        var isHidden = additionalList.classList.contains('hidden');

        if (isHidden) {
            // Mostrar elementos ocultos
            additionalList.classList.remove('hidden');
            this.textContent = 'Leer Menos'; // Cambiar texto del botón
        } else {
            // Ocultar elementos adicionales
            additionalList.classList.add('hidden');
            this.textContent = 'Leer Más'; // Cambiar texto del botón
        }
    });

    document.getElementById('toggle-button-2').addEventListener('click', function () {
        var additionalList = document.getElementById('feature-list-2');
        var isHidden = additionalList.classList.contains('hidden');

        if (isHidden) {
            // Mostrar elementos ocultos
            additionalList.classList.remove('hidden');
            this.textContent = 'Leer Menos'; // Cambiar texto del botón
        } else {
            // Ocultar elementos adicionales
            additionalList.classList.add('hidden');
            this.textContent = 'Leer Más'; // Cambiar texto del botón
        }
    });
</script>
<script>
    function contactarPorWhatsApp() {
        const numeroTelefono = '524443042129';
        const mensaje = 'Hola, estoy interesado en obtener más información sobre BestPoint.';
        const url = `https://wa.me/${numeroTelefono}?text=${encodeURIComponent(mensaje)}`;
        window.open(url, '_blank');
    }

    function scrollToPricing() {
            document.getElementById('pricing').scrollIntoView({ behavior: 'smooth' });
        }
</script>