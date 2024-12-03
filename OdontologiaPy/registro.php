<?php
include 'conexion.php'; // Incluye tu conexión a la base de datos

header('Content-Type: application/json'); // Configura la respuesta como JSON

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene y sanitiza los datos enviados desde el formulario
        $input = json_decode(file_get_contents('php://input'), true);

        $nombre = htmlspecialchars(trim($input['nombre']));
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($input['password'], PASSWORD_BCRYPT);
        $telefono = htmlspecialchars(trim($input['telefono']));
        $direccion = htmlspecialchars(trim($input['direccion']));
        $tipo_usuario = 'paciente'; // Siempre será "paciente"
        $fecha_registro = date('Y-m-d H:i:s'); // Fecha actual

        // Inserta los datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, password, telefono, direccion, tipo_usuario, fecha_registro)
                VALUES (:nombre, :email, :password, :telefono, :direccion, :tipo_usuario, :fecha_registro)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':fecha_registro', $fecha_registro);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Registro exitoso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error del servidor: ' . $e->getMessage()]);
}
?>
