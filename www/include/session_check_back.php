<?php
session_start();

require 'conexion.php';

$emailAdmin = $_POST['emailAdmin'];
$passAdmin = $_POST['passAdmin'];

$result = mysqli_query($link, "SELECT * FROM users WHERE email= '$emailAdmin'");
$data_user = $result->fetch_array(MYSQLI_ASSOC);

if($data_user['email'] == $emailAdmin){
  if($data_user['pass'] == $passAdmin){
    if($data_user['admin'] == 1){
      //Ingreso exitoso
      $_SESSION['winery'] = $data_user['winery'];
      $_SESSION['id'] = $data_user['id'];
      $_SESSION['login'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $data_user['phone'];
      $_SESSION['name'] = $data_user['name'];
      $_SESSION['ingresoAdmin'] = true;
      $_SESSION['admin'] = $data_user['admin'];

      header('Location: ../inicio.php');
    } else {
      //Su cuenta de usuario no tiene permisos para ingresar aquí
      header('Location: ../index.php?alt=3');
    }
  } else {
    //La contraseña ingresada es incorrecta
    header('Location: ../index.php?alt=2');
  }
} else {
  //No existe cuenta asociada a esta cuenta de Email
  header('Location: ../index.php?alt=1');
}

?>
