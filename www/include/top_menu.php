<script src="../js/top_menu.js"></script>

<div class="container-fluid" style="background-color:#4d4d4d; padding: 5px; position: fixed; width: 100%; top: 0px; z-index: 1">

  <button class="btn btn-warning" onclick="windowOpener('ventas.php', 'ventas', 'ventas')" target="_blank"><Strong>Ventas</Strong></button>

  <button class="btn btn-warning" onclick="windowOpener('stock.php', 'stock', 'stock')" target="_blank"><Strong>Stock</Strong></button>

  <button class="btn btn-warning" onclick="windowOpener('ant_prov.php', 'ant_prov', 'ant_prov')" target="_blank"><Strong>Anticipo de Proveedores</Strong></button>


  <div class="dropdown">

    <button class="btn btn-warning"><Strong>Ingresos de Mercadería</Strong></button>

    <div class="dropdown-content" style="background-color: #fff7e6; border-top-right-radius: 30px; border-bottom-right-radius: 30px; border-bottom-left-radius: 30px; width: 206px">
      <a onclick="windowOpener('ingresos.php', 'ingresos', 'ingresos')" target="_blank" style="border-top-right-radius: 30px"><strong style="cursor: pointer">Ingresar Mercadería</strong></a>
      <a onclick="windowOpener('print_label.php', 'print_label', 'print_label')" target="_blank" style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px"><strong style="cursor: pointer">Imprimir Etiquetas</strong></a>
    </div>

  </div>

  <button class="btn btn-warning" onclick="windowOpener('deudores.php', 'deudores', 'deudores')" target="_blank"><Strong>Deudores</Strong></button>

  <div class="dropdown">

    <button class="btn btn-warning"><Strong>Gestión de Datos</Strong></button>

    <div class="dropdown-content" style="background-color: #fff7e6; border-top-right-radius: 45px; border-bottom-right-radius: 30px; border-bottom-left-radius: 30px; width: 180px">
      <a onclick="windowOpener('abm/productos.php', 'abm_productos', 'abm_productos')" target="_blank" style="border-top-right-radius: 100px"><strong style="cursor: pointer">Productos</strong></a>
      <a onclick="windowOpener('abm/proveedores.php', 'abm_proveedores', 'abm_proveedores')" target="_blank"><strong style="cursor: pointer">Proveedores</strong></a>
      <a onclick="windowOpener('abm/lotes.php', 'abm_lotes', 'abm_lotes')" target="_blank"><strong style="cursor: pointer">Lotes</strong></a>
      <a onclick="windowOpener('abm/pedidos.php', 'abm_pedidos', 'abm_pedidos')" target="_blank"><strong style="cursor: pointer">Pedidos</strong></a>
      <a onclick="windowOpener('abm/ventasGestion.php', 'abm_ventas', 'abm_ventas')" target="_blank"><strong style="cursor: pointer">Ventas</strong></a>
      <a onclick="windowOpener('abm/clientes.php', 'abm_clientes', 'abm_clientes')" target="_blank"><strong style="cursor: pointer">Clientes</strong></a>
      <a onclick="windowOpener('abm/deudas.php', 'abm_deudas', 'abm_deudas')" target="_blank" style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px"><strong style="cursor: pointer">Deudas</strong></a>
    </div>

  </div>

  <button type="button" class="btn btn-warning" onclick="navBar()" style="float: right"><span class="glyphicon glyphicon-align-justify"></span></button>

</div>
