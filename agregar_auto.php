<?php
session_start();
include("conexion.php");

if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO autos (nombre, precio, descripcion) VALUES ('$nombre', '$precio', '$descripcion')";
    $conn->query($sql);
    header("Location: admin.php");
}
?>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br>
    <textarea name="descripcion" placeholder="Descripción"></textarea><br>
    <button type="submit">Guardar</button>
</form>
