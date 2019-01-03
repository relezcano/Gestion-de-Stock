<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Ventas Realizadas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/ventasGestion.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
    <script src="../js/dropdown.js"></script>

  </head>
  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-2">
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nueva_venta.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nueva Venta</strong></button>
        </div>

        <form class="btnmodificar" action="ventasGestion.php" method="post">
        <div class="col-md-2">
          <button style="margin-left: 10px" type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Venta</strong></button>
        </div>
          <div class="col-md-1">
            <input style="margin-left: 6px" class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="ventasGestion.php" method="post">
          <div class="col-md-2">
            <button style="margin-left: 10px" type="submit" name="eliminar" class="btn btn-danger"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Venta</strong></button>
          </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select2" placeholder="ID">
          </div>
        </form>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

      <!-- Modificar Venta -->
      <?
      require '../db/conexion.php';
      $db = new MyDB('../db');

      if (isset($_POST['modificar'])) {
        if (isset($_POST['select'])) {


          $idSel = $_POST['select'];

          $sql = ("SELECT * FROM Venta WHERE id_V = '$idSel'");
          $ret = $db->query($sql);

          while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $id = $row['id_V'];
            $date = $row['date_V'];
            $priceT = $row['price_Total'];
            $priceP = $row['price_Pago'];
            $obs = $row['obs_V'];
            $idC = $row['id_C1'];

      ?>

      <div class="container-fluid" style="margin-top: 50px">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-6" style="margin-left: 7px">
            <h1 style="font-size: 35px; color: #ffffff; padding-left: 35px"><strong>Modificar Venta</strong></h1>
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="formulario">

        <form class="modificar" action="modificar_venta.php" method="post" style="margin-left: 50px">

          <input type="hidden" name="id_V" value="<?echo $id;?>">

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <label style="margin-top: 5px">Fecha Venta</label>
            </div>
            <div class="col-md-3">
              <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="date_V" value="<?echo $date;?>">
            </div>
            <div class="col-md-5"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <label style="margin-top: 5px">Valor Total</label>
            </div>
            <div class="col-md-3">
              <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="price_Total" value="<?echo $priceT;?>">
            </div>
            <div class="col-md-5"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <label style="margin-top: 5px">Valor Pago</label>
            </div>
            <div class="col-md-3">
              <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="price_Pago" value="<?echo $priceP;?>">
            </div>
            <div class="col-md-5"></div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <label style="margin-top: 5px">ID Cliente</label>
            </div>
            <div class="col-md-3">
              <input class="form-control" style="width: 90px; margin-bottom: 5px" type="text" name="id_C1" value="<?echo $idC;?>">
            </div>
            <div class="col-md-5"></div>
          </div>


          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <label style="margin-top: 5px">Detalles de la Venta</label>
            </div>
            <div class="col-md-3">
              <textarea class="form-control" name="obs_V" rows="8" cols="60" style="width: 380px"><?echo $obs;?></textarea>
            </div>
            <div class="col-md-5"></div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <button style="font-family: verdana; font-weight: bolder" type="submit" name="guardar" class="btn btn-success btn-md"><span class="glyphicon glyphicon-floppy-disk"></span><strong> GUARDAR</strong></button>
            </div>
            <div class="col-md-3">
              <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'ventasGestion.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
            </div>
              <div class="col-md-3"></div>
            </div>
          </form>
          </div>
      <br><br>
      <?

        }
      }
      }
      ?>


    <div class="row">
      <div class="col-lg-12">
        <?

          $sql = ("SELECT * FROM Venta ORDER BY id_V ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="text-align: center">ID</th>
                  <th scope="col" style="text-align: center">Fecha Venta</th>
                  <th scope="col" style="text-align: center">Valor Total</th>
                  <th scope="col" style="text-align: center">Valor Pago</th>
                  <th scope="col" style="text-align: center">ID Cliente</th>
                  <th scope="col" style="text-align: center">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?echo $row['id_V'];?></td>
                    <td><?echo $row['date_V'];?></td>
                    <td><?echo $row['price_Total'];?></td>
                    <td><?echo $row['price_Pago'];?></td>
                    <td><?echo $row['id_C1'];?></td>
                    <td><?echo $row['obs_V'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>


<!-- Eliminar Pedido -->

<?
  if(isset($_POST['eliminar'])){
    if (isset($_POST['select2'])) {

      $idSel2 = $_POST['select2'];
      $sql = ("DELETE FROM Venta WHERE id_V = $idSel2");
      $ret = $db->query($sql);
      echo "Venta eliminada exitosamente!!!";

      ?><script>
        window.location.replace('ventasGestion.php');  // redireccionar a otra pagina.
      </script><?

    } else {
        echo "Seleccione una ID para poder eliminar";
    }
  }

?>

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
