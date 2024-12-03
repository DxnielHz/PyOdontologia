<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "odontologia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {    
    die("Conexión fallida: " . $conn->connect_error);
}

// Habilitar reporte de errores en MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Obtener las citas con los textos descriptivos de doctor y tratamiento
$sql = "
    SELECT 
        c.id_cita, 
        c.Nombre, 
        d.Nombre AS nombre_doctor, 
        t.Nombre AS nombre_tratamiento, 
        c.fecha, 
        c.hora, 
        c.estado,
        c.id_doctor, 
        c.id_tratamiento
    FROM citas c
    LEFT JOIN doctores d ON c.id_doctor = d.id_doctor
    LEFT JOIN tratamientos t ON c.id_tratamiento = t.id_tratamiento
";
$result = $conn->query($sql);

// Obtener los registros de citas
$sql_registros = "SELECT id_registro, id_cita, observaciones, fecha_registro, Estado FROM registro_citas";
$result_registros = $conn->query($sql_registros);

// Editar cita o registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['table'])) {
    $table = $_POST['table'];
    $id = $_POST['id'];

    if ($table === 'citas') {
        $id_doctor = $_POST['id_doctor'];
        $id_tratamiento = $_POST['id_tratamiento'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $estado = $_POST['estado'];

        $sql = "UPDATE citas SET 
                id_doctor = '$id_doctor', 
                id_tratamiento = '$id_tratamiento', 
                fecha = '$fecha', 
                hora = '$hora', 
                estado = '$estado' 
                WHERE id_cita = $id";
    } elseif ($table === 'registro_citas') {
        $observaciones = $_POST['observaciones'];
        $estado = $_POST['estado'];

        $sql = "UPDATE registro_citas SET 
                observaciones = '$observaciones', 
                Estado = '$estado' 
                WHERE id_registro = $id";
    }

    $conn->query($sql);
    header("Location: administracion.php");
    exit();
}

// Finalizar cita
if (isset($_GET['finalizar_cita'])) {
    $id_cita = $_GET['finalizar_cita'];
    $update_sql = "UPDATE citas SET estado = 'Finalizado' WHERE id_cita = $id_cita";
    $conn->query($update_sql);
    $insert_registro_sql = "INSERT INTO registro_citas (id_cita, observaciones, fecha_registro, Estado) 
                            VALUES ($id_cita, 'Cita finalizada', NOW(), 'Finalizado')";
    $conn->query($insert_registro_sql);
    header("Location: administracion.php");
    exit();
}

// Cancelar cita
if (isset($_GET['cancelar_cita'])) {
    $id_cita = $_GET['cancelar_cita'];
    $update_sql = "UPDATE citas SET estado = 'Cancelado' WHERE id_cita = $id_cita";
    $conn->query($update_sql);
    $insert_registro_sql = "INSERT INTO registro_citas (id_cita, observaciones, fecha_registro, Estado) 
                            VALUES ($id_cita, 'Cita cancelada por el paciente', NOW(), 'Cancelado')";
    $conn->query($insert_registro_sql);
    header("Location: administracion.php");
    exit();
}

// Eliminar registro
if (isset($_GET['eliminar_registro'])) {
    $id_registro = $_GET['eliminar_registro'];
    $delete_sql = "DELETE FROM registro_citas WHERE id_registro = $id_registro";
    $conn->query($delete_sql);
    header("Location: administracion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentCare</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
            </div>
            <a href="logout.php" class="btn btn-danger py-2 px-4 ms-3">Cerrar Sesión</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Gestión de Citas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Tratamiento</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_cita']; ?></td>
                        <td><?php echo $row['Nombre']; ?></td>
                        <td><?php echo $row['nombre_doctor']; ?></td>
                        <td><?php echo $row['nombre_tratamiento']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['hora']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td>
                            <!-- Botones existentes -->
                            <a href="administracion.php?finalizar_cita=<?php echo $row['id_cita']; ?>" class="btn btn-success btn-sm">Finalizar</a>
                            <a href="administracion.php?cancelar_cita=<?php echo $row['id_cita']; ?>" class="btn btn-danger btn-sm">Cancelar</a>

                            <!-- Botón para abrir el modal de edición de cita -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCitaModal<?php echo $row['id_cita']; ?>">Editar</button>

                            <!-- Modal para editar cita -->
                            <div class="modal fade" id="editCitaModal<?php echo $row['id_cita']; ?>" tabindex="-1" aria-labelledby="editCitaModalLabel<?php echo $row['id_cita']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCitaModalLabel<?php echo $row['id_cita']; ?>">Editar Cita</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="table" value="citas">
                                                <input type="hidden" name="id" value="<?php echo $row['id_cita']; ?>">

                                                <div class="mb-3">
                                                    <label for="id_doctor" class="form-label">Doctor</label>
                                                    <select class="form-select" name="id_doctor" required>
                                                        <option value="1" <?php if($row['id_doctor'] == 1) echo 'selected'; ?>>Doctor 1</option>
                                                        <option value="2" <?php if($row['id_doctor'] == 2) echo 'selected'; ?>>Doctor 2</option>
                                                        <option value="3" <?php if($row['id_doctor'] == 3) echo 'selected'; ?>>Doctor 3</option>
                                                        <option value="4" <?php if($row['id_doctor'] == 4) echo 'selected'; ?>>Doctor 4</option>
                                                        <option value="5" <?php if($row['id_doctor'] == 5) echo 'selected'; ?>>Doctor 5</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="id_tratamiento" class="form-label">Tratamiento</label>
                                                    <select class="form-select" name="id_tratamiento" required>
                                                        <option value="1" <?php if($row['id_tratamiento'] == 1) echo 'selected'; ?>>Tratamiento 1</option>
                                                        <option value="2" <?php if($row['id_tratamiento'] == 2) echo 'selected'; ?>>Tratamiento 2</option>
                                                        <option value="3" <?php if($row['id_tratamiento'] == 3) echo 'selected'; ?>>Tratamiento 3</option>
                                                        <option value="3" <?php if($row['id_tratamiento'] == 4) echo 'selected'; ?>>Tratamiento 4</option>
                                                        <option value="3" <?php if($row['id_tratamiento'] == 5) echo 'selected'; ?>>Tratamiento 5</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="fecha" class="form-label">Fecha</label>
                                                    <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="hora" class="form-label">Hora</label>
                                                    <input type="time" class="form-control" name="hora" value="<?php echo $row['hora']; ?>" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <select class="form-select" name="estado" required>
                                                        <option value="Pendiente" <?php if($row['estado'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
                                                        <option value="Finalizado" <?php if($row['estado'] == 'Finalizado') echo 'selected'; ?>>Finalizado</option>
                                                        <option value="Cancelado" <?php if($row['estado'] == 'Cancelado') echo 'selected'; ?>>Cancelado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Registros -->
        <h2>Registros de Citas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Observaciones</th>
                    <th>Fecha Registro</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_reg = $result_registros->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row_reg['id_registro']; ?></td>
                        <td><?php echo $row_reg['observaciones']; ?></td>
                        <td><?php echo $row_reg['fecha_registro']; ?></td>
                        <td><?php echo $row_reg['Estado']; ?></td>
                        <td>
                            <a href="administracion.php?eliminar_registro=<?php echo $row_reg['id_registro']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
