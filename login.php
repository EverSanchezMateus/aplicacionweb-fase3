<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css">
    <?php include('includes/header.php'); ?>
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
    </header>
    <main>
        <form action="login_proceso.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <?php
        // Mostrar mensajes de error si existen
        if (isset($_GET['error'])) {
            echo "<p style='color:red;'>Error: " . htmlspecialchars($_GET['error']) . "</p>";
        }
        ?>
    </main>
    <footer>
        <p>© 2024 Ferretería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
