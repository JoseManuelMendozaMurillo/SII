CREATE DATABASE control_escolar;

USE control_escolar;
-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: control_escolar
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Alumnos`
--

DROP TABLE IF EXISTS `Alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Alumnos` (
  `id_alumno` int NOT NULL AUTO_INCREMENT COMMENT 'Idnetificador del alumno',
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Nombre del alumno',
  `num_control` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Numero de control del alumno',
  `id_carrera` int NOT NULL,
  `semestre` int NOT NULL,
  `id_grupo` int NOT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `num_control` (`num_control`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_carrera` (`id_carrera`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alumnos`
--

LOCK TABLES `Alumnos` WRITE;
/*!40000 ALTER TABLE `Alumnos` DISABLE KEYS */;
INSERT INTO `Alumnos` VALUES (1,'Jose Manuel Mendoza Murillo','19630306',3,6,16),(2,'Israel Ruíz Torres','19630356',1,2,5);
/*!40000 ALTER TABLE `Alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Carreras`
--

DROP TABLE IF EXISTS `Carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Carreras` (
  `id_carrera` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la carrera',
  `carrera` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Nombre de la carrera',
  `semestres` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Semestres de la carrera',
  PRIMARY KEY (`id_carrera`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Carreras`
--

LOCK TABLES `Carreras` WRITE;
/*!40000 ALTER TABLE `Carreras` DISABLE KEYS */;
INSERT INTO `Carreras` VALUES (1,'Ingeniería en Sistemas Computacionales','9'),(2,'Ingeniería en Logistica','9'),(3,'Ingeniería en Electromecanica','9'),(4,'Ingeniería Industrial','9'),(5,'Ingeniería en Gestion Empresarial','9'),(6,'Contador Publico','9');
/*!40000 ALTER TABLE `Carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Grupos`
--

DROP TABLE IF EXISTS `Grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Grupos` (
  `id_grupo` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del grupo',
  `id_carrera` int NOT NULL COMMENT 'Clave foranea',
  `semestre` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Semestre del grupo',
  `identificador` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Identificador del grupo',
  PRIMARY KEY (`id_grupo`),
  KEY `id_carrera` (`id_carrera`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grupos`
--

LOCK TABLES `Grupos` WRITE;
/*!40000 ALTER TABLE `Grupos` DISABLE KEYS */;
INSERT INTO `Grupos` VALUES (1,1,'8','Unico'),(2,1,'6','Unico'),(3,1,'4','A'),(4,1,'4','B'),(5,1,'2','A'),(6,1,'2','B'),(7,2,'8','A'),(8,2,'8','B'),(9,2,'6','A'),(10,2,'6','B'),(11,2,'4','A'),(12,2,'4','B'),(13,2,'2','A'),(14,2,'2','B'),(15,3,'8','Unico'),(16,3,'6','Unico'),(17,3,'4','A'),(18,3,'4','B'),(19,3,'2','A'),(20,3,'2','B'),(21,4,'8','Unico'),(22,4,'6','Unico'),(23,4,'4','A'),(24,4,'4','B'),(25,4,'2','A'),(26,4,'2','B'),(27,5,'8','Unico'),(28,5,'6','A'),(29,5,'6','B'),(30,5,'4','A'),(31,5,'4','B'),(32,5,'2','A'),(33,5,'2','B'),(34,6,'8','Unico'),(35,6,'6','A'),(36,6,'6','B'),(37,6,'4','A'),(38,6,'4','B'),(39,6,'2','A'),(40,6,'2','B');
/*!40000 ALTER TABLE `Grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `datos_alumnos`
--

DROP TABLE IF EXISTS `datos_alumnos`;
/*!50001 DROP VIEW IF EXISTS `datos_alumnos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `datos_alumnos` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `num_control`,
 1 AS `carrera`,
 1 AS `semestre`,
 1 AS `grupo`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `datos_alumnos`
--

/*!50001 DROP VIEW IF EXISTS `datos_alumnos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `datos_alumnos` AS select `a`.`id_alumno` AS `id`,`a`.`nombre` AS `nombre`,`a`.`num_control` AS `num_control`,`c`.`carrera` AS `carrera`,`a`.`semestre` AS `semestre`,`g`.`identificador` AS `grupo` from ((`Alumnos` `a` join `Carreras` `c` on((`c`.`id_carrera` = `a`.`id_carrera`))) join `Grupos` `g` on((`g`.`id_grupo` = `a`.`id_grupo`))) */;
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

-- Dump completed on 2023-06-12 20:17:11
