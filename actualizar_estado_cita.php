<?php
require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cita'], $_POST['nuevo_estado'])) {
    $id_cita = $_POST['id_cita'];
    $nuevo_estado = $_POST['nuevo_estado'];

    $estados_validos = ['confirmada', 'cancelada', 'finalizada'];
    if (!in_array($nuevo_estado, $estados_validos)) {
        die('Estado no válido.');
    }

    try {
        $connection = new connection();
        $PDO = $connection->connect();

        $stmt = $PDO->prepare("UPDATE citas SET estado = :nuevo_estado WHERE id_cita = :id_cita");
        $stmt->bindParam(':nuevo_estado', $nuevo_estado, PDO::PARAM_STR);
        $stmt->bindParam(':id_cita', $id_cita, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ver_citas_dentista.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al actualizar el estado de la cita: " . $e->getMessage();
    }
} else {
    echo "Solicitud inválida.";
}
