<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Agregar Nuevo Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/nuevo_producto.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 65px">
      <div class="row">
        <div class="col-md-6" style="margin-left: 73px">
          <h1 style="font-size: 35px; color: #ffffff; padding-left: 25px"><strong>Agregar Nuevo Producto</strong></h1>
        </div>
				<div class="col-md-1"></div>
        <div class="col-md-5"></div>
      </div>

			<div class="formulario">

      <form class="alta" action="nuevo_producto.php" method="post" style="margin-left: 50px">

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Nombre</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="name_Prod" placeholder="Nombre Producto">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Unidad Medida</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="u_Med" placeholder="Unidad de Medida">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Precio Venta</label>
					</div>
					<div class="col-md-3">
						<input class="form-control" style="width: 210px; margin-bottom: 5px" type="text" name="price_V" placeholder="$">
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Marca Producto</label>
					</div>
					<div class="col-md-3" style="margin-top: 5px; font-size: 16px">
						<?
						require '../db/conexion.php';
						$db = new MyDB('../db');

						$queryM = ("SELECT * FROM Marca");
            $result = $db->query($queryM);

          ?><select name="marca" style="border-radius: 10px; padding: 5px">

            <?
            while ($rowIDM = $result->fetchArray(SQLITE3_ASSOC))
            {
							$idmarca = $rowIDM['id_M'];
							$idnamemar = $rowIDM['name_M'];
              echo '<option value="'.$idmarca.'">'.$idnamemar.'</option>';
            }
            ?>
            </select>
					</div>
					<div class="col-md-1">
						<input type="checkbox" name="checkmar" style="margin-top: 15px; margin-left: 35px">
					</div>
					<div class="col-md-4">
						<input style="margin-top: 5px; border-radius: 10px; text-align: center; padding: 5px" type="text" name="nueva_marca" placeholder="Ingrese nueva marca...">
					</div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Tipo Producto</label>
					</div>

					<div class="col-md-3" style="margin-top: 5px; font-size: 16px; margin-bottom: 10px ">
						<?
            $queryT = ("SELECT * FROM Tipo");
            $result2 = $db->query($queryT);

          ?><select name="tipo" style="border-radius: 10px; padding: 5px">

            <?
            while ($rowIDT = $result2->fetchArray(SQLITE3_ASSOC))
            {
							$idtipo = $rowIDT['id_T'];
							$idnametipo = $rowIDT['name_T'];
              echo '<option value="'.$idtipo.'">'.$idnametipo.'</option>';
            }
            ?>
            </select>

					</div>
					<div class="col-md-1">
						<input type="checkbox" name="checktipo" style="margin-top: 15px; margin-left: 35px">
					</div>
					<div class="col-md-4">
						<input style="margin-top: 5px; border-radius: 10px; text-align: center; padding: 5px" type="text" name="nuevo_tipo" placeholder="Ingrese nuevo tipo...">
					</div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<label style="margin-top: 5px">Observaciones</label>
					</div>
					<div class="col-md-3">
						<textarea class="form-control" name="obs_Prod" rows="8" cols="60" style="width: 380px" placeholder="Escriba algún detalle u observación del producto..."></textarea>
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
						<button style="margin-left: 30px; font-family: verdana; font-weight: bolder" type="button" name="cancelar" onclick="location.href = 'productos.php';" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-chevron-left"></span><strong> VOLVER</strong></button>
					</div>
						<div class="col-md-3"></div>
					</div>
				</form>
				</div>

<?php

	if (isset($_POST['guardar'])) {
		if ($_POST['name_Prod'] == "" || $_POST['u_Med'] == "" || $_POST['price_V'] == ""){
			echo "Debe completar todos los campos para poder realizar el alta del cliente!";

		} else {

			$name = $_POST['name_Prod'];
			$medida = $_POST['u_Med'];
			$precio = $_POST['price_V'];
			$obs = $_POST['obs_Prod'];
			$idMarca = $_POST['marca'];
			$idTipo = $_POST['tipo'];
			$checkmar = $_POST['checkmar'];
			$checktipo = $_POST['checktipo'];


			if (isset($checkmar)) {
				$newMar = $_POST['nueva_marca'];
				$sqlM = "INSERT INTO Marca (name_M) VALUES ('$newMar')";
				$db->exec($sqlM);
				$consM = ("SELECT * FROM Marca WHERE name_M = '$newMar'");
				$retM = $db->query($consM);
				$rowM = $retM->fetchArray(SQLITE3_ASSOC);
				$idMar = $rowM['id_M'];

				if (isset($checktipo)) {
					$newTip = $_POST['nuevo_tipo'];
					$sqlT = "INSERT INTO Tipo (name_T) VALUES ('$newTip')";
					$db->exec($sqlT);
					$consT = ("SELECT * FROM Tipo WHERE name_T = '$newTip'");
					$retT = $db->query($consT);
					$rowT = $retT->fetchArray(SQLITE3_ASSOC);
					$idTip = $rowT['id_T'];

					$query = "INSERT INTO Producto (name_Prod, u_Med, price_V, obs_Prod, id_M1, id_T1) VALUES ('$name', '$medida', '$precio', '$obs', '$idMar', '$idTip')";

					$db->exec($query);

					echo "Producto guardado exitosamente!!!";

					$db->close();
					unset($db);
					?>

					<script>
		        window.location.replace('productos.php');  // redireccionar a otra pagina.
		      </script><?

				} else {

					$query = "INSERT INTO Producto (name_Prod, u_Med, price_V, obs_Prod, id_M1, id_T1) VALUES ('$name', '$medida', '$precio', '$obs', '$idMar', '$idTipo')";

					$db->exec($query);

					echo "Producto guardado exitosamente!!!";

					$db->close();
					unset($db);
					?>

					<script>
		        window.location.replace('productos.php');  // redireccionar a otra pagina.
		      </script><?

				}
			} else {

				if (isset($checktipo)) {
					$newTip = $_POST['nuevo_tipo'];
					$sqlT = "INSERT INTO Tipo (name_T) VALUES ('$newTip')";
					$db->exec($sqlT);
					$consT = ("SELECT * FROM Tipo WHERE name_T = '$newTip'");
					$retT = $db->query($consT);
					$rowT = $retT->fetchArray(SQLITE3_ASSOC);
					$idTip = $rowT['id_T'];

					$query = "INSERT INTO Producto (name_Prod, u_Med, price_V, obs_Prod, id_M1, id_T1) VALUES ('$name', '$medida', '$precio', '$obs', '$idMarca', '$idTip')";

					$db->exec($query);

					echo "Producto guardado exitosamente!!!";


					$db->close();
					unset($db);
					?>

					<script>
		        window.location.replace('productos.php');  // redireccionar a otra pagina.
		      </script><?
				}

			}

			if ($checkmar == "" && $checktipo == "") {

				$query = "INSERT INTO Producto (name_Prod, u_Med, price_V, obs_Prod, id_M1, id_T1) VALUES ('$name', '$medida', '$precio', '$obs', '$idMarca', '$idTipo')";

				$db->exec($query);

				echo "Producto guardado exitosamente!!!";


				$db->close();
				unset($db);

			?>
			<script>
				window.location.replace('productos.php');  // redireccionar a otra pagina.
			</script><?
			}
		}
	}

?>

</body>
</html>
