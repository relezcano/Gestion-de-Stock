<?php

  if(isset($_GET['nComp'])){

    require '../db/conexion.php';
    $db = new MyDB('../db');

    $n_Comp = $_GET['nComp'];

    $sqlLabel = ("SELECT Lote.id_L, Lote.date_Ven, Lote.bultos, Producto.name_Prod FROM Lote INNER JOIN Producto ON Lote.id_Prod1 = Producto.id_Prod WHERE n_Comp = '$n_Comp'");
    $resLabel = $db->query($sqlLabel);

    while($Label = $resLabel->fetchArray(SQLITE3_ASSOC)){

      $id_L           = $Label['id_L'];
      $date_Ven       = $Label['date_Ven'];
      $arrVen         = explode('-', $date_Ven);
      $corr_date_ven  = $arrVen[2]."/".$arrVen[1]."/".$arrVen[0];
      $name_Prod      = $Label['name_Prod'];
      $bultos         = $Label['bultos'];

      for ($i=0; $i < $bultos; $i++) {

        echo "<div style='width: 45%; float: left; margin-bottom: 10px'>";
        echo "<div style='border: solid 3px black; width: 400px; padding: 10px'>";
        echo "<h2 style='text-align: center'>Lote N° $id_L</h2>";
        echo "<p><strong>$name_Prod</strong></p>";
        echo "<p><strong>Vencimiento: $corr_date_ven</strong></p>";
        echo "</div>";
        echo "</div>";

      }
    }
  }

 ?>
