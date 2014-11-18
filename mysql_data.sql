CREATE DATABASE  IF NOT EXISTS `wall` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wall`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: wall
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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  KEY `fk_comments_users1_idx` (`user_id`),
  CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,2,2,'comment 1','2014-11-17 13:11:54','2014-11-17 13:11:54'),(2,2,2,'comment 2','2014-11-17 13:12:02','2014-11-17 13:12:02'),(3,2,2,'comment 3','2014-11-17 13:12:05','2014-11-17 13:12:05'),(4,2,2,'Me too!','2014-11-17 14:52:51','2014-11-17 14:52:51'),(5,2,2,'Me too!','2014-11-17 14:54:56','2014-11-17 14:54:56'),(7,4,2,'Me too!','2014-11-17 15:05:33','2014-11-17 15:05:33'),(8,4,2,'I didnot know you liked to dance too?!','2014-11-17 15:07:17','2014-11-17 15:07:17'),(9,3,2,'That is a really boring post...  What is up with that?','2014-11-17 17:38:56','2014-11-17 17:38:56'),(10,6,2,'What?!','2014-11-17 17:56:13','2014-11-17 17:56:13'),(11,7,2,'Pleased to meet you katrina, my name is katrina as well!','2014-11-17 18:04:40','2014-11-17 18:04:40'),(12,6,13,'It is a fact!','2014-11-17 20:00:53','2014-11-17 20:00:53');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`user_id`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,2,'I love to code, dont you?','2014-11-17 12:41:19','2014-11-17 12:41:19'),(3,2,'Post a message','2014-11-17 14:37:19','2014-11-17 14:37:19'),(4,2,'Hello, I love to dance.  Yes sir I do!','2014-11-17 14:38:03','2014-11-17 14:38:03'),(5,2,'Is this really working?','2014-11-17 17:41:58','2014-11-17 17:41:58'),(6,2,'HEllo!','2014-11-17 17:54:42','2014-11-17 17:54:42'),(7,2,'hello, my name is katrina','2014-11-17 18:04:25','2014-11-17 18:04:25'),(8,13,'Hello!  I am new to this world, nice to meet you','2014-11-17 20:00:38','2014-11-17 20:00:38');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Katrina','','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Katrina','Sanford','katrina.sanford@hotmail.com','secret','2014-11-17 11:27:36','2014-11-17 11:27:36'),(6,'Joey','Urso','joey@live.com','d41d8cd98f00b204e9800998ecf8427e','2014-11-17 15:20:08','2014-11-17 15:20:08'),(7,'Joey','Urso','joeyU@live.com','d41d8cd98f00b204e9800998ecf8427e','2014-11-17 15:22:39','2014-11-17 15:22:39'),(8,'Meagan','Gulli','meagan@friend.com','d41d8cd98f00b204e9800998ecf8427e','2014-11-17 18:15:52','2014-11-17 18:15:52'),(9,'Meagan','Gulli','mmg@friend.com','d41d8cd98f00b204e9800998ecf8427e','2014-11-17 18:19:37','2014-11-17 18:19:37'),(10,'Meagan','Gulli','mmg@friend.com','d41d8cd98f00b204e9800998ecf8427e','2014-11-17 18:20:35','2014-11-17 18:20:35'),(11,'Timothy','Sanford','tss@school.edu','d41d8cd98f00b204e9800998ecf8427e','2014-11-17 18:21:01','2014-11-17 18:21:01'),(12,'Zachary','Sanford','zac@family.com','e7hXGfvrYuXWA','2014-11-17 18:48:40','2014-11-17 18:48:40'),(13,'Cindy','Ruster','cindy@me.com','1fUOjWklDreeU','2014-11-17 20:00:09','2014-11-17 20:00:09'),(14,'Stevie','Wonder','stevie@wonder.com','baJyGvzMWSid.','2014-11-17 21:24:32','2014-11-17 21:24:32'),(15,'Jonas','Brother','jonas@whale.com','','2014-11-17 21:31:04','2014-11-17 21:31:04'),(16,'Johny','Appleseed','johny@apple.com','','2014-11-17 21:48:19','2014-11-17 21:48:19');
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

-- Dump completed on 2014-11-17 23:26:32
