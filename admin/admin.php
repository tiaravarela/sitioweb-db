<?php
session_start();
include("../conexion.php");

if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM autos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de administración</title>
</head>
<body>
    <h1>Panel de administración</h1>
    <a href="agregar_auto.php">Agregar auto</a> |
    <a href="logout.php">Cerrar sesión</a>
    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Nombre</th><th>Precio</th><th>Descripción</th><th>Acciones</th>
        </tr>
        <?php while($auto = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $auto['id']; ?></td>
            <td><?php echo $auto['nombre']; ?></td>
            <td>$<?php echo $auto['precio']; ?></td>
            <td><?php echo $auto['descripcion']; ?></td>
            <td>
                <a href="editar_auto.php?id=<?php echo $auto['id']; ?>">Editar</a> |
                <a href="eliminar_auto.php?id=<?php echo $auto['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
