<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Deudas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/clientes.css">
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
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nueva_deuda.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nueva Deuda</strong></button>
        </div>

        <form class="btnmodificar" action="deudas.php" method="post">
        <div class="col-md-2">
          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Deuda</strong></button>
        </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="deudas.php" method="post">
          <div class="col-md-2">
            <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 5px"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Deuda</strong></button>
          </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select2" placeholder="ID">
          </div>
        </form>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

    <div class="row">
      <div class="col-lg-12">
        <?

          require 'conexion_abm.php';

          $sql = ("SELECT * FROM Deuda ORDER BY id_D ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="text-align: center">ID</th>
                  <th scope="col" style="text-align: center">Monto</th>
                  <th scope="col" style="text-align: center">ID Venta</th>
                  <th scope="col" style="text-align: center">ID Cliente</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?echo $row['id_D'];?></td>
                    <td><?echo $row['monto'];?></td>
                    <td><?echo $row['id_V'];?></td>
                    <td><?echo $row['id_C'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>

<!---------------------------- Modificar Cliente ------------------------------ -->

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
      <h1 style="font-size: 37px; color: #ffffff; padding-left: 42px"><strong>Modificar Deuda</strong></h1>
    </div>
    <div class="col-md-5"></div>
  </div>

  <div class="formulario">

    <form class="modificar" action="modificar_deuda.php" method="post">

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
      <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'deudas.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
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

<!-------------------------- Eliminar Cliente -------------------------- -->

<?
  if(isset($_POST['eliminar'])){
    if (isset($_POST['select2'])) {

      $idSelDel = $_POST['select2'];
      $sql = ("DELETE FROM Deuda WHERE id_D = $idSelDel");
      $ret = $db->query($sql);
      echo "Deuda eliminado exitosamente!!!";

      ?><script>
        window.location.replace('deudas.php');  // redireccionar a esta página.
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
