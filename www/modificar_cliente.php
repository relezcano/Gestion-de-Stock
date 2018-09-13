<?
  require 'include/conexion.php';

  if (isset($_POST['guardar'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $dateIn = $_POST['dateIn'];
    $obs = $_POST['obs'];
    $fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');

    $update = ("UPDATE clients SET name = '$name', phone = '$phone', dateIn = '$fecha', obs = '$obs' WHERE id = '$id'");

    $db->exec($update);
    ?>

    <script>
      window.location.replace('clientes.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
