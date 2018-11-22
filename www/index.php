<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>SSC - Software de Control de Stock </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container-fluid" style="margin-top: 75px; margin-right: 130px">
      <div class="row">
        <div class="col-sm-12" style="padding-left: 548px">
          <img src="img/elephant2.png"  height="350" alt="logo">
        </div>
      </div>
      <br>
    <div class="row">
      <div class="col-sm-12" style="margin-top: -35px; padding-left: 450px">
        <img src="img/logo_elephant.png"  height="150" alt="logo">
      </div>
    </div>
      <br><br><br><br>
      <form class="login" style="margin-top: -60px; margin-left: 42px" action="index.php" method="post">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
          <label style="margin-top: 5px"><span style="padding-left: 230px" class="glyphicon glyphicon-user"></span></label>
        </div>
        <div class="col-sm-7" style="padding-left: 60px">
          <input class="form-control" style="width: 220px" type="text" name="user" placeholder="Ingrese su usuario">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
          <label style="margin-top: 8px"><span style="padding-left: 230px" class="glyphicon glyphicon-wrench"></span></label>
        </div>
        <div class="col-sm-7" style="padding-left: 60px">
          <input class="form-control" style="width: 220px; margin-top: 5px" type="password" name="pass" placeholder="Ingrese su contraseña">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-3" style="padding-left: 95px">
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

        require 'db/conexion.php';
        $db = new MyDB("db");

        $sql = ("SELECT * FROM Usuarios WHERE username = '$user' AND pass = '$pass'");
        $ret = $db->query($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
          $id = $row['id_U'];
          $name = $row['name'];
          $userName = $row['username'];
          $password = $row['pass'];
          $date_alt = $row['date_Alt'];
          $admin = $row['admin'];

          $_SESSION['id'] = $id;
          $_SESSION['name'] = $name;
          $_SESSION['username'] = $userName;
          $_SESSION['pass'] = $password;
          $_SESSION['admin'] = $admin;


        if($userName == $user && $password == $pass){
          ?>
          <script>
            window.location.replace('home.php');  // redireccionar a otra pagina.
          </script>

        <?php
      } else {
        ?><script>
         alert("Error de autenticación!! Intentelo nuevamente ingresando su usuario y contraseña correctamente.");
        </script><?
        }
      }
    }
      ?>

  </body>
</html>
