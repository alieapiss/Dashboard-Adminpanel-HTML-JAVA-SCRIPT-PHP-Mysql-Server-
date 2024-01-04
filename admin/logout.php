<?php
    session_start();

    /* Logout o Cerrar Sesión */
    if (isset($_POST['logoutbtn'])) {
        // Destruir todas las variables de sesión
        session_unset();
        
        // Destruir la sesión
        session_destroy();
        
        // Redirigir a la página de inicio de sesión
        /* unset($_SESSION['username']); */
        header('Location: login.php');
        exit(); // Asegura que el script se detenga después de la redirección
    }
?>
