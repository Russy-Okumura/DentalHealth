<?php

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $password = $_POST['contrasena'];
    $password_confirm = $_POST['confirmar-contrasena'];
   // $tipo_usuario = $_POST['tipo_usuario'];  // Tipo de usuario: voluntario u organizacion
    $correo = $_POST['correo'];

    // Verificar que las contraseñas coincidan
    if ($password !== $password_confirm) {
        die("Las contrasenias no coinciden.");
    }

    // Encriptar la contraseña
    $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

    // Conexión a la base de datos
    try {
        $connection = new connection();
        $PDO = $connection->connect();

        // Insertar en la tabla correspondiente dependiendo del tipo de usuario
            $nombre = $_POST['Nombre'];
            $telefono = $_POST['telefono'];

            // Preparar la consulta SQL para insertar un nuevo voluntario
            $sql = "INSERT INTO usuarios (nombre, correo, telefono, contrasena) 
                    VALUES (:nombre, :correo, :telefono, :contrasena)";
        
            // Preparar la declaración
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam('telefono', $telefono);
            $stmt->bindParam(':contrasena', $password_encriptada);

        

    } catch (\Throwable $th) {
        die("Error de conexión: " . $th->getMessage());
    }

    // Ejecutar la consulta y verificar si fue exitosa
    try {
        $stmt->execute();
        echo "<script>
        alert('usuario registrado coreectamente');
        window.location.href = 'singin.html';
        </script>";

       // echo "Nuevo registro creado con éxito";
    } catch (\PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>