<?php

require 'conexion.php';

if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $contrasena2 = $_POST['contrasena2'];

  if ($nombre == "" || $email == "" || $usuario == "" || $contrasena == "" || $contrasena2 == "") {
?>
    <div class="container">
      <h5>Rellene todos los campos</h5>
    </div><?php
        } else {
          $consultaSQL1 = "SELECT Email, Usuario from Clientes;";
          if ($resultado1 = mysqli_query($conexion, $consultaSQL1)) {
            while ($row = mysqli_fetch_assoc($resultado1)) {
              $listausuarios[] = $row;
            }
          }
          $estado = "";

          foreach ($listausuarios as $usuario) {
            if ($email == $usuario['Email'] || $usuario == $usuario['Usuario']) {
              $estado = false;
              break;
            } else {
              $estado = true;
            }
          }

          if ($estado) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              if ($contrasena == $contrasena2) {
                $consultaSQL = "INSERT INTO Clientes (Nombre, Email, Usuario, Contrasena) values ('$nombre', '$email', '$usuario', '$contrasena');";

                $resultado = mysqli_query($conexion, $consultaSQL);

                if ($resultado) {
                  header('Location:Login.php');
                }
              } else {
                ?>
        <div class="algo" style="display:flex; justify-content: center;margin-top:10%; margin-bottom: -35px">
          <div style="background:lightgray; text-align: center; color:red; width: 500px; border-radius:10px" class="form-group">
            <h5>Las contraseñas no coinciden</h5>
          </div>
        </div>
      <?php
              }
            } else {
          ?>
        <div class="algo" style="display:flex; justify-content: center;margin-top:10%; margin-bottom: -35px">
          <div style="background:lightgray; text-align: center; color:red; width: 500px; border-radius:10px" class="form-group">
            <h5>El email no es válido</h5>
          </div>
        </div>
      <?php
            }
          } else {
      ?>
      <div class="algo" style="display:flex; justify-content: center;margin-top:10%; margin-bottom: -35px">
        <div style="background:lightgray; text-align: center; color:red; width: 500px; border-radius:10px" class="form-group">
          <h5>Email y/o usuario no disponible(s)</h5>
        </div>
      </div>
<?php

          }
        }
      }

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Rerservas Tumai</title>
  <link rel="icon" href="../img/logoReservas - copia.jpg" type="image/gif">
  <link rel="shortcut icon" href="/images/favicon.ico">
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/formulario.css">

  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-4">Insertar Contacto</h2>
        <hr>
        <form method="post" action="#">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="text" name="contrasena" id="contrasena" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="contrasena2">Repetir Contraseña</label>
            <input type="text" name="contrasena2" id="contrasena2" class="form-control" required>
          </div>
          <div class="form-group">
            <input style="background: #573b8a; color:#fff" type="submit" name="submit" class="btn btn-primary" value="Registrarse" onclick="validarContra();">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>