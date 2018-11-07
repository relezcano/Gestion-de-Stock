<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Recepcion de Lotes</title>
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

  </head>
  <body style="max-width: 920px; min-width: 920px;">

    <div class="container-fluid">

      <form method="post" name="ventas">

        <div class="row" style="float:right; background: #4d4d4d; padding: 5px; border-radius: 10px">
          <div style="margin-left: 5px">
            <input type="text" name="n_Comp" style="float:right; margin-right: 2%; width: 130px; text-align: center" placeholder="N° de comprobante">
          </div>
        </div>

        <div id="topDiv">
          <h2>Ingreso de Mercaderia</h2>

          <div class="row" style="float: left; width: 100%; margin-left: 0%; margin-bottom: 5px">
            <span onclick="window.open('select_Prov.php');"><strong>Proveedor: </strong></span>
            <input type="text" name="Prov" placeholder="Ingrese id del proveedor" style="width: 160px; color: black" onkeyup="setProvDataParent(this);">
          </div>

          <div class="row" style="float: center; width: 100%">
            <div id="provData" style="margin-left: 2%">
            </div>
          </div>
        </div>

        <div class="tabla">

          <div class="table-responsive">

          <!--Tabla donde se muestran los productos que se estan por vender-->

          <table class="table table-bordered table-striped" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">

            <thead class="thead-dark" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
              <tr>
                <th scope="col"                                       >N° Item            </th>
                <th scope="col"                                       >Producto           </th>
                <th scope="col"                                       >Precio Costo       </th>
                <th scope="col"                                       >Cantidad           </th>
                <th scppe="col" style="text-align: center"            >Fecha Vencimiento  </th>
                <th scppe="col" style="border-top-right-radius: 20px;">                   </th>
              </tr>
            </thead>

            <tbody id="myTable">

              <tr id="tr1">
                <td style="width: 70px" id="numOfRow">1</td>                                                  <!--Numero de Item-->
                <td style="width: 300px"> <input type="hidden" name="id_product1" value="" id="1"> <span id="Prod_name" onclick="popUpWin(this);" >Seleccionar producto</span> </td> <!--Nombre del producto-->
                <td> <span>$</span> <input type="text" style="width: 50px" name="price_C_prod" id="invis_input"> </td>      <!--Precio del Producto-->
                <td style="width: 100px"> <input type="text" name="cant_product" id="invis_input"> </td>      <!--Cantidad del Producto-->
                <td> <input type="text" name="date_Ven_prod" id="invis_input"> </td>                          <!--Precio total del Producto-->
                <td style="width: 50px"><button type="button" name="deleteRow" class="btn btn-danger" style="border-radius: 5px; width: 40px; height: 20px"><span class="glyphicon glyphicon-minus" style="float: inherit" onclick="deleteProd(this);"></span></button></td>  <!--Boton para borrar producto-->
              </tr>

            </tbody>

          </table>
        </div>

        <!--Boton para añadir una nueva fila para agregar productos a la venta-->

        <button type="button" name="add_prod" style="border-radius: 20px; width: 40px; height: 40px" class="btn btn-primary center-block" onclick="addProd();"><span class="glyphicon glyphicon-plus"></span></button>


        <!--Area del formulario donde se muestra el Total de la venta, el input para la cantidad con la que pagara el cliente, y el vuelto, si es que existe-->

        <div class="row" style="margin: 0;margin-top: 5px">

          <div class="col-md-7" style="border: solid 2px grey; height:100%">

            <textarea name="obs_L" rows="3" cols="70" id="invis_input" style="margin: 0 "></textarea>

          </div>

          <div class="col-md-5">

          </div>

        </div>

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
