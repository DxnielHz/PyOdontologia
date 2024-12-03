<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contrasena', $contrasena);

    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar usuario";
    }
}
?>
