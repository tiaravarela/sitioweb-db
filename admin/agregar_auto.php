<?php
session_start();
include("../conexion.php");

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $motor = $_POST['motor'];
    $potencia = $_POST['potencia'];
    $transmision = $_POST['transmision'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    if (!empty($modelo) && !empty($motor) && !empty($potencia) && !empty($transmision) && !empty($precio)) {
        $sql = "INSERT INTO autos (modelo, motor, potencia, transmision, precio, imagen)
                VALUES ('$modelo', '$motor', '$potencia', '$transmision', '$precio', '$imagen')";
        if ($conn->query($sql)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Error al agregar: " . $conn->error;
        }
    } else {
        echo "Por favor completá todos los campos.";
    }
}
?>

<h2>Agregar Nuevo Auto</h2>
<form method="POST">
    <label>Modelo:</label><br>
    <input type="text" name="modelo" required><br><br>
    <label>Motor:</label><br>
    <input type="text" name="motor" required><br><br>
    <label>Potencia:</label><br>
    <input type="text" name="potencia" required><br><br>
    <label>Transmisión:</label><br>
    <input type="text" name="transmision" required><br><br>
    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>
    <label>URL de Imagen:</label><br>
    <input type="text" name="imagen"><br><br>
    <button type="submit">Guardar</button>
</form>

