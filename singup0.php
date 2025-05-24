<?php
require_once 'connection.php';

// Conexión a la base de datos
try {
    $connection = new connection();
    $PDO = $connection->connect();

    // Obtener clínicas
    $stmt = $PDO->query("SELECT id_clinica, nombre FROM clinicas");
    $clinicas = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

    <div class="sigin">
        <div class="sigin-container">
            <div class="image-form-section">
                <img src="ruta/a/tu-imagen.png" alt="Imagen de registro">
            </div>
            <div class="form-section">
                <h2>Crea tu cuenta de manera gratuita</h2>
                <form action="singup.php" method="POST">

                    <div id="voluntario-fields">
                        <label for="Nombre">Nombre*</label>
                        <input type="text" id="Nombre" name="Nombre" required>
 
                        <label for="telefono">Teléfono*</label>
                        <input type="tel" id="telefono" name="telefono">
                    </div>

                    <label for="correo">Correo electrónico*</label>
                    <input type="email" id="correo" name="correo" required>

                    <label for="contraseña">Contraseña*</label>
                    <input type="password" id="contrasena" name="contrasena" required>

                    <label for="confirmar-contrasenia">Confirmar contraseña*</label>
                    <input type="password" id="confirmar-contrasena" name="confirmar-contrasena" required>

                    <label for="rol">Tipo de usuario*</label>
<select id="rol" name="rol" required onchange="toggleClinicaField()">
    <option value="">Selecciona un rol</option>
    <option value="cliente">Cliente</option>
    <option value="dentista">Dentista</option>
</select>

<div id="clinica-container" style="display: none;">
                        <label for="clinica">Clínica*</label>
                        <select name="clinica" id="clinica">
                            <option value="">Selecciona una clínica</option>
                            <?php foreach ($clinicas as $clinica): ?>
                                <option value="<?= htmlspecialchars($clinica['id_clinica']) ?>">
                                    <?= htmlspecialchars($clinica['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

    <script>
function toggleClinicaField() {
    const rol = document.getElementById('rol').value;
    const clinicaContainer = document.getElementById('clinica-container');
    clinicaContainer.style.display = rol === 'dentista' ? 'block' : 'none';
}
</script>

<script>
function toggleClinicaField() {
    const rol = document.getElementById('rol').value;
    const clinicaContainer = document.getElementById('clinica-container');
    clinicaContainer.style.display = rol === 'dentista' ? 'block' : 'none';
}
</script>
</body>

<footer>
    <div class="footer-bottom">
        <p>&copy; 2025 Dental Health. Todos los derechos reservados.</p>
    </div>
</footer>
</html>