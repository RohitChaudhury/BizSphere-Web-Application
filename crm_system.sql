-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 25, 2023 at 06:57 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `day_end_report`
--

CREATE TABLE `day_end_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completion_weightage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_member_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_lead_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_id` bigint(20) DEFAULT NULL,
  `manager_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_end_report`
--

INSERT INTO `day_end_report` (`id`, `user_id`, `project_id`, `module_id`, `completion_weightage`, `team_member_comment`, `team_lead_comment`, `lead_id`, `manager_comment`, `approval_status`, `created_at`, `updated_at`) VALUES
(2, NULL, '2', '10', '20', 'Done', NULL, NULL, 'bjuuctufgyuig', NULL, '2023-03-09 03:41:01', '2023-03-22 11:33:30'),
(4, '46', '4', '16', '20', 'check', 'badd', NULL, 'ok', '0', '2023-03-22 11:59:49', '2023-03-31 00:16:12'),
(5, '46', '4', '16', '20', 'this is a comment full stack 12 project', 'jiofihqohoqw', NULL, 'vhvi', '1', '2023-03-25 12:24:44', '2023-03-31 00:16:12'),
(6, '46', '7', '23', '20', 'nbiib\'ibbvuvuvuuvuv', 'iabvava', NULL, 'ok', '0', '2023-03-25 13:34:46', '2023-03-31 00:20:26'),
(7, '46', '4', '16', '20', 'njbugog', 'ok', NULL, NULL, '1', '2023-03-26 04:29:35', '2023-03-31 00:16:12'),
(8, '46', '4', '16', '20', '20% done', 'ok', NULL, 'good everyone', '1', '2023-03-26 16:47:32', '2023-03-31 00:16:12'),
(9, NULL, '2', '18', '20', '20% done by casey', 'ok', NULL, NULL, '1', '2023-03-27 07:40:06', '2023-03-27 07:44:37'),
(11, '54', '7', '23', '20', '20% Don on CRM app', NULL, NULL, 'Add comment', '1', '2023-03-27 07:48:28', '2023-04-13 16:57:41'),
(12, '54', '2', '9', '20', 'Done', 'good', NULL, 'Well done', '1', '2023-03-27 08:44:40', '2023-04-13 16:57:41'),
(13, '57', '4', '16', '20', 'I have Completed 20%', 'Ok i approved', NULL, NULL, '1', '2023-03-30 14:05:34', '2023-03-31 00:16:06'),
(14, '57', '7', '29', '20', 'dfbdfbdfbgdfs', NULL, NULL, NULL, NULL, '2023-03-30 14:15:13', '2023-03-31 00:16:06'),
(15, '57', '7', '29', '20', 'breberherqh', NULL, NULL, NULL, NULL, '2023-03-30 14:15:23', '2023-03-31 00:16:06'),
(16, '57', '4', '24', '20', 'ebetrh', NULL, NULL, NULL, NULL, '2023-03-30 14:15:36', '2023-03-31 00:16:06'),
(17, '46', '4', '24', '20', 'vubuvfqeof', NULL, 48, NULL, '1', '2023-03-31 00:24:03', '2023-03-31 00:24:35'),
(19, '46', '7', '28', '20', 'vhvkul', NULL, 48, NULL, '1', '2023-03-31 04:05:19', '2023-04-01 08:41:09'),
(20, '46', '7', '29', '20', 'Clear upto 20% of the Module', 'k;noop', 48, NULL, '1', '2023-04-13 20:43:29', '2023-04-14 13:03:40'),
(21, '46', '4', '24', '20', 'Done upto 20%', NULL, 48, NULL, NULL, '2023-04-13 20:44:05', '2023-04-13 20:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_28_175223_project', 2),
(19, '2023_01_28_175223_create_project_table', 3),
(20, '2023_01_29_164304_create_project_modules_table', 3),
(21, '2023_01_21_133210_create_roles_table', 4),
(22, '2023_02_12_014037_create_reporting_managers_table', 5),
(23, '2023_02_18_215948_create_project_assigns_table', 6),
(25, '2023_02_19_223007_create_day_end_reoprt_table', 7);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_manager_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completion_percentage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00',
  `estimated_end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_manager_id`, `project_details`, `completion_percentage`, `estimated_end_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Full stack development', '1', 'using Backend db as MySQL', '52', '2023-02-10', 1, '2023-02-10 05:17:28', '2023-03-31 05:00:58'),
(3, 'full stack development project', '1', 'tzxtygilh', '45', '2023-02-25', 1, '2023-02-21 04:35:40', '2023-03-26 05:16:39'),
(4, 'Full-stack Project 12', '1', 'qvvwvvwberbet', '46', '2023-03-13', 1, '2023-03-04 04:06:05', '2023-04-14 14:30:23'),
(5, 'data project', '1', 'dgvdfsghrshgdfrsghdfrs', '0', '2023-03-07', 1, '2023-03-07 10:46:57', '2023-03-25 10:27:42'),
(7, 'Crm app', '1', 'this is a crm app', '52', '2023-03-28', 1, '2023-03-25 10:28:48', '2023-04-14 14:30:23'),
(8, 'Demo Project', '1', 'This is a demo project for the test', '30', '2023-03-28', 1, '2023-03-26 16:28:53', '2023-03-26 16:37:49'),
(9, 'Uber app', '1', 'This is a cab app', '0', '2023-03-31', 1, '2023-03-30 13:57:32', '2023-03-30 14:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_assigns`
--

CREATE TABLE `project_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_assigns`
--

INSERT INTO `project_assigns` (`id`, `project_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 48, '1', '2023-03-25 12:09:17', '2023-03-25 12:09:17'),
(6, 7, 48, '1', '2023-03-26 04:25:46', '2023-03-26 04:25:46'),
(7, 8, 48, '1', '2023-03-26 16:30:00', '2023-03-26 16:30:00'),
(10, 2, 55, '1', '2023-03-27 08:43:54', '2023-03-27 08:43:54'),
(11, 5, 55, '1', '2023-03-27 08:44:08', '2023-03-27 08:44:08'),
(12, 9, 56, '1', '2023-03-30 13:59:38', '2023-03-30 13:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_modules`
--

CREATE TABLE `project_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_weightage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `completion_percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0%',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_modules`
--

INSERT INTO `project_modules` (`id`, `module_name`, `project_id`, `module_weightage`, `completion_percentage`, `created_at`, `updated_at`) VALUES
(9, 'Post', '2', '20', '60', '2023-02-24 16:00:12', '2023-03-27 08:44:40'),
(11, 'Post', '3', '20', '30', '2023-03-18 14:28:31', '2023-03-18 14:31:34'),
(12, 'comments', '3', '20', '60', '2023-03-18 14:31:12', '2023-03-18 14:31:12'),
(14, 'Post', '6', '20', '30', '2023-03-20 05:28:40', '2023-03-22 11:53:59'),
(16, 'Post', '4', '100', '60', '2023-03-22 11:49:10', '2023-03-30 14:05:34'),
(17, 'comments', '2', '20', '60', '2023-03-25 10:01:41', '2023-03-25 10:01:41'),
(18, 'User', '2', '20', '60', '2023-03-25 10:06:29', '2023-03-27 07:40:06'),
(23, 'User', '7', '20', '40', '2023-03-25 13:34:17', '2023-03-27 07:48:28'),
(24, 'User', '4', '20', '60', '2023-03-26 05:38:04', '2023-04-13 20:44:05'),
(25, 'User', '4', '20', '20', '2023-03-26 12:29:52', '2023-03-26 13:12:37'),
(26, 'User', '8', '20', '40', '2023-03-26 16:31:08', '2023-03-26 16:32:08'),
(27, 'User', '8', '20', '20', '2023-03-26 16:36:33', '2023-03-26 16:36:33'),
(28, 'User', '7', '20', '80', '2023-03-26 16:39:13', '2023-03-31 04:05:19'),
(29, 'comments', '7', '20', '70', '2023-03-26 16:39:42', '2023-04-13 20:43:29'),
(30, 'User', '7', '20', '20', '2023-03-26 16:40:02', '2023-03-26 16:40:02'),
(31, 'User', '9', '20', '00', '2023-03-30 14:02:12', '2023-03-30 14:02:12'),
(32, 'comments', '2', '20', '20', '2023-03-31 00:51:51', '2023-03-31 00:51:51'),
(33, 'comments', '2', '20', '60', '2023-03-31 05:00:16', '2023-03-31 05:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `reporting_managers`
--

CREATE TABLE `reporting_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reporting_user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reporting_managers`
--

INSERT INTO `reporting_managers` (`id`, `user_id`, `reporting_user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 24, 48, '1', '2023-03-25 11:26:32', '2023-03-25 11:26:32'),
(25, 46, 48, '1', '2023-03-31 00:22:30', '2023-03-31 00:22:30'),
(27, 52, 48, '1', '2023-04-13 16:57:54', '2023-04-13 16:57:54'),
(28, 54, 48, '1', '2023-04-13 16:57:54', '2023-04-13 16:57:54'),
(29, 57, 48, '1', '2023-04-13 16:57:54', '2023-04-13 16:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Project Manager', 1, '2023-02-12 01:46:33', '2023-02-12 01:46:33'),
(2, 'Team Lead', 1, '2023-02-12 01:47:25', '2023-02-12 01:47:25'),
(3, 'Developer', 1, '2023-02-12 01:48:16', '2023-02-12 01:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `forgot_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `phone`, `password`, `status`, `forgot_hash`, `created_at`, `updated_at`) VALUES
(1, 'manager_name', '1', 'rohit2000uall@gmail.com', '7439173902', '$2y$10$nlCIG3p0RQZxRnEJyuarCOfsiaOsHzmB7qqrM3pBhc6TWAuCsITM.', 1, NULL, NULL, '2023-04-10 00:27:10'),
(46, 'Developer_name', '3', 'rayan@gmail.com', '09433465786', '$2y$10$1al.jdcJkjajlFpPaecEAOs3L4EmJpBHCUusqUk4khoPJB2R3rJha', 1, NULL, '2023-03-22 10:27:47', '2023-04-14 14:28:12'),
(48, 'Team_lead_name', '2', 'john@gmail.com', '9433465786', '$2y$10$u7DhCml/6dbfNsrtM6B9ZO8L7fKt4vDssUXchi66SrUiDLil/U3jC', 1, NULL, '2023-03-25 11:26:20', '2023-04-13 15:47:32'),
(52, 'New Member', '3', 'new@gmail.com', '7439173902', '$2y$10$2j9hlM6l1SA1R7Wsm4l4BetRna1/JtisqKvgbxmjpnz2mRMLgzsm2', 0, NULL, '2023-03-26 05:05:45', '2023-04-10 18:13:13'),
(54, 'Casey Kane', '3', 'casey@gmail.com', '7439173902', '$2y$10$6UQgQuawebgx1/Mu8.JjJ../Z8.sP6HvIwOMlxxYOuawUQtK.t.tK', 1, NULL, '2023-03-27 07:45:37', '2023-03-27 09:07:29'),
(55, 'Ron', '2', 'ron@gmail.com', '7439173902', '$2y$10$ywC8/ehkhWGlgdIDUQtkm.U4EhYYHWG8v7Y0Nc1n2BYhoInSn5JaW', 1, NULL, '2023-03-27 07:50:26', '2023-03-27 07:50:26'),
(56, 'Kishore', '2', 'kishore@gmail.com', '7439173902', '$2y$10$iRx0tVNZ8ZYCQoaoN/78Vu2rRtSbNvaL/APfLUYLSeFGqKl9PyhLC', 1, NULL, '2023-03-30 13:47:55', '2023-03-30 13:47:55'),
(57, 'kyle', '3', 'kyle@gmail.com', '9433465786', '$2y$10$UrJqihmDc4ZE005PGESqTuNpHbKXxtcSPT244SanHFl.aBYwxLT/u', 1, NULL, '2023-03-30 13:49:54', '2023-03-30 13:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day_end_report`
--
ALTER TABLE `day_end_report`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_assigns`
--
ALTER TABLE `project_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_modules`
--
ALTER TABLE `project_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporting_managers`
--
ALTER TABLE `reporting_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `day_end_report`
--
ALTER TABLE `day_end_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_assigns`
--
ALTER TABLE `project_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_modules`
--
ALTER TABLE `project_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reporting_managers`
--
ALTER TABLE `reporting_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
