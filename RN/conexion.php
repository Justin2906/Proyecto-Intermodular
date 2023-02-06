<?php
    $host = "localhost";
    $user = "root";
    $clave = "";
    $basededatos = "RN";

    $conexion = mysqli_connect($host, $user, $clave, $basededatos);

    if(mysqli_connect_errno()){
        echo("Ha ocurrido un error en la conexión con la base de datos. <br>");
        exit();
    }

    mysqli_select_db($conexion, $basededatos) or die ("Base de datos incorrecta. <br>");

    mysqli_set_charset($conexion, "UTF8");

    echo("Todo ha salido bien<br><br>");
?>