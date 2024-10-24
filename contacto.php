<?php include('includes/header.php'); ?>
<main>
    <h2>Contacto</h2>
    <form action="contacto_proceso.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" rows="5" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</main>
<?php include('includes/footer.php'); ?>
