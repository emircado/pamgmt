-- MySQL dump 10.13  Distrib 5.1.67, for redhat-linux-gnu (x86_64)
--
-- Host: 10.11.7.10    Database: projects
-- ------------------------------------------------------
-- Server version	5.1.61

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
-- Table structure for table `application_point_persons`
--

DROP TABLE IF EXISTS `application_point_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_point_persons` (
  `application_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_group` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  UNIQUE KEY `id_username` (`application_id`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_point_persons`
--

LOCK TABLES `application_point_persons` WRITE;
/*!40000 ALTER TABLE `application_point_persons` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_point_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_servers`
--

DROP TABLE IF EXISTS `application_servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_servers` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL,
  `application_path` tinytext COLLATE utf8_bin,
  `application_log` tinytext COLLATE utf8_bin,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`application_id`,`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_servers`
--

LOCK TABLES `application_servers` WRITE;
/*!40000 ALTER TABLE `application_servers` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_types`
--

DROP TABLE IF EXISTS `application_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_types`
--

LOCK TABLES `application_types` WRITE;
/*!40000 ALTER TABLE `application_types` DISABLE KEYS */;
INSERT INTO `application_types` VALUES (1,'STAT',NULL),(2,'WEB',NULL);
/*!40000 ALTER TABLE `application_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` tinytext COLLATE utf8_bin,
  `accessiblity` enum('PUBLIC','PRIVATE') COLLATE utf8_bin NOT NULL,
  `repository_url` text COLLATE utf8_bin,
  `instructions` text COLLATE utf8_bin,
  `rd_point_person` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `production_date` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_contact_persons`
--

DROP TABLE IF EXISTS `project_contact_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_contact_persons` (
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `contact_numbers` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`project_id`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_contact_persons`
--

LOCK TABLES `project_contact_persons` WRITE;
/*!40000 ALTER TABLE `project_contact_persons` DISABLE KEYS */;
INSERT INTO `project_contact_persons` VALUES (102,'Sample Contact person','','adf','','email@text.com','','','2014-05-06 09:20:40','2014-05-06 14:12:05'),(182,'a','','','','yo@yo.yo','','','2014-05-05 19:05:03','0000-00-00 00:00:00'),(120,'test','','','te','test@akls.com','','','2014-04-29 12:54:01','0000-00-00 00:00:00'),(101,'adsasdf','','','','ret@ret.ret','','','2014-05-06 14:41:02','0000-00-00 00:00:00'),(101,'Test','SDF','SDF','34543asdfasdf','sumthin@test.com','fSDf','SDf','2014-04-29 11:16:25','2014-04-29 18:07:26'),(101,'emir','','','s','emir_mercado2000@yahoo.com','','asdfadf\nsdf\nasdf\ndf','2014-05-02 18:41:48','2014-05-06 15:34:45'),(106,'rqw','','','','erqwer@asdf.com','','','2014-05-05 18:43:20','0000-00-00 00:00:00'),(101,'A Very Long name','A very long company name','a very long position nameasdfasdf','09890','averylongemail@email.com.ph','90890','90890','2014-05-05 15:59:56','2014-05-05 16:09:42'),(101,'aaaa','','','','aaa@aa.aa','','','2014-05-06 14:41:11','0000-00-00 00:00:00'),(101,'hey','asdf','test','','test@test.tst','','','2014-04-29 11:14:30','2014-04-29 13:52:56');
/*!40000 ALTER TABLE `project_contact_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_notes`
--

DROP TABLE IF EXISTS `project_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8_bin,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_notes`
--

LOCK TABLES `project_notes` WRITE;
/*!40000 ALTER TABLE `project_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_point_persons`
--

DROP TABLE IF EXISTS `project_point_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_point_persons` (
  `project_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_group` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`project_id`,`username`),
  UNIQUE KEY `id_username` (`project_id`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_point_persons`
--

LOCK TABLES `project_point_persons` WRITE;
/*!40000 ALTER TABLE `project_point_persons` DISABLE KEYS */;
INSERT INTO `project_point_persons` VALUES (106,'ecmquiros','RND1','sdf','2014-05-05 18:38:35','0000-00-00 00:00:00'),(102,'igpjumaoas','RND1','','2014-04-30 13:34:11','0000-00-00 00:00:00'),(101,'ecmquiros','DEVELOPERS','','2014-05-02 18:29:19','0000-00-00 00:00:00'),(101,'bacquizon','DEVELOPERS','asdf','2014-05-06 15:17:47','2014-05-06 15:17:53'),(101,'apcadvento','DEVELOPERS','gf','2014-05-06 15:05:53','0000-00-00 00:00:00'),(101,'igpjumaoas','DEVELOPERS','','2014-04-30 13:37:13','0000-00-00 00:00:00'),(101,'jesia','RND1','','2014-05-06 15:21:55','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `project_point_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_bin NOT NULL,
  `description` tinytext COLLATE utf8_bin,
  `status` enum('ACTIVE','TERMINATED') COLLATE utf8_bin NOT NULL,
  `production_date` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `created_by` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (102,'Sample Project 02','PRO02','Description for project02','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-05-07 11:35:09',NULL,'ermercado'),(103,'Sample Project 03','PRO03','Description for project03','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-05-06 15:52:51',NULL,'loprudente'),(104,'Sample Project 04','PRO04','Description for project04','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-04-25 14:15:11',NULL,NULL),(105,'Sample Project 05','PRO05','Description for project05','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','2014-05-06 15:52:40',NULL,'loprudente'),(106,'Sample Project 06','PRO06','Description for project06','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(107,'Sample Project 07','PRO07','Description for project07','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(108,'Sample Project 08','PRO08','Description for project08','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','2014-05-06 15:28:34',NULL,'ermercado'),(109,'Sample Project 09','PRO09','Description for project09','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(110,'Sample Project 10','PRO10','Description for project10','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-04-25 14:13:35',NULL,NULL),(111,'Sample Project 11','PRO11','Description for project11','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-04-25 15:14:34',NULL,NULL),(112,'Sample Project 12','PRO12','Description for project12','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(113,'Sample Project 13','PRO13','Description for project13\n','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','2014-04-24 10:47:25',NULL,NULL),(114,'Sample Project 14','PRO14','Description for project14','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(115,'Sample Project 15','PRO15','Description for project15','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(116,'Sample Project 16','PRO16','Description for project16','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(117,'Sample Project 17','PRO17','Description for project17','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-04-25 14:30:08',NULL,NULL),(118,'Sample Project 18','PRO18','Description for project18','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','2014-04-24 11:50:42',NULL,NULL),(119,'Sample Project 19','PRO19','Description for project19','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(120,'Sample Project 20','PRO20','Description for project20','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-05-06 15:54:51',NULL,'ermercado'),(121,'Sample Project 21','PRO21','Description for project21','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(122,'Sample Project 22','PRO22','Description for project22','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-04-25 14:11:10',NULL,NULL),(123,'Sample Project 23','PRO23','Description for project23','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(124,'Sample Project 24','PRO24','Description for project24','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(125,'Sample Project 25','PRO25','Description for project25','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(126,'Sample Project 26','PRO26','Description for project26','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(127,'Sample Project 27','PRO27','Description for project27','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','2014-04-23 15:06:42',NULL,NULL),(128,'Sample Project 28','PRO28','Description for project28','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(129,'Sample Project 29','PRO29','Description for project29','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(130,'Sample Project 30','PRO30','Description for project30','ACTIVE','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(131,'Sample Project 71','PRO71','Description for project71','TERMINATED','2014-11-01','2014-04-25','0000-00-00 00:00:00','2014-04-25 15:14:44',NULL,NULL),(132,'Sample Project 72','PRO72','Description for project72','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(133,'Sample Project 73','PRO73','Description for project73','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(134,'Sample Project 74','PRO74','Description for project74','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(135,'Sample Project 75','PRO75','Description for project75','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(136,'Sample Project 76','PRO76','Description for project76','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(137,'Sample Project 77','PRO77','Description for project77','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(138,'Sample Project 78','PRO78','Description for project78','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(139,'Sample Project 79','PRO79','Description for project79','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(140,'Sample Project 80','PRO80','Description for project80','TERMINATED','2014-11-01','2014-11-02','0000-00-00 00:00:00','2014-04-24 16:00:00',NULL,NULL),(182,'','ASDFF','','ACTIVE','0000-00-00','0000-00-00','2014-05-05 19:00:00','0000-00-00 00:00:00','ermercado',NULL),(181,'adfas','DSSSS','ssssssss','ACTIVE','0000-00-00','0000-00-00','2014-05-05 18:59:38','0000-00-00 00:00:00','ermercado',NULL),(180,NULL,'ABCDE',NULL,'ACTIVE',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(177,'Sample test with createdby','TESTC','alskdfad','ACTIVE','2333-03-24','0000-00-00','2014-05-05 16:49:22','0000-00-00 00:00:00','ermercado',NULL),(175,'asdfkl','KLJLK','','ACTIVE','0000-00-00','0000-00-00','2014-04-28 09:23:02','0000-00-00 00:00:00',NULL,NULL),(176,'test','TSDFS','asdfasf','ACTIVE','0000-00-00','0000-00-00','2014-05-02 13:40:47','0000-00-00 00:00:00',NULL,NULL),(174,'sdf','ASDFA','asdf','ACTIVE','0000-00-00','0000-00-00','2014-04-25 15:06:33','2014-04-25 15:13:18',NULL,NULL),(173,'Test Project','LEGIT','legiiit','ACTIVE','2014-04-25','0000-00-00','2014-04-25 14:20:39','0000-00-00 00:00:00',NULL,NULL),(183,'Test with createdby','CREAT','meheheasdfsdfasdf','ACTIVE','0000-00-00','0000-00-00','2014-05-06 12:22:44','2014-05-06 13:52:47','ermercado','ermercado'),(184,'test','AKLDF','kjlasdfasasdasdfkl','ACTIVE','1111-01-01','0000-00-00','2014-05-06 13:53:24','2014-05-06 14:13:10','ermercado','ermercado'),(185,'Luke\'s Project','LUKEP','alkdf','ACTIVE','0000-00-00','0000-00-00','2014-05-06 15:50:24','0000-00-00 00:00:00','loprudente',NULL),(101,'Sample Project 01','PRO01','Description for project01','ACTIVE','2014-11-01','0000-00-00','0000-00-00 00:00:00','2014-05-06 16:48:17','ermercado','ermercado');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servers` (
  `server_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `server_type` enum('PRODUCTION','DEVELOPMENT','STAGING') COLLATE utf8_bin NOT NULL,
  `hostname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `public_ip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `private_ip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `network` varchar(50) COLLATE utf8_bin NOT NULL,
  `location` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` tinytext COLLATE utf8_bin,
  `production_date` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servers`
--

LOCK TABLES `servers` WRITE;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-07 13:41:07