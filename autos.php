<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ford - Modelos de Autos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <!-- Encabezado -->
    <header class="header">
        <div class="contenedor">
            <h1>Ford - Descubre Nuestros Modelos</h1>
        </div>
        <nav class="menu">
            <a href="index.php" class="menu-btn">Inicio</a>
            <a href="autos.php" class="menu-btn">Vehículos</a>
        </nav>
    </header>

    <!-- Sección de Modelos de Autos -->
    <section class="contenedor autos">
        <div class="grid-autos">
            <?php
            $cars = [
                [
                    'id'=>'mustang',
                    'name'=>'Ford Mustang',
                    'image'=>'https://di-sitebuilder-assets.dealerinspire.com/Ford/MLP/Mustang/2024/trim-EcoBoost-Fastback.png',
                    'alt'=>'Ford Mustang EcoBoost Fastback',
                    'motor'=>'5.0L V8',
                    'potencia'=>'450 HP',
                    'transmision'=>'Automática de 10 velocidades',
                    'precio'=>'$45,000 USD'],
                [
                    'id'=>'explorer',
                    'name'=>'Ford Explorer',
                    'image'=>'https://qa.fordvictoria.mx.fov6.netcar.com.mx/Assets/ModelosNuevos/Img/Modelos/EXPLORER-ST/25/Colores/BLANCO-METALICO.png','alt'=>'Ford Explorer ST Blanco Metálico','motor'=>'2.3L EcoBoost','potencia'=>'300 HP','transmision'=>'Automática de 10 velocidades','precio'=>'$38,000 USD'],
                [
                    'id'=>'maverick',
                    'name'=>'Ford Maverick',
                    'image'=>'https://www.forcor.com.ar/wp-content/uploads/2021/05/1636376258709.jpg','alt'=>'Ford Maverick','motor'=>'2.0L EcoBoost','potencia'=>'250 HP','transmision'=>'Automática de 8 velocidades','precio'=>'$25,000 USD'],
                [
                    'id'=>'f150',
                    'name'=>'Ford F-150',
                    'image'=>'https://acroadtrip.blob.core.windows.net/catalogo-imagenes/xl/RT_V_1ead3d6a5d54475892fc82ba6959fd8a.webp',
                    'alt'=>'Ford F-150',
                    'motor'=>'3.5L V6 EcoBoost',
                    'potencia'=>'400 HP',
                    'transmision'=>'Automática de 10 velocidades',
                    'precio'=>'$40,000 USD'],
                [
                    'id'=>'bronco',
                    'name'=>'Ford Bronco Sport',
                    'image'=>'https://live.dealer-asset.co/images/br1168/product/paintSwatch/vehicle/ford-colombia-bronco-sport-color-azul-glaciar-2.jpg?s=1024',
                    'alt'=>'Ford Bronco Sport Azul Glaciar',
                    'motor'=>'2.7L EcoBoost V6',
                    'potencia'=>'310 HP',
                    'transmision'=>'Automática de 10 velocidades',
                    'precio'=>'$35,000 USD'],
                [
                    'id'=>'escape',
                    'name'=>'Ford Escape',
                    'image'=>'https://www.ford.com.co/content/dam/Ford/website-assets/latam/co/nameplate/escape-hybrid/2024/Overview/colorizer/azul-capri/fco-escape-ecoboost-azul-capri.jpg.dam.full.high.jpg/1694633330749.jpg',
                    'alt'=>'Ford Escape Azul Capri',
                    'motor'=>'1.5L EcoBoost',
                    'potencia'=>'181 HP',
                    'transmision'=>'Automática de 8 velocidades',
                    'precio'=>'$28,000 USD'],
                [
                    'id'=>'territory',
                    'name'=>'Ford Territory',
                    'image'=>'https://www.ford.com.ar/content/ford/ar/es_ar/home/cotizacion/territory/jcr:content/par/splitter/splitter0/image/image.imgs.480.high.jpg/1749847522377.jpg',
                    'alt'=>'Ford Territory Azul Metálico',
                    'motor'=>'2.0L EcoBoost',
                    'potencia'=>'250 HP',
                    'transmision'=>'Automática de 8 velocidades',
                    'precio'=>'$33,000 USD'],
                [
                    'id'=>'ranger',
                    'name'=>'Ford Ranger',
                    'image'=>'https://acroadtrip.blob.core.windows.net/catalogo-imagenes/s/RT_V_c95a6e60d3324a39970ead5860da0b98.webp',
                    'alt'=>'Ford Ranger',
                    'motor'=>'2.3L EcoBoost',
                    'potencia'=>'270 HP',
                    'transmision'=>'Automática de 10 velocidades',
                    'precio'=>'$30,000 USD']
            ];

            foreach ($cars as $car) {
                echo "
                <div class='card'>
                    <img src='{$car['image']}' alt='{$car['alt']}' onerror=\"this.src='https://via.placeholder.com/300x200?text={$car['name']}'\">
                    <h2>{$car['name']}</h2>
                    <button onclick=\"showDetails('{$car['id']}')\" aria-controls='{$car['id']}-details' aria-expanded='false'>Conoce Más</button>
                    <div id='{$car['id']}-details' class='detalles oculto'>
                        <p><strong>Motor:</strong> {$car['motor']}</p>
                        <p><strong>Potencia:</strong> {$car['potencia']}</p>
                        <p><strong>Transmisión:</strong> {$car['transmision']}</p>
                        <p><strong>Precio:</strong> {$car['precio']}</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>
