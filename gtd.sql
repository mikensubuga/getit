-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2019 at 05:56 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtd`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(12, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(13, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(14, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(15, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(16, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(17, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(18, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(19, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(20, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(21, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(22, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(69, 12, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(71, 12, 'profilePhoto', 'image', 'ProfilePhoto', 0, 1, 1, 1, 1, 1, '{}', 3),
(72, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(73, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(74, 1, 'user_hasone_job_profile_relationship', 'relationship', 'job_profiles', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\JobProfile\",\"table\":\"job_profiles\",\"type\":\"hasOne\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"details\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(75, 12, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(76, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 6),
(77, 12, 'job_profile_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(78, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(79, 14, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(80, 12, 'job_profile_belongsto_profile_category_relationship', 'relationship', 'profile_categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ProfileCategory\",\"table\":\"profile_categories\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"prof_cats\",\"pivot\":\"1\",\"taggable\":\"0\"}', 8),
(82, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(83, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(84, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(85, 15, 'rating', 'text', 'Rating', 0, 1, 1, 1, 1, 1, '{}', 2),
(86, 15, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(87, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(88, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(89, 16, 'body', 'text', 'Body', 0, 1, 1, 1, 1, 1, '{}', 2),
(90, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(91, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(92, 12, 'job_profile_hasmany_review_relationship', 'relationship', 'reviews', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Review\",\"table\":\"reviews\",\"type\":\"hasMany\",\"column\":\"jobprofile_id\",\"key\":\"id\",\"label\":\"body\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(93, 15, 'review_belongsto_job_profile_relationship', 'relationship', 'job_profiles', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\JobProfile\",\"table\":\"job_profiles\",\"type\":\"belongsTo\",\"column\":\"jobProfile_id\",\"key\":\"id\",\"label\":\"details\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(94, 15, 'body', 'text', 'Body', 0, 1, 1, 1, 1, 1, '{}', 5),
(95, 15, 'jobProfile_id', 'text', 'JobProfile Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(96, 15, 'review_hasmany_reply_relationship', 'relationship', 'replies', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Reply\",\"table\":\"replies\",\"type\":\"hasMany\",\"column\":\"review_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(97, 16, 'reply_belongsto_review_relationship', 'relationship', 'reviews', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Review\",\"table\":\"reviews\",\"type\":\"belongsTo\",\"column\":\"review_id\",\"key\":\"id\",\"label\":\"body\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(98, 16, 'review_id', 'text', 'Review Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(99, 12, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{}', 8),
(100, 1, 'telNo', 'text', 'TelNo', 0, 1, 1, 1, 1, 1, '{}', 12),
(101, 1, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, '{}', 13),
(107, 1, 'user_hasmany_order_relationship', 'relationship', 'orders', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Order\",\"table\":\"orders\",\"type\":\"hasMany\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(115, 20, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(116, 20, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(117, 20, 'total', 'text', 'Total', 0, 1, 1, 1, 1, 1, '{}', 3),
(118, 20, 'delivered', 'checkbox', 'Delivered', 0, 1, 1, 1, 1, 1, '{}', 4),
(119, 20, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(120, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(121, 1, 'user_hasmany_order_relationship_1', 'relationship', 'orders', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Order\",\"table\":\"orders\",\"type\":\"hasMany\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":null}', 15),
(122, 20, 'order_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(124, 20, 'jobProfile_id', 'text', 'JobProfile Id', 0, 1, 1, 1, 1, 1, '{}', 7),
(126, 12, 'order_id', 'text', 'Order Id', 0, 1, 1, 1, 1, 1, '{}', 9),
(127, 20, 'order_belongsto_job_profile_relationship', 'relationship', 'job_profiles', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\JobProfile\",\"table\":\"job_profiles\",\"type\":\"belongsTo\",\"column\":\"jobProfile_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(128, 12, 'job_profile_hasone_order_relationship', 'relationship', 'orders', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Order\",\"table\":\"orders\",\"type\":\"hasOne\",\"column\":\"jobprofile_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(129, 15, 'author', 'text', 'Author', 0, 1, 1, 1, 1, 1, '{}', 7),
(130, 15, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 8),
(131, 15, 'is_active', 'text', 'Is Active', 0, 1, 1, 1, 1, 1, '{}', 9),
(132, 15, 'photo', 'text', 'Photo', 0, 1, 1, 1, 1, 1, '{}', 10),
(135, 14, 'profile_category_belongstomany_job_profile_relationship', 'relationship', 'job_profiles', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\JobProfile\",\"table\":\"job_profiles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"prof_cats\",\"pivot\":\"1\",\"taggable\":\"0\"}', 5),
(136, 14, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
(137, 12, 'shortDesc', 'text', 'Short Description', 0, 1, 1, 1, 1, 1, '{}', 2),
(138, 12, 'longDesc', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 9),
(139, 20, 'unit', 'text', 'Unit', 0, 1, 1, 1, 1, 1, '{}', 8),
(140, 20, 'quantity', 'text', 'Quantity', 0, 1, 1, 1, 1, 1, '{}', 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null}', '2019-02-26 12:12:27', '2019-04-05 03:08:13'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-02-26 12:12:27', '2019-02-26 12:12:27'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-02-26 12:12:27', '2019-02-26 12:12:27'),
(10, 'jobprofile', 'jobprofile', 'JobProfile', 'Jobprofiles', 'voyager-company', 'App\\JobProfile', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-29 03:51:12', '2019-03-29 03:51:12'),
(12, 'job_profiles', 'job-profiles', 'Job Profile', 'Job Profiles', 'voyager-company', 'App\\JobProfile', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-29 04:08:33', '2019-04-25 05:29:52'),
(14, 'profile_categories', 'profile-categories', 'Profile Category', 'Profile Categories', 'voyager-categories', 'App\\ProfileCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-30 06:54:33', '2019-04-25 05:12:53'),
(15, 'reviews', 'reviews', 'Review', 'Reviews', 'voyager-thumbs-up', 'App\\Review', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-30 07:35:30', '2019-04-14 04:43:00'),
(16, 'replies', 'replies', 'Reply', 'Replies', 'voyager-info-circled', 'App\\Reply', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-03-30 07:39:08', '2019-03-30 08:10:59'),
(20, 'orders', 'orders', 'Order', 'Orders', NULL, 'App\\Order', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-04-05 17:00:19', '2019-05-01 09:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `job_profiles`
--

DROP TABLE IF EXISTS `job_profiles`;
CREATE TABLE IF NOT EXISTS `job_profiles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shortDesc` text COLLATE utf8mb4_unicode_ci,
  `profilePhoto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `longDesc` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_profiles`
--

INSERT INTO `job_profiles` (`id`, `shortDesc`, `profilePhoto`, `created_at`, `updated_at`, `user_id`, `price`, `order_id`, `longDesc`) VALUES
(16, 'I will develop a web app, website using Laravel and Vuejs', 'job-profiles\\April2019\\cnOywjLTXG8wWvUOBtfu.jpg', '2019-04-25 05:38:40', '2019-04-25 05:38:40', 3, 110000, NULL, '<p>If you are looking for a person to create a website, web portal or any kind of application, so you have found the right person.</p> <p>I  have 7 years experience in laravel and Vuejs application. I have developed more than 20 web apps and websites.</p><p> My price is 110,000 for 5 pages</p><p>I will provide a best solution to your problem in the minimum time</p>'),
(17, 'I will professionally grow your facebook page', 'job-profiles\\April2019\\cuv8Zf2C5o1HuCiQt478.jpg', '2019-04-25 06:40:06', '2019-04-25 06:40:06', 6, 80000, NULL, '<p>I help you grow your page in the most efficient way possible to a GLOBAL AUDIENCE (untargeted). Then when you run your ads you can get higher conversion rates as your page is established.</p><p>Your page will be found higher in FB search People will view your page brand as an authority and take you seriously.</p> <p>Your conversion rates will be much higher when your page has 10K+ likes</p><p>For every 5000 likes generated, I will charge you 80,000UGX</p>'),
(18, 'I will clean, fix and restore your compund to greatness', 'job-profiles\\April2019\\5nJJgJGG0AibsKBLl8c5.jpg', '2019-04-25 08:19:14', '2019-04-25 08:19:14', 4, 7000, NULL, '<p>I will clean your compound at a friendly price and restore all its beauty</p> <p>For 50sq meter, I charge a price of 7000</p>'),
(19, 'I will your fix broken screen for all types of smart phones', 'job-profiles\\April2019\\e0zha7rqSUdmbvQqpYh7.jpg', '2019-04-25 08:25:17', '2019-04-25 08:25:17', 5, 30000, NULL, '<p>For all screen repairs, i will be your saviour, different screens have different prices so you will buy the screen and I will fix it</p> <p>The price for each is 30000 regardless of the model</p>'),
(20, 'Hire me for maid work services', 'job-profiles\\May2019\\DWq9gsA3AzlPPpS2eJQn.jpg', '2019-04-25 08:32:00', '2019-05-03 09:13:54', 7, 60000, NULL, '<p> I have an experience of 2 years with doing maid work</p> <p> Good communication skills and ability to handle children and people</p><p> I will do the service for 60000 for a monthly price<p>'),
(21, 'I will write quality articles and blog posts', 'job-profiles\\April2019\\o9b71p6xEAx1W5QMaU0w.jpg', '2019-04-25 08:36:44', '2019-04-25 08:36:44', 9, 30000, NULL, '<p>There\'s a whole lot to gain from investing in well-articulated  SEO articles, blogs and copywriting contents for your websites, affiliate niche sites, and blogs. </p><p>To sell whatever product it is you might have online; people need to be given that push to go for it and the only way to do that is by going all out to make sure the content on your website is indeed presentable and speaks to their needs as buyers.</p><p> A long form article is 30000'),
(22, 'This a short test', 'job-profiles\\userprofiles\\earth.JPG', '2019-05-30 12:15:01', '2019-05-30 12:15:01', 14, 4500, NULL, 'This is a Long test'),
(23, 'This is a', 'job-profiles\\userprofiles\\polos.JPG', '2019-06-01 12:35:54', '2019-06-03 12:26:51', 13, 500, NULL, 'This is a long profile description for the same new user');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(2, 'normal', '2019-03-03 04:57:37', '2019-03-03 04:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-dashboard', '#000000', NULL, 1, '2019-02-26 12:12:28', '2019-04-06 12:14:00', 'voyager.dashboard', 'null'),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 9, '2019-02-26 12:12:28', '2019-04-06 12:08:38', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-people', '#000000', NULL, 2, '2019-02-26 12:12:28', '2019-04-06 12:13:39', 'voyager.users.index', 'null'),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 3, '2019-02-26 12:12:28', '2019-03-29 03:51:56', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 10, '2019-02-26 12:12:28', '2019-04-06 12:08:32', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-02-26 12:12:28', '2019-03-02 16:42:20', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-02-26 12:12:28', '2019-03-02 16:42:20', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-02-26 12:12:28', '2019-03-02 16:42:20', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-02-26 12:12:28', '2019-03-02 16:42:20', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 11, '2019-02-26 12:12:28', '2019-04-06 12:08:32', 'voyager.settings.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-02-26 12:13:07', '2019-03-02 16:42:20', 'voyager.hooks', NULL),
(18, 2, 'Computers', '/computers', '_blank', 'voyager-bag', '#000000', NULL, 12, '2019-03-03 04:59:27', '2019-03-03 04:59:27', NULL, ''),
(21, 1, 'Job Profiles', '', '_self', 'voyager-company', NULL, NULL, 5, '2019-03-29 04:08:33', '2019-04-06 12:08:38', 'voyager.job-profiles.index', NULL),
(23, 1, 'Profile Categories', '', '_self', 'voyager-categories', '#000000', NULL, 6, '2019-03-30 06:54:33', '2019-04-06 12:08:38', 'voyager.profile-categories.index', 'null'),
(24, 1, 'Reviews', '', '_self', 'voyager-thumbs-up', NULL, NULL, 7, '2019-03-30 07:35:31', '2019-04-06 12:08:38', 'voyager.reviews.index', NULL),
(25, 1, 'Replies', '', '_self', 'voyager-info-circled', NULL, NULL, 8, '2019-03-30 07:39:08', '2019-04-06 12:08:38', 'voyager.replies.index', NULL),
(29, 1, 'Orders', '', '_self', 'voyager-logbook', '#000000', NULL, 4, '2019-04-05 17:00:19', '2019-04-06 12:13:20', 'voyager.orders.index', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'This is a message', NULL, NULL),
(2, 3, 'hey there', '2019-04-29 07:02:16', '2019-04-29 07:02:16'),
(3, 4, 'I would want to make an educational  website for my school, I want it to be responsive, how much time will it take to be delivered?', '2019-04-29 08:25:44', '2019-04-29 08:25:44'),
(4, 3, 'It will be delivered in a 3 weeks\' time, please endavour to send me the pictures of the school', '2019-04-29 08:27:17', '2019-04-29 08:27:17'),
(5, 3, 'hallo', '2019-06-04 14:54:25', '2019-06-04 14:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(27, '2019_04_24_055436_create_messages_table', 3),
(28, '2019_04_24_193137_create_jobprofile_category_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `delivered` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobProfile_id` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `delivered`, `created_at`, `updated_at`, `jobProfile_id`, `unit`, `quantity`) VALUES
(25, 4, 220000, 1, '2019-04-25 09:07:00', '2019-05-30 11:19:37', 16, NULL, NULL),
(26, 4, 220000, 0, '2019-04-26 13:20:48', '2019-04-26 13:20:48', 16, NULL, NULL),
(27, 4, 110000, 0, '2019-04-26 13:33:42', '2019-04-26 13:33:42', 16, NULL, NULL),
(28, 4, 110000, 0, '2019-04-26 13:34:10', '2019-04-26 13:34:10', 16, NULL, NULL),
(29, 4, 110000, 0, '2019-04-26 13:34:31', '2019-04-26 13:34:31', 16, NULL, NULL),
(30, 4, 80000, 0, '2019-04-26 13:34:51', '2019-04-26 13:34:51', 17, NULL, NULL),
(31, 4, 110000, 0, '2019-04-26 13:43:13', '2019-04-26 13:43:13', 16, NULL, NULL),
(33, 4, 30000, 0, '2019-04-29 01:55:16', '2019-04-29 01:55:16', 19, NULL, NULL),
(34, 4, 0, NULL, '2019-04-29 02:26:56', '2019-04-29 02:26:56', NULL, NULL, NULL),
(35, 4, 220000, 0, '2019-05-02 10:45:52', '2019-05-02 10:45:52', 16, NULL, NULL),
(36, 4, 80000, 0, '2019-05-30 06:15:57', '2019-05-30 06:15:57', 17, NULL, NULL),
(37, 4, 80000, 0, '2019-05-30 06:24:50', '2019-05-30 06:24:50', 17, NULL, NULL),
(38, 4, 80000, 0, '2019-05-30 06:34:39', '2019-05-30 06:34:39', 17, NULL, NULL),
(39, 4, 80000, 0, '2019-05-30 06:47:19', '2019-05-30 06:47:19', 17, NULL, NULL),
(40, 4, 80000, 0, '2019-05-30 06:49:30', '2019-05-30 06:49:30', 17, NULL, NULL),
(43, 16, 1000, 1, '2019-06-04 03:43:00', '2019-06-04 04:03:20', 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(2, 'browse_bread', NULL, '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(3, 'browse_database', NULL, '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(4, 'browse_media', NULL, '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(5, 'browse_compass', NULL, '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(6, 'browse_menus', 'menus', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(7, 'read_menus', 'menus', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(8, 'edit_menus', 'menus', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(9, 'add_menus', 'menus', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(10, 'delete_menus', 'menus', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(11, 'browse_roles', 'roles', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(12, 'read_roles', 'roles', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(13, 'edit_roles', 'roles', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(14, 'add_roles', 'roles', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(15, 'delete_roles', 'roles', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(16, 'browse_users', 'users', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(17, 'read_users', 'users', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(18, 'edit_users', 'users', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(19, 'add_users', 'users', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(20, 'delete_users', 'users', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(21, 'browse_settings', 'settings', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(22, 'read_settings', 'settings', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(23, 'edit_settings', 'settings', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(24, 'add_settings', 'settings', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(25, 'delete_settings', 'settings', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(41, 'browse_hooks', NULL, '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(57, 'browse_jobprofile', 'jobprofile', '2019-03-29 03:51:12', '2019-03-29 03:51:12'),
(58, 'read_jobprofile', 'jobprofile', '2019-03-29 03:51:12', '2019-03-29 03:51:12'),
(59, 'edit_jobprofile', 'jobprofile', '2019-03-29 03:51:12', '2019-03-29 03:51:12'),
(60, 'add_jobprofile', 'jobprofile', '2019-03-29 03:51:12', '2019-03-29 03:51:12'),
(61, 'delete_jobprofile', 'jobprofile', '2019-03-29 03:51:12', '2019-03-29 03:51:12'),
(67, 'browse_job_profiles', 'job_profiles', '2019-03-29 04:08:33', '2019-03-29 04:08:33'),
(68, 'read_job_profiles', 'job_profiles', '2019-03-29 04:08:33', '2019-03-29 04:08:33'),
(69, 'edit_job_profiles', 'job_profiles', '2019-03-29 04:08:33', '2019-03-29 04:08:33'),
(70, 'add_job_profiles', 'job_profiles', '2019-03-29 04:08:33', '2019-03-29 04:08:33'),
(71, 'delete_job_profiles', 'job_profiles', '2019-03-29 04:08:33', '2019-03-29 04:08:33'),
(77, 'browse_profile_categories', 'profile_categories', '2019-03-30 06:54:33', '2019-03-30 06:54:33'),
(78, 'read_profile_categories', 'profile_categories', '2019-03-30 06:54:33', '2019-03-30 06:54:33'),
(79, 'edit_profile_categories', 'profile_categories', '2019-03-30 06:54:33', '2019-03-30 06:54:33'),
(80, 'add_profile_categories', 'profile_categories', '2019-03-30 06:54:33', '2019-03-30 06:54:33'),
(81, 'delete_profile_categories', 'profile_categories', '2019-03-30 06:54:33', '2019-03-30 06:54:33'),
(82, 'browse_reviews', 'reviews', '2019-03-30 07:35:30', '2019-03-30 07:35:30'),
(83, 'read_reviews', 'reviews', '2019-03-30 07:35:30', '2019-03-30 07:35:30'),
(84, 'edit_reviews', 'reviews', '2019-03-30 07:35:30', '2019-03-30 07:35:30'),
(85, 'add_reviews', 'reviews', '2019-03-30 07:35:31', '2019-03-30 07:35:31'),
(86, 'delete_reviews', 'reviews', '2019-03-30 07:35:31', '2019-03-30 07:35:31'),
(87, 'browse_replies', 'replies', '2019-03-30 07:39:08', '2019-03-30 07:39:08'),
(88, 'read_replies', 'replies', '2019-03-30 07:39:08', '2019-03-30 07:39:08'),
(89, 'edit_replies', 'replies', '2019-03-30 07:39:08', '2019-03-30 07:39:08'),
(90, 'add_replies', 'replies', '2019-03-30 07:39:08', '2019-03-30 07:39:08'),
(91, 'delete_replies', 'replies', '2019-03-30 07:39:08', '2019-03-30 07:39:08'),
(107, 'browse_orders', 'orders', '2019-04-05 17:00:19', '2019-04-05 17:00:19'),
(108, 'read_orders', 'orders', '2019-04-05 17:00:19', '2019-04-05 17:00:19'),
(109, 'edit_orders', 'orders', '2019-04-05 17:00:19', '2019-04-05 17:00:19'),
(110, 'add_orders', 'orders', '2019-04-05 17:00:19', '2019-04-05 17:00:19'),
(111, 'delete_orders', 'orders', '2019-04-05 17:00:19', '2019-04-05 17:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_categories`
--

DROP TABLE IF EXISTS `profile_categories`;
CREATE TABLE IF NOT EXISTS `profile_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_categories`
--

INSERT INTO `profile_categories` (`id`, `name`, `created_at`, `updated_at`, `description`) VALUES
(1, 'Marketing', '2019-03-30 06:57:00', '2019-04-25 05:22:51', 'Reach #InfluencerStatus with social media marketing services'),
(2, 'Web Development', '2019-03-30 06:57:00', '2019-04-25 05:22:20', 'Build your vision online with computer programming tailored to your needs'),
(3, 'Home Cleaner', '2019-03-30 06:58:06', '2019-03-30 06:58:06', NULL),
(4, 'Article Writer', '2019-03-30 06:58:00', '2019-04-25 05:16:28', 'Upgrade your content details with professional article & blog post services'),
(5, 'House Maids', '2019-03-30 15:17:36', '2019-03-30 15:17:36', NULL),
(6, 'Vehicles For Hire', '2019-03-30 15:18:17', '2019-03-30 15:18:17', NULL),
(7, 'Askaris', '2019-04-21 11:19:15', '2019-04-21 11:19:15', NULL),
(10, 'Logo Design', '2019-04-25 02:10:00', '2019-04-25 05:23:55', 'Want to say more with less? Brand recognition is just a custom logo design away'),
(11, 'Databases', '2019-04-25 02:18:00', '2019-04-25 05:23:28', 'Safety comes first. Protect your data and optimize your database performance'),
(12, 'User Testing', '2019-04-25 02:19:00', '2019-04-25 05:24:43', 'Love your product? Find out if others do too thanks to user testing services'),
(14, 'Content management systems', '2019-04-25 05:02:37', '2019-04-25 05:02:37', NULL),
(15, 'Carpentery', '2019-04-25 05:04:00', '2019-04-25 05:21:38', 'For all furniture needs'),
(16, 'House Painter', '2019-04-25 05:05:00', '2019-04-25 05:21:18', 'Quality painting services for your home'),
(17, 'Phone Repair', '2019-04-25 05:06:00', '2019-04-25 05:20:27', 'For all phone problems like broken screens, broken buttons, dead battery we got you covered'),
(18, 'Computer Repair', '2019-04-25 05:06:00', '2019-04-25 05:19:38', 'Got a computer problem, our fixers are here to help you out'),
(19, 'Translation', '2019-04-25 05:08:00', '2019-04-25 05:19:03', 'Think big. Go global with translation services and take your message abroad'),
(20, 'Video Editing', '2019-04-25 05:08:00', '2019-04-25 05:18:22', 'Turn piles of footage into a single and engaging video, or tweak existing ones'),
(21, 'Singer-Songwriters', '2019-04-25 05:09:00', '2019-04-25 05:17:49', 'Need a singer? We\'ve got singers and songwriters who can do it for you'),
(22, 'Producers & Composers', '2019-04-25 05:09:00', '2019-04-25 05:15:02', 'Need an original composition or beat progression? You\'ve come to the right place'),
(23, 'Arts & crafts', '2019-04-25 05:10:00', '2019-04-25 05:14:30', 'Not crafty? These talented arts and crafts providers have you covered'),
(24, 'Relationship Advice', '2019-04-25 05:11:00', '2019-04-25 05:13:52', 'Seek relationship truths, tips, advice and more'),
(25, 'Business tips', '2019-04-25 05:25:53', '2019-04-25 05:25:53', 'Gather business tips and tricks from a community of winners'),
(26, 'Data Entry', '2019-04-25 05:26:25', '2019-04-25 05:26:25', 'Hire an expert to handle your data entry so you can focus on what matters');

-- --------------------------------------------------------

--
-- Table structure for table `prof_cats`
--

DROP TABLE IF EXISTS `prof_cats`;
CREATE TABLE IF NOT EXISTS `prof_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_profile_id` int(10) UNSIGNED NOT NULL,
  `profile_category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prof_cats_job_profile_id_foreign` (`job_profile_id`),
  KEY `prof_cats_profile_category_id_foreign` (`profile_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `prof_cats`
--

INSERT INTO `prof_cats` (`id`, `job_profile_id`, `profile_category_id`) VALUES
(11, 16, 2),
(12, 16, 14),
(13, 17, 1),
(14, 18, 3),
(15, 19, 17),
(16, 20, 3),
(17, 20, 5),
(18, 21, 4),
(19, 22, 7),
(20, 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `body`, `created_at`, `updated_at`, `review_id`, `author`, `email`, `is_active`, `photo`) VALUES
(15, 'Good to know, look forward to working with you again', '2019-04-25 08:45:57', '2019-04-25 08:45:57', 16, 'Nsubuga Mike', 'mike@gmail.com', 0, 'users\\April2019\\ZxhWjH90tOqEqjo95QvY.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `jobProfile_id` int(11) DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `created_at`, `updated_at`, `body`, `jobProfile_id`, `author`, `email`, `is_active`, `photo`) VALUES
(16, 5, '2019-04-25 08:41:58', '2019-04-25 08:41:58', 'The system he did for me was really great, thumbs up', 16, 'Nakiranda Elizabeth', 'liz@gmail.com', 0, 'users\\May2019\\yWUrp0ZANAML5AduQ2X9.JPG'),
(17, 4, '2019-04-25 08:43:51', '2019-04-25 08:43:51', 'He\'s really good, a 4 for me', 16, 'Kalema Chris', 'chris@gmail.com', 0, 'users\\April2019\\ITXJELU0DpZLVjBgJK7J.jpeg'),
(18, 4, '2019-04-25 08:45:19', '2019-04-25 08:45:19', 'Delivered the work on time, really great', 16, 'Kasemire Ritah Patrah', 'patrah@gmail.com', 0, 'users\\May2019\\7aIBvnIPgNZyH2sD5d5S.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-02-26 12:12:28', '2019-02-26 12:12:28'),
(2, 'user', 'Normal User', '2019-02-26 12:12:28', '2019-02-26 12:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Get It Done', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'A Web-based freelancing system', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\March2019\\ZO5AGaIFgPmUmtLxoWp0.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Get It Done', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'A Web-based freelancing system', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-02-26 12:13:07', '2019-02-26 12:13:07'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-02-26 12:13:07', '2019-02-26 12:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telNo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `telNo`, `address`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users\\April2019\\M74o6tHrqLxJq3LOKMvI.jpg', NULL, '$2y$10$vad2W8fm74qnglk8rPSBeeXPJ.ilcxIf5fBIkLj9in.291qPnlzSe', 'Tq14d2zgZwM5EFr6il9N7ZO4gO3tuH9Zm3XV2y2BY6kOx7rGiHVj9WLWfrFY', '{\"locale\":\"en\"}', '2019-02-26 12:13:07', '2019-04-04 16:41:44', NULL, NULL),
(3, 2, 'Nsubuga Mike', 'mike@gmail.com', 'users\\April2019\\ZxhWjH90tOqEqjo95QvY.JPG', NULL, '$2y$10$Y1vvPmMks9uUkA6ycLtshexQFM.tOZYj85wG71jO0bCjqKqXYMDSm', 'zq6Hv6wTjTf28Poc778wSBfRFErvgkOZ8zIGkm7nIbcuVCQXl3zVZoe9aFTd', '{\"locale\":\"en\"}', '2019-03-03 04:51:58', '2019-06-04 13:03:50', '256702354937', 'Kawempe'),
(4, 2, 'Nakiranda Elizabeth', 'liz@gmail.com', 'users\\May2019\\yWUrp0ZANAML5AduQ2X9.JPG', NULL, '$2y$10$Twxcfx9Z0vK.wWFDbqM1Re0TKL6bf5Ft1wJmBR4FP94m7iV6vsjL2', 'W5SrIhPPzmWIwTdqAJXTHbxnT4MWLWT61jbf8rC7tyUXq24fNB0xVHo5eV51', NULL, '2019-03-03 04:54:56', '2019-05-03 09:20:51', NULL, NULL),
(5, 2, 'Kalema Chris', 'chris@gmail.com', 'users\\April2019\\ITXJELU0DpZLVjBgJK7J.jpeg', NULL, '$2y$10$JoZos3Y6SnPMHU7apmWhU.Q6tS47xC1FYhnBr3NyWYFsB/ZzMEPMa', 'y6FX9cStDumXR1t49VZIzxRWtEYwFggGeryO0oWEnUKnJFqjh925iSk0ytXO', NULL, '2019-03-30 07:05:33', '2019-04-25 08:39:58', NULL, NULL),
(6, 2, 'Kasemire Ritah Patrah', 'patrah@gmail.com', 'users\\May2019\\7aIBvnIPgNZyH2sD5d5S.jpg', NULL, '$2y$10$dJ4XHqXWKBTUoMbcxlLrUuB0p/Asz.x0MEkAS5emJPKucwMzyj1XO', 'Z2Li8RVmPujkNYWOK55mwz7cn73u1QckA5cgEgcYCGcnstkx7FOb06Fjn93t', NULL, '2019-03-30 07:06:06', '2019-05-03 09:18:45', NULL, NULL),
(7, 2, 'Nabangi Phyllis', 'nabangi@gmail.com', 'users/default.png', NULL, '$2y$10$t3IwofSVy6Iij.VgB6kRN.xWbyfmow73iqEX0Qoh2R4p5CIEZZpQu', NULL, NULL, '2019-03-30 15:44:59', '2019-03-30 15:44:59', NULL, NULL),
(8, 2, 'Kiragga Reagan', 'rigan@gmail.com', 'users/default.png', NULL, '$2y$10$ecwbLS1V4.pr4wVdMHBcAOCywyFMIzj2mn/WkCn6lZf.dqvb/eybq', NULL, NULL, '2019-03-30 15:45:25', '2019-03-30 15:45:25', NULL, NULL),
(9, 2, 'Aturinda John Prince', 'prince@gmail.com', 'users/default.png', NULL, '$2y$10$60ADc63RskjsPLjILDxYV.tzXfmF4M8X8.Z2QkSYVQ98A.XFBHQqq', NULL, NULL, '2019-03-30 15:45:49', '2019-03-30 15:45:49', NULL, NULL),
(10, 2, 'Lyagomba Lambert', 'lambert@gmail.com', 'users/default.png', NULL, '$2y$10$/xiLmORhQXLyaiC5h.15geGS03KYdZh/Qk/BYd3tkYWjRY4vAx7LC', 'r3W8AXxK1prUbjfIlEpmNWzMOpoJIjtkoZXt0xn9fx8N0jLcc9vKAv9AKHOp', NULL, '2019-03-30 15:46:18', '2019-03-30 15:46:18', NULL, NULL),
(11, 2, 'John Doe', 'john@gmail.com', 'users/default.png', NULL, '$2y$10$xWjyofA12kGHWCLupVi2GurbUo3mQIxbglEN6RPFfXD.FyTezZ2xK', 'T4oWjcKdcF1k9xUWxdkaposYTfyw67qsujiNKj91mPTY1MtXAkRYIppPJPWX', NULL, '2019-03-31 07:53:45', '2019-03-31 07:53:45', NULL, NULL),
(12, 2, 'Kebirungi Genny', 'genny@gmail.com', 'users/default.png', NULL, '$2y$10$vla8wOe8wVSKHUddg3pvheyz.LvambE0.wTrPSI.7KgVaiw9/L.5C', 'QFCTc7ZKPME50XUFBuqnLyMec5xAYqqnpFU4eaFU64qGLNpYVc9ig8qrFYGg', NULL, '2019-04-20 08:07:05', '2019-04-20 08:07:05', NULL, NULL),
(13, 2, 'User Mike', 'testing@testing.com', 'users\\userpictures\\kingMike.jpg', NULL, '$2y$10$svoDp6luWRRN9UOe02EdYeLI3r5dHrnmxqDG/af0KVChFYnxukaRy', 'y3zMuDpJQtHqtQr1I8u6LaYP1I9X1fNPbtUBgJZ29GAZCRT6Xuqq8YY28qh2', NULL, '2019-05-30 04:51:00', '2019-06-04 03:57:29', 'User Testing', 'Bwaise'),
(14, 2, 'Test user', 'userTest@gmail.com', 'users/default.png', NULL, '$2y$10$SZI.A2Jci39kn0/Ixyocae3BxfgYM43R5St337Qd19EtOaw/Mt/SS', 'DCa3NC5eZKGnxaZLWWH42eA6E4kYElKxcRfo2vpBg9r1a8NfxNDQyhogcnwX', NULL, '2019-05-30 05:03:47', '2019-06-03 12:57:16', '25670235489', 'test'),
(15, 2, 'sample user', 'sample@gmail.com', 'users/default.png', NULL, '$2y$10$ESOH6g1mtM1/B7DQnB1FDejcpeu6B4Yory8MnfMCcsxb.iUEtwXd.', 'xjrQwkmDvvuELPOeTjJ9vWcDg4RK4PtJNZz8BryMJNmBc9WRod3Xw0Kw7pSx', NULL, '2019-06-03 03:28:51', '2019-06-03 03:28:51', '256702354937', 'Gulu'),
(16, 2, 'sample sample', 's@gmail.com', 'users/default.png', NULL, '$2y$10$vj9e4sYZuY.s5Yhhf/4aRuiqhea8kl7OeHzFu8pF7SbGiZwpcZgJa', 'jvihbaV16cdLuMPRhIU16R7uPHRCuHUNlAqmUOXZJjDIjuu132Hw0BQRRLBh', NULL, '2019-06-03 04:52:04', '2019-06-03 04:52:04', '256', 's'),
(17, 2, 'My User', 'my@gmail.com', 'users/default.png', NULL, '$2y$10$pwAGT5Ivs30UcY8XfjHhM.X/cUai2n.USXQNKZLVN8HXaeo1qt3Se', NULL, NULL, '2019-06-03 14:35:19', '2019-06-03 14:35:19', '256702354937', 'Mubende');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prof_cats`
--
ALTER TABLE `prof_cats`
  ADD CONSTRAINT `prof_cats_job_profile_id_foreign` FOREIGN KEY (`job_profile_id`) REFERENCES `job_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prof_cats_profile_category_id_foreign` FOREIGN KEY (`profile_category_id`) REFERENCES `profile_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
