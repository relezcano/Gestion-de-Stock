<?php

  include '../db/conexion.php';
  $db = new MyDB('../db');

  if(isset($_GET['idProv']) && isset($_GET['monto']) && isset($_GET['datePed']) && isset($_GET['dateLleg'])){

    $id_Prov2   = $_GET['idProv'];
    $monto      = $_GET['monto'];
    $date_Ped   = $_GET['datePed'];
    $date_Lleg  = $_GET['dateLleg'];
    $obs_Ant    = $_GET['obsAnt'];

    $insertAnt = ("INSERT INTO Ant_Prov(monto, date_Ped, date_Lleg, obs_Ant, id_Prov2 ) VALUES ('$monto', '$date_Ped', '$date_Lleg', '$obs_Ant', '$id_Prov2')");
    $db->exec($insertAnt);

    echo "100";

  } else {
    echo "101";
  }

 ?>
