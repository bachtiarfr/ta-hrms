-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2022 at 08:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms-master-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_assets`
--

CREATE TABLE `assign_assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL,
  `authority_id` int(10) UNSIGNED NOT NULL,
  `date_of_assignment` date NOT NULL,
  `date_of_release` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_projects`
--

CREATE TABLE `assign_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_leader_id` int(10) UNSIGNED NOT NULL,
  `authority_id` int(10) UNSIGNED NOT NULL,
  `date_of_assignment` date NOT NULL,
  `date_of_release` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_projects`
--

INSERT INTO `assign_projects` (`id`, `project_id`, `user_id`, `project_leader_id`, `authority_id`, `date_of_assignment`, `date_of_release`, `created_at`, `updated_at`) VALUES
(8, 4, 35, 36, 1, '2022-02-01', '2022-02-12', '2022-02-04 18:05:55', '2022-02-04 18:05:55'),
(9, 4, 36, 36, 1, '2022-02-01', '2022-02-12', '2022-02-04 18:05:55', '2022-02-04 18:05:55'),
(10, 4, 37, 36, 1, '2022-02-01', '2022-02-12', '2022-02-04 18:05:55', '2022-02-04 18:05:55'),
(11, 3, 38, 39, 1, '2022-01-24', '2022-02-01', '2022-02-04 18:07:49', '2022-02-04 18:07:49'),
(12, 3, 45, 39, 1, '2022-01-24', '2022-02-01', '2022-02-04 18:07:49', '2022-02-04 18:07:49'),
(13, 2, 35, 35, 1, '2021-12-06', '2021-12-20', '2022-02-04 18:12:37', '2022-02-04 18:12:37'),
(14, 2, 36, 35, 1, '2021-12-06', '2021-12-20', '2022-02-04 18:12:37', '2022-02-04 18:12:37'),
(15, 2, 37, 35, 1, '2021-12-06', '2021-12-20', '2022-02-04 18:12:37', '2022-02-04 18:12:37'),
(16, 1, 45, 46, 1, '2022-02-02', '2022-02-12', '2022-02-04 18:13:49', '2022-02-04 18:13:49'),
(17, 1, 46, 46, 1, '2022-02-02', '2022-02-12', '2022-02-04 18:13:49', '2022-02-04 18:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_filenames`
--

CREATE TABLE `attendance_filenames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_managers`
--

CREATE TABLE `attendance_managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `hours_worked` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `difference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `leave_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awardees`
--

CREATE TABLE `awardees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `award_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `address`, `company`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Tibor', 'Netherland', 'Tibor.nl', 'TBR', NULL, NULL),
(2, 'Crebos', 'Netherland', 'Crebos Creative Studio', 'CRBS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formalities` tinyint(4) NOT NULL,
  `offer_acceptance` tinyint(4) NOT NULL,
  `probation_period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_confirmation` date NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_resignation` date NOT NULL,
  `notice_period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_working_day` date NOT NULL,
  `full_final` tinyint(4) NOT NULL,
  `attendance_points` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `photo`, `code`, `name`, `status`, `gender`, `date_of_birth`, `date_of_joining`, `number`, `qualification`, `emergency_number`, `father_name`, `current_address`, `permanent_address`, `formalities`, `offer_acceptance`, `probation_period`, `date_of_confirmation`, `department`, `salary`, `account_number`, `bank_name`, `date_of_resignation`, `notice_period`, `last_working_day`, `full_final`, `attendance_points`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '', 'HR0001', 'HR Manager', 1, 0, '0000-00-00', '2020-03-16', '9999999999', '', '', '', '', '', 0, 0, '', '0000-00-00', '', '10000', '', '', '0000-00-00', '', '0000-00-00', 0, 0, 1, NULL, NULL),
(11, 'photo_Bachtiar Fatur Rohim.jpg', 'BFR001', 'Bachtiar Fatur Rohim', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'D3', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 35, '2022-02-04 17:44:10', '2022-02-04 17:44:10'),
(12, 'photo_Dicky Saputra.jpg', 'DCK001', 'Dicky Saputra', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'SMA/SMK Sederajat', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 0, 0, 36, '2022-02-04 17:45:42', '2022-02-04 17:45:42'),
(13, 'photo_Andi Gusta.jpg', 'AND001', 'Andi Gusta', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 37, '2022-02-04 17:46:45', '2022-02-04 17:46:45'),
(14, 'photo_Tama.jpg', 'TMA001', 'Tama', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 38, '2022-02-04 17:47:47', '2022-02-04 17:47:47'),
(15, 'photo_Owen.jpg', 'OWN001', 'Owen', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 39, '2022-02-04 17:48:17', '2022-02-04 17:48:17'),
(16, 'photo_Biko.jpg', 'BKO001', 'Biko', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 43, '2022-02-04 17:49:19', '2022-02-04 17:49:19'),
(17, 'photo_Rizki.jpg', 'RZK001', 'Rizki', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 44, '2022-02-04 17:50:06', '2022-02-04 17:50:06'),
(18, 'photo_Anggit.jpg', 'ANG001', 'Anggit', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 45, '2022-02-04 17:50:28', '2022-02-04 17:50:28'),
(19, 'photo_Leo.jpg', 'LEO001', 'Leo', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 46, '2022-02-04 17:51:06', '2022-02-04 17:51:06'),
(20, 'photo_Riris Ayu.jpg', 'RRS001', 'Riris Ayu', 1, 0, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 47, '2022-02-04 17:51:36', '2022-02-04 17:51:36'),
(21, 'photo_Ummi.jpg', 'UMI001', 'Ummi', 1, 0, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 48, '2022-02-04 17:51:59', '2022-02-04 17:51:59'),
(22, 'photo_Agyl.jpg', 'AGL001', 'Agyl', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 49, '2022-02-04 17:52:31', '2022-02-04 17:52:31'),
(23, 'photo_Arief.jpg', 'ARF001', 'Arief', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 50, '2022-02-04 17:52:52', '2022-02-04 17:52:52'),
(24, 'photo_Ghulam.jpg', 'GLM001', 'Ghulam', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 51, '2022-02-04 17:53:15', '2022-02-04 17:53:15'),
(25, 'photo_Deden.jpg', 'DDN001', 'Deden', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 52, '2022-02-04 17:53:42', '2022-02-04 17:53:42'),
(26, 'photo_Herjun.jpg', 'HRJ001', 'Herjun', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 53, '2022-02-04 17:54:11', '2022-02-04 17:54:11'),
(27, 'photo_Nanda.jpg', 'NND001', 'Nanda', 1, 0, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 54, '2022-02-04 17:54:48', '2022-02-04 17:54:48'),
(28, 'photo_Monic.jpg', 'MNC001', 'Monic', 1, 0, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 55, '2022-02-04 17:55:07', '2022-02-04 17:55:07'),
(29, 'photo_Yvon.jpg', 'YVN001', 'Yvon', 1, 0, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 56, '2022-02-04 17:55:32', '2022-02-04 17:55:32'),
(30, 'photo_Zia.jpg', 'ZIA001', 'Zia', 1, 1, '2022-02-05', '2022-02-05', '0895334568841', 'S1', '0895334568841', 'John', 'Jl. One two three', 'cirebon', 0, 0, '', '0000-00-00', '', '5000000', '8083038', 'BNI', '0000-00-00', '', '0000-00-00', 1, 0, 57, '2022-02-04 17:55:53', '2022-02-04 17:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tl_id` int(10) UNSIGNED NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Unapproved, 1 = Approved',
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `user_id`, `tl_id`, `manager_id`, `leave_type_id`, `date_from`, `date_to`, `from_time`, `to_time`, `days`, `status`, `remarks`, `reason`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 0, 2, '2022-01-31', '2022-02-03', '09:30:00', '18:00:00', '3', 1, 'ok', 'pengen liburan', '2022-01-28 17:35:56', '2022-01-28 17:35:56'),
(3, 35, 0, 0, 1, '2022-02-07', '2022-02-09', '09:30:00', '18:00:00', '2', 1, 'oke', 'Sakit perut', '2022-02-04 18:16:07', '2022-02-04 18:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `employee_uploads`
--

CREATE TABLE `employee_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coordinator_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE `event_attendees` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `attendee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_purchase` date NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `occasion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_filenames`
--

CREATE TABLE `holiday_filenames` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applies`
--

CREATE TABLE `leave_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_drafts`
--

CREATE TABLE `leave_drafts` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_type`, `description`, `number_of_days`, `created_at`, `updated_at`) VALUES
(1, 'Sick leave', 'Sick leave', 6, NULL, NULL),
(2, 'Casual leave', 'Casual leave', 12, NULL, NULL),
(3, 'Maternity leave', 'Maternity leave', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type_applies`
--

CREATE TABLE `leave_type_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `leave_apply_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_uploads`
--

CREATE TABLE `leave_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coordinator_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_attendees`
--

CREATE TABLE `meeting_attendees` (
  `id` int(10) UNSIGNED NOT NULL,
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `attendee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_04_08_104008_create_profiles_table', 1),
(4, '2016_04_21_111604_create_roles_table', 1),
(5, '2016_04_21_111832_create_user_roles_table', 1),
(6, '2016_04_27_115938_create_employees_table', 1),
(7, '2016_05_04_123920_create_leave_types_table', 1),
(8, '2016_05_06_060806_create_leave_applies_table', 1),
(9, '2016_05_06_063627_create_leave_type_applies_table', 1),
(10, '2016_05_13_065329_create_teams_table', 1),
(11, '2016_05_30_051327_create_attendance_filenames_table', 1),
(12, '2016_05_30_051629_create_leave_uploads_table', 1),
(13, '2016_06_02_072217_create_employee_uploads_table', 1),
(14, '2016_06_02_111416_create_assets_table', 1),
(15, '2016_06_02_123731_create_assign_assets_table', 1),
(16, '2016_06_30_085514_create_leave_drafts_table', 1),
(17, '2016_06_30_090733_create_employee_leaves_table', 1),
(18, '2016_08_11_164621_create_attendance_manager_table', 1),
(19, '2016_08_14_000122_alter_table_attendance_manager_add_one_field', 1),
(20, '2016_08_27_001608_create_holidays_table', 1),
(21, '2016_08_28_151111_create_events_table', 1),
(22, '2016_08_28_151431_create_event_attendees_table', 1),
(23, '2016_08_29_130810_create_holiday_filenames', 1),
(24, '2016_09_07_182031_create_meetings_table', 1),
(25, '2016_09_07_182538_create_meeting_attendees', 1),
(26, '2016_12_05_210112_create_expenses_table', 1),
(27, '2016_12_06_102039_create_awards_table', 1),
(28, '2016_12_06_111217_create_awardees_table', 1),
(29, '2016_12_06_161800_create_training_programs_table', 1),
(30, '2016_12_06_170605_create_training_invites_table', 1),
(31, '2016_12_07_162939_create_promotions_table', 1),
(32, '2017_04_25_144352_create_posts_table', 1),
(33, '2017_04_25_144545_create_post_replies_table', 1),
(34, '2017_04_27_123435_create_clients_table', 1),
(35, '2017_04_27_131835_create_projects_table', 1),
(36, '2017_09_15_223652_create_assign_projects_table', 1),
(37, '2021_12_26_141059_create_remaining_leaves_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_replies`
--

CREATE TABLE `post_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0 = Running, 1 = Finished, 2 = Delayed',
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `code`, `status`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'Contoh Project Berjalan Baru', 'ini cuman contoh', 'TP01', 0, 1, '2022-01-26 15:39:30', '2022-01-26 15:39:30'),
(2, 'Contoh finished project', 'ini cuman contoh', 'TP01', 1, 2, '2022-01-26 15:47:36', '2022-01-26 15:47:36'),
(3, 'Contoh project delayed', 'description of contoh project delayed', 'PD01', 2, 1, '2022-01-31 15:29:49', '2022-02-04 18:11:40'),
(4, 'Test running project', 'test running project description', 'TEST001', 0, 1, '2022-02-04 17:58:56', '2022-02-04 17:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `old_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_salary` int(11) NOT NULL,
  `new_salary` int(11) NOT NULL,
  `date_of_promotion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remaining_leaves`
--

CREATE TABLE `remaining_leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `remaining_days` int(11) NOT NULL DEFAULT '12',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `remaining_leaves`
--

INSERT INTO `remaining_leaves` (`id`, `user_id`, `remaining_days`, `created_at`, `updated_at`) VALUES
(0, 35, 12, '2022-02-04 17:44:10', '2022-02-04 17:44:10'),
(0, 36, 12, '2022-02-04 17:45:42', '2022-02-04 17:45:42'),
(0, 37, 12, '2022-02-04 17:46:45', '2022-02-04 17:46:45'),
(0, 38, 12, '2022-02-04 17:47:47', '2022-02-04 17:47:47'),
(0, 39, 12, '2022-02-04 17:48:17', '2022-02-04 17:48:17'),
(0, 43, 12, '2022-02-04 17:49:19', '2022-02-04 17:49:19'),
(0, 44, 12, '2022-02-04 17:50:06', '2022-02-04 17:50:06'),
(0, 45, 12, '2022-02-04 17:50:28', '2022-02-04 17:50:28'),
(0, 46, 12, '2022-02-04 17:51:06', '2022-02-04 17:51:06'),
(0, 47, 12, '2022-02-04 17:51:36', '2022-02-04 17:51:36'),
(0, 48, 12, '2022-02-04 17:51:59', '2022-02-04 17:51:59'),
(0, 49, 12, '2022-02-04 17:52:31', '2022-02-04 17:52:31'),
(0, 50, 12, '2022-02-04 17:52:52', '2022-02-04 17:52:52'),
(0, 51, 12, '2022-02-04 17:53:15', '2022-02-04 17:53:15'),
(0, 52, 12, '2022-02-04 17:53:42', '2022-02-04 17:53:42'),
(0, 53, 12, '2022-02-04 17:54:11', '2022-02-04 17:54:11'),
(0, 54, 12, '2022-02-04 17:54:48', '2022-02-04 17:54:48'),
(0, 55, 12, '2022-02-04 17:55:07', '2022-02-04 17:55:07'),
(0, 56, 12, '2022-02-04 17:55:32', '2022-02-04 17:55:32'),
(0, 57, 12, '2022-02-04 17:55:53', '2022-02-04 17:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin | HR', 'Has all the rights', '2022-01-26 12:01:52', '2022-01-26 12:01:52'),
(2, 'Project Manager', 'Project Manager', '2022-01-26 12:01:52', '2022-01-26 12:01:52'),
(3, 'Front End', 'Front End Developer', '2022-01-26 12:01:52', '2022-02-04 07:29:22'),
(4, 'Back End', 'Back End Developer', '2022-01-26 12:01:52', '2022-02-04 07:29:36'),
(5, 'Designer', 'Designer', '2022-01-26 12:01:52', '2022-01-26 12:01:52'),
(6, 'Data Entry', 'Back End Developer', '2022-01-26 12:01:52', '2022-01-26 12:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` int(11) NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_invites`
--

CREATE TABLE `training_invites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE `training_programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'HR Manager', 'hr@demo.com', '$2y$10$E.umobcv8y5tQbnQY3Tg2O9KdW.u.XCZzczT3BXk5STn/gIaerqiS', '6wyxmggFiEUhZmryzWJrE7MXaXi5sqq5dHGFRFoqjn3jpNIYNIlpHMD4CrqR', NULL, NULL),
(35, 'Bachtiar Fatur Rohim', 'bachtiar@demo.com', '$2y$10$foVMLS4DPfKcO2pJwSAVM.lHPtTWt4ET0J/NPd66523E1pHdPDGGW', 'kMUqVJs0WCONUcUK9JKo2Ci7VUjEpSbilrhfPwVotmv2m56BkqXsRhGDMCYr', '2022-02-04 17:44:10', '2022-02-04 17:44:10'),
(36, 'Dicky Saputra', 'dicky@demo.com', '$2y$10$.FRXG4cbVHS/fdUEurZ2Kujama3wRYYUuvP4O7icNjIn0IbFXTJPm', NULL, '2022-02-04 17:45:42', '2022-02-04 17:45:42'),
(37, 'Andi Gusta', 'andi@demo.com', '$2y$10$vU//JImbprbIiCUSorkBC.Ev3GpbyXtiRk/Bd0TfpQvcli4cQaAdG', NULL, '2022-02-04 17:46:45', '2022-02-04 17:46:45'),
(38, 'Tama', 'tama@demo.com', '$2y$10$JVNUA9p6dMg1PnAgYmzaSeSmPSPOjvI1ZxBjWpPHs5aYnY7ZdYvt6', NULL, '2022-02-04 17:47:47', '2022-02-04 17:47:47'),
(39, 'Owen', 'owen@demo.com', '$2y$10$CbC2e3x0YovY2vagfRK51eGxGitK8GEgTk.hhh1BMZElcFwqcIg7i', NULL, '2022-02-04 17:48:17', '2022-02-04 17:48:17'),
(43, 'Biko', 'biko@demo.com', '$2y$10$LVW4W/r3zbc40QVASxtvsOAOox/xfYZKie7EHzUE5o0VPkPq6aoRK', NULL, '2022-02-04 17:49:19', '2022-02-04 17:49:19'),
(44, 'Rizki', 'rizki@demo.com', '$2y$10$HF0OoKDcqnHMSXKla.fxf.GRBN6472DHHMqKq/DiqnZWL3QYfbR7W', NULL, '2022-02-04 17:50:06', '2022-02-04 17:50:06'),
(45, 'Anggit', 'anggit@demo.com', '$2y$10$0IYatTu/jLpBG6vTeuDwpubTERPeLXflC.mXDO3EW4NP.PXemL8f2', NULL, '2022-02-04 17:50:28', '2022-02-04 17:50:28'),
(46, 'Leo', 'leo@demo.com', '$2y$10$gnbYXB6MnRUaCEQlWeCbLO.O7c71agrOBx5lZ4zmjO3a5rmLW5OtK', NULL, '2022-02-04 17:51:06', '2022-02-04 17:51:06'),
(47, 'Riris Ayu', 'riris@demo.com', '$2y$10$rExxg1ou/65WhDbyb7Wf7e5h1ioSwE4wWMdlZmEezyvRLkjKryCQy', 'Q1NgpAuZV2HJnD1heomryk4VWReXZnhvCKspCbN0P8MzSG4zJjJEVS1Btmvl', '2022-02-04 17:51:36', '2022-02-04 17:51:36'),
(48, 'Ummi', 'ummi@demo.com', '$2y$10$Lpmej1A/X3eCqVGBdcICPu1St9nq/Wj1/anhaNyP3.rzv2j3IHXoe', NULL, '2022-02-04 17:51:59', '2022-02-04 17:51:59'),
(49, 'Agyl', 'agyl@demo.com', '$2y$10$GWjHphBzGyjUovmye8GKEe.YDMCwFKi/yQVglTFOM.swjZ6B51iEK', NULL, '2022-02-04 17:52:31', '2022-02-04 17:52:31'),
(50, 'Arief', 'arief@demo.com', '$2y$10$x2kKHPkB5djJzRr4DsJ5H.PAGEPDVAuwbkgbDyJYFUTf/bmzPq9xq', NULL, '2022-02-04 17:52:52', '2022-02-04 17:52:52'),
(51, 'Ghulam', 'ghulam@demo.com', '$2y$10$wSViFQKCinabHr6NXRwOQullzfHSX2tH9qGpgRI2tZH0k/zQqpyLW', NULL, '2022-02-04 17:53:15', '2022-02-04 17:53:15'),
(52, 'Deden', 'deden@demo.com', '$2y$10$p2bPJ3RZzeCIpIRSZ53SBuCkNDg4xxUQc9VKiSV8.Gt4bD0RUwXs.', NULL, '2022-02-04 17:53:42', '2022-02-04 17:53:42'),
(53, 'Herjun', 'herjun@demo.com', '$2y$10$eL0.YAO2YeEvdYjMi5KsBeFuaJsUu8xZ5nDbatN2Y5djnF9Mq3lCy', NULL, '2022-02-04 17:54:11', '2022-02-04 17:54:11'),
(54, 'Nanda', 'nanda@demo.com', '$2y$10$cNzJxRpsF6C7abiNYNjAEugFiP3nHwtuG8e8GTd/CHIKSHctHW6I.', NULL, '2022-02-04 17:54:48', '2022-02-04 17:54:48'),
(55, 'Monic', 'monic@demo.com', '$2y$10$5B5NPd6BgeZ4n5tMZqD0JuFTWe.M4TRZ1iPK45bD2QqsSOvoKe7Ya', NULL, '2022-02-04 17:55:07', '2022-02-04 17:55:07'),
(56, 'Yvon', 'yvon@demo.com', '$2y$10$CCzCvvcr6bOfp8j9n2Cn4.kwEqqxpDRnoXoQ1SWZfCzvCo.UWPEOO', NULL, '2022-02-04 17:55:32', '2022-02-04 17:55:32'),
(57, 'Zia', 'zia@demo.com', '$2y$10$I4r.tVekz/2jMJtrKL.8vuqH1CjhjGBgMB7ykyofJd/UxcRhvf/ce', NULL, '2022-02-04 17:55:53', '2022-02-04 17:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-26 12:01:52', '2022-01-26 12:01:52'),
(11, 3, 35, '2022-02-04 17:44:10', '2022-02-04 17:44:10'),
(12, 3, 36, '2022-02-04 17:45:42', '2022-02-04 17:45:42'),
(13, 4, 37, '2022-02-04 17:46:45', '2022-02-04 17:46:45'),
(14, 3, 38, '2022-02-04 17:47:47', '2022-02-04 17:47:47'),
(15, 3, 39, '2022-02-04 17:48:17', '2022-02-04 17:48:17'),
(16, 3, 43, '2022-02-04 17:49:19', '2022-02-04 17:49:19'),
(17, 4, 44, '2022-02-04 17:50:06', '2022-02-04 17:50:06'),
(18, 4, 45, '2022-02-04 17:50:28', '2022-02-04 17:50:28'),
(19, 6, 46, '2022-02-04 17:51:06', '2022-02-04 17:51:06'),
(20, 6, 47, '2022-02-04 17:51:36', '2022-02-04 17:51:36'),
(21, 6, 48, '2022-02-04 17:51:59', '2022-02-04 17:51:59'),
(22, 5, 49, '2022-02-04 17:52:31', '2022-02-04 17:52:31'),
(23, 5, 50, '2022-02-04 17:52:52', '2022-02-04 17:52:52'),
(24, 5, 51, '2022-02-04 17:53:15', '2022-02-04 17:53:15'),
(25, 5, 52, '2022-02-04 17:53:42', '2022-02-04 17:53:42'),
(26, 5, 53, '2022-02-04 17:54:11', '2022-02-04 17:54:11'),
(27, 6, 54, '2022-02-04 17:54:48', '2022-02-04 17:54:48'),
(28, 6, 55, '2022-02-04 17:55:07', '2022-02-04 17:55:07'),
(29, 2, 56, '2022-02-04 17:55:32', '2022-02-04 17:55:32'),
(30, 2, 57, '2022-02-04 17:55:53', '2022-02-04 17:55:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_assets`
--
ALTER TABLE `assign_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_assets_user_id_foreign` (`user_id`),
  ADD KEY `assign_assets_asset_id_foreign` (`asset_id`),
  ADD KEY `assign_assets_authority_id_foreign` (`authority_id`);

--
-- Indexes for table `assign_projects`
--
ALTER TABLE `assign_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_projects_user_id_foreign` (`user_id`),
  ADD KEY `assign_projects_project_leader_id_foreign` (`project_leader_id`),
  ADD KEY `assign_projects_project_id_foreign` (`project_id`),
  ADD KEY `assign_projects_authority_id_foreign` (`authority_id`);

--
-- Indexes for table `attendance_filenames`
--
ALTER TABLE `attendance_filenames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_managers`
--
ALTER TABLE `attendance_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_managers_user_id_foreign` (`user_id`);

--
-- Indexes for table `awardees`
--
ALTER TABLE `awardees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awardees_award_id_foreign` (`award_id`),
  ADD KEY `awardees_user_id_foreign` (`user_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_leaves_user_id_foreign` (`user_id`),
  ADD KEY `employee_leaves_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `employee_uploads`
--
ALTER TABLE `employee_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_coordinator_id_foreign` (`coordinator_id`);

--
-- Indexes for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_attendees_event_id_foreign` (`event_id`),
  ADD KEY `event_attendees_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_filenames`
--
ALTER TABLE `holiday_filenames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applies`
--
ALTER TABLE `leave_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_drafts`
--
ALTER TABLE `leave_drafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_drafts_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type_applies`
--
ALTER TABLE `leave_type_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_type_applies_leave_type_id_foreign` (`leave_type_id`),
  ADD KEY `leave_type_applies_leave_apply_id_foreign` (`leave_apply_id`);

--
-- Indexes for table `leave_uploads`
--
ALTER TABLE `leave_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_coordinator_id_foreign` (`coordinator_id`);

--
-- Indexes for table `meeting_attendees`
--
ALTER TABLE `meeting_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_attendees_meeting_id_foreign` (`meeting_id`),
  ADD KEY `meeting_attendees_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_replies`
--
ALTER TABLE `post_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_replies_user_id_foreign` (`user_id`),
  ADD KEY `post_replies_post_id_foreign` (`post_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `remaining_leaves`
--
ALTER TABLE `remaining_leaves`
  ADD KEY `remaining_leaves_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_manager_id_foreign` (`manager_id`),
  ADD KEY `teams_leader_id_foreign` (`leader_id`),
  ADD KEY `teams_member_id_foreign` (`member_id`);

--
-- Indexes for table `training_invites`
--
ALTER TABLE `training_invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_invites_program_id_foreign` (`program_id`),
  ADD KEY `training_invites_user_id_foreign` (`user_id`);

--
-- Indexes for table `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_assets`
--
ALTER TABLE `assign_assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_projects`
--
ALTER TABLE `assign_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attendance_filenames`
--
ALTER TABLE `attendance_filenames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_managers`
--
ALTER TABLE `attendance_managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awardees`
--
ALTER TABLE `awardees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_uploads`
--
ALTER TABLE `employee_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_attendees`
--
ALTER TABLE `event_attendees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday_filenames`
--
ALTER TABLE `holiday_filenames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_applies`
--
ALTER TABLE `leave_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_drafts`
--
ALTER TABLE `leave_drafts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_type_applies`
--
ALTER TABLE `leave_type_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_uploads`
--
ALTER TABLE `leave_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_attendees`
--
ALTER TABLE `meeting_attendees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_replies`
--
ALTER TABLE `post_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_invites`
--
ALTER TABLE `training_invites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_assets`
--
ALTER TABLE `assign_assets`
  ADD CONSTRAINT `assign_assets_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_assets_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assign_projects`
--
ALTER TABLE `assign_projects`
  ADD CONSTRAINT `assign_projects_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_projects_project_leader_id_foreign` FOREIGN KEY (`project_leader_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance_managers`
--
ALTER TABLE `attendance_managers`
  ADD CONSTRAINT `attendance_managers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `awardees`
--
ALTER TABLE `awardees`
  ADD CONSTRAINT `awardees_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `awardees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_coordinator_id_foreign` FOREIGN KEY (`coordinator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD CONSTRAINT `event_attendees_attendee_id_foreign` FOREIGN KEY (`attendee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_attendees_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_drafts`
--
ALTER TABLE `leave_drafts`
  ADD CONSTRAINT `leave_drafts_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_type_applies`
--
ALTER TABLE `leave_type_applies`
  ADD CONSTRAINT `leave_type_applies_leave_apply_id_foreign` FOREIGN KEY (`leave_apply_id`) REFERENCES `leave_applies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_type_applies_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_coordinator_id_foreign` FOREIGN KEY (`coordinator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meeting_attendees`
--
ALTER TABLE `meeting_attendees`
  ADD CONSTRAINT `meeting_attendees_attendee_id_foreign` FOREIGN KEY (`attendee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meeting_attendees_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_replies`
--
ALTER TABLE `post_replies`
  ADD CONSTRAINT `post_replies_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `remaining_leaves`
--
ALTER TABLE `remaining_leaves`
  ADD CONSTRAINT `remaining_leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_leader_id_foreign` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_invites`
--
ALTER TABLE `training_invites`
  ADD CONSTRAINT `training_invites_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `training_programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_invites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
