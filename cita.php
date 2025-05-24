<?php
require_once 'connection.php';

$connection = new connection();
$PDO = $connection->connect();

$clinicas = $PDO->query("SELECT id_clinica, nombre FROM clinicas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reservar Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }

        input[type="datetime-local"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }
    </style>
</head>

<body>
    <form method="POST" action="registrar_cita.php">

        <label for="clinica">Clínica:</label>
        <select name="id_clinica" id="clinica" required>
            <option value = ""> selecciona una clinica </option>
            <?php while ($fila = $clinicas->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?= $fila['id_clinica'] ?>">
                <?= htmlspecialchars($fila['nombre']) ?>
            </option>
<?php endwhile; ?>

        </select>

        <label for="dentista">Dentista:</label>
<select name="id_dentista" id="dentista" required>
    <option value="">Selecciona una clínica primero</option>
</select>


        <label for="fecha">Fecha y hora de la cita:</label>
        <input type="datetime-local" name="fecha" required>
    
        <label for="motivo">Motivo de la cita:</label>
        <textarea name="motivo" required></textarea>

        <input type="submit" value="Reservar Cita">
    </form>

    <script>
    document.getElementById('clinica').addEventListener('change', function () {
        const clinicaId = this.value;
        const dentistaSelect = document.getElementById('dentista');

        if (clinicaId === "id_clinica") {
            dentistaSelect.innerHTML = '<option value="">Selecciona una clínica primero</option>';
            return;
        }

        dentistaSelect.innerHTML = '<option value="">Cargando dentistas...</option>';

        fetch('obtener_dentistas.php?id_clinica=' + encodeURIComponent(clinicaId))
            .then(response => {
                if (!response.ok) throw new Error('Error en la respuesta del servidor');
                return response.json();
            })
            .then(data => {
                if (!Array.isArray(data) || data.length === 0) {
                    dentistaSelect.innerHTML = '<option value="">No hay dentistas disponibles</option>';
                    return;
                }

                dentistaSelect.innerHTML = '<option value="">Selecciona un dentista</option>';
                data.forEach(dentista => {
                    const option = document.createElement('option');
                    option.value = dentista.id_dentista;
                    option.textContent = dentista.nombre;
                    dentistaSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al obtener dentistas:', error);
                dentistaSelect.innerHTML = '<option value="">Error al cargar dentistas</option>';
            });
    });
    </script>

</body>
</html>

