/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50736
Source Host           : localhost:3306
Source Database       : siaho_bd

Target Server Type    : MYSQL
Target Server Version : 50736
File Encoding         : 65001

Date: 2022-08-01 11:25:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dg_empleados
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleados`;
CREATE TABLE `dg_empleados` (
  `empleados_cedula` int(11) NOT NULL,
  `empleados_nroPersonal` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userSap` varchar(50) DEFAULT NULL,
  `cargoSap` varchar(255) DEFAULT NULL,
  `cargoActual` varchar(255) DEFAULT NULL,
  `creador` varchar(255) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`empleados_cedula`),
  KEY `empleados_nroPersonal` (`empleados_nroPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla donde se almacenara los inspectores que usaran el sistema para ejecutar las actividades.\r\n\r\n\r\nImportante validar con Fpuerta para unificar con la tabla usuarios\r\n';

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES ('13336768', '13336768', 'UsuarioMoron', '12345', 'MORONUSER', 'Consultor', 'COnsultor MPS', 'Prueba', '2022-07-28', '1');
INSERT INTO `dg_empleados` VALUES ('13336769', '13336769', 'UsuarioJAA', '12345', 'JAAUSER', 'Consulto', 'Consultor PMS', 'prueba', '2022-07-28', '1');
INSERT INTO `dg_empleados` VALUES ('13336770', '13336770', 'usuarioAMC', '12345', 'AMCUSER', 'Consultor', 'Consultor MPS', 'Prueba', '2022-07-28', '1');

-- ----------------------------
-- Table structure for dg_empleado_token
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleado_token`;
CREATE TABLE `dg_empleado_token` (
  `empleadoTokenId` int(11) NOT NULL AUTO_INCREMENT,
  `emplearoNumPersonalID` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`empleadoTokenId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of dg_empleado_token
-- ----------------------------
INSERT INTO `dg_empleado_token` VALUES ('8', '13336768', '1f42321e76171ff75cb1dfa2a09e3bf4', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('9', '13336768', '5ca8236a2125ef0a6b5e8187baa56de5', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('10', '13336768', '3562bde427ca22d928d373569a5f950b', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('11', '13336768', '2f7643a68668ebed73b59a343484dd3b', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('7', '13336768', 'de2c26a04ef9d5a1dae4ccaba0391c66', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('12', '13336768', '7b556d5965f93c130899780e629eb344', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('13', '13336768', '5adb40fdd6f8eb4fd0523376538eb533', '1', '2022-07-30 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('14', '13336768', '84401df5db85d91217aa1536299eede0', '1', '2022-07-31 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('15', '13336768', '15274910bdbe8a42dc2a2c6231d06bd3', '1', '2022-07-31 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('16', '13336768', 'd313522b6ee4a1f59642680b2471e202', '1', '2022-07-31 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('17', '13336768', 'cd3999c6ae972e8a636fb25aa081bb29', '1', '2022-07-31 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('18', '13336768', 'b43bbfc8bcf8625eed413d91186e8534', '1', '2022-08-01 00:00:00');
INSERT INTO `dg_empleado_token` VALUES ('19', '13336768', 'b188960c7350d1a2586ada77bd1f7375', '1', '2022-08-01 01:52:00');

-- ----------------------------
-- Table structure for dg_incidencias_body
-- ----------------------------
DROP TABLE IF EXISTS `dg_incidencias_body`;
CREATE TABLE `dg_incidencias_body` (
  `incidenciaBodyId` int(11) NOT NULL AUTO_INCREMENT,
  `incidenciaHeaderId` int(11) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `respuesta` varchar(10) DEFAULT NULL,
  `observacion` text,
  `ponderacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`incidenciaBodyId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dg_incidencias_body
-- ----------------------------

-- ----------------------------
-- Table structure for dg_incidencias_header
-- ----------------------------
DROP TABLE IF EXISTS `dg_incidencias_header`;
CREATE TABLE `dg_incidencias_header` (
  `incidenciaHeaderId` int(11) NOT NULL AUTO_INCREMENT,
  `tipoIncidenciaId` int(11) DEFAULT NULL,
  `complejoId` int(11) DEFAULT NULL,
  `instalacionId` int(11) DEFAULT NULL,
  `plantaId` int(11) DEFAULT NULL,
  `seccionId` int(11) DEFAULT NULL,
  `equipoId` int(11) DEFAULT NULL,
  `fechaEjecucionInicio` datetime DEFAULT NULL,
  `fechaEjecucionFin` date DEFAULT NULL,
  `inspectorNumPersonal` varchar(150) DEFAULT NULL,
  `gerenciaInspectorId` int(11) DEFAULT NULL,
  `sectorId` int(11) DEFAULT NULL,
  `subSectorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`incidenciaHeaderId`),
  UNIQUE KEY `index` (`incidenciaHeaderId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dg_incidencias_header
-- ----------------------------

-- ----------------------------
-- Table structure for dg_incidencia_precarga
-- ----------------------------
DROP TABLE IF EXISTS `dg_incidencia_precarga`;
CREATE TABLE `dg_incidencia_precarga` (
  `incidenciaPreCargaId` int(11) NOT NULL,
  `tipoIncidenciaId` int(11) DEFAULT NULL COMMENT 'este es el campo que relaciona las preguntas PreCargadas con la nueva inspeccion (este campo debe estar en la inspeccion apra poder relacionarlo)',
  `grupo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipoRespuestaId` int(11) DEFAULT NULL,
  `ponderacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`incidenciaPreCargaId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dg_incidencia_precarga
-- ----------------------------

-- ----------------------------
-- Table structure for dg_incidencia_seguimineto
-- ----------------------------
DROP TABLE IF EXISTS `dg_incidencia_seguimineto`;
CREATE TABLE `dg_incidencia_seguimineto` (
  `incidenciaSeguimientoId` int(11) NOT NULL AUTO_INCREMENT,
  `incidenciaHeaderId` int(11) NOT NULL,
  `modificadoPor` varchar(255) DEFAULT NULL,
  `fechaAprobacion` date DEFAULT NULL,
  `observacion` text,
  PRIMARY KEY (`incidenciaSeguimientoId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dg_incidencia_seguimineto
-- ----------------------------

-- ----------------------------
-- Table structure for dg_r24htabs
-- ----------------------------
DROP TABLE IF EXISTS `dg_r24htabs`;
CREATE TABLE `dg_r24htabs` (
  `R24HTabsId` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `complejoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`R24HTabsId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of dg_r24htabs
-- ----------------------------
INSERT INTO `dg_r24htabs` VALUES ('1', 'Revisión de Unidades de Emergencias', '1', '1');
INSERT INTO `dg_r24htabs` VALUES ('2', 'Revisión de Sala de Bombas de Red Contra Incendios # 01', '2', '1');
INSERT INTO `dg_r24htabs` VALUES ('3', 'Revisión de Sala de Bombas de Red Contra Incendios # 02', '2', '1');
INSERT INTO `dg_r24htabs` VALUES ('4', 'Revisión de Sistema de Cebado', '3', '1');
INSERT INTO `dg_r24htabs` VALUES ('5', 'Disponibilidad de Espumogenos', '4', '1');
INSERT INTO `dg_r24htabs` VALUES ('6', 'Brigadistas de Emergencia por Planta', '5', '1');
INSERT INTO `dg_r24htabs` VALUES ('7', 'Reporte de Comité Ayuda Mutua ', '6', '1');
INSERT INTO `dg_r24htabs` VALUES ('8', 'Recorrido del Area Industrial', '7', '1');
INSERT INTO `dg_r24htabs` VALUES ('9', 'Reporte de Atención Según Evento', '8', '1');
INSERT INTO `dg_r24htabs` VALUES ('11', 'Revisión de Unidades de Emergencias', '1', '2');
INSERT INTO `dg_r24htabs` VALUES ('12', 'Revisión de Sala de Bombas de Red Contra Incendios # 01', '2', '2');
INSERT INTO `dg_r24htabs` VALUES ('13', 'Revisión de Sistema de Cebado', '3', '2');
INSERT INTO `dg_r24htabs` VALUES ('14', 'Disponibilidad de Espumogenos', '4', '2');
INSERT INTO `dg_r24htabs` VALUES ('15', 'Brigadistas de Emergencia por Planta', '5', '2');
INSERT INTO `dg_r24htabs` VALUES ('16', 'Reporte de Comité Ayuda Mutua ', '6', '2');
INSERT INTO `dg_r24htabs` VALUES ('17', 'Recorrido del Area Industrial', '7', '2');
INSERT INTO `dg_r24htabs` VALUES ('18', 'Reporte de Atención Según Evento', '8', '2');
INSERT INTO `dg_r24htabs` VALUES ('19', 'Revisión de Unidades de Emergencias', '1', '4');
INSERT INTO `dg_r24htabs` VALUES ('20', 'Revisión de Sala de Bombas Aguas Crudas EBP-1 ', '2', '4');
INSERT INTO `dg_r24htabs` VALUES ('21', 'Revisión de Sala de Bombas Terminal Marítimo', '3', '4');
INSERT INTO `dg_r24htabs` VALUES ('22', 'Revisión de Sistema de Cebado', '4', '4');
INSERT INTO `dg_r24htabs` VALUES ('23', 'Disponibilidad de Espuméeno', '5', '4');
INSERT INTO `dg_r24htabs` VALUES ('24', 'Brigadistas de Emergencia por Planta', '6', '4');
INSERT INTO `dg_r24htabs` VALUES ('25', 'Reporte de Comité Ayuda Mutua ', '7', '4');
INSERT INTO `dg_r24htabs` VALUES ('26', 'Recorrido del Área Industrial', '8', '4');
INSERT INTO `dg_r24htabs` VALUES ('27', 'Reporte de Atención Según Evento', '9', '4');

-- ----------------------------
-- Table structure for dg_r24h_body
-- ----------------------------
DROP TABLE IF EXISTS `dg_r24h_body`;
CREATE TABLE `dg_r24h_body` (
  `R24HBodyId` int(11) NOT NULL AUTO_INCREMENT,
  `R24HHeader` int(11) DEFAULT NULL,
  `R24HPrecargaId` int(11) DEFAULT NULL,
  `respuesta` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`R24HBodyId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of dg_r24h_body
-- ----------------------------

-- ----------------------------
-- Table structure for dg_r24h_header
-- ----------------------------
DROP TABLE IF EXISTS `dg_r24h_header`;
CREATE TABLE `dg_r24h_header` (
  `R24Hid` int(11) NOT NULL AUTO_INCREMENT,
  `complejoId` int(11) DEFAULT NULL,
  `empleados_nroPersonal` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `turno` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`R24Hid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of dg_r24h_header
-- ----------------------------

-- ----------------------------
-- Table structure for dg_r24h_precarga
-- ----------------------------
DROP TABLE IF EXISTS `dg_r24h_precarga`;
CREATE TABLE `dg_r24h_precarga` (
  `R24HPrecargaId` int(11) NOT NULL AUTO_INCREMENT,
  `complejoId` int(11) DEFAULT NULL,
  `equipoId` int(11) DEFAULT NULL,
  `tabs` int(11) DEFAULT NULL,
  PRIMARY KEY (`R24HPrecargaId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of dg_r24h_precarga
-- ----------------------------
INSERT INTO `dg_r24h_precarga` VALUES ('1', '1', '1', '1');
INSERT INTO `dg_r24h_precarga` VALUES ('2', '1', '2', '1');
INSERT INTO `dg_r24h_precarga` VALUES ('3', '4', '1', '1');
INSERT INTO `dg_r24h_precarga` VALUES ('4', '2', '1', '1');
INSERT INTO `dg_r24h_precarga` VALUES ('5', '2', '2', '1');

-- ----------------------------
-- Table structure for dg_tipo_modulo
-- ----------------------------
DROP TABLE IF EXISTS `dg_tipo_modulo`;
CREATE TABLE `dg_tipo_modulo` (
  `id_sistem` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `a` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `m` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `e` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `d` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `module` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `user_mod` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_mod` date DEFAULT NULL,
  `user_crea` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_crea` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dg_tipo_modulo
-- ----------------------------
INSERT INTO `dg_tipo_modulo` VALUES ('1', '15258635', '1', '1', '1', '1', 'Customer', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('2', '15258635', '1', '1', '1', '1', 'Customer', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('3', '15258635', '1', '1', '1', '1', 'Customer', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('4', '15258635', '1', '1', '1', '1', 'Customer', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('5', '15258635', '1', '1', '1', '1', 'Customer', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('6', '15258635', '1', '1', '1', '0', 'Customer', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('7', '15258635', '1', '1', '1', '1', 'Cash and banks', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('8', '15258635', '1', '1', '1', '1', 'Cash and banks', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('9', '15258635', '1', '1', '1', '1', 'Cash and banks', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('10', '15258635', '1', '1', '1', '0', 'Settings', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('11', '15258635', '1', '1', '1', '0', 'Settings', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('12', '15258635', '1', '1', '1', '0', 'Settings', null, null, null, null);
INSERT INTO `dg_tipo_modulo` VALUES ('13', '15258635', '1', '1', '1', '1', 'Inventory', null, null, null, null);

-- ----------------------------
-- Table structure for dm_complejo
-- ----------------------------
DROP TABLE IF EXISTS `dm_complejo`;
CREATE TABLE `dm_complejo` (
  `id_complejo` int(11) NOT NULL,
  `siglas_complejo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_sap` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_complejo` text COLLATE utf8_spanish_ci,
  `ciudad_reporte` text COLLATE utf8_spanish_ci,
  `ciudad_origen` text COLLATE utf8_spanish_ci,
  `dato_extra` text COLLATE utf8_spanish_ci,
  `fecha_crea` date DEFAULT NULL,
  `fecha_mod` date DEFAULT NULL,
  `user_crea` text COLLATE utf8_spanish_ci,
  `user_mod` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_complejo`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC COMMENT='Almacena la informacion unica de los complejos de Pqv.\r\n\r\nFalta definir donde almacenar el custorio del complejo';

-- ----------------------------
-- Records of dm_complejo
-- ----------------------------
INSERT INTO `dm_complejo` VALUES ('1', 'CPM', 'P040', 'Complejo Morón/Hugo Chavez', 'Morón', 'Morón', 'CEN', '2014-05-29', '2014-05-29', 'superuser', 'superuser');
INSERT INTO `dm_complejo` VALUES ('2', 'CPAMC', 'P050', 'Complejo Ana María Campos', 'Los Puertos de Altagracia', 'Los Puertos de Altagracia', 'OCC', '2014-05-29', '2014-05-29', 'superuser', 'superuser');
INSERT INTO `dm_complejo` VALUES ('3', 'CORPORATIVO', 'P030', 'Sede Corporativa', 'Valencia', 'Valencia', 'CEN', '2014-05-29', '2014-05-29', 'superuser', 'superuser');
INSERT INTO `dm_complejo` VALUES ('4', 'CPJAA', 'P060', 'Complejo José Antonio Anzoátegui', 'Barcelona', 'Barcelona', 'ORI', '2015-02-12', '2015-02-12', 'superuser', 'superuser');

-- ----------------------------
-- Table structure for dm_complejo_custodio
-- ----------------------------
DROP TABLE IF EXISTS `dm_complejo_custodio`;
CREATE TABLE `dm_complejo_custodio` (
  `complejoCustorioId` int(11) NOT NULL,
  `complejoId` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `custodioNumPersonal` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`complejoCustorioId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_complejo_custodio
-- ----------------------------

-- ----------------------------
-- Table structure for dm_equipos
-- ----------------------------
DROP TABLE IF EXISTS `dm_equipos`;
CREATE TABLE `dm_equipos` (
  `equipoId` int(11) NOT NULL AUTO_INCREMENT,
  `complejoId` int(11) DEFAULT NULL,
  `instalacionId` int(11) DEFAULT NULL,
  `productoId` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `custorio` varchar(255) DEFAULT NULL,
  `EquipoCodSap` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`equipoId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_equipos
-- ----------------------------
INSERT INTO `dm_equipos` VALUES ('1', '1', '1', '1', 'Equipo de prueba Moron', 'Equipo de prueba Moron', 'xxxxxxxx', '123456789');
INSERT INTO `dm_equipos` VALUES ('2', '1', '1', '3', 'segundo equipo de prueba', 'Segundo Equipo de Prueba', 'YYYYYYY', '987654321');
INSERT INTO `dm_equipos` VALUES ('3', '1', '1', '5', 'tercer equipo de prueba', 'Tercer equipo de prueba', 'ZZZZZZZ', '1598753214');

-- ----------------------------
-- Table structure for dm_estados
-- ----------------------------
DROP TABLE IF EXISTS `dm_estados`;
CREATE TABLE `dm_estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `id_zona` int(11) DEFAULT NULL,
  `estado` varchar(250) NOT NULL,
  `iso_3166-2` varchar(4) NOT NULL,
  PRIMARY KEY (`id_estado`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dm_estados
-- ----------------------------
INSERT INTO `dm_estados` VALUES ('1', null, 'Amazonas', 'VE-X');
INSERT INTO `dm_estados` VALUES ('2', null, 'Anzoátegui', 'VE-B');
INSERT INTO `dm_estados` VALUES ('3', null, 'Apure', 'VE-C');
INSERT INTO `dm_estados` VALUES ('4', '1', 'Aragua', 'VE-D');
INSERT INTO `dm_estados` VALUES ('5', null, 'Barinas', 'VE-E');
INSERT INTO `dm_estados` VALUES ('6', null, 'Bolívar', 'VE-F');
INSERT INTO `dm_estados` VALUES ('7', '2', 'Carabobo', 'VE-G');
INSERT INTO `dm_estados` VALUES ('8', '2', 'Cojedes', 'VE-H');
INSERT INTO `dm_estados` VALUES ('9', null, 'Delta Amacuro', 'VE-Y');
INSERT INTO `dm_estados` VALUES ('10', '2', 'Falcón', 'VE-I');
INSERT INTO `dm_estados` VALUES ('11', null, 'Guárico', 'VE-J');
INSERT INTO `dm_estados` VALUES ('12', '2', 'Lara', 'VE-K');
INSERT INTO `dm_estados` VALUES ('13', null, 'Merida', 'VE-L');
INSERT INTO `dm_estados` VALUES ('14', '1', 'Miranda', 'VE-M');
INSERT INTO `dm_estados` VALUES ('15', null, 'Monagas', 'VE-N');
INSERT INTO `dm_estados` VALUES ('16', null, 'Nueva Esparta', 'VE-O');
INSERT INTO `dm_estados` VALUES ('17', null, 'Portuguesa', 'VE-P');
INSERT INTO `dm_estados` VALUES ('18', null, 'Sucre', 'VE-R');
INSERT INTO `dm_estados` VALUES ('19', null, 'Táchira', 'VE-S');
INSERT INTO `dm_estados` VALUES ('20', null, 'Trujillo', 'VE-T');
INSERT INTO `dm_estados` VALUES ('21', '1', 'Vargas', 'VE-W');
INSERT INTO `dm_estados` VALUES ('22', '2', 'Yaracuy', 'VE-U');
INSERT INTO `dm_estados` VALUES ('23', null, 'Zulia', 'VE-V');
INSERT INTO `dm_estados` VALUES ('24', '1', 'Distrito Capital', 'VE-A');
INSERT INTO `dm_estados` VALUES ('25', null, 'Dependencias Federales', 'VE-Z');

-- ----------------------------
-- Table structure for dm_estatus
-- ----------------------------
DROP TABLE IF EXISTS `dm_estatus`;
CREATE TABLE `dm_estatus` (
  `id_status` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `des_status` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dm_estatus
-- ----------------------------
INSERT INTO `dm_estatus` VALUES ('A', 'Activo');
INSERT INTO `dm_estatus` VALUES ('D', 'Desactivado');

-- ----------------------------
-- Table structure for dm_gerencia
-- ----------------------------
DROP TABLE IF EXISTS `dm_gerencia`;
CREATE TABLE `dm_gerencia` (
  `gerencia_id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `localidad` varchar(60) DEFAULT NULL,
  `centro_costo` int(11) NOT NULL,
  `cod_proceso` char(10) DEFAULT NULL,
  `cod_seip` varchar(45) DEFAULT NULL,
  `nivelCod_seip` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of dm_gerencia
-- ----------------------------
INSERT INTO `dm_gerencia` VALUES ('1', 'TI', 'AMC', '11903', 'AIT.A', 'aitam', '2');
INSERT INTO `dm_gerencia` VALUES ('2', 'ASUNTOS LEGALES', 'AMC', '13823', 'AL.A', 'alamc', '2');
INSERT INTO `dm_gerencia` VALUES ('3', 'SALUD', 'AMC', '13821', 'AM.A', 'salam', '2');
INSERT INTO `dm_gerencia` VALUES ('4', 'ASUNTOS PÚBLICOS', 'AMC', '11025', 'AP.A', 'aappc', '2');
INSERT INTO `dm_gerencia` VALUES ('5', 'FORMACIÓN Y CAPACITACIÓN', 'AMC', '13005', 'FO.A', 'captc', '2');
INSERT INTO `dm_gerencia` VALUES ('6', 'PREVENCIÓN Y CONTROL DE PÉRDIDAS', 'AMC', '13840', 'PCP.A', 'pcpam', '2');
INSERT INTO `dm_gerencia` VALUES ('7', 'DESARROLLO SOCIAL', 'AMC', '13102', 'DS.A', 'dicam', '2');
INSERT INTO `dm_gerencia` VALUES ('8', 'DIRECCIÓN DE PROYECTO', 'AMC', '0', 'DP.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('9', 'FINANZAS', 'AMC', '13801', 'FI.A', 'fiamc', '2');
INSERT INTO `dm_gerencia` VALUES ('10', 'MANTENIMIENTO', 'AMC', '13164', 'MANT.A', 'gmamc', '2');
INSERT INTO `dm_gerencia` VALUES ('11', 'MATERIALES', 'AMC', '13231', 'MAT.A', 'mtamc', '2');
INSERT INTO `dm_gerencia` VALUES ('12', 'PRODUCCIÓN', 'AMC', '13388', 'PROD.A', 'gpamc', '2');
INSERT INTO `dm_gerencia` VALUES ('13', 'GESTIÓN HUMANA', 'AMC', '13807', 'RRHH.A', 'rhhm', '2');
INSERT INTO `dm_gerencia` VALUES ('14', 'SEGURIDAD INDUSTRIAL, AMBIENTE E  HIGIENE', 'AMC', '13233', 'SHA.A', 'shaam', '2');
INSERT INTO `dm_gerencia` VALUES ('15', 'SERVICIOS GENERALES', 'AMC', '13827', 'SG.A', 'gsamc', '2');
INSERT INTO `dm_gerencia` VALUES ('16', 'SISTEMA INTEGRADO DE GESTIÓN', 'AMC', '13894', 'SIG.A', 'sigco', '1');
INSERT INTO `dm_gerencia` VALUES ('17', 'SUMINISTRO', 'AMC', '13284', 'SUM.A', 'suamc', '2');
INSERT INTO `dm_gerencia` VALUES ('18', 'TÉCNICA', 'AMC', '13218', 'TEC.A', 'gtamc', '2');
INSERT INTO `dm_gerencia` VALUES ('19', 'UNOP', 'AMC', '13600', 'LOP.A', 'gunop', '1');
INSERT INTO `dm_gerencia` VALUES ('20', 'SERVICIOS GENERALES Y LOGÍSTICOS', 'CORPORATIVO', '11827', 'ADSE.V', 'adsco', '1');
INSERT INTO `dm_gerencia` VALUES ('21', 'TI', 'CORPORATIVO', '11093', 'AIT.V', 'aitco', '1');
INSERT INTO `dm_gerencia` VALUES ('22', 'SALUD', 'CORPORATIVO', '11820', 'AM.V', 'salco', '1');
INSERT INTO `dm_gerencia` VALUES ('23', 'ASUNTOS PÚBLICOS', 'CORPORATIVO', '11025', 'AP.V', 'aappc', '1');
INSERT INTO `dm_gerencia` VALUES ('24', 'AUDITORÍA INTERNA', 'CORPORATIVO', '11055', 'AI.V', 'auico', '1');
INSERT INTO `dm_gerencia` VALUES ('25', 'FORMACIÓN Y CAPACITACIÓN', 'CORPORATIVO', '11005', 'FO.V', 'captc', '1');
INSERT INTO `dm_gerencia` VALUES ('26', 'ASUNTOS LEGALES', 'CORPORATIVO', '11030', 'AL.V', 'cjuco', '1');
INSERT INTO `dm_gerencia` VALUES ('27', 'PREVENCIÓN Y CONTROL DE PÉRDIDAS', 'CORPORATIVO', '11840', 'PCP.V', 'pcpco', '1');
INSERT INTO `dm_gerencia` VALUES ('28', 'CONTROL DE GESTIÓN DE OFICINA DE LA PRESIDENCIA', 'CORPORATIVO', '11004', 'OP.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('29', 'DESARROLLO SOCIAL', 'CORPORATIVO', '11150', 'DS.V', 'dsoco', '1');
INSERT INTO `dm_gerencia` VALUES ('30', 'DIRECCIÓN DE PROYECTO', 'CORPORATIVO', '11257', 'DP.V', 'direp', '1');
INSERT INTO `dm_gerencia` VALUES ('31', 'FINANZAS', 'CORPORATIVO', '11009', 'FI.V', 'finco', '1');
INSERT INTO `dm_gerencia` VALUES ('32', 'JUNTA DIRECTIVA', 'CORPORATIVO', '11001', 'JD.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('33', 'INVESTIGACIÓN Y DESARROLLO TECNOLÓGICO', 'CORPORATIVO', '11849', 'IDT.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('34', 'OFICINA DESPACHO DE LA PRESIDENCIA', 'CORPORATIVO', '11003', 'OP.V', 'gcgop', '1');
INSERT INTO `dm_gerencia` VALUES ('35', 'INVESTIGACIÓN Y DESARROLLO PETROQUÍMICO', 'CORPORATIVO', '11026', 'ALBA.V', 'ggpin', '1');
INSERT INTO `dm_gerencia` VALUES ('36', 'PLANIFICACIÓN Y NUEVOS DESARROLLOS', 'CORPORATIVO', '11038', 'PND.V', 'pndco', '1');
INSERT INTO `dm_gerencia` VALUES ('37', 'DESARROLLO ENDÓGENO PETROQUÍMICO', 'CORPORATIVO', '0', 'PROD.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('38', 'PROYECTO NAVAY', 'CORPORATIVO', '11240', 'P.NA.V', 'ggnav', '1');
INSERT INTO `dm_gerencia` VALUES ('39', 'PROYECTO PARAGUANA', 'CORPORATIVO', '11245', 'P.PA.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('40', 'PROYECTO PUERTO NUTRIAS', 'CORPORATIVO', '11256', 'P.PN.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('41', 'GESTIÓN HUMANA', 'CORPORATIVO', '11017', 'RRHH.V', 'rhhco', '1');
INSERT INTO `dm_gerencia` VALUES ('42', 'SEGURIDAD INDUSTRIAL, AMBIENTE E  HIGIENE', 'CORPORATIVO', '11037', 'SHA.V', 'shaco', '1');
INSERT INTO `dm_gerencia` VALUES ('43', 'CONTRATACIONES', 'CORPORATIVO', '11057', 'CT.V', 'conco', '1');
INSERT INTO `dm_gerencia` VALUES ('44', 'SISTEMA INTEGRADO DE GESTIÓN', 'CORPORATIVO', '11241', 'SIG.V', 'sigco', '1');
INSERT INTO `dm_gerencia` VALUES ('45', 'USLAF', 'CORPORATIVO', '12600', 'UFER.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('46', 'TI', 'JOSE', '11903', 'AIT.J', 'aitja', '2');
INSERT INTO `dm_gerencia` VALUES ('47', 'ASUNTOS LEGALES', 'JOSE', '11030', 'AL.J', 'aljaa', '2');
INSERT INTO `dm_gerencia` VALUES ('48', 'SALUD', 'JOSE', '14820', 'AM.J', 'salja', '2');
INSERT INTO `dm_gerencia` VALUES ('49', 'ASUNTOS PÚBLICOS', 'JOSE', '11025', 'AP.J', 'aappj', '2');
INSERT INTO `dm_gerencia` VALUES ('50', 'FORMACIÓN Y CAPACITACIÓN', 'JOSE', '14005', 'FO.J', 'captc', '2');
INSERT INTO `dm_gerencia` VALUES ('51', 'PREVENCIÓN Y CONTROL DE PÉRDIDAS', 'JOSE', '14840', 'PCP.J', 'pcpja', '2');
INSERT INTO `dm_gerencia` VALUES ('52', 'DESARROLLO SOCIAL', 'JOSE', '14613', 'DS.J', 'dicja', '2');
INSERT INTO `dm_gerencia` VALUES ('53', 'DIRECCIÓN DE PROYECTO', 'JOSE', '11243', 'DP.J', 'tejaa', '2');
INSERT INTO `dm_gerencia` VALUES ('54', 'FINANZAS', 'JOSE', '14801', 'FI.J', 'fijaa', '2');
INSERT INTO `dm_gerencia` VALUES ('55', 'GERENCIA GENERAL', 'JOSE', '14800', 'GG.J', 'ggjaa', '1');
INSERT INTO `dm_gerencia` VALUES ('56', 'MANTENIMIENTO', 'JOSE', '14269', 'MANT.J', 'majaa', '2');
INSERT INTO `dm_gerencia` VALUES ('57', 'MATERIALES', 'JOSE', '12225', 'MAT.J', 'mtjaa', '2');
INSERT INTO `dm_gerencia` VALUES ('58', 'PRODUCCIÓN', 'JOSE', '14247', 'PROD.J', 'prjaa', '2');
INSERT INTO `dm_gerencia` VALUES ('59', 'GESTIÓN HUMANA', 'JOSE', '14889', 'RRHH.J', 'rhhj', '2');
INSERT INTO `dm_gerencia` VALUES ('60', 'SEGURIDAD INDUSTRIAL, AMBIENTE E  HIGIENE', 'JOSE', '14233', 'SHA.J', 'shaja', '2');
INSERT INTO `dm_gerencia` VALUES ('61', 'SERVICIOS GENERALES', 'JOSE', '14827', 'SG.J', 'sgjaa', '2');
INSERT INTO `dm_gerencia` VALUES ('62', 'SISTEMA INTEGRADO DE GESTIÓN', 'JOSE', '14894', 'SIG.J', 'sigco', '1');
INSERT INTO `dm_gerencia` VALUES ('63', 'TÉCNICA', 'JOSE', '14226', 'TEC.J', 'tejaa', '2');
INSERT INTO `dm_gerencia` VALUES ('64', 'ADMINISTRACIÓN COMERCIAL', 'MORON', '12709', 'UCOM.M', 'gfiac', '2');
INSERT INTO `dm_gerencia` VALUES ('65', 'ESTIMACIÓN DE COSTOS', 'MORON', '0', 'EC.M', 'escmo', '2');
INSERT INTO `dm_gerencia` VALUES ('66', 'TI', 'MORON', '11903', 'AIT.M', 'aitmo', '2');
INSERT INTO `dm_gerencia` VALUES ('67', 'ASUNTOS LEGALES', 'MORON', '11030', 'AL.M', 'alcpm', '2');
INSERT INTO `dm_gerencia` VALUES ('68', 'SALUD', 'MORON', '12820', 'AM.M', 'salmo', '2');
INSERT INTO `dm_gerencia` VALUES ('69', 'ASUNTOS PÚBLICOS', 'MORON', '11025', 'AP.M', 'aappm', '2');
INSERT INTO `dm_gerencia` VALUES ('70', 'AUDITORÍA INTERNA', 'MORON', '11055', 'AI.M', 'aifec', '2');
INSERT INTO `dm_gerencia` VALUES ('71', 'FORMACIÓN Y CAPACITACIÓN', 'MORON', '12005', 'FO.M', 'captc', '2');
INSERT INTO `dm_gerencia` VALUES ('72', 'COMERCIO EXTERIOR', 'MORON', '12615', 'UIPS.M', 'ipslc', '1');
INSERT INTO `dm_gerencia` VALUES ('73', 'PREVENCIÓN Y CONTROL DE PÉRDIDAS', 'MORON', '12840', 'PCP.M', 'pcpmo', '2');
INSERT INTO `dm_gerencia` VALUES ('74', 'DESARROLLO SOCIAL', 'MORON', '12150', 'DS.M', 'desmo', '2');
INSERT INTO `dm_gerencia` VALUES ('75', 'DIRECCIÓN DE PROYECTO', 'MORON', '0', 'DP.M', 'gprym', '1');
INSERT INTO `dm_gerencia` VALUES ('76', 'FINANZAS', 'MORON', '12801', 'FI.M', 'ficpm', '2');
INSERT INTO `dm_gerencia` VALUES ('77', 'GERENCIA GENERAL', 'MORON', '12101', 'GG.M', 'ggmor', '1');
INSERT INTO `dm_gerencia` VALUES ('78', 'LOGÍSTICA', 'MORON', '12703', 'ULOG.M', 'glogc', '1');
INSERT INTO `dm_gerencia` VALUES ('79', 'MANTENIMIENTO', 'MORON', '12164', 'MANT.M', 'manmo', '2');
INSERT INTO `dm_gerencia` VALUES ('80', 'MATERIALES', 'MORON', '12225', 'MAT.M', 'manmo', '2');
INSERT INTO `dm_gerencia` VALUES ('81', 'MERCADEO', 'MORON', '12614', 'UMER.M', 'gmerun', '2');
INSERT INTO `dm_gerencia` VALUES ('82', 'PLANIFICACIÓN', 'MORON', '12618', 'UPLA.M', 'ufpla', '2');
INSERT INTO `dm_gerencia` VALUES ('83', 'PLANTA DE DISTRIBUCIÓN TERMINAL BORBURATA', 'MORON', '14627', 'UBOR.M', 'pidtb', '2');
INSERT INTO `dm_gerencia` VALUES ('84', 'PRODUCCIÓN', 'MORON', '12112', 'PROD.M', 'prodmo', '2');
INSERT INTO `dm_gerencia` VALUES ('85', 'GESTIÓN HUMANA', 'MORON', '12807', 'RRHH.M', 'rhhm', '2');
INSERT INTO `dm_gerencia` VALUES ('86', 'SEGURIDAD INDUSTRIAL, AMBIENTE E  HIGIENE', 'MORON', '12306', 'SHA.M', 'shamo', '2');
INSERT INTO `dm_gerencia` VALUES ('87', 'SERVICIOS GENERALES', 'MORON', '12814', 'SG.M', 'adsmo', '2');
INSERT INTO `dm_gerencia` VALUES ('88', 'SISTEMA INTEGRADO DE GESTIÓN', 'MORON', '12894', 'SIG.M', 'sigco', '1');
INSERT INTO `dm_gerencia` VALUES ('89', 'SUMINISTRO', 'MORON', '12119', 'SUM.M', 'summo', '2');
INSERT INTO `dm_gerencia` VALUES ('90', 'TÉCNICA', 'MORON', '12316', 'TEC.M', 'tecmo', '2');
INSERT INTO `dm_gerencia` VALUES ('91', 'UNFER', 'MORON', '12600', 'UFER.M', 'unfer', '1');
INSERT INTO `dm_gerencia` VALUES ('92', 'UNPI/COPEQUIN', 'JOSE', '14600', 'UCPI.M', 'gunpi', '1');
INSERT INTO `dm_gerencia` VALUES ('94', 'TRANSPORTE AÉREO', 'CORPORATIVO', '0', 'TA.M', 'traae', '1');
INSERT INTO `dm_gerencia` VALUES ('93', 'GERENCIA GENERAL', 'AMC', '0', 'GG.M', 'ggamc', '1');
INSERT INTO `dm_gerencia` VALUES ('98', 'ASIGNADOS', 'CORPORATIVO', '11810', 'ASIG.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('96', 'ASIGNADOS', 'AMC', '13810', 'ASIG.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('97', 'ASIGNADOS', 'JOSE', '14844', 'ASIG.J', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('95', 'ASIGNADOS', 'MORON', '12810', 'ASIG.M', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('100', 'ESTIMACIÓN DE COSTOS', 'JOSE', '14015', 'EC.J', 'ecjaa', '2');
INSERT INTO `dm_gerencia` VALUES ('99', 'ESTIMACIÓN DE COSTOS', 'AMC', '13015', 'EC.A', 'ecamc', '2');
INSERT INTO `dm_gerencia` VALUES ('101', 'ESTIMACIÓN DE COSTOS', 'CORPORATIVO', '11015', 'EC.V', 'escco', '1');
INSERT INTO `dm_gerencia` VALUES ('102', 'PROYECTOS OPERACIONALES', 'AMC', '13253', 'PO.A', 'pryop', '2');
INSERT INTO `dm_gerencia` VALUES ('103', 'PLANIFICACIÓN Y NUEVOS DESARROLLOS', 'AMC', '13349', 'PND.A', 'pndco', '1');
INSERT INTO `dm_gerencia` VALUES ('105', 'PLANIFICACIÓN Y NUEVOS DESARROLLOS', 'JOSE', '14350', 'PND.J', 'pndco', '1');
INSERT INTO `dm_gerencia` VALUES ('104', 'PLANIFICACIÓN Y NUEVOS DESARROLLOS', 'MORON', '12350', 'PND.M', 'pndco', '1');
INSERT INTO `dm_gerencia` VALUES ('106', 'TECNOLOGÍA Y NVOS.DESARROLLOS', 'MORON', '12619', 'TND.M', 'gtecnd', '2');
INSERT INTO `dm_gerencia` VALUES ('107', 'CONTRATACIONES', 'AMC', '13165', 'CT.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('108', 'CONTRATACIONES', 'JOSE', '14830', 'CT.J', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('109', 'CONTRATACIONES', 'MORON', '12057', 'CT.M', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('110', 'CONFIABILIDAD', 'MORON', '12240', 'CF.M', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('111', 'CONFIABILIDAD', 'AMC', '13008', 'CF.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('112', 'PARADA DE PLANTAS', 'AMC', '13104', 'PP.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('113', 'DIRECCIÓN COMERCIAL', 'CORPORATIVO', '11058', 'DC.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('114', 'DIRECCIÓN EJECUTIVA DE GESTIÓN Y PROTECCIÓN INTEGRAL', 'CORPORATIVO', '11059', 'DEGPI.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('115', 'DIRECCIÓN NACIONAL DE OPERACIONES PETROQUÍMICAS', 'CORPORATIVO', '11060', 'DNOP.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('116', 'PROTECCIÓN EMPRESARIAL', 'CORPORATIVO', '11843', 'PCP.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('117', 'GERENCIA DE PRODUCCIÓN FERTILIZANTES', 'JOSE', '14802', 'FERT-GPF.J', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('118', 'DIREC EJC PLANIF EVAL Y CONTR DE GESTION', 'CORPORATIVO', '11061', 'DEPCJ.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('119', 'GCIA CORP PLAN EVAL Y CONTR DE EEMM Y FL', 'CORPORATIVO', '11062', 'GCPECEMF.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('120', 'PALMICHAL- OFICINA PRINCIPAL', 'CORPORATIVO', '11160', 'POP.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('121', 'PALMICHAL-GCIA OPERA REG CENTRAL', 'MORON', '12009', 'PGORC.M', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('122', 'PALMICHAL-GCIA OCCIDENTE', 'AMC', '13009', 'PGOC.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('123', 'PALMICHAL-GCIA ORIENTE', 'JOSE', '14009', 'PGOR.A', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('124', 'GCIA. CORP. DE CONTRALORIA FINANCIERA', 'CORPORATIVO', '11102', 'CF.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('125', 'GCIA. CORP. DE PLANIF.Y C. DE G. DE FNZ', 'CORPORATIVO', '11103', 'PCF.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('126', 'GCIA. CORP. DE COSTOS Y EVAL. ECONÓMICAS', 'CORPORATIVO', '11104', 'CEE.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('127', 'Gcia. Corp. EEMMFF  y  Asoc. Especiales.', 'CORPORATIVO', '11064', 'EEAE.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('128', 'GCIA.DE SEGUIMIENTO Y CONT. PRESIDENCIAL', 'CORPORATIVO', '11063', 'GSCP.V', 'NA', '0');
INSERT INTO `dm_gerencia` VALUES ('129', 'SUPERINTENDENCIA DE PARADAS DE PLANTAS Y PROYECTOS MAYORES', 'JOSE', '14051', 'SPPM.J', 'NA', '0');

-- ----------------------------
-- Table structure for dm_instalaciones
-- ----------------------------
DROP TABLE IF EXISTS `dm_instalaciones`;
CREATE TABLE `dm_instalaciones` (
  `intslacionesId` int(11) NOT NULL AUTO_INCREMENT,
  `complejoId` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `codSap` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`intslacionesId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Es la tabla que almacenta las instalaciones de una categoria de negocios (Complejo o emplazamiento)\r\nlas instalaciones son las Gerencias de 1ra linea en los sectores Administrativos';

-- ----------------------------
-- Records of dm_instalaciones
-- ----------------------------

-- ----------------------------
-- Table structure for dm_instalaciones_custodio
-- ----------------------------
DROP TABLE IF EXISTS `dm_instalaciones_custodio`;
CREATE TABLE `dm_instalaciones_custodio` (
  `instalacionesCustorioId` int(11) NOT NULL AUTO_INCREMENT,
  `intslacionesId` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `custodioNumPersonal` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`instalacionesCustorioId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_instalaciones_custodio
-- ----------------------------

-- ----------------------------
-- Table structure for dm_modulos
-- ----------------------------
DROP TABLE IF EXISTS `dm_modulos`;
CREATE TABLE `dm_modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enlace` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `modulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dm_modulos
-- ----------------------------
INSERT INTO `dm_modulos` VALUES ('1', 'Invoice', 'Create and Modify invoices', 'Customer');
INSERT INTO `dm_modulos` VALUES ('2', 'Estimate', 'Create and Modify Estimates', 'Customer');
INSERT INTO `dm_modulos` VALUES ('3', 'Customer Returns', 'Create and Modify Customer Returns', 'Customer');
INSERT INTO `dm_modulos` VALUES ('4', 'Service Order', 'Create and Modify Service Order', 'Customer');
INSERT INTO `dm_modulos` VALUES ('5', 'Customers', 'Create and Modify Customer ', 'Customer');
INSERT INTO `dm_modulos` VALUES ('6', 'Customers  Reports', 'Customers  Reports', 'Customer');
INSERT INTO `dm_modulos` VALUES ('7', 'Cash register', 'Create and Modify Cash register', 'Cash and banks');
INSERT INTO `dm_modulos` VALUES ('8', 'Banks', 'Create and Modify Banks', 'Cash and banks');
INSERT INTO `dm_modulos` VALUES ('9', 'Cash and banks Reports', 'Cash and banks Reports', 'Cash and banks');
INSERT INTO `dm_modulos` VALUES ('10', 'Company', 'Company Setup', 'Settings');
INSERT INTO `dm_modulos` VALUES ('11', 'System Users', 'Creation and Modification of Users', 'Settings');
INSERT INTO `dm_modulos` VALUES ('12', 'System roles', 'Assignment of roles to the User', 'Settings');
INSERT INTO `dm_modulos` VALUES ('13', 'Products', 'Products and services', 'Inventory');

-- ----------------------------
-- Table structure for dm_municipios
-- ----------------------------
DROP TABLE IF EXISTS `dm_municipios`;
CREATE TABLE `dm_municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_municipio`) USING BTREE,
  KEY `id_estado` (`id_estado`) USING BTREE,
  CONSTRAINT `dm_municipios_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `dm_estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dm_municipios
-- ----------------------------
INSERT INTO `dm_municipios` VALUES ('1', '1', 'Alto Orinoco');
INSERT INTO `dm_municipios` VALUES ('2', '1', 'Atabapo');
INSERT INTO `dm_municipios` VALUES ('3', '1', 'Atures');
INSERT INTO `dm_municipios` VALUES ('4', '1', 'Autana');
INSERT INTO `dm_municipios` VALUES ('5', '1', 'Manapiare');
INSERT INTO `dm_municipios` VALUES ('6', '1', 'Maroa');
INSERT INTO `dm_municipios` VALUES ('7', '1', 'Río Negro');
INSERT INTO `dm_municipios` VALUES ('8', '2', 'Anaco');
INSERT INTO `dm_municipios` VALUES ('9', '2', 'Aragua');
INSERT INTO `dm_municipios` VALUES ('10', '2', 'Manuel Ezequiel Bruzual');
INSERT INTO `dm_municipios` VALUES ('11', '2', 'Diego Bautista Urbaneja');
INSERT INTO `dm_municipios` VALUES ('12', '2', 'Fernando Peñalver');
INSERT INTO `dm_municipios` VALUES ('13', '2', 'Francisco Del Carmen Carvajal');
INSERT INTO `dm_municipios` VALUES ('14', '2', 'General Sir Arthur McGregor');
INSERT INTO `dm_municipios` VALUES ('15', '2', 'Guanta');
INSERT INTO `dm_municipios` VALUES ('16', '2', 'Independencia');
INSERT INTO `dm_municipios` VALUES ('17', '2', 'Jose Gregorio Monagas');
INSERT INTO `dm_municipios` VALUES ('18', '2', 'Juan Antonio Sotillo');
INSERT INTO `dm_municipios` VALUES ('19', '2', 'Juan Manuel Cajigal');
INSERT INTO `dm_municipios` VALUES ('20', '2', 'Libertad');
INSERT INTO `dm_municipios` VALUES ('21', '2', 'Francisco de Miranda');
INSERT INTO `dm_municipios` VALUES ('22', '2', 'Pedro María Freites');
INSERT INTO `dm_municipios` VALUES ('23', '2', 'Píritu');
INSERT INTO `dm_municipios` VALUES ('24', '2', 'San Jose de Guanipa');
INSERT INTO `dm_municipios` VALUES ('25', '2', 'San Juan de Capistrano');
INSERT INTO `dm_municipios` VALUES ('26', '2', 'Santa Ana');
INSERT INTO `dm_municipios` VALUES ('27', '2', 'Simón Bolívar');
INSERT INTO `dm_municipios` VALUES ('28', '2', 'Simón Rodríguez');
INSERT INTO `dm_municipios` VALUES ('29', '3', 'Achaguas');
INSERT INTO `dm_municipios` VALUES ('30', '3', 'Biruaca');
INSERT INTO `dm_municipios` VALUES ('31', '3', 'Muñóz');
INSERT INTO `dm_municipios` VALUES ('32', '3', 'paez');
INSERT INTO `dm_municipios` VALUES ('33', '3', 'Pedro Camejo');
INSERT INTO `dm_municipios` VALUES ('34', '3', 'Rómulo Gallegos');
INSERT INTO `dm_municipios` VALUES ('35', '3', 'San Fernando');
INSERT INTO `dm_municipios` VALUES ('36', '4', 'Atanasio Girardot');
INSERT INTO `dm_municipios` VALUES ('37', '4', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('38', '4', 'Camatagua');
INSERT INTO `dm_municipios` VALUES ('39', '4', 'Francisco Linares Alcántara');
INSERT INTO `dm_municipios` VALUES ('40', '4', 'Jose Ángel Lamas');
INSERT INTO `dm_municipios` VALUES ('41', '4', 'Jose Felix Ribas');
INSERT INTO `dm_municipios` VALUES ('42', '4', 'Jose Rafael Revenga');
INSERT INTO `dm_municipios` VALUES ('43', '4', 'Libertador');
INSERT INTO `dm_municipios` VALUES ('44', '4', 'Mario Briceño Iragorry');
INSERT INTO `dm_municipios` VALUES ('45', '4', 'Ocumare de la Costa de Oro');
INSERT INTO `dm_municipios` VALUES ('46', '4', 'San Casimiro');
INSERT INTO `dm_municipios` VALUES ('47', '4', 'San Sebastián');
INSERT INTO `dm_municipios` VALUES ('48', '4', 'Santiago Mariño');
INSERT INTO `dm_municipios` VALUES ('49', '4', 'Santos Michelena');
INSERT INTO `dm_municipios` VALUES ('50', '4', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('51', '4', 'Tovar');
INSERT INTO `dm_municipios` VALUES ('52', '4', 'Urdaneta');
INSERT INTO `dm_municipios` VALUES ('53', '4', 'Zamora');
INSERT INTO `dm_municipios` VALUES ('54', '5', 'Alberto Arvelo Torrealba');
INSERT INTO `dm_municipios` VALUES ('55', '5', 'Andres Eloy Blanco');
INSERT INTO `dm_municipios` VALUES ('56', '5', 'Antonio Jose de Sucre');
INSERT INTO `dm_municipios` VALUES ('57', '5', 'Arismendi');
INSERT INTO `dm_municipios` VALUES ('58', '5', 'Barinas');
INSERT INTO `dm_municipios` VALUES ('59', '5', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('60', '5', 'Cruz Paredes');
INSERT INTO `dm_municipios` VALUES ('61', '5', 'Ezequiel Zamora');
INSERT INTO `dm_municipios` VALUES ('62', '5', 'Obispos');
INSERT INTO `dm_municipios` VALUES ('63', '5', 'Pedraza');
INSERT INTO `dm_municipios` VALUES ('64', '5', 'Rojas');
INSERT INTO `dm_municipios` VALUES ('65', '5', 'Sosa');
INSERT INTO `dm_municipios` VALUES ('66', '6', 'Caroní');
INSERT INTO `dm_municipios` VALUES ('67', '6', 'Cedeño');
INSERT INTO `dm_municipios` VALUES ('68', '6', 'El Callao');
INSERT INTO `dm_municipios` VALUES ('69', '6', 'Gran Sabana');
INSERT INTO `dm_municipios` VALUES ('70', '6', 'Heres');
INSERT INTO `dm_municipios` VALUES ('71', '6', 'Piar');
INSERT INTO `dm_municipios` VALUES ('72', '6', 'Angostura (Raúl Leoni)');
INSERT INTO `dm_municipios` VALUES ('73', '6', 'Roscio');
INSERT INTO `dm_municipios` VALUES ('74', '6', 'Sifontes');
INSERT INTO `dm_municipios` VALUES ('75', '6', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('76', '6', 'Padre Pedro Chien');
INSERT INTO `dm_municipios` VALUES ('77', '7', 'Bejuma');
INSERT INTO `dm_municipios` VALUES ('78', '7', 'Carlos Arvelo');
INSERT INTO `dm_municipios` VALUES ('79', '7', 'Diego Ibarra');
INSERT INTO `dm_municipios` VALUES ('80', '7', 'Guacara');
INSERT INTO `dm_municipios` VALUES ('81', '7', 'Juan Jose Mora');
INSERT INTO `dm_municipios` VALUES ('82', '7', 'Libertador');
INSERT INTO `dm_municipios` VALUES ('83', '7', 'Los Guayos');
INSERT INTO `dm_municipios` VALUES ('84', '7', 'Miranda');
INSERT INTO `dm_municipios` VALUES ('85', '7', 'Montalbán');
INSERT INTO `dm_municipios` VALUES ('86', '7', 'Naguanagua');
INSERT INTO `dm_municipios` VALUES ('87', '7', 'Puerto Cabello');
INSERT INTO `dm_municipios` VALUES ('88', '7', 'San Diego');
INSERT INTO `dm_municipios` VALUES ('89', '7', 'San Joaquín');
INSERT INTO `dm_municipios` VALUES ('90', '7', 'Valencia');
INSERT INTO `dm_municipios` VALUES ('91', '8', 'Anzoátegui');
INSERT INTO `dm_municipios` VALUES ('92', '8', 'Tinaquillo');
INSERT INTO `dm_municipios` VALUES ('93', '8', 'Girardot');
INSERT INTO `dm_municipios` VALUES ('94', '8', 'Lima Blanco');
INSERT INTO `dm_municipios` VALUES ('95', '8', 'Pao de San Juan Bautista');
INSERT INTO `dm_municipios` VALUES ('96', '8', 'Ricaurte');
INSERT INTO `dm_municipios` VALUES ('97', '8', 'Rómulo Gallegos');
INSERT INTO `dm_municipios` VALUES ('98', '8', 'San Carlos');
INSERT INTO `dm_municipios` VALUES ('99', '8', 'Tinaco');
INSERT INTO `dm_municipios` VALUES ('100', '9', 'Antonio Díaz');
INSERT INTO `dm_municipios` VALUES ('101', '9', 'Casacoima');
INSERT INTO `dm_municipios` VALUES ('102', '9', 'Pedernales');
INSERT INTO `dm_municipios` VALUES ('103', '9', 'Tucupita');
INSERT INTO `dm_municipios` VALUES ('104', '10', 'Acosta');
INSERT INTO `dm_municipios` VALUES ('105', '10', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('106', '10', 'Buchivacoa');
INSERT INTO `dm_municipios` VALUES ('107', '10', 'Cacique Manaure');
INSERT INTO `dm_municipios` VALUES ('108', '10', 'Carirubana');
INSERT INTO `dm_municipios` VALUES ('109', '10', 'Colina');
INSERT INTO `dm_municipios` VALUES ('110', '10', 'Dabajuro');
INSERT INTO `dm_municipios` VALUES ('111', '10', 'Democracia');
INSERT INTO `dm_municipios` VALUES ('112', '10', 'Falcón');
INSERT INTO `dm_municipios` VALUES ('113', '10', 'Federación');
INSERT INTO `dm_municipios` VALUES ('114', '10', 'Jacura');
INSERT INTO `dm_municipios` VALUES ('115', '10', 'Jose Laurencio Silva');
INSERT INTO `dm_municipios` VALUES ('116', '10', 'Los Taques');
INSERT INTO `dm_municipios` VALUES ('117', '10', 'Mauroa');
INSERT INTO `dm_municipios` VALUES ('118', '10', 'Miranda');
INSERT INTO `dm_municipios` VALUES ('119', '10', 'Monseñor Iturriza');
INSERT INTO `dm_municipios` VALUES ('120', '10', 'Palmasola');
INSERT INTO `dm_municipios` VALUES ('121', '10', 'Petit');
INSERT INTO `dm_municipios` VALUES ('122', '10', 'Píritu');
INSERT INTO `dm_municipios` VALUES ('123', '10', 'San Francisco');
INSERT INTO `dm_municipios` VALUES ('124', '10', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('125', '10', 'Tocópero');
INSERT INTO `dm_municipios` VALUES ('126', '10', 'Unión');
INSERT INTO `dm_municipios` VALUES ('127', '10', 'Urumaco');
INSERT INTO `dm_municipios` VALUES ('128', '10', 'Zamora');
INSERT INTO `dm_municipios` VALUES ('129', '11', 'Camaguán');
INSERT INTO `dm_municipios` VALUES ('130', '11', 'Chaguaramas');
INSERT INTO `dm_municipios` VALUES ('131', '11', 'El Socorro');
INSERT INTO `dm_municipios` VALUES ('132', '11', 'Jose Felix Ribas');
INSERT INTO `dm_municipios` VALUES ('133', '11', 'Jose Tadeo Monagas');
INSERT INTO `dm_municipios` VALUES ('134', '11', 'Juan Germán Roscio');
INSERT INTO `dm_municipios` VALUES ('135', '11', 'Julián Mellado');
INSERT INTO `dm_municipios` VALUES ('136', '11', 'Las Mercedes');
INSERT INTO `dm_municipios` VALUES ('137', '11', 'Leonardo Infante');
INSERT INTO `dm_municipios` VALUES ('138', '11', 'Pedro Zaraza');
INSERT INTO `dm_municipios` VALUES ('139', '11', 'Ortíz');
INSERT INTO `dm_municipios` VALUES ('140', '11', 'San Gerónimo de Guayabal');
INSERT INTO `dm_municipios` VALUES ('141', '11', 'San Jose de Guaribe');
INSERT INTO `dm_municipios` VALUES ('142', '11', 'Santa María de Ipire');
INSERT INTO `dm_municipios` VALUES ('143', '11', 'Sebastián Francisco de Miranda');
INSERT INTO `dm_municipios` VALUES ('144', '12', 'Andres Eloy Blanco');
INSERT INTO `dm_municipios` VALUES ('145', '12', 'Crespo');
INSERT INTO `dm_municipios` VALUES ('146', '12', 'Iribarren');
INSERT INTO `dm_municipios` VALUES ('147', '12', 'Jimenez');
INSERT INTO `dm_municipios` VALUES ('148', '12', 'Morán');
INSERT INTO `dm_municipios` VALUES ('149', '12', 'Palavecino');
INSERT INTO `dm_municipios` VALUES ('150', '12', 'Simón Planas');
INSERT INTO `dm_municipios` VALUES ('151', '12', 'Torres');
INSERT INTO `dm_municipios` VALUES ('152', '12', 'Urdaneta');
INSERT INTO `dm_municipios` VALUES ('179', '13', 'Alberto Adriani');
INSERT INTO `dm_municipios` VALUES ('180', '13', 'Andres Bello');
INSERT INTO `dm_municipios` VALUES ('181', '13', 'Antonio Pinto Salinas');
INSERT INTO `dm_municipios` VALUES ('182', '13', 'Aricagua');
INSERT INTO `dm_municipios` VALUES ('183', '13', 'Arzobispo Chacón');
INSERT INTO `dm_municipios` VALUES ('184', '13', 'Campo Elías');
INSERT INTO `dm_municipios` VALUES ('185', '13', 'Caracciolo Parra Olmedo');
INSERT INTO `dm_municipios` VALUES ('186', '13', 'Cardenal Quintero');
INSERT INTO `dm_municipios` VALUES ('187', '13', 'Guaraque');
INSERT INTO `dm_municipios` VALUES ('188', '13', 'Julio Cesar Salas');
INSERT INTO `dm_municipios` VALUES ('189', '13', 'Justo Briceño');
INSERT INTO `dm_municipios` VALUES ('190', '13', 'Libertador');
INSERT INTO `dm_municipios` VALUES ('191', '13', 'Miranda');
INSERT INTO `dm_municipios` VALUES ('192', '13', 'Obispo Ramos de Lora');
INSERT INTO `dm_municipios` VALUES ('193', '13', 'Padre Noguera');
INSERT INTO `dm_municipios` VALUES ('194', '13', 'Pueblo Llano');
INSERT INTO `dm_municipios` VALUES ('195', '13', 'Rangel');
INSERT INTO `dm_municipios` VALUES ('196', '13', 'Rivas Dávila');
INSERT INTO `dm_municipios` VALUES ('197', '13', 'Santos Marquina');
INSERT INTO `dm_municipios` VALUES ('198', '13', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('199', '13', 'Tovar');
INSERT INTO `dm_municipios` VALUES ('200', '13', 'Tulio Febres Cordero');
INSERT INTO `dm_municipios` VALUES ('201', '13', 'Zea');
INSERT INTO `dm_municipios` VALUES ('223', '14', 'Acevedo');
INSERT INTO `dm_municipios` VALUES ('224', '14', 'Andres Bello');
INSERT INTO `dm_municipios` VALUES ('225', '14', 'Baruta');
INSERT INTO `dm_municipios` VALUES ('226', '14', 'Brión');
INSERT INTO `dm_municipios` VALUES ('227', '14', 'Buroz');
INSERT INTO `dm_municipios` VALUES ('228', '14', 'Carrizal');
INSERT INTO `dm_municipios` VALUES ('229', '14', 'Chacao');
INSERT INTO `dm_municipios` VALUES ('230', '14', 'Cristóbal Rojas');
INSERT INTO `dm_municipios` VALUES ('231', '14', 'El Hatillo');
INSERT INTO `dm_municipios` VALUES ('232', '14', 'Guaicaipuro');
INSERT INTO `dm_municipios` VALUES ('233', '14', 'Independencia');
INSERT INTO `dm_municipios` VALUES ('234', '14', 'Lander');
INSERT INTO `dm_municipios` VALUES ('235', '14', 'Los Salias');
INSERT INTO `dm_municipios` VALUES ('236', '14', 'paez');
INSERT INTO `dm_municipios` VALUES ('237', '14', 'Paz Castillo');
INSERT INTO `dm_municipios` VALUES ('238', '14', 'Pedro Gual');
INSERT INTO `dm_municipios` VALUES ('239', '14', 'Plaza');
INSERT INTO `dm_municipios` VALUES ('240', '14', 'Simón Bolívar');
INSERT INTO `dm_municipios` VALUES ('241', '14', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('242', '14', 'Urdaneta');
INSERT INTO `dm_municipios` VALUES ('243', '14', 'Zamora');
INSERT INTO `dm_municipios` VALUES ('258', '15', 'Acosta');
INSERT INTO `dm_municipios` VALUES ('259', '15', 'Aguasay');
INSERT INTO `dm_municipios` VALUES ('260', '15', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('261', '15', 'Caripe');
INSERT INTO `dm_municipios` VALUES ('262', '15', 'Cedeño');
INSERT INTO `dm_municipios` VALUES ('263', '15', 'Ezequiel Zamora');
INSERT INTO `dm_municipios` VALUES ('264', '15', 'Libertador');
INSERT INTO `dm_municipios` VALUES ('265', '15', 'Maturín');
INSERT INTO `dm_municipios` VALUES ('266', '15', 'Piar');
INSERT INTO `dm_municipios` VALUES ('267', '15', 'Punceres');
INSERT INTO `dm_municipios` VALUES ('268', '15', 'Santa Bárbara');
INSERT INTO `dm_municipios` VALUES ('269', '15', 'Sotillo');
INSERT INTO `dm_municipios` VALUES ('270', '15', 'Uracoa');
INSERT INTO `dm_municipios` VALUES ('271', '16', 'Antolín del Campo');
INSERT INTO `dm_municipios` VALUES ('272', '16', 'Arismendi');
INSERT INTO `dm_municipios` VALUES ('273', '16', 'García');
INSERT INTO `dm_municipios` VALUES ('274', '16', 'Gómez');
INSERT INTO `dm_municipios` VALUES ('275', '16', 'Maneiro');
INSERT INTO `dm_municipios` VALUES ('276', '16', 'Marcano');
INSERT INTO `dm_municipios` VALUES ('277', '16', 'Mariño');
INSERT INTO `dm_municipios` VALUES ('278', '16', 'Península de Macanao');
INSERT INTO `dm_municipios` VALUES ('279', '16', 'Tubores');
INSERT INTO `dm_municipios` VALUES ('280', '16', 'Villalba');
INSERT INTO `dm_municipios` VALUES ('281', '16', 'Díaz');
INSERT INTO `dm_municipios` VALUES ('282', '17', 'Agua Blanca');
INSERT INTO `dm_municipios` VALUES ('283', '17', 'Araure');
INSERT INTO `dm_municipios` VALUES ('284', '17', 'Esteller');
INSERT INTO `dm_municipios` VALUES ('285', '17', 'Guanare');
INSERT INTO `dm_municipios` VALUES ('286', '17', 'Guanarito');
INSERT INTO `dm_municipios` VALUES ('287', '17', 'Monseñor Jose Vicente de Unda');
INSERT INTO `dm_municipios` VALUES ('288', '17', 'Ospino');
INSERT INTO `dm_municipios` VALUES ('289', '17', 'paez');
INSERT INTO `dm_municipios` VALUES ('290', '17', 'Papelón');
INSERT INTO `dm_municipios` VALUES ('291', '17', 'San Genaro de Boconoíto');
INSERT INTO `dm_municipios` VALUES ('292', '17', 'San Rafael de Onoto');
INSERT INTO `dm_municipios` VALUES ('293', '17', 'Santa Rosalía');
INSERT INTO `dm_municipios` VALUES ('294', '17', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('295', '17', 'Turen');
INSERT INTO `dm_municipios` VALUES ('296', '18', 'Andres Eloy Blanco');
INSERT INTO `dm_municipios` VALUES ('297', '18', 'Andres Mata');
INSERT INTO `dm_municipios` VALUES ('298', '18', 'Arismendi');
INSERT INTO `dm_municipios` VALUES ('299', '18', 'Benítez');
INSERT INTO `dm_municipios` VALUES ('300', '18', 'Bermúdez');
INSERT INTO `dm_municipios` VALUES ('301', '18', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('302', '18', 'Cajigal');
INSERT INTO `dm_municipios` VALUES ('303', '18', 'Cruz Salmerón Acosta');
INSERT INTO `dm_municipios` VALUES ('304', '18', 'Libertador');
INSERT INTO `dm_municipios` VALUES ('305', '18', 'Mariño');
INSERT INTO `dm_municipios` VALUES ('306', '18', 'Mejía');
INSERT INTO `dm_municipios` VALUES ('307', '18', 'Montes');
INSERT INTO `dm_municipios` VALUES ('308', '18', 'Ribero');
INSERT INTO `dm_municipios` VALUES ('309', '18', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('310', '18', 'Valdez');
INSERT INTO `dm_municipios` VALUES ('341', '19', 'Andres Bello');
INSERT INTO `dm_municipios` VALUES ('342', '19', 'Antonio Rómulo Costa');
INSERT INTO `dm_municipios` VALUES ('343', '19', 'Ayacucho');
INSERT INTO `dm_municipios` VALUES ('344', '19', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('345', '19', 'Cárdenas');
INSERT INTO `dm_municipios` VALUES ('346', '19', 'Córdoba');
INSERT INTO `dm_municipios` VALUES ('347', '19', 'Fernández Feo');
INSERT INTO `dm_municipios` VALUES ('348', '19', 'Francisco de Miranda');
INSERT INTO `dm_municipios` VALUES ('349', '19', 'García de Hevia');
INSERT INTO `dm_municipios` VALUES ('350', '19', 'Guásimos');
INSERT INTO `dm_municipios` VALUES ('351', '19', 'Independencia');
INSERT INTO `dm_municipios` VALUES ('352', '19', 'Jáuregui');
INSERT INTO `dm_municipios` VALUES ('353', '19', 'Jose María Vargas');
INSERT INTO `dm_municipios` VALUES ('354', '19', 'Junín');
INSERT INTO `dm_municipios` VALUES ('355', '19', 'Libertad');
INSERT INTO `dm_municipios` VALUES ('356', '19', 'Libertador');
INSERT INTO `dm_municipios` VALUES ('357', '19', 'Lobatera');
INSERT INTO `dm_municipios` VALUES ('358', '19', 'Michelena');
INSERT INTO `dm_municipios` VALUES ('359', '19', 'Panamericano');
INSERT INTO `dm_municipios` VALUES ('360', '19', 'Pedro María Ureña');
INSERT INTO `dm_municipios` VALUES ('361', '19', 'Rafael Urdaneta');
INSERT INTO `dm_municipios` VALUES ('362', '19', 'Samuel Darío Maldonado');
INSERT INTO `dm_municipios` VALUES ('363', '19', 'San Cristóbal');
INSERT INTO `dm_municipios` VALUES ('364', '19', 'Seboruco');
INSERT INTO `dm_municipios` VALUES ('365', '19', 'Simón Rodríguez');
INSERT INTO `dm_municipios` VALUES ('366', '19', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('367', '19', 'Torbes');
INSERT INTO `dm_municipios` VALUES ('368', '19', 'Uribante');
INSERT INTO `dm_municipios` VALUES ('369', '19', 'San Judas Tadeo');
INSERT INTO `dm_municipios` VALUES ('370', '20', 'Andres Bello');
INSERT INTO `dm_municipios` VALUES ('371', '20', 'Boconó');
INSERT INTO `dm_municipios` VALUES ('372', '20', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('373', '20', 'Candelaria');
INSERT INTO `dm_municipios` VALUES ('374', '20', 'Carache');
INSERT INTO `dm_municipios` VALUES ('375', '20', 'Escuque');
INSERT INTO `dm_municipios` VALUES ('376', '20', 'Jose Felipe Márquez Cañizalez');
INSERT INTO `dm_municipios` VALUES ('377', '20', 'Juan Vicente Campos Elías');
INSERT INTO `dm_municipios` VALUES ('378', '20', 'La Ceiba');
INSERT INTO `dm_municipios` VALUES ('379', '20', 'Miranda');
INSERT INTO `dm_municipios` VALUES ('380', '20', 'Monte Carmelo');
INSERT INTO `dm_municipios` VALUES ('381', '20', 'Motatán');
INSERT INTO `dm_municipios` VALUES ('382', '20', 'Pampan');
INSERT INTO `dm_municipios` VALUES ('383', '20', 'Pampanito');
INSERT INTO `dm_municipios` VALUES ('384', '20', 'Rafael Rangel');
INSERT INTO `dm_municipios` VALUES ('385', '20', 'San Rafael de Carvajal');
INSERT INTO `dm_municipios` VALUES ('386', '20', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('387', '20', 'Trujillo');
INSERT INTO `dm_municipios` VALUES ('388', '20', 'Urdaneta');
INSERT INTO `dm_municipios` VALUES ('389', '20', 'Valera');
INSERT INTO `dm_municipios` VALUES ('390', '21', 'Vargas');
INSERT INTO `dm_municipios` VALUES ('391', '22', 'Arístides Bastidas');
INSERT INTO `dm_municipios` VALUES ('392', '22', 'Bolívar');
INSERT INTO `dm_municipios` VALUES ('407', '22', 'Bruzual');
INSERT INTO `dm_municipios` VALUES ('408', '22', 'Cocorote');
INSERT INTO `dm_municipios` VALUES ('409', '22', 'Independencia');
INSERT INTO `dm_municipios` VALUES ('410', '22', 'Jose Antonio paez');
INSERT INTO `dm_municipios` VALUES ('411', '22', 'La Trinidad');
INSERT INTO `dm_municipios` VALUES ('412', '22', 'Manuel Monge');
INSERT INTO `dm_municipios` VALUES ('413', '22', 'Nirgua');
INSERT INTO `dm_municipios` VALUES ('414', '22', 'Peña');
INSERT INTO `dm_municipios` VALUES ('415', '22', 'San Felipe');
INSERT INTO `dm_municipios` VALUES ('416', '22', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('417', '22', 'Urachiche');
INSERT INTO `dm_municipios` VALUES ('418', '22', 'Jose Joaquín Veroes');
INSERT INTO `dm_municipios` VALUES ('441', '23', 'Almirante Padilla');
INSERT INTO `dm_municipios` VALUES ('442', '23', 'Baralt');
INSERT INTO `dm_municipios` VALUES ('443', '23', 'Cabimas');
INSERT INTO `dm_municipios` VALUES ('444', '23', 'Catatumbo');
INSERT INTO `dm_municipios` VALUES ('445', '23', 'Colón');
INSERT INTO `dm_municipios` VALUES ('446', '23', 'Francisco Javier Pulgar');
INSERT INTO `dm_municipios` VALUES ('447', '23', 'paez');
INSERT INTO `dm_municipios` VALUES ('448', '23', 'Jesús Enrique Losada');
INSERT INTO `dm_municipios` VALUES ('449', '23', 'Jesús María Semprún');
INSERT INTO `dm_municipios` VALUES ('450', '23', 'La Cañada de Urdaneta');
INSERT INTO `dm_municipios` VALUES ('451', '23', 'Lagunillas');
INSERT INTO `dm_municipios` VALUES ('452', '23', 'Machiques de Perijá');
INSERT INTO `dm_municipios` VALUES ('453', '23', 'Mara');
INSERT INTO `dm_municipios` VALUES ('454', '23', 'Maracaibo');
INSERT INTO `dm_municipios` VALUES ('455', '23', 'Miranda');
INSERT INTO `dm_municipios` VALUES ('456', '23', 'Rosario de Perijá');
INSERT INTO `dm_municipios` VALUES ('457', '23', 'San Francisco');
INSERT INTO `dm_municipios` VALUES ('458', '23', 'Santa Rita');
INSERT INTO `dm_municipios` VALUES ('459', '23', 'Simón Bolívar');
INSERT INTO `dm_municipios` VALUES ('460', '23', 'Sucre');
INSERT INTO `dm_municipios` VALUES ('461', '23', 'Valmore Rodríguez');
INSERT INTO `dm_municipios` VALUES ('462', '24', 'Libertador');

-- ----------------------------
-- Table structure for dm_parroquias
-- ----------------------------
DROP TABLE IF EXISTS `dm_parroquias`;
CREATE TABLE `dm_parroquias` (
  `id_parroquia` int(11) NOT NULL AUTO_INCREMENT,
  `id_municipio` int(11) NOT NULL,
  `parroquia` varchar(250) NOT NULL,
  PRIMARY KEY (`id_parroquia`) USING BTREE,
  KEY `id_municipio` (`id_municipio`) USING BTREE,
  CONSTRAINT `dm_parroquias_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `dm_municipios` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1139 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dm_parroquias
-- ----------------------------
INSERT INTO `dm_parroquias` VALUES ('1', '1', 'Alto Orinoco');
INSERT INTO `dm_parroquias` VALUES ('2', '1', 'Huachamacare Acanaña');
INSERT INTO `dm_parroquias` VALUES ('3', '1', 'Marawaka Toky Shamanaña');
INSERT INTO `dm_parroquias` VALUES ('4', '1', 'Mavaka Mavaka');
INSERT INTO `dm_parroquias` VALUES ('5', '1', 'Sierra Parima Parimabe');
INSERT INTO `dm_parroquias` VALUES ('6', '2', 'Ucata Laja Lisa');
INSERT INTO `dm_parroquias` VALUES ('7', '2', 'Yapacana Macuruco');
INSERT INTO `dm_parroquias` VALUES ('8', '2', 'Caname Guarinuma');
INSERT INTO `dm_parroquias` VALUES ('9', '3', 'Fernando Girón Tovar');
INSERT INTO `dm_parroquias` VALUES ('10', '3', 'Luis Alberto Gómez');
INSERT INTO `dm_parroquias` VALUES ('11', '3', 'Pahueña Limón de Parhueña');
INSERT INTO `dm_parroquias` VALUES ('12', '3', 'Platanillal Platanillal');
INSERT INTO `dm_parroquias` VALUES ('13', '4', 'Samariapo');
INSERT INTO `dm_parroquias` VALUES ('14', '4', 'Sipapo');
INSERT INTO `dm_parroquias` VALUES ('15', '4', 'Munduapo');
INSERT INTO `dm_parroquias` VALUES ('16', '4', 'Guayapo');
INSERT INTO `dm_parroquias` VALUES ('17', '5', 'Alto Ventuari');
INSERT INTO `dm_parroquias` VALUES ('18', '5', 'Medio Ventuari');
INSERT INTO `dm_parroquias` VALUES ('19', '5', 'Bajo Ventuari');
INSERT INTO `dm_parroquias` VALUES ('20', '6', 'Victorino');
INSERT INTO `dm_parroquias` VALUES ('21', '6', 'Comunidad');
INSERT INTO `dm_parroquias` VALUES ('22', '7', 'Casiquiare');
INSERT INTO `dm_parroquias` VALUES ('23', '7', 'Cocuy');
INSERT INTO `dm_parroquias` VALUES ('24', '7', 'San Carlos de Río Negro');
INSERT INTO `dm_parroquias` VALUES ('25', '7', 'Solano');
INSERT INTO `dm_parroquias` VALUES ('26', '8', 'Anaco');
INSERT INTO `dm_parroquias` VALUES ('27', '8', 'San Joaquín');
INSERT INTO `dm_parroquias` VALUES ('28', '9', 'Cachipo');
INSERT INTO `dm_parroquias` VALUES ('29', '9', 'Aragua de Barcelona');
INSERT INTO `dm_parroquias` VALUES ('30', '11', 'Lechería');
INSERT INTO `dm_parroquias` VALUES ('31', '11', 'El Morro');
INSERT INTO `dm_parroquias` VALUES ('32', '12', 'Puerto Píritu');
INSERT INTO `dm_parroquias` VALUES ('33', '12', 'San Miguel');
INSERT INTO `dm_parroquias` VALUES ('34', '12', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('35', '13', 'Valle de Guanape');
INSERT INTO `dm_parroquias` VALUES ('36', '13', 'Santa Bárbara');
INSERT INTO `dm_parroquias` VALUES ('37', '14', 'El Chaparro');
INSERT INTO `dm_parroquias` VALUES ('38', '14', 'Tomás Alfaro');
INSERT INTO `dm_parroquias` VALUES ('39', '14', 'Calatrava');
INSERT INTO `dm_parroquias` VALUES ('40', '15', 'Guanta');
INSERT INTO `dm_parroquias` VALUES ('41', '15', 'Chorrerón');
INSERT INTO `dm_parroquias` VALUES ('42', '16', 'Mamo');
INSERT INTO `dm_parroquias` VALUES ('43', '16', 'Soledad');
INSERT INTO `dm_parroquias` VALUES ('44', '17', 'Mapire');
INSERT INTO `dm_parroquias` VALUES ('45', '17', 'Piar');
INSERT INTO `dm_parroquias` VALUES ('46', '17', 'Santa Clara');
INSERT INTO `dm_parroquias` VALUES ('47', '17', 'San Diego de Cabrutica');
INSERT INTO `dm_parroquias` VALUES ('48', '17', 'Uverito');
INSERT INTO `dm_parroquias` VALUES ('49', '17', 'Zuata');
INSERT INTO `dm_parroquias` VALUES ('50', '18', 'Puerto La Cruz');
INSERT INTO `dm_parroquias` VALUES ('51', '18', 'Pozuelos');
INSERT INTO `dm_parroquias` VALUES ('52', '19', 'Onoto');
INSERT INTO `dm_parroquias` VALUES ('53', '19', 'San Pablo');
INSERT INTO `dm_parroquias` VALUES ('54', '20', 'San Mateo');
INSERT INTO `dm_parroquias` VALUES ('55', '20', 'El Carito');
INSERT INTO `dm_parroquias` VALUES ('56', '20', 'Santa Ines');
INSERT INTO `dm_parroquias` VALUES ('57', '20', 'La Romereña');
INSERT INTO `dm_parroquias` VALUES ('58', '21', 'Atapirire');
INSERT INTO `dm_parroquias` VALUES ('59', '21', 'Boca del Pao');
INSERT INTO `dm_parroquias` VALUES ('60', '21', 'El Pao');
INSERT INTO `dm_parroquias` VALUES ('61', '21', 'Pariaguán');
INSERT INTO `dm_parroquias` VALUES ('62', '22', 'Cantaura');
INSERT INTO `dm_parroquias` VALUES ('63', '22', 'Libertador');
INSERT INTO `dm_parroquias` VALUES ('64', '22', 'Santa Rosa');
INSERT INTO `dm_parroquias` VALUES ('65', '22', 'Urica');
INSERT INTO `dm_parroquias` VALUES ('66', '23', 'Píritu');
INSERT INTO `dm_parroquias` VALUES ('67', '23', 'San Francisco');
INSERT INTO `dm_parroquias` VALUES ('68', '24', 'San Jose de Guanipa');
INSERT INTO `dm_parroquias` VALUES ('69', '25', 'Boca de Uchire');
INSERT INTO `dm_parroquias` VALUES ('70', '25', 'Boca de Chávez');
INSERT INTO `dm_parroquias` VALUES ('71', '26', 'Pueblo Nuevo');
INSERT INTO `dm_parroquias` VALUES ('72', '26', 'Santa Ana');
INSERT INTO `dm_parroquias` VALUES ('73', '27', 'Bergantín');
INSERT INTO `dm_parroquias` VALUES ('74', '27', 'Caigua');
INSERT INTO `dm_parroquias` VALUES ('75', '27', 'El Carmen');
INSERT INTO `dm_parroquias` VALUES ('76', '27', 'El Pilar');
INSERT INTO `dm_parroquias` VALUES ('77', '27', 'Naricual');
INSERT INTO `dm_parroquias` VALUES ('78', '27', 'San Crsitóbal');
INSERT INTO `dm_parroquias` VALUES ('79', '28', 'Edmundo Barrios');
INSERT INTO `dm_parroquias` VALUES ('80', '28', 'Miguel Otero Silva');
INSERT INTO `dm_parroquias` VALUES ('81', '29', 'Achaguas');
INSERT INTO `dm_parroquias` VALUES ('82', '29', 'Apurito');
INSERT INTO `dm_parroquias` VALUES ('83', '29', 'El Yagual');
INSERT INTO `dm_parroquias` VALUES ('84', '29', 'Guachara');
INSERT INTO `dm_parroquias` VALUES ('85', '29', 'Mucuritas');
INSERT INTO `dm_parroquias` VALUES ('86', '29', 'Queseras del medio');
INSERT INTO `dm_parroquias` VALUES ('87', '30', 'Biruaca');
INSERT INTO `dm_parroquias` VALUES ('88', '31', 'Bruzual');
INSERT INTO `dm_parroquias` VALUES ('89', '31', 'Mantecal');
INSERT INTO `dm_parroquias` VALUES ('90', '31', 'Quintero');
INSERT INTO `dm_parroquias` VALUES ('91', '31', 'Rincón Hondo');
INSERT INTO `dm_parroquias` VALUES ('92', '31', 'San Vicente');
INSERT INTO `dm_parroquias` VALUES ('93', '32', 'Guasdualito');
INSERT INTO `dm_parroquias` VALUES ('94', '32', 'Aramendi');
INSERT INTO `dm_parroquias` VALUES ('95', '32', 'El Amparo');
INSERT INTO `dm_parroquias` VALUES ('96', '32', 'San Camilo');
INSERT INTO `dm_parroquias` VALUES ('97', '32', 'Urdaneta');
INSERT INTO `dm_parroquias` VALUES ('98', '33', 'San Juan de Payara');
INSERT INTO `dm_parroquias` VALUES ('99', '33', 'Codazzi');
INSERT INTO `dm_parroquias` VALUES ('100', '33', 'Cunaviche');
INSERT INTO `dm_parroquias` VALUES ('101', '34', 'Elorza');
INSERT INTO `dm_parroquias` VALUES ('102', '34', 'La Trinidad');
INSERT INTO `dm_parroquias` VALUES ('103', '35', 'San Fernando');
INSERT INTO `dm_parroquias` VALUES ('104', '35', 'El Recreo');
INSERT INTO `dm_parroquias` VALUES ('105', '35', 'Peñalver');
INSERT INTO `dm_parroquias` VALUES ('106', '35', 'San Rafael de Atamaica');
INSERT INTO `dm_parroquias` VALUES ('107', '36', 'Pedro Jose Ovalles');
INSERT INTO `dm_parroquias` VALUES ('108', '36', 'Joaquín Crespo');
INSERT INTO `dm_parroquias` VALUES ('109', '36', 'Jose Casanova Godoy');
INSERT INTO `dm_parroquias` VALUES ('110', '36', 'Madre María de San Jose');
INSERT INTO `dm_parroquias` VALUES ('111', '36', 'Andres Eloy Blanco');
INSERT INTO `dm_parroquias` VALUES ('112', '36', 'Los Tacarigua');
INSERT INTO `dm_parroquias` VALUES ('113', '36', 'Las Delicias');
INSERT INTO `dm_parroquias` VALUES ('114', '36', 'Choroní');
INSERT INTO `dm_parroquias` VALUES ('115', '37', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('116', '38', 'Camatagua');
INSERT INTO `dm_parroquias` VALUES ('117', '38', 'Carmen de Cura');
INSERT INTO `dm_parroquias` VALUES ('118', '39', 'Santa Rita');
INSERT INTO `dm_parroquias` VALUES ('119', '39', 'Francisco de Miranda');
INSERT INTO `dm_parroquias` VALUES ('120', '39', 'Moseñor Feliciano González');
INSERT INTO `dm_parroquias` VALUES ('121', '40', 'Santa Cruz');
INSERT INTO `dm_parroquias` VALUES ('122', '41', 'Jose Felix Ribas');
INSERT INTO `dm_parroquias` VALUES ('123', '41', 'Castor Nieves Ríos');
INSERT INTO `dm_parroquias` VALUES ('124', '41', 'Las Guacamayas');
INSERT INTO `dm_parroquias` VALUES ('125', '41', 'Pao de Zárate');
INSERT INTO `dm_parroquias` VALUES ('126', '41', 'Zuata');
INSERT INTO `dm_parroquias` VALUES ('127', '42', 'Jose Rafael Revenga');
INSERT INTO `dm_parroquias` VALUES ('128', '43', 'Palo Negro');
INSERT INTO `dm_parroquias` VALUES ('129', '43', 'San Martín de Porres');
INSERT INTO `dm_parroquias` VALUES ('130', '44', 'El Limón');
INSERT INTO `dm_parroquias` VALUES ('131', '44', 'Caña de Azúcar');
INSERT INTO `dm_parroquias` VALUES ('132', '45', 'Ocumare de la Costa');
INSERT INTO `dm_parroquias` VALUES ('133', '46', 'San Casimiro');
INSERT INTO `dm_parroquias` VALUES ('134', '46', 'Gúiripa');
INSERT INTO `dm_parroquias` VALUES ('135', '46', 'Ollas de Caramacate');
INSERT INTO `dm_parroquias` VALUES ('136', '46', 'Valle Morín');
INSERT INTO `dm_parroquias` VALUES ('137', '47', 'San Sebastían');
INSERT INTO `dm_parroquias` VALUES ('138', '48', 'Turmero');
INSERT INTO `dm_parroquias` VALUES ('139', '48', 'Arevalo Aponte');
INSERT INTO `dm_parroquias` VALUES ('140', '48', 'Chuao');
INSERT INTO `dm_parroquias` VALUES ('141', '48', 'Samán de Gúere');
INSERT INTO `dm_parroquias` VALUES ('142', '48', 'Alfredo Pacheco Miranda');
INSERT INTO `dm_parroquias` VALUES ('143', '49', 'Santos Michelena');
INSERT INTO `dm_parroquias` VALUES ('144', '49', 'Tiara');
INSERT INTO `dm_parroquias` VALUES ('145', '50', 'Cagua');
INSERT INTO `dm_parroquias` VALUES ('146', '50', 'Bella Vista');
INSERT INTO `dm_parroquias` VALUES ('147', '51', 'Tovar');
INSERT INTO `dm_parroquias` VALUES ('148', '52', 'Urdaneta');
INSERT INTO `dm_parroquias` VALUES ('149', '52', 'Las Peñitas');
INSERT INTO `dm_parroquias` VALUES ('150', '52', 'San Francisco de Cara');
INSERT INTO `dm_parroquias` VALUES ('151', '52', 'Taguay');
INSERT INTO `dm_parroquias` VALUES ('152', '53', 'Zamora');
INSERT INTO `dm_parroquias` VALUES ('153', '53', 'Magdaleno');
INSERT INTO `dm_parroquias` VALUES ('154', '53', 'San Francisco de Asís');
INSERT INTO `dm_parroquias` VALUES ('155', '53', 'Valles de Tucutunemo');
INSERT INTO `dm_parroquias` VALUES ('156', '53', 'Augusto Mijares');
INSERT INTO `dm_parroquias` VALUES ('157', '54', 'Sabaneta');
INSERT INTO `dm_parroquias` VALUES ('158', '54', 'Juan Antonio Rodríguez Domínguez');
INSERT INTO `dm_parroquias` VALUES ('159', '55', 'El Cantón');
INSERT INTO `dm_parroquias` VALUES ('160', '55', 'Santa Cruz de Guacas');
INSERT INTO `dm_parroquias` VALUES ('161', '55', 'Puerto Vivas');
INSERT INTO `dm_parroquias` VALUES ('162', '56', 'Ticoporo');
INSERT INTO `dm_parroquias` VALUES ('163', '56', 'Nicolás Pulido');
INSERT INTO `dm_parroquias` VALUES ('164', '56', 'Andres Bello');
INSERT INTO `dm_parroquias` VALUES ('165', '57', 'Arismendi');
INSERT INTO `dm_parroquias` VALUES ('166', '57', 'Guadarrama');
INSERT INTO `dm_parroquias` VALUES ('167', '57', 'La Unión');
INSERT INTO `dm_parroquias` VALUES ('168', '57', 'San Antonio');
INSERT INTO `dm_parroquias` VALUES ('169', '58', 'Barinas');
INSERT INTO `dm_parroquias` VALUES ('170', '58', 'Alberto Arvelo Larriva');
INSERT INTO `dm_parroquias` VALUES ('171', '58', 'San Silvestre');
INSERT INTO `dm_parroquias` VALUES ('172', '58', 'Santa Ines');
INSERT INTO `dm_parroquias` VALUES ('173', '58', 'Santa Lucía');
INSERT INTO `dm_parroquias` VALUES ('174', '58', 'Torumos');
INSERT INTO `dm_parroquias` VALUES ('175', '58', 'El Carmen');
INSERT INTO `dm_parroquias` VALUES ('176', '58', 'Rómulo Betancourt');
INSERT INTO `dm_parroquias` VALUES ('177', '58', 'Corazón de Jesús');
INSERT INTO `dm_parroquias` VALUES ('178', '58', 'Ramón Ignacio Mendez');
INSERT INTO `dm_parroquias` VALUES ('179', '58', 'Alto Barinas');
INSERT INTO `dm_parroquias` VALUES ('180', '58', 'Manuel Palacio Fajardo');
INSERT INTO `dm_parroquias` VALUES ('181', '58', 'Juan Antonio Rodríguez Domínguez');
INSERT INTO `dm_parroquias` VALUES ('182', '58', 'Dominga Ortiz de paez');
INSERT INTO `dm_parroquias` VALUES ('183', '59', 'Barinitas');
INSERT INTO `dm_parroquias` VALUES ('184', '59', 'Altamira de Cáceres');
INSERT INTO `dm_parroquias` VALUES ('185', '59', 'Calderas');
INSERT INTO `dm_parroquias` VALUES ('186', '60', 'Barrancas');
INSERT INTO `dm_parroquias` VALUES ('187', '60', 'El Socorro');
INSERT INTO `dm_parroquias` VALUES ('188', '60', 'Mazparrito');
INSERT INTO `dm_parroquias` VALUES ('189', '61', 'Santa Bárbara');
INSERT INTO `dm_parroquias` VALUES ('190', '61', 'Pedro Briceño Mendez');
INSERT INTO `dm_parroquias` VALUES ('191', '61', 'Ramón Ignacio Mendez');
INSERT INTO `dm_parroquias` VALUES ('192', '61', 'Jose Ignacio del Pumar');
INSERT INTO `dm_parroquias` VALUES ('193', '62', 'Obispos');
INSERT INTO `dm_parroquias` VALUES ('194', '62', 'Guasimitos');
INSERT INTO `dm_parroquias` VALUES ('195', '62', 'El Real');
INSERT INTO `dm_parroquias` VALUES ('196', '62', 'La Luz');
INSERT INTO `dm_parroquias` VALUES ('197', '63', 'Ciudad Bolívia');
INSERT INTO `dm_parroquias` VALUES ('198', '63', 'Jose Ignacio Briceño');
INSERT INTO `dm_parroquias` VALUES ('199', '63', 'Jose Felix Ribas');
INSERT INTO `dm_parroquias` VALUES ('200', '63', 'paez');
INSERT INTO `dm_parroquias` VALUES ('201', '64', 'Libertad');
INSERT INTO `dm_parroquias` VALUES ('202', '64', 'Dolores');
INSERT INTO `dm_parroquias` VALUES ('203', '64', 'Santa Rosa');
INSERT INTO `dm_parroquias` VALUES ('204', '64', 'Palacio Fajardo');
INSERT INTO `dm_parroquias` VALUES ('205', '65', 'Ciudad de Nutrias');
INSERT INTO `dm_parroquias` VALUES ('206', '65', 'El Regalo');
INSERT INTO `dm_parroquias` VALUES ('207', '65', 'Puerto Nutrias');
INSERT INTO `dm_parroquias` VALUES ('208', '65', 'Santa Catalina');
INSERT INTO `dm_parroquias` VALUES ('209', '66', 'Cachamay');
INSERT INTO `dm_parroquias` VALUES ('210', '66', 'Chirica');
INSERT INTO `dm_parroquias` VALUES ('211', '66', 'Dalla Costa');
INSERT INTO `dm_parroquias` VALUES ('212', '66', 'Once de Abril');
INSERT INTO `dm_parroquias` VALUES ('213', '66', 'Simón Bolívar');
INSERT INTO `dm_parroquias` VALUES ('214', '66', 'Unare');
INSERT INTO `dm_parroquias` VALUES ('215', '66', 'Universidad');
INSERT INTO `dm_parroquias` VALUES ('216', '66', 'Vista al Sol');
INSERT INTO `dm_parroquias` VALUES ('217', '66', 'Pozo Verde');
INSERT INTO `dm_parroquias` VALUES ('218', '66', 'Yocoima');
INSERT INTO `dm_parroquias` VALUES ('219', '66', '5 de Julio');
INSERT INTO `dm_parroquias` VALUES ('220', '67', 'Cedeño');
INSERT INTO `dm_parroquias` VALUES ('221', '67', 'Altagracia');
INSERT INTO `dm_parroquias` VALUES ('222', '67', 'Ascensión Farreras');
INSERT INTO `dm_parroquias` VALUES ('223', '67', 'Guaniamo');
INSERT INTO `dm_parroquias` VALUES ('224', '67', 'La Urbana');
INSERT INTO `dm_parroquias` VALUES ('225', '67', 'Pijiguaos');
INSERT INTO `dm_parroquias` VALUES ('226', '68', 'El Callao');
INSERT INTO `dm_parroquias` VALUES ('227', '69', 'Gran Sabana');
INSERT INTO `dm_parroquias` VALUES ('228', '69', 'Ikabarú');
INSERT INTO `dm_parroquias` VALUES ('229', '70', 'Catedral');
INSERT INTO `dm_parroquias` VALUES ('230', '70', 'Zea');
INSERT INTO `dm_parroquias` VALUES ('231', '70', 'Orinoco');
INSERT INTO `dm_parroquias` VALUES ('232', '70', 'Jose Antonio paez');
INSERT INTO `dm_parroquias` VALUES ('233', '70', 'Marhuanta');
INSERT INTO `dm_parroquias` VALUES ('234', '70', 'Agua Salada');
INSERT INTO `dm_parroquias` VALUES ('235', '70', 'Vista Hermosa');
INSERT INTO `dm_parroquias` VALUES ('236', '70', 'La Sabanita');
INSERT INTO `dm_parroquias` VALUES ('237', '70', 'Panapana');
INSERT INTO `dm_parroquias` VALUES ('238', '71', 'Andres Eloy Blanco');
INSERT INTO `dm_parroquias` VALUES ('239', '71', 'Pedro Cova');
INSERT INTO `dm_parroquias` VALUES ('240', '72', 'Raúl Leoni');
INSERT INTO `dm_parroquias` VALUES ('241', '72', 'Barceloneta');
INSERT INTO `dm_parroquias` VALUES ('242', '72', 'Santa Bárbara');
INSERT INTO `dm_parroquias` VALUES ('243', '72', 'San Francisco');
INSERT INTO `dm_parroquias` VALUES ('244', '73', 'Roscio');
INSERT INTO `dm_parroquias` VALUES ('245', '73', 'Salóm');
INSERT INTO `dm_parroquias` VALUES ('246', '74', 'Sifontes');
INSERT INTO `dm_parroquias` VALUES ('247', '74', 'Dalla Costa');
INSERT INTO `dm_parroquias` VALUES ('248', '74', 'San Isidro');
INSERT INTO `dm_parroquias` VALUES ('249', '75', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('250', '75', 'Aripao');
INSERT INTO `dm_parroquias` VALUES ('251', '75', 'Guarataro');
INSERT INTO `dm_parroquias` VALUES ('252', '75', 'Las Majadas');
INSERT INTO `dm_parroquias` VALUES ('253', '75', 'Moitaco');
INSERT INTO `dm_parroquias` VALUES ('254', '76', 'Padre Pedro Chien');
INSERT INTO `dm_parroquias` VALUES ('255', '76', 'Río Grande');
INSERT INTO `dm_parroquias` VALUES ('256', '77', 'Bejuma');
INSERT INTO `dm_parroquias` VALUES ('257', '77', 'Canoabo');
INSERT INTO `dm_parroquias` VALUES ('258', '77', 'Simón Bolívar');
INSERT INTO `dm_parroquias` VALUES ('259', '78', 'Gúigúe');
INSERT INTO `dm_parroquias` VALUES ('260', '78', 'Carabobo');
INSERT INTO `dm_parroquias` VALUES ('261', '78', 'Tacarigua');
INSERT INTO `dm_parroquias` VALUES ('262', '79', 'Mariara');
INSERT INTO `dm_parroquias` VALUES ('263', '79', 'Aguas Calientes');
INSERT INTO `dm_parroquias` VALUES ('264', '80', 'Ciudad Alianza');
INSERT INTO `dm_parroquias` VALUES ('265', '80', 'Guacara');
INSERT INTO `dm_parroquias` VALUES ('266', '80', 'Yagua');
INSERT INTO `dm_parroquias` VALUES ('267', '81', 'Morón');
INSERT INTO `dm_parroquias` VALUES ('268', '81', 'Yagua');
INSERT INTO `dm_parroquias` VALUES ('269', '82', 'Tocuyito');
INSERT INTO `dm_parroquias` VALUES ('270', '82', 'Independencia');
INSERT INTO `dm_parroquias` VALUES ('271', '83', 'Los Guayos');
INSERT INTO `dm_parroquias` VALUES ('272', '84', 'Miranda');
INSERT INTO `dm_parroquias` VALUES ('273', '85', 'Montalbán');
INSERT INTO `dm_parroquias` VALUES ('274', '86', 'Naguanagua');
INSERT INTO `dm_parroquias` VALUES ('275', '87', 'Bartolome Salóm');
INSERT INTO `dm_parroquias` VALUES ('276', '87', 'Democracia');
INSERT INTO `dm_parroquias` VALUES ('277', '87', 'Fraternidad');
INSERT INTO `dm_parroquias` VALUES ('278', '87', 'Goaigoaza');
INSERT INTO `dm_parroquias` VALUES ('279', '87', 'Juan Jose Flores');
INSERT INTO `dm_parroquias` VALUES ('280', '87', 'Unión');
INSERT INTO `dm_parroquias` VALUES ('281', '87', 'Borburata');
INSERT INTO `dm_parroquias` VALUES ('282', '87', 'Patanemo');
INSERT INTO `dm_parroquias` VALUES ('283', '88', 'San Diego');
INSERT INTO `dm_parroquias` VALUES ('284', '89', 'San Joaquín');
INSERT INTO `dm_parroquias` VALUES ('285', '90', 'Candelaria');
INSERT INTO `dm_parroquias` VALUES ('286', '90', 'Catedral');
INSERT INTO `dm_parroquias` VALUES ('287', '90', 'El Socorro');
INSERT INTO `dm_parroquias` VALUES ('288', '90', 'Miguel Peña');
INSERT INTO `dm_parroquias` VALUES ('289', '90', 'Rafael Urdaneta');
INSERT INTO `dm_parroquias` VALUES ('290', '90', 'San Blas');
INSERT INTO `dm_parroquias` VALUES ('291', '90', 'San Jose');
INSERT INTO `dm_parroquias` VALUES ('292', '90', 'Santa Rosa');
INSERT INTO `dm_parroquias` VALUES ('293', '90', 'Negro Primero');
INSERT INTO `dm_parroquias` VALUES ('294', '91', 'Cojedes');
INSERT INTO `dm_parroquias` VALUES ('295', '91', 'Juan de Mata Suárez');
INSERT INTO `dm_parroquias` VALUES ('296', '92', 'Tinaquillo');
INSERT INTO `dm_parroquias` VALUES ('297', '93', 'El Baúl');
INSERT INTO `dm_parroquias` VALUES ('298', '93', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('299', '94', 'La Aguadita');
INSERT INTO `dm_parroquias` VALUES ('300', '94', 'Macapo');
INSERT INTO `dm_parroquias` VALUES ('301', '95', 'El Pao');
INSERT INTO `dm_parroquias` VALUES ('302', '96', 'El Amparo');
INSERT INTO `dm_parroquias` VALUES ('303', '96', 'Libertad de Cojedes');
INSERT INTO `dm_parroquias` VALUES ('304', '97', 'Rómulo Gallegos');
INSERT INTO `dm_parroquias` VALUES ('305', '98', 'San Carlos de Austria');
INSERT INTO `dm_parroquias` VALUES ('306', '98', 'Juan Ángel Bravo');
INSERT INTO `dm_parroquias` VALUES ('307', '98', 'Manuel Manrique');
INSERT INTO `dm_parroquias` VALUES ('308', '99', 'General en Jefe Jose Laurencio Silva');
INSERT INTO `dm_parroquias` VALUES ('309', '100', 'Curiapo');
INSERT INTO `dm_parroquias` VALUES ('310', '100', 'Almirante Luis Brión');
INSERT INTO `dm_parroquias` VALUES ('311', '100', 'Francisco Aniceto Lugo');
INSERT INTO `dm_parroquias` VALUES ('312', '100', 'Manuel Renaud');
INSERT INTO `dm_parroquias` VALUES ('313', '100', 'Padre Barral');
INSERT INTO `dm_parroquias` VALUES ('314', '100', 'Santos de Abelgas');
INSERT INTO `dm_parroquias` VALUES ('315', '101', 'Imataca');
INSERT INTO `dm_parroquias` VALUES ('316', '101', 'Cinco de Julio');
INSERT INTO `dm_parroquias` VALUES ('317', '101', 'Juan Bautista Arismendi');
INSERT INTO `dm_parroquias` VALUES ('318', '101', 'Manuel Piar');
INSERT INTO `dm_parroquias` VALUES ('319', '101', 'Rómulo Gallegos');
INSERT INTO `dm_parroquias` VALUES ('320', '102', 'Pedernales');
INSERT INTO `dm_parroquias` VALUES ('321', '102', 'Luis Beltrán Prieto Figueroa');
INSERT INTO `dm_parroquias` VALUES ('322', '103', 'San Jose (Delta Amacuro)');
INSERT INTO `dm_parroquias` VALUES ('323', '103', 'Jose Vidal Marcano');
INSERT INTO `dm_parroquias` VALUES ('324', '103', 'Juan Millán');
INSERT INTO `dm_parroquias` VALUES ('325', '103', 'Leonardo Ruíz Pineda');
INSERT INTO `dm_parroquias` VALUES ('326', '103', 'Mariscal Antonio Jose de Sucre');
INSERT INTO `dm_parroquias` VALUES ('327', '103', 'Monseñor Argimiro García');
INSERT INTO `dm_parroquias` VALUES ('328', '103', 'San Rafael (Delta Amacuro)');
INSERT INTO `dm_parroquias` VALUES ('329', '103', 'Virgen del Valle');
INSERT INTO `dm_parroquias` VALUES ('330', '10', 'Clarines');
INSERT INTO `dm_parroquias` VALUES ('331', '10', 'Guanape');
INSERT INTO `dm_parroquias` VALUES ('332', '10', 'Sabana de Uchire');
INSERT INTO `dm_parroquias` VALUES ('333', '104', 'Capadare');
INSERT INTO `dm_parroquias` VALUES ('334', '104', 'La Pastora');
INSERT INTO `dm_parroquias` VALUES ('335', '104', 'Libertador');
INSERT INTO `dm_parroquias` VALUES ('336', '104', 'San Juan de los Cayos');
INSERT INTO `dm_parroquias` VALUES ('337', '105', 'Aracua');
INSERT INTO `dm_parroquias` VALUES ('338', '105', 'La Peña');
INSERT INTO `dm_parroquias` VALUES ('339', '105', 'San Luis');
INSERT INTO `dm_parroquias` VALUES ('340', '106', 'Bariro');
INSERT INTO `dm_parroquias` VALUES ('341', '106', 'Borojó');
INSERT INTO `dm_parroquias` VALUES ('342', '106', 'Capatárida');
INSERT INTO `dm_parroquias` VALUES ('343', '106', 'Guajiro');
INSERT INTO `dm_parroquias` VALUES ('344', '106', 'Seque');
INSERT INTO `dm_parroquias` VALUES ('345', '106', 'Zazárida');
INSERT INTO `dm_parroquias` VALUES ('346', '106', 'Valle de Eroa');
INSERT INTO `dm_parroquias` VALUES ('347', '107', 'Cacique Manaure');
INSERT INTO `dm_parroquias` VALUES ('348', '108', 'Norte');
INSERT INTO `dm_parroquias` VALUES ('349', '108', 'Carirubana');
INSERT INTO `dm_parroquias` VALUES ('350', '108', 'Santa Ana');
INSERT INTO `dm_parroquias` VALUES ('351', '108', 'Urbana Punta Cardón');
INSERT INTO `dm_parroquias` VALUES ('352', '109', 'La Vela de Coro');
INSERT INTO `dm_parroquias` VALUES ('353', '109', 'Acurigua');
INSERT INTO `dm_parroquias` VALUES ('354', '109', 'Guaibacoa');
INSERT INTO `dm_parroquias` VALUES ('355', '109', 'Las Calderas');
INSERT INTO `dm_parroquias` VALUES ('356', '109', 'Macoruca');
INSERT INTO `dm_parroquias` VALUES ('357', '110', 'Dabajuro');
INSERT INTO `dm_parroquias` VALUES ('358', '111', 'Agua Clara');
INSERT INTO `dm_parroquias` VALUES ('359', '111', 'Avaria');
INSERT INTO `dm_parroquias` VALUES ('360', '111', 'Pedregal');
INSERT INTO `dm_parroquias` VALUES ('361', '111', 'Piedra Grande');
INSERT INTO `dm_parroquias` VALUES ('362', '111', 'Purureche');
INSERT INTO `dm_parroquias` VALUES ('363', '112', 'Adaure');
INSERT INTO `dm_parroquias` VALUES ('364', '112', 'Adícora');
INSERT INTO `dm_parroquias` VALUES ('365', '112', 'Baraived');
INSERT INTO `dm_parroquias` VALUES ('366', '112', 'Buena Vista');
INSERT INTO `dm_parroquias` VALUES ('367', '112', 'Jadacaquiva');
INSERT INTO `dm_parroquias` VALUES ('368', '112', 'El Vínculo');
INSERT INTO `dm_parroquias` VALUES ('369', '112', 'El Hato');
INSERT INTO `dm_parroquias` VALUES ('370', '112', 'Moruy');
INSERT INTO `dm_parroquias` VALUES ('371', '112', 'Pueblo Nuevo');
INSERT INTO `dm_parroquias` VALUES ('372', '113', 'Agua Larga');
INSERT INTO `dm_parroquias` VALUES ('373', '113', 'El Paují');
INSERT INTO `dm_parroquias` VALUES ('374', '113', 'Independencia');
INSERT INTO `dm_parroquias` VALUES ('375', '113', 'Mapararí');
INSERT INTO `dm_parroquias` VALUES ('376', '114', 'Agua Linda');
INSERT INTO `dm_parroquias` VALUES ('377', '114', 'Araurima');
INSERT INTO `dm_parroquias` VALUES ('378', '114', 'Jacura');
INSERT INTO `dm_parroquias` VALUES ('379', '115', 'Tucacas');
INSERT INTO `dm_parroquias` VALUES ('380', '115', 'Boca de Aroa');
INSERT INTO `dm_parroquias` VALUES ('381', '116', 'Los Taques');
INSERT INTO `dm_parroquias` VALUES ('382', '116', 'Judibana');
INSERT INTO `dm_parroquias` VALUES ('383', '117', 'Mene de Mauroa');
INSERT INTO `dm_parroquias` VALUES ('384', '117', 'San Felix');
INSERT INTO `dm_parroquias` VALUES ('385', '117', 'Casigua');
INSERT INTO `dm_parroquias` VALUES ('386', '118', 'Guzmán Guillermo');
INSERT INTO `dm_parroquias` VALUES ('387', '118', 'Mitare');
INSERT INTO `dm_parroquias` VALUES ('388', '118', 'Río Seco');
INSERT INTO `dm_parroquias` VALUES ('389', '118', 'Sabaneta');
INSERT INTO `dm_parroquias` VALUES ('390', '118', 'San Antonio');
INSERT INTO `dm_parroquias` VALUES ('391', '118', 'San Gabriel');
INSERT INTO `dm_parroquias` VALUES ('392', '118', 'Santa Ana');
INSERT INTO `dm_parroquias` VALUES ('393', '119', 'Boca del Tocuyo');
INSERT INTO `dm_parroquias` VALUES ('394', '119', 'Chichiriviche');
INSERT INTO `dm_parroquias` VALUES ('395', '119', 'Tocuyo de la Costa');
INSERT INTO `dm_parroquias` VALUES ('396', '120', 'Palmasola');
INSERT INTO `dm_parroquias` VALUES ('397', '121', 'Cabure');
INSERT INTO `dm_parroquias` VALUES ('398', '121', 'Colina');
INSERT INTO `dm_parroquias` VALUES ('399', '121', 'Curimagua');
INSERT INTO `dm_parroquias` VALUES ('400', '122', 'San Jose de la Costa');
INSERT INTO `dm_parroquias` VALUES ('401', '122', 'Píritu');
INSERT INTO `dm_parroquias` VALUES ('402', '123', 'San Francisco');
INSERT INTO `dm_parroquias` VALUES ('403', '124', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('404', '124', 'Pecaya');
INSERT INTO `dm_parroquias` VALUES ('405', '125', 'Tocópero');
INSERT INTO `dm_parroquias` VALUES ('406', '126', 'El Charal');
INSERT INTO `dm_parroquias` VALUES ('407', '126', 'Las Vegas del Tuy');
INSERT INTO `dm_parroquias` VALUES ('408', '126', 'Santa Cruz de Bucaral');
INSERT INTO `dm_parroquias` VALUES ('409', '127', 'Bruzual');
INSERT INTO `dm_parroquias` VALUES ('410', '127', 'Urumaco');
INSERT INTO `dm_parroquias` VALUES ('411', '128', 'Puerto Cumarebo');
INSERT INTO `dm_parroquias` VALUES ('412', '128', 'La Cienaga');
INSERT INTO `dm_parroquias` VALUES ('413', '128', 'La Soledad');
INSERT INTO `dm_parroquias` VALUES ('414', '128', 'Pueblo Cumarebo');
INSERT INTO `dm_parroquias` VALUES ('415', '128', 'Zazárida');
INSERT INTO `dm_parroquias` VALUES ('416', '113', 'Churuguara');
INSERT INTO `dm_parroquias` VALUES ('417', '129', 'Camaguán');
INSERT INTO `dm_parroquias` VALUES ('418', '129', 'Puerto Miranda');
INSERT INTO `dm_parroquias` VALUES ('419', '129', 'Uverito');
INSERT INTO `dm_parroquias` VALUES ('420', '130', 'Chaguaramas');
INSERT INTO `dm_parroquias` VALUES ('421', '131', 'El Socorro');
INSERT INTO `dm_parroquias` VALUES ('422', '132', 'Tucupido');
INSERT INTO `dm_parroquias` VALUES ('423', '132', 'San Rafael de Laya');
INSERT INTO `dm_parroquias` VALUES ('424', '133', 'Altagracia de Orituco');
INSERT INTO `dm_parroquias` VALUES ('425', '133', 'San Rafael de Orituco');
INSERT INTO `dm_parroquias` VALUES ('426', '133', 'San Francisco Javier de Lezama');
INSERT INTO `dm_parroquias` VALUES ('427', '133', 'Paso Real de Macaira');
INSERT INTO `dm_parroquias` VALUES ('428', '133', 'Carlos Soublette');
INSERT INTO `dm_parroquias` VALUES ('429', '133', 'San Francisco de Macaira');
INSERT INTO `dm_parroquias` VALUES ('430', '133', 'Libertad de Orituco');
INSERT INTO `dm_parroquias` VALUES ('431', '134', 'Cantaclaro');
INSERT INTO `dm_parroquias` VALUES ('432', '134', 'San Juan de los Morros');
INSERT INTO `dm_parroquias` VALUES ('433', '134', 'Parapara');
INSERT INTO `dm_parroquias` VALUES ('434', '135', 'El Sombrero');
INSERT INTO `dm_parroquias` VALUES ('435', '135', 'Sosa');
INSERT INTO `dm_parroquias` VALUES ('436', '136', 'Las Mercedes');
INSERT INTO `dm_parroquias` VALUES ('437', '136', 'Cabruta');
INSERT INTO `dm_parroquias` VALUES ('438', '136', 'Santa Rita de Manapire');
INSERT INTO `dm_parroquias` VALUES ('439', '137', 'Valle de la Pascua');
INSERT INTO `dm_parroquias` VALUES ('440', '137', 'Espino');
INSERT INTO `dm_parroquias` VALUES ('441', '138', 'San Jose de Unare');
INSERT INTO `dm_parroquias` VALUES ('442', '138', 'Zaraza');
INSERT INTO `dm_parroquias` VALUES ('443', '139', 'San Jose de Tiznados');
INSERT INTO `dm_parroquias` VALUES ('444', '139', 'San Francisco de Tiznados');
INSERT INTO `dm_parroquias` VALUES ('445', '139', 'San Lorenzo de Tiznados');
INSERT INTO `dm_parroquias` VALUES ('446', '139', 'Ortiz');
INSERT INTO `dm_parroquias` VALUES ('447', '140', 'Guayabal');
INSERT INTO `dm_parroquias` VALUES ('448', '140', 'Cazorla');
INSERT INTO `dm_parroquias` VALUES ('449', '141', 'San Jose de Guaribe');
INSERT INTO `dm_parroquias` VALUES ('450', '141', 'Uveral');
INSERT INTO `dm_parroquias` VALUES ('451', '142', 'Santa María de Ipire');
INSERT INTO `dm_parroquias` VALUES ('452', '142', 'Altamira');
INSERT INTO `dm_parroquias` VALUES ('453', '143', 'El Calvario');
INSERT INTO `dm_parroquias` VALUES ('454', '143', 'El Rastro');
INSERT INTO `dm_parroquias` VALUES ('455', '143', 'Guardatinajas');
INSERT INTO `dm_parroquias` VALUES ('456', '143', 'Capital Urbana Calabozo');
INSERT INTO `dm_parroquias` VALUES ('457', '144', 'Quebrada Honda de Guache');
INSERT INTO `dm_parroquias` VALUES ('458', '144', 'Pío Tamayo');
INSERT INTO `dm_parroquias` VALUES ('459', '144', 'Yacambú');
INSERT INTO `dm_parroquias` VALUES ('460', '145', 'Freitez');
INSERT INTO `dm_parroquias` VALUES ('461', '145', 'Jose María Blanco');
INSERT INTO `dm_parroquias` VALUES ('462', '146', 'Catedral');
INSERT INTO `dm_parroquias` VALUES ('463', '146', 'Concepción');
INSERT INTO `dm_parroquias` VALUES ('464', '146', 'El Cují');
INSERT INTO `dm_parroquias` VALUES ('465', '146', 'Juan de Villegas');
INSERT INTO `dm_parroquias` VALUES ('466', '146', 'Santa Rosa');
INSERT INTO `dm_parroquias` VALUES ('467', '146', 'Tamaca');
INSERT INTO `dm_parroquias` VALUES ('468', '146', 'Unión');
INSERT INTO `dm_parroquias` VALUES ('469', '146', 'Aguedo Felipe Alvarado');
INSERT INTO `dm_parroquias` VALUES ('470', '146', 'Buena Vista');
INSERT INTO `dm_parroquias` VALUES ('471', '146', 'Juárez');
INSERT INTO `dm_parroquias` VALUES ('472', '147', 'Juan Bautista Rodríguez');
INSERT INTO `dm_parroquias` VALUES ('473', '147', 'Cuara');
INSERT INTO `dm_parroquias` VALUES ('474', '147', 'Diego de Lozada');
INSERT INTO `dm_parroquias` VALUES ('475', '147', 'Paraíso de San Jose');
INSERT INTO `dm_parroquias` VALUES ('476', '147', 'San Miguel');
INSERT INTO `dm_parroquias` VALUES ('477', '147', 'Tintorero');
INSERT INTO `dm_parroquias` VALUES ('478', '147', 'Jose Bernardo Dorante');
INSERT INTO `dm_parroquias` VALUES ('479', '147', 'Coronel Mariano Peraza ');
INSERT INTO `dm_parroquias` VALUES ('480', '148', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('481', '148', 'Anzoátegui');
INSERT INTO `dm_parroquias` VALUES ('482', '148', 'Guarico');
INSERT INTO `dm_parroquias` VALUES ('483', '148', 'Hilario Luna y Luna');
INSERT INTO `dm_parroquias` VALUES ('484', '148', 'Humocaro Alto');
INSERT INTO `dm_parroquias` VALUES ('485', '148', 'Humocaro Bajo');
INSERT INTO `dm_parroquias` VALUES ('486', '148', 'La Candelaria');
INSERT INTO `dm_parroquias` VALUES ('487', '148', 'Morán');
INSERT INTO `dm_parroquias` VALUES ('488', '149', 'Cabudare');
INSERT INTO `dm_parroquias` VALUES ('489', '149', 'Jose Gregorio Bastidas');
INSERT INTO `dm_parroquias` VALUES ('490', '149', 'Agua Viva');
INSERT INTO `dm_parroquias` VALUES ('491', '150', 'Sarare');
INSERT INTO `dm_parroquias` VALUES ('492', '150', 'Buría');
INSERT INTO `dm_parroquias` VALUES ('493', '150', 'Gustavo Vegas León');
INSERT INTO `dm_parroquias` VALUES ('494', '151', 'Trinidad Samuel');
INSERT INTO `dm_parroquias` VALUES ('495', '151', 'Antonio Díaz');
INSERT INTO `dm_parroquias` VALUES ('496', '151', 'Camacaro');
INSERT INTO `dm_parroquias` VALUES ('497', '151', 'Castañeda');
INSERT INTO `dm_parroquias` VALUES ('498', '151', 'Cecilio Zubillaga');
INSERT INTO `dm_parroquias` VALUES ('499', '151', 'Chiquinquirá');
INSERT INTO `dm_parroquias` VALUES ('500', '151', 'El Blanco');
INSERT INTO `dm_parroquias` VALUES ('501', '151', 'Espinoza de los Monteros');
INSERT INTO `dm_parroquias` VALUES ('502', '151', 'Lara');
INSERT INTO `dm_parroquias` VALUES ('503', '151', 'Las Mercedes');
INSERT INTO `dm_parroquias` VALUES ('504', '151', 'Manuel Morillo');
INSERT INTO `dm_parroquias` VALUES ('505', '151', 'Montaña Verde');
INSERT INTO `dm_parroquias` VALUES ('506', '151', 'Montes de Oca');
INSERT INTO `dm_parroquias` VALUES ('507', '151', 'Torres');
INSERT INTO `dm_parroquias` VALUES ('508', '151', 'Heriberto Arroyo');
INSERT INTO `dm_parroquias` VALUES ('509', '151', 'Reyes Vargas');
INSERT INTO `dm_parroquias` VALUES ('510', '151', 'Altagracia');
INSERT INTO `dm_parroquias` VALUES ('511', '152', 'Siquisique');
INSERT INTO `dm_parroquias` VALUES ('512', '152', 'Moroturo');
INSERT INTO `dm_parroquias` VALUES ('513', '152', 'San Miguel');
INSERT INTO `dm_parroquias` VALUES ('514', '152', 'Xaguas');
INSERT INTO `dm_parroquias` VALUES ('515', '179', 'Presidente Betancourt');
INSERT INTO `dm_parroquias` VALUES ('516', '179', 'Presidente paez');
INSERT INTO `dm_parroquias` VALUES ('517', '179', 'Presidente Rómulo Gallegos');
INSERT INTO `dm_parroquias` VALUES ('518', '179', 'Gabriel Picón González');
INSERT INTO `dm_parroquias` VALUES ('519', '179', 'Hector Amable Mora');
INSERT INTO `dm_parroquias` VALUES ('520', '179', 'Jose Nucete Sardi');
INSERT INTO `dm_parroquias` VALUES ('521', '179', 'Pulido Mendez');
INSERT INTO `dm_parroquias` VALUES ('522', '180', 'La Azulita');
INSERT INTO `dm_parroquias` VALUES ('523', '181', 'Santa Cruz de Mora');
INSERT INTO `dm_parroquias` VALUES ('524', '181', 'Mesa Bolívar');
INSERT INTO `dm_parroquias` VALUES ('525', '181', 'Mesa de Las Palmas');
INSERT INTO `dm_parroquias` VALUES ('526', '182', 'Aricagua');
INSERT INTO `dm_parroquias` VALUES ('527', '182', 'San Antonio');
INSERT INTO `dm_parroquias` VALUES ('528', '183', 'Canagua');
INSERT INTO `dm_parroquias` VALUES ('529', '183', 'Capurí');
INSERT INTO `dm_parroquias` VALUES ('530', '183', 'Chacantá');
INSERT INTO `dm_parroquias` VALUES ('531', '183', 'El Molino');
INSERT INTO `dm_parroquias` VALUES ('532', '183', 'Guaimaral');
INSERT INTO `dm_parroquias` VALUES ('533', '183', 'Mucutuy');
INSERT INTO `dm_parroquias` VALUES ('534', '183', 'Mucuchachí');
INSERT INTO `dm_parroquias` VALUES ('535', '184', 'Fernández Peña');
INSERT INTO `dm_parroquias` VALUES ('536', '184', 'Matriz');
INSERT INTO `dm_parroquias` VALUES ('537', '184', 'Montalbán');
INSERT INTO `dm_parroquias` VALUES ('538', '184', 'Acequias');
INSERT INTO `dm_parroquias` VALUES ('539', '184', 'Jají');
INSERT INTO `dm_parroquias` VALUES ('540', '184', 'La Mesa');
INSERT INTO `dm_parroquias` VALUES ('541', '184', 'San Jose del Sur');
INSERT INTO `dm_parroquias` VALUES ('542', '185', 'Tucaní');
INSERT INTO `dm_parroquias` VALUES ('543', '185', 'Florencio Ramírez');
INSERT INTO `dm_parroquias` VALUES ('544', '186', 'Santo Domingo');
INSERT INTO `dm_parroquias` VALUES ('545', '186', 'Las Piedras');
INSERT INTO `dm_parroquias` VALUES ('546', '187', 'Guaraque');
INSERT INTO `dm_parroquias` VALUES ('547', '187', 'Mesa de Quintero');
INSERT INTO `dm_parroquias` VALUES ('548', '187', 'Río Negro');
INSERT INTO `dm_parroquias` VALUES ('549', '188', 'Arapuey');
INSERT INTO `dm_parroquias` VALUES ('550', '188', 'Palmira');
INSERT INTO `dm_parroquias` VALUES ('551', '189', 'San Cristóbal de Torondoy');
INSERT INTO `dm_parroquias` VALUES ('552', '189', 'Torondoy');
INSERT INTO `dm_parroquias` VALUES ('553', '190', 'Antonio Spinetti Dini');
INSERT INTO `dm_parroquias` VALUES ('554', '190', 'Arias');
INSERT INTO `dm_parroquias` VALUES ('555', '190', 'Caracciolo Parra Perez');
INSERT INTO `dm_parroquias` VALUES ('556', '190', 'Domingo Peña');
INSERT INTO `dm_parroquias` VALUES ('557', '190', 'El Llano');
INSERT INTO `dm_parroquias` VALUES ('558', '190', 'Gonzalo Picón Febres');
INSERT INTO `dm_parroquias` VALUES ('559', '190', 'Jacinto Plaza');
INSERT INTO `dm_parroquias` VALUES ('560', '190', 'Juan Rodríguez Suárez');
INSERT INTO `dm_parroquias` VALUES ('561', '190', 'Lasso de la Vega');
INSERT INTO `dm_parroquias` VALUES ('562', '190', 'Mariano Picón Salas');
INSERT INTO `dm_parroquias` VALUES ('563', '190', 'Milla');
INSERT INTO `dm_parroquias` VALUES ('564', '190', 'Osuna Rodríguez');
INSERT INTO `dm_parroquias` VALUES ('565', '190', 'Sagrario');
INSERT INTO `dm_parroquias` VALUES ('566', '190', 'El Morro');
INSERT INTO `dm_parroquias` VALUES ('567', '190', 'Los Nevados');
INSERT INTO `dm_parroquias` VALUES ('568', '191', 'Andres Eloy Blanco');
INSERT INTO `dm_parroquias` VALUES ('569', '191', 'La Venta');
INSERT INTO `dm_parroquias` VALUES ('570', '191', 'Piñango');
INSERT INTO `dm_parroquias` VALUES ('571', '191', 'Timotes');
INSERT INTO `dm_parroquias` VALUES ('572', '192', 'Eloy Paredes');
INSERT INTO `dm_parroquias` VALUES ('573', '192', 'San Rafael de Alcázar');
INSERT INTO `dm_parroquias` VALUES ('574', '192', 'Santa Elena de Arenales');
INSERT INTO `dm_parroquias` VALUES ('575', '193', 'Santa María de Caparo');
INSERT INTO `dm_parroquias` VALUES ('576', '194', 'Pueblo Llano');
INSERT INTO `dm_parroquias` VALUES ('577', '195', 'Cacute');
INSERT INTO `dm_parroquias` VALUES ('578', '195', 'La Toma');
INSERT INTO `dm_parroquias` VALUES ('579', '195', 'Mucuchíes');
INSERT INTO `dm_parroquias` VALUES ('580', '195', 'Mucurubá');
INSERT INTO `dm_parroquias` VALUES ('581', '195', 'San Rafael');
INSERT INTO `dm_parroquias` VALUES ('582', '196', 'Gerónimo Maldonado');
INSERT INTO `dm_parroquias` VALUES ('583', '196', 'Bailadores');
INSERT INTO `dm_parroquias` VALUES ('584', '197', 'Tabay');
INSERT INTO `dm_parroquias` VALUES ('585', '198', 'Chiguará');
INSERT INTO `dm_parroquias` VALUES ('586', '198', 'Estánquez');
INSERT INTO `dm_parroquias` VALUES ('587', '198', 'Lagunillas');
INSERT INTO `dm_parroquias` VALUES ('588', '198', 'La Trampa');
INSERT INTO `dm_parroquias` VALUES ('589', '198', 'Pueblo Nuevo del Sur');
INSERT INTO `dm_parroquias` VALUES ('590', '198', 'San Juan');
INSERT INTO `dm_parroquias` VALUES ('591', '199', 'El Amparo');
INSERT INTO `dm_parroquias` VALUES ('592', '199', 'El Llano');
INSERT INTO `dm_parroquias` VALUES ('593', '199', 'San Francisco');
INSERT INTO `dm_parroquias` VALUES ('594', '199', 'Tovar');
INSERT INTO `dm_parroquias` VALUES ('595', '200', 'Independencia');
INSERT INTO `dm_parroquias` VALUES ('596', '200', 'María de la Concepción Palacios Blanco');
INSERT INTO `dm_parroquias` VALUES ('597', '200', 'Nueva Bolivia');
INSERT INTO `dm_parroquias` VALUES ('598', '200', 'Santa Apolonia');
INSERT INTO `dm_parroquias` VALUES ('599', '201', 'Caño El Tigre');
INSERT INTO `dm_parroquias` VALUES ('600', '201', 'Zea');
INSERT INTO `dm_parroquias` VALUES ('601', '223', 'Aragúita');
INSERT INTO `dm_parroquias` VALUES ('602', '223', 'Arevalo González');
INSERT INTO `dm_parroquias` VALUES ('603', '223', 'Capaya');
INSERT INTO `dm_parroquias` VALUES ('604', '223', 'Caucagua');
INSERT INTO `dm_parroquias` VALUES ('605', '223', 'Panaquire');
INSERT INTO `dm_parroquias` VALUES ('606', '223', 'Ribas');
INSERT INTO `dm_parroquias` VALUES ('607', '223', 'El Cafe');
INSERT INTO `dm_parroquias` VALUES ('608', '223', 'Marizapa');
INSERT INTO `dm_parroquias` VALUES ('609', '224', 'Cumbo');
INSERT INTO `dm_parroquias` VALUES ('610', '224', 'San Jose de Barlovento');
INSERT INTO `dm_parroquias` VALUES ('611', '225', 'El Cafetal');
INSERT INTO `dm_parroquias` VALUES ('612', '225', 'Las Minas');
INSERT INTO `dm_parroquias` VALUES ('613', '225', 'Nuestra Señora del Rosario');
INSERT INTO `dm_parroquias` VALUES ('614', '226', 'Higuerote');
INSERT INTO `dm_parroquias` VALUES ('615', '226', 'Curiepe');
INSERT INTO `dm_parroquias` VALUES ('616', '226', 'Tacarigua de Brión');
INSERT INTO `dm_parroquias` VALUES ('617', '227', 'Mamporal');
INSERT INTO `dm_parroquias` VALUES ('618', '228', 'Carrizal');
INSERT INTO `dm_parroquias` VALUES ('619', '229', 'Chacao');
INSERT INTO `dm_parroquias` VALUES ('620', '230', 'Charallave');
INSERT INTO `dm_parroquias` VALUES ('621', '230', 'Las Brisas');
INSERT INTO `dm_parroquias` VALUES ('622', '231', 'El Hatillo');
INSERT INTO `dm_parroquias` VALUES ('623', '232', 'Altagracia de la Montaña');
INSERT INTO `dm_parroquias` VALUES ('624', '232', 'Cecilio Acosta');
INSERT INTO `dm_parroquias` VALUES ('625', '232', 'Los Teques');
INSERT INTO `dm_parroquias` VALUES ('626', '232', 'El Jarillo');
INSERT INTO `dm_parroquias` VALUES ('627', '232', 'San Pedro');
INSERT INTO `dm_parroquias` VALUES ('628', '232', 'Tácata');
INSERT INTO `dm_parroquias` VALUES ('629', '232', 'Paracotos');
INSERT INTO `dm_parroquias` VALUES ('630', '233', 'Cartanal');
INSERT INTO `dm_parroquias` VALUES ('631', '233', 'Santa Teresa del Tuy');
INSERT INTO `dm_parroquias` VALUES ('632', '234', 'La Democracia');
INSERT INTO `dm_parroquias` VALUES ('633', '234', 'Ocumare del Tuy');
INSERT INTO `dm_parroquias` VALUES ('634', '234', 'Santa Bárbara');
INSERT INTO `dm_parroquias` VALUES ('635', '235', 'San Antonio de los Altos');
INSERT INTO `dm_parroquias` VALUES ('636', '236', 'Río Chico');
INSERT INTO `dm_parroquias` VALUES ('637', '236', 'El Guapo');
INSERT INTO `dm_parroquias` VALUES ('638', '236', 'Tacarigua de la Laguna');
INSERT INTO `dm_parroquias` VALUES ('639', '236', 'Paparo');
INSERT INTO `dm_parroquias` VALUES ('640', '236', 'San Fernando del Guapo');
INSERT INTO `dm_parroquias` VALUES ('641', '237', 'Santa Lucía del Tuy');
INSERT INTO `dm_parroquias` VALUES ('642', '238', 'Cúpira');
INSERT INTO `dm_parroquias` VALUES ('643', '238', 'Machurucuto');
INSERT INTO `dm_parroquias` VALUES ('644', '239', 'Guarenas');
INSERT INTO `dm_parroquias` VALUES ('645', '240', 'San Antonio de Yare');
INSERT INTO `dm_parroquias` VALUES ('646', '240', 'San Francisco de Yare');
INSERT INTO `dm_parroquias` VALUES ('647', '241', 'Leoncio Martínez');
INSERT INTO `dm_parroquias` VALUES ('648', '241', 'Petare');
INSERT INTO `dm_parroquias` VALUES ('649', '241', 'Caucagúita');
INSERT INTO `dm_parroquias` VALUES ('650', '241', 'Filas de Mariche');
INSERT INTO `dm_parroquias` VALUES ('651', '241', 'La Dolorita');
INSERT INTO `dm_parroquias` VALUES ('652', '242', 'Cúa');
INSERT INTO `dm_parroquias` VALUES ('653', '242', 'Nueva Cúa');
INSERT INTO `dm_parroquias` VALUES ('654', '243', 'Guatire');
INSERT INTO `dm_parroquias` VALUES ('655', '243', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('656', '258', 'San Antonio de Maturín');
INSERT INTO `dm_parroquias` VALUES ('657', '258', 'San Francisco de Maturín');
INSERT INTO `dm_parroquias` VALUES ('658', '259', 'Aguasay');
INSERT INTO `dm_parroquias` VALUES ('659', '260', 'Caripito');
INSERT INTO `dm_parroquias` VALUES ('660', '261', 'El Guácharo');
INSERT INTO `dm_parroquias` VALUES ('661', '261', 'La Guanota');
INSERT INTO `dm_parroquias` VALUES ('662', '261', 'Sabana de Piedra');
INSERT INTO `dm_parroquias` VALUES ('663', '261', 'San Agustín');
INSERT INTO `dm_parroquias` VALUES ('664', '261', 'Teresen');
INSERT INTO `dm_parroquias` VALUES ('665', '261', 'Caripe');
INSERT INTO `dm_parroquias` VALUES ('666', '262', 'Areo');
INSERT INTO `dm_parroquias` VALUES ('667', '262', 'Capital Cedeño');
INSERT INTO `dm_parroquias` VALUES ('668', '262', 'San Felix de Cantalicio');
INSERT INTO `dm_parroquias` VALUES ('669', '262', 'Viento Fresco');
INSERT INTO `dm_parroquias` VALUES ('670', '263', 'El Tejero');
INSERT INTO `dm_parroquias` VALUES ('671', '263', 'Punta de Mata');
INSERT INTO `dm_parroquias` VALUES ('672', '264', 'Chaguaramas');
INSERT INTO `dm_parroquias` VALUES ('673', '264', 'Las Alhuacas');
INSERT INTO `dm_parroquias` VALUES ('674', '264', 'Tabasca');
INSERT INTO `dm_parroquias` VALUES ('675', '264', 'Temblador');
INSERT INTO `dm_parroquias` VALUES ('676', '265', 'Alto de los Godos');
INSERT INTO `dm_parroquias` VALUES ('677', '265', 'Boquerón');
INSERT INTO `dm_parroquias` VALUES ('678', '265', 'Las Cocuizas');
INSERT INTO `dm_parroquias` VALUES ('679', '265', 'La Cruz');
INSERT INTO `dm_parroquias` VALUES ('680', '265', 'San Simón');
INSERT INTO `dm_parroquias` VALUES ('681', '265', 'El Corozo');
INSERT INTO `dm_parroquias` VALUES ('682', '265', 'El Furrial');
INSERT INTO `dm_parroquias` VALUES ('683', '265', 'Jusepín');
INSERT INTO `dm_parroquias` VALUES ('684', '265', 'La Pica');
INSERT INTO `dm_parroquias` VALUES ('685', '265', 'San Vicente');
INSERT INTO `dm_parroquias` VALUES ('686', '266', 'Aparicio');
INSERT INTO `dm_parroquias` VALUES ('687', '266', 'Aragua de Maturín');
INSERT INTO `dm_parroquias` VALUES ('688', '266', 'Chaguamal');
INSERT INTO `dm_parroquias` VALUES ('689', '266', 'El Pinto');
INSERT INTO `dm_parroquias` VALUES ('690', '266', 'Guanaguana');
INSERT INTO `dm_parroquias` VALUES ('691', '266', 'La Toscana');
INSERT INTO `dm_parroquias` VALUES ('692', '266', 'Taguaya');
INSERT INTO `dm_parroquias` VALUES ('693', '267', 'Cachipo');
INSERT INTO `dm_parroquias` VALUES ('694', '267', 'Quiriquire');
INSERT INTO `dm_parroquias` VALUES ('695', '268', 'Santa Bárbara');
INSERT INTO `dm_parroquias` VALUES ('696', '269', 'Barrancas');
INSERT INTO `dm_parroquias` VALUES ('697', '269', 'Los Barrancos de Fajardo');
INSERT INTO `dm_parroquias` VALUES ('698', '270', 'Uracoa');
INSERT INTO `dm_parroquias` VALUES ('699', '271', 'Antolín del Campo');
INSERT INTO `dm_parroquias` VALUES ('700', '272', 'Arismendi');
INSERT INTO `dm_parroquias` VALUES ('701', '273', 'García');
INSERT INTO `dm_parroquias` VALUES ('702', '273', 'Francisco Fajardo');
INSERT INTO `dm_parroquias` VALUES ('703', '274', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('704', '274', 'Guevara');
INSERT INTO `dm_parroquias` VALUES ('705', '274', 'Matasiete');
INSERT INTO `dm_parroquias` VALUES ('706', '274', 'Santa Ana');
INSERT INTO `dm_parroquias` VALUES ('707', '274', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('708', '275', 'Aguirre');
INSERT INTO `dm_parroquias` VALUES ('709', '275', 'Maneiro');
INSERT INTO `dm_parroquias` VALUES ('710', '276', 'Adrián');
INSERT INTO `dm_parroquias` VALUES ('711', '276', 'Juan Griego');
INSERT INTO `dm_parroquias` VALUES ('712', '276', 'Yaguaraparo');
INSERT INTO `dm_parroquias` VALUES ('713', '277', 'Porlamar');
INSERT INTO `dm_parroquias` VALUES ('714', '278', 'San Francisco de Macanao');
INSERT INTO `dm_parroquias` VALUES ('715', '278', 'Boca de Río');
INSERT INTO `dm_parroquias` VALUES ('716', '279', 'Tubores');
INSERT INTO `dm_parroquias` VALUES ('717', '279', 'Los Baleales');
INSERT INTO `dm_parroquias` VALUES ('718', '280', 'Vicente Fuentes');
INSERT INTO `dm_parroquias` VALUES ('719', '280', 'Villalba');
INSERT INTO `dm_parroquias` VALUES ('720', '281', 'San Juan Bautista');
INSERT INTO `dm_parroquias` VALUES ('721', '281', 'Zabala');
INSERT INTO `dm_parroquias` VALUES ('722', '283', 'Capital Araure');
INSERT INTO `dm_parroquias` VALUES ('723', '283', 'Río Acarigua');
INSERT INTO `dm_parroquias` VALUES ('724', '284', 'Capital Esteller');
INSERT INTO `dm_parroquias` VALUES ('725', '284', 'Uveral');
INSERT INTO `dm_parroquias` VALUES ('726', '285', 'Guanare');
INSERT INTO `dm_parroquias` VALUES ('727', '285', 'Córdoba');
INSERT INTO `dm_parroquias` VALUES ('728', '285', 'San Jose de la Montaña');
INSERT INTO `dm_parroquias` VALUES ('729', '285', 'San Juan de Guanaguanare');
INSERT INTO `dm_parroquias` VALUES ('730', '285', 'Virgen de la Coromoto');
INSERT INTO `dm_parroquias` VALUES ('731', '286', 'Guanarito');
INSERT INTO `dm_parroquias` VALUES ('732', '286', 'Trinidad de la Capilla');
INSERT INTO `dm_parroquias` VALUES ('733', '286', 'Divina Pastora');
INSERT INTO `dm_parroquias` VALUES ('734', '287', 'Monseñor Jose Vicente de Unda');
INSERT INTO `dm_parroquias` VALUES ('735', '287', 'Peña Blanca');
INSERT INTO `dm_parroquias` VALUES ('736', '288', 'Capital Ospino');
INSERT INTO `dm_parroquias` VALUES ('737', '288', 'Aparición');
INSERT INTO `dm_parroquias` VALUES ('738', '288', 'La Estación');
INSERT INTO `dm_parroquias` VALUES ('739', '289', 'paez');
INSERT INTO `dm_parroquias` VALUES ('740', '289', 'Payara');
INSERT INTO `dm_parroquias` VALUES ('741', '289', 'Pimpinela');
INSERT INTO `dm_parroquias` VALUES ('742', '289', 'Ramón Peraza');
INSERT INTO `dm_parroquias` VALUES ('743', '290', 'Papelón');
INSERT INTO `dm_parroquias` VALUES ('744', '290', 'Caño Delgadito');
INSERT INTO `dm_parroquias` VALUES ('745', '291', 'San Genaro de Boconoito');
INSERT INTO `dm_parroquias` VALUES ('746', '291', 'Antolín Tovar');
INSERT INTO `dm_parroquias` VALUES ('747', '292', 'San Rafael de Onoto');
INSERT INTO `dm_parroquias` VALUES ('748', '292', 'Santa Fe');
INSERT INTO `dm_parroquias` VALUES ('749', '292', 'Thermo Morles');
INSERT INTO `dm_parroquias` VALUES ('750', '293', 'Santa Rosalía');
INSERT INTO `dm_parroquias` VALUES ('751', '293', 'Florida');
INSERT INTO `dm_parroquias` VALUES ('752', '294', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('753', '294', 'Concepción');
INSERT INTO `dm_parroquias` VALUES ('754', '294', 'San Rafael de Palo Alzado');
INSERT INTO `dm_parroquias` VALUES ('755', '294', 'Uvencio Antonio Velásquez');
INSERT INTO `dm_parroquias` VALUES ('756', '294', 'San Jose de Saguaz');
INSERT INTO `dm_parroquias` VALUES ('757', '294', 'Villa Rosa');
INSERT INTO `dm_parroquias` VALUES ('758', '295', 'Turen');
INSERT INTO `dm_parroquias` VALUES ('759', '295', 'Canelones');
INSERT INTO `dm_parroquias` VALUES ('760', '295', 'Santa Cruz');
INSERT INTO `dm_parroquias` VALUES ('761', '295', 'San Isidro Labrador');
INSERT INTO `dm_parroquias` VALUES ('762', '296', 'Mariño');
INSERT INTO `dm_parroquias` VALUES ('763', '296', 'Rómulo Gallegos');
INSERT INTO `dm_parroquias` VALUES ('764', '297', 'San Jose de Aerocuar');
INSERT INTO `dm_parroquias` VALUES ('765', '297', 'Tavera Acosta');
INSERT INTO `dm_parroquias` VALUES ('766', '298', 'Río Caribe');
INSERT INTO `dm_parroquias` VALUES ('767', '298', 'Antonio Jose de Sucre');
INSERT INTO `dm_parroquias` VALUES ('768', '298', 'El Morro de Puerto Santo');
INSERT INTO `dm_parroquias` VALUES ('769', '298', 'Puerto Santo');
INSERT INTO `dm_parroquias` VALUES ('770', '298', 'San Juan de las Galdonas');
INSERT INTO `dm_parroquias` VALUES ('771', '299', 'El Pilar');
INSERT INTO `dm_parroquias` VALUES ('772', '299', 'El Rincón');
INSERT INTO `dm_parroquias` VALUES ('773', '299', 'General Francisco Antonio Váquez');
INSERT INTO `dm_parroquias` VALUES ('774', '299', 'Guaraúnos');
INSERT INTO `dm_parroquias` VALUES ('775', '299', 'Tunapuicito');
INSERT INTO `dm_parroquias` VALUES ('776', '299', 'Unión');
INSERT INTO `dm_parroquias` VALUES ('777', '300', 'Santa Catalina');
INSERT INTO `dm_parroquias` VALUES ('778', '300', 'Santa Rosa');
INSERT INTO `dm_parroquias` VALUES ('779', '300', 'Santa Teresa');
INSERT INTO `dm_parroquias` VALUES ('780', '300', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('781', '300', 'Maracapana');
INSERT INTO `dm_parroquias` VALUES ('782', '302', 'Libertad');
INSERT INTO `dm_parroquias` VALUES ('783', '302', 'El Paujil');
INSERT INTO `dm_parroquias` VALUES ('784', '302', 'Yaguaraparo');
INSERT INTO `dm_parroquias` VALUES ('785', '303', 'Cruz Salmerón Acosta');
INSERT INTO `dm_parroquias` VALUES ('786', '303', 'Chacopata');
INSERT INTO `dm_parroquias` VALUES ('787', '303', 'Manicuare');
INSERT INTO `dm_parroquias` VALUES ('788', '304', 'Tunapuy');
INSERT INTO `dm_parroquias` VALUES ('789', '304', 'Campo Elías');
INSERT INTO `dm_parroquias` VALUES ('790', '305', 'Irapa');
INSERT INTO `dm_parroquias` VALUES ('791', '305', 'Campo Claro');
INSERT INTO `dm_parroquias` VALUES ('792', '305', 'Maraval');
INSERT INTO `dm_parroquias` VALUES ('793', '305', 'San Antonio de Irapa');
INSERT INTO `dm_parroquias` VALUES ('794', '305', 'Soro');
INSERT INTO `dm_parroquias` VALUES ('795', '306', 'Mejía');
INSERT INTO `dm_parroquias` VALUES ('796', '307', 'Cumanacoa');
INSERT INTO `dm_parroquias` VALUES ('797', '307', 'Arenas');
INSERT INTO `dm_parroquias` VALUES ('798', '307', 'Aricagua');
INSERT INTO `dm_parroquias` VALUES ('799', '307', 'Cogollar');
INSERT INTO `dm_parroquias` VALUES ('800', '307', 'San Fernando');
INSERT INTO `dm_parroquias` VALUES ('801', '307', 'San Lorenzo');
INSERT INTO `dm_parroquias` VALUES ('802', '308', 'Villa Frontado (Muelle de Cariaco)');
INSERT INTO `dm_parroquias` VALUES ('803', '308', 'Catuaro');
INSERT INTO `dm_parroquias` VALUES ('804', '308', 'Rendón');
INSERT INTO `dm_parroquias` VALUES ('805', '308', 'San Cruz');
INSERT INTO `dm_parroquias` VALUES ('806', '308', 'Santa María');
INSERT INTO `dm_parroquias` VALUES ('807', '309', 'Altagracia');
INSERT INTO `dm_parroquias` VALUES ('808', '309', 'Santa Ines');
INSERT INTO `dm_parroquias` VALUES ('809', '309', 'Valentín Valiente');
INSERT INTO `dm_parroquias` VALUES ('810', '309', 'Ayacucho');
INSERT INTO `dm_parroquias` VALUES ('811', '309', 'San Juan');
INSERT INTO `dm_parroquias` VALUES ('812', '309', 'Raúl Leoni');
INSERT INTO `dm_parroquias` VALUES ('813', '309', 'Gran Mariscal');
INSERT INTO `dm_parroquias` VALUES ('814', '310', 'Cristóbal Colón');
INSERT INTO `dm_parroquias` VALUES ('815', '310', 'Bideau');
INSERT INTO `dm_parroquias` VALUES ('816', '310', 'Punta de Piedras');
INSERT INTO `dm_parroquias` VALUES ('817', '310', 'Gúiria');
INSERT INTO `dm_parroquias` VALUES ('818', '341', 'Andres Bello');
INSERT INTO `dm_parroquias` VALUES ('819', '342', 'Antonio Rómulo Costa');
INSERT INTO `dm_parroquias` VALUES ('820', '343', 'Ayacucho');
INSERT INTO `dm_parroquias` VALUES ('821', '343', 'Rivas Berti');
INSERT INTO `dm_parroquias` VALUES ('822', '343', 'San Pedro del Río');
INSERT INTO `dm_parroquias` VALUES ('823', '344', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('824', '344', 'Palotal');
INSERT INTO `dm_parroquias` VALUES ('825', '344', 'General Juan Vicente Gómez');
INSERT INTO `dm_parroquias` VALUES ('826', '344', 'Isaías Medina Angarita');
INSERT INTO `dm_parroquias` VALUES ('827', '345', 'Cárdenas');
INSERT INTO `dm_parroquias` VALUES ('828', '345', 'Amenodoro Ángel Lamus');
INSERT INTO `dm_parroquias` VALUES ('829', '345', 'La Florida');
INSERT INTO `dm_parroquias` VALUES ('830', '346', 'Córdoba');
INSERT INTO `dm_parroquias` VALUES ('831', '347', 'Fernández Feo');
INSERT INTO `dm_parroquias` VALUES ('832', '347', 'Alberto Adriani');
INSERT INTO `dm_parroquias` VALUES ('833', '347', 'Santo Domingo');
INSERT INTO `dm_parroquias` VALUES ('834', '348', 'Francisco de Miranda');
INSERT INTO `dm_parroquias` VALUES ('835', '349', 'García de Hevia');
INSERT INTO `dm_parroquias` VALUES ('836', '349', 'Boca de Grita');
INSERT INTO `dm_parroquias` VALUES ('837', '349', 'Jose Antonio paez');
INSERT INTO `dm_parroquias` VALUES ('838', '350', 'Guásimos');
INSERT INTO `dm_parroquias` VALUES ('839', '351', 'Independencia');
INSERT INTO `dm_parroquias` VALUES ('840', '351', 'Juan Germán Roscio');
INSERT INTO `dm_parroquias` VALUES ('841', '351', 'Román Cárdenas');
INSERT INTO `dm_parroquias` VALUES ('842', '352', 'Jáuregui');
INSERT INTO `dm_parroquias` VALUES ('843', '352', 'Emilio Constantino Guerrero');
INSERT INTO `dm_parroquias` VALUES ('844', '352', 'Monseñor Miguel Antonio Salas');
INSERT INTO `dm_parroquias` VALUES ('845', '353', 'Jose María Vargas');
INSERT INTO `dm_parroquias` VALUES ('846', '354', 'Junín');
INSERT INTO `dm_parroquias` VALUES ('847', '354', 'La Petrólea');
INSERT INTO `dm_parroquias` VALUES ('848', '354', 'Quinimarí');
INSERT INTO `dm_parroquias` VALUES ('849', '354', 'Bramón');
INSERT INTO `dm_parroquias` VALUES ('850', '355', 'Libertad');
INSERT INTO `dm_parroquias` VALUES ('851', '355', 'Cipriano Castro');
INSERT INTO `dm_parroquias` VALUES ('852', '355', 'Manuel Felipe Rugeles');
INSERT INTO `dm_parroquias` VALUES ('853', '356', 'Libertador');
INSERT INTO `dm_parroquias` VALUES ('854', '356', 'Doradas');
INSERT INTO `dm_parroquias` VALUES ('855', '356', 'Emeterio Ochoa');
INSERT INTO `dm_parroquias` VALUES ('856', '356', 'San Joaquín de Navay');
INSERT INTO `dm_parroquias` VALUES ('857', '357', 'Lobatera');
INSERT INTO `dm_parroquias` VALUES ('858', '357', 'Constitución');
INSERT INTO `dm_parroquias` VALUES ('859', '358', 'Michelena');
INSERT INTO `dm_parroquias` VALUES ('860', '359', 'Panamericano');
INSERT INTO `dm_parroquias` VALUES ('861', '359', 'La Palmita');
INSERT INTO `dm_parroquias` VALUES ('862', '360', 'Pedro María Ureña');
INSERT INTO `dm_parroquias` VALUES ('863', '360', 'Nueva Arcadia');
INSERT INTO `dm_parroquias` VALUES ('864', '361', 'Delicias');
INSERT INTO `dm_parroquias` VALUES ('865', '361', 'Pecaya');
INSERT INTO `dm_parroquias` VALUES ('866', '362', 'Samuel Darío Maldonado');
INSERT INTO `dm_parroquias` VALUES ('867', '362', 'Boconó');
INSERT INTO `dm_parroquias` VALUES ('868', '362', 'Hernández');
INSERT INTO `dm_parroquias` VALUES ('869', '363', 'La Concordia');
INSERT INTO `dm_parroquias` VALUES ('870', '363', 'San Juan Bautista');
INSERT INTO `dm_parroquias` VALUES ('871', '363', 'Pedro María Morantes');
INSERT INTO `dm_parroquias` VALUES ('872', '363', 'San Sebastián');
INSERT INTO `dm_parroquias` VALUES ('873', '363', 'Dr. Francisco Romero Lobo');
INSERT INTO `dm_parroquias` VALUES ('874', '364', 'Seboruco');
INSERT INTO `dm_parroquias` VALUES ('875', '365', 'Simón Rodríguez');
INSERT INTO `dm_parroquias` VALUES ('876', '366', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('877', '366', 'Eleazar López Contreras');
INSERT INTO `dm_parroquias` VALUES ('878', '366', 'San Pablo');
INSERT INTO `dm_parroquias` VALUES ('879', '367', 'Torbes');
INSERT INTO `dm_parroquias` VALUES ('880', '368', 'Uribante');
INSERT INTO `dm_parroquias` VALUES ('881', '368', 'Cárdenas');
INSERT INTO `dm_parroquias` VALUES ('882', '368', 'Juan Pablo Peñalosa');
INSERT INTO `dm_parroquias` VALUES ('883', '368', 'Potosí');
INSERT INTO `dm_parroquias` VALUES ('884', '369', 'San Judas Tadeo');
INSERT INTO `dm_parroquias` VALUES ('885', '370', 'Araguaney');
INSERT INTO `dm_parroquias` VALUES ('886', '370', 'El Jaguito');
INSERT INTO `dm_parroquias` VALUES ('887', '370', 'La Esperanza');
INSERT INTO `dm_parroquias` VALUES ('888', '370', 'Santa Isabel');
INSERT INTO `dm_parroquias` VALUES ('889', '371', 'Boconó');
INSERT INTO `dm_parroquias` VALUES ('890', '371', 'El Carmen');
INSERT INTO `dm_parroquias` VALUES ('891', '371', 'Mosquey');
INSERT INTO `dm_parroquias` VALUES ('892', '371', 'Ayacucho');
INSERT INTO `dm_parroquias` VALUES ('893', '371', 'Burbusay');
INSERT INTO `dm_parroquias` VALUES ('894', '371', 'General Ribas');
INSERT INTO `dm_parroquias` VALUES ('895', '371', 'Guaramacal');
INSERT INTO `dm_parroquias` VALUES ('896', '371', 'Vega de Guaramacal');
INSERT INTO `dm_parroquias` VALUES ('897', '371', 'Monseñor Jáuregui');
INSERT INTO `dm_parroquias` VALUES ('898', '371', 'Rafael Rangel');
INSERT INTO `dm_parroquias` VALUES ('899', '371', 'San Miguel');
INSERT INTO `dm_parroquias` VALUES ('900', '371', 'San Jose');
INSERT INTO `dm_parroquias` VALUES ('901', '372', 'Sabana Grande');
INSERT INTO `dm_parroquias` VALUES ('902', '372', 'Cheregúe');
INSERT INTO `dm_parroquias` VALUES ('903', '372', 'Granados');
INSERT INTO `dm_parroquias` VALUES ('904', '373', 'Arnoldo Gabaldón');
INSERT INTO `dm_parroquias` VALUES ('905', '373', 'Bolivia');
INSERT INTO `dm_parroquias` VALUES ('906', '373', 'Carrillo');
INSERT INTO `dm_parroquias` VALUES ('907', '373', 'Cegarra');
INSERT INTO `dm_parroquias` VALUES ('908', '373', 'Chejende');
INSERT INTO `dm_parroquias` VALUES ('909', '373', 'Manuel Salvador Ulloa');
INSERT INTO `dm_parroquias` VALUES ('910', '373', 'San Jose');
INSERT INTO `dm_parroquias` VALUES ('911', '374', 'Carache');
INSERT INTO `dm_parroquias` VALUES ('912', '374', 'La Concepción');
INSERT INTO `dm_parroquias` VALUES ('913', '374', 'Cuicas');
INSERT INTO `dm_parroquias` VALUES ('914', '374', 'Panamericana');
INSERT INTO `dm_parroquias` VALUES ('915', '374', 'Santa Cruz');
INSERT INTO `dm_parroquias` VALUES ('916', '375', 'Escuque');
INSERT INTO `dm_parroquias` VALUES ('917', '375', 'La Unión');
INSERT INTO `dm_parroquias` VALUES ('918', '375', 'Santa Rita');
INSERT INTO `dm_parroquias` VALUES ('919', '375', 'Sabana Libre');
INSERT INTO `dm_parroquias` VALUES ('920', '376', 'El Socorro');
INSERT INTO `dm_parroquias` VALUES ('921', '376', 'Los Caprichos');
INSERT INTO `dm_parroquias` VALUES ('922', '376', 'Antonio Jose de Sucre');
INSERT INTO `dm_parroquias` VALUES ('923', '377', 'Campo Elías');
INSERT INTO `dm_parroquias` VALUES ('924', '377', 'Arnoldo Gabaldón');
INSERT INTO `dm_parroquias` VALUES ('925', '378', 'Santa Apolonia');
INSERT INTO `dm_parroquias` VALUES ('926', '378', 'El Progreso');
INSERT INTO `dm_parroquias` VALUES ('927', '378', 'La Ceiba');
INSERT INTO `dm_parroquias` VALUES ('928', '378', 'Tres de Febrero');
INSERT INTO `dm_parroquias` VALUES ('929', '379', 'El Dividive');
INSERT INTO `dm_parroquias` VALUES ('930', '379', 'Agua Santa');
INSERT INTO `dm_parroquias` VALUES ('931', '379', 'Agua Caliente');
INSERT INTO `dm_parroquias` VALUES ('932', '379', 'El Cenizo');
INSERT INTO `dm_parroquias` VALUES ('933', '379', 'Valerita');
INSERT INTO `dm_parroquias` VALUES ('934', '380', 'Monte Carmelo');
INSERT INTO `dm_parroquias` VALUES ('935', '380', 'Buena Vista');
INSERT INTO `dm_parroquias` VALUES ('936', '380', 'Santa María del Horcón');
INSERT INTO `dm_parroquias` VALUES ('937', '381', 'Motatán');
INSERT INTO `dm_parroquias` VALUES ('938', '381', 'El Baño');
INSERT INTO `dm_parroquias` VALUES ('939', '381', 'Jalisco');
INSERT INTO `dm_parroquias` VALUES ('940', '382', 'Pampan');
INSERT INTO `dm_parroquias` VALUES ('941', '382', 'Flor de Patria');
INSERT INTO `dm_parroquias` VALUES ('942', '382', 'La Paz');
INSERT INTO `dm_parroquias` VALUES ('943', '382', 'Santa Ana');
INSERT INTO `dm_parroquias` VALUES ('944', '383', 'Pampanito');
INSERT INTO `dm_parroquias` VALUES ('945', '383', 'La Concepción');
INSERT INTO `dm_parroquias` VALUES ('946', '383', 'Pampanito II');
INSERT INTO `dm_parroquias` VALUES ('947', '384', 'Betijoque');
INSERT INTO `dm_parroquias` VALUES ('948', '384', 'Jose Gregorio Hernández');
INSERT INTO `dm_parroquias` VALUES ('949', '384', 'La Pueblita');
INSERT INTO `dm_parroquias` VALUES ('950', '384', 'Los Cedros');
INSERT INTO `dm_parroquias` VALUES ('951', '385', 'Carvajal');
INSERT INTO `dm_parroquias` VALUES ('952', '385', 'Campo Alegre');
INSERT INTO `dm_parroquias` VALUES ('953', '385', 'Antonio Nicolás Briceño');
INSERT INTO `dm_parroquias` VALUES ('954', '385', 'Jose Leonardo Suárez');
INSERT INTO `dm_parroquias` VALUES ('955', '386', 'Sabana de Mendoza');
INSERT INTO `dm_parroquias` VALUES ('956', '386', 'Junín');
INSERT INTO `dm_parroquias` VALUES ('957', '386', 'Valmore Rodríguez');
INSERT INTO `dm_parroquias` VALUES ('958', '386', 'El Paraíso');
INSERT INTO `dm_parroquias` VALUES ('959', '387', 'Andres Linares');
INSERT INTO `dm_parroquias` VALUES ('960', '387', 'Chiquinquirá');
INSERT INTO `dm_parroquias` VALUES ('961', '387', 'Cristóbal Mendoza');
INSERT INTO `dm_parroquias` VALUES ('962', '387', 'Cruz Carrillo');
INSERT INTO `dm_parroquias` VALUES ('963', '387', 'Matriz');
INSERT INTO `dm_parroquias` VALUES ('964', '387', 'Monseñor Carrillo');
INSERT INTO `dm_parroquias` VALUES ('965', '387', 'Tres Esquinas');
INSERT INTO `dm_parroquias` VALUES ('966', '388', 'Cabimbú');
INSERT INTO `dm_parroquias` VALUES ('967', '388', 'Jajó');
INSERT INTO `dm_parroquias` VALUES ('968', '388', 'La Mesa de Esnujaque');
INSERT INTO `dm_parroquias` VALUES ('969', '388', 'Santiago');
INSERT INTO `dm_parroquias` VALUES ('970', '388', 'Tuñame');
INSERT INTO `dm_parroquias` VALUES ('971', '388', 'La Quebrada');
INSERT INTO `dm_parroquias` VALUES ('972', '389', 'Juan Ignacio Montilla');
INSERT INTO `dm_parroquias` VALUES ('973', '389', 'La Beatriz');
INSERT INTO `dm_parroquias` VALUES ('974', '389', 'La Puerta');
INSERT INTO `dm_parroquias` VALUES ('975', '389', 'Mendoza del Valle de Momboy');
INSERT INTO `dm_parroquias` VALUES ('976', '389', 'Mercedes Díaz');
INSERT INTO `dm_parroquias` VALUES ('977', '389', 'San Luis');
INSERT INTO `dm_parroquias` VALUES ('978', '390', 'Caraballeda');
INSERT INTO `dm_parroquias` VALUES ('979', '390', 'Carayaca');
INSERT INTO `dm_parroquias` VALUES ('980', '390', 'Carlos Soublette');
INSERT INTO `dm_parroquias` VALUES ('981', '390', 'Caruao Chuspa');
INSERT INTO `dm_parroquias` VALUES ('982', '390', 'Catia La Mar');
INSERT INTO `dm_parroquias` VALUES ('983', '390', 'El Junko');
INSERT INTO `dm_parroquias` VALUES ('984', '390', 'La Guaira');
INSERT INTO `dm_parroquias` VALUES ('985', '390', 'Macuto');
INSERT INTO `dm_parroquias` VALUES ('986', '390', 'Maiquetía');
INSERT INTO `dm_parroquias` VALUES ('987', '390', 'Naiguatá');
INSERT INTO `dm_parroquias` VALUES ('988', '390', 'Urimare');
INSERT INTO `dm_parroquias` VALUES ('989', '391', 'Arístides Bastidas');
INSERT INTO `dm_parroquias` VALUES ('990', '392', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('991', '407', 'Chivacoa');
INSERT INTO `dm_parroquias` VALUES ('992', '407', 'Campo Elías');
INSERT INTO `dm_parroquias` VALUES ('993', '408', 'Cocorote');
INSERT INTO `dm_parroquias` VALUES ('994', '409', 'Independencia');
INSERT INTO `dm_parroquias` VALUES ('995', '410', 'Jose Antonio paez');
INSERT INTO `dm_parroquias` VALUES ('996', '411', 'La Trinidad');
INSERT INTO `dm_parroquias` VALUES ('997', '412', 'Manuel Monge');
INSERT INTO `dm_parroquias` VALUES ('998', '413', 'Salóm');
INSERT INTO `dm_parroquias` VALUES ('999', '413', 'Temerla');
INSERT INTO `dm_parroquias` VALUES ('1000', '413', 'Nirgua');
INSERT INTO `dm_parroquias` VALUES ('1001', '414', 'San Andres');
INSERT INTO `dm_parroquias` VALUES ('1002', '414', 'Yaritagua');
INSERT INTO `dm_parroquias` VALUES ('1003', '415', 'San Javier');
INSERT INTO `dm_parroquias` VALUES ('1004', '415', 'Albarico');
INSERT INTO `dm_parroquias` VALUES ('1005', '415', 'San Felipe');
INSERT INTO `dm_parroquias` VALUES ('1006', '416', 'Sucre');
INSERT INTO `dm_parroquias` VALUES ('1007', '417', 'Urachiche');
INSERT INTO `dm_parroquias` VALUES ('1008', '418', 'El Guayabo');
INSERT INTO `dm_parroquias` VALUES ('1009', '418', 'Farriar');
INSERT INTO `dm_parroquias` VALUES ('1010', '441', 'Isla de Toas');
INSERT INTO `dm_parroquias` VALUES ('1011', '441', 'Monagas');
INSERT INTO `dm_parroquias` VALUES ('1012', '442', 'San Timoteo');
INSERT INTO `dm_parroquias` VALUES ('1013', '442', 'General Urdaneta');
INSERT INTO `dm_parroquias` VALUES ('1014', '442', 'Libertador');
INSERT INTO `dm_parroquias` VALUES ('1015', '442', 'Marcelino Briceño');
INSERT INTO `dm_parroquias` VALUES ('1016', '442', 'Pueblo Nuevo');
INSERT INTO `dm_parroquias` VALUES ('1017', '442', 'Manuel Guanipa Matos');
INSERT INTO `dm_parroquias` VALUES ('1018', '443', 'Ambrosio');
INSERT INTO `dm_parroquias` VALUES ('1019', '443', 'Carmen Herrera');
INSERT INTO `dm_parroquias` VALUES ('1020', '443', 'La Rosa');
INSERT INTO `dm_parroquias` VALUES ('1021', '443', 'Germán Ríos Linares');
INSERT INTO `dm_parroquias` VALUES ('1022', '443', 'San Benito');
INSERT INTO `dm_parroquias` VALUES ('1023', '443', 'Rómulo Betancourt');
INSERT INTO `dm_parroquias` VALUES ('1024', '443', 'Jorge Hernández');
INSERT INTO `dm_parroquias` VALUES ('1025', '443', 'Punta Gorda');
INSERT INTO `dm_parroquias` VALUES ('1026', '443', 'Arístides Calvani');
INSERT INTO `dm_parroquias` VALUES ('1027', '444', 'Encontrados');
INSERT INTO `dm_parroquias` VALUES ('1028', '444', 'Udón Perez');
INSERT INTO `dm_parroquias` VALUES ('1029', '445', 'Moralito');
INSERT INTO `dm_parroquias` VALUES ('1030', '445', 'San Carlos del Zulia');
INSERT INTO `dm_parroquias` VALUES ('1031', '445', 'Santa Cruz del Zulia');
INSERT INTO `dm_parroquias` VALUES ('1032', '445', 'Santa Bárbara');
INSERT INTO `dm_parroquias` VALUES ('1033', '445', 'Urribarrí');
INSERT INTO `dm_parroquias` VALUES ('1034', '446', 'Carlos Quevedo');
INSERT INTO `dm_parroquias` VALUES ('1035', '446', 'Francisco Javier Pulgar');
INSERT INTO `dm_parroquias` VALUES ('1036', '446', 'Simón Rodríguez');
INSERT INTO `dm_parroquias` VALUES ('1037', '446', 'Guamo-Gavilanes');
INSERT INTO `dm_parroquias` VALUES ('1038', '448', 'La Concepción');
INSERT INTO `dm_parroquias` VALUES ('1039', '448', 'San Jose');
INSERT INTO `dm_parroquias` VALUES ('1040', '448', 'Mariano Parra León');
INSERT INTO `dm_parroquias` VALUES ('1041', '448', 'Jose Ramón Yepez');
INSERT INTO `dm_parroquias` VALUES ('1042', '449', 'Jesús María Semprún');
INSERT INTO `dm_parroquias` VALUES ('1043', '449', 'Barí');
INSERT INTO `dm_parroquias` VALUES ('1044', '450', 'Concepción');
INSERT INTO `dm_parroquias` VALUES ('1045', '450', 'Andres Bello');
INSERT INTO `dm_parroquias` VALUES ('1046', '450', 'Chiquinquirá');
INSERT INTO `dm_parroquias` VALUES ('1047', '450', 'El Carmelo');
INSERT INTO `dm_parroquias` VALUES ('1048', '450', 'Potreritos');
INSERT INTO `dm_parroquias` VALUES ('1049', '451', 'Libertad');
INSERT INTO `dm_parroquias` VALUES ('1050', '451', 'Alonso de Ojeda');
INSERT INTO `dm_parroquias` VALUES ('1051', '451', 'Venezuela');
INSERT INTO `dm_parroquias` VALUES ('1052', '451', 'Eleazar López Contreras');
INSERT INTO `dm_parroquias` VALUES ('1053', '451', 'Campo Lara');
INSERT INTO `dm_parroquias` VALUES ('1054', '452', 'Bartolome de las Casas');
INSERT INTO `dm_parroquias` VALUES ('1055', '452', 'Libertad');
INSERT INTO `dm_parroquias` VALUES ('1056', '452', 'Río Negro');
INSERT INTO `dm_parroquias` VALUES ('1057', '452', 'San Jose de Perijá');
INSERT INTO `dm_parroquias` VALUES ('1058', '453', 'San Rafael');
INSERT INTO `dm_parroquias` VALUES ('1059', '453', 'La Sierrita');
INSERT INTO `dm_parroquias` VALUES ('1060', '453', 'Las Parcelas');
INSERT INTO `dm_parroquias` VALUES ('1061', '453', 'Luis de Vicente');
INSERT INTO `dm_parroquias` VALUES ('1062', '453', 'Monseñor Marcos Sergio Godoy');
INSERT INTO `dm_parroquias` VALUES ('1063', '453', 'Ricaurte');
INSERT INTO `dm_parroquias` VALUES ('1064', '453', 'Tamare');
INSERT INTO `dm_parroquias` VALUES ('1065', '454', 'Antonio Borjas Romero');
INSERT INTO `dm_parroquias` VALUES ('1066', '454', 'Bolívar');
INSERT INTO `dm_parroquias` VALUES ('1067', '454', 'Cacique Mara');
INSERT INTO `dm_parroquias` VALUES ('1068', '454', 'Carracciolo Parra Perez');
INSERT INTO `dm_parroquias` VALUES ('1069', '454', 'Cecilio Acosta');
INSERT INTO `dm_parroquias` VALUES ('1070', '454', 'Cristo de Aranza');
INSERT INTO `dm_parroquias` VALUES ('1071', '454', 'Coquivacoa');
INSERT INTO `dm_parroquias` VALUES ('1072', '454', 'Chiquinquirá');
INSERT INTO `dm_parroquias` VALUES ('1073', '454', 'Francisco Eugenio Bustamante');
INSERT INTO `dm_parroquias` VALUES ('1074', '454', 'Idelfonzo Vásquez');
INSERT INTO `dm_parroquias` VALUES ('1075', '454', 'Juana de Ávila');
INSERT INTO `dm_parroquias` VALUES ('1076', '454', 'Luis Hurtado Higuera');
INSERT INTO `dm_parroquias` VALUES ('1077', '454', 'Manuel Dagnino');
INSERT INTO `dm_parroquias` VALUES ('1078', '454', 'Olegario Villalobos');
INSERT INTO `dm_parroquias` VALUES ('1079', '454', 'Raúl Leoni');
INSERT INTO `dm_parroquias` VALUES ('1080', '454', 'Santa Lucía');
INSERT INTO `dm_parroquias` VALUES ('1081', '454', 'Venancio Pulgar');
INSERT INTO `dm_parroquias` VALUES ('1082', '454', 'San Isidro');
INSERT INTO `dm_parroquias` VALUES ('1083', '455', 'Altagracia');
INSERT INTO `dm_parroquias` VALUES ('1084', '455', 'Faría');
INSERT INTO `dm_parroquias` VALUES ('1085', '455', 'Ana María Campos');
INSERT INTO `dm_parroquias` VALUES ('1086', '455', 'San Antonio');
INSERT INTO `dm_parroquias` VALUES ('1087', '455', 'San Jose');
INSERT INTO `dm_parroquias` VALUES ('1088', '456', 'Donaldo García');
INSERT INTO `dm_parroquias` VALUES ('1089', '456', 'El Rosario');
INSERT INTO `dm_parroquias` VALUES ('1090', '456', 'Sixto Zambrano');
INSERT INTO `dm_parroquias` VALUES ('1091', '457', 'San Francisco');
INSERT INTO `dm_parroquias` VALUES ('1092', '457', 'El Bajo');
INSERT INTO `dm_parroquias` VALUES ('1093', '457', 'Domitila Flores');
INSERT INTO `dm_parroquias` VALUES ('1094', '457', 'Francisco Ochoa');
INSERT INTO `dm_parroquias` VALUES ('1095', '457', 'Los Cortijos');
INSERT INTO `dm_parroquias` VALUES ('1096', '457', 'Marcial Hernández');
INSERT INTO `dm_parroquias` VALUES ('1097', '458', 'Santa Rita');
INSERT INTO `dm_parroquias` VALUES ('1098', '458', 'El Mene');
INSERT INTO `dm_parroquias` VALUES ('1099', '458', 'Pedro Lucas Urribarrí');
INSERT INTO `dm_parroquias` VALUES ('1100', '458', 'Jose Cenobio Urribarrí');
INSERT INTO `dm_parroquias` VALUES ('1101', '459', 'Rafael Maria Baralt');
INSERT INTO `dm_parroquias` VALUES ('1102', '459', 'Manuel Manrique');
INSERT INTO `dm_parroquias` VALUES ('1103', '459', 'Rafael Urdaneta');
INSERT INTO `dm_parroquias` VALUES ('1104', '460', 'Bobures');
INSERT INTO `dm_parroquias` VALUES ('1105', '460', 'Gibraltar');
INSERT INTO `dm_parroquias` VALUES ('1106', '460', 'Heras');
INSERT INTO `dm_parroquias` VALUES ('1107', '460', 'Monseñor Arturo Álvarez');
INSERT INTO `dm_parroquias` VALUES ('1108', '460', 'Rómulo Gallegos');
INSERT INTO `dm_parroquias` VALUES ('1109', '460', 'El Batey');
INSERT INTO `dm_parroquias` VALUES ('1110', '461', 'Rafael Urdaneta');
INSERT INTO `dm_parroquias` VALUES ('1111', '461', 'La Victoria');
INSERT INTO `dm_parroquias` VALUES ('1112', '461', 'Raúl Cuenca');
INSERT INTO `dm_parroquias` VALUES ('1113', '447', 'Sinamaica');
INSERT INTO `dm_parroquias` VALUES ('1114', '447', 'Alta Guajira');
INSERT INTO `dm_parroquias` VALUES ('1115', '447', 'Elías Sánchez Rubio');
INSERT INTO `dm_parroquias` VALUES ('1116', '447', 'Guajira');
INSERT INTO `dm_parroquias` VALUES ('1117', '462', 'Altagracia');
INSERT INTO `dm_parroquias` VALUES ('1118', '462', 'Antímano');
INSERT INTO `dm_parroquias` VALUES ('1119', '462', 'Caricuao');
INSERT INTO `dm_parroquias` VALUES ('1120', '462', 'Catedral');
INSERT INTO `dm_parroquias` VALUES ('1121', '462', 'Coche');
INSERT INTO `dm_parroquias` VALUES ('1122', '462', 'El Junquito');
INSERT INTO `dm_parroquias` VALUES ('1123', '462', 'El Paraíso');
INSERT INTO `dm_parroquias` VALUES ('1124', '462', 'El Recreo');
INSERT INTO `dm_parroquias` VALUES ('1125', '462', 'El Valle');
INSERT INTO `dm_parroquias` VALUES ('1126', '462', 'La Candelaria');
INSERT INTO `dm_parroquias` VALUES ('1127', '462', 'La Pastora');
INSERT INTO `dm_parroquias` VALUES ('1128', '462', 'La Vega');
INSERT INTO `dm_parroquias` VALUES ('1129', '462', 'Macarao');
INSERT INTO `dm_parroquias` VALUES ('1130', '462', 'San Agustín');
INSERT INTO `dm_parroquias` VALUES ('1131', '462', 'San Bernardino');
INSERT INTO `dm_parroquias` VALUES ('1132', '462', 'San Jose');
INSERT INTO `dm_parroquias` VALUES ('1133', '462', 'San Juan');
INSERT INTO `dm_parroquias` VALUES ('1134', '462', 'San Pedro');
INSERT INTO `dm_parroquias` VALUES ('1135', '462', 'Santa Rosalía');
INSERT INTO `dm_parroquias` VALUES ('1136', '462', 'Santa Teresa');
INSERT INTO `dm_parroquias` VALUES ('1137', '462', 'Sucre (Catia)');
INSERT INTO `dm_parroquias` VALUES ('1138', '462', '23 de enero');

-- ----------------------------
-- Table structure for dm_planta
-- ----------------------------
DROP TABLE IF EXISTS `dm_planta`;
CREATE TABLE `dm_planta` (
  `plantaId` int(11) NOT NULL,
  `complejoId` int(11) DEFAULT NULL,
  `instalacionesId` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `codSap` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`plantaId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='almaceba la estructrua de las platnas  el orden es\r\n\r\nComplejo -> Instalacion - > Planta';

-- ----------------------------
-- Records of dm_planta
-- ----------------------------

-- ----------------------------
-- Table structure for dm_planta_custodio
-- ----------------------------
DROP TABLE IF EXISTS `dm_planta_custodio`;
CREATE TABLE `dm_planta_custodio` (
  `plantaCustorioId` int(11) NOT NULL,
  `plantaId` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `custodioNumPersonal` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`plantaCustorioId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_planta_custodio
-- ----------------------------

-- ----------------------------
-- Table structure for dm_rol
-- ----------------------------
DROP TABLE IF EXISTS `dm_rol`;
CREATE TABLE `dm_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `des_rol` varchar(255) CHARACTER SET latin1 NOT NULL,
  `creado_por` int(255) DEFAULT NULL,
  `fecha_creacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `fecha_mod` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dm_rol
-- ----------------------------
INSERT INTO `dm_rol` VALUES ('1', 'Administrador', null, null, null, null);
INSERT INTO `dm_rol` VALUES ('2', 'Superintendente', null, null, null, null);
INSERT INTO `dm_rol` VALUES ('3', 'inspector', null, null, null, null);
INSERT INTO `dm_rol` VALUES ('4', 'Planificador', null, null, null, null);

-- ----------------------------
-- Table structure for dm_secciones
-- ----------------------------
DROP TABLE IF EXISTS `dm_secciones`;
CREATE TABLE `dm_secciones` (
  `seccionesId` int(11) NOT NULL,
  `complejoId` int(11) DEFAULT NULL,
  `instalacionesId` int(11) DEFAULT NULL,
  `plantaId` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `CodSap` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`seccionesId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_secciones
-- ----------------------------

-- ----------------------------
-- Table structure for dm_seccion_custodio
-- ----------------------------
DROP TABLE IF EXISTS `dm_seccion_custodio`;
CREATE TABLE `dm_seccion_custodio` (
  `seccionCustorioId` int(11) NOT NULL,
  `seccionesId` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `custodioNumPersonal` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`seccionCustorioId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_seccion_custodio
-- ----------------------------

-- ----------------------------
-- Table structure for dm_sector
-- ----------------------------
DROP TABLE IF EXISTS `dm_sector`;
CREATE TABLE `dm_sector` (
  `sectorId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sectorId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_sector
-- ----------------------------
INSERT INTO `dm_sector` VALUES ('1', 'Administrativo', null);
INSERT INTO `dm_sector` VALUES ('2', 'Industrial', null);

-- ----------------------------
-- Table structure for dm_subsector
-- ----------------------------
DROP TABLE IF EXISTS `dm_subsector`;
CREATE TABLE `dm_subsector` (
  `subsectorId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subsectorId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_subsector
-- ----------------------------
INSERT INTO `dm_subsector` VALUES ('1', 'S.I.', 'Seguridad Industrial');
INSERT INTO `dm_subsector` VALUES ('2', 'S.P.', 'Seguridad de Procesos');
INSERT INTO `dm_subsector` VALUES ('3', 'H.O.', 'Higuiene Ocupacional');
INSERT INTO `dm_subsector` VALUES ('4', 'A.', '------');
INSERT INTO `dm_subsector` VALUES ('5', 'A.D.Y.N.', '------');

-- ----------------------------
-- Table structure for dm_tipo_incidencia
-- ----------------------------
DROP TABLE IF EXISTS `dm_tipo_incidencia`;
CREATE TABLE `dm_tipo_incidencia` (
  `tipoIncidenciaId` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tipoIncidenciaId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dm_tipo_incidencia
-- ----------------------------
INSERT INTO `dm_tipo_incidencia` VALUES ('1', 'Emergencia', 'Inspecciones del tipo Emergecnia por algun incidencte ');
INSERT INTO `dm_tipo_incidencia` VALUES ('2', 'Simulacion', 'Inspeccion para verificar lel comportacmiento de los equipos y/o plantas');
INSERT INTO `dm_tipo_incidencia` VALUES ('3', 'Inspecciones sin formato', 'Estas son inspecciones sin preguntas precargadas');
INSERT INTO `dm_tipo_incidencia` VALUES ('4', 'Inspecciones con formto', 'Estas inspecciones tienen ya preguntas pervias y foematos establecidos');

-- ----------------------------
-- Table structure for rel_inspeccion_sector_subsector
-- ----------------------------
DROP TABLE IF EXISTS `rel_inspeccion_sector_subsector`;
CREATE TABLE `rel_inspeccion_sector_subsector` (
  `sectorId` int(11) NOT NULL,
  `subSectorId` int(11) NOT NULL,
  PRIMARY KEY (`sectorId`,`subSectorId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rel_inspeccion_sector_subsector
-- ----------------------------
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('1', '1');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('1', '2');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('1', '3');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('1', '4');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('1', '5');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('2', '3');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('2', '4');
INSERT INTO `rel_inspeccion_sector_subsector` VALUES ('2', '5');

-- ----------------------------
-- Table structure for rel_r24supervidor_empleado_complejo
-- ----------------------------
DROP TABLE IF EXISTS `rel_r24supervidor_empleado_complejo`;
CREATE TABLE `rel_r24supervidor_empleado_complejo` (
  `empleados_nroPersonal` int(11) NOT NULL,
  `id_complejo` int(11) DEFAULT NULL,
  PRIMARY KEY (`empleados_nroPersonal`),
  UNIQUE KEY `pojpo` (`empleados_nroPersonal`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of rel_r24supervidor_empleado_complejo
-- ----------------------------
INSERT INTO `rel_r24supervidor_empleado_complejo` VALUES ('13336768', '1');
INSERT INTO `rel_r24supervidor_empleado_complejo` VALUES ('13336770', '2');
INSERT INTO `rel_r24supervidor_empleado_complejo` VALUES ('13336769', '4');

-- ----------------------------
-- View structure for 02_view_per_roles
-- ----------------------------
DROP VIEW IF EXISTS `02_view_per_roles`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `02_view_per_roles` AS select `tbl_enlaces`.`enlace` AS `enlace`,`tbl_enlaces`.`descripcion` AS `descripcion`,`tbl_tipo_rol`.`id_sistem` AS `id_sistem`,`tbl_tipo_rol`.`id_user` AS `id_user`,`tbl_tipo_rol`.`a` AS `a`,`tbl_tipo_rol`.`m` AS `m`,`tbl_tipo_rol`.`module` AS `module`,`tbl_tipo_rol`.`d` AS `d`,`tbl_tipo_rol`.`e` AS `e`,`tbl_usuario`.`log_usu` AS `usuario`,`tbl_usuario`.`nom_usu` AS `nombre`,`tbl_usuario`.`ape_usu` AS `apellido`,`tbl_usuario`.`rol_usu` AS `id_rol`,`tbl_rol`.`des_rol` AS `descr` from (((`tbl_tipo_rol` join `tbl_enlaces` on((`tbl_enlaces`.`id` = `tbl_tipo_rol`.`id_sistem`))) join `tbl_usuario` on((`tbl_usuario`.`id_usu` = `tbl_tipo_rol`.`id_user`))) join `tbl_rol` on((`tbl_rol`.`id_rol` = `tbl_usuario`.`rol_usu`))) ;

-- ----------------------------
-- View structure for view_areas
-- ----------------------------
DROP VIEW IF EXISTS `view_areas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_areas` AS select `tbl_area`.`id_area` AS `id_area`,`tbl_area`.`cod_area` AS `cod_area`,`tbl_area`.`des_area` AS `des_area`,`tbl_area`.`ger_area` AS `ger_area`,`tbl_area`.`estado` AS `estado`,`tbl_gerencia`.`id_gerencia` AS `id_gerencia` from (`tbl_area` join `tbl_gerencia` on((`tbl_gerencia`.`cod_gerencia` = `tbl_area`.`ger_area`))) ;
