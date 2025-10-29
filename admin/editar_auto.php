<?php
session_start();
include("../conexion.php");

// Verificar si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

// Verificar si se recibe el ID del auto
if (!isset($_GET['id'])) {
    echo "<p style='color:red;'>Error: ID de auto no especificado.</p>";
    exit;
}

$id = intval($_GET['id']); // Convertir a número entero para seguridad

// Obtener datos actuales del auto
$sql = "SELECT * FROM autos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<p style='color:red;'>Error: Auto no encontrado.</p>";
    exit;
}

$auto = $result->fetch_assoc();

// Actualizar datos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $motor = $_POST['motor'];
    $potencia = $_POST['potencia'];
    $transmision = $_POST['transmision'];

    // Validar datos
    if (!empty($modelo) && !empty($precio) && !empty($motor) && !empty($potencia) && !empty($transmision)) {

        // Actualizar el registro
        $sql = "UPDATE autos 
                SET modelo='$modelo', precio='$precio', motor='$motor', potencia='$potencia', transmision='$transmision'
                WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
            exit;
        } else {
            echo "<p style='color:red;'>Error al actualizar: " . $conn->error . "</p>";
        }

    } else {
        echo "<p style='color:red;'>Por favor completá todos los campos.</p>";
    }
}
?>

<!-- Formulario para editar -->
<h2>Editar Auto</h2>
<form method="POST">
    <label>Modelo:</label><br>
    <input type="text" name="modelo" value="<?php echo htmlspecialchars($auto['modelo']); ?>" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="<?php echo htmlspecialchars($auto['precio']); ?>" required><br><br>

    <label>Motor:</label><br>
    <input type="text" name="motor" value="<?php echo htmlspecialchars($auto['motor']); ?>" required><br><br>

    <label>Potencia:</label><br>
    <input type="text" name="potencia" value="<?php echo htmlspecialchars($auto['potencia']); ?>" required><br><br>

    <label>Transmisión:</label><br>
    <input type="text" name="transmision" value="<?php echo htmlspecialchars($auto['transmision']); ?>" required><br><br>

    <button type="submit">Actualizar</button>
</form>

