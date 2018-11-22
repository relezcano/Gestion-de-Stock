<?php

  require '../db/conexion.php';

  $db = new MyDB("../db");

  //Solo se ejecutara la carga si los datos necesarios fueron ingresados.
  if(isset($_GET['priceTot'])){

    $getId_V      = ("SELECT MAX(id_V) FROM Venta");
    $resMaxId_V   = $db->query($getId_V);
    $maxId_V      = $resMaxId_V->fetchArray(SQLITE3_ASSOC);
    if(isset($maxId_V)){
      $id_V = intval($maxId_V)+1;
    }else{
      $id_V = 0;
    }

    $date_V = $_GET['dateV'];
    $price_Total = floatval($_GET['priceTot']);
    if(isset($_GET['pricePago'])){
      $price_Pago = floatval($_GET['pricePago']);
    } else{
      $price_Pago = 0;
    }
    $obs_V = $_GET['obsV'];
    if(isset($_GET['idC'])){
      $id_C = $_GET['idC'];
    } else {
      $id_C = 0;
    }
    if(isset($_GET['vuelto'])){
      $vuelto = $_GET['vuelto'];
    } else {
      $vuelto = "off";
    }
    $sobrante = floatval($_GET['sobrante']);

    //Se guarda en la base de datos la venta que se realizo.
    $insertProd = ("INSERT INTO Venta VALUES ('$id_V', '$date_V', '$price_Total', '$price_Pago', '$obs_V', '$id_C')");

    $db->exec($insertProd);


    //Si la venta tiene algun tipo de deuda se inserta la deuda en la base de datos.
    if($price_Total-$price_Pago > 0 && $price_Total-$price_Pago < $price_Total){
      $monto = $price_Total-$price_Pago;

      $insertDeudaMix = ("INSERT INTO Deuda (monto, id_V, id_C) VALUES ('$monto', '$id_V', $id_C)");

      $db->exec($insertDeudaMix);

    } else if($price_Pago == 0){

      $insertDeudaTot = ("INSERT INTO Deuda (monto, id_V, id_C) VALUES ('$price_Total', '$id_V', $id_C)");

      $db->exec($insertDeudaTot);
    }


    //Si el checkbox para indicar que el vuelto se usara para saldar deudas esta tildado, se procede a cancelar las deudas cronologicamente.
    if($vuelto == 'on'){

      $getDeudas = ("SELECT * FROM Deuda WHERE id_C = $id_C");

      $Deudas = $db->query($getDeudas);

      //Se hace una iteracion entre las deudas que tenga el cliente.
      while($deudasRow = $Deudas->fetchArray(SQLITE3_ASSOC)){
        $id_D = $deudasRow['id_D'];
        $monto = $deudasRow['monto'];

        //Si la deuda aun no se cancela, se le resta el monto pagado, se actualiza el monto de la deuda y se sale de la iteracion.
        if($monto-$sobrante > 0){
          $newMonto = $monto-$sobrante;
          $sobrante = 0;

          $db->exec("UPDATE Deuda SET monto = $newMonto WHERE id_D = $id_D");
          break;

          //Caso contrario, en el que la deuda se salde, se pone la deuda en 0 y se pasa a la siguiente deuda, asi hasta encontrar una que no este saldada.
        } else if($monto-$sobrante < 0) {

          $db->exec("UPDATE Deuda SET monto = 0 WHERE id_D = $id_D");
          $sobrante = $sobrante-$monto;

        }
      }

      //Si existe algun sobrante del pago, se le avisa al usuario para que le enrtegue al cliente lo que sobra.
      if($sobrante > 0){
        echo "Debe Devolverle al cliente $".$sobrante;
      }
    }

    //Variables que almacenan los productos que se van a descontar del stock y sus cantidades.
    $prods = $_GET['prods'];
    $cants = $_GET['cants'];

    //Se hace una iteracion entre todas las filas del formulario de productos.
    for ($i=0; $i<count($prods); $i++){

      //Se extraen los datos necesarios de los lotes referidos al producto actual.
      $getLote    = ("SELECT * FROM Lote WHERE id_Prod1  = $prods[$i]");
      $prodLotes  = $db->query($getLote);
      $actCant    = $cants[$i];

      //Se hace una iteracion entre los diferentes lotes, restandole a los mismos la cantidad del item que se vendio.
      while($lotesRow = $prodLotes->fetchArray(SQLITE3_ASSOC)){

        $id_L     = $lotesRow['id_L'];
        $cant_L   = $lotesRow['cant'];
        $newCant  = $cant_L-$actCant;

        //Si se consume solo una parte del lote, se actualiza la cantidad de ese lote.
        if($newCant > 0){

          $db->exec("UPDATE Lote SET cant = $newCant WHERE id_L = $id_L");
          break;

        //Caso contrario, en el que se consuma todo un lote, se pone su cantidad en 0 y se pasa al siguiente con el nuevo valor a restar.
        }elseif ($newCant < 0) {

          $db->exec("UPDATE Lote SET cant = '0' WHERE id_L = $id_L");

          $actCant = abs($newCant);

        }
      }
    }

    //Codigo que devuelve el archivo si la carga y sus diferentes procesos fueron exitosos.
    echo "100";

  } else {
    //Codigo de error que se devuelve cuando falta algun dato que no deberia.
    echo "101";
  }
  $db->close();
  unset($db);

 ?>
