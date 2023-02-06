<?php
require 'conexion.php';

session_start();

$idCliente = $_SESSION['idCliente'];

$listaReservas = array();

$consultaSQL = "SELECT * from Reservas where id_cliente = $idCliente;";

if ($resultado = mysqli_query($conexion, $consultaSQL)) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $listaReservas[] = $row;
    }
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
    <link rel="stylesheet" href="css/poli.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="css/services.css">
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
        <div class="info" style="justify-content:center; display: flex; margin-bottom:5%; margin-top:10%">
            <div class="polis">
                <h2>Reservas Activas</h2>
                <hr>
                <div class="services">
                    <?php              
                    foreach ($listaReservas as $registro) {
                        $idLugar = $registro['id_lugares'];
                        $idInstalacion = $registro['id_instalaciones'];
                    
                        $consultaSQL1 = "SELECT Nombre, Direccion from Lugares where id = $idLugar;";
                    
                        if ($resultado1 = mysqli_query($conexion, $consultaSQL1)) {
                            while ($row = mysqli_fetch_assoc($resultado1)) {
                                $lugar = $row;
                            }
                        }
                    
                        $consultaSQL1 = "SELECT Nombre from Instalaciones where id = $idInstalacion;";
                    
                        if ($resultado1 = mysqli_query($conexion, $consultaSQL1)) {
                            while ($row = mysqli_fetch_assoc($resultado1)) {
                                $instalacion = $row;
                            }
                        }?>
                        <div class="info2">
                            <h3>Lugar de la Reserva: <?= $lugar['Nombre'] ?></h3><br>
                            <h4>Direccion: <?= $lugar['Direccion'] ?></h4><br>
                            <h4>Nombre de la instalacion: <?= $instalacion['Nombre'] ?></h4><br>
                            <h4>Fecha de la reserva: <?= $registro['Fecha'] ?></h4><br>
                            <h4>Hora de la reserva: <?= $registro['Hora'] ?></h4><br>

                            <a class="btn btn-primary" href="ModificarReservas.php?idReserva=<?php echo ($registro['id']) ?>">Modificar reserva</a>
                            <a class="btn btn-primary" href="EliminarReservas.php?idReserva=<?php echo ($registro['id']) ?>">Eliminar reserva</a>
                        </div>&nbsp;&nbsp;&nbsp;

                    <?php print_r("</br>");
                    } ?>
                </div>
            </div>
        </div>

    </main>
</body>

</html>
