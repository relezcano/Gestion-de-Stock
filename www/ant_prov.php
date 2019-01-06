<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Anticipo de Proveedores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ant_prov.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/ant_prov.js"></script>
    <script src="js/char_restriction.js"></script>

  </head>
  <body style="max-width: 920px; min-width: 920px;">
    <div class="container">

      <form method="post" name="ant_prov">

        <div id="topDiv">
          <h2 style="padding: 10px; font-size: 36px">Anticipo de Proveedores</h2>
        </div>

        <div id="bottomDiv">
          <div class="row" style="float: left; width: 100%; margin-bottom: 5px; margin-top: 10px">
            <div class="col-md-6">
              <label style="cursor: pointer" onclick="window.open('select_Prov.php');"><strong>Proveedor: </strong></label>
              <input type="text" name="Prov" placeholder=" Ingrese id del proveedor" style="width: 165px; color: black; border-radius: 30px; height: 30px" onkeyup="setProvDataParent(this);" onkeypress="return restrictCharacters(this, event, digitos)">

              <div id="provData" style="margin-left: 0px">

              </div>
            </div>
          </div>
          <br>
          <div class="row" style="margin-top: 50px">
            <div class="col-md-4">
              <label><strong>Monto:</strong> </label> <input class="form-control" type="text" name="monto" style="color: black; width: 285px" placeholder="Monto a pagar por el pedido" onkeypress="return restrictCharacters(this, event, precios)">
            </div>

            <div class="col-md-4">
              <label><strong>Fecha de pedido:</strong> </label> <input class="form-control" type="date" name="date_Ped" style="color: black">
            </div>

            <div class="col-md-4">
              <label><strong>Fecha de llegada:</strong> </label> <input class="form-control" type="date" name="date_Lleg" style="color: black">
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-md-6">

              <label><strong>Observaciones:</strong></label>
              <textarea class="form-control" name="obs_Ant" rows="8" cols="80" style="color: black"></textarea>

            </div>

            <div class="col-md-3">
            </div>
          </div>
          <br>
          <div class="row" style="margin: 0;margin-top: 0;">
            <div style="margin: 0 auto; margin-bottom: 5px;margin-top: 5px; width: 195px" class="center-block">
              <button type="button" class="btn btn-success" onclick="endAnt('load');"><span class="glyphicon glyphicon-ok"></span> Cargar</button>

              <button type="button" class="btn btn-danger" onclick="endAnt('cancel');"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
            </div>

          </div>

        </div>

      </form>

    </div>
  </body>
</html>
