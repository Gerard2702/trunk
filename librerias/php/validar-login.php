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
    
    mysql_query("DROP TABLE $usuario");

        mysql_query("CREATE TABLE `$usuario` (
  `id_$usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `fecha_nac` DATE NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `id_nacionalidad` INT(11) NOT NULL,
  `id_niveleducativo` INT(11) NOT NULL,
  `id_discapacidad` INT(11) NOT NULL,
  `id_causadisca` INT(11) NOT NULL,
  `id_ocupacion` INT(11) NOT NULL,
  `id_parentesco` INT(11) NOT NULL,
  `id_sitlaboral` INT(11) NOT NULL,
  `id_enfermedad` INT(11) NOT NULL,
  `id_vivienda` INT(11) NULL DEFAULT NULL,
  `id_ingreso` INT(11) NOT NULL,
  `num_familia` INT(11) NOT NULL,
  PRIMARY KEY (`id_$usuario`),
  INDEX `fk_persona_Nacionalidad1_idx$usuario` (`id_nacionalidad`),
  INDEX `fk_persona_nivel_educativo1_idx$usuario` (`id_niveleducativo`),
  INDEX `fk_persona_tipo_discapacidad1_idx$usuario` (`id_discapacidad`),
  INDEX `fk_persona_ocupacion1_idx$usuario` (`id_ocupacion`),
  INDEX `fk_persona_parentesco1_idx$usuario` (`id_parentesco`),
  INDEX `fk_persona_situacion_laboral1_idx$usuario` (`id_sitlaboral`),
  INDEX `fk_persona_enfermedad1_idx$usuario` (`id_enfermedad`),
  INDEX `fk_persona_vivienda1_idx$usuario` (`id_vivienda`),
  INDEX `fk_persona_ingreso_economico1_idx$usuario` (`id_ingreso`),
  INDEX `fk_persona_causa_discapacidad1$usuario` (`id_causadisca`),
  CONSTRAINT `fk_persona_Nacionalidad1$usuario` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_causa_discapacidad1$usuario` FOREIGN KEY (`id_causadisca`) REFERENCES `causa_disca` (`id_causa`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_enfermedad1$usuario` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_ingreso_economico1$usuario` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_economico` (`id_ingreso`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_nivel_educativo1$usuario` FOREIGN KEY (`id_niveleducativo`) REFERENCES `nivel_educativo` (`id_niveleducativo`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_ocupacion1$usuario` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_parentesco1$usuario` FOREIGN KEY (`id_parentesco`) REFERENCES `parentesco` (`id_parentesco`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_situacion_laboral1$usuario` FOREIGN KEY (`id_sitlaboral`) REFERENCES `situacion_laboral` (`id_sitlaboral`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_tipo_discapacidad1$usuario` FOREIGN KEY (`id_discapacidad`) REFERENCES `discapacidad` (`id_disca`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_vivienda1$usuario` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;");
        echo "true";        
        
     }    
     else{
        echo "false";
     }



    
?>