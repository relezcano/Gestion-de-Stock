<?
require '../db/conexion.php';
$db = new MyDB('../db');

  if (isset($_POST['save'])) {

    $id = $_POST['id_P'];
    $monto = $_POST['monto'];
    $dateP = $_POST['date_Ped'];
    $dateL = $_POST['date_Lleg'];
    $idP = $_POST['id_Prov2'];
    $obs = $_POST['obs_Ant'];

    $sql = ("SELECT * FROM Ant_Prov");
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);

    $estado = $row['estado'];

    $update = ("UPDATE Ant_Prov SET monto = '$monto', date_Ped = '$dateP', date_Lleg = '$dateL', estado = '$estado', obs_Ant = '$obs', id_Prov2 = '$idP' WHERE id_Ant = '$id'");

    $db->exec($update);
    ?>

    <script>
      window.location.replace('pedidos.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
