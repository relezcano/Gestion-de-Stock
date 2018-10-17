<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Pedido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_pedido.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 65px">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6" style="margin-left: 7px">
          <h1 style="font-size: 35px; color: #ffffff; padding-left: 50px"><strong>Agregar Nuevo Pedido</strong></h1>
        </div>
        <div class="col-md-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nuevo_pedido.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Fecha Pedido</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 160px; margin-bottom: 5px" type="date" name="date_Ped">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Fecha Llegada</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 160px; margin-bottom: 5px" type="date" name="date_Lleg">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">ID Proveedor</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 110px; margin-bottom: 5px" type="text" name="id_Prov2" placeholder="ID Proveedor">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Valor</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 110px; margin-bottom: 5px" type="text" name="monto" placeholder="$">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Detalle del Pedido</label>
					</div>
					<div class="col-md-3">
						<textarea class="form-control" name="obs_Ant" rows="6" cols="30" style="width: 380px" placeholder="Escriba algún detalle u observación del pedido..."></textarea>
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'pedidos.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['monto'] == "" || $_POST['date_Ped'] == "" || $_POST['date_Lleg'] == "" || $_POST['id_Prov2'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del Pedido!";
		} else {

			$monto = $_POST['monto'];
			$dateP = $_POST['date_Ped'];
			$dateL = $_POST['date_Lleg'];
      $idP = $_POST['id_Prov2'];
			$obs = $_POST['obs_Ant'];

      $fechaP = date_format(date_create_from_format('Y-m-d', $dateP), 'd-m-Y');
      $fechaL = date_format(date_create_from_format('Y-m-d', $dateL), 'd-m-Y');


			include 'include/conexion.php';

			$query = "INSERT INTO Ant_Prov (monto, date_Ped, date_Lleg, obs_Ant, id_Prov2) VALUES ('$monto', '$fechaP', '$fechaL', '$obs', '$idP')";

			$db->exec($query);

			echo "Pedido guardado exitosamente!!!";
			?>
			<script>
        window.location.replace('pedidos.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
