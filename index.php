<?php
session_start();

// Si existe cookie y no hay sesión, restauramos sesión desde la cookie
if (isset($_COOKIE["usuario"]) && !isset($_SESSION["usuario"])) {
    $_SESSION["usuario"] = $_COOKIE["usuario"];
    $_SESSION["rol"] = $_COOKIE["rol"] ?? "cliente";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ford - Modelos de Autos</title>
    <link rel="stylesheet" href="inicio/inicio.css">
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
                <a href="index.php" class="menu-btn">Inicio</a>
                <a href="autos/autos.php" class="menu-btn">Vehículos</a>

                <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "admin"): ?>
                    <a href="admin/admin.php" class="menu-btn">Panel Admin</a>
                <?php endif; ?>
            </nav>

            <!-- Botón usuario -->
            <div class="user-icon" onclick="togglePopup()">
                <img src="./icon_usuario.png" alt="Usuario">
            </div>

            <!-- Ventana emergente -->
            <div id="popup" class="popup">
                <?php if (isset($_SESSION["usuario"])): ?>
                    <h3>Hola, <?php echo htmlspecialchars($_SESSION["usuario"]); ?> 👋</h3>
                    <p>Rol: <?php echo htmlspecialchars($_SESSION["rol"]); ?></p>
                    <a href="login/logout.php" class="btn btn-sec">Cerrar sesión</a>
                <?php else: ?>
                    <h3>Tu cuenta</h3>
                    <p>Iniciá sesión o registrate para guardar tus datos.</p>
                    <a href="login/login.php" class="btn">Iniciar sesión</a>
                    <a href="registro.php" class="btn btn-sec">Registrarse</a>
                <?php endif; ?>
            </div>

        </div>
    </header>

    <!-- Sección principal -->
    <section class="inicio">
        <h1>Concesionaria Ford</h1>
        <p>Descubre los últimos modelos, potencia y tecnología de Ford.</p>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <h3>Contáctanos</h3>
            <p>Email: concesionaria.ford@gmail.com</p>
            <p>Teléfono: +54 9 11 1234-5678</p>
            <p>Dirección: Barigüi, Buenos Aires, Argentina</p>
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank">Facebook</a> |
                <a href="https://www.instagram.com" target="_blank">Instagram</a>
            </div>
        </div>
    </footer>

    <script>
        function togglePopup() {
            const popup = document.getElementById("popup");
            popup.style.display = popup.style.display === "block" ? "none" : "block";
        }

        document.addEventListener("click", function (e) {
            const popup = document.getElementById("popup");
            const icon = document.querySelector(".user-icon");
            if (!popup.contains(e.target) && !icon.contains(e.target)) {
                popup.style.display = "none";
            }
        });
    </script>

</body>
</html>

