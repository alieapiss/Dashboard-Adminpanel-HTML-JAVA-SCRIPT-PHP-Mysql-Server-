<?php
    include('security.php');

    $connection = mysqli_connect("localhost", "root", "", "adminpanel");

    if (!$connection) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }
    
    if (isset($_POST['loginbtn'])) 
    {
        $email_login = $_POST['email'];
        $password_login = $_POST['password'];

        // Utiliza consultas preparadas para evitar inyección SQL
        $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
        $stmt = mysqli_prepare($connection, $query);
        $usertype = mysqli_fetch_array($query_run);

        mysqli_stmt_bind_param($stmt, "ss", $email_login, $password_login);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Utiliza mysqli_fetch_assoc para obtener un array asociativo
        if ($row = mysqli_fetch_assoc($result)) 
        {
            $usertype = $row['usertype'];

            if ($usertype == 'admin') 
            {
                $_SESSION['username'] = $email_login;
                header('Location: index.php');
            } 
             else if ($usertype == 'user') 
            {
                $_SESSION['username'] = $email_login;
                header('Location: ../index.html');
            }  
            else 
            {
                $_SESSION['status'] = 'Su correo electrónico y su contraseña no coinciden. Inténtelo de nuevo.';
                header('Location: login.php');
                exit(); // Asegura que el script se detenga después de la redirección
            }
        } 
        else 
        {
            $_SESSION['status'] = 'Su correo electrónico y su contraseña no coinciden. Inténtelo de nuevo.';
            header('Location: login.php');
            exit(); // Asegura que el script se detenga después de la redirección
        }

        // Cierra la consulta preparada
        mysqli_stmt_close($stmt);
    } 
  
?>
