<?php
session_start();
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $row['rol'];

        // Cookie
        setcookie("usuario", $usuario, time() + 86400, "/");

        if ($row['rol'] == 'admin') {
            header("Location: ../admin/admin.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

        <p class="register-link">¿No tenés cuenta? <a href="../registro/registro.php">Registrate</a></p>

    </div>
</body>
</html>
