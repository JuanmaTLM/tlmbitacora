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

-- Dump completed on 2023-04-12 11:18:58
