<?php 
session_start(); // Iniciar la sesión
include('includes/db.php');

// Comprobar si el usuario está logeado y es administrador
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || $_SESSION['rol'] !== 'admin') {
    echo "No tienes permisos para acceder a esta página.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Agregar Producto</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="registro.php">Registrar</a></li>
                <li><a href="agregar_producto.php">Registrar producto</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <form action="agregar_producto_proceso.php" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre del Producto:</label>
    <input type="text" name="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" rows="5" required></textarea>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" step="0.01" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" required>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" accept="image/*" required>

    <button type="submit">Agregar Producto</button>
</form>
    </main>
    <footer>
        <p>© 2024 Ferretería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
