-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: kurugida
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `k_categories`
--

DROP TABLE IF EXISTS `k_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_categories`
--

LOCK TABLES `k_categories` WRITE;
/*!40000 ALTER TABLE `k_categories` DISABLE KEYS */;
INSERT INTO `k_categories` VALUES (1,'Kuru Meyve'),(2,'Kuru Sebze');
/*!40000 ALTER TABLE `k_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_comments`
--

DROP TABLE IF EXISTS `k_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_comments`
--

LOCK TABLES `k_comments` WRITE;
/*!40000 ALTER TABLE `k_comments` DISABLE KEYS */;
INSERT INTO `k_comments` VALUES (1,1,'H├╝seyin ├çelebi','G├╝zel','2022-04-10'),(2,1,'Ozan ├çelebi','─░yi','2022-04-10');
/*!40000 ALTER TABLE `k_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_products`
--

DROP TABLE IF EXISTS `k_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_products`
--

LOCK TABLES `k_products` WRITE;
/*!40000 ALTER TABLE `k_products` DISABLE KEYS */;
INSERT INTO `k_products` VALUES (1,1,'Kuru Kay─▒s─▒','Kuru Kay─▒s─▒',85,'1649608611.jpg'),(2,1,'Kuru ├£z├╝m','Kuru ├£z├╝m',100,'1649608718.jpg'),(3,1,'Kurutulmu┼ş Yabanmersini','Kurutulmu┼ş Yabanmersini',150,'1649608769.jpg'),(4,1,'Kuru Erik','Kuru Erik',60,'1649608808.jpg'),(5,1,'Kuru Dut','Kuru Dut',160,'1649608906.jpg'),(6,1,'Kuru Elma','Kuru Elma',200,'1649608954.jpg'),(7,1,'Kuru Hurma','Kuru Hurma',400,'1649609029.jpg'),(8,1,'Kuru ├çilek','Kuru ├çilek',260,'1649609073.jpg'),(9,1,'Kuru Portakal','Kuru Portakal',240,'1649609123.jpg'),(10,1,'Kuru Limon','Kuru Limon',280,'1649609200.jpg'),(11,1,'Kuru Mango','Kuru Mango',290,'1649609243.jpg'),(12,2,'Kuru Domates','Kuru Domates',100,'1649609336.jpg'),(13,2,'Kuru Kabak','Kuru Kabak',180,'1649609374.jpg'),(14,2,'Kuru Patl─▒can','Kuru Patl─▒can',200,'1649609405.jpg'),(15,2,'Kuru Biber','Kuru Biber',400,'1649609470.jpg'),(16,2,'Kuru Sebze Kar─▒┼ş─▒m─▒','Kuru Sebze Kar─▒┼ş─▒m─▒',800,'1649609556.jpg'),(17,2,'Kuru Bamya','Kuru Bamya',420,'1649609618.jpg'),(18,2,'Kuru Nane','Kuru Nane',490,'1649609698.jpg');
/*!40000 ALTER TABLE `k_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_purchases`
--

DROP TABLE IF EXISTS `k_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_purchases`
--

LOCK TABLES `k_purchases` WRITE;
/*!40000 ALTER TABLE `k_purchases` DISABLE KEYS */;
INSERT INTO `k_purchases` VALUES (1,'H├╝seyin ├çelebi','hgcelebi@icloud.com',1),(2,'H├╝seyin ├çelebi','hgcelebi@icloud.com',1),(3,'H├╝seyin G├Ârkem ├çelebi','hgcelebi@icloud.com',1);
/*!40000 ALTER TABLE `k_purchases` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-11  8:46:32
