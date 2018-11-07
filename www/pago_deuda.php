<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Deudores</title>
    <link rel="shortcut icon" href="img/elephant_icon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/deudas.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>

  </head>
  <body>

<?
  require 'db/conexion.php';
  $db = new MyDB("db");

  if (isset($_POST['pagar'])) {

    if ($_POST['dni'] == "") {

    } else {

      $dni = $_POST['dni'];
      $montoPago = $_POST['valor'];

      $cons = ("SELECT * FROM Cliente WHERE dni = '$dni'");
      $result = $db->query($cons);
      while($rows = $result->fetchArray(SQLITE3_ASSOC)){
        $idC = $rows['id_C'];
        $docu = $rows['dni'];

        if ($dni != $docu) {
          ?><script>
            window.location.replace('deudores.php');  // redireccionar a otra pagina.
          </script><?
        } else {

        $sql = ("SELECT * FROM Deuda WHERE id_C = '$idC'");
        $res = $db->query($sql);
        while($row = $res->fetchArray(SQLITE3_ASSOC)){
          $id_deuda = $row['id_D'];
          $valorDeuda = $row['monto'];

          if ($montoPago == "") {

          } else {

            $saldo = $montoPago - $valorDeuda;

            if ($saldo < 0) {
              $saldo = abs($saldo);
              $update = "UPDATE Deuda SET monto = '$saldo' WHERE id_D = '$id_deuda'";

              $db->exec($update);
              break;
            } else {
              $montoPago = $saldo;
              $update = "UPDATE Deuda SET monto = '0' WHERE id_D = '$id_deuda'";
              $db->exec($update);
              $vuelto = $saldo;

            }
          }
        }
      }

      $sqlchk = ("SELECT SUM(monto) AS totalmonto FROM Deuda WHERE id_C = '$idC'");
      $reschk = $db->query($sqlchk);
      $filaSum = $reschk->fetchArray(SQLITE3_ASSOC);
      $suma = $filaSum['totalmonto'];

      echo $suma;

      if ($suma != 0) {

      } else {
        ?> <script>
            alert("\t\tEL VUELTO ES DE  $ " + <?php echo $vuelto;?> +" .="); // Alert del vuelto
          </script> <?
      }


    }
  }
}
     ?>


     <script>
       window.location.replace('deudores.php');  // redireccionar a otra pagina.
     </script>

</body>
</html>
