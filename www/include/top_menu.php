<script src="../js/top_menu.js"></script>

<div class="container-fluid" style="background-color:#4d4d4d; padding: 5px">

  <button class="btn btn-warning" onclick="popUp('ventas.php')" target="_blank"><Strong>Ventas</Strong></button>

  <button class="btn btn-warning" onclick="popUp('stock.php')" target="_blank"><Strong>Stock</Strong></button>

  <button class="btn btn-warning" onclick="popUp('ant_prov.php')" target="_blank"><Strong>Anticipo de Proveedores</Strong></button>

  <button class="btn btn-warning" onclick="popUp('ingresos.php')" target="_blank"><Strong>Ingreso de Mercaderia</Strong></button>

  <button class="btn btn-warning" onclick="popUp('deudores.php')" target="_blank"><Strong>Deudores</Strong></button>

  <div class="dropdown">

    <button class="btn btn-warning"><Strong>Gestión de Datos</Strong></button>

    <div class="dropdown-content" style="background-color: #fff7e6; border-top-right-radius: 45px; border-bottom-right-radius: 30px; border-bottom-left-radius: 30px; width: 180px">
      <a href="abm/productos.php" target="_blank" style="border-top-right-radius: 100px"><strong>Productos</a>
      <a href="abm/proveedores.php" target="_blank"><strong>Proveedores</strong></a>
      <a href="abm/lotes.php" target="_blank"><strong>Lotes</strong></a>
      <a href="abm/pedidos.php" target="_blank"><strong>Pedidos</strong></a>
      <a href="abm/ventasGestion.php" target="_blank"><strong>Ventas</strong></a>
      <a href="abm/clientes.php" target="_blank"><strong>Clientes</strong></a>
      <a href="abm/deudas.php" target="_blank" style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px"><strong>Deudas</strong></a>
    </div>

  </div>

  <button type="button" class="btn btn-warning" onclick="navBar()" style="float: right"><span class="glyphicon glyphicon-align-justify"></span></button>

</div>
