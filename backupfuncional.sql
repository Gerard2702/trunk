-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla censo_nc.abast_agua
CREATE TABLE IF NOT EXISTS `abast_agua` (
  `id_abastagua` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_abastagua`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.abast_agua: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `abast_agua` DISABLE KEYS */;
INSERT INTO `abast_agua` (`id_abastagua`, `nombre`) VALUES
	(1, 'Cañeria Intradomiciliar'),
	(2, 'Agua Lluvia'),
	(3, 'Cantarera'),
	(4, 'Pipa'),
	(5, 'Rio'),
	(6, 'Pozo Propio'),
	(7, 'Otros');
/*!40000 ALTER TABLE `abast_agua` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.agua_gris
CREATE TABLE IF NOT EXISTS `agua_gris` (
  `id_aguagris` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aguagris`),
  UNIQUE KEY `id_aguagris_UNIQUE` (`id_aguagris`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.agua_gris: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `agua_gris` DISABLE KEYS */;
INSERT INTO `agua_gris` (`id_aguagris`, `nombre`) VALUES
	(1, 'Eliminacion por Alcantarillado'),
	(2, 'Sistema de Pozo Resumidero'),
	(3, 'Cielo Abierto'),
	(4, 'A la Calle'),
	(5, 'Rios'),
	(6, 'Otros');
/*!40000 ALTER TABLE `agua_gris` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.agua_negra
CREATE TABLE IF NOT EXISTS `agua_negra` (
  `id_aguanegra` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aguanegra`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.agua_negra: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `agua_negra` DISABLE KEYS */;
INSERT INTO `agua_negra` (`id_aguanegra`, `nombre`) VALUES
	(1, 'Alcantarillado por Pozo Resumidero'),
	(2, 'Eliminacion sin Tratamiento'),
	(3, 'Otros'),
	(4, 'No Aplica');
/*!40000 ALTER TABLE `agua_negra` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.area
CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_area`),
  UNIQUE KEY `id_area_UNIQUE` (`id_area`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.area: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id_area`, `nombre`) VALUES
	(1, 'rural'),
	(2, 'urbana');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.causa_disca
CREATE TABLE IF NOT EXISTS `causa_disca` (
  `id_causa` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_causa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.causa_disca: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `causa_disca` DISABLE KEYS */;
INSERT INTO `causa_disca` (`id_causa`, `descripcion`) VALUES
	(1, 'Accidente de Trabajo'),
	(2, 'Secuelas de la Guerra'),
	(3, 'Congenita o Hereditaria'),
	(4, 'Accidente de Transito'),
	(5, 'Accidentes o Traumatismo'),
	(6, 'Enfermedad o Causa Degenerativa'),
	(7, 'Mixta'),
	(8, 'No Aplica'),
	(9, 'Otros');
/*!40000 ALTER TABLE `causa_disca` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.colonia
CREATE TABLE IF NOT EXISTS `colonia` (
  `id_colonia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY (`id_colonia`),
  UNIQUE KEY `id_colonia_UNIQUE` (`id_colonia`),
  KEY `fk_colonia_area1_idx` (`id_area`),
  CONSTRAINT `fk_colonia_area1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.colonia: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `colonia` DISABLE KEYS */;
INSERT INTO `colonia` (`id_colonia`, `nombre`, `descripcion`, `id_area`) VALUES
	(1, 'Colonia Esperanza 1', NULL, 2),
	(2, 'Colonia Esperanza 2', NULL, 2),
	(3, 'Colonia El Pajarito 1', NULL, 2),
	(4, 'Colonia El Pajarito 2', NULL, 2),
	(5, 'Colonia El Milagro', NULL, 1),
	(6, 'Caserio San Ernesto', NULL, 1),
	(7, 'Caserio San Antonio', NULL, 1),
	(8, 'Colonia 7 de Marzo', NULL, 2),
	(9, 'Colonia Santa Marta', NULL, 2),
	(10, 'Comunidad Monseñor Romero', NULL, 1),
	(11, 'Comunidad Thomas Alvaro Rodriguez', NULL, 1),
	(12, 'Colonia Altos de Nuevo Cuscatlan', NULL, 2),
	(13, 'Residencial Via del Mar', NULL, 2),
	(14, 'Residencial Joya de Las Piletas', NULL, 2),
	(15, 'Residencial Quintas de Santa Elena', NULL, 2),
	(16, 'Residencial Condado de Santa Elena', NULL, 2),
	(17, 'Comunidad El Polideportivo', NULL, 2),
	(18, 'Colonia Zamora Rivas', NULL, 2),
	(19, 'Casco Urbano', NULL, 2),
	(20, 'Comunidad La Cuarteria', NULL, 1),
	(21, 'Colonia Mirapueblo', NULL, 2),
	(22, 'Finca Santa Elena', NULL, 1),
	(23, 'Caserio El Pino', NULL, 1),
	(24, 'Residencial La Florida', NULL, 2),
	(25, 'Finca El Carmen', NULL, 1);
/*!40000 ALTER TABLE `colonia` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.discapacidad
CREATE TABLE IF NOT EXISTS `discapacidad` (
  `id_disca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `id_tipodisca` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_disca`),
  UNIQUE KEY `id_disca` (`id_disca`),
  KEY `FKtipo` (`id_tipodisca`),
  CONSTRAINT `FKtipo` FOREIGN KEY (`id_tipodisca`) REFERENCES `tipo_discapacidad` (`id_tipodisca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.discapacidad: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `discapacidad` DISABLE KEYS */;
INSERT INTO `discapacidad` (`id_disca`, `nombre`, `id_tipodisca`) VALUES
	(1, 'Sindrome de Down', 1),
	(2, 'Autismo', 1),
	(3, 'Retraso Mental', 4),
	(4, 'Perdida de la Memoria', 4),
	(5, 'Esquizofrenia', 4),
	(6, 'Alzheimer', 4),
	(7, 'Ceguera Parcial', 3),
	(8, 'Ceguera Total', 3),
	(9, 'Auditiva Parcial', 3),
	(11, 'Mal de Parkinson', 2),
	(12, 'Paralisis Cerebral', 2),
	(13, 'Mudez', 3),
	(14, 'Sordera', 3),
	(15, 'Sordomudo', 3),
	(16, 'Falta de Extremidad Superiores', 2),
	(17, 'Falta de Extremidades Inferiores', 2),
	(18, 'Ninguna', 5),
	(19, 'Otros', 5);
/*!40000 ALTER TABLE `discapacidad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.enfermedad
CREATE TABLE IF NOT EXISTS `enfermedad` (
  `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_enfermedad`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.enfermedad: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `enfermedad` DISABLE KEYS */;
INSERT INTO `enfermedad` (`id_enfermedad`, `nombre`) VALUES
	(1, 'Hipertencion Alterial'),
	(2, 'Diabetes'),
	(3, 'Respiratoria'),
	(4, 'Epilsepsia'),
	(5, 'Accidente Cerebro Vascular'),
	(6, 'Renar Cronica'),
	(7, 'Cancer'),
	(8, 'Albinismo'),
	(9, 'Vitiligio'),
	(10, 'VIH SIDA'),
	(11, 'Ninguna'),
	(12, 'Otras');
/*!40000 ALTER TABLE `enfermedad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.ingreso_economico
CREATE TABLE IF NOT EXISTS `ingreso_economico` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.ingreso_economico: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `ingreso_economico` DISABLE KEYS */;
INSERT INTO `ingreso_economico` (`id_ingreso`, `nombre`) VALUES
	(1, 'Remesa'),
	(2, 'Bonos'),
	(3, 'Pension'),
	(4, 'Salario'),
	(5, 'Negocio Propio'),
	(6, 'Otros');
/*!40000 ALTER TABLE `ingreso_economico` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.manejo_basura
CREATE TABLE IF NOT EXISTS `manejo_basura` (
  `id_manejobasura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_manejobasura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.manejo_basura: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `manejo_basura` DISABLE KEYS */;
INSERT INTO `manejo_basura` (`id_manejobasura`, `nombre`) VALUES
	(1, 'Servicio Municipal'),
	(2, 'Cielo Abierto'),
	(3, 'Se Entierra'),
	(4, 'Se Quema'),
	(5, 'Se tira al rio'),
	(6, 'Servicio Particular'),
	(7, 'Otros');
/*!40000 ALTER TABLE `manejo_basura` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.mascota
CREATE TABLE IF NOT EXISTS `mascota` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.mascota: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `mascota` DISABLE KEYS */;
INSERT INTO `mascota` (`id_mascota`, `nombre`) VALUES
	(1, 'Perros'),
	(2, 'Gatos'),
	(3, 'Otros');
/*!40000 ALTER TABLE `mascota` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.mat_paredes
CREATE TABLE IF NOT EXISTS `mat_paredes` (
  `id_matparedes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_matparedes`),
  UNIQUE KEY `id_matparedes_UNIQUE` (`id_matparedes`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.mat_paredes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `mat_paredes` DISABLE KEYS */;
INSERT INTO `mat_paredes` (`id_matparedes`, `nombre`) VALUES
	(1, 'Ladrillo Bloque '),
	(2, 'Adobe'),
	(3, 'Bahareque'),
	(4, 'Plastico'),
	(5, 'lamina'),
	(6, 'Madera'),
	(7, 'Tabla Roca'),
	(8, 'Otros');
/*!40000 ALTER TABLE `mat_paredes` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.mat_piso
CREATE TABLE IF NOT EXISTS `mat_piso` (
  `id_matpiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_matpiso`),
  UNIQUE KEY `id_matpiso_UNIQUE` (`id_matpiso`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.mat_piso: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `mat_piso` DISABLE KEYS */;
INSERT INTO `mat_piso` (`id_matpiso`, `nombre`) VALUES
	(4, 'Cemento'),
	(1, 'Ceramica'),
	(2, 'Ladrillo'),
	(5, 'Madera'),
	(6, 'Otros'),
	(3, 'Tierra');
/*!40000 ALTER TABLE `mat_piso` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.mat_techo
CREATE TABLE IF NOT EXISTS `mat_techo` (
  `id_mattecho` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_mattecho`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.mat_techo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `mat_techo` DISABLE KEYS */;
INSERT INTO `mat_techo` (`id_mattecho`, `nombre`) VALUES
	(4, 'Cemento'),
	(1, 'Duralita'),
	(2, 'Lamina'),
	(6, 'Otros'),
	(5, 'Plastico'),
	(3, 'Teja de Barro');
/*!40000 ALTER TABLE `mat_techo` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.nacionalidad
CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `id_nacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_nacionalidad`),
  UNIQUE KEY `id_nacionalidad_UNIQUE` (`id_nacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.nacionalidad: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `nacionalidad` DISABLE KEYS */;
INSERT INTO `nacionalidad` (`id_nacionalidad`, `nombre`) VALUES
	(1, 'Salvadoreño'),
	(2, 'Guatemalteco'),
	(3, 'Hondureño'),
	(4, 'Nicaraguense'),
	(5, 'Costarricense'),
	(6, 'Panameño'),
	(7, 'Mexicano'),
	(8, 'Estadounidense'),
	(9, 'Otros');
/*!40000 ALTER TABLE `nacionalidad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.nivel_educativo
CREATE TABLE IF NOT EXISTS `nivel_educativo` (
  `id_niveleducativo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_niveleducativo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.nivel_educativo: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `nivel_educativo` DISABLE KEYS */;
INSERT INTO `nivel_educativo` (`id_niveleducativo`, `nombre`) VALUES
	(1, 'Palvularia'),
	(2, 'Educacion Basica'),
	(3, 'Bachillerato'),
	(4, 'Tecnico'),
	(5, 'Universitario'),
	(6, 'Master'),
	(7, 'Doctorado'),
	(8, 'Otros');
/*!40000 ALTER TABLE `nivel_educativo` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.ocupacion
CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.ocupacion: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
INSERT INTO `ocupacion` (`id_ocupacion`, `nombre`) VALUES
	(1, 'Secreataria'),
	(2, 'Albañil'),
	(3, 'Panadero'),
	(4, 'Oficios Varios'),
	(5, 'Domestica'),
	(6, 'Jardinero'),
	(7, 'Policia'),
	(8, 'Vigilante'),
	(9, 'Enfermera'),
	(10, 'Abogado'),
	(11, 'Empleado de Maquila'),
	(12, 'Cocinero'),
	(13, 'Ordenanza'),
	(14, 'Carpintero'),
	(15, 'Zapatero'),
	(16, 'Comerciante'),
	(17, 'Sastre'),
	(18, 'Electricista'),
	(19, 'Fotógrafo'),
	(20, 'Contador'),
	(21, 'Fontanero'),
	(22, 'Mecanico'),
	(23, 'Agricultor'),
	(24, 'Mesero'),
	(25, 'Profesor'),
	(26, 'Agente de Call Center Ingles'),
	(27, 'Agente de Call Center Español'),
	(28, 'Ingeniero'),
	(29, 'Estudiante'),
	(30, 'Odontologo'),
	(31, 'Psicologo'),
	(32, 'Otros');
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.parentesco
CREATE TABLE IF NOT EXISTS `parentesco` (
  `id_parentesco` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_parentesco`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.parentesco: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `parentesco` DISABLE KEYS */;
INSERT INTO `parentesco` (`id_parentesco`, `nombre`) VALUES
	(1, 'Jefe de Familia'),
	(2, 'Conyuge'),
	(3, 'Hermano/a'),
	(4, 'Hijo/a'),
	(5, 'Nieto/a'),
	(6, 'Sobrino/a'),
	(7, 'Primo/a'),
	(8, 'Tio/a'),
	(9, 'Abuelo/a'),
	(10, 'Madre'),
	(11, 'Padre'),
	(12, 'Yerno'),
	(13, ' Nuera'),
	(14, 'Otros');
/*!40000 ALTER TABLE `parentesco` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.patrimonio
CREATE TABLE IF NOT EXISTS `patrimonio` (
  `id_patrimonio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_patrimonio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.patrimonio: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `patrimonio` DISABLE KEYS */;
INSERT INTO `patrimonio` (`id_patrimonio`, `nombre`) VALUES
	(1, 'Cultivo Agricola Propio'),
	(2, 'Aves de Corral'),
	(3, 'Ganado vacuno'),
	(4, 'Ganado vacuno'),
	(5, 'Negocio Propio'),
	(6, 'Otros');
/*!40000 ALTER TABLE `patrimonio` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` varchar(45) NOT NULL,
  `id_nacionalidad` int(11) NOT NULL,
  `id_niveleducativo` int(11) NOT NULL,
  `id_discapacidad` int(11) NOT NULL,
  `id_causadisca` int(11) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `id_parentesco` int(11) NOT NULL,
  `id_sitlaboral` int(11) NOT NULL,
  `id_enfermedad` int(11) NOT NULL,
  `id_vivienda` int(11) DEFAULT NULL,
  `id_ingreso` int(11) NOT NULL,
  `num_familia` int(11) NOT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `fk_persona_Nacionalidad1_idx` (`id_nacionalidad`),
  KEY `fk_persona_nivel_educativo1_idx` (`id_niveleducativo`),
  KEY `fk_persona_tipo_discapacidad1_idx` (`id_discapacidad`),
  KEY `fk_persona_ocupacion1_idx` (`id_ocupacion`),
  KEY `fk_persona_parentesco1_idx` (`id_parentesco`),
  KEY `fk_persona_situacion_laboral1_idx` (`id_sitlaboral`),
  KEY `fk_persona_enfermedad1_idx` (`id_enfermedad`),
  KEY `fk_persona_vivienda1_idx` (`id_vivienda`),
  KEY `fk_persona_ingreso_economico1_idx` (`id_ingreso`),
  KEY `fk_persona_causa_discapacidad1` (`id_causadisca`),
  CONSTRAINT `fk_persona_Nacionalidad1` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_causa_discapacidad1` FOREIGN KEY (`id_causadisca`) REFERENCES `causa_disca` (`id_causa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_enfermedad1` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_ingreso_economico1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_economico` (`id_ingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_nivel_educativo1` FOREIGN KEY (`id_niveleducativo`) REFERENCES `nivel_educativo` (`id_niveleducativo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_ocupacion1` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_parentesco1` FOREIGN KEY (`id_parentesco`) REFERENCES `parentesco` (`id_parentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_situacion_laboral1` FOREIGN KEY (`id_sitlaboral`) REFERENCES `situacion_laboral` (`id_sitlaboral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_tipo_discapacidad1` FOREIGN KEY (`id_discapacidad`) REFERENCES `discapacidad` (`id_disca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_vivienda1` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.persona: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.persona_discapacidad
CREATE TABLE IF NOT EXISTS `persona_discapacidad` (
  `id_personadisca` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_disca` int(11) DEFAULT NULL,
  `id_causa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_personadisca`),
  UNIQUE KEY `id_personadisca` (`id_personadisca`),
  KEY `FK1persona` (`id_persona`),
  KEY `FK2discapacidad` (`id_disca`),
  KEY `FK3causa` (`id_causa`),
  CONSTRAINT `FK1persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `FK2discapacidad` FOREIGN KEY (`id_disca`) REFERENCES `discapacidad` (`id_disca`),
  CONSTRAINT `FK3causa` FOREIGN KEY (`id_causa`) REFERENCES `causa_disca` (`id_causa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.persona_discapacidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona_discapacidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_discapacidad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.persona_enfermedad
CREATE TABLE IF NOT EXISTS `persona_enfermedad` (
  `id_personaenfer` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL DEFAULT '0',
  `id_enfermedad` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_personaenfer`),
  UNIQUE KEY `id_personaenfer` (`id_personaenfer`),
  KEY `FK1personaenfer` (`id_persona`),
  KEY `FK2enfermedad` (`id_enfermedad`),
  CONSTRAINT `FK1personaenfer` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `FK2enfermedad` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.persona_enfermedad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona_enfermedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_enfermedad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.religion
CREATE TABLE IF NOT EXISTS `religion` (
  `id_religion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_religion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.religion: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `religion` DISABLE KEYS */;
INSERT INTO `religion` (`id_religion`, `nombre`) VALUES
	(1, 'Catolico'),
	(2, 'Evangelicos'),
	(3, 'Otros'),
	(4, 'Ninguno'),
	(5, 'Adventista'),
	(6, 'Testigo de Jehova'),
	(7, 'Mormones');
/*!40000 ALTER TABLE `religion` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.riesgo
CREATE TABLE IF NOT EXISTS `riesgo` (
  `id_riesgo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_riesgo`),
  UNIQUE KEY `id_riesgo_UNIQUE` (`id_riesgo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.riesgo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `riesgo` DISABLE KEYS */;
INSERT INTO `riesgo` (`id_riesgo`, `nombre`) VALUES
	(1, 'Ninguno'),
	(2, 'Deslave'),
	(3, 'Inundaciones'),
	(4, 'Incendio por cocina de leña'),
	(5, 'Contaminacion por deseños solidos o liquidos'),
	(6, 'Otros riesgos');
/*!40000 ALTER TABLE `riesgo` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.riesgo_vivienda
CREATE TABLE IF NOT EXISTS `riesgo_vivienda` (
  `id_idriesgo_vivienda` int(11) NOT NULL AUTO_INCREMENT,
  `id_riesgo` int(11) NOT NULL,
  `id_vivienda` int(11) NOT NULL,
  PRIMARY KEY (`id_idriesgo_vivienda`),
  KEY `fk_riesgo_vivienda_idx` (`id_riesgo`),
  KEY `fk_vivienda_riesgo_idx` (`id_vivienda`),
  CONSTRAINT `fk_riesgo_vivienda` FOREIGN KEY (`id_riesgo`) REFERENCES `riesgo` (`id_riesgo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_riesgo` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.riesgo_vivienda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `riesgo_vivienda` DISABLE KEYS */;
/*!40000 ALTER TABLE `riesgo_vivienda` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
	(1, 'administrado'),
	(2, 'digitador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.seguridad
CREATE TABLE IF NOT EXISTS `seguridad` (
  `id_seguridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_seguridad`),
  UNIQUE KEY `idseguridad_UNIQUE` (`id_seguridad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.seguridad: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` (`id_seguridad`, `nombre`) VALUES
	(1, 'Presencia PNC'),
	(2, 'Presencia CAM'),
	(3, 'Presencia PNC y CAM'),
	(4, 'Ninguno');
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.servicio_basico
CREATE TABLE IF NOT EXISTS `servicio_basico` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.servicio_basico: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `servicio_basico` DISABLE KEYS */;
INSERT INTO `servicio_basico` (`id_servicio`, `nombre`) VALUES
	(1, 'Energia Electrica'),
	(2, 'Telefono'),
	(3, 'Internet'),
	(4, 'Cable'),
	(5, 'Aire acondicionado');
/*!40000 ALTER TABLE `servicio_basico` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.situacion
CREATE TABLE IF NOT EXISTS `situacion` (
  `id_situacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_situacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.situacion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `situacion` DISABLE KEYS */;
INSERT INTO `situacion` (`id_situacion`, `nombre`) VALUES
	(1, 'Renuente'),
	(2, 'Cerrada'),
	(3, 'Deshabitada');
/*!40000 ALTER TABLE `situacion` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.situacion_laboral
CREATE TABLE IF NOT EXISTS `situacion_laboral` (
  `id_sitlaboral` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sitlaboral`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.situacion_laboral: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `situacion_laboral` DISABLE KEYS */;
INSERT INTO `situacion_laboral` (`id_sitlaboral`, `nombre`) VALUES
	(1, 'Empleado Formal'),
	(2, 'Empleado Informal'),
	(3, 'Desempleado'),
	(4, 'No Aplica');
/*!40000 ALTER TABLE `situacion_laboral` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.tenencia_vivienda
CREATE TABLE IF NOT EXISTS `tenencia_vivienda` (
  `id_tenencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tenencia`),
  UNIQUE KEY `id_tenencia_UNIQUE` (`id_tenencia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.tenencia_vivienda: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tenencia_vivienda` DISABLE KEYS */;
INSERT INTO `tenencia_vivienda` (`id_tenencia`, `nombre`) VALUES
	(1, 'Alquilada'),
	(2, 'Prestada'),
	(3, 'Propia'),
	(4, 'Colono o Guardian');
/*!40000 ALTER TABLE `tenencia_vivienda` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.tipo_discapacidad
CREATE TABLE IF NOT EXISTS `tipo_discapacidad` (
  `id_tipodisca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipodisca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.tipo_discapacidad: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_discapacidad` DISABLE KEYS */;
INSERT INTO `tipo_discapacidad` (`id_tipodisca`, `nombre`) VALUES
	(1, 'Intelectual'),
	(2, 'Fisica'),
	(3, 'Sensorial'),
	(4, 'Mental o Psiquiatrica'),
	(5, 'No Aplica');
/*!40000 ALTER TABLE `tipo_discapacidad` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.tipo_familia
CREATE TABLE IF NOT EXISTS `tipo_familia` (
  `id_tipofamilia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipofamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.tipo_familia: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_familia` DISABLE KEYS */;
INSERT INTO `tipo_familia` (`id_tipofamilia`, `nombre`) VALUES
	(1, 'Familia Nuclear'),
	(2, 'Familia Extensa'),
	(3, 'Familia Mixta');
/*!40000 ALTER TABLE `tipo_familia` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.tipo_letrina
CREATE TABLE IF NOT EXISTS `tipo_letrina` (
  `id_tipoletrina` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipoletrina`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.tipo_letrina: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_letrina` DISABLE KEYS */;
INSERT INTO `tipo_letrina` (`id_tipoletrina`, `nombre`) VALUES
	(1, 'De lavar Conectada a foza Septica'),
	(2, 'De lavar conectado a alcantarillado'),
	(3, 'Letrina de Hoyo Seco'),
	(4, 'Letrina Abonera'),
	(5, 'Otro tipo '),
	(6, 'No Aplica');
/*!40000 ALTER TABLE `tipo_letrina` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_Roles1_idx` (`id_rol`),
  CONSTRAINT `fk_usuarios_Roles1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `pass`, `id_rol`) VALUES
	(1, 'admin', 'fbc71ce36cc20790f2eeed2197898e71', 1),
	(2, 'digitador', 'fbc71ce36cc20790f2eeed2197898e71', 2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vectores
CREATE TABLE IF NOT EXISTS `vectores` (
  `id_vectores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_vectores`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vectores: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `vectores` DISABLE KEYS */;
INSERT INTO `vectores` (`id_vectores`, `nombre`) VALUES
	(1, 'Zancudos'),
	(2, 'Moscas'),
	(3, 'Chinches Picudas'),
	(4, 'Cucarachas'),
	(5, 'Roedores');
/*!40000 ALTER TABLE `vectores` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda
CREATE TABLE IF NOT EXISTS `vivienda` (
  `id_vivienda` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `cant_familia` varchar(45) NOT NULL,
  `fecha_ingredatos` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `id_mattecho` int(11) NOT NULL,
  `id_matpiso` int(11) NOT NULL,
  `id_matparedes` int(11) NOT NULL,
  `id_colonia` int(11) NOT NULL,
  `id_tipoletrina` int(11) NOT NULL,
  `id_tenencia` int(11) NOT NULL,
  `id_aguanegra` int(11) NOT NULL,
  `id_aguagris` int(11) NOT NULL,
  `id_abastagua` int(11) NOT NULL,
  `id_seguridad` int(11) NOT NULL,
  `id_manejobasura` int(11) NOT NULL,
  `id_religion` int(11) NOT NULL,
  `id_tipofamilia` int(11) NOT NULL,
  PRIMARY KEY (`id_vivienda`),
  KEY `fk_vivienda_mat_techo1_idx` (`id_mattecho`),
  KEY `fk_vivienda_mat_piso1_idx` (`id_matpiso`),
  KEY `fk_vivienda_mat_paredes1_idx` (`id_matparedes`),
  KEY `fk_vivienda_colonia1_idx` (`id_colonia`),
  KEY `fk_vivienda_tipo_letrina1_idx` (`id_tipoletrina`),
  KEY `fk_vivienda_tenencia_vivienda1_idx` (`id_tenencia`),
  KEY `fk_vivienda_agua_negra1_idx` (`id_aguanegra`),
  KEY `fk_vivienda_agua_gris1_idx` (`id_aguagris`),
  KEY `fk_vivienda_abast_agua1_idx` (`id_abastagua`),
  KEY `fk_vivienda_seguridad1_idx` (`id_seguridad`),
  KEY `fk_vivienda_manejo_basura1_idx` (`id_manejobasura`),
  KEY `fk_vivienda_religion1_idx` (`id_religion`),
  KEY `fk_vivienda_tipo_familia1_idx` (`id_tipofamilia`),
  CONSTRAINT `fk_vivienda_abast_agua1` FOREIGN KEY (`id_abastagua`) REFERENCES `abast_agua` (`id_abastagua`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_agua_gris1` FOREIGN KEY (`id_aguagris`) REFERENCES `agua_gris` (`id_aguagris`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_agua_negra1` FOREIGN KEY (`id_aguanegra`) REFERENCES `agua_negra` (`id_aguanegra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_colonia1` FOREIGN KEY (`id_colonia`) REFERENCES `colonia` (`id_colonia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_manejo_basura1` FOREIGN KEY (`id_manejobasura`) REFERENCES `manejo_basura` (`id_manejobasura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_mat_paredes1` FOREIGN KEY (`id_matparedes`) REFERENCES `mat_paredes` (`id_matparedes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_mat_piso1` FOREIGN KEY (`id_matpiso`) REFERENCES `mat_piso` (`id_matpiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_mat_techo1` FOREIGN KEY (`id_mattecho`) REFERENCES `mat_techo` (`id_mattecho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_religion1` FOREIGN KEY (`id_religion`) REFERENCES `religion` (`id_religion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_seguridad1` FOREIGN KEY (`id_seguridad`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_tenencia_vivienda1` FOREIGN KEY (`id_tenencia`) REFERENCES `tenencia_vivienda` (`id_tenencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_tipo_familia1` FOREIGN KEY (`id_tipofamilia`) REFERENCES `tipo_familia` (`id_tipofamilia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_tipo_letrina1` FOREIGN KEY (`id_tipoletrina`) REFERENCES `tipo_letrina` (`id_tipoletrina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda_ingreconomico
CREATE TABLE IF NOT EXISTS `vivienda_ingreconomico` (
  `id_vivienda_ingre` int(11) NOT NULL AUTO_INCREMENT,
  `id_vivienda` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  PRIMARY KEY (`id_vivienda_ingre`),
  KEY `fk_vivienda_ingreconomico_vivienda1_idx` (`id_vivienda`),
  KEY `fk_vivienda_ingreconomico_ingreso_economico1_idx` (`id_ingreso`),
  CONSTRAINT `fk_vivienda_ingreconomico_ingreso_economico1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_economico` (`id_ingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_ingreconomico_vivienda1` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda_ingreconomico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda_ingreconomico` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda_ingreconomico` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda_mascota
CREATE TABLE IF NOT EXISTS `vivienda_mascota` (
  `id_vivimascota` int(11) NOT NULL AUTO_INCREMENT,
  `id_vivienda` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  PRIMARY KEY (`id_vivimascota`),
  KEY `fk_vivienda_mascota_vivienda1_idx` (`id_vivienda`),
  KEY `fk_vivienda_mascota_mascota1_idx` (`id_mascota`),
  CONSTRAINT `fk_vivienda_mascota_mascota1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_mascota_vivienda1` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda_mascota: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda_mascota` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda_mascota` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda_no_censada
CREATE TABLE IF NOT EXISTS `vivienda_no_censada` (
  `id_vivienda_no_censada` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `fecha_ingredatos` date NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `id_situacion` int(11) NOT NULL,
  `id_colonia` int(11) NOT NULL,
  PRIMARY KEY (`id_vivienda_no_censada`),
  KEY `fk_vivienda_no_censada_situacion1_idx` (`id_situacion`),
  KEY `fk_vivienda_no_censada_colonia1_idx` (`id_colonia`),
  CONSTRAINT `fk_vivienda_no_censada_colonia1` FOREIGN KEY (`id_colonia`) REFERENCES `colonia` (`id_colonia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_no_censada_situacion1` FOREIGN KEY (`id_situacion`) REFERENCES `situacion` (`id_situacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda_no_censada: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda_no_censada` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda_no_censada` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda_patrimonio
CREATE TABLE IF NOT EXISTS `vivienda_patrimonio` (
  `idvivienda_patrimonio` int(11) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` int(11) NOT NULL,
  `id_vivienda` int(11) NOT NULL,
  PRIMARY KEY (`idvivienda_patrimonio`),
  UNIQUE KEY `idvivienda_patrimonio_UNIQUE` (`idvivienda_patrimonio`),
  KEY `fk_vivienda_patrimonio_patrimonio1_idx` (`id_patrimonio`),
  KEY `fk_vivienda_patrimonio_vivienda1_idx` (`id_vivienda`),
  CONSTRAINT `fk_vivienda_patrimonio_patrimonio1` FOREIGN KEY (`id_patrimonio`) REFERENCES `patrimonio` (`id_patrimonio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_patrimonio_vivienda1` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda_patrimonio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda_patrimonio` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda_patrimonio` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda_servibasic
CREATE TABLE IF NOT EXISTS `vivienda_servibasic` (
  `id_servibasic` int(11) NOT NULL AUTO_INCREMENT,
  `id_vivienda` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id_servibasic`),
  KEY `fk_vivienda_servibasic_vivienda1_idx` (`id_vivienda`),
  KEY `fk_vivienda_servibasic_servicio_basico1_idx` (`id_servicio`),
  CONSTRAINT `fk_vivienda_servibasic_servicio_basico1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio_basico` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_servibasic_vivienda1` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda_servibasic: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda_servibasic` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda_servibasic` ENABLE KEYS */;


-- Volcando estructura para tabla censo_nc.vivienda_vectores
CREATE TABLE IF NOT EXISTS `vivienda_vectores` (
  `id_vivectores` int(11) NOT NULL AUTO_INCREMENT,
  `id_vivienda` int(11) NOT NULL,
  `id_vectores` int(11) NOT NULL,
  PRIMARY KEY (`id_vivectores`),
  UNIQUE KEY `id_vivectores_UNIQUE` (`id_vivectores`),
  KEY `fk_vivienda_vectores_vivienda1_idx` (`id_vivienda`),
  KEY `fk_vivienda_vectores_vectores1_idx` (`id_vectores`),
  CONSTRAINT `fk_vivienda_vectores_vectores1` FOREIGN KEY (`id_vectores`) REFERENCES `vectores` (`id_vectores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_vectores_vivienda1` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla censo_nc.vivienda_vectores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vivienda_vectores` DISABLE KEYS */;
/*!40000 ALTER TABLE `vivienda_vectores` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
