-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 01:56 PM
-- Server version: 8.0.32-0ubuntu0.22.10.2
-- PHP Version: 8.1.7-1ubuntu3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sds`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_earnings`
--

CREATE TABLE `affiliate_earnings` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `affiliate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `cat_id` bigint UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `type`, `cat_id`, `description`, `image`, `visits`, `created_at`, `updated_at`) VALUES
(1, 'Illustrating the Worldwide State of 5G (Poster Download)', 'Feature', 1, 'Our recent analysis showed that the global average for 5G speeds is stabilizing even as 5G access increases. To fully appreciate how far 5G has expanded, we’ve created a high-resolution downloadable poster (mobile friendly version available here) that also highlights major 5G achievements around the world. This poster maps 5G coverage and highlights the countries with the fastest 5G. Download the Ookla® State of 5G Worldwide poster here to see the global state of 5G. It works as a desktop background or you can hang it on your wall.  If you’re at Mobile World Congress this year, stop by Booth 2i28 in Hall 2, to say hello.', 'image/blogs/1762439237893670.png', '20', '2023-03-29 11:50:56', '2023-04-06 08:57:15'),
(2, 'How Wireless Infrastructure Providers Can Maximize ROI with Crowdsourced Network Intelligence, Data-Driven Decisions for Tower Companies, DAS, Neutral Host, and Other Providers.', 'Feature', 1, 'As providers of cellular infrastructure look to deploy more assets and grow their co-location opportunities, they need the right data to guide those decisions. Wireless infrastructure companies can now use real-world measurements of network performance, user density, data usage, and other indicators to determine the best locations for investments or partnerships. Discover how wireless infrastructure companies can use actionable network insights in Cell Analytics™ to make smarter engineering, real estate, and co-location decisions — for a better ROI.     In this webinar, you’ll learn how crowdsourced network insights can help your team:  Make more informed planning decisions  Better prioritize future deployments and investments Benchmark the performance, quality, and availability of existing indoor and outdoor networks Identify buildings and areas with high user concentration and data usage Drive a more efficient sales process with per-building intelligence.', 'image/blogs/1762438913847938.png', '22', '2023-03-29 11:54:04', '2023-04-06 08:52:07'),
(3, '5G City Benchmark Report 2022', 'Normal', 1, 'An analysis of 5G performance and 5G Availability in major cities worldwide during Q3-Q4 2022,  With lightning-fast network speeds and ultra-low latency, 5G has ushered in not only a new era of improved network performance, but also enabled new connected experiences for users. To support these next-generation capabilities, it\'s imperative for mobile operators to ensure widely available, consistently high-performing 5G network deployments. Our city-level analysis explores which markets and operators are pushing the boundaries of 5G network performance — and where 5G throughput and coverage are falling behind.  In this white paper, you’ll find:  5G download speed, 5G upload speed, and 5G Availability for 40 major cities  Top mobile network operator 5G performance and 5G Availability within 10 select cities Trends for 5G launches and rollouts in various regions of the world  Analysis of the 5G performance versus availability trade-off  Please note: This analysis is not based on an exhaustive list of all cities with 5G, but a representative sampling from around the globe.', 'image/blogs/1762438559686902.png', '16', '2023-03-29 11:54:35', '2023-04-06 08:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_names`, `created_at`, `updated_at`) VALUES
(1, 'business', '2023-03-29 11:50:25', '2023-03-29 11:50:25'),
(2, 'Application', '2023-03-29 11:53:11', '2023-03-29 11:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enquiryType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromWhereHeard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laravisits`
--

CREATE TABLE `laravisits` (
  `id` bigint UNSIGNED NOT NULL,
  `visitable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitable_id` bigint UNSIGNED NOT NULL,
  `data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_05_124104_create_sessions_table', 1),
(7, '2022_10_10_160913_create_sliders_table', 1),
(8, '2022_10_11_174519_create_features_table', 1),
(9, '2022_10_12_095241_create_portfolios_table', 1),
(10, '2022_10_13_204650_create_partners_table', 1),
(11, '2023_01_25_071039_create_subscribers_table', 1),
(12, '2023_02_18_060512_create_blog_categories_table', 1),
(13, '2023_02_18_093020_create_blogs_table', 1),
(14, '2023_02_22_164924_create_laravisits_table', 1),
(15, '2023_02_27_131542_create_contacts_table', 1),
(16, '2023_03_11_063332_create_permission_tables', 1),
(17, '2023_04_03_083838_create_jobs_table', 1),
(18, '2023_04_05_152048_create_departments_table', 1),
(19, '2023_04_05_152055_create_team_members_table', 1),
(20, '2023_04_05_153023_create_services_table', 1),
(21, '2023_04_05_153102_create_product_types_table', 1),
(22, '2023_04_05_153103_create_products_table', 1),
(23, '2023_04_05_153508_create_orders_table', 1),
(24, '2023_04_05_153530_create_affiliate_earnings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companySize` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `affiliate_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'real',
  `quality` tinyint NOT NULL,
  `earnings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view dashboard', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(2, 'create slider', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(3, 'view slider', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(4, 'edit slider', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(5, 'delete slider', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(6, 'create services', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(7, 'view services', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(8, 'edit services', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(9, 'delete services', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(10, 'create products', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(11, 'view products', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(12, 'edit products', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(13, 'delete products', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(14, 'create features', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(15, 'view features', 'web', '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(16, 'edit features', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(17, 'delete features', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(18, 'create portfolio', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(19, 'view portfolio', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(20, 'edit portfolio', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(21, 'delete portfolio', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(22, 'create partner', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(23, 'view partner', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(24, 'edit partner', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(25, 'delete partner', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(26, 'create service', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(27, 'view service', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(28, 'edit service', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(29, 'delete service', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(30, 'create subscribers', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(31, 'view subscribers', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(32, 'edit subscribers', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(33, 'delete subscribers', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(34, 'create blogs', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(35, 'view blogs', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(36, 'edit blogs', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(37, 'delete blogs', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(38, 'create messages', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(39, 'view messages', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(40, 'edit messages', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(41, 'delete messages', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(42, 'create teams', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(43, 'view teams', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(44, 'edit teams', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(45, 'delete teams', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(46, 'create roles', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(47, 'view roles', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(48, 'edit roles', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(49, 'delete roles', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(50, 'create users', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(51, 'view users', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(52, 'edit users', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(53, 'delete users', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(54, 'share links', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(55, 'affiliate dashboard', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(56, 'affiliate service', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `platinum_des` text COLLATE utf8mb4_unicode_ci,
  `platinum_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gold_des` text COLLATE utf8mb4_unicode_ci,
  `gold_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `silver_des` text COLLATE utf8mb4_unicode_ci,
  `silver_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `product_type_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `platinum_des`, `platinum_price`, `gold_des`, `gold_price`, `silver_des`, `silver_price`, `image`, `service_id`, `product_type_id`, `created_at`, `updated_at`) VALUES
(2, 'Biometric Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '700', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '500', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '400', 'image/service/1762360652195323.jpg', 1, 1, '2023-03-29 14:34:19', '2023-04-05 12:08:10'),
(3, 'Software Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '700', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '500', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '400', 'image/service/1762360409937381.jpg', 1, 1, '2023-03-29 14:36:13', '2023-04-05 12:04:19'),
(5, 'E-Commerce Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762088543014890.jpg', 1, 1, '2023-04-02 12:03:06', '2023-04-02 12:08:27'),
(6, 'Web & Apps Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762089176012111.jpg', 1, 1, '2023-04-02 12:13:10', '2023-04-05 12:08:56'),
(7, 'Robotics Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762089315366883.jpg', 1, 1, '2023-04-02 12:15:23', NULL),
(8, 'IoT Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762089486505611.jpg', 1, 1, '2023-04-02 12:18:06', NULL),
(9, 'Network Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762091003362543.jpg', 1, 1, '2023-04-02 12:37:36', '2023-04-02 12:42:13'),
(10, 'Cloud Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762090980884571.jpeg', 1, 1, '2023-04-02 12:41:52', NULL),
(11, 'Industry Devt. & Solution', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '10000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '5000', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '2500', 'image/service/1762091167640497.jpeg', 1, 1, '2023-04-02 12:44:49', NULL),
(12, 'Et et voluptatum dol', 'Minus pariatur Duis', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '527', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '162', '[\"Non ad eu eiusmod co\",\"Maxime qui cumque in\",\"Perspiciatis labori\",\"Et error voluptatem\",\"Sed dolores enim sun\",\"Corrupti aliquip be\",\"Est quibusdam deseru\",\"Tempore praesentium\",\"Dolores Nam quo exer\",\"Labore et labore eos\",\"Illo in et doloremqu\",\"Labore quae sunt fug\"]', '248', 'image/products/1763793368362386.png', 1, 1, '2023-04-21 07:40:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'For Programming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(2, 'affiliated', 'web', '2023-04-21 06:08:33', '2023-04-21 06:08:33'),
(3, 'tester', 'web', '2023-03-30 08:05:16', '2023-04-02 04:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 2),
(56, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test service', 'image/service/1763792602307930.png', 'Test description', '2023-04-21 07:28:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AvyyhGBOBrtJ9UBNpDcT2y3HsdU7DuTOh67G5QVf', 7, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJmcW9BcE05VzdjSUJzSE1vZk5QdmtoSHlyMk9XdDZybmxZNko0ZkM2IjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDFLOXNvUmt1UUd4SlUzUkVxSHo0RS5qQjZnV0NuQkZpNEpMbnhUNkpKUkF6QW1FdWpISTVPIjt9', 1682085305);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `uniqueId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentMethod` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `uniqueId`, `phone`, `whatsapp`, `paymentMethod`, `cardNumber`, `address`, `platform`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ULyVDqGj/M.ZCj8N8n9dduQwKTu6buDdySdorqzezmup0itmt9Pk6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-04-21 06:08:32', '2023-04-21 06:08:32'),
(2, 'Monir', 'monir@gmail.com', NULL, '$2y$10$inRCAE4IjsuZgu7A9.9GvOrojXyibu2SNjRk6gHJ3k6WiJ6ecfuLe', NULL, NULL, NULL, '4ecc4a38-4eb1-42ce-8a39-54d9aef61973', '123456789111', '012345678900', 'bkash', '01234567892', 'Boalkhali, Chattogram\r\nBoalkhali, Chattogram', NULL, 1, NULL, NULL, NULL, '2023-03-29 11:23:31', '2023-03-29 11:24:58'),
(3, 'Rakib vai', 'rakib1212@gmail.com', NULL, '$2y$10$UZrAkWy6k5MqyfQNXPu.j.GfNt1HE5fabY/AqPXtIMzyoY7KOsyOi', NULL, NULL, NULL, '2503f10f-22a7-4dc5-a5cf-3ad1cdf046d5', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-03-30 08:04:00', '2023-03-30 08:04:00'),
(5, 'CEO', 'rakib1234@sdsincbd.com', NULL, '$2y$10$RtmeVzOWVDipoerKYMWQN.0Vs5bDrixbm1Lj.ugf.64jzjY47K3Y2', NULL, NULL, NULL, 'fb30518a-d2e2-4e08-9624-eb778aacfc58', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-04-02 00:10:59', '2023-04-02 00:10:59'),
(7, 'nurulkomor', 'nurulkomor123@gmail.com', NULL, '$2y$10$1K9soRkuQGxJU3REqHz4E.jB6gWCnBFi4JLnxT6JJRAzAmEujHI5O', NULL, NULL, NULL, '1dc28f0a-dbf7-4484-8093-c254abc6d7e4', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-04-06 09:59:27', '2023-04-06 09:59:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliate_earnings`
--
ALTER TABLE `affiliate_earnings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `affiliate_earnings_order_id_unique` (`order_id`),
  ADD KEY `affiliate_earnings_product_id_foreign` (`product_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `laravisits`
--
ALTER TABLE `laravisits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laravisits_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_service_id_foreign` (`service_id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_members_email_unique` (`email`),
  ADD UNIQUE KEY `team_members_phone_unique` (`phone`),
  ADD KEY `team_members_department_id_foreign` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_uniqueid_unique` (`uniqueId`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_whatsapp_unique` (`whatsapp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliate_earnings`
--
ALTER TABLE `affiliate_earnings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laravisits`
--
ALTER TABLE `laravisits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affiliate_earnings`
--
ALTER TABLE `affiliate_earnings`
  ADD CONSTRAINT `affiliate_earnings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `affiliate_earnings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`),
  ADD CONSTRAINT `products_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
