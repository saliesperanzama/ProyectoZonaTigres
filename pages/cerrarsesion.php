<?php
 include('includes/utilerias.php');
    // Inicia la sesión (si no está iniciada)
    session_start();

    // Verifica si el usuario ha hecho clic en "Cerrar Sesión"
        session_unset();
        // Destruye todas las variables de sesión
        session_destroy();

        // Redirige al usuario a la página de inicio de sesión o a donde lo desees
        redireccionar('Cerrando Sesión','index.php');
        exit();

    if(!isset($_SESSION['usuario_id'])){
        redireccionar('Prohibido','index.php');
    }
?>