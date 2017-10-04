-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: us-cdbr-iron-east-05.cleardb.net    Database: heroku_1322007c2edde3e
-- ------------------------------------------------------
-- Server version	5.6.36-log

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `nation` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `number` varchar(45) NOT NULL,
  `complement` varchar(10) DEFAULT NULL,
  `latitude` float(10,7) DEFAULT NULL,
  `longitude` float(10,7) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `name_picture` varchar(255) DEFAULT NULL,
  `address_picture` varchar(255) DEFAULT NULL,
  `user_professional` tinyint(1) NOT NULL,
  `password` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Neon Dotta','22222222222',90550002,'Brasil','RS','Porto Alegre','Benjamim Constant','1111','',-30.0162868,-51.1535683,'neon@neon.com','user_man.png','https://procureservicos.herokuapp.com/public/images/',1,202),(2,'Tamara','23232123412',91360000,'Brasil','RS','Porto Alegre','Avenida Do Forte','697','',-30.0113792,-51.1937218,'tamara@tamara.com',NULL,NULL,1,202),(3,'Matheus','12121212121',91750740,'Brasil','RS','Porto Alegre','Romeu Samarani Ferreira','265','',-30.1275501,-51.2082291,'matheus@matheus.com',NULL,NULL,1,202),(4,'Deni','12211245643',92200300,'Brasil','RS','Porto Alegre','Rua Primavera','2109','',-29.9635429,-51.1885872,'deni@deni.com',NULL,NULL,0,202),(11,'Procure Servicos','98479849849',987498798,'Brasil','RS','Porto Alegre','Rua teste','222','',NULL,NULL,'teste@mail.com','4+000039fu.jpg','https://procureservicos.herokuapp.com/public/images/',0,81),(21,'Ícaro','12981092810',2147483647,'Brazil','RS','Porto Alegre','João Alfredo','235','não',NULL,NULL,'icaro.mh@gmail.com','4+00003920229829_1951950831497820_5341030778329945475_o.jpg','https://procureservicos.herokuapp.com/public/images/',0,0),(261,'mail','12324213214',1514213125,'Brasil','RS','Porto Alegre','Lalalala','23','',NULL,NULL,'mail@mail.com','2+000040','https://stagingprocureservicos.herokuapp.com/public/images/',0,25),(281,'bb','99832749837',2147483647,'Brasil','RS','Porto Alegre','Coronel Genuíno','69','',NULL,NULL,'bb@mail.com','2+000040fuu.jpg','https://stagingprocureservicos.herokuapp.com/public/images/',0,25),(291,'aah','84756454020',91360000,'Brasil','RS','Porto Alegre','Avenida Do Forte','123','',NULL,NULL,'aah@mail.com','3+000040','https://stagingprocureservicos.herokuapp.com/public/images/',0,25),(301,'José Louro','67180539457',91360000,'Brasil','RS','Porto Alegre','Coronel Genuíno','123','',NULL,NULL,'lorojose@mail.com','3+000040fuu.jpg','https://procureservicos.herokuapp.com/public/images/',0,25);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-04 20:37:42
