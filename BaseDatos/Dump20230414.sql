CREATE DATABASE  IF NOT EXISTS `bdcotizaciones` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdcotizaciones`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdcotizaciones
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catclientes`
--

DROP TABLE IF EXISTS `catclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catclientes` (
  `eIdCliente` int NOT NULL AUTO_INCREMENT,
  `txtNombreCliente` varchar(50),
  `txtApellidos` varchar(50),
  `txtRazonSocial` varchar(150),
  `txtEmail` varchar(50),
  `txtTelefono` varchar(10),
  `txtRFC` varchar(13),
  `txtCURP` varchar(18),
  `eType` tinyint DEFAULT '1',
  `bActivo` bit(1) DEFAULT b'1',
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCliente`),
  UNIQUE KEY `txtRFC` (`txtRFC`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catclientes`
--

LOCK TABLES `catclientes` WRITE;
/*!40000 ALTER TABLE `catclientes` DISABLE KEYS */;
INSERT INTO `catclientes` VALUES (1,'Juan Manuel ','','','iscjuanmafa@gmail.com','3122100436','FEAJ850930GV1',NULL,1,_binary '','2023-03-17 10:53:53','2023-03-17 10:53:54'),(2,'A','A',NULL,'','1','A','A',1,_binary '','2023-04-13 23:54:36','2023-04-13 23:54:36'),(4,NULL,NULL,'B','algo@ttt.com','4','BB',NULL,0,_binary '','2023-04-14 00:16:21','2023-04-14 00:16:21');
/*!40000 ALTER TABLE `catclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catcotizaciones`
--

DROP TABLE IF EXISTS `catcotizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catcotizaciones` (
  `eIdCotizacion` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCliente` int NOT NULL,
  `fk_eIdEstatus` int NOT NULL,
  `feEmision` date DEFAULT NULL,
  `txtProyecto` varchar(100),
  `txtVigencia` varchar(20),
  `txtMoneda` varchar(3),
  `txtTipoCambio` varchar(5),
  `txtDiasCredito` varchar(10),
  `flSubtotal` decimal(15,2) NOT NULL,
  `flIVA` decimal(15,2) NOT NULL,
  `flRetencion` decimal(15,2) NOT NULL,
  `flTotal` decimal(15,2) NOT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCotizacion`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catcotizaciones`
--

LOCK TABLES `catcotizaciones` WRITE;
INSERT INTO `catcotizaciones` VALUES (1,1,1,'2023-03-17','Prueba','Vigencia','MX','MX','12',1234.56,0.16,0.50,1300.00,'2023-03-17 10:44:46','2023-03-17 10:44:48');
UNLOCK TABLES;

--
-- Table structure for table `catdirecciones`
--

DROP TABLE IF EXISTS `catdirecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catdirecciones` (
  `eIdDir` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCte` int DEFAULT NULL,
  `txtCalle` varchar(60) NOT NULL,
  `txtColonia` varchar(60) NOT NULL,
  `txtNumExt` varchar(8) DEFAULT NULL,
  `txtNumInt` varchar(8) DEFAULT NULL,
  `eCodigoPostal` int DEFAULT NULL,
  `txtCiudad` varchar(30) DEFAULT NULL,
  `txtEstado` varchar(30) DEFAULT NULL,
  `txtPais` varchar(30) DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdDir`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catdirecciones`
--

LOCK TABLES `catdirecciones` WRITE;
INSERT INTO `catdirecciones` VALUES (1,4,'B','B','B','B',7,'B','B','B',_binary '','2023-04-14 00:16:48','2023-04-14 00:16:48');
UNLOCK TABLES;

--
-- Table structure for table `catestatus`
--

DROP TABLE IF EXISTS `catestatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catestatus` (
  `eIdEstatus` int NOT NULL AUTO_INCREMENT,
  `txtEstatus` varchar(15),
  `txtDesc` text,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdEstatus`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catestatus`
--

LOCK TABLES `catestatus` WRITE;
INSERT INTO `catestatus` VALUES (1,'Preparación','En esta etapa, la cotización e esta generando por parte del ejecutivo de Atención a Clientes','2023-03-17 10:55:58','2023-03-17 10:56:01'),(2,'Enviado','En esta etapa, la cotización se envió al cliente','2023-03-17 10:57:43','2023-03-17 10:57:44'),(3,'Feedback','En esta etapa, el cliente genera una retroalimentación de la cotización y dudas especificas','2023-03-17 10:59:39','2023-03-17 10:59:40'),(4,'Aceptado','En esta etapa el cliente ha aceptado la cotización y se procede a generar su referencia y documentación','2023-03-17 11:00:34','2023-03-17 11:00:37'),(5,'Rechazado','En esta etapa, el cliente ha rechazado la cotización y se le solicita un feedback para revisar el caso','2023-03-17 11:01:23','2023-03-17 11:01:23');
UNLOCK TABLES;

--
-- Table structure for table `catgastos`
--

DROP TABLE IF EXISTS `catgastos`;

CREATE TABLE `catgastos` (
  `eIdLGasto` int NOT NULL AUTO_INCREMENT,
  `txtCveGasto` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdLGasto`)
);


LOCK TABLES `catgastos` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `catgenerales`
--

DROP TABLE IF EXISTS `catgenerales`;
CREATE TABLE `catgenerales` (
  `eIdGenerales` int NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtETA` varchar(50),
  `txtNaviera` varchar(50),
  `txtVessel` varchar(50),
  `txtVoyaje` varchar(50),
  `txtTerminal` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGenerales`)
);

LOCK TABLES `catgenerales` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `catmaniobrasextras`
--

DROP TABLE IF EXISTS `catmaniobrasextras`;
CREATE TABLE `catmaniobrasextras` (
  `eIdManExtra` int NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtManiobraE` varchar(50),
  `txtValor` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdManExtra`)
);


LOCK TABLES `catmaniobrasextras` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `catmercancias`
--

DROP TABLE IF EXISTS `catmercancias`;
CREATE TABLE `catmercancias` (
  `eIdMerca` int NOT NULL AUTO_INCREMENT,
  `fk_eIDReferencia` int DEFAULT NULL,
  `txtContenedor` varchar(50),
  `txtTamTipo` varchar(50),
  `txtPedimento` varchar(50),
  `txtBL` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdMerca`)
);


LOCK TABLES `catmercancias` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `catpersonas`;
CREATE TABLE `catpersonas` (
  `eIdPersona` int NOT NULL AUTO_INCREMENT,
  `txtName` varchar(15) NOT NULL,
  `txtLastName` varchar(50) NOT NULL,
  `bActivo` bit(1) NOT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `txtuserType` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`eIdPersona`)
);


LOCK TABLES `catpersonas` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `catreferencias`
--

DROP TABLE IF EXISTS `catreferencias`;
CREATE TABLE `catreferencias` (
  `eIdReferencia` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCliente` int DEFAULT '0',
  `cveReferencia` varchar(50),
  `feReferencia` date NOT NULL,
  `bActiva` bit(1) NOT NULL DEFAULT b'1',
  `fhCreatedAt` datetime NOT NULL,
  `fhUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`eIdReferencia`)
);

LOCK TABLES `catreferencias` WRITE;
INSERT INTO `catreferencias` VALUES (1,1,'1','2023-03-16',_binary '','2023-03-16 01:41:20','2023-03-16 01:41:22'),(2,7,'on','2023-03-16',_binary '','2023-03-16 08:03:39','2023-03-16 08:03:39'),(3,8,'on','2023-03-16',_binary '','2023-03-16 08:03:59','2023-03-16 08:03:59');
UNLOCK TABLES;

--
-- Table structure for table `catusers`
--

DROP TABLE IF EXISTS `catusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catusers` (
  `eIdUsr` int NOT NULL AUTO_INCREMENT,
  `fkeIdPersona` int DEFAULT NULL,
  `txtNickName` varchar(15) NOT NULL,
  `txtPass` varchar(50) NOT NULL,
  `bActivo` bit(1) NOT NULL DEFAULT b'0',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUsr`),
  KEY `fkeIdPersona` (`fkeIdPersona`),
  CONSTRAINT `catusers_ibfk_1` FOREIGN KEY (`fkeIdPersona`) REFERENCES `catpersonas` (`eIdPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catusers`
--

LOCK TABLES `catusers` WRITE;
/*!40000 ALTER TABLE `catusers` DISABLE KEYS */;
INSERT INTO `catusers` VALUES (1,1,'Juanma','6b45be7910410293e64def2272ff6cd7',_binary '','2023-03-02 18:21:14','2023-03-02 18:21:15'),(2,2,'Admin','e64b78fc3bc91bcbc7dc232ba8ec59e0',_binary '','2023-03-09 18:47:13','2023-03-09 17:47:13');
/*!40000 ALTER TABLE `catusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detcotizaciones`
--

DROP TABLE IF EXISTS `detcotizaciones`;
CREATE TABLE `detcotizaciones` (
  `eIdDetalle` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCotizacion` int NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `txtDescripcion` longtext,
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


LOCK TABLES `detcotizaciones` WRITE;
INSERT INTO `detcotizaciones` VALUES (1,1,10.00,'Cajas de Servidores UPS',3590.50,0.12,360.56,0.50,15.54,3900.40,'2023-03-17 11:03:09','2023-03-17 11:03:09');
UNLOCK TABLES;

--
-- Table structure for table `docctagastos`
--

DROP TABLE IF EXISTS `docctagastos`;
CREATE TABLE `docctagastos` (
  `eIdCtaGastos` int NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtCtaGastos` varchar(50),
  `txtUrl` varchar(50),
  `txtDocName` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCtaGastos`)
);


LOCK TABLES `docctagastos` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `listgastos`;
CREATE TABLE `listgastos` (
  `eIdGastos` int NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtValor` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGastos`)
);

--
--

LOCK TABLES `listgastos` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `listmercas`
--

DROP TABLE IF EXISTS `listmercas`;
CREATE TABLE `listmercas` (
  `eIdList` int NOT NULL AUTO_INCREMENT,
  `fk_eIdMerca` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtMercancia` varchar(50),
  `txtBultos` varchar(50),
  `txtFraccion` varchar(50),
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdList`)
);


LOCK TABLES `listmercas` WRITE;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwallclients`
--

DROP TABLE IF EXISTS `vwallclients`;
/*!50001 DROP VIEW IF EXISTS `vwallclients`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwallclients` AS SELECT 
 1 AS `eIdCliente`,
 1 AS `NombreCompleto`,
 1 AS `txtRazonSocial`,
 1 AS `Email`,
 1 AS `Telefono`,
 1 AS `RFC`,
 1 AS `CURP`,
 1 AS `Tipo`,
 1 AS `EstatusC`,
 1 AS `Calle`,
 1 AS `Colonia`,
 1 AS `NumExt`,
 1 AS `NumInt`,
 1 AS `CodigoPostal`,
 1 AS `Ciudad`,
 1 AS `Estado`,
 1 AS `Pais`,
 1 AS `EstatusD`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwallcotizaciones`
--

DROP TABLE IF EXISTS `vwallcotizaciones`;
/*!50001 DROP VIEW IF EXISTS `vwallcotizaciones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwallcotizaciones` AS SELECT 
 1 AS `IdCot`,
 1 AS `feEmision`,
 1 AS `txtProyecto`,
 1 AS `txtVigencia`,
 1 AS `txtMoneda`,
 1 AS `txtTipoCambio`,
 1 AS `txtDiasCredito`,
 1 AS `flSubtotal`,
 1 AS `flIVA`,
 1 AS `flRetencion`,
 1 AS `flTotal`,
 1 AS `IdCte`,
 1 AS `NombreCompleto`,
 1 AS `Email`,
 1 AS `Telefono`,
 1 AS `RFC`,
 1 AS `eIdEstatus`,
 1 AS `txtEstatus`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwctesref`
--

DROP TABLE IF EXISTS `vwctesref`;
/*!50001 DROP VIEW IF EXISTS `vwctesref`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwctesref` AS SELECT 
 1 AS `eIdCliente`,
 1 AS `NombreCompleto`,
 1 AS `txtRazonSocial`,
 1 AS `RFC`,
 1 AS `Tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwdetallecotizacion`
--

DROP TABLE IF EXISTS `vwdetallecotizacion`;
/*!50001 DROP VIEW IF EXISTS `vwdetallecotizacion`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwdetallecotizacion` AS SELECT 
 1 AS `eIdDetalle`,
 1 AS `Cantidad`,
 1 AS `Descripcion`,
 1 AS `PrecioUnitario`,
 1 AS `PorcentajeIVA`,
 1 AS `MontoIVA`,
 1 AS `PorcRetencion`,
 1 AS `MontoRetencion`,
 1 AS `Importe`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `vwlistaextras`
--

DROP TABLE IF EXISTS `vwlistaextras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vwlistaextras` (
  `idGasto` int DEFAULT NULL,
  `idReferencia` int DEFAULT NULL,
  `Maniobra` varchar(50),
  `Valor` varchar(50)
);


LOCK TABLES `vwlistaextras` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `vwlistagastos`
--

DROP TABLE IF EXISTS `vwlistagastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vwlistagastos` (
  `IdGasto` int DEFAULT NULL,
  `IdReferencia` int DEFAULT NULL,
  `Nombre_Gasto` varchar(50),
  `Valor` varchar(50)L
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vwlistagastos`
--

LOCK TABLES `vwlistagastos` WRITE;
/*!40000 ALTER TABLE `vwlistagastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwlistagastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vwlistamercancias`
--

DROP TABLE IF EXISTS `vwlistamercancias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vwlistamercancias` (
  `IdReferencia` int DEFAULT NULL,
  `IdMercancia` int DEFAULT NULL,
  `IdLista_Mercancias` int DEFAULT NULL,
  `Mercancia` varchar(50),
  `Bultos` varchar(50),
  `Fraccion_Arancelaria` varchar(50)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vwlistamercancias`
--

LOCK TABLES `vwlistamercancias` WRITE;
/*!40000 ALTER TABLE `vwlistamercancias` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwlistamercancias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vwreferencias`
--

DROP TABLE IF EXISTS `vwreferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vwreferencias` (
  `IdReferencia` int DEFAULT NULL,
  `IdCliente` int DEFAULT NULL,
  `CveReferencia` varchar(50),
  `Fecha_Referencia` date NOT NULL,
  `Contenedor` varchar(50),
  `Tamano_Tipo` varchar(50),
  `Pedimento` varchar(50),
  `BL` varchar(50)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vwreferencias`
--

LOCK TABLES `vwreferencias` WRITE;
/*!40000 ALTER TABLE `vwreferencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwreferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vwusersactive`
--

DROP TABLE IF EXISTS `vwusersactive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vwusersactive` (
  `Id` int DEFAULT NULL,
  `Usuario` varchar(15),
  `Pass` varchar(50)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vwusersactive`
--

LOCK TABLES `vwusersactive` WRITE;
/*!40000 ALTER TABLE `vwusersactive` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwusersactive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vwusersdata`
--

DROP TABLE IF EXISTS `vwusersdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vwusersdata` (
  `Id` int DEFAULT NULL,
  `TipoUsuario` varchar(20),
  `Nombre_s` varchar(15),
  `Apellidos` varchar(50),
  `NombreCompleto` varchar(66),
  `NombreUsuario` varchar(15)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vwusersdata`
--

LOCK TABLES `vwusersdata` WRITE;
/*!40000 ALTER TABLE `vwusersdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `vwusersdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdcotizaciones'
--

--
-- Final view structure for view `vwallclients`
--

/*!50001 DROP VIEW IF EXISTS `vwallclients`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwallclients` AS select `c`.`eIdCliente` AS `eIdCliente`,concat(`c`.`txtNombreCliente`,' ',convert(`c`.`txtApellidos` using utf8mb4)) AS `NombreCompleto`,`c`.`txtRazonSocial` AS `txtRazonSocial`,`c`.`txtEmail` AS `Email`,`c`.`txtTelefono` AS `Telefono`,`c`.`txtRFC` AS `RFC`,`c`.`txtCURP` AS `CURP`,`c`.`eType` AS `Tipo`,`c`.`bActivo` AS `EstatusC`,`d`.`txtCalle` AS `Calle`,`d`.`txtColonia` AS `Colonia`,`d`.`txtNumExt` AS `NumExt`,`d`.`txtNumInt` AS `NumInt`,`d`.`eCodigoPostal` AS `CodigoPostal`,`d`.`txtCiudad` AS `Ciudad`,`d`.`txtEstado` AS `Estado`,`d`.`txtPais` AS `Pais`,`d`.`bActive` AS `EstatusD` from (`catclientes` `c` left join `catdirecciones` `d` on((`d`.`fk_eIdCte` = `c`.`eIdCliente`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwallcotizaciones`
--

/*!50001 DROP VIEW IF EXISTS `vwallcotizaciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwallcotizaciones` AS select `co`.`eIdCotizacion` AS `IdCot`,`co`.`feEmision` AS `feEmision`,`co`.`txtProyecto` AS `txtProyecto`,`co`.`txtVigencia` AS `txtVigencia`,`co`.`txtMoneda` AS `txtMoneda`,`co`.`txtTipoCambio` AS `txtTipoCambio`,`co`.`txtDiasCredito` AS `txtDiasCredito`,`co`.`flSubtotal` AS `flSubtotal`,`co`.`flIVA` AS `flIVA`,`co`.`flRetencion` AS `flRetencion`,`co`.`flTotal` AS `flTotal`,`cl`.`eIdCliente` AS `IdCte`,`cl`.`NombreCompleto` AS `NombreCompleto`,`cl`.`Email` AS `Email`,`cl`.`Telefono` AS `Telefono`,`cl`.`RFC` AS `RFC`,`ce`.`eIdEstatus` AS `eIdEstatus`,`ce`.`txtEstatus` AS `txtEstatus` from ((`catcotizaciones` `co` join `vwallclients` `cl` on((`co`.`fk_eIdCliente` = `cl`.`eIdCliente`))) join `catestatus` `ce` on((`co`.`fk_eIdEstatus` = `ce`.`eIdEstatus`))) */
/*!50002 WITH LOCAL CHECK OPTION */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwctesref`
--

/*!50001 DROP VIEW IF EXISTS `vwctesref`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwctesref` AS select `c`.`eIdCliente` AS `eIdCliente`,concat(`c`.`txtNombreCliente`,' ',convert(`c`.`txtApellidos` using utf8mb4)) AS `NombreCompleto`,`c`.`txtRazonSocial` AS `txtRazonSocial`,`c`.`txtRFC` AS `RFC`,`c`.`eType` AS `Tipo` from `catclientes` `c` where (`c`.`bActivo` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwdetallecotizacion`
--

/*!50001 DROP VIEW IF EXISTS `vwdetallecotizacion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`u573363820_adminCoti`@`"127.0.0.1:3306"` SQL SECURITY DEFINER */
/*!50001 VIEW `vwdetallecotizacion` AS select `dc`.`eIdDetalle` AS `eIdDetalle`,`dc`.`cantidad` AS `Cantidad`,`dc`.`txtDescripcion` AS `Descripcion`,`dc`.`flPrecioUnitario` AS `PrecioUnitario`,`dc`.`flPorcentajeIVA` AS `PorcentajeIVA`,`dc`.`flMontoIva` AS `MontoIVA`,`dc`.`flPorcentajeRetencion` AS `PorcRetencion`,`dc`.`flMontoRetencion` AS `MontoRetencion`,`dc`.`flImporte` AS `Importe` from (`detcotizaciones` `dc` join `vwallcotizaciones` `ac` on((`dc`.`fk_eIdCotizacion` = `ac`.`IdCot`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-14 12:14:12
CREATE DATABASE  IF NOT EXISTS `dbbitacora` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbbitacora`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbbitacora
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catgastos`
--

DROP TABLE IF EXISTS `catgastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catgastos` (
  `eIdLGasto` int NOT NULL AUTO_INCREMENT,
  `txtCveGasto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdLGasto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catgastos`
--

LOCK TABLES `catgastos` WRITE;
/*!40000 ALTER TABLE `catgastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `catgastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catgenerales`
--

DROP TABLE IF EXISTS `catgenerales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catgenerales` (
  `eIdGenerales` int NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtETA` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtNaviera` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtVessel` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtVoyaje` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtTerminal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGenerales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catgenerales`
--

LOCK TABLES `catgenerales` WRITE;
/*!40000 ALTER TABLE `catgenerales` DISABLE KEYS */;
/*!40000 ALTER TABLE `catgenerales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catmaniobrasextras`
--

DROP TABLE IF EXISTS `catmaniobrasextras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catmaniobrasextras` (
  `eIdManExtra` int NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtManiobraE` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtValor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdManExtra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catmaniobrasextras`
--

LOCK TABLES `catmaniobrasextras` WRITE;
/*!40000 ALTER TABLE `catmaniobrasextras` DISABLE KEYS */;
/*!40000 ALTER TABLE `catmaniobrasextras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catmercancias`
--

DROP TABLE IF EXISTS `catmercancias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catmercancias` (
  `eIdMerca` int NOT NULL AUTO_INCREMENT,
  `fk_eIDReferencia` int DEFAULT NULL,
  `txtContenedor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtTamTipo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtPedimento` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtBL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdMerca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catmercancias`
--

LOCK TABLES `catmercancias` WRITE;
/*!40000 ALTER TABLE `catmercancias` DISABLE KEYS */;
/*!40000 ALTER TABLE `catmercancias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catpersonas`
--

DROP TABLE IF EXISTS `catpersonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catpersonas` (
  `eIdPersona` int NOT NULL AUTO_INCREMENT,
  `txtName` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `txtLastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `txtEmail` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtTelefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bActivo` bit(1) NOT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catpersonas`
--

LOCK TABLES `catpersonas` WRITE;
/*!40000 ALTER TABLE `catpersonas` DISABLE KEYS */;
INSERT INTO `catpersonas` VALUES (1,'Juan Manuel','Fernández Alvarez',NULL,NULL,_binary '','2023-03-02 18:20:18','2023-03-02 18:20:20'),(2,'Administrador',' Tracing Logistics',NULL,NULL,_binary '','2023-03-09 17:46:32','2023-03-09 17:46:32'),(3,'Santiago','Fernández',NULL,NULL,_binary '','2023-03-27 03:49:47','2023-03-27 03:49:47');
/*!40000 ALTER TABLE `catpersonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catreferencias`
--

DROP TABLE IF EXISTS `catreferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catreferencias` (
  `eIdReferencia` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCliente` int DEFAULT '0',
  `cveReferencia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `feReferencia` date NOT NULL,
  `bActiva` bit(1) NOT NULL DEFAULT b'1',
  `fhCreatedAt` datetime NOT NULL,
  `fhUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`eIdReferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Datos Generales de Referencia';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catreferencias`
--

LOCK TABLES `catreferencias` WRITE;
/*!40000 ALTER TABLE `catreferencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `catreferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catusers`
--

DROP TABLE IF EXISTS `catusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catusers` (
  `eIdUsr` int NOT NULL AUTO_INCREMENT,
  `fkeIdPersona` int DEFAULT NULL,
  `fkeIdTipo` int DEFAULT NULL,
  `txtNickName` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `txtPass` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bActivo` bit(1) NOT NULL DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUsr`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catusers`
--

LOCK TABLES `catusers` WRITE;
/*!40000 ALTER TABLE `catusers` DISABLE KEYS */;
INSERT INTO `catusers` VALUES (1,1,3,'Juanma','6b45be7910410293e64def2272ff6cd7',_binary '','2023-03-02 18:21:14','2023-03-02 18:21:15'),(2,2,1,'Admin','e64b78fc3bc91bcbc7dc232ba8ec59e0',_binary '','2023-03-09 18:47:13','2023-03-09 17:47:13'),(3,5,4,'Gogo','59d9e298ce6640a5dbab14b604f01702',_binary '','2023-03-27 03:54:23','2023-03-27 03:54:23');
/*!40000 ALTER TABLE `catusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catusertypes`
--

DROP TABLE IF EXISTS `catusertypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catusertypes` (
  `eIdUserType` int NOT NULL AUTO_INCREMENT,
  `txtUserType` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `txtDescripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `bActivo` bit(1) DEFAULT b'1',
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUserType`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catusertypes`
--

LOCK TABLES `catusertypes` WRITE;
/*!40000 ALTER TABLE `catusertypes` DISABLE KEYS */;
INSERT INTO `catusertypes` VALUES (1,'Administrador','Se encarga de llevar el seguimiento de cada uno d elos m´ódulos del sistema',_binary '','2023-03-17 12:49:32','2023-03-17 12:49:31'),(2,'Director General','Su nivel de acceso es para ver reportes, tendrá un dashboard personalizado y podrá generar algunas actividades como generación de referencias',_binary '','2023-03-17 18:49:51','2023-03-17 18:49:51'),(3,'Sistemas','Su nivel de acceso es el mismo que el administrador',_binary '','2023-03-17 18:50:45','2023-03-17 18:50:45'),(4,'Practicante Tráfico','Su nivel de acceso es limitado a generar nuevos proveedores',_binary '','2023-03-27 00:45:12','2023-03-27 00:45:12');
/*!40000 ALTER TABLE `catusertypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docctagastos`
--

DROP TABLE IF EXISTS `docctagastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docctagastos` (
  `eIdCtaGastos` int NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtCtaGastos` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtUrl` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtDocName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCtaGastos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docctagastos`
--

LOCK TABLES `docctagastos` WRITE;
/*!40000 ALTER TABLE `docctagastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `docctagastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listgastos`
--

DROP TABLE IF EXISTS `listgastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listgastos` (
  `eIdGastos` int NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtValor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGastos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listgastos`
--

LOCK TABLES `listgastos` WRITE;
/*!40000 ALTER TABLE `listgastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `listgastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listmercas`
--

DROP TABLE IF EXISTS `listmercas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listmercas` (
  `eIdList` int NOT NULL AUTO_INCREMENT,
  `fk_eIdMerca` int DEFAULT NULL,
  `fk_eIdReferencia` int DEFAULT NULL,
  `txtMercancia` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtBultos` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `txtFraccion` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdList`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listmercas`
--

LOCK TABLES `listmercas` WRITE;
/*!40000 ALTER TABLE `listmercas` DISABLE KEYS */;
/*!40000 ALTER TABLE `listmercas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relnwprovuser`
--

DROP TABLE IF EXISTS `relnwprovuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relnwprovuser` (
  `eIdProvUsr` int NOT NULL AUTO_INCREMENT,
  `fk_eIdProv` int DEFAULT NULL,
  `fk_eIdUser` int DEFAULT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdProvUsr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relnwprovuser`
--

LOCK TABLES `relnwprovuser` WRITE;
/*!40000 ALTER TABLE `relnwprovuser` DISABLE KEYS */;
/*!40000 ALTER TABLE `relnwprovuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwlistaextras`
--

DROP TABLE IF EXISTS `vwlistaextras`;
/*!50001 DROP VIEW IF EXISTS `vwlistaextras`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistaextras` AS SELECT 
 1 AS `idGasto`,
 1 AS `idReferencia`,
 1 AS `Maniobra`,
 1 AS `Valor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwlistagastos`
--

DROP TABLE IF EXISTS `vwlistagastos`;
/*!50001 DROP VIEW IF EXISTS `vwlistagastos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistagastos` AS SELECT 
 1 AS `IdGasto`,
 1 AS `IdReferencia`,
 1 AS `Nombre_Gasto`,
 1 AS `Valor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwlistamercancias`
--

DROP TABLE IF EXISTS `vwlistamercancias`;
/*!50001 DROP VIEW IF EXISTS `vwlistamercancias`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistamercancias` AS SELECT 
 1 AS `IdReferencia`,
 1 AS `IdMercancia`,
 1 AS `IdLista_Mercancias`,
 1 AS `Mercancia`,
 1 AS `Bultos`,
 1 AS `Fraccion_Arancelaria`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwuserdata`
--

DROP TABLE IF EXISTS `vwuserdata`;
/*!50001 DROP VIEW IF EXISTS `vwuserdata`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwuserdata` AS SELECT 
 1 AS `eIdPersona`,
 1 AS `userID`,
 1 AS `Usuario`,
 1 AS `Estado`,
 1 AS `Nombre_s`,
 1 AS `Apellidos`,
 1 AS `Email`,
 1 AS `Telefono`,
 1 AS `NombreCompleto`,
 1 AS `userType`,
 1 AS `TipoUsuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwusersactive`
--

DROP TABLE IF EXISTS `vwusersactive`;
/*!50001 DROP VIEW IF EXISTS `vwusersactive`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwusersactive` AS SELECT 
 1 AS `userId`,
 1 AS `Usuario`,
 1 AS `Pass`,
 1 AS `Nombre_s`,
 1 AS `Apellidos`,
 1 AS `NombreCompleto`,
 1 AS `UserType`,
 1 AS `IdType`,
 1 AS `Email`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwusertypelist`
--

DROP TABLE IF EXISTS `vwusertypelist`;
/*!50001 DROP VIEW IF EXISTS `vwusertypelist`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwusertypelist` AS SELECT 
 1 AS `userId`,
 1 AS `UserType`,
 1 AS `Descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'dbbitacora'
--
/*!50003 DROP PROCEDURE IF EXISTS `insNewUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insNewUser`( IN fk_eUserType INT, txtNickName VARCHAR(30), txtFName VARCHAR(50), txtLName VARCHAR(60))
BEGIN

	INSERT INTO catPersonas (txtName,txtLastName,bActivo) values (txtFName,txtLName,b'1');

    

    SET @id = last_insert_id();

    SET @psw = concat(txtNickName,"123");

    SET @pass = md5(@psw);

    

    INSERT INTO catusers (fkeIdPersona,fkeIdTipo,txtNickName,txtPass) VALUES (@id,fk_eUserType,txtNickName,@pass);

    SET @eIdUsr = last_insert_id();

    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vwlistaextras`
--

/*!50001 DROP VIEW IF EXISTS `vwlistaextras`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistaextras` AS select `me`.`fk_eIdGasto` AS `idGasto`,`me`.`fk_eIdReferencia` AS `idReferencia`,`me`.`txtManiobraE` AS `Maniobra`,`me`.`txtValor` AS `Valor` from (`catmaniobrasextras` `me` join `catreferencias` `ref` on((`me`.`fk_eIdReferencia` = `ref`.`eIdReferencia`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwlistagastos`
--

/*!50001 DROP VIEW IF EXISTS `vwlistagastos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistagastos` AS select `lg`.`eIdGastos` AS `IdGasto`,`lg`.`fk_eIdReferencia` AS `IdReferencia`,`g`.`txtCveGasto` AS `Nombre_Gasto`,`lg`.`txtValor` AS `Valor` from (`catgastos` `g` join `listgastos` `lg` on((`lg`.`fk_eIdGasto` = `g`.`eIdLGasto`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwlistamercancias`
--

/*!50001 DROP VIEW IF EXISTS `vwlistamercancias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistamercancias` AS select `cm`.`fk_eIDReferencia` AS `IdReferencia`,`cm`.`eIdMerca` AS `IdMercancia`,`lm`.`eIdList` AS `IdLista_Mercancias`,`lm`.`txtMercancia` AS `Mercancia`,`lm`.`txtBultos` AS `Bultos`,`lm`.`txtFraccion` AS `Fraccion_Arancelaria` from (`listmercas` `lm` join `catmercancias` `cm` on((`lm`.`fk_eIdMerca` = `cm`.`eIdMerca`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwuserdata`
--

/*!50001 DROP VIEW IF EXISTS `vwuserdata`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwuserdata` AS select `p`.`eIdPersona` AS `eIdPersona`,`u`.`eIdUsr` AS `userID`,`u`.`txtNickName` AS `Usuario`,`u`.`bActivo` AS `Estado`,`p`.`txtName` AS `Nombre_s`,`p`.`txtLastName` AS `Apellidos`,`p`.`txtEmail` AS `Email`,`p`.`txtTelefono` AS `Telefono`,concat(`p`.`txtName`,' ',`p`.`txtLastName`) AS `NombreCompleto`,`t`.`eIdUserType` AS `userType`,`t`.`txtUserType` AS `TipoUsuario` from ((`catusers` `u` join `catpersonas` `p` on((`u`.`fkeIdPersona` = `p`.`eIdPersona`))) join `catusertypes` `t` on((`u`.`fkeIdTipo` = `t`.`eIdUserType`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwusersactive`
--

/*!50001 DROP VIEW IF EXISTS `vwusersactive`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwusersactive` AS select `c`.`eIdUsr` AS `userId`,`c`.`txtNickName` AS `Usuario`,`c`.`txtPass` AS `Pass`,`p`.`txtName` AS `Nombre_s`,`p`.`txtLastName` AS `Apellidos`,concat(((`p`.`txtName` + ' ') + `p`.`txtLastName`)) AS `NombreCompleto`,`t`.`txtUserType` AS `UserType`,`t`.`eIdUserType` AS `IdType`,`p`.`txtEmail` AS `Email` from ((`catusers` `c` join `catpersonas` `p` on((`c`.`fkeIdPersona` = `p`.`eIdPersona`))) join `catusertypes` `t` on((`c`.`fkeIdTipo` = `t`.`eIdUserType`))) where (`c`.`bActivo` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwusertypelist`
--

/*!50001 DROP VIEW IF EXISTS `vwusertypelist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwusertypelist` AS select `u`.`eIdUserType` AS `userId`,`u`.`txtUserType` AS `UserType`,`u`.`txtDescripcion` AS `Descripcion` from `catusertypes` `u` where (`u`.`bActivo` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-14 12:14:13
CREATE DATABASE  IF NOT EXISTS `dbserviceproviders` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbserviceproviders`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbserviceproviders
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresslist`
--

DROP TABLE IF EXISTS `addresslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresslist` (
  `eIdAddress` int NOT NULL AUTO_INCREMENT,
  `txtStreet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtOutNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtInNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtColony` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtCity` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtState` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtPostalCode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresslist`
--

LOCK TABLES `addresslist` WRITE;
/*!40000 ALTER TABLE `addresslist` DISABLE KEYS */;
INSERT INTO `addresslist` VALUES (1,' Transportista 1','15-D',' 10-A',' Trasportita1',' Manzanillo',' Colima',' 28800',_binary '','2023-04-04 12:54:18','2023-04-05 03:17:28');
/*!40000 ALTER TABLE `addresslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catcompanytypes`
--

DROP TABLE IF EXISTS `catcompanytypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catcompanytypes` (
  `eIdType` int NOT NULL AUTO_INCREMENT,
  `txtTypeName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtDescription` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catcompanytypes`
--

LOCK TABLES `catcompanytypes` WRITE;
/*!40000 ALTER TABLE `catcompanytypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `catcompanytypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catfreightstypes`
--

DROP TABLE IF EXISTS `catfreightstypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catfreightstypes` (
  `eIdFType` int NOT NULL AUTO_INCREMENT,
  `txtFType` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtFDescription` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdFType`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catfreightstypes`
--

LOCK TABLES `catfreightstypes` WRITE;
/*!40000 ALTER TABLE `catfreightstypes` DISABLE KEYS */;
INSERT INTO `catfreightstypes` VALUES (1,'Aéreo','Traslado de mercancías vía aérea',_binary '','2023-03-25 21:20:10','2023-03-25 21:20:11'),(2,'Marítimo','Traslado de mercancías por vía marítima',_binary '','2023-03-25 21:29:26','2023-03-25 21:29:26'),(3,'Ferroviario','Traslado de mercancías terrestres por ferrocarril',_binary '','2023-03-25 21:30:19','2023-03-25 21:30:19'),(4,'Terrestre','Traslado de Mercancías vía terrestre, transporte privado',_binary '','2023-03-25 21:30:25','2023-03-25 21:30:25');
/*!40000 ALTER TABLE `catfreightstypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companieslist`
--

DROP TABLE IF EXISTS `companieslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companieslist` (
  `eIdCompany` int NOT NULL AUTO_INCREMENT,
  `fK_eIdAddress` int DEFAULT NULL,
  `fk_eIdCreatedFor` int DEFAULT '1',
  `txtName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtPhone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtArea` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtSector` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtProviderType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `txtStatus` enum('PROPUESTO','APROBADO','APROBADO CON OBSERVACIONES','RECHAZADO','RECHAZADO CON OBSERVACIONES') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'PROPUESTO',
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCompany`),
  KEY `fK_eIdAddress` (`fK_eIdAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companieslist`
--

LOCK TABLES `companieslist` WRITE;
/*!40000 ALTER TABLE `companieslist` DISABLE KEYS */;
INSERT INTO `companieslist` VALUES (1,1,1,'Transportista 1','transportista@algo.com','3141234567','Transportes','Transporte terrestre','Transportista','PROPUESTO',_binary '','2023-04-04 12:54:19','2023-04-05 03:17:28');
/*!40000 ALTER TABLE `companieslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freightslist`
--

DROP TABLE IF EXISTS `freightslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `freightslist` (
  `eIdFreight` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCompany` int DEFAULT NULL,
  `fk_eIdFreightType` int DEFAULT NULL,
  `txtOrigin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtDestiny` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `flFreightPrice` decimal(10,2) NOT NULL,
  `txtDescFlete` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `eDistanceKm` decimal(10,2) DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdFreight`),
  KEY `fk_eIdCompany` (`fk_eIdCompany`),
  KEY `fk_eIdFreightType` (`fk_eIdFreightType`),
  CONSTRAINT `freightslist_ibfk_2` FOREIGN KEY (`fk_eIdFreightType`) REFERENCES `catfreightstypes` (`eIdFType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freightslist`
--

LOCK TABLES `freightslist` WRITE;
/*!40000 ALTER TABLE `freightslist` DISABLE KEYS */;
INSERT INTO `freightslist` VALUES (1,1,4,'Guadalajara','Manzanillo',17000.00,'Solo flete de GDL->MZO',255.00,_binary '','2023-04-04 12:54:19','2023-04-04 12:54:19'),(2,1,4,'Manzanillo','Guadalajara',17200.00,'Solo de MZO->GDL',255.00,_binary '','2023-04-04 12:54:19','2023-04-04 12:54:19'),(3,1,4,'Manzanillo','Guadalajara',28000.00,'Flete completo ida y vuelta GDL<-->MZO',525.00,_binary '','2023-04-04 12:54:19','2023-04-04 12:54:19');
/*!40000 ALTER TABLE `freightslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relnwprovuser`
--

DROP TABLE IF EXISTS `relnwprovuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relnwprovuser` (
  `eIdProvUsr` int NOT NULL AUTO_INCREMENT,
  `fk_eIdProv` int DEFAULT NULL,
  `fk_eIdUser` int DEFAULT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdProvUsr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relnwprovuser`
--

LOCK TABLES `relnwprovuser` WRITE;
/*!40000 ALTER TABLE `relnwprovuser` DISABLE KEYS */;
/*!40000 ALTER TABLE `relnwprovuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceslist`
--

DROP TABLE IF EXISTS `serviceslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serviceslist` (
  `eIdService` int NOT NULL AUTO_INCREMENT,
  `fk_eIdCompany` int DEFAULT NULL,
  `txtService` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `txtDescription` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `flPrice` decimal(14,2) DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdService`),
  KEY `fk_eIdCompany` (`fk_eIdCompany`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceslist`
--

LOCK TABLES `serviceslist` WRITE;
/*!40000 ALTER TABLE `serviceslist` DISABLE KEYS */;
INSERT INTO `serviceslist` VALUES (1,1,'Viáticos chofer extra','1500',0.00,_binary '','2023-04-04 11:54:19','2023-04-04 11:54:19');
/*!40000 ALTER TABLE `serviceslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwlistafletes`
--

DROP TABLE IF EXISTS `vwlistafletes`;
/*!50001 DROP VIEW IF EXISTS `vwlistafletes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistafletes` AS SELECT 
 1 AS `idFlete`,
 1 AS `idEmpresa`,
 1 AS `idTipo`,
 1 AS `Origen`,
 1 AS `Descripcion`,
 1 AS `Destino`,
 1 AS `Precio`,
 1 AS `Distancia`,
 1 AS `Empresa`,
 1 AS `Tipo`,
 1 AS `Giro`,
 1 AS `Sector`,
 1 AS `TipoFlete`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwlistaservicios`
--

DROP TABLE IF EXISTS `vwlistaservicios`;
/*!50001 DROP VIEW IF EXISTS `vwlistaservicios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistaservicios` AS SELECT 
 1 AS `idServicio`,
 1 AS `Servicio`,
 1 AS `Descripcion`,
 1 AS `Precio`,
 1 AS `IdProveedor`,
 1 AS `Empresa`,
 1 AS `Giro`,
 1 AS `Sector`,
 1 AS `TipoProveedor`,
 1 AS `Autor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwlistempresas`
--

DROP TABLE IF EXISTS `vwlistempresas`;
/*!50001 DROP VIEW IF EXISTS `vwlistempresas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistempresas` AS SELECT 
 1 AS `Estatus`,
 1 AS `IdProveedor`,
 1 AS `Empresa`,
 1 AS `Giro`,
 1 AS `Sector`,
 1 AS `TipoProveedor`,
 1 AS `Email`,
 1 AS `Telefono`,
 1 AS `IdDireccion`,
 1 AS `Calle`,
 1 AS `NumExterior`,
 1 AS `NumInterior`,
 1 AS `Colonia`,
 1 AS `Ciudad`,
 1 AS `Estado`,
 1 AS `CodigoPostal`,
 1 AS `Autor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwlistempresassm`
--

DROP TABLE IF EXISTS `vwlistempresassm`;
/*!50001 DROP VIEW IF EXISTS `vwlistempresassm`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwlistempresassm` AS SELECT 
 1 AS `IdProveedor`,
 1 AS `Empresa`,
 1 AS `Giro`,
 1 AS `Sector`,
 1 AS `TipoProveedor`,
 1 AS `Autor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwtiposfletes`
--

DROP TABLE IF EXISTS `vwtiposfletes`;
/*!50001 DROP VIEW IF EXISTS `vwtiposfletes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwtiposfletes` AS SELECT 
 1 AS `idTipo`,
 1 AS `TipoFlete`,
 1 AS `DescripcionFlete`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'dbserviceproviders'
--

--
-- Final view structure for view `vwlistafletes`
--

/*!50001 DROP VIEW IF EXISTS `vwlistafletes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistafletes` AS select `f`.`eIdFreight` AS `idFlete`,`e`.`IdProveedor` AS `idEmpresa`,`c`.`eIdFType` AS `idTipo`,`f`.`txtOrigin` AS `Origen`,`f`.`txtDescFlete` AS `Descripcion`,`f`.`txtDestiny` AS `Destino`,`f`.`flFreightPrice` AS `Precio`,`f`.`eDistanceKm` AS `Distancia`,`e`.`Empresa` AS `Empresa`,`e`.`TipoProveedor` AS `Tipo`,`e`.`Giro` AS `Giro`,`e`.`Sector` AS `Sector`,`c`.`txtFType` AS `TipoFlete` from ((`freightslist` `f` join `vwlistempresas` `e` on((`e`.`IdProveedor` = `f`.`fk_eIdCompany`))) join `catfreightstypes` `c` on((`f`.`fk_eIdFreightType` = `c`.`eIdFType`))) where (`f`.`bActive` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwlistaservicios`
--

/*!50001 DROP VIEW IF EXISTS `vwlistaservicios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistaservicios` AS select `s`.`eIdService` AS `idServicio`,`s`.`txtService` AS `Servicio`,`s`.`txtDescription` AS `Descripcion`,`s`.`flPrice` AS `Precio`,`p`.`IdProveedor` AS `IdProveedor`,`p`.`Empresa` AS `Empresa`,`p`.`Giro` AS `Giro`,`p`.`Sector` AS `Sector`,`p`.`TipoProveedor` AS `TipoProveedor`,`p`.`Autor` AS `Autor` from (`serviceslist` `s` join `vwlistempresassm` `p` on((`s`.`fk_eIdCompany` = `p`.`IdProveedor`))) where (`s`.`bActive` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwlistempresas`
--

/*!50001 DROP VIEW IF EXISTS `vwlistempresas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistempresas` AS select `p`.`txtStatus` AS `Estatus`,`p`.`eIdCompany` AS `IdProveedor`,`p`.`txtName` AS `Empresa`,`p`.`txtArea` AS `Giro`,`p`.`txtSector` AS `Sector`,`p`.`txtProviderType` AS `TipoProveedor`,`p`.`txtEmail` AS `Email`,`p`.`txtPhone` AS `Telefono`,`a`.`eIdAddress` AS `IdDireccion`,`a`.`txtStreet` AS `Calle`,`a`.`txtOutNumber` AS `NumExterior`,`a`.`txtInNumber` AS `NumInterior`,`a`.`txtColony` AS `Colonia`,`a`.`txtCity` AS `Ciudad`,`a`.`txtState` AS `Estado`,`a`.`txtPostalCode` AS `CodigoPostal`,`p`.`fk_eIdCreatedFor` AS `Autor` from (`companieslist` `p` join `addresslist` `a` on((`p`.`fK_eIdAddress` = `a`.`eIdAddress`))) where (`p`.`bActive` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwlistempresassm`
--

/*!50001 DROP VIEW IF EXISTS `vwlistempresassm`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistempresassm` AS select `p`.`eIdCompany` AS `IdProveedor`,`p`.`txtName` AS `Empresa`,`p`.`txtArea` AS `Giro`,`p`.`txtSector` AS `Sector`,`p`.`txtProviderType` AS `TipoProveedor`,`p`.`fk_eIdCreatedFor` AS `Autor` from (`companieslist` `p` join `addresslist` `a` on((`p`.`fK_eIdAddress` = `a`.`eIdAddress`))) where (`p`.`bActive` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwtiposfletes`
--

/*!50001 DROP VIEW IF EXISTS `vwtiposfletes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwtiposfletes` AS select `catfreightstypes`.`eIdFType` AS `idTipo`,`catfreightstypes`.`txtFType` AS `TipoFlete`,`catfreightstypes`.`txtFDescription` AS `DescripcionFlete` from `catfreightstypes` where (`catfreightstypes`.`bActive` = 1) order by `catfreightstypes`.`txtFType` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-14 12:14:13
