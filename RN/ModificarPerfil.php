<?php
session_start();

require 'conexion.php';

$idCliente = $_SESSION['idCliente'];

$consultaSQL1 = "SELECT * from Clientes where id = $idCliente;";

if ($resultado1 = mysqli_query($conexion, $consultaSQL1)) {
  while ($row = mysqli_fetch_assoc($resultado1)) {
    $usuario = $row;
  }
}

if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $usuarioForm = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $contrasena2 = $_POST['contrasena2'];

  if ($nombre == "" || $email == "" || $usuario == "" || $contrasena == "" || $contrasena2 == "") {
    echo ("Rellene todos los campos");
  } else {
    if ($email == $usuario['Email'] && $usuarioForm == $usuario['Usuario']) {
      if ($contrasena == $contrasena2) {
        $consultaSQL = "UPDATE Clientes SET Nombre = '$nombre', Email = '$email', Usuario = '$usuarioForm', Contrasena = '$contrasena' where id = $idCliente;";
        $resultado = mysqli_query($conexion, $consultaSQL);

        if ($resultado) {
          header('Location:Perfil.php');
        }
      } else {
        ?>
        <div class="algo" style="display:flex; justify-content: center; margin-top:10%; margin-bottom: -35px">
          <div style="background:lightgray; text-align: center; color:red; width: 500px; border-radius:10px" class="hola">
            <h3>Las contraseñas no coinciden</h3>
          </div>
        </div>
      <?php
      }
    } else if ($email == $usuario['Email'] && $usuarioForm != $usuario['Usuario']) {
      $consultaSQL2 = "SELECT Usuario from Clientes;";
      if ($resultado2 = mysqli_query($conexion, $consultaSQL2)) {
        while ($row = mysqli_fetch_assoc($resultado2)) {
          $listausuarios[] = $row;
        }
      }
      $estado = "";

      foreach ($listausuarios as $registro) {
        if ($usuarioForm == $registro['Usuario']) {
          $estado = false;
          break;
        } else {
          $estado = true;
        }
      }

      if ($estado) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($contrasena == $contrasena2) {
            $consultaSQL = "UPDATE Clientes SET Nombre = '$nombre', Email = '$email', Usuario = '$usuarioForm', Contrasena = '$contrasena' where id = $idCliente;";
            $resultado = mysqli_query($conexion, $consultaSQL);

            if ($resultado) {
              header('Location:Perfil.php');
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
    } else if ($email != $usuario['Email'] && $usuarioForm == $usuario['Usuario']) {
      $consultaSQL2 = "SELECT Email from Clientes;";
      if ($resultado2 = mysqli_query($conexion, $consultaSQL2)) {
        while ($row = mysqli_fetch_assoc($resultado2)) {
          $listausuarios[] = $row;
        }
      }
      $estado = "";

      foreach ($listausuarios as $registro) {
        if ($email == $registro['Email']) {
          $estado = false;
          break;
        } else {
          $estado = true;
        }
      }

      if ($estado) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($contrasena == $contrasena2) {
            $consultaSQL = "UPDATE Clientes SET Nombre = '$nombre', Email = '$email', Usuario = '$usuarioForm', Contrasena = '$contrasena' where id = $idCliente;";
            $resultado = mysqli_query($conexion, $consultaSQL);

            if ($resultado) {
              header('Location:Perfil.php');
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
    } else {
      $consultaSQL2 = "SELECT Email, Usuario from Clientes;";
      if ($resultado2 = mysqli_query($conexion, $consultaSQL2)) {
        while ($row = mysqli_fetch_assoc($resultado2)) {
          $listausuarios[] = $row;
        }
      }
      $estado = "";

      foreach ($listausuarios as $registro) {
        if ($email == $registro['Email'] || $usuarioForm == $registro['Usuario']) {
          $estado = false;
          break;
        } else {
          $estado = true;
        }
      }

      if ($estado) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($contrasena == $contrasena2) {
            $consultaSQL = "UPDATE Clientes SET Nombre = '$nombre', Email = '$email', Usuario = '$usuarioForm', Contrasena = '$contrasena' where id = $idCliente;";
            $resultado = mysqli_query($conexion, $consultaSQL);

            if ($resultado) {
              header('Location:Perfil.php');
            }
          } else {
            ?>
        <div class="algo" style="display:flex; justify-content: center; margin-top:10%; margin-bottom: -35px">
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
} else if (isset($_POST['borrar'])) {
  header('Location:EliminarPerfil.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas Tumai - Perfil Usuario</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/formulario.css">
  <link rel="stylesheet" href="css/bienvenidos.css">
</head>

<body>
  <header>
    <div class="contenedor">
      <section>
        <nav class="navbar">
          <!-- LOGO -->
          <div class="logo">
            <img src="img/logo.png" alt="">
          </div>
          <!-- NAVIGATION MENU -->
          <ul class="nav-links">
            <!-- USING CHECKBOX HACK -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <!-- NAVIGATION MENUS -->
            <div class="menu">
              <li><a class="btn btn-primary" href="Inicio.php">Inicio</a></li>
              <hr>
              <li><a class="btn btn-primary" href="Actividades.php">Reservar</a></li>
              <hr>
              <li><a class="btn btn-primary" href="Resenas.php">Reseñas</a></li>
              <hr>
              <li class="services">
                <a href="Perfil.php">Perfil</a>
                <!-- DROPDOWN MENU -->
                <ul class="dropdown">
                  <li><a href="Perfil.php">Ver perfil</a></li>
                  <hr>
                  <li><a href="ResenasUsuario.php">Mis reseñas</a></li>
                  <hr>
                  <li><a href="Login.php">Cerrar sesión</a></li>
                </ul>
              </li>
            </div>
          </ul>
        </nav>
      </section>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row" style="margin-top: 6%">
        <div class="col-md-12">
          <h2 class="mt-4">Perfil Usuario</h2>
          <hr>
          <form method="post" action="#">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo ($usuario['Nombre']) ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control" value="<?php echo ($usuario['Email']) ?>" required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo ($usuario['Usuario']) ?>" required>
            </div>
            <div class="form-group">
              <label for="contrasena">Contraseña</label>
              <input type="text" name="contrasena" id="contrasena" class="form-control" value="<?php echo ($usuario['Contrasena']) ?>" required>
            </div>
            <div class="form-group">
              <label for="contrasena2">Repetir Contraseña</label>
              <input type="text" name="contrasena2" id="contrasena2" class="form-control" value="<?php echo ($usuario['Contrasena']) ?>" required>
            </div>
            <div class="form-group">
              <input style="background: #573b8a; color:#fff" type="submit" name="submit" class="btn btn-primary" value="Confirmar Cambios">
              <input style="background: #573b8a; color:#fff" type="submit" name="borrar" class="btn btn-primary" value="Eliminar Perfil"></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>