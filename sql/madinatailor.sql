# Host: localhost  (Version: 5.5.5-10.4.6-MariaDB)
# Date: 2019-10-31 23:23:58
# Generator: MySQL-Front 5.3  (Build 4.187)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "_barang"
#

DROP TABLE IF EXISTS `_barang`;
CREATE TABLE `_barang` (
  `kode_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesifikasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_lokasi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode_kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jml_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_barang"
#

INSERT INTO `_barang` VALUES ('BRG-001','baju','try','LC-001','KATEGORI-001','1','New','1','BNI',NULL,NULL),('BRG-002','A','try','LC-002','KATEGORI-001','1','New','1','Mandiri',NULL,NULL);

#
# Structure for table "_barangkeluar"
#

DROP TABLE IF EXISTS `_barangkeluar`;
CREATE TABLE `_barangkeluar` (
  `id_brgkeluar` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_brg_keluar` int(11) NOT NULL,
  `keperluan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_brgkeluar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_barangkeluar"
#

INSERT INTO `_barangkeluar` VALUES (5,'BRG-001','2021-01-01','Ayuu',2,'ini adalah barang',NULL,NULL);

#
# Structure for table "_barangmasuk"
#

DROP TABLE IF EXISTS `_barangmasuk`;
CREATE TABLE `_barangmasuk` (
  `id_brgmasuk` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_brg_masuk` int(11) NOT NULL,
  `kode_supplier` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_brgmasuk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_barangmasuk"
#

INSERT INTO `_barangmasuk` VALUES (4,'BRG-001','2019-01-01',3,'SPL-001',NULL,NULL);

#
# Structure for table "_kategori"
#

DROP TABLE IF EXISTS `_kategori`;
CREATE TABLE `_kategori` (
  `id_kategori` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama_kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_kategori"
#

INSERT INTO `_kategori` VALUES (4,'KG-00RI-001','SEPATU',NULL,NULL);

#
# Structure for table "_lokasi"
#

DROP TABLE IF EXISTS `_lokasi`;
CREATE TABLE `_lokasi` (
  `id_lokasi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_lokasi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lokasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_lokasi"
#

INSERT INTO `_lokasi` VALUES (1,'LC-001','Location 1',NULL,NULL),(2,'LC-002','Location 2',NULL,NULL);

#
# Structure for table "_stok"
#

DROP TABLE IF EXISTS `_stok`;
CREATE TABLE `_stok` (
  `id_stok` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_brgkeluar` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_brgmasuk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_stok"
#

INSERT INTO `_stok` VALUES (4,'BRG-001','5','4','2','s',NULL,NULL);

#
# Structure for table "_supplier"
#

DROP TABLE IF EXISTS `_supplier`;
CREATE TABLE `_supplier` (
  `kode_supplier` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_supplier` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "_supplier"
#

INSERT INTO `_supplier` VALUES ('SPL-001','Ayuu','Jl.hj Jaeran','Depok',NULL,NULL);

#
# Structure for table "failed_jobs"
#

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "failed_jobs"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_09_15_045557_create__barang_table',1),(5,'2019_09_19_025651_create__supplier_table',1),(6,'2019_09_25_022933_add_admin_to_users',1),(7,'2019_10_02_030608_create__barangkeluar_table',1),(8,'2019_10_03_005225_create__barangmasuk_table',1),(9,'2019_10_03_015205_create__stok_table',1),(10,'2019_10_03_020359_create__pinjambarang_table',1),(11,'2019_10_21_012202_create__barang_table',2),(12,'2019_10_21_023749_create__supplier_table',3),(13,'2019_10_21_024315_create__supplier_table',4),(14,'2019_10_21_024506_create__supplier_table',5),(15,'2019_10_21_024826_create__lokasi_table',6),(16,'2019_10_21_024837_create__kategori_table',6),(17,'2019_11_01_015840_create__barang_table',7),(18,'2019_11_01_044228_create__stok_table',8),(19,'2019_11_01_054222_create__pinjambarang_table',9),(20,'2019_11_01_054407_create__pinjambarang_table',10),(21,'2019_11_01_055002_create__pinjambarang_table',11);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Ayu','0','ayuputri12378@gmail.com',NULL,'$2y$10$5HNefItoDGTK16Vcima7mei7OW/jhYtqxLax4Y8d/rPhqjHgepMzG','gvNr2904wDURt7xKivKhfZspx0XLlBGiR80ipgYB0haw41x0wC01wrRfuw56','2019-10-16 00:47:50','2019-10-16 00:47:50'),(2,'Ayu','0','ayptriim@gmail.com',NULL,'$2y$10$Lp1vfOydCRObuWmbCBWlqeRk.0aRaMVTb45.367drqwsqHtnhkqYu',NULL,'2019-10-16 03:08:15','2019-10-16 03:08:15');
