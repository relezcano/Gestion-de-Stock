<?php

  require '../db/conexion.php';
  $db = new MyDB('../db');

  if(isset($_GET['query'])){

    $insertLote = $_GET['query'];

    $db->exec($insertLote);

    echo "100";

    $db->close();
    unset($db);

  } else {
    echo "101";
    $db->close();
    unset($db);
  }

 ?>
