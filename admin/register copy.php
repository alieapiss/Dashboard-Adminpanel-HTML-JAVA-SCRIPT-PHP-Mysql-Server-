<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

  <!-- ========== Inicio de Modal ========== -->
  <!-- Modal -->
  <div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Formulario ingrese sus datos -->
            <div class="card">
              <div class="card-header text-white bg-dark">
                <h4 class="card-title">Ingrese sus Datos</h4>
              </div>
              <div>
                <form action="code.php" method="POST" enctype="multipart/form-data">
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
                        <label for="InputPassword">Contraseña</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="lni lni-lock"></i></span>
                          </div>
                          <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        </div>
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
                      <label for="InputPhone">Número de teléfono</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="lni lni-phone"></i></span>
                        </div>
                        <input type="phone" name="phone" class="form-control" placeholder="Teléfono">
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
                    <div class="form-row">
                      <!-- Inicio Imagen -->
                      <div class="form-group col-md-8">
                        <label for="inputImage">Imagen</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="lni lni-image"></i></span>
                          </div>
                          <input type="file" type="file" id="selImg" name="image" class="form-control" onclick="actualizarImg()">
                        </div>
                      </div>
                      <script>
                          function actualizarImg() {
                              const $inputfile = document.querySelector("#image"),
                                  $imgProducto = document.querySelector("#image");
                              $inputfile.addEventListener("change", () => {
                                  const files = $inputfile.files;
                                  if (!files || !files.length) {
                                      $imgProducto.src = "";
                                      return;
                                  }
                                  const archivoInicial = files[0];
                                  const Url = URL.createObjectURL(archivoInicial);
                                  $imgProducto.src = Url;
                              });
                          }
                      </script>
                      <!-- Fin Imagen -->
                      <div class="form-group col-md-4">
                      <label for="inputCity">Ciudad</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="lni lni-map-marker "></i></span>
                        </div>
                        <input type="text" name="city" class="form-control" id="inputCity">
                      </div>
                      </div>
                    </div>
                    <!-- Fin card-body -->
                    <div class="card-footer">
                      <button type="submit" name="registerbtn" class="btn btn-primary">Guardar</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </form>
              </div>
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
                      <th> <h6> Apellidos </h6> </th>
                      <th> <h6> E-mail </h6> </th>
                      <th> <h6> Contraseña </h6> </th>
                      <th> <h6> Teléfono </h6> </th>
                      <th> <h6> Dirección </h6> </th>
                      <th> <h6> Imagen </h6> </th>
                      <th> <h6> Ciudad </h6> </th>
                      <th> <h6> Fecha </h6> </th>
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
                                      <td class="min-width" ><?php echo $id = mysqli_real_escape_string($connection, $row['id']); ?></td><!-- nombre -->
                                      <td class="min-width" ><?php echo $username = mysqli_real_escape_string($connection, $row['username']); ?></td><!-- nombre -->
                                      <td class="min-width" ><?php echo $lastname = mysqli_real_escape_string($connection, $row['lastname']); ?></td><!-- Apellidos -->
                                      <td class="min-width" ><?php echo $email = mysqli_real_escape_string($connection, $row['email']); ?></td><!-- correo -->
                                      <td class="min-width" ><?php $password = mysqli_real_escape_string($connection, $row['password']); ?></td><!-- contraseña -->
                                      <td class="min-width" ><?php echo $phone = mysqli_real_escape_string($connection, $row['phone']); ?></td><!-- Telefono -->
                                      <td class="min-width" ><?php echo $address = mysqli_real_escape_string($connection, $row['address']); ?></td><!-- Direccion -->
                                      <td><img src="/admin/assets/images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" onerror="this.src='/admin/assets/images/noimage.png'" width="50" height="70"></td>
                                      <td class="min-width" ><?php echo $city = mysqli_real_escape_string($connection, $row['city']); ?></td><!-- Ciudad -->
                                      <td class="min-width" ><?php echo $date = mysqli_real_escape_string($connection, $row['date']); ?></td><!-- Fecha -->
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
