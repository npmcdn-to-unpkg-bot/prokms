-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: ekms
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

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
-- Table structure for table `agenda_imunisasi`
--

DROP TABLE IF EXISTS `agenda_imunisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_imunisasi` (
  `id_agenda` int(5) NOT NULL,
  `id_balita` int(5) NOT NULL,
  `id_imunisasi` int(5) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `flag_realisasi` int(1) NOT NULL,
  `tanggal_realisasi` datetime DEFAULT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_imunisasi`
--

LOCK TABLES `agenda_imunisasi` WRITE;
/*!40000 ALTER TABLE `agenda_imunisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `agenda_imunisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balita`
--

DROP TABLE IF EXISTS `balita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balita` (
  `id_balita` int(5) NOT NULL,
  `id_ortu` int(5) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `kelamin` double NOT NULL,
  `berat_lahir` double NOT NULL,
  `tinggi_lahir` double NOT NULL,
  `catatan_khusus` varchar(500) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_balita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balita`
--

LOCK TABLES `balita` WRITE;
/*!40000 ALTER TABLE `balita` DISABLE KEYS */;
/*!40000 ALTER TABLE `balita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokter` (
  `id_dokter` int(4) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(50) NOT NULL,
  `id_user_dokter` int(4) NOT NULL,
  `alamat_dokter` varchar(100) NOT NULL,
  `no_hp_dokter` varchar(15) NOT NULL,
  `email_dokter` varchar(50) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imunisasi`
--

DROP TABLE IF EXISTS `imunisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imunisasi` (
  `id_imunisasi` int(5) NOT NULL,
  `nama_imunisasi` varchar(100) NOT NULL,
  `sifat_imunisasi` varchar(20) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_imunisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imunisasi`
--

LOCK TABLES `imunisasi` WRITE;
/*!40000 ALTER TABLE `imunisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `imunisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orang_tua`
--

DROP TABLE IF EXISTS `orang_tua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orang_tua` (
  `id_ortu` int(4) NOT NULL AUTO_INCREMENT,
  `nama_ortu` varchar(50) NOT NULL,
  `flag_ibu` tinyint(1) NOT NULL,
  `id_user` int(4) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_ortu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orang_tua`
--

LOCK TABLES `orang_tua` WRITE;
/*!40000 ALTER TABLE `orang_tua` DISABLE KEYS */;
/*!40000 ALTER TABLE `orang_tua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perkembangan`
--

DROP TABLE IF EXISTS `perkembangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perkembangan` (
  `id_perkembangan` int(5) NOT NULL,
  `id_balita` int(5) NOT NULL,
  `tanggal_ukur` datetime NOT NULL,
  `berat` double NOT NULL,
  `tinggi` double DEFAULT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_perkembangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perkembangan`
--

LOCK TABLES `perkembangan` WRITE;
/*!40000 ALTER TABLE `perkembangan` DISABLE KEYS */;
/*!40000 ALTER TABLE `perkembangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas_yandu`
--

DROP TABLE IF EXISTS `petugas_yandu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas_yandu` (
  `id_petugas` int(4) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(50) NOT NULL,
  `id_user_petugas` int(4) NOT NULL,
  `alamat_petugas` varchar(100) NOT NULL,
  `no_hp_petugas` varchar(15) NOT NULL,
  `email_petugas` varchar(50) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas_yandu`
--

LOCK TABLES `petugas_yandu` WRITE;
/*!40000 ALTER TABLE `petugas_yandu` DISABLE KEYS */;
/*!40000 ALTER TABLE `petugas_yandu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `credential` varchar(100) NOT NULL,
  `id_role` int(4) NOT NULL,
  `tgl_reg` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username_ui` (`username`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','7694f4a66316e53c8cdd9d9954bd611d',1,'2016-07-08 23:19:25','0000-00-00 00:00:00');
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

-- Dump completed on 2016-07-15 10:51:46
