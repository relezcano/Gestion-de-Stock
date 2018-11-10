<?
session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Cambiar Permisos De Un Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/user_mod.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
    <script src="../js/dropdown.js"></script>
    <script src="../js/home.js"></script>

  </head>
  <body>
      <?
      require 'conexion_abm.php';

      $id = $_SESSION['id'];
      $nombreActual = $_SESSION['name'];

      ?>

    <div class="container" style="margin-top: 250px; width: 650px; background-color: #4d4d4d; border-radius: 100px; padding: 10px; opacity: .9">
      <div class="row">
        <div class="col-md-12">
          <label style="margin-left: 60px; margin-top: 10px"><strong>Usuario Actual: <? echo ' '.$nombreActual;?></strong></label>
        </div>
      </div>
      <br>
      <form class="cambiar_permisos" action="cambiar_permisos.php" method="post">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label><strong>Elija Usuario</strong></label>
          </div>
          <div class="col-md-3" style="font-size: 18px">

            <?
            $query = ("SELECT * FROM Usuarios");
            $result = $db->query($query);

          ?><select name="id">

            <?
            while ($rowID = $result->fetchArray(SQLITE3_ASSOC))
            {
              echo '<option value=" '.$rowID['id_U'].' "> '.$rowID['name'].' </option>';
            }
            ?>
            </select>


          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Admin?</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="text" name="admin" placeholder="1 = SI | 0 = NO">
          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <button class="btn btn-success btn-sm" type="submit" name="cambiar" style="font-size: 13px; margin-left: 313px; margin-bottom: 5px"><strong><span class="glyphicon glyphicon-ok"></span> Cambiar</strong></button>
          </div>
          <div class="col-md-3">
            <button class="btn btn-danger btn-sm" type="button" name="cancelar" style="font-size: 13px; margin-bottom: 5px" onclick="window.close()"><strong><span class="glyphicon glyphicon-remove"></span> Cancelar</strong></button>
          </div>
          <div class="col-md-3"></div>
        </div>
      </form>
    </div>

    <?


    if (isset($_POST['cambiar'])) {
      if (($_POST['id'] == "" || $_POST['admin'] == "")) {
        ?><script>
          alert("Debe ingresar el ID del usuario que desea modificarle los permisos y en el otro campo el valor '1' para que sea Administrador o el valor '0' para que sea Empleado");
        </script><?
      } else {

        $idU = $_POST['id'];
        $admin = $_POST['admin'];

        $sql = ("SELECT * FROM Usuarios WHERE id_U = '$idU'");
        $res = $db->query($sql);
        $row = $res->fetchArray(SQLITE3_ASSOC);

        $name = $row['name'];
        $user = $row['username'];
        $pass = $row['pass'];
        $date = $row['date_Alt'];

        $update = "UPDATE Usuarios SET name = '$name', username = '$user', pass = '$pass', date_Alt = '$date', admin = '$admin' WHERE id_U = '$idU'";
        $db->exec($update);

        ?>
        <script>
          alert("\t  Permisos de Usuario Modificados Correctamente!!!");
          window.opener.document.location="../home.php";
          window.close();
        </script>

      <?}
    }


    ?>

  </body>
  </html>
