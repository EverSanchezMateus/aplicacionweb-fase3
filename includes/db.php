<?php
$servername = "localhost"; // Cambia esto si tu base de datos está en otro servidor
$username = "root";          // Tu usuario de MySQL
$password = "";              // Tu contraseña de MySQL
$dbname = "ferreteria_db";   // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>