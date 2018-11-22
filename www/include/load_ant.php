<?php

  require "../db/conexion.php";
  $db = new MyDB('../db');

  if (isset($_GET['id'])){

    $id_Ant   = $_GET['id'];
    if(isset($_GET['idProv'])){
      $id_Prov  = $_GET['idProv'];
    }else{
      $id_Prov = "";
    }

    $sql = ("SELECT Ant_Prov.*, name_Prov FROM Ant_Prov INNER JOIN Proveedor ON Ant_Prov.id_Prov2 = Proveedor.id_Prov WHERE id_Ant = $id_Ant");
    $res = $db->query($sql);
    $row = $res->fetchArray(SQLITE3_ASSOC);

    if($row != null){

      if($row['id_Prov2'] == $id_Prov){
        $monto = $row['monto'];
        $name_Prov = $row['name_Prov'];
        echo "<h4><strong>Pedido N° $id_Ant</strong></h4> <strong>$name_Prov</strong> <p><strong>Valor: $$monto</strong></p>";
        echo "<input type='hidden' name='id_Ant' value='$id_Ant'>";

      }else{
        echo "102";
      }

    }else{
      echo "101";
    }
  }
  $db->close();
  unset($db);

?>
