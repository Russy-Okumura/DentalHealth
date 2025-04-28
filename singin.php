<?php

require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$username = trim($_POST['username']);
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if (empty($correo) || empty($password)) {
        $error_message = "Por favor, rellene todos los campos.";
        echo $error_message;
    } else {
        try {
            $connection = new connection();
            $PDO = $connection->connect();

            // Consulta combinada para voluntarios y organizaciones
            $sql = "
            SELECT id_usuario, nombre, correo, telefono, contrasena, rol FROM usuarios WHERE correo = :correo
            ";

            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['contrasena'])) {
                setcookie('Nombre', $user['nombre'], time() + 3600, '/');  // Válida por 1 hora
                setcookie('rol', $user['rol'], time() + 3600, '/');  // Válida por 1 hora
                setcookie('id_usuario', $user['id_usuario'], time() + 3600, '/');  // Válida por 1 hora

                header('Location: index.php');
                exit();

            } else {
                $error_message = "Credenciales incorrectas.";
                echo $error_message;
            }
        } catch (\Throwable $th) {
            $error_message = "Error en la conexión: " . $th->getMessage();
            echo $error_message;
        }
    }
}
?>