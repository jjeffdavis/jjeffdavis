-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for osx10.17 (x86_64)
--
-- Host: localhost    Database: users
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `tuser`
--

DROP TABLE IF EXISTS `tuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tuser` (
  `tuserid` int(11) NOT NULL AUTO_INCREMENT,
  `tusername` varchar(255) NOT NULL,
  `tpassword` varchar(255) NOT NULL DEFAULT '',
  `tfirstname` varchar(255) NOT NULL DEFAULT '',
  `tmiddle` char(1) NOT NULL DEFAULT '',
  `tlastname` varchar(255) NOT NULL DEFAULT '',
  `tbirthday` datetime DEFAULT NULL,
  `temail` varchar(255) NOT NULL,
  `tage` int(11) NOT NULL DEFAULT 0,
  `tisadmin` tinyint(1) NOT NULL DEFAULT 0,
  `tisregistereduser` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tuserid`),
  UNIQUE KEY `tusername` (`tusername`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tuser`
--

LOCK TABLES `tuser` WRITE;
/*!40000 ALTER TABLE `tuser` DISABLE KEYS */;
INSERT INTO `tuser` VALUES (1,'RalphKramden','busdriver','Ralph','','Kramden','1932-02-11 00:00:00','rkramden@newyorkbus.org',90,0,1),(3,'iris','HurricaneInNewYork','Iris','','Sunflower','1999-02-11 00:00:00','chinacatsunflower@greatfuldead.org',0,0,0),(13,'MrsBeasley','familyaffair','Berth','B','Beasley','1945-01-01 00:00:00','berthabeasley@cbs.com',77,0,1),(15,'nungesser','alicegumbiner','Alice Gumbiner','X','Nungesser','1902-01-01 00:00:00','bigalice@alicegumbiner.net',120,0,1),(16,'ubergesser','alicegumbiner','Alice Gumbiner','X','Buhl','1902-01-01 00:00:00','bigalice@alicegumbiner.net',120,0,1),(17,'ubergesserx','alicegumbiner','Alice Gumbiner','X','Buhl','1902-01-01 00:00:00','bigalice@alicegumbiner.net',120,0,1),(19,'EleanorFruttx','efr','Eleanor','','Frutt','1920-01-01 00:00:00','efrutt@thepractice.com',102,0,1),(20,'gunShopsOfIshir','Halsted','Jeffrey','J','Davis','1999-01-01 00:00:00','me@hotmail.com',23,0,1),(21,'ChinaCatSunflowers','RosesOnThePiano','Caleb','','Quayle','1920-01-01 00:00:00','caleb@byebye.club',102,0,1),(25,'Edith Bunker','Moon River','Edie','J','Buhl','1944-01-01 00:00:00','edith@flonase.com',78,0,1),(27,'yyy','yyy','xxx','x','xxx','1944-01-01 00:00:00','yyy@flonase.com',78,0,1),(28,'zzz','zzz','zzz','z','zzz','2033-01-01 00:00:00','zzz@zzz.zz',10,0,1),(29,'ChinaCatSunflower','umbridge','Gertrude Isabelle','','Gaanbala','2001-01-01 00:00:00','mary.martha.mcmertz@milliesmuchies.com',21,1,1),(30,'ChinaCatCauliflower','umbridge','irene','C','Curtin-Gembala','1888-01-01 00:00:00','elise@chinacatsunflower.com',134,1,1),(31,'SisterGeorge','thekillingof','Sister','','George','1969-01-01 00:00:00','sistergeorge@wickedfilms.com',53,0,1),(32,'ChinaCatSunflower$','umbridge$','Myrtle Irene','','Mnemosyne','1942-01-01 00:00:00','mnemosyne@furies.com',80,0,1),(33,'ChinaCatSunflower$$','umbridge','Gigliola','','Cinquetti','1972-01-01 00:00:00','gigliola@rosanera.it',50,0,1),(34,'ChinaCatSunflower$$$','umbridge','Irene','','Dembala','1920-01-01 00:00:00','ip@irala.ar',102,0,1),(35,'ChinaCatSunflower$$$$','umbridge','Dottie','I','Dumbrowska','2011-12-04 00:00:00','pishposh@hotmail.com',10,0,1),(36,'ChinaCatSunflowerPeach','chinacat','Mary Martha','','McMertz','1919-01-01 00:00:00','mmmm@bettecrocker.com',103,0,1),(37,'ednorton','trixie','Ed','N','Norton','1913-01-01 00:00:00','enorton@gmail.com',109,0,1);
/*!40000 ALTER TABLE `tuser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-16 22:25:44
