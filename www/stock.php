<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Stock de Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/stock.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/stock.js"></script>


  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-6">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar Por Nombre de Producto, Marca, Fecha de Vencimiento, etc...">
        </div>
        <div class="col-md-6"></div>
      </div>


      <div class="row">
        <div class="col-lg-12">
          <?

            require 'db/conexion.php';
            $db = new MyDB("db");

            $queryProd = "SELECT id_Prod, name_Prod, price_V, name_M, name_T, obs_Prod FROM Producto
            INNER JOIN Marca ON (Producto.id_M1=Marca.id_M)
            INNER JOIN Tipo ON (Producto.id_T1=Tipo.id_T)";

            $ret = $db->query($queryProd);


            ?>
            <div class="tabla">
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                  <tr>

                    <th style="text-align: center" scope="col">Nombre Producto</th>
                    <th style="text-align: center" scope="col">Precio</th>
                    <th style="text-align: center" scope="col">Marca</th>
                    <th style="text-align: center" scope="col">Tipo</th>
                    <th style="text-align: center" scope="col">Cantidad</th>
                    <th style="text-align: center" scope="col">Observaciones</th>

                    <!-- -----------agregar datos de LOTE------------ -->

                  </tr>
                </thead>
                <tbody id="myTable">

                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){
                      $id_Prod = $row['id_Prod'];
                      $queryLote = "SELECT sum(cant) FROM Lote WHERE id_Prod1 = '$id_Prod'";
                      $resLote = $db->query($queryLote);
                      $rowL = $resLote -> fetchArray(SQLITE3_ASSOC);
                    ?>
                    <tr style="cursor: pointer" onclick="showLote(this);">

                      <input type="hidden" name="idProd" value="<?echo $id_Prod;?>">
                        <td><?echo $row['name_Prod'];?></td>
                        <td><?echo '$'.$row['price_V'];?></td>
                        <td><?echo $row['name_M'];?></td>
                        <td><?echo $row['name_T'];?></td>
                        <td><?echo $rowL['sum(cant)'];?></td>
                        <td><?echo $row['obs_Prod'];?></td>

                    </tr>
                    <?}?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
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
