<?php
    session_start();

    require 'conexion.php';

    $consultaSQL = "SELECT id, Nombre, Direccion, Foto from Lugares where Tipo = 'Shows';";
    $listaEspectaculos = array();

    if($resultado = mysqli_query($conexion, $consultaSQL)){
        while($row = mysqli_fetch_assoc($resultado)){
            $listaEspectaculos[] = $row;
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
        <div class="info" style="justify-content:center; display: flex; margin-bottom:5%">
            <div class="polis">
                <h2>Lugares disponibles</h2>
                <hr>
                <div class="services">
                    <?php
                    foreach ($listaEspectaculos as $registro) { ?>
                    <div class="info2">
                        <h3><?php print_r($registro['Nombre']); ?></h3>
                        <h4>📍<?php print_r($registro['Direccion']); ?></h4>
                        <img src="Fotos BBDD/<?php echo ($registro['Foto']) ?>" alt=""><br>
                        <a class="btn btn-primary" href="Teatros.php?id=<?php echo ($registro['id']) ?>">Reservar</a><br>
                    </div>&nbsp;&nbsp;&nbsp;
                    
                        
                    <?php print_r("</br>");
                    } ?>
                </div>
            </div>
        </div>

    </main>
</body>

</html>