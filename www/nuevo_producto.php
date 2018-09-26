<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/nuevo_producto.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 65px">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-6" style="margin-left: 7px">
          <h1 style="font-size: 35px; color: #ffffff; padding-left: 35px"><strong>Agregar Nuevo Producto</strong></h1>
        </div>
        <div class="col-sm-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nuevo_producto.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">Nombre</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name_Prod" placeholder="Nombre Producto">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">Unidad Medida</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="u_Med" placeholder="Unidad de Medida">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">Precio Venta</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="price_V" placeholder="Precio de venta">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">ID Marca</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 90px; margin-bottom: 5px" type="text" name="id_M1" placeholder="ID Marca">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">ID Tipo</label>
					</div>
					<div class="col-sm-3">
						<input class="form-control" style="width: 90px; margin-bottom: 5px" type="text" name="id_T1" placeholder="ID Tipo">
					</div>
					<div class="col-sm-5"></div>
				</div>

				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<label style="margin-top: 5px">Observaciones</label>
					</div>
					<div class="col-sm-3">
						<textarea class="form-control" name="obs_Prod" rows="8" cols="60" style="width: 380px" placeholder="Escriba algún detalle u observación del producto..."></textarea>
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'productos.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['name_Prod'] == "" || $_POST['u_Med'] == "" || $_POST['price_V'] == "" || $_POST['id_M1'] == "" || $_POST['id_T1'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del cliente!";
		} else {

			$name = $_POST['name_Prod'];
			$medida = $_POST['u_Med'];
			$precio = $_POST['price_V'];
			$obs = $_POST['obs_Prod'];
			$idM = $_POST['id_M1'];
			$idT = $_POST['id_T1'];



			include 'include/conexion.php';

			$query = "INSERT INTO Producto (name_Prod, u_Med, price_V, obs_Prod, id_M1, id_T1) VALUES ('$name', '$medida', '$precio', '$obs', '$idM', '$idT')";

			$db->exec($query);

			echo "Cliente guardado exitosamente!!!";
			?>
			<script>
        window.location.replace('productos.php');  // redireccionar a otra pagina.
      </script><?
		}
	}
?>




</body>
</html>
