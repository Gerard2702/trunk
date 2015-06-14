<?php

  session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

   include_once("conexion.php");   

    switch ($_POST['funcion']) {
	
	case 'verificarArea':
        echo verificarArea();		
	break;
	default:

		{ echo 'parametros incorrectos';}
		break;
}

function verificarArea(){


    /*capturamos los valores que traen las variables*/
    $nombre_colonia = $_POST['colonia_nombre'];    
   
    /*acá verificamos el area al que pertenece la colonia*/
    $sql_id_area = "SELECT id_area from colonia where nombre='$nombre_colonia';";
    $rs = mysql_query($sql_id_area);
    
    $datos_resultado = mysql_fetch_array($rs, MYSQL_ASSOC);

    $area= $datos_resultado['id_area'];

     if($area==1){
        echo "rural";
     }
     else {
        echo "urbana";
     }
    
    
 } //fin de la funcion verificar Area

 ?>