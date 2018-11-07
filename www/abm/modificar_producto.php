<?
require 'conexion_abm.php';


  if (isset($_POST['guardar'])) {

    $id = $_POST['id_Prod'];
    $name = $_POST['name_Prod'];
    $medida = $_POST['u_Med'];
    $precio = $_POST['price_V'];
    $obs = $_POST['obs_Prod'];
    $marca = $_POST['id_M1'];
    $tipo = $_POST['id_T1'];
    // $fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');

    $update = ("UPDATE Producto SET name_Prod = '$name', u_Med = '$medida', price_V = '$precio', obs_Prod = '$obs', id_M1 = '$marca', id_T1 = '$tipo' WHERE id_Prod = '$id'");

    $db->exec($update);
    ?>

    <script>
      window.location.replace('productos.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
