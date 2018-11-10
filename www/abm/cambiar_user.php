<?
session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Cambiar Usuario</title>
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
      $sqlNombre = ("SELECT * FROM Usuarios WHERE id_U = '$id'");
      $ret = $db->query($sqlNombre);
      $row1 = $ret->fetchArray(SQLITE3_ASSOC);

      $userMostrado = $row1['username'];
      ?>

    <div class="container" style="margin-top: 280px; width: 650px; background-color: #4d4d4d; border-radius: 100px; padding: 10px; opacity: .9">
      <div class="row">
        <div class="col-md-12">
          <label style="margin-left: 60px; margin-top: 10px"><strong>Usuario Actual: <? echo $userMostrado;?></strong></label>
        </div>
      </div>
      <br>
      <form class="cambiar_user" action="cambiar_user.php" method="post">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Nuevo Usuario</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="text" name="user" placeholder="Escriba aquí el nuevo usuario...">
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
      if (isset($_POST['user'])) {


        $user = $_POST['user'];

        $sql = ("SELECT * FROM Usuarios WHERE id_U = '$id'");
        $res = $db->query($sql);
        $row = $res->fetchArray(SQLITE3_ASSOC);

        $name = $row['name'];
        $pass = $row['pass'];
        $date = $row['date_Alt'];
        $admin = $row['admin'];

        $update = "UPDATE Usuarios SET name = '$name', username = '$user', pass = '$pass', date_Alt = '$date', admin = '$admin' WHERE id_U = '$id'";
        $db->exec($update);

        ?>
        <script>
          alert("\t    Usuario Modificado Correctamente!!!");
          window.opener.document.location="../home.php";
          window.close();
        </script>

      <?}
    }

    ?>

  </body>
  </html>
