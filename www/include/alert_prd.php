<?php
  //Llamado a la base de datos.
  require '../db/conexion.php';
  $db = new MyDB('../db');

  //Se toman las variables del dia actual.
  // $day = $_GET['day'];
  // $month = $_GET['month'];
  // $year = $_GET['year'];

  //Se seleccionan todos los productos de la base de datos.
  $sqlProd = ("SELECT * FROM Producto ORDER BY id_Prod ASC");
  $resProd = $db->query($sqlProd);

  //Se agrega nuevamente el titulo para que no desaparesca.
  echo "<div id='intDashboard'>";
  echo "<h3 style='text-align: center; font-size: 36px; padding-bottom: 10px'><strong>Productos</strong></h3>";
  echo "</div>";

  //Se hace una iteracion entre todos los productos para buscar cual esta en cantidad critica.
  while($Prod = $resProd->fetchArray(SQLITE3_ASSOC)){

    $id_Prod    = $Prod['id_Prod'];
    $name_Prod  = $Prod['name_Prod'];

    //Se extrae el total en stock que se tiene de ese producto.
    $sqlLote = ("SELECT SUM(cant), date_Ven FROM Lote WHERE id_Prod1 = $id_Prod");
    $resLote = $db->query($sqlLote);
    $Lote    = $resLote->fetchArray(SQLITE3_ASSOC);

    if (isset($Lote['SUM(cant)'])){
      $CantSumLote  = $Lote['SUM(cant)'];
    } else {
      $CantSumLote = 0;
    }

    //Si el stock es menor a la cantidad critica, se muestra el nombre del producto y la cantidad que queda.
    if($Lote['SUM(cant)'] < $Prod['cant_Rep'] && $Prod['estado'] == 'A'){
      echo "<div id='alrtProd'>";
      echo "<p style='font-size: 16px'><strong>$name_Prod: Quedan $CantSumLote</strong></p>";
      echo "</div>";
    }
  }
  // $dateVen = explode("-", $Lote['date_Ven']);
  // echo $dateVen[0];
  // echo $dateVen[1];
  // echo $dateVen[2];

  //Se cierra la conexion con la base de datos.
  $db->close();
  unset($db);

 ?>
