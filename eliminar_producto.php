<?php
session_start(); // Iniciar la sesión
include('includes/db.php');

if (isset($_GET['id']) && isset($_SESSION['usuario_id'])) {
    $producto_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario_id'];

    // Eliminar producto del carrito en la base de datos
    $sql = "DELETE FROM carrito WHERE usuario_id = $usuario_id AND producto_id = $producto_id";
    $conn->query($sql);
}

// Redirigir a la página del carrito
header("Location: carrito.php");
?>
