<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Lotes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/clientes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>

  </head>
  <body>

    <?php require 'include/menu_principal.php'; ?>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-sm-2">
          <button type="button" name="agregar" class="btn btn-primary" onclick="window.open('nuevo_cliente.php');" target="_blank"><strong>Nuevo Cliente</strong></button>
        </div>
        <div class="col-sm-2">
          <button type="button" name="modificar" class="btn btn-warning"><strong>Modificar Cliente</strong></button>
        </div>
        <div class="col-sm-2">
          <button type="button" name="eliminar" class="btn btn-danger"><strong>Eliminar Cliente</strong></button>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
          <!-- <button type="submit" name="buscar" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button> -->
        </div>
      </div>


    <div class="row">
      <div class="col-lg-12">
        <?

          require 'include/conexion.php';

        

          $sql = ("SELECT * FROM clients ORDER BY id DESC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">N° Comprobante</th>
                  <th scope="col">$ Compra</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Fecha Compra</th>
                  <th scope="col">Fecha Vencimiento</th>
                  <th scope="col">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?//echo $row['id'];?></td>
                    <td><?//echo $row['name'];?></td>
                    <td><?//echo $row['phone'];?></td>
                    <td><?//echo $row['dateIn'];?></td>
                    <td><?//echo $row['dateIn'];?></td>
                    <td><?//echo $row['dateIn'];?></td>
                    <td><?//echo $row['dateIn'];?></td>
                    <td><?//echo $row['dateIn'];?></td>
                    <td><?//echo $row['dateIn'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    <?php require 'include/footer.php'; ?>
    </div>

    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>

  </body>
</html>
