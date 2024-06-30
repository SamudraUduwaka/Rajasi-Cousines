CREATE DATABASE  IF NOT EXISTS `rajasi` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rajasi`;
-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: rajasi
-- ------------------------------------------------------
-- Server version	8.0.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `email` varchar(150) NOT NULL,
  `verification` varchar(20) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('institutework456@gmail.com','61c3846bc8bef','Samudra','Uduwaka');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (28,4,'l@gmail.com',1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_img`
--

DROP TABLE IF EXISTS `cat_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_img` (
  `code` varchar(75) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_cat_img_category1_idx` (`category_id`),
  CONSTRAINT `fk_cat_img_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_img`
--

LOCK TABLES `cat_img` WRITE;
/*!40000 ALTER TABLE `cat_img` DISABLE KEYS */;
INSERT INTO `cat_img` VALUES ('catimgs//desserts.jpg',1),('catimgs//beverages.jpg',5),('catimgs//61841f754de58.jpg',9),('catimgs//61922b003b940.jpg',11);
/*!40000 ALTER TABLE `cat_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'desserts'),(2,'food'),(3,'packages'),(4,'family packs'),(5,'beverages'),(9,'junk foods'),(10,'an'),(11,'favourites');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user1_idx` (`from`),
  KEY `fk_chat_user2_idx` (`to`),
  KEY `fk_chat_status1_idx` (`status_id`),
  CONSTRAINT `fk_chat_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_chat_user1` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `fk_chat_user2` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'janaka@gmail.com','institutework456@gmail.com','hi','2021-11-13 13:37:16',1),(3,'janaka@gmail.com','institutework456@gmail.com','can I find the food I want?','2021-11-13 13:47:22',1),(6,'l@gmail.com','institutework456@gmail.com','hi','2021-11-14 16:18:56',1),(18,'institutework456@gmail.com','l@gmail.com','hi','2021-11-15 01:03:51',1),(19,'institutework456@gmail.com','janaka@gmail.com','hellow','2021-11-15 01:07:09',1),(20,'l@gmail.com','institutework456@gmail.com','then?','2021-11-15 01:07:31',1),(21,'institutework456@gmail.com','l@gmail.com','you can buy it','2021-11-15 07:10:15',1),(22,'institutework456@gmail.com','l@gmail.com','hi','2021-11-15 15:12:17',1),(23,'l@gmail.com','institutework456@gmail.com','Hi','2021-11-15 15:12:42',1);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Piliyandala'),(2,'Kadawatha');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'Colombo');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_img`
--

DROP TABLE IF EXISTS `emp_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp_img` (
  `code` varchar(75) NOT NULL,
  `employee_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_emp_img_employee1_idx` (`employee_id`),
  CONSTRAINT `fk_emp_img_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_img`
--

LOCK TABLES `emp_img` WRITE;
/*!40000 ALTER TABLE `emp_img` DISABLE KEYS */;
INSERT INTO `emp_img` VALUES ('6184159a29829.jpg',4);
/*!40000 ALTER TABLE `emp_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `register_date` datetime DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_gender1_idx` (`gender_id`),
  KEY `fk_employee_status1_idx` (`status_id`),
  CONSTRAINT `fk_employee_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_employee_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'thisaru','Manathunga','mana@gmail.com','0777563985',1,'2021-11-03 17:55:28',1),(2,'javinda','manathunga','mana@gmail.com','0777526325',1,'2021-11-03 17:55:32',2),(3,'ba','bo','babo@gmail.com','0756365269',1,'2021-11-03 17:55:35',2),(4,'daham','Perera','daham@gmail.com','0752223623',1,'2021-11-04 22:47:13',1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_has_address`
--

DROP TABLE IF EXISTS `employee_has_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `no` varchar(10) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `location_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_has_address_employee1_idx` (`employee_id`),
  KEY `fk_employee_has_address_location1_idx` (`location_id`),
  CONSTRAINT `fk_employee_has_address_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  CONSTRAINT `fk_employee_has_address_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_has_address`
--

LOCK TABLES `employee_has_address` WRITE;
/*!40000 ALTER TABLE `employee_has_address` DISABLE KEYS */;
INSERT INTO `employee_has_address` VALUES (1,1,'No 12','ja rd',2),(2,2,'No 12','para rd',2),(3,3,'no 44','sa rd',1),(4,4,'No 25','Kadawatha rd',2);
/*!40000 ALTER TABLE `employee_has_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feeback`
--

DROP TABLE IF EXISTS `feeback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feeback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `feed` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feeback_user1_idx` (`user_email`),
  KEY `fk_feeback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feeback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feeback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeback`
--

LOCK TABLES `feeback` WRITE;
/*!40000 ALTER TABLE `feeback` DISABLE KEYS */;
INSERT INTO `feeback` VALUES (1,'l@gmail.com',1,'Very tasty. Thank you','2021-11-11 20:40:11'),(2,'janaka@gmail.com',1,'Yumm....','2021-11-13 08:30:14'),(3,'janaka@gmail.com',1,'Very yummy noodles','2021-11-13 08:47:00'),(4,'janaka@gmail.com',1,'Tasty. Thank you','2021-11-13 08:47:53'),(5,'janaka@gmail.com',3,'Woww Yum. Fast delivery. Thank you','2021-11-13 21:01:43'),(7,'l@gmail.com',2,'Yum. Thank you','2021-11-15 14:52:47');
/*!40000 ALTER TABLE `feeback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female'),(3,'Other');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `code` varchar(75) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES ('productimgs//617c763018543.jpg',1),('productimgs//617c7630351d8.jpg',1),('productimgs//617c7630355a4.jpg',1),('productimgs//6190b93539ae5.jpg',2),('productimgs//6190b94db2e19.jpg',2),('productimgs//6190b96ae2043.jpg',2),('productimgs//618fd9e3eeedd.jpg',3),('productimgs//6190b74ccb7e5.jpg',3),('productimgs//6190b7a9e0484.jpg',3),('productimgs//61922ac921e54.jpg',4),('productimgs//61922ac92210d.jpg',4),('productimgs//61922ac922367.jpg',4);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (5,'618f462e5d45a',1,'janaka@gmail.com','2021-11-13 10:29:26',400,1),(6,'618fda11d4add',3,'janaka@gmail.com','2021-11-13 21:01:03',400,1),(7,'6190bac9ec0be',2,'janaka@gmail.com','2021-11-14 12:59:49',325,1),(8,'6190e8e46f217',3,'l@gmail.com','2021-11-14 16:15:56',400,1),(9,'6190e8e46f217',2,'l@gmail.com','2021-11-14 16:15:56',325,1),(10,'6190e91deff3c',2,'l@gmail.com','2021-11-14 16:17:23',325,1),(11,'61922724700f2',3,'l@gmail.com','2021-11-15 14:54:29',400,1),(12,'61922895b5a09',1,'l@gmail.com','2021-11-15 14:59:57',750,2),(13,'61922895b5a09',3,'l@gmail.com','2021-11-15 14:59:57',400,1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_id` int NOT NULL,
  `district_id` int NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location_province_idx` (`province_id`),
  KEY `fk_location_district1_idx` (`district_id`),
  KEY `fk_location_city1_idx` (`city_id`),
  CONSTRAINT `fk_location_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_location_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  CONSTRAINT `fk_location_province` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,1,1,1),(2,1,1,2);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `category_id` int NOT NULL,
  `status_id` int NOT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Noodles',350,3,'Chinese Noodles pack for a single person',2,1,50,100,'2021-10-30 04:01:11'),(2,'Fruit Salad',250,5,'Delicious fruit salads',1,1,75,150,'2021-10-30 13:47:23'),(3,'Mango Juice',350,4,'Delicious Mango juice .',5,1,50,100,'2021-11-13 20:59:39'),(4,'Pastha ',500,5,'Delicious food',2,1,50,100,'2021-11-15 15:09:20');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profileimg`
--

DROP TABLE IF EXISTS `profileimg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profileimg` (
  `code` varchar(75) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_profileimg_user1_idx` (`user_email`),
  CONSTRAINT `fk_profileimg_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profileimg`
--

LOCK TABLES `profileimg` WRITE;
/*!40000 ALTER TABLE `profileimg` DISABLE KEYS */;
INSERT INTO `profileimg` VALUES ('userimgs//6192263f19185.jpg','anuhasaki@gmail.com'),('userimgs//618f49729c68a.jpg','janaka@gmail.com'),('userimgs//6188854728819.jpg','l@gmail.com');
/*!40000 ALTER TABLE `profileimg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Western');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchase_product1_idx` (`product_id`),
  KEY `fk_purchase_user1_idx` (`user_email`),
  CONSTRAINT `fk_purchase_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_purchase_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `number` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,2),(2,0),(3,1),(4,1),(5,8);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recents`
--

DROP TABLE IF EXISTS `recents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recents_product1_idx` (`product_id`),
  KEY `fk_recents_user1_idx` (`user_email`),
  CONSTRAINT `fk_recents_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recents_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recents`
--

LOCK TABLES `recents` WRITE;
/*!40000 ALTER TABLE `recents` DISABLE KEYS */;
INSERT INTO `recents` VALUES (1,2,'l@gmail.com'),(2,1,'l@gmail.com'),(13,1,'janaka@gmail.com'),(14,2,'janaka@gmail.com'),(15,3,'l@gmail.com'),(16,2,'l@gmail.com'),(17,2,'l@gmail.com'),(18,2,'l@gmail.com'),(19,2,'l@gmail.com');
/*!40000 ALTER TABLE `recents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Active'),(2,'Inactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `status_id` int NOT NULL,
  `register_date` datetime DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender1_idx` (`gender_id`),
  KEY `fk_user_status1_idx` (`status_id`),
  CONSTRAINT `fk_user_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_user_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('anuhasaki@gmail.com','Samudra','Uduwaka','0776380882','Samudra',2,1,'2021-11-15 14:43:21'),('institutework456@gmail.com','admin','admin','0112565385','admin',3,1,'2021-11-12 12:25:04'),('janaka@gmail.com','janaka','priya','0755552221','janaka',1,2,'2021-10-29 21:38:47'),('l@gmail.com','lahiru','k','0712223336','lassana',1,1,'2021-10-29 22:01:03'),('p@gmail.com','p','k','0712223256','12345',1,1,'2021-11-02 20:08:03');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_address`
--

DROP TABLE IF EXISTS `user_has_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `no` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `location_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_address_location1_idx` (`location_id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  CONSTRAINT `fk_address_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_address`
--

LOCK TABLES `user_has_address` WRITE;
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` VALUES (1,'janaka@gmail.com','No 55','Madapatha',2),(2,'l@gmail.com','No 15','Makandana',2),(3,'anuhasaki@gmail.com','No 44','Madapatha',2);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wishlist_product1_idx` (`product_id`),
  KEY `fk_wishlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_wishlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_wishlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-29 15:09:42
