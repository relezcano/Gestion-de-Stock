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

    <div class="conteinter-fluid" id="main" style="margin-top: 20px">
  <?
      if ($admin == 1) {
?>
        <div id="mySidenav" class="sidenav">
          <input type="hidden" name="estadoNavBar" value="close">
          <h2 style="color: #eb9316; font-size: 35px; font-family: verdana; margin-bottom: 20px"><strong><em>Hola <?echo $nombre;?>!</em></strong></h2>
          <br>
          <img src="img/user.png" alt="perfil" style="padding-left: 115px; padding-bottom: 20px">
          <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 45px; margin-bottom: 20px; margin-top: 20px; font-size: 20px; font-weight: bolder; padding-left: 45px; padding-right: 45px" onclick="window.open('abm/cambiar_nombre.php')">Cambiar Nombre</button> <br>
          <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 45px; margin-bottom: 20px; font-size: 20px; font-weight: bolder; padding-left: 45px; padding-right: 47px" onclick="window.open('abm/cambiar_user.php')">Cambiar Usuario</button> <br>
          <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 45px; margin-bottom: 20px; font-size: 20px; font-weight: bolder; padding-left: 29px; padding-right: 29px" onclick="window.open('abm/cambiar_pass.php')">Cambiar Contraseña</button> <br>
          <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 45px; font-size: 20px; margin-bottom: 20px; font-weight: bolder; padding-left: 15px; padding-right: 15px" onclick="window.open('abm/nuevo_user.php')">Agregar Nuevo Usuario</button> <br>
          <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 45px; font-size: 20px; margin-bottom: 20px; font-weight: bolder; padding-left: 40px; padding-right: 40px" onclick="window.open('abm/cambiar_permisos.php')">Cambiar Permisos</button> <br>
          <button class="btn btn-danger" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 45px; margin-bottom: 20px; font-size: 20px; font-weight: bolder; padding-left: 65px; padding-right: 65px" onclick="window.location.replace('include/logout.php')">Cerrar Sesión</button> <br>
        </div>

        <br><?

      } else {

      ?>
          <div id="mySidenav" class="sidenav">
            <input type="hidden" name="estadoNavBar" value="close">
            <h2 style="color: #eb9316; font-size: 35px; font-family: verdana; margin-bottom: 20px"><strong><em>Hola <?echo $nombre;?>!</em></strong></h2>
            <br>
            <img src="img/user1.png" alt="perfil" style="padding-left: 110px; padding-bottom: 20px">
            <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 30px; margin-bottom: 20px; margin-top: 20px; font-size: 20px; font-weight: bolder; padding-left: 45px; padding-right: 45px" onclick="window.open('abm/cambiar_nombre.php')">Cambiar Nombre</button> <br>
            <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 30px; margin-bottom: 20px; margin-top: 20px; font-size: 20px; font-weight: bolder; padding-left: 46px; padding-right: 46px" onclick="window.open('abm/cambiar_user.php')">Cambiar Usuario</button> <br>
            <button class="btn btn-warning" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 30px; margin-bottom: 20px; margin-top: 20px; font-size: 20px; font-weight: bolder; padding-left: 29px; padding-right: 29px" onclick="window.open('abm/cambiar_pass.php')">Cambiar Contraseña</button> <br>
            <button class="btn btn-danger" style="color: #ffffff; border-radius: 20px; border-style: outset; border-width: medium; margin-left: 30px; margin-bottom: 20px; font-size: 20px; font-weight: bolder; padding-left: 65px; padding-right: 65px; margin-top: 20px" onclick="window.location.replace('include/logout.php')">Cerrar Sesión</button> <br>
          </div>
          <br>
    <?}?>

      <div class="col-md-4" id="DashboardProd" style="margin-bottom: 150px">
        <div id="intDashboard">

        <h3 style="text-align: center; font-size: 36px; padding-bottom: 10px"><strong>Productos</strong></h3>

        </div>
      </div>

      <div class="col-md-4"></div>

      <div class="col-md-4" id="DashboardProv" style="margin-bottom: 150px">
        <div id="intDashboard">

        <h3 style="text-align: center; font-size: 36px; padding-bottom: 10px"><strong>Proveedores</strong></h3>

        </div>
      </div>

    </div>


  </body>
  <?php require "include/footer.php"; ?>
</html>
