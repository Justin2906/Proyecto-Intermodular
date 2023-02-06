"<?php
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
  $consultaSQL = "DELETE from Clientes where id = $idCliente;";

  $resultado = mysqli_query($conexion, $consultaSQL);

  if ($resultado) {
    header('Location:Login.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas Tumai - Perfil Usuario
  </title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/eliminar.css">
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
      <div class="row" style="margin-top: 10%">
        <div class="col-md-12">
          <h2 class="mt-4">Perfil Del Usuario</h2>
          <hr>
          <article class="info">
            <div class="escrito">
              <p style="float: left">Nombre: </p>
              <p style="float: right"><?php echo ($usuario['Nombre']) ?></p>
            </div>
          </article><br><br>
          <hr>
          <article class="info">
            <div class="escrito">
              <p style="float: left">Correo Electronico: </p>
              <p style="float: right"><?php echo ($usuario['Email']) ?></p>
            </div>
          </article><br><br>
          <hr>
          <article class="info">
            <div class="escrito">
              <p style="float: left">Nombre de Usuario: </p>
              <p style="float: right"><?php echo ($usuario['Usuario']) ?></p>
            </div>
          </article><br><br>
          <hr>
          <article class="info">
            <div class="escrito">
              <p style="float: left">Contraseña: </p>
              <p style="float: right"><?php echo ( $usuario['Contrasena']) ?></p>
            </div>
          </article><br><br>
          <hr>
          <div class="form-group">
            <input style="background: #573b8a; color:#fff" type="submit" name="submit" class="btn btn-primary" value="Eliminar Perfil">
            <br>
          </div>
        </div>
      </div>
  </main>"