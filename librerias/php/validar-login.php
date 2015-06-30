<?php

include_once("conexion.php");

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
         
        mysql_query("CREATE TABLE `$usuario` (
  `id_persona` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `fecha_nac` DATE NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `id_nacionalidad` INT(11) NOT NULL,
  `id_niveleducativo` INT(11) NOT NULL,
  `id_tipodisca` INT(11) NOT NULL,
  `id_ocupacion` INT(11) NOT NULL,
  `id_parentesco` INT(11) NOT NULL,
  `id_sitlaboral` INT(11) NOT NULL,
  `id_enfermedad` INT(11) NOT NULL,
  `id_vivienda` INT(11) NULL DEFAULT NULL,
  `id_ingreso` INT(11) NOT NULL,
  `num_familia` INT(11) NOT NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `fk_persona_Nacionalidad1_idx1` (`id_nacionalidad`),
  INDEX `fk_persona_nivel_educativo1_idx1` (`id_niveleducativo`),
  INDEX `fk_persona_tipo_discapacidad1_idx1` (`id_tipodisca`),
  INDEX `fk_persona_ocupacion1_idx1` (`id_ocupacion`),
  INDEX `fk_persona_parentesco1_idx1` (`id_parentesco`),
  INDEX `fk_persona_situacion_laboral1_idx1` (`id_sitlaboral`),
  INDEX `fk_persona_enfermedad1_idx1` (`id_enfermedad`),
  INDEX `fk_persona_vivienda1_idx1` (`id_vivienda`),
  INDEX `fk_persona_ingreso_economico1_idx1` (`id_ingreso`),
  CONSTRAINT `fk_persona_Nacionalidad11` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_enfermedad11` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_ingreso_economico11` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_economico` (`id_ingreso`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_nivel_educativo11` FOREIGN KEY (`id_niveleducativo`) REFERENCES `nivel_educativo` (`id_niveleducativo`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_ocupacion11` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_parentesco11` FOREIGN KEY (`id_parentesco`) REFERENCES `parentesco` (`id_parentesco`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_situacion_laboral11` FOREIGN KEY (`id_sitlaboral`) REFERENCES `situacion_laboral` (`id_sitlaboral`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_tipo_discapacidad11` FOREIGN KEY (`id_tipodisca`) REFERENCES `tipo_discapacidad` (`id_tipodisca`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_vivienda11` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;");


        echo "true";        
        
     }    
     else{
        echo "false";
     }



    
?>