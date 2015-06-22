<?php 
	session_start();

include_once("conexion.php");

switch ($_POST['funcion']) {
	
	case 'formulario1':
	echo variables_form1();		
	break;
	case 'reiniciarVariable':
	echo reiniciar_variable();
	break;
	default:
    { echo 'parametros incorrectos';}
    break;
}

function variables_form1(){
    session_start();
    $_SESSION['fecha_censado'] = $_POST['fecha_censado'];
	$_SESSION['departamento'] = $_POST['departamento'];
	$_SESSION['municipio'] = $_POST['municipio'];
	$_SESSION['colonia'] = $_POST['colonia'];
	$_SESSION['pasaje'] = $_POST['pasaje'];
	$_SESSION['num_vivienda'] = $_POST['num_vivienda'] ;
	$_SESSION['Area'] = $_POST['Areaa'];
	$_SESSION['tipo_familia'] = $_POST['tipo_familia'] ;
	$_SESSION['can_familia'] = $_POST['cantidad_familia'];
	$_SESSION['religion'] = $_POST['religion'];
	$_SESSION['tenencia'] = $_POST['tenencia'];
	$_SESSION['seguridad'] = $_POST['seguridad'];
	$_SESSION['perros'] = $_POST['perros'];
	$_SESSION['gatos'] = $_POST['gatos'];
	$_SESSION['otras_mascotas'] = $_POST['otras_mascotas'] ;
	$_SESSION['observaciones'] = $_POST['observaciones'];

}

function reiniciar_variable(){
	session_start();
	$_SESSION['fecha_censado']=array();
}


?>