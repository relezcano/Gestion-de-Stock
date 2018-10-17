<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_proveedor.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 123px">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6" style="margin-left: 7px">
          <h1 style="font-size: 33px; color: #ffffff; padding-left: 33px"><strong>Agregar Nuevo Proveedor</strong></h1>
        </div>
        <div class="col-md-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nuevo_proveedor.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Nombre</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name_Prov" placeholder="Nombre del Proveedor">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Concurrencia</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="conc" placeholder="Concurrencia del Proveedor">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Observaciones</label>
					</div>
					<div class="col-md-3">
						<textarea class="form-control" name="obs_Prov" rows="8" cols="60" style="width: 380px" placeholder="Escriba algún detalle u observación del proveedor..."></textarea>
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'proveedores.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['name_Prov'] == "" || $_POST['conc'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del proveedor!";
		} else {

			$name = $_POST['name_Prov'];
			$conc = $_POST['conc'];
			$obs = $_POST['obs_Prov'];


			include 'include/conexion.php';

			$query = "INSERT INTO Proveedor (name_Prov, conc, obs_Prov) VALUES ('$name', '$conc', '$obs')";

			$db->exec($query);

			echo "Proveedor guardado exitosamente!!!";
			?>
			<script>
        window.location.replace('proveedores.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
