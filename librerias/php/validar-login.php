<?php

include_once("../php/conexion.php");

$usuario = mysql_real_escape_string($_POST['usuario']);
$contraseña = mysql_real_escape_string(md5($_POST['contraseña']));


/*con la siguiente sentencia sql verificamos que exista el usuario que pretende ingresar al sistema*/
$sql = "SELECT id_rol,nombre_usuario,pass from usuarios where nombre_usuario='$usuario' and pass='$contraseña';" or die(mysql_error());

$resultado = mysql_query($sql) or die(mysql_error());
$filas = mysql_num_rows($resultado);

    if($filas > 0){

    	$datos_usuario = mysql_fetch_array($resultado, MYSQL_ASSOC);
        /*aqui creamos variables de sesion*/
        session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo_rol'] = $datos_usuario['id_rol'];        
        echo "true";        
        
     }    
     else{
        echo "false";
     }

    
?>