<?
require '../db/conexion.php';
$db = new MyDB('../db');

  if (isset($_POST['guardar'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname_C'];
    $dni = $_POST['dni'];
    $phone = $_POST['phone'];
    // $dateIn = $_POST['dateIn'];
    $obs = $_POST['obs'];
    // $fecha = date_format(date_create_from_format('Y-m-d', $dateIn), 'd-m-Y');

    $update = "UPDATE Cliente SET name_C = '$name', surname_C = '$surname', dni = '$dni', phone = '$phone', obs_C = '$obs' WHERE id_C = '$id'";

    $db->exec($update);
    ?>

    <script>
      window.location.replace('clientes.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
