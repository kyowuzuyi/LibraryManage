-- MySQL dump 10.16  Distrib 10.1.9-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: lb
-- ------------------------------------------------------
-- Server version	10.1.9-MariaDB

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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publish` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pubdate` date NOT NULL,
  `ISBN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'book','Bloodborne Official Artworks','電撃攻略本編集部 ','KADOKAWA/アスキー・メディアワークス','2016-02-16','9784048657983',1),(2,'book','ダンガンロンパ霧切 1','北山 猛邦  (著), 小松崎 類 (イラスト)','講談社','2013-09-13','9784061388758',0),(3,'book','ダンガンロンパ/ゼロ(上)','小高 和剛  (著), 小松崎 類 (イラスト)','講談社','2011-09-16','9784061388123',1),(4,'book','NEW GAME! (1)','得能正太郎','芳文社','2014-02-27','9784832244146',1),(5,'book','化物語(上) ','西尾 維新  (著), VOFAN (イラスト)','講談社','2006-11-01','9784062836029',1),(8,'game','Metal Gear Solid V','','コナミデジタルエンタテインメント konimi','2015-09-02','',1),(9,'anime','魔法少女リリカルなのはViVid Blu-ray BOX ','','A-1 Pictures','2016-11-23','',1);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(16) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `pressmark` varchar(16) DEFAULT NULL,
  `author` varchar(32) DEFAULT NULL,
  `publish` varchar(32) DEFAULT NULL,
  `releaseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(4) DEFAULT NULL,
  `remained` int(4) DEFAULT NULL,
  `ISBN` varchar(30) DEFAULT NULL,
  `category` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_loan`
--

DROP TABLE IF EXISTS `history_loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_loan` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `username_loan` varchar(32) DEFAULT NULL,
  `title_loaned` varchar(64) DEFAULT NULL,
  `time_loan` date DEFAULT NULL,
  `time_return` date DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_loan`
--

LOCK TABLES `history_loan` WRITE;
/*!40000 ALTER TABLE `history_loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name_manager` varchar(32) DEFAULT NULL,
  `accountID_manager` varchar(32) DEFAULT NULL,
  `password_manager` varchar(128) DEFAULT NULL,
  `flag_manager` tinyint(1) DEFAULT NULL,
  `time_register_manager` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (6,'top_manager','top','$2y$10$EYyyHDoACJZrKHz9knR9QOzXvwaBuIfw9EYBdfX6QHnNna0ojHwcK',1,'2016-11-01 04:29:28'),(7,'test_manager','testmanager','$2y$10$o2AB5R0CfoBEbbu2JqXtZuPEMshqo5qRmLv/84bTDePv3RnQW.CaC',0,'2016-11-01 04:38:45');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name_student` varchar(32) DEFAULT NULL,
  `id_student` varchar(16) DEFAULT NULL,
  `password_student` varchar(128) DEFAULT NULL,
  `email_student` varchar(32) DEFAULT NULL,
  `time_register_student` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'test_student','123','$2y$10$7jYyZuGVdVMDiTbN5/SOo.a1WF0osjYqdT8qaJi6cIcGQoLLtLzbe',NULL,'2016-11-01 04:28:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-01 18:45:03
