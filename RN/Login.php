<?php

    session_start();

    require 'conexion.php';

    if (isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
       
        $listaUsuarios = array();
        $inicio = false;

        $consultaSQL = "SELECT id, Usuario, Contrasena from Clientes;";

        if($resultado = mysqli_query($conexion, $consultaSQL)){
            while($row = mysqli_fetch_assoc($resultado)){
                $listaUsuarios[] = $row;
            }
        }

        foreach ($listaUsuarios as $registro){
            if ($usuario == $registro['Usuario']){
                if ($contrasena == $registro['Contrasena']){
                    $inicio = true;
                    $_SESSION['idCliente'] = $registro['id'];
                    break;
                }
            }
        }

        if ($inicio){
            header('Location:Inicio.php');
        } else {
          ?>
      <div class="algo" style="display:flex; justify-content: center">
        <div style="background:lightgray; text-align: center; color:red; width: 500px; border-radius:10px" class="form-group">
          <h5>Usuario y/o contraseña no correctos</h5>
        </div>
      </div>
<?php
        }
    }    

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Rerservas Tumai</title>
  <link rel="icon" href="../img/logoReservas - copia.jpg" type="image/gif">
  <link rel="shortcut icon" href="/images/favicon.ico">
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/formulario.css">
  <style>


  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-4">Iniciar Sesión</h2>
        <hr>
        <form method="post" action="#">
          <div class="form-group">
            <label for="nombre">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="apellidos">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" required>
          </div>
          <div class="form-group">
            <input style="background: #573b8a; color:#fff" type="submit" name="submit" class="btn btn-primary" value="Iniciar Sesión">
            <a class="btn btn-primary" href="Registro.php" >Registro</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>