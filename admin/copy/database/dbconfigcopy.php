<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "registercopia2";

$connection = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());

    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-dark"> Error de conexión con la base de datos </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Verifique la conexión de su base de datos.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>
