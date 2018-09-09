<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['ingresoAdmin']);

header('Location: ../index.php?alt=6');
 ?>
