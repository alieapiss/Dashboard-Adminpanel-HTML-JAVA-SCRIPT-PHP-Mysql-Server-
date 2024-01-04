<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title">
                <h5>Agregar Registro</h5>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#0">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            eCommerce
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

<!-- Formulario ingrese sus datos -->
<div class="card">
    <div class="card-header text-white bg-dark">
        <h4 class="card-title">Ingrese sus Datos</h4>
    </div>
    <div class="card-body">
        <!-- Inicio card-body -->
        <div class="card-body">
            <!-- ==================================== -->
            <form action="code.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <!-- Inicio card-body -->
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" name="username" class="form-control" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputApellidos">Apellidos</label>
                            <input type="Apellidos" name="lastname" class="form-control" placeholder="Apellidos">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="InputEmail">Correo electrónico</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lni lni-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Correo">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="InputPhone">Número de teléfono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lni lni-phone"></i></span>
                                </div>
                                <input type="phone" name="phone" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
     
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Contraseña</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lni lni-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputCPassword">Confirmar Contraseña</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lni lni-lock"></i></span>
                            </div>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDireccion">Dirección</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text "><i class="lni lni-home"></i> </span>
                            </div>
                            <input type="text" name="address" class="form-control" placeholder="Av. Abancay s/n">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCity">Ciudad</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="lni lni-map-marker "></i></span>
                            </div>
                            <input type="text" name="city" class="form-control" id="inputCity">
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Inicio Imagen -->
                        <div class="form-group col-md-12">
                            <label for="inputImage">Imagen</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="lni lni-image"></i></span>
                                </div>
                                <input type="file" name="perfil_image" id="perfil_image" class="from-control" required>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="inputPdfFile">Archivo PDF</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="lni lni-image"></i></span>
                                </div>
                                <input type="file" name="pdf_file" id="pdf_file" class="from-control" required>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="InputPassword">Tipo de Usuario</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lni lni-pointer-top"></i></span>
                                </div>
                                <select name="usertype" class="form-control">
                                    <option value="admin"> Administrador</option>
                                    <option value="user"> Usuario </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Fin card-body -->
                    <div class="card-footer">
                        <button type="submit" name="registerbtn" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='register.php'" >Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
 	