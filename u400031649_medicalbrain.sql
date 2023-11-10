-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2023 at 08:20 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u400031649_medicalbrain`
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
(95, 'default', 'created', 'App\\Models\\Patient', 26, NULL, NULL, '[]', '2023-05-20 16:16:58', '2023-05-20 16:16:58'),
(96, 'default', 'created', 'App\\Models\\Patient', 27, NULL, NULL, '[]', '2023-05-20 16:55:52', '2023-05-20 16:55:52'),
(97, 'default', 'updated', 'App\\Models\\Patient', 27, NULL, NULL, '[]', '2023-05-20 17:12:16', '2023-05-20 17:12:16'),
(98, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-21 00:06:30', '2023-05-21 00:06:30'),
(99, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-21 00:06:50', '2023-05-21 00:06:50'),
(100, 'default', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '[]', '2023-05-21 22:22:17', '2023-05-21 22:22:17'),
(101, 'default', 'created', 'App\\Models\\Doctor', 10, 'App\\Models\\User', 3, '[]', '2023-05-22 00:49:47', '2023-05-22 00:49:47'),
(102, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:33:41', '2023-05-22 06:33:41'),
(103, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:35:41', '2023-05-22 06:35:41'),
(104, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:38:19', '2023-05-22 06:38:19'),
(105, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:38:43', '2023-05-22 06:38:43'),
(106, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:39:53', '2023-05-22 06:39:53'),
(107, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:40:28', '2023-05-22 06:40:28'),
(108, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:42:10', '2023-05-22 06:42:10'),
(109, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:42:41', '2023-05-22 06:42:41'),
(110, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:42:54', '2023-05-22 06:42:54'),
(111, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-22 06:43:04', '2023-05-22 06:43:04'),
(112, 'default', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '[]', '2023-05-23 01:08:43', '2023-05-23 01:08:43'),
(113, 'default', 'created', 'App\\Models\\Doctor', 11, 'App\\Models\\User', 3, '[]', '2023-05-23 02:34:50', '2023-05-23 02:34:50'),
(114, 'default', 'created', 'App\\Models\\Category', 17, 'App\\Models\\User', 3, '[]', '2023-05-23 21:41:10', '2023-05-23 21:41:10'),
(115, 'default', 'created', 'App\\Models\\Category', 18, 'App\\Models\\User', 3, '[]', '2023-05-23 21:44:02', '2023-05-23 21:44:02'),
(116, 'default', 'updated', 'App\\Models\\Doctor', 10, 'App\\Models\\Doctor', 10, '[]', '2023-05-24 10:05:20', '2023-05-24 10:05:20'),
(117, 'default', 'updated', 'App\\Models\\Doctor', 10, 'App\\Models\\Doctor', 10, '[]', '2023-05-25 10:14:29', '2023-05-25 10:14:29'),
(118, 'default', 'updated', 'App\\Models\\Patient', 25, NULL, NULL, '[]', '2023-05-25 14:11:19', '2023-05-25 14:11:19'),
(119, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-25 14:13:01', '2023-05-25 14:13:01'),
(120, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-26 11:42:42', '2023-05-26 11:42:42'),
(121, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-26 19:22:08', '2023-05-26 19:22:08'),
(122, 'default', 'deleted', 'App\\Models\\Category', 12, 'App\\Models\\User', 3, '[]', '2023-05-27 09:11:00', '2023-05-27 09:11:00'),
(123, 'default', 'restored', 'App\\Models\\Category', 12, 'App\\Models\\User', 3, '[]', '2023-05-27 09:11:01', '2023-05-27 09:11:01'),
(124, 'default', 'deleted', 'App\\Models\\Category', 12, 'App\\Models\\User', 3, '[]', '2023-05-27 09:37:48', '2023-05-27 09:37:48'),
(125, 'default', 'restored', 'App\\Models\\Category', 12, 'App\\Models\\User', 3, '[]', '2023-05-27 09:38:13', '2023-05-27 09:38:13'),
(126, 'default', 'created', 'App\\Models\\Category', 19, 'App\\Models\\User', 3, '[]', '2023-05-27 16:50:58', '2023-05-27 16:50:58'),
(127, 'default', 'created', 'App\\Models\\Category', 20, 'App\\Models\\User', 3, '[]', '2023-05-27 16:53:21', '2023-05-27 16:53:21'),
(128, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:41:28', '2023-05-28 04:41:28'),
(129, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:41:52', '2023-05-28 04:41:52'),
(130, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:42:30', '2023-05-28 04:42:30'),
(131, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:43:09', '2023-05-28 04:43:09'),
(132, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:43:50', '2023-05-28 04:43:50'),
(133, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:44:06', '2023-05-28 04:44:06'),
(134, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 04:44:29', '2023-05-28 04:44:29'),
(135, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 07:19:03', '2023-05-28 07:19:03'),
(136, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-28 09:23:10', '2023-05-28 09:23:10'),
(137, 'default', 'updated', 'App\\Models\\Patient', 25, 'App\\Models\\Patient', 25, '[]', '2023-05-31 18:56:38', '2023-05-31 18:56:38');

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
(20, 26, 25, '2023-05-25', '2023-05-24 02:43:43', '2023-05-24 02:43:43', 13, 1, 18, NULL),
(21, 26, 25, '2023-05-25', '2023-05-24 02:43:44', '2023-05-24 02:43:44', 13, 1, 19, NULL),
(22, 27, 25, '2023-05-25', '2023-05-25 12:39:48', '2023-05-25 12:39:48', 13, 0, 20, NULL),
(23, 27, 25, '2023-05-25', '2023-05-25 12:39:49', '2023-05-25 12:39:49', 13, 0, 21, NULL),
(24, 26, 25, '2023-05-28', '2023-05-27 21:28:35', '2023-05-27 21:28:35', 13, 0, 22, NULL),
(25, 26, 25, '2023-05-31', '2023-05-27 21:39:44', '2023-05-27 21:39:44', 13, 0, 23, NULL),
(26, 26, 25, '2023-05-31', '2023-05-27 21:40:37', '2023-05-27 21:40:37', 12, 0, 24, NULL),
(27, 27, 25, '2023-05-31', '2023-05-27 21:41:55', '2023-05-27 21:41:55', 13, 0, 25, NULL),
(28, 26, 25, '2023-05-29', '2023-05-27 21:56:39', '2023-05-27 21:56:39', 13, 0, 26, NULL),
(29, 26, 25, '2023-05-29', '2023-05-27 21:56:40', '2023-05-27 21:56:40', 13, 0, 27, NULL),
(30, 32, 25, '2023-06-09', '2023-06-01 13:42:38', '2023-06-01 13:42:38', 12, 0, 28, NULL),
(31, 27, 25, '2023-06-01', '2023-06-01 13:46:05', '2023-06-01 13:46:05', 13, 0, 29, NULL),
(32, 27, 25, '2023-06-01', '2023-06-01 13:46:06', '2023-06-01 13:46:06', 13, 0, 30, NULL),
(33, 26, 25, '2023-06-10', '2023-06-06 11:35:18', '2023-06-06 11:35:18', 12, 0, 31, NULL),
(34, 26, 25, '2023-06-10', '2023-06-06 11:35:18', '2023-06-06 11:35:18', 12, 0, 32, NULL),
(35, 26, 25, '2023-06-06', '2023-06-06 12:00:28', '2023-06-06 12:00:28', 13, 0, 33, NULL),
(36, 26, 25, '2023-06-06', '2023-06-06 12:00:28', '2023-06-06 12:00:28', 13, 0, 34, NULL),
(37, 26, 25, '2023-06-15', '2023-06-06 17:57:49', '2023-06-06 17:57:49', 12, 0, 35, NULL),
(38, 26, 25, '2023-06-15', '2023-06-06 17:57:49', '2023-06-06 17:57:49', 12, 0, 36, NULL);

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
(12, 'Brain MRI', 'https://medical-brain-center.almostafabure.com/files/category/1685206258headache-representation (2).jpg', '1685206258headache-representation (2).jpg', '2000', 'Test', 1, '2023-04-17 10:52:03', '2023-05-27 09:38:13', 'brain', NULL),
(13, 'Alzhimer MRI', 'https://medical-brain-center.almostafabure.com/files/category/1685206401closeup-brain-mri-scan-result (1) (1).jpg', '1685206401closeup-brain-mri-scan-result (1) (1).jpg', '5000', 'Test', 1, '2023-04-17 10:56:26', '2023-04-29 17:41:55', 'alzhimer', NULL);

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
(9, 'mohammedyasser2023@gmail.com', '$2y$10$uSw1Q9uhp95Mg9k1uC6dUO7faplf4zI06Jkg6e5gjyPf.vnTQuHJO', 'https://medical-brain-center.almostafabure.com/files/doctor/1684104181192c0bda71b2fc4244de0c55073fdfcff24a4fd6.webp', NULL, '2023-05-13 01:22:20', '2023-05-14 22:43:01', '01068700814', NULL, NULL, '2023-05-14 22:43:01', NULL),
(10, 'mohamed@gmail.com', '$2y$10$pKsPsvXqJLI/oSXPMo/STu0tPA8Yi.kjK105HXPwiUg8Jmc2GjI7i', 'https://medical-brain-center.almostafabure.com/files/doctor/1685009669b9d9af4d-1088-4a4d-b901-6b95d1bf289d.jpg', NULL, '2023-05-22 00:49:47', '2023-05-25 10:14:29', '01068700814', NULL, NULL, '2023-05-25 10:14:29', NULL),
(11, 'nada@gmail.com', '$2y$10$wXhVCcNJlZYKTywFdwQCmuLpKvraqrt/tNsP0bEFCv7BLi9Flf0ga', 'https://medical-brain-center.almostafabure.com/files/doctor/1684809290Tr-no_0022.jpg', NULL, '2023-05-23 02:34:50', '2023-05-23 02:34:50', '01061108437', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_dignoses`
--

CREATE TABLE `doctor_dignoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_dignoses`
--

INSERT INTO `doctor_dignoses` (`id`, `medicine`, `description`, `notes`, `result_id`, `created_at`, `updated_at`) VALUES
(2, 'congital', 'انت زي الفل غطيها بس وانت نايم', '..', 27, '2023-05-23 00:17:59', '2023-05-23 00:17:59'),
(3, 'Test', 'Test', 'Test', 28, NULL, NULL);

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
(10, 'en', 'Mohamed Yasser', 9, NULL, NULL),
(11, 'en', 'Dr prof sir mohamed yasser', 10, NULL, NULL),
(12, 'en', 'Nada Gamal', 11, NULL, NULL);

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
  `code` varchar(255) DEFAULT NULL,
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

INSERT INTO `invoices` (`id`, `code`, `currency`, `amount`, `status`, `date`, `data_message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, NULL, 'EGP', '7000', 'true', '2023-05-24 05:43:23', 'Approved', '2023-05-24 02:43:43', '2023-05-24 02:43:43', NULL),
(19, NULL, 'EGP', '7000', 'true', '2023-05-24 05:43:23', 'Approved', '2023-05-24 02:43:44', '2023-05-24 02:43:44', NULL),
(20, NULL, 'EGP', '7000', 'true', '2023-05-25 15:39:28', 'Approved', '2023-05-25 12:39:48', '2023-05-25 12:39:48', NULL),
(21, NULL, 'EGP', '7000', 'true', '2023-05-25 15:39:28', 'Approved', '2023-05-25 12:39:49', '2023-05-25 12:39:49', NULL),
(22, NULL, 'EGP', '7000', 'false', '2023-05-28 00:27:10', 'Already being processed for payment', '2023-05-27 21:28:35', '2023-05-27 21:28:35', NULL),
(23, NULL, 'EGP', '7000', 'false', '2023-05-28 00:38:37', 'Already being processed for payment', '2023-05-27 21:39:44', '2023-05-27 21:39:44', NULL),
(24, NULL, 'EGP', '7000', 'false', '2023-05-28 00:38:37', 'Already being processed for payment', '2023-05-27 21:40:37', '2023-05-27 21:40:37', NULL),
(25, NULL, 'EGP', '7000', 'false', '2023-05-28 00:38:37', 'Already being processed for payment', '2023-05-27 21:41:55', '2023-05-27 21:41:55', NULL),
(26, NULL, 'EGP', '7000', 'true', '2023-05-28 00:56:12', 'Approved', '2023-05-27 21:56:39', '2023-05-27 21:56:39', NULL),
(27, NULL, 'EGP', '7000', 'true', '2023-05-28 00:56:12', 'Approved', '2023-05-27 21:56:40', '2023-05-27 21:56:40', NULL),
(28, NULL, 'EGP', '7000', 'false', '2023-06-01 16:40:48', 'Already being processed for payment', '2023-06-01 13:42:38', '2023-06-01 13:42:38', NULL),
(29, NULL, 'EGP', '7000', 'true', '2023-06-01 16:45:45', 'Approved', '2023-06-01 13:46:05', '2023-06-01 13:46:05', NULL),
(30, NULL, 'EGP', '7000', 'true', '2023-06-01 16:45:45', 'Approved', '2023-06-01 13:46:06', '2023-06-01 13:46:06', NULL),
(31, NULL, 'EGP', '7000', 'true', '2023-06-06 14:34:57', 'Approved', '2023-06-06 11:35:18', '2023-06-06 11:35:18', NULL),
(32, NULL, 'EGP', '7000', 'true', '2023-06-06 14:34:57', 'Approved', '2023-06-06 11:35:18', '2023-06-06 11:35:18', NULL),
(33, '110729485', 'EGP', '7000', 'true', '2023-06-06 15:00:08', 'Approved', '2023-06-06 12:00:28', '2023-06-06 12:00:28', NULL),
(34, '110729485', 'EGP', '7000', 'true', '2023-06-06 15:00:08', 'Approved', '2023-06-06 12:00:28', '2023-06-06 12:00:28', NULL),
(35, '110811073', 'EGP', '7000', 'true', '2023-06-06 20:57:29', 'Approved', '2023-06-06 17:57:49', '2023-06-06 17:57:49', NULL),
(36, '110811073', 'EGP', '7000', 'true', '2023-06-06 20:57:29', 'Approved', '2023-06-06 17:57:49', '2023-06-06 17:57:49', NULL);

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
(42, '154.182.121.188', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-11 19:51:21', '2023-05-11 19:51:21'),
(43, '154.182.121.188', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-11 22:52:36', '2023-05-11 22:52:36'),
(44, '154.182.121.188', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-13 01:20:09', '2023-05-13 01:20:09'),
(45, '197.59.172.208', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-13 01:20:15', '2023-05-13 01:20:15'),
(46, '154.182.121.188', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-13 01:54:16', '2023-05-13 01:54:16'),
(47, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-14 22:43:29', '2023-05-14 22:43:29'),
(48, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-15 21:16:19', '2023-05-15 21:16:19'),
(49, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-21 03:55:17', '2023-05-21 03:55:17'),
(50, '154.182.78.165', 'WebKit', 'Chrome', 'magdy', '2023-05-21 14:48:24', '2023-05-21 14:48:24'),
(51, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-21 18:15:52', '2023-05-21 18:15:52'),
(52, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin 2', '2023-05-21 22:10:47', '2023-05-21 22:10:47'),
(53, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin', '2023-05-22 15:35:06', '2023-05-22 15:35:06'),
(54, '154.182.78.165', 'WebKit', 'Edge', 'Super Admin', '2023-05-22 17:22:45', '2023-05-22 17:22:45'),
(55, '154.182.78.165', 'WebKit', 'Edge', 'Super Admin', '2023-05-22 23:35:51', '2023-05-22 23:35:51'),
(56, '154.182.78.165', 'WebKit', 'Chrome', 'Super Admin', '2023-05-23 01:06:07', '2023-05-23 01:06:07'),
(57, '154.182.59.109', 'WebKit', 'Chrome', 'Super Admin', '2023-05-23 02:32:49', '2023-05-23 02:32:49'),
(58, '154.182.127.109', 'WebKit', 'Chrome', 'Super Admin', '2023-05-23 05:22:42', '2023-05-23 05:22:42'),
(59, '196.150.129.144', 'WebKit', 'Chrome', 'Super Admin', '2023-05-23 09:01:50', '2023-05-23 09:01:50'),
(60, '45.99.113.41', 'WebKit', 'Chrome', 'Super Admin', '2023-05-23 10:46:00', '2023-05-23 10:46:00'),
(61, '154.182.99.240', 'WebKit', 'Chrome', 'Super Admin', '2023-05-23 21:26:55', '2023-05-23 21:26:55'),
(62, '154.182.81.179', 'WebKit', 'Chrome', 'Super Admin', '2023-05-24 02:44:39', '2023-05-24 02:44:39'),
(63, '45.100.44.103', 'WebKit', 'Chrome', 'Super Admin', '2023-05-25 12:32:55', '2023-05-25 12:32:55'),
(64, '154.182.100.230', 'Samsung', 'Chrome', 'Super Admin', '2023-05-25 16:24:28', '2023-05-25 16:24:28'),
(65, '197.59.189.203', 'WebKit', 'Chrome', 'Super Admin', '2023-05-27 09:06:16', '2023-05-27 09:06:16'),
(66, '154.182.76.97', 'WebKit', 'Chrome', 'Super Admin', '2023-05-27 16:50:22', '2023-05-27 16:50:22'),
(67, '154.182.103.82', 'WebKit', 'Chrome', 'Super Admin', '2023-06-06 11:13:15', '2023-06-06 11:13:15');

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
(48, '2023_05_04_172326_add_files_url_to_results', 30);

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
(24, 'mohamedmagdymohamed98552@gmail.com', '$2y$10$StKCCGovdNRNR.3wDiKNnuNLGXWWn0i/VXttyA3jw75Bc0rdU3472', 'https://medical-brain-center.almostafabure.com/files/profile/1683890380giphy.gif', 'male', NULL, '+201066018340', '66288', '2001-08-08', '2023-05-11 23:58:15', 'test_token', NULL, '2023-05-11 23:56:50', '2023-05-15 21:33:17', NULL, NULL),
(25, 'mohammedyasser2023@gmail.com', '$2y$10$Sj8jbmQPASIFdic0wsa93ublf14KuLfbdbCa1y3st4JYyJyoGwy5.', 'https://medical-brain-center.almostafabure.com/files/profile/1685559398scaled_IMG-20230530-WA0075.jpg', 'Male', NULL, '01068700814', '33378', '2001-05-02', '2023-05-15 04:52:19', 'dMFSQUzdQxyl6jEbL2UAUx:APA91bEFFfR-wVE2FgSY9h6Z8SQauJIwezjZq3uIF1Q9HPbAkSkeVChQ2qCB14HVJjqWvGrccf1U-t8WylPtiKzpb-zDMnSirWvEdqY-wSWPjoiASnARHiR-cLXsymypAHPxSCc3NSDo', '71905', '2023-05-15 04:51:44', '2023-05-31 18:56:38', NULL, NULL),
(26, 'mohamedmagdymohamed982@gmail.com', '$2y$10$80i37XHxUPi7mZYDorA0yOqMmgOgFaCFTCr.bzGieFaCNi8H0pLnW', NULL, 'male', NULL, '+201066018742', '55564', '2001-08-08', NULL, 'dMFSQUzdQxyl6jEbL2UAUx:APA91bEFFfR-wVE2FgSY9h6Z8SQauJIwezjZq3uIF1Q9HPbAkSkeVChQ2qCB14HVJjqWvGrccf1U-t8WylPtiKzpb-zDMnSirWvEdqY-wSWPjoiASnARHiR-cLXsymypAHPxSCc3NSDo', NULL, '2023-05-20 16:16:58', '2023-05-20 16:16:58', NULL, NULL),
(27, 'khaledcr22@gmail.com', '$2y$10$4aBYnnaZqdfnhudd9rXouebqRTR8VO83qnmFWa4/BxgulqhP3F5ca', 'https://medical-brain-center.almostafabure.com/files/profile/1684601751Admin-Profile-PNG-Clipart.png', 'male', NULL, '+55860051256', '75614', '2001-08-08', '2023-05-20 17:12:16', 'dMFSQUzdQxyl6jEbL2UAUx:APA91bEFFfR-wVE2FgSY9h6Z8SQauJIwezjZq3uIF1Q9HPbAkSkeVChQ2qCB14HVJjqWvGrccf1U-t8WylPtiKzpb-zDMnSirWvEdqY-wSWPjoiASnARHiR-cLXsymypAHPxSCc3NSDo', NULL, '2023-05-20 16:55:52', '2023-05-20 17:12:16', NULL, NULL);

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
(5, 24, 'en', 'mohamed magdy Mohamed', 'Cairo', NULL, NULL),
(6, 24, 'ar', 'mohamed magdy', 'Cairo', NULL, NULL),
(7, 25, 'en', 'Mohamed Yaasser Bakr', 'cairo', NULL, NULL),
(8, 25, 'ar', 'Mohamed', 'cairo', NULL, NULL),
(9, 26, 'en', 'mohamed magdy', 'Cairo', NULL, NULL),
(10, 27, 'en', 'Test', 'Cairo', NULL, NULL),
(11, 27, 'ar', 'Test', 'Cairo', NULL, NULL);

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
(56, 'App\\Models\\Patient', 24, 'myapptoken', '249cfd56ca0c758658311ec9d26af467acedfbef604be0f85a934801240375b6', NULL, '[\"*\"]', NULL, '2023-05-12 11:03:08', '2023-05-12 11:03:08'),
(57, 'App\\Models\\Patient', 24, 'myapptoken', '60fa54db2889fef1c67f7736674010e5bfe38f59e3d186c853d3c41844282691', NULL, '[\"*\"]', '2023-05-23 01:04:11', '2023-05-12 11:10:01', '2023-05-23 01:04:11'),
(58, 'App\\Models\\Doctor', 9, 'doctorToken', 'dca4d9a2a6c585094c72ee98b1c84148d0270347778508245f64c11ee18b83c7', NULL, '[\"*\"]', NULL, '2023-05-13 01:24:38', '2023-05-13 01:24:38'),
(59, 'App\\Models\\Doctor', 9, 'doctorToken', 'c5ec610c48b1dfbbf3b360ece3a5502cca9ec9455b96ef1b8eea13a3e62a6043', NULL, '[\"*\"]', NULL, '2023-05-14 22:36:22', '2023-05-14 22:36:22'),
(60, 'App\\Models\\Doctor', 9, 'doctorToken', 'fe21d78cb08a93d5f62c6920b4e45b26fb2708ae96fbb212d16662698897e34d', NULL, '[\"*\"]', NULL, '2023-05-14 22:41:48', '2023-05-14 22:41:48'),
(61, 'App\\Models\\Doctor', 9, 'doctorToken', '5363524f69b4e77630b825f11d358af1d41d0dadf12e0938b8b416f6bfc82469', NULL, '[\"*\"]', '2023-05-14 22:43:01', '2023-05-14 22:42:35', '2023-05-14 22:43:01'),
(62, 'App\\Models\\Patient', 25, 'myapptoken', '380b7b6bf28e616012a12076e35b1ca81b284f8edcc419793671d5476c7232b3', NULL, '[\"*\"]', '2023-05-19 02:44:44', '2023-05-15 04:52:36', '2023-05-19 02:44:44'),
(63, 'App\\Models\\Patient', 25, 'myapptoken', 'e537ea14bbdb29af3c44b1b62a52ff594bfdf7e74bac7b47c10fce0905005ed6', NULL, '[\"*\"]', '2023-05-15 05:21:26', '2023-05-15 05:07:42', '2023-05-15 05:21:26'),
(64, 'App\\Models\\Patient', 25, 'myapptoken', '716139851731864bf68d2532d0a9047022b724088e1c4e961abd04e8ad4f491e', NULL, '[\"*\"]', NULL, '2023-05-15 20:41:01', '2023-05-15 20:41:01'),
(65, 'App\\Models\\Patient', 24, 'myapptoken', '325df1fea7ae96af22222911253f86d17a17e1e3a1d819f08c564a668da070a7', NULL, '[\"*\"]', '2023-05-15 21:33:17', '2023-05-15 21:20:33', '2023-05-15 21:33:17'),
(66, 'App\\Models\\Patient', 25, 'myapptoken', 'e013ada05751fc68a52031a6779c60ba328ca013f11b766e678a998c55aee85f', NULL, '[\"*\"]', NULL, '2023-05-15 22:23:27', '2023-05-15 22:23:27'),
(67, 'App\\Models\\Patient', 25, 'myapptoken', '413b93bf9b4435988eacd890e2b5f02b1cee32bd67c4410eea92b129ca9644f2', NULL, '[\"*\"]', '2023-05-15 22:31:14', '2023-05-15 22:30:54', '2023-05-15 22:31:14'),
(68, 'App\\Models\\Patient', 25, 'myapptoken', 'fa39216108622066c4f84843c9892839eb0187bb7236421dfc4088c2f35f0526', NULL, '[\"*\"]', '2023-05-16 14:57:45', '2023-05-16 14:40:02', '2023-05-16 14:57:45'),
(70, 'App\\Models\\Patient', 25, 'myapptoken', 'cf15cc3d7cdc5f6245eb11ec4e3c1579b367932c3abab432bbc81407f27da91a', NULL, '[\"*\"]', '2023-05-22 06:44:06', '2023-05-19 01:50:56', '2023-05-22 06:44:06'),
(72, 'App\\Models\\Patient', 27, 'myapptoken', 'c976fb732dac4bf00bfe3bfd38b44f6bee0067b881057c05636c3a9edeb270df', NULL, '[\"*\"]', NULL, '2023-05-20 17:24:11', '2023-05-20 17:24:11'),
(73, 'App\\Models\\Patient', 25, 'myapptoken', '80f4504c5509052e6093cf1a5994496cf9f428d10097c104f6115fedd2030466', NULL, '[\"*\"]', '2023-05-21 04:45:30', '2023-05-21 04:34:27', '2023-05-21 04:45:30'),
(74, 'App\\Models\\Patient', 25, 'myapptoken', '8947510871b60f013f96dfd85fb773411caeea92fc1f36b578df1742e0b83273', NULL, '[\"*\"]', '2023-05-22 06:58:00', '2023-05-21 05:50:33', '2023-05-22 06:58:00'),
(75, 'App\\Models\\Doctor', 9, 'doctorToken', 'ad18a5c7000eff1bef094cbde2d388ad12e9dba971b05c8aa3793d8118d9f4a6', NULL, '[\"*\"]', NULL, '2023-05-22 00:48:23', '2023-05-22 00:48:23'),
(76, 'App\\Models\\Doctor', 10, 'doctorToken', '39985d0c0bb6c7aef142d285f38cab836c28067bcd4a5c95b502124b8f10c9de', NULL, '[\"*\"]', NULL, '2023-05-22 00:50:28', '2023-05-22 00:50:28'),
(77, 'App\\Models\\Doctor', 10, 'doctorToken', 'f40d0b2a719880e70d29b7560e1ec1b83c65ae326fc6df84f5174f0bb2dfbeb2', NULL, '[\"*\"]', NULL, '2023-05-22 00:51:01', '2023-05-22 00:51:01'),
(78, 'App\\Models\\Doctor', 10, 'doctorToken', '06ee77972eb5d502836334365035bd42f1bb194995f98e990cb9a3e16c859ba2', NULL, '[\"*\"]', '2023-05-23 00:18:08', '2023-05-22 23:38:28', '2023-05-23 00:18:08'),
(79, 'App\\Models\\Doctor', 10, 'doctorToken', '23ca19066f379b2f10d67b0e0e77feb682659ea84c6055a1fc64a1d45c22cd62', NULL, '[\"*\"]', NULL, '2023-05-23 06:08:35', '2023-05-23 06:08:35'),
(80, 'App\\Models\\Doctor', 10, 'doctorToken', '6a382d31ac7f1dad635b01197a10ba8fe19fa079219bc5f6959bd1f57a94e846', NULL, '[\"*\"]', NULL, '2023-05-23 06:37:07', '2023-05-23 06:37:07'),
(81, 'App\\Models\\Doctor', 10, 'doctorToken', '82016474ec0dc2db8c1cf7fac4024abbcd3513820312be5c63bc897dccf9bb61', NULL, '[\"*\"]', NULL, '2023-05-23 06:37:07', '2023-05-23 06:37:07'),
(82, 'App\\Models\\Doctor', 10, 'doctorToken', '8abd2c02115d600470b8240369c5a097387d2d527be30d8c24696b18407aa4a6', NULL, '[\"*\"]', NULL, '2023-05-23 06:43:34', '2023-05-23 06:43:34'),
(83, 'App\\Models\\Doctor', 10, 'doctorToken', '763072f3c5b8e4c098fb03fbae3cf5d88a136785e03171d6edec5a9f849fb8e2', NULL, '[\"*\"]', NULL, '2023-05-23 06:46:58', '2023-05-23 06:46:58'),
(84, 'App\\Models\\Doctor', 10, 'doctorToken', '187f6f93ce2e7397dede5a685d7487fef67510eb3d728bfb4a207e5e37373097', NULL, '[\"*\"]', NULL, '2023-05-23 06:47:31', '2023-05-23 06:47:31'),
(85, 'App\\Models\\Doctor', 10, 'doctorToken', 'fbec8ceeddeec635d4c7a09a93ecb4e6448006c5cec0db320bb782d83b0242d9', NULL, '[\"*\"]', NULL, '2023-05-23 06:50:41', '2023-05-23 06:50:41'),
(86, 'App\\Models\\Doctor', 10, 'doctorToken', 'ff3c69e19a9557b254a2fe1f746bea2f13902507fa3c767a7f35a47308906206', NULL, '[\"*\"]', NULL, '2023-05-23 06:52:51', '2023-05-23 06:52:51'),
(87, 'App\\Models\\Patient', 25, 'myapptoken', '9e2d3e3c3371e5949a4c8a3895ed49312bd304e1472054c635e4249a8c72ef37', NULL, '[\"*\"]', '2023-05-24 02:31:56', '2023-05-23 06:53:59', '2023-05-24 02:31:56'),
(89, 'App\\Models\\Patient', 25, 'myapptoken', '278dcd746a04ef368bea33e42172dfce859f5f0cbbd2f9e124876d752a1a8968', NULL, '[\"*\"]', NULL, '2023-05-23 07:27:36', '2023-05-23 07:27:36'),
(91, 'App\\Models\\Patient', 25, 'myapptoken', '9d24b31320043094c96494024078d6b2b9ec089df3df69134ef5c15ee07a174e', NULL, '[\"*\"]', NULL, '2023-05-23 07:29:44', '2023-05-23 07:29:44'),
(93, 'App\\Models\\Doctor', 10, 'doctorToken', 'ae6ee0b4d84f9cb63865af92168d34db063005363eadf1dc25647f587f3d478f', NULL, '[\"*\"]', NULL, '2023-05-23 09:00:30', '2023-05-23 09:00:30'),
(94, 'App\\Models\\Doctor', 10, 'doctorToken', 'f70df1eb3ad7bf21da8fff1b9ebff2a702f7cf3bfd74e98a4c729ba86e97dc11', NULL, '[\"*\"]', NULL, '2023-05-23 09:00:30', '2023-05-23 09:00:30'),
(95, 'App\\Models\\Doctor', 10, 'doctorToken', 'da64122670f598f6e20c3f2b8e38a0956ca6e2b5e9d2a45c091fc14bb14d7c4f', NULL, '[\"*\"]', NULL, '2023-05-23 09:00:30', '2023-05-23 09:00:30'),
(96, 'App\\Models\\Doctor', 10, 'doctorToken', '6f2c9fbbb53bbd882f46e897e53b4d25ff332423d0f35e51771e282cf2ad0bd3', NULL, '[\"*\"]', NULL, '2023-05-23 09:00:30', '2023-05-23 09:00:30'),
(98, 'App\\Models\\Doctor', 10, 'doctorToken', '83001c209ff74279e9bab33880c13481e04d2c4f01318924b9e969ff556157d4', NULL, '[\"*\"]', '2023-06-06 11:25:02', '2023-05-24 02:45:45', '2023-06-06 11:25:02'),
(99, 'App\\Models\\Doctor', 10, 'doctorToken', 'a5d3b720b6924a8f275bae968c4731b82152903a48fd854ce9b8fc0ce6985695', NULL, '[\"*\"]', '2023-05-25 04:02:37', '2023-05-24 10:04:23', '2023-05-25 04:02:37'),
(102, 'App\\Models\\Doctor', 10, 'doctorToken', 'ab44823330a6cce51f773e5ebdf3efab5133f2276f5ea8e3c10332f7e123e8ca', NULL, '[\"*\"]', NULL, '2023-05-24 13:07:12', '2023-05-24 13:07:12'),
(103, 'App\\Models\\Doctor', 10, 'doctorToken', 'fbd63fbe965149a8a8a7a342bfb9ffccbb4fc4e002fe5963992beb55e654fcf4', NULL, '[\"*\"]', NULL, '2023-05-24 14:58:11', '2023-05-24 14:58:11'),
(104, 'App\\Models\\Doctor', 10, 'doctorToken', '042277cd103c9ac2427944a9b259dc75c7cef59407f271234dfe96f5e53e91d7', NULL, '[\"*\"]', NULL, '2023-05-24 15:02:32', '2023-05-24 15:02:32'),
(113, 'App\\Models\\Doctor', 10, 'doctorToken', '07e2d2cd9ab52fb5867f8ccf64362258d801ea7dfac1216454dc827a6767b3b5', NULL, '[\"*\"]', '2023-05-25 06:03:44', '2023-05-25 05:53:12', '2023-05-25 06:03:44'),
(117, 'App\\Models\\Doctor', 10, 'doctorToken', '55452059b245cbde2509a2008e459e03a6858e445272fc067b46f4f65f37bb55', NULL, '[\"*\"]', NULL, '2023-05-25 10:09:36', '2023-05-25 10:09:36'),
(118, 'App\\Models\\Doctor', 10, 'doctorToken', '71f751cb208adb9ba59782356705c7a18ed9ecffdd4bd3c8e096661d8ead3f1b', NULL, '[\"*\"]', '2023-05-27 18:39:29', '2023-05-25 10:11:18', '2023-05-27 18:39:29'),
(119, 'App\\Models\\Doctor', 10, 'doctorToken', '50e880679445ecef7bf9984bab1e7574f32ca62c2489451f231b093ab73d7a98', NULL, '[\"*\"]', NULL, '2023-05-25 10:14:48', '2023-05-25 10:14:48'),
(120, 'App\\Models\\Patient', 25, 'myapptoken', '4333d1584e50ddf6c4c28ace2c389d17b4571c894778d26fa362aff42f331a42', NULL, '[\"*\"]', '2023-05-25 14:13:01', '2023-05-25 14:11:52', '2023-05-25 14:13:01'),
(122, 'App\\Models\\Patient', 25, 'myapptoken', '227bc679e410ebbbc6e9621a9f4646bce9742f945ae7aaafdcf8637f5d9e78e1', NULL, '[\"*\"]', '2023-05-25 15:05:23', '2023-05-25 15:05:00', '2023-05-25 15:05:23'),
(123, 'App\\Models\\Patient', 25, 'myapptoken', '48b1153e151aa99daa9b032bf217f5274979475cda656c89855539d3fbb81615', NULL, '[\"*\"]', NULL, '2023-05-26 11:41:55', '2023-05-26 11:41:55'),
(128, 'App\\Models\\Patient', 25, 'myapptoken', '90689e538b22d1fc8441eda0af9db2d89c92842aaa78bde972be700e02c118f7', NULL, '[\"*\"]', '2023-05-26 16:22:37', '2023-05-26 16:21:52', '2023-05-26 16:22:37'),
(143, 'App\\Models\\Patient', 25, 'myapptoken', '255a905a38629cb1bc0720aa51ea574c28630e7463b500d305b4f003a30600d5', NULL, '[\"*\"]', '2023-05-27 18:59:27', '2023-05-27 08:24:30', '2023-05-27 18:59:27'),
(145, 'App\\Models\\Patient', 25, 'myapptoken', 'ee69df01b1e926866fa620e3a4123080738021cc642917c6306d7e8c5a03510f', NULL, '[\"*\"]', '2023-05-27 10:32:35', '2023-05-27 10:02:55', '2023-05-27 10:32:35'),
(147, 'App\\Models\\Doctor', 10, 'doctorToken', 'c56bee20660c2cbfa9cf267bdd8253763380bee37f0a0577b154dcf870cd6bdd', NULL, '[\"*\"]', '2023-05-27 20:52:30', '2023-05-27 19:00:43', '2023-05-27 20:52:30'),
(148, 'App\\Models\\Doctor', 10, 'doctorToken', 'aa4ddbd313306197562588107761643dbf961111c1f0e1deb3be08c44fe16b07', NULL, '[\"*\"]', '2023-06-06 13:25:17', '2023-05-27 20:12:29', '2023-06-06 13:25:17'),
(150, 'App\\Models\\Patient', 25, 'myapptoken', '2d0acd685899beb9213baea35cc8f14a2f2ca604b6b8c746cb3cc83e319d98af', NULL, '[\"*\"]', '2023-05-27 21:25:24', '2023-05-27 21:25:23', '2023-05-27 21:25:24'),
(160, 'App\\Models\\Patient', 25, 'myapptoken', '6a44320e3f8d8fbf20e34b9416d23bcba3577a5b6aaa7dc7ba472d92d2052b40', NULL, '[\"*\"]', '2023-05-28 07:19:19', '2023-05-28 07:17:13', '2023-05-28 07:19:19'),
(161, 'App\\Models\\Doctor', 10, 'doctorToken', '23caa865cd17ec191e4001a5e00e953c876a7fb475bfdf0c5d4eb4f1c088d2fd', NULL, '[\"*\"]', NULL, '2023-05-28 09:23:56', '2023-05-28 09:23:56'),
(162, 'App\\Models\\Doctor', 10, 'doctorToken', '83d2f75bb9a2f34f35818b4e68576ea4716a78acf80d8ac8a6e3bef12d30b715', NULL, '[\"*\"]', '2023-06-06 13:24:16', '2023-05-31 14:06:47', '2023-06-06 13:24:16'),
(163, 'App\\Models\\Patient', 25, 'myapptoken', '58140eb1caaf6b471abf56bb82bb299a4e67087c2878ef70d879227570704142', NULL, '[\"*\"]', '2023-06-06 20:19:46', '2023-06-01 13:56:05', '2023-06-06 20:19:46'),
(164, 'App\\Models\\Patient', 25, 'myapptoken', 'd4be2f78062d0d2c958c9cc31a2319e4e295a8bf5b6817d3dcb95a0a92e5e926', NULL, '[\"*\"]', '2023-06-06 19:28:41', '2023-06-06 13:08:35', '2023-06-06 19:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `files_url` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `patient_id`, `result`, `img`, `category_id`, `created_at`, `updated_at`, `notes`, `doctor_id`, `deleted_at`, `files_url`, `rate`) VALUES
(27, 25, 'noTumor', 'https://medical-brain-center.almostafabure.com/files/results/test.png.jpg', 13, '2023-05-21 07:19:16', '2023-05-21 07:19:22', 'No Tumor', 10, NULL, 'https://drive.google.com/drive/u/1/folders/18xbE1HV2_CG8G--x4kRxbe77sTB33jvS', 90),
(28, 26, 'noTumor', 'https://medical-brain-center.almostafabure.com/files/results/test.png.jpg', 13, '2023-05-24 02:48:25', NULL, NULL, 10, NULL, 'https://drive.google.com/drive/u/1/folders/18xbE1HV2_CG8G--x4kRxbe77sTB33jvS', 80);

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
(1, 'active_recaptcha', '1', NULL, '2023-04-24 07:30:24');

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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `img`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Super Admin', 'superadmin@admin.com', '2023-03-02 05:11:36', '1681904116WhatsApp Image 2023-04-12 at 10.40.51 PM.jpeg', '$2y$10$RZFkQRttLjVt.GPb7IIuhehnIvt5qsTfbh9XO6WhzOTXwaSyh.9eS', 's4f7T8cEWbu0uV51WqdLJQiKiUptgP0GqWhqzXAdgojG40kPdgHSKndhWqfS', '2023-03-02 05:11:36', '2023-05-21 22:22:17', NULL),
(32, 'magdy', 'mohamedmagdymohamed982@gmail.com', NULL, NULL, '$2y$10$FPqthWEL07Glt.qWffOrUeERCceU1.l877f6yJXXAm6m0i5EMRhN6', NULL, '2023-04-06 20:13:42', '2023-04-06 20:13:42', NULL),
(39, 'magdy', 'admin@admin.com', NULL, NULL, '$2y$10$Nd9rzuP0imld6rqmxDxz0ujY1/OXsJ1SF4mgeG9KF4LiAS7rwsLmS', NULL, '2023-04-14 09:52:17', '2023-04-20 09:52:53', NULL);

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
-- Indexes for table `doctor_dignoses`
--
ALTER TABLE `doctor_dignoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_dignoses_result_id_foreign` (`result_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor_dignoses`
--
ALTER TABLE `doctor_dignoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- Constraints for table `doctor_dignoses`
--
ALTER TABLE `doctor_dignoses`
  ADD CONSTRAINT `doctor_dignoses_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE;

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
