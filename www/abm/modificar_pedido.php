<?
require 'conexion_abm.php';

  if (isset($_POST['guardar'])) {

    $id = $_POST['id_P'];
    $monto = $_POST['monto'];
    $dateP = $_POST['date_Ped'];
    $dateL = $_POST['date_Lleg'];
    $idP = $_POST['id_Prov2'];
    $obs = $_POST['obs_Ant'];

    $update = ("UPDATE Ant_Prov SET monto = '$monto', date_Ped = '$dateP', date_Lleg = '$dateL', obs_Ant = '$obs', id_Prov2 = '$idP' WHERE id_Ant = '$id'");

    $db->exec($update);
    ?>

    <script>
      window.location.replace('pedidos.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
