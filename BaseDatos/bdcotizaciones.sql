DROP DATABASE IF EXISTS dbcotizaciones;
CREATE DATABASE IF NOT EXISTS `bdcotizaciones` ;
USE `bdcotizaciones`;

-- Volcando estructura para tabla bdcotizaciones.catclintes
CREATE TABLE IF NOT EXISTS `catclientes` (
  `eIdCliente` int AUTO_INCREMENT,
  `txtNombreCliente` varchar(100) NOT NULL,
  `txtEmail` varchar(50) NOT NULL,
  `txtTelefono` varchar(10) NOT NULL,
  `txtRFC` varchar(18) NOT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCliente`)
) ;
INSERT INTO `catclientes` ( `txtNombreCliente`, `txtEmail`, `txtTelefono`, `txtRFC`, `feCreacion`, `feActualizacion`) VALUES
	('Juan Manuel ', 'iscjuanmafa@gmail.com', '3122100436', 'FEAJ850930GV1', '2023-03-17 10:53:53', '2023-03-17 10:53:54');

-- Volcando estructura para tabla bdcotizaciones.catcotizaciones
CREATE TABLE IF NOT EXISTS `catcotizaciones` (
  `eIdCotizacion` int AUTO_INCREMENT,
  `fk_eIdCliente` int NOT NULL,
  `fk_eIdEstatus` int NOT NULL,
  `feEmision` date DEFAULT NULL,
  `txtProyecto` varchar(100) NOT NULL,
  `txtVigencia` varchar(20) NOT NULL,
  `txtMoneda` varchar(3) NOT NULL,
  `txtTipoCambio` varchar(5) NOT NULL,
  `txtDiasCredito` varchar(10) NOT NULL,
  `flSubtotal` decimal(15,2) NOT NULL,
  `flIVA` decimal(15,2) NOT NULL,
  `flRetencion` decimal(15,2) NOT NULL,
  `flTotal` decimal(15,2) NOT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCotizacion`)
);
INSERT INTO `catcotizaciones` ( `fk_eIdCliente`, `fk_eIdEstatus`, `feEmision`, `txtProyecto`, `txtVigencia`, `txtMoneda`, `txtTipoCambio`, `txtDiasCredito`, `flSubtotal`, `flIVA`, `flRetencion`, `flTotal`, `feCreacion`, `feActualizacion`) VALUES
	(1, 1, '2023-03-17', 'Prueba', 'Vigencia', 'MX', 'MX', '12', 1234.56, 0.16, 0.50, 1300.00, '2023-03-17 10:44:46', '2023-03-17 10:44:48');

-- Volcando estructura para tabla bdcotizaciones.catestatus
CREATE TABLE IF NOT EXISTS `catestatus` (
  `eIdEstatus` int AUTO_INCREMENT,
  `txtEstatus` varchar(15) ,
  `txtDesc` text NOT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdEstatus`)
) ;
INSERT INTO `catestatus` ( `txtEstatus`, `txtDesc`, `feCreacion`, `feActualizacion`) VALUES
	( 'Preparación', 'En esta etapa, la cotización e esta generando por parte del ejecutivo de Atención a Clientes', '2023-03-17 10:55:58', '2023-03-17 10:56:01'),
	( 'Enviado', 'En esta etapa, la cotización se envió al cliente', '2023-03-17 10:57:43', '2023-03-17 10:57:44'),
	('Feedback', 'En esta etapa, el cliente genera una retroalimentación de la cotización y dudas especificas', '2023-03-17 10:59:39', '2023-03-17 10:59:40'),
	( 'Aceptado', 'En esta etapa el cliente ha aceptado la cotización y se procede a generar su referencia y documentación', '2023-03-17 11:00:34', '2023-03-17 11:00:37'),
	( 'Rechazado', 'En esta etapa, el cliente ha rechazado la cotización y se le solicita un feedback para revisar el caso', '2023-03-17 11:01:23', '2023-03-17 11:01:23');

-- Volcando estructura para tabla bdcotizaciones.catgastos
CREATE TABLE IF NOT EXISTS `catgastos` (
  `eIdLGasto` int  AUTO_INCREMENT,
  `txtCveGasto` varchar(50) ,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdLGasto`)
) ;


-- Volcando estructura para tabla bdcotizaciones.catgenerales
CREATE TABLE IF NOT EXISTS `catgenerales` (
  `eIdGenerales` int AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtETA` varchar(50) DEFAULT NULL,
  `txtNaviera` varchar(50) DEFAULT NULL,
  `txtVessel` varchar(50) DEFAULT NULL,
  `txtVoyaje` varchar(50) DEFAULT NULL,
  `txtTerminal` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGenerales`)
);



-- Volcando estructura para tabla bdcotizaciones.catmaniobrasextras
CREATE TABLE IF NOT EXISTS `catmaniobrasextras` (
  `eIdManExtra` int AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtManiobraE` varchar(50) DEFAULT NULL,
  `txtValor` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdManExtra`)
) ;

-- Volcando estructura para tabla bdcotizaciones.catmercancias
CREATE TABLE IF NOT EXISTS `catmercancias` (
  `eIdMerca` int AUTO_INCREMENT,
  `fk_eIDReferencia` int DEFAULT NULL,
  `txtContenedor` varchar(50) ,
  `txtTamTipo` varchar(50) DEFAULT NULL,
  `txtPedimento` varchar(50) ,
  `txtBL` varchar(50) ,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdMerca`)
);

-- Volcando estructura para tabla bdcotizaciones.catpersonas
CREATE TABLE IF NOT EXISTS `catpersonas` (
  `eIdPersona` int AUTO_INCREMENT,
  `txtName` varchar(15) NOT NULL,
  `txtLastName` varchar(50) NOT NULL,
  `bActivo` bit(1) NOT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `txtuserType` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`eIdPersona`)
) ;
INSERT INTO `catpersonas` ( `txtName`, `txtLastName`, `bActivo`, `feCreatedAt`, `feUpdatedAt`, `txtuserType`) VALUES
	('Juan Manuel', 'Fernández Alvarez', b'1', '2023-03-02 18:20:18', '2023-03-02 18:20:20', 'Admin'),
	( 'Administrador', ' Tracing Logistics', b'1', '2023-03-09 17:46:32', '2023-03-09 17:46:32', NULL);

-- Volcando estructura para tabla bdcotizaciones.catreferencias
CREATE TABLE IF NOT EXISTS `catreferencias` (
  `eIdReferencia` int  AUTO_INCREMENT,
  `fk_eIdCliente` int DEFAULT '0',
  `cveReferencia` varchar(50) NOT NULL,
  `feReferencia` date NOT NULL,
  `bActiva` bit(1) NOT NULL DEFAULT b'1',
  `fhCreatedAt` datetime NOT NULL,
  `fhUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`eIdReferencia`)
);
INSERT INTO `catreferencias` ( `fk_eIdCliente`, `cveReferencia`, `feReferencia`, `bActiva`, `fhCreatedAt`, `fhUpdatedAt`) VALUES
	( 1, '1', '2023-03-16', b'1', '2023-03-16 01:41:20', '2023-03-16 01:41:22'),
	( 7, 'on', '2023-03-16', b'1', '2023-03-16 08:03:39', '2023-03-16 08:03:39'),
	( 8, 'on', '2023-03-16', b'1', '2023-03-16 08:03:59', '2023-03-16 08:03:59');

-- Volcando estructura para tabla bdcotizaciones.catusers
CREATE TABLE IF NOT EXISTS `catusers` (
  `eIdUsr` int AUTO_INCREMENT,
  `fkeIdPersona` int DEFAULT NULL,
  `txtNickName` varchar(15) NOT NULL,
  `txtPass` varchar(50) NOT NULL,
  `bActivo` bit(1) NOT NULL DEFAULT b'0',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUsr`),
  KEY `fkeIdPersona` (`fkeIdPersona`),
  CONSTRAINT `catusers_ibfk_1` FOREIGN KEY (`fkeIdPersona`) REFERENCES `catpersonas` (`eIdPersona`)
) ;
INSERT INTO `catusers` ( `fkeIdPersona`, `txtNickName`, `txtPass`, `bActivo`, `feCreatedAt`, `feUpdatedAt`) VALUES
	(1, 'Juanma', '6b45be7910410293e64def2272ff6cd7', b'1', '2023-03-02 18:21:14', '2023-03-02 18:21:15'),
	( 2, 'Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', b'1', '2023-03-09 18:47:13', '2023-03-09 17:47:13');

-- Volcando estructura para tabla bdcotizaciones.detcotizaciones
CREATE TABLE IF NOT EXISTS `detcotizaciones` (
  `eIdDetalle` int AUTO_INCREMENT,
  `fk_eIdCotizacion` int NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `txtDescripcion` longtext NOT NULL,
  `flPrecioUnitario` decimal(15,2) NOT NULL,
  `flPorcentajeIVA` decimal(5,2) NOT NULL,
  `flMontoIva` decimal(15,2) NOT NULL,
  `flPorcentajeRetencion` decimal(5,2) NOT NULL,
  `flMontoRetencion` decimal(15,2) NOT NULL,
  `flImporte` decimal(15,2) NOT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdDetalle`)
) ;
INSERT INTO `detcotizaciones` (`fk_eIdCotizacion`, `cantidad`, `txtDescripcion`, `flPrecioUnitario`, `flPorcentajeIVA`, `flMontoIva`, `flPorcentajeRetencion`, `flMontoRetencion`, `flImporte`, `feCreacion`, `feActualizacion`) VALUES
	( 1, 10.00, 'Cajas de Servidores UPS', 3590.50, 0.12, 360.56, 0.50, 15.54, 3900.40, '2023-03-17 11:03:09', '2023-03-17 11:03:09');

-- Volcando estructura para tabla bdcotizaciones.docctagastos
CREATE TABLE IF NOT EXISTS `docctagastos` (
  `eIdCtaGastos` int AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtCtaGastos` varchar(50) DEFAULT NULL,
  `txtUrl` varchar(50) ,
  `txtDocName` varchar(50) ,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCtaGastos`)
);

-- Volcando estructura para tabla bdcotizaciones.listgastos
CREATE TABLE IF NOT EXISTS `listgastos` (
  `eIdGastos` int AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtValor` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGastos`)
) ;

-- Volcando estructura para tabla bdcotizaciones.listmercas
CREATE TABLE IF NOT EXISTS `listmercas` (
  `eIdList` int AUTO_INCREMENT,
  `fk_eIdMerca` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtMercancia` varchar(50),
  `txtBultos` varchar(50),
  `txtFraccion` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdList`)
);

-- Volcando estructura para vista bdcotizaciones.vwallclients
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE  IF NOT EXISTS  `vwallclients` (
	`eIdCliente` INT(10) NOT NULL,
	`NombreCompleto` VARCHAR(100) NOT NULL ,
	`Email` VARCHAR(50) NOT NULL ,
	`Telefono` VARCHAR(10) NOT NULL ,
	`RFC` VARCHAR(18) NOT NULL)
;

-- Volcando estructura para vista bdcotizaciones.vwallcotizaciones
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE  IF NOT EXISTS `vwallcotizaciones` (
	`IdCot` INT(10) NOT NULL,
	`feEmision` DATE NULL,
	`txtProyecto` VARCHAR(100) NOT NULL ,
	`txtVigencia` VARCHAR(20) NOT NULL,
	`txtMoneda` VARCHAR(3) NOT NULL,
	`txtTipoCambio` VARCHAR(5) NOT NULL,
	`txtDiasCredito` VARCHAR(10) NOT NULL,
	`flSubtotal` DECIMAL(15,2) NOT NULL,
	`flIVA` DECIMAL(15,2) NOT NULL,
	`flRetencion` DECIMAL(15,2) NOT NULL,
	`flTotal` DECIMAL(15,2) NOT NULL,
	`IdCte` INT(10) NOT NULL,
	`NombreCompleto` VARCHAR(100) NOT NULL,
	`Email` VARCHAR(50) NOT NULL ,
	`Telefono` VARCHAR(10) NOT NULL ,
	`RFC` VARCHAR(18) NOT NULL,
	`eIdEstatus` INT(10) NOT NULL)
	;

-- Volcando estructura para vista bdcotizaciones.vwdetallecotizacion
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE  IF NOT EXISTS `vwdetallecotizacion` (
	`eIdDetalle` INT(10) NOT NULL,
	`Cantidad` DECIMAL(15,2) NOT NULL,
	`Descripcion` LONGTEXT NOT NULL,
	`PrecioUnitario` DECIMAL(15,2) NOT NULL,
	`PorcentajeIVA` DECIMAL(5,2) NOT NULL,
	`MontoIVA` DECIMAL(15,2) NOT NULL,
	`PorcRetencion` DECIMAL(5,2) NOT NULL,
	`MontoRetencion` DECIMAL(15,2) NOT NULL,
	`Importe` DECIMAL(15,2) NOT NULL
) ;

-- Volcando estructura para tabla bdcotizaciones.vwlistaextras
CREATE TABLE IF NOT EXISTS `vwlistaextras` (
  `idGasto` int DEFAULT NULL,
  `idReferencia` int DEFAULT NULL,
  `Maniobra` varchar(50),
  `Valor` varchar(50)
);
/*!40000 ALTER TABLE `vwlistaextras` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwlistaextras` ENABLE KEYS */;

-- Volcando estructura para tabla bdcotizaciones.vwlistagastos
CREATE TABLE IF NOT EXISTS `vwlistagastos` (
  `IdGasto` int ,
  `IdReferencia` int DEFAULT NULL,
  `Nombre_Gasto` varchar(50) DEFAULT NULL,
  `Valor` varchar(50) DEFAULT NULL
);
/*!40000 ALTER TABLE `vwlistagastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwlistagastos` ENABLE KEYS */;

-- Volcando estructura para tabla bdcotizaciones.vwlistamercancias
CREATE TABLE IF NOT EXISTS `vwlistamercancias` (
  `IdReferencia` int DEFAULT NULL,
  `IdMercancia` int ,
  `IdLista_Mercancias` int ,
  `Mercancia` varchar(50) DEFAULT NULL,
  `Bultos` varchar(50) DEFAULT NULL,
  `Fraccion_Arancelaria` varchar(50) DEFAULT NULL
);
/*!40000 ALTER TABLE `vwlistamercancias` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwlistamercancias` ENABLE KEYS */;

-- Volcando estructura para tabla bdcotizaciones.vwreferencias
CREATE TABLE IF NOT EXISTS `vwreferencias` (
  `IdReferencia` int ,
  `IdCliente` int DEFAULT NULL,
  `CveReferencia` varchar(50) NOT NULL,
  `Fecha_Referencia` date NOT NULL,
  `Contenedor` varchar(50) DEFAULT NULL,
  `Tamano_Tipo` varchar(50) DEFAULT NULL,
  `Pedimento` varchar(50) DEFAULT NULL,
  `BL` varchar(50) DEFAULT NULL
) ;
/*!40000 ALTER TABLE `vwreferencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwreferencias` ENABLE KEYS */;

-- Volcando estructura para tabla bdcotizaciones.vwusersactive
CREATE TABLE IF NOT EXISTS `vwusersactive` (
  `Id` int DEFAULT NULL,
  `Usuario` varchar(15) NOT NULL,
  `Pass` varchar(50)NOT NULL
) ;
/*!40000 ALTER TABLE `vwusersactive` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwusersactive` ENABLE KEYS */;

-- Volcando estructura para tabla bdcotizaciones.vwusersdata
CREATE TABLE IF NOT EXISTS `vwusersdata` (
  `Id` int ,
  `TipoUsuario` varchar(20)DEFAULT NULL,
  `Nombre_s` varchar(15) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `NombreCompleto` varchar(66) DEFAULT NULL,
  `NombreUsuario` varchar(15) NOT NULL
);
/*!40000 ALTER TABLE `vwusersdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwusersdata` ENABLE KEYS */;

-- Volcando estructura para vista bdcotizaciones.vwallclients
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE `vwallclients`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwallclients` AS select `c`.`eIdCliente` AS `eIdCliente`,`c`.`txtNombreCliente` AS `NombreCompleto`,`c`.`txtEmail` AS `Email`,`c`.`txtTelefono` AS `Telefono`,`c`.`txtRFC` AS `RFC` from `catclientes` `c`;

-- Volcando estructura para vista bdcotizaciones.vwallcotizaciones
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE `vwallcotizaciones`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwallcotizaciones` AS select `co`.`eIdCotizacion` AS `IdCot`,`co`.`feEmision` AS `feEmision`,`co`.`txtProyecto` AS `txtProyecto`,`co`.`txtVigencia` AS `txtVigencia`,`co`.`txtMoneda` AS `txtMoneda`,`co`.`txtTipoCambio` AS `txtTipoCambio`,`co`.`txtDiasCredito` AS `txtDiasCredito`,`co`.`flSubtotal` AS `flSubtotal`,`co`.`flIVA` AS `flIVA`,`co`.`flRetencion` AS `flRetencion`,`co`.`flTotal` AS `flTotal`,`cl`.`eIdCliente` AS `IdCte`,`cl`.`NombreCompleto` AS `NombreCompleto`,`cl`.`Email` AS `Email`,`cl`.`Telefono` AS `Telefono`,`cl`.`RFC` AS `RFC`,`ce`.`eIdEstatus` AS `eIdEstatus`,`ce`.`txtEstatus` AS `txtEstatus` from ((`catcotizaciones` `co` join `vwallclients` `cl` on((`co`.`fk_eIdCliente` = `cl`.`eIdCliente`))) join `catestatus` `ce` on((`co`.`fk_eIdEstatus` = `ce`.`eIdEstatus`))) WITH LOCAL CHECK OPTION;

-- Volcando estructura para vista bdcotizaciones.vwdetallecotizacion
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE `vwdetallecotizacion`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwdetallecotizacion` AS select `dc`.`eIdDetalle` AS `eIdDetalle`,`dc`.`cantidad` AS `Cantidad`,`dc`.`txtDescripcion` AS `Descripcion`,`dc`.`flPrecioUnitario` AS `PrecioUnitario`,`dc`.`flPorcentajeIVA` AS `PorcentajeIVA`,`dc`.`flMontoIva` AS `MontoIVA`,`dc`.`flPorcentajeRetencion` AS `PorcRetencion`,`dc`.`flMontoRetencion` AS `MontoRetencion`,`dc`.`flImporte` AS `Importe` from (`detcotizaciones` `dc` join `vwallcotizaciones` `ac` on((`dc`.`fk_eIdCotizacion` = `ac`.`IdCot`)));

