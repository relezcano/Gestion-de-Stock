<?php

  if(isset($_GET['nComp'])){

    require '../db/conexion.php';
    $db = new MyDB('../db');

    $n_Comp = $_GET['nComp'];

    $sqlLabel = ("SELECT * FROM Lote WHERE n_Comp = $n_Comp)

  }

 ?>
