<?php
require_once 'connection.php';
session_start();

// Verificamos si la cookie id_usuario y Nombre están disponibles
if (!isset($_COOKIE['id_usuario']) || !isset($_COOKIE['Nombre'])) {
    echo "Error: No se encontró el ID de usuario o el nombre. Asegúrate de haber iniciado sesión.";
    exit(); // Detenemos el script si las cookies no están presentes
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = trim($_POST['fecha']);
    $motivo = trim($_POST['motivo']);

    if (empty($fecha) || empty($motivo)) {
        $error_message = "Por favor, rellene todos los campos.";
        echo $error_message;
    } else {
        try {
            $connection = new connection();
            $PDO = $connection->connect();

            // Obtener el nombre de usuario desde la cookie
            $nombre_usuario = $_COOKIE['Nombre'];  // Aquí obtienes el nombre

            // Obtener el ID del usuario logueado desde la cookie
            $usuario = $_COOKIE['id_usuario']; // Usamos el id_usuario de la cookie

            // Consulta para insertar la cita en la base de datos
            $sql = "INSERT INTO citas (id_usuario, fecha, motivo) VALUES (:usuario, :fecha, :motivo)";
            $stmt = $PDO->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':motivo', $motivo);

            // Ejecutar la consulta
            $stmt->execute();

            echo "¡Cita solicitada con éxito!";

            // Mostrar el nombre del usuario que hizo la cita
            echo " La cita fue solicitada por: " . htmlspecialchars($nombre_usuario);

        } catch (\Throwable $th) {
            $error_message = "Error en la conexión: " . $th->getMessage();
            echo $error_message;
        }
    }
}
?>






