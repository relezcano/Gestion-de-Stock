<!DOCTYPE html>
<html lang="es" dir="ltr">

  <head>

    <title>Ventas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/ventas.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/ventas.js"></script>

  </head>

  <body style="max-width: 920px; min-width: 920px;">

    <div class="container">

      <form method="post" name="ventas">

        <div id="topDiv">
          <h2>Ventas</h2>

          <!-- <div class="row">
            <input type="text" name="id_Venta" style="float:right; margin-right: 2%; width: 105px; text-align: center" placeholder="N° de venta">
          </div> -->

          <div class="row" style="float: left; width: 100%; margin-left: 0%; margin-bottom: 5px">
            <span onclick="window.open('select_Client.php');"><strong>Cliente: </strong></span>
            <input style="border-radius: 10px; color: #000000; text-align: center; width: 135px" type="text" name="cliente" placeholder="Ingrese id del cliente" style="width: 135px; color: black" onkeyup="setClientDataParent(this);">
          </div>

          <div class="row" style="float: center; width: 100%">
            <div id="clientData" style="margin-left: 2%">
            </div>
          </div>
        </div>

        <div class="tabla">

          <div class="table-responsive">

          <!--Tabla donde se muestran los productos que se estan por vender-->

          <table class="table table-bordered table-striped" style="border-top-left-radius: 20px">

            <thead class="thead-dark" style="border-top-left-radius: 20px">
              <tr>
                <th scope="col" style="text-align: center" >N° Item       </th>
                <th scope="col" style="text-align: center" >Producto      </th>
                <th scope="col" style="text-align: center" >Precio        </th>
                <th scope="col" style="text-align: center" >Cantidad      </th>
                <th scppe="col" style="text-align: center" >Total item    </th>
                <th scppe="col">    </th>
              </tr>
            </thead>

            <tbody id="myTable">

              <tr id="tr1">
                <td style="width: 70px" id="numOfRow">1</td>                                                                                  <!--Numero de Item-->
                <td style="width: 300px"> <input type="hidden" name="id_product1" value="" id="1"> <span id="Prod_name" onclick="popUpWin(this);" >Seleccionar producto</span> </td> <!--Nombre del producto-->
                <td>$<span id="itemPrice">-</span></td>                                                                                       <!--Precio del Producto-->
                <td style="width: 100px"> <input type="text" name="cant_product" id="invis_input_cant" onkeyup="setTotalPrice(this);"> </td>  <!--Cantidad del Producto-->
                <td>$<span id="total_price">-</span></td>                                                                                     <!--Precio total del Producto-->
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

            <textarea name="obs_V" rows="3" cols="70" id="invis_input" style="margin: 0 "></textarea>

          </div>

          <div class="col-md-5">

            <div class="row" style="margin-bottom: 0px; margin-right: 0">
              <div class="col-md-12" style="border-top: solid 2px grey;border-left: solid 2px grey;border-right: solid 2px grey">
                <strong>Total:</strong><span style="margin-left: 35%">$<span id="total_price_venta"></span></span>
              </div>
            </div>

            <div class="row" style="margin-bottom: 0px; margin-right: 0px">
              <div class="col-md-12" style="border-top: solid 2px grey;border-left: solid 2px grey;border-right: solid 2px grey">
                <strong>Pago:</strong><span style="margin-left: 35%">$</span><input type="text" name="Pago" id="invis_input" style="width: 120px" onkeyup="calcVuelto();">
              </div>
            </div>

            <div class="row" style="margin-bottom: 0px; margin-right: 0px">
              <div class="col-md-12"style="margin-bottom: 0; border: solid 2px grey">
                <strong>Vuelto:</strong><span style="margin-left: 32%">$<span id="price_vuelto">-</span></span> <span style="float: right">Deuda:<input type="checkbox" id="devolver" style="margin-left: 5px"></span>
              </div>
            </div>


            </div>

          </div>

          <div class="row" style="margin: 0;margin-top: 0;">
            <div style="margin: 0 auto; margin-bottom: 5px;margin-top: 5px; width: 240px" class="center-block">
              <button type="button" class="btn btn-success" name="close" onclick="endSellProcess('load');">Cargar Venta</button>

              <button type="button" class="btn btn-danger" name="cancel" onclick="endSellProcess('cancel');">Cancelar Venta</button>
            </div>

        </div>



      </div>

      </form>

    </div>

  </body>

</html>
