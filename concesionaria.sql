-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS concesionaria;
USE concesionaria;

-- Tabla de autos
DROP TABLE IF EXISTS autos;
CREATE TABLE autos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    motor VARCHAR(100) NOT NULL,
    potencia VARCHAR(50) NOT NULL,
    transmision VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

-- Insertar autos de ejemplo
INSERT INTO autos (modelo, motor, potencia, transmision, precio, imagen) VALUES
('Ford Mustang', '5.0L V8', '450 HP', 'Automática de 10 velocidades', 45000.00, 'https://di-sitebuilder-assets.dealerinspire.com/Ford/MLP/Mustang/2024/trim-EcoBoost-Fastback.png'),
('Ford Explorer', '2.3L EcoBoost', '300 HP', 'Automática de 10 velocidades', 38000.00, 'https://qa.fordvictoria.mx.fov6.netcar.com.mx/Assets/ModelosNuevos/Img/Modelos/EXPLORER-ST/25/Colores/BLANCO-METALICO.png'),
('Ford Maverick', '2.0L EcoBoost', '250 HP', 'Automática de 8 velocidades', 25000.00, 'https://www.forcor.com.ar/wp-content/uploads/2021/05/1636376258709.jpg'),
('Ford F-150', '3.5L V6 EcoBoost', '400 HP', 'Automática de 10 velocidades', 40000.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRORsQxXgLkbMzBtZL0s62fTk_Zrg6lHtcnvo8JGKbHuhc7OkSsjeJTp0cNarr_3EsQQzo&usqp=CAU'),
('Ford Bronco Sport', '2.7L EcoBoost V6', '310 HP', 'Automática de 10 velocidades', 35000.00, 'https://live.dealer-asset.co/images/br1168/product/paintSwatch/vehicle/ford-colombia-bronco-sport-color-azul-glaciar-2.jpg?s=1024'),
('Ford Escape', '1.5L EcoBoost', '181 HP', 'Automática de 8 velocidades', 28000.00, 'https://www.ford.com.co/content/dam/Ford/website-assets/latam/co/nameplate/escape-hybrid/2024/Overview/colorizer/azul-capri/fco-escape-ecoboost-azul-capri.jpg.dam.full.high.jpg/1694633330749.jpg'),
('Ford Territory', '2.0L EcoBoost', '250 HP', 'Automática de 8 velocidades', 33000.00, 'https://www.centroamerica.ford.com/content/dam/Ford/website-assets/cca/pa/nameplate/territory/2026/overview/color/ambiente/colorizer/verde/ford-centroamerica-territory-2026-suv-version-ambiente-color-verde.jpg.dam.full.high.jpg/1754628301457.jpg'),
('Ford Ranger', '2.3L EcoBoost', '270 HP', 'Automática de 10 velocidades', 30000.00, 'https://acroadtrip.blob.core.windows.net/catalogo-imagenes/s/RT_V_c95a6e60d3324a39970ead5860da0b98.webp');

-- Tabla de compras
DROP TABLE IF EXISTS compras;
CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_auto INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    mail VARCHAR(150) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    metodo_pago VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_auto) REFERENCES autos(id) ON DELETE CASCADE
);
