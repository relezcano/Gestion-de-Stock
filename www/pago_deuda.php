<?
  require 'include/conexion.php';

  if (isset($_POST['pagar'])) {

    $idC = $_POST['id_C'];
    $montoPago = $_POST['valor'];

    $sql = ("SELECT * FROM Deuda WHERE id_C = '$idC'");
    $res = $db->query($sql);
    while($row = $res->fetchArray(SQLITE3_ASSOC)){
      $id_deuda = $row['id_D'];
      $valorDeuda = $row['monto'];

    //  echo "Usted esta en la deuda ". $id_deuda."<br>";

    //  echo $montoPago."<br>";
    //  echo $valorDeuda."<br>";

      $saldo = $montoPago - $valorDeuda;

    //  echo $saldo."<br>";

      if ($saldo < 0) {
        $saldo = abs($saldo);
        $update = "UPDATE Deuda SET monto = '$saldo' WHERE id_D = '$id_deuda'";
        echo $update."<br>";

        $db->exec($update);
        break;
      } else {
        $montoPago = $saldo;
        $update = "UPDATE Deuda SET monto = '0' WHERE id_D = '$id_deuda'";
        echo $update."<br>";
        $db->exec($update);
      }

      }
     }
     ?>
     <script>
       window.location.replace('deudores.php');  // redireccionar a otra pagina.
     </script>
