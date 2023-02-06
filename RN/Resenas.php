<?php
require 'conexion.php';

session_start();

$consultaSQL = "SELECT * from Resenas;";

if ($resultado = mysqli_query($conexion, $consultaSQL)) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $listaResenas[] = $row;
    }
}

if (empty($listaResenas)) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservas Tumai - Portal Reseñas</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/busqueda.css">
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
                                <li><a class="btn btn-primary" style="color: #4c9e9e" href="Resenas.php">Reseñas</a></li>
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
            <div class="resenas-activas" style="float:right; margin-top:10%">
                <div class="ver">
                    <h1>Lista de Reservas</h1>
                    <hr>
                    <p>
                        aun no hay reseñas publicadas en la pagina, si desea realizar una reserva pincha en el boton de debajo.
                        <a href="Inicio.php">Nueva Reseña</a>
                    </p>

                </div>
            </div>

        </main>
    </body>

    </html>
    <?php } else {?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservas Tumai - Portal Reseñas</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/busqueda.css">
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
                                <li><a class="btn btn-primary" style="color: #4c9e9e" href="Resenas.php">Reseñas</a></li>
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
                <div class="row" style="margin-top: 10%;float:left">
                    <div class="col-md-12">
                        <h2 class="mt-4">Búsqueda</h2>
                        <hr>
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="busqueda">Buscar</label>
                                <input type="text" name="busqueda" id="busqueda" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </form>
                        <a class="btn btn-primary" href="Resenas.php"><input type="submit" name="todo" class="btn btn-primary" value="Ver Todo"></a>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <div class="resenas-activas" style="float:right; margin-top:10%">
    <h1>Reseñas</h1>
    <hr>
    <?php
    foreach($listaResenas as $resena){
        $idCliente = $resena['id_cliente'];
        $idLugar = $resena['id_lugares'];
        $idInstalacion = $resena['id_instalaciones'];

        $consultaSQL1 = "SELECT Usuario from Clientes where id = $idCliente;";
    
        if($resultado1 = mysqli_query($conexion, $consultaSQL1)){
            while($row = mysqli_fetch_assoc($resultado1)){
                $usuario = $row;
            }
        }

        $consultaSQL1 = "SELECT Nombre, Direccion from Lugares where id = $idLugar;";
    
        if($resultado1 = mysqli_query($conexion, $consultaSQL1)){
            while($row = mysqli_fetch_assoc($resultado1)){
                $lugar = $row;
            }
        }
        
        $consultaSQL1 = "SELECT Nombre from Instalaciones where id = $idInstalacion;";
    
        if($resultado1 = mysqli_query($conexion, $consultaSQL1)){
            while($row = mysqli_fetch_assoc($resultado1)){
                $instalacion = $row;
            }
        }

        if(isset($_POST['submit'])){
            $busqueda = $_POST['busqueda'];
                if (str_contains(strtolower($lugar['Nombre']), strtolower($busqueda)) || str_contains(strtolower($instalacion['Nombre']), strtolower($busqueda))){?>
                    <div class="ver">
                        <p>Usuario remitente: <?= $usuario['Usuario'] ?></p>
                        </br>
                        <p>Lugar de la Reserva: <?= $lugar['Nombre'] ?></p>
                        </br>
                        <p>Direccion de la Reserva: <?= $lugar['Direccion'] ?></p>
                        </br>
                        <p>Nombre del lugar: <?= $instalacion['Nombre'] ?></p>
                        </br>
                        <p>Reseña del usuario: <?= $resena['Texto'] ?></p>
                        </br>
                        <p>Estrellas recibidas: <?= $resena['Estrellas'] ?></p>
                    </div>
                    <?php print_r("</br>");
                } 
        } else {?>
            <div class="ver">
                <p>Usuario remitente: <?= $usuario['Usuario'] ?></p>
                </br>
                <p>Lugar de la Reserva: <?= $lugar['Nombre'] ?></p>
                </br>
                <p>Direccion de la Reserva: <?= $lugar['Direccion'] ?></p>
                </br>
                <p>Nombre del lugar: <?= $instalacion['Nombre'] ?></p>
                </br>
                <p>Reseña del usuario: <?= $resena['Texto'] ?></p>
                </br>
                <p>Estrellas recibidas: <?= $resena['Estrellas'] ?></p>
            </div>
            <?php print_r("</br>");
    
        }
    }?>
    </html>   
    <?php

}
//

mysqli_close($conexion);
?>