<?php
    session_start();

    include('database/dbconfigcopy.php');
    if ($connection) 
    {
        // echo "Database Connected";
    } 
    else 
    {
        header("Location: database/dbconfigcopy.php");
    }
    /*  Nos muestra nuestra correo electrónico despues de iniciar sesion*/
    if (!$_SESSION['username']) 
    {
        header('Location: login.php');
    }

?>