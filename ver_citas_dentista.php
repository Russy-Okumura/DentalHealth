<?php
require_once 'connection.php';

if (!isset($_COOKIE['id_usuario']) || $_COOKIE['rol'] !== 'dentista') {
    die('Acceso denegado');
}

$id_usuario = $_COOKIE['id_usuario'];
echo "ID del usuario (desde cookie): " . htmlspecialchars($id_usuario) . "<br>";

$connection = new connection();
$PDO = $connection->connect();

$stmt = $PDO->prepare("
    SELECT 
        citas.id_cita,
        citas.fecha,
        citas.motivo,
        citas.estado,
        u_cliente.nombre AS paciente
    FROM citas
    INNER JOIN usuarios AS u_cliente ON citas.id_usuario = u_cliente.id_usuario
    LEFT JOIN usuarios AS u_dentista ON citas.id_dentista = u_dentista.id_usuario
    WHERE citas.id_dentista = :id_usuario
");

$stmt->execute(['id_usuario' => $id_usuario]);
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Citas</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Mis Citas</h2>

    <table>
        <tr>
            <th>Paciente</th>
            <th>Fecha</th>
            <th>Motivo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($citas as $cita): ?>
        <tr>
            <td><?= htmlspecialchars($cita['paciente']) ?></td>
            <td><?= htmlspecialchars($cita['fecha']) ?></td>
            <td><?= htmlspecialchars($cita['motivo']) ?></td>
            <td><?= ucfirst(htmlspecialchars($cita['estado'])) ?></td>
            <td>
                <?php if ($cita['estado'] === 'pendiente'): ?>
                    <form method="post" action="actualizar_estado_cita.php" style="display:inline;">
                        <input type="hidden" name="id_cita" value="<?= $cita['id_cita'] ?>">
                        <input type="hidden" name="nuevo_estado" value="confirmada">
                        <button type="submit" class="btn-confirmar">Confirmar</button>
                    </form>
                    <form method="post" action="actualizar_estado_cita.php" style="display:inline;">
                        <input type="hidden" name="id_cita" value="<?= $cita['id_cita'] ?>">
                        <input type="hidden" name="nuevo_estado" value="cancelada">
                        <button type="submit" class="btn-cancelar">Cancelar</button>
                    </form>
                <?php elseif ($cita['estado'] === 'confirmada'): ?>
                    <form method="post" action="actualizar_estado_cita.php" style="display:inline;">
                        <input type="hidden" name="id_cita" value="<?= $cita['id_cita'] ?>">
                        <input type="hidden" name="nuevo_estado" value="finalizada">
                        <button type="submit" class="btn-finalizar">Finalizar</button>
                    </form>
                <?php else: ?>
                    No disponible
                <?php endif; ?>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
