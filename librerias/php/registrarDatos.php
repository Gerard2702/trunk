<?php 
	include_once('conexion.php');
	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];

	$sql = "INSERT INTO personas VALUES ('$nombre', '$apellido');";
	$res = mysql_query($sql);
	
	if (mysql_affected_rows()>0)
		echo "true";
	else
		echo "false";	

?>