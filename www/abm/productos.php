<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Productos</title>
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
          <button type="button" name="agregar" class="btn btn-primary" onclick="location.href = 'nuevo_producto.php';"><strong><span class="glyphicon glyphicon-plus"></span> Nuevo Producto</strong></button>
        </div>

        <form class="btnmodificar" action="productos.php" method="post">
        <div class="col-md-2">
          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span> Modificar Producto</strong></button>
        </div>
          <div class="col-md-1">
            <input style="margin-left: 12px" class="form-control" type="text" name="select" placeholder="ID">
          </div>
        </form>

        <form class="eliminar" action="productos.php" method="post">
          <div class="col-md-2">
            <button type="submit" name="eliminar" class="btn btn-danger"><strong><span class="glyphicon glyphicon-trash"></span> Eliminar Producto</strong></button>
          </div>
          <div class="col-md-1">
            <input style="margin-left: 5px" class="form-control" type="text" name="select2" placeholder="ID">
          </div>
        </form>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>


        <?

        require '../db/conexion.php';
        $db = new MyDB('../db');



          $sql = ("SELECT * FROM Producto ORDER BY id_Prod ASC");
          $ret = $db->query($sql);

          ?>

          <div class="row">
            <div class="col-lg-12">
              <!-- Modificar Producto -->
              <?
              if (isset($_POST['modificar'])) {
                if (isset($_POST['select'])) {


                  $idSel = $_POST['select'];

                  $sql = ("SELECT * FROM Producto WHERE id_Prod = '$idSel'");
                  $ret = $db->query($sql);

                  while($row = $ret->fetchArray(SQLITE3_ASSOC)){
                    $id = $row['id_Prod'];
                    $name = $row['name_Prod'];
                    $medida = $row['u_Med'];
                    $precio = $row['price_V'];
                    $marca = $row['id_M1'];
                    $tipo = $row['id_T1'];
                    $obs = $row['obs_Prod'];


                    // llamar nombre de la marca y el tipo usando el id de cada uno!!!!!


                    // VER TEMA DE PONER FECHA ACTUAL AUTOMATICAMENTE EN PRODUCTO...
                  //  $date = date_format(date_create_from_format('d-m-Y', $dateIn), 'Y-m-d');
              ?>

              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-6" style="margin-left: 7px">
                    <h1 style="font-size: 35px; color: #ffffff; padding-left: 35px"><strong>Modificar Producto</strong></h1>
                  </div>
                  <div class="col-md-5"></div>
                </div>

                <div class="formulario">

                <form class="modificar" action="modificar_producto.php" method="post" style="margin-left: 50px">

                  <input type="hidden" name="id_Prod" value="<?echo $id;?>">

                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label style="margin-top: 5px">Nombre</label>
                    </div>
                    <div class="col-md-3">
                      <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name_Prod" value="<?echo $name;?>">
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label style="margin-top: 5px">Unidad Medida</label>
                    </div>
                    <div class="col-md-3">
                      <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="u_Med" value="<?echo $medida;?>">
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label style="margin-top: 5px">Precio Venta</label>
                    </div>
                    <div class="col-md-3">
                      <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="price_V" value="<?echo $precio;?>">
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label style="margin-top: 5px">ID Marca</label>
                    </div>
                    <div class="col-md-3"><?
                      $queryM = ("SELECT * FROM Marca");
                      $result = $db->query($queryM);

                    ?><select name="id_M1" style="border-radius: 10px; padding: 5px">
                      <?
                      $queryMar = ("SELECT * FROM Marca WHERE id_M = '$marca'");
                      $res = $db->query($queryMar);
                      $rowmarca = $res->fetchArray(SQLITE3_ASSOC);
                      $idsemar = $rowmarca['id_M'];
                      $nameselmar = $rowmarca['name_M'];
                      echo '<option selected value="'.$idselmar.'">'.$nameselmar.'</option>';
                      ?>
                      <?
                      while ($rowIDM = $result->fetchArray(SQLITE3_ASSOC))
                      {
          							$idmarca = $rowIDM['id_M'];
          							$idnamemar = $rowIDM['name_M'];

                        echo '<option value="'.$idmarca.'">'.$idnamemar.'</option>';
                      }
                      ?>
                      </select>
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label style="margin-top: 5px">ID Tipo</label>
                    </div>
                    <div class="col-md-3"><?
                      $queryM = ("SELECT * FROM Tipo");
                      $resultado = $db->query($queryM);

                    ?><select name="id_T1" style="border-radius: 10px; padding: 5px">
                      <?
                      $querytip = ("SELECT * FROM Tipo WHERE id_T = '$tipo'");
                      $resu = $db->query($querytip);
                      $rowtipo = $resu->fetchArray(SQLITE3_ASSOC);
                      $idsetip = $rowtipo['id_T'];
                      $nameseltip = $rowtipo['name_T'];
                      echo '<option selected value="'.$idseltip.'">'.$nameseltip.'</option>';
                      ?>
                      <?
                      while ($rowIDT = $resultado->fetchArray(SQLITE3_ASSOC))
                      {
          							$idtipo = $rowIDT['id_T'];
          							$idnametipo = $rowIDT['name_T'];
                        echo '<option value="'.$idtipo.'">'.$idnametipo.'</option>';
                      }
                      ?>
                      </select>
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                      <label style="margin-top: 5px">Observaciones</label>
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
                      <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'productos.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
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

          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="text-align: center">ID</th>
                  <th scope="col" style="text-align: center">Nombre</th>
                  <th scope="col" style="text-align: center">Unidad Medida</th>
                  <th scope="col" style="text-align: center">Precio</th>
                  <th scope="col" style="text-align: center">Marca</th>
                  <th scope="col" style="text-align: center">Tipo</th>
                  <th scope="col" style="text-align: center">Observaciones</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <tr>
                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                    <td><?echo $row['id_Prod'];?></td>
                    <td><?echo $row['name_Prod'];?></td>
                    <td><?echo $row['u_Med'];?></td>
                    <td><?echo '$ '.$row['price_V'];?></td>
                    <td><? $idM = $row['id_M1'];
                    $consM = ("SELECT * FROM Marca WHERE id_M = '$idM'");
            				$retM = $db->query($consM);
            				$rowM = $retM->fetchArray(SQLITE3_ASSOC);
                    echo $rowM['name_M'];?></td>

                    <td><?$idT = $row['id_T1'];
                    $consT = ("SELECT * FROM Tipo WHERE id_T = '$idT'");
            				$retT = $db->query($consT);
            				$rowT = $retT->fetchArray(SQLITE3_ASSOC);
                    echo $rowT['name_T'];?></td>
                    <td><?echo $row['obs_Prod'];?></td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>



<!-- Eliminar Producto -->

<?
  if(isset($_POST['eliminar'])){
    if (isset($_POST['select2'])) {

      $idSel2 = $_POST['select2'];
      $sql = ("DELETE FROM Producto WHERE id_Prod = $idSel2");
      $ret = $db->query($sql);
      ?><script>
       alert("\tProducto eliminado exitosamente!!!");
      </script><?

      ?><script>
        window.location.replace('productos.php');  // redireccionar a otra pagina.
      </script><?

    } else {
      ?><script>
       alert("Seleccione una ID para poder eliminar el producto");
      </script><?
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
