<?php 
	session_start();

include_once("conexion.php");

switch ($_POST['funcion']) {
	
	case 'formulario1':
	echo variables_form1();		
	break;
	case 'formulario3':
	echo variables_form3();		
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
    if (isset($_POST['vectores'])){
		foreach ($_POST['vectores'] as $valor) {
	     $arraydeVectores[] = $valor;	
	    }
	}
	
    $_SESSION['vectores']=$arraydeVectores;
    $_SESSION['fecha_censado'] = $_POST['fecha_censado'];
	$_SESSION['departamento'] = $_POST['departamento'];
	$_SESSION['municipio'] = $_POST['municipio'];
	$_SESSION['colonia'] = $_POST['colonia'];
	$_SESSION['pasaje'] = $_POST['pasaje'];
	$_SESSION['num_vivienda'] = $_POST['num_vivienda'] ;
	$_SESSION['Area'] = $_POST['Area'];
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



function variables_form3(){
    session_start();
    $_SESSION['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
	$_SESSION['nombres'] = $_POST['nombres'];
	$_SESSION['apellidos'] = $_POST['apellidos'];
	$_SESSION['genero'] = $_POST['genero'];
	$_SESSION['nacionalidad'] = $_POST['nacionalidad'];
	$_SESSION['parentesco'] = $_POST['parentesco'] ;
	$_SESSION['numfamilia'] = $_POST['numfamilia'];
	$_SESSION['niveleducativo'] = $_POST['niveleducativo'] ;
	$_SESSION['can_familia'] = $_POST['cantidad_familia'];
	$_SESSION['ocupacion'] = $_POST['ocupacion'];
	$_SESSION['sitlaboral'] = $_POST['sitlaboral'];
	$_SESSION['ingreso'] = $_POST['ingreso'];
	$_SESSION['discapacidad'] = $_POST['discapacidad'];
	$_SESSION['causa'] = $_POST['causa'];
	$_SESSION['enfermedad'] = $_POST['enfermedad'] ;
	}

?>