
<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

  <!-- ========== Inicio de Modal ========== -->
  <!-- Modal -->
  <div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ingrese sus Datos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <!-- Inicio Formulario -->
                  <form action="code.php" method="POST">
                    <!-- Inicio card-body -->
                    <div class="card-body">
                        <div class="form-row">
                            <div class="input-group">
                                <label for="inputNombre">Nombre</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="lni lni-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="exampleInputEmail1">Correo electrónico</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="lni lni-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lni lni-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="exampleInputPassword1">Confirmar Contraseña</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lni lni-lock"></i></span>
                                    </div>
                                    <input type="password" name="cpassword" class="form-control" placeholder="Confirmar contraseña">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="registerbtn" class="btn btn-primary">Guardar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                  </form>
                   <!-- Fin Formulario -->
              </div>
          </div>
      </div>
  </div>

  <!-- ========== Fin de Modal ========== -->
  <!-- ========== Inicio de Tabla ========== -->
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
          <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="title">
                      <h5 >Perfil de Administrador
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#ModalRegister">
                            <i class="lni lni-plus"></i>
                            Agregar 
                        </button>
                      </h5>
                  </div>
                </div>
              <!-- end col -->
              <div class="col-md-6">
                  <ul class="breadcrumb-wrapper">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#0">Dashboard</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">
                                  Tables
                              </li>
                          </ol>
                      </nav>
                  </ul>
              </div>
              <!-- end col -->
          </div>
          <!-- end row -->
      </div>
      <!-- end title-wrapper -->

      <!-- ========== Codigo para mostrar mensaje de Perfil de administrador agregado ========== -->
      <?php
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])) 
        {
            echo '<h5>' . htmlspecialchars($_SESSION['success'], ENT_QUOTES, 'UTF-8') . '</h5>';
            unset($_SESSION['success']);

        }

        if(isset($_SESSION['status']) && !empty($_SESSION['status'])) 
        {
          echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_SESSION['status'], ENT_QUOTES, 'UTF-8') . '</div>';
          unset($_SESSION['status']);
        }

      ?>
      <!-- ========== fin de codigo ========== -->

      <!-- ========== title-wrapper end ========== -->
      <!-- ========== tables-wrapper start ========== -->
      <div class="tables-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-30">
              <h6 class="mb-10">Lista</h6>
              <!--  <p class="text-sm mb-20">
                For basic styling—light padding and only horizontal
                dividers—use the class table.
              </p> -->
              <!-- hacemos los siguiente para mostrar los datos de la BD en la tabla -->
              <?php
                $connection = mysqli_connect("localhost","root","","adminpanel");
                // Verificar la conexión
                if (!$connection) {
                  die("La conexión a la base de datos falló: " . mysqli_connect_error());
                }
                $query = "SELECT * FROM register";
                $query_run = mysqli_query($connection, $query);
              ?>
              <div class="table-wrapper table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> <h6> Id </h6> </th>
                      <th> <h6> Nombre </h6> </th>
                      <th> <h6> Correo electrónico </h6> </th>
                      <th> <h6> Contraseña   </h6> </th>
                      <th class="text-center"> <h6> Acciones </h6> </th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                      <?php
                        if(mysqli_num_rows($query_run) > 0) 
                        {
                            while($row = mysqli_fetch_assoc($query_run)) 
                            {
                              ?>
                                  <tr>
                                      <td class="min-width" ><?php echo $username = mysqli_real_escape_string($connection, $row['id']); ?></td><!-- nombre -->
                                      <td class="min-width" ><?php echo $username = mysqli_real_escape_string($connection, $row['username']); ?></td><!-- nombre -->
                                      <td class="min-width" ><?php echo $email = mysqli_real_escape_string($connection, $row['email']); ?></td><!-- correo -->
                                      <td class="min-width" ><?php $password = mysqli_real_escape_string($connection, $row['password']); ?></td><!-- contraseña -->
                                      <td class="min-width" ><!-- Acciones -->
                                          <!-- Editar -->
                                          <div class="action justify-content-end text-center">
                                              <form action="register_edit.php" method="POST">
                                                <div class="action">
                                                  <input type="hidden" name="edit_id" value="<?php echo $username = mysqli_real_escape_string($connection, $row['id']); ?>">
                                                    <button class="text-secondary" name="edit_btn">
                                                        <i class="lni lni-pencil-alt"></i>
                                                    </button>
                                                </div>
                                              </form>
                                              <!-- Eliminar -->
                                              <div class="action">
                                                  <button class="text-danger">
                                                      <i class="lni lni-trash-can"></i>
                                                  </button>
                                              </div>
                                              <!-- Ver -->
                                              <div class="action">
                                                  <button class="text-primary">
                                                      <i class="lni lni-eye"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </td> 
                                  </tr>
                              <?php
                            }
                        } 
                        else
                        {
                          echo "Registro no encontrado";
                        }
                      ?>
                  </tbody>
                </table>
                <!-- end table -->
              </div>
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
  <!-- ========== Fin de la Tabla ========== -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
