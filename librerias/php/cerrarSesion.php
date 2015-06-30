<?php 

	session_start();
	include_once("conexion.php");

	$usuario=$_SESSION['usuario'];
	mysql_query("DROP TABLE $usuario");

	$_SESSION['usuario'] = array();
	session_destroy();
	header("Location: ../../index.php");


 ?>