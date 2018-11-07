<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Deudores</title>
    <link rel="shortcut icon" href="img/elephant_icon.ico" type="image/x-icon">
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

<? require 'db/conexion.php';
   $db = new MyDB("db"); ?>

<!-- -------------------------------- BARRA DE BUSQUEDA Y TOTAL DE DEUDAS --------------------------------- -->

    <div class="container" style="margin-top: 5px">
      <div class="row">
        <form class="buscar" action="deudores.php" method="post">
        <div class="col-md-5"  style="padding-top: 50px">
          <input style="margin-left: 20px" class="form-control" type="text" name="filtro" placeholder="Busque por DNI o presione sólo ''Buscar'' para ver todo">
        </div>
        <div class="col-md-2"  style="padding-top: 50px">
          <button class="btn btn-info" style="border-radius: 10px; font-size: 12px; padding: 8px; font-size: 14px" type="submit" name="buscar"><span class="glyphicon glyphicon-search"></span> <strong> Buscar</strong></button>
        </div>
        </form>
        <div class="col-md-5">
          <div class="titulo" style="margin-left: 50px">
            <h4 style="text-align: center"><strong>TOTAL DE TODAS LAS DEUDAS</strong></h4>
          </div>

          <?
                $consulta = "SELECT SUM(monto) AS Total FROM Deuda WHERE monto > 0";
                $resultado=$db->query($consulta);
                while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)){; //devuelve un array asociativo con el nombre del campo

                $Total = $fila['Total']; //valor que se acaba de calcular en la consulta
          ?>

          <div class="valor_total" style="margin-right: 4px">
            <h4 style="font-size: 26px; color: #cc0000"><strong><?echo '$ ' . $Total;}?></strong></h4>
          </div>
        </div>
      </div>

      <br>

          <div class="container">

                  <!-- ----------------------------- TABLAS DEUDORES Y CLIENTES SELECCIONADOS ------------------------ -->

                  <?
                  if (isset($_POST['buscar'])) {
                    if ($_POST['filtro'] == ""){
                    ?>
                    <div class="row">
                      <div class="col-lg-12">
                        <?

                          $sql = ("SELECT * FROM Deuda WHERE monto > 0 ORDER BY id_D ASC");
                          $ret = $db->query($sql);

                          ?>
                          <div class="tabla">
                            <div class="table-responsive">
                            <table id="tabla" class="table table-bordered table-striped">
                              <thead class="thead-dark">
                                <tr>

                                  <th style="text-align: center" scope="col">DNI Cliente</th>
                                  <th style="text-align: center" scope="col">Nombre Cliente</th>
                                  <th style="text-align: center" scope="col">$ Monto</th>
                                  <th style="text-align: center" scope="col">ID Venta</th>
                                  <th style="text-align: center" scope="col">Acciones</th>

                                </tr>
                              </thead>
                              <tbody id="myTable">
                                <tr>

                                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){
                                      $idC = $row['id_C'];
                                      $idD = $row['id_D'];
                                      $sql1 = ("SELECT * FROM Cliente WHERE id_C = '$idC'");
                                      $res = $db->query($sql1);
                                      while($row1 = $res->fetchArray(SQLITE3_ASSOC)){
                                    ?>
                                      <td><?echo $row1['dni'];?></td>
                                      <td><?echo $row1['name_C']," ", $row1['surname_C'];}?></td>
                                      <td><?echo $row['monto'];?></td>
                                      <td><?echo $row['id_V'];?></td>
                                      <td>

                                      <form class="btnmodificar" action="deudores.php" method="post">
                                        <div class="col-md-1">
                                          <input type="hidden" class="form-control" type="text" name="select" value="<?echo $idC; ?>">
                                        </div>

                                        <div class="col-md-4">
                                          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span></strong></button>
                                        </div>

                                        <div class="col-md-1">
                                          <input type="hidden" class="form-control" type="text" name="id_D" value="<?echo $idD; ?>">
                                        </div>
                                      </form>

                                      <form class="btneliminar" action="deudores.php" method="post">

                                        <div class="col-md-4">
                                          <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 5px"><strong><span class="glyphicon glyphicon-trash"></span></strong></button>
                                        </div>

                                        <div class="col-md-1">
                                          <input type="hidden" class="form-control" type="text" name="select2" value="<?echo $idC; ?>">
                                        </div>

                                        <div class="col-md-1">
                                          <input type="hidden" class="form-control" type="text" name="id_D" value="<?echo $idD; ?>">
                                        </div>
                                      </form>

                                      </td>
                                </tr>
                                <?}?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?
                  } else {

                  // mostrar tabla con datos solo del cliente seleccionado

                  $filtro = $_POST['filtro'];

              ?>

              <!-- ------------------------ PAGO DEL CLIENTE -------------------------- -->
                <br>
                  <form class="pago_deuda" action="pago_deuda.php" method="post">
                    <div class="row" style="border: solid 2px; border-color: lime; background-color: grey; margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; padding-top: 10px; padding-bottom: 10px;">
                      <div class="col-md-1">
                        <input type="hidden" class="form-control" type="text" name="dni" value="<? echo $filtro;?>">
                      </div>
                      <div class="col-md-4">
                        <label style="padding-left: 130px; text-align: right; margin-top: 2px">Valor a Pagar:</label>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control" type="text" name="valor" placeholder="$">
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-success" type="submit" name="pagar"><span class="glyphicon glyphicon-usd"></span><strong> Pagar</strong></button>
                      </div>
                      <div class="col-md-3"></div>
                    </div>
                  </form>

                  <br>
              <?
                  $query = "SELECT * FROM Cliente WHERE dni = '$filtro'";
                  $resQuery = $db->query($query);

                  while($rowID = $resQuery->fetchArray(SQLITE3_ASSOC)){
                    $id_C = $rowID['id_C'];
                    $nombre = $rowID['name_C'];
                    $apellido = $rowID['surname_C'];
                    $dni = $rowID['dni'];

                    if($dni != $filtro){

                    } else {
                    ?>
                    <div class="row">
                      <div class="col-md-12">

                        <?
                          $sql = ("SELECT * FROM Deuda WHERE monto > 0 AND id_C = '$id_C' ORDER BY id_D ASC");
                          $ret = $db->query($sql);

                        ?>
                          <div class="tabla">
                            <div class="table-responsive">
                            <table id="tabla" class="table table-bordered table-striped">
                              <thead class="thead-dark">
                                <tr>

                                  <th style="text-align: center" scope="col">DNI Cliente</th>
                                  <th style="text-align: center" scope="col">Nombre Cliente</th>
                                  <th style="text-align: center" scope="col">$ Monto</th>
                                  <th style="text-align: center" scope="col">ID Venta</th>
                                  <th style="text-align: center" scope="col">Acciones</th>

                                </tr>
                              </thead>
                              <tbody id="myTable">
                                <tr>

                                  <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){
                                      $id_D = $row['id_D'];
                                    ?>
                                      <td><?echo $rowID['dni'];?></td>
                                      <td><?echo $rowID['name_C']," ", $rowID['surname_C'];?></td>
                                      <td><?echo $row['monto'];?></td>
                                      <td><?echo $row['id_V'];?></td>
                                      <td>

                                      <form class="btnmodificar" action="deudores.php" method="post">
                                        <div class="col-md-1">
                                          <input type="hidden" class="form-control" type="text" name="select" value="<?echo $id_C; ?>">
                                        </div>

                                        <div class="col-md-4">
                                          <button type="submit" name="modificar" class="btn btn-warning"><strong><span class="glyphicon glyphicon-pencil"></span></strong></button>
                                        </div>

                                        <div class="col-md-1">
                                          <input type="hidden" class="form-control" type="text" name="id_D" value="<?echo $id_D; ?>">
                                        </div>

                                      </form>

                                      <form class="btneliminar" action="deudores.php" method="post">
                                        <div class="col-md-4">
                                          <button type="submit" name="eliminar" class="btn btn-danger" style="margin-left: 5px"><strong><span class="glyphicon glyphicon-trash"></span></strong></button>
                                        </div>
                                        <div class="col-md-1">
                                          <input type="hidden"  type="text" name="select2" value="<?echo $id_C;?>">
                                        </div>
                                        <div class="col-md-1">
                                          <input type="hidden"  type="text" name="id_D" value="<?echo $id_D;?>">
                                        </div>
                                      </form>

                                      </td>
                                    </tr>
                                  </tbody>
                                  <?}}?>
                                </table>
                          </div>
                        </div>
                      </div>
                    </div>

                    <br>

                    </div>
                  </div>



                    <?
                    // SUMA TOTAL DEUDA DEL CLIENTE SELECCIONADO

                    $consulta = "SELECT SUM(monto) AS TotalCliente FROM Deuda WHERE id_C = '$id_C'";
                    $resultado=$db->query($consulta);

                    while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)){; //devuelve un array asociativo con el nombre del campo
                      $totalCliente = $fila['TotalCliente']; //valor que se acaba de calcular en la consulta?>

                      <div class="resultado">


                      <h5 style="text-align: center; background-color: #99ffcc; color: #000000"><strong>

                        <span style="font-size: 20px"><?echo 'El cliente ';
                          ?><span style="color: #ff6600; font-size: 22px"><em><? echo $nombre. ' '. $apellido ?></em></span><?
                          ?><span style="font-size: 20px"><?echo  ', ' . 'DNI: ';
                          ?><span style="color: #ff6600; font-size: 22px"><em><? echo $dni;?></em></span><?
                          ?><span style="font-size: 20px"><?echo ' '. 'debe un total de: ';
                          ?><span style="color: #ff6600; font-size: 22px"><? echo '$', $totalCliente;}}?></span></strong>

                      </h5>
                      </div>
        <?}}?>
    </div>



    <!---------------------------- Modificar Deuda ------------------------------ -->

    <?

    if (isset($_POST['modificar'])) {
      if (isset($_POST['select'])) {


        $idSel = $_POST['select'];
        $idD = $_POST['id_D'];

        $sqlmod = "SELECT * FROM Deuda WHERE id_C = '$idSel' AND id_D = $idD";
        $retri = $db->query($sqlmod);

        while($row = $retri->fetchArray(SQLITE3_ASSOC)){
          $id = $row['id_D'];
          $monto = $row['monto'];
          $idV = $row['id_V'];
          $idC = $row['id_C'];

    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6" style="padding-left: 60px">
          <h1 style="font-size: 37px; color: #ffffff; padding-left: 76px"><strong>Modificar Deuda</strong></h1>
        </div>
        <div class="col-md-1"></div>
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

    //  REVISAR ESTA PARTE DEL CODIGO

      if(isset($_POST['eliminar'])){
        if (isset($_POST['select2'])) {

          $idSel2 = $_POST['select2'];
          $idD2 = $_POST['id_D'];

          $sql = ("DELETE FROM Deuda WHERE id_C = '$idSel2' AND id_D = '$idD2'");
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

  </body>
</html>
