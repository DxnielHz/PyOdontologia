<?php
include 'conexion.php'; // Conexión a la base de datos

// Función para obtener los doctores
function obtenerDoctores($conn) {
    $sql = "SELECT id_doctor, nombre FROM doctores";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener los tratamientos
function obtenerTratamientos($conn) {
    $sql = "SELECT id_tratamiento, nombre FROM tratamientos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener los doctores
$doctores = obtenerDoctores($conn);

// Obtener los tratamientos
$tratamientos = obtenerTratamientos($conn);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $id_doctor = $_POST['doctor'];
    $id_tratamiento = $_POST['tratamiento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    try {
        // Insertar datos en la tabla `citas`
        $sql = "INSERT INTO citas (nombre, id_doctor, id_tratamiento, fecha, hora) VALUES (:nombre, :id_doctor, :id_tratamiento, :fecha, :hora)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_doctor', $id_doctor);
        $stmt->bindParam(':id_tratamiento', $id_tratamiento);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);

        if ($stmt->execute()) {
            echo "Reservación realizada con éxito.";
            // Redirigir al usuario si es necesario
            // header("Location: index.php");
        } else {
            echo "Error al realizar la reservación.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


}
?>

