<?php
session_start(); // Iniciar la sesión
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Verificar que el usuario esté logeado
    if (!isset($_SESSION['usuario_id'])) {
        echo "Debes iniciar sesión para agregar productos al carrito.";
        exit();
    }

    $usuario_id = $_SESSION['usuario_id']; // Obtener el ID del usuario logeado

    // Comprobar si el producto ya está en el carrito
    $sql = "SELECT * FROM carrito WHERE usuario_id = $usuario_id AND producto_id = $producto_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si ya existe, actualizar la cantidad
        $sql = "UPDATE carrito SET cantidad = cantidad + $cantidad WHERE usuario_id = $usuario_id AND producto_id = $producto_id";
        if ($conn->query($sql) === TRUE) {
            echo "Cantidad actualizada en el carrito.";
        } else {
            echo "Error al actualizar la cantidad: " . $conn->error;
        }
    } else {
        // Si no existe, agregarlo al carrito
        $sql = "INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES ($usuario_id, $producto_id, $cantidad)";
        if ($conn->query($sql) === TRUE) {
            echo "Producto agregado al carrito.";
        } else {
            echo "Error al agregar el producto: " . $conn->error;
        }
    }

    // Redirigir a la página de productos o al carrito
    header("Location: productos.php");
}
$conn->close();
?>
