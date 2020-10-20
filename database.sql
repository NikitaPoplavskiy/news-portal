-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.22-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы homestead.advertisements: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;

-- Дамп данных таблицы homestead.categories: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
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

-- Дамп данных таблицы homestead.menus: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Дамп данных таблицы homestead.migrations: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_10_23_184558_create_categories_table', 1),
	(4, '2018_10_23_184723_create_news_table', 1),
	(5, '2018_10_26_134857_create_roles_table', 1),
	(6, '2018_10_26_154819_create_settings_table', 1),
	(7, '2018_11_03_231855_create_menus_table', 1),
	(8, '2018_11_15_055330_create_advertisements_table', 1),
	(9, '2020_04_15_155557_create_sources_table', 2),
	(11, '2020_07_25_165236_update_news_table', 3),
	(12, '2020_07_29_095207_update_news_table_2', 4),
	(13, '2020_08_26_092539_update_source_table', 5),
	(14, '2020_09_07_143501_update_source_table_07_09_2020', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп данных таблицы homestead.news: ~2 488 rows (приблизительно)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Дамп данных таблицы homestead.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп данных таблицы homestead.roles: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT IGNORE INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', NULL, NULL),
	(2, 'Editor', 'editor', NULL, NULL),
	(3, 'User', 'user', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп данных таблицы homestead.settings: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT IGNORE INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `email`, `phone`, `facebook`, `twitter`, `linkedin`, `vimeo`, `youtube`, `about_us`, `address`, `breaking_news_category_id`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'logo.png', 'favicon.ico', 'dasdas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Дамп данных таблицы homestead.sources: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;
INSERT IGNORE INTO `sources` (`id`, `type`, `name`, `url`, `status`, `created_at`, `updated_at`, `category_id`, `from_site`, `site_name`) VALUES
	(1, 'rss', 'reddit', 'https://www.reddit.com/.rss', 1, NULL, '2020-08-26 10:43:53', 5, 0, 'Reddit'),
	(2, 'rss', 'science news', 'http://esciencenews.com/topics/astronomy.space/latest/feed', 1, NULL, '2020-08-26 10:02:07', 2, 0, 'ScienceNews.com'),
	(3, 'rss', 'cnn world', 'http://rss.cnn.com/rss/edition_world.rss', 1, '2020-07-30 10:58:21', '2020-08-26 10:28:37', 3, 0, 'CNN'),
	(4, 'rss', 'Technology', 'http://rss.cnn.com/rss/edition_technology.rss', 1, '2020-08-26 10:31:54', '2020-08-26 10:31:54', 4, 0, 'CNN'),
	(5, 'rss', 'Soccer', 'https://www.espn.com/espn/rss/soccer/news', 1, '2020-09-06 20:38:22', '2020-09-06 20:38:52', 1, 0, 'ESPN'),
	(6, 'rss', 'Hockey', 'https://www.espn.com/espn/rss/nhl/news', 1, '2020-09-06 20:39:19', '2020-09-06 20:39:19', 1, 0, 'ESPN'),
	(7, 'rss', 'Basketball', 'https://www.espn.com/espn/rss/nba/news', 1, '2020-09-06 20:39:41', '2020-09-06 20:39:41', 1, 0, 'ESPN'),
	(8, 'rss', 'National Football League', 'https://www.espn.com/espn/rss/nfl/news', 1, '2020-09-06 20:41:14', '2020-09-06 20:41:14', 1, 0, 'ESPN'),
	(9, 'rss', 'Football', 'https://sports.ndtv.com/rss/football', 1, '2020-09-06 20:43:18', '2020-09-10 17:59:51', 1, 0, 'NDTV'),
	(10, 'rss', 'Tennis', 'https://sports.ndtv.com/rss/tennis', 1, '2020-09-06 20:43:40', '2020-09-10 17:59:58', 1, 0, 'NDTV'),
	(11, 'rss', 'Boxing', 'https://sports.ndtv.com/rss/boxing', 1, '2020-09-06 20:44:17', '2020-09-10 18:00:07', 1, 0, 'NDTV'),
	(12, 'rss', 'Swimming', 'https://sports.ndtv.com/rss/swimming', 1, '2020-09-06 20:44:40', '2020-09-10 18:00:17', 1, 0, 'NDTV'),
	(13, 'rss', 'Cricket', 'https://sports.ndtv.com/rss/cricket', 1, '2020-09-06 20:45:34', '2020-09-10 18:00:25', 1, 0, 'NDTV'),
	(14, 'rss', 'Wrestling', 'https://sports.ndtv.com/rss/wrestling', 1, '2020-09-06 20:45:57', '2020-09-10 18:00:34', 1, 0, 'NDTV'),
	(15, 'rss', 'Real Clear Politics', 'http://feeds.feedburner.com/realclearpolitics/qlMj', 1, '2020-09-06 20:48:42', '2020-09-06 20:48:42', 6, 0, 'RealClearPolitics.com'),
	(16, 'rss', 'Politics Home', 'https://www.politicshome.com/news/rss', 1, '2020-09-06 20:50:28', '2020-09-06 20:50:28', 6, 0, 'PoliticsHome.com');
/*!40000 ALTER TABLE `sources` ENABLE KEYS */;

-- Дамп данных таблицы homestead.users: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Mr. Admin', 'admin@admin.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 1, 'default.png', 1, 'uh8VaJCV21', '2020-07-22 13:18:35', NULL),
	(2, 'Mr. Editor', 'editor@editor.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 2, 'default.png', 1, 'ZUCMQArj36', '2020-07-22 13:18:35', NULL),
	(3, 'Mr. User', 'user@user.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 3, 'default.png', 1, 'w6dJ1zFif9', '2020-07-22 13:18:35', NULL),
	(4, 'Nikita', 'dasda@gmail.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 3, 'default.png', 0, NULL, '2020-07-22 13:21:02', '2020-07-22 13:21:02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
