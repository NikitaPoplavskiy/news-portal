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

-- Дамп данных таблицы homestead.sources: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;
INSERT INTO `sources` (`id`, `type`, `name`, `url`, `status`, `created_at`, `updated_at`, `category_id`, `from_site`) VALUES
	(1, 'rss', 'reddit', 'https://www.reddit.com/.rss', 1, NULL, '2020-08-26 10:43:53', 5, 0),
	(2, 'rss', 'science news', 'http://esciencenews.com/topics/astronomy.space/latest/feed', 1, NULL, '2020-08-26 10:02:07', 2, 0),
	(3, 'rss', 'cnn world', 'http://rss.cnn.com/rss/edition_world.rss', 1, '2020-07-30 10:58:21', '2020-08-26 10:28:37', 3, 0),
	(4, 'rss', 'Technology', 'http://rss.cnn.com/rss/edition_technology.rss', 1, '2020-08-26 10:31:54', '2020-08-26 10:31:54', 4, 0),
	(5, 'rss', 'Soccer', 'https://www.espn.com/espn/rss/soccer/news', 1, '2020-09-06 20:38:22', '2020-09-06 20:38:52', 1, 0),
	(6, 'rss', 'Hockey', 'https://www.espn.com/espn/rss/nhl/news', 1, '2020-09-06 20:39:19', '2020-09-06 20:39:19', 1, 0),
	(7, 'rss', 'Basketball', 'https://www.espn.com/espn/rss/nba/news', 1, '2020-09-06 20:39:41', '2020-09-06 20:39:41', 1, 0),
	(8, 'rss', 'National Football League', 'https://www.espn.com/espn/rss/nfl/news', 1, '2020-09-06 20:41:14', '2020-09-06 20:41:14', 1, 0),
	(9, 'rss', 'Football', 'https://sports.ndtv.com/rss/football', 1, '2020-09-06 20:43:18', '2020-09-06 20:43:18', 1, 0),
	(10, 'rss', 'Tennis', 'https://sports.ndtv.com/rss/tennis', 1, '2020-09-06 20:43:40', '2020-09-06 20:43:40', 1, 0),
	(11, 'rss', 'Boxing', 'https://sports.ndtv.com/rss/boxing', 1, '2020-09-06 20:44:17', '2020-09-06 20:44:17', 1, 0),
	(12, 'rss', 'Swimming', 'https://sports.ndtv.com/rss/swimming', 1, '2020-09-06 20:44:40', '2020-09-06 20:44:40', 1, 0),
	(13, 'rss', 'Cricket', 'https://sports.ndtv.com/rss/cricket', 1, '2020-09-06 20:45:34', '2020-09-06 20:45:34', 1, 0),
	(14, 'rss', 'Wrestling', 'https://sports.ndtv.com/rss/wrestling', 1, '2020-09-06 20:45:57', '2020-09-06 20:45:57', 1, 0),
	(15, 'rss', 'Real Clear Politics', 'http://feeds.feedburner.com/realclearpolitics/qlMj', 1, '2020-09-06 20:48:42', '2020-09-06 20:48:42', 6, 0),
	(16, 'rss', 'Politics Home', 'https://www.politicshome.com/news/rss', 1, '2020-09-06 20:50:28', '2020-09-06 20:50:28', 6, 0);
/*!40000 ALTER TABLE `sources` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
