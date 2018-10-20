<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>SSC - Software de Control de Stock </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container-fluid" style="margin-top: 35px; margin-right: 100px">
      <div class="row">
        <div class="col-sm-12" style="padding-left: 448px">
          <img src="img/elephant2.png"  height="350" alt="logo">
        </div>
      </div>
      <br>
    <div class="row">
      <div class="col-sm-12" style="margin-top: -35px; padding-left: 356px">
        <img src="img/logo_elephant.png"  height="150" alt="logo">
      </div>
    </div>
      <br><br><br><br>
      <form class="login" style="margin-top: -60px" action="index.php" method="post">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
          <label style="margin-top: 5px"><span style="padding-left: 200px" class="glyphicon glyphicon-user"></span></label>
        </div>
        <div class="col-sm-7" style="padding-left: 60px">
          <input class="form-control" style="width: 220px" type="text" name="user" placeholder="Ingrese su usuario">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
          <label style="margin-top: 8px"><span style="padding-left: 200px" class="glyphicon glyphicon-wrench"></span></label>
        </div>
        <div class="col-sm-7" style="padding-left: 60px">
          <input class="form-control" style="width: 220px; margin-top: 5px" type="password" name="pass" placeholder="Ingrese su contraseña">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-3" style="padding-left: 100px">
          <button style="font-family: verdana; font-weight: bolder" type="submit" name="ingresar" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-log-in"></span><strong> INGRESAR</strong></button>
        </div>
        <div class="col-sm-4"></div>
      </div>
      </form>
    </div>

    <?php

      if (isset($_POST['ingresar'])) {

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        require 'include/conexion.php';

        $sql = ("SELECT * FROM Usuarios WHERE username = '$user' AND pass = '$pass'");
        $ret = $db->query($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
          $id = $row['id_U'];
          $name = $row['name'];
          $userName = $row['username'];
          $password = $row['pass'];
          $date_alt = $row['date_Alt'];

        //  $_SESSION['name'] = $name;


        if($userName == $user && $password == $pass){
          ?>
          <script>
            window.location.replace('menu.php');  // redireccionar a otra pagina.
          </script>

        <?php
      } else {
         echo "Error de autenticación!! Intentelo nuevamente ingresando su usuario y contraseña correctamente.";
        }
      }
    }
      ?>

  </body>
</html>
