<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Seleccione Comprobante</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/select_form.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
    <script src="../js/dropdown.js"></script>
    <script src="../js/print_label.js"></script>

  </head>
  <body>


    <div class="container" style="margin-top: 50px">


      <div class="row">

        <div class="col-md-8">
          <h3 style="margin: auto"><strong>Seleccione comprobante a imprimir</strong></h3>
        </div>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

    <div class="row">
      <div class="col-lg-12">
        <?

          require 'db/conexion.php';

          $db = new MyDB("db");

          $sqlComp = ("SELECT DISTINCT(Lote.n_Comp), Lote.date_Alt, Proveedor.name_Prov FROM Lote INNER JOIN Proveedor ON Lote.id_Prov1 = Proveedor.id_Prov");
          $resComp = $db->query($sqlComp);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">N° Comp</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Fecha de ingreso</th>
                  <th scope="col">Lotes</th>
                </tr>
              </thead>

              <tbody id="myTable">
                <? while($Comp = $resComp->fetchArray(SQLITE3_ASSOC)){ ?>
                <tr style="cursor: pointer">
                  <?
                    $n_Comp     = $Comp['n_Comp'];
                    $date_Alt   = $Comp['date_Alt'];
                    $name_Prov  = $Comp['name_Prov'];
                    ?>
                    <td onclick="setComp()"><?echo $n_Comp;?></td>
                    <td onclick="setComp()"><?echo $name_Prov;?></td>
                    <td onclick="setComp()"><?echo $date_Alt;?></td>
                    <td style="text-align: center"><button class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button></td>
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
