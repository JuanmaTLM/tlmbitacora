CREATE DATABASE  IF NOT EXISTS `dbbitacora` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbbitacora`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: dbbase.crmum9kt2yiq.us-east-2.rds.amazonaws.com    Database: dbbitacora
-- ------------------------------------------------------
-- Server version	5.7.33

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `catgastos`
--

DROP TABLE IF EXISTS `catgastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catgastos` (
  `eIdLGasto` int(11) NOT NULL AUTO_INCREMENT,
  `txtCveGasto` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdLGasto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `eIdGenerales` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int(11) DEFAULT NULL,
  `txtETA` varchar(50) DEFAULT NULL,
  `txtNaviera` varchar(50) DEFAULT NULL,
  `txtVessel` varchar(50) DEFAULT NULL,
  `txtVoyaje` varchar(50) DEFAULT NULL,
  `txtTerminal` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGenerales`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `eIdManExtra` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int(11) DEFAULT NULL,
  `fk_eIdReferencia` int(11) DEFAULT NULL,
  `txtManiobraE` varchar(50) DEFAULT NULL,
  `txtValor` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdManExtra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `eIdMerca` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIDReferencia` int(11) DEFAULT NULL,
  `txtContenedor` varchar(50) DEFAULT NULL,
  `txtTamTipo` varchar(50) DEFAULT NULL,
  `txtPedimento` varchar(50) DEFAULT NULL,
  `txtBL` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdMerca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `eIdPersona` int(11) NOT NULL AUTO_INCREMENT,
  `txtName` varchar(15) NOT NULL,
  `txtLastName` varchar(50) NOT NULL,
  `txtEmail` varchar(50) DEFAULT NULL,
  `bActivo` bit(1) NOT NULL,
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catpersonas`
--

LOCK TABLES `catpersonas` WRITE;
/*!40000 ALTER TABLE `catpersonas` DISABLE KEYS */;
INSERT INTO `catpersonas` VALUES (1,'Juan Manuel','Fernández Alvarez',NULL,_binary '','2023-03-02 18:20:18','2023-03-02 18:20:20'),(2,'Administrador',' Tracing Logistics',NULL,_binary '','2023-03-09 17:46:32','2023-03-09 17:46:32');
/*!40000 ALTER TABLE `catpersonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catreferencias`
--

DROP TABLE IF EXISTS `catreferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catreferencias` (
  `eIdReferencia` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIdCliente` int(11) DEFAULT '0',
  `cveReferencia` varchar(50) NOT NULL,
  `feReferencia` date NOT NULL,
  `bActiva` bit(1) NOT NULL DEFAULT b'1',
  `fhCreatedAt` datetime NOT NULL,
  `fhUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`eIdReferencia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='Datos Generales de Referencia';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catreferencias`
--

LOCK TABLES `catreferencias` WRITE;
/*!40000 ALTER TABLE `catreferencias` DISABLE KEYS */;
INSERT INTO `catreferencias` VALUES (1,1,'1','2023-03-16',_binary '','2023-03-16 01:41:20','2023-03-16 01:41:22'),(2,NULL,'on','0000-00-00',_binary '','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,NULL,'on','0000-00-00',_binary '','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,NULL,'on','0000-00-00',_binary '','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,'on','0000-00-00',_binary '','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,1,'on','0000-00-00',_binary '','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,7,'on','0000-00-00',_binary '','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,7,'on','2023-03-16',_binary '','2023-03-16 08:03:39','2023-03-16 08:03:39'),(9,8,'on','2023-03-16',_binary '','2023-03-16 08:03:59','2023-03-16 08:03:59');
/*!40000 ALTER TABLE `catreferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catusers`
--

DROP TABLE IF EXISTS `catusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catusers` (
  `eIdUsr` int(11) NOT NULL AUTO_INCREMENT,
  `fkeIdPersona` int(11) DEFAULT NULL,
  `fkeIdTipo` int(11) DEFAULT NULL,
  `txtNickName` varchar(15) NOT NULL,
  `txtPass` varchar(50) NOT NULL,
  `bActivo` bit(1) NOT NULL DEFAULT b'0',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUsr`),
  KEY `fkeIdPersona` (`fkeIdPersona`),
  KEY `fkeIdTipo` (`fkeIdTipo`),
  CONSTRAINT `catusers_ibfk_1` FOREIGN KEY (`fkeIdPersona`) REFERENCES `catpersonas` (`eIdPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catusers`
--

LOCK TABLES `catusers` WRITE;
/*!40000 ALTER TABLE `catusers` DISABLE KEYS */;
INSERT INTO `catusers` VALUES (1,1,3,'Juanma','6b45be7910410293e64def2272ff6cd7',_binary '','2023-03-02 18:21:14','2023-03-02 18:21:15'),(2,2,1,'Admin','e64b78fc3bc91bcbc7dc232ba8ec59e0',_binary '','2023-03-09 18:47:13','2023-03-09 17:47:13');
/*!40000 ALTER TABLE `catusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catusertypes`
--

DROP TABLE IF EXISTS `catusertypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catusertypes` (
  `eIdUserType` int(11) NOT NULL AUTO_INCREMENT,
  `txtUserType` varchar(50) NOT NULL,
  `txtDescripcion` text,
  `bActivo` bit(1) DEFAULT b'1',
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feActualizacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdUserType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catusertypes`
--

LOCK TABLES `catusertypes` WRITE;
/*!40000 ALTER TABLE `catusertypes` DISABLE KEYS */;
INSERT INTO `catusertypes` VALUES (1,'Administrador','Se encarga de llevar el seguimiento de cada uno d elos m´ódulos del sistema',_binary '','2023-03-17 12:49:32','2023-03-17 12:49:31'),(2,'Director General','Su nivel de acceso es para ver reportes, tendrá un dashboard personalizado y podrá generar algunas actividades como generación de referencias',_binary '','2023-03-17 18:49:51','2023-03-17 18:49:51'),(3,'Sistemas','Su nivel de acceso es el mismo que el administrador',_binary '','2023-03-17 18:50:45','2023-03-17 18:50:45');
/*!40000 ALTER TABLE `catusertypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docctagastos`
--

DROP TABLE IF EXISTS `docctagastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docctagastos` (
  `eIdCtaGastos` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIdReferencia` int(11) DEFAULT NULL,
  `txtCtaGastos` varchar(50) DEFAULT NULL,
  `txtUrl` varchar(50) DEFAULT NULL,
  `txtDocName` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdCtaGastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `eIdGastos` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIdGasto` int(11) DEFAULT NULL,
  `fk_eIdReferencia` int(11) DEFAULT NULL,
  `txtValor` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdGastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `eIdList` int(11) NOT NULL AUTO_INCREMENT,
  `fk_eIdMerca` int(11) DEFAULT NULL,
  `fk_eIdReferencia` int(11) DEFAULT NULL,
  `txtMercancia` varchar(50) DEFAULT NULL,
  `txtBultos` varchar(50) DEFAULT NULL,
  `txtFraccion` varchar(50) DEFAULT NULL,
  `feCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `feModificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eIdList`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listmercas`
--

LOCK TABLES `listmercas` WRITE;
/*!40000 ALTER TABLE `listmercas` DISABLE KEYS */;
/*!40000 ALTER TABLE `listmercas` ENABLE KEYS */;
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
-- Temporary view structure for view `vwreferencias`
--

DROP TABLE IF EXISTS `vwreferencias`;
/*!50001 DROP VIEW IF EXISTS `vwreferencias`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwreferencias` AS SELECT 
 1 AS `IdReferencia`,
 1 AS `IdCliente`,
 1 AS `CveReferencia`,
 1 AS `Fecha_Referencia`,
 1 AS `Contenedor`,
 1 AS `Tamano_Tipo`,
 1 AS `Pedimento`,
 1 AS `BL`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwuserdata`
--

DROP TABLE IF EXISTS `vwuserdata`;
/*!50001 DROP VIEW IF EXISTS `vwuserdata`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwuserdata` AS SELECT 
 1 AS `IdP`,
 1 AS `Nombre_s`,
 1 AS `Apellidos`,
 1 AS `NombreCompleto`,
 1 AS `Email`,
 1 AS `IdUsr`,
 1 AS `Usuario`,
 1 AS `UserActive`,
 1 AS `IdType`,
 1 AS `UserType`,
 1 AS `Descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwusersactive`
--

DROP TABLE IF EXISTS `vwusersactive`;
/*!50001 DROP VIEW IF EXISTS `vwusersactive`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwusersactive` AS SELECT 
 1 AS `Id`,
 1 AS `Usuario`,
 1 AS `Pass`*/;
SET character_set_client = @saved_cs_client;

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
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
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
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
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
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vwlistamercancias` AS select `cm`.`fk_eIDReferencia` AS `IdReferencia`,`cm`.`eIdMerca` AS `IdMercancia`,`lm`.`eIdList` AS `IdLista_Mercancias`,`lm`.`txtMercancia` AS `Mercancia`,`lm`.`txtBultos` AS `Bultos`,`lm`.`txtFraccion` AS `Fraccion_Arancelaria` from (`listmercas` `lm` join `catmercancias` `cm` on((`lm`.`fk_eIdMerca` = `cm`.`eIdMerca`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwreferencias`
--

/*!50001 DROP VIEW IF EXISTS `vwreferencias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vwreferencias` AS select `re`.`eIdReferencia` AS `IdReferencia`,`re`.`fk_eIdCliente` AS `IdCliente`,`re`.`cveReferencia` AS `CveReferencia`,`re`.`feReferencia` AS `Fecha_Referencia`,`me`.`txtContenedor` AS `Contenedor`,`me`.`txtTamTipo` AS `Tamano_Tipo`,`me`.`txtPedimento` AS `Pedimento`,`me`.`txtBL` AS `BL` from ((`catreferencias` `re` join `catmercancias` `me` on((`re`.`eIdReferencia` = `me`.`fk_eIDReferencia`))) join `vwlistagastos` `lg` on((`lg`.`IdReferencia` = `re`.`eIdReferencia`))) */;
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
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vwuserdata` AS select `p`.`eIdPersona` AS `IdP`,`p`.`txtName` AS `Nombre_s`,`p`.`txtLastName` AS `Apellidos`,concat(`p`.`txtName`,' ',`p`.`txtLastName`) AS `NombreCompleto`,`p`.`txtEmail` AS `Email`,`u`.`eIdUsr` AS `IdUsr`,`u`.`txtNickName` AS `Usuario`,`u`.`bActivo` AS `UserActive`,`t`.`eIdUserType` AS `IdType`,`t`.`txtUserType` AS `UserType`,`t`.`txtDescripcion` AS `Descripcion` from ((`catpersonas` `p` join `catusers` `u` on((`u`.`fkeIdPersona` = `p`.`eIdPersona`))) join `catusertypes` `t` on((`u`.`fkeIdTipo` = `t`.`eIdUserType`))) */;
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
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vwusersactive` AS select `u`.`fkeIdPersona` AS `Id`,`u`.`txtNickName` AS `Usuario`,`u`.`txtPass` AS `Pass` from `catusers` `u` where (`u`.`bActivo` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-26 12:56:31
