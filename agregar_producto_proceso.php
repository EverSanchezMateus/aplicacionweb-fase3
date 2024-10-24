<?php
session_start(); // Iniciar la sesión
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Manejo de la imagen
    $imagen = $_FILES['imagen']['name'];
    $ruta_imagen = "images/" . basename($imagen); // Ruta donde se guardará la imagen

    // Verificar si la imagen se sube correctamente
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        // Inserción del producto en la base de datos
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$ruta_imagen')";

        if ($conn->query($sql) === TRUE) {
            echo "Producto agregado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
$conn->close();
?>
