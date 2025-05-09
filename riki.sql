-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rikisetiyopambudi_base
DROP DATABASE IF EXISTS `rikisetiyopambudi_base`;
CREATE DATABASE IF NOT EXISTS `rikisetiyopambudi_base` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rikisetiyopambudi_base`;

-- Dumping structure for table rikisetiyopambudi_base.m_barang
DROP TABLE IF EXISTS `m_barang`;
CREATE TABLE IF NOT EXISTS `m_barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table rikisetiyopambudi_base.m_barang: ~1 rows (approximately)
INSERT INTO `m_barang` (`id_barang`, `nama_barang`, `qty`, `harga_beli`, `harga_jual`) VALUES
	(1, 'Bola Voli', 14, 40000, 140000),
	(0, 'kevin suka tony', 50, 10, 11);

-- Dumping structure for table rikisetiyopambudi_base.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','editor') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table rikisetiyopambudi_base.users: ~2 rows (approximately)
INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'rikisetiyopambudi', '411222061@mahasiswa.undira.ac.id', '$2y$10$41VLqrOM/J6cwTzb46mGe.lohr67JnBKrmDl3LHNn8cJ6p1F8I1Ky', 'admin', '2025-03-15 01:33:09', '2025-03-15 08:47:55'),
	(2, 'riki', 'riki@gmail.com', '$2y$10$7AakCYe2Phd3YkZkr7LXc.UprAv1SYjP2qpckrPwAraRGzsj86xSu', 'user', '2025-03-15 01:41:43', '2025-03-15 01:41:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
