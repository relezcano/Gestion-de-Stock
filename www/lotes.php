<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Lotes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/lotes.css">
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
        <div class="col-sm-2">
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nuevo_lote.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nuevo Lote</strong></button>
        </div>

        <form class="btnmodificar" action="lotes.php" method="post">
        <div class="col-sm-2">
          <button type="submit" name="modificar" class="btn btn-warning" style="margin-left: 10px"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Lote</strong></button>
        </div>
          <div class="col-sm-1">
            <input class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="productos.php" method="post">
          <div class="col-sm-2">
            <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 15px"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Lote</strong></button>
          </div>
          <div class="col-sm-1">
            <input class="form-control" type="text" name="select2" placeholder="ID">
          </div>
        </form>

        <div class="col-sm-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

    <div class="row">
      <div class="col-lg-12">
        <?

          require 'include/conexion.php';

          $sql = ("SELECT * FROM Lote ORDER BY id_L ASC");
          $ret = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio Compra</th>
                  <th scope="col">Fecha Alta</th>
                  <th scope="col">Fecha Vencimiento</th>
                  <th scope="col">N° Comprobante</th>
                  <th scope="col">ID Producto</th>
                  <th scope="col">ID Proveedor</th>
                  <th scope="col">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){ ?>
                      <td><?echo $row['id_L'];?></td>
                      <td><?echo $row['cant'];?></td>
                      <td><?echo $row['price_C'];?></td>
                      <td><?echo $row['date_Alt'];?></td>
                      <td><?echo $row['date_Ven'];?></td>
                      <td><?echo $row['n_Comp'];?></td>
                      <td><?echo $row['id_Prod1'];?></td>
                      <td><?echo $row['id_Prov1'];?></td>
                      <td><?echo $row['obs_L'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>

<!-- Modificar Cliente -->
<?
if (isset($_POST['modificar'])) {
  if (isset($_POST['select'])) {


    $idSel = $_POST['select'];

    $sql = ("SELECT * FROM Lote WHERE id_L = '$idSel'");
    $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC)){
      $id = $row['id_L'];
      $cant = $row['cant'];
      $price = $row['price_C'];
      $dateA = $row['date_Alt'];
      $dateV = $row['date_Ven'];
      $comp = $row['n_Comp'];
      $obs = $row['obs_L'];
      $idProd = $row['id_Prod1'];
      $idProv = $row['id_Prov1'];


?>

<div class="container-fluid" style="margin-top: 50px">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6" style="margin-left: 7px">
      <h1 style="font-size: 35px; color: #ffffff; padding-left: 35px"><strong>Modificar Lote</strong></h1>
    </div>
    <div class="col-sm-5"></div>
  </div>

  <div class="formulario">

  <form class="modificar" action="modificar_lote.php" method="post" style="margin-left: 50px">

    <input type="hidden" name="id_Lote" value="<?echo $id;?>">

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">Cantidad</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 136px; margin-bottom: 5px" type="text" name="cant" value="<?echo $cant;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">Precio Compra</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 136px; margin-bottom: 5px" type="number" name="price_C" value="<?echo $price;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">Fecha Alta</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 160px; margin-bottom: 5px" type="text" name="date_Alt" value="<?echo $dateA;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">Vencimiento</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 160px; margin-bottom: 5px" type="text" name="date_Ven" value="<?echo $dateV;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">N° Comprobante</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="n_Comp" value="<?echo $comp;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">ID Producto</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 100px; margin-bottom: 5px" type="number" name="id_Prod1" value="<?echo $idProd;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">ID Proveedor</label>
      </div>
      <div class="col-sm-3">
        <input class="form-control" style="width: 100px; margin-bottom: 5px" type="number" name="id_Prov1" value="<?echo $idProv;?>">
      </div>
      <div class="col-sm-5"></div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3">
        <label style="margin-top: 5px">Observaciones</label>
      </div>
      <div class="col-sm-3">
        <textarea class="form-control" name="obs_Prod" rows="8" cols="60" style="width: 380px"><?echo $obs;?></textarea>
      </div>
      <div class="col-sm-5"></div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3">
        <button style="font-family: verdana; font-weight: bolder" type="submit" name="guardar" class="btn btn-success btn-md"><span class="glyphicon glyphicon-floppy-disk"></span><strong> GUARDAR</strong></button>
      </div>
      <div class="col-md-3">
        <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'lotes.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
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

<!-- Eliminar Cliente -->

<?
  if(isset($_POST['eliminar'])){
    if (isset($_POST['select2'])) {

      $idSel2 = $_POST['select2'];
      $sql = ("DELETE FROM Lote WHERE id_L = $idSel2");
      $ret = $db->query($sql);
      echo "Lote eliminado exitosamente!!!";

      ?><script>
        window.location.replace('lotes.php');  // redireccionar a otra pagina.
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
