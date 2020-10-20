-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.25-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for homestead
CREATE DATABASE IF NOT EXISTS `homestead` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `homestead`;

-- Dumping structure for table homestead.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table homestead.categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Sport', 'sport', 'category-15984383495f463bcd94fb9.jfif', 1, '2020-07-24 10:42:19', '2020-08-26 10:39:09'),
	(2, 'Astronomy & Space', 'astronomy-space', 'category-15984356945f46316e906c2.jpg', 1, '2020-08-26 09:54:54', '2020-08-26 09:54:54'),
	(3, 'World', 'world', 'category-15984375095f4638854b314.jpg', 1, '2020-08-26 10:25:09', '2020-08-26 10:25:09'),
	(4, 'Technology', 'technology', 'category-15984378865f4639fe3da8e.jpg', 1, '2020-08-26 10:31:26', '2020-08-26 10:31:26'),
	(5, 'Other', 'other', 'category-15984382705f463b7e3e743.jfif', 1, '2020-08-26 10:37:50', '2020-08-26 10:37:50'),
	(6, 'Politics', 'politics', 'category-15986089705f48d64a00197.jfif', 1, '2020-08-28 10:02:50', '2020-08-28 10:02:50'),
	(7, 'Business', 'business', 'category-15986099875f48da4302306.png', 1, '2020-08-28 10:19:47', '2020-08-28 10:19:47'),
	(8, 'Entertainment', 'entertainment', 'category-15986106245f48dcc0b70f2.png', 1, '2020-08-28 10:30:24', '2020-08-28 10:30:24'),
	(9, 'Travel', 'travel', 'category-15986109365f48ddf873a84.png', 1, '2020-08-28 10:35:36', '2020-08-28 10:35:36');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
