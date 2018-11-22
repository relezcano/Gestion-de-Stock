<?php

  if(isset($_GET['query'])){

    require '../db/conexion.php';
    $db = new MyDB('../db');

    $insertLote = $_GET['query'];

    $db->exec($insertLote);

    echo "100";

    $db->close();
    unset($db);

  } else {
    echo "101"; 
  }

 ?>
