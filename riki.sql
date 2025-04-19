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

-- Dumping data for table rikisetiyopambudi_base.m_barang: ~1 rows (approximately)
REPLACE INTO `m_barang` (`id_barang`, `nama_barang`, `qty`, `harga_beli`, `harga_jual`) VALUES
	(1, 'Bola Voli', 14, 40000, 140000),
	(0, 'kevin suka tony', 50, 10, 11);

-- Dumping data for table rikisetiyopambudi_base.users: ~2 rows (approximately)
REPLACE INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'rikisetiyopambudi', '411222061@mahasiswa.undira.ac.id', '$2y$10$41VLqrOM/J6cwTzb46mGe.lohr67JnBKrmDl3LHNn8cJ6p1F8I1Ky', 'admin', '2025-03-15 01:33:09', '2025-03-15 08:47:55'),
	(2, 'riki', 'riki@gmail.com', '$2y$10$7AakCYe2Phd3YkZkr7LXc.UprAv1SYjP2qpckrPwAraRGzsj86xSu', 'user', '2025-03-15 01:41:43', '2025-03-15 01:41:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
