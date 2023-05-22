-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 05:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(23, 'default', 'created', 'App\\Models\\Doctor', 7, 'App\\Models\\User', 3, '[]', '2023-04-23 04:05:41', '2023-04-23 04:05:41'),
(24, 'default', 'created', 'App\\Models\\Doctor', 8, 'App\\Models\\User', 3, '[]', '2023-04-23 04:09:19', '2023-04-23 04:09:19'),
(25, 'default', 'updated', 'App\\Models\\Settings', 1, 'App\\Models\\User', 3, '[]', '2023-04-23 07:03:32', '2023-04-23 07:03:32'),
(26, 'default', 'updated', 'App\\Models\\Settings', 1, 'App\\Models\\User', 3, '[]', '2023-04-23 07:04:04', '2023-04-23 07:04:04'),
(27, 'default', 'updated', 'App\\Models\\Settings', 1, 'App\\Models\\User', 3, '[]', '2023-04-23 07:04:42', '2023-04-23 07:04:42'),
(28, 'default', 'updated', 'App\\Models\\Category', 12, 'App\\Models\\User', 3, '[]', '2023-04-24 07:20:06', '2023-04-24 07:20:06'),
(29, 'default', 'updated', 'App\\Models\\Category', 13, 'App\\Models\\User', 3, '[]', '2023-04-24 07:21:43', '2023-04-24 07:21:43'),
(30, 'default', 'created', 'App\\Models\\Result', 14, 'App\\Models\\User', 3, '[]', '2023-04-24 07:25:41', '2023-04-24 07:25:41'),
(31, 'default', 'created', 'App\\Models\\Result', 15, 'App\\Models\\User', 3, '[]', '2023-04-24 07:26:26', '2023-04-24 07:26:26'),
(32, 'default', 'updated', 'App\\Models\\Settings', 1, 'App\\Models\\User', 3, '[]', '2023-04-24 07:30:25', '2023-04-24 07:30:25'),
(33, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:08:43', '2023-04-29 16:08:43'),
(34, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:11:15', '2023-04-29 16:11:15'),
(35, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:20:00', '2023-04-29 16:20:00'),
(36, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:40:36', '2023-04-29 16:40:36'),
(37, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:45:35', '2023-04-29 16:45:35'),
(38, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:54:03', '2023-04-29 16:54:03'),
(39, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:54:07', '2023-04-29 16:54:07'),
(40, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:56:01', '2023-04-29 16:56:01'),
(41, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:56:09', '2023-04-29 16:56:09'),
(42, 'default', 'deleted', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 16:56:12', '2023-04-29 16:56:12'),
(43, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 16:58:41', '2023-04-29 16:58:41'),
(44, 'default', 'restored', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 16:58:43', '2023-04-29 16:58:43'),
(45, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:01:22', '2023-04-29 17:01:22'),
(46, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:05:58', '2023-04-29 17:05:58'),
(47, 'default', 'deleted', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 17:06:01', '2023-04-29 17:06:01'),
(48, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:06:02', '2023-04-29 17:06:02'),
(49, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:10:00', '2023-04-29 17:10:00'),
(50, 'default', 'restored', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 17:11:21', '2023-04-29 17:11:21'),
(51, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:15:42', '2023-04-29 17:15:42'),
(52, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:40:10', '2023-04-29 17:40:10'),
(53, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:40:33', '2023-04-29 17:40:33'),
(54, 'default', 'deleted', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 17:40:36', '2023-04-29 17:40:36'),
(55, 'default', 'deleted', 'App\\Models\\Category', 12, 'App\\Models\\User', 3, '[]', '2023-04-29 17:41:54', '2023-04-29 17:41:54'),
(56, 'default', 'deleted', 'App\\Models\\Category', 13, 'App\\Models\\User', 3, '[]', '2023-04-29 17:41:55', '2023-04-29 17:41:55'),
(57, 'default', 'restored', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:43:15', '2023-04-29 17:43:15'),
(58, 'default', 'restored', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 17:43:15', '2023-04-29 17:43:15'),
(59, 'default', 'deleted', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-04-29 17:44:37', '2023-04-29 17:44:37'),
(60, 'default', 'deleted', 'App\\Models\\Patient', 23, 'App\\Models\\User', 3, '[]', '2023-04-29 17:44:38', '2023-04-29 17:44:38'),
(61, 'default', 'updated', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-05-04 11:47:15', '2023-05-04 11:47:15'),
(62, 'default', 'updated', 'App\\Models\\Patient', 22, NULL, NULL, '[]', '2023-05-04 13:09:18', '2023-05-04 13:09:18'),
(63, 'default', 'created', 'App\\Models\\Result', 16, 'App\\Models\\User', 3, '[]', '2023-05-04 13:55:40', '2023-05-04 13:55:40'),
(64, 'default', 'created', 'App\\Models\\Result', 17, 'App\\Models\\User', 3, '[]', '2023-05-04 13:56:14', '2023-05-04 13:56:14'),
(65, 'default', 'created', 'App\\Models\\Result', 18, 'App\\Models\\User', 3, '[]', '2023-05-04 13:58:18', '2023-05-04 13:58:18'),
(66, 'default', 'created', 'App\\Models\\Result', 19, 'App\\Models\\User', 3, '[]', '2023-05-04 14:00:24', '2023-05-04 14:00:24'),
(67, 'default', 'updated', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-05-04 14:22:11', '2023-05-04 14:22:11'),
(68, 'default', 'created', 'App\\Models\\Result', 20, 'App\\Models\\User', 3, '[]', '2023-05-04 14:27:11', '2023-05-04 14:27:11'),
(69, 'default', 'updated', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-05-06 12:30:13', '2023-05-06 12:30:13'),
(70, 'default', 'created', 'App\\Models\\Result', 21, 'App\\Models\\User', 3, '[]', '2023-05-06 12:30:18', '2023-05-06 12:30:18'),
(71, 'default', 'created', 'App\\Models\\Result', 22, 'App\\Models\\User', 3, '[]', '2023-05-06 12:30:43', '2023-05-06 12:30:43'),
(72, 'default', 'created', 'App\\Models\\Result', 23, 'App\\Models\\User', 3, '[]', '2023-05-06 12:34:32', '2023-05-06 12:34:32'),
(73, 'default', 'created', 'App\\Models\\Result', 24, 'App\\Models\\User', 3, '[]', '2023-05-06 12:36:30', '2023-05-06 12:36:30'),
(74, 'default', 'updated', 'App\\Models\\Patient', 22, 'App\\Models\\User', 3, '[]', '2023-05-09 08:45:05', '2023-05-09 08:45:05'),
(75, 'default', 'created', 'App\\Models\\Result', 25, 'App\\Models\\User', 3, '[]', '2023-05-09 08:45:15', '2023-05-09 08:45:15'),
(76, 'default', 'created', 'App\\Models\\Result', 26, 'App\\Models\\User', 3, '[]', '2023-05-09 09:21:36', '2023-05-09 09:21:36'),
(77, 'default', 'updated', 'App\\Models\\Patient', 24, 'App\\Models\\User', 3, '[]', '2023-05-11 20:50:32', '2023-05-11 20:50:32'),
(78, 'default', 'updated', 'App\\Models\\Patient', 24, 'App\\Models\\User', 3, '[]', '2023-05-11 21:30:23', '2023-05-11 21:30:23'),
(79, 'default', 'updated', 'App\\Models\\Patient', 24, NULL, NULL, '[]', '2023-05-11 21:55:38', '2023-05-11 21:55:38'),
(80, 'default', 'updated', 'App\\Models\\Patient', 24, NULL, NULL, '[]', '2023-05-12 22:37:44', '2023-05-12 22:37:44'),
(81, 'default', 'updated', 'App\\Models\\Patient', 24, NULL, NULL, '[]', '2023-05-14 16:52:43', '2023-05-14 16:52:43'),
(82, 'default', 'updated', 'App\\Models\\Patient', 24, NULL, NULL, '[]', '2023-05-14 17:56:47', '2023-05-14 17:56:47'),
(83, 'default', 'deleted', 'App\\Models\\Patient', 24, 'App\\Models\\User', 3, '[]', '2023-05-15 18:54:16', '2023-05-15 18:54:16'),
(84, 'default', 'restored', 'App\\Models\\Patient', 24, 'App\\Models\\User', 3, '[]', '2023-05-15 19:02:25', '2023-05-15 19:02:25'),
(85, 'default', 'deleted', 'App\\Models\\Patient', 24, 'App\\Models\\User', 3, '[]', '2023-05-15 19:02:35', '2023-05-15 19:02:35'),
(86, 'default', 'created', 'App\\Models\\Doctor', 9, 'App\\Models\\User', 3, '[]', '2023-05-15 19:05:48', '2023-05-15 19:05:48'),
(87, 'default', 'created', 'App\\Models\\Doctor', 10, 'App\\Models\\User', 3, '[]', '2023-05-15 19:08:22', '2023-05-15 19:08:22'),
(88, 'default', 'deleted', 'App\\Models\\Doctor', 9, 'App\\Models\\User', 3, '[]', '2023-05-15 19:09:05', '2023-05-15 19:09:05'),
(89, 'default', 'restored', 'App\\Models\\Doctor', 9, 'App\\Models\\User', 3, '[]', '2023-05-15 19:09:07', '2023-05-15 19:09:07'),
(90, 'default', 'restored', 'App\\Models\\Patient', 24, 'App\\Models\\User', 3, '[]', '2023-05-15 19:18:06', '2023-05-15 19:18:06'),
(91, 'default', 'created', 'App\\Models\\Patient', 25, NULL, NULL, '[]', '2023-05-17 21:58:53', '2023-05-17 21:58:53'),
(92, 'default', 'created', 'App\\Models\\Patient', 26, NULL, NULL, '[]', '2023-05-17 22:02:15', '2023-05-17 22:02:15'),
(93, 'default', 'created', 'App\\Models\\Patient', 27, NULL, NULL, '[]', '2023-05-17 22:03:17', '2023-05-17 22:03:17'),
(94, 'default', 'updated', 'App\\Models\\Settings', 1, 'App\\Models\\User', 3, '[]', '2023-05-19 17:05:25', '2023-05-19 17:05:25'),
(95, 'default', 'updated', 'App\\Models\\Settings', 1, 'App\\Models\\User', 3, '[]', '2023-05-19 18:45:38', '2023-05-19 18:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_times_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `register_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_times_id`, `patient_id`, `register_date`, `created_at`, `updated_at`, `category_id`, `is_done`, `invoice_id`, `deleted_at`) VALUES
(37, 30, 27, '2023-03-31', '2023-05-19 18:45:05', '2023-05-19 18:45:05', 13, 0, 34, NULL),
(38, 30, 27, '2023-03-31', '2023-05-19 19:07:13', '2023-05-19 19:07:13', 13, 0, 35, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_times`
--

CREATE TABLE `appointment_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_from` varchar(255) DEFAULT NULL,
  `time_to` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_times`
--

INSERT INTO `appointment_times` (`id`, `time_from`, `time_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, '9-AM', '11-AM', '2023-03-31 01:29:34', '2023-04-23 05:41:26', NULL),
(27, '11.30-Am', '1.30-PM', '2023-03-31 01:29:34', '2023-04-23 05:40:57', NULL),
(28, '2-PM', '4-PM', '2023-03-31 01:29:34', '2023-04-23 05:40:59', NULL),
(29, '4.30-PM', '6.30-PM', '2023-03-31 01:29:34', '2023-04-23 05:41:28', NULL),
(30, '7-PM', '9-PM', '2023-03-31 01:29:34', '2023-04-23 05:41:31', NULL),
(31, '9.30-PM', '11.30-PM', '2023-03-31 01:29:34', '2023-04-23 05:42:33', NULL),
(32, '12-AM', '2-AM', '2023-03-31 01:29:34', '2023-04-23 05:41:40', NULL),
(33, '01:36', '02:36', '2023-04-23 05:37:01', '2023-04-23 05:41:41', NULL),
(34, '13:36', '14:36', '2023-04-23 05:37:24', '2023-04-23 05:41:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `img_name`, `price`, `notes`, `is_active`, `created_at`, `updated_at`, `url`, `deleted_at`) VALUES
(12, 'Brain MRI', 'http://127.0.0.1:3000/files/category/16817359233d-male-medical-figure-with-brain-highlighted_1048-8496.avif', '16817359233d-male-medical-figure-with-brain-highlighted_1048-8496.avif', '2000', 'Test', 1, '2023-04-17 10:52:03', '2023-04-29 17:41:54', 'http://127.0.0.1:8000/brain', NULL),
(13, 'Alzhimer MRI', 'http://127.0.0.1:3000/files/category/16817361863d-medical-background-with-male-figure-with-brain-virus-cells_1048-5871.avif', '16817361863d-medical-background-with-male-figure-with-brain-virus-cells_1048-5871.avif', '5000', 'Test', 1, '2023-04-17 10:56:26', '2023-04-29 17:41:55', 'http://127.0.0.1:8000/alzhimer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verifiyed_at` timestamp NULL DEFAULT NULL,
  `notification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `phone`, `code`, `deleted_at`, `verifiyed_at`, `notification_token`) VALUES
(9, 'super_admin@app.com', '$2y$10$Ye.L38hB.TrSMFScJyzMOenfRY2OaWZuibY8Z7PL.og9GRTqFaNQm', 'http://127.0.0.1:8000/files/doctor/168418834859f8fab2c9a5280001e482a0_alex-loup-397220.jpg', NULL, '2023-05-15 19:05:48', '2023-05-15 19:09:07', '+201066018340', NULL, NULL, NULL, NULL),
(10, 'magdy@gmail.com', '$2y$10$wEq27XGSjGdNnCrY6cc66egH4pjUkd5lnEwLA4JTPGbVcXtFLK3Wu', 'http://127.0.0.1:8000/files/doctor/168418850259f87affa38c420001ec0fec_brenan-greene-229561.jpg', NULL, '2023-05-15 19:08:22', '2023-05-15 19:08:22', '1234567890', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_translations`
--

CREATE TABLE `doctor_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_translations`
--

INSERT INTO `doctor_translations` (`id`, `locale`, `name`, `doctor_id`, `created_at`, `updated_at`) VALUES
(10, 'en', 'Test', 9, NULL, NULL),
(11, 'en', 'magdy', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `data_message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `currency`, `amount`, `status`, `date`, `data_message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, 'EGP', '7000', 'true', '2023-01-31 11:36:49', 'Approved', '2023-05-19 18:45:05', '2023-05-19 18:45:05', NULL),
(35, 'EGP', '7000', 'true', '2023-03-31 11:36:49', 'Approved', '2023-05-19 19:07:13', '2023-05-19 19:07:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `long`, `lat`, `created_at`, `updated_at`) VALUES
(1, '555', '123', '2023-02-10 19:43:58', '2023-02-26 17:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `device_name` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `ip`, `device_name`, `browser`, `name`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'WebKit', 'Chrome', NULL, '2023-04-11 13:45:14', '2023-04-11 13:45:14'),
(2, '127.0.0.1', 'WebKit', 'Chrome', NULL, '2023-04-11 13:45:25', '2023-04-11 13:45:25'),
(3, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-11 13:47:51', '2023-04-11 13:47:51'),
(4, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-11 21:34:24', '2023-04-11 21:34:24'),
(5, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-12 20:50:05', '2023-04-12 20:50:05'),
(6, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-12 22:26:23', '2023-04-12 22:26:23'),
(7, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-14 09:28:40', '2023-04-14 09:28:40'),
(8, '127.0.0.1', 'WebKit', 'Chrome', 'magdy', '2023-04-14 09:52:31', '2023-04-14 09:52:31'),
(9, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-14 09:53:11', '2023-04-14 09:53:11'),
(10, '127.0.0.1', 'WebKit', 'Chrome', 'magdy', '2023-04-14 11:29:55', '2023-04-14 11:29:55'),
(11, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-14 22:09:55', '2023-04-14 22:09:55'),
(12, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-15 00:46:59', '2023-04-15 00:46:59'),
(13, '127.0.0.1', 'WebKit', 'Edge', 'Super Admin', '2023-04-15 10:00:27', '2023-04-15 10:00:27'),
(14, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-15 19:10:12', '2023-04-15 19:10:12'),
(15, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-17 10:14:39', '2023-04-17 10:14:39'),
(16, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-17 10:16:21', '2023-04-17 10:16:21'),
(17, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-17 13:52:10', '2023-04-17 13:52:10'),
(18, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-18 12:08:23', '2023-04-18 12:08:23'),
(19, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-18 23:34:15', '2023-04-18 23:34:15'),
(20, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin', '2023-04-19 07:36:54', '2023-04-19 07:36:54'),
(21, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-20 04:42:27', '2023-04-20 04:42:27'),
(22, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-20 04:45:05', '2023-04-20 04:45:05'),
(23, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-20 04:45:27', '2023-04-20 04:45:27'),
(24, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-20 04:47:27', '2023-04-20 04:47:27'),
(25, '127.0.0.1', 'WebKit', 'Chrome', 'magdy', '2023-04-20 09:26:58', '2023-04-20 09:26:58'),
(26, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-20 09:52:38', '2023-04-20 09:52:38'),
(27, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-23 04:02:01', '2023-04-23 04:02:01'),
(28, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-24 07:17:27', '2023-04-24 07:17:27'),
(29, '127.0.0.1', 'WebKit', 'Edge', 'Super Admin 2', '2023-04-26 11:09:28', '2023-04-26 11:09:28'),
(30, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-29 06:33:33', '2023-04-29 06:33:33'),
(31, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-29 12:06:45', '2023-04-29 12:06:45'),
(32, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-29 15:47:17', '2023-04-29 15:47:17'),
(33, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-04-30 05:52:18', '2023-04-30 05:52:18'),
(34, '127.0.0.1', 'WebKit', 'Edge', 'Super Admin 2', '2023-05-04 10:12:49', '2023-05-04 10:12:49'),
(35, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-04 11:43:58', '2023-05-04 11:43:58'),
(36, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-04 13:10:36', '2023-05-04 13:10:36'),
(37, '127.0.0.1', 'WebKit', 'Edge', 'Super Admin 2', '2023-05-04 16:50:20', '2023-05-04 16:50:20'),
(38, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-06 12:18:04', '2023-05-06 12:18:04'),
(39, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-08 20:28:04', '2023-05-08 20:28:04'),
(40, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-09 08:34:11', '2023-05-09 08:34:11'),
(41, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-11 15:35:31', '2023-05-11 15:35:31'),
(42, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-11 20:47:59', '2023-05-11 20:47:59'),
(43, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-14 19:47:05', '2023-05-14 19:47:05'),
(44, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-15 18:44:57', '2023-05-15 18:44:57'),
(45, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-17 18:43:09', '2023-05-17 18:43:09'),
(46, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-17 18:51:22', '2023-05-17 18:51:22'),
(47, '127.0.0.1', 'WebKit', 'Edge', 'Super Admin 2', '2023-05-17 19:09:19', '2023-05-17 19:09:19'),
(48, '127.0.0.1', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-19 13:42:57', '2023-05-19 13:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_29_224643_create_patients_table', 2),
(6, '2023_02_14_183513_create_patient_translate_table', 3),
(7, '2023_02_19_005651_create_doctors_table', 4),
(8, '2023_02_19_005751_create_doctor_translations_table', 4),
(9, '2023_02_19_010600_add_phone_to_doctor_table', 5),
(10, '2023_02_19_010718_add_code_to_doctors_table', 6),
(11, '2023_02_21_225745_create_locations_table', 7),
(12, '2023_02_26_203104_laratrust_setup_tables', 8),
(13, '2023_03_03_001111_create_tips_table', 9),
(14, '2023_03_03_001155_create_tips_translations_table', 9),
(15, '2023_03_03_013143_create_tip_images_table', 10),
(16, '2023_03_03_013717_add_softdelete_to_patient_table', 11),
(17, '2023_03_03_013941_add_softdelete_to_doctor_table', 12),
(18, '2023_03_03_014007_add_soft_delete_to_user_table', 12),
(19, '2023_03_03_022414_add_like_to__tips_table', 13),
(20, '2023_03_24_213538_create_notifications_table', 14),
(24, '2023_03_29_230719_create_appointment_times_table', 15),
(25, '2023_03_29_230740_create_appointments_table', 16),
(26, '2023_04_01_003537_make_category_table', 17),
(27, '2023_04_01_003628_add_category_id_to_appointment', 17),
(28, '2023_04_01_010003_add_category_id_to_result_table', 17),
(29, '2023_04_11_153608_create_login_history_table', 18),
(30, '2023_04_14_120335_add_notes_to_result_table', 19),
(31, '2023_04_14_120429_add_notification_token_to_doctors_table', 19),
(33, '2023_04_14_121917_add_doctor_id_to_results_table', 20),
(34, '2023_04_14_120544_create_settings_table', 21),
(37, '2023_04_17_132620_create_invoice_table', 22),
(38, '2023_04_17_144848_add_invoice_id_to_appointment_table', 22),
(39, '2023_04_19_123505_create_activity_log_table', 23),
(40, '2023_04_20_064900_add_url_to_category', 24),
(41, '2023_04_20_065329_add_soft_deletes_to_category', 25),
(42, '2023_04_23_065534_add_soft_delete_to_appointment_time', 26),
(43, '2023_04_26_125939_add_softdelete_to_tips_table', 27),
(44, '2023_04_29_191516_add_softdelete_appointemnt_table', 28),
(45, '2023_04_29_191605_add_softdelete_results_table', 28),
(46, '2023_04_29_191732_add_softdelete_invoices_table', 28),
(47, '2023_05_04_133518_add_access_token_to_patient', 29),
(48, '2023_05_04_172326_add_files_url_to_results', 30),
(49, '2023_05_17_184847_add_notification_token_to_admin', 31);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_readed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `patient_id`, `doctor_id`, `message`, `is_readed`, `created_at`, `updated_at`) VALUES
(1, 27, NULL, 'Dear Mr mohamed magdy Mohamed Hope To have Nice Day\n            your Phone Number +201066018340Has Been Added To your Profile With Our Best :)', 0, '2023-03-24 22:03:11', '2023-03-24 22:03:11'),
(2, NULL, 10, 'Test', 0, '2023-04-20 07:22:05', '2023-04-20 07:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `notification_token` varchar(200) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `access_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `email`, `password`, `img`, `gender`, `address`, `phone`, `code`, `date_of_birth`, `email_verified_at`, `notification_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `access_token`) VALUES
(27, 'mohamedmagdymohamed982@gmail.com', '$2y$10$mDr5/oZgh8zEnm0DMvOtWu1inT1VNtlQ1chKhJzmFNshXgHPF.7FW', 'http://127.0.0.1:8000/files/profile/1684371796brain2.jpg', 'male', NULL, '+201066018742', '78906', '2001-08-08', '2023-05-17 17:04:09', NULL, NULL, '2023-05-17 22:03:17', '2023-05-17 22:03:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_translations`
--

CREATE TABLE `patient_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_translations`
--

INSERT INTO `patient_translations` (`id`, `patient_id`, `locale`, `name`, `address`, `created_at`, `updated_at`) VALUES
(9, 27, 'en', 'mohamed magdy', 'Cairo', NULL, NULL),
(10, 27, 'ar', 'mohamed magdy', 'Cairo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(59, 'show_admins', 'Show Admins', 'عرض المشرفين', '2023-05-19 20:48:37', '2023-05-19 20:48:37'),
(60, 'add_admins', 'Add Admins', 'اضافه المشرفين', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(61, 'edit_admins', 'Edit Admins', 'تعديل المشرفين', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(62, 'delete_admins', 'Delete Admins', 'حذف المشرفين', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(63, 'show_permissions', 'Show Permissions', 'عرض الصلاحيات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(64, 'edit_permissions', 'edit Permissions', 'تعديل الصلاحيات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(65, 'show_doctors', 'Show Doctors', 'عرض الدكاتره', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(66, 'add_doctors', 'Add Doctors', 'اضافه الاطباء', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(67, 'delete_doctors', 'delete Doctors', 'حذف الاطباء', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(68, 'show_patients', 'Show Patients', 'عرض المرضي', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(69, 'active_patients', 'Active Patients', 'تفعيل المريض', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(70, 'dective_patients', 'Dective Patients', 'تفعيل المريض', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(71, 'show_categories', 'Show Categories', 'عرض الفئات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(72, 'add_categories', 'Add Categories', 'اضافه الفئات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(73, 'edit_categories', 'Edit Categories', 'تعديل الفئات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(74, 'delete_categories', 'Delete Categories', 'حذف الفئات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(75, 'show_classifiation_request', 'Show Classification Request', 'عرض تحديد نوع المرض', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(76, 'make_classification_reqeust', 'Make Classification Requests', 'عمل تحديد الفئه', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(77, 'show_result', 'Show Results', 'عرض النتائج', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(78, 'show_invoices', 'Show Invoices', 'عرض الفواتير', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(79, 'show_notifications', 'Show Notifications', 'عرض الاشعارات', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(80, 'show_security', 'Show Security', 'عرض والجزء الامن', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(81, 'show_appointment_time', 'Show Appointment Time', 'عرض الدكاتره', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(82, 'add_appointment_time', 'Add Appointment Time', 'اضافه الاطباء', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(83, 'edit_appointment_time', 'Edit Appointment Time', 'اضافه الاطباء', '2023-05-19 20:48:38', '2023-05-19 20:48:38'),
(84, 'delete_appointment_time', 'Delete Appointment Time', 'حذف الاطباء', '2023-05-19 20:48:38', '2023-05-19 20:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `expires_at`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(50, 'App\\Models\\User', 1, 'admin token', 'db5ac3b92f3c4a7a90c7a1b89bb74c6801106cb7bc0644a48e94284b60f780a9', NULL, '[\"*\"]', '2023-03-24 22:11:29', '2023-03-22 10:07:52', '2023-03-24 22:11:29'),
(51, 'App\\Models\\Patient', 22, 'myapptoken', '72f56c68f0f11bde7689ad710fa17c4307e10b8bd595b63ff1e51eb01d3924c3', NULL, '[\"*\"]', '2023-03-25 11:50:20', '2023-03-24 21:59:49', '2023-03-25 11:50:20'),
(52, 'App\\Models\\Patient', 22, 'myapptoken', '4418df7400d8f9425341a4a18466c2815d488ab4319da4c579a3e72761e45eac', NULL, '[\"*\"]', '2023-04-03 02:06:31', '2023-04-03 02:02:19', '2023-04-03 02:06:31'),
(53, 'App\\Models\\Patient', 22, 'myapptoken', '7360d2adc5f5ae65aa7d69397621ec9d5ad222a0c979d8ff1b5e158aacb77cbb', NULL, '[\"*\"]', '2023-04-14 11:45:40', '2023-04-14 11:41:26', '2023-04-14 11:45:40'),
(54, 'App\\Models\\Patient', 22, 'myapptoken', '8cef11b754553992273da53c72246888fcc6becfd3a19fe4746e10be50d4bca4', NULL, '[\"*\"]', '2023-04-17 13:23:21', '2023-04-17 11:14:49', '2023-04-17 13:23:21'),
(55, 'App\\Models\\Patient', 22, 'myapptoken', 'c2422d30dc5e7f5fd597aed5f060bb281aa6078eae3f20d788839b5082466412', NULL, '[\"*\"]', '2023-04-23 13:11:39', '2023-04-23 12:58:57', '2023-04-23 13:11:39'),
(56, 'App\\Models\\Patient', 27, 'myapptoken', '2a5ac3d63802a1c75333c0e40938d331b726423bed7cab373d588fe5e8d34432', NULL, '[\"*\"]', '2023-05-19 19:07:13', '2023-05-19 14:04:16', '2023-05-19 19:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `files_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'super_admin', 'Super Admin', 'Can Access Any Thing', '2023-03-02 05:11:36', '2023-03-02 05:11:36'),
(5, 'manger', 'Manger', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 3, 'App\\Models\\User'),
(2, 32, 'App\\Models\\User'),
(5, 39, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'active_recaptcha', '1', NULL, '2023-05-19 18:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `like` varchar(255) NOT NULL DEFAULT '0',
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tips_translations`
--

CREATE TABLE `tips_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `locale` varchar(255) NOT NULL,
  `tips_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tip_images`
--

CREATE TABLE `tip_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tip_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `notifcation_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `img`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `notifcation_token`) VALUES
(3, 'Super Admin 2', 'superadmin@admin.com', '2023-03-02 05:11:36', '1681904116WhatsApp Image 2023-04-12 at 10.40.51 PM.jpeg', '$2y$10$vfJtu37nqRv9Lh4vfv5nP.DMtn9HN.66BxKKcU1CCiffKbTtDUcim', '7M3WsOZS58E1n091PmcA0LHwTid1VkG6KeHpITQWOwaMgWTpRX29OjADwGVh', '2023-03-02 05:11:36', '2023-04-19 09:43:43', NULL, NULL),
(32, 'magdy', 'mohamedmagdymohamed982@gmail.com', NULL, NULL, '$2y$10$FPqthWEL07Glt.qWffOrUeERCceU1.l877f6yJXXAm6m0i5EMRhN6', NULL, '2023-04-06 20:13:42', '2023-04-06 20:13:42', NULL, NULL),
(39, 'magdy', 'admin@admin.com', NULL, NULL, '$2y$10$Nd9rzuP0imld6rqmxDxz0ujY1/OXsJ1SF4mgeG9KF4LiAS7rwsLmS', NULL, '2023-04-14 09:52:17', '2023-04-20 09:52:53', NULL, NULL);

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_appointment_times_id_foreign` (`appointment_times_id`),
  ADD KEY `appointments_category_id_foreign` (`category_id`),
  ADD KEY `appointments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `appointment_times`
--
ALTER TABLE `appointment_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_translations_doctor_id_locale_unique` (`doctor_id`,`locale`),
  ADD KEY `doctor_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_translations`
--
ALTER TABLE `patient_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_translates_patient_id_locale_unique` (`patient_id`,`locale`),
  ADD KEY `patient_translates_locale_index` (`locale`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pateint_id` (`patient_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `results_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tips_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `tips_translations`
--
ALTER TABLE `tips_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tips_translations_tip_id_locale_unique` (`tips_id`,`locale`),
  ADD KEY `tips_translations_locale_index` (`locale`);

--
-- Indexes for table `tip_images`
--
ALTER TABLE `tip_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tip_images_tip_id_foreign` (`tip_id`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `appointment_times`
--
ALTER TABLE `appointment_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `patient_translations`
--
ALTER TABLE `patient_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tips_translations`
--
ALTER TABLE `tips_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tip_images`
--
ALTER TABLE `tip_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_appointment_times_id_foreign` FOREIGN KEY (`appointment_times_id`) REFERENCES `appointment_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD CONSTRAINT `doctor_translations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_translations`
--
ALTER TABLE `patient_translations`
  ADD CONSTRAINT `patient_translates_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `tips_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tips_translations`
--
ALTER TABLE `tips_translations`
  ADD CONSTRAINT `tips_translations_tip_id_foreign` FOREIGN KEY (`tips_id`) REFERENCES `tips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tip_images`
--
ALTER TABLE `tip_images`
  ADD CONSTRAINT `tip_images_tip_id_foreign` FOREIGN KEY (`tip_id`) REFERENCES `tips` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
