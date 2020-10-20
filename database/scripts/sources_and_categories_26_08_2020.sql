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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table homestead.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Спорт', 'sport', 'category-15984383495f463bcd94fb9.jfif', 1, '2020-07-24 10:42:19', '2020-08-26 10:39:09'),
	(2, 'Astronomy & Space', 'astronomy-space', 'category-15984356945f46316e906c2.jpg', 1, '2020-08-26 09:54:54', '2020-08-26 09:54:54'),
	(3, 'World', 'world', 'category-15984375095f4638854b314.jpg', 1, '2020-08-26 10:25:09', '2020-08-26 10:25:09'),
	(4, 'Technology', 'technology', 'category-15984378865f4639fe3da8e.jpg', 1, '2020-08-26 10:31:26', '2020-08-26 10:31:26'),
	(5, 'Other', 'other', 'category-15984382705f463b7e3e743.jfif', 1, '2020-08-26 10:37:50', '2020-08-26 10:37:50');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table homestead.sources
CREATE TABLE IF NOT EXISTS `sources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rss',
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_site` tinyint(4) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sources_url_unique` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table homestead.sources: ~3 rows (approximately)
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;
INSERT INTO `sources` (`id`, `type`, `name`, `url`, `status`, `created_at`, `updated_at`, `from_site`, `category_id`) VALUES
	(1, 'rss', 'reddit', 'https://www.reddit.com/.rss', 1, NULL, '2020-08-26 10:43:53', 0, 5),
	(2, 'rss', 'science news', 'http://esciencenews.com/topics/astronomy.space/latest/feed', 1, NULL, '2020-08-26 10:02:07', 0, 2),
	(3, 'rss', 'cnn world', 'http://rss.cnn.com/rss/edition_world.rss', 1, '2020-07-30 10:58:21', '2020-08-26 10:28:37', 0, 3),
	(4, 'rss', 'Technology', 'http://rss.cnn.com/rss/edition_technology.rss', 1, '2020-08-26 10:31:54', '2020-08-26 10:31:54', 0, 4);
/*!40000 ALTER TABLE `sources` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
