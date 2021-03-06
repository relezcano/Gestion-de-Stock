<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/nuevo_cliente.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 123px">
      <div class="row">
        <div class="col-md-6" style="margin-left: 73px">
          <h1 style="font-size: 37px; color: #ffffff; padding-left: 35px"><strong>Agregar Nuevo Cliente</strong></h1>
        </div>
				<div class="col-md-1"></div>
        <div class="col-md-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nuevo_cliente.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Nombre</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name" placeholder="Nombre Cliente">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Apellido</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="surname_C" placeholder="Apellido Cliente">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">DNI</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="dni" placeholder="DNI (Solo Números)...">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Teléfono</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="phone" placeholder="Número de Teléfono">
					</div>
					<div class="col-md-5"></div>
				</div>

				<!-- EN CASO DE QUERER PONERLE FECHA DE INGRESO AL CLIENTE...

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label>Fecha Ingreso</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 170px" type="date" name="dateIn">
					</div>
					<div class="col-md-5"></div>
				</div> -->

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Observaciones</label>
					</div>
					<div class="col-md-3">
						<textarea class="form-control" name="obs" rows="5" cols="60" style="width: 380px" placeholder="Escriba algún detalle u observación del cliente..."></textarea>
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'clientes.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['name'] == "" || $_POST['surname_C'] == "" || $_POST['dni'] == "" || $_POST['phone'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del cliente!";
		} else {

			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$dni = $_POST['dni'];
			$phone = $_POST['phone'];
			// $dateIn = $_POST['dateIn'];
			$obs = $_POST['obs'];
			//	$fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');


			require '../db/conexion.php';
			$db = new MyDB('../db');

			$query = "INSERT INTO Cliente (name_C, surname_C, dni, phone, obs_C) VALUES ('$name', '$surname', '$dni', '$phone', '$obs')";

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
