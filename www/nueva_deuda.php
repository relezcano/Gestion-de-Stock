<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nueva Deuda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_cliente.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 123px">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-6" style="margin-left: 7px">
          <h1 style="font-size: 37px; color: #ffffff; padding-left: 42px"><strong>Agregar Nueva Deuda</strong></h1>
        </div>
        <div class="col-sm-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nueva_deuda.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">Monto</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 115px; margin-bottom: 5px" type="text" name="monto" placeholder="$">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">ID Venta</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 115px; margin-bottom: 5px" type="text" name="id_V" placeholder="ID de la Venta">
					</div>
					<div class="col-sm-5"></div>
				</div>

        <div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">ID Cliente</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 115px; margin-bottom: 5px" type="text" name="id_C" placeholder="ID del Cliente">
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'deudas.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['monto'] == "" || $_POST['id_V'] == "" || $_POST['id_C'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta de la deuda!";
		} else {

			$monto = $_POST['monto'];
			$idV = $_POST['id_V'];
			$idC = $_POST['id_C'];

			include 'include/conexion.php';

			$query = "INSERT INTO Deuda (monto, id_V, id_C) VALUES ('$name', '$idV', '$idC')";

			$db->exec($query);

			echo "Deuda guardada exitosamente!!!";
			?>
			<script>
        window.location.replace('deudas.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
