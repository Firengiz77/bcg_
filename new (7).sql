-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 14 Nis 2024, 21:56:31
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `new`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `signature_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"ggg\"}', '2024-04-12 10:59:39', '2024-04-12 10:59:39'),
(2, '{\"az\":\"aaaaaaa\"}', '2024-04-12 11:13:36', '2024-04-12 11:13:36'),
(3, '{\"az\":\"ssssssssss\"}', '2024-04-12 11:13:39', '2024-04-12 11:13:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `brand`
--

INSERT INTO `brand` (`id`, `image`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/brand/brand_image1713131074.png', 'dsfsdf', 'dsfsdfdsf', '2024-04-09 08:21:06', '2024-04-14 21:44:34'),
(2, 'uploads/brand/brand_image1713131084.png', 'Vielka Morris', 'Consequuntur elit m', '2024-04-14 21:44:44', '2024-04-14 21:44:44'),
(3, 'uploads/brand/brand_image1713131090.png', 'Dolan Padilla', 'Vero dolor officia n', '2024-04-14 21:44:50', '2024-04-14 21:44:50'),
(4, 'uploads/brand/brand_image1713131097.png', 'Channing Duran', 'Voluptatem beatae l', '2024-04-14 21:44:57', '2024-04-14 21:44:57'),
(5, 'uploads/brand/brand_image1713131102.png', 'Nell Weeks', 'Odit non labore erro', '2024-04-14 21:45:02', '2024-04-14 21:45:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Konveksiyon Sobalar - Retigo\"}', '{\"az\":\"konveksiyon-sobalar-retigo\"}', NULL, NULL, NULL, '2024-04-12 10:41:17', '2024-04-12 10:41:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `client`
--

INSERT INTO `client` (`id`, `image`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/client/client_image1712648724.png', 'az', 'sdfsdfsdfds', '2024-04-09 07:45:24', '2024-04-09 07:55:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Blog Created', 'New', 1, '2024-03-18 03:09:26', '2024-03-18 03:09:26'),
(2, 'Notification to subscriptions', 'New', 1, '2024-03-18 03:09:26', '2024-03-18 03:09:26'),
(5, 'Contact', 'New', 1, '2024-03-18 03:09:26', '2024-03-18 03:09:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_template_image`
--

DROP TABLE IF EXISTS `email_template_image`;
CREATE TABLE IF NOT EXISTS `email_template_image` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `email_template_image`
--

INSERT INTO `email_template_image` (`id`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(9, 2, 'http://localhost/storage/app/email_template_image/e8329e4b2b8a77b321c6eb111d3b0e34.png', '2024-03-25 08:05:09', '2024-03-25 08:05:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_template_langs`
--

DROP TABLE IF EXISTS `email_template_langs`;
CREATE TABLE IF NOT EXISTS `email_template_langs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `email_template_langs`
--

INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(5, 1, 'en', 'Blog', '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p><br></p><p>Thanks,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 14:50:58'),
(15, 1, 'tr', 'Order Complete', '<p>Merhaba,&nbsp;</p><p>{app_name}\'e hoş geldiniz.</p><p><br></p><p>Teşekkürler,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 15:31:16'),
(21, 2, 'en', 'Order Status', '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p><br></p><p>Thanks,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 15:26:55'),
(31, 2, 'tr', 'Order Status', '<p>Merhaba,&nbsp;</p><p>{app_name}\'e hoş geldiniz.</p><p><br></p><p>Teşekkürler,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-23 15:27:08'),
(65, 1, 'az', 'Order Complete', '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p><br></p><p>Thanks,</p><p>{app_name}</p><p><br></p>', '2024-03-21 08:13:53', '2024-03-23 15:30:46'),
(66, 2, 'az', 'Hello', '<p style=\"text-align: center;\"><img src=\"https://www.markup.az/uploads/setting/logo/1739517519660738.png\" alt=\"markup logo\"></p><p style=\"text-align: center;\">MarkUp</p>', '2024-03-21 08:13:53', '2024-03-23 16:09:45'),
(69, 5, 'en', 'Contact', '<p>Ad : {form_name}<br></p><p>Email: {form_email}</p><p>Telefon: {form_phone}<span style=\"font-family: var(--bs-body-font-family); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"font-family: var(--bs-body-font-family); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Qeyd:&nbsp; {form_message}</span></p><p><br></p><p><br></p><p>Təşəkkürlər,</p><p>{app_name}</p><p><br></p>', '2024-03-18 03:09:26', '2024-03-29 03:31:30'),
(70, 5, 'az', 'Contact', '<p>Ad : {form_name}<br></p><p>Email: {form_email}</p><p>Telefon: <span style=\"font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">{</span><span style=\"text-align: var(--bs-body-text-align);\">form_</span><span style=\"font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">phone}</span></p><p>Qeyd: {form_message}</p><p><br></p><p>Təşəkkürlər,</p><p>{app_name}</p><p><br></p>', '2024-03-28 18:21:44', '2024-03-29 03:28:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home_pages`
--

DROP TABLE IF EXISTS `home_pages`;
CREATE TABLE IF NOT EXISTS `home_pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_1` text COLLATE utf8mb4_unicode_ci,
  `title_2` text COLLATE utf8mb4_unicode_ci,
  `title_3` text COLLATE utf8mb4_unicode_ci,
  `title_4` text COLLATE utf8mb4_unicode_ci,
  `detail_1` text COLLATE utf8mb4_unicode_ci,
  `detail_2` text COLLATE utf8mb4_unicode_ci,
  `detail_3` text COLLATE utf8mb4_unicode_ci,
  `detail_4` text COLLATE utf8mb4_unicode_ci,
  `kitchen` int DEFAULT NULL,
  `experience` int DEFAULT NULL,
  `customer` int DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `home_pages`
--

INSERT INTO `home_pages` (`id`, `detail`, `name`, `image`, `signature_image`, `title_1`, `title_2`, `title_3`, `title_4`, `detail_1`, `detail_2`, `detail_3`, `detail_4`, `kitchen`, `experience`, `customer`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Biz kiçik şirkətik amma ürəyimiz, arzularımız və hədəflərimiz böyükdür!\",\"tr\":\"Incididunt rerum vol\"}', '{\"az\":\"Jone Doe\",\"tr\":\"Brielle Hogan\"}', 'uploads/homepage/homepage_image1712416494.png', 'uploads/homepage/homepage_signature_image1712416494.png', '{\"az\":\"Distribyutorluq\",\"tr\":\"Nostrud elit quia p\"}', '{\"az\":\"Peşəkarlıq\",\"tr\":\"Consectetur velit a\"}', '{\"az\":\"Təcrübə\",\"tr\":\"Totam dolorem in mag\"}', '{\"az\":\"Servis Xidməti\",\"tr\":\"Magna suscipit sed a\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Eum doloribus sed do\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Dolorem repudiandae\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Laborum Consequat\"}', '{\"az\":\"Satışını etdiyimiz məhsulların Azərbaycanda rəsmi\\r\\n                    nümayəndəliyi bizə məxsusdur.\",\"tr\":\"Omnis consequatur qu\"}', 50, 20, 150, '{\"az\":\"Ut sunt reprehenderi\",\"tr\":\"Ut sunt reprehenderi\"}', '{\"az\":\"Cupiditate ullam vel\",\"tr\":\"Cupiditate ullam vel\"}', '{\"az\":\"Sit aut autem vel vo\",\"tr\":\"Sit aut autem vel vo\"}', NULL, '2024-04-06 15:14:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint UNSIGNED DEFAULT NULL,
  `input` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_model_id_foreign` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `name`, `model`, `model_id`, `input`, `type`, `status`, `created_at`, `updated_at`) VALUES
(21, 'page_1711392157.png', 'Page', 8, 'image', 2, 1, '2024-03-25 14:42:37', '2024-03-25 14:42:37'),
(69, 'about_1711402574.png', 'About', 1, 'image', 2, 1, '2024-03-25 17:36:14', '2024-03-25 17:36:14'),
(79, 'homepage_1711539370.png', 'HomePage', 1, 'video', 2, 1, '2024-03-27 07:36:10', '2024-03-27 07:36:10'),
(78, 'homepage_1711539361.png', 'HomePage', 1, 'hero', 2, 1, '2024-03-27 07:36:01', '2024-03-27 07:36:01'),
(80, 'service_1711553864.png', 'Service', 1, 'image', 2, 1, '2024-03-27 11:37:44', '2024-03-27 11:37:44'),
(81, 'service_1711553864.png', 'Service', 1, 'home', 2, 1, '2024-03-27 11:37:44', '2024-03-27 11:37:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`id`, `code`, `fullName`, `created_at`, `updated_at`) VALUES
(5, 'en', 'English', '2024-03-18 03:09:26', '2024-03-18 03:09:26'),
(15, 'tr', 'Turkish', '2024-03-18 03:09:26', '2024-03-18 03:09:26'),
(17, 'az', 'Azerbaijan', '2024-03-21 08:13:53', '2024-03-21 08:13:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_16_144239_create_plans_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_09_28_102009_create_settings_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2020_04_12_095629_create_coupons_table', 1),
(8, '2020_04_12_120749_create_user_coupons_table', 1),
(9, '2020_05_02_075614_create_email_templates_table', 1),
(10, '2020_05_02_075630_create_email_template_langs_table', 1),
(11, '2020_05_02_075647_create_user_email_templates_table', 1),
(12, '2020_05_21_065337_create_permission_tables', 1),
(13, '2021_02_02_085506_create_stores_table', 1),
(14, '2021_02_02_094240_create_user_stores_table', 1),
(15, '2021_02_03_093659_create_product_categories_table', 1),
(16, '2021_02_03_110342_create_product_taxes_table', 1),
(17, '2021_02_03_112228_create_shippings_table', 1),
(18, '2021_02_04_034943_create_products_table', 1),
(19, '2021_02_06_042547_create_subscriptions_table', 1),
(20, '2021_02_08_063716_create_product_images_table', 1),
(21, '2021_02_13_053126_create_orders_table', 1),
(22, '2021_02_15_071203_create_user_details_table', 1),
(23, '2021_02_17_070453_create_rattings_table', 1),
(24, '2021_02_26_061007_create_visits_table', 1),
(25, '2021_03_04_110817_create_plan_orders_table', 1),
(26, '2021_03_23_094310_create_product_variant_options_table', 1),
(27, '2021_04_03_063418_create_locations_table', 1),
(28, '2021_04_07_070019_create_page_options_table', 1),
(29, '2021_04_08_043538_create_blogs_table', 1),
(30, '2021_04_10_034521_create_product_coupons_table', 1),
(31, '2021_04_15_121323_create_blog_socials_table', 1),
(32, '2021_06_03_101323_create_admin_payment_settings', 1),
(33, '2021_06_25_041037_create_custom_massage_table', 1),
(34, '2021_07_07_084829_create_store_theme_settings_table', 1),
(35, '2021_11_17_115318_create_plan_requests_table', 1),
(36, '2022_01_10_052633_create__customers_table', 1),
(37, '2022_01_10_092146_create_purchased_products_table', 1),
(38, '2022_07_08_044639_create_store_payment_settings', 1),
(39, '2023_04_03_072342_create_pixel_fields_table', 1),
(40, '2023_05_25_062348_create_webhooks_table', 1),
(41, '2023_05_30_064523_create_express_checkout_table', 1),
(42, '2023_06_05_043450_create_landing_page_settings_table', 1),
(43, '2023_06_06_041522_create_template_table', 1),
(44, '2023_06_10_114031_create_join_us_table', 1),
(45, '2023_06_27_113741_create_languages_table', 1),
(46, '2023_12_11_110313_add_is_active_to_users_table', 1),
(47, '2024_01_27_032719_add_trial_plan_to_users_table', 1),
(48, '2024_01_27_032746_add_trial_to_plans_table', 1),
(49, '2024_01_29_101219_add_is_refund_to_plan_orders_table', 1),
(50, '2024_03_21_123049_create_pages_table', 2),
(51, '2024_03_23_094738_email_templates_image', 3),
(66, '2024_03_25_125246_create_home_pages_table', 14),
(53, '2024_03_25_150800_create_seo_table', 4),
(54, '2024_03_25_161204_create_images_table', 4),
(56, '2024_03_25_210404_create_abouts_table', 6),
(59, '2024_03_25_214144_create_services_table', 7),
(60, '2024_03_27_103421_create_home_page_images_table', 8),
(61, '2024_03_28_134238_create_social_settings_table', 9),
(62, '2024_03_28_195446_create_service_images_table', 10),
(63, '2024_04_01_124813_create_our_values_table', 11),
(64, '2024_04_01_144855_create_faqs_table', 12),
(65, '2024_04_05_113121_create_slides_table', 13),
(91, '1712601210_create_slide_table', 27),
(68, '1712648336_create_client_table', 16),
(69, '1712649417_create_brand_table', 17),
(89, '1712908935_create_product_attribute_table', 25),
(71, '1712661460_create_about_table', 19),
(73, '1712664426_create_service_table', 21),
(90, '1712906087_create_productimage_table', 26),
(87, '1712661683_create_product_table', 24),
(86, '1712652727_create_category_table', 24),
(88, '1712908935_create_attribute_table', 25);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `title`, `detail`, `category_id`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(39, '{\"az\":\"Tenetur sit quia ex\"}', '{\"az\":\"Explicabo Dolor nih\"}', 1, '{\"az\":null}', '{\"az\":null}', '{\"az\":null}', '2024-04-13 21:15:33', '2024-04-13 21:15:33'),
(40, '{\"az\":\"Tenetur sit quia ex\"}', '{\"az\":\"Explicabo Dolor nih\"}', 1, '{\"az\":null}', '{\"az\":null}', '{\"az\":null}', '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(41, '{\"az\":\"Tenetur sit quia ex\"}', '{\"az\":\"Explicabo Dolor nih\"}', 1, '{\"az\":null}', '{\"az\":null}', '{\"az\":null}', '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(42, '{\"az\":\"Tenetur sit quia ex\"}', '{\"az\":\"Explicabo Dolor nih\"}', 1, '{\"az\":null}', '{\"az\":null}', '{\"az\":null}', '2024-04-13 21:20:08', '2024-04-13 21:20:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `productimage`
--

DROP TABLE IF EXISTS `productimage`;
CREATE TABLE IF NOT EXISTS `productimage` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productimage_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `productimage`
--

INSERT INTO `productimage` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 'uploads/productimage/Wc1XtAemd7FF4B8qZnPWcvj3d2eh4MCQSnbOQCqU.jpg', 41, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(19, 'uploads/productimage/Ifkr8KI8y4xrjYljBaJE1goOi6D0d2tQDq3rO5Dy.png', 41, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(20, 'uploads/productimage/43FOQQ1Xh6BiHJiIzk8mwaMpncQMqp6mhDDBJVkB.png', 41, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(21, 'uploads/productimage/sXNYwhGcrvybSnlnwVbGjgGWuPgYOQ2PQHPg7cb2.png', 41, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(22, 'uploads/productimage/pcCC8bVDQxWKT3B18TR4fBUTVG24b1eo5a4FJ8kU.jpg', 42, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(23, 'uploads/productimage/HhzHe8PCjCJJcVsxJdMD9TshFNRGQ6MNP1D1UwGG.png', 42, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(24, 'uploads/productimage/8GYo3cQchU8Y3KlD8iRDr3THqNFIpubQ9nlhvN2K.png', 42, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(25, 'uploads/productimage/3SwkiYnD66YzkZgk3AX0r8POKh46heKSWuSHvVf3.png', 42, '2024-04-13 21:20:08', '2024-04-13 21:20:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
CREATE TABLE IF NOT EXISTS `product_attribute` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attribute_attribute_id_foreign` (`attribute_id`),
  KEY `product_attribute_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seo`
--

DROP TABLE IF EXISTS `seo`;
CREATE TABLE IF NOT EXISTS `seo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seo_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `seo`
--

INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\HomePage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 15:59:04', '2024-03-25 15:59:04'),
(2, 'App\\Models\\HomePage', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 17:24:03', '2024-03-25 17:24:03'),
(3, 'App\\Models\\HomePage', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 17:26:39', '2024-03-25 17:26:39'),
(4, 'App\\Models\\About', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 17:30:08', '2024-03-25 17:30:08'),
(5, 'App\\Models\\About', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 08:08:39', '2024-04-05 08:08:39'),
(6, 'App\\Models\\Slide', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 18:38:16', '2024-04-08 18:38:16'),
(7, 'App\\Models\\Slide', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 18:38:33', '2024-04-08 18:38:33'),
(8, 'App\\Models\\Client', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 07:45:24', '2024-04-09 07:45:24'),
(9, 'App\\Models\\Brand', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 08:21:06', '2024-04-09 08:21:06'),
(10, 'App\\Models\\Product', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-09 11:22:46', '2024-04-09 11:22:46'),
(11, 'App\\Models\\Category', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 07:01:21', '2024-04-12 07:01:21'),
(12, 'App\\Models\\ProductImage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 07:46:32', '2024-04-12 07:46:32'),
(13, 'App\\Models\\Product', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:00:37', '2024-04-12 08:00:37'),
(14, 'App\\Models\\Category', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:36:08', '2024-04-12 08:36:08'),
(15, 'App\\Models\\Category', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:36:22', '2024-04-12 08:36:22'),
(16, 'App\\Models\\Category', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:36:36', '2024-04-12 08:36:36'),
(17, 'App\\Models\\Product', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 08:38:39', '2024-04-12 08:38:39'),
(18, 'App\\Models\\Attribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 09:18:53', '2024-04-12 09:18:53'),
(19, 'App\\Models\\Attribute', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 09:19:01', '2024-04-12 09:19:01'),
(20, 'App\\Models\\Category', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 10:41:17', '2024-04-12 10:41:17'),
(21, 'App\\Models\\Product', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 10:41:26', '2024-04-12 10:41:26'),
(22, 'App\\Models\\Attribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 10:59:39', '2024-04-12 10:59:39'),
(23, 'App\\Models\\Attribute', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:13:36', '2024-04-12 11:13:36'),
(24, 'App\\Models\\Attribute', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:13:39', '2024-04-12 11:13:39'),
(25, 'App\\Models\\ProductAttribute', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:24:14', '2024-04-12 11:24:14'),
(26, 'App\\Models\\ProductImage', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 11:30:21', '2024-04-12 11:30:21'),
(27, 'App\\Models\\Product', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:28:31', '2024-04-12 12:28:31'),
(28, 'App\\Models\\Product', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:28:57', '2024-04-12 12:28:57'),
(29, 'App\\Models\\Product', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:30:26', '2024-04-12 12:30:26'),
(30, 'App\\Models\\Product', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:34:33', '2024-04-12 12:34:33'),
(31, 'App\\Models\\ProductImage', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:34:33', '2024-04-12 12:34:33'),
(32, 'App\\Models\\Product', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:42:25', '2024-04-12 12:42:25'),
(33, 'App\\Models\\ProductImage', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:42:25', '2024-04-12 12:42:25'),
(34, 'App\\Models\\Product', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:45:01', '2024-04-12 12:45:01'),
(35, 'App\\Models\\ProductImage', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:45:01', '2024-04-12 12:45:01'),
(36, 'App\\Models\\Product', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:46:34', '2024-04-12 12:46:34'),
(37, 'App\\Models\\ProductImage', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-12 12:46:35', '2024-04-12 12:46:35'),
(38, 'App\\Models\\Product', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:18:34', '2024-04-13 16:18:34'),
(39, 'App\\Models\\ProductImage', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:18:34', '2024-04-13 16:18:34'),
(40, 'App\\Models\\Product', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:35', '2024-04-13 16:21:35'),
(41, 'App\\Models\\ProductImage', 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:35', '2024-04-13 16:21:35'),
(42, 'App\\Models\\Product', 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:44', '2024-04-13 16:21:44'),
(43, 'App\\Models\\ProductImage', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:21:44', '2024-04-13 16:21:44'),
(44, 'App\\Models\\Product', 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:20', '2024-04-13 16:22:20'),
(45, 'App\\Models\\ProductImage', 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:20', '2024-04-13 16:22:20'),
(46, 'App\\Models\\Product', 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:24', '2024-04-13 16:22:24'),
(47, 'App\\Models\\ProductImage', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:22:24', '2024-04-13 16:22:24'),
(48, 'App\\Models\\Product', 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:24:10', '2024-04-13 16:24:10'),
(49, 'App\\Models\\ProductImage', 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:24:10', '2024-04-13 16:24:10'),
(50, 'App\\Models\\Product', 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:25:02', '2024-04-13 16:25:02'),
(51, 'App\\Models\\ProductImage', 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 16:25:02', '2024-04-13 16:25:02'),
(52, 'App\\Models\\Product', 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:12:47', '2024-04-13 17:12:47'),
(53, 'App\\Models\\Product', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:14:35', '2024-04-13 17:14:35'),
(54, 'App\\Models\\Product', 18, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:14:47', '2024-04-13 17:14:47'),
(55, 'App\\Models\\Product', 19, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:15:07', '2024-04-13 17:15:07'),
(56, 'App\\Models\\Product', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:15:22', '2024-04-13 17:15:22'),
(57, 'App\\Models\\Product', 21, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:15:44', '2024-04-13 17:15:44'),
(58, 'App\\Models\\Product', 22, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:17:21', '2024-04-13 17:17:21'),
(59, 'App\\Models\\Product', 23, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 17:17:38', '2024-04-13 17:17:38'),
(60, 'App\\Models\\Product', 24, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:02:17', '2024-04-13 21:02:17'),
(61, 'App\\Models\\Product', 25, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:04:22', '2024-04-13 21:04:22'),
(62, 'App\\Models\\Product', 26, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:04:25', '2024-04-13 21:04:25'),
(63, 'App\\Models\\Product', 27, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:04:39', '2024-04-13 21:04:39'),
(64, 'App\\Models\\Product', 28, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:06:25', '2024-04-13 21:06:25'),
(65, 'App\\Models\\Product', 29, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:08:55', '2024-04-13 21:08:55'),
(66, 'App\\Models\\Product', 30, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:21', '2024-04-13 21:09:21'),
(67, 'App\\Models\\Product', 31, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:34', '2024-04-13 21:09:34'),
(68, 'App\\Models\\Product', 32, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:47', '2024-04-13 21:09:47'),
(69, 'App\\Models\\Product', 33, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:09:58', '2024-04-13 21:09:58'),
(70, 'App\\Models\\Product', 34, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:10:04', '2024-04-13 21:10:04'),
(71, 'App\\Models\\Product', 35, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:10:13', '2024-04-13 21:10:13'),
(72, 'App\\Models\\Product', 36, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:11:43', '2024-04-13 21:11:43'),
(73, 'App\\Models\\ProductImage', 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:11:43', '2024-04-13 21:11:43'),
(74, 'App\\Models\\Product', 37, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:12:06', '2024-04-13 21:12:06'),
(75, 'App\\Models\\Product', 38, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:14:51', '2024-04-13 21:14:51'),
(76, 'App\\Models\\Product', 39, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:15:33', '2024-04-13 21:15:33'),
(77, 'App\\Models\\Product', 40, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(78, 'App\\Models\\ProductImage', 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(79, 'App\\Models\\ProductImage', 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(80, 'App\\Models\\ProductImage', 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(81, 'App\\Models\\ProductImage', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:17:23', '2024-04-13 21:17:23'),
(82, 'App\\Models\\Product', 41, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(83, 'App\\Models\\ProductImage', 18, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(84, 'App\\Models\\ProductImage', 19, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(85, 'App\\Models\\ProductImage', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(86, 'App\\Models\\ProductImage', 21, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:18:50', '2024-04-13 21:18:50'),
(87, 'App\\Models\\Product', 42, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(88, 'App\\Models\\ProductImage', 22, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(89, 'App\\Models\\ProductImage', 23, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(90, 'App\\Models\\ProductImage', 24, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(91, 'App\\Models\\ProductImage', 25, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-13 21:20:08', '2024-04-13 21:20:08'),
(92, 'App\\Models\\Slide', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:30:40', '2024-04-14 21:30:40'),
(93, 'App\\Models\\Brand', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:44:44', '2024-04-14 21:44:44'),
(94, 'App\\Models\\Brand', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:44:50', '2024-04-14 21:44:50'),
(95, 'App\\Models\\Brand', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:44:57', '2024-04-14 21:44:57'),
(96, 'App\\Models\\Brand', 5, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-14 21:45:02', '2024-04-14 21:45:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'local_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(2, 'wasabi_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(3, 's3_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(4, 'local_storage_max_upload_size', '2048000', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(5, 'wasabi_max_upload_size', '2048000', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(6, 's3_max_upload_size', '2048000', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(7, 'storage_setting', 'local', 1, '2024-03-17 23:09:26', '2024-03-17 23:09:26'),
(8, 'SITE_RTL', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(9, 'title_text', 'New', 1, NULL, '2024-03-25 05:04:03'),
(10, 'footer_text', 'New', 1, NULL, '2024-03-25 05:04:03'),
(11, 'default_language', 'az', 1, '0000-00-00 00:00:00', '2024-03-29 06:49:03'),
(12, 'currency_symbol', 'aa', 1, NULL, NULL),
(13, 'currency', 'AZN', 1, NULL, NULL),
(14, 'display_landing_page', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(15, 'signup_button', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(16, 'email_verification', 'off', 1, '0000-00-00 00:00:00', '2024-03-28 17:25:11'),
(17, 'color', 'theme-6', 1, '0000-00-00 00:00:00', '2024-03-28 17:26:15'),
(18, 'color_flag', 'false', 1, '0000-00-00 00:00:00', '2024-03-28 17:26:15'),
(19, 'cust_theme_bg', 'off', 1, '0000-00-00 00:00:00', '2024-03-28 17:25:11'),
(20, 'cust_darklayout', 'off', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(21, 'mail_driver', 'smtp', 1, NULL, NULL),
(22, 'mail_host', 'smtp.hostinger.com', 1, NULL, NULL),
(23, 'mail_port', '465', 1, NULL, NULL),
(24, 'mail_username', 'test@markup.az', 1, NULL, NULL),
(25, 'mail_password', 'Salam123!', 1, NULL, NULL),
(26, 'mail_encryption', 'SSL', 1, NULL, NULL),
(27, 'mail_from_name', 'test@markup.az', 1, NULL, NULL),
(28, 'mail_from_address', 'test@markup.az', 1, NULL, NULL),
(29, 'blog_notifications', 'off', 1, '0000-00-00 00:00:00', '2024-03-28 17:25:11'),
(55, 'custom_color', '#000000', 1, '0000-00-00 00:00:00', '2024-03-28 17:29:17'),
(56, 'social_text', '333', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(57, 'email_text', '333333333333333333', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(58, 'contact_text', '333333333333', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(59, 'phone', '+994555555555', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(60, 'email', 'aga.mustafayevvv@gmail.com', 1, '0000-00-00 00:00:00', '2024-03-27 16:55:23'),
(61, 'contact_image1', 'uploads/contact/contact_contact_image11711660321.png', 1, '2024-03-28 07:46:59', '2024-03-28 17:12:01'),
(62, 'contact_image2', 'uploads/contact/contact_contact_image21711660321.png', 1, '2024-03-28 07:47:24', '2024-03-28 17:12:01'),
(63, 'map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.832395929507!2d-73.99053220947113!3d40.743713361911816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a7adf1fcf3%3A0xb9fa8d899b755215!2s71%20Madison%20Ave%2C%20New%20York%2C%20NY%2010016%2C%20USA!5e0!3m2!1sen!2sin!4v1688107889372!5m2!1sen!2sin\" width=\"1920\" height=\"690\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2024-03-28 17:25:11', '2024-03-28 17:25:41'),
(64, 'SITE_RTL', 'off', 1, NULL, NULL),
(65, 'SITE_RTL', 'off', 1, NULL, NULL),
(66, 'SITE_RTL', 'off', 1, NULL, NULL),
(67, 'SITE_RTL', 'off', 1, NULL, NULL),
(68, 'SITE_RTL', 'off', 1, NULL, NULL),
(69, 'SITE_RTL', 'off', 1, NULL, NULL),
(70, 'SITE_RTL', 'off', 1, NULL, NULL),
(71, 'SITE_RTL', 'off', 1, NULL, NULL),
(72, 'SITE_RTL', 'off', 1, NULL, NULL),
(73, 'SITE_RTL', 'off', 1, NULL, NULL),
(74, 'SITE_RTL', 'off', 1, NULL, NULL),
(75, 'SITE_RTL', 'off', 1, NULL, NULL),
(76, 'SITE_RTL', 'off', 1, NULL, NULL),
(77, 'SITE_RTL', 'off', 1, NULL, NULL),
(78, 'SITE_RTL', 'off', 1, NULL, NULL),
(79, 'SITE_RTL', 'off', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `slide`
--

INSERT INTO `slide` (`id`, `image`, `button_text`, `detail`, `title`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'uploads/slide/slide_image1713130240.jpg', '{\"az\":\"Ətraflı\"}', '{\"az\":\"Biz kiçik şirkətik amma ürəyimiz, arzularımız və hədəflərimiz böyükdür.\"}', '{\"az\":\"Peşəkar mətbəx avadanlıqları\"}', 'Autem facere accusan', '2024-04-14 21:30:40', '2024-04-14 21:32:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social_settings`
--

DROP TABLE IF EXISTS `social_settings`;
CREATE TABLE IF NOT EXISTS `social_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `social_settings`
--

INSERT INTO `social_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(39, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(40, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(41, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(42, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58'),
(43, 'https://www.instagram.com/markup.az/', 'fa-brands fa-instagram', '2024-03-29 09:01:58', '2024-03-29 09:01:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'aga.mustafayevvv@gmail.com', '2024-03-22 09:42:19', '2024-03-22 09:42:19'),
(3, 'haus@markup.az', '2024-03-29 13:10:00', '2024-03-29 13:10:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint NOT NULL DEFAULT '1',
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `is_active` int NOT NULL DEFAULT '1',
  `is_enable_login` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `lang`, `avatar`, `type`, `is_admin`, `created_by`, `mode`, `is_active`, `is_enable_login`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', '2024-03-18 03:09:25', '$2y$10$kML5EmryMGvA0PwyzPxSHOzokYlago8eE51TKthrSX3aahvLXpiCe', NULL, 'az', NULL, 1, 1, 0, 'light', 1, 1, '2024-03-18 03:09:26', '2024-04-05 12:03:42'),
(4, 'Aga Mustafayev', 'aga.mustafayevvv@gmail.com', '2024-03-25 08:03:43', NULL, NULL, 'az', NULL, 1, 0, 1, 'light', 1, 0, '2024-03-25 08:03:43', '2024-03-25 08:03:43');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `productimage_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
