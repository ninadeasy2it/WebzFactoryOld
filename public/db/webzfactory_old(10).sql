-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2023 at 10:28 AM
-- Server version: 8.0.27
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webzfactory_old`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_payment_settings`
--

DROP TABLE IF EXISTS `admin_payment_settings`;
CREATE TABLE IF NOT EXISTS `admin_payment_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_payment_settings_name_created_by_unique` (`name`,`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_payment_settings`
--

INSERT INTO `admin_payment_settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'is_stripe_enabled', 'off', 1, NULL, NULL),
(2, 'is_paypal_enabled', 'off', 1, NULL, NULL),
(3, 'is_paystack_enabled', 'off', 1, NULL, NULL),
(4, 'is_flutterwave_enabled', 'off', 1, NULL, NULL),
(5, 'is_razorpay_enabled', 'off', 1, NULL, NULL),
(6, 'is_mercado_enabled', 'off', 1, NULL, NULL),
(7, 'is_paytm_enabled', 'off', 1, NULL, NULL),
(8, 'is_mollie_enabled', 'off', 1, NULL, NULL),
(9, 'is_skrill_enabled', 'off', 1, NULL, NULL),
(10, 'is_coingate_enabled', 'off', 1, NULL, NULL),
(11, 'is_paymentwall_enabled', 'off', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

DROP TABLE IF EXISTS `appoinments`;
CREATE TABLE IF NOT EXISTS `appoinments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '[{\"id\":1,\"start\":\"11:00\",\"end\":\"17:00\"}]', 1, 2, '2023-04-03 02:30:03', '2023-04-17 07:07:41'),
(2, 3, NULL, 1, 8, '2023-04-26 05:26:30', '2023-05-30 04:31:41'),
(3, 4, NULL, 1, 9, '2023-04-27 03:10:37', '2023-05-24 04:51:41'),
(4, 7, NULL, 0, 13, '2023-05-10 03:16:25', '2023-05-30 13:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_deatails`
--

DROP TABLE IF EXISTS `appointment_deatails`;
CREATE TABLE IF NOT EXISTS `appointment_deatails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'About us',
  `is_about_us_enabled` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `subcategory_id` int DEFAULT NULL,
  `primary_colour` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_colour` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_new` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `card_theme` varchar(501) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default_theme` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'True',
  `links` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `enable_businesslink` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_subdomain` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdomain` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_domain` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `domains` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `google_analytic` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fbpixel_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customjs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `google_fonts` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customcss` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_custom_html_enabled` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_html_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_google_map_enabled` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_gdpr_enabled` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gdpr_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_branding_enabled` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branding_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `slug`, `title`, `password`, `enable_password`, `designation`, `sub_title`, `description`, `is_about_us_enabled`, `category_id`, `subcategory_id`, `primary_colour`, `secondary_colour`, `banner_new`, `logo_new`, `favicon_new`, `banner`, `logo`, `card_theme`, `theme_color`, `is_default_theme`, `links`, `status`, `meta_keyword`, `meta_description`, `enable_businesslink`, `enable_subdomain`, `subdomain`, `enable_domain`, `domains`, `domain_status`, `google_analytic`, `fbpixel_code`, `customjs`, `google_fonts`, `customcss`, `is_custom_html_enabled`, `custom_html_text`, `is_google_map_enabled`, `google_map_text`, `is_gdpr_enabled`, `gdpr_text`, `is_branding_enabled`, `branding_text`, `menu`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'easy2it', 'Delphi Diversion', NULL, NULL, 'Delphi Diversion', 'Delphi Diversion', 'Delphi Diversion', '0', 61, 23, '', '', '1/1679745763wpW3aVWGk0.jpg', '1/WhatsApp Image 2023-02-26 at 13.26.55.jpg', '', 'banner16836075521042437560.jpg', 'logo_16836075521237337385.jpg', '{\"theme\":\"theme12\",\"order\":{\"social\":\"1\",\"about_us\":\"2\",\"service\":\"3\",\"product\":\"4\",\"gallery\":\"5\",\"testimonials\":\"6\",\"contact_info\":\"7\",\"description\":\"8\",\"appointment\":\"9\",\"more\":\"10\",\"custom_html\":\"11\"}}', 'color1-theme12', 'on', NULL, 'active', NULL, NULL, 'off', 'off', NULL, 'on', 'easy2it.in', 'Pending', NULL, NULL, NULL, NULL, NULL, '1', 'ABC', NULL, NULL, NULL, NULL, NULL, 'Copyright VcardGo 2022', '', 2, '2023-03-31 05:47:04', '2023-06-01 01:22:35'),
(4, 'easy2it2', 'Easy2IT2123', NULL, NULL, NULL, 'Easy2IT2', 'भाजपला शिंदे सरकारचं ओझं झालंय; संजय राऊत यांचा दावा ABC', '1', 22, 1, '#0080c0', '#400080', 'our-values-4.jpg', 'WhatsApp Image 2023-02-26 at 13.26.55.jpg', '4', 'banner16830060201703331848.jpg', 'logo_16830060202047517159.png', '{\"theme\":\"theme11\",\"order\":{\"social\":\"1\",\"about_us\":\"2\",\"service\":\"3\",\"product\":\"4\",\"gallery\":\"5\",\"testimonials\":\"6\",\"contact_info\":\"7\",\"description\":\"8\",\"appointment\":\"9\",\"more\":\"10\",\"custom_html\":\"11\"}}', 'color1-theme11', 'on', NULL, 'active', NULL, NULL, 'on', NULL, NULL, 'off', NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, '1', '<!DOCTYPE html><html><head><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><style>.slidecontainer {  width: 100%;}.slider {  -webkit-appearance: none;  width: 100%;  height: 25px;  background: #d3d3d3;  outline: none;  opacity: 0.7;  -webkit-transition: .2s;  transition: opacity .2s;}.slider:hover {  opacity: 1;}.slider::-webkit-slider-thumb {  -webkit-appearance: none;  appearance: none;  width: 25px;  height: 25px;  background: #04AA6D;  cursor: pointer;}.slider::-moz-range-thumb {  width: 25px;  height: 25px;  background: #04AA6D;  cursor: pointer;}</style></head><body><h1>Custom Range Slider</h1><div class=\"slidecontainer\">  <p>Default range slider:</p>  <input type=\"range\" min=\"1\" max=\"100\" value=\"50\">    <p>Custom range slider:</p>  <input type=\"range\" min=\"1\" max=\"100\" value=\"50\" class=\"slider\" id=\"myRange\"></div></body></html>', NULL, NULL, NULL, NULL, '0', 'Copyright VcardGo 2022', '{\"About Us\":\"About Us\",\"Products\":\"Products\",\"Services\":\"Services\",\"Gallery\":\"Gallery\",\"Testimonials\":\"Testimonials\",\"Contact Info\":\"Contact Info\"}', 9, '2023-04-19 03:26:06', '2023-06-02 04:35:43'),
(3, 'code-wizard', 'Code Wizard', NULL, NULL, NULL, 'Code Wizard 1', 'We are team of talented designers making websites with', '1', 62, 7, '#ffff80', '#ff0080', 'Screenshot_28 - Copy.jpg', '1651585842teetli.png', 'favicon.png', 'banner16827687671829145508.png', 'logo_16827687671378565919.png', '{\"theme\":\"theme12\",\"order\":{\"social\":1,\"about_us\":2,\"service\":3,\"product\":4,\"gallery\":5,\"team\":6,\"testimonials\":7,\"contact_info\":8,\"description\":9,\"appointment\":10,\"more\":11,\"custom_html\":12}}', 'color1-theme12', 'on', NULL, 'active', NULL, NULL, 'on', 'off', NULL, 'off', 'code-wizard.in', 'Approved', NULL, NULL, NULL, 'Default', NULL, '1', '', NULL, NULL, NULL, NULL, '0', 'Copyright VcardGo 2022', '{\"About Us\":\"About Us\",\"Products\":\"Products\",\"Services\":\"Services\",\"Gallery\":\"Gallery\",\"Testimonials\":\"Testimonials\",\"Contact Info\":\"Contact Info\"}', 8, '2023-04-19 03:04:36', '2023-06-05 03:15:07'),
(7, 'teetli-official', 'Teetli Official', NULL, NULL, NULL, 'Teetli is YouTube Channel and Teetli.com', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet\r\n\r\nTempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet\r\n\r\nTempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet\r\n\r\nTempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet\r\n\r\nTempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet', '1', 28, 94, '#ff8080', '#0080ff', '1651583681IMG_0039.png', '1651585842teetli.png', 'favicon.png', NULL, NULL, '{\"theme\":\"theme12\",\"order\":{\"social\":\"1\",\"about_us\":\"2\",\"service\":\"3\",\"product\":\"4\",\"gallery\":\"5\",\"team\":\"6\",\"testimonials\":\"7\",\"contact_info\":\"8\",\"description\":\"9\",\"appointment\":\"10\",\"more\":\"11\",\"custom_html\":\"12\",\"google_map\":\"13\"}}', 'color1-theme12', 'on', NULL, 'active', NULL, NULL, 'off', 'off', NULL, 'on', 'ninad.com', 'Approved', NULL, NULL, NULL, NULL, NULL, '0', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3801.419355068867!2d73.99986607581532!3d17.677639094377447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDQwJzM5LjUiTiA3NMKwMDAnMDguOCJF!5e0!3m2!1sen!2sin!4v1685955276498!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '0', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3801.419355068867!2d73.99986607581532!3d17.677639094377447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDQwJzM5LjUiTiA3NMKwMDAnMDguOCJF!5e0!3m2!1sen!2sin!4v1685955276498!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'on', 'Hii', '0', 'Copyright VcardGo 2022', '{\"About Us\":\"My About Us\",\"Products\":\"Products\",\"Services\":\"Services\",\"Gallery\":\"Gallery\",\"Team\":\"My Team\",\"Testimonials\":\"Testimonials\",\"Contact Info\":\"My Contact Info\"}', 13, '2023-05-10 03:02:19', '2023-06-05 07:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `businessfields`
--

DROP TABLE IF EXISTS `businessfields`;
CREATE TABLE IF NOT EXISTS `businessfields` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businessfields`
--

INSERT INTO `businessfields` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'phone', 'fa fa-phone', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(2, 'email', 'fa fa-envelope', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(3, 'address', 'fa fa-map-marker', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(4, 'website', 'fa fa-link', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(5, 'custom_field', 'fa fa-align-left', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(6, 'facebook', 'fab fa-facebook', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(7, 'twitter', 'fab fa-twitter', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(8, 'instagram', 'fab fa-instagram', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(9, 'whatsapp', 'fab fa-whatsapp', '2023-03-31 02:49:04', '2023-03-31 02:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

DROP TABLE IF EXISTS `business_hours`;
CREATE TABLE IF NOT EXISTS `business_hours` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"sun\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"mon\":{\"days\":\"on\",\"start_time\":\"09:30\",\"end_time\":\"18:30\"},\"tue\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"wed\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"thu\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"fri\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"sat\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null}}', 1, 2, '2023-04-03 02:30:03', '2023-04-17 07:07:41'),
(2, 3, NULL, 0, 8, '2023-04-26 05:26:30', '2023-04-26 05:26:30'),
(3, 4, '{\"sun\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"mon\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"tue\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"wed\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"thu\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"fri\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null},\"sat\":{\"days\":\"off\",\"start_time\":null,\"end_time\":null}}', 0, 9, '2023-04-27 03:10:37', '2023-04-29 05:59:13'),
(4, 7, NULL, 0, 13, '2023-05-10 03:16:25', '2023-05-10 06:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `business_id`, `name`, `email`, `phone`, `subject`, `message`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 00:49:08', '2023-05-31 00:49:08'),
(3, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 00:55:22', '2023-05-31 00:55:22'),
(4, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 01:00:07', '2023-05-31 01:00:07'),
(5, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 01:02:30', '2023-05-31 01:02:30'),
(6, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 01:06:03', '2023-05-31 01:06:03'),
(7, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 01:08:55', '2023-05-31 01:08:55'),
(8, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Test', 13, '2023-05-31 01:23:24', '2023-05-31 01:23:24'),
(9, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Test', 13, '2023-05-31 01:24:09', '2023-05-31 01:24:09'),
(10, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Test', 13, '2023-05-31 01:24:52', '2023-05-31 01:24:52'),
(11, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'Test', 13, '2023-05-31 01:32:26', '2023-05-31 01:32:26'),
(12, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'Test', 13, '2023-05-31 01:33:19', '2023-05-31 01:33:19'),
(13, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'Test', 13, '2023-05-31 01:34:44', '2023-05-31 01:34:44'),
(14, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'Test', 13, '2023-05-31 01:35:09', '2023-05-31 01:35:09'),
(15, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'Test', 13, '2023-05-31 01:37:42', '2023-05-31 01:37:42'),
(16, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'Test', 13, '2023-05-31 01:45:06', '2023-05-31 01:45:06'),
(17, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Test', 13, '2023-05-31 01:46:01', '2023-05-31 01:46:01'),
(18, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Test', 13, '2023-05-31 01:53:21', '2023-05-31 01:53:21'),
(19, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 02:08:08', '2023-05-31 02:08:08'),
(20, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-05-31 02:08:47', '2023-05-31 02:08:47'),
(21, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Ninad', 13, '2023-05-31 09:01:56', '2023-05-31 09:01:56'),
(22, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Ninad', 13, '2023-05-31 09:02:21', '2023-05-31 09:02:21'),
(23, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'Test', 'Test', 13, '2023-06-01 01:48:28', '2023-06-01 01:48:28'),
(24, 7, 'Ninad', 'prabhuneninad@gmail.com', NULL, 'test', 'test', 13, '2023-06-03 02:35:08', '2023-06-03 02:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

DROP TABLE IF EXISTS `contact_infos`;
CREATE TABLE IF NOT EXISTS `contact_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 7, '{\"1\":{\"Phone\":\"9028833652\",\"id\":\"1\"},\"3\":{\"Email\":\"prabhuneninad@gmail.com\",\"id\":\"3\"},\"5\":{\"Address\":{\"Address\":\"pune\",\"Address_url\":\"abc\"},\"id\":\"5\"},\"7\":{\"Whatsapp\":\"919028833652\",\"id\":\"7\"}}', 1, 13, '2023-05-15 11:10:43', '2023-06-01 02:13:17'),
(2, 3, NULL, 1, 8, '2023-05-18 13:08:57', '2023-05-30 04:31:41'),
(3, 4, NULL, 1, 9, '2023-05-24 04:35:51', '2023-05-24 04:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `limit` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_theme_color`
--

DROP TABLE IF EXISTS `custom_theme_color`;
CREATE TABLE IF NOT EXISTS `custom_theme_color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subcategory_id` int NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_theme_color`
--

INSERT INTO `custom_theme_color` (`id`, `subcategory_id`, `theme`, `primary_color`, `secondary_color`) VALUES
(1, 1, 'theme11', '#008000', '#0080ff');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Appointment Created', NULL, 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(2, 'User Created', NULL, 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_langs`
--

DROP TABLE IF EXISTS `email_template_langs`;
CREATE TABLE IF NOT EXISTS `email_template_langs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_langs`
--

INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'Appointment Created', '<p>مرحبا عزيزتي</p><p>قام {appointment_name} بحجز تعيين ل ـ {appointment_date} في{appointment_time}.</p><p>البريد الالكتروني : {appointment_email}</p><p>رقم التليفون : {appointment_phone}</p><p>يعتبر،</p><p>{app_url}</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(2, 1, 'da', 'Appointment Created', '<p>Hej, kære.</p><p>{ appointment_name } har bestilt en aftale for { appointment_date} kl. {appointment_time}.</p><p>E-mail: { appointment_email }</p><p>Telefonnummer: { appointment_phone }</p><p>Med venlig hilsen</p><p>{ app_name }.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(3, 1, 'de', 'Appointment Created', '<p>Hallo Lieber,</p><p>{appointment_name} hat einen Termin für {appointment_date} gebucht um {appointment_time}.</p><p>E-Mail: {appointment_email}</p><p>Telefonnummer: {appointment_phone}</p><p>Betrachtet,</p><p>{app_name}.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(4, 1, 'en', 'Appointment Created', '<p>Hi Dear,</p><p>{appointment_name} has booked an appointment for {appointment_date} at {appointment_time}.</p><p>Email: {appointment_email}</p><p>Phone Number: {appointment_phone}</p><p>Regards,</p><p>{app_name}.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(5, 1, 'es', 'Appointment Created', '<p>Hola Querido,</p><p>{appointment_name} ha reservado una cita para {appointment_date}a las {appointment_time}.</p><p>Correo electrónico: {appointment_email}</p><p>Número de teléfono: {appointment_phone}</p><p>Considerando,</p><p>{app_name}.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(6, 1, 'fr', 'Appointment Created', '<p>Salut, Chère,</p><p>{ appointment_name} a réservé un rendez-vous pour { appointment_date } à {appointment_time}.</p><p>Adresse électronique: {appointment_email}</p><p>Numéro de téléphone: { appointment_phone }</p><p>Regards,</p><p>{ app_name }.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(7, 1, 'it', 'Appointment Created', '<p>Ciao Caro,</p><p>{appointment_name} ha prenotato un appuntamento per {appointment_date} a {appointment_time}.</p><p>Email: {appointment_email}</p><p>Numero di telefono: {appointment_phone}</p><p>Riguardo,</p><p>{app_name}.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(8, 1, 'ja', 'Appointment Created', '<p>こんにちは、</p><p>{appointment_name} は {appointment_date} の {appointment_time} に予約を入れました。</p><p>メール: {appointment_email}</p><p>電話番号: {appointment_phone}</p><p>よろしくお願いします</p><p>{app_name}.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(9, 1, 'nl', 'Appointment Created', '<p>Hallo, lieverd.</p><p>{ appointment_name } heeft een afspraak voor { appointment_date } geboekt Bij {appointment_time}.</p><p>E-mail: { appointment_email }</p><p>Telefoonnummer: { appointment_phone }</p><p>Betreft:</p><p>{ app_name }.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(10, 1, 'pl', 'Appointment Created', '<p>Witam Szanowny Panie,</p><p>Użytkownik {appointment_name } zarezerwował termin dla {appointment_date } W {appointment_time}.</p><p>E-mail: {appointment_email }</p><p>Numer telefonu: {appointment_phone }</p><p>W odniesieniu do</p><p>{app_name }.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(11, 1, 'ru', 'Appointment Created', '<p>Привет, дорогой.</p><p>Пользователь { appointment_name } забронировал назначение на { appointment_date } в {appointment_time}.</p><p>Электронная почта: { appointment_email }</p><p>Номер телефона: { appointment_phone }</p><p>С уважением,</p><p>{ app_name }.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(12, 1, 'pt', 'Appointment Created', '<p>Oi Querida,</p><p>{appointment_name} marcou um compromisso para {appointment_date} no {appointment_time}.</p><p>E-mail: {appointment_email}</p><p>Número do Telefone: {appointment_phone}</p><p>Considera,</p><p>{app_name}.</p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(13, 2, 'ar', 'User Created', '<p><font face=\"sans-serif\">مرحبًا {user_name}</font></p><p><font face=\"sans-serif\">لتسجيل الدخول إلى تفاصيل حسابك ، ما عليك سوى النقر فوق Url أدناه</font></p><p><font face=\"sans-serif\">اسم المستخدم: {user_email}</font></p><p><font face=\"sans-serif\">كلمة المرور: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">شكرًا لك على الانضمام إلى فريقنا كـ {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(14, 2, 'da', 'User Created', '<p><font face=\"sans-serif\">Hej {user_name}</font></p><p><font face=\"sans-serif\">For at logge på dine kontooplysninger skal du blot klikke på URL nedenfor</font></p><p><font face=\"sans-serif\">brugernavn: {user_email}</font></p><p><font face=\"sans-serif\">adgangskode: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Tak, fordi du sluttede dig til vores team som en {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(15, 2, 'de', 'User Created', '<p><font face=\"sans-serif\">Hallo, {user_name}</font></p><p><font face=\"sans-serif\">Um sich mit Ihren Kontodaten anzumelden, klicken Sie einfach unten auf die URL</font></p><p><font face=\"sans-serif\">Benutzername: {user_email}</font></p><p><font face=\"sans-serif\">Passwort: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Vielen Dank, dass Sie unserem Team als {user_type} beigetreten sind</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(16, 2, 'en', 'User Created', '<p><font face=\"sans-serif\">Hi {user_name}</font></p><p><font face=\"sans-serif\">To login to your account details simply click on Url Below</font></p><p><font face=\"sans-serif\">Username: {user_email}</font></p><p><font face=\"sans-serif\">word Pass: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\"> Thank you for joining our team as {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(17, 2, 'es', 'User Created', '<p><font face=\"sans-serif\">Hola, {nombre_de_usuario}</font></p><p><font face=\"sans-serif\">Para iniciar sesión en los detalles de su cuenta, simplemente haga clic en Url a continuación</font></p><p><font face=\"sans-serif\">nombre de usuario: {user_email}</font></p><p><font face=\"sans-serif\">contraseña: {usuario_contraseña}</font></p><p><font face=\"sans-serif\">{aplicación_url}</font></p><p><font face=\"sans-serif\">Gracias por unirte a nuestro equipo como {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(18, 2, 'fr', 'User Created', '<p><font face=\"sans-serif\">Bonjour, {user_name}</font></p><p><font face=\"sans-serif\">Pour vous connecter aux détails de votre compte, cliquez simplement sur Url ci-dessous</font></p><p><font face=\"sans-serif\">nom d\'utilisateur : {user_email}</font></p><p><font face=\"sans-serif\">mot de passe : {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Merci d\'avoir rejoint notre équipe en tant que {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(19, 2, 'it', 'User Created', '<p><font face=\"sans-serif\">Ciao, {nome_utente}</font></p><p><font face=\"sans-serif\">Per accedere ai dettagli del tuo account, fai semplicemente clic sull\'URL qui sotto</font></p><p><font face=\"sans-serif\">nome utente: {utente_email}</font></p><p><font face=\"sans-serif\">password: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Grazie per esserti unito al nostro team come {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(20, 2, 'ja', 'User Created', '<p><font face=\"sans-serif\">こんにちは、{user_name}</font></p><p><font face=\"sans-serif\">アカウントの詳細にログインするには、下のURLをクリックしてください。</font></p><p><font face=\"sans-serif\">ユーザー名：{user_email}</font></p><p><font face=\"sans-serif\">パスワード：{user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">{user_type}として私たちのチームに参加していただきありがとうございます</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(21, 2, 'nl', 'User Created', '<p><font face=\"sans-serif\">Hallo, {user_name}</font></p><p><font face=\"sans-serif\">Om in te loggen op uw accountgegevens, klikt u op onderstaande URL</font></p><p><font face=\"sans-serif\">gebruikersnaam: {user_email}</font></p><p><font face=\"sans-serif\">wachtwoord: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Bedankt dat je lid bent geworden van ons team als {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(22, 2, 'pl', 'User Created', '<p><font face=\"sans-serif\">Cześć, {nazwa_użytkownika}</font></p><p><font face=\"sans-serif\">Aby zalogować się na swoje konto, po prostu kliknij poniższy adres URL</font></p><p><font face=\"sans-serif\">nazwa użytkownika: {user_email}</font></p><p><font face=\"sans-serif\">hasło: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Dziękujemy za dołączenie do naszego zespołu jako {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(23, 2, 'ru', 'User Created', '<p><font face=\"sans-serif\">Привет, {имя_пользователя}</font></p><p><font face=\"sans-serif\">Чтобы войти в свою учетную запись, просто нажмите URL-адрес ниже</font></p><p><font face=\"sans-serif\">имя пользователя: {user_email}</font></p><p><font face=\"sans-serif\">пароль: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Спасибо, что присоединились к нашей команде как {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(24, 2, 'pt', 'User Created', '<p><font face=\"sans-serif\">Olá, {user_name}</font></p><p><font face=\"sans-serif\">Para acessar os detalhes da sua conta, basta clicar no URL abaixo</font></p><p><font face=\"sans-serif\">nome de usuário: {user_email}</font></p><p><font face=\"sans-serif\">senha: {user_password}</font></p><p><font face=\"sans-serif\">{app_url}</font></p><p><font face=\"sans-serif\">Obrigado por se juntar à nossa equipa como {user_type}</font></p>', '2023-03-31 02:49:04', '2023-03-31 02:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 7, '[{\"id\":1,\"title\":\"Purple saree\",\"description\":\"Purple saree\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585408category2.jpg\"},{\"id\":2,\"title\":\"Golden Color silk\",\"description\":\"Golden Color silk\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1654177226IMG_0189.png\"},{\"id\":3,\"title\":\"Colorful saree only at Teetli\",\"description\":\"Colorful saree only at Teetli\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585957category3.jpg\"},{\"id\":4,\"title\":\"Saree on Teetli.com only\",\"description\":\"Saree on Teetli.com only\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585985category4.jpg\"}]', 1, 13, '2023-05-15 10:28:16', '2023-06-03 00:58:47'),
(2, 3, NULL, 1, 8, '2023-05-18 13:08:57', '2023-05-30 04:31:41'),
(3, 4, '[{\"id\":1,\"title\":null,\"description\":null,\"purchase_link\":null,\"link_title\":null,\"image\":\"portfolio-details-3.jpg\"}]', 1, 9, '2023-05-24 04:35:51', '2023-05-24 04:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_sections`
--

DROP TABLE IF EXISTS `landing_page_sections`;
CREATE TABLE IF NOT EXISTS `landing_page_sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_order` int NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci,
  `section_type` enum('section-1','section-2','section-3','section-4','section-5','section-6','section-7','section-8','section-9','section-10','section-plan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_demo_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_blade_file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
(9, '2020_05_21_065337_create_permission_tables', 1),
(10, '2021_03_04_110817_create_plan_orders_table', 1),
(11, '2021_06_03_101323_create_admin_payment_settings', 1),
(12, '2021_06_15_035736_create_landing_page_sections_table', 1),
(13, '2021_07_28_101402_create_businesses_table', 1),
(14, '2021_07_28_105617_create_businessfields_table', 1),
(15, '2021_09_13_071920_create_business_hours_table', 1),
(16, '2021_09_13_072901_create_appoinments_table', 1),
(17, '2021_09_13_083333_create_services_table', 1),
(18, '2021_09_13_083428_create_testimonials_table', 1),
(19, '2021_09_13_083456_create_socials_table', 1),
(20, '2021_09_20_031809_create_contact_infos_table', 1),
(21, '2021_09_23_093115_create_appointment_deatails_table', 1),
(22, '2021_10_28_114242_create_visits_table', 1),
(23, '2021_11_25_093048_add_filed_in_bussiness_table', 1),
(24, '2021_12_22_033325_add_status_to_appointment_detail', 1),
(25, '2022_01_19_093049_add_google_filed_in_bussiness_table', 1),
(26, '2022_01_25_102226_create_plan_requests_table', 1),
(27, '2022_01_25_102325_add_requested_plan_to_users_table', 1),
(28, '2022_01_30_230459_create_contacts_table', 1),
(29, '2022_02_14_100435_add_field_in_business_table', 1),
(30, '2022_04_01_054641_create_custom_html_table', 1),
(31, '2022_04_01_120320_add_is_gdpr_enabled_to_businesses_table', 1),
(32, '2022_07_13_114541_create_email_templates_table', 1),
(33, '2022_07_13_114550_create_email_template_langs_table', 1),
(34, '2022_07_13_114939_create_user_email_templates_table', 1),
(35, '2022_07_26_141125_add_branding_data_to_businesses_table', 1),
(36, '2022_07_27_085503_add_enable_branding_to_plans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `themes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `enable_custdomain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `enable_custsubdomain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `enable_branding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plans_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `themes`, `business`, `description`, `enable_custdomain`, `enable_custsubdomain`, `enable_branding`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, 'Unlimited', 'theme11,theme12,theme13,theme14,theme15', -1, NULL, 'on', 'on', 'on', '2023-03-31 02:49:04', '2023-03-31 02:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `plan_orders`
--

DROP TABLE IF EXISTS `plan_orders`;
CREATE TABLE IF NOT EXISTS `plan_orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_month` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `store_id` int NOT NULL DEFAULT '0',
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plan_orders_order_id_unique` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_requests`
--

DROP TABLE IF EXISTS `plan_requests`;
CREATE TABLE IF NOT EXISTS `plan_requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 7, '[{\"id\":1,\"title\":\"Dola silk Blue\",\"description\":\"Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.\",\"price\":\"2500\\/-\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585985category4.jpg\"},{\"id\":2,\"title\":\"Dola silk Pink colour\",\"description\":\"Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident\",\"price\":\"3500\\/-\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585408category2.jpg\"},{\"id\":3,\"title\":\"Dola Silk Red\",\"description\":\"Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.\",\"price\":\"4000\\/-\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1654177226IMG_0189.png\"},{\"id\":4,\"title\":\"ABC\",\"description\":\"Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.\",\"price\":\"1000\\/-\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585957category3.jpg\"}]', 1, 13, '2023-05-19 05:58:38', '2023-06-03 02:36:31'),
(2, 4, '[{\"id\":1,\"title\":\"A\",\"description\":\"B\",\"price\":\"100\",\"purchase_link\":null,\"link_title\":null,\"image\":\"portfolio-1.jpg\"}]', 1, 9, '2023-05-24 04:35:51', '2023-06-02 04:44:08'),
(3, 3, NULL, 1, 8, '2023-05-30 04:29:13', '2023-05-30 04:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '[{\"id\":1,\"title\":\"IT\",\"description\":\"IT Description\",\"purchase_link\":null,\"link_title\":null,\"image\":\"\"}]', 1, 2, '2023-04-03 02:30:03', '2023-04-17 07:07:41'),
(2, 3, '[{\"id\":1,\"title\":null,\"description\":null,\"purchase_link\":null,\"link_title\":null,\"image\":\"img_16827639811160782311.jpg\"}]', 1, 8, '2023-04-26 05:26:30', '2023-05-30 04:31:41'),
(3, 4, '[{\"id\":1,\"title\":null,\"description\":null,\"purchase_link\":null,\"link_title\":null,\"image\":\"portfolio-4.jpg\"}]', 1, 9, '2023-04-27 03:10:37', '2023-05-24 04:51:01'),
(5, 7, '[{\"id\":1,\"title\":\"Dola Silk Red\",\"description\":\"Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident\",\"purchase_link\":\"Dola Silk1\",\"link_title\":\"Dola Silk1\",\"image\":\"1654177226IMG_0189.png\"},{\"id\":2,\"title\":\"Dola Silk Blue\",\"description\":\"Dola Silk Blue\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585985category4.jpg\"},{\"id\":3,\"title\":\"Dola Silk Pink\",\"description\":\"Dola Silk Pink\",\"purchase_link\":null,\"link_title\":null,\"image\":\"1651585408category2.jpg\"}]', 1, 13, '2023-05-10 06:17:23', '2023-05-30 13:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'local_storage_validation', 'jpeg,jpg,png', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(2, 'wasabi_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(3, 's3_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(4, 'local_storage_max_upload_size', '2048000', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(5, 'wasabi_max_upload_size', '2048000', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(6, 's3_max_upload_size', '2048000', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(7, 'title_text', 'vCardgo', 2, NULL, NULL),
(8, 'color', 'theme-1', 2, NULL, NULL),
(9, 'cust_theme_bg', 'off', 2, NULL, NULL),
(10, 'SITE_RTL', 'off', 2, NULL, NULL),
(11, 'cust_darklayout', 'off', 2, NULL, NULL),
(12, 'company_logo', 'company_logo1683544705.png', 8, NULL, NULL),
(13, 'title_text', 'vCardgo', 8, NULL, NULL),
(14, 'color', 'theme-4', 8, NULL, NULL),
(15, 'cust_theme_bg', 'on', 8, NULL, NULL),
(16, 'SITE_RTL', 'off', 8, NULL, NULL),
(17, 'cust_darklayout', 'off', 8, NULL, NULL),
(18, 'company_logo_light', 'company_logo_light_1683544705.png', 8, NULL, NULL),
(19, 'company_favicon', '8_favicon.png', 8, NULL, NULL),
(20, 'title_text', 'vCardgo', 1, NULL, NULL),
(21, 'default_language', 'en', 1, NULL, NULL),
(22, 'display_landing_page', 'on', 1, NULL, NULL),
(23, 'signup_button', 'on', 1, NULL, NULL),
(24, 'cookie_text', '', 1, NULL, NULL),
(25, 'cust_theme_bg', 'on', 1, NULL, NULL),
(26, 'SITE_RTL', 'off', 1, NULL, NULL),
(27, 'gdpr_cookie', 'off', 1, NULL, NULL),
(28, 'cust_darklayout', 'off', 1, NULL, NULL),
(29, 'color', 'theme-3', 1, NULL, NULL),
(30, 'storage_setting', 'local', 1, NULL, NULL),
(31, 'company_logo', 'company_logo1683745190.png', 13, NULL, NULL),
(32, 'company_logo_light', 'company_logo_light_1683745190.png', 13, NULL, NULL),
(33, 'company_favicon', '13_favicon.png', 13, NULL, NULL),
(34, 'title_text', 'vCardgo', 13, NULL, NULL),
(35, 'color', 'theme-2', 13, NULL, NULL),
(36, 'cust_theme_bg', 'on', 13, NULL, NULL),
(37, 'SITE_RTL', 'off', 13, NULL, NULL),
(38, 'cust_darklayout', 'off', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 7, '[{\"id\":1,\"title\":\"Welcome to Teetli Official\",\"description\":\"Teetli is YouTube Channel and Teetli.com\",\"purchase_link\":null,\"link_title\":null,\"image\":\"Screenshot_28.jpg\"},{\"id\":2,\"title\":\"Titli Clothing Official 1\",\"description\":\"Titli (butterfly) represents beauty, colors and a feminine character, Our passion for unique designs brought our vision, and products, to life.\",\"purchase_link\":null,\"link_title\":null,\"image\":\"slide-2.jpg\"},{\"id\":3,\"title\":\"Titli Clothing Official 2\",\"description\":\"Titli (butterfly) represents beauty, colors and a feminine character, Our passion for unique designs brought our vision, and products, to life.\",\"purchase_link\":null,\"link_title\":null,\"image\":\"slide-1.jpg\"},{\"id\":4,\"title\":\"Titli Clothing Official 3\",\"description\":\"Titli (butterfly) represents beauty, colors and a feminine character, Our passion for unique designs brought our vision, and products, to life.\",\"purchase_link\":null,\"link_title\":null,\"image\":\"slide-3.jpg\"}]', 1, 13, '2023-05-16 09:38:02', '2023-05-31 08:17:59'),
(2, 4, '[{\"id\":1,\"title\":null,\"description\":null,\"purchase_link\":null,\"link_title\":null,\"image\":\"Screenshot_28 - Copy.jpg\"}]', 1, 9, '2023-05-24 04:36:54', '2023-05-24 04:36:54'),
(3, 3, '[{\"id\":1,\"title\":null,\"description\":null,\"purchase_link\":null,\"link_title\":null,\"image\":\"Screenshot_28 - Copy.jpg\"}]', 1, 8, '2023-05-30 04:30:11', '2023-05-30 04:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"1\":{\"Facebook\":\"https:\\/\\/www.facebook.com\\/easy2it\\/\",\"id\":\"1\"}}', 0, 2, '2023-04-03 02:30:03', '2023-04-17 07:06:45'),
(2, 3, NULL, 1, 8, '2023-04-26 05:26:30', '2023-05-30 04:31:41'),
(3, 4, NULL, 0, 9, '2023-04-27 03:10:38', '2023-04-27 03:10:38'),
(4, 7, '{\"1\":{\"Facebook\":\"https:\\/\\/www.facebook.com\\/teetliofficial\",\"id\":\"1\"},\"3\":{\"Instagram\":\"https:\\/\\/www.instagram.com\\/teetliofficial\\/\",\"id\":\"3\"},\"5\":{\"Twitter\":\"https:\\/\\/twitter.com\\/\",\"id\":\"5\"},\"7\":{\"LinkedIn\":\"https:\\/\\/in.linkedin.com\\/\",\"id\":\"7\"},\"9\":{\"Pinterest\":\"https:\\/\\/in.pinterest.com\\/\",\"id\":\"9\"},\"11\":{\"Youtube\":\"https:\\/\\/www.youtube.com\\/\",\"id\":\"11\"},\"13\":{\"Behance\":\"https:\\/\\/www.behance.net\\/\",\"id\":\"13\"},\"15\":{\"Dribbble\":\"https:\\/\\/dribbble.com\\/\",\"id\":\"15\"},\"17\":{\"Figma\":\"https:\\/\\/www.figma.com\\/\",\"id\":\"17\"},\"19\":{\"Messenger\":\"https:\\/\\/www.messenger.com\\/\",\"id\":\"19\"},\"21\":{\"Tiktok\":\"https:\\/\\/www.tiktok.com\\/about\",\"id\":\"21\"},\"23\":{\"Web_url\":\"https:\\/\\/webz.easy2it.com\\/teetli-official\",\"id\":\"23\"}}', 1, 13, '2023-05-10 03:16:25', '2023-05-31 09:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `shortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `shortname`, `name`) VALUES
(1, 'AS', 'Accounting Services'),
(2, 'AG', 'Agro Industry'),
(3, 'AHR', 'Anything on Hire or Rent'),
(4, 'ART', 'Art'),
(5, 'AC', 'Auto Care'),
(6, 'AUT', 'Automobile'),
(7, 'BC', 'Baby Care'),
(8, 'BKR', 'Bakery & Foods'),
(9, 'BAN', 'Banquets'),
(10, 'BH', 'Book Hotel'),
(11, 'BKS', 'Books'),
(12, 'BUS', 'Bus'),
(13, 'CCR', 'Cabs & Car Rentals'),
(14, 'CTR', 'Caterers '),
(15, 'CHM', 'Chemists'),
(16, 'CC', 'Civil Contractors'),
(17, 'CPI', 'Computer & IT Services'),
(18, 'CON', 'Construction'),
(19, 'CUR', 'Courier'),
(20, 'DN', 'Daily Needs'),
(21, 'DM', 'Dance & Music'),
(22, 'DOC', 'Doctor'),
(23, 'ED', 'Education'),
(24, 'EM', 'Emergency'),
(25, 'ENT', 'Entertainment'),
(26, 'EVN', 'Event '),
(27, 'EVO', 'Event Organizer'),
(28, 'FSH', 'Fashion'),
(29, 'FIT', 'Fitness'),
(30, 'FLW', 'Flowers'),
(31, 'FD', 'Food'),
(32, 'FE', 'Foreign Exchange'),
(33, 'FUN', 'Function Venue'),
(34, 'HMS', 'Handy Man Services'),
(35, 'HD', 'Home Decor'),
(36, 'HI', 'Home Improvements'),
(37, 'HOS', 'Hospitals'),
(38, 'HK', 'House Keeping'),
(39, 'IP', 'Industrial Products'),
(40, 'INS', 'Insurance'),
(41, 'ID', 'Interior Designer'),
(42, 'INT', 'Internet'),
(43, 'JWL', 'Jewellery'),
(44, 'JOB', 'Jobs'),
(45, 'LAB', 'Labs'),
(46, 'LND', 'Landscaping'),
(47, 'LC', 'Language Classes'),
(48, 'LCC', 'Loan & Credit Card'),
(49, 'MED', 'Medical'),
(50, 'MK', 'Modular Kitchen'),
(51, 'ODS', 'On Demond Services'),
(52, 'PM', 'Packers & Movers'),
(53, 'PAR', 'Party'),
(54, 'PC', 'Personal care'),
(55, 'PES', 'Pest control'),
(56, 'PPC', 'Pet & Pet Care'),
(57, 'PET', 'Pets & Animals'),
(58, 'PH', 'Pharma'),
(59, 'PS', 'Play School'),
(60, 'RE', 'Real Estate'),
(61, 'REP', 'Repairs'),
(62, 'RES', 'Restaurants'),
(63, 'SCH', 'School'),
(64, 'SS', 'Security Services'),
(65, 'SPA', 'Spa & Saloon'),
(66, 'SPR', 'Sports'),
(67, 'SC', 'Sports Coach'),
(68, 'SG', 'Sports Goods'),
(69, 'TI', 'Training Institute'),
(70, 'TRA', 'Transporters'),
(71, 'TRA', 'Travel'),
(72, 'WED', 'Wedding'),
(73, 'DM', 'Digital Marketer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subcategory_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `category_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`subcategory_id`),
  KEY `category_id` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=898 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `name`, `category_id`) VALUES
(1, '24 Hour Dentists', 22),
(2, '24 Hours Chemists', 24),
(3, '24 Hours Florists', 30),
(4, '24 Hours Florists Home Deliver', 30),
(5, '24 Hours Veternity Documents', 22),
(6, '5 Star Banquet Halls', 9),
(7, 'Aagri', 62),
(8, 'AC', 61),
(9, 'AC Banquet Halls', 9),
(10, 'AC on Hire', 3),
(11, 'Academy', 66),
(12, 'Achitects', 41),
(13, 'Acting Classes', 23),
(14, 'Action & Adventure', 11),
(15, 'Acupressure Documents', 22),
(16, 'Acupressure Therapist', 22),
(17, 'Acupressure Therapist for Home', 22),
(18, 'Acupuncture Doctors', 22),
(19, 'Acupuncture Therapist', 22),
(20, 'Administration Training', 69),
(21, 'Afgani', 62),
(22, 'Agent', 1),
(23, 'Air Cooler', 61),
(24, 'Air Coolers on Hire', 3),
(25, 'Alcohol De-addiction', 22),
(26, 'All courier Services', 19),
(27, 'All Dance Classes', 21),
(28, 'All Music Classes', 21),
(29, 'Allopathic Doctors', 22),
(30, 'Ambulance', 49),
(31, 'Ambulance ', 24),
(32, 'American', 62),
(33, 'Andhra', 62),
(34, 'Andhra ', 14),
(35, 'Andrologists', 22),
(36, 'Animal Transporters', 70),
(37, 'Ant Control', 55),
(38, 'Antiques and Special care Item', 70),
(39, 'Appendix Doctors', 22),
(40, 'Appliance Repairs', 51),
(41, 'Arabic', 47),
(42, 'Arabic', 62),
(43, 'Architects and Engineeres', 36),
(44, 'Art and Craft Classes', 23),
(45, 'Art Classes', 4),
(46, 'Art Fair', 4),
(47, 'Art Show', 4),
(48, 'Artificial', 43),
(49, 'Arts, Films and Photography', 11),
(50, 'Audiologists', 22),
(51, 'Awadhi', 62),
(52, 'Ayurvedic Doctors', 22),
(53, 'Ayurvedic Doctors for Hairfall', 22),
(54, 'Ayurvedic Doctors for Piles Tr', 22),
(55, 'Ayurvedic Doctors for SkinTrea', 22),
(56, 'Ayurvedic Hospitals', 37),
(57, 'Ayurvedic Sexologists', 22),
(58, 'Baby Bath', 7),
(59, 'Baby Food', 7),
(60, 'Baby Sitters', 7),
(61, 'Baby Sleep', 7),
(62, 'Badminton', 67),
(63, 'Badminton', 68),
(64, 'Bakery ', 20),
(65, 'Bangles', 43),
(66, 'Bank', 1),
(67, 'Banquet Halls', 72),
(68, 'Barbeque', 62),
(69, 'Bariatric Surgeons', 22),
(70, 'Basic Computing', 69),
(71, 'Bath ', 35),
(72, 'Bathroom Fittings', 18),
(73, 'Battery Shop', 6),
(74, 'Beauty Parlour', 28),
(75, 'Beauty Services', 54),
(76, 'Bengali', 14),
(77, 'Bengali', 62),
(78, 'Billards and Pools', 68),
(79, 'Bird Control', 55),
(80, 'Birthday Party Caterers', 14),
(81, 'Biryani', 62),
(82, 'Blazers on Hire', 3),
(83, 'Blood Banks', 49),
(84, 'Blood Banks ', 24),
(85, 'Blue Dart', 19),
(86, 'Bnaquet Halls', 53),
(87, 'Bodyguards', 64),
(88, 'Bollywood', 21),
(89, 'Bones and Joints Doctors', 22),
(90, 'Book a Cab Online', 13),
(91, 'Books ', 7),
(92, 'Borewell Contractors', 16),
(93, 'Bouncer Services', 53),
(94, 'Boutique', 28),
(95, 'Boxing ', 67),
(96, 'Boxing ', 68),
(97, 'Bracelets', 43),
(98, 'Bramhin ', 14),
(99, 'Breakfast ', 62),
(100, 'Breast Specialists', 22),
(101, 'Bridal Jewellery', 43),
(102, 'Bridal Makeup', 54),
(103, 'Bridal Makeup', 72),
(104, 'Bridal Mehandi Artists', 72),
(105, 'Bridal Wear ', 72),
(106, 'Bridal Wear on Hire', 3),
(107, 'Bride and Groom makeup', 54),
(108, 'Bride Groom Requisits', 72),
(109, 'Broker', 60),
(110, 'Builder', 60),
(111, 'Building Contracors', 16),
(112, 'Built in Hobs', 50),
(113, 'Bulk Courier', 19),
(114, 'Bulk Email', 17),
(115, 'Bulk SMS', 17),
(116, 'Bulk Whatsapp', 17),
(117, 'Bunglows on Hire ', 3),
(118, 'Bus ', 71),
(119, 'Bus on Hire', 3),
(120, 'Business and Industrial Goods', 70),
(121, 'Business Loans', 48),
(122, 'Businesses & Ecomics', 11),
(123, 'Buy', 60),
(124, 'Buy & Sell', 6),
(125, 'CA', 1),
(126, 'Cabinets', 50),
(127, 'Cake Shops', 62),
(128, 'Cakes', 20),
(129, 'Camera', 61),
(130, 'Cameras on Hire', 3),
(131, 'Cancer Hospitals', 37),
(132, 'Car', 61),
(133, 'Car AC', 61),
(134, 'Car Accessories', 5),
(135, 'Car Batteries', 5),
(136, 'Car Insurance', 6),
(137, 'Car Insurance', 40),
(138, 'Car Loans', 6),
(139, 'Car Loans', 48),
(140, 'Car Modification', 6),
(141, 'Car on Hire', 3),
(142, 'Car Rentals', 71),
(143, 'Car Repair', 5),
(144, 'Car Services', 6),
(145, 'Car Tyres', 5),
(146, 'Car Wash', 5),
(147, 'Cardiac Hospitals', 37),
(148, 'Cardiac Specialists', 22),
(149, 'Cardiologists', 24),
(150, 'Cardiologists ', 22),
(151, 'Carpent Contractors', 16),
(152, 'Carpenter', 34),
(153, 'Carpenters', 51),
(154, 'Carpentry Contractors', 16),
(155, 'Carpets', 36),
(156, 'Cars Rentals', 13),
(157, 'Casting and Moduling Equipment', 39),
(158, 'CCTV', 17),
(159, 'CCTV Camera', 61),
(160, 'CCTV Cameras', 64),
(161, 'Ceiling', 18),
(162, 'Centring', 18),
(163, 'Chains', 43),
(164, 'Chairs on Hire', 3),
(165, 'Charitable Hospitals', 37),
(166, 'Chemists', 49),
(167, 'Chess', 67),
(168, 'Chess', 68),
(169, 'Chest Specialists', 22),
(170, 'Chettinad ', 62),
(171, 'Child Specialists', 22),
(172, 'Children & Young', 11),
(173, 'Children Hospitals', 37),
(174, 'Chimneys', 50),
(175, 'Chinese', 14),
(176, 'Chinese', 47),
(177, 'Chinese', 62),
(178, 'Chiropractors', 22),
(179, 'Chocolate Bouquet Florists', 30),
(180, 'Choreographers of Sangeet Sand', 72),
(181, 'Civil Contractors', 16),
(182, 'Classes', 23),
(183, 'Classical Dance', 21),
(184, 'Cleaning ', 20),
(185, 'Cleaning Services', 38),
(186, 'Clinical Nutritions', 22),
(187, 'Clinical Psychologists', 22),
(188, 'Clothes', 7),
(189, 'Club House', 33),
(190, 'Coaching Classes and Tutorials', 23),
(191, 'Cockroach Control', 55),
(192, 'Colleges', 23),
(193, 'Commercial', 41),
(194, 'Commercial Pest Control', 55),
(195, 'Computer', 61),
(196, 'Computer Hardware', 61),
(197, 'Computer Hardware Training', 69),
(198, 'Computer Networking Training', 69),
(199, 'Computer Printer', 61),
(200, 'Computer Repair', 34),
(201, 'Computers on Hire', 3),
(202, 'Concrete', 18),
(203, 'Construction Contractors', 16),
(204, 'Consultancy', 2),
(205, 'Continental', 14),
(206, 'Continental', 62),
(207, 'Cooks', 38),
(208, 'Cooks on Hire', 3),
(209, 'Corporate Parties', 27),
(210, 'Cosmetic Surgeons', 22),
(211, 'Cosmetologists', 22),
(212, 'Costumes', 53),
(213, 'Costumes on Hire', 3),
(214, 'Cottages on Hire', 3),
(215, 'Cranes on Hire', 3),
(216, 'Creams', 7),
(217, 'Credit Cards', 48),
(218, 'Cricket ', 67),
(219, 'Cricket ', 68),
(220, 'Critical Insurance', 40),
(221, 'Cupboards', 18),
(222, 'Customosed Flourists', 30),
(223, 'Cyber Cafes', 42),
(224, 'Cycle Shop', 66),
(225, 'Dance Groups', 53),
(226, 'Dance Groups', 72),
(227, 'Database Training', 69),
(228, 'Day Care', 63),
(229, 'Dead Body Freezer Box on Hire', 3),
(230, 'Decoration ', 72),
(231, 'Decorators', 53),
(232, 'Dental Hospitals', 37),
(233, 'Dental Surgeons', 22),
(234, 'Dentists', 49),
(235, 'Dermatologists', 22),
(236, 'Dermatosurgeons', 22),
(237, 'Design', 18),
(238, 'Desserts', 62),
(239, 'Dhaba', 62),
(240, 'DHL', 19),
(241, 'Dhol Players', 72),
(242, 'Diabetic Centres', 37),
(243, 'Diabetologists', 22),
(244, 'Diaeticians', 22),
(245, 'Diamonds', 43),
(246, 'Diapers', 7),
(247, 'Diet Food ', 62),
(248, 'Dietitions', 29),
(249, 'Digital Marketing', 17),
(250, 'Digital Marketing Classes', 17),
(251, 'Discotheques', 62),
(252, 'Dish Washer', 61),
(253, 'Disinfection Services', 51),
(254, 'DJ Equipments on Hire', 3),
(255, 'DJ on Hire', 53),
(256, 'DJ on Hire', 72),
(257, 'Doctors', 49),
(258, 'Doctors Available 24 Hours', 22),
(259, 'Doctors for Allergy', 22),
(260, 'Doctors for Arthritis Treatmen', 22),
(261, 'Doctors for Asthama Treatment', 22),
(262, 'Doctors for Breast Cancer Trea', 22),
(263, 'Doctors for Breast Enlargement', 22),
(264, 'Doctors for Breast Implant', 22),
(265, 'Doctors for Burn Surgery ', 22),
(266, 'Doctors for Cataract Operation', 22),
(267, 'Doctors for Colonoscopy', 22),
(268, 'Doctors for Gallostone Removal', 22),
(269, 'Doctors for Hair Loss Treatmen', 22),
(270, 'Doctors for Hernia', 22),
(271, 'Doctors for HIV AIDS Treatment', 22),
(272, 'Doctors for Jaundice', 22),
(273, 'Doctors for Kidney Stone Laser', 22),
(274, 'Doctors for Kidney Transpalnt', 22),
(275, 'Doctors for Laser Eye Surgery', 22),
(276, 'Doctors for Mental Illness', 22),
(277, 'Doctors for Neck Surgery', 22),
(278, 'Doctors for Pain Relief', 22),
(279, 'Doctors for Paralysis Treatmen', 22),
(280, 'Doctors for Respiratory Deceas', 22),
(281, 'Doctors for Tuberculosis Treat', 22),
(282, 'Doctors For Varicose Veins Tre', 22),
(283, 'Doctors for Weight Loss', 22),
(284, 'Doli on Hire', 72),
(285, 'Door Window Replace', 34),
(286, 'Drainage Contractors', 16),
(287, 'Drilling and Boring Equipments', 39),
(288, 'Drilling Contractors', 16),
(289, 'Driver', 6),
(290, 'Drivers', 38),
(291, 'Drug De-Addiction Center', 22),
(292, 'Dry Bouquet Florists', 30),
(293, 'DTDC', 19),
(294, 'Duplicate Key Store', 24),
(295, 'DVD Player', 61),
(296, 'Earrings', 43),
(297, 'Earthmovers on Hire', 3),
(298, 'Educational Loans', 48),
(299, 'Electric Chimney', 61),
(300, 'Electrical Contractors', 16),
(301, 'Electrician', 34),
(302, 'Electricians', 20),
(303, 'Electricians', 51),
(304, 'Elevator', 61),
(305, 'Elevator Contractors', 16),
(306, 'Endocrinologists', 22),
(307, 'Endoscopists', 22),
(308, 'Engineering Design Training', 69),
(309, 'English', 47),
(310, 'ENT Hospitals', 37),
(311, 'ENT Specialists', 22),
(312, 'ENT Surgeons', 22),
(313, 'ESIC Doctors', 22),
(314, 'Esis Hospitals', 37),
(315, 'Europian Restaurants', 62),
(316, 'Event Management', 26),
(317, 'Event Organisers', 53),
(318, 'Event Organisers', 72),
(319, 'Eye Hospitals', 37),
(320, 'Eye Specialists', 22),
(321, 'Eye Surgeons', 22),
(322, 'Fabrication Contractors', 16),
(323, 'False Ceiling Contractors', 16),
(324, 'Fantasy , Horror & Science Fic', 11),
(325, 'Far East Asian Restaurants', 62),
(326, 'Farm House on Hire', 3),
(327, 'Fedex', 19),
(328, 'Fences', 36),
(329, 'Fertiliser Shop', 46),
(330, 'Fire Brigade', 24),
(331, 'Fire Works', 72),
(332, 'Firecrackers', 53),
(333, 'Firefighters Contractors', 16),
(334, 'Fireworks', 53),
(335, 'First Flight', 19),
(336, 'Fistula Surgeons', 22),
(337, 'Fitness Classes', 29),
(338, 'Fli Control', 55),
(339, 'Flights', 71),
(340, 'Flooring', 18),
(341, 'Flooring Contractors', 16),
(342, 'Floorings ', 36),
(343, 'Florists', 53),
(344, 'Florists', 72),
(345, 'Florists for All India', 30),
(346, 'Florists for Car Decoration', 30),
(347, 'Florists for Corporate', 30),
(348, 'Florists for Event Decoration', 30),
(349, 'Florists for Office Decoration', 30),
(350, 'Florists for Wedding Decoratio', 30),
(351, 'Florists Home Delivery', 30),
(352, 'Florists with Cake]', 30),
(353, 'Flower Decorators', 72),
(354, 'Flower Shops ', 30),
(355, 'Food and Agriculture Products', 70),
(356, 'Football', 67),
(357, 'Football', 68),
(358, 'Footwear', 7),
(359, 'Forex ', 71),
(360, 'French', 47),
(361, 'French ', 62),
(362, 'Fruits', 20),
(363, 'Furnishing', 35),
(364, 'Furniture', 61),
(365, 'Furniture Contractors', 16),
(366, 'Furnitures ', 35),
(367, 'Furnitures on Hire ', 3),
(368, 'Games Shop', 25),
(369, 'Gaon ', 62),
(370, 'Gaon Thali', 62),
(371, 'Garage', 6),
(372, 'Garden Contractors', 16),
(373, 'Gardening', 34),
(374, 'Gardner', 46),
(375, 'Gas or stove repairing', 34),
(376, 'Gas Stove', 61),
(377, 'Gas Stoves', 50),
(378, 'Gastroenterologists', 22),
(379, 'Gastrointestinal Surgeon Docto', 22),
(380, 'Gati', 19),
(381, 'Gemstone', 43),
(382, 'General Physicians', 22),
(383, 'General Surgeons', 22),
(384, 'Generator', 61),
(385, 'Generator and Power Backup', 53),
(386, 'Generator and Power Backup', 72),
(387, 'Generators on Hire', 3),
(388, 'German', 47),
(389, 'Geyser', 61),
(390, 'Goan', 14),
(391, 'Gold', 43),
(392, 'Gold Coins', 43),
(393, 'Government Veterinary Hospital', 37),
(394, 'Graphics Design', 17),
(395, 'Greek ', 62),
(396, 'Grill', 62),
(397, 'Grocery ', 20),
(398, 'Groom Wear on Hire', 72),
(399, 'Grooming', 7),
(400, 'Guest Houses', 53),
(401, 'Guest Houses', 72),
(402, 'Gujrati', 14),
(403, 'Gujrati', 62),
(404, 'Gujrati Thali', 62),
(405, 'Gym', 29),
(406, 'Gymnastic ', 67),
(407, 'Gynaecologic Oncologist Doctor', 22),
(408, 'Gynaecologist & Obstetrician D', 22),
(409, 'Hair Transplant Surgeons', 22),
(410, 'Halal', 62),
(411, 'Health Equipments', 29),
(412, 'Health Food and Supplements', 29),
(413, 'Health Insurance', 40),
(414, 'Hearing Care Clinics', 22),
(415, 'Height Specialists', 22),
(416, 'Hepatologists', 22),
(417, 'Hernia Surgeons', 22),
(418, 'Hiking', 68),
(419, 'Hip Hop', 21),
(420, 'Hire Detectives', 64),
(421, 'History', 11),
(422, 'HIV Hospitals', 37),
(423, 'Home Cleaning', 51),
(424, 'Home Loans', 48),
(425, 'Home Stays', 71),
(426, 'Home Theater', 61),
(427, 'Homeopathic Doctors', 22),
(428, 'Homeopathic Doctors for Skin C', 22),
(429, 'Homeopathic Hospitals', 37),
(430, 'Horses On Hire', 72),
(431, 'Hospitals', 24),
(432, 'Hospitals', 49),
(433, 'Hotels ', 71),
(434, 'House Warming', 14),
(435, 'Household Goods', 70),
(436, 'Housekeeping', 35),
(437, 'Hydrabadi', 14),
(438, 'Hydrabadi', 62),
(439, 'Hypnotherapists', 22),
(440, 'Ice Creams', 20),
(441, 'Ice Cube Dealers', 53),
(442, 'Indian', 62),
(443, 'Industrial Hardwares', 39),
(444, 'Infertility Doctors', 22),
(445, 'Influencer', 73),
(446, 'Installation', 34),
(447, 'Instrument Music Classes', 21),
(448, 'Instrumentation and Control Eq', 39),
(449, 'Insulation', 36),
(450, 'Insurance', 1),
(451, 'Interior Decorators', 41),
(452, 'Interior Designer Institutes', 41),
(453, 'Interior Designers', 41),
(454, 'Interior Furnishing Contractor', 41),
(455, 'International', 19),
(456, 'International', 52),
(457, 'Internet Service Provider', 17),
(458, 'Internet Service Providers', 42),
(459, 'Internet Websites for Flower D', 30),
(460, 'Inverter', 61),
(461, 'Invitation Cards', 53),
(462, 'Irani', 62),
(463, 'IT Solutions', 17),
(464, 'Italian', 62),
(465, 'Italian ', 14),
(466, 'Jain', 14),
(467, 'Jain', 62),
(468, 'Japanese', 62),
(469, 'Jewellery ', 72),
(470, 'Judo', 67),
(471, 'Juice Services', 53),
(472, 'Juice Services', 72),
(473, 'Junk Transporters', 70),
(474, 'karate', 67),
(475, 'Kashmiri', 62),
(476, 'Kashmiri ', 14),
(477, 'Kathiyawadi', 62),
(478, 'Kebab', 62),
(479, 'Kerala', 14),
(480, 'Kerala', 62),
(481, 'Kidney Hospitals', 37),
(482, 'Kids Entertainment', 53),
(483, 'Kids Entertainment', 72),
(484, 'Kindergarten', 59),
(485, 'Kitchen and Dining', 35),
(486, 'Kitchen Trolly', 34),
(487, 'Knee Replacement Surgeons', 22),
(488, 'Kokani', 62),
(489, 'Kolhapuri ', 62),
(490, 'Korean', 62),
(491, 'Kutchi', 62),
(492, 'L Shaped Kitchen', 50),
(493, 'Labour Contractors', 16),
(494, 'Lamps and Lighting', 35),
(495, 'Langauge Classes', 23),
(496, 'Laparoscopic Surgeons', 22),
(497, 'Laptop', 61),
(498, 'Laptops on Hire', 3),
(499, 'Lasik Eye Surgeons', 22),
(500, 'Laundry Services', 20),
(501, 'Laundry Services', 38),
(502, 'Lawn Mentainence', 46),
(503, 'Lawns for Events', 9),
(504, 'Lebanese', 14),
(505, 'Lebanese', 62),
(506, 'LIC Panel Doctors', 22),
(507, 'Liposuction Doctors', 22),
(508, 'Liquor Stores', 53),
(509, 'Literature &Fiction', 11),
(510, 'Lizard Control', 55),
(511, 'Loan Against Gold', 48),
(512, 'Loans on Two Wheelers', 48),
(513, 'Local', 19),
(514, 'Local', 52),
(515, 'Lock Dealers', 64),
(516, 'Lounge Bars', 62),
(517, 'Lucknowi', 62),
(518, 'Lunch Buffet', 62),
(519, 'Maharashtrian', 14),
(520, 'Maharashtrian ', 62),
(521, 'Maharashtrian  Thali', 62),
(522, 'Maids', 38),
(523, 'Maigrain Therapists', 22),
(524, 'Maintenance', 34),
(525, 'Makeup and Hair Styling', 51),
(526, 'Malwani', 62),
(527, 'Malwani Thali', 62),
(528, 'Mandap Decorators', 72),
(529, 'Mangalorean', 14),
(530, 'Mangalorean ', 62),
(531, 'Mangalsutras', 43),
(532, 'Marriage Gardens', 72),
(533, 'Marwadi', 62),
(534, 'Marwadi Thali', 62),
(535, 'Marwari', 14),
(536, 'Massage Services', 51),
(537, 'Maternity Hospitals', 37),
(538, 'Mechanic', 6),
(539, 'Medical', 58),
(540, 'Medicines', 20),
(541, 'Meditation and Relaxation', 29),
(542, 'Mehendi Artists', 72),
(543, 'Mental Hospitals', 37),
(544, 'Mexican', 14),
(545, 'Mexican ', 62),
(546, 'Microwave Oven', 61),
(547, 'Milk Products', 20),
(548, 'Milkshakes', 53),
(549, 'Milling and Grinding Tools', 39),
(550, 'Mini Bus on Hire', 3),
(551, 'Mini Trucks on Hire', 3),
(552, 'Mobile Development Training', 69),
(553, 'Mobile Phone', 61),
(554, 'Mobile Repairing', 17),
(555, 'Mobile Shop', 17),
(556, 'Modern Indian', 62),
(557, 'Modular Kitchens', 36),
(558, 'Mongolian', 62),
(559, 'Montessori', 59),
(560, 'Moroccan ', 62),
(561, 'Mortgage Loans', 48),
(562, 'Mosquito Control', 55),
(563, 'Motorcycle', 61),
(564, 'Motorcycle Repair', 5),
(565, 'Motorcycles on Hire', 3),
(566, 'Movers for Automobiles', 52),
(567, 'Movers for Commercials', 52),
(568, 'Mughlai', 14),
(569, 'Mughlai ', 62),
(570, 'Multicuisin', 62),
(571, 'Multicuisine', 14),
(572, 'Multimedia and Design Training', 69),
(573, 'Multipurpose Hall', 33),
(574, 'Multispecialty Hospitals', 37),
(575, 'Music Bands', 72),
(576, 'Music Classes', 23),
(577, 'Muslim', 14),
(578, 'Mutual Funds', 1),
(579, 'Nail Art', 4),
(580, 'National', 19),
(581, 'National', 52),
(582, 'Naturopathic Doctors', 22),
(583, 'Necklaces', 43),
(584, 'Neonatologists', 22),
(585, 'Nephrologists', 22),
(586, 'Neuro Physicians', 22),
(587, 'Neurological Hospitals', 37),
(588, 'Neurologists', 22),
(589, 'New Cars ', 6),
(590, 'New Two Wheelers', 6),
(591, 'Night Clubs', 62),
(592, 'Non Veg', 14),
(593, 'Non-AC Banquet Halls', 9),
(594, 'Non-veg Thali', 62),
(595, 'North Indian', 14),
(596, 'North Indian', 62),
(597, 'Nursery', 63),
(598, 'Nursing Homes', 37),
(599, 'Occupational Therapists', 22),
(600, 'office Caterers', 14),
(601, 'Offices on Hire', 3),
(602, 'On call Doctors', 22),
(603, 'On Call Gynaecologists', 22),
(604, 'On Call Padeatricians ', 22),
(605, 'On Call Veternity Doctors', 22),
(606, 'Oncologists', 22),
(607, 'Online Doctors', 22),
(608, 'Opthalmologists', 22),
(609, 'Opthalmologists', 37),
(610, 'Opthopaedic Hospitals', 37),
(611, 'Opticians', 49),
(612, 'Oral Oncologists', 22),
(613, 'Orchestra Bands', 53),
(614, 'Oriental', 62),
(615, 'Orthodensists', 22),
(616, 'Orthopaedic Doctors', 22),
(617, 'Other Garden Services', 46),
(618, 'Paan Suppliers', 72),
(619, 'Packers & Movers', 34),
(620, 'Paediatric Cardiologists', 22),
(621, 'Paediatric Dermatologists', 22),
(622, 'Paediatric ENT Specialists', 22),
(623, 'Paediatric Gastroenterologist ', 22),
(624, 'Paediatric Neurologists', 22),
(625, 'Paediatric Opthalmologists', 22),
(626, 'Paediatric Psycologists', 22),
(627, 'Paediatric Surgeons', 22),
(628, 'Paediatricians', 22),
(629, 'Painter', 34),
(630, 'Painters', 51),
(631, 'Painting', 18),
(632, 'Painting Classes', 23),
(633, 'Painting Contractors', 16),
(634, 'Paintings', 36),
(635, 'Pandits', 72),
(636, 'Panjabi', 62),
(637, 'Panjabi Thali', 62),
(638, 'Parsi', 14),
(639, 'Parsi ', 62),
(640, 'Party Caterers', 14),
(641, 'Party Organisers for Children', 53),
(642, 'Party Supplies', 53),
(643, 'Passenger Vans on Hire', 3),
(644, 'Pastry Shops', 62),
(645, 'Pathologists', 22),
(646, 'Pathology Labs', 49),
(647, 'Paving or Flooring', 34),
(648, 'Pendants', 43),
(649, 'Peripheral Nerve Surgeons', 22),
(650, 'Personal Loans', 48),
(651, 'Pest Control', 38),
(652, 'Pest Control', 55),
(653, 'Pet Accessories', 56),
(654, 'Pet Food', 56),
(655, 'Pet Shop', 57),
(656, 'Pet Shops', 56),
(657, 'PG, Hostels and Rooms', 60),
(658, 'Pharma Agency', 58),
(659, 'Photographers', 53),
(660, 'Photographers', 72),
(661, 'Photography', 26),
(662, 'Photography Classes', 23),
(663, 'Phychitrists', 22),
(664, 'Phychitrists for Home Visit', 22),
(665, 'Physiotherapists', 22),
(666, 'Physiotherapists for Home Visi', 22),
(667, 'Pilate Classes', 29),
(668, 'Piles Doctors', 22),
(669, 'Pipeline Contractors', 16),
(670, 'Planning', 18),
(671, 'Planting', 46),
(672, 'Plants and heavy Equipments', 70),
(673, 'Plastering', 18),
(674, 'Platinum ', 43),
(675, 'Play School', 59),
(676, 'Playback Singers', 53),
(677, 'Plumber', 20),
(678, 'Plumbers', 51),
(679, 'Plumbing Contractors', 16),
(680, 'Police', 24),
(681, 'Pooja Items', 72),
(682, 'Pop Contractors', 16),
(683, 'Portfolio Management', 1),
(684, 'Portuguese ', 62),
(685, 'Pre-School', 59),
(686, 'Private Hospitals', 37),
(687, 'Private Parties', 27),
(688, 'Professional Couriers', 19),
(689, 'Programming Languages', 69),
(690, 'Projector', 61),
(691, 'Projectors on Hire', 3),
(692, 'Psycologists', 22),
(693, 'Psycologists for Children', 22),
(694, 'Public Hospitals', 37),
(695, 'Pubs', 62),
(696, 'Punjabi', 14),
(697, 'Pure Veg Buffet', 62),
(698, 'Radiologists', 22),
(699, 'Rajasthani', 14),
(700, 'Rajsthani', 62),
(701, 'Rajsthani Thali', 62),
(702, 'Rangoli Classes', 4),
(703, 'Rat Control', 55),
(704, 'Readymade Garments', 72),
(705, 'Reception Hall', 33),
(706, 'Refrigerator', 61),
(707, 'Refrigerators on Hire', 3),
(708, 'Renovation Service', 34),
(709, 'Rent', 60),
(710, 'Rental', 6),
(711, 'Residential Pest Control', 55),
(712, 'Residents', 41),
(713, 'Resorts', 71),
(714, 'Restaurant', 31),
(715, 'Restaurants with Candle light ', 62),
(716, 'Rheumatologists', 22),
(717, 'Rings', 43),
(718, 'RO Water Purifier', 61),
(719, 'Road Construction', 16),
(720, 'Rodent Control', 55),
(721, 'Roof Top Banquet Halls', 9),
(722, 'Roofing', 34),
(723, 'Roofing Contractors', 16),
(724, 'Roofings', 36),
(725, 'Rooms on Hire', 3),
(726, 'Russian ', 62),
(727, 'Safeexpress', 19),
(728, 'Salon', 54),
(729, 'Salon at Home', 51),
(730, 'Saloon', 65),
(731, 'Salsa', 21),
(732, 'Savji', 62),
(733, 'School', 23),
(734, 'School Event', 63),
(735, 'Schools', 23),
(736, 'Science &Technology', 11),
(737, 'Scooter', 61),
(738, 'Scooter Repair', 5),
(739, 'Scrap Material', 34),
(740, 'Sea Food Biryani', 62),
(741, 'Seat Cover', 6),
(742, 'Security System Dealers', 64),
(743, 'Sell', 60),
(744, 'Sell Cars', 6),
(745, 'Sell Two Wheelers', 6),
(746, 'Seminar Organisers', 27),
(747, 'Sewing Machine', 61),
(748, 'Sexologists', 22),
(749, 'Sexologists for female', 22),
(750, 'Sexologists for Male', 22),
(751, 'Sherwanis on  Hire', 3),
(752, 'Showroom', 6),
(753, 'Shree Lankan ', 62),
(754, 'Silver', 43),
(755, 'Sindhi', 14),
(756, 'Sizzelers', 62),
(757, 'Skating ', 67),
(758, 'Skating ', 68),
(759, 'Skin and Hair doctors', 22),
(760, 'Skin Doctors', 22),
(761, 'Sofa Set', 61),
(762, 'Soft Skill and Image Building', 23),
(763, 'Software Solutions', 17),
(764, 'Somnologists', 22),
(765, 'Somnologists', 22),
(766, 'Sonologists', 22),
(767, 'Sound System on Hire', 53),
(768, 'Sound System On Hire', 72),
(769, 'Sound Systems on Hire', 3),
(770, 'South East Asian', 62),
(771, 'South Indian', 14),
(772, 'South Indian', 62),
(773, 'Spa & Saloon', 65),
(774, 'Spanish', 62),
(775, 'Spare Parts', 6),
(776, 'Spas', 54),
(777, 'Speech Therapists', 22),
(778, 'Speedpost', 19),
(779, 'Spider Control', 55),
(780, 'Spine Doctors', 22),
(781, 'Sport Clubs', 29),
(782, 'Sports', 29),
(783, 'Sports Bar', 62),
(784, 'Sports Shop', 66),
(785, 'Stage Show Organisers', 27),
(786, 'Stem Cell Therapists', 22),
(787, 'Street Restaurants', 62),
(788, 'Suits on Hire', 3),
(789, 'Super Shopee', 8),
(790, 'Sweet Mart', 31),
(791, 'Sweet Shops', 72),
(792, 'Sweet Shops ', 53),
(793, 'Swimming', 67),
(794, 'Swimming', 68),
(795, 'Swimming Pool Contractors', 16),
(796, 'Swimming Pools', 36),
(797, 'Swine Flu Testing Centres', 37),
(798, 'Table Tennis', 67),
(799, 'Table Tennis', 68),
(800, 'Tablet', 61),
(801, 'Tailing', 34),
(802, 'Tailor', 34),
(803, 'Tandoori', 62),
(804, 'Tatoo Making', 4),
(805, 'Taxi', 6),
(806, 'Tempo Traveller', 71),
(807, 'Tempos on Hire', 3),
(808, 'Tempos Travellers on Hire', 3),
(809, 'Tennis', 67),
(810, 'Tennis', 68),
(811, 'Tent House', 53),
(812, 'Tent House', 72),
(813, 'Term Insurance', 40),
(814, 'Termite Control', 55),
(815, 'Thai', 14),
(816, 'Thai', 62),
(817, 'Therapists', 22),
(818, 'Thyroid Doctors', 22),
(819, 'Tibetiian', 62),
(820, 'Tiles ', 36),
(821, 'Tiling Contractors', 16),
(822, 'Timber Door', 18),
(823, 'Toilet Fittings', 18),
(824, 'Toys', 7),
(825, 'Trackon', 19),
(826, 'Trade Fair Organisers', 27),
(827, 'Trainer', 66),
(828, 'Training', 29),
(829, 'Training Institutes', 23),
(830, 'Trains', 71),
(831, 'Transporters', 52),
(832, 'Travel', 11),
(833, 'Travel Insurance', 40),
(834, 'Treadmill', 61),
(835, 'Trekking', 66),
(836, 'Trichonologists', 22),
(837, 'Trucks on Hire', 3),
(838, 'Tuberculosis Hospitals ', 37),
(839, 'Turkey Biryani', 62),
(840, 'TV', 61),
(841, 'Two Wheeler', 40),
(842, 'Two Wheeler Accessories', 5),
(843, 'Two Wheeler Batteries', 5),
(844, 'Two Wheeler Insurance', 6),
(845, 'Two Wheeler Loans', 6),
(846, 'Two Wheeler Services', 6),
(847, 'Two Wheeler Tyres', 5),
(848, 'Tyre Shop', 6),
(849, 'Udapi', 62),
(850, 'Ultrasonologists', 22),
(851, 'Unani Doctors', 22),
(852, 'Unisex Saloon', 65),
(853, 'Universities', 23),
(854, 'UPS', 61),
(855, 'Urologists', 22),
(856, 'Used Cars', 6),
(857, 'Used Two Wheelers', 6),
(858, 'Vans on Hire', 3),
(859, 'Varhadi', 62),
(860, 'vascular Surgeons', 22),
(861, 'Veg', 14),
(862, 'Vegan', 62),
(863, 'Vehicle Transporters', 70),
(864, 'Veterinary Doctors', 22),
(865, 'Veterinary Doctors', 56),
(866, 'Veterinary Hospitals', 37),
(867, 'Vichare', 19),
(868, 'Visa', 71),
(869, 'Vocal Music Classes', 21),
(870, 'Walkie Talkie Dealers', 64),
(871, 'Wall Claddings', 36),
(872, 'Wall Paper Contractors', 16),
(873, 'Washing Center', 6),
(874, 'Washing Machine', 61),
(875, 'Wasp and Bee Control', 55),
(876, 'Water Proofing', 34),
(877, 'Water Purifier', 61),
(878, 'Watering', 46),
(879, 'Waterproofing Contractors', 16),
(880, 'Web Designers', 42),
(881, 'Wedding Cards', 72),
(882, 'Wedding Caterers', 14),
(883, 'Wedding Caterers', 72),
(884, 'Wedding Grocery', 72),
(885, 'Wedding Halls', 72),
(886, 'Wedding Organisers', 27),
(887, 'Weight Reduction', 29),
(888, 'Welding Contractors', 16),
(889, 'Western Music Classes', 21),
(890, 'WIFI Internet Service Provider', 42),
(891, 'Wine Retailers', 53),
(892, 'Wood Borer Control', 55),
(893, 'Wrist Watch', 61),
(894, 'Yoga Classes', 29),
(895, 'Bus Booking Service', 12),
(896, 'Content Creator', 73),
(897, 'Landing Page', 73);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 7, '[{\"id\":1,\"title\":\"Walter White\",\"description\":\"Explicabo voluptatem mollitia et repellat qui dolorum quasi\",\"designation\":\"Chief Executive Officer\",\"image\":\"testimonials-5.jpg\"},{\"id\":2,\"title\":\"Sarah Jhonson\",\"description\":\"Aut maiores voluptates amet et quis praesentium qui senda para\",\"designation\":\"Product Manager\",\"image\":\"testimonials-2.jpg\"}]', 1, 13, '2023-06-03 05:06:11', '2023-06-05 06:43:24'),
(2, 3, NULL, 1, 1, '2023-06-05 03:15:07', '2023-06-05 03:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_enabled` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `business_id`, `content`, `is_enabled`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 7, '[{\"id\":1,\"rating\":\"5\",\"title\":\"Ninad\",\"description\":\"Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.\",\"image\":\"testimonials-5.jpg\"},{\"id\":2,\"rating\":\"4\",\"title\":\"ABC\",\"description\":\"Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.\",\"image\":\"testimonials-2.jpg\"},{\"id\":3,\"rating\":\"5\",\"title\":\"XYZ\",\"description\":\"Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.\",\"image\":\"testimonials-4.jpg\"}]', 1, 13, '2023-05-20 04:07:24', '2023-05-30 13:30:25'),
(2, 4, '[{\"id\":1,\"rating\":\"5\",\"title\":\"\",\"description\":\"\",\"image\":\"team-2.jpg\"}]', 1, 9, '2023-05-24 04:35:51', '2023-05-24 04:51:01'),
(3, 3, NULL, 1, 8, '2023-05-30 04:29:13', '2023-05-30 04:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `current_store` int DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'company',
  `plan` int NOT NULL DEFAULT '1',
  `plan_expire_date` date DEFAULT NULL,
  `requested_plan` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `plan_is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `lang`, `current_store`, `avatar`, `type`, `plan`, `plan_expire_date`, `requested_plan`, `created_by`, `mode`, `plan_is_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', NULL, '$2y$10$A065KCceFjvqYR.RXl6i8OFxXCRkfqKRY0HqQt/B7Yk0xdP1nJjDO', NULL, 'en', NULL, NULL, 'super admin', 1, NULL, 0, 0, 'light', 1, '2023-03-31 02:49:04', '2023-05-25 09:27:10'),
(2, 'Company', 'company@example.com', NULL, '$2y$10$LBFiKsO/mHtFCDbipISwUO3zDtwL7XW7j2SCa/hqM3reHDRYqNFdy', NULL, 'en', NULL, NULL, 'company', 1, NULL, 0, 1, 'light', 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(8, 'Ninad Prabhune', 'prabhuneninad@gmail.com', NULL, '$2y$10$U1zyJ306DQv.9L9y1WrlzOFGjwHz4LHH2Z0YyKqDV11finPrx0BPO', NULL, 'en', NULL, NULL, 'company', 1, NULL, 0, 1, 'light', 1, '2023-04-19 03:04:36', '2023-04-19 03:04:36'),
(9, 'tejas', 'tejas@gmail.com', NULL, '$2y$10$vfnF5AgFa7tucuRCO1ne1Oy65Wlv/CdQfXhW47mN5gfcL4/I7Eff2', NULL, '', NULL, NULL, 'company', 1, NULL, 0, 1, 'light', 1, '2023-04-19 03:24:26', '2023-04-19 03:24:26'),
(13, 'Teetli Official', 'teetliofficialtest@gmail.com', NULL, '$2y$10$ACxZTS505m7A/.3zU80ZfOInZM0bk9yZMG2pC7pvV3JDcfHX9jjiG', NULL, 'en', NULL, NULL, 'company', 1, NULL, 0, 1, 'light', 1, '2023-05-10 03:02:19', '2023-05-10 03:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

DROP TABLE IF EXISTS `user_coupons`;
CREATE TABLE IF NOT EXISTS `user_coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `coupon` int NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_email_templates`
--

DROP TABLE IF EXISTS `user_email_templates`;
CREATE TABLE IF NOT EXISTS `user_email_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_id` int NOT NULL,
  `user_id` int NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_email_templates`
--

INSERT INTO `user_email_templates` (`id`, `template_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04'),
(2, 2, 1, 1, '2023-03-31 02:49:04', '2023-03-31 02:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` mediumtext COLLATE utf8mb4_unicode_ci,
  `url` mediumtext COLLATE utf8mb4_unicode_ci,
  `referer` mediumtext COLLATE utf8mb4_unicode_ci,
  `languages` text COLLATE utf8mb4_unicode_ci,
  `useragent` text COLLATE utf8mb4_unicode_ci,
  `headers` text COLLATE utf8mb4_unicode_ci,
  `device` text COLLATE utf8mb4_unicode_ci,
  `platform` text COLLATE utf8mb4_unicode_ci,
  `browser` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitable_id` bigint UNSIGNED DEFAULT NULL,
  `visitor_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visitor_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`),
  KEY `visitor_visitor_type_visitor_id_index` (`visitor_type`,`visitor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `slug`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IldPVm5zWHcySWY5QXA4L3JSRUR2SlE9PSIsInZhbHVlIjoiZ2EvZnBINWh3SDJjRmJyTmRCa1REY1h2amRINWd3Mk1TZ0l5RTB6NXhFQVgraUtXY1FtQm5YRk5MVjIrb21UNkhncCtYUFNTWC9NbjdPNjNEbTI1RnZwRDdsdmhEQnZObEwvTy9IQk9YYjRwRVREdUl4QVVIMjhGOVhIUTJ5TjAiLCJtYWMiOiI4ZDQ4MjIzZTYyNTk3ZGZlNWM4M2U2MDQzMmMyZWYzYWY4MjdhYTRiNTgwYzFlZjUxOTlmMTNlMzUzZTgxOWJkIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6IjNrL2ZMWkU4dmNEZkZXSFRWK0U1VEE9PSIsInZhbHVlIjoiVDhRSFZrUlpRMmliT3BjLzVaU21jOExFUzZJQy9VZTdUdmlDUThiTnBlaGxVVUFySlU2b1JhZjBIc1dpbDhyaE1OVzFZVTJHbzdYSUJYNENnaUdDWkNLeUtiVXdENzdSaFNkb21yTGYvQlJLRmN0cEd4ZlU4M0tCcCtRR3ZMYmwiLCJtYWMiOiJjYjI0YjhkZjZjNDg5MDgxMmFlZmMxM2U0YWRiZmYyZGYwZTExY2I1OWNjYzM0NzdmODdmODZlNDdjYTIzYmUzIiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 04:42:55', '2023-05-10 04:42:55'),
(2, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InBybUp2SnBoa1ErdTZtRnMvN1dtZVE9PSIsInZhbHVlIjoieHJNV2dzcURQaGtRZkxCdFF2cy9icmQxQzJaSjdWWjU0N29FbXpaM0JocnNIaTdSSmlDV0NXNDdLcEkvVVd5YklzdEp0V29XQk4zQVNqeWE5MUxHTGhNOVh1bm11R3RLREZTZk9obVhoWXFiSWV3RGlJS2pPblRHb2VCSURlTzAiLCJtYWMiOiJiYWNmNjg3Yzk2MjI2MWJjYjY0NzBkZWEwZjgzNjAyMDhjZGYwNjYxNjg3ZGE3ZWNiNWRmYWFmMTc1OWEzMjNlIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6IkxVSXhXc3ljWDBaQnJyTHNWanQrdVE9PSIsInZhbHVlIjoiR1JoT3Z4L24zREt0REp0anJTUXZTeElkcWV4UU9nRU84MTBwMWJzbHdneUZMOUcvSzd1WXdOTU1nMWJDeVp6dnNkMHNncmgySDMzdHVQSnRneXpHVG1IemZUZGM2Mk5reGFuaEh0R2RXZ1RIMzlBL1dnSFg4aFprdEZ1bzVoUngiLCJtYWMiOiJlNTBjZDBkZDE4NDIyYzcwM2MyNzQ5YjRiZDRhYmYxYTM5MGE1YTk4ZDk1YzlhYjdiYjBiY2JkZDFkMTM5M2RmIiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 04:44:09', '2023-05-10 04:44:09'),
(3, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkFlV2RaN0lRbVk4N2svWkFaamFqNUE9PSIsInZhbHVlIjoiYkYvaUUvQ0grSC92b04zRnczVjdGcjBFSTE0eTVoRFNJRFE4bERKbms0Ylp2QVVvTnF6eWxFbHZIRjhOMnRTTUdLam56c0FseDNLSEVFTHNBMm82dFRRWlAwZjBVdHk5ODBxdEJ1VlVJeERqUEV6UC9zUFRxQVhmRDZMWnFrcXciLCJtYWMiOiIzOWNkMTNlNzdiMTkwNGE1YzAxZWU5ZjYzNTMyYWRiNjk5YmVhYjI4MGM0YzI1NTRjZDIzOTBmMDViZDBkZDRjIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6InZuQnRGZDM5TnVXWVJzWnBVUnV5a3c9PSIsInZhbHVlIjoiRWhWQWw1TmRid1o0ZERmRnBMT25LZmlUUk03N2RtK0wrZy96amt6YUlqN3d2V2kzaFpmeU4wODlIQkdkc2xGQ2hPUHFHWmZ4UVhvQ3NQTzJqVVhuLzZVRkZhQ09naUY4ODhzN0ZBblhZdXR4ajMrajN5OXJ1NTBLeDNxTEhNVTYiLCJtYWMiOiI1YWU4MDQ1ZDk0ODFiMGQ3MjJiMzM3NjQ5MTc3N2E0OWQ4MTZlNmM1ZjhiZGUyZGI2YWU5NDI1NjhmMmQxYjhkIiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 04:44:15', '2023-05-10 04:44:15'),
(4, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InRoVi8vZElGTkxOVUIvM29wdVFSeUE9PSIsInZhbHVlIjoiSndabFB3Qyt5ZEVuZ2poWTRTNWdtN0krMVl1YVREZjlDdnYzUVVKZDFlZUlxVDdFQmlreHVqYTNreHBCSHk5eHprOFBkMjRzTDJPelllOW1rUGhyMm5zazdTcnNOUjVoNXB4K0FvT2V1c3RiMlIyQ3oyTkQzMHZVY1hNL0F6U2UiLCJtYWMiOiIyOTRlMzc1NDJmNGYyMTVkNGRkYTQ1Mjk1NDczZDZlMjM3NDk4YmZkYjM4NThmMzcwMzA3NzkyZWE4OTEyZTMxIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6IkpHR3JldXBmWUtCc2doa2ZXbXEvV1E9PSIsInZhbHVlIjoiSTB0QktOT01id3VZRm5YOGorRGIxd0tSeGZRYmMrUmw3RSs5N1U2NEx4enZnNmZTaGpGakNCVy9LUjZhZVQyVzNhYVphdXhrRkJOWEtRcmlWRS9KdEF2NEprWHpYellEM0hPb09jelI4Mjk3eEhhYUozalRTNFlQYy9GdkJVOHoiLCJtYWMiOiI2NTMwY2NhNjI5ZDA4MDAwZGQ1ZjM4ZjBjZjM1OTMxN2YyMzNmODE1NWZiMjBjMTczODZjNzk0MmQzOWJmNWY0IiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 04:45:50', '2023-05-10 04:45:50'),
(5, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InRoVi8vZElGTkxOVUIvM29wdVFSeUE9PSIsInZhbHVlIjoiSndabFB3Qyt5ZEVuZ2poWTRTNWdtN0krMVl1YVREZjlDdnYzUVVKZDFlZUlxVDdFQmlreHVqYTNreHBCSHk5eHprOFBkMjRzTDJPelllOW1rUGhyMm5zazdTcnNOUjVoNXB4K0FvT2V1c3RiMlIyQ3oyTkQzMHZVY1hNL0F6U2UiLCJtYWMiOiIyOTRlMzc1NDJmNGYyMTVkNGRkYTQ1Mjk1NDczZDZlMjM3NDk4YmZkYjM4NThmMzcwMzA3NzkyZWE4OTEyZTMxIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6IkpHR3JldXBmWUtCc2doa2ZXbXEvV1E9PSIsInZhbHVlIjoiSTB0QktOT01id3VZRm5YOGorRGIxd0tSeGZRYmMrUmw3RSs5N1U2NEx4enZnNmZTaGpGakNCVy9LUjZhZVQyVzNhYVphdXhrRkJOWEtRcmlWRS9KdEF2NEprWHpYellEM0hPb09jelI4Mjk3eEhhYUozalRTNFlQYy9GdkJVOHoiLCJtYWMiOiI2NTMwY2NhNjI5ZDA4MDAwZGQ1ZjM4ZjBjZjM1OTMxN2YyMzNmODE1NWZiMjBjMTczODZjNzk0MmQzOWJmNWY0IiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 04:46:38', '2023-05-10 04:46:38'),
(6, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkhvVXJtd0d2UWZuUWhMdGt6eHF4VlE9PSIsInZhbHVlIjoiZDRXMTJCaE1POVhpcm93MG5sN3RtNnNyd2lCcEgwME5wbXVSbUpQMWVUaGNxSWNINEUrdTFNclg3cy9IdURoTVBVSXp3WVltZUVndmtPaEZFbWVSQlk4MzFrUG15dHF5ZXJycXdwcmhGN2o4Rkk2SU5udTVTTkJTa1A1RTBYc1UiLCJtYWMiOiJjMzJiM2E5NjIwNjhjYzRhN2I0MzlmMzQ2YWVhZGU3Yzk0MWYyOGYxOGYxMWNmMGQzNDIxMzg1NTJlZmFkMzYwIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6IjRnMGhIbHRiMzVXMlNJamNQVkplT2c9PSIsInZhbHVlIjoiRWhpR001eVZjL0I4TW9kKzdJclAzTWRTQVBOTlNlUHI1eWpiWjRGU05BUmpaclM2YlpPVDAwTlh5R1FTWVIrOWtOUnhmMVB3YU1lYnhLVU5hSmo4aHhVVUMwbnZTeGRENThZRmRoZDJnR0tRNjFsREE0TVBldkEwamJxMzBEVFUiLCJtYWMiOiIxZjdhMzkzOTVmNTU1NDlkOTAxMThlYzVkZTJlNzY2ZGJjZDQ0NmZhYWRlM2VlNWIwMmE3YTQ5NGQ5NGZiMzJjIiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 04:57:50', '2023-05-10 04:57:50'),
(7, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImIvekxtMmdhV0liTHNKYTRnUndlbmc9PSIsInZhbHVlIjoiNnM3YjlRMjRnVHk3Q0hHUTN6MCsvZmtXMnJiYjBaUEE5ZjZSL0RCV0U4Z0l0Y1JQRElDcUdsZVlweHZGQzdWL1BXbHRwMWpXWENIN2dEZ3hNR0JUV3l1UjJjbkt6UEh5WHd4OXA3MEhzUzZpK0NzdWlqS1c4WVo5aC84Y0hYbGUiLCJtYWMiOiJhNjBmY2U3OTQzYWM4MDlkMDlmNWZlNTE2NDBkMjU5ZTgwMTc5MWIyZmUzOGM1MTM2ZjkyYmM2Y2FkM2VjM2I5IiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6ImRJU3doUTlpdytqNGZWVGR2eXgveEE9PSIsInZhbHVlIjoibGZYRHJKYXFUWmFRZyt6aEE3a1g4UzhMd1NoaVYvc3NRWkozSEIrSW01WWFHQVAxTU4wL2NaTk1KZnRDTjNublF0bDVlMmNSUSs0ODRDN0hXRGNMUTd2WC9Gb1FrTW1YdjNxKzljTVc5Y2UwVGorS3BFQmRwY0pDWGZLWlFYWEIiLCJtYWMiOiJlMjViYWZjYzQ1NzAwYzZlYzA2OGQ3NTk5YmIwM2MzNjEyYjA0ODg2NDE4ZGQyMjEwMGY1NTM1NWZmYzU5NTVmIiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 06:13:15', '2023-05-10 06:13:15'),
(8, 'GET', '[]', 'http://webzfactoryold/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"upgrade-insecure-requests\":[\"1\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImN5TmdtMlYraTNvSGloQTlZYlYzdXc9PSIsInZhbHVlIjoiamd2YkJ0ZHdLSExXWnpwQWp5NTVCdEdwSmhzVlJHM29SZUdnd0VWVXlzWmdUYjdhZGNPelk1WHNxRWg5YlFadzBwVXlhWXFiMUVDNk1GN0tLbDZFcU1ZbEZHZ0hFTFIwcnRZcExMWlJ1L1VGa2psVGxGZ0dSamdhWU5GZDRObDEiLCJtYWMiOiI0OWU1ZDljOTZiNTMzZmIwNjQ5MGIxNWIwMDAyM2NmY2I2MGJkMzhkNzEwMTY3Y2VmYzEyNTQyMTk3ZjY2OGNiIiwidGFnIjoiIn0%3D; webzfactoryold_session=eyJpdiI6IkZVUjQyR2M0bGVGNld5S0tjU29OQWc9PSIsInZhbHVlIjoiTUxIeW56R2xNaVJycVlCeEFvRUt4RWNQWHY1YzRJSWtEdEJjMzh2UytnN2djdnh2OE9FZmVPVWh2UHJtUXVSdm5sSUdhbjNrZGpyQTFxdHRSeERjUCtEdldGN1dWMUhGK0Z6M016djNBSUdrS3NFbzVXanFtZTVUTkdVUlBIeXkiLCJtYWMiOiIyZGQ3YjgxZjY5NjRkMGUxMTI1NzRlNmM3M2U1ZWM1NzE5MjAyOWVhNTBiNjRhODAwN2IwYzU2NjNjZTVhZDcxIiwidGFnIjoiIn0%3D\"],\"connection\":[\"close\"],\"dnt\":[\"1\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"host\":[\"webzfactoryold\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-10 06:20:06', '2023-05-10 06:20:06'),
(9, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlhlUUxzcXp6NGV4dDdiRU5vYkFTRWc9PSIsInZhbHVlIjoiNHlQZjN1Q1dmdENoL0tOb1dlYUNFNksvN1pSY1BkbzdHQUJIZDMzbGlOcWd1bUN6dWRrMEM2N2VwVVNjVTdwZXFSOTNxTll6dnRTS0VMbEp6K2poR00yL3NzenBVS093cjk0UThJdHZZV01IbGZ4cS9tdW0rdjNDeUxCT2FVS04iLCJtYWMiOiJhMDA3YjM3OTFiOGQ0NzZjYmMzNTg3NDY0NzlmYzQ0NGUxYTRkNWU3NzBmZDY5NWJiNjY5ZmMyOTZjN2MxM2VmIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlFtU1lBWDVSVXRYY2k3SkxQWUxVQ1E9PSIsInZhbHVlIjoiRWVnM0E2UnAvdTZ5UUg4MlA5Nk5ENlRtYk1wWkk5UmhkUTVqSHRKL2VwOGpOdUZxbFNDcHBTUGhjVkhDYjVlRFBPSEFHYWZKLzduZUVodDhpaHZ6QU9DQ2hVamEvbUhHNjR5Q28zYm4yRUVGaXErNVRuMGgvZXUxaGRpbUEzV08iLCJtYWMiOiI2ZTdmMDJlYzZjZWFmZDljNTgwYjQ4YTg2Njk0ODA2ZjNkYjM0NjYzOWNhODU5N2NkNzU0MDlmNGI3ODBlOGQ4IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-14 08:40:00', '2023-05-14 08:40:00'),
(10, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImRkd0U5REVZZGt1QjdGc3dlM3pTYXc9PSIsInZhbHVlIjoieXFaNkM3N2xMSHBIZlpkeG82cFQ5dUhGRW5nclhxeUtpaU9kTk5aY0tjUC8xQTdHenhQTUFYemJUZEJyZE4wU1UyWUVaQnB0K1J5TzJTbzVIRllleitCcWdEOG9GTThRZndGZ1hqT1FTQnAxR3VqYWFuMGlEUC95NVNadUc5TVMiLCJtYWMiOiJhYWFmNTk0ZjY0YWZlY2ZlYzQ2ZjY1ZTcwOTcxMjE1MDdkMGZmZmQ2MDZiYjM2MzQ5MjNiYzNmZWRmOWI5ZjY1IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjUrVlZIODdOUDdnYmhFN0p2QlRYU1E9PSIsInZhbHVlIjoiSE03TTV6bGpUYzJwaEJBOWxlM1F0cGxjT0RoOXV6bGhwWUhyaVM2RlBOWGRyY1pGeHpDc2FzZlA3RVRNNFRVSG9qTFJ6ZEQ4YnFXbHVoRXJjU2FqcmtQLzZZMFkvbEwwZjIzZlhTdEVQbFVDUHN6dDFydEJKYVdCWlZlaU8zN2siLCJtYWMiOiIzM2Q5MGIwYTBjNWUxNTY5MGIxZGJiMjRlMTg1Y2QxNjgxNjJhMThhYzM4ODBlMDM0OGYxZDRhZjJiZDhlOTg4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Inl4S3IraDlwSzkxTEFPK3FMR2FlRmc9PSIsInZhbHVlIjoiNDVrTzNHbzVHMGZVemt4Q1VJMHlmekF6cjM5YS9WL3lLSnpHdnRwa2xTS1g1dWY2UnVEc3lZWklxZ0tkcm1xM0hMdXVMaE9jdXdpbzdXbGYzY1JKVG42Z3VDeFhuSVhVYkZnUVNUTHQzUEdKQVZwMno1d1dWSlhJc3VaYzNjZjAiLCJtYWMiOiIyNmE1NzBiYTk2ODg5MmYwMDc5NDYxNjZiMmVlNGQyNjFhNmUxY2NkZjMzOWUxN2M1ZDEwMWEyNDQ4ZGQwMjA0IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-14 22:38:19', '2023-05-14 22:38:19'),
(11, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjduQ1NXckZxc2c1Y0dPbXlWR0RzZUE9PSIsInZhbHVlIjoiTno2RnZWTmFOTEFxaUt6Sm9yZndacUlOQ2grTUI4L3RQcWh5bWJJaGhQQVh5Mis0T0Z4NjUyL0pQOUJuV2k2bGF1VEMzendpWFppSXlMcVpnUlVaOU8wWmpONGNCdUhtdGZNNE01dEtrcVdNRE8vVmpGc1JaRmJNcEJUQUJNc3kiLCJtYWMiOiI2NWVmOGFiMmJhMzA5ZTk4NDVhZjM1ODBiYTQ1M2MyN2UwZmYyMzczYjU2NDY0MzU1NzA2Y2I4NzMzYmY2YjBiIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkZTdU9HY3hhRnViUUR2aXd0aXRFL1E9PSIsInZhbHVlIjoiTWliSTJaMXJzbFYvVHZocEc0V3U1QS9uWDJtelY3dGJzODJZWFBzT1c4OXYvSXUybEJSK1RSMjlJWkFaeTlvTDRMWWd6RXpmSlU0OG8rR3lVaFF0RWRwMUZBVHBFTFJPelNMb3plUzhmZmp5cGpBWFc0ZlZMVDJHNGJKWDRHVHUiLCJtYWMiOiJmOTZmYzc1NzlmMTk0MDQxYzg1ZTA0OTljNzI2MmJmYjI1Mzk3YTg2ZGVlZGY2NGYxYmI4NTg2YzRmN2MxY2FjIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjBzMWEzRENFVXhWZ1JKcytFbHhuSXc9PSIsInZhbHVlIjoiTzdmQWtYa2ExUzcyY3FlN0lOcWVkNFlNQ3ZPdUd0Mjg4MmpjbytNZ3VmakRlVmQrRVIxQUlVMWJFMWlvcDR3aGtXNURUN2FhLyt6aCtYaFFwS1l3cUNHSDk3dXRjb1A4UGxFdHJyaFNjN09yVWpOL3V5emYxbWg5dm92K3FST00iLCJtYWMiOiI3Y2IzZDhmY2NlZmU1NDlkZTliYTczMzlmNjA4ODBjYjdjMzVhMmQ1YTNkNmIzM2QwMmM1NTI0YWQwNzA1YzVjIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-15 11:05:24', '2023-05-15 11:05:24'),
(12, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImNWTTY0S1hsWDEwRGo3a05EUE9CU3c9PSIsInZhbHVlIjoiU3R2VkhiTHc3ZFU2UHBHdjhVb211azRxTWkyV0hSS0ZpN0JzNWFjSzgyNFRFbEs3Z3UzU3c1V2dlZyttcVErZXNYVnIrTmdCU1I3QmNoSThWQWkxMS9EUUsvbFBMQTF6U0pYWVhYajRtSjdFaVBuR2hwQnlLb1Zzd2k4SzByS3YiLCJtYWMiOiJlNzI5ZjVlZDRlODVlY2NiMmY1NGU5MmJhODMzNjAyYzQyMDAzNDQ5M2E4NzhmYjNkY2Q3MjYwZTRlMDVkZGVmIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkZtV20zM0ZoNVV1K3psVlJUVktkS1E9PSIsInZhbHVlIjoiODNaWC9DUDljTU9FS2Fkai9GYzY0cVk0a1QvbHlTRzFwM2twVDhWYWtucitUcEJDRmVPN2UrdU9pODJRcTBqNkpkTXh0UkNHL2dCQUkvV2R6N2E5ZjRMd1BjVzBnWlRKQlFtTG9WVnJnRmJxazBsVy9adnMyakpvUDBBL2RhUVIiLCJtYWMiOiI4MDliYmE1MGJkOWFhY2RiNGExMDI1MDhjMmM2YjEzOWU5Mjc3YWNlMTZiY2MzMGI4MTUyZjE1M2ZmMTlmNDA5IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-15 23:22:14', '2023-05-15 23:22:14'),
(13, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImRab0VoUkVodkhGaGhjcXg3ZVJ6TFE9PSIsInZhbHVlIjoiNkZxeWlSVlZFQjdocXpZeG5iVjdrek9mRHBPQngvVnFZbUFqT2FPZWhnUnZtYysxRDRLdm1zUFAxbitkRkJvVGMyVjg2MGtWd0FGdHp1RE1XMitvR1AyWm9FbHJ3SktTeTBwR3d3UUdBMHV5YjFVS2ZET1EwT2dmVlZZRXlMSW4iLCJtYWMiOiJkZmIyYTdmNDNhYTc3YTcwZjMzMDM2ZmZjZjc4YjdiMjYxYjZlNDVlYjgyNjA0ZTg2M2Q4MmJmZjFmOGUxNDczIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlFMb1J5UFJ1SWMwdDk1aGtCdFkwQWc9PSIsInZhbHVlIjoiYjRKWE5uMmJOVHNoRkxPYlRMSE1CWGJ5S09DTkErVnorL0czZDAzb3hoN3JLaXp5cCtvWjFPbFJCNmduSlF4UXdndnprSkJkdzFvS1FLU2JKRHJxVGVTZVlNY2hydjlKUHFNN0ZtclNkdUFRUTNEbDN6T25HUDJvYXlKUXhsWXgiLCJtYWMiOiI0ZTk5OWM5ZWRjOTk2NzhlZDI5NzNiOWQwM2Q5MjZlZWUxNTU4ZDliZmYwZTYxZjU0MDFhNTU3YmNlZjcyNTk3IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-16 08:43:10', '2023-05-16 08:43:10'),
(14, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlNudlJUN3oydDN5OWhtOGE2cE1tRFE9PSIsInZhbHVlIjoiRWJxdElyQ2lPRzNBallXOEtsZG5EaGY0czhBMDQxUkRMVDdWdS9BZytORUpBejRJN3dKME0xdVdzbWNPU1cvWjBTam1YdGRISlVMRy9CM0NTQjM1UmJ5KzlaWXhHQktwdEV4Y3NhbzZHRndPTlh5Yy9uUGVaM0R5ZGxKdHpzUUkiLCJtYWMiOiI1ZGY3NzJjZDE4MmYzZDUyMmU5MThkZmIzMzk5Nzg5MzNhNTU1ODEwMWExNjcxOTNkZjUyMTM4NGRiNTdmYjY2IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6ImJ0WmZGK3dhQTdKUzFyWUlhMVY5alE9PSIsInZhbHVlIjoiUVd6WCttVTg4ekN3UnYvaTNaQzI3QWZraFVBVDNaeVhtNTJvY2J6U0dGTXRCMFppdEIvclRudkhnNUhTWTI1NHBJa0dhTjBSQ2pPRU4xSDNCYS8zNUZxejRVcHpVaWI0NzdqeXgrS2MvYklNODludlgwRHVheS8reUU5aUJMRzEiLCJtYWMiOiI2YmJiZGFiZTM4Mzk2MDI0N2JkNTA5ZWU4ZTU1Y2E3N2FlNzVlYTRjNzUxZGRiN2RmNTdiNjdjOTdjYzVjYzRmIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjVxYTRDVjdMYTl2Y0g3WWw2SDNuWnc9PSIsInZhbHVlIjoiU2JXTnV4c2o5M2ZVT00ySXAxOU5QRWJlWi9RdnF5cEU3YVcrUTk0a0VhT2Z1U01JNjBTZXB2c3VVM29rMkNIcDlmTTdjUHBnKzhkNzA3VnFINlo4cmZrdWNJK2xMeDVxZzVxemZKSkFjbW5keG84SkF1eHU3UTJKRmhDZG1JMW4iLCJtYWMiOiIzMWVmMjQ0MWRjYzJjMDBmOWJkZWU3NjIzYzI4YjYxMTM0MDJmZTZlNTA0N2I3NjU2NDRmMDU3MWU1Y2ZlNGJlIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-16 08:53:07', '2023-05-16 08:53:07'),
(15, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImN2QUV5ZGJiU3J1N0h5V1RXSSszQUE9PSIsInZhbHVlIjoiV1N1dXdqa2Q2a3Z0MFBzL0R1TmVld3puNHRJcW9SM2lXZW5TSHdVbVJzcUlQdWZWdlJDMm9yT3dEVnVPdVFOdWRzTDRVMEVWN0tmaHNGeTRPZVpDOHh0QVJuMmlZd1AwcklESjY2elZPSVp3MG1iY2RWL2pNbkVwMm83c0g1M2kiLCJtYWMiOiI2OWE3ODhkOWJjYzE5YTcyNjMzYzQyZDljYzZlZjM2ZGNiNjhmMDJiMTNlZDhkYTM0YzdiNWZjMmQwMjk4OWFlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkpBODJVRW5ZTlU3a1RrbVB4bjYzRFE9PSIsInZhbHVlIjoiWFI2c1Z1ejJOSUhSZHRMeE9HN1BEbm5hc0RaTmNzTCtqeHQyVFZuai8xS1RTZkhSR29MeTR2UUVKb1YxdWQwakRsS3dJYWhzMmV5d1BrRWNZYk02Mkd5cTBJb014SnRvZm5NT0RFb2pLVjNuVXprcnpPUHB2bWJ3cGw2YXJDYjAiLCJtYWMiOiJiZjk1NDgxNGU5MDA3YzU1MWM4ZDA2NWEzYmZkNWNhNTQ4NWE5YTEwOTVmODlhNzBiYTUwZDU5MTFlYTg1ZGM1IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-16 11:10:36', '2023-05-16 11:10:36'),
(16, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlFiVjZ2WHNMOFgvNlhPWkluNnYwWHc9PSIsInZhbHVlIjoiWlhScTlNMGZBZXU1Y2ovOVFOQjlqRDhoZWlnZG16aTBYN1pVMlpzSjgycjUwblV1Ym5iZGcwczJHZG02STVQaWluZy9nbUl4dTByTjlLTzV1clRUVVNWQ1Y1cGh5REd0bGNSOTZ6ZGJadFg5dUVkUko2bnEyclBYZU5LOVh0dmYiLCJtYWMiOiIxZTVhZWExMzIwOGM3ZTcxYzI3YWFjNTY1MjQxODQxYjZjMmYxMTE4MzgyMDJhNjg2ZjI0YTA5ZTI2OTA1Y2NjIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6ImdKcEI5ZSt0YUp5TGxzSHk1WVBtTmc9PSIsInZhbHVlIjoiVGNrU3BPWEloZ05MckNkVlZnRnJjNTNmSTRySDl2ZEFPTTI4Zk5YZGxFRmlzNHZnQ25Wd2N5Q1BKNlFrUEhSTkt3WkcyTFBrRHJCN3lVK2UvZ3kySnMvYStVdnc2a2t0S2daNUllMHlNWS9pNzdaSGZneVBSZHZ2NFpzUHpNR3ciLCJtYWMiOiIyMDU3MjEyNmZiMDk3YzA5MWIzYTk2MTU4YmUyYjRkNDAxNjFhOGQxZDAyYmQwN2UwM2Q2OGZhOTNiNGEzMTkyIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 00:08:01', '2023-05-18 00:08:01'),
(17, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 01:19:57', '2023-05-18 01:19:57'),
(18, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 01:20:00', '2023-05-18 01:20:00'),
(19, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ikt0RXpWOWpCODVJK2llSVpURjF4Q3c9PSIsInZhbHVlIjoia0Q5bkxSQ041TytuSXB6cW1YSEpNSVhFSG5LdGMvVUVDcnRpbi9QMTVJMlRPZVpFT0FValJZZFVDT1RQSWliWExvZjhYditOTGxMYU9EaU1IL1FnUmpzUnk1dk44cExTVUd3ZXJuM1NNdDJ1ZVVscE5lLy9iQW95UlB3N1JkN2oiLCJtYWMiOiI1Y2I2ZDY3ZDJjZjA4YTc0Y2M5MGJjY2UyY2U5Mjk2N2Y5NmExMDA2NTA1NWQzZTZhMzk5NDZkNjgwZGQyZTQxIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjFCZzgydjh1TzhGb09taVhpR1lFRGc9PSIsInZhbHVlIjoiUTVJMWdYVmVqTW9lS29Sd0d3MVdvcTIrL2hZTVFPL2NyaWh4U2JreGVUV0NzZ05LdHlkWVJ6V29HRDYyRC93QndsSlhjdmY3Zk9wTUx4S3JmUGJSYlpNckJlZXc4RXhVdW1lV1gvRWtYSkowRzRXbEsyTXVkczdFdERZWlE2M1QiLCJtYWMiOiJkZDQ3YTUwYTQyZGE4OGJiNTFmODMzMWY5NDdkMmM5MWMwNTkyYmY0ODU1MGRlY2MxYzVkMTZlYjAwNGFiNTE2IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 10:20:28', '2023-05-18 10:20:28'),
(20, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImFLTUxvY0dEbTZkU0hNVFBDT2h5ZlE9PSIsInZhbHVlIjoiRVFDU2pCNlNKU1B6bEZTNGhIZHhmTDBLeVQvZytVeHp4SzhEM2NsL3F6T3JzUjZvNEhVbExkMzV5SHBhOUJpdytmZzJZK3NVVzVRODloWElzUU1CZlk4NFlVODBYU1hKUTMrSDlVZkNEdUpTNExCMFE1SXh4WThMMXJuSGFUbzAiLCJtYWMiOiIxYmU1OGM3NzVmZjM3MjI0ZDNjNTg1YWVkOTQ1YzFiNDE1MWRjN2IxZGJkOWI5ZmQ0Yzk5ZTFiYzIzZTQ4OTlkIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6ImU1SUIrcDFodUpHeWxFV2ZUWGIrQVE9PSIsInZhbHVlIjoiL3FZL2hJNytjWXBTRjRmdUhZTk81MHl4OHd6N3BEK1NobFJSVGZjNzBkTCtCRnMxblpRS3hoNHdLT2R4cnQyeElISXRjUXh3TlBJNHI5T29kaXplOTQ5SThPbEFoOVd3VThIWUhxQW51NzVKN3R3OWdlZ0pXMTl2ZkZCa0lUV0siLCJtYWMiOiJmMzE0MDA0ZjExZTA5ZjI1OTM1Mjg0ODQyY2ZlODUzZWEwNmU5ZDcxNzdhMWEzMWNiOGRmNjUzOWIxZDhlMjdhIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InpSTGZyUVNhc21vOGs0YlZHRTVkNVE9PSIsInZhbHVlIjoicGZBdkZ5czZqa3htY0JGWUFiUGdCLy8rcElaRFFURlhjTnlCY2RoVUV4Z1VSRzhZSVgyVTRGYzNOM0k3ZWUvWXAwN29Fbm5DU25BSG1iL0d1Q3RqU2hSaklqUkxrTHFtNktIbEU3NDkxZ1VXS1pydE9WN0RBdXZyS1ZDbXlnekciLCJtYWMiOiI0NmFkYmFhMjk1MmE3ZDMzZmI4NDMzN2UzZDljYjQ5Yjk5YWUzZTAzZjMwMWE5NmM5OWIxNDI3N2E3YmQxZmZjIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 10:37:37', '2023-05-18 10:37:37'),
(21, 'GET', '[]', 'http://webzfactorynew/easy2it2', 'http://webzfactorynew/business/edit/4', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/4\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkhZdUMxV2dBMFByTDEvYTRXV1ppTVE9PSIsInZhbHVlIjoiV0JNeHRxZ1BKazVrd1dybmpTQWxVdGdGZWVDckFNczhwYUxwdXUyS0dqalI5aG5YdzB3eGVxcURNVVVINDRlUjdqQ2M4UnlMc0JsbXpxSUphOUkzVTZ1MjBMeFY1VmNMM1QyK081SGZhc0EzalBGRzhMT3Y1Vkk3cHlUNVVBRWgiLCJtYWMiOiI0MDFhOTE5MTVhNDdkNTVkNDY2OGNiMjZhNGEzYWI4OTAzMmYwZmJkNDBjYWIyNDM4OWExOTgzMTkzODNiNTY1IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjhoL3RLS3RLTE5LV3REMEZWelNRM2c9PSIsInZhbHVlIjoic0NrS3JoUEE1LzlENTlWOHB6b3dRbSs3MFRZYWFNUjFQaE1hUkpmakp6dzZWcjlWU05OZGdkcDNweHFNRzZrWmE5MW1tZC9nTmtqM2ZPUG9NQ0M1aDNlNDdFMnZVM3duS3ZEeU1MNVF5b2tsZFNwS0toQWN5bUIzNmdVTnFCYSsiLCJtYWMiOiI1YjMzMGUxYWEyMGFjN2Y3ZDc2Mjk2ZWU0ZGYxZjUyYjJiOGI5YzQyNzBiZjJhZTEzMTQ0NDdhZGU0ZDkwYjhmIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImhVZzBVaEFUV0VjZTZ3YkpqUFIvbWc9PSIsInZhbHVlIjoiQnBDbGMzeTFoeU8rY0U4SnBxSlNBbEI3T3YwNGNLNGlSMndvSC9TSE5abEtaUFp6NmdMY0N3M3BKZHhJZWx2SmdtWmVmUE5OcFZmcFl6TllWWkw0b0V2T09pRVdYcUpmdU1uQlEyRjYzemFIUmh1OE02M1ppNzlBak5zMkozYVAiLCJtYWMiOiJlODdiNTdmZGZiNmFlZmZlNWYzOWQxZGU5YTkyMzE3YjZkMjEwNDFmMTlmZTM2ZDNkOWM0NzU0NzAxZWMyMDQzIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 13:07:43', '2023-05-18 13:07:43'),
(22, 'GET', '[]', 'http://webzfactorynew/code-wizard', 'http://webzfactorynew/business/edit/3', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/3\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im1ZVU00U1dVZzRJalhRWjBlSDFwT3c9PSIsInZhbHVlIjoiVzdEQnA4WndrMlVVOUV2Rmd2Y1l6TkY4TmlXUTZDbVJlYnJJWW55QklCOFRmRVMyQzlwbEZRUUpxbDFESHNwZFhZYjlOK1NlSVlEUG5mUjRpbm41S1BTSkg3cXlGVDZEYXNlc2xwUmtrejd1UXZQYWpuRWs0RGJjNGticTc5N2YiLCJtYWMiOiI0OWFkN2NmZDUyODFiNTQ4NWI2Y2JhN2JlN2Q1YWNiM2MxY2UyOWE0MzMzNjU5ODQ4MjM5MDA0M2Q0NjY4MjBiIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjBVeG5reG9sc2VnTEFlaEtQbGRuREE9PSIsInZhbHVlIjoieFNLeTdrQkJtMStSemhSY2pCV0RpYVVqbEVUVEk1cmNZekVsUjh1ODB2eFVqbDArUUNnakRVTEdYOS9TOVVJdHBDc3MrZnM1L3AxV3NNQ2F6ZG1LUHdiWnE5QmNIZzJWWWVtaFhCbFhZYlQ5YVJUUFRRUlMvWjI0TkFZcmNQa1ciLCJtYWMiOiJhZTNmNjBmOWY3OTk5MGMyZWIwMWEyZGE4OWI0ZmFmNTgwODk3ZTM5OTBmYjI2ZmY5NTRiMDI1ZjcyMDU0MGE3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJON3M2ZWxPeHdWZkhxWTBkOHhzeGc9PSIsInZhbHVlIjoidktJL3NpcDVRYTNrdUh5YnZKaW9qeUgySlFWcTJjaFNDa1pQelI4dlAxR3JNOGc5Q05vTUJPNFVENUdlU3JYa2dSL2xGWDFaTU0zalBSV0N2T0cwNzhGNEpJdXR1TzNLSXArM1B1T1drV3JtL2JRWnJOaXU1Y3h4WUhjdUlDcHUiLCJtYWMiOiIwMWQ5MWExNGE1Y2IxZmI0NjYzM2U3YmYzMWE5NjFiOTViOTdmOWQ4ZTc1YzE0ZGMzMDYxZDI4ODE1NjkyZDk3IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 13:11:22', '2023-05-18 13:11:22'),
(23, 'GET', '[]', 'http://webzfactorynew/code-wizard', 'http://webzfactorynew/business/edit/3', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/3\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlJEL2pLWWlDWVZwa21JNHZvL01pWnc9PSIsInZhbHVlIjoieThiN2ttWkQ3TlhweDRoV2xOYUlCUytDclJXejV1QkU5QUgvd2dFV2VpTEt3cDJsTkZiVmRuNjhKeFVqcGh5MXlVNHJKWk5KTENSd2ZzYWpuQWRnZjFPWExwMVhUcW1BUHRLbmpqTFliZ2ZoL2taMlliZXlNbElnTE9oQVZqYlUiLCJtYWMiOiI2MzA1MmRkY2E0MTEyNDI2Yzc1NjA5MGUxNjFlMTA0YjBjOGJhYTRiODI1NmE5ZThiM2FmMmFkZTRjM2IzOWYzIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6InR1eGo2Y0tmZDNRQ3dMaDBHVWQ2UkE9PSIsInZhbHVlIjoiWTE4cUljS2pCUDdrbjRCSXl3UWE3Zm4zVnFaVHF5VWluc2gxS3lIeUlCZDJrcnB4aGlFaUpBaHlNT0kzOE1FMG43SnZQOWZTMXI5OHRGNWo2dDU1QjNNelpZSG5JWGhoQkxmMVVaSHdSamVWMDhBajZzbnVRUDBBeWxNdFRjZkwiLCJtYWMiOiI0YTkyNjEwZDNkOTI4YzQ0MDc1ODEzMWY0M2Q5ZDU4Mjc2Yzc1OWE1Zjg4MmIzYjE0MjlmYjQyNWI0Yjc0NDRmIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Im9WTTUrYU5OT1orRGlxVEZyaEd6UFE9PSIsInZhbHVlIjoiR09qWGsvRjFlWGo3UDZWVXIrQUZKMzloRW5IUDJ5SXRJbG5sd1cvOW8xT3l3b3RPUzgwL0E4VndMY0Z5NEdCSWx6bVk5UVRWc1lOK1oyVVNWS2lNOTlkaVRpcDkvbWZqeERoR0FyWUs1RGV2RElUU25YMkU4RHB2R2JwSFhWbXYiLCJtYWMiOiJiNzc4MTc5Zjg2N2MxYjE2NjE3MjdlYzg3YzI4MDE5ZTczMTNhYjIxN2YxM2FhNTJmNGU3Nzc3MTM2YTc4NzEwIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-18 13:13:41', '2023-05-18 13:13:41'),
(24, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjZKeHNsdWFJSHNhNkNCUG9Lc2plc0E9PSIsInZhbHVlIjoieE95dDlqVVVPTG1UMmU3NXF5SEtBYmp5dmtUUXJrOUhMVnd1ZC8xcTBzdlRpcm5yOTh5NXdEdDNobFczN2lGUTNNL0VURWU1TmVYcnhta3NYQklnbkR0NGFrenlGelVRYnhvUFprQjFvdGdub2grQnoreFpHNUJRVmE2aXRVODciLCJtYWMiOiIyOTI0ZDE2NTk3YzE3MmE4NWVhMWRmYjgxZmIwOGMxZDVkMDEyMjJiOGVjZmQzODhhYTRjNWZlZTdhNzg1MWYxIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjlkT3dnR2NEWWE4U2M3RG5WRWM0L3c9PSIsInZhbHVlIjoicmlFMmhmNTRSNlpaSUNqck8wYyt3bGxoSzRwNFFHMkMrc1R3N0ROaDJBa2taWGxEYnpBNHBJdjZLNnpLczVzcW8vUk9Cc2Nqd0xHR0liUHU0bkFpOHFVd25mRTllUHFEUm5RYkhwazZDNGdpUTY2TmcvK01MUUlWUFA0ekdBcC8iLCJtYWMiOiI2NjFmOWM2OTUyMDA3NjBhZDdhODU5ZjNmYWIzZjgzZWUwMzM0M2FkZjJjMGI2ZWQ5NzllODIwYWNmYzNlNjIwIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IjJPenlSZXhocWhhSWxmRGgyck5aNWc9PSIsInZhbHVlIjoicmZ5QUlPRDEyaStoNU5SNjJXS3BDb2wwM3ZtdjVucWIwMSthMC8rTlBaQkZjZHYwWExGTGgwRnVGZ2ptNTIyRzJVYkh6bzVOLzI1UHdqQXIvRFZjZG0wMHpPcEhJbng0ZG0wcEFyUHQyN0gwSkZrKzhQU2xqOEx2UHVYUEYvM1AiLCJtYWMiOiIxMTY0NDYwZmExM2U4NGNkOWFkOGIzOTk1MGNkNWVkNWI5Y2M2ZWU5NDFhZTBjZDJiZjhiY2NiNWM1YjQ4ZjMzIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-19 00:24:33', '2023-05-19 00:24:33'),
(25, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlAzS2VFczhYS20yb1RhVC9wY3BXSHc9PSIsInZhbHVlIjoiL3FvMk4vRU1zM3JxL3gzS3YvTkhoSHFYN0ZSZU9pMnk4Q2lDYUFrS0c5OHZsTlcvTVhSY2tJcWNMdUpsUndMWXpLME5vUXoxYW10MnJBNS8wbHJ2b09lUG5WRmJUOEtpeXJ2dGNYcEFCMkFwbWtuc21DbExZNGQrNitLMFV4MlIiLCJtYWMiOiI2OWIzZDM2YjYyMmMxOGFhZGQ3MGVlYWI3YmVlZWZhNzEyZTgwNWIzZDE2YTcxODUwYzMxMmY3ZGI0MzdhZTIyIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlMwZkwyVlViTk1NQ3pBMVl2V3NrQ2c9PSIsInZhbHVlIjoiTUlhUFVnNlQrc1NsdTNVNm02eU83eFYyVnRTb1FZcC9paFNtbnFHaU9iUnBGalV5SFhueWF5YnlsaEtLdFZzSTFBOXREaTVnWmVMa1h6c0k4S3V4dEdXZ1A4bTJ1VU5kOURtODFSaEZYaVBCMXFVNDFDYXZXNE5xWjBVSWdCVSsiLCJtYWMiOiI5MjU0MDQwNjdlMzIzY2UyMGNmZmZhZDJlNjc5NTIwODYwNDY5MGNhMWU1ZGNkMmMyYmU1NjBjN2VmYjM1Y2MzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InVuaVFnSUhmV2NnZFRwYllPYnhxV1E9PSIsInZhbHVlIjoiaHFqMHE3aW0wTW5BWjVHNzd3c1VhVURBL2U2NjRxb1lRNTdldW1kWkVOWEl1dWRCUytYdTFCZzg1c0xRb0d2ZXdNOXA4aEVLMUxZeDlqaUVETzV6UGpBcDJqSTltUFpLZFJEamhoeGlZMUJvZUlVa3VubnFReE1tUklGSlZpNkIiLCJtYWMiOiI1OTQ1MGVmMWI5ZTM5MzE1ZmE2OGYxOTg5NGFlNmU0ZDFiZDE4MmJkNWI5YjEwZjkxZjZmNTMwNDFiNmZiMjM2IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-19 01:12:15', '2023-05-19 01:12:15'),
(26, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InRJMS9vY3EyRmRyRTVRQW56aTk0NVE9PSIsInZhbHVlIjoiT3RWcGcwdHFSeGplOGlTZWVKRkI5MVZMUEppZmU5dEY4bzM2Rkh1WjNnRGtuamR4TE1SK0svVHpLTGJqdlZ6RE1CS0dtR3o2MkhwTWtEKzI4Vkpja3h2N01wTzhGTTZpMG9yRVExOXNzcHlzYjB0N0d5RlBHbVVsY2Iva25ETFkiLCJtYWMiOiI0M2MyMjY3OGFhOWFhMDNlOGZjODBiNTU0Yjg2YWM2Y2ZhMzYxOGM3YWUwMDliNTA1MzExNTAyNTFhZmVkMmQ1IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlZGdHh2VVNWdjlwclg3bTRneWZHbGc9PSIsInZhbHVlIjoiRFhuN1lGSklwRFFNeGM4OTA5dFNNT2NHenhhNGhhcUV6NkpueUkxOGlhN211UnRaQkFSeVorSHFZN29IQ24vZWt4a01qQjIrcVlNcW9lUHQ3MHdxU3RmZk5wMzRkdUlhS1JrVS9nSzduRmFubzUvZFBTbGlQMkZONDdrSXhJVTgiLCJtYWMiOiI1NjE0MDBlZGFjZDU5ODcyOTJiNmJkOWE3Njg4OWQwMDY0NTg1OTEyNDAwM2IzN2Q2YjRjODM3ZjJkZjg4NzUzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlEvWDFvQjZZMEp6Ym1ndlNFQ1U4V2c9PSIsInZhbHVlIjoiSWxrVlcvUExzNTRJa1BIQXhZZ0FTTUZIcndIY05vZm5VS3JKWlpUYlMzaFBUeGxnUGRyemdSMlQ2SEtnb0dVS1RSeUp0aWRBbWRFUzNIbEdvK0NRQnJKQUZhRlhUakE5Qk44bGRGOWNXZTU3WlZOQkFqb1p5MldwQWZ2SlYxMGYiLCJtYWMiOiIzNDM3NzhlZmIxN2I5MWIzMjQwYmQ5NmM1YWE3YWVjNmY3OGQwNmEzZThkOGU0OGMxMzIzMThjN2EzM2YyZjE3IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-19 01:20:05', '2023-05-19 01:20:05'),
(27, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlFDd0VTRnZVMVBuK0ZmT2tuY1ZpdVE9PSIsInZhbHVlIjoiNGovaXhVYWo2a011ekJLQkpTS1hhZE95eW51YklLZkpPNzhidVJKOVdiZVk4VytTTWwrSzZkdkdtWVkrZnA4dGx6NGVhZXdjaCtzZ3JjM2NIZWxCeTFpcTNvK3UrWkFBVmN1ZHJCYkNhTGIxVlgvWDFVUWNNSU1UTGt3bURDbloiLCJtYWMiOiJjZTBlZjg3NmRmZDQ3OGNkZjkyNWNlNTcxYTgxZGZjYWRkNGYzYzdiZWRiZmIyNDI1N2NmZDUyM2ZmNDcxMmEyIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Ik84V29iV3ZwZTFWV05hZVRkcDlFNEE9PSIsInZhbHVlIjoiZlc0MU9Xb0phc3E3TlRIOHhXNnVtS1k3aG1WTTFYYjdwQlhHaUtvdWhla2ZSN1ZrV1hza2VsZjdZQzVqNC9BcEJhRTZHSXgzY3ZPazViK2JYTlBiS1FTV0FFaXduRWFaek9qemYrbmsrMzQxU1RCL1Z5WDVCSVRHZC8yMHdvTjEiLCJtYWMiOiJmNzM1ODdlODNhMDliMzE1NWYwMDdiZmJkMDVkODg2OGU4ZmM2OGEwYzA3NWY3ZjMwN2Q1NjdiYjNjMDZkNzRhIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkZKTUtzbE1iUytXcTkveHpzd2lmZ2c9PSIsInZhbHVlIjoibXIvSzFFQ3lKQmdtcSswLzVOY2cvN3hHNzI0dzZtU3VMTlF4eHBSVXB2cy81bTMvV2V1cHdBRGU5ZStXMUdkUEVwb0RhRjFjZ2JDbEJDRWdMeHgvSkRxWU8wVU94Z01lblozdzBpMGJiZHlsZW5GQnhKY0daalpMb1YxRFZ2dG8iLCJtYWMiOiIxY2QxMTk3MjgwMDk0MjJlMDFlN2Y2ZTUyMDYwZTFkMGFjZGI5ZTkxNjRkYjYwY2U2OWU5ZTZkMzljYmFhNGJmIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 00:13:21', '2023-05-20 00:13:21'),
(28, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjV3VUZKZThSUDFhdElSTGs3OXEwTGc9PSIsInZhbHVlIjoiWERyek5oOGVQZ1FQMDV1bjlpdGpuQ2ZMRWJXTjlSYW1FRzhMdWdISWsreGNIVG5nVHhpUTlYRzRDMmdwWWkwTFlPbE9lZVNFaS9EUEoxbmVwVTJCTm5oMkd6ckQ1ZURnWmN5QkU3SGg5ZHpRR0c0RDdHNnMrR2NBTG5FWmgxVlMiLCJtYWMiOiI1YWI2MjljYTc1ZmU4NGQyMjhlYmY5YjcwY2JmOGNiMmE3NzBlNzFjN2E0ZDY5MmIzMTY2ZGY5ODNlYWEzZDZlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlJsSmRhSkh0RFBtTHgvRkdlNStGbGc9PSIsInZhbHVlIjoibEkvODR2S2FoY09kRmpZcVFNYXJMNDhNWXludVJjZ2pRUkpEN2ora1V4SnBMSGwrRkVzd2p2OG56eDZ0ZXdzMVRBemlRQnl3N2xSa1h5YUFJYVZiMlNDbVJLMkRERnFyRFA1cTRhS0g1VitLakJ0aWw4bUxneE9KTUs3emRtSlgiLCJtYWMiOiJiMGNkMDFjNjE4NjQ0MTQyNzU0OWVlNTk2ZDkxNzYxYjY3NDRhZWEzNDZkOGVkOTEyYTcyMTVkNjJkNzk2NGQ3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImlnTFg3endRYTg2U0xuMDB3RWFRY0E9PSIsInZhbHVlIjoiSWkxRnlBUFFTNGNWMEd1N0tiM3R2ZzZxeUtlVy9WRkdTcXVIMHFzd2h0eEhJYXpnMk5TOVdFTmYvL3FRQWxQYjVRcnpTMlVvNHRSSlFQTUJMKzM0bDJ5TWhoZXZRQjB0ajZyZ2c2MWpFSE1PV0xRd0pyaDg3Sk4yVHdockRXREUiLCJtYWMiOiI2MDgwMzdmMDE3ODNiNjk3MTEyMDVkYzdiZTRlZWNhNDkzYjhjNTBhMmQ4ZDdiZWE0ZDZiYzc5MTI4M2MxZTlmIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 00:14:55', '2023-05-20 00:14:55'),
(29, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkpDaG05Q1dFRFZ0TVNqbXdEUis3RlE9PSIsInZhbHVlIjoiZnY1YXJLUWQxaWZsMG1vdFpOeEpVcVh2VUN4TUxtV3VBeHByYXN2aW0yQXFvc1RoY3E2VHZ0N1FWcXduVVczdldSaUxaczJORk1VNmp1TkhCbk11eVNNeGd0UnBOY0VYV1lGTjBqTEVaUm0zOS9QbTgvSnFZSkdzNERid1JqbHQiLCJtYWMiOiIyZGIzM2QzNmUxMGM0M2ViZGUxYzY3ZGQ2MmY4N2FlMWJjYjU1NTJjNGJmZGU4OWMwZjc0MTI2ODk4NGMyNzc3IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IldiWFJPUkJ0aTlNeVg1Nm5IeFpLM3c9PSIsInZhbHVlIjoiVzgrcDlTdW1sMTFNVlpWakk3MHhlckpmYnRlZjVUMUw4T0RlUXI5VkpUOGMvaEVoK3JTeHFQQlBtbG91Smovby9tWDFLRmJIZ29Gc2d6M3FLa1F3K2hIallRT1RuSGpneHF0NmJaSmpCcEN5QkFmaVJwZEJFbHNscFZPeFd3V20iLCJtYWMiOiI2YmNiYzJhOTk5MWFlNjkwNTZmNzZjMzI4NWRlYzhjZGVmOGM2NDExZDlkYWQ5ZDI4ZTJjOTU4NWUwYTk5MTc3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InBqYmdiSndDQ3Y3cm5PRERHU2tBQWc9PSIsInZhbHVlIjoieDVJL2RvZ09mbVh5eVVQTnhsa01lNGFlT01ZdnZIbng1d21lQW8yTG5peVBjY2pNMVQyY2JSN3NONUI1aEVWcjFyY0k4OUNxNXJMNHV2aUpVK3lWdGduRWVDY0RnVFZJS0FBRGVaS0hBb3NJQXlVZ01BdXVsbTI2ZFBZaExiNG8iLCJtYWMiOiI1NmY1YTExZDEyYTZiYTg3ODVmODA4ZjRhZWIyNGIzZTIxOGVkNmQ5MmQyZjI5YzA5YTk4YjQ0NWJkZmYxOWJjIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 01:29:38', '2023-05-20 01:29:38'),
(30, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlltTU5IVzVucTZHaVNKcVRrTGFVQnc9PSIsInZhbHVlIjoiYTV4WllmQWNmb3IvZjR5c09rbzMvcUlXbkR2T202SWVkQ0xKcEU2NGRkdXhPbm80bW05eTFpUzh0OGJEdlkzZEYxS0hxTDArMnZvRkY1WDVuM2dCeHVMWUxYcnk3Y0l6VUc1TEdwYU9TQzNEbzVNeEJXWWNqZ2xySTIyR2dpcjAiLCJtYWMiOiIwMjhjOTU5YjgyNjA4MGRiODAyMTM4YTdkNDNkOWU2MjJlMjYwNDI4MGIzNWE3MWY2OTAxYzBkMTQ1NWI2ZGE4IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6InZRZmlseWhBVjFkcWFyRTg1SGxqL3c9PSIsInZhbHVlIjoibGdCdUlidGpYaVpVSUdkN2NJb2p1U1Jsb1FrN25WYXBrdU4yV0hPOUF0YmFyN0kzeWhFK0lHN2lIS0ZLNm9BRUlvb2g5L29TNDEzR3NCaEJGd2c1U2hMZXZtVktDT0l5Qmt6aGZKSTlRblJBNmVZNmFBc3owWGh4MXVkb1RuN2siLCJtYWMiOiJjMGZiYzhlMzRlYzk5YTk4MmU2NWI5ZDhmN2QwNGMxYWM1OTYwMWUwYmFkY2MyMjFhOGU4ZTBiM2ZmYzZmMjFmIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IldXVzhTWEJDaXAyOCtoWkxkTEE0VUE9PSIsInZhbHVlIjoiYVlKSzhGVXVTajVmazUyRFhiY0FvaGZldFA0TmhkZTV4Q2dZRkZWQkFNNGRMTUVpZitZSUJiUHZpSDVwdU1CV1p3M2ppTzViT3h5UnhoSmFLZDdZYTdlM3hGWk9SMU9MYzQ3WjdQajRQR0cwcWE3NWFhU0tSMVRUaWFFRlUrVlEiLCJtYWMiOiI5ZGU1ZjQyMjNiYWU0MGNhNTYyNWY3NmJiZTZlY2NiY2FkYjFlNzlhMjlkYjk2OGM1NGIzZTUyMDljYjA3OGMwIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 01:30:35', '2023-05-20 01:30:35');
INSERT INTO `visitor` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `slug`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_by`, `created_at`, `updated_at`) VALUES
(31, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im9pTHdzZVYxdzNYcGFoSWxsVmN4Y1E9PSIsInZhbHVlIjoieEUzdmxlSUhDZi9YR081TVZWQTVwOUc2RXphNkVMc3JXaDNmc0F3b3gvNzFXM1BJNGVVTlhBZkt2cVJBNXpObk9UVlJtdGxuNVJydEhzNkN2QnV6ZlBVUXFXeit6aGFTd3NjZTBqVlJENnlrbUU4VFpqejdhMFp0YTlMZjdWUGMiLCJtYWMiOiIxMDFkZjMzMTFmN2EyNDcyYjNjN2NhYzdiOTNkZTVmMzJkMWIzNjdiZWQyNWNkN2Y0MDFjOTVlMjk0N2Y2ZmU0IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6ImFDN3hFRWVtSTloZ3RFMlF1RXNNZEE9PSIsInZhbHVlIjoiRkJKL3FUWEllV1BFaVRTSGY4d2dRb2g3c1dpZGo3MTQ5SDdkSlVOTnUzQzN3MmZkSGg3RnFGTHd2S2N5WGRsdkVCbC8vTFZ3NVRIWGR0VDFHMEFNNXB2aFRUU0twTElGL0tReFJXeWdmV08rcW9iemcvQmZQeVZPRVlpM2ZlMWYiLCJtYWMiOiI2NGRlMWE3NThlMTNmMDgxODIwMGFjOTQxYzRkZDE2MDA0NTI4M2ZhMjY3ZTg3ODRmMWEyNWVlZTdkMDhiZWNkIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlQ2NVczcFRod2FxaEwxd0lqWFI3OVE9PSIsInZhbHVlIjoiUTFEV2RBRXowN090TDFwUnJjdTNuZmpkSTVIK3QrR0hLOFdFN3U0Zmx1a2pOaUUrMHBxQVBNK1dsNkJMdk5YbFBSQktTci9KWUp5SkdvT2JGN1htTlY1VGNxaExzQmdTU000NmpUT2E1YWI3Y3NjZjNabkhJblJOSHdiMnMzZkkiLCJtYWMiOiI5NzA3NWQwZTZhODI0MjBjY2MxM2JiMTc5NGQwNmFjZjdjYmUyNTAxMWQ2YmUzMGFhNzY4Y2Q2NjYxMWJjOTY4IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 04:10:03', '2023-05-20 04:10:03'),
(32, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImpnVE5tdmdQY1Q5OWVBVDdENGNQR2c9PSIsInZhbHVlIjoiZDFlV20xekdXWVFqQTVWTjUrUU4xOERzeks1bTY0M0tKU2hRWWVMNDlSTXRYZ0w3N0c3YzZOWmtmVkFCU2h3N1FPdnBJUVNDTzZDZDYrczhPOHgxN282ajFiWkxubjcyUlJVMXNDWGcxTDkxaXFtZmpqOVlhZjZaNUpXUTRHOFUiLCJtYWMiOiI2YTgxYjZjMWZiMGY0MmNmMzE4NjhjZTEyNTViNzE5Nzc4M2I1NmNjODY5ZDQyMjRlZWZkMGVlMGRmZDVjOThmIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlJCUi81cnprUDR6RlZUWmNRUjJrekE9PSIsInZhbHVlIjoiQ0ZXWTVlY1BpR3pxQkxvdkZPRFBkcStVOUpGTUVYQ0NUZHNSZU8vQmVnVVZIU24xb3RRZnU0Wk50QlBXYjV4RGVidWo2NlNVQU90aWRYSkhQd2M2dHJvVmx2OVlqQitNRzAzc2taeXBLN1huNDNwQ0Y5UXFwWUZWSlJUN0FmcUkiLCJtYWMiOiJjMjUwZWVjYmJmNTY5YTcxMmQwZWZkNzg5YTVlZjE5YTg2OTUzZGVhMGE3ZDNjMjZlZDM5Y2VhMTFmNGYyOTU3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImlUeWFRenI2elFNRUR4OHlzUSs0d1E9PSIsInZhbHVlIjoiQjVER2FSbENiV01nc0F1SDc1aVgyeWJmVnozRDVzT0trNlQ4dGd5QkV4eWZqN2NHYmdUdEFUdzFGSUl4MW5tZ1R5b3h2KzZreWJhN3FhL0RqYWdYM2pxR2ZNeEcrYlNlRTFrdXFzZWVTQkp4bjFVbTRtMEpsTFl6VVQwUzhmZWQiLCJtYWMiOiJjNDgyZTlhM2UyYjI3Yjk0MzZhMzlhZWQyZThkMmJkMmJmZDUwYzUzOTNhYjNjOTQ3OWZjZjJjZjA4MzgxNTBmIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 04:16:21', '2023-05-20 04:16:21'),
(33, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjczQzhWRGlnaE1RR0RFcmtyNGJLaXc9PSIsInZhbHVlIjoiU3o0TzNNeFd2WllqOWlqRmlrSmh3TGF2dmZyb1JzMENoK3pRdlk5RTJvRDh4NDVKZmNMdnVkSFNvMzdKcEhXU1B1TGJkYzdQWlBTTUVKZFYrNUVicFlkRlNPd3VBSDVvc2dPMVBiS0JuWERwclFKWjBmc3pTVjg3a1ZtREhHenciLCJtYWMiOiI3Y2Q2ZDk4ZGQ2MGI3NjMxOGY2YjVhNjRkMDVlNmI4M2IzOGY5MjI3MzBlNGViMTEyY2VkOWJhMjQ0NDJlMzFlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkRDa3g3YUxOWFhiaytTeE8veEhVcGc9PSIsInZhbHVlIjoicUhtdG9jZmRpRGoySFFoODVVb2RCUTN3UllDbVVhcjlrT2xOcWc1OWlQdGdyNlpuY2JBNFhLYU1CNWdqLzdtd0lmNjNldXNXdUJ2UzdYdHY1UnFyRXVUaGs4WkhCOExoaDI1VXlUd0hCTGM2QmhnWkVmcWFMbmp2anNSRzlRakoiLCJtYWMiOiI2ZGNiMTA1MjIyYjIzNjFiNGE5MDQwNzBkMWM2NTljNmVkZmFlZjAxMDI1ODI5MGJkYzE4ZDM3Njc1YjFmNDdjIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImlUeWFRenI2elFNRUR4OHlzUSs0d1E9PSIsInZhbHVlIjoiQjVER2FSbENiV01nc0F1SDc1aVgyeWJmVnozRDVzT0trNlQ4dGd5QkV4eWZqN2NHYmdUdEFUdzFGSUl4MW5tZ1R5b3h2KzZreWJhN3FhL0RqYWdYM2pxR2ZNeEcrYlNlRTFrdXFzZWVTQkp4bjFVbTRtMEpsTFl6VVQwUzhmZWQiLCJtYWMiOiJjNDgyZTlhM2UyYjI3Yjk0MzZhMzlhZWQyZThkMmJkMmJmZDUwYzUzOTNhYjNjOTQ3OWZjZjJjZjA4MzgxNTBmIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 04:16:23', '2023-05-20 04:16:23'),
(34, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Imd3M3VKNElTdldlNWhJZEpSZUFhSEE9PSIsInZhbHVlIjoid21TamRHc2NKSGZ1ZklUMUJyMWd2TWs5SVVhcTBWNW5UTkJkN2hlSktKYVlna0RacVliSm1HMzkwVnYxZTNyZFhlOXdOdTBDSm5lMUpQWUc3SGFrV3VXSTFVUFhSYTRrRU9XSlRCbW5EWHdvaVZlL2dMMTBTSTFvLytKemZUR2kiLCJtYWMiOiJjOTE0NzE3MGE5N2QwNzA5YjYwY2IwMTljYWJhODU2YzFhYjIzY2JiNjU5MDQxMTZhYjJlNGYxMjBlYWMzY2U2IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlhnOVdrVzRHbE5DSk5PMkNNZTJ5alE9PSIsInZhbHVlIjoiUFU2YlVDRlNGRFZSOGVMOGFiNnB4MTFOZkhBSVJ2NEZ3SU1GWFNOMUtZVlArN0o2T1N3dnVqNVVkMDNWZDVXeEV0Slc0ZEZBOHV5VUsyRGZldXhjNVVKaUxQRVNQa3J5K2taSER5QTVpVjBTUmJYMmdnYVk3QXlldmlreUF1V04iLCJtYWMiOiJhMTkxYjBkNDRiMDUxNmJkNmVkODY4OTQ0YTc3ZGNiN2U5Mjc2OThlYjc3NmE4ZTAxNmFjY2I2NmYzNDJjMTBiIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImJKbkhEMiswMmhhdkVpM05EZ2FRekE9PSIsInZhbHVlIjoiWmlQdzk5NE1GajFnTEFpdkRmSFE0elVBWmxCOW45R3RSaXFlRXQvRTBUdGhFa2xQR09DaGxSWkxlM1c4MzdLcUd4ME5JeHV1ZWMvWWJjdnJ3VnoxWEN5aEdmUWM2ZkJUZnBTY2hlcS9nYURTZWRzWTZTc0Z4YmVtUTVjRmRaQWsiLCJtYWMiOiI3MmNkODk2YzNiODFkMzE4OTVmODI1MjQ2OWM1NmI1ZWQ1NTBiMjY3MDczNWY5NDIwYWU4ZDZjNjUwZjU4MmEwIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 04:30:41', '2023-05-20 04:30:41'),
(35, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-20 12:58:07', '2023-05-20 12:58:07'),
(36, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkZkSVVzbTY5a05vUkJLcEhZUFczeFE9PSIsInZhbHVlIjoieU5qRjVSV3lpNmUrNGc1c1Iyd2UzVjNORk5yTmdSMEk4KzI3SVlDT2VjWDIzL1FjY0krZGJiSTREZEJSNloxZzd1eURBeVZpVUtRSVJyOUZRTEZGYkRCMWcwS2FMTkFlR21CQUZDZXdSWjlaQmRJTy9kaGwrejF2Q2RDMmhPeDEiLCJtYWMiOiI0ZmY5ZWNlMjlmYmJmZGEyZTg4NDViNzlhOWZkMDBiNzZjYTQzZDRkNWU5MzY2MWIwYzY4NDMzNGM1ZTg3NTJmIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjgwWGJDNG0xelB1QXR5YlpHekNOY2c9PSIsInZhbHVlIjoiMW9OTTduU2tiOTRVY0ZSSHRQU2ozUzJrU2RFLzMxTG92Q0NzMjg2ajBQMmpoMUJaMU9aOWdNZnRTd0tibnlCTTdIK2c3L2pnODc4cVV5UEFGTzdvWEFyNm1KU1k2MWp0NllCVS84QWI5T0RKNGZPeEltQjlIRDIreGFVc2VHZnMiLCJtYWMiOiJkOTk0OTc5NGVjNGNmYzhkZmEyOTYyNDlhNzY5Yjc3YjAwNTc0ZjM1ZDI3ODRjZWNjOWI3OWJkZDRhNTE3ZDZiIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-22 06:11:40', '2023-05-22 06:11:40'),
(37, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlIzbDBDeTE0bElZMTh1ZE9IUVFNVnc9PSIsInZhbHVlIjoieG8wU0RTS0hZWTJJWVVMQ1ZjKzlUbWVYVGFraEhSbVlENDFrME9nc2JvTEpYNXdXeVJ0ZjNCZUJ3KzRrNDBnWWtTcVVSM2JxTG5FRHNqSmZRVFllV1UrRmhzNjExUVRON3ZVeEZoaHZLaThuY0tPejc2dE5YS3RTb0lGeVZwNkIiLCJtYWMiOiJhYzM5MjhlMWE3YmU5ZGQ5YjE2Mzk0NjY1NzdmMmEzYjA2NjI0YjA1YzRiNmE0OWQ3NjI2ZGFkYzRhNTVkOTNjIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6ImJMR0F0REdDOTRYT1ZDQnU1YktMNnc9PSIsInZhbHVlIjoiU3BnTU5FNk1LTE9zL3l2Rnpxb1Ruc2FISFd6bFE5eEJhcGd6VFBxcTJOTFRkNGFxTFZraUQvTm15MzBoeVUrVG5QTTFvY1pPWHdlWHZqbWxVS0RBWGpBK3lEa1JvWUpJNGhTa3hHMEk1SE4rN2RFNkYrUDZkcG5yOCtqeUY1V0siLCJtYWMiOiJhMDZhZjBkNjAyZmIzYTE1ZDJmNzVkYmM0MGQ1MGVhYTc0MTI4NTEzZjA1ZjUwOTdkMTg3OWFhOTRhYWRlMWJlIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlJ2TjkxaGczNlUwdzJGc1VzVWdSSWc9PSIsInZhbHVlIjoiOHZxY2NCK1NzWE1OTERMN0xJZ2JIM2dqM3oyeHZJclhQSXM5OHVGV1dtNkU5a2l0aHVTWmxvTnNxQWNPVlJ6MlVuVTcwKzJPWmJjVHJLc21IOHJXclo4WlpEcHV6MGZ2azhOaDNxVUtnOFJ1RkxvbmNiNHRxaGhmMFhrNkF1cWUiLCJtYWMiOiJhNWM4MmQ3OTllMzA1NzY2N2Q5NDM5Y2MzYjhkYzQ1ZjUzMTIxYjAyZmViZmVlODc4YjA2MWQ1YmVmNGZlMjgxIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 00:26:27', '2023-05-23 00:26:27'),
(38, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ii9sNFZpVFVRWGJzRzl2YVRsc2I2QlE9PSIsInZhbHVlIjoiM01HdWlFaWVVVHFKanJOdUsxTjFTbDJGdXdnajVIS3NVaENnSGhxdnRSN01NWmtLMEVPeXkwK29URkFyWmNIZC9XWE5qQTdHeS9qQTVmYXgySnFTUWJmdURsdno0bDhBQXlVTlQyMC9yMTRhd0pmL2VGM3pvMnI3eThqMnVZZjEiLCJtYWMiOiI0MDE5MThmYjk5MmNlNWEyYmViY2I1NGNjZmIxNzk1ZTEwY2NiZGQ0NGUwYTcxOTBhOTkyZjE3OGU0M2ZiYWM3IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkUxdzdUdGpjaXByVWxKbVZiNG5ibEE9PSIsInZhbHVlIjoiem4rWkRZZEt5aElZY1QvcFJBeG9nZnFsMml2bUx3SXBUbnZDUm44anRXRDFPemxmSDZpMGJuWGc5dXhXY2VUcFViTXFUNTJsRUQ1dzJqRU9iUFNLYStoa1g3RDVtRWpvdkNIakNSSE5ubklObTVKSlk5MzNMTlo3WkUzVjdnZnQiLCJtYWMiOiI5YjZmNDI4Mzk3MzU0ZjVjZjNiMjU1YmVmMDEyNzI4ZTUzZDBlODlmNTMwMjg4MjY4OWY1NWM3Mjg0YTNkNTA4IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImJObDJRSDVFd282TVd0M1Z5LzZ2RGc9PSIsInZhbHVlIjoiNkRnNUJhWkw2dEJkRTI4c1A3Y3c2aUJ2d0ZhNmFYb0F6SVFNVG03RUxncVVNa09ieGdqWGczcERRYWNJV2RCa3hucVJWeXJ2S3ZiaVFqcHlIZXlCTUo1dkczdkl1cjZZQm90dkwxQ3JDTi90bzRMcnhES3JaREY2U1FONGtHWHIiLCJtYWMiOiIzM2FiM2JmMDhhNWY5NGFiMTJiMTQxZjFkOTAyMjI5YTcxMWRiNGI1OGE2MmFmYmY1ZDUwOTI5OWFhOWFkYmExIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 00:29:19', '2023-05-23 00:29:19'),
(39, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkdKRy9ibjhKaXJiTitmbjY1K3V2SXc9PSIsInZhbHVlIjoiem1CSjVhdVN0Qk1VenZVdldGUzFRYW9SeUQ5aXh0OXJBZzFLZjRRWU5yWTBBVXdhNk12WDdValYwTEZYcGMrNHNXTlVrME1COHJ5U0l6Mk5VVnR0eERlT3hsRWhISlpBSVNhMm9tVkdTd09aalNtbkZXZ09tbDR0akhpVFY0Q0IiLCJtYWMiOiIzOWEwNTIyOTg5NjI4MTI4MGNmZGI5ZWRhMDllYTZkNjhmMWI2NjNhODExYmJlMDRiY2VhYzRhNDE0YzZmY2ZhIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Ikw4bG1rVTA5dWdwV2thMjJYSzFGWUE9PSIsInZhbHVlIjoiRlVPTUY4OS9OWWNqdU51d1Zyd2N5OUVIdkRubTdNdHFVTkFTYzNnR3JzbUQxK3R2MnY1b2ViR3ZEODN3ZDVrMlRYTmdrbDZHbHFvQnRnVXRaaERkZjZTOERoUGM1T2k0SDRWVFdnTStUN21ndTNjeS94bmZtWGhWNGF4RUJQWVUiLCJtYWMiOiJjMDJkOWU2ZDljOGZlYTI5ODdlMGE4OTNiYWUzYzc0N2I5NWZiNjk4M2RjNzAyOTk1ZmM3ZmZiMzdmZjAwNmIwIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlptTHJyZ2ZWa0FUMlBPM290NGhDVnc9PSIsInZhbHVlIjoiYjlYYzBvKzJBOWt2VUJMYzF4eEFhRGE4NEJjTHFBL3NVNHZLV0dKZFY2NWZkdTdOc3NlQWJMWG9LOEw5NE93QTVKZDJIOEdDb2VIWVhtWmJQVVRRNzVmQ3RlR09VYkhmQkdkeFFyeTBOVUErei9sTktPekxaMCtUUGdJbGNFU3YiLCJtYWMiOiI2MDhlNDljNmYwZmIxMDhlZDRjYjA5Y2FiYmJhNjljMjlhMmI1MjcxNDk3MTM0NTk3NmI0YmE0MTljYmMxMzQ5IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 00:59:17', '2023-05-23 00:59:17'),
(40, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjRMUGZRZ1ZjN00yZVhJZFJVN2pwNUE9PSIsInZhbHVlIjoiQitFMUdsb1RKR2tjemdEd3d0b1hkK0o5R0JLNzk4TGZzQ1FPVWlHenJDR2FQM0NOSTY1UU1oa1J0dS9RYTVoVVUxUmlPMmFVaVRod0w1S1Z3ZFQvdXNkaXh1OXVzSDZZbFVlR0xzUzR1VVJEL28vUVdNRVlJWkhoQ0tUS3BhMDAiLCJtYWMiOiJjNzhkYTQ3YWMyMDUzZThhMGU2NjBhMGQzMjFiZjc3MmVhNGI1Zjc0YWJlZDZhNjY4MWYyZTVmN2E2YjlmM2Q3IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6InZRcHo1SXFNektFRzl5Q2NBcngwaEE9PSIsInZhbHVlIjoiWll3SWNwRmlrcC9uaWJqYVlCOGxselFvTmpENEorckdGUEY0eGJTYzBTQWRYWVJ4eUx4TkU3NUF6MWx5TmlIdG04WkZsNnJtUTZlS0x2a2I0U0pxUHVlT3BzUllGUzEzSU1oOVRJSlVoOVgveEkyWlY0VTVjZTB4OHRkWFQyMVAiLCJtYWMiOiI1OWM2NDZiOWE0YjkzZDM4M2M3ZGM3ODc1NTU2ZGJlNWU0MmM0MDRjZTVmYzkxMzI0ZDJhNGY1OTI1ZGUwMDhkIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImZtZ1VKa2duNURrTUNhZnE2cWsyRHc9PSIsInZhbHVlIjoibk44UStBNnhhRHZhQ0pxN0xLb29hVENEUmVUM3ZzUVJmc0Y3NzNML1Z0USs1VjZtY2FUN3dMNXVQcTNwdHlBWUs0TWx1OFlpeHcvNlBhcHFWdElYdUN1cE1iSTlyU1RnOUZaUkdNR1VPa1JiZGNVSTVmYmZVTFV1NldFeVRRVHUiLCJtYWMiOiI4NmJmYThmNzQ3MjRjZWRkODc3OTg5NTFmM2VhMDg4Y2Q0NWMwYjU2YTkyOGM1MjlmYjRiNzUwNWEzOTdiZWU0IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 01:07:28', '2023-05-23 01:07:28'),
(41, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjlJZWJNUzBOdlYvSTArcDlhcFZXeEE9PSIsInZhbHVlIjoiV2lqak5GWHhLRDJMZmtsWm9TZmtFdk5saFlIM1Mwd1h2elgySXk0d2pVbjc1d3kycklJTDZaVE9LcHNsTWZWUDlrakwvUnk3R0huaTgyOXNuNFBKZmhSOFNDRHlvck4xZGN2bkFuRnJsdzQxVjRGMFUvbkRic3BxcXZ4WXJIcHYiLCJtYWMiOiI4ZjkxZTk2YzMyZmE3NTEyMTA3Yjk5MDMzNjMzNmE3ZjdlYzJmY2RhMDA1ZDRmNDI3ZmZjYTcyZWYzNzBjMWVhIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjZnT1NZRkpLb0ZRZytvZG9JUkYxU3c9PSIsInZhbHVlIjoiQ2lvcXoydVMvNlcySGNOQTRyVG5EUG9ETVVscDQzVlVzd2ZieU1oZUw1dEpLRW1tbHkzMmNGMktTZWhNZThvOTBHSTkvZDJoSWVnQkhHdEk2elJQQ2dNUUVoWjMzcVpDWVEvNVFrZ0xjdmlZOURBQU1vZ3JiTnZ1OWxtZElkMHMiLCJtYWMiOiIyMmM0YTM2OGM3NWI2ZjgzZDhiNGY3MDAzMzBkNDYxMWIyOWY0YzAwMDAxMzQ3YjhhZTJiODNiN2JjMzk2ZjRhIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InB1QmRiUVcrZXZMeGIrMkVzOVVZREE9PSIsInZhbHVlIjoiU3BtVXA5NmFHRVpiVGdsclRuRGVHRzhzcjZUWkRvbEFVTm9oK3FiTHJ4UjdhOVdVNDA5M3FCT2dwb2RtL3JKZ1BPQ1ZmN29oSHJsYW1UT21Ndm9VbEVKRmZobk1vcjJ3RHZxR3I0QkpYU2RKZFN0Qy9Rd0d0RWM4dVdUNnFYeHEiLCJtYWMiOiJhNzU5NGIzN2Q1MWYzYTBhZWRkMTgzMTUxNGIzYWQ4NDZhMTVhMTM2MGE5NGJmZWZjNGUwMTllZjBiNzdiNmQzIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 01:42:19', '2023-05-23 01:42:19'),
(42, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:01:58', '2023-05-23 05:01:58'),
(43, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImUvc1hnNE54VDY2YTQ1Z2UrTmt6Smc9PSIsInZhbHVlIjoiUGVodDR0UElTVTdGY3ZCKyt1RGJxd25FNjhmVDMyUzBaSWk4WXZpUWpEdEp4MHdLQkdDbFpLVGxqYnZwa3UwTmluUW1Xam9LS2JGa3lJMjNrSktoZ1pZNmp5eGh5cW45RDVjeTRLZjEyUUR6bW0rQVhFSWorRElycjN6VXBDV1UiLCJtYWMiOiJmZDY0MjJiY2Q5NTFjZTRhMGZlZmI2YzJiODQzOTY3ZDRlYmExZGE2YmJhNDYwNDBlN2Y0YjBhZjljMzFmZjAyIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6InM2R1lsN2hVS0d2U1hYa0NnN3lQVVE9PSIsInZhbHVlIjoiaHlYb3pqRFFEa0hhR2R5ZTMyNklLdG53QmEyZ1Q2WldEL0FOTTYyVGxxRytPdThONm55T3VLSjVWZFVzVU8xWHdoOFlUQ0ZPNzJZYVR1Y0IyTFpsVkpPOGhBbHZXSlBTRnNMS2V5QUZROXVKRTBKS0w3dkFQZ0lvRHNYU3JyT3EiLCJtYWMiOiI4ZWU0NjMyZmU0YTliZGZiNjBlZWE1ZjRjYzk3ZGNmNTk1ZDgxMjViYjE5MTIzMTQ3YmE3YWM3YmE1ZjE2OGNiIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:04:48', '2023-05-23 05:04:48'),
(44, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InJ1eUNhOWVqa1JIZzM4a0oyTkJPMnc9PSIsInZhbHVlIjoidi9jVWdzOUlZdExjK09URDczSXNiMnI2TEdrTUY3aGp6TkhJVmpQNXFWdTJ3OU9Fek9FSXpvRkRaUjBvQUN3d3h5KzluU2tjcWtQU2gyNkMvdm9mblZBODk0akc5VVdaYmRDdnhWUk1HU2xmZEt0T2UzU0srcmlWaWVpK2NSbzMiLCJtYWMiOiJhYmI4MTM5YzQ0Zjg1ZmRjNDJiNTA3NTE0MWZmODY3OWJkODNjZmRlMzRmYTFmZmFmYmYyZDA3OGU4ZDBmZWU3IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjIzOUUzS0FYcE5mbldXUXVpZkpCcWc9PSIsInZhbHVlIjoiYTRyUDJlZDhMVmpOVEo1bFVVYmY3WFJ4cTlTSC9tWU1UUFRxSm1GcUpDL1I4QUdEdktHTXErVDJwS2pPa3R6TmNLSTl5TjFzWWpYWWYxZkJKMEVtdGNaOEVEY1gvb1p0T3cxc0hRNGM5OHVQa1VxZFV6RXpaM09oTDFTOVlwdFkiLCJtYWMiOiJlM2FkYjdjYjdiYTAxNDNhNDU3ODVmNzNlODI4MzZjNTRjOGNhZTMwYjFmNTcwOWZkZTRiYTlhODY0NGU0OGU3IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:05:07', '2023-05-23 05:05:07'),
(45, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im9XYnFZcjNOQ1JMbGcyL0RMRnpQL0E9PSIsInZhbHVlIjoiNi94bDBtUGxSTnRPVmpPNFNMbnh0VjhYMlY5aWpyM2dMc3lGTDlrYUtqU25zRGUvK1c1U0ZWa3dSbDJ6NE9zdlRxdEpBMUpkNnNsbUhjQjJhVVNuTUJsakpvekZvNG82d2VOS1hOdEk1aFBqOUhuclpBV24yL2hmZjR4UnRtdzYiLCJtYWMiOiJlMDE1OWRmNGFiOTYyM2NjNzNlMDA3ODAwNWE2Njg4MmE2MjljNGYzYmQ1NzEzZTlmOWMxZjMwNzBhNWE1ZTljIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6ImFqeVdiZS9vTlh6Wk43UEwzeVRZNnc9PSIsInZhbHVlIjoiREF0SDBBUjFlTHF6azJDQ2JSTlcyYVF0Z3orTmJsSllTRW12STBOYk9adE9MUC9CU3kvNVdQZWlVSjRMRHFqSVJidjFaNHJtWUYwdDNnVHY1aldyMjNJSXY2SjJ3SEZ5MXZmYWx6anNyZVNXMnFWMytQMXBrd3hzS1F2SDh1cWQiLCJtYWMiOiJlYjRjZmI2ZTRhZTgyNDlmOTQ4NzgzZGU1ZjQ1ZDQyNThmODFjZGM5YjA1M2ZiOWM2Mjc1YjBiNDM2NDc0MjBiIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:05:15', '2023-05-23 05:05:15'),
(46, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImZZbVdYMndLMlR5RWZDempzMm9UclE9PSIsInZhbHVlIjoia082TFJGa0lvSVR0ZkNqZDBmUVpkTkt1VE52Z3hSamdLV25MUjZMbDJ3SGNDak4vdDBBUkVMeVJhOTNQUlROcVN6RW9OeTlqcHlGT2w5M3k0ZUhIT2pDeHV3WlJNWXdtb3dqSDJzeGREVzlCMk9Gc05iOFl2MDQzd2RKZGhFSUkiLCJtYWMiOiJmMjQ0OWRkMDRkMTRkZTAzZGZhYmVlMmYzZTgwZjY0OWQ0OGUwMjZiYTdmYjA1NDNlMDk1OGRhOTIwMjAwMTlkIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Imc4Y1hncktHQ2pBTlVRNjdZV0w2Nmc9PSIsInZhbHVlIjoiMU5IUGl3WXNIUHFmcEd4MFhxMmpsNy90aVlJZ0hnRnZoc2U5RmZhSzdpV0lRQ1AyOE9UNXp6NEtoNm4xWnJNUGsrL3MyME9LN09RbDMremlYSXVkQWJOVlpIcEdOOVRqK3BoL2Y5UWdGcEI2NXFEVkpIOFByZTZQamFqUFdLS0siLCJtYWMiOiJjYjc3ZDVlNjhkZDU4ODBhMjY1NzE1OTczNmVhYzMzZWUyNDc4ZmM3NjEwNDhhMzRmMGE5N2ZlMTNjMDkwYmI2IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:06:03', '2023-05-23 05:06:03'),
(47, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImZZbVdYMndLMlR5RWZDempzMm9UclE9PSIsInZhbHVlIjoia082TFJGa0lvSVR0ZkNqZDBmUVpkTkt1VE52Z3hSamdLV25MUjZMbDJ3SGNDak4vdDBBUkVMeVJhOTNQUlROcVN6RW9OeTlqcHlGT2w5M3k0ZUhIT2pDeHV3WlJNWXdtb3dqSDJzeGREVzlCMk9Gc05iOFl2MDQzd2RKZGhFSUkiLCJtYWMiOiJmMjQ0OWRkMDRkMTRkZTAzZGZhYmVlMmYzZTgwZjY0OWQ0OGUwMjZiYTdmYjA1NDNlMDk1OGRhOTIwMjAwMTlkIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Imc4Y1hncktHQ2pBTlVRNjdZV0w2Nmc9PSIsInZhbHVlIjoiMU5IUGl3WXNIUHFmcEd4MFhxMmpsNy90aVlJZ0hnRnZoc2U5RmZhSzdpV0lRQ1AyOE9UNXp6NEtoNm4xWnJNUGsrL3MyME9LN09RbDMremlYSXVkQWJOVlpIcEdOOVRqK3BoL2Y5UWdGcEI2NXFEVkpIOFByZTZQamFqUFdLS0siLCJtYWMiOiJjYjc3ZDVlNjhkZDU4ODBhMjY1NzE1OTczNmVhYzMzZWUyNDc4ZmM3NjEwNDhhMzRmMGE5N2ZlMTNjMDkwYmI2IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:06:37', '2023-05-23 05:06:37'),
(48, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImZZbVdYMndLMlR5RWZDempzMm9UclE9PSIsInZhbHVlIjoia082TFJGa0lvSVR0ZkNqZDBmUVpkTkt1VE52Z3hSamdLV25MUjZMbDJ3SGNDak4vdDBBUkVMeVJhOTNQUlROcVN6RW9OeTlqcHlGT2w5M3k0ZUhIT2pDeHV3WlJNWXdtb3dqSDJzeGREVzlCMk9Gc05iOFl2MDQzd2RKZGhFSUkiLCJtYWMiOiJmMjQ0OWRkMDRkMTRkZTAzZGZhYmVlMmYzZTgwZjY0OWQ0OGUwMjZiYTdmYjA1NDNlMDk1OGRhOTIwMjAwMTlkIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Imc4Y1hncktHQ2pBTlVRNjdZV0w2Nmc9PSIsInZhbHVlIjoiMU5IUGl3WXNIUHFmcEd4MFhxMmpsNy90aVlJZ0hnRnZoc2U5RmZhSzdpV0lRQ1AyOE9UNXp6NEtoNm4xWnJNUGsrL3MyME9LN09RbDMremlYSXVkQWJOVlpIcEdOOVRqK3BoL2Y5UWdGcEI2NXFEVkpIOFByZTZQamFqUFdLS0siLCJtYWMiOiJjYjc3ZDVlNjhkZDU4ODBhMjY1NzE1OTczNmVhYzMzZWUyNDc4ZmM3NjEwNDhhMzRmMGE5N2ZlMTNjMDkwYmI2IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:07:00', '2023-05-23 05:07:00'),
(49, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImZZbVdYMndLMlR5RWZDempzMm9UclE9PSIsInZhbHVlIjoia082TFJGa0lvSVR0ZkNqZDBmUVpkTkt1VE52Z3hSamdLV25MUjZMbDJ3SGNDak4vdDBBUkVMeVJhOTNQUlROcVN6RW9OeTlqcHlGT2w5M3k0ZUhIT2pDeHV3WlJNWXdtb3dqSDJzeGREVzlCMk9Gc05iOFl2MDQzd2RKZGhFSUkiLCJtYWMiOiJmMjQ0OWRkMDRkMTRkZTAzZGZhYmVlMmYzZTgwZjY0OWQ0OGUwMjZiYTdmYjA1NDNlMDk1OGRhOTIwMjAwMTlkIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Imc4Y1hncktHQ2pBTlVRNjdZV0w2Nmc9PSIsInZhbHVlIjoiMU5IUGl3WXNIUHFmcEd4MFhxMmpsNy90aVlJZ0hnRnZoc2U5RmZhSzdpV0lRQ1AyOE9UNXp6NEtoNm4xWnJNUGsrL3MyME9LN09RbDMremlYSXVkQWJOVlpIcEdOOVRqK3BoL2Y5UWdGcEI2NXFEVkpIOFByZTZQamFqUFdLS0siLCJtYWMiOiJjYjc3ZDVlNjhkZDU4ODBhMjY1NzE1OTczNmVhYzMzZWUyNDc4ZmM3NjEwNDhhMzRmMGE5N2ZlMTNjMDkwYmI2IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:07:47', '2023-05-23 05:07:47'),
(50, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im4wc0hGZkd5Y3NJZU9QZURtcDBpb0E9PSIsInZhbHVlIjoiamRMcHFoVDJkVUdwRDYyUzNUMit5QlpObVdjdHh5Zyt3TDZWTSs3bmFmdHBhbTRFNmROQklCRHo2UVdJVnBQT0dCZ0Z2VWRaYkFDaWtTc0IxOW4xaFBaeEdzYlA4MnR2R3NOdnFXSllYTDlLWUJRYkYvNVNEbDUyaC9Dd3RrQ2giLCJtYWMiOiIzZThjNTg0YzMwNzhhOGUxMDc0ODNhMDgzYTBiNGI1ZjEwZGU4NjU2MDQ2OTFkZDdiMTNlZWVmMDVmOWJjNzE1IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkIrVitPK1d1OVFjdmpEVWROVmk1cEE9PSIsInZhbHVlIjoiaVRoWHRBdSs0Q1pSTHV0Q3dnRTJHbkJRbk13UktUbmIvMm1xeFBUNW9YcVFqUG05R0RNNWxBMFcwN3NGM3MzWkFrRG11d3NjTzRvTk9KT29ENkx1WVdsd0xOQ2Nhbm0zdU15UjVzMDExb2poK0Vadi9IbHFQY1Z5SktPTzZkK3MiLCJtYWMiOiJkYzNjMjE2NzhhZjRlZWU3NmJmZDQwOTZkYWRhZmMxY2IzMGQyMTFhMDQ4YzRiMWFiZTI2OWJiM2EzMmUzYTA4IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:08:52', '2023-05-23 05:08:52'),
(51, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im4wc0hGZkd5Y3NJZU9QZURtcDBpb0E9PSIsInZhbHVlIjoiamRMcHFoVDJkVUdwRDYyUzNUMit5QlpObVdjdHh5Zyt3TDZWTSs3bmFmdHBhbTRFNmROQklCRHo2UVdJVnBQT0dCZ0Z2VWRaYkFDaWtTc0IxOW4xaFBaeEdzYlA4MnR2R3NOdnFXSllYTDlLWUJRYkYvNVNEbDUyaC9Dd3RrQ2giLCJtYWMiOiIzZThjNTg0YzMwNzhhOGUxMDc0ODNhMDgzYTBiNGI1ZjEwZGU4NjU2MDQ2OTFkZDdiMTNlZWVmMDVmOWJjNzE1IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IkIrVitPK1d1OVFjdmpEVWROVmk1cEE9PSIsInZhbHVlIjoiaVRoWHRBdSs0Q1pSTHV0Q3dnRTJHbkJRbk13UktUbmIvMm1xeFBUNW9YcVFqUG05R0RNNWxBMFcwN3NGM3MzWkFrRG11d3NjTzRvTk9KT29ENkx1WVdsd0xOQ2Nhbm0zdU15UjVzMDExb2poK0Vadi9IbHFQY1Z5SktPTzZkK3MiLCJtYWMiOiJkYzNjMjE2NzhhZjRlZWU3NmJmZDQwOTZkYWRhZmMxY2IzMGQyMTFhMDQ4YzRiMWFiZTI2OWJiM2EzMmUzYTA4IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:09:38', '2023-05-23 05:09:38'),
(52, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjArSUxCY0hkODFNWGpYNkQ2eER5UXc9PSIsInZhbHVlIjoiaEE2NkdrdE4ycnI2QXM5QTkwd1g5YWxNa05taGVqU3R1V2ttdHJWMkhOeWRCVmcwQ0FIVFRiNjcvK1dEeWRGN1BwVFlwRmQva0wwL0JhckE3WWk1Yk5Tc2EvZlVaZkEyVVN2KytIeWV3V2d3ekxxZEFLM2hGdUMrb1oyQnlYUUoiLCJtYWMiOiI5YTZkOGY2MTFlZTI2Njk5YTc5M2VhZTcwMmRkN2ViM2E5M2IxYTJhNWU3MGNjNWY4YjE0MTBkOWIwZjIwOGY2IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlZHSVd0dCtNQ3VVdGxGSmJIK2R5ZVE9PSIsInZhbHVlIjoiTWxMczBNSFpMY3VpVnRvL0R4UVplOFRmbG5rcG9lUUs1WDlOejdUTzl3ZEtEekIwR1dyclhHWDFhU1Vhb2RsbzMyZjRFSVdsbHJQWEN6TUtQRHZCUUpNNC9maUtNbVBhU1lyc00yWTRMSEgyVHI2TlVleXhXd2JNZ2lKVjM0VmUiLCJtYWMiOiJmOGY2NGQ1ODNjYmQ0NjM5ZDgxNzI5OTZmOTc3NDNkYzk5N2Y5ZjYzYjVlY2FjYTgxNWEyMDc5MGNiYzI5N2EzIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:09:57', '2023-05-23 05:09:57'),
(53, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkJXb0RMOEhabTIwRnJidlVKdHY0RXc9PSIsInZhbHVlIjoiaFFjTXhvN3RxZjlxdGRtNmZZRUlRTTk1RitkUzk1Nkc1ZmdtdXJqenZxSHprVHVXa3dOMmg5akJZclRLdDh5NjZPMVVWQW9QWXFoWGx4eXZyaVdibXdKeHllYzZidTJ0N0FDSnlMZmp2YjZFWTZYdDRIUGpkeW1TcnpJeEV6R1kiLCJtYWMiOiJiYWE1YmU1OGI5N2YwOGIyMGQ3NzI0YjgwNTZhMGNkOWZkYjE1Nzc0NzU2MThmYjc2ZjVmZWQ4MjM4Zjg4NGNmIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Imx3Yy93UXRna0RkSlFtZGxna1BiUkE9PSIsInZhbHVlIjoidy9DUlEyYUxHOS92MlMyQ0ozQ0d4eGN5cGUrR0k1dHBkYlorWDJVMlRXOXpVM1FqT1JoeHZXakZBWGxCN29VUndsRzZONkV4ZDlpaDZBbUY2RmI5ZHZzaWoxRzk2YWdocFhDaGNGQ2l3b3EwN2dtSEx2Y1RoRmMzeVdzVTNtVVEiLCJtYWMiOiJkMWNjNzUxM2M0NDA1ZjgzNDg0MDZiNTNlMWE5MDRhY2IxNjBlMWNiMWNiNjczM2Y0OWUwMDg3ZWI2OWFjMDJlIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:10:23', '2023-05-23 05:10:23'),
(54, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Iklab2RXQmdjSmZVQkRxbjh6cnptdmc9PSIsInZhbHVlIjoiUFIvVUNGWS9mcGMvdGpTaWtXaHR5bEpleUNsY20rZ3NGcTlBMTMzQm42Vjd1NUp0cEpSK2dKYkdPdkJ5cllCd2lWNlFmNDJKMWlwSVJaV3JST1UxTXBacXlUWlpzdG44NTRhWHhuYVdFN0JvdE9JZDJQUGtaTjdQUUNzRENIa3giLCJtYWMiOiJmYTBkNDU4NDlmN2UwNjU5NDU2YTI3NWRhZGRmNmU2MGI3ZDk4ZjRhZDg4YTQ4MmU0ZWU4ZDg3OTY0NDM3MDdlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6InpPNTgyZWZXNUdLZVg5S2dBYldDNXc9PSIsInZhbHVlIjoiVzlkTy9DU3RjMnJNRS9JeDFkNFc5RHdHTUFUdVhxMHhZVUlZcHBCczNsSTl0QzhPQ0dqa09KOE15T0l3cU1NY0dPeE1CeDZXNEdsRWRVKzJOUmhDMzl1SjRmMzk5RjBJOW9PQUVUZ2ZqRzRQaWlLOXN3Y3N3d1Qwb3VldFF4VzAiLCJtYWMiOiIxZWRjNDZjY2FlY2FiZTc1MGU0ZTliMGU1ZTc5MzNmZmVkNTQ0M2Y5NWRhNTRlM2E2MmQ3MDVkNjBlNTU0OTM4IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:11:12', '2023-05-23 05:11:12'),
(55, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImxQckpJUC9tbWpxd2dSNmxSazN4ZEE9PSIsInZhbHVlIjoiSXVOUTBEejNTR3pZTGVIbi9XL3FHbEkwOWM4WWVxeU0yR1lmWi9GdUJDenlYeGIzSDFvM3JGaWVzMUVReDRFS0lYMFNMMStKWERSQ3RVaUh5MmhtNzMrWUt4WlM3VjJlQ2E0ZHNpTXFnRXV0OERWdzJEQW84OGVZZUJlTHlENEUiLCJtYWMiOiI2MTk0NGY3ZTNiZmUwMGQyZDdjZTc3NDc4M2Y4MzcxNTgyMzRjMGQ0YWUzZTNjYjQ5NzhjNWFlYmZlNTI3NDc5IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IktvTEluRmc2MXY2UFZIcGUwRG55blE9PSIsInZhbHVlIjoiclAvWDBrRDBMa1U3eENPYnlNd3V3WEY3MEtGY29GQnZOeHNqSHczTzBsak1Qbk1IenNaSkpZa29MZHY2WWE0NmlsQUtjeTAvc081OXJUaEF2aGlaMGk4VjZIT2tqamRMS2hBeDVSNTF2SGh4aTZjV01qSVdIVW1Cb1VVcHlQdDYiLCJtYWMiOiJkY2FjZDI4OWFlZjk4MzZhM2YxMTRmMjA0ODUwMjk0ZGZjZGQ5YzUyY2ViMTcwMThlZWQ0YmQ4NzhlMWNiNTM0IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-23 05:11:37', '2023-05-23 05:11:37'),
(56, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"*\\/*\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-27 03:25:11', '2023-05-27 03:25:11'),
(57, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InRUQm94TnFhcnhkNDE4YmNDMEU4Vmc9PSIsInZhbHVlIjoieHRmTVJBR2RkLytZNlZ1bmsvY0dTVkg0Wk5wTFNraXMybzYyMmZ5cTVjL2JqSFlRdGpWR2VrY2JnNGo1K0VHOW5BZXZBdTVuWXRVU1VVNTU0YllxQ0VBQ1g1NTBodi9UZUVrNk9OdVVxQWNDUWwwYjdwODRXRDlyN1AxdzEydlciLCJtYWMiOiI4NjRiYTA5NmRjM2RlMzg5N2E2MjE4MWQxNzE2ZjAzMTUzYWZmZTVjNGZlZmFlODY1ZWRjNjhmNjdmNmRlNDkxIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlN2UFREMG5ueXpwTExCMUhacU1Lamc9PSIsInZhbHVlIjoiQ2dmblZqNnhwR1k2Si9Yd1lONEtRK0pYaHE3ZnRJb013M0dNRElZOU9OM1l4YmovN2pUaXY1SkdvTmxWbDFLSENieU11QnQybWlXWEw3dm15TnMrSVpCK0ZlN2lJbXgrL0dnRUxLemNMUlhwT3k4YUNQd09xY2tHTXVpcHRrc3ciLCJtYWMiOiI2NjVmN2FjNjM5ZWU1ZTJkZDQ2NGI3NmI3OTg2ZmNiMDcyMmQ0ODc0YzAzNmMzYWM5NDc4Mzk0MzFiY2M3NDVlIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlZvcEJjQVNqb1piN0lmdFRGREg1eGc9PSIsInZhbHVlIjoiZ3VSNUc4WHJoUmZvaXVpQVlGS01XN2hpdEVLcEY5ZWN1bjRsY1NsREoraXhuT0ZFQVhjdEZCbEI3Z1ZXaDZYV05NNjdJQ2VTbGswcDdJVWNhRXpTSWxONTV4b3RkK3pwUDh6ZHM2cnUrbG81angvRFVzWk5xNnNUUVo4SjhScTUiLCJtYWMiOiIwMjkzMzE3ZmI3M2JhYThhNDVmM2NmZGZmZDA2ZTNlZTFlOTYyYWM1N2ZlZjE3YjQwOGYwYWM1NmY1YzdjOTljIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-29 01:36:12', '2023-05-29 01:36:12'),
(58, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"webzfactorynew_session=eyJpdiI6InJBaEJ3NWpncytYZVd2SWJqbktFRlE9PSIsInZhbHVlIjoiTlBoeUw5aEhCWkFxMklWaU9hQ1hGSFRNL3NZL01jTEJadE5LRFBVejBZdEsrNGVxRDdFaEhnOVpEWUJDTXpmRnRDWk5CcWw0RFp0K2hWOHhsOW1ZYjZWNkFzSkd1enQvMEUzYnY5cnEwOVo1UHpPRytlL3V4QkJpVTNGNDI3MnIiLCJtYWMiOiI3Nzc1N2Q0ZmE2MmU2YTYzZWVkZWUzNDM5ZWM0MDlhYTgwM2Q4ZWFkMmI4YTFmNmFhOWQ3MjYwNzY2NWYzZjUyIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-29 04:49:58', '2023-05-29 04:49:58'),
(59, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"webzfactorynew_session=eyJpdiI6IlFTbmZNWFZ1ODRldWE2eHRNZmZESkE9PSIsInZhbHVlIjoiOHl0alFyRWk0aG5hY3JsS3I2am5nZkt5b29ZMm42ZU1aZkVNd2lKR3VrUmI0WElScU1ySkZ4QS92V0J3TGE0M2FsMHJQcVB0TUYyZk9ERjZsME56eTRlbERBTmdkTVlhbFdJU2pSdXhiNWNROHVDazIwc1JzNTVKMUo0a1lJaWMiLCJtYWMiOiIyMmJiMWMxN2Q5ODU2NzM1YTdlNDRmODhmMDVmMmQzYTFmYzk4MzZhMmQ0NzA3YTRmNzlkZTRlYWQ4ZDU0NGIyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IlhXUktxaFUyUzMyRGhXZ0N1WTJ3NlE9PSIsInZhbHVlIjoiMFZGaTdKZllkTVVGWVJ3SnM0RE82a1I1MFZ4ZGpVWXBMVnRCcDdVcDVtczF0RmdDQ0lIMXpkZ1RRTHZkbVFzV0tIdjczT0Q4bHBtWDhMWjFLUi91UnFzcS8xSUhoU0RYTVh1YVNxR3VkRnNUMXh0VWVWUzF6Q2xzd2R0cE03bjMiLCJtYWMiOiIxNjdmMjA5ZGQxM2Q0MzIxMjA5ZTgwZDBlOTg1NDgwMmU4YTYxOGNiNTM3NWMxNDMwMDI5ZGM3YjViNWIxN2Q0IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-29 05:43:49', '2023-05-29 05:43:49'),
(60, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-29 06:15:56', '2023-05-29 06:15:56'),
(61, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkJoUGRucjhMVjlaaUdkcWNEOE9RTUE9PSIsInZhbHVlIjoiUHczd3ZVMjRMYm9oZk9TcDFuanRjdEc2ODNqNU9CcStXN01obWdhYWF5VkpsVll3djJBRXZuSktJbWRLMks4Y2s1U09YK3VUaEh1NmIzU2ZZWittWjJWOW5mSm4vS0NRcmtQZWhEMlRPQTNaNmNCeWFzUEpDUDllcEhuZ0JUdnEiLCJtYWMiOiI5ZjhiMTNhNzJjY2IwOTgzN2ZmOTE0YmZjMDU2N2FjNmY4ZGE3ZWY2N2Q0YzkzNDRlMWQzMTgyNWRmMjFjZmM5IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IjJPWjZMdDV0VlNNMlBaOWtDMGxUQVE9PSIsInZhbHVlIjoiT0I3L2J3UzVKU3IzZ2hFbXFldlRCTTFZUUt5ZWZScWVyN2NXaU9QblR1bXBJZlF2N2RWZjFhaFJDSkdqUkVlZC9SRjM0NVdVa1JtRXJ1R29ZZlVkeUdiQlByZVliWE1uUFhaejQvVXRZcGJsWlhnbm9aek1qVTJIYkhrOEVYU3MiLCJtYWMiOiJmOTNlNGFjODk4YjdlNzQ3MjRhZjVmNWYzYzM3MzQ1OGZjYWUzMDkyNjExMGFiMmU4NjY2MjY1ZDljNjk2NjEzIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-29 07:24:42', '2023-05-29 07:24:42'),
(62, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjVuQWRoekRnaDArSVd2NER1dHJ6NHc9PSIsInZhbHVlIjoiQ2NpSEtqKzN1WThrNS9FY0l6WS9hNW9WbHRyWWxXVE92bjJybG53YWFBRzFwL2hSZjdwZmVkYUxUVVBNcGFncWR2M3liaGovMUwwWTE3QlV4cWV1cGpZWjNWK1NYYnVGdlZEQzV5SDM0dy9FbXV1WnVSNzYxZmFiU1g2OWpxMm0iLCJtYWMiOiI4OTU1ZjUyZjU2N2UxZmY2MTA4YWEwYTliYjZmYjI4MDFkNWIyOGE3YTQ0NDhjZmE4YTdmYThjZjNlMWIzOGVlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IktkMVRpY05wUlVPMlhHQVBMSzA0U2c9PSIsInZhbHVlIjoiSWlEL25ab0ZGK3BYdlhqalpTTEtMVTVxRmR6NE81MEhLMW9GQ2NkVk9CV3Z3LzZqTFQwdGhtM1BRT2VNOUxOVHRNam5XeWhaR0tjWE1NcDF6TWszbGdvcWhET1JXczhXU2tlZmgzTmhLWjhwTFllU01Rdm5wVXduS09tQzNpTnQiLCJtYWMiOiJhN2M4ZDlhMTk2YjNiMjM1ODRkMDYzMDViOTkzOTViNzQzMDhlYzhiN2MxYTJiMzUyM2VkNDY4MWI4OGIyZWY1IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2023-05-30 04:32:11', '2023-05-30 04:32:11'),
(63, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2023-05-30 11:55:02', '2023-05-30 11:55:02'),
(64, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"*\\/*\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-31 00:56:51', '2023-05-31 00:56:51');
INSERT INTO `visitor` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `slug`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_by`, `created_at`, `updated_at`) VALUES
(65, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"cookie\":[\"testCookie=1\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-31 06:40:54', '2023-05-31 06:40:54'),
(66, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"testCookie=1; XSRF-TOKEN=eyJpdiI6Ik9hRW1xTklvbnVJbFY2Qk9wbGhnQnc9PSIsInZhbHVlIjoicmhkUWtyY3NVeTJxK0FoeWJoZFpqL2VmbFZ4OFhaWHZNWFVDUU1lRVlEODlTS2VRQ3FOSGs1czRSMDdYV0MrWWRmWmR3YTkvTzB5Z3VuU0NNdGlNdVY5eGNzbmNRUTBBY2lPRnErU1BiZTlLSk5US1liR1hCN01UU1V1a01aNHMiLCJtYWMiOiIzYTkwYTFjM2MyYjZjNWI0MzhkMjVkNGQ0Zjc3MGU2MjNmMDBjYzA3ODAwYzM4Mjg1ODllODNhNzVkNjRkYjc2IiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Ijk0d2o5NjNVT04wb0dLSkExRVA0dEE9PSIsInZhbHVlIjoiNEk5Z1hEcHRSNnZRZjVyVEJoWlFTNkhVRjRzbk9lU0I0RTZCWW5mOVFqQkl5dUd1aEFpdnJaQlZ0bU5acTdsYnR3cHhTeDFiQTRzSmVWNzNrTDFGNmEwZ0dYYUtOejdpeWJDNnAySXpBY0xXT3hXdTlFWlBrNHdNOGRrYytSMUoiLCJtYWMiOiJjNzA1ZTBjYWJmYTVjY2M1NjA1MjlmZTUzYzgyYTg0NGNhNThiZmE1NWZkYjdjMTUwYWE2NzI0MTk0NzllMTc4IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-05-31 07:54:22', '2023-05-31 07:54:22'),
(67, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlFTRjRsWnpyTzhHWFRNNlRmQTZZOWc9PSIsInZhbHVlIjoiOFpRaFM0d1JYR0gzd2NsM2hDUDhieHdOajZyeFNuMzl5Z3BwVlhRRHErclRPLzE2NTkrZ0JXSU5jQ3c0T0hvUTh6ek9YS2ZxbjVmRjVFN2o2VzMzUS9SbFhMOUNMWFJjNE1LdVdlTWIzYUZveUR1TWMwVFg1RUEweTg3NDNtSEgiLCJtYWMiOiJmNzM2ZWI5MGUzNTE5NTFhNDVjOTA4NDJhNGM3YTU0Y2FjOGUxZDA5MmQwNDE4MGI3NGJlMWQ1ODgyZTQ5NTVlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Inl4MUlibnBpdGExbnFaTWVVdk5zSEE9PSIsInZhbHVlIjoiRzhnNHkzQW1MMHUzUDlMYnVYcDBFZzFXSWVsVmpROUtDcEI5ZVoxbTlpSWdtUzJwTXlENnE0WnlVQjhlajNvcGwxck53TkVsTFpVZzVGODIvL0F4NS9xWnhUaURZUjl6NGZLRVZBQmF2Sk1ZcVBvNU0rQjgyaVBkRVNzTHFvMTAiLCJtYWMiOiI2ODJhZmVmOGVmMzIzYzhhMmI3ZWZhZGRmOWEwZTI0ZTg2YjNjYjJiYWI2OTFlZTU1ZmQ5YzI5MGY2OGIyOTY2IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImtVdnJ2MFlNajZlQzkyWnYrK0cxOVE9PSIsInZhbHVlIjoieE02elI0Tm1hb2lvaHpqYVRqT1Fta1hkRW13MTdyUnJZMjhvZ2NjcEdBa1BldmRJREo4S0tRVDNzZTZ6YW1PRDRqc0RITmpHK1o3cUJ1dkRCMC91U3BZRGt1YUJOVDhVeGpCM3Zzcm9NMStmTnBEZEpWaFdMb1RLSlJheG1GZHgiLCJtYWMiOiJhYjhmMjZhYjM1OWFlYjBkZDIxNjQzMTJmYTdkM2RkMGM3YjhlOTI0M2JiMTA0ZjQwYTU1MDA0Mzg2NTMxNzhhIiwidGFnIjoiIn0%3D; testCookie=1\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-06-03 04:29:53', '2023-06-03 04:29:53'),
(68, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImNYSGNReFJ4cWFyYk40UkRvYWd1WlE9PSIsInZhbHVlIjoiOWMwY2k3bGRuazV4Q1BJcmROQnljYXRBeWRGNDZHRk9iWFAyanZKSWU5MDBERjBQSkRyZU1wME8ydlhEV0FwaytVUVB0dE1yZ0U3NkxXbEVobGNLZ2RMV1AyU3dpdGVMVTRZTWdScjk3cWNWZDhBQkN4MlhLanp6ai80M2RURk4iLCJtYWMiOiIxY2FjMzJiYzgwOTZkODEyNzg3MDQ4YTRlMDk2ZmMyNDhlY2RiZDZiZThlYmFmYzAyOTNkMTY4ZTg0Mzc2NmEzIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6Im81cnlhZ3VLS2IwVjRqNkhsNi9jOXc9PSIsInZhbHVlIjoiYmRLZXZRdVVnS3Z5RTZZSmN0QkNyRVB2KzRHc2t2Kys5cnRRQ3FUV2JhVFNtR1MyVGxGY1QrKzFxVUpzR05NSE9TY2phZDc5Yy9YR3N6UkkyVGZpU0l2alJab0ZTYVFWM2lkWUZEMThQZDFjOG5YVzFoQnlScjZMVlZDcStUK0giLCJtYWMiOiI5NjQyNjcxYWJkZjMwODE5NWNmODI0YmM3ZWE0ODYyOGI3OTE1OWZjZDA4ZmZjMjFlOWM4ZDA4NjRhNGYyODUzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlFIOWtaK20rVzBLRlF0d3RkRUJPMmc9PSIsInZhbHVlIjoieC9KWmc5aW4zZ2FVTlViMzMwMHdrbDRmaHRhUVBoc2lYOUowSkpTVjVLV0tLK0xKcE9MV3NTUHNMVVJxVFp2Y0c2M3hZWFdaNURxbEV6NmZyWDB3THoyc2tqUmhORlNoZmpSbUdPY2R1Nm5XQzdUeUVFSDMyRllVMzJHRDlEMHUiLCJtYWMiOiJiYjI4NDQzMGZmNDUwZjRmMzUxYzZlMjUzYWY1N2UwNGM4NDdiNmQyNGZlMzIwYzI5YmZkOTQ1YWIxMTE3ZDZhIiwidGFnIjoiIn0%3D; testCookie=1\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-06-03 05:21:21', '2023-06-03 05:21:21'),
(69, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlVPbWZSSUVjOGdqVjdMTGE0MnBRQ2c9PSIsInZhbHVlIjoick1zZHU4QTVvNThTeHIwVHVuSno1WEVkeXgxbGVnNGtobnBDcXJkVE8xeU9uMlIyNVVFeS9RSllNb0FJMkJlT2NXQjQ0ZWI2QklVWmJTM2VUZGowQXE0dE0vdlgySEhCV3VvcWFxSDVydytJKzdpd2RhZVVISmJvWXBuUEgzRVciLCJtYWMiOiJiMjcyMDE3ODNjOTI3NDIxZjZmNDUyZDhlYmNhOTZmOGNlYjBhYTg2YzQ3YjM0MTE2YzliODBjZmI4OTkyMmNlIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6InN2UzZIUDNSWFh0WlZnWXBnYS8veXc9PSIsInZhbHVlIjoiOG9TbS9QYUhabHl2UjNvNUlHZ0tXSlZOYzZ3eXRJZHpmQlhkWkh4QklNVm4xSDV6UVRGbEg4ZVBTazRITTRaK2RFWU0wRUtxemFLZFROaFhjZUhxRHFLQ1dKbnpIRk9qUDBMd04zN2lSOGJQTHlmZUFGUWRRKzB1ZVc5OWk1RkoiLCJtYWMiOiI3NGI5Y2Y0OGEyMzk4NTg3MzA5OWJmYzU0NWI1NTg4MGIyZmU4YWE3M2Y3ZmE3ODk2ZjdmN2NhZDhkYzNlOTE0IiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, '2023-06-03 13:52:13', '2023-06-03 13:52:13'),
(70, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:27:51', '2023-06-05 01:27:51'),
(71, 'GET', '[]', 'http://webzfactorynew/code-wizard', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"*\\/*\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-06-05 03:13:58', '2023-06-05 03:13:58'),
(72, 'GET', '[]', 'http://webzfactorynew/teetli-official', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/114.0\"],\"accept\":[\"*\\/*\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-06-05 03:17:30', '2023-06-05 03:17:30'),
(73, 'GET', '[]', 'http://webzfactorynew/teetli-official', 'http://webzfactorynew/business/edit/7', '[\"en-us\",\"en\"]', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', '{\"host\":[\"webzfactorynew\"],\"user-agent\":[\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko\\/20100101 Firefox\\/115.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,*\\/*;q=0.8\"],\"accept-language\":[\"en-US,en;q=0.5\"],\"accept-encoding\":[\"gzip, deflate\"],\"dnt\":[\"1\"],\"connection\":[\"keep-alive\"],\"referer\":[\"http:\\/\\/webzfactorynew\\/business\\/edit\\/7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im5jMUdLb3U0VGsydi93OGk5Qkc4bGc9PSIsInZhbHVlIjoicFcwWjdSanBwOENWMHZHMVJDZElFT3dMR0I5SlB5VHl3K0tOVXdIMlNxWHNPNjdRNkduVE5ybTBGR3NHY2Y0TThRTWpraG9GMktFa0FKT0lxRGZ4ZVBkOG1jZmV2MDJVK2FOd08rVFFFZHZ6dnpIWnN4bURwRk93a1IrL3BPMUQiLCJtYWMiOiI4MjVkNzViMTY0MzA1ZDNlYmNiZDQ0NTRlOTU5YTEyMGMzMzFlMGE2MjUwNmE4MzRhMGRiNjVhYWJlZGMzNTJkIiwidGFnIjoiIn0%3D; webzfactorynew_session=eyJpdiI6IlVvMjBSY21jMWNJUnJjbE04RXNPS0E9PSIsInZhbHVlIjoiOG8venhueVJudFhaUW83MXUrTlRJbXBTanRkWHJNSStJY1dpRDFZZjRDYXh3YVFMOWZoQ2dxNXhYUmtJVVpaMUFMUjltUWJ0TCtyT3JXbnpFcEFscDhqeEkrRnBwaXlWbXBpZllZVlRXaFhVYnZUNHluNDBPMHhVOEQ5a3cvTksiLCJtYWMiOiI5ZjU3ZDcyYTZhNTBiYzJlYjYzODNlNjU2NjMyMmJkYzdlNWJiMjA2MjczZGI4ZGYxMWEyYTNhYzFkZmEwNWQyIiwidGFnIjoiIn0%3D\"],\"upgrade-insecure-requests\":[\"1\"]}', '', 'Windows', 'Firefox', NULL, '::1', NULL, NULL, NULL, NULL, NULL, '2023-06-07 14:22:39', '2023-06-07 14:22:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
