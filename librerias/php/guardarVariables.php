<?php 
	session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

include_once("conexion.php");

switch ($_POST['funcion']) {
	
	case 'formulario1':
	echo variables_form1();		
	break;
	case 'formulario2':
	echo variables_form2();
	break;
    case 'formulario3':
    echo variables_form3();
    break;
	case 'reiniciarVariable':
	echo reiniciar_variable();
	break;
    case 'registrarPersonas':
    echo registrar_personas();
    break;
    case 'finalizarCenso':
    echo finalizar_censo();
    break;
	default:
    { echo 'parametros incorrectos';}
    break;
}

function variables_form1(){
    

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

function variables_form3(){

    if (isset($_POST['ingresos'])){
        foreach ($_POST['ingresos'] as $valorIngreso) {
         $arraydeIngreso[] = $valorIngreso;   
        }
        
    }

    if (isset($_POST['patrimonio'])){
        foreach ($_POST['patrimonio'] as $valorPatrimonio) {
         $arraydePatrimonio[] = $valorPatrimonio;   
        }
        
    }

    $_SESSION['ingresosEconomicos'] = $arraydeIngreso;
    $_SESSION['patrimonioFamiliar'] = $arraydePatrimonio;
}


function reiniciar_variable(){
	session_start();
	$_SESSION['fecha_censado']=array();
}

function registrar_personas(){
$usuario = $_SESSION['usuario'];
/*Se recuperan las variables por POST del ajax*/
/*Necesita revision*/
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

/*SE RECUPERA EL ID DEPENDIENDO DE LO QUE SELECCIONO*/
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

$sql_id_causa= "SELECT id_causa FROM causa_disca WHERE descripcion='$causa';";
$rscausa=mysql_query($sql_id_causa);
$datos_causa = mysql_fetch_array($rscausa,MYSQL_ASSOC);
$id_causa = $datos_causa['id_causa'];

/*consulta insert*/
$sqlpersonastemporal="INSERT INTO $usuario (nombre,apellido,fecha_nac,genero,id_nacionalidad,id_niveleducativo,id_discapacidad,id_causadisca,id_ocupacion,id_parentesco,id_sitlaboral,id_enfermedad,id_vivienda,id_ingreso,num_familia)values ('$nombres','$apellidos','$fecha_nacimiento','$genero','$id_nacionalidad','$id_niveledu','$id_discapacidad','$id_causa','$id_ocupacion','$id_parentesco','$id_sitlaboral','$id_enfermedad',null,'$id_ingreso',1);";
mysql_query($sqlpersonastemporal);


}


function finalizar_censo(){

    if (!empty($_SESSION['fecha_censado'])){
    $fecha_censo = $_SESSION['fecha_censado'];
    $area = $_SESSION['Area'];
    $nom_colonia = $_SESSION['colonia'];
    $pasaje = $_SESSION['pasaje'];
    $num_vivienda = $_SESSION['num_vivienda'];
    $can_familias = $_SESSION['can_familia'];
    $religion = $_SESSION['religion'];
    $tipo_familia = $_SESSION['tipo_familia'];
    $seguridad = $_SESSION['seguridad'];
    $tenencia = $_SESSION['tenencia'];
    $perros = $_SESSION['perros'];
    $gatos = $_SESSION['gatos'];
    $otros = $_SESSION['otras_mascotas'];
    $observaciones = $_SESSION['observaciones'];
    };
    
    if (!empty($_SESSION['matparedes'])){
    $matparedes=$_SESSION['matparedes'];
    $matpiso= $_SESSION['matpiso'];
    $mattecho =$_SESSION['mattecho'];
    $tipoletrina=$_SESSION['tipoletrina'];
    $manbasura=$_SESSION['manbasura'];
    $abastagua=$_SESSION['abastagua'];
    $aguasgris =$_SESSION['aguasgris'];
    $aguasnegras=$_SESSION['aguasnegras'];
    };



    $sql_id_colonia = "SELECT id_colonia FROM colonia WHERE nombre='$nom_colonia';";
    $rscolonia=mysql_query($sql_id_colonia);
    $datos_colonia = mysql_fetch_array($rscolonia,MYSQL_ASSOC);
    $id_colonia = $datos_colonia['id_colonia'];

    $sql_id_religion = "SELECT id_religion FROM religion WHERE nombre='$religion';";
    $rsreligion=mysql_query($sql_id_religion);
    $datos_religion = mysql_fetch_array($rsreligion,MYSQL_ASSOC);
    $id_religion = $datos_religion['id_religion'];

    $sql_id_tipofamilia = "SELECT id_tipofamilia FROM tipo_familia WHERE nombre='$tipo_familia';";
    $rstipofamilia=mysql_query($sql_id_tipofamilia);
    $datos_tipofamilia = mysql_fetch_array($rstipofamilia,MYSQL_ASSOC);
    $id_tipofamilia = $datos_tipofamilia['id_tipofamilia'];

    $sql_id_seguridad = "SELECT id_seguridad FROM seguridad WHERE nombre='$seguridad';";
    $rsseguridad=mysql_query($sql_id_seguridad);
    $datos_seguridad = mysql_fetch_array($rsseguridad,MYSQL_ASSOC);
    $id_seguridad = $datos_seguridad['id_seguridad'];

    $sql_id_tenencia = "SELECT id_tenencia FROM tenencia_vivienda WHERE nombre='$tenencia';";
    $rstenencia=mysql_query($sql_id_tenencia);
    $datos_tenencia = mysql_fetch_array($rstenencia,MYSQL_ASSOC);
    $id_tenencia = $datos_tenencia['id_tenencia'];

    $sqlvivienda="INSERT INTO vivienda (numero,cant_familia,fecha_ingredatos,direccion,observaciones,id_mattecho,id_matpiso,id_matparedes,id_colonia,id_tipoletrina,id_tenencia,id_aguanegra,id_aguagris,id_abastagua,id_seguridad,id_manejobasura,id_religion,id_tipofamilia)values
     ('$num_vivienda','$can_familias','$fecha_censo','$pasaje','$observaciones','$mattecho','$matpiso','$matparedes',' $id_colonia','$tipoletrina','$id_tenencia','$aguasnegras','$aguasgris','$abastagua','$id_seguridad','$manbasura','$id_religion','$id_tipofamilia');";
    mysql_query($sqlvivienda);

    $id_vivienda=mysql_insert_id();
    $sqlmascotas1="INSERT INTO vivienda_mascota (id_vivienda,id_mascota,cantidad) values ('$id_vivienda',1,'$perros');";
    mysql_query($sqlmascotas1);
    $sqlmascotas2="INSERT INTO vivienda_mascota (id_vivienda,id_mascota,cantidad) values ('$id_vivienda',2,'$gatos');";
    mysql_query($sqlmascotas2);
    $sqlmascotas3="INSERT INTO vivienda_mascota (id_vivienda,id_mascota,cantidad) values ('$id_vivienda',3,'$otros');";
    mysql_query($sqlmascotas3);


    if (isset($_SESSION['vectores'])){
         foreach ($_SESSION['vectores'] as $id_vector) {
        $sqlvectores="INSERT INTO vivienda_vectores (id_vivienda,id_vectores) values ('$id_vivienda','$id_vector');";
        mysql_query($sqlvectores);
    }
      }


    if (isset($_SESSION['vulnerabilidad'])){
         foreach ($_SESSION['vulnerabilidad'] as $id_riesgo) {
        $sqlriesgos="INSERT INTO riesgo_vivienda (id_riesgo,id_vivienda) values ('$id_riesgo','$id_vivienda');";
        mysql_query($sqlriesgos);
    }
      }

    if (isset($_SESSION['otros'])){
        foreach ($_SESSION['otros'] as $id_servicio) {
        $sqlservicio="INSERT INTO vivienda_servibasic (id_vivienda,id_servicio) values ('$id_vivienda','$id_servicio');";
        mysql_query($sqlservicio);
    }
      }

     if (isset($_POST['ingresos'])){
        foreach ($_POST['ingresos'] as $valorIngreso) {
         $sqlingreso="INSERT INTO vivienda_ingreconomico (id_vivienda,id_ingreso) values ('$id_vivienda','$valorIngreso');";
         mysql_query($sqlingreso);   
        }
        
    }

    if (isset($_POST['patrimonio'])){
        foreach ($_POST['patrimonio'] as $valorPatrimonio) {
        $sqlpatrimonio="INSERT INTO vivienda_patrimonio (id_patrimonio,id_vivienda) values ('$valorPatrimonio','$id_vivienda');"; 
        mysql_query($sqlpatrimonio);
        }
        
    }

    $usuario = $_SESSION['usuario'];

    $sqlcnpersonas = "SELECT nombre,apellido,fecha_nac,genero,id_nacionalidad,id_niveleducativo,id_discapacidad,id_causadisca,id_ocupacion,id_parentesco,id_sitlaboral,id_enfermedad,id_ingreso,num_familia FROM  $usuario;";
    $rscnpersonas = mysql_query($sqlcnpersonas);
    $numcnpersonas=mysql_num_rows($rscnpersonas);

    while($modulo1 = mysql_fetch_array($rscnpersonas,MYSQL_ASSOC)){

    $nombreP=$modulo1['nombre'];
    $apellidoP=$modulo1['apellido'];
    $fechaP=$modulo1['fecha_nac'];
    $generoP=$modulo1['genero'];
    $nacionalidadP=$modulo1['id_nacionalidad'];
    $niveleducativoP=$modulo1['id_niveleducativo'];
    $discapacidadP=$modulo1['id_discapacidad'];
    $causadiscaP=$modulo1['id_causadisca'];
    $ocupacionP=$modulo1['id_ocupacion'];
    $parentescoP=$modulo1['id_parentesco'];
    $sitlaboralP=$modulo1['id_sitlaboral'];
    $enfermedadP=$modulo1['id_enfermedad'];
    $ingresoP=$modulo1['id_ingreso'];


    $sqlIngresoPersonas="INSERT INTO persona (nombre,apellido,fecha_nac,genero,id_nacionalidad,id_niveleducativo,id_discapacidad,id_causadisca,id_ocupacion,id_parentesco,id_sitlaboral,id_enfermedad,id_vivienda,id_ingreso,num_familia)values 
    ('$nombreP','$apellidoP','$fechaP','$generoP','$nacionalidadP','$niveleducativoP','$discapacidadP','$causadiscaP','$ocupacionP','$parentescoP','$sitlaboralP','$enfermedadP','$id_vivienda','$ingresoP',1);";
    mysql_query($sqlIngresoPersonas);
    
    }

    mysql_query("DELETE FROM $usuario");

    
    $_SESSION['ultimoid']=$id_vivienda;
    $_SESSION['fecha_censado']=array();
    $_SESSION['matparedes']=array();

    if (isset($_SESSION['vectores'])){
         $_SESSION['vectores']=array();
      }


    if (isset($_SESSION['vulnerabilidad'])){
        $_SESSION['vulnerabilidad']=array();
      }

    if (isset($_SESSION['otros'])){
        $_SESSION['otros']=array();
      }
    
    if (isset($_POST['ingresos'])){
        $_SESSION['ingresos']=array();
    }

    if (isset($_POST['patrimonio'])){
        $_SESSION['patrimonio']=array();
    }



   

}

?>