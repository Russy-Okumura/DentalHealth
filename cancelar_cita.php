<?php
require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cita'])) {
    $id_cita = $_POST['id_cita'];

    try {
        $connection = new connection();
        $PDO = $connection->connect();

        // Cambiar el estado de la cita a cancelada
        $stmt = $PDO->prepare("UPDATE citas SET estado = 'cancelada' WHERE id_cita = :id_cita");
        $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
        $stmt->execute();

        // Redirigir a la página anterior (ajusta si es necesario)
        header("Location: mis_citas_pacientes.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al cancelar la cita: " . $e->getMessage();
    }
} else {
    echo "Solicitud inválida.";
}
