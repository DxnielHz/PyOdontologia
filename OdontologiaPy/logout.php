<?php
session_start();
session_destroy(); // Elimina la sesión
header("Location: index.php"); // Redirige al inicio
exit;
?>
