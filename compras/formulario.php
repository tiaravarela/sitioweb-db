<?php
include("../conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_auto = $_POST['auto_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $fecha_pago = $_POST['fecha_pago'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO compras (id_auto, nombre, apellido, mail, telefono, fecha_pago, precio)
            VALUES ('$id_auto','$nombre','$apellido','$mail','$telefono','$fecha_pago','$precio')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Compra registrada con éxito');window.location='../autos/autos.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="compra.css">
</head>
<body>
    <div class="form-card">
        <h2>Formulario de Compra</h2>
        <form method="POST">
            <input type="hidden" name="auto_id" value="<?= $_GET['auto_id'] ?>">
            <input type="hidden" name="precio" value="<?= $_GET['precio'] ?? '' ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" required>

            <label>Mail:</label>
            <input type="email" name="mail" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required>

            <label>Fecha para coordinar entrega y pago:</label>
            <input type="date" name="fecha_pago" required>

            <button type="submit">Comprar</button>
            <a href="../autos/autos.php" class="btn-cancelar">Salir</a>
        </form>
    </div>
</body>
</html>
