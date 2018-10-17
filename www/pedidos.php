<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Pedidos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/pedidos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>

  </head>
  <body>

    <div class="container" style="margin-top: 20px">
      <div class="row">
        <div class="col-md-2">
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nuevo_pedido.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nuevo Pedido</strong></button>
        </div>

        <form class="btnmodificar" action="pedidos.php" method="post">
        <div class="col-md-2">
          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Pedido</strong></button>
        </div>
          <div class="col-md-1">
            <input style="margin-left: 12px" class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="pedidos.php" method="post">
          <div class="col-md-2">
            <button type="submit" name="eliminar" class="btn btn-danger"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Pedido</strong></button>
          </div>
          <div class="col-md-1">
            <input style="margin-left: 5px" class="form-control" type="text" name="select2" placeholder="ID">
          </div>
        </form>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

    <div class="row">
      <div class="col-lg-12">
        <?

          require 'include/conexion.php';

          $sql = ("SELECT * FROM Ant_Prov ORDER BY id_Ant ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Fecha Pedido</th>
                  <th scope="col">Fecha Llegada</th>
                  <th scope="col">ID Proveedor</th>
                  <th scope="col">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?echo $row['id_Ant'];?></td>
                    <td><?echo $row['monto'];?></td>
                    <td><?echo $row['date_Ped'];?></td>
                    <td><?echo $row['date_Lleg'];?></td>
                    <td><?echo $row['id_Prov2'];?></td>
                    <td><?echo $row['obs_Ant'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>

<!-- Modificar Pedido -->
<?
if (isset($_POST['modificar'])) {
  if (isset($_POST['select'])) {


    $idSel = $_POST['select'];

    $sql = ("SELECT * FROM Ant_Prov WHERE id_Ant = '$idSel'");
    $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
      $id = $row['id_Ant'];
      $monto = $row['monto'];
      $dateP = $row['date_Ped'];
      $dateL = $row['date_Lleg'];
      $obs = $row['obs_Ant'];
      $idP = $row['id_Prov2'];

?>

<div class="container-fluid" style="margin-top: 50px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6" style="margin-left: 7px">
      <h1 style="font-size: 35px; color: #ffffff; padding-left: 35px"><strong>Modificar Pedido</strong></h1>
    </div>
    <div class="col-md-5"></div>
  </div>

  <div class="formulario">

  <form class="modificar" action="modificar_pedido.php" method="post" style="margin-left: 50px">

    <input type="hidden" name="id_P" value="<?echo $id;?>">

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Monto</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name_Prod" value="<?echo $monto;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Fecha Pedido</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="u_Med" value="<?echo $dateP;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Fecha Llegada</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="price_V" value="<?echo $dateL;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">ID Proveedor</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 90px; margin-bottom: 5px" type="text" name="id_M1" value="<?echo $idP;?>">
      </div>
      <div class="col-md-5"></div>
    </div>


    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Detalle del Pedido</label>
      </div>
      <div class="col-md-3">
        <textarea class="form-control" name="obs_Prod" rows="8" cols="60" style="width: 380px"><?echo $obs;?></textarea>
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
        <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'pedidos.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
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

<!-- Eliminar Pedido -->

<?
  if(isset($_POST['eliminar'])){
    if (isset($_POST['select2'])) {

      $idSel2 = $_POST['select2'];
      $sql = ("DELETE FROM Ant_Prov WHERE id_Ant = $idSel2");
      $ret = $db->query($sql);
      echo "Pedido eliminado exitosamente!!!";

      ?><script>
        window.location.replace('pedidos.php');  // redireccionar a otra pagina.
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
