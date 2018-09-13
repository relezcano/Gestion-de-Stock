<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>SC - Software de Control de Stock </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container-fluid" style="margin-top: 180px; margin-right: 100px">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h1 style="font-size: 37px; color: #ffffff"><strong>SC - Software para control de Stock</strong></h1>
          <h2 style="font-size: 25px; color: #ffffff">Ingrese con su credencial para acceder al menú principal</h2>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <br><br>
      <form class="login" action="index.php" method="post">
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1">
          <label>Usuario</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="user" placeholder="Ingrese su usuario">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1">
          <label>Password</label>
        </div>
        <div class="col-sm-6">
          <input type="password" name="pass" placeholder="Ingrese su contraseña">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-2">
          <button style="background-color: aqua; font-family: verdana; font-weight: bolder" type="submit" name="ingresar"><span class="glyphicon glyphicon-log-in"></span><strong> INGRESAR</strong></button>
        </div>
        <div class="col-sm-4"></div>
      </div>
      </form>
    </div>

    <?php

      if (isset($_POST['ingresar'])) {

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        class MyDB extends SQLite3 {
      		function __construct() {

      			$this->open('SC_database.db');
      		}
      	}

        $db = new MyDB();

        $sql = ("SELECT * FROM users WHERE user = '$user' AND pass = '$pass'");
        $ret = $db->query($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
          $id = $row['id'];
          $userName = $row['user'];
          $password = $row['pass'];
          $name = $row['name'];

          $_SESSION['name'] = $name;


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
