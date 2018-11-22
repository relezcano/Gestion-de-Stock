<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Proveedores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/proveedores.css">
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
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nuevo_proveedor.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nuevo Proveedor</strong></button>
        </div>

        <form class="btnmodificar" action="proveedores.php" method="post">
        <div class="col-md-2">
          <button type="submit" name="modificar" class="btn btn-warning" style="margin-left: 5px"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Proveedor</strong></button>
        </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select" placeholder="ID" style="margin-left: 25px">
          </div>
        </form>

        <form class="eliminar" action="proveedores.php" method="post">
          <div class="col-md-2">
            <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 3px"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Proveedor</strong></button>
          </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select2" placeholder="ID" style="margin-left: 15px">
          </div>
        </form>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

    <div class="row">
      <div class="col-lg-12">
        <?

        require '../db/conexion.php';
        $db = new MyDB('../db');

          $sql = ("SELECT * FROM Proveedor ORDER BY id_Prov ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="text-align: center">ID</th>
                  <th scope="col" style="text-align: center">Nombre</th>
                  <th scope="col" style="text-align: center">Concurrencia</th>
                  <th scope="col" style="text-align: center">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?echo $row['id_Prov'];?></td>
                    <td><?echo $row['name_Prov'];?></td>
                    <td><?echo $row['conc'];?></td>
                    <td><?echo $row['obs_Prov'];?></td>
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

    $sql = ("SELECT * FROM Proveedor WHERE id_Prov = '$idSel'");
    $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
      $id = $row['id_Prov'];
      $name = $row['name_Prov'];
      $conc = $row['conc'];
      $tel = $row['tel_Prov'];
      $dir = $row['dir_Prov'];
      $obs = $row['obs_Prov'];
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6">
      <h1 style="font-size: 37px; color: #ffffff; padding-left: 42px"><strong>Modificar Proveedor</strong></h1>
    </div>
    <div class="col-md-5"></div>
  </div>

  <div class="formulario">

    <form class="modificar" action="modificar_proveedor.php" method="post">

    <!-- CAMPO CON ID HIDDEN -->
    <input type="hidden" name="id" value="<?echo $id;?>">

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Nombre</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name_Prov" value="<?echo $name;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Concurrencia</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="conc" value="<?echo $conc;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Teléfono</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="tel_Prov" value="<?echo $tel;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Dirección</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="dir_Prov" value="<?echo $dir;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Observaciones</label>
      </div>
      <div class="col-md-3">
        <textarea class="form-control" style="width: 380px" name="obs_Prov" rows="8" cols="60"><?echo $obs;?></textarea>
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
      <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'proveedores.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
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
      $sql = ("DELETE FROM Proveedor WHERE id_Prov = $idSelDel");
      $ret = $db->query($sql);
      echo "Proveedor eliminado exitosamente!!!";

      ?><script>
        window.location.replace('proveedores.php');  // redireccionar a esta página.
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
