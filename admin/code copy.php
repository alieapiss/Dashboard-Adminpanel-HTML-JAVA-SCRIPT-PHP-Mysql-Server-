<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "adminpanel");

if (!$connection) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

if (isset($_POST['registerbtn'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $cpassword = $_POST['cpassword'];
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);

    if ($password === $cpassword) {
        $query = "INSERT INTO register (username, lastname, email, password, phone, address, city, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ssssssss", $username, $lastname, $email, $password, $phone, $address, $city, $date);
        $query_run = mysqli_stmt_execute($stmt);

        if ($query_run) {
            $_SESSION['success'] = "Perfil agregado";
            header('Location: register.php');
            exit();
        } else {
            $_SESSION['status'] = "Perfil no agregado";
            header('Location: register.php');
            exit();
        }
    } else {
        $_SESSION['status'] = "Las contraseñas no coinciden";
        header('Location: register.php');
        exit();
    }
}

if (isset($_POST['edit_btn'])) {
    $id = mysqli_real_escape_string($connection, $_POST['edit_id']);
    $query = "SELECT * FROM register WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $query_run = mysqli_stmt_execute($stmt);

    // Aquí puedes procesar los resultados de la consulta para la acción de edición
}
?>
