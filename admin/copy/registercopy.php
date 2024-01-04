<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
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
                        <button type="button" class="btn btn-primary ml-3" onclick="window.location.href='register_add.php'">
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
/*         if(isset($_SESSION['success']) && !empty($_SESSION['success'])) 
        {
            echo '<h5>' . htmlspecialchars($_SESSION['success'], ENT_QUOTES, 'UTF-8') . '</h5>';
            unset($_SESSION['success']);

        }

        if(isset($_SESSION['status']) && !empty($_SESSION['status'])) 
        {
          echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_SESSION['status'], ENT_QUOTES, 'UTF-8') . '</div>';
          unset($_SESSION['status']);
        } */

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
              <!-- ======= Mostrar mensajes si la imagen existe o no ======= -->
              <?php
                if (isset($_SESSION['success']) && $_SESSION['success'] !='') 
                {
                  echo '<h5 class="bg-primary text-dark"> '.$_SESSION['success'].' </h5>';  
                  unset($_SESSION['success']);
                } 
                if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                {
                  echo '<h5 class="bg-primary text-dark"> '.$_SESSION['status'].' </h5>';  
                  unset($_SESSION['status']);
                } 
              ?>
              <!-- hacemos los siguiente para mostrar los datos de la BD en la tabla -->
              <?php
                $connection = mysqli_connect("localhost","root","","registercopia2");
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
                      <th> <h6> Perfil </h6> </th>
                      <th> <h6> Nombre </h6> </th>
                      <th> <h6> Apellidos </h6> </th>
                      <th> <h6> E-mail </h6> </th>
                      <th> <h6> Teléfono </h6> </th>
                      <th> <h6> Contraseña </h6> </th>
                      <th> <h6> Dirección </h6> </th>
                      <th> <h6> Ciudad </h6> </th>
                      <th> <h6> Curriculum Vitae </h6> </th>
                      <th> <h6> Tipo de Usuario </h6> </th>
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
                                      <td> <?php echo '<img class="rounded-circle" src="upload/'.$row['image'].'" width="50px;" height="50px;" alt="Image">' ?></td> <!-- Imagen -->
                                      <td class="min-width" ><?php echo $username = mysqli_real_escape_string($connection, $row['username']); ?></td><!-- nombre -->
                                      <td class="min-width" ><?php echo $lastname = mysqli_real_escape_string($connection, $row['lastname']); ?></td><!-- Apellidos -->
                                      <td class="min-width" ><?php echo $email = mysqli_real_escape_string($connection, $row['email']); ?></td><!-- correo -->
                                      <td class="min-width"><?php echo $phone = mysqli_real_escape_string($connection, $row['phone']); ?></td><!-- Teléfono -->
                                      <td class="min-width" ><?php $password = mysqli_real_escape_string($connection, $row['password']); ?></td><!-- contraseña -->
                                      <td class="min-width" ><?php echo $address = mysqli_real_escape_string($connection, $row['address']); ?></td><!-- Direccion -->
                                      <td class="min-width" ><?php echo $city = mysqli_real_escape_string($connection, $row['city']); ?></td><!-- Ciudad -->
                                      <td> 
                                        <?php
                                          // Verificar si hay un archivo PDF asociado al registro
                                          if (!empty($row['pdf_file'])) {
                                              echo '<a href="pdfFile/' . $row['pdf_file'] . '" target="_blank"><img src="pdfFile/pdf_icon.png" width="50px;" height="50px;" alt="PDF"></a>';
                                          } else {
                                              echo 'No hay archivo PDF';
                                          } 
                                        ?>
                                      </td> <!-- Archivo PDF -->
                                      <td class="min-width" ><?php echo $usertype = mysqli_real_escape_string($connection, $row['usertype']); ?></td><!-- tipo de usuario -->
                                      <td class="min-width"><?php echo $row['date']; ?></td><!-- Fecha -->

                                      <td class="min-width" ><!-- Acciones -->
                                          <!-- Editar -->
                                          <div class="action justify-content-end text-center">
                                              <form action="register_editcopy.php" method="POST">
                                                <div class="action">
                                                  <input type="hidden" name="edit_id" value="<?php echo $username = mysqli_real_escape_string($connection, $row['id']); ?>">
                                                    <button class="text-secondary" name="edit_btn">
                                                        <i class="lni lni-pencil-alt"></i>
                                                    </button>
                                                </div>
                                              </form>
                                              <!-- Eliminar -->
                                              <div class="action">
                                                  <form action="codecopy.php" method="POST">
                                                  <input type="hidden" name="delete_id" value="<?php echo $username = mysqli_real_escape_string($connection, $row['id']); ?>">
                                                    <button type="submit" name="deletebtn" class="text-danger">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                  </form>
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


