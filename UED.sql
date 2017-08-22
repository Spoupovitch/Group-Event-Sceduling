-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: ued
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`s_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `stu` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2),(7728),(25010);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `text` char(200) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `e_id` (`e_id`,`s_id`),
  KEY `s_id` (`s_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `stu` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('asdfasdf',2,4,7,25010),('dsafsdf',3,7,17,2),('tttttt',3,11,17,25010);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(11) NOT NULL,
  `date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `name` char(30) DEFAULT NULL,
  `type` char(30) DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  `email` char(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`e_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (6,1234567,'2017-06-28','00:00:00','13:00:00',123,123,'final test','asdf','afasdf1','e@yahoo.com',1),(7,1234567,'2017-06-28','13:20:00','14:00:00',123,123,'final test2','asdf','afasdf1','e@yahoo.com',1),(8,1234567,'2017-06-28','15:20:00','16:00:00',123,123,'final test4','asdf','afasdf1','e@yahoo.com',1),(9,1234567,'2017-07-28','00:00:00','02:00:00',123,123,'testhello','','adfadsf','e@yahoo.com',1),(12,1234567,'2017-08-28','00:00:00','02:00:00',123,123,'testhello3','dfdf','adfadsf','e@yahoo.com',0),(13,1234567,'2017-10-28','00:00:00','02:00:00',123,123,'tytytytytytyty','dfdf','adfadsf','e@yahoo.com',0),(17,1234567,'2017-10-28','22:00:00','23:00:00',123,123,'yuyuyuyuyiuiui','dfdf','adfadsf','e@yahoo.com',0),(18,123124124,'2017-01-01','01:00:00','01:01:00',1122,1212,'rsotest','testcat','adfadsfasdfasdf','4@yahoo.mail',1),(19,45676,'2017-07-12','13:00:00','14:00:00',28.6016,-81.2005,'test7','fundraiser','have fun making money','test@test.com',1),(20,31234124,'2017-09-13','01:00:00','14:00:00',28.6077,-81.193,'test8','test8cat','test8descrip','test8@test.com',1);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ued`.`event_BEFORE_INSERT` BEFORE INSERT ON `event` FOR EACH ROW
BEGIN
if exists (select * from event
             where s_time <= new.e_time
             and e_time >= new.s_time and date = new.date) then
    signal sqlstate '45000' SET MESSAGE_TEXT = 'Overlaps with existing data';
  end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_link` char(255) NOT NULL,
  `name` char(30) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `name` (`name`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `uni` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `private_event`
--

DROP TABLE IF EXISTS `private_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `private_event` (
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `private_event_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`),
  CONSTRAINT `private_event_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `uni` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `private_event`
--

LOCK TABLES `private_event` WRITE;
/*!40000 ALTER TABLE `private_event` DISABLE KEYS */;
INSERT INTO `private_event` VALUES (17,1);
/*!40000 ALTER TABLE `private_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_event`
--

DROP TABLE IF EXISTS `public_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_event` (
  `e_id` int(11) NOT NULL,
  PRIMARY KEY (`e_id`),
  CONSTRAINT `public_event_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_event`
--

LOCK TABLES `public_event` WRITE;
/*!40000 ALTER TABLE `public_event` DISABLE KEYS */;
INSERT INTO `public_event` VALUES (6),(7),(8),(9),(19),(20);
/*!40000 ALTER TABLE `public_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rso`
--

DROP TABLE IF EXISTS `rso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rso` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `num_m` int(11) DEFAULT '0',
  `name` char(30) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  UNIQUE KEY `name` (`name`),
  KEY `s_id` (`s_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `rso_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `admin` (`s_id`),
  CONSTRAINT `rso_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `uni` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rso`
--

LOCK TABLES `rso` WRITE;
/*!40000 ALTER TABLE `rso` DISABLE KEYS */;
INSERT INTO `rso` VALUES (1,7728,1,4,'chess club'),(5,25010,1,0,'urtuirtiritut'),(11,2,1,5,'test');
/*!40000 ALTER TABLE `rso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rso_event`
--

DROP TABLE IF EXISTS `rso_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rso_event` (
  `e_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `rso_event_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`),
  CONSTRAINT `rso_event_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rso` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rso_event`
--

LOCK TABLES `rso_event` WRITE;
/*!40000 ALTER TABLE `rso_event` DISABLE KEYS */;
INSERT INTO `rso_event` VALUES (18,5);
/*!40000 ALTER TABLE `rso_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rso_m`
--

DROP TABLE IF EXISTS `rso_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rso_m` (
  `s_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`s_id`,`r_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `rso_m_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `stu` (`s_id`),
  CONSTRAINT `rso_m_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rso` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rso_m`
--

LOCK TABLES `rso_m` WRITE;
/*!40000 ALTER TABLE `rso_m` DISABLE KEYS */;
INSERT INTO `rso_m` VALUES (7728,1),(8051,1),(12461,1),(25010,1),(2,11),(7728,11),(8051,11),(12461,11),(25010,11);
/*!40000 ALTER TABLE `rso_m` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger new_member
after insert on rso_m
for each row
update rso
set num_m = num_m + 1
where r_id = new.r_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger delete_member
after delete on rso_m
for each row
update rso
set num_m = num_m - 1
where r_id = old.r_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `s_admin`
--

DROP TABLE IF EXISTS `s_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_admin` (
  `s_a_id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `p_word` char(20) NOT NULL,
  PRIMARY KEY (`s_a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_admin`
--

LOCK TABLES `s_admin` WRITE;
/*!40000 ALTER TABLE `s_admin` DISABLE KEYS */;
INSERT INTO `s_admin` VALUES (1,'elizabeth','hello'),(123,'joy','happy'),(456,'francisco','abcdefg'),(123456,'cisco','test');
/*!40000 ALTER TABLE `s_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu`
--

DROP TABLE IF EXISTS `stu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu` (
  `s_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `p_word` char(20) NOT NULL,
  `name` char(30) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `stu_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `uni` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu`
--

LOCK TABLES `stu` WRITE;
/*!40000 ALTER TABLE `stu` DISABLE KEYS */;
INSERT INTO `stu` VALUES (2,1,'goodbye','grace'),(7728,1,'1234','test5'),(8051,1,'1234','test4'),(8162,1,'1234','test3'),(12461,1,'1234','test2'),(25010,1,'1234','francisco');
/*!40000 ALTER TABLE `stu` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger new_student
after insert on stu
for each row
update uni
set num_s = num_s + 1
where uni.u_id = new.u_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger delete_student
after delete on stu
for each row
update uni
set num_s = num_s - 1
where uni.u_id = old.u_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `uni`
--

DROP TABLE IF EXISTS `uni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uni` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `num_s` int(11) DEFAULT '0',
  `s_a_id` int(11) NOT NULL,
  `description` char(255) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `name` char(30) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `s_a_id` (`s_a_id`),
  UNIQUE KEY `name` (`name`),
  CONSTRAINT `uni_ibfk_1` FOREIGN KEY (`s_a_id`) REFERENCES `s_admin` (`s_a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uni`
--

LOCK TABLES `uni` WRITE;
/*!40000 ALTER TABLE `uni` DISABLE KEYS */;
INSERT INTO `uni` VALUES (1,6,456,'This is the university of central florida',1,2.5,'ucf'),(8,0,1,'tripletroubletrouble',28.5968,-81.2219,'testhello'),(12,0,123,'buffalo buffalo buffalo',28.597,-81.2229,'bbwbbwbbw');
/*!40000 ALTER TABLE `uni` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-17 14:55:33
