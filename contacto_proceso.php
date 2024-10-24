<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Configuración del correo
    $to = "acalakvoip@gmail.com";
    $subject = "Nuevo mensaje de contacto de $nombre";
    $body = "Nombre: $nombre\n";
    $body .= "Email: $email\n";
    $body .= "Mensaje:\n$mensaje\n";

    // Enviar el correo
    if (mail($to, $subject, $body)) {
        echo "Mensaje enviado exitosamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
