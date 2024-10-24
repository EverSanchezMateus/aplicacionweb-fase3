<?php 
session_start(); // Iniciar la sesión
include('includes/db.php'); 
include('includes/header.php');

// Comprobar si el usuario está logeado
if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión para ver tu carrito.";
    exit();
}

$usuario_id = $_SESSION['usuario_id']; // ID del usuario logeado

$total = 0; // Inicializar el total

// Consultar los productos en el carrito desde la base de datos
$sql = "SELECT c.cantidad, p.id AS producto_id, p.nombre, p.precio 
        FROM carrito c 
        JOIN productos p ON c.producto_id = p.id 
        WHERE c.usuario_id = $usuario_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
        
    </header>
    <main>
        <h2>Carrito de Compras</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th><th>Acción</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $subtotal = $row['precio'] * $row['cantidad'];
                $total += $subtotal;

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                echo "<td>$" . number_format($row['precio'], 2) . "</td>";
                echo "<td>$" . number_format($subtotal, 2) . "</td>";
                echo "<td><a href='eliminar_producto.php?id=" . htmlspecialchars($row['producto_id']) . "'>Eliminar</a></td>";
                echo "</tr>";
            }

            echo "<tr><td colspan='3' style='text-align: right;'><strong>Total:</strong></td><td>$" . number_format($total, 2) . "</td><td></td></tr>";
            echo "</table>";
        } else {
            echo "El carrito está vacío.";
        }
        ?>
    </main>
    <footer>
        <p>© 2024 Ferretería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
