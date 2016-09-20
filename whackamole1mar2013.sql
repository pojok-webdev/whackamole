-- MySQL dump 10.13  Distrib 5.1.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: whackamole
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `item_text` varchar(1) DEFAULT NULL,
  `content` text,
  `is_answer` varchar(1) DEFAULT '0',
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,1,'a','Basuki Rahmat 83','0','puji','2013-02-26 04:01:12'),(2,1,'b','Basuki Rahmat 88','0','puji','2013-02-26 04:01:12'),(3,1,'c','Mayjen Sungkono 83','1','puji','2013-02-26 04:01:12'),(4,1,'d','Mayjen Sungkono 88','0','puji','2013-02-26 04:01:12'),(5,2,'a','ISP','1','puji','2013-02-26 04:01:12'),(6,2,'b','Warnet','0','puji','2013-02-26 04:01:12'),(7,2,'c','Software House','0','puji','2013-02-26 04:01:12'),(8,2,'d','Production House','0','puji','2013-02-26 04:01:12'),(9,3,'a','Corporate dan Business','0','puji','2013-02-26 04:01:12'),(10,3,'b','Corporate dan Personal','1','puji','2013-02-26 04:01:12'),(11,3,'c','Personal dan Business','0','puji','2013-02-26 04:01:12'),(12,3,'d','Semua Benar','0','puji','2013-02-26 04:01:12'),(13,4,'a','Line Telepon','0','puji','2013-02-26 04:01:12'),(14,4,'b','Fiber Optik','0','puji','2013-02-26 04:01:12'),(15,4,'c','Wireless','0','puji','2013-02-26 04:01:12'),(16,4,'d','USB Modem','1','puji','2013-02-26 04:01:12'),(17,5,'a','ADSL','0','puji','2013-02-26 04:01:12'),(18,5,'b','Community','0','puji','2013-02-26 04:01:12'),(19,5,'c','Business','0','puji','2013-02-26 04:01:12'),(20,5,'d','Enterprise','1','puji','2013-02-26 04:01:12'),(21,6,'a','Surabaya, Sidoarjo, Pasuruan','0','puji','2013-02-26 04:01:12'),(22,6,'b','Surabaya, Malang, Jakarta','1','puji','2013-02-26 04:01:12'),(23,6,'c','Surabaya, Batam, Purwokerto','0','puji','2013-02-26 04:01:12'),(24,6,'d','Surabaya, Jakarta, Semarang','0','puji','2013-02-26 04:01:12'),(25,7,'a','12','0','puji','2013-02-26 04:01:12'),(26,7,'b','14','0','puji','2013-02-26 04:01:12'),(27,7,'c','16','0','puji','2013-02-26 04:01:12'),(28,7,'d','18','1','puji','2013-02-26 04:01:12'),(29,8,'a','www.padi.com','0','puji','2013-02-26 04:01:12'),(30,8,'b','www.padi.net','0','puji','2013-02-26 04:01:12'),(31,8,'c','www.padi.co.id','0','puji','2013-02-26 04:01:12'),(32,8,'d','www.padi.net.id','1','puji','2013-02-26 04:01:12'),(33,9,'a','5','0','puji','2013-02-26 04:01:12'),(34,9,'b','3','1','puji','2013-02-26 04:01:12'),(35,9,'c','7','0','puji','2013-02-26 04:01:12'),(36,9,'d','4','0','puji','2013-02-26 04:01:12'),(37,10,'a','5','0','puji','2013-02-26 04:01:12'),(38,10,'b','3','0','puji','2013-02-26 04:01:12'),(39,10,'c','7','0','puji','2013-02-26 04:01:12'),(40,10,'d','4','1','puji','2013-02-26 04:01:12'),(41,11,'a','IPTV','0','puji','2013-02-26 04:01:12'),(42,11,'b','IPBX','0','puji','2013-02-26 04:01:12'),(43,11,'c','IP Public','1','puji','2013-02-26 04:01:12'),(44,11,'d','IP Camera','0','puji','2013-02-26 04:01:12'),(45,12,'a','merah dan kuning','0','puji','2013-02-26 04:01:12'),(46,12,'b','kuning dan hitam','1','puji','2013-02-26 04:01:12'),(47,12,'c','hijau dan kuning','0','puji','2013-02-26 04:01:12'),(48,12,'d','kuning dan biru','0','puji','2013-02-26 04:01:12'),(49,13,'a','Saphire','0','puji','2013-02-26 04:01:12'),(50,13,'b','Emerald','0','puji','2013-02-26 04:01:12'),(51,13,'c','Ruby','0','puji','2013-02-26 04:01:12'),(52,13,'d','Semua benar','1','puji','2013-02-26 04:01:12'),(53,14,'a','1','0','puji','2013-02-26 04:01:12'),(54,14,'b','2','0','puji','2013-02-26 04:01:12'),(55,14,'c','3','1','puji','2013-02-26 04:01:12'),(56,14,'d','5','0','puji','2013-02-26 04:01:12'),(57,15,'a','1','0','puji','2013-02-26 04:01:12'),(58,15,'b','2','0','puji','2013-02-26 04:01:12'),(59,15,'c','3','0','puji','2013-02-26 04:01:12'),(60,15,'d','5','1','puji','2013-02-26 04:01:12'),(61,16,'a','1:1','0','puji','2013-02-26 04:01:12'),(62,16,'b','1:5','0','puji','2013-02-26 04:01:12'),(63,16,'c','1:10','1','puji','2013-02-26 04:01:12'),(64,16,'d','1:20','0','puji','2013-02-26 04:01:12'),(65,17,'a','1:1','0','puji','2013-02-26 04:01:12'),(66,17,'b','1:5','1','puji','2013-02-26 04:01:12'),(67,17,'c','1:10','0','puji','2013-02-26 04:01:12'),(68,17,'d','1:20','0','puji','2013-02-26 04:01:12'),(69,18,'a','Padi Community','1','puji','2013-02-26 04:01:12'),(70,18,'b','Padi Enterprise','0','puji','2013-02-26 04:01:12'),(71,18,'c','Padi Business','0','puji','2013-02-26 04:01:12'),(72,18,'d','Padi Game','0','puji','2013-02-26 04:01:12'),(73,19,'a','2000','0','puji','2013-02-26 04:01:12'),(74,19,'b','2002','1','puji','2013-02-26 04:01:12'),(75,19,'c','2004','0','puji','2013-02-26 04:01:12'),(76,19,'d','2006','0','puji','2013-02-26 04:01:12'),(77,20,'a','Jakarta','0','puji','2013-02-26 04:01:12'),(78,20,'b','Surabaya','1','puji','2013-02-26 04:01:12'),(79,20,'c','Malang','0','puji','2013-02-26 04:01:12'),(80,20,'d','Denpasar','0','puji','2013-02-26 04:01:12'),(81,21,'a','031 5616330','1',NULL,'2013-02-26 07:05:23'),(82,21,'b','031 5666330','0',NULL,'2013-02-26 07:05:23'),(83,21,'c','031 5666300','0',NULL,'2013-02-26 07:05:23'),(84,21,'d','031 5616304','0',NULL,'2013-02-26 07:05:23'),(85,22,'a','7','0',NULL,'2013-02-26 07:05:23'),(86,22,'b','5','0',NULL,'2013-02-26 07:05:23'),(87,22,'c','6','1',NULL,'2013-02-26 07:05:23'),(88,22,'d','4','0',NULL,'2013-02-26 07:05:23'),(89,23,'a','256Kbps','0',NULL,'2013-02-26 07:05:23'),(90,23,'b','512Kbps','1',NULL,'2013-02-26 07:05:23'),(91,23,'c','1Mbps','0',NULL,'2013-02-26 07:05:23'),(92,23,'d','2Mbps','0',NULL,'2013-02-26 07:05:23'),(93,24,'a','2Mbps','0',NULL,'2013-02-26 07:05:23'),(94,24,'b','3Mbps','0',NULL,'2013-02-26 07:05:23'),(95,24,'c','4Mbps','1',NULL,'2013-02-26 07:05:23'),(96,24,'d','8Mbps','0',NULL,'2013-02-26 07:05:23'),(97,25,'a','25Mb blog hosting','0',NULL,'2013-02-26 07:05:23'),(98,25,'b','3 email acc @ 10Mb','1',NULL,'2013-02-26 07:05:23'),(99,25,'c','IP public','0',NULL,'2013-02-26 07:05:23'),(100,25,'d','5 email acc @ 10Mb','0',NULL,'2013-02-26 07:05:23'),(101,26,'a','padi@padi.net.id','0',NULL,'2013-02-26 07:05:23'),(102,26,'b','smartvalue@padi.net.id','0',NULL,'2013-02-26 07:05:23'),(103,26,'c','info@padi.net.id','1',NULL,'2013-02-26 07:05:23'),(104,26,'d','info@padinet.net.id','0',NULL,'2013-02-26 07:05:23'),(105,27,'a','wireless','1',NULL,'2013-02-26 07:24:46'),(106,27,'b','fiber optik','0',NULL,'2013-02-26 07:24:46'),(107,27,'c','satelit/vsat','0',NULL,'2013-02-26 07:24:46'),(108,27,'d','line telepon','0',NULL,'2013-02-26 07:24:46'),(109,28,'a','dedicated','0',NULL,'2013-02-26 07:24:46'),(110,28,'b','mixed','0',NULL,'2013-02-26 07:24:46'),(111,28,'c','salah semua','0',NULL,'2013-02-26 07:24:46'),(112,28,'d','shared','1',NULL,'2013-02-26 07:24:46'),(113,29,'a','500.000','0',NULL,'2013-02-26 07:24:46'),(114,29,'b','750.000','1',NULL,'2013-02-26 07:24:46'),(115,29,'c','1.000.000','0',NULL,'2013-02-26 07:24:46'),(116,29,'d','1.500.000','0',NULL,'2013-02-26 07:24:46'),(117,30,'a','Business','0',NULL,'2013-02-26 07:24:46'),(118,30,'b','Enterprise','0',NULL,'2013-02-26 07:24:46'),(119,30,'c','Community','1',NULL,'2013-02-26 07:24:46'),(120,30,'d','Game','0',NULL,'2013-02-26 07:24:46'),(121,31,'a','Beli','0',NULL,'2013-02-26 07:24:46'),(122,31,'b','Dipinjamkan','1',NULL,'2013-02-26 07:24:46'),(123,31,'c','Sewa','0',NULL,'2013-02-26 07:24:46'),(124,31,'d','Sewa beli','0',NULL,'2013-02-26 07:24:46'),(125,32,'a','Cashback 250.000','1',NULL,'2013-02-26 07:24:46'),(126,32,'b','Cashback 500.000','0',NULL,'2013-02-26 07:24:46'),(127,32,'c','free deposit','0',NULL,'2013-02-26 07:24:46'),(128,32,'d','free instalasi','0',NULL,'2013-02-26 07:24:46'),(129,33,'a','Antena','0',NULL,'2013-02-26 07:24:46'),(130,33,'b','Kabel','0',NULL,'2013-02-26 07:24:46'),(131,33,'c','Adaptor','0',NULL,'2013-02-26 07:24:46'),(132,33,'d','UPS','1',NULL,'2013-02-26 07:24:46'),(133,34,'a','Subdomain','0',NULL,'2013-02-26 07:24:46'),(134,34,'b','Parked Domain','0',NULL,'2013-02-26 07:24:46'),(135,34,'c','Addon Domain','0',NULL,'2013-02-26 07:24:46'),(136,34,'d','my domain','1',NULL,'2013-02-26 07:24:46'),(137,35,'a','KTP Penanggung Jawab','0',NULL,'2013-02-26 07:24:46'),(138,35,'b','SIUP/TDP','0',NULL,'2013-02-26 07:24:46'),(139,35,'c','Surat Ijin Usaha Telekomunikasi','0',NULL,'2013-02-26 07:24:46'),(140,35,'d','NPWP','1',NULL,'2013-02-26 07:24:46');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(100) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('c0c21b2f730a9fd4f6da2b1e090c7439','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:15.0) Gec',1362111382,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plays`
--

DROP TABLE IF EXISTS `plays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` varchar(1) DEFAULT NULL,
  `is_true` varchar(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plays`
--

LOCK TABLES `plays` WRITE;
/*!40000 ALTER TABLE `plays` DISABLE KEYS */;
INSERT INTO `plays` VALUES (1,1,'1','1',1,'2013-02-27 09:40:13'),(2,1,'1','1',1,'2013-02-28 04:05:11'),(3,1,'1','1',1,'2013-02-28 04:05:35'),(4,1,'1','1',1,'2013-02-28 04:05:56'),(5,1,'1','1',1,'2013-02-28 08:49:26'),(6,1,'1','1',1,'2013-03-01 03:27:55'),(7,2,'1','1',1,'2013-03-01 03:29:14'),(8,2,'2','2',2,'2013-03-01 03:30:16'),(9,2,'2','2',2,'2013-03-01 03:34:42'),(10,3,'2','2',2,'2013-03-01 03:41:15'),(11,3,'2','2',2,'2013-03-01 03:42:10'),(12,4,'2','2',2,'2013-03-01 03:42:33'),(13,4,'2','2',2,'2013-03-01 03:47:43'),(14,0,'2','2',2,'2013-03-01 03:49:26'),(15,0,'2','2',2,'2013-03-01 03:49:44'),(16,10,'2','2',2,'2013-03-01 03:58:09'),(17,19,'4','2',2,'2013-03-01 04:10:17'),(18,13,'4','2',2,'2013-03-01 04:19:41');
/*!40000 ALTER TABLE `plays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'Dimanakah alamat padinet?','puji','2013-02-26 03:54:34'),(2,1,'Padinet bergerak dibidang?','puji','2013-02-26 03:54:34'),(3,1,'Manakah yang merupakan produk web package dari padinet?','puji','2013-02-26 03:54:34'),(4,1,'Manakah yang bukan media layanan PadiNET untuk pelanggan?','puji','2013-02-26 03:54:34'),(5,1,'Manakah dibawah ini yang tidak termasuk layanan sharing PadiNET?','puji','2013-02-26 03:54:34'),(6,1,'Kantor PadiNET terdapat dikota mana saja?','puji','2013-02-26 03:54:34'),(7,1,'Ada berapa bulir padi di logo PadiNET?','puji','2013-02-26 03:54:34'),(8,1,'Alamat website PadiNET?','puji','2013-02-26 03:54:34'),(9,1,'Ada berapa macam jenis layanan kategori community?','puji','2013-02-26 03:54:34'),(10,1,'Ada berapa macam jenis layanan kategori business?','puji','2013-02-26 03:54:34'),(11,1,'Manakah dibawah yang tidak termasuk produk layanan PadiNET?','puji','2013-02-26 03:54:34'),(12,1,'Warna apakah yang menjadi Branding color dari PadiNET?','puji','2013-02-26 03:54:34'),(13,1,'Manakah yang termasuk layanan padi business?','puji','2013-02-26 03:54:34'),(14,1,'Berapa jumlah email yang didapat apabila berlangganan padi community?','puji','2013-02-26 03:54:34'),(15,1,'Berapa jumlah email yang didapat apabila berlangganan padi business?','puji','2013-02-26 03:54:34'),(16,1,'Berapakah rasio pelanggan untuk layanan padi community?','puji','2013-02-26 03:54:34'),(17,1,'Berapakah rasio pelanggan untuk layanan padi business?','puji','2013-02-26 03:54:34'),(18,1,'Diantara layanan dibawah ini, layanan manakah yang tidak mendapatkan IP Public?','puji','2013-02-26 03:54:34'),(19,1,'Padinet berdiri sejak tahun?','puji','2013-02-26 03:54:34'),(20,1,'Dimanakah kantor pusat padinet berada?','puji','2013-02-26 03:54:34'),(21,1,'Nomor telepon sales PadiNet Surabaya','puji','2013-02-26 06:46:32'),(22,1,'Jumlah varian produk smart value','puji','2013-02-26 06:46:32'),(23,1,'Kapasitas layanan terkecil smart value','puji','2013-02-26 06:47:14'),(24,1,'Kapasitas terbesar layanan smart value','puji','2013-02-26 06:47:14'),(25,1,'Manakah yang benar dari fitur layanan smart value','puji','2013-02-26 06:47:14'),(26,1,'Alamat email untuk mendapatkan informasi layanan PadiNet','puji','2013-02-26 06:47:14'),(27,2,'Media yang digunakan','puji','2013-02-26 07:13:07'),(28,2,'Termasuk tipe apa layanan smart value','puji','2013-02-26 07:13:07'),(29,2,'Besar deposit layanan smart value 2Mbps','puji','2013-02-26 07:13:07'),(30,2,'Layanan smart value sebelumnya bernama paket','puji','2013-02-26 07:13:07'),(31,2,'Status perangkat layanan smart value','puji','2013-02-26 07:13:07'),(32,2,'Promo smart value selama pameran ini','puji','2013-02-26 07:13:07'),(33,2,'Perangkat yang digunakan untuk layanan smart value, kecuali','puji','2013-02-26 07:13:07'),(34,2,'Yang bukan merupakan fitur layanan hosting','puji','2013-02-26 07:13:07'),(35,2,'Syarat pendaftaran domain net.id, kecuali','puji','2013-02-26 07:13:07');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(60) DEFAULT NULL,
  `service` varchar(40) DEFAULT NULL,
  `detil` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` VALUES (1,'Jojon',NULL,'jl kertajaya indah timur',NULL,'5345435','padi net',NULL,NULL,'2013-02-27 02:37:40'),(2,'puji',NULL,'jl kertajaya indah timur',NULL,'5345435','PT Merdeka','','Serabutan Programmer\n@ PT Padi Internet','2013-02-27 06:44:25'),(3,'didi',NULL,'jl legundi 785834',NULL,'789243','padi net','internet gratis',NULL,'2013-02-27 07:15:22'),(4,'puji',NULL,'Jl. Mayjend Sungkono No. 83, Surabaya',NULL,'5345435','PT Merdeka','','aseli','2013-02-27 09:18:06'),(5,'acong',NULL,'jl kertajaya indah timur',NULL,'543534','PT xxx','internet gratis',NULL,'2013-02-28 03:40:25'),(6,'gundala',NULL,'jl kertajaya indah timur',NULL,'5345435','PT Merdeka','internet gratis',NULL,'2013-02-28 09:10:14'),(7,'cucut',NULL,'Jl Kendang sari 12',NULL,'534654','PT Dua Dunia','internet gratis',NULL,'2013-03-01 03:09:41'),(8,'amir',NULL,'Jl Kendang sari 12',NULL,'890534','padi net','internet gratis',NULL,'2013-03-01 03:26:33');
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-01 13:16:13
