
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Cambiar Nombre</title>
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

      ?>

    <div class="container" style="margin-top: 150px; width: 650px; background-color: #4d4d4d; border-radius: 100px; padding: 10px; opacity: .9">
      <div class="row">
        <div class="col-md-12">
          <label style="margin-left: 60px; margin-top: 10px"><strong>Crear Nuevo Usuario</strong></label>
        </div>
      </div>
      <br>
      <form class="nuevo_user" action="nuevo_user.php" method="post">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Nombre</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="text" name="nombre" placeholder="Escriba aquí el nombre...">
          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Usuario</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="text" name="user" placeholder="Escriba aquí el usuario...">
          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Contraseña</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="text" name="pass" placeholder="Escriba aquí la contraseña...">
          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Fecha Ingreso</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="date" name="date">
          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <label style="padding-top: 5px"><strong>Admin</strong></label>
          </div>
          <div class="col-md-3">
            <input class="form-control" style="width: 238px; font-weight: bolder" type="text" name="admin" placeholder="1 = SI | 0 = NO">
          </div>
          <div class="col-md-3"></div>
        </div>

        <br>

        <div class="row">

          <div class="col-md-6">
            <button class="btn btn-success btn-sm" type="submit" name="guardar" style="font-size: 13px; margin-left: 213px; margin-bottom: 5px" onclick="return confirm('¿Esta seguro/a que desea crear este nuevo usuario?')"><strong><span class="glyphicon glyphicon-ok"></span> Guardar</strong></button>
          </div>

          <div class="col-md-6">
            <button class="btn btn-danger btn-sm" type="button" name="cancelar" style="font-size: 13px; margin-bottom: 5px" onclick="window.close()"><strong><span class="glyphicon glyphicon-remove"></span> Cancelar</strong></button>
          </div>
        </div>
      </form>
    </div>

    <?


    if (isset($_POST['guardar'])) {
      if ($_POST['nombre'] == "" || $_POST['user'] == "" || $_POST['pass'] == "" || $_POST['date'] == "" || $_POST['admin'] == "") {
        ?>
        <script>
          alert("Debe completar todos los campos para poder realizar el alta del usuario!");
        </script>
        <?
      } else {

        $nombre = $_POST['nombre'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $date = $_POST['date'];
        $admin = $_POST['admin'];

        $fecha = date_format(date_create_from_format('Y/m/d', $date), 'd-m-Y');

        $query = "INSERT INTO Usuarios (name, username, pass, date_Alt, admin) VALUES ('$nombre', '$user', '$pass', '$fecha', '$admin')";

  			$db->exec($query);

        ?>
        <script>
          alert("\t    Usuario Guardado Correctamente!!!");
          window.opener.document.location="../home.php";
          window.close();
        </script>

      <?}
      }


    ?>

  </body>
  </html>
