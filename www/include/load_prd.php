<?php

  require "../db/conexion.php";
  $db = new MyDB('../db');

  if (isset($_GET['idprod'])){

    $id_prod = $_GET['idprod'];
    $n_item = $_GET['nItem'];

    $sql = ("SELECT * FROM Producto WHERE id_Prod = $id_prod");
    $res = $db->query($sql);
    $row = $res->fetchArray(SQLITE3_ASSOC);
    $name_prod = $row['name_Prod'];
    $prod_price = $row['price_V'];

    if($_GET['solicitante'] == "'ventas'"){
      echo "<td style='width: 70px' id='numOfRow'>$n_item</td>";
      echo "<td style='width: 300px'> <input type='hidden' name='id_product$n_item' value='' id='$n_item'> <span id='Prod_name' onclick='popUpWin(this);' >$name_prod</span> </td>";
      echo "<td>$<span id='itemPrice'>$prod_price</span></td>";
      echo "<td style='width: 100px'> <input type='text' name='cant_product' id='invis_input' onkeyup='setTotalPrice(this);'></td>";
      echo "<td>$<span id='total_price'>-</span></td>";
      echo "<td style='width: 50px'><button type='button' name='deleteRow' class='btn btn-danger' style='border-radius: 5px; width: 40px; height: 20px'><span class='glyphicon glyphicon-minus' style='float: inherit' onclick='deleteProd(this);'></span></button></td>";
      echo "<input type='hidden' name='id_prod' value='$id_prod'>";
    } elseif ($_GET['solicitante'] == "'ingresos'") {
      echo "<td style='width: 70px' id='numOfRow'>$n_item</td>";
      echo "<td style='width: 300px'> <input type='hidden' name='id_product$n_item' value='' id='$n_item'> <span id='Prod_name' onclick='popUpWin(this);' >$name_prod</span> </td>";
      echo "<td> <span>$</span> <input type='text' style='width: 50px' name='price_C_prod' id='invis_input'> </td>";
      echo "<td style='width: 100px'> <input type='text' name='cant_product' id='invis_input'> </td>";
      echo "<td> <input type='text' name='date_Ven_prod' id='invis_input'> </td>";
      echo "<td style='width: 50px'><button type='button' name='deleteRow' class='btn btn-danger' style='border-radius: 5px; width: 40px; height: 20px'><span class='glyphicon glyphicon-minus' style='float: inherit' onclick='deleteProd(this);'></span></button></td>";
      echo "<input type='hidden' name='id_prod' value='$id_prod'>";
    }

  }
  $db->close();
  unset($db);

?>
