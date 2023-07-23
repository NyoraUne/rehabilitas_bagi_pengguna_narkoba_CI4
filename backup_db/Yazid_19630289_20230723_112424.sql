-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: Yazid_19630289
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_detail_pengguna`
--

DROP TABLE IF EXISTS `tb_detail_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_detail_pengguna` (
  `id_detail_pengguna` int NOT NULL AUTO_INCREMENT,
  `id_pengguna` int NOT NULL,
  `id_narkotika` int NOT NULL,
  `pasal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_detail_pengguna`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_narkotika` (`id_narkotika`),
  CONSTRAINT `tb_detail_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detail_pengguna_ibfk_2` FOREIGN KEY (`id_narkotika`) REFERENCES `tb_narkotika` (`id_narkotika`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detail_pengguna`
--

LOCK TABLES `tb_detail_pengguna` WRITE;
/*!40000 ALTER TABLE `tb_detail_pengguna` DISABLE KEYS */;
INSERT INTO `tb_detail_pengguna` VALUES (1,1,6,'UUD Pelarangan Penggunaan Narkotika Jenis Meth','2023-07-18 03:59:14'),(2,1,7,'UUD Pelarangan Penggunaan Narkotika Jenis Meth','2023-07-18 05:10:04');
/*!40000 ALTER TABLE `tb_detail_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `username` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `password` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `hak_akses` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_login`
--

LOCK TABLES `tb_login` WRITE;
/*!40000 ALTER TABLE `tb_login` DISABLE KEYS */;
INSERT INTO `tb_login` VALUES (1,'admin','0192023a7bbd73250516f069df18b500','1','2023-07-14 03:50:29'),(2,'admin2','0192023a7bbd73250516f069df18b500','2','2023-07-14 04:02:42');
/*!40000 ALTER TABLE `tb_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_narkotika`
--

DROP TABLE IF EXISTS `tb_narkotika`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_narkotika` (
  `id_narkotika` int NOT NULL AUTO_INCREMENT,
  `nama_narkotika` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_narkotika`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_narkotika`
--

LOCK TABLES `tb_narkotika` WRITE;
/*!40000 ALTER TABLE `tb_narkotika` DISABLE KEYS */;
INSERT INTO `tb_narkotika` VALUES (6,'Meth','Meth.jpg','Narkotika paling berbahaya dan paling populer di US.','2023-07-17 14:06:02'),(7,'Ganja','Ganja.jpg','Narkotika paling jos','2023-07-18 05:09:38');
/*!40000 ALTER TABLE `tb_narkotika` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengguna`
--

DROP TABLE IF EXISTS `tb_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `kd_penahanan` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengguna`
--

LOCK TABLES `tb_pengguna` WRITE;
/*!40000 ALTER TABLE `tb_pengguna` DISABLE KEYS */;
INSERT INTO `tb_pengguna` VALUES (1,'Penahanan-01',8,'2023-07-18 03:04:07');
/*!40000 ALTER TABLE `tb_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_petugas`
--

DROP TABLE IF EXISTS `tb_petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_petugas` (
  `id_petugas` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `role` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_petugas` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_petugas`
--

LOCK TABLES `tb_petugas` WRITE;
/*!40000 ALTER TABLE `tb_petugas` DISABLE KEYS */;
INSERT INTO `tb_petugas` VALUES (2,9,'Petugas','Foto-Petugas-9.jpg','2023-07-19 01:26:43');
/*!40000 ALTER TABLE `tb_petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rehab`
--

DROP TABLE IF EXISTS `tb_rehab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_rehab` (
  `id_rehab` int NOT NULL AUTO_INCREMENT,
  `id_pengguna` int NOT NULL,
  `tgl_rehab` date NOT NULL,
  `program_rehab` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_rehab`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tb_rehab_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rehab`
--

LOCK TABLES `tb_rehab` WRITE;
/*!40000 ALTER TABLE `tb_rehab` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_rehab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rekam_medis`
--

DROP TABLE IF EXISTS `tb_rekam_medis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_rekam_medis` (
  `id_rekam_medis` int NOT NULL AUTO_INCREMENT,
  `id_pengguna` int NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `hasil_pemeriksaan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_rekam_medis`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tb_rekam_medis_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rekam_medis`
--

LOCK TABLES `tb_rekam_medis` WRITE;
/*!40000 ALTER TABLE `tb_rekam_medis` DISABLE KEYS */;
INSERT INTO `tb_rekam_medis` VALUES (1,1,'2023-07-19','ada beberapa kemajuan dari pemeriksaan','2023-07-19 02:05:06');
/*!40000 ALTER TABLE `tb_rekam_medis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nik_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `nama_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `lahir_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `tgllahir_user` date DEFAULT NULL,
  `jekel_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `alamat_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `desa_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `kecamatan_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `kabupaten_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `rt_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `rw_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `agama_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `kawin_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `pekerjaan_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `ktp_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT '',
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nik_user` (`nik_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (8,'3525011711086058','Widya Ilham Sikyt','banjarbaru','1992-12-12','Laki-laki','Jl Batu Malang','Batu','Malang','Malang','3','2','Islam','belum_menikah','Programer','3525011711086058_widya-ilham.pdf','3525011711086058_widya-ilham-sikyt','2023-07-17 12:37:33'),(9,'3326160902090003','Ratna Alki','banjarbaru','1992-02-11','Perempuan','Jl Batu Malang','Batu','landasan ulin','Malang','3','2','Islam','belum_menikah','Programer','3326160902090003_ratna-alki.pdf','3326160902090003_ratna-alki','2023-07-18 04:08:27');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-23 11:24:24
