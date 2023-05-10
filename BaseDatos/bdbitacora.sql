
DROP DATABASE dbbitacora;
CREATE DATABASE `dbbitacora`;
USE `dbbitacora`;

-- Volcando estructura para tabla dbbitacora.catgastos
CREATE TABLE IF NOT EXISTS `catgastos` (
  `eIdLGasto` int NOT NULL AUTO_INCREMENT,
  `txtCveGasto` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdLGasto`)
);

-- Volcando estructura para tabla dbbitacora.catgenerales
CREATE TABLE `catgenerales` (
  `eIdGenerales` int AUTO_INCREMENT PRIMARY KEY,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtETA` varchar(50) DEFAULT NULL,
  `txtNaviera` varchar(50) DEFAULT NULL,
  `txtVessel` varchar(50) DEFAULT NULL,
  `txtVoyaje` varchar(50) DEFAULT NULL,
  `txtTerminal` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP)
;




-- Volcando estructura para tabla dbbitacora.catmaniobrasextras
CREATE TABLE IF NOT EXISTS `catmaniobrasextras` (
  `eIdManExtra` int NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtManiobraE` varchar(50) DEFAULT NULL,
  `txtValor` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdManExtra`)
);



-- Volcando estructura para tabla dbbitacora.catmercancias
CREATE TABLE IF NOT EXISTS `catmercancias` (
  `eIdMerca` int NOT NULL AUTO_INCREMENT,
  `fk_eIDReferencia` int DEFAULT NULL,
  `txtContenedor` varchar(50),
  `txtTamTipo` varchar(50) DEFAULT NULL,
  `txtPedimento` varchar(50),
  `txtBL` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdMerca`)
);




-- Volcando estructura para tabla dbbitacora.catpersonas
CREATE TABLE IF NOT EXISTS `catpersonas` (
  `eIdPersona` int NOT NULL AUTO_INCREMENT,
  `txtName` varchar(15) NOT NULL,
  `txtLastName` varchar(50) NOT NULL,
  `txtEmail` varchar(50),
  `bActivo` bit(1) NOT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdPersona`)
);



INSERT INTO `catpersonas` (`eIdPersona`, `txtName`, `txtLastName`, `txtEmail`, `bActivo`, `feCreatedAt`, `feUpdatedAt`) VALUES
	(1, 'Juan Manuel', 'Fernández Alvarez', NULL, b'1', '2023-03-02 18:20:18', '2023-03-02 18:20:20'),
	(2, 'Administrador', ' Tracing Logistics', NULL, b'1', '2023-03-09 17:46:32', '2023-03-09 17:46:32');

-- Volcando estructura para tabla dbbitacora.catreferencias
CREATE TABLE IF NOT EXISTS `catreferencias` (
  `eIdReferencia` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCliente` int DEFAULT '0',
  `cveReferencia` varchar(50) NOT NULL,
  `feReferencia` date NOT NULL,
  `bActiva` bit(1) NOT NULL DEFAULT b'1',
  `fhCreatedAt` datetime NOT NULL,
  `fhUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`eIdReferencia`)
) COMMENT='Datos Generales de Referencia';



INSERT INTO `catreferencias` (`eIdReferencia`, `fk_eIdCliente`, `cveReferencia`, `feReferencia`, `bActiva`, `fhCreatedAt`, `fhUpdatedAt`) VALUES
	(1, 1, '1', '2023-03-16', b'1', '2023-03-16 01:41:20', '2023-03-16 01:41:22'),
	(2, NULL, 'on', '0000-00-00', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, NULL, 'on', '0000-00-00', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, NULL, 'on', '0000-00-00', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 1, 'on', '0000-00-00', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 1, 'on', '0000-00-00', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 7, 'on', '0000-00-00', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 7, 'on', '2023-03-16', b'1', '2023-03-16 08:03:39', '2023-03-16 08:03:39'),
	(9, 8, 'on', '2023-03-16', b'1', '2023-03-16 08:03:59', '2023-03-16 08:03:59');

-- Volcando estructura para tabla dbbitacora.catusers
CREATE TABLE IF NOT EXISTS `catusers` (
  `eIdUsr` int NOT NULL AUTO_INCREMENT,
  `fkeIdPersona` int DEFAULT NULL,
  `fkeIdTipo` int DEFAULT NULL,
  `txtNickName` varchar(15) NOT NULL,
  `txtPass` varchar(50) NOT NULL,
  `bActivo` bit(1) NOT NULL DEFAULT b'0',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUsr`),
  KEY `fkeIdPersona` (`fkeIdPersona`),
  KEY `fkeIdTipo` (`fkeIdTipo`),
  CONSTRAINT `catusers_ibfk_1` FOREIGN KEY (`fkeIdPersona`) REFERENCES `catpersonas` (`eIdPersona`)
);



INSERT INTO `catusers` (`eIdUsr`, `fkeIdPersona`, `fkeIdTipo`, `txtNickName`, `txtPass`, `bActivo`, `feCreatedAt`, `feUpdatedAt`) VALUES
	(1, 1, 3, 'Juanma', '6b45be7910410293e64def2272ff6cd7', b'1', '2023-03-02 18:21:14', '2023-03-02 18:21:15'),
	(2, 2, 1, 'Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', b'1', '2023-03-09 18:47:13', '2023-03-09 17:47:13');

-- Volcando estructura para tabla dbbitacora.catusertypes
CREATE TABLE IF NOT EXISTS `catusertypes` (
  `eIdUserType` int NOT NULL AUTO_INCREMENT,
  `txtUserType` varchar(50) NOT NULL,
  `txtDescripcion` text,
  `bActivo` bit(1) DEFAULT b'1',
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUserType`)
);


INSERT INTO `catusertypes` (`eIdUserType`, `txtUserType`, `txtDescripcion`, `bActivo`, `feCreacion`, `feActualizacion`) VALUES
	(1, 'Administrador', 'Se encarga de llevar el seguimiento de cada uno d elos m´ódulos del sistema', b'1', '2023-03-17 12:49:32', '2023-03-17 12:49:31'),
	(2, 'Director General', 'Su nivel de acceso es para ver reportes, tendrá un dashboard personalizado y podrá generar algunas actividades como generación de referencias', b'1', '2023-03-17 18:49:51', '2023-03-17 18:49:51'),
	(3, 'Sistemas', 'Su nivel de acceso es el mismo que el administrador', b'1', '2023-03-17 18:50:45', '2023-03-17 18:50:45');

-- Volcando estructura para tabla dbbitacora.docctagastos
CREATE TABLE IF NOT EXISTS `docctagastos` (
  `eIdCtaGastos` int NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtCtaGastos` varchar(50) DEFAULT NULL,
  `txtUrl` varchar(50),
  `txtDocName` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCtaGastos`)
);


-- Volcando estructura para tabla dbbitacora.listgastos
CREATE TABLE IF NOT EXISTS `listgastos` (
  `eIdGastos` int NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtValor` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGastos`)
);



-- Volcando estructura para tabla dbbitacora.listmercas
CREATE TABLE IF NOT EXISTS `listmercas` (
  `eIdList` int AUTO_INCREMENT PRIMARY KEY,
  `fk_eIdMerca` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtMercancia` varchar(50) ,
  `txtBultos` varchar(50),
  `txtFraccion` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP
);



-- Volcando estructura para vista dbbitacora.vwlistaextras
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwlistaextras` (
	`idGasto` INT(10) NULL,
	`idReferencia` INT(10) NULL,
	`Maniobra` VARCHAR(50),
	`Valor` VARCHAR(50)
);

-- Volcando estructura para vista dbbitacora.vwlistagastos
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwlistagastos` (
	`IdGasto` INT(10) NOT NULL,
	`IdReferencia` INT(10) NULL,
	`Nombre_Gasto` VARCHAR(50) ,
	`Valor` VARCHAR(50) 
);

-- Volcando estructura para vista dbbitacora.vwlistamercancias
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwlistamercancias` (
	`IdReferencia` INT(10) NULL,
	`IdMercancia` INT(10) NOT NULL,
	`IdLista_Mercancias` INT(10) NOT NULL,
	`Mercancia` VARCHAR(50),
	`Bultos` VARCHAR(50) ,
	`Fraccion_Arancelaria` VARCHAR(50)
);

-- Volcando estructura para vista dbbitacora.vwreferencias
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwreferencias` (
	`IdReferencia` INT(10) NOT NULL,
	`IdCliente` INT(10) NULL,
	`CveReferencia` VARCHAR(50) ,
	`Fecha_Referencia` DATE NOT NULL,
	`Contenedor` VARCHAR(50),
	`Tamano_Tipo` VARCHAR(50),
	`Pedimento` VARCHAR(50) ,
	`BL` VARCHAR(50)
);

-- Volcando estructura para vista dbbitacora.vwuserdata
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwuserdata` (
	`IdP` INT(10) NOT NULL,
	`Nombre_s` VARCHAR(15),
	`Apellidos` VARCHAR(50),
	`NombreCompleto` VARCHAR(66) ,
	`Email` VARCHAR(50),
	`IdUsr` INT(10) NOT NULL,
	`Usuario` VARCHAR(15) ,
	`UserActive` BIT(1) NOT NULL,
	`IdType` INT(10) NOT NULL,
	`UserType` VARCHAR(50) ,
	`Descripcion` TEXT 
);

-- Volcando estructura para vista dbbitacora.vwusersactive
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwusersactive` (
	`Id` INT(10) NULL,
	`Usuario` VARCHAR(15) NOT NULL ,
	`Pass` VARCHAR(50) NOT NULL 
);

-- Volcando estructura para vista dbbitacora.vwusersdata
-- Creando tabla temporal para superar errores de dependencia de VIEW

-- Volcando estructura para vista dbbitacora.vwlistaextras
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwlistaextras`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `dbbitacora`.`vwlistaextras` AS select `me`.`fk_eIdGasto` AS `idGasto`,`me`.`fk_eIdReferencia` AS `idReferencia`,`me`.`txtManiobraE` AS `Maniobra`,`me`.`txtValor` AS `Valor` from (`dbbitacora`.`catmaniobrasextras` `me` join `dbbitacora`.`catreferencias` `ref` on((`me`.`fk_eIdReferencia` = `ref`.`eIdReferencia`)));

-- Volcando estructura para vista dbbitacora.vwlistagastos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwlistagastos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `dbbitacora`.`vwlistagastos` AS select `lg`.`eIdGastos` AS `IdGasto`,`lg`.`fk_eIdReferencia` AS `IdReferencia`,`g`.`txtCveGasto` AS `Nombre_Gasto`,`lg`.`txtValor` AS `Valor` from (`dbbitacora`.`catgastos` `g` join `dbbitacora`.`listgastos` `lg` on((`lg`.`fk_eIdGasto` = `g`.`eIdLGasto`)));

-- Volcando estructura para vista dbbitacora.vwlistamercancias
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwlistamercancias`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `dbbitacora`.`vwlistamercancias` AS select `cm`.`fk_eIDReferencia` AS `IdReferencia`,`cm`.`eIdMerca` AS `IdMercancia`,`lm`.`eIdList` AS `IdLista_Mercancias`,`lm`.`txtMercancia` AS `Mercancia`,`lm`.`txtBultos` AS `Bultos`,`lm`.`txtFraccion` AS `Fraccion_Arancelaria` from (`dbbitacora`.`listmercas` `lm` join `dbbitacora`.`catmercancias` `cm` on((`lm`.`fk_eIdMerca` = `cm`.`eIdMerca`)));

-- Volcando estructura para vista dbbitacora.vwreferencias
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwreferencias`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `dbbitacora`.`vwreferencias` AS select `re`.`eIdReferencia` AS `IdReferencia`,`re`.`fk_eIdCliente` AS `IdCliente`,`re`.`cveReferencia` AS `CveReferencia`,`re`.`feReferencia` AS `Fecha_Referencia`,`me`.`txtContenedor` AS `Contenedor`,`me`.`txtTamTipo` AS `Tamano_Tipo`,`me`.`txtPedimento` AS `Pedimento`,`me`.`txtBL` AS `BL` from ((`dbbitacora`.`catreferencias` `re` join `dbbitacora`.`catmercancias` `me` on((`re`.`eIdReferencia` = `me`.`fk_eIDReferencia`))) join `dbbitacora`.`vwlistagastos` `lg` on((`dbbitacora`.`lg`.`IdReferencia` = `re`.`eIdReferencia`)));

-- Volcando estructura para vista dbbitacora.vwuserdata
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwuserdata`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `dbbitacora`.`vwuserdata` AS select `p`.`eIdPersona` AS `IdP`,`p`.`txtName` AS `Nombre_s`,`p`.`txtLastName` AS `Apellidos`,concat(`p`.`txtName`,' ',`p`.`txtLastName`) AS `NombreCompleto`,`p`.`txtEmail` AS `Email`,`u`.`eIdUsr` AS `IdUsr`,`u`.`txtNickName` AS `Usuario`,`u`.`bActivo` AS `UserActive`,`t`.`eIdUserType` AS `IdType`,`t`.`txtUserType` AS `UserType`,`t`.`txtDescripcion` AS `Descripcion` from ((`dbbitacora`.`catpersonas` `p` join `dbbitacora`.`catusers` `u` on((`u`.`fkeIdPersona` = `p`.`eIdPersona`))) join `dbbitacora`.`catusertypes` `t` on((`u`.`fkeIdTipo` = `t`.`eIdUserType`)));

-- Volcando estructura para vista dbbitacora.vwusersactive
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwusersactive`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `dbbitacora`.`vwusersactive` AS select `u`.`fkeIdPersona` AS `Id`,`u`.`txtNickName` AS `Usuario`,`u`.`txtPass` AS `Pass` from `dbbitacora`.`catusers` `u` where (`u`.`bActivo` = 1);

