<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Clientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/clientes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>

  </head>
  <body>


    <div class="container" style="margin-top: 20px">


      <div class="row">
        <div class="col-md-2">
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nuevo_cliente.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</strong></button>
        </div>

        <form class="btnmodificar" action="clientes.php" method="post">
        <div class="col-md-2">
          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Cliente</strong></button>
        </div>
          <div class="col-md-1">
            <input class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="clientes.php" method="post">
          <div class="col-md-2">
            <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 5px"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Cliente</strong></button>
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

          require 'include/conexion.php';

          $sql = ("SELECT * FROM Cliente ORDER BY id_C ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?echo $row['id_C'];?></td>
                    <td><?echo $row['name_C'];?></td>
                    <td><?echo $row['surname_C'];?></td>
                    <td><?echo $row['phone'];?></td>
                    <td><?echo $row['obs_C'];?></td>
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

    $sql = ("SELECT * FROM Cliente WHERE id_C = '$idSel'");
    $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
      $id = $row['id_C'];
      $name = $row['name_C'];
      $surname = $row['surname_C'];
      $phone = $row['phone'];
      // $dateIn = $row['dateIn'];
      $obs = $row['obs_C'];
      // $date = date_format(date_create_from_format('d-m-Y', $dateIn), 'Y-m-d');
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-6">
      <h1 style="font-size: 37px; color: #ffffff; padding-left: 42px"><strong>Modificar Cliente</strong></h1>
    </div>
    <div class="col-md-5"></div>
  </div>

  <div class="formulario">

    <form class="modificar" action="modificar_cliente.php" method="post">

    <!-- CAMPO CON ID HIDDEN -->
    <input type="hidden" name="id" value="<?echo $id;?>">

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Nombre</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name" value="<?echo $name;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Apellido</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="surname_C" value="<?echo $surname;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Teléfono</label>
      </div>
      <div class="col-md-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="phone" value="<?echo $phone;?>">
      </div>
      <div class="col-md-5"></div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-3">
        <label style="margin-top: 5px">Observaciones</label>
      </div>
      <div class="col-md-3">
        <textarea class="form-control" style="width: 380px" name="obs" rows="8" cols="60"><?echo $obs;?></textarea>
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
      <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'clientes.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
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
      $sql = ("DELETE FROM Cliente WHERE id_C = $idSelDel");
      $ret = $db->query($sql);
      echo "Cliente eliminado exitosamente!!!";

      ?><script>
        window.location.replace('clientes.php');  // redireccionar a esta página.
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
