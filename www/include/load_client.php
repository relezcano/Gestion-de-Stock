<?php

  require "../db/conexion.php";
  $db = new MyDB('../db');

  if (isset($_GET['idOrName'])) {

    $idOrName = $_GET['idOrName'];

    $sqlC = ("SELECT * FROM Cliente WHERE id_C = $idOrName");
    $resC = $db->query($sqlC);
    $rowC = $resC->fetchArray(SQLITE3_ASSOC);
    $id_C = $rowC['id_C'];
    $name_C = $rowC['name_C'];

    $sqlD = ("SELECT SUM(monto) FROM Deuda WHERE id_C = $id_C");
    $resD = $db->query($sqlD);
    $rowD = $resD->fetchArray(SQLITE3_ASSOC);
    $montoTotD = $rowD['SUM(monto)'];
    if ($montoTotD == ""){
      $montoTotD = 0;
    }

    echo "<input type='hidden' name='id_C' value='$id_C'>";
    echo "<h3 style='color: white'>$name_C</h3>";
    echo "<h4 style='color: white'>Deudas pendientes: $$montoTotD</h4>";

  }
  $db->close();
  unset($db);
 ?>
