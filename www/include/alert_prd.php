<?php
  //Llamado a la base de datos.
  require '../db/conexion.php';
  $db = new MyDB('../db');

  //Se seleccionan todos los productos de la base de datos.
  $sqlProd = ("SELECT * FROM Producto ORDER BY id_Prod ASC");
  $resProd = $db->query($sqlProd);

  //Se agrega nuevamente el titulo para que no desaparesca.
  echo "<div id='intDashboard'>";
  echo "<h3><strong>Productos</strong></h3>";
  echo "</div>";

  //Se hace una iteracion entre todos los productos para buscar cual esta en cantidad critica.
  while($Prod = $resProd->fetchArray(SQLITE3_ASSOC)){

    $id_Prod    = $Prod['id_Prod'];
    $name_Prod  = $Prod['name_Prod'];

    //Se extrae el total en stock que se tiene de ese producto.
    $sqlLoteSum = ("SELECT SUM(cant) FROM Lote WHERE id_Prod1 = $id_Prod");
    $resLoteSum = $db->query($sqlLoteSum);
    $LoteSum = $resLoteSum->fetchArray(SQLITE3_ASSOC);

    if (isset($LoteSum['SUM(cant)'])){
      $CantSumLote  = $LoteSum['SUM(cant)'];
    } else {
      $CantSumLote = 0;
    }

    //Si el stock es menor a la cantidad critica, se muestra el nombre del producto y la cantidad que queda.
    if($LoteSum['SUM(cant)'] < $Prod['cant_Rep'] && $Prod['estado'] == 'A'){
      echo "<div id='alrtProd'>";
      echo "<p>$name_Prod: Quedan $CantSumLote</p>";
      echo "</div>";
    }

  }

  //Se cierra la conexion con la base de datos.
  $db->close();
  unset($db);

 ?>
