<?php
$host = "localhost";
$user = "root";     // tu usuario
$pass = "";         // tu contraseña (en XAMPP normalmente vacía)
$db = "concesionaria";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
