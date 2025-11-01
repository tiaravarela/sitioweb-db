<?php
session_start();
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        if ($clave == $row['clave']) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $row['rol'];

            // Guardar cookie por 1 día
            setcookie("usuario", $usuario, time() + 86400, "/");

            // Redirigir según el rol
            if ($row['rol'] == 'admin') {
                header("Location: ../admin/admin.php");
            } else {
                header("Location: ../index.php");
            }
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar sesión</h1>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>

        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

        <p class="registro-link">¿No tenés cuenta? <a href="../registro/registro.php">Registrate</a></p>
    </div>
</body>
</html>
