-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (i686)
--
-- Host: sql11.freemysqlhosting.net    Database: sql11176712
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `Chats`
--

DROP TABLE IF EXISTS `Chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Chats` (
  `user1` varchar(30) CHARACTER SET utf8 NOT NULL,
  `user2` varchar(30) CHARACTER SET utf8 NOT NULL,
  `hour` varchar(10) CHARACTER SET utf8 NOT NULL,
  `msg` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '200 char max',
  PRIMARY KEY (`user1`,`user2`,`hour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chats`
--

LOCK TABLES `Chats` WRITE;
/*!40000 ALTER TABLE `Chats` DISABLE KEYS */;
INSERT INTO `Chats` VALUES ('2','','0-0:58:12','gdfgdfg'),('2','','0-0:58:16','f'),('2','3','0-1:4:31','Ã±Ã±Ã±'),('2','3','23:01','asdasdasd'),('2','3','dasdasd','0:37:5'),('2','3','fdfdf','0:34:20'),('2','3','jghjhgjgh ','0:39:29'),('2','3','ssdsdsd','0:34:40'),('2','5','0-1:1:56','eeee'),('2','5','0-1:3:53','lll'),('2','5','21:15:00','msn de 2-5'),('3','2','23:00','asdasdas'),('5','2','21:15:01','msn de 5-2');
/*!40000 ALTER TABLE `Chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DriverComments`
--

DROP TABLE IF EXISTS `DriverComments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DriverComments` (
  `driverUsername` varchar(30) NOT NULL,
  `passUsername` varchar(30) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `score` int(11) NOT NULL,
  `commentID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DriverComments`
--

LOCK TABLES `DriverComments` WRITE;
/*!40000 ALTER TABLE `DriverComments` DISABLE KEYS */;
/*!40000 ALTER TABLE `DriverComments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Drivers`
--

DROP TABLE IF EXISTS `Drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Drivers` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT 'foreign key',
  `score` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Drivers`
--

LOCK TABLES `Drivers` WRITE;
/*!40000 ALTER TABLE `Drivers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Journeys`
--

DROP TABLE IF EXISTS `Journeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Journeys` (
  `tripID` int(11) NOT NULL COMMENT 'foreign key',
  `journeyID` int(11) NOT NULL,
  `hour` varchar(5) CHARACTER SET utf8 NOT NULL COMMENT 'format: "##:##"',
  `cost` int(11) NOT NULL,
  `nSeats` int(11) NOT NULL,
  `origin` varchar(40) CHARACTER SET utf8 NOT NULL,
  `destination` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`tripID`,`journeyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Journeys`
--

LOCK TABLES `Journeys` WRITE;
/*!40000 ALTER TABLE `Journeys` DISABLE KEYS */;
/*!40000 ALTER TABLE `Journeys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Passengers`
--

DROP TABLE IF EXISTS `Passengers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Passengers` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Passengers`
--

LOCK TABLES `Passengers` WRITE;
/*!40000 ALTER TABLE `Passengers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Passengers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Trips`
--

DROP TABLE IF EXISTS `Trips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Trips` (
  `tripID` int(11) NOT NULL AUTO_INCREMENT,
  `driverUsername` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT 'foreign key',
  `origin` varchar(40) CHARACTER SET utf8 NOT NULL,
  `destination` varchar(40) CHARACTER SET utf8 NOT NULL,
  `totalAmount` int(11) NOT NULL,
  PRIMARY KEY (`tripID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Trips`
--

LOCK TABLES `Trips` WRITE;
/*!40000 ALTER TABLE `Trips` DISABLE KEYS */;
/*!40000 ALTER TABLE `Trips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(30) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(9) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'img file name',
  `rol` int(11) NOT NULL COMMENT '0 passenger / 1 driver',
  PRIMARY KEY (`username`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('1','1','1','1','1','1','1.PNG',0),('2','Usuario1','Usuario1','12312312','Usuario1','3123123','',0),('3','Usuario3','Usuario3','321312','Usuario3','123123','',1),('5','Usuario2','Usuario2','423423','Usuario2','234324','',0),('7','7','7','7','7','7','7.jpg',0),('EvaHergar','olakase','Eva','741852963','ddsafdgfhhgfd','sdfghjhgf','EvaHergar.',0);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-05 10:08:55
