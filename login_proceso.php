<?php
session_start(); // Iniciar la sesión
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar el usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Almacenar el ID y nombre del usuario en la sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['nombre'];
            $_SESSION['rol'] = $row['rol']; // Almacenar el rol en la sesión
            $_SESSION['logged_in'] = true; // Establecer que el usuario ha iniciado sesión
            header("Location: index.php"); // Redirigir al inicio
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: login.php?error=Contraseña incorrecta");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: login.php?error=No se encontró un usuario con ese email");
        exit();
    }
}
$conn->close();
?>
