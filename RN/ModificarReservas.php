<?php
session_start();

require 'conexion.php';

$idReserva = $_GET['idReserva'];

$consultaSQL1 = "SELECT Fecha, Hora, id_lugares, id_instalaciones from Reservas where id = $idReserva;";
if ($resultado1 = mysqli_query($conexion, $consultaSQL1)) {
  while ($row = mysqli_fetch_assoc($resultado1)) {
    $reserva = $row;
  }
}

$idLugar = $reserva['id_lugares'];
$idInstalacion = $reserva['id_instalaciones'];

$consultaSQL2 = "SELECT Nombre, Direccion from Lugares where id = $idLugar;";
if ($resultado2 = mysqli_query($conexion, $consultaSQL2)) {
  while ($row = mysqli_fetch_assoc($resultado2)) {
    $lugar = $row;
  }
}

$consultaSQL3 = "SELECT Nombre from Instalaciones where id = $idInstalacion;";
if ($resultado3 = mysqli_query($conexion, $consultaSQL3)) {
  while ($row = mysqli_fetch_assoc($resultado3)) {
    $instalacion = $row;
  }
}

if (isset($_POST['submit'])) {
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];

  $listareservas = array();

  $consultaSQL3 = "SELECT Fecha, Hora from Reservas where id_lugares = $idLugar AND id_instalaciones = $idInstalacion;";
  if ($resultado3 = mysqli_query($conexion, $consultaSQL3)) {
    while ($row = mysqli_fetch_assoc($resultado3)) {
      $listareservas[] = $row;
    }
  }

  $estado = "";

  if (sizeof($listareservas) == 0) {
    $estado = true;
  } else {
    foreach ($listareservas as $reserva) {
      if ($fecha == $reserva['Fecha'] && $hora == $reserva['Hora']) {
        $estado = false;
        break;
      } else {
        $estado = true;
      }
    }
  }

  if ($estado) {
    $consultaSQL = "UPDATE Reservas SET Fecha = '$fecha', Hora = '$hora' where id = $idReserva;";

    $resultado = mysqli_query($conexion, $consultaSQL);

    if ($resultado) {
      header('Location:Inicio.php');
    }
  } else {
    ?>
    <div class="algo" style="display:flex; justify-content: center;margin-top:10%; margin-bottom: -35px">
      <div style="background:lightgray; text-align: center; color:red; width: 500px; border-radius:10px" class="form-group">
        <h5>Fecha y Hora no disponibles</h5>
      </div>
    </div>
  <?php
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas Tumai - Pagina Principal</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/formulario.css">
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
                <a href="perfil.php">Perfil</a>
                <!-- DROPDOWN MENU -->
                <ul class="dropdown">
                  <li><a href="Perfil.php">Ver perfil</a></li>
                  <hr>
                  <li><a href="ResenasUsuario.php">Mis reseñas</a></li>
                  <hr>
                  <li><a href="Login.html">Cerrar sesión</a></li>
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
      <div class="row" style="margin-top:8%">
        <div class="col-md-12">
          <h2 class="mt-4">Reserva</h2>
          <hr>
          <form method="post" action="#">
            <h3><?php echo ($lugar['Nombre']) ?></h3>
            <h3><?php echo ($lugar['Direccion']) ?></h3>
            <h3><?php echo ($instalacion['Nombre']) ?></h3>
            <div class="form-group">
              <label for="fecha">Fecha</label>
              <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo ($reserva['Fecha']) ?>" required>
            </div>
            <div class="form-group">
              <label for="hora">Hora</label>
              <input type="time" name="hora" id="hora" class="form-control" value="<?php echo ($reserva['Hora']) ?>" required>
            </div>
            <div class="form-group">
              <input style="background: #573b8a; color:#fff" type="submit" name="submit" class="btn btn-primary" value="Modificar Reserva">
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>
</body>

</html>