<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Lotes del Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/stock.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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

            $idProd = $_GET['id_prod'];

            $queryProd = "SELECT Lote.*, name_Prov, name_Prod FROM Lote
            INNER JOIN Proveedor ON (Lote.id_Prov1=Proveedor.id_Prov)
            INNER JOIN Producto ON (Lote.id_Prod1=Producto.id_Prod)
            WHERE id_Prod1 = '$idProd'";

            $ret = $db->query($queryProd);


            ?>
            <div class="tabla">
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                  <tr>

                    <th style="text-align: center" scope="col">ID</th>
                    <th style="text-align: center" scope="col">N° Comprobante</th>
                    <th style="text-align: center" scope="col">Proveedor</th>
                    <th style="text-align: center" scope="col">Producto</th>
                    <th style="text-align: center" scope="col">Precio Compra</th>
                    <th style="text-align: center" scope="col">Cantidad</th>
                    <th style="text-align: center" scope="col">Fecha Alta</th>
                    <th style="text-align: center" scope="col">Fecha Vencimiento</th>
                    <th style="text-align: center" scope="col">Observaciones</th>

                    <!-- -----------agregar datos de LOTE------------ -->

                  </tr>
                </thead>
                <tbody id="myTable">

                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <tr>

                        <td><?echo $row['id_L'];?></td>
                        <td><?echo $row['n_Comp'];?></td>
                        <td><?echo $row['name_Prov'];?></td>
                        <td><?echo $row['name_Prod'];?></td>
                        <td><?echo '$'.$row['price_C'];?></td>
                        <td><?echo $row['cant'];?></td>
                        <td><?echo $row['date_Alt'];?></td>
                        <td><?echo $row['date_Ven'];?></td>
                        <td><?echo $row['obs_L'];?></td>

                    </tr>
                    <?}?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
        <br>
        <button class="btn btn-success center-block" onclick="window.close();" type="button" name="volver"><span class="glyphicon glyphicon-arrow-left"></></span> Volver</button>

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
