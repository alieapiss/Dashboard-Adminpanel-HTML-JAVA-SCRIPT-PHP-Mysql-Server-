<?php
    include('security.php');

    $connection = mysqli_connect("localhost", "root", "", "registercopia2");

    if (!$connection) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
        exit();
    }

    /* ============== Establecer la zona horaria con la siguiente función: ========= */
    date_default_timezone_set('America/Lima');

    /* =================Register Copia================= */
    if (isset($_POST['registercopybtn'])) 
    {
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];  
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $address = $_POST['address'];  
        $image = $_FILES["perfil_image"]['name'];
        $city = $_POST['city'];  
        // Obtén la fecha y hora actuales en el formato adecuado
        $date = date('Y-m-d H:i:s'); 
        $usertype = $_POST['usertype'];

        // Obtén el nombre del archivo PDF
        $pdfFile = $_FILES["pdf_file"]['name'];

        // Comprobar si las contraseñas coinciden
        if ($password === $cpassword) 
        {
            // Compruebe si el archivo de imagen o PDF ya existe
            if (file_exists("upload/" . $image) || file_exists("pdfFile/" . $pdfFile))
            {
                $storeImage = $_FILES["perfil_image"]['name'];
                $storePdf = $_FILES["pdf_file"]['name'];
                $_SESSION['status'] = "La imagen o el archivo PDF ya existe. Imagen: $storeImage, PDF: $storePdf";
                header('Location: registercopy.php');
                exit();
            }
            else
            {
                // Realizar la inserción en la base de datos.
                $query = "INSERT INTO register (username, lastname, email, phone, password, address, image, city, date, usertype, pdf_file) 
                        VALUES ('$username', '$lastname', '$email', '$phone', '$password', '$address', '$image', '$city', '$date', '$usertype', '$pdfFile')";
                $query_run = mysqli_query($connection, $query);

                if ($query_run) 
                {
                    // Mueva el archivo de imagen a la carpeta de destino
                    move_uploaded_file($_FILES["perfil_image"]['tmp_name'], "upload/" . $_FILES["perfil_image"]['name']);
                    
                    // Mueva el archivo PDF a la carpeta de destino
                    move_uploaded_file($_FILES["pdf_file"]['tmp_name'], "pdfFile/" . $pdfFile);

                    $_SESSION['success'] = "Imagen y archivo PDF agregados correctamente";
                    header('Location: registercopy.php');
                    exit();
                } 
                else 
                {
                    $_SESSION['status'] = "No se pudo agregar la imagen y el archivo PDF";
                    header('Location: registercopy.php');
                    exit();
                }
            }
        }
        else 
        {
            $_SESSION['status'] = "Las contraseñas no coinciden";
            header('Location: registercopy.php');
            exit();
        }
    }



    if (isset($_POST['edit_btn'])) {
        $id = mysqli_real_escape_string($connection, $_POST['edit_id']);
        $query = "SELECT * FROM register WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $query_run = mysqli_stmt_execute($stmt);
        exit();
        // Aquí puedes procesar los resultados de la consulta para la acción de edición
    }

    /* Eliminar Registros */

    if(isset($_POST['deletebtn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM register WHERE id=$id";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Datos  eliminados correctamente";
            header('Location: registercopy.php');
        }
        else
        {
            $_SESSION['status'] = "Datos no eliminados";
            header('Location: registercopy.php');
        }
    }

    /* Actualizar Registro */
    if (isset($_POST['updatebtn'])) 
    {
        // Obtener los datos del formulario
        $id = $_POST['edit_id'];
        $username = $_POST['edit_username'];
        $lastname = $_POST['edit_lastname'];
        $email = $_POST['edit_email'];
        $phone = $_POST['edit_phone'];
        $password = $_POST['edit_password'];
        $address = $_POST['edit_address'];
        $city = $_POST['edit_city'];
        $usertypeupdate = $_POST['update_usertype'];

        // Comprobar si se ha cargado un nuevo archivo de imagen
        if ($_FILES["edit_perfil_image"]["error"] == UPLOAD_ERR_OK) 
        {
            // Eliminar la imagen antigua si existe
            $oldImage = $_POST['edit_image'];
            if (file_exists("upload/" . $oldImage)) {
                unlink("upload/" . $oldImage);
            }

            // Mover el nuevo archivo cargado a la carpeta de destino
            $newImage = $_FILES["edit_perfil_image"]['name'];
            move_uploaded_file($_FILES["edit_perfil_image"]['tmp_name'], "upload/" . $newImage);
            $image = $newImage;
        } 
        else 
        {
            // Conservar la imagen existente si no se carga una nueva
            $image = $_POST['edit_image'];
        }

        // Comprobar si se ha cargado un nuevo archivo PDF
        if ($_FILES["edit_pdf_file"]["error"] == UPLOAD_ERR_OK) 
        {
            // Eliminar el archivo PDF antiguo si existe
            $oldPdfFile = $_POST['edit_pdf_file'];
            if (file_exists("pdfFile/" . $oldPdfFile)) {
                unlink("pdfFile/" . $oldPdfFile);
            }

            // Mover el nuevo archivo PDF cargado a la carpeta de destino
            $newPdfFile = $_FILES["edit_pdf_file"]['name'];
            move_uploaded_file($_FILES["edit_pdf_file"]['tmp_name'], "pdfFile/" . $newPdfFile);
            $pdfFile = $newPdfFile;
        } 
        else 
        {
            // Conservar el archivo PDF existente si no se carga uno nuevo
            $pdfFile = $_POST['edit_pdf_file'];
        }

        // Construir la consulta SQL para actualizar el registro
        $query = "UPDATE register SET username='$username', 
                                    lastname='$lastname', 
                                    email='$email', 
                                    phone='$phone', 
                                    password='$password', 
                                    address='$address', 
                                    image='$image', 
                                    city='$city',  
                                    pdf_file='$pdfFile',  -- Agregado para manejar el archivo PDF
                                    usertype='$usertypeupdate' 
                WHERE id=$id";

        // Ejecutar la consulta SQL
        $query_run = mysqli_query($connection, $query);

        // Verificar si la consulta se ejecutó con éxito
        if ($query_run) 
        {
            // Mensaje de éxito y redireccionamiento
            $_SESSION['success'] = "Datos actualizados correctamente";
            header('Location: registercopy.php');
            exit();
        } 
        else 
        {
            // Mensaje de error y redireccionamiento
            $_SESSION['status'] = "Datos no actualizados";
            header('Location: registercopy.php');
            exit();
        }
    }

?>

<!-- ========Manipular el Historial en el Navegador======== -->
<script>
    // Función autoejecutable para manipular el historial
    (function() {
        // Definir la función que se llamará para reemplazar la entrada del historial
        var manipulateHistory = function() {
            // Reemplazar la entrada actual en el historial con la misma URL
            window.history.replaceState(null, null, window.location.pathname);
        };

        // Esperar hasta que la pila de eventos se haya vaciado antes de ejecutar la manipulación del historial
        setTimeout(manipulateHistory, 0);
    }());
</script>
