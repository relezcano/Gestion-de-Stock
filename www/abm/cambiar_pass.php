<?
session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Cambiar Contraseña</title>
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
    <div class="container" style="margin-top: 200px; width: 650px; background-color: #4d4d4d; border-radius: 100px; padding: 10px; opacity: .9">
      <form class="cambiar_pass" action="cambiar_pass.php" method="post" style="margin-top: 20px">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <label style="margin-left: 20px"><strong>Escriba Su Contraseña</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder; margin-top: 5px" type="password" name="passOld" placeholder="Escriba su actual contraseña...">
          </div>
          <div class="col-md-3"></div>
        </div>

        <div class="row" style="margin-top: 10px">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <label style="margin-left: 20px; margin-top: 5px"><strong>Nueva Contraseña</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="password" name="pass" placeholder="Escriba la nueva contraseña...">
          </div>
          <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <label style="margin-left: 20px"><strong>Repita Nueva Contraseña</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder; margin-top: 5px" type="password" name="rePass" placeholder="Repita la nueva contraseña...">
          </div>
          <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <button class="btn btn-success btn-sm" type="submit" name="cambiar" style="font-size: 13px; margin-left: 313px; margin-bottom: 5px" onclick="return confirm('¿Esta seguro/a que desea modificar su contraseña?')"><strong><span class="glyphicon glyphicon-ok"></span> Cambiar</strong></button>
          </div>
          <div class="col-md-3">
            <button class="btn btn-danger btn-sm" type="button" name="cancelar" style="font-size: 13px; margin-bottom: 5px" onclick="window.close()"><strong><span class="glyphicon glyphicon-remove"></span> Cancelar</strong></button>
          </div>
          <div class="col-md-3"></div>
        </div>
      </form>
    </div>

    <?

    require '../db/conexion.php';
    $db = new MyDB('../db');

    $id = $_SESSION['id'];
    $sqlPass = ("SELECT * FROM Usuarios WHERE id_U = '$id'");
    $ret = $db->query($sqlPass);
    $rowPass = $ret->fetchArray(SQLITE3_ASSOC);

    $passCheck = $rowPass['pass'];


    // cambiar password

    if (isset($_POST['cambiar'])) {
      if ($_POST['pass'] != "" && $_POST['passOld'] != "" && $_POST['rePass'] != "") {

        $pass = $_POST['pass'];
        $passOld = $_POST['passOld'];
        $rePass = $_POST['rePass'];

        if ($passOld == $passCheck) {
          if ($pass == $rePass) {

            $sql = ("SELECT * FROM Usuarios WHERE id_U = '$id'");
            $res = $db->query($sql);
            $row = $res->fetchArray(SQLITE3_ASSOC);

            $user = $row['username'];
            $name = $row['name'];
            $date = $row['date_Alt'];
            $admin = $row['admin'];

            $update = "UPDATE Usuarios SET name = '$name', username = '$user', pass = '$pass', date_Alt = '$date', admin = '$admin' WHERE id_U = '$id'";
            $db->exec($update);
            ?>
            <script>
              alert("\t    Contraseña Modificada Correctamente!!!");
              window.opener.document.location="../home.php";
              window.close();
            </script>

          <?
        } else {
          ?><script>
            alert("La nueva contraseña y la repetición no coinciden... Por favor intentelo nuevamente");
          </script><?
        }
      } else {
        ?><script>
          alert("Su contraseña actual ingresada no coincide con la registrada... Por favor intentelo nuevamente.");
        </script><?
      }
    } else {
      ?><script>
        alert('Debe completar todos los campos para poder modificar su contraseña');
        </script><?
    }
  }


?>

  </body>
  </html>
