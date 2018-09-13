<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_cliente.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 130px">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-6" style="margin-left: 7px">
          <h1 style="font-size: 37px; color: #ffffff; padding-left: 42px"><strong>Agregar Nuevo Cliente</strong></h1>
        </div>
        <div class="col-sm-5"></div>
      </div>


			<div class="formulario">

      <form class="alta" action="nuevo_cliente.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label>Nombre</label>
					</div>
					<div class="col-sm-2">
						<input class="form-control" style="width: 210px" type="text" name="name" placeholder="Nombre Cliente">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label>Teléfono</label>
					</div>
					<div class="col-sm-2">
						<input class="form-control" style="width: 210px" type="text" name="phone" placeholder="Nro de Teléfono">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label>Fecha Ingreso</label>
					</div>
					<div class="col-sm-2">
						<input class="form-control" style="width: 170px" type="date" name="dateIn">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<label>Observaciones</label>
					</div>
					<div class="col-sm-2">
						<textarea class="form-control" name="obs" rows="8" cols="60" style="width: 380px" placeholder="Escriba algún detalle u observación del cliente..."></textarea>
					</div>
					<div class="col-sm-5"></div>
				</div>

				<br>

				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3">
						<button style="font-family: verdana; font-weight: bolder" type="submit" name="guardar" class="btn btn-success btn-md"><span class="glyphicon glyphicon-floppy-disk"></span><strong> GUARDAR</strong></button>
					</div>
					<div class="col-md-3">
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'clientes.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['name'] == "" || $_POST['phone'] == "" || $_POST['dateIn'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del cliente!";
		} else {

			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$dateIn = $_POST['dateIn'];
			$obs = $_POST['obs'];
			$fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');


			require 'include/conexion.php';

			$query = "INSERT INTO clients (name, phone, dateIn, obs) VALUES ('$name', '$phone', '$fecha', '$obs')";

			$db->exec($query);

			echo "Cliente guardado exitosamente!!!";
			?>
			<script>
        window.location.replace('clientes.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
