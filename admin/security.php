<?php
    session_start();

    include('database/dbconfig.php');
    if ($connection) 
    {
        // echo "Database Connected";
    } 
    else 
    {
        header("Location: database/dbconfig.php");
    }
    /*  Nos muestra nuestra correo electrónico despues de iniciar sesion*/
    if (!$_SESSION['username']) 
    {
        header('Location: login.php');
    }

?>