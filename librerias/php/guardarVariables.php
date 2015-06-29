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
    //$sqlquery=mysql_query($sql);
    

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



/*if (isset($_SESSION['cantidad'])){
         
$cantidadReg=count($_SESSION['cantidad']);


if($cantidadReg>0){
    $d=$cantidadReg+1;
}
      }
else {
$d=0;
}

$nombres=$_POST['nombres']; 
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$genero=$_POST['genero'];
$nacionalidad=$_POST['nacionalidad'];
$parentesco=$_POST['parentesco'];
$numfamilia=$_POST['numfamilia'];
$niveleducativo=$_POST['niveleducativo'];
$ocupacion=$_POST['ocupacion'];
$sitlaboral=$_POST['sitlaboral'];
$ingreso=$_POST['ingreso'];
$discapacidad=$_POST['discapacidad'];
$causa=$_POST['causa'];
$enfermedad=$_POST['enfermedad'];

$datosPerosanles[$d]= array("nombre" =>$nombres,"apellido" =>$apellidos,"fecha_nacimiento" =>$fecha_nacimiento,"genero" =>$genero,"nacionalidad" =>$nacionalidad,"parentesco" =>$parentesco,"numfamilia" =>$numfamilia,"niveleducativo" =>$niveleducativo,"ocupacion" =>$ocupacion,"sitlaboral" =>$sitlaboral,"ingreso" =>$ingreso,"discapacidad" =>$discapacidad,"causa" =>$causa,"enfermedad" =>$enfermedad);
$_SESSION['cantidad']= $datosPerosanles;*/
mysql_query("CREATE TEMPORARY TABLE temporal_personas like persona");


$nombres=$_POST['nombres']; 
$apellidos=$_POST['apellidos'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$genero=$_POST['genero'];
$nacionalidad=$_POST['nacionalidad'];
$parentesco=$_POST['parentesco'];
$numfamilia=$_POST['numfamilia'];
$niveleducativo=$_POST['niveleducativo'];
$ocupacion=$_POST['ocupacion'];
$sitlaboral=$_POST['sitlaboral'];
$ingreso=$_POST['ingreso'];
$discapacidad=$_POST['discapacidad'];
$causa=$_POST['causa'];
$enfermedad=$_POST['enfermedad'];


$sql_id_nacionalidad = "SELECT id_nacionalidad FROM nacionalidad WHERE nombre='$nacionalidad';";
$rsnacionalidad=mysql_query($sql_id_nacionalidad);
$datos_nacionalidad = mysql_fetch_array($rsnacionalidad,MYSQL_ASSOC);
$id_nacionalidad = $datos_nacionalidad['id_nacionalidad'];

$sql_id_niveledu = "SELECT id_niveleducativo FROM nivel_educativo WHERE nombre='$niveleducativo';";
$rsniveleducativo=mysql_query($sql_id_niveledu);
$datos_niveledu = mysql_fetch_array($rsniveleducativo,MYSQL_ASSOC);
$id_niveledu = $datos_niveledu['id_niveleducativo'];

$sql_id_discapacidad = "SELECT id_disca FROM discapacidad WHERE nombre='$discapacidad';";
$rsdiscapacidad=mysql_query($sql_id_discapacidad);
$datos_discapacidad = mysql_fetch_array($rsdiscapacidad,MYSQL_ASSOC);
$id_discapacidad = $datos_discapacidad['id_disca'];

$sql_id_ocupacion= "SELECT id_ocupacion FROM ocupacion WHERE nombre='$ocupacion';";
$rsocupacion=mysql_query($sql_id_ocupacion);
$datos_ocupacion = mysql_fetch_array($rsocupacion,MYSQL_ASSOC);
$id_ocupacion = $datos_ocupacion['id_ocupacion'];

$sql_id_parentesco= "SELECT id_parentesco FROM parentesco WHERE nombre='$parentesco';";
$rsparentesco=mysql_query($sql_id_parentesco);
$datos_parentesco = mysql_fetch_array($rsparentesco,MYSQL_ASSOC);
$id_parentesco = $datos_parentesco['id_parentesco'];

$sql_id_sitlaboral= "SELECT id_sitlaboral FROM situacion_laboral WHERE nombre='$sitlaboral';";
$rssitlaboral=mysql_query($sql_id_sitlaboral);
$datos_sitlaboral = mysql_fetch_array($rssitlaboral,MYSQL_ASSOC);
$id_sitlaboral = $datos_sitlaboral['id_sitlaboral'];

$sql_id_enfermedad= "SELECT id_enfermedad FROM enfermedad WHERE nombre='$enfermedad';";
$rsenfermedad=mysql_query($sql_id_enfermedad);
$datos_enfermedad = mysql_fetch_array($rsenfermedad,MYSQL_ASSOC);
$id_enfermedad = $datos_enfermedad['id_enfermedad'];

$sql_id_ingreso= "SELECT id_ingreso FROM ingreso_economico WHERE nombre='$ingreso';";
$rsingreso=mysql_query($sql_id_ingreso);
$datos_ingreso = mysql_fetch_array($rsingreso,MYSQL_ASSOC);
$id_ingreso = $datos_ingreso['id_ingreso'];


$sqlpersonas="INSERT INTO temporal_personas values (2,'$nombres','$apellidos','2015-01-02','$genero','$id_nacionalidad','$id_niveledu','$id_discapacidad','$id_ocupacion','$id_parentesco','$id_sitlaboral','$id_enfermedad',null,'$id_ingreso',1);";
mysql_query($sqlpersonas);


}

?>