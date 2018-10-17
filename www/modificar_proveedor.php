<?
  include 'include/conexion.php';

  if (isset($_POST['guardar'])) {

    $id = $_POST['id'];
    $name = $_POST['name_Prov'];
    $conc = $_POST['conc'];
    $obs = $_POST['obs_Prov'];

    $update = "UPDATE Proveedor SET name_Prov = '$name', conc = '$conc', obs_Prov = '$obs' WHERE id_Prov = '$id'";

    $db->exec($update);
    ?>

    <script>
      window.location.replace('proveedores.php');  // redireccionar a otra pagina.
    </script>

    <?
    }

?>
