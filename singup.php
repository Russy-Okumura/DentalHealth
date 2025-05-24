<?php

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['contrasena'];
    $password_confirm = $_POST['confirmar-contrasena'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    if ($password !== $password_confirm) {
        die("Las contraseñas no coinciden.");
    }

    $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

    try {
        $connection = new connection();
        $PDO = $connection->connect();

        $nombre = $_POST['Nombre'];
        $telefono = $_POST['telefono'];

        // Base SQL
        $sql = "INSERT INTO usuarios (nombre, correo, telefono, contrasena, rol";

        // Si es dentista, añadir clínica
        if ($rol === 'dentista') {
            $sql .= ", id_clinica";
        }

        $sql .= ") VALUES (:nombre, :correo, :telefono, :contrasena, :rol";

        if ($rol === 'dentista') {
            $sql .= ", :id_clinica";
        }

        $sql .= ")";

        $stmt = $PDO->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':contrasena', $password_encriptada);
        $stmt->bindParam(':rol', $rol);

        if ($rol === 'dentista') {
            $id_clinica = $_POST['clinica'];
            $stmt->bindParam(':id_clinica', $id_clinica);
        }

        $stmt->execute();

        echo "<script>
        alert('Usuario registrado correctamente');
        window.location.href = 'singin.html';
        </script>";

    } catch (\PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>