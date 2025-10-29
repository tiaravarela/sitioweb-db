<?php
session_start();
include("../conexion.php");

// Verifica si es admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

// Trae los autos de la base de datos
$sql = "SELECT * FROM autos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Ford</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .navbar {
            background-color: #004080;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .card {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .card img {
            height: 180px;
            object-fit: contain;
            background: #fff;
        }
        .admin-buttons {
            margin-top: 10px;
        }
        .add-btn {
            background-color: #28a745;
            color: white;
            margin: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">FORD - PANEL ADMIN</a>
        <div class="ms-auto">
            <a href="../login/logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Vehículos</h2>
        <a href="agregar_auto.php" class="btn add-btn">+ Agregar Nuevo Auto</a>
    </div>

    <div class="row g-4">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-3">
            <div class="card p-2 text-center">
                <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="Auto">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['modelo']); ?></h5>
                    <p>Motor: <?php echo htmlspecialchars($row['motor']); ?></p>
                    <p>Potencia: <?php echo htmlspecialchars($row['potencia']); ?></p>
                    <p>Transmisión: <?php echo htmlspecialchars($row['transmision']); ?></p>
                    <p><strong>Precio:</strong> $<?php echo htmlspecialchars($row['precio']); ?></p>
                    <div class="admin-buttons">
                        <a href="editar_auto.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_auto.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este auto?')">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>

