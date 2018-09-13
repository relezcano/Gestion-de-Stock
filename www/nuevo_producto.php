<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_cliente.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 80px">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h1 style="font-size: 37px; color: #ffffff"><strong>Agregar Nuevo Producto</strong></h1>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <br><br>

      <form class="alta" action="nuevo_cliente.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Nombre</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="name" placeholder="Nombre del Producto...">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Precio Venta</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="precio" placeholder="Precio de Venta...">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Tipo</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="tipo" placeholder="Tipo de Producto...">
					</div>
					<div class="col-sm-5"></div>
				</div>

        <div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Marca</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="marca" placeholder="Marca del Producto...">
					</div>
					<div class="col-sm-5"></div>
				</div>

        <div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Rubro</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="rubro" placeholder="Rubro del Producto...">
					</div>
					<div class="col-sm-5"></div>
				</div>

        <div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Unidad Medida</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="unidad_medida" placeholder="Unidad de Medida...">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-2">
						<label>Observaciones</label>
					</div>
					<div class="col-sm-2">
						<textarea name="obs" rows="8" cols="60" placeholder="Escriba algún detalle u observación del cliente..."></textarea>
					</div>
					<div class="col-sm-5"></div>
				</div>

				<br>

				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-2">
						<button style="font-family: verdana; font-weight: bolder" type="submit" name="guardar" class="btn btn-success btn-md"><span class="glyphicon glyphicon-floppy-disk"></span><strong> GUARDAR</strong></button>
					</div>
					<div class="col-md-2">
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'productos.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-4"></div>
					</div>
				</form>


<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['name'] == "" || $_POST['phone'] == "" || $_POST['dateIn'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del cliente!";
		} else {

      // ADAPTAR VARIABLES PARA LOS PRODUCTOS... TAMBIEN EN LA SENTENCIA SQL...

			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$dateIn = $_POST['dateIn'];
			$obs = $_POST['obs'];
			$fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');


			require 'include/conexion.php';

			$query = "INSERT INTO productos (name, phone, dateIn, obs) VALUES ('$name', '$phone', '$fecha', '$obs')";

			$db->exec($query);

			echo "Producto guardado exitosamente!!!";
			?>
			<script>
        window.location.replace('productos.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
