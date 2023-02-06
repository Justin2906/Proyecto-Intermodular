<?php
    require 'conexion.php';

    session_start();

    $idCliente = $_SESSION['idCliente'];

    $listaResenas = array();

    $consultaSQL = "SELECT * from Resenas where id_cliente = $idCliente;";
    
    if($resultado = mysqli_query($conexion, $consultaSQL)){
        while($row = mysqli_fetch_assoc($resultado)){
            $listaResenas[] = $row;
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
                <h2>Reseñas publicadas</h2>
                <hr>
                <div class="services">
                    <?php
                    foreach($listaResenas as $resena){
                        $idLugar = $resena['id_lugares'];
                        $idInstalacion = $resena['id_instalaciones'];
                
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
                        } ?>
                    <div class="info2">
                        <h3><?php print_r($lugar['Nombre']); ?></h3>
                        <h4>📍<?php print_r($lugar['Direccion']); ?></h4>
                        <h4><?php print_r($instalacion['Nombre'])?></h4>
                        <h4><?php print_r($resena['Texto']); ?></h4>
                        <h4><?php print_r($resena['Estrellas']); ?></h4>

                        <a class="btn btn-primary" href="ModificarResenas.php?idResena=<?php echo ($resena['id']) ?>">Modificar Reseña</a>
                        <a class="btn btn-primary" href="EliminarResenas.php?idResena=<?php echo ($resena['id']) ?>">Eliminar Reseña</a>
                    </div>&nbsp;&nbsp;&nbsp;
                    
                    <?php print_r("</br>");
                    } ?>
                </div>
            </div>
        </div>

    </main>
</body>

</html>