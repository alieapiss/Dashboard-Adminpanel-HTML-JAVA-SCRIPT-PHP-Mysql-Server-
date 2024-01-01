<?php
    
    session_start();
    $connection = mysqli_connect("localhost","root","","adminpanel");

    if(isset($_POST['registerbtn']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username, email, password) VALUES ('$username', '$email','$password')";
            $query_run = mysqli_query($connection, $query);
        
            if($query_run)
            {
                /* echo "Saved"; */
                $_SESSION['success'] = "Perfil agregado";
                header('Location: register.php');
            }
            else
            {
                $_SESSION['status'] = "Perfil no agregado";
                header('Location: register.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Las contraseñas no coinciden";
            header('Location: register.php');
        }

    }

    if(isset($_POST['registerbtn']))
    {
        $id = $_POST['edit_id'];
        $username = $_POST['edit_username'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];

        $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id=$id";
        $query_run = mysqli_query($connection, $query);
    }


?>