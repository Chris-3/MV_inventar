-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: 
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
-- Current Database: `mvhofkirchen`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mvhofkirchen` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mvhofkirchen`;

--
-- Table structure for table `dateiregister`
--

DROP TABLE IF EXISTS `dateiregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dateiregister` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `filepath` varchar(100) NOT NULL,
  `Instrumenten_ID` smallint(6) NOT NULL,
  `hinzugefuegt_am` date NOT NULL,
  `Dateityp` varchar(20) NOT NULL,
  `Dateigroesse` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dateiregister`
--

LOCK TABLES `dateiregister` WRITE;
/*!40000 ALTER TABLE `dateiregister` DISABLE KEYS */;
INSERT INTO `dateiregister` VALUES (1,'Bilder/1_4.jpg',1,'2020-09-27','jpg',174353),(2,'Bilder/1_5.jpg',1,'2020-10-11','jpg',10529),(5,'Bilder/1_6.jpg',1,'2020-10-12','jpg',10010553),(7,'Bilder/3.jpg',3,'2020-10-12','jpg',14616),(8,'Bilder/10.jpg',10,'2021-10-28','jpg',11738),(9,'Bilder/11.jpg',11,'2021-10-29','jpg',92488),(10,'Bilder/3.png',3,'2021-10-31','png',2409924),(11,'Bilder/.jpg',0,'2021-11-01','jpg',170284),(12,'Bilder/1_7.jpg',1,'2021-11-01','jpg',2626043),(13,'Bilder/1_12.jpg',1,'2021-11-04','jpg',235462),(14,'Bilder/27.png',27,'2021-11-04','png',209758);
/*!40000 ALTER TABLE `dateiregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumente`
--

DROP TABLE IF EXISTS `instrumente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrumente` (
  `Bezeichnung` varchar(100) NOT NULL,
  `Seriennummer` smallint(6) NOT NULL,
  `Hersteller` varchar(50) NOT NULL,
  `Baujahr` smallint(6) NOT NULL,
  `Anschaffungskosten` int(11) NOT NULL,
  `Instrumententyp` tinyint(4) NOT NULL,
  `Stimmung` varchar(20) NOT NULL,
  `Namenszusatz` varchar(50) NOT NULL,
  `Ausgegeben` tinyint(1) NOT NULL,
  `Zubeh├Âr` text NOT NULL,
  `Anmerkung` text NOT NULL,
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumente`
--

LOCK TABLES `instrumente` WRITE;
/*!40000 ALTER TABLE `instrumente` DISABLE KEYS */;
INSERT INTO `instrumente` VALUES ('fgh-Klarinette ',123,'wersa',0,0,1,'','fgh',1,'','neu sdjflk',1),('Querfl├Âte ',0,'',0,0,3,'','neu',1,'','',3),('neuer zusatz-Querfl├Âte  in r',0,'asdf',0,1000,3,'r','neuer zusatz',1,'neu','neue Anmerkung',4),('Querfl├Âte \r\n         in C',32767,'tyrr',2010,0,3,'C','',1,'','',5),('Querfl├Âte ',0,'',0,0,3,'','',1,'','test',6),('fluegl-Trompete \r\n         in A',12672,'Hans',0,0,4,'A','fluegl',1,'','',9),('Klarinette ',0,'',0,0,1,'','some',0,'','',10),('irgendwas-Querfl├Âte \r\n         in B',1829,'Herman',2009,0,3,'B','irgendwas',1,'ll','bb',11),('Trompete \r\n        ',0,'bdfb',0,0,4,'','',1,'','',12),('Klarinette  in test',5555,'test2',0,0,1,'test','',0,'ein bissl Zeug','',13),('',5555,'test2',0,0,1,'test','',0,'','',14),('',32767,'hhhhh',2017,2342,1,'ttt','kkkk',0,'alles','asd',15),('Klarinette ',32767,'sss',0,0,1,'','',0,'','',16),('Querfl├Âte ',32767,'dfgg',2019,9999,3,'','',0,'','',17),('Trompete ',32767,'hgff',0,0,4,'','',0,'','',18),('Trompete ',32767,'hgff',0,0,4,'','',0,'','',19),('zus-Klarinette  in y',12389,'jjjj',2017,1234,1,'y','zus',0,'zubehoer','anmerk',20),('Querfl├Âte ',32767,'fghd',0,0,3,'','',0,'','',21),('Querfl├Âte ',32767,'fghd',0,0,3,'','',0,'','',22),('Klarinette ',32767,'test',2004,0,1,'','',0,'','',23),('Klarinette ',32767,'hfdgh',0,0,1,'','',0,'','',24),('Klarinette ',32767,'jshdkfjh',0,0,1,'','',0,'','',25),('Klarinette ',32767,'jshdkfjh',0,0,1,'','',0,'','',26),('Pauke ',32767,'Hallo',0,0,2,'','',0,'','',27);
/*!40000 ALTER TABLE `instrumente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumententypen`
--

DROP TABLE IF EXISTS `instrumententypen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrumententypen` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Instrumententyp` varchar(50) NOT NULL,
  `Register` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumententypen`
--

LOCK TABLES `instrumententypen` WRITE;
/*!40000 ALTER TABLE `instrumententypen` DISABLE KEYS */;
INSERT INTO `instrumententypen` VALUES (1,'Klarinette',1),(2,'Pauke',3),(3,'Querfl├Âte',1),(4,'Trompete',2);
/*!40000 ALTER TABLE `instrumententypen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leihregister`
--

DROP TABLE IF EXISTS `leihregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leihregister` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Instrumenten_ID` smallint(6) NOT NULL,
  `Musiker_ID` smallint(6) NOT NULL,
  `ausgegeben_am` date NOT NULL,
  `zur├╝ckgegeben_am` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leihregister`
--

LOCK TABLES `leihregister` WRITE;
/*!40000 ALTER TABLE `leihregister` DISABLE KEYS */;
INSERT INTO `leihregister` VALUES (1,1,1,'2020-09-01','0000-00-00'),(3,3,3,'2020-09-23','0000-00-00'),(4,4,4,'2020-09-10','0000-00-00'),(5,5,5,'2020-09-10','0000-00-00'),(6,6,6,'2020-09-10','0000-00-00'),(8,9,8,'0000-00-00','0000-00-00'),(9,11,9,'2021-10-14','0000-00-00'),(10,3,4,'2019-09-23','2020-09-23'),(11,12,10,'0000-00-00','0000-00-00');
/*!40000 ALTER TABLE `leihregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musiker`
--

DROP TABLE IF EXISTS `musiker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musiker` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musiker`
--

LOCK TABLES `musiker` WRITE;
/*!40000 ALTER TABLE `musiker` DISABLE KEYS */;
INSERT INTO `musiker` VALUES (1,'lksjdf1','tetsdf1'),(2,'sdppr2','N2'),(3,'oiter','fota'),(4,'test4','Ntest4'),(5,'test5','Ntest5'),(6,'test6','test6_N'),(7,'V7','N7'),(8,'V8','N8'),(9,'V9','N9'),(10,'weweq','tutut');
/*!40000 ALTER TABLE `musiker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `mysql`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mysql` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mysql`;

--
-- Table structure for table `column_stats`
--

DROP TABLE IF EXISTS `column_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `column_stats` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `min_value` varbinary(255) DEFAULT NULL,
  `max_value` varbinary(255) DEFAULT NULL,
  `nulls_ratio` decimal(12,4) DEFAULT NULL,
  `avg_length` decimal(12,4) DEFAULT NULL,
  `avg_frequency` decimal(12,4) DEFAULT NULL,
  `hist_size` tinyint(3) unsigned DEFAULT NULL,
  `hist_type` enum('SINGLE_PREC_HB','DOUBLE_PREC_HB') COLLATE utf8_bin DEFAULT NULL,
  `histogram` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`,`column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=0 COMMENT='Statistics on Columns';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `column_stats`
--

LOCK TABLES `column_stats` WRITE;
/*!40000 ALTER TABLE `column_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `column_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `columns_priv`
--

DROP TABLE IF EXISTS `columns_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columns_priv` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Table_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Column_name` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Column_priv` set('Select','Insert','Update','References') CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`Host`,`Db`,`User`,`Table_name`,`Column_name`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Column privileges';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `columns_priv`
--

LOCK TABLES `columns_priv` WRITE;
/*!40000 ALTER TABLE `columns_priv` DISABLE KEYS */;
/*!40000 ALTER TABLE `columns_priv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db`
--

DROP TABLE IF EXISTS `db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Db` char(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_history_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Host`,`Db`,`User`),
  KEY `User` (`User`)
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_bin PAGE_CHECKSUM=1 TRANSACTIONAL=1 COMMENT='Database privileges';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db`
--

LOCK TABLES `db` WRITE;
/*!40000 ALTER TABLE `db` DISABLE KEYS */;
