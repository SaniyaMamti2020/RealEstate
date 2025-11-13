-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 17, 2024 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbnb_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) DEFAULT NULL,
  `sub_title` varchar(100) DEFAULT NULL,
  `page_img` varchar(100) DEFAULT NULL,
  `page_desc` text DEFAULT NULL,
  `created_by` bigint(20) DEFAULT 0,
  `updated_by` bigint(20) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `page_name`, `sub_title`, `page_img`, `page_desc`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'rtdtret', 'ALL PROUDCTS IN ONE PLANT', '0526068001726487266.jpg', '<p>rddtretretret</p>', 1, 1, NULL, '2024-09-16 06:16:00', '2024-09-16 06:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 'App\\Models\\Category', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"name\":\"test\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-04T06:43:45.000000Z\",\"updated_at\":\"2024-03-04T06:43:45.000000Z\"}}', NULL, '2024-03-04 01:13:45', '2024-03-04 01:13:45'),
(2, 'default', 'updated', 'App\\Models\\Category', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"tester\",\"updated_by\":1,\"updated_at\":\"2024-03-04T06:44:45.000000Z\"},\"old\":{\"name\":\"test\",\"updated_by\":0,\"updated_at\":\"2024-03-04T06:43:45.000000Z\"}}', NULL, '2024-03-04 01:14:45', '2024-03-04 01:14:45'),
(3, 'default', 'updated', 'App\\Models\\Category', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"insurance\",\"updated_at\":\"2024-03-04T06:45:05.000000Z\"},\"old\":{\"name\":\"tester\",\"updated_at\":\"2024-03-04T06:44:45.000000Z\"}}', NULL, '2024-03-04 01:15:05', '2024-03-04 01:15:05'),
(4, 'default', 'created', 'App\\Models\\Category', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":2,\"name\":\"asdasd\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-04T06:50:51.000000Z\",\"updated_at\":\"2024-03-04T06:50:51.000000Z\"}}', NULL, '2024-03-04 01:20:51', '2024-03-04 01:20:51'),
(5, 'default', 'created', 'App\\Models\\Category', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":3,\"name\":\"sads\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-04T07:22:04.000000Z\",\"updated_at\":\"2024-03-04T07:22:04.000000Z\"}}', NULL, '2024-03-04 01:52:04', '2024-03-04 01:52:04'),
(6, 'default', 'updated', 'App\\Models\\Category', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_by\":1,\"updated_at\":\"2024-03-04T07:22:34.000000Z\"},\"old\":{\"updated_by\":0,\"updated_at\":\"2024-03-04T07:22:04.000000Z\"}}', NULL, '2024-03-04 01:52:34', '2024-03-04 01:52:34'),
(7, 'default', 'updated', 'App\\Models\\Category', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"mutual fund\",\"updated_at\":\"2024-03-04T07:22:54.000000Z\"},\"old\":{\"name\":\"sads\",\"updated_at\":\"2024-03-04T07:22:34.000000Z\"}}', NULL, '2024-03-04 01:52:54', '2024-03-04 01:52:54'),
(8, 'default', 'created', 'App\\Models\\Slider', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"title\":\"test\",\"sub_title\":\"test\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php1677.tmp\",\"btn_name\":\"test\",\"btn_link\":\"test\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T05:36:25.000000Z\",\"updated_at\":\"2024-03-05T05:36:25.000000Z\"}}', NULL, '2024-03-05 00:06:25', '2024-03-05 00:06:25'),
(9, 'default', 'updated', 'App\\Models\\Slider', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\phpA552.tmp\",\"updated_by\":1,\"updated_at\":\"2024-03-05T05:42:29.000000Z\"},\"old\":{\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php1677.tmp\",\"updated_by\":0,\"updated_at\":\"2024-03-05T05:36:25.000000Z\"}}', NULL, '2024-03-05 00:12:30', '2024-03-05 00:12:30'),
(10, 'default', 'updated', 'App\\Models\\Slider', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\phpEDF5.tmp\",\"updated_at\":\"2024-03-05T05:42:48.000000Z\"},\"old\":{\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\phpA552.tmp\",\"updated_at\":\"2024-03-05T05:42:29.000000Z\"}}', NULL, '2024-03-05 00:12:48', '2024-03-05 00:12:48'),
(11, 'default', 'created', 'App\\Models\\Slider', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":2,\"title\":\"tester\",\"sub_title\":\"tester\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php9D41.tmp\",\"btn_name\":\"tester\",\"btn_link\":\"tester\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T05:43:33.000000Z\",\"updated_at\":\"2024-03-05T05:43:33.000000Z\"}}', NULL, '2024-03-05 00:13:33', '2024-03-05 00:13:33'),
(12, 'default', 'created', 'App\\Models\\Slider', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":3,\"title\":\"abc\",\"sub_title\":\"abc\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\phpDD87.tmp\",\"btn_name\":\"abc\",\"btn_link\":\"abc\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T05:43:49.000000Z\",\"updated_at\":\"2024-03-05T05:43:49.000000Z\"}}', NULL, '2024-03-05 00:13:49', '2024-03-05 00:13:49'),
(13, 'default', 'created', 'App\\Models\\Slider', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":4,\"title\":\"info\",\"sub_title\":\"info\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php766D.tmp\",\"btn_name\":\"info\",\"btn_link\":\"info\",\"disp_order\":0,\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T06:09:36.000000Z\",\"updated_at\":\"2024-03-05T06:09:36.000000Z\"}}', NULL, '2024-03-05 00:39:36', '2024-03-05 00:39:36'),
(14, 'default', 'created', 'App\\Models\\Pages', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"page_name\":\"sdfsdf\",\"page_slug\":\"sdfsdf\",\"page_img\":null,\"page_desc\":\"<p>sdfsdf<\\/p>\",\"page_meta_tag\":null,\"page_meta_title\":null,\"page_meta_desc\":null,\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T06:35:04.000000Z\",\"updated_at\":\"2024-03-05T06:35:04.000000Z\"}}', NULL, '2024-03-05 01:05:04', '2024-03-05 01:05:04'),
(15, 'default', 'created', 'App\\Models\\Pages', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":2,\"page_name\":\"test\",\"page_slug\":\"test\",\"page_img\":\"E:\\\\xampp\\\\tmp\\\\php4130.tmp\",\"page_desc\":\"<p>test<\\/p>\",\"page_meta_tag\":null,\"page_meta_title\":null,\"page_meta_desc\":null,\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T06:35:35.000000Z\",\"updated_at\":\"2024-03-05T06:35:35.000000Z\"}}', NULL, '2024-03-05 01:05:35', '2024-03-05 01:05:35'),
(16, 'default', 'created', 'App\\Models\\Pages', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":3,\"page_name\":\"asdsa\",\"page_slug\":\"asdsa\",\"page_img\":\"E:\\\\xampp\\\\tmp\\\\php6B8A.tmp\",\"page_desc\":\"<p>dasdasdasd<\\/p>\",\"page_meta_tag\":null,\"page_meta_title\":null,\"page_meta_desc\":null,\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T07:01:59.000000Z\",\"updated_at\":\"2024-03-05T07:01:59.000000Z\"}}', NULL, '2024-03-05 01:31:59', '2024-03-05 01:31:59'),
(17, 'default', 'updated', 'App\\Models\\Pages', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"page_meta_tag\":\"sadasdas\",\"page_meta_title\":\"sadasd\",\"page_meta_desc\":\"sadasda\",\"updated_by\":1,\"updated_at\":\"2024-03-05T07:02:11.000000Z\"},\"old\":{\"page_meta_tag\":null,\"page_meta_title\":null,\"page_meta_desc\":null,\"updated_by\":0,\"updated_at\":\"2024-03-05T07:01:59.000000Z\"}}', NULL, '2024-03-05 01:32:11', '2024-03-05 01:32:11'),
(18, 'default', 'created', 'App\\Models\\SocialMedia', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"instagram_link\":\"sadasd\",\"twitter_link\":\"sadasd\",\"youtube_link\":\"sadasd\",\"facebook_link\":\"wdssa\",\"pinterest_link\":\"sdasdsad\",\"linkedin_link\":\"sadasdsd\",\"created_by\":1,\"updated_by\":0,\"created_at\":\"2024-03-05T07:14:22.000000Z\",\"updated_at\":\"2024-03-05T07:14:22.000000Z\"}}', NULL, '2024-03-05 01:44:22', '2024-03-05 01:44:22'),
(19, 'default', 'created', 'App\\Models\\ContactInfo', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"email_1\":\"test@gmail.com\",\"email_2\":\"tester@gmail.com\",\"mobile_no_1\":\"9798989898\",\"mobile_no_2\":\"9879889890\",\"address\":\"<p>asdad<\\/p>\",\"created_by\":1,\"updated_by\":0,\"created_at\":\"2024-03-05T09:27:49.000000Z\",\"updated_at\":\"2024-03-05T09:27:49.000000Z\"}}', NULL, '2024-03-05 03:57:49', '2024-03-05 03:57:49'),
(20, 'default', 'created', 'App\\Models\\GeneralSetting', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"project_title\":\"edsfds\",\"phone_no\":\"343453534\",\"email\":\"testers@gmail.com\",\"address\":\"<p>dsfsdf<\\/p>\",\"logo_img\":\"E:\\\\xampp\\\\tmp\\\\phpAF9B.tmp\",\"footer_logo_img\":\"E:\\\\xampp\\\\tmp\\\\phpAFAC.tmp\",\"icon_img\":\"E:\\\\xampp\\\\tmp\\\\phpAF9A.tmp\",\"info\":\"<p>sdfsdfsdf<\\/p>\",\"page_meta_tag\":\"sdfdsf\",\"page_meta_title\":\"dfdsfds\",\"page_meta_desc\":\"fdsfsdf\",\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-03-05T15:26:54.000000Z\",\"updated_at\":\"2024-03-05T15:26:54.000000Z\"}}', NULL, '2024-03-05 09:56:54', '2024-03-05 09:56:54'),
(21, 'default', 'created', 'App\\Models\\Testimonial', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"title\":\"testq\",\"designation\":\"dsfsdf\",\"image\":\"E:\\\\xampp\\\\tmp\\\\phpB649.tmp\",\"description\":\"<p>dfdsfsdf<\\/p>\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T11:04:11.000000Z\",\"updated_at\":\"2024-09-16T11:04:11.000000Z\"}}', NULL, '2024-09-16 05:34:11', '2024-09-16 05:34:11'),
(22, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"image\":\"E:\\\\xampp\\\\tmp\\\\php67C5.tmp\",\"updated_by\":1,\"updated_at\":\"2024-09-16T11:12:34.000000Z\"},\"old\":{\"image\":\"0676047001726484651.jpg\",\"updated_by\":0,\"updated_at\":\"2024-09-16T11:04:11.000000Z\"}}', NULL, '2024-09-16 05:42:34', '2024-09-16 05:42:34'),
(23, 'default', 'created', 'App\\Models\\Testimonial', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":2,\"title\":\"john due\",\"designation\":\"Founder of Infinity\",\"image\":\"E:\\\\xampp\\\\tmp\\\\php1FBA.tmp\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,<\\/p>\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T11:21:00.000000Z\",\"updated_at\":\"2024-09-16T11:21:00.000000Z\"}}', NULL, '2024-09-16 05:51:00', '2024-09-16 05:51:00'),
(24, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"image\":\"E:\\\\xampp\\\\tmp\\\\phpA602.tmp\",\"updated_by\":1,\"updated_at\":\"2024-09-16T11:21:34.000000Z\"},\"old\":{\"image\":\"0842613001726485660.png\",\"updated_by\":0,\"updated_at\":\"2024-09-16T11:21:00.000000Z\"}}', NULL, '2024-09-16 05:51:34', '2024-09-16 05:51:34'),
(25, 'default', 'created', 'App\\Models\\Testimonial', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":3,\"title\":\"smith\",\"designation\":\"Founder of airbnb services\",\"image\":\"E:\\\\xampp\\\\tmp\\\\php557D.tmp\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,<\\/p>\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T11:22:19.000000Z\",\"updated_at\":\"2024-09-16T11:22:19.000000Z\"}}', NULL, '2024-09-16 05:52:20', '2024-09-16 05:52:20'),
(26, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"title\":\"smith saas\",\"updated_by\":1,\"updated_at\":\"2024-09-16T11:22:33.000000Z\"},\"old\":{\"title\":\"smith\",\"updated_by\":0,\"updated_at\":\"2024-09-16T11:22:20.000000Z\"}}', NULL, '2024-09-16 05:52:33', '2024-09-16 05:52:33'),
(27, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"title\":\"smith\",\"image\":\"E:\\\\xampp\\\\tmp\\\\phpFEDD.tmp\",\"updated_at\":\"2024-09-16T11:23:03.000000Z\"},\"old\":{\"title\":\"smith saas\",\"image\":\"0043428001726485740.jpg\",\"updated_at\":\"2024-09-16T11:22:33.000000Z\"}}', NULL, '2024-09-16 05:53:03', '2024-09-16 05:53:03'),
(28, 'default', 'updated', 'App\\Models\\Slider', 'updated', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php805F.tmp\",\"updated_by\":1,\"updated_at\":\"2024-09-16T11:27:58.000000Z\"},\"old\":{\"slider_img\":\"0744811001709617413.jpg\",\"updated_by\":0,\"updated_at\":\"2024-09-16T10:33:11.000000Z\"}}', NULL, '2024-09-16 05:57:58', '2024-09-16 05:57:58'),
(29, 'default', 'updated', 'App\\Models\\Slider', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\phpC865.tmp\",\"updated_by\":1,\"updated_at\":\"2024-09-16T11:28:16.000000Z\"},\"old\":{\"slider_img\":\"0987730001709617429.jpg\",\"updated_by\":0,\"updated_at\":\"2024-09-16T10:33:11.000000Z\"}}', NULL, '2024-09-16 05:58:16', '2024-09-16 05:58:16'),
(30, 'default', 'created', 'App\\Models\\About', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":1,\"page_name\":\"rtdtret\",\"sub_title\":\"ALL PROUDCTS IN ONE PLANT\",\"page_img\":\"E:\\\\xampp\\\\tmp\\\\php36E.tmp\",\"page_desc\":\"<p>rddtretretret<\\/p>\",\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T11:46:00.000000Z\",\"updated_at\":\"2024-09-16T11:46:00.000000Z\"}}', NULL, '2024-09-16 06:16:00', '2024-09-16 06:16:00'),
(31, 'default', 'created', 'App\\Models\\Slider', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":5,\"title\":\"testtstt\",\"sub_title\":\"ddsyyuds\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php7D6B.tmp\",\"btn_name\":\"dssdfds\",\"btn_link\":\"dfdf\",\"disp_order\":0,\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T12:17:06.000000Z\",\"updated_at\":\"2024-09-16T12:17:06.000000Z\"}}', NULL, '2024-09-16 06:47:06', '2024-09-16 06:47:06'),
(32, 'default', 'updated', 'App\\Models\\Slider', 'updated', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"title\":\"test\",\"sub_title\":\"test\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\phpD017.tmp\",\"btn_name\":\"test\",\"btn_link\":\"test\",\"updated_by\":1,\"updated_at\":\"2024-09-16T12:19:38.000000Z\"},\"old\":{\"title\":\"testtstt\",\"sub_title\":\"ddsyyuds\",\"slider_img\":\"0970017001726489026.jpg\",\"btn_name\":\"dssdfds\",\"btn_link\":\"dfdf\",\"updated_by\":0,\"updated_at\":\"2024-09-16T12:17:21.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 06:49:38', '2024-09-16 06:49:38'),
(33, 'default', 'created', 'App\\Models\\Testimonial', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":4,\"title\":\"testee\",\"designation\":\"testee\",\"image\":\"E:\\\\xampp\\\\tmp\\\\php5179.tmp\",\"description\":\"<p>testee<\\/p>\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T12:24:34.000000Z\",\"updated_at\":\"2024-09-16T12:24:34.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 06:54:34', '2024-09-16 06:54:34'),
(34, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_by\":1,\"updated_at\":\"2024-09-16T12:25:05.000000Z\"},\"old\":{\"updated_by\":0,\"updated_at\":\"2024-09-16T12:24:34.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 06:55:05', '2024-09-16 06:55:05'),
(35, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"title\":\"test\",\"designation\":\"test\",\"image\":\"E:\\\\xampp\\\\tmp\\\\phpA504.tmp\",\"updated_at\":\"2024-09-16T12:26:01.000000Z\"},\"old\":{\"title\":\"testee\",\"designation\":\"testee\",\"image\":\"0538658001726489474.jpg\",\"updated_at\":\"2024-09-16T12:25:05.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 06:56:01', '2024-09-16 06:56:01'),
(36, 'default', 'updated', 'App\\Models\\Pages', 'updated', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"page_img\":\"E:\\\\xampp\\\\tmp\\\\php65D.tmp\",\"updated_at\":\"2024-09-16T12:34:04.000000Z\"},\"old\":{\"page_img\":null,\"updated_at\":\"2024-09-16T12:32:54.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 07:04:04', '2024-09-16 07:04:04'),
(37, 'default', 'created', 'App\\Models\\Slider', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":6,\"title\":\"test\",\"sub_title\":\"test\",\"slider_img\":\"E:\\\\xampp\\\\tmp\\\\php1D33.tmp\",\"btn_name\":null,\"btn_link\":null,\"disp_order\":0,\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T13:13:29.000000Z\",\"updated_at\":\"2024-09-16T13:13:29.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 07:43:30', '2024-09-16 07:43:30'),
(38, 'default', 'updated', 'App\\Models\\Slider', 'updated', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"title\":\"tester\",\"sub_title\":\"tester\",\"updated_by\":1,\"updated_at\":\"2024-09-16T13:13:41.000000Z\"},\"old\":{\"title\":\"test\",\"sub_title\":\"test\",\"updated_by\":0,\"updated_at\":\"2024-09-16T13:13:30.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 07:43:41', '2024-09-16 07:43:41'),
(39, 'default', 'updated', 'App\\Models\\Slider', 'updated', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"delete_by\":1,\"updated_at\":\"2024-09-16T13:14:04.000000Z\"},\"old\":{\"delete_by\":0,\"updated_at\":\"2024-09-16T13:13:41.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 07:44:04', '2024-09-16 07:44:04'),
(40, 'default', 'created', 'App\\Models\\Testimonial', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":5,\"title\":\"tester\",\"designation\":\"manager\",\"image\":\"E:\\\\xampp\\\\tmp\\\\php26E3.tmp\",\"description\":\"<p>sdfsdf dsfdsf dsfdsf<\\/p>\",\"status\":1,\"delete_by\":0,\"created_by\":1,\"updated_by\":0,\"deleted_at\":null,\"created_at\":\"2024-09-16T13:14:37.000000Z\",\"updated_at\":\"2024-09-16T13:14:37.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 07:44:38', '2024-09-16 07:44:38'),
(41, 'default', 'updated', 'App\\Models\\Testimonial', 'updated', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"delete_by\":1,\"updated_at\":\"2024-09-16T13:14:52.000000Z\"},\"old\":{\"delete_by\":0,\"updated_at\":\"2024-09-16T13:14:38.000000Z\"},\"ip\":\"127.0.0.1\"}', NULL, '2024-09-16 07:44:52', '2024-09-16 07:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `delete_by` bigint(20) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `delete_by`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'insurance', 1, 0, 1, 1, NULL, '2024-03-04 01:13:45', '2024-03-04 01:15:05'),
(2, 'asdasd', 1, 1, 1, 0, '2024-03-04 01:24:23', '2024-03-04 01:20:51', '2024-03-04 01:24:23'),
(3, 'mutual fund', 1, 0, 1, 1, NULL, '2024-03-04 01:52:04', '2024-03-04 01:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

DROP TABLE IF EXISTS `general_setting`;
CREATE TABLE IF NOT EXISTS `general_setting` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo_img` varchar(100) DEFAULT NULL,
  `footer_logo_img` varchar(100) DEFAULT NULL,
  `icon_img` varchar(100) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `page_meta_tag` text DEFAULT NULL,
  `page_meta_title` text DEFAULT NULL,
  `page_meta_desc` text DEFAULT NULL,
  `created_by` bigint(20) DEFAULT 0,
  `updated_by` bigint(20) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `project_title`, `phone_no`, `email`, `address`, `logo_img`, `footer_logo_img`, `icon_img`, `info`, `page_meta_tag`, `page_meta_title`, `page_meta_desc`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Airbnb Service', '9876543210', 'airbnbservice@gmail.com', '<p>raiya road, rajkot</p>', '0224603001709652476.jpg', '0248984001709652476.jpg', '0182954001709652476.jpg', '<p>raiya road, rajkot</p>', 'Airbnb Service', 'Airbnb Service', 'Airbnb Service', 1, 0, NULL, '2024-03-05 09:56:54', '2024-09-16 07:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_07_075814_create_permission_tables', 1),
(7, '2024_01_24_062709_add_wa_key_to_users_table', 2),
(8, '2024_03_04_053749_create_categories_table', 3),
(9, '2024_03_04_060819_create_activity_log_table', 4),
(10, '2024_03_04_060820_add_event_column_to_activity_log_table', 4),
(11, '2024_03_04_060821_add_batch_uuid_column_to_activity_log_table', 4),
(13, '2024_03_05_045537_create_sliders_table', 5),
(14, '2024_03_05_061533_create_pages_table', 6),
(15, '2024_03_05_070904_create_social_media_table', 7),
(17, '2024_03_05_143618_create_general_settings_table', 9),
(18, '2024_03_09_055141_create_testimonials_table', 10),
(19, '2024_03_10_132127_create_about_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) DEFAULT NULL,
  `page_slug` varchar(100) DEFAULT NULL,
  `page_img` varchar(100) DEFAULT NULL,
  `page_desc` text DEFAULT NULL,
  `page_meta_tag` text DEFAULT NULL,
  `page_meta_title` text DEFAULT NULL,
  `page_meta_desc` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `delete_by` bigint(20) DEFAULT 0,
  `created_by` bigint(20) DEFAULT 0,
  `updated_by` bigint(20) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_slug`, `page_img`, `page_desc`, `page_meta_tag`, `page_meta_title`, `page_meta_desc`, `status`, `delete_by`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tester', 'tester', '0571368001709621349.jpg', '<p>tester</p>', 'tester', 'tester', 'tester', 1, 0, 1, 1, NULL, '2024-03-05 01:05:04', '2024-03-05 01:19:09'),
(2, 'test', 'test', '0707318001709620535.jpg', '<p>test</p>', NULL, NULL, NULL, 1, 1, 1, 0, '2024-03-05 01:29:07', '2024-03-05 01:05:35', '2024-03-05 01:29:07'),
(3, 'asdsa', 'asdsa', NULL, '<p>dasdasdasd</p>', 'sadasdas', 'sadasd', 'sadasda', 1, 0, 1, 1, NULL, '2024-03-05 01:31:59', '2024-09-16 07:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-01-24 09:08:05', '2024-01-24 09:08:05'),
(2, 'role-create', 'web', '2024-01-24 09:08:05', '2024-01-24 09:08:05'),
(3, 'role-edit', 'web', '2024-01-24 09:08:05', '2024-01-24 09:08:05'),
(4, 'role-delete', 'web', '2024-01-24 09:08:06', '2024-01-24 09:08:06'),
(5, 'user-list', 'web', '2024-01-24 09:15:58', '2024-01-24 09:15:58'),
(6, 'user-create', 'web', '2024-01-24 09:15:58', '2024-01-24 09:15:58'),
(7, 'user-edit', 'web', '2024-01-24 09:15:59', '2024-01-24 09:15:59'),
(8, 'user-delete', 'web', '2024-01-24 09:15:59', '2024-01-24 09:15:59'),
(9, 'category-list', 'web', '2024-03-04 00:25:34', '2024-03-04 00:25:34'),
(10, 'category-create', 'web', '2024-03-04 00:25:34', '2024-03-04 00:25:34'),
(11, 'category-edit', 'web', '2024-03-04 00:25:34', '2024-03-04 00:25:34'),
(12, 'category-delete', 'web', '2024-03-04 00:25:34', '2024-03-04 00:25:34'),
(13, 'slider-list', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(14, 'slider-create', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(15, 'slider-edit', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(16, 'slider-delete', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(17, 'page-list', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(18, 'page-create', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(19, 'page-edit', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(20, 'page-delete', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(21, 'service-list', 'web', '2024-03-04 23:51:25', '2024-03-04 23:51:25'),
(22, 'service-create', 'web', '2024-03-04 23:51:26', '2024-03-04 23:51:26'),
(23, 'service-edit', 'web', '2024-03-04 23:51:26', '2024-03-04 23:51:26'),
(24, 'service-delete', 'web', '2024-03-04 23:51:26', '2024-03-04 23:51:26'),
(25, 'pages-list', 'web', '2024-09-16 05:46:53', '2024-09-16 05:46:53'),
(26, 'pages-create', 'web', '2024-09-16 05:46:53', '2024-09-16 05:46:53'),
(27, 'pages-edit', 'web', '2024-09-16 05:46:54', '2024-09-16 05:46:54'),
(28, 'pages-delete', 'web', '2024-09-16 05:46:54', '2024-09-16 05:46:54'),
(29, 'testimonial-list', 'web', '2024-09-16 05:46:54', '2024-09-16 05:46:54'),
(30, 'testimonial-create', 'web', '2024-09-16 05:46:54', '2024-09-16 05:46:54'),
(31, 'testimonial-edit', 'web', '2024-09-16 05:46:54', '2024-09-16 05:46:54'),
(32, 'testimonial-delete', 'web', '2024-09-16 05:46:54', '2024-09-16 05:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-01-13 05:34:51', '2024-01-13 05:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `sub_title` varchar(100) DEFAULT NULL,
  `slider_img` varchar(100) DEFAULT NULL,
  `btn_name` varchar(100) DEFAULT NULL,
  `btn_link` varchar(100) DEFAULT NULL,
  `disp_order` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `delete_by` bigint(20) DEFAULT 0,
  `created_by` bigint(20) DEFAULT 0,
  `updated_by` bigint(20) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `sub_title`, `slider_img`, `btn_name`, `btn_link`, `disp_order`, `status`, `delete_by`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '0525154001709617368.jpg', 'test', 'test', 1, 1, 1, 1, 1, '2024-03-05 00:36:50', '2024-03-05 00:06:25', '2024-03-05 00:36:50'),
(2, 'tester', 'tester', '0570293001726486078.jpg', 'tester', 'tester', 2, 1, 0, 1, 1, NULL, '2024-03-05 00:13:33', '2024-09-16 06:47:21'),
(3, 'abc', 'abc', '0829103001726486096.jpg', 'abc', 'abc', 3, 1, 0, 1, 1, NULL, '2024-03-05 00:13:49', '2024-09-16 06:47:21'),
(4, 'info', 'info', '0459996001709618976.jpg', 'info', 'info', 3, 1, 1, 1, 0, '2024-09-16 05:58:24', '2024-03-05 00:39:36', '2024-09-16 05:58:24'),
(5, 'test', 'test', '0973469001726489178.jpg', 'test', 'test', 1, 1, 1, 1, 1, '2024-09-16 06:49:58', '2024-09-16 06:47:06', '2024-09-16 06:49:58'),
(6, 'tester', 'tester', '0136671001726492410.jpg', NULL, NULL, 0, 1, 1, 1, 1, '2024-09-16 07:44:04', '2024-09-16 07:43:29', '2024-09-16 07:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
CREATE TABLE IF NOT EXISTS `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `instagram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT 0,
  `updated_by` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `instagram_link`, `twitter_link`, `youtube_link`, `facebook_link`, `pinterest_link`, `linkedin_link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'https://www.instagram.com', 'https://www.twitter.com', 'https://www.youtube.com', 'https://www.facebook.com', 'www.pinterest.com', 'https://www.linkedin.com', 1, 0, '2024-03-05 01:44:22', '2024-09-16 07:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `delete_by` bigint(20) DEFAULT 0,
  `created_by` bigint(20) DEFAULT 0,
  `updated_by` bigint(20) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `title`, `designation`, `image`, `description`, `status`, `delete_by`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'testq', 'dsfsdf', '0566098001726485154.jpg', '<p>dfdsfsdf</p>', 1, 1, 1, 1, '2024-09-16 05:43:47', '2024-09-16 05:34:11', '2024-09-16 05:43:47'),
(2, 'john due', 'Founder of Infinity', '0823211001726485694.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 1, 0, 1, 1, NULL, '2024-09-16 05:51:00', '2024-09-16 05:51:34'),
(3, 'smith', 'Founder of airbnb services', '0213834001726485783.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 1, 0, 1, 1, NULL, '2024-09-16 05:52:19', '2024-09-16 05:53:03'),
(4, 'test', 'test', '0379251001726489561.jpg', '<p>testee</p>', 1, 0, 1, 1, NULL, '2024-09-16 06:54:34', '2024-09-16 06:56:01'),
(5, 'tester', 'manager', '0133376001726492478.jpg', '<p>sdfsdf dsfdsf dsfdsf</p>', 1, 1, 1, 0, '2024-09-16 07:44:52', '2024-09-16 07:44:37', '2024-09-16 07:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` varchar(15) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `access_token` varchar(100) DEFAULT NULL,
  `instance_id` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `email_verified_at`, `remember_token`, `user_type`, `status`, `access_token`, `instance_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$19t6AdhBLqITdDSq3Cj16umtGSZQ99IVusq3Apo4kEaOgp7YQIh7C', NULL, NULL, 'admin', 1, 'c4f9de0b4f5ca6de5fb788832df71bb0', '65AB691B0CFDF', NULL, '2024-01-13 05:34:51', '2024-09-17 01:17:54'),
(2, 'asd', 'johnon@gmail.com', '$2y$10$vTBzF6NJXKDPjLd1aUX2aOVryiC6wjNL7dV1K2KgPnK5iiH3GWnv2', NULL, NULL, NULL, 0, NULL, NULL, '2024-03-04 01:26:58', '2024-03-04 01:24:55', '2024-03-04 01:26:58'),
(3, 'tester', 'tester@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2024-09-16 07:37:55', '2024-09-16 07:09:43', '2024-09-16 07:37:55'),
(4, 'test', 'test@gmail.com', '$2y$10$HAulSzQhrJX7gVH58tPA6OndbdHKRN3PYZkJRmHloJQR4.12MREbO', NULL, NULL, NULL, 0, NULL, NULL, '2024-09-16 07:47:00', '2024-09-16 07:46:43', '2024-09-16 07:47:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
