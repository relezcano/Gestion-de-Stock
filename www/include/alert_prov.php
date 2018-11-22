<?php
  //Se hace la conexion con la base de datos.
  require '../db/conexion.php';
  $db = new MyDB('../db');

  //Se seleccionan todos los anticipos existentes junto con el nombre del proveedor del anticipo.
  $sqlAnt = ("SELECT Ant_Prov.*, Proveedor.name_Prov FROM Ant_Prov INNER JOIN Proveedor ON Ant_Prov.id_Prov2 = Proveedor.id_Prov ORDER BY id_Ant ASC");
  $resAnt = $db->query($sqlAnt);

  //Se seleccionan todos los Proveedores de la base de datos para fijarse la ultima vez que pasaron.
  $sqlProv = ("SELECT * FROM Proveedor");
  $resProv = $db->query($sqlProv);

  //Se traen los parametros del dia de ayer y el de mañana.
  $yesterday = $_GET['yesterday'];
  $tomorrow = $_GET['tomorrow'];

  //Se agrega el titulo para que no desaparesca.
  echo "<div id='intDashboard'>";
  echo "<h3><strong>Proveedores</strong></h3>";
  echo "</div>";

  //Se hace una iteracion por todos los anticipos que existen.
  while ($Ant = $resAnt->fetchArray(SQLITE3_ASSOC)){

    //Se extraen las variables necesarias.
    $name_Prov = $Ant['name_Prov'];
    $monto = $Ant['monto'];
    $id_Ant = $Ant['id_Ant'];

    //Si el proveedor llega mañana se le avisa al usuario la cantidad de plata que debe guardar y el nombre del proveedor que va a venir.
    if($Ant['date_Lleg'] == $tomorrow){
      echo "<div id='alrtProv'>";
      echo "<p>Mañana viene $name_Prov</p>";
      echo "<p>Se le debe entregar $$monto";
      echo "</div>";
    } //Si el proveedor deberia haber llegado ayer se le da la opcion al usuario de cambiar la fecha del anticipo.
    elseif ($Ant['date_Lleg'] == $yesterday) {
      echo "<div id='alrtProv' onClick='popUpModAnt(this)'>";
      echo "<p>Ayer debio haber pasado $name_Prov ¿Paso?</p>";
      echo "<p>¿Quiere modificar la fecha? Haga click aqui.</p>";
      echo "<input type='hidden' name='id_Ant' value='$id_Ant'>";
      echo "</div>";
    }

  }

  while ($Prov = $resProv->fetchArray(SQLITE3_ASSOC)){

    $id_Prov = $Prov['id_Prov'];
    $conc = $Prov['conc'];

    $sqlUltAnt = ("SELECT MAX(id_Ant), date_Lleg FROM Ant_Prov WHERE id_Prov2 = $id_Prov");
    $resUltAnt = $db->query($sqlUltAnt);
    $UltAnt = $resUltAnt->fetchArray(SQLITE3_ASSOC);

    //HAY QUE AGREGAR QUE, SI PASO MAS TIEMPO DEL QUE SUELE TARDAR EL PROVEEDOR EN PASAR, AVISE AL USUARIO Y LE MUESTRE EL TELEFONO.
    //Y SU NO PASO MAS TIEMPO Y SE ACERCA EL TIEMPO EN QUE VA A PASAR OFRECERLE UN LISTADO DE MATERIALES QUE PUEDE PEDIRLE CUANDO VENGA.

  }

  $db->close();
  unset($db);

 ?>
