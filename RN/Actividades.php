<?php
session_start();

echo ("Actividades");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas Tumai - Portal Reservas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/blogActividade.css">
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
    <main style="margin-bottom: 5%;">
        <section id="blog">
            <div class="contenedor">
                <article class="servicess" style="background:#573b8a; border-radius: 10px;">
                    <img src="img/857455.png">
                    <h4>Deportes</h4>
                    <hr>
                    <a class="btn btn-primary" href="Deportes.php">Reservar</a>
                </article>
                <article class="servicess" style="background:#573b8a; border-radius: 10px;">
                    <div class="opciones"></div>
                    <img src="img/195123.png">
                    <h4>Shows</h4>
                    <hr>
                    <a class="btn btn-primary" href="Shows.php">Reservar</a>
                </article>
            </div>
        </section>
    </main>
</body>

</html>