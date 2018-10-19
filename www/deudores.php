<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Deudores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/deudas.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>

  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-2">
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nuevo_deudor.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nuevo Deudor</strong></button>
        </div>

        <form class="btnmodificar" action="deudores.php" method="post">
        <div class="col-md-2">
          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Deuda</strong></button>
        </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="deudores.php" method="post">
          <div class="col-md-2">
            <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 5px"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Deuda</strong></button>
          </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select2" placeholder="ID">
          </div>
        </form>

        <form class="buscar" action="deudores.php" method="post">
        <div class="col-md-3">
          <input style="margin-left: 20px" class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar Por Nombre y Apellido">
        </div>
        <div class="col-md-1">
          <button class="btn-xs btn-info" style="border-radius: 10px; font-size: 12px" type="submit" name="buscar"><span class="glyphicon glyphicon-search"></span> <strong> Ver Total</strong></button>
        </div>
      </form>
      </div>

      <!-- -------------- PAGO DEL CLIENTE ---------------- -->

      <br>

      <form class="pago_deuda" action="pago_deuda.php" method="post">
        <div class="row" style="border: solid 1px; border-color: lime; background-color: grey; margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; padding-top: 5px; padding-bottom: 5px;">
          <div class="col-md-2"></div>
          <div class="col-md-2">
            <label style="padding-left: 20px; text-align: right; margin-top: 2px">ID Cliente:</label>
          </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="id_C" placeholder="ID">
          </div>
          <div class="col-md-3">
            <label style="padding-left: 70px; text-align: right; margin-top: 2px">Valor a Pagar:</label>
          </div>
          <div class="col-md-2">
            <input class="form-control" type="text" name="valor" placeholder="$">
          </div>
          <div class="col-md-2">
            <button class="btn btn-success" type="submit" name="pagar"><span class="glyphicon glyphicon-usd"></span><strong> Pagar</strong></button>
          </div>
        </div>
      </form>


<!-- -------------- TABLA DE DEUDORES -------------- -->

    <div class="row">
      <div class="col-lg-12">
        <?

          require 'include/conexion.php';


          $sql = ("SELECT * FROM Deuda WHERE monto > 0 ORDER BY id_D ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table id="tabla" class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID Deuda</th>
                  <th scope="col">ID Cliente</th>
                  <th scope="col">Nombre Cliente</th>
                  <th scope="col">$ Monto</th>
                  <th scope="col">ID Venta</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){
                      ?><td><?echo $row['id_D'];?></td><?
                      ?><td><?echo $row['id_C'];?></td><?
                      $idC = $row['id_C'];
                      $sql1 = ("SELECT * FROM Cliente WHERE id_C = '$idC'");
                      $res = $db->query($sql1);
                      while($row1 = $res->fetchArray(SQLITE3_ASSOC)){
                    ?>
                    <td><?echo $row1['name_C']," ", $row1['surname_C'];}?></td>
                    <td><?echo $row['monto'];?></td>
                    <td><?echo $row['id_V'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>





<!-- ---------------- TABLA DE TOTALES ---------------- -->

<?
      $consulta = "SELECT SUM(monto) AS Total FROM Deuda";
      $resultado=$db->query($consulta);
      while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)){; //devuelve un array asociativo con el nombre del campo

      $Total = $fila['Total']; //valor que se acaba de calcular en la consulta
?>

    <div class="row">
      <div class="col-lg-12">
        <div class="tabla">
          <div class="table-responsive">
            <table id="tabla" class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th style="text-align: right; font-size: 18px; background-color: grey" scope="col"><strong><em><span style="color: #ffc299">TOTAL DE LAS DEUDAS</span></em></strong></th>

                  <th style="text-align: right; color: #99ffcc; font-size: 18px; background-color: grey" scope="col"><strong><em>DEUDAS DEL CLIENTE</em></strong></th>
                </tr>
              </thead>
              <tbody id="myTableTotal">
                <tr>
                  <td style="text-align: right; background-color: #ffc299; font-size: 20px"><strong><?echo '$', $Total;}?></strong></td>

                  <?

                    if(isset($_POST['buscar'])){
                      if ($_POST['filtro'] == ""){

                  		} else {

                      $filtro = $_POST['filtro'];

                      $query = "SELECT * FROM Cliente WHERE (name_C || ' ' || surname_C) LIKE '%$filtro%'";
                      $resQuery = $db->query($query);

                      while($rowID = $resQuery->fetchArray(SQLITE3_ASSOC)){
                        $id_C = $rowID['id_C'];
                        $nombre = $rowID['name_C'];
                        $apellido = $rowID['surname_C'];

                        $consulta = "SELECT SUM(monto) AS TotalCliente FROM Deuda WHERE id_C = '$id_C'";
                        $resultado=$db->query($consulta);

                        while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)){; //devuelve un array asociativo con el nombre del campo
                          $totalCliente = $fila['TotalCliente']; //valor que se acaba de calcular en la consulta?>
                          <td style="text-align: right; background-color: #99ffcc; color: #000000"><strong>
                            <?echo 'El cliente ';
                              ?><span style="color: #ff6600; font-size: 20px"><em><? echo $nombre. ' '. $apellido ?></em></span><?
                                echo ' '. 'debe un total de: ';
                              ?><span style="color: #ff6600; font-size: 20px"><? echo '$', $totalCliente;}}?></span></strong>
                          </td>
                      </tr>
              </tbody>
            </table>
            <?}}?>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!---------------------------- Modificar Deuda ------------------------------ -->

    <?

    if (isset($_POST['modificar'])) {
      if (isset($_POST['select'])) {


        $idSel = $_POST['select'];

        $sql = ("SELECT * FROM Deuda WHERE id_D = '$idSel'");
        $ret = $db->query($sql);

        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
          $id = $row['id_D'];
          $monto = $row['monto'];
          $idV = $row['id_V'];
          $idC = $row['id_C'];

    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
          <h1 style="font-size: 37px; color: #ffffff; padding-left: 46px"><strong>Modificar Deuda</strong></h1>
        </div>
        <div class="col-md-5"></div>
      </div>

      <div class="formulario">

        <form class="modificar" action="modificar_deudor.php" method="post">

        <!-- CAMPO CON ID HIDDEN -->
        <input type="hidden" name="id" value="<?echo $id;?>">

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">Monto</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="monto" value="<?echo $monto;?>">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">ID Venta</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="id_V" value="<?echo $idV;?>">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">ID Cliente</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="id_C" value="<?echo $idC;?>">
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
          <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'deudores.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
        </div>
          <div class="col-md-3"></div>
        </div>
        <br>
      </form>
      </div>
    </div>

    <?
        }
      }
    }
    ?>

    <!-------------------------- Eliminar Deudor -------------------------- -->

    <?

      if(isset($_POST['eliminar'])){
        if (isset($_POST['select2'])) {

          $idSelDel = $_POST['select2'];
          $sql = ("DELETE FROM Deuda WHERE id_D = $idSelDel");
          $ret = $db->query($sql);
          echo "Deuda eliminada exitosamente!!!";

          ?><script>
            window.location.replace('deudores.php');  // redireccionar a esta página.
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
