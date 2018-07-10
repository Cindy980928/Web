-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: departmentinfo
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `id` varchar(48) NOT NULL DEFAULT '',
  `password` varchar(48) DEFAULT NULL,
  `name` varchar(96) DEFAULT NULL,
  `maxNum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES ('123456','123456','大鹏',5);
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` varchar(48) NOT NULL DEFAULT '',
  `password` varchar(48) DEFAULT NULL,
  `name` varchar(48) DEFAULT NULL,
  `sex` varchar(12) DEFAULT NULL,
  `major` varchar(96) DEFAULT NULL,
  `classId` varchar(96) DEFAULT NULL,
  `phone` varchar(48) DEFAULT NULL,
  `state` varchar(48) DEFAULT NULL,
  `tutorId` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('2015210405001','123456','武松','男','计算机','计算机133','13588224852','待定','20142104056'),('2015210405002','123456','宋江','男','计算机','计算机133','13588224852','未选',NULL),('2015210405003','123456','晁盖','男','计算机','计算机133','13588224852','未选',NULL),('2015210405004','123456','李逵','男','计算机','计算机133','13588224852','未选',NULL),('2015210405005','123456','江青','男','计算机','计算机133','13588224852','未选',NULL),('2015210405012','123456','刘备','男','软件工程','软件工程133','13588664572','选定','20142104061'),('2015210405013','123456','大鹏','男','软件工程','软件工程133','13588664572','待定',NULL),('2015210405014','123456','张飞','男','软件工程','软件工程133','13588664572','选定','20142104056'),('2015210405015','123456','高渐离','男','软件工程','软件工程133','13588664572','未选',NULL),('2015210405016','123456','关羽','男','体育','体教133','13588664572','选定','20142104056'),('2015210405017','123456','李白','男','体育','体教133','13588664572','选定','20142104056'),('2015210405018','123456','牛魔','男','体育','体教133','13588664572','待定','20142104066'),('2015210405019','123456','齐天大圣','男','体育','体教133','13588664572','选定','20142104056'),('2015210405020','123456','扁鹊','男','计算机','计算机133','13588664572','选定','20142104056');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` varchar(48) NOT NULL DEFAULT '',
  `password` varchar(48) DEFAULT NULL,
  `name` varchar(48) DEFAULT NULL,
  `sex` varchar(12) DEFAULT NULL,
  `position` varchar(96) DEFAULT NULL,
  `direction` varchar(96) DEFAULT NULL,
  `phone` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('20142104056','123456','张三','男','教授','软件工程','13588225248'),('20142104057','123456','赵四','男','副教授','软件工程','13588225248'),('20142104058','123456','王五','男','教授','物联网','13588225248'),('20142104059','123456','李六','男','副教授','计算机','13588225248'),('20142104060','123456','吕布','男','教授','计算机','13588225248'),('20142104061','123456','卡卡西','男','院长','物联网','13588225248'),('20142104062','123456','鸣人','男','教授','计算机','13588225248'),('20142104063','123456','鼬','男','教授','物联网','13588225248'),('20142104064','123456','孙尚香','女','副院长','软件工程','13588225248'),('20142104065','123456','二营长','男','教授','小学教育','13588225248'),('20142104066','123456','楚云飞','男','教授','体育','13588225248'),('20142104067','123456','甲1','男','教授','软件工程','13588225248'),('20142104068','123456','甲2','男','教授','计算机','13588225248'),('20142104069','123456','甲3','男','教授','计算机','13588225248'),('20142104071','123456','甲5','男','教授','计算机','13588225248'),('20142104072','123456','甲6','男','教授','计算机','13588225248'),('20142104073','123456','甲7','男','教授','计算机','13588225248'),('20142104074','123456','甲8','男','教授','计算机','13588225248'),('20142104075','123456','甲9','男','教授','计算机','13588225248');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-16 11:07:22
