-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: globalsegurosbd
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_cargo`
--

DROP TABLE IF EXISTS `tbl_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cargo` (
  `id_Cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionCargo` varchar(255) DEFAULT NULL,
  `sueldoCargo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cargo`
--

LOCK TABLES `tbl_cargo` WRITE;
/*!40000 ALTER TABLE `tbl_cargo` DISABLE KEYS */;
INSERT INTO `tbl_cargo` VALUES (1,'Gerente Comercial',6500000),(2,'Cajero',1200000),(3,'Asesor',1000000);
/*!40000 ALTER TABLE `tbl_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_colaborador`
--

DROP TABLE IF EXISTS `tbl_colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_colaborador` (
  `id_Colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocColaborador` varchar(45) DEFAULT NULL,
  `numeroDocColaborador` varchar(45) DEFAULT NULL,
  `apellidosColaborador` varchar(80) DEFAULT NULL,
  `nombreColaborador` varchar(80) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `idFkCargo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Colaborador`),
  KEY `IdFkCargo_idx` (`idFkCargo`),
  CONSTRAINT `IdFkCargo` FOREIGN KEY (`idFkCargo`) REFERENCES `tbl_cargo` (`id_Cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_colaborador`
--

LOCK TABLES `tbl_colaborador` WRITE;
/*!40000 ALTER TABLE `tbl_colaborador` DISABLE KEYS */;
INSERT INTO `tbl_colaborador` VALUES (1,'CC','91354093','Cruz Rojas','Juan Diego','1956-08-12','Masculino',1),(2,'CC','52349802','Lopez Castellanos','Andrea','1966-03-21','Femenino',1),(3,'CC','10954762901','Romero Parra','Luis Alberto','1994-06-28','Masculino',1),(4,'CC','1095758021','Leal Triana','Julieth Alexandra','1995-01-15','Femenino',2),(5,'CC','1095487690','Perez Palomino','Marcela','1993-09-28','Femenino',3),(6,'CC','1095432054','Quitien Ortega','Juan David','1992-04-28','Masculino',2),(7,'CC','1095409851','Barragan Sanchez','Jorge','1991-08-28','Masculino',3),(8,'CC','52395021','Lopez Gutierrez','Patricia','1958-03-24','Femenino',1);
/*!40000 ALTER TABLE `tbl_colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_registrotrabajo`
--

DROP TABLE IF EXISTS `tbl_registrotrabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_registrotrabajo` (
  `id_RegistroTrabajo` int(11) NOT NULL AUTO_INCREMENT,
  `fechaRegistroTrabajo` date DEFAULT NULL,
  `IdFkColaborador` int(11) DEFAULT NULL,
  `idFkTienda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_RegistroTrabajo`),
  KEY `idFkColaborador_idx` (`IdFkColaborador`),
  KEY `idFkTienda_idx` (`idFkTienda`),
  CONSTRAINT `idFkColaborador` FOREIGN KEY (`IdFkColaborador`) REFERENCES `tbl_colaborador` (`id_Colaborador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idFkTienda` FOREIGN KEY (`idFkTienda`) REFERENCES `tbl_tienda` (`id_Tienda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_registrotrabajo`
--

LOCK TABLES `tbl_registrotrabajo` WRITE;
/*!40000 ALTER TABLE `tbl_registrotrabajo` DISABLE KEYS */;
INSERT INTO `tbl_registrotrabajo` VALUES (1,'2020-07-17',1,1),(2,'2020-07-17',2,2),(5,'2020-07-17',3,3),(6,'2020-07-17',4,1),(7,'2020-07-17',5,2),(8,'2020-07-17',6,3),(9,'2020-07-17',7,3),(10,'2020-07-18',1,2),(11,'2020-07-18',2,3),(12,'2020-07-18',3,2),(13,'2020-07-18',4,3),(14,'2020-07-18',5,1),(15,'2020-07-18',6,1),(16,'2020-07-18',7,2),(17,'2020-07-17',8,3),(18,'2020-07-18',8,2);
/*!40000 ALTER TABLE `tbl_registrotrabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tienda`
--

DROP TABLE IF EXISTS `tbl_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tienda` (
  `id_Tienda` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTienda` varchar(150) DEFAULT NULL,
  `direccionTienda` varchar(80) DEFAULT NULL,
  `telefonoTienda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Tienda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tienda`
--

LOCK TABLES `tbl_tienda` WRITE;
/*!40000 ALTER TABLE `tbl_tienda` DISABLE KEYS */;
INSERT INTO `tbl_tienda` VALUES (1,'Galerias Central','Calle 63 Num 9 - 22',2147483647),(2,'Centro','Calle 9 Num 10 - 18',2147483647),(3,'Niza','Calle 94 Num 120 - 40',2147483647);
/*!40000 ALTER TABLE `tbl_tienda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-16 13:30:42
