<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Imprimir Etiquetas</title>
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
    <script src="js/print_labels.js"></script>
    <script src="js/char_restriction.js"></script>

  </head>
  <body style="max-width: 920px; min-width: 920px;">
    <div class="container">

      <form method="post" name="print_label">

        <div id="topDiv">
          <h2 style="padding: 10px; font-size: 36px">Impresión de Etiquetas</h2>
        </div>

        <div id="bottomDiv">

          <div class="row" style="float: left; width: 100%; margin-bottom: 5px; margin-top: 10px">
            <div class="col-md-12">
              <label style="cursor: pointer" onclick="window.open('select_Comp.php');"><strong>N° Comprobante: </strong></label>
              <input type="text" placeholder=" Ingrese num comprobante" name="input_Comp" onkeyup="setCompParent(this)" style="width: 180px; color: black; border-radius: 30px; height: 30px" onkeypress="return restrictCharacters(this, event, comprobante)">
              <br><br>
            </div>
            <div class="col-md-12">
              <div id="CompData">
              </div>
            </div>
          </div>

          <div class="row" style="margin: 0;margin-top: 0;">
              <div class="col-md-4"></div>
              <div class="col-md-2">
                <button type="button" class="btn btn-success" onclick="endPrintLabel();"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-danger" onclick="window.close();"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>

      </form>

    </div>
  </body>
</html>
