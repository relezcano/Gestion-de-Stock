<?
  require 'include/conexion.php';

  if (isset($_POST['guardar'])) {

    $id = $_POST['id_Lote'];
    $cant = $_POST['cant'];
    $price = $_POST['price_C'];
    $dateA = $_POST['date_Alt'];
    $dateV = $_POST['date_Ven'];
    $comp = $_POST['n_Comp'];
    $obs = $_POST['obs_L'];
    $idProd = $_POST['id_Prod1'];
    $idProv = $_POST['id_Prov1'];
    // $fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');

    $update = ("UPDATE Lote SET cant = '$cant', price_C = '$price', date_Alt = '$dateA', date_Ven = '$dateV', n_Comp = '$comp', obs_L = '$obs', id_Prod1 = '$idProd', id_Prov1 = '$idProv' WHERE id_L = '$id'");

    $db->exec($update);
    ?>

    <script>
      window.location.replace('lotes.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
