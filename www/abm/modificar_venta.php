<?
require 'conexion_abm.php';

  if (isset($_POST['guardar'])) {

    $id = $_POST['id_V'];
    $date = $_POST['date_V'];
    $priceT = $_POST['price_Total'];
    $priceP = $_POST['price_Pago'];
    $idC = $_POST['id_C1'];
    $obs = $_POST['obs_V'];

    $update = ("UPDATE Venta SET date_V = '$date', price_Total = '$priceT', price_Pago = '$priceP', obs_V = '$obs', id_C1 = '$idC' WHERE id_V = '$id'");

    $db->exec($update);
    ?>

    <script>
      window.location.replace('ventas.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
