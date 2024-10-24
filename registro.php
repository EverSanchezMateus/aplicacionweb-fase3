<?php include('includes/header.php'); ?>
<main>
    <h2>Registro de Usuario</h2>
    <form action="registro_proceso.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Registrar</button>
    </form>
</main>
<?php include('includes/footer.php'); ?>
