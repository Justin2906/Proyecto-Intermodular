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
    }
}
if (empty($listaReservas)) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservas Tumai - Pagina Principal</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/banner.css">
        <link rel="stylesheet" href="css/blog.css">
        <link rel="stylesheet" href="css/bienvenido.css">
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
                                <li><a style="color: #4c9e9e" class="btn btn-primary" href="Inicio.php">Inicio</a></li>
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
            <section id="banner" class="banner">
                <img src="img/the-twilight-of-peyto-lake_ff33d88c_1100x550.jpg" alt="">
                <div class="texto" style="text-align: center; width: 100%;">
                    <h2>Bienvenidos a Reservas Tumai</h2>
                    <p>El sitio donde todas las reservas estan en la palma de tu mano.</p>
                    <a href="Actividades.php">Sugerencia de Reservas</a>
                </div>
            </section>
            <div class="contenedor">
                <section id="bienvenidos">
                    <div class="reservas-activas">
                        <H2>Reservas Recientes</H2>
                        <hr>
                        <h1 style="padding: 7%; font-size: 38px">No tiene ninguna reserva activa en estos momentos. Si desea realizar una reserva pinche en el boton que se encuentra debajo</h1>
                        <div class="enlaces" style="text-align: center">
                            <a class="btn btn-primary" href="Actividades.php">Realizar una reserva</a>
                        </div>
                        
                    </div>
            </div>
            <div class="img">
                <img src="img/gettyimages-96418878-612x612.jpg" alt=""><br>
            </div>
            </div>
        </main>
    </body>

    </html>
<?php } else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservas Tumai - Pagina Principal</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/banner.css">
        <link rel="stylesheet" href="css/blog.css">
        <link rel="stylesheet" href="css/bienvenido.css">
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
                                <li><a style="color: #4c9e9e" class="btn btn-primary" href="Inicio.php">Inicio</a></li>
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
            <section id="banner" class="banner">
                <img src="img/the-twilight-of-peyto-lake_ff33d88c_1100x550.jpg" alt="">
                <div class="texto" style="text-align: center; width: 100%;">
                    <h2>Bienvenidos a Reservas Tumai</h2>
                    <p>El sitio donde todas las reservas estan en la palma de tu mano.</p>
                    <a href="Actividades.php">Sugerencias de reservas</a>
                </div>
            </section>
            <div class="contenedor">
                <section id="bienvenidos">
                    <div class="reservas-activas">
                        <H2>Reservas Recientes</H2>
                        <hr>
                        <p>Lugar de la Reserva: <?= $lugar['Nombre'] ?></p><br>
                        <p>Direccion: <?= $lugar['Direccion'] ?></p><br>
                        <p>Nombre de la instalacion: <?= $instalacion['Nombre'] ?></p><br>
                        <p>Fecha de la reserva: <?= $registro['Fecha'] ?></p><br>
                        <p>Hora de la reserva: <?= $registro['Hora'] ?></p><br>

                        <div class="enlaces" style="text-align: center">
                            <a class="btn btn-primary" href="ReservasUsuario.php">Ver Reservas</a>
                            <a class="btn btn-primary" href="ModificarReservas.php?idReserva=<?php echo ($registro['id']) ?>">Modificar reserva</a>
                            <a class="btn btn-primary" href="EliminarReservas.php?idReserva=<?php echo ($registro['id']) ?>">Eliminar reserva</a>
                            <a class="btn btn-primary" href="InsertarResenas.php?idReserva=<?php echo ($registro['id']) ?>">Añadir Reseña</a>
                        </div>

                    </div>
            </div>
            <div class="img">
                <img src="img/gettyimages-96418878-612x612.jpg" alt=""><br>
            </div>
        </main>
    </body>

    </html>
<?php
}

//

mysqli_close($conexion);
?>