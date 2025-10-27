<?php
include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ford - Modelos de Autos</title>
    <link rel="stylesheet" href="autos.css">
</head>
<body>
<header class="header">
        <div class="header-container">

            <!-- Logo -->
            <div class="contenedor-logo">
                <a href="index.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Ford-Motor-Company-Logo.png"
                        alt="Logo Ford" class="logo">
                </a>
            </div>

            <!-- Título -->
            <h1 class="titulo-header">Ford - Descubre Nuestros Modelos</h1>

            <!-- Menú -->
            <nav class="menu">
                <a href="../index.php" class="menu-btn">Inicio</a>
                <a href="autos/autos.php" class="menu-btn">Vehículos</a>

                <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "admin"): ?>
                    <a href="admin/admin.php" class="menu-btn">Panel Admin</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

<section class="autos">
    <div class="grid-autos">
        <?php
        $sql = "SELECT * FROM autos";
        $result = $conn->query($sql);

        while($car = $result->fetch_assoc()) {
            echo "
            <div class='card'>
                <img src='{$car['imagen']}' alt='{$car['modelo']}' onerror=\"this.src='https://via.placeholder.com/300x200?text={$car['modelo']}'\">
                <h2>{$car['modelo']}</h2>
                <button onclick=\"showDetails('{$car['id']}')\">Conoce Más</button>
                <div id='{$car['id']}-details' class='detalles oculto'>
                    <p><strong>Motor:</strong> {$car['motor']}</p>
                    <p><strong>Potencia:</strong> {$car['potencia']}</p>
                    <p><strong>Transmisión:</strong> {$car['transmision']}</p>
                    <p><strong>Precio:</strong> {$car['precio']} USD</p>
                    <a href='../compras/formulario.php?auto_id=" . $car['id'] . "&precio=" . $car['precio'] . "' class='btn-comprar'>Comprar</a>
                </div>
            </div>
            ";
        }
        ?>
    </div>
</section>

<script src="autos.js"></script>
</body>
</html>
