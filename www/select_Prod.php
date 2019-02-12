<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Seleccione Producto</title>
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
    <script src="../js/ingresos.js"></script>
    <script src="../js/ventas.js"></script>

  </head>
  <body>


    <div class="container" style="margin-top: 50px">


      <div class="row">

        <div class="col-md-8">
          <h3 style="margin: auto; font-style: italic; text-shadow: 2px 2px #000000; color: #ffa64d; font-size: 32px"><strong>Seleccione producto a vender</strong></h3>
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

          $sql = ("SELECT * FROM Producto ORDER BY id_Prod ASC");
          $res_prod = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Observaciones</th>
                </tr>
              </thead>

              <tbody id="myTable">
                <? while($Prod = $res_prod->fetchArray(SQLITE3_ASSOC)){ ?>
                <tr style="cursor: pointer" <? if($_GET['solicitante'] == 'ingresos'){echo "onclick='setProductVentas(this);'";}else {echo "onclick='setProductIngresos(this);'";} ?>>
                  <?
                    $id_Marca = $Prod['id_M1'];
                    $id_Tipo  = $Prod['id_T1'];
                    $res_marca  = $db->query("SELECT name_M FROM Marca WHERE id_M = $id_Marca");
                    $res_tipo   = $db->query("SELECT name_T FROM Tipo WHERE id_T = $id_Tipo");
                    $Marca  = $res_marca->fetchArray(SQLITE3_ASSOC);
                    $Tipo   = $res_tipo->fetchArray(SQLITE3_ASSOC);
                    ?>
                    <td class="id"> <input type="hidden" name="sel_item_id" value="<?echo $Prod['id_Prod'];?>" id="Selected_id"> <?echo $Prod['id_Prod'];?></td>
                    <td><?echo $Prod['name_Prod'];?></td>
                    <td>$<?echo $Prod['price_V'];?></td>
                    <td><?echo $Marca['name_M'];?></td>
                    <td><?echo $Tipo['name_T'];?></td>
                    <td><?echo $Prod['obs_Prod'];?></td>
                </tr>
                <?}?>
              </tbody>

              <input type="hidden" name="change_this" value="<?php echo $_GET['toSelect'] ?>">
              <input type="hidden" name="tableRow" value="<?php echo $_GET['trRow'] ?>">
              <input type="hidden" name="n_item" value="<?php echo $_GET['nItem'] ?>">
              <input type="hidden" name="solicitante" value="<?php echo $_GET['solicitante'] ?>">

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
