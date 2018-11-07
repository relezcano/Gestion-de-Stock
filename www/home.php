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

  </head>
  <body>

    <?php
      require "include/top_menu.php";
    ?>
    <br>
    <div class="conteinter-fluid">

      <div class="col-md-4" id="Dashboard">
        <div id="intDashboard">

        <h3 style="color: #ffffff"><strong>Productos</strong></h3>

        </div>
      </div>

      <div class="col-md-4" id="Dashboard">
        <div id="intDashboard">

        <h3 style="color: #ffffff"><strong>Proveedores</strong></h3>

        </div>
      </div>

    </div>

  </body>
  <?php require "include/footer.php"; ?>
</html>
