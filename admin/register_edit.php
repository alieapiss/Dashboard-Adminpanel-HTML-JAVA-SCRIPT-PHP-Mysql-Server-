<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="title">
        <h5>Editar Perfil de Administrador</h5>
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
    <?php
      $connection = mysqli_connect("localhost", "root", "", "adminpanel");
      /* Accion del Boton editar */

      if (isset($_POST['edit_btn'])) 
      {
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM register WHERE id = $id";
        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $row)
        {
          ?>
            <!-- Inicio card-body -->
            <div class="card-body">

              <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputNombre">Nombre</label>
                    <input type="text" name="edit_username" class="form-control" placeholder="Nombre" value="<?php echo $row['username']; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="InputEmail">Correo electrónico</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="lni lni-envelope"></i></span>
                      </div>
                      <input type="email" name="edit_email" class="form-control" placeholder="Correo" value="<?php echo $row['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="InputPassword">Contraseña</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="lni lni-lock"></i></span>
                      </div>
                      <input type="password" name="edit_password" class="form-control" placeholder="Contraseña" value="<?php echo $row['password']; ?>">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="updatebtn" class="btn btn-primary">Guardar</button>
                  <a href="register.php" class="btn btn-danger"> Cancelar</a>
                </div>

              </form>

            </div>
          <?php
        }
      }
    ?>
  </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
