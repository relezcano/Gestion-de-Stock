<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Recepción de Lotes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ingresos.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/ingresos.js"></script>
    <script src="js/char_restriction.js"></script>

  </head>
  <body style="max-width: 920px; min-width: 920px;">

    <div class="container">

      <form method="post" name="ventas">

        <div class="row" style="float:right; background: #4d4d4d; padding: 5px; border-radius: 10px">
          <div style="margin-left: 5px">
            <input type="text" name="n_Comp" style="float:right; margin-right: 2%; width: 130px; text-align: center; border-radius: 30px" placeholder="N° de comprobante" onkeypress="return restrictCharacters(this, event, comprobante)">
          </div>
        </div>

        <div id="topDiv">
          <h2>Ingreso de Mercaderia</h2>

          <div class="row" style="float: left; width: 100%; margin-left: 0%; margin-bottom: 5px">
            <span onclick="window.open('select_Prov.php');" style="cursor: pointer"><strong>Proveedor: </strong></span>
            <input type="text" name="Prov" placeholder="Ingrese id del proveedor" style="width: 160px; color: black; border-radius: 30px" onkeyup="setProvDataParent(this);" onkeypress="return restrictCharacters(this, event, digitos);">
          </div>

          <div class="row" style="float: center; width: 100%">
            <div id="provData" style="margin-left: 2%">
            </div>
          </div>
        </div>

        <div class="tabla">

          <div class="table-responsive">

          <!--Tabla donde se muestran los productos que se estan por ingresar-->

          <table class="table table-bordered table-striped">

            <thead class="thead-dark">
              <tr>
                <th scope="col" style="text-align: center"                      >N° Item            </th>
                <th scope="col" style="text-align: center"                      >Producto           </th>
                <th scope="col" style="text-align: center"                      >Precio Costo       </th>
                <th scope="col" style="text-align: center"                      >Cantidad           </th>
                <th scope="col" style="text-align: center"                      >Bultos             </th>
                <th scppe="col" style="text-align: center"                      >Fecha Vencimiento  </th>
                <th scppe="col" style="text-align: center">                    </th>
              </tr>
            </thead>

            <tbody id="myTable">

              <tr id="tr1">
                <td style="width: 70px" id="numOfRow">1</td>  <!--Numero de Item-->
                <td style="width: 250px; cursor: pointer"> <input type="hidden" name="id_product1" value="" id="1"> <span id="Prod_name" onclick="popUpWin(this);" >Seleccionar producto</span> </td> <!--Nombre del producto-->
                <td><span>$-</span></td>                      <!--Precio del Producto-->
                <td style="width: 100px">-</td>               <!--Cantidad del Producto-->
                <td style="width: 100px">-</td>                <!--Cantidad de bultos-->
                <td></td>                                     <!--Fecha de vencimiento-->
                <td style="width: 50px"><button type="button" name="deleteRow" class="btn btn-danger" style="border-radius: 5px; width: 40px; height: 20px"><span class="glyphicon glyphicon-minus" style="float: inherit" onclick="deleteProd(this);"></span></button></td>  <!--Boton para borrar producto-->
                <input type="hidden" name="id_prod" value="none">
              </tr>

            </tbody>

          </table>
        </div>

        <!--Boton para añadir una nueva fila para agregar productos-->

        <button type="button" name="add_prod" style="border-radius: 20px; width: 40px; height: 40px" class="btn btn-primary center-block" onclick="addProd();"><span class="glyphicon glyphicon-plus"></span></button>


        <!--Area del formulario donde se muestra el pedido relacionado al ingreso (Si es que existe) y el area para agregar observaciones-->

        <div class="row" style="margin: 0;margin-top: 5px">

          <div class="col-md-7" style="border: solid 2px grey; height: 120px">

            <textarea name="obs_L" rows="3" cols="70" id="invis_input" style="margin: 0 "></textarea>

          </div>

          <div class="col-md-5" style="border: solid 2px grey; border-left: none; height: 120px">

            <div class="row" style="margin-top: 5px; margin-left: 1px">
              <span onclick="window.open('select_Ant.php')"><strong>ID del pedido:</strong></span> <input type="text" placeholder="Pedido relacionado al ingreso" style="width: 192px" onkeyup="setAntDataParent(this)" onkeypress="return restrictCharacters(this, event, digitos)">
            </div>

            <div class="row" id="antData" style="margin-left: 10px">
              <p style="margin-top: 10px">Si existe pedido relacionado con este ingreso seleccionelo aqui</p>
            </div>

          </div>

        </div>
        <br>
          <div class="row" style="margin: 0;margin-top: 0;">
            <div style="margin: 0 auto; margin-bottom: 5px;margin-top: 5px; width: 240px" class="center-block">
              <button type="button" class="btn btn-success" name="close" onclick="endLote('load');">Cargar Lote</button>

              <button type="button" class="btn btn-danger" name="cancel" onclick="endLote('cancel');">Cancelar Lote</button>
            </div>

        </div>



      </div>

      </form>

    </div>

  </body>
</html>
