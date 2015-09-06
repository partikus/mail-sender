-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mail-sender
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `mail_content`
--

DROP TABLE IF EXISTS `mail_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_content` (
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'temat maila',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'treść maila'
) ENGINE=MyISAM DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_content`
--

LOCK TABLES `mail_content` WRITE;
/*!40000 ALTER TABLE `mail_content` DISABLE KEYS */;
INSERT INTO `mail_content` VALUES ('Zapytanie ofertowe','Tresc');
/*!40000 ALTER TABLE `mail_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_sender`
--

DROP TABLE IF EXISTS `mail_sender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_sender` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `mail` text NOT NULL,
  `accept_offer` tinyint(1) DEFAULT '0' COMMENT '0 nie kliknal, 1 TAK, 2 NIE',
  `send_offer` binary(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin2 COMMENT='maile do wysylania ofert';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_sender`
--

LOCK TABLES `mail_sender` WRITE;
/*!40000 ALTER TABLE `mail_sender` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_sender` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-06 20:18:02
