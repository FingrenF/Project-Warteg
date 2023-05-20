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


-- Dumping database structure for warteg
CREATE DATABASE IF NOT EXISTS `warteg` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `warteg`;

-- Dumping structure for table warteg.bahan
CREATE TABLE IF NOT EXISTS `bahan` (
  `nama_bahan` varchar(50) NOT NULL DEFAULT '',
  `stok` int NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nama_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.bahan: ~7 rows (approximately)
INSERT INTO `bahan` (`nama_bahan`, `stok`, `satuan`) VALUES
	('Ayam', 10, 'kg'),
	('Beras', 35, 'Kg'),
	('Bunga Kol', 5, 'Biji'),
	('Cabai', 7, 'Kg'),
	('Kentang', 3, 'Kg'),
	('Tahu', 15, 'Butir'),
	('Telur', 10, 'Kg'),
	('Tempe', 4, 'Batang');

-- Dumping structure for table warteg.bahan_baku
CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `no_barang` int NOT NULL DEFAULT '0',
  `nama_bahan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jumlah` int NOT NULL,
  `harga_bahan` int NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`no_barang`),
  KEY `FK_BB` (`nama_bahan`),
  CONSTRAINT `FK_BB` FOREIGN KEY (`nama_bahan`) REFERENCES `bahan` (`nama_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.bahan_baku: ~9 rows (approximately)
INSERT INTO `bahan_baku` (`no_barang`, `nama_bahan`, `jumlah`, `harga_bahan`, `tanggal`) VALUES
	(1, 'Bunga Kol', 4, 12000, '2023-05-08'),
	(2, 'Cabai', 2, 40000, '2023-05-08'),
	(3, 'Kentang', 3, 30000, '2023-05-08'),
	(4, 'Telur', 5, 135000, '2023-05-08'),
	(5, 'Tempe', 4, 48000, '2023-05-08'),
	(6, 'Bunga Kol', 1, 3000, '2023-05-12'),
	(7, 'Beras', 20, 250000, '2023-05-18'),
	(8, 'Cabai', 5, 100000, '2023-05-18'),
	(9, 'Telur', 5, 135000, '2023-05-18');

-- Dumping structure for table warteg.daftar_pesanan
CREATE TABLE IF NOT EXISTS `daftar_pesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pesanan` int NOT NULL,
  `menu_id` int NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.daftar_pesanan: ~9 rows (approximately)
INSERT INTO `daftar_pesanan` (`id`, `id_pesanan`, `menu_id`, `jumlah`) VALUES
	(1, 1, 1, 1),
	(2, 1, 4, 1),
	(3, 1, 11, 1),
	(4, 1, 8, 1),
	(5, 3, 1, 1),
	(6, 4, 11, 1),
	(7, 5, 1, 3),
	(8, 5, 8, 1),
	(9, 6, 4, 2),
	(10, 7, 16, 2),
	(11, 8, 4, 2),
	(12, 9, 1, 2),
	(13, 9, 9, 1);

-- Dumping structure for table warteg.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` text NOT NULL,
  `waktu_pembuatan_kategori` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategori_id`),
  FULLTEXT KEY `nama_kategori` (`nama_kategori`,`deskripsi_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.kategori: ~5 rows (approximately)
INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `deskripsi_kategori`, `waktu_pembuatan_kategori`) VALUES
	(1, 'Nasi', 'Makanan pokok orang Indonesia.', '2021-03-17 18:16:28'),
	(2, 'Lauk', 'Pelengkap dalam makan nasi.', '2021-03-17 18:17:14'),
	(3, 'Sayur', 'Sumber serat untuk tubuh.', '2021-03-17 18:17:43'),
	(4, 'Minuman', 'Pelepas dahaga haus.', '2021-03-17 18:19:10'),
	(6, 'Tambahan', 'Tambahan makanan', '2023-05-15 14:09:19');

-- Dumping structure for table warteg.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `id_user` int NOT NULL,
  `waktu_masuk_keranjang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.keranjang: ~0 rows (approximately)

-- Dumping structure for table warteg.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `kategori_id_menu` int NOT NULL,
  `waktu_menu_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`),
  FULLTEXT KEY `nama_menu` (`nama_menu`,`deskripsi_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.menu: ~14 rows (approximately)
INSERT INTO `menu` (`menu_id`, `nama_menu`, `harga_menu`, `deskripsi_menu`, `kategori_id_menu`, `waktu_menu_masuk`) VALUES
	(1, 'Nasi Putih', 5000, 'Makanan sehari-hari orang Indonesia', 1, '2021-03-17 21:03:26'),
	(2, 'Nasi Merah', 5500, 'Nasi merah lebih sehat daripada nasi putih', 1, '2021-03-17 21:20:58'),
	(3, 'Ayam Goreng', 8500, 'Ayam goreng dengan serundeng', 2, '2021-03-17 21:34:37'),
	(4, 'Telur Balado', 5000, 'Telur rebus dengan sambal', 2, '2023-05-14 13:19:03'),
	(5, 'Bakwan', 1500, 'Gorengan tepung dan sayur', 2, '2021-03-17 21:36:36'),
	(8, 'Kangkung', 3000, 'Sayuran kangkung', 3, '2021-03-17 21:44:44'),
	(9, 'Capcai', 3000, 'Tumis sayuran', 3, '2021-03-17 21:45:34'),
	(10, 'Teh Tawar', 2000, ' 250ml', 4, '2021-03-17 22:12:53'),
	(11, 'Air Putih', 1000, '250ml', 4, '2021-03-17 22:13:38'),
	(12, 'Perkedel Kentang', 2500, 'Kentang tumbuk yang digoreng', 2, '2023-05-14 15:28:03'),
	(13, 'Tempe Orek', 3000, 'Tempe dengan gula dan kecap', 2, '2023-05-14 15:32:37'),
	(14, 'Serundeng', 2000, 'Parutan kepala goreng', 6, '2023-05-15 14:09:42'),
	(15, 'Sambal', 2000, 'Sambal bawang', 6, '2023-05-18 16:28:37'),
	(16, 'Soto Ayam', 12500, 'Soto dengan irisan daging ayam', 2, '2023-05-19 18:54:32'),
	(17, 'Lalapan', 3000, 'Sayuran mentah', 6, '2023-05-20 16:38:06');

-- Dumping structure for table warteg.pengiriman
CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int NOT NULL AUTO_INCREMENT,
  `id_pesanan` int NOT NULL,
  `nama_kurir` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kontak_kurir` bigint NOT NULL,
  `lama_waktu` int NOT NULL COMMENT 'Dalam menit',
  `waktu_db` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengiriman`),
  UNIQUE KEY `id_pesanan` (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.pengiriman: ~0 rows (approximately)
INSERT INTO `pengiriman` (`id_pengiriman`, `id_pesanan`, `nama_kurir`, `kontak_kurir`, `lama_waktu`, `waktu_db`) VALUES
	(1, 1, 'Agus', 12345678910, 30, '2023-05-14 16:36:51'),
	(2, 2, 'Gugus', 23456789765, 45, '2023-05-15 13:46:40'),
	(3, 7, 'Bagas', 1234567890, 60, '2023-05-20 16:01:42'),
	(5, 6, 'Bagas', 12345678901, 20, '2023-05-20 16:07:34'),
	(6, 9, 'Abdi', 81312866666, 45, '2023-05-20 16:33:08');

-- Dumping structure for table warteg.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int NOT NULL,
  `no_telp` bigint NOT NULL,
  `biaya` int NOT NULL,
  `cara_bayar` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 = COD, 1=Online',
  `status_pesanan` enum('0','1','2','3','4','5','6') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `waktu_pesanan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.pesanan: ~0 rows (approximately)
INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `alamat`, `kode_pos`, `no_telp`, `biaya`, `cara_bayar`, `status_pesanan`, `waktu_pesanan`) VALUES
	(1, 1, 'Jl a , sebelah masjid', 40161, 81312345678, 13000, '0', '4', '2023-05-14 15:57:39'),
	(2, 1, 'Jl. Cipaganti, sebelah masjid', 23456, 81322345678, 18000, '0', '1', '2023-05-19 18:47:04'),
	(6, 2, 'Jl Singaparna, ', 63516, 81324568798, 10000, '0', '2', '2023-05-19 18:49:30'),
	(7, 2, 'Jl. Cipaganti, ', 63516, 81312345678, 10000, '0', '0', '2023-05-20 16:12:30'),
	(9, 4, 'Jl. Dago, Sebelah SMANSA', 11111, 81312222222, 13000, '0', '2', '2023-05-20 16:27:54');

-- Dumping structure for table warteg.situs
CREATE TABLE IF NOT EXISTS `situs` (
  `id_situs` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_situs` varchar(21) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kontak1` bigint NOT NULL,
  `kontak2` bigint DEFAULT NULL COMMENT 'Opsional',
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_situs`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.situs: ~0 rows (approximately)
INSERT INTO `situs` (`id_situs`, `nama_situs`, `email`, `kontak1`, `kontak2`, `alamat`, `waktu`) VALUES
	(1, 'Warteg Cibadak', 'wartegcibadak@gmail.com', 2515469441, 6304468822, 'Jl. Cibadak No.315 Bandung', '2021-03-23 19:56:25');

-- Dumping structure for table warteg.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(21) NOT NULL,
  `nama_depan` varchar(21) NOT NULL,
  `nama_belakang` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_telp` bigint NOT NULL,
  `tipe_user` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '0=user, 1=admin',
  `password` varchar(255) NOT NULL,
  `waktu_join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table warteg.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `username`, `nama_depan`, `nama_belakang`, `email`, `no_telp`, `tipe_user`, `password`, `waktu_join`) VALUES
	(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 81321234586, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
	(2, 'pelanggan', 'pelanggan', 'pelanggan', 'pelanggan@gmail.com', 81312866834, '0', '$2y$10$ArGUbkH.9qY5yVzK0PO2Fe/pO2O18gnhg516E1c2PKhgZPto0Bcy6', '2023-05-15 13:16:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
