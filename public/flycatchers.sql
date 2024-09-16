-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 01:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flycatchers`
--

-- --------------------------------------------------------

--
-- Table structure for table `biometrics`
--

CREATE TABLE `biometrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biometrics`
--

INSERT INTO `biometrics` (`id`, `user_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 3, '/storage/uploads/biometric/biometric-vMWu61MNci.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44'),
(2, 3, '/storage/uploads/biometric/biometric-Aof55IkmYP.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Local', 'local', '2024-08-30 18:23:33', NULL),
(2, 'International', 'international', '2024-08-30 18:23:33', NULL),
(3, 'Others', 'others', '2024-08-30 18:23:33', NULL);

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2024_06_05_140555_create_roles_table', 1),
(34, '2024_06_06_094412_create_categories_table', 1),
(35, '2024_08_30_165804_create_needs_table', 1),
(36, '2024_08_30_170802_create_payslips_table', 1),
(37, '2024_08_30_171523_create_biometrics_table', 1),
(38, '2024_08_30_172413_create_other_docs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `need` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`id`, `user_id`, `need`, `created_at`, `updated_at`) VALUES
(1, 2, 'Food', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(2, 2, 'Housing', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(3, 2, 'Clothing', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(7, 3, 'Food', '2024-08-31 22:05:44', '2024-08-31 22:05:44'),
(8, 3, 'Housing', '2024-08-31 22:05:44', '2024-08-31 22:05:44'),
(9, 3, 'Clothing', '2024-08-31 22:05:44', '2024-08-31 22:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `other_docs`
--

CREATE TABLE `other_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_docs`
--

INSERT INTO `other_docs` (`id`, `user_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 2, '/storage/uploads/biometric/biometric-eLbfAi4Asr.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(2, 2, '/storage/uploads/biometric/biometric-eLbfAi4Asr.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(3, 2, '/storage/uploads/biometric/biometric-eLbfAi4Asr.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(4, 3, '/storage/uploads/biometric/biometric-Aof55IkmYP.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44'),
(5, 3, '/storage/uploads/biometric/biometric-Aof55IkmYP.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44'),
(6, 3, '/storage/uploads/biometric/biometric-Aof55IkmYP.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44');

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
-- Table structure for table `payslips`
--

CREATE TABLE `payslips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslips`
--

INSERT INTO `payslips` (`id`, `user_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 2, '/storage/uploads/payslip/Payslip-JZViBDOIGr.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(2, 2, '/storage/uploads/payslip/Payslip-tYhWCiEXjw.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(3, 2, '/storage/uploads/payslip/Payslip-ZXCqRmxECb.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(4, 2, '/storage/uploads/biometric/biometric-VcD14rGkkt.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(5, 2, '/storage/uploads/biometric/biometric-eLbfAi4Asr.jpg', '2024-08-30 18:26:37', '2024-08-30 18:26:37'),
(6, 3, '/storage/uploads/payslip/Payslip-BQm9aRuTWE.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44'),
(7, 3, '/storage/uploads/payslip/Payslip-DfjFxItJND.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44'),
(8, 3, '/storage/uploads/payslip/Payslip-NFOYgfdtk0.jpg', '2024-08-30 18:29:44', '2024-08-30 18:29:44');

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
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', NULL, NULL),
(2, 'Admin', 'admin', NULL, NULL),
(3, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `workplace` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nok_name` varchar(255) DEFAULT NULL,
  `nok_email` varchar(255) DEFAULT NULL,
  `nok_phone_no` varchar(255) DEFAULT NULL,
  `nok_address` varchar(255) DEFAULT NULL,
  `cos` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `registered_by` varchar(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `category_id`, `role_id`, `address`, `phone_no`, `workplace`, `state`, `country`, `dob`, `nok_name`, `nok_email`, `nok_phone_no`, `nok_address`, `cos`, `comment`, `password`, `status`, `registered_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Denison John', 'superadmin@flycatchers.com', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0', '', NULL, '2024-08-30 18:26:37', NULL),
(2, 'Segun Adekanmi', 'ezekialafolabi11@gmail.com', NULL, 1, 3, 'Gwarinpa Abuja', '0806353453', 'Access Solutions', 'FCT Abuja', 'Nigeria', '1998-06-10', 'Segun Adekanmi', 'ezekialafolabi11@gmail.com', '0806353453', 'Gwarinpa Abuja', '/storage/uploads/cos/cos-umlPMLQ3QS.jpg', 'Testing comment', NULL, '0', '', NULL, '2024-08-30 18:26:37', '2024-08-31 09:18:51'),
(3, 'Segun Adekanmi', 'ezekialafolabi112@gmail.com', NULL, 1, 3, 'Gwarinpa Abuja', '0806353453', 'Access Solutions', 'FCT Abuja', 'Nigeria', '1998-06-10', 'Segun Adekanmi', 'ezekialafolabi113@gmail.com', '0806353453', 'Gwarinpa Abuja', NULL, 'Testing commentssssszzzzmm', NULL, '1', '1', NULL, '2024-08-30 18:29:44', '2024-08-31 22:05:44'),
(4, 'Michael Peters', 'admin@flycatchers.com', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$DHUENpAF1fvOVWridyZJoe9fkThxMJVMgzbYnfw1.075/4V2cfib.', '0', '', NULL, '2024-08-31 19:08:06', '2024-08-31 19:08:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biometrics`
--
ALTER TABLE `biometrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biometrics_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `needs_user_id_foreign` (`user_id`);

--
-- Indexes for table `other_docs`
--
ALTER TABLE `other_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_docs_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payslips`
--
ALTER TABLE `payslips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payslips_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `biometrics`
--
ALTER TABLE `biometrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `other_docs`
--
ALTER TABLE `other_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payslips`
--
ALTER TABLE `payslips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biometrics`
--
ALTER TABLE `biometrics`
  ADD CONSTRAINT `biometrics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `needs`
--
ALTER TABLE `needs`
  ADD CONSTRAINT `needs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `other_docs`
--
ALTER TABLE `other_docs`
  ADD CONSTRAINT `other_docs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payslips`
--
ALTER TABLE `payslips`
  ADD CONSTRAINT `payslips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
