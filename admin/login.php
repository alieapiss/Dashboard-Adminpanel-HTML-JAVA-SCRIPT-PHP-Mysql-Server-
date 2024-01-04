<?php
    include('includes/header.php');
?>
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Bienvenido de Nuevo</h1>
                    <p class="text-medium">
                        Inicie sesión en su cuenta existente para continuar
                    </p>
                </div>
                <div class="cover-image">
                    <img src="assets/images/auth/signin-image.svg" alt="" />
                </div>
                <div class="shape-image">
                    <img src="assets/images/auth/shape.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Iniciar Sesión</h6>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                    {
                        echo '<h6 class="bg_danger text-dark">' . $_SESSION['status'] . '</h6>';
                        unset($_SESSION['status']);
                    }
                ?>
                <p class="text-sm mb-25">
                    Comience a crear la mejor experiencia de usuario posible para sus clientes.
                </p>
                <form action="code.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Correo Electrónico</label>
                                <input type="email" name="email" placeholder="correo electrónico" />
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Contraseña</label>
                                <input type="password" name="password" placeholder="contraseña" />
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                            <div class="form-check checkbox-style mb-30">
                                <input class="form-check-input" type="checkbox" value="" id="checkbox-remember" />
                                <label class="form-check-label" for="checkbox-remember">
                                    Recuerdame la proxima vez
                                </label>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                            <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                <a href="reset-password.html" class="hover-underline">
                                    ¿Has olvidado tu contraseña?
                                </a>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" name="loginbtn" class="main-btn primary-btn btn-hover w-100 text-center">
                                    Iniciar sesión
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </form>
                <div class="singin-option pt-40">
                    <p class="text-sm text-medium text-center text-gray">
                        Iniciar sesión fácilmente con
                    </p>
                    <div class="button-group pt-40 pb-40 d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn-outline m-2">
                            <i class="lni lni-facebook-fill mr-10"></i>
                            Facebook
                        </button>
                        <button class="main-btn danger-btn-outline m-2">
                            <i class="lni lni-google mr-10"></i>
                            Google
                        </button>
                    </div>
                    <p class="text-sm text-medium text-dark text-center">
                        ¿Aún no tienes ninguna cuenta?
                        <a href="signup.html"> Crea una cuenta </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>