<?php

  require "../db/conexion.php";
  $db = new MyDB('../db');

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sqlProv    = ("SELECT * FROM Proveedor WHERE id_Prov = $id");
    $resProv    = $db->query($sqlProv);
    $rowProv    = $resProv->fetchArray(SQLITE3_ASSOC);
    $id_Prov    = $rowProv['id_Prov'];
    $name_Prov  = $rowProv['name_Prov'];
    $conc_Prov  = $rowProv['conc'];

    if ($rowProv != ""){

      echo "<input type='hidden' name='id_Prov' value='$id_Prov'>";
      echo "<h3 style='color: white'>$name_Prov</h3>";
      echo "<h4 style='color: white'>Proveedor pasa cada: $conc_Prov días</h4>";
    } else {
      echo "404";
    }
  }
  $db->close();
  unset($db);
 ?>
