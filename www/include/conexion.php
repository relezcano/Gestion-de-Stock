<?php
//Conectar con la base de datos de Vinos.

$dbhost = 'localhost';
$dbuser = 'c1190301_wineDB';
$dbpass = 'dofiZOwu06';
$dbname = 'c1190301_wineDB';

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrio un error al conectarse al servidor mysql');
mysqli_select_db($link, $dbname);

	// $dbhost = 'localhost';
	// $dbuser = 'root';
	// $dbpass = '';
	// $dbname = 'gestionbodega';
	//
	// $link = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrio un error al conectarse al servidor mysql');
	// mysqli_select_db($link, $dbname);

?>
