<?php
include("../conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nac = $_POST['fecha_nac'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    // Verificar si ya existe el usuario o correo
    $verificar = $conn->query("SELECT * FROM usuarios WHERE usuario='$usuario' OR correo='$correo'");
    if ($verificar->num_rows > 0) {
        $error = "El usuario o correo ya está registrado.";
    } else {
        $sql = "INSERT INTO usuarios (nombre, apellido, fecha_nac, correo, telefono, usuario, clave, rol)
                VALUES ('$nombre', '$apellido', '$fecha_nac', '$correo', '$telefono', '$usuario', '$clave', 'cliente')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../login/login.php");
            exit;
        } else {
            $error = "Error al registrar. Inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <div class="registro-container">
        <h1>Crear cuenta</h1>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
            </div>
            <input type="date" name="fecha_nac" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="tel" name="telefono" placeholder="Teléfono" required>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <button type="submit">Registrarme</button>
        </form>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <p class="login-link">¿Ya tenés cuenta? <a href="../login/login.php">Iniciar sesión</a></p>
    </div>
</body>
</html>
