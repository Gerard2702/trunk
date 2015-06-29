<?php 
	session_start();

include_once("conexion.php");

switch ($_POST['funcion']) {
	
	case 'formulario1':
	echo variables_form1();		
	break;
	case 'formulario2':
	echo variables_form2();
	break;
	case 'reiniciarVariable':
	echo reiniciar_variable();
	break;
    case 'registrarPersonas':
    echo registrar_personas();
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

	/*bloque para recuperar el ultimo id de vivienda ingresado y generar uno nuevo*/
    $sql_ultimo_vivienda = "SELECT id_vivienda FROM vivienda WHERE id_vivienda=(SELECT MAX(id_vivienda) FROM vivienda);";
    $resultado_ultimo_id = mysql_query($sql_ultimo_vivienda); 
    $numvivienda= mysql_num_rows($resultado_ultimo_id);

    if($numvivienda>0){
        
          /*tomamos el ultimo id de vivienda y aumentamos el correlativo*/
          $dato_ultimo_id = mysql_fetch_array($resultado_ultimo_id, MYSQL_ASSOC);
          $dato_ultimovivienda = $dato_ultimo_id['id_vivienda'];
   		  $nuevo_idvivienda = $dato_ultimovivienda + 1; 
   		  $_SESSION['id_vivienda']=$nuevo_idvivienda;
        }else{

            /*en caso de que no exista ningun id_vivienda creado, lo iniciamos*/
        $nuevo_idvivienda = 1;
        $_SESSION['id_vivienda']=$nuevo_idvivienda;
        }

   /*
    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION");


     $colonia=$_POST['colonia'];
     $sql_id_colonia = "SELECT id_colonia FROM colonia WHERE nombre='$colonia';";
     $rscolonia=mysql_query($sql_id_colonia);
     $datos_colonia = mysql_fetch_array($rscolonia,MYSQL_ASSOC);
     $id_colonia = $datos_colonia['id_colonia'];

     $tipofamilia = $_POST['tipo_familia']; 
     $sql_id_tipofamilia = "SELECT id_tipofamilia FROM tipo_familia WHERE nombre='$tipofamilia';";
     $rstipofamilia=mysql_query($sql_id_tipofamilia);
     $datos_tipofamilia = mysql_fetch_array($rstipofamilia,MYSQL_ASSOC);
     $id_tipofamilia = $datos_tipofamilia['id_tipofamilia'];

     $religion=$_POST['religion'];
     $sql_id_religion = "SELECT id_religion FROM religion WHERE nombre='$religion';";
     $rsreligion=mysql_query($sql_id_religion);
     $datos_religion = mysql_fetch_array($rsreligion,MYSQL_ASSOC);
     $id_religion = $datos_religion['id_religion'];

     $tenencia=$_POST['tenencia'];
     $sql_id_tenencia = "SELECT id_tenencia FROM tenencia_vivienda WHERE nombre='$tenencia';";
     $rstenencia=mysql_query($sql_id_tenencia);
     $datos_tenencia = mysql_fetch_array($rstenencia,MYSQL_ASSOC);
     $id_tenencia = $datos_tenencia['id_tenencia'];

     $seguridad=$_POST['seguridad'];
     $sql_id_seguridad = "SELECT id_seguridad FROM seguridad WHERE nombre='$seguridad';";
     $rsseguridad=mysql_query($sql_id_seguridad);
     $datos_seguridad = mysql_fetch_array($rsseguridad,MYSQL_ASSOC);
     $id_seguridad = $datos_seguridad['id_seguridad'];

     $fecha_censado=$_POST['fecha_censado'];
     $pasaje=$_POST['pasaje'];
     $numvivienda=$_POST['num_vivienda'];
     
    $sql="INSERT INTO vivienda (id_vivienda,fecha_ingredatos,id_colonia,direccion,numero,id_tipofamilia,cant_familia,id_religion,id_tenencia,id_seguridad) VALUES 
    ('$nuevo_idvivienda','2015-06-08','$id_colonia','$pasaje','$numvivienda','$id_tipofamilia',1,'$id_religion','$id_tenencia','$id_seguridad');";
    $sqlquery=mysql_query($sql);*/
    

    $_SESSION['vectores']=$arraydeVectores;
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

function variables_form2(){
    

    if (isset($_POST['vulnerabilidad'])){
		foreach ($_POST['vulnerabilidad'] as $valorVulnerabilidad) {
	     $arraydeVulnerabilidad[] = $valorVulnerabilidad;	
	    }
	    
	}

	if (isset($_POST['otros_servicios'])){
		foreach ($_POST['otros_servicios'] as $valorOtros) {
	     $arraydeOtros[] = $valorOtros;	
	    }
	}
	
    $_SESSION['vulnerabilidad']=$arraydeVulnerabilidad;
    $_SESSION['matparedes'] = $_POST['matparedes'];
    $_SESSION['matpiso'] = $_POST['matpiso'];
    $_SESSION['mattecho'] = $_POST['mattecho'];
    $_SESSION['tipoletrina'] = $_POST['tipoletrina'];
    $_SESSION['manbasura'] = $_POST['manbasura'];
    $_SESSION['abastagua'] = $_POST['abastagua'];
    $_SESSION['aguasgris'] = $_POST['aguagris'];
    $_SESSION['aguasnegras'] = $_POST['aguasnegras'];
    $_SESSION['otros']=$arraydeOtros;

}


function reiniciar_variable(){
	session_start();
	$_SESSION['fecha_censado']=array();
}

function registrar_personas(){
    
    $datos= array();
    
}






?>