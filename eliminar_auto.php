<?php
session_start();
include("conexion.php");

if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM autos WHERE id=$id");
header("Location: admin.php");
exit;
?>
