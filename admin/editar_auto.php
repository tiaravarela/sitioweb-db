<?php
session_start();
include("../conexion.php");

if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM autos WHERE id=$id";
$result = $conn->query($sql);
$auto = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE autos SET nombre='$nombre', precio='$precio', descripcion='$descripcion' WHERE id=$id";
    $conn->query($sql);
    header("Location: admin.php");
}
?>

<form method="POST">
    <input type="text" name="nombre" value="<?php echo $auto['nombre']; ?>"><br>
    <input type="number" step="0.01" name="precio" value="<?php echo $auto['precio']; ?>"><br>
    <textarea name="descripcion"><?php echo $auto['descripcion']; ?></textarea><br>
    <button type="submit">Actualizar</button>
</form>
