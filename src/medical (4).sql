-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 03:03 AM
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
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `phone`, `code`) VALUES
(1, 'mohamedmagdymohamed982@gmail.com', '$2y$10$pXezln8D2gWya94YJSThg.HGK6XfmxlAeLo/flxmdCIEtJmtc7tg2', 'public/files/doctor/1676856864communityIcon_4g1uo0kd87c61.png', NULL, NULL, '2023-02-19 23:47:36', '+201066018340', '37908');

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
(1, 'en', 'ali', 1, NULL, NULL),
(2, 'ar', 'علي', 1, NULL, NULL);

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
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, '2023_02_21_225745_create_locations_table', 7);

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
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `email`, `password`, `img`, `address`, `phone`, `code`, `date_of_birth`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed.dev.mohamed@gmail.com', '$2y$10$vEvASgjt.QZEKuEJTJADBeRguH305gxlo27oTsuRka1XZIZff8HuO', '1.jpg', 'Alex', '+201066018340', '91812', '2001-09-26 01:13:14', NULL, '39593', '2023-01-29 23:14:52', '2023-01-31 16:35:17'),
(21, 'mohamedmagdymohamed982@gmail.com', '$2y$10$OPjN.mNcP7eMMb3H6p3QoekJDTC5EX34g0ksFPBChfnC.OzgmQOcS', 'public/files/profile/1676402482192c0bda71b2fc4244de0c55073fdfcff24a4fd6.webp', NULL, '+201066018340', '33241', '2001-08-08 00:00:00', NULL, NULL, '2023-02-14 17:21:22', '2023-02-14 17:21:22');

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
(1, 21, 'en', 'dddd', 'ffffff', NULL, NULL),
(2, 21, 'ar', 'ةةةة', 'ببسيس', NULL, NULL);

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
(1, 'App\\Models\\Patient', 1, 'myapptoken', '245dbe8d491e413bf9f89165b350e4919658e1b1377475f17fa4798a84fbe676', NULL, '[\"*\"]', NULL, '2023-01-29 21:33:36', '2023-01-29 21:33:36'),
(2, 'App\\Models\\Patient', 1, 'myapptoken', 'c38e866145d488dcc94cf865b9aeb5fed0bc6d4846ce9a0d4d9d114d942a6a77', NULL, '[\"*\"]', '2023-01-29 21:36:35', '2023-01-29 21:36:22', '2023-01-29 21:36:35'),
(3, 'App\\Models\\Patient', 1, 'myapptoken', 'f096862d4255a3eeaddadb91bd09a1a55c866057e1456e6e9f287556dcc540be', NULL, '[\"*\"]', NULL, '2023-01-30 12:41:53', '2023-01-30 12:41:53'),
(4, 'App\\Models\\Patient', 1, 'myapptoken', 'f325d59de4b83542a981ba6b50910313bd4f6f7a368ce064f9844e980cc5347d', NULL, '[\"*\"]', '2023-01-31 15:25:13', '2023-01-31 15:16:59', '2023-01-31 15:25:13'),
(6, 'App\\Models\\Patient', 1, 'myapptoken', 'ba7d404d256d1cbd07c657f731f5d9043f6be1a60762a40294988f53f2a0e7c2', NULL, '[\"*\"]', NULL, '2023-01-31 15:52:08', '2023-01-31 15:52:08'),
(7, 'App\\Models\\Patient', 1, 'myapptoken', '71d6ceda473a303faac54fdb5c2f5686750620d7f3f785feba74648b03377481', NULL, '[\"*\"]', '2023-01-31 16:05:44', '2023-01-31 15:55:45', '2023-01-31 16:05:44'),
(8, 'App\\Models\\Patient', 1, 'myapptoken', '5ebdf8d8f3b2a8e3ce59329e845e9fad6604ad9b3b12112498d8cfbd7426aa82', NULL, '[\"*\"]', '2023-01-31 16:05:14', '2023-01-31 16:04:57', '2023-01-31 16:05:14'),
(9, 'App\\Models\\Patient', 1, 'myapptoken', '3773b588d50d1cadc16458ea99704fc89d3418b5d95e0ab13c9a02c123467f4d', NULL, '[\"*\"]', NULL, '2023-01-31 16:08:16', '2023-01-31 16:08:16'),
(10, 'App\\Models\\Patient', 1, 'myapptoken', 'c31f3d30a023d14b97624d0b158c1b0633ceb1e5a1f1cefee695f592618b4b4d', NULL, '[\"*\"]', NULL, '2023-01-31 16:32:05', '2023-01-31 16:32:05'),
(11, 'App\\Models\\Patient', 1, 'myapptoken', '713dc317eda38a6c4f09ab1c12683780ec4556b9daf4da89524f22e418fa5d92', NULL, '[\"*\"]', '2023-01-31 16:35:17', '2023-01-31 16:33:24', '2023-01-31 16:35:17'),
(12, 'App\\Models\\Patient', 1, 'myapptoken', 'de78ee06b9935aba659c660b331f37607d4dad81caf1aa99ccf542f8128274a7', NULL, '[\"*\"]', NULL, '2023-01-31 16:35:36', '2023-01-31 16:35:36'),
(13, 'App\\Models\\Patient', 1, 'myapptoken', '1dea636db0deabbbe06c9ffb5533986f330e6a45fbb3bcb63c4ef5fd62a327e1', NULL, '[\"*\"]', '2023-02-03 12:38:42', '2023-02-03 12:30:20', '2023-02-03 12:38:42'),
(14, 'App\\Models\\Patient', 19, 'myapptoken', '4c4e82ed53028e5c13b4a71e382c711c95e0a04d7a5e3ffaaa297b5679532c58', NULL, '[\"*\"]', NULL, '2023-02-12 22:51:51', '2023-02-12 22:51:51'),
(15, 'App\\Models\\Patient', 19, 'myapptoken', '598014fc1bef50de9231aeff63d8d15181a6ff1eb46702916420cd0273d31800', NULL, '[\"*\"]', '2023-02-13 22:30:24', '2023-02-13 22:28:35', '2023-02-13 22:30:24'),
(16, 'App\\Models\\Patient', 19, 'myapptoken', '23cbca58576e140c05d40423992200735c87febfb6d81ddc8a11bbef250e8ef8', NULL, '[\"*\"]', '2023-02-14 17:39:34', '2023-02-14 17:27:36', '2023-02-14 17:39:34'),
(17, 'App\\Models\\Patient', 19, 'myapptoken', '5760c20a80ee909b5449ae73643254b787b98533b3874ddad818d59e7d318125', NULL, '[\"*\"]', '2023-02-14 22:21:22', '2023-02-14 22:12:44', '2023-02-14 22:21:22'),
(18, 'App\\Models\\Patient', 21, 'myapptoken', 'c8e30c00645625a720c5786c07a73f56cb16d29e920091f6cd63805297797cae', NULL, '[\"*\"]', '2023-02-14 22:27:11', '2023-02-14 22:22:34', '2023-02-14 22:27:11'),
(19, 'App\\Models\\Doctor', 1, 'doctorToken', 'd612505e95e57a22cba7af6f6c13ded4b15158b7b86d01db3fe3bfef856fe86e', NULL, '[\"*\"]', NULL, '2023-02-18 23:43:45', '2023-02-18 23:43:45'),
(20, 'App\\Models\\Doctor', 1, 'doctorToken', '3d49bc20957d8edcdf33fde504f2a2be9801fe98ee4bde880e74e4410485af24', NULL, '[\"*\"]', NULL, '2023-02-19 23:19:02', '2023-02-19 23:19:02'),
(22, 'App\\Models\\Doctor', 1, 'doctorToken', '32f7a1f8dcb61c0984437b7f1ef22dd7083fe4abe32e08b7aabbda3c5bc28eaf', NULL, '[\"*\"]', '2023-02-19 23:47:36', '2023-02-19 23:30:25', '2023-02-19 23:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `alzhimer_result` varchar(255) DEFAULT NULL,
  `brain_result` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alzhimer_rate` varchar(255) DEFAULT NULL,
  `brain_rate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `patient_id`, `alzhimer_result`, `brain_result`, `img`, `alzhimer_rate`, `brain_rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdsadas', 'sadad', 'asdad', 'asdas', 'asdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
  ADD KEY `pateint_id` (`patient_id`);

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
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient_translations`
--
ALTER TABLE `patient_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
