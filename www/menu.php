<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Menu Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>

  </head>
  <body>

    <div class="container-fluid">
      <button class="dropbtn"><a href="index.php" target="_blank">Ventas</a></button>
      <button class="dropbtn" href="stock.php">Stock</button>
      <button class="dropbtn" href="stock.php">Anticipo de Proveedores</button>
      <button class="dropbtn" href="stock.php">Ingreso de Mercaderia</button>
      <button class="dropbtn" href="stock.php">Deudores</button>
      <div class="dropdown">
        <button class="dropbtn">Gestión de Stock</button>
        <div class="dropdown-content">
          <a href="agregar_producto.php">Productos</a>
          <a href="#">Proveedores</a>
          <a href="#">Lotes</a>
          <a href="#">Pedidos</a>
          <a href="#">Ventas</a>
          <a href="#">Clientes</a>
          <a href="#">Deudas</a>
        </div>
      </div>

    </div>


    <footer class="page-footer font-small blue" style="margin-top: 730px">
      <div class="footer-copyright text-center py-3" style="color: white; background-color: black">© 2018 Copyright:
        <a style="color: lightblue"> Instituto Superior Capacitas - Juan Imoff, Ignacio Bressa, Facundo Sautú, Ramiro Lezcano.</a>
      </div>
    </footer>

  </body>
</html>
