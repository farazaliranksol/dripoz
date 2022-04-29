-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 08:07 AM
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
-- Database: `dripozen`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced_i_v_r_reports`
--

CREATE TABLE `advanced_i_v_r_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ai_triggers`
--

CREATE TABLE `ai_triggers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `match_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trigger` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fire_webhook` tinyint(3) UNSIGNED DEFAULT NULL,
  `webhook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fire_zapier` tinyint(3) UNSIGNED DEFAULT NULL,
  `fire_email` tinyint(3) UNSIGNED DEFAULT NULL,
  `recipient` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_b_tests`
--

CREATE TABLE `a_b_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_i_s`
--

CREATE TABLE `a_i_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calls_reports`
--

CREATE TABLE `calls_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `long_transfer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_lead` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenue` double(8,2) NOT NULL,
  `long_transfer_check` tinyint(4) DEFAULT 0 COMMENT '1 for enable ',
  `close_leads_check` tinyint(4) DEFAULT 0 COMMENT '1 for enable ',
  `report_rule` int(11) NOT NULL,
  `ai_rules` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voice_scheduling_check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `leads_per_day` int(11) DEFAULT 0,
  `number_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_match_Check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_per_min` int(11) NOT NULL,
  `concurrent_transfer` int(11) NOT NULL,
  `max_CSP` double(8,2) NOT NULL,
  `record_call_check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `fallback_transfer_check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `fallback_timeout` int(11) DEFAULT NULL,
  `fallback_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduling_check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `rescheduling_check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `max_scheduling_month` int(11) DEFAULT 0 COMMENT '1 for enable ',
  `in_outbound_check` tinyint(1) DEFAULT 0 COMMENT '1 for enable ',
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `user_id`, `long_transfer`, `close_lead`, `close_duration`, `revenue`, `long_transfer_check`, `close_leads_check`, `report_rule`, `ai_rules`, `voice_scheduling_check`, `leads_per_day`, `number_list`, `local_match_Check`, `delivery_type`, `cps`, `keyword`, `message`, `sms_per_min`, `concurrent_transfer`, `max_CSP`, `record_call_check`, `fallback_transfer_check`, `fallback_timeout`, `fallback_number`, `scheduling_check`, `rescheduling_check`, `max_scheduling_month`, `in_outbound_check`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test_compaign', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '3', '2022-04-21 04:17:02', '2022-04-22 01:42:35'),
(2, 'camp', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '2', '2022-04-21 04:26:24', '2022-04-28 02:41:24'),
(3, 'ammar', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '1', '2022-04-22 00:00:23', '2022-04-22 04:46:18'),
(4, 'fiz', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '2', '2022-04-22 00:06:35', '2022-04-22 00:21:28'),
(5, 'absd', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '1', '2022-04-22 00:18:31', '2022-04-22 04:46:02'),
(6, 'testssds', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '3', '2022-04-22 00:45:02', '2022-04-22 04:41:03'),
(7, 'faraz', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '1', '2022-04-22 01:45:17', '2022-04-22 01:45:58'),
(8, 'fara', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '0', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(9, 'faraz', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '0', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(10, 'hadi', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', '', '', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '0', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(11, 'sdsdsds', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', 'sdsdsd', 's', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '0', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(12, 'arsla', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', 'medicare', 'xdfds ds dsf sd gf', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '0', '2022-04-29 00:14:04', '2022-04-29 00:14:04'),
(13, 'fghfgh', 37, '10 Seconds', 'call', '1 Seconds', 0.00, NULL, NULL, 0, NULL, NULL, 0, '1', NULL, 'cps', '1.0', 'qweer', 'nvvbnvb', 300, 1, 1.00, NULL, NULL, NULL, NULL, 1, 1, 3, 1, '0', '2022-04-29 00:25:47', '2022-04-29 00:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_hours`
--

CREATE TABLE `campaign_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_hours`
--

INSERT INTO `campaign_hours` (`id`, `campaign_id`, `type`, `day`, `open_hour`, `close_hour`, `created_at`, `updated_at`) VALUES
(1, 1, 'campaign_hours', 'friday', '02:00 PM', '02:30 PM', '2022-03-17 08:33:34', '2022-03-17 08:33:34'),
(2, 1, 'campaign_hours', 'saturday', '02:00 PM', '02:00 PM', '2022-03-17 08:33:34', '2022-03-17 08:33:34'),
(3, 1, 'campaign_hours', 'sunday', '01:30 PM', '02:00 PM', '2022-03-17 08:33:34', '2022-03-17 08:33:34'),
(4, 2, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(5, 2, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(6, 2, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(7, 2, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(8, 2, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(9, 2, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(10, 2, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-03-24 15:55:27', '2022-03-24 15:55:27'),
(11, 3, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(12, 3, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(13, 3, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(14, 3, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(15, 3, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(16, 3, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(17, 3, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-03-29 13:20:51', '2022-03-29 13:20:51'),
(18, 4, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(19, 4, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(20, 4, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(21, 4, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(22, 4, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(23, 4, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(24, 4, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-06 14:22:32', '2022-04-07 10:44:32'),
(32, 6, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:50', '2022-04-07 05:29:50'),
(33, 6, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:50', '2022-04-07 05:29:50'),
(34, 6, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:50', '2022-04-07 05:29:50'),
(35, 6, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:50', '2022-04-07 05:29:50'),
(36, 6, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:50', '2022-04-07 05:29:50'),
(37, 6, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:50', '2022-04-07 05:29:50'),
(38, 6, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-07 05:29:51', '2022-04-07 05:29:51'),
(39, 7, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(40, 7, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(41, 7, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(42, 7, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(43, 7, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(44, 7, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(45, 7, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-07 05:51:43', '2022-04-07 05:51:43'),
(46, 8, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(47, 8, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(48, 8, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(49, 8, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(50, 8, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(51, 8, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(52, 8, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-07 06:08:08', '2022-04-07 06:08:08'),
(53, 9, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(54, 9, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(55, 9, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(56, 9, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(57, 9, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(58, 9, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(59, 9, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-11 23:43:46', '2022-04-11 23:43:46'),
(60, 10, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(61, 10, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(62, 10, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(63, 10, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(64, 10, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(65, 10, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(66, 10, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-12 02:15:54', '2022-04-12 02:15:54'),
(67, 11, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(68, 11, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(69, 11, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(70, 11, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(71, 11, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(72, 11, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(73, 11, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-15 05:47:16', '2022-04-15 05:47:16'),
(74, 12, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(75, 12, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(76, 12, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(77, 12, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(78, 12, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(79, 12, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(80, 12, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-19 03:10:41', '2022-04-19 03:10:41'),
(81, 13, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(82, 13, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(83, 13, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(84, 13, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(85, 13, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(86, 13, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(87, 13, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-19 04:02:40', '2022-04-19 04:02:40'),
(88, 18, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(89, 18, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(90, 18, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(91, 18, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(92, 18, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(93, 18, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(94, 18, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-19 05:19:42', '2022-04-19 05:19:42'),
(95, 19, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(96, 19, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(97, 19, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(98, 19, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(99, 19, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(100, 19, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(101, 19, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 01:56:50', '2022-04-20 01:56:50'),
(102, 20, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(103, 20, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(104, 20, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(105, 20, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(106, 20, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(107, 20, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(108, 20, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 01:58:27', '2022-04-20 01:58:27'),
(109, 21, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:18', '2022-04-20 01:59:18'),
(110, 21, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:18', '2022-04-20 01:59:18'),
(111, 21, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:18', '2022-04-20 01:59:18'),
(112, 21, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:19', '2022-04-20 01:59:19'),
(113, 21, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:19', '2022-04-20 01:59:19'),
(114, 21, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:19', '2022-04-20 01:59:19'),
(115, 21, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 01:59:19', '2022-04-20 01:59:19'),
(116, 22, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(117, 22, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(118, 22, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(119, 22, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(120, 22, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(121, 22, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(122, 22, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 02:03:48', '2022-04-20 02:03:48'),
(123, 45, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:30', '2022-04-20 05:33:30'),
(124, 45, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:30', '2022-04-20 05:33:30'),
(125, 45, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:30', '2022-04-20 05:33:30'),
(126, 45, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:30', '2022-04-20 05:33:30'),
(127, 45, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:30', '2022-04-20 05:33:30'),
(128, 45, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:31', '2022-04-20 05:33:31'),
(129, 45, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 05:33:31', '2022-04-20 05:33:31'),
(130, 46, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(131, 46, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(132, 46, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(133, 46, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(134, 46, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(135, 46, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(136, 46, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 05:37:53', '2022-04-20 05:37:53'),
(137, 47, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(138, 47, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(139, 47, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(140, 47, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(141, 47, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(142, 47, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(143, 47, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 05:50:56', '2022-04-20 05:50:56'),
(144, 48, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(145, 48, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(146, 48, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(147, 48, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(148, 48, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(149, 48, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(150, 48, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 05:52:02', '2022-04-20 05:52:02'),
(151, 49, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(152, 49, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(153, 49, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(154, 49, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(155, 49, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(156, 49, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(157, 49, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 05:54:05', '2022-04-20 05:54:05'),
(158, 50, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(159, 50, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(160, 50, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(161, 50, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(162, 50, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(163, 50, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(164, 50, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:02:05', '2022-04-20 06:02:05'),
(165, 51, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:42', '2022-04-20 06:06:42'),
(166, 51, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:43', '2022-04-20 06:06:43'),
(167, 51, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:43', '2022-04-20 06:06:43'),
(168, 51, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:43', '2022-04-20 06:06:43'),
(169, 51, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:43', '2022-04-20 06:06:43'),
(170, 51, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:43', '2022-04-20 06:06:43'),
(171, 51, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:06:43', '2022-04-20 06:06:43'),
(172, 52, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(173, 52, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(174, 52, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(175, 52, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(176, 52, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(177, 52, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(178, 52, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:14:03', '2022-04-20 06:14:03'),
(179, 53, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(180, 53, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(181, 53, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(182, 53, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(183, 53, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(184, 53, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(185, 53, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:22:05', '2022-04-20 06:22:05'),
(186, 54, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(187, 54, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(188, 54, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(189, 54, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(190, 54, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(191, 54, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(192, 54, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:34:29', '2022-04-20 06:34:29'),
(193, 55, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(194, 55, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(195, 55, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(196, 55, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(197, 55, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(198, 55, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(199, 55, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:39:03', '2022-04-20 06:39:03'),
(200, 56, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:14', '2022-04-20 06:40:14'),
(201, 56, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:14', '2022-04-20 06:40:14'),
(202, 56, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:14', '2022-04-20 06:40:14'),
(203, 56, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:14', '2022-04-20 06:40:14'),
(204, 56, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:14', '2022-04-20 06:40:14'),
(205, 56, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:15', '2022-04-20 06:40:15'),
(206, 56, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:40:15', '2022-04-20 06:40:15'),
(207, 57, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(208, 57, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(209, 57, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(210, 57, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(211, 57, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(212, 57, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(213, 57, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 06:45:38', '2022-04-20 06:45:38'),
(214, 58, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(215, 58, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(216, 58, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(217, 58, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(218, 58, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(219, 58, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(220, 58, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 23:45:40', '2022-04-20 23:45:40'),
(221, 59, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(222, 59, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(223, 59, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(224, 59, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(225, 59, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(226, 59, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(227, 59, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 23:48:49', '2022-04-20 23:48:49'),
(228, 60, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(229, 60, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(230, 60, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(231, 60, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(232, 60, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(233, 60, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(234, 60, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-20 23:53:42', '2022-04-20 23:53:42'),
(235, 61, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(236, 61, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(237, 61, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(238, 61, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(239, 61, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(240, 61, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(241, 61, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 00:17:42', '2022-04-21 00:17:42'),
(242, 62, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:15', '2022-04-21 00:19:15'),
(243, 62, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:15', '2022-04-21 00:19:15'),
(244, 62, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:16', '2022-04-21 00:19:16'),
(245, 62, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:16', '2022-04-21 00:19:16'),
(246, 62, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:16', '2022-04-21 00:19:16'),
(247, 62, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:16', '2022-04-21 00:19:16'),
(248, 62, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 00:19:16', '2022-04-21 00:19:16'),
(249, 63, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:18', '2022-04-21 00:29:18'),
(250, 63, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:18', '2022-04-21 00:29:18'),
(251, 63, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:19', '2022-04-21 00:29:19'),
(252, 63, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:19', '2022-04-21 00:29:19'),
(253, 63, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:19', '2022-04-21 00:29:19'),
(254, 63, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:19', '2022-04-21 00:29:19'),
(255, 63, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 00:29:19', '2022-04-21 00:29:19'),
(256, 64, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(257, 64, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(258, 64, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(259, 64, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(260, 64, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(261, 64, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(262, 64, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 01:51:57', '2022-04-21 01:51:57'),
(263, 65, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(264, 65, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(265, 65, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(266, 65, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(267, 65, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(268, 65, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(269, 65, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 01:59:00', '2022-04-21 01:59:00'),
(270, 66, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:04', '2022-04-21 02:13:04'),
(271, 66, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:04', '2022-04-21 02:13:04'),
(272, 66, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:04', '2022-04-21 02:13:04'),
(273, 66, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:04', '2022-04-21 02:13:04'),
(274, 66, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:04', '2022-04-21 02:13:04'),
(275, 66, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:04', '2022-04-21 02:13:04'),
(276, 66, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:13:05', '2022-04-21 02:13:05'),
(277, 67, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(278, 67, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(279, 67, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(280, 67, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(281, 67, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(282, 67, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(283, 67, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:14:20', '2022-04-21 02:14:20'),
(284, 68, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(285, 68, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(286, 68, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(287, 68, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(288, 68, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(289, 68, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(290, 68, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:15:52', '2022-04-21 02:15:52'),
(291, 69, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(292, 69, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(293, 69, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(294, 69, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(295, 69, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(296, 69, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(297, 69, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:19:20', '2022-04-21 02:19:20'),
(298, 70, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:04', '2022-04-21 02:36:04'),
(299, 70, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:04', '2022-04-21 02:36:04'),
(300, 70, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:04', '2022-04-21 02:36:04'),
(301, 70, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:05', '2022-04-21 02:36:05'),
(302, 70, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:05', '2022-04-21 02:36:05'),
(303, 70, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:05', '2022-04-21 02:36:05'),
(304, 70, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:36:05', '2022-04-21 02:36:05'),
(305, 71, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(306, 71, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(307, 71, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(308, 71, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(309, 71, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(310, 71, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(311, 71, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:38:37', '2022-04-21 02:38:37'),
(312, 72, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(313, 72, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(314, 72, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(315, 72, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(316, 72, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(317, 72, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(318, 72, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:39:30', '2022-04-21 02:39:30'),
(319, 73, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(320, 73, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(321, 73, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(322, 73, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(323, 73, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(324, 73, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(325, 73, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:41:54', '2022-04-21 02:41:54'),
(326, 74, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(327, 74, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(328, 74, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(329, 74, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(330, 74, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(331, 74, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(332, 74, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:50:17', '2022-04-21 02:50:17'),
(333, 75, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(334, 75, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(335, 75, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(336, 75, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(337, 75, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(338, 75, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(339, 75, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:53:04', '2022-04-21 02:53:04'),
(340, 76, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:07', '2022-04-21 02:58:07'),
(341, 76, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:07', '2022-04-21 02:58:07'),
(342, 76, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:07', '2022-04-21 02:58:07'),
(343, 76, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:07', '2022-04-21 02:58:07'),
(344, 76, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:07', '2022-04-21 02:58:07'),
(345, 76, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:07', '2022-04-21 02:58:07'),
(346, 76, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 02:58:08', '2022-04-21 02:58:08'),
(347, 77, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(348, 77, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(349, 77, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(350, 77, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(351, 77, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(352, 77, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(353, 77, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 03:00:36', '2022-04-21 03:00:36'),
(354, 78, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:41', '2022-04-21 03:01:41'),
(355, 78, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:41', '2022-04-21 03:01:41'),
(356, 78, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:41', '2022-04-21 03:01:41'),
(357, 78, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:42', '2022-04-21 03:01:42'),
(358, 78, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:42', '2022-04-21 03:01:42'),
(359, 78, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:42', '2022-04-21 03:01:42'),
(360, 78, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 03:01:42', '2022-04-21 03:01:42'),
(361, 79, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(362, 79, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(363, 79, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(364, 79, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(365, 79, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(366, 79, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(367, 79, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 03:02:46', '2022-04-21 03:02:46'),
(368, 80, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(369, 80, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(370, 80, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(371, 80, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(372, 80, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(373, 80, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(374, 80, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 03:06:04', '2022-04-21 03:06:04'),
(375, 1, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(376, 1, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(377, 1, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(378, 1, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(379, 1, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(380, 1, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(381, 1, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 04:17:02', '2022-04-21 04:17:02'),
(382, 2, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(383, 2, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(384, 2, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(385, 2, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(386, 2, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(387, 2, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(388, 2, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-21 04:26:24', '2022-04-21 04:26:24'),
(389, 3, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(390, 3, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(391, 3, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(392, 3, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(393, 3, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(394, 3, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(395, 3, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 00:00:23', '2022-04-22 00:00:23'),
(396, 4, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:35', '2022-04-22 00:06:35'),
(397, 4, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:36', '2022-04-22 00:06:36'),
(398, 4, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:36', '2022-04-22 00:06:36'),
(399, 4, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:36', '2022-04-22 00:06:36'),
(400, 4, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:36', '2022-04-22 00:06:36'),
(401, 4, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:36', '2022-04-22 00:06:36'),
(402, 4, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 00:06:36', '2022-04-22 00:06:36'),
(403, 5, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(404, 5, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(405, 5, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(406, 5, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(407, 5, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(408, 5, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(409, 5, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 00:18:31', '2022-04-22 00:18:31'),
(410, 6, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(411, 6, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(412, 6, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(413, 6, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(414, 6, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(415, 6, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(416, 6, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 00:45:02', '2022-04-22 00:45:02'),
(417, 7, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(418, 7, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(419, 7, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(420, 7, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(421, 7, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(422, 7, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(423, 7, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 01:45:17', '2022-04-22 01:45:17'),
(424, 8, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(425, 8, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(426, 8, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(427, 8, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(428, 8, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(429, 8, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(430, 8, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 01:57:19', '2022-04-22 01:57:19'),
(431, 9, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(432, 9, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(433, 9, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(434, 9, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(435, 9, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(436, 9, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(437, 9, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-22 02:03:49', '2022-04-22 02:03:49'),
(438, 10, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(439, 10, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(440, 10, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(441, 10, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(442, 10, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(443, 10, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(444, 10, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-27 04:03:49', '2022-04-27 04:03:49'),
(445, 11, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(446, 11, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(447, 11, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(448, 11, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(449, 11, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(450, 11, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(451, 11, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-28 02:58:56', '2022-04-28 02:58:56'),
(452, 12, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:04', '2022-04-29 00:14:04'),
(453, 12, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:04', '2022-04-29 00:14:04'),
(454, 12, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:05', '2022-04-29 00:14:05'),
(455, 12, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:05', '2022-04-29 00:14:05'),
(456, 12, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:05', '2022-04-29 00:14:05'),
(457, 12, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:05', '2022-04-29 00:14:05'),
(458, 12, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-29 00:14:05', '2022-04-29 00:14:05'),
(459, 13, 'campaign_hours', 'monday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47'),
(460, 13, 'campaign_hours', 'tuesday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47'),
(461, 13, 'campaign_hours', 'wednesday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47'),
(462, 13, 'campaign_hours', 'thrusday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47'),
(463, 13, 'campaign_hours', 'friday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47'),
(464, 13, 'campaign_hours', 'saturday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47'),
(465, 13, 'campaign_hours', 'sunday', '06:00 AM', '06:00 AM', '2022-04-29 00:25:47', '2022-04-29 00:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `client_management`
--

CREATE TABLE `client_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_users` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twilio_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_management`
--

INSERT INTO `client_management` (`id`, `user_id`, `company_name`, `address`, `address_line_1`, `city`, `zip_code`, `state`, `phone_number`, `no_of_users`, `website`, `twilio_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 30, 'dripoz.com', 'Mumbai', 'Navi Mumbai', 'Mumbai', '400088', 'Mh', '9004200108', '5', 'dripoz.com', '12345', 'Active', '2022-03-28 11:57:23', '2022-03-28 11:57:23'),
(4, 31, 'Johns and Rodriquez Traders', 'In et aut aut eum', '573 Clarendon Boulevard', 'Ullam dolor qui cupi', '21208', 'Ipsum suscipit moles', '+1 (201) 378-3641', '703', 'https://www.vub.biz', '34242343432', 'Active', '2022-03-28 13:42:29', '2022-03-28 13:42:29'),
(5, 37, 'ranksol1', 'sdjgs', 'sdjkghs', 'fsd', '38000', 'punjab', '293723290390', '1', 'ranksol.co', '8934881231', 'Active', '2022-04-04 10:43:08', '2022-04-04 10:43:08'),
(6, 38, 'ranksol1', 'sdjgs', 'sdjkghs', 'fsd', '38000', 'punjab', '293723290390', '1', 'ranksol.co', '8934881231', 'Active', '2022-04-04 10:50:02', '2022-04-04 10:50:02'),
(7, 40, 'rankgenics', 'sds', 'asdsadf', 'dwad', '23342432342', 'asdfas', '21312312', '2', 'sadasfdasf', 'sadsadadad', 'Active', '2022-04-22 02:32:50', '2022-04-22 02:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `client_user_permissions`
--

CREATE TABLE `client_user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `inbox` tinyint(4) DEFAULT NULL,
  `phone_number` tinyint(4) DEFAULT NULL,
  `export_leads` tinyint(4) DEFAULT NULL,
  `ai_rules` tinyint(4) DEFAULT NULL,
  `billing` tinyint(4) DEFAULT NULL,
  `tools` tinyint(4) DEFAULT NULL,
  `logs` tinyint(4) DEFAULT NULL,
  `console` tinyint(4) DEFAULT NULL,
  `view_leads` tinyint(4) DEFAULT NULL,
  `sound_library` tinyint(4) DEFAULT NULL,
  `view_reports` tinyint(4) DEFAULT NULL,
  `make_payments` tinyint(4) DEFAULT NULL,
  `alerts` tinyint(4) DEFAULT NULL,
  `api` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_user_permissions`
--

INSERT INTO `client_user_permissions` (`id`, `user_id`, `inbox`, `phone_number`, `export_leads`, `ai_rules`, `billing`, `tools`, `logs`, `console`, `view_leads`, `sound_library`, `view_reports`, `make_payments`, `alerts`, `api`, `created_at`, `updated_at`) VALUES
(1, 31, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-03-28 13:42:29', '2022-03-28 13:42:29'),
(3, 32, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, '2022-03-28 13:44:48', '2022-03-28 13:44:48'),
(4, 33, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-03-28 16:13:46', '2022-03-28 16:13:46'),
(5, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, NULL, '2022-03-29 13:24:19', '2022-03-29 13:24:19'),
(6, 35, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, '2022-03-29 13:27:35', '2022-03-29 13:27:35'),
(7, 36, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, '2022-03-29 13:31:15', '2022-03-29 13:31:15'),
(8, 37, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-04-04 10:43:08', '2022-04-04 10:43:08'),
(9, 38, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-04-04 10:50:02', '2022-04-04 10:50:02'),
(10, 39, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-04 14:56:24', '2022-04-04 14:56:24'),
(11, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, NULL, '2022-04-05 13:56:56', '2022-04-05 13:56:56'),
(12, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, NULL, '2022-04-05 13:57:00', '2022-04-05 13:57:00'),
(13, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, '2022-04-05 13:57:06', '2022-04-05 13:57:06'),
(14, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, NULL, '2022-04-05 13:57:10', '2022-04-05 13:57:10'),
(15, 30, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(16, 40, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-04-22 02:32:50', '2022-04-22 02:32:50'),
(17, 41, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-04-22 04:17:40', '2022-04-22 04:17:40'),
(18, 42, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-04-22 04:37:25', '2022-04-22 04:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `c_d_r_s`
--

CREATE TABLE `c_d_r_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE `daily_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_usages`
--

CREATE TABLE `daily_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_events`
--

CREATE TABLE `day_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inbound_off_hours`
--

CREATE TABLE `inbound_off_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inbound_open_hours`
--

CREATE TABLE `inbound_open_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(11, 'default', '{\"uuid\":\"191192b3-ef3c-4554-a84c-da456b2bc60f\",\"displayName\":\"App\\\\Jobs\\\\StartCompaign\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\StartCompaign\",\"command\":\"O:22:\\\"App\\\\Jobs\\\\StartCompaign\\\":11:{s:11:\\\"compaign_id\\\";s:1:\\\"2\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1651131672, 1651131672);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_book_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `camp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `phone_book_id`, `campaign_id`, `camp_name`, `first_name`, `last_name`, `phone_number`, `email`, `company`, `street`, `city`, `state`, `sub1`, `sub2`, `sub3`, `zip_code`, `created_at`) VALUES
(8, 1, 7, 'test_compaign', 'Faraz', 'Ali', '+18323041166', 'faraz.ranksol@gmail.com', 'ranksol', 'skd', 'kkk', 'kkk', 'kk', 'kk', 'kk', '38000', '2022-04-22 06:45:38'),
(9, 10, 1, 'test_compaign', 'First Name', 'Last Name', 'Phone Number', 'Email', 'Company', 'Street', 'City', 'State', 'Sub1', 'Sub2', 'Sub3', 'Zip Code', '2022-04-28 07:23:42'),
(10, 10, 1, 'test_compaign', 'Faraz', 'Ali', '18323041166', 'faraz.ranksol@gmail.com', 'ranksol', 'skd', 'kkk', 'kkk', 'kk', 'kk', 'kk', '38000', '2022-04-28 07:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `leads_reports`
--

CREATE TABLE `leads_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_calls`
--

CREATE TABLE `live_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_messages`
--

CREATE TABLE `log_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_24_065144_create_phone_numbers_table', 1),
(6, '2021_12_24_065515_create_phone_number_lists_table', 1),
(7, '2021_12_29_115023_create_phone_books_table', 1),
(8, '2021_12_29_115116_create_leads_table', 1),
(9, '2022_01_04_093247_create_campaigns_table', 1),
(10, '2022_01_10_092523_create_schedules_table', 1),
(11, '2022_01_18_053742_create_campaign_hours_table', 1),
(12, '2022_01_18_060837_create_sounds_table', 1),
(13, '2022_01_19_061242_create_a_i_s_table', 1),
(14, '2022_01_20_052530_create_ai_triggers_table', 1),
(15, '2022_01_21_122141_create_inboxes_table', 1),
(16, '2022_01_26_063803_create_calls_reports_table', 1),
(17, '2022_01_26_065533_create_daily_reports_table', 1),
(18, '2022_01_26_065652_create_sms_reports_table', 1),
(19, '2022_01_26_065731_create_sentiment_reports_table', 1),
(20, '2022_01_26_070108_create_advanced_i_v_r_reports_table', 1),
(21, '2022_01_26_070624_create_leads_reports_table', 1),
(22, '2022_01_26_070719_create_r_o_i_reports_table', 1),
(23, '2022_01_26_070741_create_speed_reports_table', 1),
(24, '2022_01_26_092959_create_live_calls_table', 1),
(25, '2022_01_26_093039_create_c_d_r_s_table', 1),
(26, '2022_01_26_093137_create_schedule_logs_table', 1),
(27, '2022_01_26_093219_create_webhooks_table', 1),
(28, '2022_01_26_105221_create_a_b_tests_table', 1),
(29, '2022_01_26_105249_create_upload_conversations_table', 1),
(30, '2022_01_26_122150_create_overviews_table', 1),
(31, '2022_01_26_122902_create_daily_usages_table', 1),
(32, '2022_01_26_123005_create_recurring_items_table', 1),
(33, '2022_01_26_123026_create_invoices_table', 1),
(34, '2022_01_26_123043_create_rates_table', 1),
(35, '2022_01_26_125526_create_trust_hubs_table', 1),
(36, '2022_02_10_062448_create_inbound_open_hours_table', 1),
(37, '2022_02_11_062811_create_inbound_off_hours_table', 1),
(38, '2022_02_14_053644_create_scheduled_calls_table', 2),
(39, '2022_02_14_071603_create_outbound_lives_table', 3),
(40, '2022_02_14_105712_create_day_events_table', 4),
(41, '2022_02_25_071122_create_events_table', 5),
(42, '2022_04_19_070917_create_jobs_table', 6),
(43, '2022_04_27_061444_create_log_messages_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `outbound_lives`
--

CREATE TABLE `outbound_lives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overviews`
--

CREATE TABLE `overviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_books`
--

CREATE TABLE `phone_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 for leads, 1 for DNC',
  `user_id` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `total_contacts` bigint(20) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 0,
  `invalid` int(11) NOT NULL DEFAULT 0,
  `duplicates` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_books`
--

INSERT INTO `phone_books` (`id`, `title`, `status`, `user_id`, `camp_id`, `total_contacts`, `valid`, `invalid`, `duplicates`, `created_at`) VALUES
(1, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-21 09:22:19'),
(2, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 4, 2, 0, 0, 0, '2022-04-28 07:11:34'),
(3, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 2, 2, 0, 0, 0, '2022-04-28 07:16:02'),
(4, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:18:18'),
(5, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:19:06'),
(6, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:19:52'),
(7, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:20:42'),
(8, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:22:04'),
(9, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:22:23'),
(10, 'Untitled spreadsheet - Sheet1 (1).csv', 0, 37, 1, 2, 0, 0, 0, '2022-04-28 07:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` bigint(20) NOT NULL,
  `phone_number_list_id` bigint(20) NOT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendly_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_sid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel` tinyint(4) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `phone_number_list_id`, `phone_number`, `friendly_name`, `number_sid`, `state`, `active`, `flag`, `verify`, `cancel`, `created_at`, `updated_at`) VALUES
(24, 1, '+12027409507', '(201)7864754', 'sadhsjadhasjdy7e4wry34fwef', 'MN', 'in-use', NULL, NULL, 0, '2022-04-06 06:34:39', '2022-04-06 06:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `phone_number_lists`
--

CREATE TABLE `phone_number_lists` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_del` tinyint(4) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_number_lists`
--

INSERT INTO `phone_number_lists` (`id`, `user_id`, `name`, `is_del`, `created_at`, `updated_at`) VALUES
(1, 37, 'TESTLIST', 0, '2022-04-21 09:02:03', '2022-04-21 09:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recurring_items`
--

CREATE TABLE `recurring_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_o_i_reports`
--

CREATE TABLE `r_o_i_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_calls`
--

CREATE TABLE `scheduled_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rescheduling_check` tinyint(1) NOT NULL,
  `max_scheduling_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_logs`
--

CREATE TABLE `schedule_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sentiment_reports`
--

CREATE TABLE `sentiment_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_reports`
--

CREATE TABLE `sms_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sounds`
--

CREATE TABLE `sounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speed_reports`
--

CREATE TABLE `speed_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaigns` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `package_name`, `price`, `total_number`, `campaigns`, `users`, `created_at`, `updated_at`) VALUES
(1, 'basic', '1000', '10', '60', '2', '2022-04-29 01:04:06', '2022-04-29 01:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `details`) VALUES
(1, '{\"code\": 21212, \"message\": \"The \'From\' number \\\"+12027409507\\\" is not a valid phone number, shortcode, or alphanumeric sender ID.\", \"more_info\": \"https://www.twilio.com/docs/errors/21212\", \"status\": 400}');

-- --------------------------------------------------------

--
-- Table structure for table `trust_hubs`
--

CREATE TABLE `trust_hubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_conversations`
--

CREATE TABLE `upload_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `number`, `email_verified_at`, `password`, `remember_token`, `role`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Administrator', 'admin@app.com', '03000000000', NULL, '$2y$10$88q3fUUrDSz6/LxtrVNMQOuad9pwi8R3KME0RwzaDDVGTifgIbSe2', NULL, 'SuperAdmin', NULL, 'Active', '2022-03-21 17:10:13', '2022-04-06 12:11:15'),
(30, 'Satyaprakash', 'Mishra', 'sp.mishra@dripoz.com', '9004200108', NULL, '$2y$10$hmgcBnIWHxQpTHVlg.nu3uGm00wdb13hqVy84L77tH9XX/Ibex9x.', 'XScuolliE3aB44W9V1BvUaul3f92Pal5UdSGK0Rzzr60HaUHDf7KZYW2MCCB', 'Admin', NULL, 'Active', '2022-03-28 11:57:23', '2022-03-28 11:57:23'),
(31, 'Usman', 'Babar', 'usman@gmail.com', '03112115115', NULL, '$2y$10$5sbyvcix0gX9TD9kXE6Ai.of7O97c9TO/21gS.30fDcdzO/JTEr1W', NULL, 'Admin', NULL, 'Active', '2022-03-28 13:42:29', '2022-04-06 12:12:53'),
(32, 'Users', 'User', 'user@gmail.com', NULL, NULL, '$2y$10$3tWMVBfG9iiI/jKusjKtVu1Pry6Duq2dabAGyV47kOSxjdXFvimqq', 'Cw4NuU5nmjwXhVNGW6KBlu5BYokFBYn2GFX9q4X2ZlVICYxiM1WK13lGasum', 'Accounting', 31, 'Active', '2022-03-28 13:44:07', '2022-04-06 13:21:21'),
(33, 'omi', 'omi', 'omi@gmail.com', NULL, NULL, '$2y$10$XcicpHSXyMyd8rnsb0ZD3OLYbbRqOHePkRAx/PKydAJ98Pn1rhRsq', 'b24Wa7djYC1QTHTkEaf5drRyEshIn8EaGvZPXHt2iSlgZ2MdWzNlcyhH17UW', 'Accounting', 31, 'Active', '2022-03-28 16:13:46', '2022-04-06 13:38:38'),
(34, 'Babar', 'Babar', 'babar@gmail.com', NULL, NULL, '$2y$10$3tWMVBfG9iiI/jKusjKtVu1Pry6Duq2dabAGyV47kOSxjdXFvimqq', NULL, 'Custom', 31, 'Active', '2022-03-29 13:24:19', '2022-04-05 13:57:10'),
(35, 'Babar', 'Babar', 'bbb@gmail.com', NULL, NULL, '$2y$10$OlYV0aSX/UQJEoKNz0TIS..9dYtZ9DeiDYK9jWc4PX2pLw5omSJoC', NULL, 'Custom', 31, 'Active', '2022-03-29 13:27:35', '2022-03-29 13:27:35'),
(36, 'omi', 'omi', 'test@gmail.com', NULL, NULL, '$2y$10$uZFTrJQHCpneA1vjsSSiqOnsL0bmLYvMQO9Nr7h1H6H.5hsDX7WR.', NULL, 'Custom', 31, 'Active', '2022-03-29 13:31:15', '2022-03-29 13:31:15'),
(37, 'faraz', 'ali', 'faraz.ranksol@gmail.com', '233232', NULL, '$2y$10$VqhVMpuGaNa8vhYGAjnN7u81fOf443ZHgaLKTrb5.YC1F0GutWMcW', 'YXuYiBwKjBAxQLVIajaILkSzpoInQt183LtXueRv0rfChXbnK08CtzGX3qHi', 'Admin', NULL, 'Active', '2022-04-04 10:43:08', '2022-04-04 10:43:08'),
(38, 'faraz', 'ali', 'faraz@gmail.com', '3232', NULL, '$2y$10$aSLi3rR7hufylH09in3Wh.zu0tUgKUiPgNX7OTgnOWcA9bSz87AKu', NULL, 'Admin', NULL, 'Active', '2022-04-04 10:50:02', '2022-04-04 10:50:02'),
(39, 'faraz', 'ali', 'f@gmail.com', NULL, NULL, '$2y$10$EvwTOiBH8qeIcgXWb4ru5O0ocXv1GrLWu3KEpw4Q7rrzT.TM899ia', NULL, 'Custom', 37, 'Deactivate', '2022-04-04 14:56:24', '2022-04-12 04:39:00'),
(40, 'asdasdas', 'asdas', 'rank@gmail.com', '23322323', NULL, '$2y$10$f4JaKcFnyHI2CqjNyMRoN.zRlglK0RW1qyhZnlKhsPZNCsgZXH8Ki', NULL, 'Admin', NULL, 'Active', '2022-04-22 02:32:50', '2022-04-22 02:32:50'),
(41, 'dfksdk', 'mkmk', 'k@gmail.com', NULL, NULL, '$2y$10$MAf90iyBX5UUx9daBjwxEeu6aOUO3zHdq8Y8K9D4kZKCzxgdu0Ac2', NULL, 'Admin', NULL, 'Active', '2022-04-22 04:17:40', '2022-04-22 04:17:40'),
(42, 'asasas', 'asasas', 'a2@hmail.com', NULL, NULL, '$2y$10$/bPMyiH2NDflxC1lQQcHbepA24X9DLtgDmxQI7rzfI1Sgxl2yp2lq', NULL, 'Admin', 38, 'Active', '2022-04-22 04:37:25', '2022-04-22 04:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `webhooks`
--

CREATE TABLE `webhooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanced_i_v_r_reports`
--
ALTER TABLE `advanced_i_v_r_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ai_triggers`
--
ALTER TABLE `ai_triggers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_b_tests`
--
ALTER TABLE `a_b_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_i_s`
--
ALTER TABLE `a_i_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls_reports`
--
ALTER TABLE `calls_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_hours`
--
ALTER TABLE `campaign_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_management`
--
ALTER TABLE `client_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_user_permissions`
--
ALTER TABLE `client_user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_d_r_s`
--
ALTER TABLE `c_d_r_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_usages`
--
ALTER TABLE `daily_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_events`
--
ALTER TABLE `day_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inbound_off_hours`
--
ALTER TABLE `inbound_off_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbound_open_hours`
--
ALTER TABLE `inbound_open_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads_reports`
--
ALTER TABLE `leads_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_calls`
--
ALTER TABLE `live_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_messages`
--
ALTER TABLE `log_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound_lives`
--
ALTER TABLE `outbound_lives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overviews`
--
ALTER TABLE `overviews`
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
-- Indexes for table `phone_books`
--
ALTER TABLE `phone_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_number_lists`
--
ALTER TABLE `phone_number_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recurring_items`
--
ALTER TABLE `recurring_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_o_i_reports`
--
ALTER TABLE `r_o_i_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduled_calls`
--
ALTER TABLE `scheduled_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_logs`
--
ALTER TABLE `schedule_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentiment_reports`
--
ALTER TABLE `sentiment_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_reports`
--
ALTER TABLE `sms_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speed_reports`
--
ALTER TABLE `speed_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trust_hubs`
--
ALTER TABLE `trust_hubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_conversations`
--
ALTER TABLE `upload_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webhooks`
--
ALTER TABLE `webhooks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advanced_i_v_r_reports`
--
ALTER TABLE `advanced_i_v_r_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ai_triggers`
--
ALTER TABLE `ai_triggers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_b_tests`
--
ALTER TABLE `a_b_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_i_s`
--
ALTER TABLE `a_i_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls_reports`
--
ALTER TABLE `calls_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `campaign_hours`
--
ALTER TABLE `campaign_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `client_management`
--
ALTER TABLE `client_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_user_permissions`
--
ALTER TABLE `client_user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `c_d_r_s`
--
ALTER TABLE `c_d_r_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_usages`
--
ALTER TABLE `daily_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_events`
--
ALTER TABLE `day_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbound_off_hours`
--
ALTER TABLE `inbound_off_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbound_open_hours`
--
ALTER TABLE `inbound_open_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leads_reports`
--
ALTER TABLE `leads_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_calls`
--
ALTER TABLE `live_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_messages`
--
ALTER TABLE `log_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `outbound_lives`
--
ALTER TABLE `outbound_lives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overviews`
--
ALTER TABLE `overviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_books`
--
ALTER TABLE `phone_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phone_number_lists`
--
ALTER TABLE `phone_number_lists`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recurring_items`
--
ALTER TABLE `recurring_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_o_i_reports`
--
ALTER TABLE `r_o_i_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduled_calls`
--
ALTER TABLE `scheduled_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_logs`
--
ALTER TABLE `schedule_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sentiment_reports`
--
ALTER TABLE `sentiment_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_reports`
--
ALTER TABLE `sms_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sounds`
--
ALTER TABLE `sounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speed_reports`
--
ALTER TABLE `speed_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trust_hubs`
--
ALTER TABLE `trust_hubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_conversations`
--
ALTER TABLE `upload_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `webhooks`
--
ALTER TABLE `webhooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
