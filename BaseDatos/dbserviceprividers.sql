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

-- Dump completed on 2023-04-12 11:19:28
