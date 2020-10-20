-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 20 2020 г., 18:26
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homestead`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_top` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_top` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_middle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_bottom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sport', 'sport', 'category-15984383495f463bcd94fb9.jfif', 1, '2020-07-24 07:42:19', '2020-08-26 07:39:09'),
(2, 'Astronomy & Space', 'astronomy-space', 'category-15984356945f46316e906c2.jpg', 1, '2020-08-26 06:54:54', '2020-08-26 06:54:54'),
(3, 'World', 'world', 'category-15984375095f4638854b314.jpg', 1, '2020-08-26 07:25:09', '2020-08-26 07:25:09'),
(4, 'Technology', 'technology', 'category-15984378865f4639fe3da8e.jpg', 1, '2020-08-26 07:31:26', '2020-08-26 07:31:26'),
(5, 'Other', 'other', 'category-15984382705f463b7e3e743.jfif', 1, '2020-08-26 07:37:50', '2020-08-26 07:37:50'),
(6, 'Politics', 'politics', 'category-15986089705f48d64a00197.jfif', 1, '2020-08-28 07:02:50', '2020-08-28 07:02:50'),
(7, 'Business', 'business', 'category-15986099875f48da4302306.png', 1, '2020-08-28 07:19:47', '2020-08-28 07:19:47'),
(8, 'Entertainment', 'entertainment', 'category-15986106245f48dcc0b70f2.png', 1, '2020-08-28 07:30:24', '2020-08-28 07:30:24'),
(9, 'Travel', 'travel', 'category-15986109365f48ddf873a84.png', 1, '2020-08-28 07:35:36', '2020-08-28 07:35:36');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuorder` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
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

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sourceId` tinyint(4) DEFAULT NULL,
  `source_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Editor', 'editor', NULL, NULL),
(3, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `site_favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimeo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breaking_news_category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `email`, `phone`, `facebook`, `twitter`, `linkedin`, `vimeo`, `youtube`, `about_us`, `address`, `breaking_news_category_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'logo.png', 'favicon.ico', 'dasdas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sources`
--

CREATE TABLE `sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rss',
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `from_site` tinyint(4) NOT NULL DEFAULT 0,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sources`
--

INSERT INTO `sources` (`id`, `type`, `name`, `url`, `status`, `created_at`, `updated_at`, `category_id`, `from_site`, `site_name`) VALUES
(1, 'rss', 'reddit', 'https://www.reddit.com/.rss', 1, NULL, '2020-08-26 07:43:53', 5, 0, 'Reddit'),
(2, 'rss', 'science news', 'http://esciencenews.com/topics/astronomy.space/latest/feed', 1, NULL, '2020-08-26 07:02:07', 2, 0, 'ScienceNews.com'),
(3, 'rss', 'cnn world', 'http://rss.cnn.com/rss/edition_world.rss', 1, '2020-07-30 07:58:21', '2020-08-26 07:28:37', 3, 0, 'CNN'),
(4, 'rss', 'Technology', 'http://rss.cnn.com/rss/edition_technology.rss', 1, '2020-08-26 07:31:54', '2020-08-26 07:31:54', 4, 0, 'CNN'),
(5, 'rss', 'Soccer', 'https://www.espn.com/espn/rss/soccer/news', 1, '2020-09-06 17:38:22', '2020-09-06 17:38:52', 1, 0, 'ESPN'),
(6, 'rss', 'Hockey', 'https://www.espn.com/espn/rss/nhl/news', 1, '2020-09-06 17:39:19', '2020-09-06 17:39:19', 1, 0, 'ESPN'),
(7, 'rss', 'Basketball', 'https://www.espn.com/espn/rss/nba/news', 1, '2020-09-06 17:39:41', '2020-09-06 17:39:41', 1, 0, 'ESPN'),
(8, 'rss', 'National Football League', 'https://www.espn.com/espn/rss/nfl/news', 1, '2020-09-06 17:41:14', '2020-09-06 17:41:14', 1, 0, 'ESPN'),
(9, 'rss', 'Football', 'https://sports.ndtv.com/rss/football', 1, '2020-09-06 17:43:18', '2020-09-10 14:59:51', 1, 0, 'NDTV'),
(10, 'rss', 'Tennis', 'https://sports.ndtv.com/rss/tennis', 1, '2020-09-06 17:43:40', '2020-09-10 14:59:58', 1, 0, 'NDTV'),
(11, 'rss', 'Boxing', 'https://sports.ndtv.com/rss/boxing', 1, '2020-09-06 17:44:17', '2020-09-10 15:00:07', 1, 0, 'NDTV'),
(12, 'rss', 'Swimming', 'https://sports.ndtv.com/rss/swimming', 1, '2020-09-06 17:44:40', '2020-09-10 15:00:17', 1, 0, 'NDTV'),
(13, 'rss', 'Cricket', 'https://sports.ndtv.com/rss/cricket', 1, '2020-09-06 17:45:34', '2020-09-10 15:00:25', 1, 0, 'NDTV'),
(14, 'rss', 'Wrestling', 'https://sports.ndtv.com/rss/wrestling', 1, '2020-09-06 17:45:57', '2020-09-10 15:00:34', 1, 0, 'NDTV'),
(15, 'rss', 'Real Clear Politics', 'http://feeds.feedburner.com/realclearpolitics/qlMj', 1, '2020-09-06 17:48:42', '2020-09-06 17:48:42', 6, 0, 'RealClearPolitics.com'),
(16, 'rss', 'Politics Home', 'https://www.politicshome.com/news/rss', 1, '2020-09-06 17:50:28', '2020-09-06 17:50:28', 6, 0, 'PoliticsHome.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Admin', 'admin@admin.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 1, 'default.png', 1, 'uh8VaJCV21', '2020-07-22 10:18:35', NULL),
(2, 'Mr. Editor', 'editor@editor.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 2, 'default.png', 1, 'ZUCMQArj36', '2020-07-22 10:18:35', NULL),
(3, 'Mr. User', 'user@user.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 3, 'default.png', 1, 'w6dJ1zFif9', '2020-07-22 10:18:35', NULL),
(4, 'Nikita', 'dasda@gmail.com', NULL, '$2y$10$467I3SyhxAkBDH/p1zzNEeDl5eBQ7zq7bNH5kGKFJTf3DQdnQF0v6', 3, 'default.png', 0, NULL, '2020-07-22 10:21:02', '2020-07-22 10:21:02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advertisements_slug_unique` (`slug`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sources_url_unique` (`url`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2651;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
