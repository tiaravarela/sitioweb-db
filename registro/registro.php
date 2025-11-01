<?php
include("../conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos personales
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nac = $_POST['fecha_nac'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Datos de cuenta
    $usuario = $_POST['usuario'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    // 1️⃣ Verificar si el usuario o correo ya existen
    $verificar = $conn->query("SELECT u.usuario, r.correo 
                               FROM usuarios u 
                               LEFT JOIN registros r ON u.id = r.id_usuario 
                               WHERE u.usuario='$usuario' OR r.correo='$correo'");

    if ($verificar->num_rows > 0) {
        $error = "El usuario o el correo ya están registrados.";
    } else {
        // 2️⃣ Insertar primero en usuarios
        $sqlUsuario = "INSERT INTO usuarios (usuario, clave, rol)
                       VALUES ('$usuario', '$clave', 'cliente')";

        if ($conn->query($sqlUsuario) === TRUE) {
            $id_usuario = $conn->insert_id;

            // 3️⃣ Insertar datos personales en registros
            $sqlRegistro = "INSERT INTO registros (id_usuario, nombre, apellido, fecha_nac, correo, telefono)
                            VALUES ('$id_usuario', '$nombre', '$apellido', '$fecha_nac', '$correo', '$telefono')";

            if ($conn->query($sqlRegistro) === TRUE) {
                header("Location: ../login/login.php");
                exit;
            } else {
                $error = "Error al guardar los datos personales.";
            }
        } else {
            $error = "Error al crear el usuario.";
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
