<?
session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Menu Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/home.js"></script>

  </head>
  <body>

    <?php
      require "db/conexion.php";
      $db = new MyDB("db");
      
      require "include/top_menu.php";

      $idU = $_SESSION['id'];
      $admin = $_SESSION['admin'];

      $sql = ("SELECT * FROM Usuarios WHERE id_U = '$idU'");
      $res = $db->query($sql);
      $row = $res->fetchArray(SQLITE3_ASSOC);

      $nombre = $row['name'];


    ?>

    <div class="conteinter-fluid" id="main">
  <?
      if ($admin == 1) {
?>
        <div id="mySidenav" class="sidenav">
          <span class="glyphicon glyphicon-remove" href="javascript:void(0)" style="cursor: pointer; color: #ff6600; margin-left: 280px; font-size: 30px" onclick="closeNav()"></span>
          <h2 style="color: #eb9316; font-size: 35px; font-family: verdana; margin-bottom: 20px"><strong><em>Hola <?echo $nombre;?>!</em></strong></h2>
          <br>
          <img src="img/user.png" alt="perfil" style="padding-left: 105px; padding-bottom: 20px">
          <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 60.5px; margin-bottom: 20px; margin-top: 20px; font-size: 20px; font-weight: bolder" onclick="window.open('abm/cambiar_nombre.php')">Cambiar Nombre</button> <br>
          <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 62px; margin-bottom: 20px; font-size: 20px; font-weight: bolder" href="#">Cambiar Usuario</button> <br>
          <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 43px; margin-bottom: 20px; font-size: 20px; font-weight: bolder" href="#">Cambiar Contraseña</button> <br>
          <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 29px; font-size: 20px; margin-bottom: 20px; font-weight: bolder" href="#">Agregar Nuevo Usuario</button> <br>
          <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 82px; margin-bottom: 20px; font-size: 20px; font-weight: bolder" onclick="window.location.replace('include/logout.php')">Cerrar Sesión</button> <br>
        </div>

        <br><?

      } else {

      ?>
          <div id="mySidenav" class="sidenav">
            <span class="glyphicon glyphicon-remove" href="javascript:void(0)" style="cursor: pointer; color: #ff6600; margin-left: 280px; font-size: 30px" onclick="closeNav()"></span>
            <h2 style="color: #eb9316; font-size: 35px; font-family: verdana; margin-bottom: 20px"><strong><em>Hola <?echo $nombre;?>!</em></strong></h2>
            <br>
            <img src="img/user1.png" alt="perfil" style="padding-left: 110px; padding-bottom: 20px">
            <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 60.5px; margin-bottom: 20px; margin-top: 20px; font-size: 20px; font-weight: bolder" onclick="window.open('abm/cambiar_nombre.php')">Cambiar Nombre</button> <br>
            <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 62px; margin-bottom: 20px; font-size: 20px; font-weight: bolder" href="#">Cambiar Usuario</button> <br>
            <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 43px; margin-bottom: 20px; font-size: 20px; font-weight: bolder" href="#">Cambiar Contraseña</button> <br>
            <button class="btn btn-warning" style="color: #262626; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 80px; margin-bottom: 20px; font-size: 20px; font-weight: bolder" onclick="window.location.replace('include/logout.php')">Cerrar Sesión</button> <br>
          </div>
          <br>
    <?}?>

      <div class="col-md-4" id="DashboardProd">
        <div id="intDashboard">

        <h3 style="color: #ffffff"><strong>Productos</strong></h3>

        </div>
      </div>

      <div class="col-md-4" id="DashboardProv">
        <div id="intDashboard">

        <h3 style="color: #ffffff"><strong>Proveedores</strong></h3>

        </div>
      </div>

    </div>

    <script>
      /* Set the width of the side navigation to 250px */
      function openNav() {
        document.getElementById("mySidenav").style.width = "325px";
      }

      /* Set the width of the side navigation to 0 */
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
    </script>

  </body>
  <?php require "include/footer.php"; ?>
</html>
