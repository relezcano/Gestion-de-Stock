<?
  include 'include/conexion.php';

  if (isset($_POST['guardar'])) {

    $id = $_POST['id'];
    $monto = $_POST['monto'];
    $idV = $_POST['id_V'];
    $idC = $_POST['id_C'];


    $update = "UPDATE Deuda SET monto = '$monto', id_V = '$idV', id_C = '$idC' WHERE id_D = '$id'";

    $db->exec($update);
    ?>

    <script>
      window.location.replace('deudores.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
