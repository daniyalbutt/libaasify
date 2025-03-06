-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2025 at 02:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 1, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(2, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 2, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(3, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 3, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(4, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 4, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(5, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 5, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(6, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 6, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(7, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 7, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(8, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 8, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(9, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 9, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(10, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 10, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(11, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 11, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(12, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 12, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(13, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 13, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(14, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 14, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(15, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 15, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(16, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 16, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(17, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 17, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(18, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 18, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(19, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 19, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(20, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 20, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(21, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 21, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(22, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 22, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(23, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 23, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(24, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 24, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(25, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 25, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(26, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 26, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(27, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 27, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(28, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 28, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(29, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 29, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(30, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 30, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(31, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 31, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(32, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 32, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(33, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 33, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(34, 'default', 'App\\Models\\Permission model has been created', 'App\\Models\\Permission', 34, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(35, 'default', 'App\\Models\\Attribute model has been created', 'App\\Models\\Attribute', 1, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(36, 'default', 'App\\Models\\Page model has been created', 'App\\Models\\Page', 1, NULL, NULL, '[]', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(37, 'default', 'App\\Models\\Attribute model has been updated', 'App\\Models\\Attribute', 1, 'App\\Models\\User', 2, '[]', '2025-02-26 18:45:16', '2025-02-26 18:45:16'),
(38, 'default', 'App\\Models\\Attribute model has been created', 'App\\Models\\Attribute', 2, 'App\\Models\\User', 2, '[]', '2025-03-05 17:21:59', '2025-03-05 17:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `is_image` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `status`, `is_image`, `created_at`, `updated_at`) VALUES
(1, 'Color', 'color', 0, 1, '2025-02-26 16:44:20', '2025-02-26 18:45:16'),
(2, 'Size', 'size', 0, 0, '2025-03-05 17:21:59', '2025-03-05 17:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `name`, `attribute_id`, `created_at`, `updated_at`) VALUES
(2, 'Brown', 1, '2025-02-26 18:45:16', '2025-02-26 18:45:16'),
(3, 'Black', 1, '2025-02-26 18:45:16', '2025-02-26 18:45:16'),
(4, '40/6', 2, '2025-03-05 17:21:59', '2025-03-05 17:21:59'),
(5, '41/7', 2, '2025-03-05 17:21:59', '2025-03-05 17:21:59'),
(6, '42/8', 2, '2025-03-05 17:21:59', '2025-03-05 17:21:59'),
(7, '43/9', 2, '2025-03-05 17:21:59', '2025-03-05 17:21:59'),
(8, '44/10', 2, '2025-03-05 17:21:59', '2025-03-05 17:21:59'),
(9, '45/11', 2, '2025-03-05 17:21:59', '2025-03-05 17:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_product`
--

CREATE TABLE `attribute_value_product` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_value_product`
--

INSERT INTO `attribute_value_product` (`id`, `attribute_value_id`, `product_id`, `image`, `addon`, `stock`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, 0.00, 40, NULL, NULL),
(2, 5, 1, NULL, 0.00, 50, NULL, NULL),
(3, 6, 1, NULL, 0.00, 0, NULL, NULL),
(4, 7, 1, NULL, 0.00, 10, NULL, NULL),
(5, 8, 1, NULL, 0.00, 20, NULL, NULL),
(6, 9, 1, NULL, 0.00, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `slug`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', '<p><br></p>', NULL, 'test-category', 0, 0, '2025-02-26 16:44:20', '2025-02-26 16:45:47'),
(2, 'Peshawari', NULL, NULL, 'peshawari', 3, 0, '2025-02-26 16:46:21', '2025-02-26 17:18:24'),
(3, 'Footwear', NULL, NULL, 'shoes', 1, 0, '2025-02-26 17:16:09', '2025-02-26 17:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_value` text COLLATE utf8mb4_unicode_ci,
  `has_image` tinyint NOT NULL DEFAULT '0',
  `is_config` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `flag_type`, `flag_value`, `has_image`, `is_config`, `created_at`, `updated_at`) VALUES
(1, 'Favicon', 'favicon', '', 1, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(2, 'Logo', 'logo', '', 1, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(3, 'Footer Logo', 'footer_logo', '', 1, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(4, 'Company Number', 'company_number', '+1 123 456 7890', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(5, 'Company Email', 'company_email', 'info@companyemail.com', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(6, 'Company Address', 'company_address', 'The visual form of a document or a typeface.', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(7, 'Facebook', 'facebook', 'https://www.facebook.com/', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(8, 'Twitter', 'twitter', 'https://twitter.com/', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(9, 'Instagram', 'instagram', 'https://www.instagram.com/', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(10, 'Linkedin', 'linkedin', 'https://www.linkedin.com/', 0, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(11, 'Footer Content', 'footer_content', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 2, 1, '2025-02-26 16:44:20', '2025-02-26 16:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forget_passwords`
--

CREATE TABLE `forget_passwords` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `otp` bigint NOT NULL,
  `status` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_08_01_183154_create_pages_table', 1),
(9, '2018_08_04_122319_create_settings_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_12_30_182248_create_configs_table', 1),
(13, '2022_12_31_195050_create_banners_table', 1),
(14, '2022_12_31_221647_create_categories_table', 1),
(15, '2023_01_10_173634_add_status_to_users_table', 1),
(16, '2023_01_10_181440_create_activity_log_table', 1),
(17, '2023_01_29_113713_create_products_table', 1),
(18, '2023_01_30_185931_add_stock_to_products_table', 1),
(19, '2023_03_01_113532_create_permission_tables', 1),
(20, '2023_03_17_183857_create_attributes_table', 1),
(21, '2023_03_26_014152_create_attribute_values_table', 1),
(22, '2023_06_13_224904_create_sections_table', 1),
(23, '2023_06_15_165238_create_inquiries_table', 1),
(24, '2023_07_25_182631_create_testimonials_table', 1),
(25, '2024_07_04_233122_create_forget_passwords_table', 1),
(26, '2024_08_27_195444_create_orders_table', 1),
(27, '2024_08_27_195804_create_order_products_table', 1),
(28, '2024_08_29_172106_wishlists', 1),
(29, '2024_08_30_194144_add_column_to_products_table', 1),
(30, '2024_08_30_222557_add_column_to_pages_table', 1),
(31, '2024_08_31_001238_create_blogs_table', 1),
(32, '2024_08_31_010302_create_faqs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Stripe',
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Home', 'home', NULL, '2025-02-26 16:44:20', '2025-02-26 16:44:20', 'no-image');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(2, 'create role', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(3, 'edit role', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(4, 'delete role', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(5, 'permission', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(6, 'create permission', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(7, 'edit permission', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(8, 'delete permission', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(9, 'user', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(10, 'create user', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(11, 'edit user', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(12, 'delete user', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(13, 'product', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(14, 'create product', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(15, 'edit product', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(16, 'delete product', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(17, 'attribute', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(18, 'create attribute', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(19, 'edit attribute', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(20, 'delete attribute', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(21, 'category', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(22, 'create category', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(23, 'edit category', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(24, 'delete category', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(25, 'page', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(26, 'create page', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(27, 'edit page', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(28, 'delete page', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(29, 'edit config', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(30, 'delete config', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(31, 'logo edit', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(32, 'favicon edit', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(33, 'order', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(34, 'delete order', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `new_product` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `trending` tinyint(1) NOT NULL DEFAULT '0',
  `deals` tinyint(1) NOT NULL DEFAULT '0',
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `image`, `images`, `discount`, `slug`, `short_desc`, `description`, `featured`, `status`, `new_product`, `created_at`, `updated_at`, `stock`, `trending`, `deals`, `sku`) VALUES
(1, 'Peshawari - Men', 1999.00, 2, 'uploads/products/1740606780.jpg', '[\"uploads/products/1740613322_1.jpg\", \"uploads/products/1740613322_2.jpg\", \"uploads/products/1740613322_3.jpg\"]', 2499.00, 'peshawari-men', '<p><br></p>', '<p>Discover the perfect fusion of comfort and tradition in these men\'s Peshawari chappals.</p>\r\n<p>These shoes have been made with good quality Man Made Leather material that gives them durability.</p>\r\n<p>These timeless peshawaris feature a square toe shape and a comfortable insole.</p>\r\n<p>The PVC outsole provides good grip and keeps the shoe light.</p>', 0, 1, 1, '2025-02-26 16:44:20', '2025-02-26 18:42:02', 53, 0, 0, '861-4576');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(2, 'admin', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20'),
(3, 'customer', 'web', '2025-02-26 16:44:20', '2025-02-26 16:44:20');

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
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'super', 'info@super.com', '0', NULL, NULL, '$2y$10$XSXNTzdSip7UCH8F9D8F0.igWoQC11g93bFI.QgsiYnSHXPtcM.nu', NULL, '2025-02-26 16:44:20', '2025-02-26 16:44:20', 0),
(2, 'admin', 'info@admin.com', '1', NULL, NULL, '$2y$10$A./R41hTSU4d3thM.y60duzUJiH6Uxg.xERM5iq/xZE.pZHncJDKe', NULL, '2025-02-26 16:44:20', '2025-02-26 16:44:20', 0),
(3, 'user', 'info@user.com', '2', NULL, NULL, '$2y$10$MQn.zKATXS8muXqpz2uP6ujlbpCXfDHTqj7ZeCiVyrz3ODWgC8DEy', NULL, '2025-02-26 16:44:20', '2025-02-26 16:44:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_name_unique` (`name`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_value_product`
--
ALTER TABLE `attribute_value_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_passwords`
--
ALTER TABLE `forget_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute_value_product`
--
ALTER TABLE `attribute_value_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forget_passwords`
--
ALTER TABLE `forget_passwords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
