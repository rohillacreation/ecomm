-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 12:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `created_at`, `updated_at`, `name`, `lname`, `phone`, `email`, `address`, `pincode`, `state`, `country`, `user_id`) VALUES
(1, '2022-03-08 00:13:16', '2022-03-08 00:13:16', 'nitin', 'rohilla', 9728908391, 'Rohillaking148@gmail.com', 'vpo -  lala kherli teh sohna , disst.  Gurgoan  Hayana', 122103, 'Ho No. 122 , village lala kherli', 'India', 3),
(2, '2022-03-11 02:25:44', '2022-03-11 02:25:44', 'nitin', 'rohilla', 9728908391, 'nitinrohilla515@gmail.com', 'faridabad', 122106, 'Haryāna', 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin account', 'admin@gmail.com', 99728908391, 'Admin', NULL, '$2y$10$7BoE6.qmHzeile1AUsGXbefS6nXXoSD1ofRTW7KMYYYNeDjM5/nqq', NULL, '2022-03-07 01:04:36', '2022-03-07 01:04:36'),
(5, 'seller account', 'rohillaking148@gmail.com', 9728908391, 'Seller', NULL, '$2y$10$7BoE6.qmHzeile1AUsGXbefS6nXXoSD1ofRTW7KMYYYNeDjM5/nqq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `seller_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'speed', NULL, NULL),
(2, 0, 'wheel', NULL, NULL),
(5, 0, 'average', NULL, NULL),
(6, 0, 'budget', NULL, NULL),
(7, 0, 'eco-friendly', NULL, NULL),
(8, 3, 'seller attribute', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `name`, `attributes_id`, `created_at`, `updated_at`) VALUES
(1, '23', 1, NULL, NULL),
(3, '4', 2, NULL, NULL),
(4, '280', 1, NULL, NULL),
(5, '190', 1, NULL, NULL),
(6, '300', 1, NULL, NULL),
(7, '270', 1, NULL, NULL),
(8, '5', 2, NULL, NULL),
(9, '20', 5, NULL, NULL),
(10, '23', 5, NULL, NULL),
(11, '19', 5, NULL, NULL),
(12, '25', 5, NULL, NULL),
(13, '26', 5, NULL, NULL),
(14, 'low', 6, NULL, NULL),
(15, 'high', 6, NULL, NULL),
(16, 'medium', 6, NULL, NULL),
(17, 'yes', 7, NULL, NULL),
(18, 'No', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `seller_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Tata', '2022-03-25 04:23:46', NULL),
(2, 0, 'Bmw', '2022-03-25 04:23:46', NULL),
(3, 0, 'jaguar', '2022-03-25 04:23:46', NULL),
(5, 0, 'Hondai', '2022-03-25 04:23:46', NULL),
(6, 0, 'Rolls-Royce', '2022-03-25 04:23:46', NULL),
(8, 0, 'mercedes', '2022-03-25 04:23:46', NULL),
(9, 0, 'nitin rohilla', '2022-03-25 04:23:46', NULL),
(10, 0, 'jaguar', '2022-03-25 04:23:46', NULL),
(11, 0, 'new one', '2022-03-25 04:23:46', NULL),
(12, 0, 'asdsad', '2022-03-25 04:23:46', NULL),
(14, 3, 'seller brand', '2022-03-25 04:31:13', '2022-03-25 04:31:13'),
(15, 5, 'seller brand 1', '2022-03-27 05:21:54', '2022-03-27 05:21:54'),
(16, 5, 'seller brand 2', '2022-03-27 05:22:01', '2022-03-27 05:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `variant_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `user_id`, `product_id`, `quantity`, `variant_id`) VALUES
(1, '2022-03-07 04:43:09', '2022-03-07 04:43:09', 1, 1, 1, NULL),
(2, '2022-03-08 03:23:25', '2022-03-08 03:23:25', 3, 5, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_id` bigint(20) NOT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `main_id`, `seller_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vechile', 123123, 0, 'publish', NULL, NULL),
(3, 'racing', 1234, 0, 'publish', NULL, NULL),
(4, 'sports', 12345, 0, 'publish', NULL, NULL),
(5, 'low budget', 123456, 0, 'publish', NULL, NULL),
(6, 'luxary', 2222, 0, 'publish', NULL, NULL),
(7, 'seller category', 12345, 3, 'publish', NULL, NULL),
(8, 'second seller', 1234, 3, 'publish', NULL, NULL),
(9, 'dancing', 123456, 5, 'publish', NULL, NULL),
(10, 'singing', 12345, 5, 'publish', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `seller_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'red', '2022-03-07 03:44:13', '2022-03-07 03:44:13'),
(2, 0, 'red', '2022-03-07 03:44:14', '2022-03-07 03:44:14'),
(3, 0, 'blue', '2022-03-07 03:44:21', '2022-03-07 03:44:21'),
(4, 3, 'seller color ok', '2022-03-25 11:26:41', '2022-03-25 11:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `location`) VALUES
(2, 'hondia.jfif', 'image1646727076_hondia.jpg'),
(3, 'jaguar.jfif', 'image1646727077_jaguar.jpg'),
(5, 'mercedes2.jfif', 'image1646727078_mercedes2.jpg'),
(6, 'mercedes.jfif', 'image1646727082_mercedes.jpg'),
(7, 'mecedes.jfif', 'image1646727085_mecedes.jpg'),
(8, 'jaguar-removebg-preview.png', 'image1646728297_jaguar-removebg-preview.png'),
(9, 'bmw-removebg-preview.png', 'image1646728535_bmw-removebg-preview.png'),
(10, 'cycle-removebg-preview.png', 'image1646808918_cycle-removebg-preview.png'),
(11, 'bukl-removebg-preview.png', 'image1646808921_bukl-removebg-preview.png'),
(12, 'advancw-removebg-preview.png', 'image1646808924_advancw-removebg-preview.png'),
(13, 'bukl-removebg-preview.png', 'image1646808946_bukl-removebg-preview.png'),
(14, 'advancw-removebg-preview (1).png', 'image1646809036_advancw-removebg-preview (1).png'),
(15, 'ktm-removebg-preview.png', 'image1646809038_ktm-removebg-preview.png'),
(16, 'pulsur-removebg-preview.png', 'image1646809040_pulsur-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `image_tables`
--

CREATE TABLE `image_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `use_id` int(10) UNSIGNED NOT NULL,
  `use_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_tables`
--

INSERT INTO `image_tables` (`id`, `created_at`, `updated_at`, `image_id`, `use_id`, `use_type`, `url`) VALUES
(1, '2022-03-07 03:51:57', '2022-03-07 03:51:57', NULL, 1, 'product_video', 'google.com'),
(11, '2022-03-08 02:51:59', '2022-03-08 02:51:59', NULL, 2, 'product_video', 'google.com'),
(12, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 7, 2, 'Additional_product_images', NULL),
(13, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 6, 2, 'Additional_product_images', NULL),
(14, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 6, 2, 'Main_product_image', NULL),
(15, '2022-03-08 02:59:53', '2022-03-08 02:59:53', NULL, 3, 'product_video', 'google.com'),
(18, '2022-03-08 03:03:41', '2022-03-08 03:03:41', NULL, 4, 'product_video', 'google.com'),
(19, '2022-03-08 03:03:41', '2022-03-08 03:03:41', 8, 4, 'Additional_product_images', NULL),
(20, '2022-03-08 03:03:41', '2022-03-08 03:03:41', 8, 4, 'Main_product_image', NULL),
(21, '2022-03-08 03:07:48', '2022-03-08 03:07:48', NULL, 5, 'product_video', 'google.com'),
(22, '2022-03-08 03:07:48', '2022-03-08 03:07:48', 9, 5, 'Additional_product_images', NULL),
(23, '2022-03-08 03:07:48', '2022-03-08 03:07:48', 9, 5, 'Main_product_image', NULL),
(24, '2022-03-09 01:30:45', '2022-03-09 01:30:45', 11, 6, 'Additional_product_images', NULL),
(25, '2022-03-09 01:30:45', '2022-03-09 01:30:45', 11, 6, 'Main_product_image', NULL),
(26, '2022-03-09 01:34:58', '2022-03-09 01:34:58', 10, 7, 'Additional_product_images', NULL),
(27, '2022-03-09 01:34:58', '2022-03-09 01:34:58', 14, 7, 'Main_product_image', NULL),
(28, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 8, 8, 'Additional_product_images', NULL),
(29, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 10, 8, 'Additional_product_images', NULL),
(30, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 9, 8, 'Additional_product_images', NULL),
(31, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 11, 8, 'Additional_product_images', NULL),
(32, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 2, 8, 'Main_product_image', NULL),
(33, '2022-03-10 05:38:02', '2022-03-10 05:38:02', 13, 9, 'Additional_product_images', NULL),
(34, '2022-03-10 05:38:02', '2022-03-10 05:38:02', 14, 9, 'Additional_product_images', NULL),
(35, '2022-03-10 05:38:02', '2022-03-10 05:38:02', 15, 9, 'Additional_product_images', NULL),
(36, '2022-03-10 05:38:02', '2022-03-10 05:38:02', 15, 9, 'Main_product_image', NULL),
(37, '2022-03-11 00:31:58', '2022-03-11 00:31:58', 9, 10, 'Additional_product_images', NULL),
(38, '2022-03-11 00:31:58', '2022-03-11 00:31:58', 8, 10, 'Additional_product_images', NULL),
(39, '2022-03-11 00:31:58', '2022-03-11 00:31:58', 2, 10, 'Main_product_image', NULL),
(40, '2022-03-11 05:06:46', '2022-03-11 05:06:46', 9, 11, 'Additional_product_images', NULL),
(41, '2022-03-11 05:06:46', '2022-03-11 05:06:46', 10, 11, 'Additional_product_images', NULL),
(42, '2022-03-11 05:06:46', '2022-03-11 05:06:46', 2, 11, 'Main_product_image', NULL),
(43, '2022-03-11 05:41:21', '2022-03-11 05:41:21', 9, 12, 'Additional_product_images', NULL),
(44, '2022-03-11 05:41:21', '2022-03-11 05:41:21', 10, 12, 'Additional_product_images', NULL),
(45, '2022-03-11 05:41:21', '2022-03-11 05:41:21', 2, 12, 'Main_product_image', NULL),
(46, '2022-03-11 05:43:06', '2022-03-11 05:43:06', 9, 13, 'Additional_product_images', NULL),
(47, '2022-03-11 05:43:06', '2022-03-11 05:43:06', 10, 13, 'Additional_product_images', NULL),
(48, '2022-03-11 05:43:06', '2022-03-11 05:43:06', 2, 13, 'Main_product_image', NULL),
(49, '2022-03-11 05:52:39', '2022-03-11 05:52:39', 10, 14, 'Additional_product_images', NULL),
(50, '2022-03-11 05:52:39', '2022-03-11 05:52:39', 11, 14, 'Additional_product_images', NULL),
(51, '2022-03-11 05:52:39', '2022-03-11 05:52:39', 11, 14, 'Main_product_image', NULL),
(52, '2022-03-12 03:34:56', '2022-03-12 03:34:56', 9, 15, 'Additional_product_images', NULL),
(53, '2022-03-12 03:34:56', '2022-03-12 03:34:56', 10, 15, 'Additional_product_images', NULL),
(54, '2022-03-12 03:34:56', '2022-03-12 03:34:56', 2, 15, 'Main_product_image', NULL),
(55, '2022-03-24 06:58:15', '2022-03-24 06:58:15', 9, 16, 'Additional_product_images', NULL),
(56, '2022-03-24 06:58:15', '2022-03-24 06:58:15', 10, 16, 'Additional_product_images', NULL),
(57, '2022-03-24 06:58:15', '2022-03-24 06:58:15', 11, 16, 'Additional_product_images', NULL),
(58, '2022-03-24 06:58:15', '2022-03-24 06:58:15', 2, 16, 'Main_product_image', NULL),
(59, '2022-03-26 04:39:32', '2022-03-26 04:39:32', 9, 17, 'Additional_product_images', NULL),
(60, '2022-03-26 04:39:32', '2022-03-26 04:39:32', 2, 17, 'Main_product_image', NULL),
(61, '2022-03-26 23:47:42', '2022-03-26 23:47:42', NULL, 18, 'product_video', 'dfs'),
(62, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 3, 18, 'Additional_product_images', NULL),
(63, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 10, 18, 'Additional_product_images', NULL),
(64, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 12, 18, 'Additional_product_images', NULL),
(65, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 5, 18, 'Main_product_image', NULL),
(66, '2022-03-26 23:54:07', '2022-03-26 23:54:07', 6, 19, 'Additional_product_images', NULL),
(67, '2022-03-26 23:54:07', '2022-03-26 23:54:07', 5, 19, 'Additional_product_images', NULL),
(68, '2022-03-26 23:54:07', '2022-03-26 23:54:07', 5, 19, 'Main_product_image', NULL),
(69, '2022-03-27 00:40:20', '2022-03-27 00:40:20', NULL, 20, 'product_video', 'fdsf'),
(70, '2022-03-27 00:40:20', '2022-03-27 00:40:20', 6, 20, 'Additional_product_images', NULL),
(71, '2022-03-27 00:40:20', '2022-03-27 00:40:20', 5, 20, 'Additional_product_images', NULL),
(72, '2022-03-27 00:40:20', '2022-03-27 00:40:20', 5, 20, 'Main_product_image', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_titel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `meta_titel`, `description`, `created_at`, `updated_at`) VALUES
(1, 'car , bmw', '...dsfsd', '2022-03-07 03:51:57', '2022-03-07 03:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2021_12_06_113615_create_admins_table', 1),
(28, '2021_12_07_105851_create_galleries_table', 1),
(29, '2021_12_09_102443_create_staff_table', 1),
(30, '2021_12_09_130426_create_attributes_table', 1),
(31, '2021_12_10_083656_create_categories_table', 1),
(32, '2021_12_11_060240_create_brands_table', 1),
(33, '2021_12_13_062440_create_attribute_values_table', 1),
(34, '2021_12_20_042738_create_products_table', 1),
(35, '2021_12_20_043029_create_metas_table', 1),
(36, '2021_12_20_054327_create_variations_table', 1),
(37, '2021_12_20_065653_create_image_tables_table', 1),
(38, '2021_12_30_035838_create_colors_table', 1),
(39, '2022_01_10_045113_create_tags_table', 1),
(40, '2022_01_24_142927_create_blogs_table', 1),
(41, '2022_01_27_182919_create_addresses_table', 1),
(42, '2022_02_03_105539_create_orders_table', 1),
(43, '2022_02_03_202641_create_orderdetails_table', 1),
(44, '2022_02_05_044157_create_carts_table', 1),
(45, '2022_03_22_081806_create_wishlists_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `variant_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, '2022-03-08 00:34:50', '2022-03-08 00:34:50'),
(2, 2, 1, NULL, 1, '2022-03-08 00:35:08', '2022-03-08 00:35:08'),
(3, 3, 3, NULL, 1, '2022-03-11 02:45:08', '2022-03-11 02:45:08'),
(4, 2, 1, 14, 3, '2022-03-03 12:18:56', NULL),
(5, 1, 6, 16, 3, '2022-03-10 12:19:04', NULL),
(6, 3, 6, 16, 3, '2022-03-02 12:40:25', '2022-03-04 12:40:25'),
(7, 3, 17, 17, 3, '2022-03-04 11:18:53', '2022-03-09 11:18:53'),
(8, 1, 17, 25, 3, '2022-03-04 11:18:53', '2022-03-04 11:18:53'),
(9, 3, 16, 15, 3, '2022-03-04 11:18:53', '2022-03-04 11:18:53'),
(10, 1, 6, 15, 3, '2022-03-04 11:18:53', '2022-03-04 11:18:53'),
(11, 4, 15, NULL, 1, '2022-03-26 11:13:30', '2022-03-26 11:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razorpay_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `method`, `razorpay_payment_id`, `razorpay_signature`, `amount`, `address_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'order_J4UPK4neneUFE3', 3, NULL, NULL, NULL, 787.00, 1, 'created', '2022-03-08 00:34:50', '2022-03-08 00:34:50'),
(2, 'order_J4UPdfG2OAsGV1', 3, 'PAYONLINE', 'pay_J4UPxms2HkIyPC', 'edef94f20979869d0227cee92d6f2f735c925e43482506efcffc536394be5da8', 787.00, 1, 'paid', '2022-03-08 00:35:08', '2022-03-08 00:35:38'),
(3, 'order_J5iEIhfwTTml6n', 1, NULL, NULL, NULL, 89000.90, 2, 'created', '2022-03-11 02:45:08', '2022-03-11 02:45:08'),
(4, 'order_JBmu6muTEsrTRM', 1, NULL, NULL, NULL, 87.00, 2, 'created', '2022-03-26 11:13:30', '2022-03-26 11:13:30');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cat_id`, `brand_id`, `seller_id`, `price`, `description`, `status`, `pdf`, `unit_type`, `sku`, `barcode`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'amit', 1, 1, 0, 787.00, '<p>description here</p>', 'deleted', NULL, NULL, '4545', '3434', 20, '2022-03-07 03:51:57', '2022-03-08 02:56:50'),
(2, 'med-32', 3, 8, 0, 89000.90, '<p>its osm car ever , indians number one choise</p>', 'published', NULL, NULL, '4545', '12431213', 34, '2022-03-08 02:51:59', '2022-03-08 02:51:59'),
(3, 'bmw-34', 5, NULL, 0, 68000.00, '<p>low price budget car</p>', 'published', NULL, NULL, '4545', '12431', 23, '2022-03-08 02:59:53', '2022-03-08 02:59:53'),
(4, 'jaguar', 4, 3, 0, 28787.00, '<p>tis osm</p>', 'published', NULL, NULL, '34', '3434', 30, '2022-03-08 03:03:41', '2022-03-08 03:03:41'),
(5, 'bmw-34', 3, 2, 0, 300000.00, '<p>fdsafdsaf</p>', 'published', NULL, NULL, '34', '12431213', 34, '2022-03-08 03:07:48', '2022-03-08 03:07:48'),
(6, 'bullet', 4, 2, 0, 987.00, '<p>kjhkjh</p>', 'published', NULL, NULL, NULL, 'sfdsaf', 56, '2022-03-09 01:30:45', '2022-03-09 01:30:45'),
(7, 'cycle', 1, 3, 0, 45.00, '<p>dfdsfdsf</p>', 'published', NULL, NULL, NULL, 'fdsf', 34, '2022-03-09 01:34:58', '2022-03-09 01:34:58'),
(8, 'dhoom', 3, 2, 0, 87.00, '<p>hjhjh</p>', 'published', NULL, NULL, NULL, 'dfde', 78, '2022-03-10 05:33:10', '2022-03-10 05:33:10'),
(9, 'pushpa', 5, 6, 0, 87.00, '<p>klkjkj</p>', 'published', NULL, NULL, '34', 'kkk', 656, '2022-03-10 05:38:02', '2022-03-10 05:38:02'),
(10, 'new product', 3, 2, 0, 43434.00, '<p>rerwer</p>', 'published', NULL, NULL, '434', 'jkjl', 34, '2022-03-11 00:31:58', '2022-03-11 00:31:58'),
(11, 'testing varients', 5, 6, 0, 454.00, '<p>fdsfsaf</p>', 'published', NULL, NULL, '4545', 'sfsd', 34, '2022-03-11 05:06:46', '2022-03-11 05:06:46'),
(12, 'dd', 1, 2, 0, 3434.00, '<p>fdsfsdf</p>', 'published', NULL, NULL, '4545', 'fsdfds', 343, '2022-03-11 05:41:21', '2022-03-11 05:41:21'),
(13, 'nitin rohilla', 1, 1, 0, 343.00, '<p>fdfdsafds</p>', 'published', NULL, NULL, '4545', 'sdfdsf', 43, '2022-03-11 05:43:06', '2022-03-11 05:43:06'),
(14, 'nitin rohilla', 4, 3, 0, 545.00, '<p>fadfs</p>', 'published', NULL, NULL, '4545', 'tretre', 344, '2022-03-11 05:52:39', '2022-03-11 05:52:39'),
(15, 'cool', 4, 3, 5, 89.00, '<p>jkjkj</p>', 'published', NULL, NULL, NULL, '12431213', 56, '2022-03-12 03:34:56', '2022-03-12 03:34:56'),
(16, 'product by seller', 8, 3, 3, 43434.00, '<p>eweweweda</p>', 'published', NULL, NULL, '2323', 'dfsf', 2, '2022-03-24 06:58:14', '2022-03-24 06:58:14'),
(17, 'product by seller', 7, 14, 3, 343.00, '<p>description for seller product</p>', 'published', NULL, NULL, '343', 'fdsfsd', 23, '2022-03-26 04:39:32', '2022-03-26 04:39:32'),
(18, 'new product by seller', 8, NULL, 5, 32.00, '<p>sdfsdfs</p>', 'published', NULL, NULL, '34', 'fdsf', 3, '2022-03-26 23:47:42', '2022-03-26 23:47:42'),
(19, 'piano', 10, 15, 5, 52.00, '<p>dfssd</p>', 'published', NULL, NULL, '2323', 'fsdf', 6, '2022-03-26 23:54:07', '2022-03-26 23:54:07'),
(20, 'luxary product', 6, 16, 0, 23.00, '<p>fsdfsf</p>', 'published', NULL, NULL, 'fsf', 'fdsf', 4234, '2022-03-27 00:40:19', '2022-03-27 00:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `name`, `product_id`) VALUES
(4, '2022-03-07 04:04:07', '2022-03-07 04:04:07', 'fgfsdgf', 1),
(5, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 'best racing car ever', 2),
(6, '2022-03-08 02:59:53', '2022-03-08 02:59:53', 'low budget', 3),
(7, '2022-03-08 03:03:41', '2022-03-08 03:03:41', 'nothing', 4),
(8, '2022-03-08 03:07:48', '2022-03-08 03:07:48', 'www', 5),
(9, '2022-03-09 01:30:45', '2022-03-09 01:30:45', 'dsafsa', 6),
(10, '2022-03-09 01:34:58', '2022-03-09 01:34:58', 'fdsf', 7),
(11, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 'kjkj', 8),
(12, '2022-03-10 05:38:02', '2022-03-10 05:38:02', 'jkjk', 9),
(13, '2022-03-11 00:31:58', '2022-03-11 00:31:58', 'wewr', 10),
(14, '2022-03-11 05:06:46', '2022-03-11 05:06:46', 'fdf', 11),
(15, '2022-03-11 05:41:21', '2022-03-11 05:41:21', 'fdsfsd', 12),
(16, '2022-03-11 05:43:06', '2022-03-11 05:43:06', 'fsdfs', 13),
(17, '2022-03-11 05:52:39', '2022-03-11 05:52:39', 'gffdg', 14),
(18, '2022-03-12 03:34:56', '2022-03-12 03:34:56', 'jkj', 15),
(19, '2022-03-24 06:58:15', '2022-03-24 06:58:15', 'rerer', 16),
(20, '2022-03-26 04:39:32', '2022-03-26 04:39:32', '', 17),
(21, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 'dfsd', 18),
(22, '2022-03-26 23:54:07', '2022-03-26 23:54:07', 'dsfs', 19),
(23, '2022-03-27 00:40:20', '2022-03-27 00:40:20', 'dsfsd', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'niti', 'nitinrohilla515@gmail.com', NULL, '$2y$10$GWasQu24RgKrq5VHMMuEmOTHrVWOO1lx99wnSvA0.o/myKNtv4d5.', NULL, '2022-03-07 01:18:48', '2022-03-07 01:18:48'),
(2, 'amit', 'nitinrohillla515@gmail.com', NULL, '$2y$10$7BoE6.qmHzeile1AUsGXbefS6nXXoSD1ofRTW7KMYYYNeDjM5/nqq', NULL, '2022-03-07 01:19:28', '2022-03-07 01:19:28'),
(3, 'nitin rohilla', 'rohillaking148@gmail.com', NULL, '$2y$10$aXfDg1/6kCpY.gaKgMTR4et/bfEx666hkS0Bv5gH3K6wLAi7HhZJe', NULL, '2022-03-07 23:36:52', '2022-03-07 23:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `created_at`, `updated_at`, `name`, `price`, `sku`, `quantity`, `product_id`, `color`, `image_id`) VALUES
(4, '2022-03-07 04:04:07', '2022-03-07 04:04:07', 'red-4', 100.00, NULL, 0, 1, NULL, NULL),
(5, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 'red-25-low-yes', 80.00, NULL, 0, 2, NULL, NULL),
(6, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 'blue-25-low-yes', 87.00, NULL, 0, 2, NULL, NULL),
(7, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 'red-25-high-yes', 98.00, NULL, 0, 2, NULL, NULL),
(8, '2022-03-08 02:51:59', '2022-03-08 02:51:59', 'blue-25-high-yes', 76.00, NULL, 0, 2, NULL, NULL),
(9, '2022-03-08 02:59:53', '2022-03-08 02:59:53', 'red-low-yes', 67.00, NULL, 0, 3, 'red', NULL),
(10, '2022-03-08 03:03:41', '2022-03-08 03:03:41', 'red-low', 2.40, NULL, 0, 4, NULL, NULL),
(11, '2022-03-08 03:07:48', '2022-03-08 03:07:48', 'red-yes', 45.00, NULL, 0, 5, NULL, NULL),
(12, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 'red-280', 676.00, NULL, 0, 8, 'blue', NULL),
(13, '2022-03-10 05:33:10', '2022-03-10 05:33:10', 'blue-280', 676.00, NULL, 0, 8, 'red', NULL),
(14, '2022-03-10 05:38:02', '2022-03-10 05:38:02', '1-4', 878.00, NULL, 0, 9, 'blue', NULL),
(15, '2022-03-10 05:38:02', '2022-03-10 05:38:02', '3-4', 7878.00, NULL, 0, 9, NULL, NULL),
(16, '2022-03-11 00:31:58', '2022-03-11 00:31:58', '1-280', 4343.00, NULL, 0, 10, NULL, NULL),
(17, '2022-03-11 00:31:58', '2022-03-11 00:31:58', '3-280', 3434.00, NULL, 0, 10, NULL, NULL),
(18, '2022-03-11 05:06:46', '2022-03-11 05:06:46', 'red-280-23', 4343.00, NULL, 0, 11, NULL, NULL),
(19, '2022-03-11 05:06:46', '2022-03-11 05:06:46', 'blue-280-23', 343.00, NULL, 0, 11, NULL, NULL),
(20, '2022-03-11 05:52:39', '2022-03-11 05:52:39', 'red-23', 5443.00, NULL, 0, 14, 'red', NULL),
(21, '2022-03-11 05:52:39', '2022-03-11 05:52:39', 'blue-23', 345.00, NULL, 0, 14, 'blue', NULL),
(22, '2022-03-12 03:34:56', '2022-03-12 03:34:56', 'red-280', 787.00, NULL, 0, 15, 'red', NULL),
(23, '2022-03-12 03:34:56', '2022-03-12 03:34:56', 'blue-280', 7678.00, NULL, 0, 15, 'blue', NULL),
(24, '2022-03-24 06:58:15', '2022-03-24 06:58:15', '1-190', 323.00, NULL, 0, 16, '1', NULL),
(25, '2022-03-24 06:58:15', '2022-03-24 06:58:15', '3-190', 2323.00, NULL, 0, 16, '3', NULL),
(26, '2022-03-26 04:39:32', '2022-03-26 04:39:32', '1-300', 335.00, NULL, 0, 17, '1', NULL),
(27, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 'red', 323.00, NULL, 0, 18, 'red', NULL),
(28, '2022-03-26 23:47:42', '2022-03-26 23:47:42', 'seller color ok', 32.00, NULL, 0, 18, 'seller color ok', NULL),
(29, '2022-03-26 23:54:07', '2022-03-26 23:54:07', 'seller color ok-23', 65565.00, NULL, 0, 19, 'seller color ok', NULL),
(30, '2022-03-26 23:54:07', '2022-03-26 23:54:07', 'seller color ok-280', 565.00, NULL, 0, 19, NULL, NULL),
(31, '2022-03-27 00:40:20', '2022-03-27 00:40:20', 'red', 32423.00, NULL, 0, 20, 'red', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(73, 2, 1, '2022-03-23 02:55:02', '2022-03-23 02:55:02'),
(74, 11, 1, '2022-03-23 03:00:41', '2022-03-23 03:00:41'),
(76, 4, 1, '2022-03-23 03:06:01', '2022-03-23 03:06:01'),
(77, 8, 1, '2022-03-23 03:07:25', '2022-03-23 03:07:25'),
(79, 15, 1, '2022-03-23 03:09:03', '2022-03-23 03:09:03'),
(81, 13, 1, '2022-03-23 03:22:17', '2022-03-23 03:22:17'),
(83, 14, 1, '2022-03-23 03:25:32', '2022-03-23 03:25:32'),
(84, 6, 1, '2022-03-23 03:25:37', '2022-03-23 03:25:37'),
(85, 5, 1, '2022-03-23 03:25:41', '2022-03-23 03:25:41'),
(87, 7, 1, '2022-03-23 05:35:16', '2022-03-23 05:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attributes_id_foreign` (`attributes_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_tables`
--
ALTER TABLE `image_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_tables_image_id_foreign` (`image_id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_order_id_foreign` (`order_id`),
  ADD KEY `orderdetails_product_id_foreign` (`product_id`),
  ADD KEY `orderdetails_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`),
  ADD UNIQUE KEY `staff_phone_unique` (`phone`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_product_id_foreign` (`product_id`),
  ADD KEY `variations_image_id_foreign` (`image_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `image_tables`
--
ALTER TABLE `image_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attributes_id_foreign` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_tables`
--
ALTER TABLE `image_tables`
  ADD CONSTRAINT `image_tables_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variations`
--
ALTER TABLE `variations`
  ADD CONSTRAINT `variations_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
