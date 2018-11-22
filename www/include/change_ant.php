<?php


  if(isset($_GET['idAnt'])){

    require '../db/conexion.php';
    $db = new MyDB('../db');

    $id_Ant = $_GET['idAnt'];

    $changeAnt = ("UPDATE Ant_Prov SET estado = 'R' WHERE id_Ant = '$id_Ant'");
    $db->exec($changeAnt);

    $db->close();
    unset($db);
  }

 ?>
