<?php
include('includes/db.php');
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='producto'>";
        echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
        echo "<img src='" . htmlspecialchars($row['imagen']) . "' alt='" . htmlspecialchars($row['nombre']) . "'>";
        echo "<p>Precio: $" . number_format($row['precio'], 2) . "</p>";
        echo "<p>Stock: " . htmlspecialchars($row['stock']) . "</p>";
        echo "<form action='carrito_proceso.php' method='POST'>";
        echo "<input type='hidden' name='producto_id' value='" . $row['id'] . "'>";
        echo "<input type='number' name='cantidad' value='1' min='1' max='" . $row['stock'] . "' required>";
        echo "<button type='submit'>Agregar al Carrito</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No hay productos disponibles.";
}
?>
