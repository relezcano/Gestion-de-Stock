<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Seleccione pedido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/select_form.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
    <script src="../js/dropdown.js"></script>
    <script src="../js/ingresos.js"></script>

  </head>
  <body>


    <div class="container" style="margin-top: 50px">


      <div class="row">

        <div class="col-md-8">
          <h3 style="margin: auto"><strong>Seleccione su pedido</strong></h3>
        </div>

        <div class="col-md-4">
          <input class="form-control" id="myInput" type="text" name="filtro" placeholder="Filtrar por...">
        </div>
      </div>

    <div class="row">
      <div class="col-lg-12">
        <?

          require 'db/conexion.php';

          $db = new MyDB("db");

          $sql = ("SELECT Ant_Prov.*, Proveedor.name_Prov FROM Ant_Prov INNER JOIN Proveedor ON Ant_Prov.id_Prov2 = Proveedor.id_Prov WHERE estado = 'P' ORDER BY id_Ant ASC");
          $res_Ant = $db->query($sql);

          ?>
          <div class="tabla">
            <div class="table-responsive">
            <table class="table table-bordered table-striped">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Fecha de pedido</th>
                  <th scope="col">Fecha de llegada</th>
                  <th scope="col">Observaciones</th>
                </tr>
              </thead>

              <tbody id="myTable">
                <? while($Ant_Prov = $res_Ant->fetchArray(SQLITE3_ASSOC)){ ?>
                <tr style="cursor: pointer" onclick="setAntPopUp(this);">
                    <td class="id" style="width: 10%"> <input type="hidden" name="sel_ant_id" value="<?echo $Ant_Prov['id_Ant'];?>"> <?echo $Ant_Prov['id_Ant'];?></td>
                    <td style="width: 30%"><?echo $Ant_Prov['name_Prov'];?></td>
                    <td style="width: 20%"><?echo $Ant_Prov['date_Ped'];?></td>
                    <td style="width: 20%"><?echo $Ant_Prov['date_Lleg'];?></td>
                    <td style="width: 20%"><?echo $Ant_Prov['obs_Ant'];?></td>
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

      $('#clickSelected').click(function setProduct(){

        var selec_item = $(this).find("input[name='sel_item_id']").val();
        var item_to_change = $(document).find("input[name='change_this']").val();
        var tableRow = $(document).find("input[name='tableRow']").val();
        var n_item = $(document).find("input[name='n_item']").val();

        //$(window.opener.document).find("input[name="+item_to_change+"]").val(selec_item);

      //Metodo ajax para enviar un nuevo parametro a la pagina sin recargarla-----------------------------------------------------------------------------------------------------------------------------------------------------------------
      //Se envian los parametros por get a un archivo php el cual hace la extraccion de datos de la BD y reemplaza el contenido de la fila por el nuevo (NOTA: No funciona, se agrega tooda la otra tabla en 1 sola columna)------------------
        $.ajax({
          url: "include/load_prd.php",
          data: {idprod:selec_item,
            nItem: n_item},
          success: function(data){
            //Inserta en la fila correspondiente los nuevos datos
            console.log(data);
            // $('#contenedor').html(data);
            // window.close();
          }
        });

      });

    </script>

  </body>
</html>
