<?php
session_start(); // Inicia la sesión
include 'conexion.php';

header('Content-Type: application/json'); // Asegura que el contenido devuelto sea JSON

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Decodifica la entrada JSON
        $input = json_decode(file_get_contents('php://input'), true);

        // Valida y sanitiza los datos
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $password = $input['password'];

        // Consulta la base de datos
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && $password === $usuario['password']) { // Cambia a password_verify si usas hashing
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

            // Redirige según el tipo de usuario
            if ($usuario['tipo_usuario'] === 'administrador') {
                echo json_encode(['success' => true, 'redirect' => 'administracion.php']);
            } else {
                echo json_encode(['success' => true, 'redirect' => 'index.php']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error del servidor: ' . $e->getMessage()]);
}
?>
