/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: transportessrl
-- ------------------------------------------------------
-- Server version	10.11.14-MariaDB-0+deb12u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudades` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDestino` varchar(255) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES
(1,'Buenos Aires - Capital'),
(2,'Mar del Plata'),
(3,'Rosario'),
(4,'Cordoba'),
(5,'San Luis'),
(6,'Neuquen'),
(7,'Bariloche'),
(8,'Esquel'),
(9,'El bolson'),
(10,'Trelew'),
(11,'Madryn'),
(12,'Comodoro Rivadavia'),
(13,'Rio Gallegos');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `mail_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES
(1,'Llauco','Nestor','nllauco@unmail.com',10100200,'1990-01-01'),
(2,'Jauregui','Ignacio','rjauregui@ing.unp.edu.ar',10101201,'1990-01-01'),
(3,'Viviers','Francisco','fviviers@mail.com',10102202,'1990-01-01'),
(4,'Messi','Lionel','thegoat@mail.com',10101010,'2026-06-24'),
(5,'Mbappe','Kylian','franchute@mail.com',10103203,'1998-12-20'),
(6,'haaland','Erling','viking@mail.com',10104204,'2000-07-21'),
(7,'Salah','Mohamed','vinagre@mail.com',10105205,'1992-06-15'),
(8,'Ronaldo','Cristiano','narciso@mail.com',10106206,'1985-02-05');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinos`
--

DROP TABLE IF EXISTS `destinos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `destinos` (
  `idOrigin` int(11) NOT NULL,
  `idDestino` int(11) NOT NULL,
  `hora_partida` time DEFAULT NULL,
  `hora_llegada` time DEFAULT NULL,
  `duracion` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinos`
--

LOCK TABLES `destinos` WRITE;
/*!40000 ALTER TABLE `destinos` DISABLE KEYS */;
INSERT INTO `destinos` VALUES
(1,2,'22:00:00','04:00:00',6),
(1,3,'22:00:00','04:00:00',6),
(1,4,'22:00:00','08:00:00',10),
(1,5,'22:00:00','10:00:00',12),
(1,7,'22:00:00','20:00:00',22),
(1,10,'22:00:00','16:00:00',18),
(12,1,'18:00:00','22:00:00',28),
(12,7,'22:00:00','13:00:00',15),
(12,8,'22:00:00','09:00:00',11),
(12,9,'22:00:00','11:00:00',13),
(12,10,'12:00:00','17:00:00',5),
(12,13,'14:00:00','00:00:00',10),
(2,1,'14:00:00','20:00:00',6),
(2,3,'14:00:00','00:00:00',10),
(2,4,'22:00:00','12:00:00',14),
(2,5,'18:00:00','08:00:00',14),
(13,12,'10:00:00','20:00:00',10),
(3,1,'00:00:00','06:00:00',6),
(3,2,'12:00:00','20:00:00',10),
(3,4,'22:00:00','04:00:00',6),
(3,5,'22:00:00','08:00:00',10),
(10,6,'22:00:00','08:00:00',10),
(10,7,'10:00:00','22:00:00',12),
(10,8,'13:00:00','20:00:00',7),
(10,9,'13:00:00','22:00:00',9),
(10,11,'10:00:00','11:00:00',1),
(10,12,'22:00:00','06:00:00',5),
(10,1,'16:00:00','10:00:00',18);
/*!40000 ALTER TABLE `destinos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-23 15:50:37
