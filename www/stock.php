<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Stock de Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/deudas.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>

  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-6">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar Por Nombre de Producto, Marca, Tipo...">
        </div>
        <div class="col-md-6"></div>
      </div>


      <div class="row">
        <div class="col-lg-12">
          <?

            require 'include/conexion.php';

            $sql = ("SELECT * FROM Producto ORDER BY id_Prod ASC");
            $ret = $db->query($sql);

            ?>
            <div class="tabla">
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidad Medida</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Observaciones</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  <tr>
                    <? while($row = $ret->fetchArray(SQLITE3_ASSOC)){?>
                      <td><?echo $row['id_Prod'];?></td>
                      <td><?echo $row['name_Prod'];?></td>
                      <td><?echo $row['price_V'];?></td>
                      <td><?echo $row['u_Med'];?></td>
                      <?
                        $idM = $row['id_M1'];
                        $idT = $row['id_T1'];

                        $sql = ("SELECT * FROM Marca WHERE id_M = '$idM'");
                        $res = $db->query($sql);
                        while($row1 = $res->fetchArray(SQLITE3_ASSOC)){
                          ?><td><?echo $row1['name_M'];}?></td>
                      <?
                        $sql1 = ("SELECT * FROM Tipo WHERE id_T = '$idT'");
                        $res1 = $db->query($sql1);
                        while($row2 = $res1->fetchArray(SQLITE3_ASSOC)){
                          ?><td><?echo $row2['name_T'];}?></td>
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
