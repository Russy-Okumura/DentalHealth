<?php
require_once 'connection.php';

header('Content-Type: application/json');

if (!isset($_GET['id_clinica'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de clínica requerido']);
    exit;
}

$id_clinica = $_GET['id_clinica'];

try {
    $connection = new connection();
    $PDO = $connection->connect();

    $stmt = $PDO->prepare("SELECT id_usuario AS id_dentista, nombre FROM usuarios WHERE rol = 'dentista' AND id_clinica = ?");

    $stmt->execute([$id_clinica]);
    $dentistas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dentistas);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en el servidor', 'detalles' => $e->getMessage()]);
}



