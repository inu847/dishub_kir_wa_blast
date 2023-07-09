-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2023 at 12:41 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishub_kir`
--

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
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_reminder` int NOT NULL,
  `api_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_send` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_reminder` int NOT NULL,
  `price_per_send` int NOT NULL,
  `image_sender` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_key` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `type`, `first_reminder`, `api_wa`, `message_send`, `created_at`, `updated_at`, `last_reminder`, `price_per_send`, `image_sender`, `device_key`, `filename`) VALUES
(1, 'wa', 10, 'x1qqlCcUGUXAZdIlNUr06TicZBXuTdPf', 'nama = _name_ \r\nno lisensi = _no_license_\r\nno stuck = _no_stuck_ \r\nphone = _phone_\r\nexp date = _exp_date_', NULL, '2023-03-07 22:04:18', 3, 500, NULL, 'hbm197', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kirs`
--

CREATE TABLE `kirs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_stuck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reminder_count` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exp_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kirs`
--

INSERT INTO `kirs` (`id`, `name`, `no_license`, `no_stuck`, `phone`, `reminder_count`, `created_at`, `updated_at`, `exp_date`) VALUES
(1, 'adi', 'B 8237 SS', '2131524123', '+6285730004337', 81, '2023-02-18 00:33:15', '2023-03-07 18:45:58', '2023-02-26'),
(2, 'verel', 'AG 8237 DS', '123123213', '+6282229200791', 4, '2023-02-18 00:53:45', '2023-02-18 09:05:18', '2023-03-31'),
(3, 'lllll', 'AG 4412 SS', '096298349864501', '628623751762536712', 2, '2023-02-21 10:32:08', '2023-02-21 10:45:08', '2023-05-31');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint UNSIGNED NOT NULL,
  `kir_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `send_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `kir_id`, `user_id`, `send_at`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 0, '2', NULL, '2023-02-18 03:26:01', '2023-02-18 03:26:01'),
(2, 2, 0, '3', NULL, '2023-02-18 03:26:01', '2023-02-18 03:26:01'),
(3, 1, 0, '4', NULL, '2023-02-18 03:26:01', '2023-02-18 03:26:01'),
(4, 1, 0, '5', NULL, '2023-02-18 03:44:22', '2023-02-18 03:44:22'),
(5, 1, 0, '6', NULL, '2023-02-18 03:46:35', '2023-02-18 03:46:35'),
(6, 1, 0, '7', NULL, '2023-02-18 03:48:06', '2023-02-18 03:48:06'),
(7, 1, 0, '8', 'kir kurang beberapa hari mohon segera melakukan kir', '2023-02-18 03:48:53', '2023-02-18 03:48:53'),
(8, 1, 1, '9', NULL, '2023-02-18 04:00:11', '2023-02-18 04:00:11'),
(9, 1, 1, '10', NULL, '2023-02-18 04:00:33', '2023-02-18 04:00:33'),
(10, 1, 1, '11', 'kir kurang beberapa hari mohon segera melakukan kir', '2023-02-18 04:07:34', '2023-02-18 04:07:34'),
(11, 1, 0, '12', 'kir kurang beberapa hari mohon segera melakukan kir', '2023-02-18 04:08:41', '2023-02-18 04:08:41'),
(12, 1, 1, '13', 'kir kurang beberapa hari mohon segera melakukan kir', '2023-02-18 08:56:48', '2023-02-18 08:56:48'),
(13, 2, 1, '4', 'kir kurang beberapa hari mohon segera melakukan kir', '2023-02-18 09:05:18', '2023-02-18 09:05:18'),
(14, 1, 1, '14', 'kir kurang beberapa hari mohon segera melakukan kir', '2023-02-18 09:05:51', '2023-02-18 09:05:51'),
(15, 1, 1, '15', 'kir kurang beberapa hari mohon segera melakukan kir\r\n\r\nnama = _name_\r\nno lisensi = _no_license_\r\nno stuck = _no_stuck_\r\nphone = _phone_\r\nexp date = _exp_date_', '2023-02-18 22:23:21', '2023-02-18 22:23:21'),
(16, 1, 1, '16', 'kir kurang beberapa hari mohon segera melakukan kir\r\n\r\nnama = _name_\r\nno lisensi = _no_license_\r\nno stuck = _no_stuck_\r\nphone = _phone_\r\nexp date = _exp_date_', '2023-02-18 22:23:52', '2023-02-18 22:23:52'),
(17, 1, 1, '17', 'kir kurang beberapa hari mohon segera melakukan kir\r\n\r\nnama = _name_\r\nno lisensi = _no_license_\r\nno stuck = _no_stuck_\r\nphone = _phone_\r\nexp date = _exp_date_', '2023-02-18 22:25:43', '2023-02-18 22:25:43'),
(18, 1, 1, '18', 'kir kurang beberapa hari mohon segera melakukan kir\r\n\r\nnama = _name_\r\nno lisensi = _no_license_\r\nno stuck = _no_stuck_\r\nphone = _phone_\r\nexp date = _exp_date_', '2023-02-18 22:26:19', '2023-02-18 22:26:19'),
(19, 1, 1, '19', 'kir kurang beberapa hari mohon segera melakukan kir\r \\n \\n nama = _name_\r\\n no lisensi = _no_license_\r\\n no stuck = _no_stuck_\r\\n phone = _phone_\r\\n exp date = _exp_date_', '2023-02-18 22:27:54', '2023-02-18 22:27:54'),
(20, 1, 1, '20', 'nama = _name_ , no lisensi = _no_license_, no stuck = _no_stuck_ , phone = _phone_ , exp date = _exp_date_', '2023-02-18 22:28:51', '2023-02-18 22:28:51'),
(21, 1, 1, '21', 'nama = _name_ , no lisensi = _no_license_, no stuck = _no_stuck_ , phone = _phone_ , exp date = _exp_date_', '2023-02-18 22:30:19', '2023-02-18 22:30:19'),
(22, 1, 1, '22', 'nama = adi , no lisensi = B 8237 SS, no stuck = 2131524123 , phone = +6285730004337 , exp date = 2023-02-26', '2023-02-18 22:35:32', '2023-02-18 22:35:32'),
(23, 1, 1, '23', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-02-18 22:36:16', '2023-02-18 22:36:16'),
(24, 1, 1, '24', '\"nama = adi \\r\\nno lisensi = B 8237 SS\\r\\nno stuck = 2131524123 \\r\\nphone = +6285730004337\\r\\nexp date = 2023-02-26\"', '2023-02-18 22:38:15', '2023-02-18 22:38:15'),
(25, 1, 1, '25', '\"nama = adi \\r\\nno lisensi = B 8237 SS\\r\\nno stuck = 2131524123 \\r\\nphone = +6285730004337\\r\\nexp date = 2023-02-26\"', '2023-02-18 22:39:39', '2023-02-18 22:39:39'),
(26, 1, 1, '26', '\"nama = adi  %0a no lisensi = B 8237 SS %0a no stuck = 2131524123  %0a phone = +6285730004337 %0a exp date = 2023-02-26\"', '2023-02-18 22:43:07', '2023-02-18 22:43:07'),
(27, 1, 1, '27', '\"nama = adi %0ano lisensi = B 8237 SS%0ano stuck = 2131524123 %0aphone = +6285730004337%0aexp date = 2023-02-26\"', '2023-02-18 22:44:31', '2023-02-18 22:44:31'),
(28, 1, 1, '28', '\"nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26\"', '2023-02-18 22:47:18', '2023-02-18 22:47:18'),
(29, 1, 1, '29', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-02-18 22:50:09', '2023-02-18 22:50:09'),
(30, 1, 1, '30', 'nama = adi %0ano lisensi = B 8237 SS%0ano stuck = 2131524123 %0aphone = +6285730004337%0aexp date = 2023-02-26', '2023-02-18 22:50:26', '2023-02-18 22:50:26'),
(31, 1, 1, '31', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-02-18 22:50:45', '2023-02-18 22:50:45'),
(32, 1, 1, '32', 'nama = adi %0a %0aMno lisensi = B 8237 SS%0a %0aMno stuck = 2131524123 %0a %0aMphone = +6285730004337%0a %0aMexp date = 2023-02-26', '2023-02-18 22:52:21', '2023-02-18 22:52:21'),
(33, 1, 1, '33', 'nama = adi \nno lisensi = B 8237 SS\nno stuck = 2131524123 \nphone = +6285730004337\nexp date = 2023-02-26', '2023-02-18 22:52:43', '2023-02-18 22:52:43'),
(34, 1, 1, '34', NULL, '2023-02-18 22:53:30', '2023-02-18 22:53:30'),
(35, 1, 1, '35', '\"nama = adi \"\\n\"no lisensi = B 8237 SS\"\\n\"no stuck = 2131524123 \"\\n\"phone = +6285730004337\"\\n\"exp date = 2023-02-26\"', '2023-02-18 22:54:45', '2023-02-18 22:54:45'),
(36, 1, 1, '36', '\"nama = adi \\r\\nno lisensi = B 8237 SS\\r\\nno stuck = 2131524123 \\r\\nphone = +6285730004337\\r\\nexp date = 2023-02-26\"', '2023-02-18 22:56:49', '2023-02-18 22:56:49'),
(37, 1, 1, '37', '\"nama = adi %0ano lisensi = B 8237 SS%0ano stuck = 2131524123 %0aphone = +6285730004337%0aexp date = 2023-02-26\"', '2023-02-18 22:57:27', '2023-02-18 22:57:27'),
(38, 1, 1, '38', 'nama = adi %0ano lisensi = B 8237 SS%0ano stuck = 2131524123 %0aphone = +6285730004337%0aexp date = 2023-02-26', '2023-02-18 22:57:39', '2023-02-18 22:57:39'),
(39, 1, 1, '39', NULL, '2023-02-18 22:58:00', '2023-02-18 22:58:00'),
(40, 1, 1, '40', 'nama = adi &#13;no lisensi = B 8237 SS&#13;no stuck = 2131524123 &#13;phone = +6285730004337&#13;exp date = 2023-02-26', '2023-02-18 22:58:32', '2023-02-18 22:58:32'),
(41, 1, 1, '41', 'nama = adi \nno lisensi = B 8237 SS\nno stuck = 2131524123 \nphone = +6285730004337\nexp date = 2023-02-26', '2023-02-18 22:59:34', '2023-02-18 22:59:34'),
(42, 1, 1, '42', 'nama = adi &#13; no lisensi = B 8237 SS&#13; no stuck = 2131524123 &#13; phone = +6285730004337&#13; exp date = 2023-02-26', '2023-02-18 23:03:04', '2023-02-18 23:03:04'),
(43, 3, 1, '1', 'nama = lllll ,no lisensi = AG 4412 SS,no stuck = 096298349864501 ,phone = 628623751762536712,exp date = 2023-05-31', '2023-02-21 10:32:13', '2023-02-21 10:32:13'),
(44, 3, 1, '2', 'nama = lllll ,no lisensi = AG 4412 SS,no stuck = 096298349864501 ,phone = 628623751762536712,exp date = 2023-05-31', '2023-02-21 10:45:08', '2023-02-21 10:45:08'),
(45, 1, 1, '43', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-02-21 10:45:16', '2023-02-21 10:45:16'),
(46, 1, 1, '44', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-02-21 10:46:47', '2023-02-21 10:46:47'),
(47, 1, 1, '45', 'nama = adi \nno lisensi = B 8237 SS\nno stuck = 2131524123 \nphone = +6285730004337\nexp date = 2023-02-26', '2023-03-06 21:52:02', '2023-03-06 21:52:02'),
(48, 1, 1, '46', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-03-06 21:52:13', '2023-03-06 21:52:13'),
(49, 1, 1, '47', 'nama = adi \nno lisensi = B 8237 SS\nno stuck = 2131524123 \nphone = +6285730004337\nexp date = 2023-02-26', '2023-03-06 21:55:36', '2023-03-06 21:55:36'),
(50, 1, 1, '48', 'nama = adi <br>no lisensi = B 8237 SS<br>no stuck = 2131524123 <br>phone = +6285730004337<br>exp date = 2023-02-26', '2023-03-06 21:56:32', '2023-03-06 21:56:32'),
(51, 1, 1, '49', '\"nama = adi \\nno lisensi = B 8237 SS\\nno stuck = 2131524123 \\nphone = +6285730004337\\nexp date = 2023-02-26\"', '2023-03-06 21:58:35', '2023-03-06 21:58:35'),
(52, 1, 1, '50', '\"nama = adi \\nno lisensi = B 8237 SS\\nno stuck = 2131524123 \\nphone = +6285730004337\\nexp date = 2023-02-26\"', '2023-03-06 21:58:57', '2023-03-06 21:58:57'),
(53, 1, 1, '51', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-06 21:59:56', '2023-03-06 21:59:56'),
(54, 1, 1, '52', '\"\\\"nama = adi  \\\\n no lisensi = B 8237 SS \\\\n no stuck = 2131524123  \\\\n phone = +6285730004337 \\\\n exp date = 2023-02-26\\\"\"', '2023-03-06 22:00:06', '2023-03-06 22:00:06'),
(55, 1, 1, '53', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-06 22:00:28', '2023-03-06 22:00:28'),
(56, 1, 1, '54', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-06 22:01:17', '2023-03-06 22:01:17'),
(57, 1, 1, '55', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-06 22:01:46', '2023-03-06 22:01:46'),
(58, 1, 1, '56', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-06 22:06:55', '2023-03-06 22:06:55'),
(59, 1, 1, '57', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-06 22:07:35', '2023-03-06 22:07:35'),
(60, 1, 1, '58', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-03-06 22:07:55', '2023-03-06 22:07:55'),
(61, 1, 1, '59', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-03-06 22:08:21', '2023-03-06 22:08:21'),
(62, 1, 1, '60', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-03-06 22:08:29', '2023-03-06 22:08:29'),
(63, 1, 1, '61', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-03-06 22:09:12', '2023-03-06 22:09:12'),
(64, 1, 1, '62', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-03-06 22:09:22', '2023-03-06 22:09:22'),
(65, 1, 1, '63', NULL, '2023-03-06 22:09:45', '2023-03-06 22:09:45'),
(66, 1, 1, '64', 'nama = adi  \r no lisensi = B 8237 SS \r no stuck = 2131524123  \r phone = +6285730004337 \r exp date = 2023-02-26', '2023-03-06 22:09:57', '2023-03-06 22:09:57'),
(67, 1, 1, '65', 'nama = adi , no lisensi = B 8237 SS, no stuck = 2131524123 , phone = +6285730004337, exp date = 2023-02-26', '2023-03-06 22:10:04', '2023-03-06 22:10:04'),
(68, 1, 1, '66', 'nama = adi , no lisensi = B 8237 SS, no stuck = 2131524123 , phone = +6285730004337, exp date = 2023-02-26', '2023-03-06 22:11:09', '2023-03-06 22:11:09'),
(69, 1, 1, '67', 'nama = adi \r\nno lisensi = B 8237 SS\r\nno stuck = 2131524123 \r\nphone = +6285730004337\r\nexp date = 2023-02-26', '2023-03-06 22:13:07', '2023-03-06 22:13:07'),
(70, 1, 1, '68', 'nama = adi , \nno lisensi = B 8237 SS, \nno stuck = 2131524123 , \nphone = +6285730004337, \nexp date = 2023-02-26', '2023-03-06 22:13:21', '2023-03-06 22:13:21'),
(71, 1, 1, '69', 'nama = adi , no lisensi = B 8237 SS, no stuck = 2131524123 , phone = +6285730004337, exp date = 2023-02-26', '2023-03-06 22:15:19', '2023-03-06 22:15:19'),
(72, 1, 1, '70', 'nama = adi \n no lisensi = B 8237 SS\n no stuck = 2131524123 \n phone = +6285730004337\n exp date = 2023-02-26', '2023-03-06 22:15:32', '2023-03-06 22:15:32'),
(73, 1, 1, '71', 'nama = adi \n no lisensi = B 8237 SS\n no stuck = 2131524123 \n phone = +6285730004337\n exp date = 2023-02-26', '2023-03-06 22:17:20', '2023-03-06 22:17:20'),
(74, 1, 1, '72', 'nama = adi \n no lisensi = B 8237 SS\n no stuck = 2131524123 \n phone = +6285730004337\n exp date = 2023-02-26', '2023-03-06 22:17:29', '2023-03-06 22:17:29'),
(75, 1, 1, '73', 'nama = adi \n no lisensi = B 8237 SS\n no stuck = 2131524123 \n phone = +6285730004337\n exp date = 2023-02-26', '2023-03-06 22:17:47', '2023-03-06 22:17:47'),
(76, 1, 1, '74', 'nama = adi \n no lisensi = B 8237 SS\n no stuck = 2131524123 \n phone = +6285730004337\n exp date = 2023-02-26', '2023-03-06 22:17:58', '2023-03-06 22:17:58'),
(77, 1, 1, '75', 'nama = adi  nl no lisensi = B 8237 SS nl no stuck = 2131524123  nl phone = +6285730004337 nl exp date = 2023-02-26', '2023-03-06 22:36:53', '2023-03-06 22:36:53'),
(78, 1, 1, '76', 'nama = adi  %OA no lisensi = B 8237 SS %OA no stuck = 2131524123  %OA phone = +6285730004337 %OA exp date = 2023-02-26', '2023-03-07 18:43:34', '2023-03-07 18:43:34'),
(79, 1, 1, '77', 'nama = adi  nl no lisensi = B 8237 SS nl no stuck = 2131524123  nl phone = +6285730004337 nl exp date = 2023-02-26', '2023-03-07 18:43:52', '2023-03-07 18:43:52'),
(80, 1, 1, '78', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-03-07 18:44:29', '2023-03-07 18:44:29'),
(81, 1, 1, '79', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-03-07 18:45:00', '2023-03-07 18:45:00'),
(82, 1, 1, '80', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-03-07 18:45:22', '2023-03-07 18:45:22'),
(83, 1, 1, '81', 'nama = adi ,no lisensi = B 8237 SS,no stuck = 2131524123 ,phone = +6285730004337,exp date = 2023-02-26', '2023-03-07 18:45:58', '2023-03-07 18:45:58'),
(84, 1, 1, '81', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-07 20:27:14', '2023-03-07 20:27:14'),
(85, 1, 1, '81', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-07 22:06:49', '2023-03-07 22:06:49'),
(86, 1, 1, '81', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-07 22:07:17', '2023-03-07 22:07:17'),
(87, 1, 1, '81', 'nama = adi  \n no lisensi = B 8237 SS \n no stuck = 2131524123  \n phone = +6285730004337 \n exp date = 2023-02-26', '2023-03-07 22:08:10', '2023-03-07 22:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adi', 'adi@gmail.com', NULL, '$2y$10$6/UKo.Ic.Hvd6LQFNKOVv.cIyc/epUEaNxr1cCXEt4csGtAK1l.I.', NULL, '2023-02-18 00:14:37', '2023-02-18 00:14:37'),
(2, 'verel', 'verel@gmail.com', NULL, '$2y$10$Azs803NCEcfeHM5K5yUqKum4nOMZSTrgZKa37XFWyjloZivLQGMku', NULL, '2023-02-18 04:37:56', '2023-02-18 04:37:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kirs`
--
ALTER TABLE `kirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kirs`
--
ALTER TABLE `kirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
