<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nueva Venta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nueva_venta.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 65px">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6" style="margin-left: 7px">
          <h1 style="font-size: 35px; color: #ffffff; padding-left: 50px"><strong>Agregar Nueva Venta</strong></h1>
        </div>
        <div class="col-md-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nueva_venta.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Fecha Venta</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 160px; margin-bottom: 5px" type="date" name="date_V">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Valor Total</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 110px; margin-bottom: 5px" type="text" name="price_Total" placeholder="$">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Valor Pago</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 110px; margin-bottom: 5px" type="text" name="price_Pago" placeholder="$">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">ID Cliente</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 90px; margin-bottom: 5px" type="text" name="id_C1" placeholder="ID Cliente">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Detalle de la Venta</label>
					</div>
					<div class="col-md-3">
						<textarea class="form-control" name="obs_C" rows="6" cols="30" style="width: 380px" placeholder="Escriba algún detalle u observación de la venta..."></textarea>
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'ventas.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['date_V'] == "" || $_POST['price_Total'] == "" || $_POST['price_Pago'] == "" || $_POST['id_C1'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta de la venta!";
		} else {

			$dateV = $_POST['date_V'];
			$priceT = $_POST['price_Total'];
			$priceP = $_POST['price_Pago'];
      $idC = $_POST['id_C1'];
			$obs = $_POST['obs_V'];

      $fechaV = date_format(date_create_from_format('Y-m-d', $dateV), 'd-m-Y');


			include 'include/conexion.php';

			$query = "INSERT INTO Venta (date_V, price_Total, price_Pago, obs_C, id_C1) VALUES ('$fechaV', '$priceT', '$priceP', '$obs', '$idC')";

			$db->exec($query);

			echo "Venta guardada exitosamente!!!";
			?>
			<script>
        window.location.replace('ventas.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
