<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Lote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_lote.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 25px">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6" style="margin-left: 7px">
          <h1 style="font-size: 35px; color: #ffffff; padding-left: 65px"><strong>Agregar Nuevo Lote</strong></h1>
        </div>
        <div class="col-md-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nuevo_lote.php" method="post" style="margin-left: 50px">

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">Cantidad</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 136px; margin-bottom: 5px" type="text" name="cant" placeholder="Cantidad de Lotes">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">Precio Compra</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 136px; margin-bottom: 5px" type="text" name="price_C" placeholder="$">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">Fecha Alta</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 160px; margin-bottom: 5px" type="date" name="date_Alt">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">Vencimiento</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 160px; margin-bottom: 5px" type="date" name="date_Ven">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">N° Comprobante</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="n_Comp" placeholder="N° de Comprobante">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">ID Producto</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 100px; margin-bottom: 5px" type="text" name="id_Prod1" placeholder="ID Producto">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">ID Proveedor</label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 100px; margin-bottom: 5px" type="text" name="id_Prov1" placeholder="ID Proveedor">
          </div>
          <div class="col-md-5"></div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-3">
            <label style="margin-top: 5px">Observaciones</label>
          </div>
          <div class="col-md-3">
            <textarea class="form-control" name="obs_L" rows="8" cols="60" style="width: 380px" placeholder="Escriba observaciones acerca del lote..."></textarea>
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
            <button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'lotes.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove"></span><strong> CANCELAR</strong></button>
          </div>
            <div class="col-md-3"></div>
          </div>
        </form>
        </div>

<?php

	// NO ESTA FUNCIONANDO EL ALTA DE LOTES... REVISAR...

	if (isset($_POST['guardar'])) {
		if ($_POST['cant'] == "" || $_POST['price_C'] == "" || $_POST['date_Alt'] == "" || $_POST['date_Ven'] == "" || $_POST['n_Comp'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del lote!";
		} else {

      $cant = $_POST['cant'];
      $price = $_POST['price_C'];
      $dateA = $_POST['date_Alt'];
      $dateV = $_POST['date_Ven'];
      $comp = $_POST['n_Comp'];
      $obs = $_POST['obs_L'];
      $idProd = $_POST['id_Prod1'];
      $idProv = $_POST['id_Prov1'];

			$fechaAlt = date_format(date_create_from_format('Y-m-d', $dateA), 'd-m-Y');
      $fechaVen = date_format(date_create_from_format('Y-m-d', $dateV), 'd-m-Y');

			include 'include/conexion.php';

			$query = "INSERT INTO Lote (cant, price_C, date_Alt, date_Ven, n_Comp, obs_L, id_Prod1, id_Prov1) VALUES ('$cant', '$price', '$fechaAlt', '$fechaVen', '$comp', '$obs', '$idProd', '$idProv')";

			$db->exec($query);

			echo "Lote guardado exitosamente!!!";
			?>
			<script>
        window.location.replace('lotes.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>


</body>
</html>
