<?php
// Iniciar sesión
session_start();

// Verificar si las cookies están configuradas y eliminarlas
if (isset($_COOKIE['Nombre'])) {
    setcookie('Nombre', '', time() - 3600, '/'); // Eliminar la cookie 'Nombre'
    setcookie('rol', '', time() - 3600, '/');    // Eliminar la cookie 'rol'
    setcookie('id_usuario', '', time() - 3600, '/'); // Eliminar la cookie 'id_usuario'
}

// Destruir todas las variables de sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al usuario a la página principal o de login con un mensaje de éxito
header('Location: index.php?mensaje=sesion_cerrada');
exit();
?>







