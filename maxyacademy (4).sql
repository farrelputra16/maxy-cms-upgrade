-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 09:20 AM
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
-- Database: `maxyacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_group`
--

CREATE TABLE `access_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access_group`
--

INSERT INTO `access_group` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'super', 'fixed', 1, '2022-09-20 09:01:02', 1, '2023-07-06 15:47:42', 1),
(13, 'COBAAAA', 'COBAAAAA ADDDDD DR CMSSSS , EDITTTTT DR CMSSSSS', 0, '2023-09-11 06:37:42', 1, '2023-09-11 13:38:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `access_group_detail`
--

CREATE TABLE `access_group_detail` (
  `access_group_id` int(11) NOT NULL,
  `access_master_id` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access_group_detail`
--

INSERT INTO `access_group_detail` (`access_group_id`, `access_master_id`, `priority`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(1, 4, NULL),
(1, 5, NULL),
(1, 6, NULL),
(1, 7, NULL),
(1, 8, NULL),
(1, 9, NULL),
(1, 10, NULL),
(1, 11, NULL),
(1, 12, NULL),
(1, 13, NULL),
(1, 14, NULL),
(1, 15, NULL),
(1, 16, NULL),
(1, 17, NULL),
(1, 18, NULL),
(1, 19, NULL),
(1, 20, NULL),
(1, 21, NULL),
(1, 22, NULL),
(1, 23, NULL),
(1, 24, NULL),
(1, 25, NULL),
(1, 26, NULL),
(1, 27, NULL),
(1, 28, NULL),
(1, 29, NULL),
(1, 30, NULL),
(1, 31, NULL),
(1, 32, NULL),
(1, 33, NULL),
(1, 34, NULL),
(1, 35, NULL),
(1, 36, NULL),
(1, 37, NULL),
(1, 38, NULL),
(1, 39, NULL),
(1, 40, NULL),
(1, 41, NULL),
(1, 42, NULL),
(1, 43, NULL),
(1, 44, NULL),
(1, 45, NULL),
(1, 46, NULL),
(1, 47, NULL),
(1, 48, NULL),
(1, 49, NULL),
(1, 50, NULL),
(1, 51, NULL),
(1, 52, NULL),
(1, 53, NULL),
(1, 54, NULL),
(1, 55, NULL),
(1, 56, NULL),
(1, 57, NULL),
(1, 58, NULL),
(1, 59, NULL),
(1, 60, NULL),
(1, 61, NULL),
(1, 62, NULL),
(1, 63, NULL),
(1, 64, NULL),
(1, 65, NULL),
(1, 66, NULL),
(1, 67, NULL),
(1, 68, NULL),
(1, 69, NULL),
(1, 70, NULL),
(1, 71, NULL),
(1, 72, NULL),
(1, 73, NULL),
(1, 74, NULL),
(1, 75, NULL),
(1, 76, NULL),
(1, 77, NULL),
(1, 78, NULL),
(1, 79, NULL),
(1, 80, NULL),
(1, 81, NULL),
(1, 82, NULL),
(1, 83, NULL),
(1, 84, NULL),
(1, 85, NULL),
(1, 86, NULL),
(1, 87, NULL),
(1, 88, NULL),
(1, 89, NULL),
(1, 90, NULL),
(1, 91, NULL),
(1, 92, NULL),
(1, 93, NULL),
(1, 94, NULL),
(1, 95, NULL),
(1, 96, NULL),
(1, 97, NULL),
(1, 98, NULL),
(1, 99, NULL),
(1, 100, NULL),
(1, 101, NULL),
(1, 102, NULL),
(1, 103, NULL),
(1, 104, NULL),
(1, 105, NULL),
(1, 106, NULL),
(1, 107, NULL),
(1, 108, NULL),
(1, 109, NULL),
(1, 110, NULL),
(1, 111, NULL),
(1, 112, NULL),
(1, 113, NULL),
(1, 114, NULL),
(1, 115, NULL),
(1, 116, NULL),
(1, 117, NULL),
(1, 118, NULL),
(1, 119, NULL),
(1, 120, NULL),
(1, 121, NULL),
(1, 122, NULL),
(1, 123, NULL),
(1, 124, NULL),
(1, 125, NULL),
(1, 126, NULL),
(1, 127, NULL),
(1, 128, NULL),
(1, 129, NULL),
(1, 130, NULL),
(1, 131, NULL),
(1, 132, NULL),
(1, 133, NULL),
(1, 134, NULL),
(1, 135, NULL),
(1, 136, NULL),
(1, 137, NULL),
(1, 138, NULL),
(1, 139, NULL),
(1, 140, NULL),
(1, 141, NULL),
(1, 142, NULL),
(1, 143, NULL),
(1, 144, NULL),
(1, 145, NULL),
(1, 146, NULL),
(1, 147, NULL),
(1, 148, NULL),
(1, 149, NULL),
(1, 150, NULL),
(1, 151, NULL),
(1, 152, NULL),
(1, 153, NULL),
(1, 154, NULL),
(1, 155, NULL),
(1, 156, NULL),
(1, 157, NULL),
(1, 158, NULL),
(1, 159, NULL),
(1, 160, NULL),
(1, 161, NULL),
(1, 162, NULL),
(1, 163, NULL),
(1, 164, NULL),
(1, 165, NULL),
(1, 166, NULL),
(1, 167, NULL),
(1, 168, NULL),
(1, 169, NULL),
(1, 170, NULL),
(1, 171, NULL),
(1, 172, NULL),
(1, 173, NULL),
(1, 174, NULL),
(1, 175, NULL),
(1, 176, NULL),
(1, 177, NULL),
(1, 178, NULL),
(1, 179, NULL),
(1, 180, NULL),
(1, 181, NULL),
(1, 182, NULL),
(1, 183, NULL),
(1, 184, NULL),
(1, 185, NULL),
(1, 187, NULL),
(1, 188, NULL),
(1, 189, NULL),
(1, 190, NULL),
(1, 191, NULL),
(1, 192, NULL),
(1, 193, NULL),
(1, 194, NULL),
(1, 195, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `access_master`
--

CREATE TABLE `access_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access_master`
--

INSERT INTO `access_master` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'access_group_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(2, 'access_group_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(3, 'access_group_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(4, 'access_group_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(5, 'access_group_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(6, 'access_master_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(7, 'access_master_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(8, 'access_master_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(9, 'access_master_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(10, 'access_master_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(11, 'company_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(12, 'company_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(13, 'company_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(14, 'company_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(15, 'company_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(16, 'course_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(17, 'course_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(18, 'course_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(19, 'course_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(20, 'course_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(21, 'course_class_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(22, 'course_class_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(23, 'course_class_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(24, 'course_class_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(25, 'course_class_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(26, 'course_class_member_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(27, 'course_class_member_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(28, 'course_class_member_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(29, 'course_class_member_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(30, 'course_class_member_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(31, 'course_class_member_history_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(32, 'course_class_member_history_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(33, 'course_class_member_history_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(34, 'course_class_member_history_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(35, 'course_class_member_history_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(36, 'course_module_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(37, 'course_module_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(38, 'course_module_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(39, 'course_module_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(40, 'course_module_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(41, 'course_package_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:45:53', 1),
(42, 'course_package_create', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:45:53', 1),
(43, 'course_package_read', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:45:53', 1),
(44, 'course_package_update', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:45:53', 1),
(45, 'course_package_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:45:53', 1),
(46, 'course_package_benefit_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:47:51', 1),
(47, 'course_package_benefit_create', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:47:51', 1),
(48, 'course_package_benefit_read', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:47:51', 1),
(49, 'course_package_benefit_update', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:47:52', 1),
(50, 'course_package_benefit_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2023-06-13 08:47:52', 1),
(51, 'course_tutor_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(52, 'course_tutor_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(53, 'course_tutor_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(54, 'course_tutor_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(55, 'course_tutor_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(56, 'general_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(57, 'general_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(58, 'general_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(59, 'general_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(60, 'general_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(61, 'member_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(62, 'member_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(63, 'member_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(64, 'member_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(65, 'member_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(66, 'member_testimonial_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(67, 'member_testimonial_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(68, 'member_testimonial_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(69, 'member_testimonial_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(70, 'member_testimonial_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(71, 'message_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(72, 'message_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(73, 'message_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(74, 'message_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(75, 'message_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(76, 'm_bank_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(77, 'm_bank_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(78, 'm_bank_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(79, 'm_bank_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(80, 'm_bank_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(81, 'm_bank_account_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(82, 'm_bank_account_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(83, 'm_bank_account_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(84, 'm_bank_account_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(85, 'm_bank_account_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(86, 'm_course_type_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(87, 'm_course_type_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(88, 'm_course_type_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(89, 'm_course_type_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(90, 'm_course_type_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(91, 'm_difficulty_type_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(92, 'm_difficulty_type_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(93, 'm_difficulty_type_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(94, 'm_difficulty_type_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(95, 'm_difficulty_type_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(96, 'm_payment_type_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(97, 'm_payment_type_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(98, 'm_payment_type_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(99, 'm_payment_type_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(100, 'm_payment_type_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(101, 'm_tutor_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(102, 'm_tutor_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(103, 'm_tutor_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(104, 'm_tutor_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(105, 'm_tutor_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(106, 'promotion_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(107, 'promotion_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(108, 'promotion_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(109, 'promotion_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(110, 'promotion_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(111, 'promotion_course_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(112, 'promotion_course_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(113, 'promotion_course_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(114, 'promotion_course_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(115, 'promotion_course_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(116, 'trans_order_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(117, 'trans_order_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(118, 'trans_order_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(119, 'trans_order_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(120, 'trans_order_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(121, 'trans_order_confirm_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(122, 'trans_order_confirm_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(123, 'trans_order_confirm_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(124, 'trans_order_confirm_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(125, 'trans_order_confirm_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(126, 'users_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(127, 'users_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(128, 'users_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(129, 'users_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(130, 'users_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(131, 'users_failed_attempts_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(132, 'users_failed_attempts_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(133, 'users_failed_attempts_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(134, 'users_failed_attempts_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(135, 'users_failed_attempts_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(136, 'users_logs_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(137, 'users_logs_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(138, 'users_logs_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(139, 'users_logs_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(140, 'users_logs_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(141, 'dashboard_manage', NULL, 0, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(142, 'dashboard_create', NULL, 0, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(143, 'dashboard_read', NULL, 0, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(144, 'dashboard_update', NULL, 0, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(145, 'dashboard_delete', NULL, 0, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(146, 'course_module_child_manage', NULL, 0, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(147, 'course_module_child_create', NULL, 0, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(148, 'course_module_child_read', NULL, 0, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(149, 'course_module_child_update', NULL, 0, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(150, 'course_module_child_delete', NULL, 0, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(151, 'trans_order_report_manage', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(152, 'trans_order_report_create', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(153, 'trans_order_report_read', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(154, 'trans_order_report_update', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(155, 'trans_order_report_delete', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(156, 'trans_order_confirm_report_manage', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(157, 'trans_order_confirm_report_create', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(158, 'trans_order_confirm_report_read', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(159, 'trans_order_confirm_report_update', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(160, 'trans_order_confirm_report_delete', NULL, 0, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(161, 'course_class_module_manage', NULL, 0, '2022-09-29 13:49:24', 1, '2022-09-29 13:49:24', 1),
(162, 'course_class_module_create', NULL, 0, '2022-09-29 13:49:24', 1, '2022-09-29 13:49:24', 1),
(163, 'course_class_module_read', NULL, 0, '2022-09-29 13:49:24', 1, '2022-09-29 13:49:24', 1),
(164, 'course_class_module_update', NULL, 0, '2022-09-29 13:49:24', 1, '2022-09-29 13:49:24', 1),
(165, 'course_class_module_delete', NULL, 0, '2022-09-29 13:49:24', 1, '2022-09-29 13:49:24', 1),
(166, 'm_page_manage', '', 0, '2023-01-24 06:46:46', 1, '2023-02-01 13:58:54', 1),
(167, 'm_page_create', '', 0, '2023-01-24 06:47:04', 1, '2023-02-01 13:58:54', 1),
(168, 'm_page_read', '', 0, '2023-01-24 06:47:17', 1, '2023-02-01 13:58:54', 1),
(169, 'm_page_update', '', 0, '2023-01-24 06:47:40', 1, '2023-02-01 13:58:54', 1),
(170, 'm_page_delete', '', 0, '2023-01-24 06:47:57', 1, '2023-02-01 13:58:54', 1),
(171, 'm_program_step_manage', '', 0, '2023-01-24 06:54:12', 1, '2023-01-24 06:54:12', 1),
(172, 'm_program_step_create', '', 0, '2023-01-24 06:54:29', 1, '2023-01-24 06:54:29', 1),
(173, 'm_program_step_read', '', 0, '2023-01-24 06:54:42', 1, '2023-01-24 06:54:42', 1),
(174, 'm_program_step_update', '', 0, '2023-01-24 06:55:03', 1, '2023-01-24 06:55:03', 1),
(175, 'm_program_step_delete', '', 0, '2023-01-24 06:55:16', 1, '2023-01-24 06:55:16', 1),
(176, 'm_content_carousel_manage', NULL, 0, '2023-01-31 08:16:02', 1, '2023-01-31 08:16:02', 1),
(177, 'm_content_carousel_create', NULL, 0, '2023-01-31 08:17:16', 1, '2023-01-31 08:17:16', 1),
(178, 'm_content_carousel_read', NULL, 0, '2023-01-31 08:17:16', 1, '2023-01-31 08:17:16', 1),
(179, 'm_content_carousel_update', NULL, 0, '2023-01-31 08:17:16', 1, '2023-01-31 08:17:16', 1),
(180, 'm_content_carousel_delete', NULL, 0, '2023-01-31 08:17:16', 1, '2023-01-31 08:17:16', 1),
(181, 'm_faq_manage', NULL, 0, '2023-01-31 09:31:46', 1, '2023-01-31 09:31:46', 1),
(182, 'm_faq_create', NULL, 0, '2023-01-31 09:31:46', 1, '2023-01-31 09:31:46', 1),
(183, 'm_faq_read', NULL, 0, '2023-01-31 09:31:46', 1, '2023-01-31 09:31:46', 1),
(184, 'm_faq_update', NULL, 0, '2023-01-31 09:31:46', 1, '2023-01-31 09:31:46', 1),
(185, 'm_faq_delete', NULL, 0, '2023-01-31 09:31:46', 1, '2023-01-31 09:31:46', 1),
(187, 'partner_manage', NULL, 0, '2023-06-21 02:37:02', 1, '2023-06-21 02:37:02', 1),
(188, 'partner_create', NULL, 0, '2023-06-21 02:37:13', 1, '2023-06-21 02:37:13', 1),
(189, 'partner_update', NULL, 0, '2023-06-21 02:37:19', 1, '2023-06-21 02:37:19', 1),
(190, 'partner_university_detail_manage', NULL, 0, '2023-06-21 02:37:30', 1, '2023-06-21 02:37:30', 1),
(191, 'partner_university_detail_create', NULL, 0, '2023-06-21 02:37:39', 1, '2023-06-21 02:37:39', 1),
(192, 'partner_university_detail_update', NULL, 0, '2023-06-21 02:37:45', 1, '2023-06-21 02:37:45', 1),
(193, 'maxy_talk_manage', NULL, 0, '2023-07-06 08:49:50', 1, '2023-07-06 08:49:50', 1),
(194, 'maxy_talk_create', NULL, 0, '2023-07-06 08:49:57', 1, '2023-07-06 08:49:57', 1),
(195, 'maxy_talk_update', NULL, 0, '2023-07-06 08:50:04', 1, '2023-07-06 08:50:04', 1),
(196, 'COBAAAAAA', 'COBAAAAA ADDDD DR CMSSSSS , EDITTTTT DR CMSSSSS', 0, '2023-09-11 06:39:47', 1, '2023-09-11 13:39:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fake_price` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discounted_price` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `target` text NOT NULL COMMENT 'split with ;;',
  `payment_link` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `m_course_type_id` int(11) NOT NULL,
  `course_package_id` int(11) DEFAULT NULL,
  `m_difficulty_type_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `fake_price`, `price`, `discounted_price`, `short_description`, `image`, `preview`, `target`, `payment_link`, `slug`, `m_course_type_id`, `course_package_id`, `m_difficulty_type_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Backend', NULL, NULL, 0, 'no desc', 'no.jpg', '0', '0', '0', 'backend', 1, 3, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Backend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:56:03', 1, '2023-09-08 09:53:59', 1),
(2, 'Frontend', NULL, NULL, 0, 'no desc', 'no.jpg', '0', '0', '0', 'frontend', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Frontend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:56:27', 1, '2023-09-08 10:29:15', 1),
(3, 'UI/UX', NULL, NULL, 0, '', 'uiux.png', '', '', '', 'ui-ux', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai UI/UX Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:56:54', 1, '2023-07-04 14:57:30', 1),
(4, 'Entrepreneur', NULL, NULL, 0, '', '', '', '', '', 'entrepreneur', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Entrepreneur dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 0, '2022-09-26 10:57:28', 1, '2023-01-27 04:09:59', 1),
(5, 'Knockout JS', NULL, NULL, 0, '', 'k.jpg', '', '', '', 'knockout-js', 2, NULL, 1, '<p>Knockout is a JavaScript library that helps you to create rich, responsive display and editor user interfaces with a clean underlying data model. Any time you have sections of UI that update dynamically (e.g., changing depending on the user’s actions or when an external data source changes), KO can help you implement it more simply and maintainably.</p>', 1, '2022-09-26 10:58:16', 1, '2023-08-15 16:11:08', 1),
(6, 'PHP', NULL, NULL, 0, '', 'php.jpg', '', '', '', 'php', 2, NULL, 1, '<p>PHP is an HTML-embedded scripting language. Much of its syntax is borrowed from C, Java and Perl with a couple of unique PHP-specific features thrown in. The goal of the language is to allow web developers to write dynamically generated pages quickly.</p>', 1, '2022-09-28 16:42:00', 1, '2023-08-15 16:10:58', 1),
(7, 'Javascript', NULL, NULL, 0, '', 'js.jpg', '', '', '', 'javascript', 2, NULL, 1, '<p><strong>JavaScript,</strong> often abbreviated to <strong>JS</strong>, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use JavaScript on the client side for webpage behavior, often incorporating third-party libraries. All major web browsers have a dedicated JavaScript engine to execute the code on users\' devices.</p>\n<p>JavaScript is a high-level, often just-in-time compiled language that conforms to the ECMAScript standard. It has dynamic typing, prototype-based object-orientation, and first-class functions. It is multi-paradigm, supporting event-driven, functional, and imperative programming styles. It has application programming interfaces (APIs) for working with text, dates, regular expressions, standard data structures, and the Document Object Model (DOM).</p>\n<p>The ECMAScript standard does not include any input/output (I/O), such as networking, storage, or graphics facilities. In practice, the web browser or other runtime system provides JavaScript APIs for I/O.</p>', 1, '2022-10-03 12:58:33', 1, '2023-08-15 16:11:13', 1),
(8, 'Phyton', NULL, NULL, 0, '', 'python.png', '', '', '', 'phyton', 2, NULL, 1, '<p>Python is an interpreted, interactive, object-oriented programming language. It incorporates modules, exceptions, dynamic typing, very high level dynamic data types, and classes. It supports multiple programming paradigms beyond object-oriented programming, such as procedural and functional programming. Python combines remarkable power with very clear syntax. It has interfaces to many system calls and libraries, as well as to various window systems, and is extensible in C or C++. It is also usable as an extension language for applications that need a programmable interface. Finally, Python is portable: it runs on many Unix variants including Linux and macOS, and on Windows.</p>', 1, '2022-10-03 15:50:14', 1, '2023-08-15 16:11:20', 1),
(9, 'Digital Content Creator', 3000000, 299000, 0, '<p>Sekarang semua bisa berkarir menjadi Tiktok Content Creator!</p>', 'digital_content_creator.jpg', '', '', 'https://invoice.xendit.co/od/mbcp-cc-b04', 'digital-content-creator-mbc', 3, NULL, 1, 'Mau jadi Tiktok Content Creator tapi bingung mulai dari mana dan followers masih sedikit?\nJoin Mini Bootcamp Digital Content Creator Academy sekarang!\n\nTimeline:\n- 2 weeks Coaching', 1, '2023-02-24 11:43:52', 1, '2023-08-25 15:46:48', 1),
(10, 'Hybrid Apps', NULL, 1200000, 0, '<p>Belajar membuat website dan aplikasi dengan Framework 7 - 8 jam pembelajaran</p>', 'Prakerja-Hybrid_1.jpg', '', '', 'https://invoice.xendit.co/od/hybrid-apps', 'hybrid-apps', 3, NULL, 1, NULL, 0, '2023-03-24 08:42:03', 1, '2023-07-04 14:08:12', 1),
(11, 'Laravel Web Application Framework', NULL, 1500000, 0, '<p>Belajar Laravel Web Application Framework dalam mengembangkan website selama 10 jam pembelajaran</p>', 'Prakerja-Hybrid_1.jpg', '', '', 'https://invoice.xendit.co/od/laravel-web', 'laravel-web-application-framework', 3, NULL, 1, NULL, 0, '2023-03-24 08:42:03', 1, '2023-07-04 14:19:28', 1),
(12, 'UI/UX Design With Figma', NULL, 1500000, 0, '<p>Belajar mendesign UI/UX website design dengan Figma dalam 12jam</p>', 'Prakerja-Hybrid_1.jpg', '', '', 'https://invoice.xendit.co/od/miniBootcamp-UIUX', 'ui-ux-design-with-figma', 3, NULL, 1, NULL, 0, '2023-03-24 08:42:03', 1, '2023-07-04 14:19:14', 1),
(13, 'Hackathon - Improve Sales for Medium to High International Cosmetic Brand', NULL, NULL, 0, '', '', '', '', '', 'improve-sales-jennyhouse', 4, NULL, 1, 'Jenny House, with the largest number of top makeup artists in Korea, Jenny House Cosmetics is an all-Green grade natural derma cosmetic brand. All products are\r\nformulated with the finest natural ingredients and designed to give innovative dermatologic efficacies. Natural yet dermatologic, the two key concepts, are Maximized for Jenny House Cosmetics. Currently, Jenny House has existed in Indonesia to make it easier for our loyal customers to get our best products.', 1, '2023-03-29 13:16:50', 1, '2023-03-29 13:16:50', 1),
(14, 'Digital Marketing', NULL, NULL, 0, '', 'digital_marketing.png', '', '', '', 'digital-marketing', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Digital Marketing dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2023-05-11 09:38:43', 0, '2023-07-04 14:57:30', 0),
(15, 'Rapid Backend Development Bootcamp', NULL, 9000000, 0, 'MSIB Bootcamp - Rapid Backend Development Bootcamp', 'MSIB.png', '', '', '', 'msib-backend', 6, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Backend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2023-05-29 08:38:11', 1, '2023-07-05 15:08:57', 1),
(16, 'Rapid Frontend Development Bootcamp', NULL, 9000000, 0, 'MSIB Bootcamp - Rapid Frontend Development Bootcamp', 'MSIB.png', '', '', '', 'msib-frontend', 6, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Frontend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2023-05-29 08:38:11', 1, '2023-07-05 15:08:57', 1),
(17, 'Rapid UI/UX Development Bootcamp', NULL, 9000000, 0, 'MSIB UI/UX - Rapid UI/UX Development Bootcamp', 'MSIB.png', '', '', '', 'msib-uiux', 6, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai UI/UX Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2023-05-29 08:44:59', 1, '2023-07-05 15:08:57', 1),
(18, 'Speak Japanese Like a Local', 2000000, 299000, 0, 'Mau ke Jepang? Belajar bahasanya dulu, yuk!', 'speak_japanese_like_local.jpg', '-', '-', '-', 'speak_japanese_like_a_local', 3, NULL, 1, '<p>Kami dapat membantumu mendapatkan keahlian Berbahasa Jepang seperti Warga Lokal dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2023-06-28 11:59:53', 1, '2023-07-05 15:39:25', 1),
(19, 'Cyber Security', 0, 0, 0, 'no desc', 'no.jpg', '0', '0', '0', 'cyber_security', 1, 1, 2, NULL, 0, '2023-07-03 06:54:47', 1, '2023-07-03 06:54:47', 1),
(20, 'Hacking is not Cracking', 2000000, 299000, 0, 'Belajar hacking dalam waktu hitungan bulan!', 'hacking_not_cracking.jpg', '-', '-', 'https://invoice.xendit.co/od/mbcp-cs-b03', 'hacking_is_not_cracking', 3, NULL, 1, '<p>Hacking dan cracking adalah dua hal yang berbeda.<p> Hacking adalah proses mencari celah keamanan dalam sistem komputer atau jaringan komputer dengan tujuan untuk meningkatkan keamanan sistem tersebut.</p><p>Sedangkan cracking adalah proses mencari celah keamanan dalam sistem komputer atau jaringan komputer dengan tujuan untuk merusak atau mengambil alih sistem tersebut.</p></p>', 1, '2023-07-04 14:18:46', 1, '2023-07-05 15:49:57', 1),
(21, 'Digital Marketing', 2000000, 299000, 0, 'Kami dapat membantumu digital marketing Expert dalam hitungan bulan!', 'digital_marketing.jpg', '-', '-', 'https://invoice.xendit.co/od/mbcp-dm-b01', 'min_digital_marketing', 3, NULL, 1, 'Belajar digital marketing dapat membantu Anda memahami bagaimana cara memasarkan produk atau layanan Anda secara online. Dalam era digital saat ini, belajar digital marketing sangat penting untuk meningkatkan penjualan dan menjangkau pasar yang lebih luas. Selain itu, Anda juga dapat mempelajari cara membuat konten yang menarik dan efektif untuk menarik perhatian pelanggan potensial.', 1, '2023-07-04 14:18:46', 1, '2023-07-05 16:08:26', 1),
(22, 'coba_prakerja', NULL, NULL, 0, 'no desc', 'no.jpg', '0', '0', '0', 'pdaadada', 5, NULL, 2, 'COBAAAAAAAAAAA ADDDD DI CMSSS , EDITTTT DI CMSS', 1, '2023-09-07 08:10:39', 1, '2023-09-11 13:46:59', 1),
(23, 'Desain UI/UX website Tingkat Menengah', 0, 0, 0, 'no desc', 'no.jpg', '0', '0', '0', 'Desain_UI/UX_website_Tingkat_Menengah', 5, 1, 1, 'Desain UI/UX website Tingkat Menengah', 1, '2023-09-11 07:12:53', 1, '2023-09-11 07:12:53', 1),
(24, 'Digital Marketing 101:Sosial Media Marketing', 0, 0, 0, 'no desc', 'no.jpg', '0', '0', '0', 'Digital_Marketing_101_:_Sosial_Media_Marketing', 5, 1, 1, 'Digital Marketing 101:Sosial Media Marketing', 1, '2023-09-11 07:13:51', 1, '2023-09-11 07:13:51', 1),
(25, 'Teknik Pemasaran Produk untuk calon spesialis pemasaran', NULL, NULL, 0, 'no desc', 'no.jpg', '0', '0', '0', 'Teknik_Pemasaran_Produk_untuk_calon_spesialis_pemasaran', 5, NULL, 1, 'Teknik Pemasaran Produk untuk calon spesialis pemasaran', 1, '2023-09-11 07:14:34', 1, '2023-09-11 14:14:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_class`
--

CREATE TABLE `course_class` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quota` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Unlimited',
  `course_id` int(11) NOT NULL,
  `announcement` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_class`
--

INSERT INTO `course_class` (`id`, `batch`, `start_date`, `end_date`, `quota`, `course_id`, `announcement`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 1, '2022-09-26', '2022-12-26', 0, 1, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Backend. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-09-26 10:58:50', 1, '2023-08-08 20:40:00', 1),
(2, 1, '2022-09-26', '2022-12-26', 0, 20, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Hacking. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-09-26 10:59:16', 1, '2023-08-08 20:44:04', 1),
(3, 1, '2022-09-26', '2022-12-26', 0, 3, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in UI/UX. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-09-26 10:59:38', 1, '2023-08-08 20:46:26', 1),
(4, 1, '2022-09-26', '2022-12-26', 0, 4, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Entrepreneur. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-09-26 11:00:02', 1, '2023-08-08 20:46:46', 1),
(5, 1, '2022-09-26', '2022-12-26', 0, 5, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Knockout JS. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-09-26 11:00:28', 1, '2023-08-08 20:47:04', 1),
(6, 1, '2022-09-28', '2022-11-28', 0, 6, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in PHP. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-09-28 16:42:21', 1, '2023-08-08 20:47:14', 1),
(7, 1, '2022-10-03', '2022-12-03', 0, 7, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Javascript. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-10-03 12:58:56', 1, '2023-08-08 20:47:31', 1),
(8, 1, '2022-10-03', '2022-12-03', 0, 8, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Phyton. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2022-10-03 15:50:35', 1, '2023-08-08 20:47:52', 1),
(9, 1, '0000-00-00', '0000-00-00', 0, 9, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Digital Content Creator. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-02-24 12:09:25', 0, '2023-08-08 20:48:05', 0),
(10, 1, '0000-00-00', '0000-00-00', 0, 10, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Hybrid Apps. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-03-24 08:44:08', 1, '2023-08-08 20:48:18', 1),
(11, 1, '0000-00-00', '0000-00-00', 0, 11, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Laravel. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-03-24 08:44:09', 1, '2023-08-08 20:48:33', 1),
(12, 1, '0000-00-00', '0000-00-00', 0, 12, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in UI/UX Design with figma. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-03-24 08:44:09', 1, '2023-08-08 20:48:49', 1),
(13, 1, '0000-00-00', '0000-00-00', 0, 14, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Digital Marketing. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-05-11 09:42:21', 0, '2023-08-08 20:49:21', 0),
(14, 1, '0000-00-00', '0000-00-00', 0, 15, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Rapid Backend. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-05-29 09:32:19', 1, '2023-08-08 20:49:40', 1),
(15, 1, '0000-00-00', '0000-00-00', 0, 16, 'Jangan Lupa Mengerjakan Assignment', 'Here we provide you with a structured course that will teach you all you need to know to be an expert in Rapid Frontend. Work through each section, learning new skills (or improving existing ones) as you go along. Each section includes exercises and assessments to test your understanding before you move forward.', 1, '2023-05-29 09:32:19', 1, '2023-08-08 20:49:59', 1),
(16, 1, '0000-00-00', '0000-00-00', 0, 1, 'Jangan Lupa Mengerjakan Assignment', NULL, 1, '2023-05-29 09:32:35', 1, '2023-08-08 20:45:21', 1),
(17, 1, '2023-09-09', '2023-09-23', 1, 1, NULL, 'COBAAAAAA ADDD DR BACKENDDD , EDITTTT DI CMSSS', 1, '2023-09-08 08:56:45', 1, '2023-09-11 13:47:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_class_member`
--

CREATE TABLE `course_class_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `trans_order_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_class_member`
--

INSERT INTO `course_class_member` (`id`, `user_id`, `course_class_id`, `trans_order_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 3, 2, 1, NULL, 1, '2022-09-26 11:31:58', 1, '2022-09-26 11:31:58', 1),
(2, 1, 1, 2, NULL, 1, '2022-09-26 11:32:36', 1, '2023-09-11 01:36:52', 1),
(3, 2, 1, 3, NULL, 1, '2022-09-26 11:33:23', 1, '2022-09-26 11:33:23', 1),
(4, 66, 5, 4, 'hahahahahahah', 1, '2022-09-26 07:45:55', 1, '2023-09-10 18:57:41', 1),
(5, 1, 6, 5, NULL, 1, '2022-09-29 02:34:55', 1, '2022-09-29 02:34:55', 1),
(6, 4, 1, 7, NULL, 1, '2022-09-30 10:42:21', 1, '2022-09-30 10:42:21', 1),
(7, 1, 7, 11, NULL, 1, '2022-10-03 06:05:13', 1, '2022-10-03 06:05:13', 1),
(8, 1, 8, 12, NULL, 1, '2022-10-03 09:04:34', 1, '2022-10-03 09:04:34', 1),
(9, 25, 5, 14, NULL, 1, '2023-02-02 01:07:24', 1, '2023-02-02 01:07:24', 1),
(10, 34, 8, 15, NULL, 1, '2023-03-02 03:51:54', 1, '2023-03-02 03:51:54', 1),
(11, 66, 1, 16, NULL, 1, '2023-03-02 03:54:08', 1, '2023-07-23 00:50:26', 1),
(12, 66, 2, 17, NULL, 1, '2023-07-23 00:58:25', 1, '2023-08-02 16:58:16', 1),
(13, 66, 8, 18, NULL, 1, '2023-07-23 01:00:38', 1, '2023-08-02 18:18:47', 1),
(14, 55, 16, NULL, NULL, 1, '2023-07-24 01:07:06', 1, '2023-07-24 01:12:58', 1),
(15, 67, 1, 16, NULL, 1, '2023-07-24 01:13:17', 1, '2023-08-02 16:54:46', 1),
(16, 66, 7, NULL, NULL, 1, '2023-08-21 11:25:44', 1, '2023-08-21 11:25:44', 1),
(17, 66, 6, NULL, NULL, 1, '2023-08-21 11:27:11', 1, '2023-08-21 11:37:17', 1),
(18, 66, 8, NULL, NULL, 1, '2023-08-21 11:27:11', 1, '2023-08-21 11:27:11', 1),
(19, 66, 9, NULL, 'COBAAAAA ADD DARI BACKEND CMS , EDITTTTT DR CMS', 0, '2023-09-11 01:42:49', 1, '2023-09-11 06:47:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_class_member_history`
--

CREATE TABLE `course_class_member_history` (
  `id` int(11) NOT NULL,
  `submitted_file` varchar(250) DEFAULT NULL,
  `js` text DEFAULT NULL,
  `html` text DEFAULT NULL,
  `python` text DEFAULT NULL,
  `python_input` text DEFAULT NULL,
  `php` text DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `course_class_member_id` int(11) NOT NULL,
  `course_module_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_class_member_history`
--

INSERT INTO `course_class_member_history` (`id`, `submitted_file`, `js`, `html`, `python`, `python_input`, `php`, `comment`, `course_class_member_id`, `course_module_id`, `description`, `created_at`, `updated_at`) VALUES
(219, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 496, NULL, '2023-08-16 09:57:37', '2023-08-22 10:12:49'),
(228, NULL, '// This is a simple *viewmodel* - JavaScript that defines the data and behavior of your UI\nfunction AppViewModel() {\n    this.firstName = \"Bert\";\n    this.lastName = \"Bertington\";\n}\n\n// Activates knockout.js\nko.applyBindings(new AppViewModel());', '<p>First name: <strong data-bind=\"text: firstName\"></strong></p>\n<p>Last name: <strong data-bind=\"text: lastName\"></strong></p>', NULL, NULL, NULL, NULL, 4, 21, NULL, '2023-08-21 03:48:32', '2023-08-21 11:01:22'),
(230, NULL, '// This is a simple *viewmodel* - JavaScript that defines the data and behavior of your UI\nfunction AppViewModel() {\n    this.firstName = \"h\";\n    this.lastName = \"u\";\n}\n\n// Activates knockout.js\nko.applyBindings(new AppViewModel());', '<p>First name: <strong data-bind=\"text: firstName\"></strong></p>\n<p>Last name: <strong data-bind=\"text: lastName\"></strong></p>', NULL, NULL, NULL, NULL, 4, 27, NULL, '2023-08-21 04:38:04', '2023-08-21 11:38:05'),
(231, NULL, '// This is a simple *viewmodel* - JavaScript that defines the data and behavior of your UI\nfunction AppViewModel() {\n    this.firstName = \"budi\";\n    this.lastName = \"lol\";\n}\n\n// Activates knockout.js\nko.applyBindings(new AppViewModel());', '<p>First name: <strong data-bind=\"text: firstName\"></strong></p>\n<p>Last name: <strong data-bind=\"text: lastName\"></strong></p>', NULL, NULL, NULL, NULL, 16, 59, NULL, '2023-08-21 04:39:08', '2023-08-22 10:05:34'),
(232, NULL, NULL, NULL, NULL, NULL, '<?php\n    echo \"halo\";\n?>', NULL, 17, 49, NULL, '2023-08-21 04:45:43', '2023-08-22 10:11:24'),
(233, NULL, NULL, NULL, 'print(\"ha\")', NULL, NULL, NULL, 18, 69, NULL, '2023-08-21 05:09:11', '2023-08-21 12:13:07'),
(234, NULL, NULL, NULL, 'panjang = 2\r\nlebar = 3\r\nluas = panjang * lebar\r\nprint(luas)', '1\n2', NULL, NULL, 18, 71, NULL, '2023-08-21 06:23:02', '2023-08-21 13:23:41'),
(235, NULL, NULL, NULL, 'a = int(input())\r\nb = int(input())\r\n\r\n# Perform addition\r\nresult = a + b\r\n\r\n# Print the result\r\nprint(result)', '1\n2', NULL, NULL, 18, 80, NULL, '2023-08-21 06:25:27', '2023-08-21 13:27:37'),
(236, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 60, NULL, '2023-08-21 08:09:26', '2023-08-21 15:16:15'),
(237, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 61, NULL, '2023-08-21 08:11:49', '2023-08-22 10:05:37'),
(239, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 62, NULL, '2023-08-21 08:16:25', '2023-08-22 10:05:38'),
(240, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 50, NULL, '2023-08-21 08:18:10', '2023-08-21 15:18:10'),
(241, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 52, NULL, '2023-08-21 08:18:13', '2023-08-21 15:18:13'),
(242, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 70, NULL, '2023-08-21 08:18:59', '2023-08-21 15:19:00'),
(243, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 72, NULL, '2023-08-21 08:19:01', '2023-08-21 15:19:01'),
(244, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 73, NULL, '2023-08-21 08:19:03', '2023-08-21 15:19:03'),
(245, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 64, NULL, '2023-08-22 03:05:40', '2023-08-22 10:05:40'),
(246, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 66, NULL, '2023-08-22 03:05:40', '2023-08-22 10:05:41'),
(247, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 23, NULL, '2023-08-22 03:06:44', '2023-09-03 10:32:53'),
(248, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 24, NULL, '2023-08-22 03:06:45', '2023-08-22 10:06:45'),
(249, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 25, NULL, '2023-08-22 03:06:46', '2023-08-22 10:06:46'),
(250, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 26, NULL, '2023-08-22 03:06:47', '2023-08-22 10:06:47'),
(251, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 29, NULL, '2023-08-22 03:06:49', '2023-08-22 10:06:49'),
(252, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 30, NULL, '2023-08-22 03:06:50', '2023-08-22 10:06:50'),
(253, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 31, NULL, '2023-08-22 03:06:50', '2023-08-22 10:06:50'),
(254, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 32, NULL, '2023-08-22 03:06:51', '2023-08-22 10:06:52'),
(255, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 33, NULL, '2023-08-22 03:06:53', '2023-08-22 10:06:53'),
(256, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 367, NULL, '2023-08-22 08:28:54', '2023-08-22 08:32:25'),
(257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 362, NULL, '2023-08-22 08:32:15', '2023-08-30 07:30:43'),
(258, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 364, NULL, '2023-08-22 08:32:19', '2023-08-22 08:32:19'),
(259, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 365, NULL, '2023-08-22 08:32:22', '2023-08-22 08:32:22'),
(260, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 368, NULL, '2023-08-22 08:32:29', '2023-08-30 07:30:38'),
(261, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 371, NULL, '2023-08-22 08:32:32', '2023-08-22 08:32:32'),
(262, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 372, NULL, '2023-08-22 08:32:35', '2023-08-28 04:05:00'),
(263, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 361, NULL, '2023-08-28 04:05:36', '2023-08-28 05:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_class_module`
--

CREATE TABLE `course_class_module` (
  `id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `priority` int(11) NOT NULL,
  `course_module_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_class_module`
--

INSERT INTO `course_class_module` (`id`, `start_date`, `end_date`, `priority`, `course_module_id`, `course_class_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(17, '2023-08-09 08:00:00', '2023-08-09 13:00:00', 1, 362, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-14 08:24:53', 0),
(18, '2023-08-13 08:32:58', '0000-00-00 00:00:00', 2, 360, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-14 08:33:19', 0),
(19, '2023-07-19 08:00:00', '0000-00-00 00:00:00', 3, 361, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-15 11:18:17', 0),
(20, '2023-08-02 16:43:46', '0000-00-00 00:00:00', 4, 368, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-14 16:43:49', 0),
(21, '0000-00-00 00:00:00', '2023-08-18 08:45:38', 5, 365, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-11 08:51:56', 0),
(22, '2023-09-30 11:19:41', '0000-00-00 00:00:00', 6, 372, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-15 11:20:50', 0),
(23, '2023-07-20 16:37:21', '0000-00-00 00:00:00', 7, 489, 1, NULL, 0, '2023-06-22 09:32:39', 0, '2023-08-15 16:37:30', 0),
(24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 8, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 9, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 10, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 11, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 12, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 13, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 14, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 15, 2, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 16, 3, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(33, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 17, 3, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 18, 3, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 19, 3, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(36, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 20, 3, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(37, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 21, 5, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(38, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 27, 5, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(39, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 33, 5, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(40, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 38, 5, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(41, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 49, 6, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(42, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 51, 6, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(43, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 53, 6, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(44, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 55, 6, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(45, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 57, 6, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(46, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 59, 7, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(47, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 63, 7, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(48, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 67, 7, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(49, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 69, 8, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 71, 8, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 74, 8, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 76, 8, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(53, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 78, 8, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(54, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 80, 8, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(56, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 82, 9, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(57, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 83, 9, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(58, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 84, 9, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(59, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 85, 9, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(60, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 86, 13, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(61, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 87, 13, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(62, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 88, 13, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(63, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 89, 13, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(64, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 94, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(65, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 95, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(66, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 96, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(67, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 97, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(68, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 98, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(69, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 99, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(70, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 100, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(71, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 101, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(72, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 102, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(73, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 103, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(74, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 104, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(75, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 105, 14, NULL, 0, '2023-06-22 09:32:39', 0, '2023-06-22 09:32:39', 0),
(76, '2023-09-12 00:00:00', '2023-09-12 00:00:00', 100, 405, 1, 'COBAA ADD DR CMS ,EDITTTT DR CMS', 0, '2023-09-11 01:47:30', 1, '2023-09-11 10:38:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_company`
--

CREATE TABLE `course_company` (
  `course_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_module`
--

CREATE TABLE `course_module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `html` text DEFAULT NULL,
  `js` text DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_module_parent_id` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_module`
--

INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Database Overview and Clean Database Making Using PHPMyAdmin', NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nMemahami kebutuhan client dan kebutuhan pihak Backend dan Frontend -\r\nMembuat struktur tabel umum (general purpose) sesuai best practices -\r\nMembuat struktur tabel master data - Membuat struktur tabel transaction\r\ntype - Membuat struktur tabel penunjang ataupun view table yang\r\nmembantu dalam reporting dan kegiatan penunjang lainnya.', 1, '2022-09-26 11:05:09', 1, '2023-09-08 08:47:50', 1),
(2, 'Rapid Application Development using Laravel on Master Data', NULL, NULL, 2, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nPengintegrasian Template HTML Backend ke dalam Laravel - Pembuatan\r\nauthentication, user management, dan permission management - Pembuatan CRUD Management untuk Master Data dan proses validasi data yang dimasukkan dalam database.', 1, '2022-09-26 11:05:48', 1, '2023-08-01 11:25:11', 1),
(3, 'Rapid Application Development using Laravel on Transaction Data', NULL, NULL, 3, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nPembuatan CRUD Management untuk Transaction Data dan proses\r\nvalidasi data yang dimasukkan dalam database - Pembuatan try-catch\r\ntransaction dan try-catch database serta rollback/commit process -\r\nPembuatan Read (View) yang printable.', 1, '2022-09-26 11:06:16', 1, '2023-08-01 11:25:25', 1),
(4, 'Bootstrap 4 and SemanticUI', NULL, NULL, 4, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nPembuatan Form menggunakan Bootstrap 4 untuk responsive form -\r\nPenggunaan komponen pendukung Bootstrap 4 seperti Button, Button\r\nBackend Syllabus 4\r\nGroup, Close Button, Modal, dll untuk mendukung pembuatan Backend -\r\nPenggunaan Statistic, Feed, Card, dsb pada SemanticUI yang dapat\r\nmembantu beautification form dan report', 1, '2022-09-26 11:06:32', 1, '2023-08-01 11:25:29', 1),
(5, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, 5, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nPembuatan/Update Transaction Data CRUD (Ex: Point of Sales)\r\nmenggunakan Autocomplete, Datepicker, dan Tooltip - Penggunaan Async\r\nAJAX untuk memanggil data - Pembuatan form dengan menggunakan\r\nLeafletJS untuk location picker dan reverse geocoding.', 1, '2022-09-26 11:06:52', 1, '2023-09-08 14:47:26', 1),
(6, 'Implement DataTabel on Backend', NULL, NULL, 6, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nPembuatan CRUD Management Table menggunakan DataTables Server\r\nSide - Penggunaan extensions Buttons, ColReorder, Scroller,\r\nSearchBuilder, ColVis, dsb. - Penggunaan plugins sebagai tambahan\r\nuntuk melakukan manipulasi data.', 1, '2022-09-26 11:07:09', 1, '2023-09-08 14:47:26', 1),
(7, 'Implement ChartJS on Backend', NULL, NULL, 7, 1, 1, NULL, NULL, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran\r\nsynchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim\r\nakan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen\r\ndan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatankegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: -\r\nPembuatan bar chart, line chart, dan pie chart untuk menampilkan data\r\nsederhana pada reporting - Pembuatan stacked bar chart, scatter chart,\r\ndan multi varian chart untuk Dashboard - Pembuatan Scriptable Options\r\npada ChartJS untuk Dashboard - Pembuatan Animations, Data\r\nBackend Syllabus 6\r\nDecimation, dan Programmatic Event Triggers pada ChartJS untuk\r\nDashboard dan Report', 1, '2022-09-26 11:07:32', 1, '2023-09-08 14:47:26', 1),
(8, 'HTML CSS Overview and CSS Framework using Bootstrap 4\r\n', NULL, NULL, 1, 1, 2, NULL, NULL, NULL, NULL, 'Memahami dan mampu membuat standard HTML 5 Page dan tags yangberhubungan dengan head include, body section (div, span, dan elementnya), serta basic section manipulation (margin, padding, border) -\r\nMampu mengintegrasikan Bootstrap 4 ke dalam Web page - Mampu memahami dan menggunakan Layout dalam Bootstrap 4, terutama Grid dan basic layout lainnya - Mampu menggunakan components dan utilities\r\ndalam Bootstrap 4\r\n', 1, '2022-09-26 11:05:09', 1, '2023-09-08 14:47:26', 1),
(9, 'Bootstrap 4 for Backend View', NULL, NULL, 2, 1, 2, NULL, NULL, NULL, NULL, 'Memahami dan mampu menggunakan Bootstrap 4 Template untuk Backend dan memahami bagaimana best practices dalam pembuatan -\r\nMemahami dan mampu menggunakan Components Bootstrap 4 yang berhubungan dengan JavaScript', 1, '2022-09-26 11:05:48', 1, '2023-09-08 14:47:26', 1),
(10, 'JavaScript and JQuery Object Manipulation', NULL, NULL, 3, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan JavaScript dan JQuery untuk memanipulasi object yang ada dalam halaman website - Menggunakan Async Function', 1, '2022-09-26 11:06:16', 1, '2023-09-08 14:47:26', 1),
(11, 'SemanticUI for Bootstrap Alternative', NULL, NULL, 4, 1, 2, NULL, NULL, NULL, NULL, 'Memahami dan dapat mengintegrasikan SemanticUI ke dalam project - Memahami SemanticUI Layout - Menggunakan SemanticUI Element sebagai pelengkap Bootstrap 4 Component', 1, '2022-09-26 11:09:32', 1, '2023-09-08 14:47:26', 1),
(12, 'AJAX and Web Services', NULL, NULL, 5, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan AJAX yang disambungkan dengan Web Services', 1, '2022-09-26 11:06:32', 1, '2023-09-08 14:47:26', 1),
(13, 'Mobile Web Apps Using Framework7', NULL, NULL, 6, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan Framework7 untuk Progressive Web Apps', 1, '2022-09-26 11:06:52', 1, '2023-09-08 14:47:26', 1),
(14, 'Framework7 Authentication and Data Storing', NULL, NULL, 7, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan Framework7 untuk Authentication - Menggunakan Framework7 untuk Data Storing', 1, '2022-09-26 11:07:32', 1, '2023-09-08 14:47:26', 1),
(15, 'Framework7 Request Access', NULL, NULL, 8, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan Framework7 untuk Request Access mobile devices', 1, '2022-09-26 11:11:16', 1, '2023-09-08 14:47:26', 1),
(16, 'Introduction to UI-UX Design', NULL, NULL, 1, 1, 3, NULL, NULL, NULL, NULL, 'Memahami tentang role seorang UI-UX Designer dari segi teknis dan dari segi kebermanfaatan terhadap bisnis, tentang dengan siapa mereka akan berinteraksi/bekerja, apa kebutuhan usernya, apa tanggung jawab mereka terhadap usernya, dan bagaimana role tersebut menarik untuk mereka', 0, '2022-09-26 11:14:12', 1, '2023-09-08 14:47:26', 1),
(17, 'Intro to Design Thinking', NULL, NULL, 2, 1, 3, NULL, NULL, NULL, NULL, '<p>(a) Memahami bagaimana menggunakan metode Design Thinking yang praktis di setiap tahap masalah, dengan bantuan templat metode.</p>\n<p>(b) Memahami bagaimana memulai budaya kerja baru berdasarkan pendekatan yang berpusat pada pengguna, empati, ideasi, pembuatan prototipe, dan pengujian yang menyenangkan.</p>\n<p>(c) Memahami bagaimana menggunakan metode etnografi dan analisis, seperti wawancara, kelompok fokus, dan survei.</p>\n<p>(d) Mengetahui channel yang ada di Digital Marketing.</p>\n<p>(e) Memahami bagaimana membuat prototipe awal dan cepat, dan use case dari pembelajaran real case.</p>', 0, '2022-09-26 11:14:12', 1, '2023-09-08 14:47:26', 1),
(18, 'User and Product Research', NULL, NULL, 3, 1, 3, NULL, NULL, NULL, NULL, '<p>(a) Mengetahui User Research penting dalam proses desain UX.</p>\n<p>(b) Mengetahui berbagai metode penelitian pengguna.</p>\n<p>(c) Menentukan kapan wawancara pengguna bermanfaat proses desain.</p>\n<p>(d) Berlatih melakukan wawancara dan menulis problem statement.</p>', 0, '2022-09-26 11:14:12', 1, '2023-09-08 14:47:26', 1),
(19, 'Flow and Wireframe', NULL, NULL, 4, 1, 3, NULL, NULL, NULL, NULL, '<p>(a) Memahami nilai Storyboard, peta perjalanan, dan user flow dalam proses UX</p>\n<p>(b) Berlatih mendokumentasikan dan membuat user flow berdasarkan skenario yang relevan</p>\n<p>(c) Mampu menghubungkan userflow ke wireframes</p>\n<p>(d) Mampu menjelaskan apa itu wireframe dan fungsi dalam proses desain</p>\n<p>(e) Mentukan wireframe fidelity yang akan dijadikan dasar pada sebuah skenario</p>\n<p>(f) Mengidentifikasi jenis dan kualitas navigasi dalam mendorong user experience yang kuat</p>', 0, '2022-09-26 11:14:12', 1, '2023-09-08 14:47:26', 1),
(20, 'Visual Design', NULL, NULL, 5, 1, 3, NULL, NULL, NULL, NULL, '<p>(a) Mampu merancang mobile design berdasarkan mobile usability best practice</p>\n<p>(b) Mampu menggunakan persona dan task modelling untuk merencanakan mobile user experience</p>\n<p>(c) Memahami bagaimana konsep desain interface akan berbeda di antara platform operasi (mis. IOS vs Android)</p>\n<p>(d) Mampu mengevaluasi mobile desain dan menghindari mobile user experience yang buruk</p>\n<p>(e) Mampu menerapkan strategi mobile desain UX</p>', 0, '2022-09-26 11:14:12', 1, '2023-09-08 14:47:26', 1),
(21, 'Introduction', NULL, NULL, 1, 1, 5, NULL, 1, '', NULL, '<p>Introduction to Knockout.js</p>', 1, '2022-09-12 15:23:36', 1, '2023-08-03 09:11:05', 1),
(22, 'Introduction', '<!-- This is a *view* - HTML markup that defines the appearance of your UI -->\\n        <p>First name: <strong>todo</strong></p>\\n        <p>Last name: <strong>todo</strong></p>', '// This is a simple *viewmodel* - JavaScript that defines the data and behavior of your UI\\nfunction AppViewModel() {\\nthis.firstName = \\\'Bert\\\';\\nthis.lastName = \\\'Bertington\\\';\\n}\\n// Activates knockout.js\\nko.applyBindings(new AppViewModel());', 1, 2, 5, 21, 1, 'materi pembelajaran', NULL, '<h2>Selamat Datang!</h2>\r\n\r\n                            <p>pada tutorial ini anda akan belajar beberapa hal dasar dalam membangun UI website\r\n                                <em>Model-View-ViewModel</em> (MVVM) menggunakan knockout.js\r\n                            </p>\r\n\r\n                            <p>Anda akan belajar bagaimana mendefinisikan tampilan UI menggunakan <strong>views</strong> dan\r\n                                <strong>declarative bindings</strong>, ata dan perilakunya menggunakan <strong>viewmodels</strong> dan\r\n                                <strong>observables</strong>,\r\n                                dan bagaimana semuanya tetap sinkron secara otomatis dengan bantuan Knockout\'s <strong>dependency\r\n                                    tracking</strong>\r\n                            </p>\r\n\r\n                            <h3>Menggunakan bindings di view</h3>\r\n\r\n                            <p>Di sudut kanan bawah, anda dapat melihat <em>viewmodel</em> yang berisi data orang. Di sudut kanan atas, Anda memiliki <em>view</em> yang seharusnya menampilkan data orang. Saat ini hanya menampilkan \"<em>todo</em>\", jadi mari kita perbaiki itu.</p>\r\n\r\n                            <p>Ubah dua elemen <code>&lt;strong&gt;</code> dalam tampilan, tambahkan attribute <code>data-bind</code> untuk menampilkan nama orang:\r\n                            </p>\r\n\r\n                            <pre><code><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>First name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: firstName\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                            </code></pre>\r\n                            <pre><code><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Last name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: lastName\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                            </code></pre>\r\n\r\n\r\n                            <p>attribute <code>data-bind</code> adalah bagaimana knockout memungkinkan anda secara deklaratif mengaitkan viewmodel properties dengan DOM element kamu baru saja menggunakan <code>text</code> binding untuk menetapkan text ke DOM elemen.</p>', 1, '2022-09-22 08:58:43', 1, '2023-08-03 09:11:05', 1),
(23, 'Introduction', NULL, NULL, 2, 2, 5, 21, 1, 'materi pembelajaran', NULL, '<h2>Membuat data bisa diedit</h2>\r\n\r\n                            <p>Anda tidak dibatasi untuk menampilkan data statis. Mari gunakan <code>value</code> binding,  bersama dengan beberapa  <code>&lt;input&gt;</code> HTML biasa, untuk membuat data dapat diedit.</p>\r\n\r\n                            <p>Tambahkan markup berikut ke bagian bawah tampilan Anda (biarkan markup yang ada tetap di atasnya):</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>First name: <span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: firstName\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                                                                                    </code></pre>\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Last name: <span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: lastName\"</span>/&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span></code></pre>\r\n\r\n\r\n                            <p>Sekarang jalankan aplikasinya. Apa yang terjadi ketika Anda mengedit teks di salah satu kotak teks?</p>\r\n\r\n                            <p>Hmm... ternyata tidak terjadi apa-apa. Mari kita perbaiki itu...</p>\r\n                            <h3>Pengenalan Observables</h3>\r\n\r\n                            <p>Sebenarnya, saat anda mengedit salah satu dari text box, itu akan memperbarui data viewmodelnya. Tetapi karena properti viewmodel hanyalah string JavaScript biasa, mereka tidak memiliki cara untuk memberi tahu siapa pun bahwa mereka telah berubah, sehingga UI tetap statis. Itu sebabnya Knockout memiliki konsep <strong>observables</strong> - ini adalah properti yang secara otomatis akan mengeluarkan pemberitahuan setiap kali nilainya berubah.</p>\r\n\r\n                            <p>Ubah viewmodel anda untuk membuat isi dari <code>firstName</code> dan <code>lastName</code> <em>observable</em> menggunakan <code>ko.observable</code>:</p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">AppViewModel</span><span class=\"params\">()</span>{</span>\r\n    <span class=\"keyword\">this</span>.firstName = <span class=\"highlight\">ko.observable(<span class=\"string\">\"Bert\"</span>)</span>;\r\n    <span class=\"keyword\">this</span>.lastName = <span class=\"highlight\">ko.observable(<span class=\"string\">\"Bertington\"</span>)</span>;\r\n        }\r\n                                            </code></pre>\r\n\r\n                            <p>Sekarang jalankan kembali aplikasi dan edit kotak teks. Kali ini Anda tidak hanya akan melihat bahwa data model tampilan yang mendasarinya diperbarui saat Anda mengedit, tetapi semua UI terkait juga diperbarui secara sinkron dengannya. </p>', 1, '2022-09-22 09:00:09', 1, '2023-08-03 09:11:05', 1),
(24, 'Introduction', NULL, NULL, 3, 2, 5, 21, 1, 'materi pembelajaran', NULL, '<h2>Mendefinisikan nilai yang dihitung</h2>\r\n\r\n                            <p>seringkali, anda ingin menggabungkan atau mengubah banyak observables values untuk membuat yang lain, pada contoh ini anda mungkin ingin mendefinisikan <em>full name</em> sebagain\r\n                                <em>first name</em> plus <em>space</em> plus <em>last name</em>.\r\n                            </p>\r\n\r\n                            <p>Untuk menangani ini, Knockout memiliki konsep <strong>computed properties</strong> -\r\n                                ini adalah <em>observable</em> (yaitu, mereka memberi tahu tentang perubahan) dan dihitung berdasarkan nilai dari observables lainnya.</p>\r\n\r\n                            <p>Tambahkan <code>fullName</code> ke view model anda, dengan menambahkan kode berikut di dalam AppViewModel, setelah namaDepan dan namaBelakang dideklarasikan:\r\n\r\n                                <code>AppViewModel</code>, after <code>firstName</code> and <code>lastName</code>\r\n                                are\r\n                                declared:\r\n                            </p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"keyword\">this</span>.fullName = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"keyword\">return</span> <span class=\"keyword\">this</span>.firstName() + <span class=\"string\">\" \"</span> + <span class=\"keyword\">this</span>.lastName();\r\n    }, <span class=\"keyword\">this</span>);\r\n                                                            </code></pre>\r\n\r\n                            <p>Seperti yang bisa anda lihat, kami meneruskan fungsi panggilan balik ke <code>ko.computed</code>\r\n                                yang menentukan bagaimana seharusnya menghitung nilainya. Selanjutnya, tampilkan nilai \r\n <code>fullName</code> di UI Anda dengan menambahkan markup di bagian bawah tampilan Anda:</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Full name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: fullName\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                                                                                    </code></pre>\r\n\r\n                            <p>Jika Anda menjalankan aplikasi sekarang dan mengedit kotak teks, Anda akan melihat bahwa semua elemen UI (termasuk tampilan nama lengkap) tetap sinkron dengan data yang mendasarinya.</p>\r\n\r\n                            <h3>Bagaimana cara kerjanya?</h3>\r\n\r\n                            <p>Segalanya tetap sinkron karena pelacakan ketergantungan otomatis:\r\n                                <code>&lt;strong&gt;</code> terakhir di sana bergantung pada <code>fullName</code>, yang bergantung pada <code>firstName</code>\r\n                                dan <code>lastName</code>, dan salah satu dari keduanya dapat diubah dengan mengedit textbox.\r\n                            </p>', 1, '2022-09-22 09:02:03', 1, '2023-08-03 09:11:05', 1),
(25, 'Introduction', NULL, NULL, 4, 2, 5, 21, 1, 'materi pembelajaran', NULL, '<h2>Menambahkan lebih banyak behavior</h2>\r\n\r\n                            <p>Untuk menyelesaikan contoh ini, mari tambahkan satu behavior lagi. Yaitu button yang membuat value namaBelakang berubah menjadi huruf kapital.\r\n                            </p>\r\n\r\n                            <h3>Memperbarui view model</h3>\r\n\r\n                            <p>Pertama, tambahkan fungsi <code>capitalizeLastName</code>ke viewmodel untuk mengimplementasikan behavior ini:</p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">AppViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave firstName, lastName, and fullName unchanged here ...</span>\r\n    <span class=\"keyword\">this</span>.capitalizeLastName = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n        <span class=\"keyword\">var</span> currentVal = <span class=\"keyword\">this</span>.lastName();        <span class=\"comment\">// Read the current value</span>\r\n        <span class=\"keyword\">this</span>.lastName(currentVal.toUpperCase()); <span class=\"comment\">// Write back a modified value</span>\r\n    };\r\n    }\r\n                            </code></pre>\r\n\r\n                            <p>Perhatikan bahwa, untuk membaca atau menulis nilai observables, Anda memanggilnya sebagai fungsi.</p>\r\n\r\n                            <h3>Memperbarui tampilan</h3>\r\n\r\n                            <p>Selanjutnya, tambahkan tombol ke tampilan, menggunakan pengikatan klik untuk mengaitkan klik dengan fungsi model tampilan yang baru saja Anda tambahkan:</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: capitalizeLastName\"</span>&gt;</span>Go caps<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n                            </code></pre>\r\n\r\n                            <p>Jika kamu menjalankan ini sekarang dan klik tombol \"Go Caps\", anda akan melihat semua bagian UI yang relevan diperbarui agar sesuai dengan status model tampilan yang diubah.</p>', 1, '2022-09-22 09:02:40', 1, '2023-08-03 09:11:05', 1),
(26, 'Introduction', NULL, NULL, 5, 2, 5, 21, 1, 'materi pembelajaran', NULL, '<h2>Kerja yang baik!</h2>\r\n\r\n                            <p>Ini adalah contoh yang sangat mendasar, tetapi itu menggambarkan beberapa poin kunci dari MVVM:</p>\r\n\r\n                            <ul>\r\n                                <li>Anda sudah mempelajari object-oriented representasi dari data UI dan behaviour anda (viewmodel)</li>\r\n                                <li>Secara terpisah, Anda memiliki representasi deklaratif tentang bagaimana itu harus ditampilkan secara visual(pandangan Anda)</li>\r\n                                <li>Anda dapat menerapkan behavior canggih hanya dengan memperbarui objek viewmodel. Anda tidak perlu khawatir tentang elemen DOM mana yang perlu diubah/ditambahkan/dihapus - Framework dapat menangani sinkronisasi untuk Anda.</li>\r\n                            </ul>\r\n\r\n                            <p>Tutorial selanjutnya akan membawa Anda lebih dalam :)</p>', 1, '2022-09-22 09:03:59', 1, '2023-08-03 09:11:05', 1),
(27, 'Working with list and collection', NULL, NULL, 2, 1, 5, NULL, 2, '', NULL, '<p>Mengenal lists dan collection di knockout.js</p>', 1, '2022-09-22 09:06:43', 1, '2023-08-03 09:18:05', 1),
(28, 'Working with list and collection', '<h2>Your seat reservations</h2>\\n                        <table>\\n                            <thead><tr>\\n                                <th>Passenger name</th><th>Meal</th><th>Surcharge</th><th></th>\\n                            </tr></thead>\\n                            <!-- Todo: Generate table body -->\\n                            <tbody></tbody>\\n                        </table>', '// Class to represent a row in the seat reservations grid\\nfunction SeatReservation(name, initialMeal) {\\n    var self = this;\\n    self.name = name;\\n    self.meal = ko.observable(initialMeal);\\n}\\n\\n// Overall viewmodel for this screen, along with initial state\\nfunction ReservationsViewModel() {\\n    var self = this;\\n\\n    // Non-editable catalog data - would come from the server\\n    self.availableMeals = [\\n        { mealName: \\\'Standard (sandwich)\\\', price: 0 },\\n        { mealName: \\\'Premium (lobster)\\\', price: 34.95 },\\n        { mealName: \\\'Ultimate (whole zebra)\\\', price: 290 }\\n    ];\\n\\n    // Editable data\\n    self.seats = ko.observableArray([\\n        new SeatReservation(\\\'Steve\\\', self.availableMeals[0]),\\n        new SeatReservation(\\\'Bert\\\', self.availableMeals[0])\\n    ]);\\n}\\n\\nko.applyBindings(new ReservationsViewModel());', 1, 2, 5, 27, 2, 'materi pembelajaran', NULL, '<h2>Bekerja dengan Lists dan Collection</h2>\r\n                            \r\n                                <p>Seringkali , Anda ingin membuat blok elemen UI yang berulang, terutama saat menampilkan list dimana user dapat menambahkan dan menghapus elemen. Knockout memungkinkan Anda melakukannya dengan mudah, menggunakan <em>observable arrays</em> dan <code>foreach</code> binding. </p>\r\n                            \r\n                                <h3>Getting started</h3>\r\n                            \r\n                                <p>Dalam beberapa menit kedepan anda akan membangun UI dinamis untuk reservasi kursi dan makanan - ini bisa menjadi salah satu langkah dalam proses pemesanan maskapai. Di panel kanan bawah, Anda sudah mendapatkan:</p>\r\n                            \r\n                                <ul>\r\n                                    <li><code>SeatReservation</code>, konstruktor kelas JavaScript sederhana yang menyimpan nama penumpang dengan pilihan makanan</li>\r\n                                    <li><code>ReservationsViewModel</code>, kelas viewmodel yang menampung:\r\n                                        <ul>\r\n                                            <li><code>availableMeals</code>, objek JavaScript yang menyediakan data makanan</li>\r\n                                            <li><code>seats</code>, sebuah array yang menyimpan koleksi awal instans SeatReservation. Perhatikan bahwa ini adalah <code>ko.observableArray</code> - tidak mengherankan, itu setara dengan array biasa, yang berarti dapat secara otomatis     memicu pembaruan UI setiap kali item ditambahkan atau dihapus.\r\n</li>\r\n                                        </ul>\r\n                                    </li>\r\n                                </ul>\r\n                            \r\n                                <p>Tampilan (panel kanan atas) belum menampilkan data reservasi, jadi mari kita perbaiki. Perbarui element <code>&lt;tbody&gt;</code> untuk menggunakan <code>foreach</code> binding, sehingga akan membuat salinan child elemennya untuk setiap entri dalam array <code>seats</code>:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>dan kemudian isi element <code>&lt;tbody&gt;</code> dengan beberapa markup untuk mengatakan bahwa Anda menginginkan baris tabel (<code>&lt;tr&gt;</code>) untuk setiap entri:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span>&gt;</span>\r\n                                <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: name\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().mealName\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().price\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>    \r\n                            <span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>Perhatikan bahwa, karena properti <code>meal</code> adalah <em>observable</em>, penting untuk memanggil <code>meal()</code> sebagai fungsi (untuk mendapatkan nilai saat ini) sebelum mencoba membaca sub-properti. Dengan kata lain, tulis <code>meal().price</code>, <em>bukan</em>\r\n                                    <code>meal.price</code>.</p>\r\n                            \r\n                                <p>Hasil? Jika Anda menjalankan aplikasi sekarang, Anda akan melihat tabel sederhana informasi reservasi kursi.</p>\r\n                            \r\n                                <p><code>foreach</code> adalah bagian dari keluarga <em>control flow bindings</em> yang mencakup\r\n                                    <a href=\"http://knockoutjs.com/documentation/foreach-binding.html\"><code>foreach</code></a>,\r\n                                    <a href=\"http://knockoutjs.com/documentation/if-binding.html\"><code>if</code></a>,\r\n                                    <a href=\"http://knockoutjs.com/documentation/ifnot-binding.html\"><code>ifnot</code></a>, dan\r\n                                    <a href=\"http://knockoutjs.com/documentation/with-binding.html\"><code>with</code></a>. Ini memungkinkan untuk membangun segala jenis UI berulang, bersyarat, atau bersarang berdasarkan viewmodel dinamis Anda.\r\n                                </p>', 1, '2022-09-22 09:14:16', 1, '2023-08-03 09:18:05', 1),
(29, 'Working with list and collection', NULL, NULL, 2, 2, 5, 27, 2, 'materi pembelajaran', NULL, '<h2>Menambahkan item</h2>\r\n                            \r\n                                <p>Mengikuti pola MVVM membuatnya sangat mudah untuk bekerja dengan grafik objek yang dapat diubah seperti array dan hierarki. Anda memperbarui data yang mendasarinya, dan UI secara otomatis diperbarui secara sinkron.</p>\r\n                            \r\n                                <h3>Menambahkan seat reservation</h3>\r\n                            \r\n                                <p>Tambahkan tombol ke tampilan Anda, menggunakan binding click untuk mengaitkan kliknya dengan fungsi pada viewmodel anda:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: addSeat\"</span>&gt;</span>Reserve another seat<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>kemudian implementasi fungsi addSeat, membuatnya mendorong entri tambahan ke dalam array <code>seats</code>:</p>\r\n                            \r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">ReservationsViewModel</span><span class=\"params\">()</span> {</span>\r\n                                <span class=\"comment\">// ... leave all the rest unchanged ...</span>\r\n                            \r\n                                <span class=\"comment\">// Operations</span>\r\n                                self.addSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n                                    self.seats.push(<span class=\"keyword\">new</span> SeatReservation(<span class=\"string\">\"\"</span>, self.availableMeals[<span class=\"number\">0</span>]));\r\n                                }\r\n                            }\r\n                            </code></pre>\r\n                            \r\n                                <p>Cobalah - sekarang ketika Anda mengklik \"Reserve seat\", UI diperbarui agar sesuai. Ini karena <code>seats</code> adalah observable array, jadi menambahkan atau menghapus item akan memicu pembaruan UI secara otomatis.\r\n</p>\r\n                            \r\n                                <p>Perhatikan bahwa menambahkan baris <em>tidak</em> melibatkan pembuatan ulang seluruh UI. Untuk efisiensi, Knockout melacak apa yang telah berubah di model tampilan Anda, dan melakukan serangkaian pembaruan DOM minimal untuk dicocokkan. Ini berarti Anda dapat meningkatkan hingga UI yang sangat besar atau canggih, dan dapat tetap tajam dan responsif bahkan pada perangkat seluler kelas bawah.</p>', 1, '2022-09-22 09:15:25', 1, '2023-08-03 09:18:05', 1),
(30, 'Working with list and collection', NULL, NULL, 3, 2, 5, 27, 2, 'materi pembelajaran', NULL, '<h2>Membuat data dapat diedit</h2>\r\n\r\n                                <p>Anda bisa menggunakan binding di dalam block <code>foreach</code> sama seperti di tempat lain, jadi cukup mudah untuk mengupgrade apa yang kita miliki menjadi editor data lengkap. Perbarui tampilan Anda:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                                <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n                                <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n                                <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().price\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>    \r\n                        <span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                        </code></pre>\r\n\r\n                                <p>Kode ini menggunakan dua binding baru, <code>options</code> dan <code>optionsText</code>, yang bersama-sama mengontrol kumpulan item yang tersedia dalam daftar dropdown, dan properti objek mana ((dalam hal ini, <code>mealName</code>) yang digunakan untuk mewakili setiap item di layar.</p>\r\n                                <p>Cobalah - sekarang Anda dapat memilih dari makanan yang tersedia, dan hal itu akan menyebabkan baris yang sesuai (hanya) di-refresh untuk menampilkan harga makanan tersebut.</p>\r\n\r\n                                <h2>Memformat harga</h2>\r\n\r\n                                <p>Kami memiliki representasi berorientasi objek yang bagus dari data kami, sehingga kami dapat dengan mudah menambahkan properti dan fungsi tambahan di mana saja di grafik objek. Mari berikan kelas <code>SeatReservation</code> kemampuan untuk memformat data harganya sendiri menggunakan beberapa logika khusus.\r\n</p>\r\n\r\n                                <p>Karena harga yang diformat akan dihitung berdasarkan makanan yang dipilih, kami dapat mewakilinya menggunakan <code>ko.computed</code> (sehingga akan diperbarui secara otomatis setiap kali pilihan makanan berubah):</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">SeatReservation</span><span class=\"params\">(name, initialMeal)</span> {</span>\r\n                            <span class=\"keyword\">var</span> self = <span class=\"keyword\">this</span>;\r\n                            self.name = name;\r\n                            self.meal = ko.observable(initialMeal);\r\n                        \r\n                            self.formattedPrice = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n                                <span class=\"keyword\">var</span> price = self.meal().price;\r\n                                <span class=\"keyword\">return</span> price ? <span class=\"string\">\"$\"</span> + price.toFixed(<span class=\"number\">2</span>) : <span class=\"string\">\"None\"</span>;        \r\n                            });\r\n                        }\r\n                        </code></pre>\r\n\r\n                                <p>Sekarang Anda dapat memperbarui tampilan untuk menggunakan <code>formattedPrice</code> pada setiap instance <code>SeatReservation</code>:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: <span class=\"highlight\">formattedPrice</span>\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                        <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>\r\n                        </code></pre>', 1, '2022-09-22 09:31:34', 1, '2023-08-03 09:18:05', 1),
(31, 'Working with list and collection', NULL, NULL, 4, 2, 5, 27, 2, 'materi pembelajaran', NULL, '<h2>Menghapus item dan menunjukkan total biaya tambahan</h2>\r\n\r\n                                <p>Karena Anda dapat menambahkan item, Anda juga harus dapat menghapusnya, bukan? Seperti yang Anda harapkan, ini hanyalah masalah memperbarui data yang mendasarinya.</p>\r\n\r\n                                <p>Perbarui tampilan Anda sehingga menampilkan tautan \"remove\" di sebelah setiap item:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: formattedPrice\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">a</span> <span class=\"attribute\">href</span>=<span class=\"value\">\"#\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: $root.removeSeat\"</span>&gt;</span>Remove<span class=\"tag\">&lt;/<span class=\"title\">a</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>         \r\n</code></pre>\r\n\r\n                                <p>Perhatikan bahwa <code>$root.</code> prefix menyebabkan Knockout mencari handler <code>removeSeat</code> removeSeat pada model tampilan tingkat atas Anda alih-alih pada instance <code>SeatReservation</code> yang terikat --- itu adalah tempat yang lebih baik untuk menempatkan <code>removeSeat</code> dalam contoh ini. Jadi, tambahkan fungsi <code>removeSeat</code> yang sesuai ke kelas root viewmodel Anda, <code>ReservationsViewModel</code>:</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">ReservationsViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave the rest unchanged ...</span>\r\n\r\n    <span class=\"comment\">// Operations</span>\r\n    self.addSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> <span class=\"comment\">/* ... leave unchanged ... */</span> }\r\n    <span class=\"highlight\">self.removeSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(seat)</span> {</span> self.seats.remove(seat) }</span>\r\n}    \r\n</code></pre>\r\n\r\n                                <p>Sekarang jika anda jalankan aplikasinya, anda akan dapat menghapus dan menambahkan item.</p>\r\n\r\n                                <h3>Menampilkan total biaya</h3>\r\n\r\n                                <p>Akan menyenangkan untuk memberi tahu pelanggan berapa yang akan mereka bayar, bukan? Tidak mengherankan, kita dapat mendefinisikan total sebagai <em>computed property</em>, dan membiarkan kerangka kerja mengetahui kapan harus menghitung ulang dan menyegarkan tampilan.</p>\r\n\r\n                                <p>Tambahkan properti <code>ko.computed</code> berikut di dalam <code>ReservationsViewModel</code>:</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\">self.totalSurcharge = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n   <span class=\"keyword\">var</span> total = <span class=\"number\">0</span>;\r\n   <span class=\"keyword\">for</span> (<span class=\"keyword\">var</span> i = <span class=\"number\">0</span>; i &lt; self.seats().length; i++)\r\n       total += self.seats()[i].meal().price;\r\n   <span class=\"keyword\">return</span> total;\r\n});\r\n</code></pre>\r\n\r\n                                <p>Sekali lagi, perhatikan bahwa karena <code>seats</code> dan <code>meal</code> keduanya adalah observables, kami memanggilnya sebagai fungsi untuk membaca nilainya saat ini ((mis., <code>self.seats().length</code>).</p>\r\n\r\n                                <p>Tampilkan total biaya tambahan dengan menambahkan elemen <code>&lt;h3&gt;</code> berikut ke bagian bawah tampilan Anda:\r\n</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h3</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"visible: totalSurcharge() &gt; 0\"</span>&gt;</span>\r\n    Total surcharge: $<span class=\"tag\">&lt;<span class=\"title\">span</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: totalSurcharge().toFixed(2)\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">span</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">h3</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Cuplikan ini menunjukkan dua poin baru:</p>\r\n\r\n                                <ul>\r\n                                    <li><code>visible</code> binding membuat elemen terlihat atau tidak terlihat saat data Anda berubah (secara internal, ini mengubah gaya tampilan CSS elemen). Dalam hal ini, kami memilih untuk menampilkan informasi \"biaya tambahan   total\" hanya jika lebih besar dari nol.</li>\r\n                                    <li>Anda dapat menggunakan <strong>ekspresi JavaScript arbitrer</strong> di dalam binding deklaratif. Di sini, kami menggunakan <code>totalSurcharge() &gt; 0</code> dan\r\n                                        <code>totalSurcharge().toFixed(2)</code>. Secara internal, ini sebenarnya mendefinisikan properti   yang dihitung untuk mewakili output dari ekspresi itu. Ini hanya alternatif sintaksis yang sangat ringan dan   nyaman.                                    </li>\r\n                                </ul>\r\n\r\n                                <p>Sekarang jika Anda menjalankan kode, Anda akan melihat \"biaya tambahan total\" muncul dan menghilang sebagaimana mestinya, dan berkat pelacakan ketergantungan, ia tahu kapan harus menghitung ulang nilainya sendiri — Anda tidak perlu memasukkan kode apa pun di \"tambah\" Anda atau fungsi \"hapus\" untuk memaksa dependensi memperbarui secara manual.</p>', 1, '2022-09-22 09:32:07', 1, '2023-08-03 09:18:05', 1);
INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(32, 'Working with list and collection', NULL, NULL, 5, 2, 5, 27, 2, 'materi pembelajaran', NULL, '<h2>Tips terakhir</h2>\r\n\r\n                                <p>Setelah mengikuti pola MVVM dan mendapatkan representasi berorientasi objek dari data dan perilaku UI, Anda berada dalam posisi yang bagus untuk menggunakan behavior ekstra dengan cara yang nyaman.</p>\r\n\r\n                                <p>Misalnya, jika Anda diminta untuk menampilkan jumlah total kursi yang dipesan, Anda dapat menerapkannya hanya di satu tempat, dan Anda tidak perlu menulis kode tambahan untuk memperbarui jumlah kursi saat Anda menambah atau menghapus item. Cukup perbarui <code>&lt;h2&gt;</code> \r\ndi bagian atas tampilan Anda:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h2</span>&gt;</span>Your seat reservations <span class=\"highlight\">(<span class=\"tag\">&lt;<span class=\"title\">span</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: seats().length\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">span</span>&gt;</span>)</span><span class=\"tag\">&lt;/<span class=\"title\">h2</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Trivial.</p>\r\n\r\n                                <p>Mirip, jika anda diminta untuk menaruh limit pada jumlah kursi yang dapat di pesan, katakanlah, Anda dapat membuat UI menyatakannya dengan menggunakan <code>enable</code> binding:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: addSeat<span class=\"highlight\">, enable: seats().length &lt; 5</span>\"</span>&gt;</span>Reserve another seat<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Tombol akan dinonaktifkan ketika batas kursi tercapai. Anda tidak perlu menulis kode apa pun untuk mengaktifkannya kembali saat pengguna menghapus beberapa kursi (mengacaukan logika \"hapus\" Anda), karena ekspresi akan secara otomatis dievaluasi ulang oleh Knockout saat data terkait berubah.</p>\r\n\r\n                                <p>Jika Anda ingin mempelajari cara menyimpan kembali data yang diperbarui ke server, lihat tutorial Memuat dan Menyimpan Data.</p>', 1, '2022-09-22 09:32:38', 1, '2023-08-03 09:18:05', 1),
(33, 'Create custom binding', NULL, NULL, 3, 1, 5, NULL, 3, '', NULL, 'Belajar membuat custom binding', 1, '2022-09-22 10:23:19', 1, '2023-08-03 09:18:05', 1),
(34, 'Create custom binding', '<h3 data-bind=\\\'text: question\\\'></h3>\\n<p>Please distribute <b data-bind=\\\'text: pointsBudget\\\'></b> points between the following options.</p>\\n\\n<table>\\n    <thead><tr><th>Option</th><th>Importance</th></tr></thead>\\n    <tbody data-bind=\\\'foreach: answers\\\'>\\n        <tr>\\n            <td data-bind=\\\'text: answerText\\\'></td>\\n            <td><select data-bind=\\\'options: [1,2,3,4,5], value: points\\\'></select></td>\\n        </tr>\\n    </tbody>\\n</table>\\n\\n<h3 data-bind=\\\'visible: pointsUsed() > pointsBudget\\\'>You\\\'ve used too many points! Please remove some.</h3>\\n<p>You\\\'ve got <b data-bind=\\\'text: pointsBudget - pointsUsed()\\\'></b> points left to use.</p>\\n<button data-bind=\\\'enable: pointsUsed() <= pointsBudget, click: save\\\'>Finished</button>', 'function Answer(text) { this.answerText = text; this.points = ko.observable(1); }\\n\\nfunction SurveyViewModel(question, pointsBudget, answers) {\\n    this.question = question;\\n    this.pointsBudget = pointsBudget;\\n    this.answers = $.map(answers, function(text) { return new Answer(text) });\\n    this.save = function() { alert(\\\'To do\\\') };\\n\\n    this.pointsUsed = ko.computed(function() {\\n        var total = 0;\\n        for (var i = 0; i < this.answers.length; i++)\\n            total += this.answers[i].points();\\n        return total;\\n    }, this);\\n}\\n\\nko.applyBindings(new SurveyViewModel(\\\'Which factors affect your technology choices?\\\', 10, [\\n   \\\'Functionality, compatibility, pricing - all that boring stuff\\\',\\n   \\\'How often it is mentioned on Hacker News\\\',\\n   \\\'Number of gradients/dropshadows on project homepage\\\',\\n   \\\'Totally believable testimonials on project homepage\\\'\\n]));', 1, 2, 5, 33, 3, 'materi pembelajaran', NULL, '<h2>Membuat binding khusus</h2>\r\n\r\n<p>Dalam interpretasi Knockout tentang MVVM, <em>bindings</em> adalah yang menyatukan tampilan dan viewmodel Anda. Binding adalah perantara; mereka melakukan pembaruan di kedua arah:</p>\r\n\r\n<ul>\r\n    <li>Binding melihat <strong>perubahan viewmodel</strong> dan memperbarui <strong>tampilan DOM</strong></li>\r\n    <li>Binding menangkap <strong>event DOM</strong> dan memperbarui <strong>properti viewmodel</strong></li>\r\n</ul>\r\n\r\n<p>Knockout memiliki kumpulan binding bawaan yang fleksibel dan komprehensif (misalnya, text, click, foreach), tetapi tidak berhenti di situ - Anda dapat membuat binding khusus hanya dalam beberapa baris kode. Dalam aplikasi realistis apa pun, Anda akan merasa manfaat merangkum pola UI umum di dalam binding, sehingga pola tersebut dapat digunakan kembali dengan mudah di banyak tempat. Misalnya, situs web ini menggunakan custom binding untuk merangkum pendekatannya terhadap dialog, panel yang dapat diseret, editor kode, dan bahkan untuk merender teks yang Anda baca.\r\n</p>\r\n\r\n<h3>Oke, mari kita buat sendiri</h3>\r\n\r\n<p>Anda sudah mendapatkan beberapa kode yang mewakili halaman survei yang tidak menarik tetapi berfungsi. Cobalah menggunakannya. Sekarang mari kita tingkatkan tampilan dan nuansa dalam tiga cara:</p>\r\n\r\n<ul>\r\n    <li>... dengan transisi animasi pada peringatan \"<em>Anda telah menggunakan terlalu banyak poin</em>\"</li>\r\n    <li>... dengan gaya yang ditingkatkan pada tombol Selesai</li>\r\n    <li>... dengan tampilan peringkat bintang yang menyenangkan untuk digunakan untuk menetapkan poin, alih-alih daftar drop-down yang mengganggu</li>\r\n</ul>', 1, '2022-09-22 10:24:42', 1, '2023-08-03 09:18:05', 1),
(35, 'Create custom binding', NULL, NULL, 2, 2, 5, 33, 3, 'materi pembelajaran', NULL, '<h2>Menerapkan transisi animasi</h2>\r\n\r\n<p>Ketika pengunjung memberikan terlalu banyak poin, peringatan \"<em>You\'ve used too many points</em>\" akan langsung terlihat, karena tampilannya dikontrol menggunakan <code>visible</code> binding.\r\n    Jika Anda ingin membuatnya memudar masuk dan keluar dengan lancar, Anda bisa menulis custom binding yang cepat dan dapat digunakan kembali yang secara internal menggunakan fungsi <code>fade</code> jQuery untuk mengimplementasikan animasi.</p>\r\n\r\n<p>Anda dapat menentukan binding khusus dengan menetapkan properti baru ke objek <code>ko.bindingHandlers</code>. Properti Anda dapat mengekspos dua fungsi panggilan balik:</p>\r\n\r\n<ul>\r\n    <li><code>init</code>, untuk dipanggil saat binding pertama kali terjadi (berguna untuk mengatur status awal atau mendaftarkan event handler)</li>\r\n    <li><code>update</code>, untuk dipanggil setiap kali data terkait diperbarui (sehingga Anda dapat memperbarui DOM agar sesuai)</li>\r\n</ul>\r\n\r\n<p>Mulai tentukan binding <code>fadeVisible</code> dengan menambahkan kode berikut di bagian atas panel viewmodel:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.fadeVisible = {\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// On update, fade in/out</span>\r\n        <span class=\"keyword\">var</span> shouldDisplay = valueAccessor();\r\n        shouldDisplay ? $(element).fadeIn() : $(element).fadeOut();\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Seperti yang Anda lihat, <code>update</code> handler diberikan elemen yang terikat padanya, dan fungsi yang mengembalikan nilai saat ini dari data terkait. Berdasarkan nilai saat ini, Anda dapat menggunakan jQuery untuk memudarkan elemen masuk atau keluar.</p>\r\n\r\n<p>Untuk menggunakan custom binding Anda, cukup ubah peringatan \"<em>You\'ve used too many points</em>\" sehingga menggunakan <code>fadeVisible</code> alih-alih <code>visible</code>:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h3</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">fadeVisible</span>: pointsUsed() &gt; pointsBudget\"</span>&gt;</span>You\'ve used too many points! Please remove some.<span class=\"tag\">&lt;/<span class=\"title\">h3</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Coba jalankan - behavior sudah hampir sempurna. Peringatan akan memudar masuk dan keluar dengan lancar sesuai kebutuhan.</p>\r\n\r\n<h2>Mengatur status awal elemen</h2>\r\n\r\n<p>Ada satu hal yang tidak beres: saat halaman pertama kali dimuat, peringatan tersebut untuk sementara mulai terlihat dan segera menghilang (klik Jalankan beberapa kali jika Anda perlu melihatnya terjadi). Anda harus menggunakan <code>handler</code> untuk memastikan status awal elemen cocok dengan data viewmodel awal.</p>\r\n\r\n<p>Itu cukup mudah - tambahkan <code>init</code> handler ke custom binding Anda:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.fadeVisible = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// Start visible/invisible according to initial value</span>\r\n        <span class=\"keyword\">var</span> shouldDisplay = valueAccessor();\r\n        $(element).toggle(shouldDisplay);\r\n    },\r\n    update: <span class=\"comment\">// ... leave the \"update\" handler unchanged ...</span>\r\n};\r\n</code></pre>\r\n\r\n<p>Itu memperbaikinya! Sekarang animasi hanya terjadi ketika viewmodel berubah.</p>\r\n\r\n<p>Membuat binding <code>fadeVisible</code> mungkin tampak seperti sedikit pekerjaan, tetapi ini adalah kode yang sepenuhnya dapat digunakan kembali, sehingga Anda dapat menyimpannya dalam file JavaScript \"bindings\" yang terpisah dan kemudian menggunakannya sebagai pengganti <code>visible</code> di mana saja di aplikasi Anda.</p>\r\n', 1, '2022-09-22 10:26:10', 1, '2023-08-03 09:18:05', 1),
(36, 'Create custom binding', NULL, NULL, 3, 2, 5, 33, 3, 'materi pembelajaran', NULL, '<h2>Mengintegrasikan dengan komponen pihak ketiga</h2>\r\n\r\n<p>Jika Anda ingin tampilan Anda berisi komponen dari library JavaScript eksternal (misalnya, jQuery UI atau YUI) dan mengikatnya ke properti viewmodel, teknik termudah adalah membuat custom binding. binding Anda akan menjadi perantara antara viewmodel Anda dan komponen pihak ketiga.</p>\r\n\r\n<p>Sebagai contoh, mari gunakan <a href=\"http://jqueryui.com/demos/button/\">widget \"Button\" jQuery UI</a> untuk meningkatkan tampilan dan nuansa tombol \"Finished\".</p>\r\n\r\n<p>Memulai cukup mudah. Definisikan <code>jqButton</code> binding dengan menambahkan kode berikut di bagian atas panel viewmodel:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.jqButton = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element)</span> {</span>\r\n       $(element).button(); <span class=\"comment\">// Turns the element into a jQuery UI button</span>\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Untuk menggunakan binding, perbarui tombol \"<em>Finished</em>\" di view:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">jqButton: true,</span> enable: pointsUsed() &lt;= pointsBudget, click: save\"</span>&gt;</span>Finished<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Cobalah - ini sudah cukup berhasil. Tampilan tombol ditingkatkan, dan mengkliknya masih berfungsi sama</p>\r\n\r\n<h3>Toggling status \"disabled\" tombol</h3>\r\n\r\n<p>Tombol Anda tidak lagi terlihat dinonaktifkan ketika pengunjung telah melebihi anggaran poin mereka. <code>enable</code>\r\n    binding tidak berfungsi secara langsung dengan tombol UI jQuery, karena tombol UI jQuery tidak secara otomatis merespons atribut \"<code>disabled</code>\" HTML biasa. Sebagai gantinya, tombol jQuery UI memiliki API khusus untuk mengontrol tampilan yang enabled/disabled\r\n</p>\r\n\r\n<p>Itu tidak masalah: Anda dapat menggunakan <code>update</code> handler untuk memberi tahu tombol kapan harus mengaktifkan/menonaktifkan sendiri:\r\n</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.jqButton = {\r\n    init: <span class=\"comment\">/* ... leave \"init\" unchanged ... */</span>,\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"keyword\">var</span> currentValue = valueAccessor();\r\n        <span class=\"comment\">// Here we just update the \"disabled\" state, but you could update other properties too</span>\r\n        $(element).button(<span class=\"string\">\"option\"</span>, <span class=\"string\">\"disabled\"</span>, currentValue.enable === <span class=\"literal\">false</span>);\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Untuk menggunakan ini, perbarui tombol \"<em>Finished</em>\" sehingga Anda meneruskan properti <code>enable</code> ke dalam <code>jqButton</code> binding:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">jqButton: { enable: pointsUsed() &lt;= pointsBudget }</span>, click: save\"</span>&gt;</span>Finished<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Sekarang tombol akan terlihat abu-abu jika pengunjung melebihi anggaran poin mereka.</p>\r\n\r\n<p>Sekali lagi, <code>jqButton</code> binding dapat digunakan kembali pada tombol mana saja di aplikasi Anda, memungkinkan Anda secara deklaratif mengaitkan status tombol yang enabled/disabled dengan kondisi model tampilan apa pun. Anda juga dapat meningkatkan pengikatan untuk mengontrol secara deklaratif properti tombol UI jQuery lainnya juga, seperti ikon mana yang muncul di tombol.\r\n</p>\r\n', 1, '2022-09-22 10:26:35', 1, '2023-08-03 09:18:05', 1),
(37, 'Create custom binding', NULL, NULL, 4, 2, 5, 33, 3, 'materi pembelajaran', NULL, '    <h2>Menerapkan widget khusus</h2>\r\n\r\n    <p>Untuk menyelesaikan tutorial ini, mari lakukan sesuatu yang sedikit lebih menarik. Mari kita ganti dropdown \"importance\" dengan sistem peringkat bintang yang lebih baik untuk digunakan. Anda dapat melakukan ini hanya dalam beberapa baris kode dengan membuat binding untuk membungkus widget peringkat bintang yang ada (contoh) tetapi demi pembelajaran, mari kita buat sepenuhnya dari awal.\r\n    </p>\r\n\r\n    <p>Untuk memulai, tentukan pengikatan <code>starRating</code> dengan menambahkan yang berikut ini ke bagian atas panel viewmodel:\r\n    </p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\" data-second_best=\"[object Object]\">ko.bindingHandlers.starRating = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        $(element).addClass(<span class=\"string\">\"starRating\"</span>);\r\n        <span class=\"keyword\">for</span> (<span class=\"keyword\">var</span> i = <span class=\"number\">0</span>; i &lt; <span class=\"number\">5</span>; i++)\r\n           $(<span class=\"string\">\"&lt;span&gt;\"</span>).appendTo(element);\r\n    }\r\n};\r\n</code></pre>\r\n\r\n    <p>Kode ini hanya menyisipkan serangkaian element <code>&lt;span&gt;</code> Sudah ada beberapa CSS yang disiapkan untuk Anda tampilkan sebagai bintang. Untuk menggunakannya, perbarui tampilan Anda, singkirkan <code>&lt;select&gt;</code> dropdowns:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: answers\"</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n        <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: answerText\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n        <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"starRating: points\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n    <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <h3>Menampilkan rating saat ini</h3>\r\n\r\n    <p>Anda ingin peringkat bintang diperbarui secara otomatis setiap kali data model tampilan yang mendasarinya berubah, sehingga Anda dapat menggunakan <code>update</code> handler untuk menetapkan kelas CSS yang sesuai bergantung pada data saat ini:\r\n    </p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.starRating = {\r\n    init: <span class=\"comment\">/* ... leave \"init\" unchanged ... */</span>,\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// Give the first x stars the \"chosen\" class, where x &lt;= rating</span>\r\n        <span class=\"keyword\">var</span> observable = valueAccessor();\r\n        $(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n            $(<span class=\"keyword\">this</span>).toggleClass(<span class=\"string\">\"chosen\"</span>, index &lt; observable());\r\n        });\r\n    }\r\n};\r\n</code></pre>\r\n\r\n    <p>Karena alokasi poin awal semuanya 1, Anda harus mendapatkan satu bintang yang disorot untuk setiap jawaban.</p>\r\n\r\n    <h3>Highlighting saat mouse hover</h3>\r\n\r\n    <p>Saat pengunjung mengarahkan mouse ke bintang, ada baiknya untuk menyorot bintang yang akan mereka pilih. Status \"highlight\" tidak benar-benar perlu ditautkan ke model tampilan karena Anda tidak menyimpan data itu dengan cara apa pun, jadi opsi termudah adalah mengontrol highlighting dengan beberapa kode jQuery mentah.</p>\r\n\r\n    <p>Anda dapat menggunakan fungsi <code>hover</code> jQuery untuk menangkap acara hover-in dan hover-out, mengatur kelas CSS yang sesuai pada bintang yang terpengaruh:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n    <span class=\"comment\">// ... leave existing code unchanged ... </span>\r\n\r\n    <span class=\"comment\">// Handle mouse events on the stars</span>\r\n    $(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n        $(<span class=\"keyword\">this</span>).hover(\r\n            <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).addClass(<span class=\"string\">\"hoverChosen\"</span>) },\r\n            <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).removeClass(<span class=\"string\">\"hoverChosen\"</span>) }\r\n        );\r\n    });\r\n},\r\n</code></pre>\r\n\r\n    <p>Sekarang saat Anda menggerakkan mouse, Anda akan melihat bintang-bintang menyala.</p>\r\n\r\n    <h3>Menulis data kembali ke viewmodel</h3>\r\n\r\n    <p>Saat pengunjung mengeklik bintang, Anda ingin menyimpan peringkat mereka yang diperbarui dalam model tampilan yang mendasarinya, sehingga UI lainnya dapat diupdate secara otomatis. Ini cukup mudah dilakukan: gunakan <code>click</code> fucntion jQuery untuk menangkap click tersebut:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"comment\">// Handle mouse events on the stars</span>\r\n$(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n    $(<span class=\"keyword\">this</span>).hover(\r\n        <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).addClass(<span class=\"string\">\"hoverChosen\"</span>) },\r\n        <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).removeClass(<span class=\"string\">\"hoverChosen\"</span>) }\r\n    )<span class=\"highlight\">.click(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> </span>\r\n    <span class=\"highlight\">   <span class=\"keyword\">var</span> observable = valueAccessor(); </span> <span class=\"comment\">// Get the associated observable</span>\r\n    <span class=\"highlight\">   observable(index+<span class=\"number\">1</span>);              </span> <span class=\"comment\">// Write the new rating to it</span>\r\n    <span class=\"highlight\"> }); </span>\r\n});\r\n</code></pre>\r\n\r\n    <p>Cobalah - sistem peringkat bintang Anda sekarang harus berfungsi penuh! UI sekarang semua pembaruan sinkron dengan peringkat pengunjung.</p>\r\n\r\n    <h3>Ringkasan</h3>\r\n\r\n    <p><code>starRating</code> binding sama rumitnya dengan ikatan yang biasanya didapat. Ini menggambarkan bagaimana binding sering kali menjadi tempat kode Anda turun di bawah lapisan MVVM deklaratif yang berorientasi objek dengan baik dan ke dalam lapisan manipulasi DOM tingkat rendah yang lebih mentah untuk membuat pembaruan UI yang diperlukan. Apakah ini nyaman dan mudah bagi Anda atau tidak tergantung pada keahlian Anda dengan jQuery atau perpustakaan DOM lainnya ...</p>\r\n\r\n    <p>Seperti biasa, <code>starRating</code> benar-benar dapat digunakan kembali di mana saja di aplikasi Anda di mana Anda ingin menampilkan properti model tampilan numerik karena beberapa bintang di layar, secara otomatis menyegarkan tampilan setiap kali data model tampilan berubah. Ini dengan rapi memisahkan bisnis menampilkan bintang dari logika model tampilan apa pun yang berkaitan dengan pilihan pengunjung.\r\n    </p>\r\n', 1, '2022-09-22 11:00:42', 1, '2023-08-03 09:18:05', 1),
(38, 'Loading and saving data', NULL, NULL, 4, 1, 5, NULL, 4, '', NULL, 'Belajar bagaimana load dan save data di knockout.js', 1, '2022-09-22 11:02:05', 1, '2023-08-03 09:18:05', 1),
(39, 'Loading and saving data', '<h3>Tasks</h3>\\n\\n<form data-bind=\\\"submit: addTask\\\">\\n    Add task: <input data-bind=\\\"value: newTaskText\\\" placeholder=\\\"What needs to be done?\\\" />\\n    <button type=\\\"submit\\\">Add</button>\\n</form>\\n\\n<ul data-bind=\\\"foreach: tasks, visible: tasks().length > 0\\\">\\n    <li>\\n        <input type=\\\"checkbox\\\" data-bind=\\\"checked: isDone\\\" />\\n        <input data-bind=\\\"value: title, disable: isDone\\\" />\\n        <a href=\\\"#\\\" data-bind=\\\"click: $parent.removeTask\\\">Delete</a>\\n    </li>\\n</ul>\\n\\nYou have <b data-bind=\\\"text: incompleteTasks().length\\\">&nbsp;</b> incomplete task(s)\\n<span data-bind=\\\"visible: incompleteTasks().length == 0\\\"> - it\\\'s beer time!</span>', 'function Task(data) {\\n    this.title = ko.observable(data.title);\\n    this.isDone = ko.observable(data.isDone);\\n}\\n\\nfunction TaskListViewModel() {\\n    // Data\\n    var self = this;\\n    self.tasks = ko.observableArray([]);\\n    self.newTaskText = ko.observable();\\n    self.incompleteTasks = ko.computed(function() {\\n        return ko.utils.arrayFilter(self.tasks(), function(task) { return !task.isDone() });\\n    });\\n\\n    // Operations\\n    self.addTask = function() {\\n        self.tasks.push(new Task({ title: this.newTaskText() }));\\n        self.newTaskText(\\\"\\\");\\n    };\\n    self.removeTask = function(task) { self.tasks.remove(task) };\\n}\\n\\nko.applyBindings(new TaskListViewModel());', 1, 2, 5, 38, 4, 'materi pembelajaran', NULL, '<h2>Memuat dan menyimpan data</h2>\r\n\r\n<p>Sekarang, Anda telah memiliki pemahaman yang baik tentang bagaimana pola MVVM membantu Anda mengatur kode sisi klien dengan rapi untuk UI dinamis, dan bagaimana\r\n    Knockout\'s <em>observables</em>, <em>bindings</em>, and <em>dependency tracking</em> membuatnya bekerja. Di hampir semua aplikasi web, Anda juga perlu mendapatkan data dari server, dan mengirim kembali data yang dimodifikasi.\r\n</p>\r\n\r\n<p>Karena Knockout adalah perpustakaan sisi klien murni, ia memiliki fleksibilitas untuk bekerja dengan teknologi sisi server apa pun (mis., ASP.NET, Rails, PHP, dll.), dan pola arsitektur apa pun, basis data, apa pun. Selama kode sisi server Anda dapat mengirim dan menerima data JSON — tugas sepele untuk teknologi web yang setengah-layak — Anda akan dapat menggunakan teknik yang ditunjukkan dalam tutorial ini.\r\n</p>\r\n\r\n<h3>Skenario untuk tutorial ini</h3>\r\n\r\n<p>Semua perpustakaan JavaScript diwajibkan secara hukum untuk menawarkan contoh \"daftar tugas\" (catatan: itu lelucon) jadi ini dia. Luangkan waktu sejenak untuk memainkannya - tambahkan dan hapus beberapa tugas - dan baca kode untuk memahami cara kerjanya. Ini cukup mendasar dan dapat diprediksi. Selanjutnya, Anda akan memuat beberapa daftar tugas awal dari server, dan kemudian melihat dua cara berbeda untuk menyimpan data yang dimodifikasi kembali ke server\r\n</p>\r\n', 1, '2022-09-22 11:06:24', 1, '2023-08-03 09:18:05', 1),
(40, 'Loading and saving data', NULL, NULL, 2, 2, 5, 38, 4, 'materi pembelajaran', NULL, '<h2>Memuat data dari server</h2>\r\n\r\n<p>Cara termudah untuk mendapatkan data JSON dari server adalah dengan membuat permintaan Ajax. Dalam tutorial ini, Anda akan menggunakan fungsi <code>$.getJSON</code> and <code>$.ajax</code> jQuery\r\n    untuk melakukannya. Setelah Anda mendapatkan datanya, Anda dapat menggunakannya untuk memperbarui model tampilan Anda, dan membiarkan UI memperbarui dirinya sendiri secara otomatis.\r\n</p>\r\n\r\n<p>Di server ini, ada beberapa kode yang menangani permintaan ke URL <code>/tasks</code>, dan merespons dengan data JSON. Tambahkan kode ke akhir <code>TaskListViewModel</code>\r\n    untuk meminta data tersebut dan menggunakannya untuk mengisi array <code>tasks</code>:\r\n</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">TaskListViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave the existing code unchanged ...</span>\r\n\r\n    <span class=\"comment\">// Load initial state from server, convert it to Task instances, then populate self.tasks</span>\r\n    $.getJSON(<span class=\"string\">\"/tasks\"</span>, <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(allData)</span> {</span>\r\n        <span class=\"keyword\">var</span> mappedTasks = $.map(allData, <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(item)</span> {</span> <span class=\"keyword\">return</span> <span class=\"keyword\">new</span> Task(item) });\r\n        self.tasks(mappedTasks);\r\n    });\r\n}\r\n</code></pre>\r\n\r\n<p><em><strong>Catatan penting!</strong> Perhatikan bahwa Anda <strong>tidak</strong> memanggil <code>ko.applyBindings</code> setelah memuat data. Banyak pendatang baru Knockout membuat kesalahan dengan mencoba mengikat ulang UI tmereka setiap kali mereka memuat beberapa data, tetapi itu tidak berguna. Tidak ada alasan untuk mengikat ulang - cukup memperbarui model tampilan yang ada sudah cukup untuk membuat seluruh UI diperbarui.\r\n    </em></p>\r\n\r\n<p>Kode ini mengambil data mentah array yang dikembalikan oleh server dan menggunakan helper jQuery <code>$.map</code> untuk membuat instance <code>Task</code> dari setiap entri mentah. Hasil array objek <code>Task</code> kemudia didorong ke dalam array <code>tasks</code>, yang menyebabkan UI diperbarui karena dia observables.</p>\r\n\r\n', 1, '2022-09-22 11:06:24', 1, '2023-08-03 09:18:05', 1),
(41, 'Loading and saving data', NULL, NULL, 3, 2, 5, 38, 4, 'materi pembelajaran', NULL, '\r\n    <h2>Mengirim data kembali ke server: metode 1</h2>\r\n\r\n    <p>Tentu saja, Anda juga dapat menggunakan permintaan Ajax untuk mengirim data kembali ke server.\r\n        Tetapi sebelum kita sampai pada itu, ada alternatif yang mungkin lebih sederhana untuk dipertimbangkan.</p>\r\n\r\n    <p>Jika Anda memiliki beberapa representasi data model Anda di dalam <code>&lt;form&gt;</code>, HTML biasa, maka Anda cukup membiarkan pengguna memposting formulir itu ke server Anda.\r\n        Ini sangat mudah untuk dilakukan. Misalnya, tambahkan markup formulir berikut di bagian bawah tampilan Anda:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">form</span> <span class=\"attribute\">action</span>=<span class=\"value\">\"/tasks/saveform\"</span> <span class=\"attribute\">method</span>=<span class=\"value\">\"post\"</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">textarea</span> <span class=\"attribute\">name</span>=<span class=\"value\">\"tasks\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: ko.toJSON(tasks)\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">textarea</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"submit\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">form</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <p>Cuplikan ini menggunakan <code>&lt;textarea&gt;</code> agar Anda dapat melihat apa yang terjadi di balik layar. Cobalah: saat pengunjung mengedit data di UI, pelacakan ketergantungan akan menyebabkan representasi JSON di area teks diperbarui secara otomatis. Saat pengunjung mengirimkan formulir, kode sisi server Anda akan menerima data JSON tersebut.\r\n    </p>\r\n\r\n    <p>Anda tidak benar-benar ingin menampilkan <code>&lt;textarea&gt;</code> yang terlihat kepada pengunjung sebenarnya, jadi gantilah dengan kontrol input hidden:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">form</span> <span class=\"attribute\">action</span>=<span class=\"value\">\"/tasks/saveform\"</span> <span class=\"attribute\">method</span>=<span class=\"value\">\"post\"</span>&gt;</span>\r\n    <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"hidden\"</span> <span class=\"attribute\">name</span>=<span class=\"value\">\"tasks\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: ko.toJSON(tasks)\"</span> /&gt;</span></span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"submit\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">form</span>&gt;</span>\r\n</code></pre>\r\n\r\n', 1, '2022-09-22 11:06:24', 1, '2023-08-03 09:18:05', 1),
(42, 'Loading and saving data', NULL, NULL, 4, 2, 5, 38, 4, 'materi pembelajaran', NULL, '<div data-bind=\"markdown: currentTutorialStep() &amp;&amp; currentTutorialStep().Instructions\">\r\n    <h2>Mengirim data kembali ke server: metode 2</h2>\r\n\r\n    <p>Sebagai alternatif dari posting <code>&lt;form&gt;</code> HTML lengkap, Anda tentu saja dapat mengirim data model Anda ke server menggunakan request Ajax. misalnya,\r\n        <em>hapus</em> <code>&lt;form&gt;</code> yang baru saja Anda tambahkan di langkah sebelumnya, dan ganti dengan <code>&lt;button&gt;</code> sederhana:\r\n    </p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: save\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <p>... lalu implementasikan <code>save</code> fungsi simpan dengan menambahkan fungsi tambahan ke <code>TaskListViewModel</code>:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">TaskListViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave all the existing code unchanged ...  </span>\r\n\r\n    self.save = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n        $.ajax(<span class=\"string\">\"/tasks\"</span>, {\r\n            data: ko.toJSON({ tasks: self.tasks }),\r\n            type: <span class=\"string\">\"post\"</span>, contentType: <span class=\"string\">\"application/json\"</span>,\r\n            success: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(result)</span> {</span> alert(result) }\r\n        });\r\n    };\r\n}\r\n</code></pre>\r\n\r\n    <p>Dalam contoh ini, <code>success</code> handler hanya <code>memberitahu</code> apa pun yang ditanggapi server, hanya agar Anda dapat melihat server benar-benar menerima dan memahami data. Dalam aplikasi nyata, Anda akan lebih cenderung menampilkan pesan flash \"tersimpan\" atau mengalihkan ke halaman lain.\r\n    </p>\r\n</div>\r\n', 1, '2022-09-22 11:06:24', 1, '2023-08-03 09:18:05', 1),
(43, 'Loading and saving data', NULL, NULL, 5, 2, 5, 38, 4, 'materi pembelajaran', NULL, '    <h2>Pelacakan penghapusan</h2>\r\n\r\n    <p>Jika pengguna telah menghapus beberapa data pada klien, bagaimana server tahu untuk menghapus catatan database yang sesuai? Salah satu kemungkinannya adalah server harus memeriksa kumpulan data yang masuk, membandingkannya dengan apa yang ada di database, dan menyimpulkan catatan mana yang dihapus. Tapi itu cukup canggung - jauh lebih baik jika klien mengirimkan data yang secara eksplisit menyatakan catatan mana yang dihapus.</p>\r\n\r\n    <p>Saat memanipulasi observable array, Anda dapat dengan mudah melacak penghapusan dengan menggunakan fungsi <code>destroy</code> untuk menghapus item.\r\n        Misalnya, perbarui fungsi <code>removeTask</code> anda:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">self.removeTask = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(task)</span> {</span> self.tasks.<span class=\"highlight\">destroy</span>(task) };\r\n</code></pre>\r\n\r\n    <p>Apa fungsinya? Yah, itu tidak lagi benar-benar menghapus instansi <code>Task</code> dari <code>tasks</code> array - sebagai gantinya, itu hanya menambahkan properti <code>_destroy</code>\r\n        ke instance <code>Task</code> dengan nilai. <code>true</code>. Ini sama persis dengan konvensi Ruby on Rails menggunakan <code>_destroy</code> untuk menunjukkan bahwa item yang dikirimkan harus dihapus.\r\n        <code>foreach</code> binding mengetahui hal ini, dan tidak akan menampilkan item apa pun dengan nilai properti itu (itulah sebabnya item menghilang saat dihancurkan).\r\n    </p>\r\n\r\n    <h3>Bagaimana server menangani ini?</h3>\r\n\r\n    <p>Jika Anda menyimpan data sekarang, Anda akan melihat bahwa server masih menerima item yang dihancurkan, dan server dapat mengetahui item mana yang ingin Anda hapus\r\n        (karena mereka memiliki properti <code>_destroy</code> yang disetel ke <code>true</code>).</p>\r\n\r\n    <ul>\r\n        <li>Jika Anda menggunakan fitur parsing JSON otomatis di Rails, ActiveRecord akan mengetahui bahwa Anda ingin menghapus item terkait.</li>\r\n        <li>Untuk teknologi lain, Anda dapat menambahkan sedikit kode sisi server untuk menemukan <code>_destroy</code> dan menghapus item tersebut.</li>\r\n    </ul>\r\n\r\n    <p>Jika Anda ingin melihat lebih jelas data apa yang diterima server dalam contoh ini, coba ganti tombol \"Save\" dengan ajax dengan teknik form-HTML dari langkah 3 dalam tutorial ini.\r\n        .</p>\r\n\r\n    <h3>Hei, penghitung tugas saya tidak lagi berfungsi!</h3>\r\n\r\n    <p>Perhatikan bahwa keterangan \"<em>You have x incomplete task(s)</em>\" tidak lagi memfilter item yang dihapus, arena properti <code>incompleteTasks</code> computed\r\n        tidak mengetahui apa pun tentang flag <code>_destroy</code> Perbaiki ini dengan memfilter tugas yang dihancurkan:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">self.incompleteTasks = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"keyword\">return</span> ko.utils.arrayFilter(self.tasks(), <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(task)</span> {</span> <span class=\"keyword\">return</span> !task.isDone() <span class=\"highlight\">&amp;&amp; !task._destroy</span> });\r\n});\r\n</code></pre>\r\n\r\n    <p>Sekarang UI akan secara konsisten melihat <code>_destroy</code>ed tasks tidak ada, meskipun mereka masih dilacak secara internal.</p>\r\n', 1, '2022-09-22 11:06:24', 1, '2023-08-03 09:18:05', 1),
(44, 'Introduction Database', NULL, NULL, 1, 2, 1, 1, NULL, NULL, NULL, '', 1, '2022-09-28 10:20:47', 1, '2023-09-08 14:40:11', 1),
(45, 'Build and Modify Database', NULL, NULL, 2, 2, 1, 1, NULL, NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/lJnvq0A_7WQ\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 1, '2022-09-28 10:23:03', 1, '2023-09-08 14:40:11', 1),
(46, 'Understand the concept of MVC (Model, View, Controller)', NULL, NULL, 1, 2, 1, 2, NULL, NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/Q0nfLi-4GBg\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 1, '2022-09-28 10:24:01', 1, '2023-09-08 14:40:11', 1),
(47, 'Authentication, User Management, and Permission Management', NULL, NULL, 2, 2, 1, 2, NULL, NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/Q0prVO3DCtU\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 1, '2022-09-28 10:46:47', 1, '2023-09-08 14:40:11', 1),
(48, 'CRUD Management for Data Master', NULL, NULL, 3, 2, 1, 2, NULL, NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/4r6WdaY3SOA\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 1, '2022-09-28 10:49:05', 1, '2023-09-08 14:40:11', 1),
(49, 'Operator dan variabel', NULL, NULL, 1, 1, 6, NULL, 1, NULL, NULL, 'belajar operator dan variabel pada PHP', 1, '2022-09-28 12:17:41', 1, '2023-08-03 08:27:32', 1),
(50, 'Operator dan variabel', NULL, NULL, 1, 2, 6, 49, 1, 'materi pembelajaran', NULL, '<h2>Variabel PHP</h2>\n<h4>Sintaks Perintah Membuat Variabel</h4>\nSuatu variabel digunakan untuk menyimpan suatu nilai, dapat berupa teks, angka, atau array.\nVariabel dalam PHP menggunakan simbol ‘$’ di awal namanya. Sintaks perintah membuat variabel:\n$nama_var = nilai;\n<h4>Tipe Data dari Variabel</h4>\nTipe data variabel tidak perlu didekalarasikan, PHP akan otomatis mengkonversi atau menentukan\ntipe data variabel berdasarkan nilai yang disimpannya. Contoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"tag\">$<span class=\"title\">nama</span> <span class=\"attribute\">= \'Alvina Khansa\';</span>\n    <span class=\"tag\">$<span class=\"title\">nilai</span> <span class=\"attribute\">= 90;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nVariabel nama diatas otomatis akan bertipe string, variabel nilai akan bertipe integer. \n<br>\nAturan Pemberian Nama Variabel\n<br>\n• Harus dimulai dengan huruf atau garis bawah (underscore) ‘_’.\n<br>\n• Hanya dapat menggunakan karakter alphanumeric dan underscore\n<br>\n• (A?Z / a?z / 0 ? 9, dan _)\n<br>\n• Sebaiknya tidak menggunakan spasi, jika nama variabel terdiri lebih dari satu kata, pisahkan\ndengan underscore ($nama_depan, $nilai_tugas) atau kapitalisasi ($namaDepan, $nilaiTugas)\n<br>\n<h4>Scope Variabel</h4>\nScope atau ruang lingkup variabel adalah bagian dari skrip yang dapat mereferensikan variabel\ntersebut. Ada 3 scope variabel dalam PHP:\n<h4>Scope Local</h4>\nSuatu variabel yang dibuat pada suatu fungsi akan menjadi variabel lokal (memiliki scope local)\ndan hanya bisa diakses di dalam fungsi. Nama variabel yang sama dapat dibuat dalam fungsi\nyang berbeda, sebab variabel lokal hanya dikenali oleh fungsi yang membentuk variabel\ntersebut. Variabel lokal akan dihapus setelah fungsi usai dieksekusi. Contoh:\n<br>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"tag\">function(){</span>\n       <span class=\"title\">$lokal</span> <span class=\"attribute\">= ’Saya hanya bisa diakses dari fungsi dimana saya berada’;</span>\n       <span class=\"title\">echo</span> <span class=\"attribute\">$lokal; //mencetak variable lokal</span>\n    <span class=\"tag\">}</span>\n    <span class=\"title\">echo</span> <span class=\"attribute\">$lokal; //akan terjadi error</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>Scope Global</h4>\nScope global dimiliki oleh variabel yang dibuat diluar fungsi. Variabel dengan scope global\ndapat diakses dari bagian manapun dari program selama perintah tersebut ditulis diluar suatu\nfungsi. Variabel global dapat diakses dari dalam suatu fungsi dengan menggunakan kata kunci\n‘global’. Contoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"tag\">$a = 10;</span>\n    <span class=\"tag\">function myTest(){</span>\n       <span class=\"attribute\">//mengacu ke variable scoper global</span>\n       <span class=\"title\">echo</span> <span class=\"attribute\">global $a;</span>\n    <span class=\"tag\">}</span>\n    <span class=\"title\">myTest()</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n\n<h4>Scope Statik</h4>\nKetika suatu fungsi selesai digunakan, secara normal semua variabelnya akan dihapus. Jika\ndiinginkan variabel?variabel tersebut tidak dihapus ketika fungsi selesai dipakai, gunakan kata kunci ‘static’ saat membuat variabel. Contoh pembuatan variabel statik :\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">static</span> <span class=\"attribute\">$varStatik;</span>\n<span class=\"title\">?</span>&gt;</span>\n<span class=\"title\">variabel $varStatik sekarang menjadi variabel statik. </span>\n</code></pre>\n<h2>Operator</h2>\nOperator digunakan untuk mengolah nilai. PHP memiliki beberapa kategori operator sebagai\nberikut:\n<br>\nOperator Hitung \n<br>\n+ Pertambahan \n<br>\n? Pengurangan  \n<br>\n* Perkalian\n<br> \n/ Pembagian \n<br>\n% Sisa hasil bagi  \n<br>\n++ Inkremen\n<br>\n?? dekremen\nContoh 1:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">//menghitung penjualan bersih</span>\n    <span class=\"title\">$jual = 100000;</span>\n    <span class=\"title\">$potongan = 0.1;</span>\n    <span class=\"title\">$net = $jual-($jual*$potongan);</span>\n    <span class=\"title\">echo \"Penjualan bersih = Rp $net,00\";</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh 2:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">//penggunaan operator modulus/sisa hasil bagi</span>\n    <span class=\"title\">$hal=10;</span>\n    <span class=\"title\">if ($hal % 2 == 0)</span>\n       <span class=\"title\">echo ‘Halaman genap’;</span>\n    <span class=\"title\">else</span>\n       <span class=\"title\">echo ‘Halaman ganjil’;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh 3:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">//penggunaan inkremen</span>\n    <span class=\"title\">for($i=1;$i<=100;$i++){</span>\n       <span class=\"title\">echo “$i ”;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>Operator Penugasan</h4>\n= sama dengan\n<br>\n+= tambah sama dengan contoh: a+=b artinya a=a+b\n<br>\n?= kurang sama dengan contoh: a-=b artinya a=a-b\n<br>\n*= kali sama dengan contoh: a*=b artinya a=a*b\n<br>\n/= bagi sama dengan contoh: a/=b artinya a=a/b\n<br>\n%= modulo(sisa hasil bagi) sama dengan contoh: a%=b artinya a=a%b\n<h4>Operator Perbandingan</h4>\n==  sama dengan  5==8 mengembalikan nilai false\n<br>\n!=  tidak sama dengan  5!=8 mengembalikan nilai true\n<br>\n<>  tidak sama dengan  5<>8 mengembalikan nilai true\n<br>\n>  lebih besar dari  5>8 mengembalikan nilai false\n<br>\n<  lebih kecil dari  5<8 mengembalikan nilai true\n<br>\n>=  lebih besar dari atau sama dengan 5>=8 mengembalikan nilai false\n<br>\n<=  lebih kecil dari atau sama dengan 5<=8 mengembalikan nilai true\n<br>\n<h4>Operator Logika</h4>\n&&(and)  contoh: x=6; y=3; (x < 10 && y > 1) mengembalikan true\n<br>\n||(or) contoh: x=6; y=3; (x==5 || y==5) mengembalikan false\n<br>\n!(not) contoh: x=6; y=3; !(x==y) mengembalikan true\n', 1, '2022-09-28 12:19:58', 1, '2023-08-02 17:07:23', 1),
(51, 'Conditional if', NULL, NULL, 2, 1, 6, NULL, 2, NULL, NULL, 'belajar operator logika', 1, '2022-09-28 12:20:50', 1, '2023-08-03 09:18:25', 1);
INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(52, 'Conditional if', NULL, NULL, 2, 2, 6, 51, 2, 'materi pembelajaran', NULL, '<h2>Struktur Kendali</h2>\nSeringkali alur eksekusi suatu program tidak berjalan lurus dari baris kode pertama sampai baris\nterakhir. Kadang?kadang pada suatu baris tertentu alur program bercabang (struktur keputusan). \nDi lain baris alur program akan kembali ke baris kode sebelumnya untuk mengulangi sekelompok\nperintah (struktur perulangan). \nStruktur keputusan dalam PHP mengenal struktur if dan switch. Untuk menerapkan suatu\nperulangan baris?baris kode program menggunakan struktur for, while, do...while, dan foreach.\nBerikut ini penjelasan masing?masing struktur tersebut.\n<h4>Struktur Keputusan</h4>\nKetika Anda menulis kode program, suatu saat Anda perlu menggunakan mekanisme percabangan\nsehingga berdasarkan kondisi program Anda akan melakukan aksi yang berbeda. Misalnya saja\nAnda ingin membuat program yang dapat menampilkan salam yang berbeda tergantung jenis hari\npada saat itu, maka kode programnya akan seperti ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n    <span class=\"attribute\">else</span>\n       <span class=\"attribute\">echo “Selamat bekerja dan berkarya”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nJika program diatas dijalankan pada hari Minggu, maka Anda akan memperoleh ucapan ‘Selamat\nberlibur’, tapi jika dijalankan selain hari Minggu akan memperoleh ucapan ‘Selamat bekerja dan\nberkarya’.\nYa, contoh diatas adalah salah satu penggunaan struktur kondisi (if) yang dimiliki PHP. Struktur if\nmempunyai beberapa format, berikut penjelasannya. \n<h4>If</h4>\nStruktur ini memiliki 3 jenis format pemakaian, yaitu:\n\n<h5>• Pertama, bila struktur ini hanya akan mengeksekusi beberapa kode program hanya jika nilai\nkondisi true, maka format yang digunakan:\n<pre>\n<span class=\"attribute\">if (kondisi_1)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_true;</span>\n</pre>\nContoh:</h5>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h5>• Kedua, baik nilai kondisi if true atau false akan sama?sama mengeksekusi suatu kode program,\nmaka format yang digunakan:\n<pre>\n<span class=\"attribute\">if (kondisi_1)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_true;</span>\n<span class=\"attribute\">else</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_false;</span>\n</pre>\nContoh:</h5>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n    <span class=\"attribute\">else</span>\n       <span class=\"attribute\">echo “Selamat bekerja dan berkarya”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h5>• Ketiga, bila ada beberapa kondisi yang perlu dievaluasi, maka format yang digunakan:\n<pre>\n<span class=\"attribute\">if (kondisi_1)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_true;</span>\n<span class=\"attribute\">elseif (kondisi_2)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_2_true;</span>\n<span class=\"attribute\">else</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_dan_2_false;</span>\n</pre>\nContoh:</h5>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n    <span class=\"attribute\">elseif ($hari==”Sat”)</span>\n       <span class=\"attribute\">echo “Selamat libur panjang”;</span>\n    <span class=\"attribute\">else</span>\n       <span class=\"attribute\">echo “Selamat bekerja dan berkarya”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nJika kode program yang akan dieksekusi dalam if lebih dari satu, maka kode?kode program tersebut\nharus dikurung dengan tanda kurung kurawal buka dan tutup seperti ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”){</span>\n       <span class=\"attribute\">echo “Hai coy,<br />”;</span>\n       <span class=\"attribute\">echo “Selamat berlibur<br />”;</span>\n       <span class=\"attribute\">echo “Jangan lupa pesenanku ya”;</span>\n    <span class=\"attribute\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>Switch</h4>\nJika dalam program ada banyak pilihan, maka lebih baik menggunakan switch. Sintaksnya:\n<pre>\n<span class=\"attribute\">switch(n){</span>\n  <span class=\"attribute\">case label_1 : pernyataan_yg_dieksekusi_jika_n=label_1;</span>\n  <span class=\"attribute\">break;</span>\n  <span class=\"attribute\">case label_2 : pernyataan_yg_dieksekusi_jika_n=label_2;</span>\n  <span class=\"attribute\">break;</span>\n  <span class=\"attribute\">default : dieksekusi_bila_nilai_n_bukan_label2_atau_label_1;</span>\n<span class=\"attribute\">}</span>\n</pre>\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$x=1;</span>\n    <span class=\"attribute\">switch ($x){</span>\n      <span class=\"attribute\">case 1:</span>\n      <span class=\"attribute\">echo \"Number 1\";;</span>\n      <span class=\"attribute\">break;</span>\n      <span class=\"attribute\">case 2:</span>\n      <span class=\"attribute\">echo \"Number 2\";;</span>\n      <span class=\"attribute\">break;</span>\n      <span class=\"attribute\">case 3:</span>\n      <span class=\"attribute\">echo \"Number 3\";;</span>\n      <span class=\"attribute\">break;</span>\n      <span class=\"attribute\">default :</span>       \n      <span class=\"attribute\">echo \"No number between 1 and 3\";</span>\n    <span class=\"attribute\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>', 1, '2022-09-28 12:21:38', 1, '2023-08-03 09:18:25', 1),
(53, 'Looping', NULL, NULL, 3, 1, 6, NULL, 3, NULL, NULL, 'belajar loop di php', 1, '2022-09-28 12:22:40', 1, '2023-08-03 09:18:25', 1),
(54, 'Looping', NULL, NULL, 3, 2, 6, 53, 3, 'materi pembelajaran', NULL, '<h2>Struktur Perulangan (Loop)</h2>\n<h4>PHP mempunyai beberapa struktur perulangan:</h4>\n<h4>for</h4>\nFor merupakan struktur perulangan yang sering digunakan dalam pemrograman. Sintaksnya:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">for (inisialisasi; kondisi; inkremen){</span>\n       <span class=\"title\">kode yang akan ndieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nTiga parameternya:\ninisialisasi  :  nilai awal konter\n<br>\nkondisi   :  parameter yang akan dievaluasi pada setiap  iterasi  perulangan.  Jika  hasil evaluasi true, perulangan akan dilanjutkan, bila false perulangan akan dihentikan\n<br>\ninkremen  :  nilai pertambahan konter setiap satu iterasi perulangan diselesaikan. Setiap parameter di atas bersifat opsional.\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">for($i=1;$i<=100;$i++){</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh for tanpa parameter kondisi:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">for($i=1;;$i++){</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n       <span class=\"title\"> if ($i>=5) exit;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>foreach</h4>\nPerulangan ini disediakan PHP untuk memudahkan kita mengakses elemen?elemen suatu array.\nSintaks:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">foreach ($array as $value){</span>\n       <span class=\"title\">kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nPada setiap iterasi perulangan, nilai dari elemen array yang sedang ditunjuk oleh pointer akan\ndiletakkan ke variabel $value kemudian pointer akan bergerak menunjuk elemen array berikutnya\nsehingga pada iterasi selanjutnya, elemen array berikutnya yang akan diolah.\nContoh berikut akan mencetak nilai “satu”, “dua”, dan “tiga” secara berturut?turut:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">$x=array(\"satu\",\"dua\",\"tiga\");</span>\n    <span class=\"title\">foreach ($x as $value){</span>\n       <span class=\"title\">echo $value . \"<br />\";</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>While</h4>\n\nPerulangan while akan menjalankan suatu blok kode (sekelompok kode) selama kondisinya bernilai\ntrue. Sintaks perulangan ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">while(condition){</span>\n       <span class=\"title\">kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">$i=1;</span>\n    <span class=\"title\">while($i<=5){</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n       <span class=\"title\">$i++;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh while di atas akan terus menjalankan blok kodenya selama nilai dari variabel $i lebih kecil\natau sama dengan 5. Dan pada setiap iterasinya, nilai variabel $i akan bertambah 1 ($i++)\n<h4>Do...while</h4>\nSatu yang unik dari perulangan ini adalah, dia pasti akan melakukan iterasi, minimal satu kali,\nmeskipun nilai kondisinya tidak pernah true. Hal ini disebabkan struktur perulangan yang\nmenyebabkan blok kode akan dijalankan lebih dulu, lalu kondisinya dievaluasi belakangan. Sintaks\nperulangan ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">do{</span>\n       <span class=\"title\">kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span><span class=\"title\">while(kondisi);</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">$i=1;</span>\n    <span class=\"title\">do{</span>\n       <span class=\"title\">$i++;</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n    <span class=\"title\">}</span><span class=\"title\">while ($i<=5);</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh di atas akan menjalankan kode $i++ dan echo \"Bilangan ke?$i:  \" . $i . \"<br />\"; terlebih dahulu,\nsetelah itu baru kondisinya dievaluasi.', 1, '2022-09-28 12:22:40', 1, '2023-08-03 09:18:25', 1),
(55, 'Function', NULL, NULL, 4, 1, 6, NULL, 4, NULL, NULL, 'belajar membuat fungsi di php', 1, '2022-09-28 12:25:14', 1, '2023-08-03 09:18:25', 1),
(56, 'Function', NULL, NULL, 4, 2, 6, 55, 4, 'materi pembelajaran', NULL, '<h2>Fungsi</h2>\nSebuah fungsi dibuat dengan aturan sintaks:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">function namaFungsi() {</span>\n       <span class=\"title\">kode?kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nBeberapa petunjuk dalam membuat sebuah fungsi:\n<br>\n• Namai fungsi yang menggambarkan fungsinya\n<br>\n• Nama fungsi dimulai dengan huruf atau garis bawah (underscore), tidak boleh angka.\n<br>\n<h4>Pemanggilan Fungsi</h4>\nKetika fungsi sudah dibuat, dia dapat dijalankan dengan cara dipanggil. Pemanggilan suatu fungsi\nmengikuti pola: nama fungsi lalu diikuti tanda kurung dan nilai parameter jika ada. Contoh:\n<br>\n<b>tambah(10,20);</b>\n<br>\nMemanggil sebuah fungsi bernama tambah dengan nilai parameter 10 dan 20. Jika tidak ada nilai\nparameter, maka pemanggilan fungsi:\n<br>\n<b>cetak();</b>\n<h4>Parameter Fungsi</h4>\nUntuk menambah daya guna fungsi dapat ditambahkan parameter fungsi yang tidak lain adalah\nserupa variabel. Parameter ini dituliskan sesudah nama fungsi didalam tanda kurung. Dengan\nparameter ini, hasil dari fungsi dapat diatur sesuai dengan keinginan.\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">function namaProg ($fprogram) {</span>\n       <span class=\"title\">  echo $fname . “<br />”</span>\n    <span class=\"title\">}</span>\n    <span class=\"title\">echo “Bahasa membuat struktur dan konten adalah ”.namaProg(“HTML”);</span>\n    <span class=\"title\">echo “Unsur interaktif diberikan oleh ”.namaProg(“Javascript”);</span>\n    <span class=\"title\">echo “Memperindah tampilan fungsi dari ”.namaProg(“CSS”);</span>\n    <span class=\"title\">echo “Aplikasi web pengolahan data menggunakan ”.namaProg(“PHP”);</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nHasil dari fungsi diatas (nama program) dapat diubah?ubah dengan memberi nilai berbeda pada\nparameter $fprogram saat pemanggilan fungsi.\n<h4>Nilai Balik Fungsi</h4>\nFungsi dapat diatur agar mengembalikan hasil berupa nilai dengan cara menggunakan kata kunci\nreturn. \nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">function tambah(){</span>\n       <span class=\"title\">$total = $x + $y;</span>\n       <span class=\"title\">return $total;</span>\n    <span class=\"title\">}</span>\n    <span class=\"title\">echo “$x + $y = ” . tambah(5,20);  </span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nNilai yang dikembalikan pada fungsi diatas adalah jumlah dari nilai variabel $x dan $y yang  ada\ndidalam variabel $total. Hasil di layar browser adalah tampilan 5 + 20 = 25', 1, '2022-09-28 12:25:14', 1, '2023-08-03 09:18:25', 1),
(57, 'Array', NULL, NULL, 5, 1, 6, NULL, 5, NULL, NULL, 'Belajar membuat Array di PHP', 1, '2022-09-28 12:26:55', 1, '2023-08-03 09:18:25', 1),
(58, 'Array', NULL, NULL, 5, 2, 6, 57, 5, 'materi pembelajaran', NULL, '<h2>Array</h2>\nArray adalah jenis tipe data khusus yang menyimpan sejumlah nilai data dalam sebuah variabel.\nNilai?nilai data tersebut, yang disebut elemen array, memiliki indeks yang menunjukkan urutannya\ndalam  array. Elemen array pertama akan memiliki indeks 0, elemen kedua berindeks 1, dan\nseterusnya.\n<br>\nDengan array, proses pencarian data tertentu akan mudah dilakukan. Misalkan Anda memiliki data\nnama barang elektronik yang disimpan dalam variabel tunggal seperti ini:\n<br>\n  $brg1=”DVD”;<br>\n  $brg2=”Televisi”;<br>\n  $brg3=”Lemari es”;<br>\nBagaimana jika kita ingin mencari barang elektronik tertentu dengan menggunakan perulangan\nterhadap kelompok variabel tersebut? Tentu akan repot dengan berbagai kode yang harus kita buat\nuntuk menentukan nomor urut variabel tersebut terlebih dahulu dan sebagainya. Lain halnya jika\nmenggunakan array, kita hanya perlu menggunakan indeks array untuk menemukan barang\nelektronik yang kita cari. \n<h4>Membuat Array</h4>\nMembuat array dalam PHP menggunakan fungsi array().\nContoh:\n<br>\n$brg = array (“DVD”,”Televisi”,”Lemari es”);\nUntuk mengakses elemen array tersebut dengan menggunakan indeksnya. Nilai data “Televisi”\ndapat diakses dengan kode $brg[1]. Misalnya dicetak, maka perintahnya adalah:\n<br>\necho “Elemen array kedua adalah : ” . $brg[1];\n<br>\nArray juga dapat dibuat dengan cara menentukan indeksnya langsung seperti:\n<br>\n  $brg[0]=”DVD”;\n<br>\n  $brg[1]=”Televisi”;\n<br>\n  $brg[2]=”Lemari es”;\n<br>\n<h4>Jenis Array</h4>\nDalam PHP terdapat 3 jenis array, yaitu\n<h5>array numerik (indexed arrays)</h5>\n<h5>array assosiatif  (associative array)</h5>\n<h5>array multidimensi (multidimensional array)</h5>\n\n<h4>Array numerik</h4>\nJenis array yang berindeks numeris seperti contoh sebelumnya.\n<h4>Array assosiatif</h4>\nJenis array yang memiliki indeks berupa string.\n<h4>Array multidimensi</h4>\nJenis arary yang indeksnya juga array. Artinya, elemen dari array jenis ini berupa suatu array juga.\nContoh:\n<br>\n$mhs = array (\n<br>\n    array (‘A12.2010.04567’, ’Anita Larasati’, 3.5);\n<br>\n    array (‘A12.2010.05678’, ’Dude Harmono’, 3);\n<br>\n    array (‘A12.2010.06789’, ’Ernawati Listyani’, 2.75);\n<br>\n)\n<br>\nUntuk mengakses elemen array multidimensi, misalkan akan dicetak, maka kodenya:\n<br>\n  echo “NIM : “ . $mhs[0][0]. “Nama : ” . $mhs[0][1] . “IPK : ” . $mhs[0][2] . “<br />”;\n<br>\n  echo “NIM : “ . $mhs[1][0]. “Nama : ” . $mhs[1][1] . “IPK : ” . $mhs[1][2]; . “<br />”;\n<br>\n  echo “NIM : “ . $mhs[2][0]. “Nama : ” . $mhs[2][1] . “IPK : ” . $mhs[2][2];\n<br>\n<h4>Mencari Panjang Suatu Array</h4>\nSeperti diketahui array terdiri dari sejumlah elemen array. Untuk mengetahui jumlah elemen dalam\nsuatu array atau panjang suatu array dapat menggunakan fungsi count().\nContoh:\n<br>\n  $mobil = array (“Volvo”,”Jaguar”, “Mercedez”);\n<br>\n  echo “Panjang array adalah : ” . count($mobil);\n<br>\nFungsi count() diatas akan mengembalikan nilai panjang array yaitu 3.\n<h4>Mencetak Seluruh Elemen Array</h4>\nUntuk mencetak seluruh elemen array dapat digunakan suatu perulangan for sebagai berikut:\n<br>\n  $mobil = array (“Volvo”,”Jaguar”, “Mercedez”);\n<br>\n  $jum = count($mobil);\n<br>\n  for ($i=0; $i<$jum; $i++) {\n<br>\n    echo $mobil[$i] . ‘<br />’;\n<br>\n  }\n<br>\n<h4>Array Assosiatif</h4>\nPenulisan indeks untuk jenis array ini bagi Anda yang tidak terbiasa akan terbilang ganjil.  Tetapi\njika sudah terbiasa tidak akan menjadi masalah. Kode pembuatan array jenis ini jika menggunakan\nfungsi array() tampak seperti berikut ini:\n<br>\n  $umur = array (“Joni”=>”17”, “Indra”=>”18”, “Susi”=>”16”);\n<br>\n  echo “Joni berusia “ . $umur(“Joni”) . “ tahun”;\n<br>\nTampak dalam menentukan elemen?elemen array diatas menggunakan simbol “=>” yang dibuat\ndengan simbol sama dengan (“=”) dikombinasikan dengan simbol lebih besar (“>”).\nUntuk mencetak seluruh nilai elemen array jenis ini dapat menggunakan perulangan foreach,\nseperti ini:\n<br>\n  $umur = array (“Joni”=>”17”, “Indra”=>”18”, “Susi”=>”16”);\n<br>\n  foreach ($umur as $x=>$nilaiX) {\n<br>\n    echo “Indeks “ . $x . “ bernilai “ . $nilaiX . “<br />”;\n<br>\n  }\n<br>\n\n', 1, '2022-09-28 12:26:55', 1, '2023-08-03 09:18:25', 1),
(59, 'Introduction', NULL, NULL, 1, 1, 7, NULL, 1, '', NULL, NULL, 1, '2022-10-03 11:06:36', 1, '2023-08-03 08:43:14', 1),
(60, 'introduction', NULL, NULL, 1, 2, 7, 59, 1, 'materi pembelajaran', NULL, '\r\n<style>\r\n/* (A) CONTAINER */\r\n#grid-layout {\r\n  /* (A1) GRID LAYOUT */\r\n  display: grid;\r\n  grid-gap: 10px;\r\n \r\n  /* (A2) DESIGN YOUR GRID TEMPLATE */\r\n  grid-template-areas:\r\n  \"head head head head\"\r\n  \"main main side side\"\r\n  \"foot foot side side \";\r\n}\r\n\r\n/* (B) GRID CELLS */\r\n.cell { padding: 10px; }\r\n \r\n/* (C) ASSIGN THE AREAS */\r\n.head {\r\n  grid-area: head;\r\n  background: #ffe5db;\r\n}\r\n.main {\r\n  grid-area: main;\r\n  background: #e3ffdb;\r\n}\r\n.side {\r\n  grid-area: side;\r\n  background: #dbf8ff;\r\n}\r\n.foot {\r\n  grid-area: foot;\r\n  background: #ebebeb;\r\n}\r\n</style>\r\n<h1>KENAPA BELAJAR JAVASCRIPT ?</h1>\r\n<ul>\r\n<li>Javascript Mudah untuk Dipelajari</li>\r\n<li>Javascript adalah bahasa yang populer</li>\r\n<li>Javascript sudah tertanam di browser sehingga bisa secara langsung digunakan </li>\r\n</ul>\r\n\r\n<h2>Bagaimana cara Inisialisasi di javascript ?</h2>\r\n\r\n<div id=\"grid-layout\">\r\n  <div class=\"cell head\"><strong>Pengenalan Variabel dan Sifatnya</strong>\r\n<br>\r\n<p>Note:Console Log akan menprint value yang ada di dalama console browser anda , cara mengecek console browser adalah dengan menekan CTR+SHIFT+I secara bersamaan </p>\r\n<br>\r\n</div>\r\n  <div class=\"cell main\">\r\n\r\n&lt;script&gt; &lt;-- file script masukan ke dalam kolom JS \r\n<hr>\r\nlet&nbsp;x;\r\n<br>\r\nx&nbsp;=&nbsp;5;\r\n<br>\r\nconsole.log(x)\r\n<hr>\r\nlet&nbsp;x&nbsp;=&nbsp;5;\r\nlet&nbsp;y&nbsp;=&nbsp;6;\r\n<br>\r\nconsole.log(x,y)\r\n<hr>\r\nlet&nbsp;x&nbsp;=&nbsp;5,&nbsp;y&nbsp;=&nbsp;6,&nbsp;z&nbsp;=&nbsp;7;\r\n<br>\r\nconsole.log(x,y,z)\r\n<hr>\r\n&lt;/script&gt\r\n</div>\r\n  <div class=\"cell side\">\r\nvariabel tidak bisa di mulai dengan angka \r\n<br>\r\nContoh :\r\nLet&nbsp;1a&nbsp;=&nbsp;&#39;hello&#39;;\r\n<hr>\r\nPada kasus sensitive pemberian nama variable  semisal x dan X \r\ndianggap berbeda\r\n<br>\r\n<br>\r\nlet&nbsp;x&nbsp;=&nbsp;&quot;hellow&quot;;\r\n<br>\r\nlet&nbsp;X&nbsp;=&nbsp;123;\r\n<br>\r\n<br>\r\nconsole.log(x);&nbsp;\r\nconsole.log(X);&nbsp;\r\n<hr>\r\nconst&nbsp;x&nbsp;=&nbsp;5;\r\nx&nbsp;=&nbsp;10;&nbsp;&nbsp;//&nbsp;ERROR constant dimana variable yang sudah deklarasi tidak bisa di ganti-ganti \r\n<br>\r\nconsole.log(x)\r\n<hr>\r\nBisa di ganti dengan tipe variable yang berbeda .\r\n<br>\r\nvar x = \"Hanya Variabel\";\r\n<br>\r\nx=123;\r\n<br>\r\nconsole.log(x);\r\n<br>\r\n\r\n\r\n  </div>\r\n  <div class=\"cell foot\">\r\n\r\nselain itu kita juga bisa menggabungkan string dengan string \r\n<br>\r\nconst&nbsp;greet&nbsp;=&nbsp;&#39;Hello&#39;;\r\n<br>\r\nconst&nbsp;name&nbsp;=&nbsp;&#39;Jack&#39;;\r\n<br>\r\nconsole.log(greet&nbsp;+&nbsp;&#39;&nbsp;&#39;&nbsp;+&nbsp;name)\r\n<hr>\r\nPemanggilan Variable String \r\n<br>\r\nconst&nbsp;name&nbsp;=&nbsp;&#39;ram&#39;;\r\n<br>\r\nconst&nbsp;name1&nbsp;=&nbsp;&quot;hari&quot;;\r\n<br>\r\nconst&nbsp;result&nbsp;=&nbsp;`The&nbsp;names&nbsp;are&nbsp;${name}&nbsp;and&nbsp;${name1}`;\r\n<br>\r\nconsole.log(result);\r\n<br>\r\n</div>\r\n</div>\r\n\r\n\r\n  \r\n', 1, '2022-10-03 11:09:11', 1, '2023-08-03 08:43:14', 1),
(61, 'introduction', NULL, NULL, 2, 2, 7, 59, 1, 'materi pembelajaran', NULL, ' \r\n<h1>HTML DOM </h1>\r\n<p> Ketika browser loaded, browser membuat <b>D</b>ocument <b>O</b>bject <b>M</b>odel di Web-Browsernya</p>\r\n\r\nHal Paling simple untuk menerangkan HTML DOM itu apa coba lah ketik nama kalian pada\r\nkotak di bawah ini\r\n<hr>\r\n<html>\r\n<label for=\"message\">Message:</label>\r\n    <input type=\"text\" class=\"inputDemo\" id=\"messageDemo\" name=\"messageDemo\">\r\n    <p id=\"resultDemo\"></p>\r\n</html>\r\n\r\n<script>\r\n let inputDemo = document.querySelector(\'.inputDemo\');\r\n        let resultDemo = document.querySelector(\'#resultDemo\');\r\n        inputDemo.addEventListener(\'keyup\', function () {\r\n            resultDemo.textContent = this.value;\r\n        });\r\n</script>\r\n<hr>\r\n\r\n\r\n<br>\r\n<p><strong>Apa yang terjadi ?</strong>. Konten-nya ter-update secara dinamik ,secara simple</p>\r\n<p><strong>Jadi Apa itu DOM ?</strong> adalah platform antar muka yang memungkinkan progam dan skrip untuk mengakses konten, struktur, dan gaya dokumen secara dinamis.</p>\r\n<br>\r\n<p>HTML:</p>\r\n&nbsp;&lt;label&nbsp;for=&quot;message&quot;&gt;Message:&lt;/label&gt;\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type=&quot;text&quot;&nbsp;class=&quot;input\r\n&quot;&nbsp;id=&quot;message&quot;&nbsp;name=&quot;message&quot;&gt;\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&nbsp;id=&quot;result&quot;&gt;&lt;/p&gt;\r\n<br>\r\n<br>\r\n<p>JS:</p>\r\n&nbsp;&nbsp;&nbsp;let&nbsp;input&nbsp;=&nbsp;document.querySelector(&#39;.input&#39;);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;let&nbsp;result&nbsp;=&nbsp;document.querySelector(&#39;#result&#39;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;input.addEventListener(&#39;keyup&#39;,&nbsp;function&nbsp;()&nbsp;{<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;result.textContent&nbsp;=&nbsp;this.value;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});\r\n\r\n<hr>\r\nInisialisasi <b>input</b> dengan <b>class input</b> :\r\n<br>\r\nlet&nbsp;<strong>input</strong>&nbsp;=&nbsp;document.querySelector(&#39;<b>.input&#39;</b>);\r\n<br><br>\r\nInisialisasi <b>result</b> dengan <b>id result</b> :\r\nlet result = document.querySelector(\'#result\');\r\n<br>\r\n<p>Note: Pemanggilan class menggunakan <b>(.)</b> sedangkan pemanggilan id menggunakan <b>(#)</b>.</p>\r\n<br>\r\n\r\n\r\n\r\n', 1, '2022-10-03 11:10:45', 1, '2023-08-03 08:43:14', 1),
(62, 'introduction', NULL, NULL, 3, 2, 7, 59, 1, 'materi pembelajaran', NULL, ' \r\n<div align=\"center\"><h1>Classes </h1></div>\r\n<br><br>\r\n\r\n<p> \r\n\r\n <b>Class</b> adalah template untuk membuat objek. Class merangkum data dengan kode .Class di JS dibangun dengan struktur tertentu yang dimana memiliki beberapa sintaks .\r\n</p>\r\nIni adalah cara Inisialisas Suatu Class di JavaScript :\r\n<br>\r\nclass name {&#10; <br>\r\n &nbsp;constructor() {&#10;  <br>    \r\n &nbsp;this.firstname =\"Kentaro\";&#10;     <br>\r\n &nbsp;this.lastname = \"Madison\";&#10;  }&#10; <br>\r\nget&nbsp;name(){<br>\r\n&nbsp;return&nbsp;this.firstname&nbsp;+&nbsp;&quot;&nbsp;&quot;+this.lastname<br>\r\n&nbsp;}<br>\r\n}  <br>  <br>\r\n\r\nvar nama=new name()\r\n<br>\r\n\r\nconsole.log(nama.name)\r\n<br>\r\n\r\n<hr>\r\n<br>\r\n<hr>\r\nSekarang Kalian bisa Lihat di console kalian (CTRL + SHIFT + I) .Apa yang tertulis di sana ? gabungan antara properti firstname dan lastname . <br><br>\r\nSekarang Coba Tambahkan :<br>\r\nDi HTML :\r\n<br>\r\n&lt;p&nbsp;id=&quot;fullname&quot;&gt;&lt;/p&gt; \r\n<br>\r\nDi JavaScript :\r\n<br>\r\ndocument.getElementById(&quot;fullname&quot;).innerHTML&nbsp;=&nbsp;nama.name\r\n<br>\r\n<br>\r\nMaka Akan Program Akan di Tampilkan di Suatu Paragraph dengan inisialisasi ID nya\r\n\r\n<hr>\r\nKasus Memperbaiki Huruf Yang tidak Kapital seperti firtname di sini :\r\n<br>\r\nclass&nbsp;name&nbsp;{ <br>\r\n&nbsp;constructor()&nbsp;{<br>\r\n&nbsp;this.firstname&nbsp;=&quot;bento&quot;;<br>\r\n&nbsp;this.lastname&nbsp;=&nbsp;&quot;Madison&quot;;<br>\r\nthis.up&nbsp;=&nbsp;this.firstname.charAt(0).toUpperCase()+this.firstname.slice(1);<br>&nbsp;<br>\r\n<br>}\r\n\r\n\r\nget&nbsp;name(){<br>\r\n&nbsp;return&nbsp;this.up&nbsp;+&nbsp;&quot;&nbsp;&quot;+this.lastname<br>\r\n&nbsp;}<br>\r\n}<br>\r\nvar&nbsp;nama=new&nbsp;name()<br>\r\nconsole.log(nama.name)<br>\r\ndocument.getElementById(&quot;fullname&quot;).innerHTML&nbsp;=&nbsp;nama.name<br>\r\n<br>\r\n <br>  <br>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 1, '2022-10-03 11:13:21', 1, '2023-08-03 08:43:14', 1),
(63, 'List And Collection', NULL, NULL, 2, 1, 7, NULL, 2, '', NULL, '', 1, '2022-10-03 11:15:11', 1, '2023-08-03 09:18:45', 1),
(64, 'list and collection ', NULL, NULL, 2, 2, 7, 63, 2, 'materi pembelajaran', NULL, '\r\n<h1>List</h1>\r\n<h3>Di Dalam Javascript List secara stuktur dan desain  dapat di modifikasi \r\nsehingga menghasilkan suatu bentuk list yang dynamic ,untuk menambah pemahaman kalian terkait list ,saya sudah menyiapkan code yang dapat kalian coba seperti pada di bawah ini: </h3><br>\r\n<br>\r\n\r\n\r\n\r\n  <div class=\"row\">\r\n    <div class=\"col\"> \r\n\r\n    &lt;div class=\"container\"&gt;<br>\r\n    &lt;div class=\"wrap\"&gt;<br>\r\n        &lt;h2&gt;Add Dynamic Input Field&lt;/h2&gt;<br>\r\n        &lt;button  class=\"add\"&gt;&amp;plus;&lt;/button&gt;<br>\r\n        &lt;div class=\"inp-group\"&gt;<br>\r\n        &lt;/div&gt;<br>\r\n    &lt;/div&gt;<br>\r\n&lt;/div&gt;<br>\r\n\r\n\r\n    </div>\r\n    <div class=\"col\">\r\nconst addBtn = document.querySelector(\".add\");<br>\r\nconst input =  document.querySelector(\".inp-group\");<br>\r\n<br>\r\n<br>\r\nfunction removeInput(){<br>\r\n<br>\r\n    this.parentElement.remove();<br>\r\n}<br>\r\nfunction addInput() {<br>\r\n    const name=document.createElement(\"input\");<br>\r\n    name.type=\"text\";<br>\r\n    name.placeholder=\"enter your name\";<br>\r\n<br>\r\n    const email =document.createElement(\"input\");<br>\r\n    email.type=email;<br>\r\n    email.placeholder=\"Enter Your Email\";<br>\r\n<br>\r\n    const  btn=document.createElement(\"button\");<br>\r\n    btn.className= \"delete\";<br>\r\n    btn.innerHTML=\"&amp;times\";<br>\r\n<br>\r\n    btn.addEventListener(\"click\",removeInput);<br>\r\n<br>\r\n    const flex=document.createElement(\"div\");<br>\r\n    flex.className=\"flex\";<br>\r\n<br>\r\n    input.appendChild(flex);<br>\r\n    flex.appendChild(name);<br>\r\n    flex.appendChild(email);<br>\r\n    flex.appendChild(btn);<br>\r\n<br>\r\n<br>\r\n}<br>\r\naddBtn.addEventListener(\"click\",addInput)<br>\r\n    </div>\r\n  </div>\r\n\r\n\r\n\r\n\r\n\r\n', 1, '2022-10-03 11:17:07', 1, '2023-08-03 09:18:45', 1),
(65, 'list and collection ', NULL, NULL, 1, 2, 7, 63, 2, 'materi pembelajaran', NULL, '\r\n<h1 align=\"center\">LIST</h1><br>\r\nKita tahu javascript bisa mengontrol berbagai elements agar tampilan-Nya Terlihat lebih interaktif dan dinamis,saya akan mencontohkan salah satunya adalah List. Sebagai contoh Nya dapat kalian lihat di bawah ini :<br>\r\ncukup gunakan html ini saja tapi ganti javascriptnya :\r\n&lt;p id=\"demo\"&gt;&lt;/p&gt;\r\n\r\n<br>\r\n<br>\r\nmembuat list langsung di HTML udah biasa, tapi banyangin kalau list kalian udah mencapai tahap puluhan / ratusan (aku rasa kalian akan kelamaan dalam coding dan dirasa kurang flexible).<br>\r\nMaka Cobalah code ini :<br>\r\nconst people = [\"andi\", \"dinda\", \"tira\", <br>\"lily\",\"jimmy\",\"keli\",\"samsul\",\"koley\"];<br>\r\nlet pLen = people.length;<br>\r\n<br>\r\nlet text = \"&lt;ul&gt;\";<br>\r\nfor (let i = 0; i &lt; pLen; i++) {<br>\r\n  text += \"&lt;li&gt;\" + people[i] + \"&lt;/li&gt;\";<br>\r\n}<br>\r\ntext += \"&lt;/ul&gt;\";<br>\r\n<br>\r\ndocument.getElementById(\"demo\").innerHTML = text;<br>\r\n\r\n\r\n\r\n', 1, '2022-10-03 11:20:38', 1, '2023-08-03 09:18:45', 1),
(66, 'list and collection ', NULL, NULL, 3, 2, 7, 63, 2, 'materi pembelajaran', NULL, '<h1>Mau Yang Lebih menantang ?</h1>\r\n<h3>Perhatikan Code di bawah ini :</h3>\r\n<br>\r\n<br>\r\n<p>javascript:</p>\r\n<br>\r\nconst addBtn = document.querySelector(\".add\");<br>\r\nconst input =  document.querySelector(\".inp-group\");<br>\r\nconst manusia = [\"andi\", \"dinda\", \"tira\",<br>\r\n\"lily\",\"jimmy\",\"keli\",\"samsul\",\"koley\"];<br>\r\n<br>\r\nfunction removeInput(){<br>\r\n<br>\r\n    this.parentElement.remove();<br>\r\n}<br>\r\nfunction addInput() {<br>\r\n    const name=document.createElement(\"input\");<br>\r\n    name.type=\"text\";<br>\r\n    name.placeholder=\"enter your name\";<br>\r\n<br>\r\n    const inisials=document.createElement(\"select\");<br>\r\n    inisials.innerHTML = \"\";<br>\r\n    <br>\r\n<br>\r\n    for(let i=0 ; i&lt;manusia.length;i++){<br>\r\n    const inisial=document.createElement(\"option\");<br>\r\n    inisial.textContent=manusia[i];<br>\r\n    inisial.value=manusia[i];<br>\r\n    inisials.appendChild(inisial)<br>\r\n    }<br>\r\n    <br>\r\n<br>\r\n    const  btn=document.createElement(\"button\");<br>\r\n    btn.className= \"delete\";<br>\r\n    btn.innerHTML=\"&amp;times\";<br>\r\n<br>\r\n    btn.addEventListener(\"click\",removeInput);<br>\r\n<br>\r\n    const flex=document.createElement(\"div\");<br>\r\n    flex.className=\"flex\";<br>\r\n\r\n    input.appendChild(flex);<br>\r\n    flex.appendChild(name);<br>\r\n    flex.appendChild(inisials);<br>\r\n    flex.appendChild(btn);<br>\r\n<br>\r\n<br>\r\n}<br>\r\naddBtn.addEventListener(\"click\",addInput)<br>\r\n<br>\r\n\r\nHTML: <br>\r\n<br>\r\n&lt;div class=\"container\"&gt;<br>\r\n    &lt;div class=\"wrap\"&gt;<br>\r\n        &lt;h2&gt;Add Dynamic Input Field&lt;/h2&gt;<br>\r\n        &lt;button  class=\"add\"&gt;&amp;plus;&lt;/button&gt;<br>\r\n        &lt;div class=\"inp-group\"&gt;<br>\r\n<br>\r\n        &lt;/div&gt;<br>\r\n    &lt;/div&gt;<br>\r\n&lt;/div&gt;<br>\r\n\r\n', 1, '2022-10-03 11:22:22', 1, '2023-08-03 09:18:45', 1),
(67, 'Custom Bindings', NULL, NULL, 3, 1, 7, NULL, 3, '', NULL, NULL, 1, '2022-10-03 11:24:05', 1, '2023-08-03 09:18:45', 1),
(68, 'custom bindings', NULL, NULL, 1, 2, 7, 67, 3, 'materi pembelajaran', NULL, '<h1 align=\"center\">Sistem Pendataan Nilai Siswa</h1>\r\n<p>Bagaimana Jadinya Jika kita Memerlukan suatu sistem yang flexible yang bisa menghadle semua nilai siswa yang ada, cara paling simple untuk menjelaskannya bisa kalian liat code di bawah ini:</p>\r\n\r\n<br>\r\nJavascript:<br>\r\n\r\n\r\nconst&nbsp;addBtn&nbsp;=&nbsp;document.querySelector(&quot;.add&quot;);<br>\r\nconst&nbsp;input&nbsp;=&nbsp;&nbsp;document.querySelector(&quot;.inp&#45;group&quot;);<br>\r\n<br>\r\nfunction&nbsp;removeInput(){<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;this.parentElement.remove();<br>\r\n}<br>\r\nfunction&nbsp;addInput()&nbsp;{<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;name=document.createElement(&quot;input&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;name.type=&quot;text&quot;;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;name.placeholder=&quot;enter&nbsp;your&nbsp;name&quot;;<br>\r\n<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;nilais=document.createElement(&quot;select&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilais.innerHTML&nbsp;=&nbsp;&quot;&quot;;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;for(let&nbsp;i=0&nbsp;;&nbsp;i&lt;11;i++){<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;nilai=document.createElement(&quot;option&quot;)<br>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilai.textContent=i;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilai.value=i;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilais.appendChild(nilai)<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;}<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;&nbsp;btn=document.createElement(&quot;button&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;btn.className=&nbsp;&quot;delete&quot;;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;btn.innerHTML=&quot;&amp;times&quot;;<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;btn.addEventListener(&quot;click&quot;,removeInput);<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;flex=document.createElement(&quot;div&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.className=&quot;flex&quot;;<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;input.appendChild(flex);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.appendChild(name);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.appendChild(nilais);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.appendChild(btn);<br>\r\n<br>\r\n<br>\r\n}<br>\r\naddBtn.addEventListener(&quot;click&quot;,addInput)<br>\r\n<br>\r\nHTML:<br>\r\n<br>\r\n&lt;div&nbsp;class=&quot;container&quot;&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class=&quot;wrap&quot;&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;Add&nbsp;Dynamic&nbsp;Input&nbsp;Field&lt;/h2&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;&nbsp;class=&quot;add&quot;&gt;&amp;plus;&lt;/button&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class=&quot;inp&#45;group&quot;&gt;<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>\r\n&lt;/div&gt;<br>\r\n', 1, '2022-10-03 11:34:12', 1, '2023-08-03 09:18:45', 1),
(69, 'Tipe Data Python', NULL, NULL, 1, 1, 8, NULL, 1, '', NULL, NULL, 1, '2022-10-03 14:50:09', 1, '2023-08-03 08:56:49', 1),
(70, 'Tipe Data Python', NULL, NULL, 1, 2, 8, 69, 1, 'materi pembelajaran', NULL, '<h2>Tipe Data Python</h2>\r\n<p>Tipe data adalah suatu media atau memori pada komputer yang digunakan untuk menampung informasi.\r\n\r\nPython sendiri mempunyai tipe data yang cukup unik bila kita bandingkan dengan bahasa pemrograman yang lain.\r\n\r\nBerikut adalah tipe data dari bahasa pemrograman Python :</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr><th>Tipe Data</th>\r\n    <th>Contoh</th>\r\n    <th>Penjelasan</th>\r\n  </tr></thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Boolean</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">True</code> atau <code class=\"language-plaintext highlighter-rouge\">False</code></td>\r\n      <td>Menyatakan benar <code class=\"language-plaintext highlighter-rouge\">True</code> yang bernilai <code class=\"language-plaintext highlighter-rouge\">1</code>, atau salah <code class=\"language-plaintext highlighter-rouge\">False</code> yang bernilai <code class=\"language-plaintext highlighter-rouge\">0</code></td>\r\n    </tr>\r\n    <tr>\r\n      <td>String</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">\"Ayo belajar Python\"</code></td>\r\n      <td>Menyatakan karakter/kalimat bisa berupa huruf angka, dll (diapit tanda <code class=\"language-plaintext highlighter-rouge\">\"</code> atau <code class=\"language-plaintext highlighter-rouge\">\'</code>)</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Integer</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">25</code> atau <code class=\"language-plaintext highlighter-rouge\">1209</code></td>\r\n      <td>Menyatakan bilangan bulat</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Float</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">3.14</code> atau <code class=\"language-plaintext highlighter-rouge\">0.99</code></td>\r\n      <td>Menyatakan bilangan yang mempunyai koma</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Hexadecimal</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">9a</code> atau <code class=\"language-plaintext highlighter-rouge\">1d3</code></td>\r\n      <td>Menyatakan bilangan dalam format heksa (bilangan berbasis 16)</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Complex</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 + 5j  </code></td>\r\n      <td>Menyatakan pasangan angka real dan imajiner</td>\r\n    </tr>\r\n    <tr>\r\n      <td>List</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'xyz\', 786, 2.23]</code></td>\r\n      <td>Data untaian yang menyimpan berbagai tipe data dan isinya bisa diubah-ubah</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tuple</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">(\'xyz\', 768, 2.23)</code></td>\r\n      <td>Data untaian yang menyimpan berbagai tipe data tapi isinya tidak bisa diubah</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Dictionary</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">{\'nama\': \'adi\',\'id\':2}</code></td>\r\n      <td>Data untaian yang menyimpan berbagai tipe data berupa pasangan penunjuk dan nilai</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<p>Untuk mencoba berbagai macam tipe data, silahkan coba script Python dibawah ini.</p>\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#tipe data Boolean\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"bp\">True</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data String\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Ayo belajar Python\"</span><span class=\"p\">)</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\'Belajar Python Sangat Mudah\'</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Integer\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">20</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Float\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mf\">3.14</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Hexadecimal\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">9</span><span class=\"n\">a</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Complex\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mf\">5j</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data List\r\n</span><span class=\"k\">print</span><span class=\"p\">([</span><span class=\"mi\">1</span><span class=\"p\">,</span><span class=\"mi\">2</span><span class=\"p\">,</span><span class=\"mi\">3</span><span class=\"p\">,</span><span class=\"mi\">4</span><span class=\"p\">,</span><span class=\"mi\">5</span><span class=\"p\">])</span>\r\n<span class=\"k\">print</span><span class=\"p\">([</span><span class=\"s\">\"satu\"</span><span class=\"p\">,</span> <span class=\"s\">\"dua\"</span><span class=\"p\">,</span> <span class=\"s\">\"tiga\"</span><span class=\"p\">])</span>\r\n\r\n<span class=\"c1\">#tipe data Tuple\r\n</span><span class=\"k\">print</span><span class=\"p\">((</span><span class=\"mi\">1</span><span class=\"p\">,</span><span class=\"mi\">2</span><span class=\"p\">,</span><span class=\"mi\">3</span><span class=\"p\">,</span><span class=\"mi\">4</span><span class=\"p\">,</span><span class=\"mi\">5</span><span class=\"p\">))</span>\r\n<span class=\"k\">print</span><span class=\"p\">((</span><span class=\"s\">\"satu\"</span><span class=\"p\">,</span> <span class=\"s\">\"dua\"</span><span class=\"p\">,</span> <span class=\"s\">\"tiga\"</span><span class=\"p\">))</span>\r\n\r\n<span class=\"c1\">#tipe data Dictionary\r\n</span><span class=\"k\">print</span><span class=\"p\">({</span><span class=\"s\">\"nama\"</span><span class=\"p\">:</span><span class=\"s\">\"Budi\"</span><span class=\"p\">,</span> <span class=\"s\">\'umur\'</span><span class=\"p\">:</span><span class=\"mi\">20</span><span class=\"p\">})</span>\r\n<span class=\"c1\">#tipe data Dictionary dimasukan ke dalam variabel biodata\r\n</span><span class=\"n\">biodata</span> <span class=\"o\">=</span> <span class=\"p\">{</span><span class=\"s\">\"nama\"</span><span class=\"p\">:</span><span class=\"s\">\"Andi\"</span><span class=\"p\">,</span> <span class=\"s\">\'umur\'</span><span class=\"p\">:</span><span class=\"mi\">21</span><span class=\"p\">}</span> <span class=\"c1\">#proses inisialisasi variabel biodata\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">biodata</span><span class=\"p\">)</span> <span class=\"c1\">#proses pencetakan variabel biodata yang berisi tipe data Dictionary\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"nb\">type</span><span class=\"p\">(</span><span class=\"n\">biodata</span><span class=\"p\">))</span> <span class=\"c1\">#fungsi untuk mengecek jenis tipe data. akan tampil &lt;class \'dict\'&gt; yang berarti dict adalah tipe data dictionary</span></code></pre></figure>', 1, '2022-10-03 14:50:09', 1, '2023-08-03 08:56:49', 1),
(71, 'Variable dan Operator python', NULL, NULL, 2, 1, 8, NULL, 2, '', NULL, NULL, 1, '2022-10-03 15:01:23', 1, '2023-08-03 09:19:09', 1),
(72, 'Variable dan Operator python', NULL, NULL, 1, 2, 8, 71, 2, 'materi pembelajaran', NULL, '<h2>Variable</h2>\r\n<p>Variabel adalah lokasi memori yang dicadangkan untuk menyimpan nilai-nilai. Ini berarti bahwa ketika Anda membuat sebuah variabel Anda memesan beberapa ruang di memori. Variabel menyimpan data yang dilakukan selama program dieksekusi, yang nantinya isi dari variabel tersebut dapat diubah oleh operasi - operasi tertentu pada program yang menggunakan variabel.</p>\r\n<p>Variabel dapat menyimpan berbagai macam tipe data. Di dalam pemrograman Python, variabel mempunyai sifat yang dinamis, artinya variabel Python tidak perlu didekralasikan tipe data tertentu dan variabel Python dapat diubah saat program dijalankan.</p>\r\n<p>Penulisan variabel Python sendiri juga memiliki aturan tertentu, yaitu :</p>\r\n<ol>\r\n  <li>Karakter pertama harus berupa huruf atau garis bawah/underscore <code class=\"language-plaintext highlighter-rouge\">_</code></li>\r\n  <li>Karakter selanjutnya dapat berupa huruf, garis bawah/underscore <code class=\"language-plaintext highlighter-rouge\">_</code> atau angka</li>\r\n  <li>Karakter pada nama variabel bersifat sensitif (case-sensitif). Artinya huruf kecil dan huruf besar dibedakan. Sebagai contoh, variabel <code class=\"language-plaintext highlighter-rouge\">namaDepan</code> dan <code class=\"language-plaintext highlighter-rouge\">namadepan</code> adalah variabel yang berbeda.</li>\r\n</ol>\r\n<p>Untuk mulai membuat variabel di Python caranya sangat mudah, Anda cukup menuliskan variabel lalu mengisinya dengan suatu nilai dengan cara menambahkan tanda sama dengan <code class=\"language-plaintext highlighter-rouge\">=</code> diikuti dengan nilai yang ingin dimasukan.</p>\r\n<p>Dibawah ini adalah contoh penggunaan variabel dalam bahasa pemrograman Python</p>\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#proses memasukan data ke dalam variabel\r\n</span><span class=\"n\">nama</span> <span class=\"o\">=</span> <span class=\"s\">\"John Doe\"</span>\r\n<span class=\"c1\">#proses mencetak variabel\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">nama</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#nilai dan tipe data dalam variabel  dapat diubah\r\n</span><span class=\"n\">umur</span> <span class=\"o\">=</span> <span class=\"mi\">20</span>               <span class=\"c1\">#nilai awal\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>             <span class=\"c1\">#mencetak nilai umur\r\n</span><span class=\"nb\">type</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>              <span class=\"c1\">#mengecek tipe data umur\r\n</span><span class=\"n\">umur</span> <span class=\"o\">=</span> <span class=\"s\">\"dua puluh satu\"</span> <span class=\"c1\">#nilai setelah diubah\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>             <span class=\"c1\">#mencetak nilai umur\r\n</span><span class=\"nb\">type</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>              <span class=\"c1\">#mengecek tipe data umur\r\n</span>\r\n<span class=\"n\">namaDepan</span> <span class=\"o\">=</span> <span class=\"s\">\"Budi\"</span>\r\n<span class=\"n\">namaBelakang</span> <span class=\"o\">=</span> <span class=\"s\">\"Susanto\"</span>\r\n<span class=\"n\">nama</span> <span class=\"o\">=</span> <span class=\"n\">namaDepan</span> <span class=\"o\">+</span> <span class=\"s\">\" \"</span> <span class=\"o\">+</span> <span class=\"n\">namaBelakang</span>\r\n<span class=\"n\">umur</span> <span class=\"o\">=</span> <span class=\"mi\">22</span>\r\n<span class=\"n\">hobi</span> <span class=\"o\">=</span> <span class=\"s\">\"Berenang\"</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Biodata</span><span class=\"se\">\\n</span><span class=\"s\">\"</span><span class=\"p\">,</span> <span class=\"n\">nama</span><span class=\"p\">,</span> <span class=\"s\">\"</span><span class=\"se\">\\n</span><span class=\"s\">\"</span><span class=\"p\">,</span> <span class=\"n\">umur</span><span class=\"p\">,</span> <span class=\"s\">\"</span><span class=\"se\">\\n</span><span class=\"s\">\"</span><span class=\"p\">,</span> <span class=\"n\">hobi</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#contoh variabel lainya\r\n</span><span class=\"n\">inivariabel</span> <span class=\"o\">=</span> <span class=\"s\">\"Halo\"</span>\r\n<span class=\"n\">ini_juga_variabel</span> <span class=\"o\">=</span> <span class=\"s\">\"Hai\"</span>\r\n<span class=\"n\">_inivariabeljuga</span> <span class=\"o\">=</span> <span class=\"s\">\"Hi\"</span>\r\n<span class=\"n\">inivariabel222</span> <span class=\"o\">=</span> <span class=\"s\">\"Bye\"</span> \r\n\r\n<span class=\"n\">panjang</span> <span class=\"o\">=</span> <span class=\"mi\">10</span>\r\n<span class=\"n\">lebar</span> <span class=\"o\">=</span> <span class=\"mi\">5</span>\r\n<span class=\"n\">luas</span> <span class=\"o\">=</span> <span class=\"n\">panjang</span> <span class=\"o\">*</span> <span class=\"n\">lebar</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">luas</span><span class=\"p\">)</span></code></pre></figure>', 1, '2022-10-03 15:01:23', 1, '2023-08-03 09:19:09', 1);
INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(73, 'Operator dan Variable python', NULL, NULL, 2, 2, 8, 71, 2, 'materi pembelajaran', NULL, '<h2>Operator Python</h2>\r\n<p>Operator adalah konstruksi yang dapat memanipulasi nilai dari operan.</p>\r\n<p>Sebagai contoh operasi 3 + 2 = 5. Disini <code class=\"language-plaintext highlighter-rouge\">3</code> dan <code class=\"language-plaintext highlighter-rouge\">2</code> adalah operan dan <code class=\"language-plaintext highlighter-rouge\">+</code> adalah operator.</p>\r\n<p>Bahasa pemrograman Python mendukung berbagai macam operator, diantaranya :</p>\r\n<h3 id=\"operator-aritmatika-\">Operator Aritmatika <a name=\"operator-aritmatika\"></a></h3>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Contoh</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Penjumlahan <code class=\"language-plaintext highlighter-rouge\">+</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 + 3 = 4</code></td>\r\n      <td>Menjumlahkan nilai dari masing-masing operan atau bilangan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pengurangan <code class=\"language-plaintext highlighter-rouge\">-</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">4 - 1 = 3</code></td>\r\n      <td>Mengurangi nilai operan di sebelah kiri menggunakan operan di sebelah kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Perkalian <code class=\"language-plaintext highlighter-rouge\">*</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 * 4 = 8</code></td>\r\n      <td>Mengalikan operan/bilangan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pembagian <code class=\"language-plaintext highlighter-rouge\">/</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">10 / 5 = 2</code></td>\r\n      <td>Untuk membagi operan di sebelah kiri menggunakan operan di sebelah kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Sisa Bagi <code class=\"language-plaintext highlighter-rouge\">%</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">11 % 2 = 1</code></td>\r\n      <td>Mendapatkan sisa pembagian dari operan di sebelah kiri operator ketika dibagi oleh operan di sebelah kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pangkat <code class=\"language-plaintext highlighter-rouge\">**</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">8 ** 2 = 64</code></td>\r\n      <td>Memangkatkan operan disebelah kiri operator dengan operan di sebelah kanan operator</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pembagian Bulat <code class=\"language-plaintext highlighter-rouge\">//</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">10 // 3 = 3</code></td>\r\n      <td>Sama seperti pembagian. Hanya saja angka dibelakang koma dihilangkan</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<p>Dibawah ini adalah contoh penggunaan Operator Aritmatika dalam bahasa pemrograman Python</p>\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#OPERATOR ARITMATIKA\r\n</span>\r\n<span class=\"c1\">#Penjumlahan\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">13</span> <span class=\"o\">+</span> <span class=\"mi\">2</span><span class=\"p\">)</span>\r\n<span class=\"n\">apel</span> <span class=\"o\">=</span> <span class=\"mi\">7</span>\r\n<span class=\"n\">jeruk</span> <span class=\"o\">=</span> <span class=\"mi\">9</span>\r\n<span class=\"n\">buah</span> <span class=\"o\">=</span> <span class=\"n\">apel</span> <span class=\"o\">+</span> <span class=\"n\">jeruk</span> <span class=\"c1\">#\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">buah</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pengurangan\r\n</span><span class=\"n\">hutang</span> <span class=\"o\">=</span> <span class=\"mi\">10000</span>\r\n<span class=\"n\">bayar</span> <span class=\"o\">=</span> <span class=\"mi\">5000</span>\r\n<span class=\"n\">sisaHutang</span> <span class=\"o\">=</span> <span class=\"n\">hutang</span> <span class=\"o\">-</span> <span class=\"n\">bayar</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sisa hutang Anda adalah \"</span><span class=\"p\">,</span> <span class=\"n\">sisaHutang</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Perkalian\r\n</span><span class=\"n\">panjang</span> <span class=\"o\">=</span> <span class=\"mi\">15</span>\r\n<span class=\"n\">lebar</span> <span class=\"o\">=</span> <span class=\"mi\">8</span>\r\n<span class=\"n\">luas</span> <span class=\"o\">=</span> <span class=\"n\">panjang</span> <span class=\"o\">*</span> <span class=\"n\">lebar</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">luas</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pembagian\r\n</span><span class=\"n\">kue</span> <span class=\"o\">=</span> <span class=\"mi\">16</span>\r\n<span class=\"n\">anak</span> <span class=\"o\">=</span> <span class=\"mi\">4</span>\r\n<span class=\"n\">kuePerAnak</span> <span class=\"o\">=</span> <span class=\"n\">kue</span> <span class=\"o\">/</span> <span class=\"n\">anak</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Setiap anak akan mendapatkan bagian kue sebanyak \"</span><span class=\"p\">,</span> <span class=\"n\">kuePerAnak</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Sisa Bagi / Modulus\r\n</span><span class=\"n\">bilangan1</span> <span class=\"o\">=</span> <span class=\"mi\">14</span>\r\n<span class=\"n\">bilangan2</span> <span class=\"o\">=</span> <span class=\"mi\">5</span>\r\n<span class=\"n\">hasil</span> <span class=\"o\">=</span> <span class=\"n\">bilangan1</span> <span class=\"o\">%</span> <span class=\"n\">bilangan2</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sisa bagi dari bilangan \"</span><span class=\"p\">,</span> <span class=\"n\">bilangan1</span><span class=\"p\">,</span> <span class=\"s\">\" dan \"</span><span class=\"p\">,</span> <span class=\"n\">bilangan2</span><span class=\"p\">,</span> <span class=\"s\">\" adalah \"</span><span class=\"p\">,</span> <span class=\"n\">hasil</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pangkat\r\n</span><span class=\"n\">bilangan3</span> <span class=\"o\">=</span> <span class=\"mi\">8</span>\r\n<span class=\"n\">bilangan4</span> <span class=\"o\">=</span> <span class=\"mi\">2</span>\r\n<span class=\"n\">hasilPangkat</span> <span class=\"o\">=</span> <span class=\"n\">bilangan3</span> <span class=\"o\">**</span> <span class=\"n\">bilangan4</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">hasilPangkat</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pembagian Bulat\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">10</span><span class=\"o\">//</span><span class=\"mi\">3</span><span class=\"p\">)</span> \r\n<span class=\"c1\">#10 dibagi 3 adalah 3.3333. Karena dibulatkan maka akan menghasilkan nilai 3</span></code></pre></figure>\r\n<h3 id=\"operator-perbandingan-\">Operator Perbandingan <a name=\"operator-perbandingan\"></a></h3>\r\n<p>Operator perbandingan (comparison operators) digunakan untuk membandingkan suatu nilai dari masing-masing operan.</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Contoh</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Sama dengan <code class=\"language-plaintext highlighter-rouge\">==</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 == 1</code></td>\r\n      <td>bernilai True	Jika masing-masing operan memiliki nilai yang sama, maka kondisi bernilai benar atau True.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tidak sama dengan <code class=\"language-plaintext highlighter-rouge\">!=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 != 2</code></td>\r\n      <td>bernilai False	Akan menghasilkan nilai kebalikan dari kondisi sebenarnya.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tidak sama dengan <code class=\"language-plaintext highlighter-rouge\">&lt;&gt;</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 &lt;&gt; 2</code></td>\r\n      <td>bernilai False	Akan menghasilkan nilai kebalikan dari kondisi sebenarnya.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih besar dari <code class=\"language-plaintext highlighter-rouge\">&gt;</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &gt; 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih besar dari nilai operan kanan, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih kecil dari <code class=\"language-plaintext highlighter-rouge\">&lt;</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &lt; 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih kecil dari nilai operan kanan, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih besar atau sama dengan <code class=\"language-plaintext highlighter-rouge\">&gt;=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &gt;= 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih besar dari nilai operan kanan, atau sama, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih kecil atau sama dengan <code class=\"language-plaintext highlighter-rouge\">&lt;=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &lt;= 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih kecil dari nilai operan kanan, atau sama, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<h3 id=\"operator-penugasan-\">Operator Penugasan <a name=\"operator-penugasan\"></a></h3>\r\n<p>Operator penugasan digunakan untuk memberikan atau memodifikasi nilai ke dalam sebuah variabel.</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Contoh</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Sama dengan <code class=\"language-plaintext highlighter-rouge\">=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a = 1</code></td>\r\n      <td>Memberikan nilai di kanan ke dalam variabel yang berada di sebelah kiri.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tambah sama dengan <code class=\"language-plaintext highlighter-rouge\">+=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a += 2</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri ditambah dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Kurang sama dengan <code class=\"language-plaintext highlighter-rouge\">-=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a -= 2</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dikurangi dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Kali sama dengan <code class=\"language-plaintext highlighter-rouge\">*=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a *= 2</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dikali dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Bagi sama dengan <code class=\"language-plaintext highlighter-rouge\">/=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a /= 4</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dibagi dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Sisa bagi sama dengan <code class=\"language-plaintext highlighter-rouge\">%=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a %= 3</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dibagi dengan nilai di sebelah kanan. Yang diambil nantinya adalah sisa baginya.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pangkat sama dengan <code class=\"language-plaintext highlighter-rouge\">**=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a **= 3</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dipangkatkan dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pembagian bulat sama dengan <code class=\"language-plaintext highlighter-rouge\">//=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a //= 3</code></td>\r\n      <td>Membagi bulat operan sebelah kiri operator dengan operan sebelah kanan operator kemudian hasilnya diisikan ke operan sebelah kiri.</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<h3 id=\"prioritas-eksekusi-operator-di-python\">Prioritas Eksekusi Operator di Python</h3>\r\n<p>Dari semua operator diatas, masing-masing mempunyai urutan prioritas yang nantinya prioritas pertama akan dilakukan paling pertama, begitu seterusnya sampai dengan prioritas terakhir.</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Keterangan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">**</code></td>\r\n      <td>Aritmatika</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">~, +, -</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">*, /, %, //</code></td>\r\n      <td>Aritmatika</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">+, -</code></td>\r\n      <td>Aritmatika</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&gt;&gt;, &lt;&lt;</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&amp;</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">^, |</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&lt;=, &lt;, &gt;, &gt;=</code></td>\r\n      <td>Perbandingan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&lt;&gt; , ==, !=</code></td>\r\n      <td>Perbandingan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">=, %=, /=, //=, -=, +=, *=, **=</code></td>\r\n      <td>Penugasan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">is, is not</code></td>\r\n      <td>Identitas</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">in, not in</code></td>\r\n      <td>Membership (Keanggotaan)</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">not, or, and</code></td>\r\n      <td>Logika</td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 1, '2022-10-03 15:01:23', 1, '2023-08-03 09:19:09', 1),
(74, 'Conditional IF python', NULL, NULL, 3, 1, 8, NULL, 3, '', NULL, NULL, 1, '2022-10-03 15:04:40', 1, '2023-08-03 09:19:09', 1),
(75, 'Conditional IF python', NULL, NULL, 1, 2, 8, 74, 3, 'materi pembelajaran', NULL, '<h2>Kondisi Python</h2>\n<h3 id=\"kondisi-if\">Kondisi If</h3>\n\n<p>Pengambilan keputusan (kondisi if) digunakan untuk mengantisipasi kondisi yang terjadi saat jalanya program dan menentukan tindakan apa yang akan diambil sesuai dengan kondisi.</p>\n\n<p>Pada python ada beberapa statement/kondisi diantaranya adalah <code class=\"language-plaintext highlighter-rouge\">if</code>, <code class=\"language-plaintext highlighter-rouge\">else</code> dan <code class=\"language-plaintext highlighter-rouge\">elif</code> Kondisi <code class=\"language-plaintext highlighter-rouge\">if</code> digunakan untuk mengeksekusi kode jika kondisi bernilai benar <code class=\"language-plaintext highlighter-rouge\">True</code>.</p>\n\n<p>Jika kondisi bernilai salah <code class=\"language-plaintext highlighter-rouge\">False</code> maka statement/kondisi <code class=\"language-plaintext highlighter-rouge\">if</code> tidak akan di-eksekusi.</p>\n\n<p>Dibawah ini adalah contoh penggunaan kondisi if pada Python</p>\n\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Kondisi if adalah kondisi yang akan dieksekusi oleh program jika bernilai benar atau TRUE\n</span>\n<span class=\"n\">nilai</span> <span class=\"o\">=</span> <span class=\"mi\">9</span>\n\n<span class=\"c1\">#jika kondisi benar/TRUE maka program akan mengeksekusi perintah dibawahnya\n</span><span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">nilai</span> <span class=\"o\">&gt;</span> <span class=\"mi\">7</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sembilan Lebih Besar Dari Angka Tujuh\"</span><span class=\"p\">)</span> <span class=\"c1\"># Kondisi Benar, Dieksekusi\n</span>\n<span class=\"c1\">#jika kondisi salah/FALSE maka program tidak akan mengeksekusi perintah dibawahnya\n</span><span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">nilai</span> <span class=\"o\">&gt;</span> <span class=\"mi\">10</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sembilan Lebih Besar Dari Angka Sepuluh\"</span><span class=\"p\">)</span> <span class=\"c1\"># Kondisi Salah, Maka tidak tereksekusi</span></code></pre></figure>\n\n<p>Dari contoh diatas, jika program dijalankan maka akan mencetak string <code class=\"language-plaintext highlighter-rouge\">\"Sembilan Lebih Besar Dari Angka Tujuh\"</code> sebanyak 1 kali yaitu pada if pertama. Di if kedua statement bernilai salah, jadi perintah <code class=\"language-plaintext highlighter-rouge\">print(\"Sembilan Lebih Besar Dari Angka Sepuluh\")</code> tidak akan dieksekusi.</p>\n\n<h3 id=\"kondisi-if-else\">Kondisi If Else</h3>\n<p>Pengambilan keputusan (kondisi if else) tidak hanya digunakan untuk menentukan tindakan apa yang akan diambil sesuai dengan kondisi, tetapi juga digunakan untuk menentukan tindakan apa yang akan diambil/dijalankan jika kondisi tidak sesuai.</p>\n\n<p>Pada python ada beberapa statement/kondisi diantaranya adalah if, else dan elif Kondisi if digunakan untuk mengeksekusi kode jika kondisi bernilai benar.</p>\n\n<p>Kondisi if else adalah kondisi dimana jika pernyataan benar <code class=\"language-plaintext highlighter-rouge\">True</code> maka kode dalam if akan dieksekusi, tetapi jika bernilai salah <code class=\"language-plaintext highlighter-rouge\">False</code> maka akan mengeksekusi kode di dalam else.</p>\n\n<p>Dibawah ini adalah contoh penggunaan kondisi if else pada Python</p>\n\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Kondisi if else adalah jika kondisi bernilai TRUE maka akan dieksekusi pada if, tetapi jika bernilai FALSE maka akan dieksekusi kode pada else\n</span>\n<span class=\"n\">nilai</span> <span class=\"o\">=</span> <span class=\"mi\">3</span>\n<span class=\"c1\">#Jika pernyataan pada if bernilai TRUE maka if akan dieksekusi, tetapi jika FALSE kode pada else yang akan dieksekusi.\n</span><span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">nilai</span> <span class=\"o\">&gt;</span> <span class=\"mi\">7</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Selamat Anda Lulus\"</span><span class=\"p\">)</span>\n<span class=\"k\">else</span><span class=\"p\">:</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Maaf Anda Tidak Lulus\"</span><span class=\"p\">)</span></code></pre></figure>\n\n<p>Pada contoh diatas, jika program dijalankan maka akan mencetak string <code class=\"language-plaintext highlighter-rouge\">\"Maaf Anda Tidak Lulus\"</code> karena pernyataan pada if bernilai <code class=\"language-plaintext highlighter-rouge\">False</code></p>\n\n<h3 id=\"kondisi-elif\">Kondisi Elif</h3>\n\n<p>Pengambilan keputusan (kondisi if elif) merupakan lanjutan/percabangan logika dari “kondisi if”. Dengan elif kita bisa membuat kode program yang akan menyeleksi beberapa kemungkinan yang bisa terjadi. Hampir sama dengan kondisi “else”, bedanya kondisi “elif” bisa banyak dan tidak hanya satu.</p>\n\n<p>Dibawah ini adalah contoh penggunaan kondisi elif pada Python</p>\n\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh penggunaan kondisi elif\n</span>\n<span class=\"n\">hari_ini</span> <span class=\"o\">=</span> <span class=\"s\">\"Minggu\"</span>\n\n<span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Senin\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Selasa\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Rabu\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Kamis\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Jumat\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Sabtu\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Minggu\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan libur\"</span><span class=\"p\">)</span></code></pre></figure>\n\n<p>Pada contoh diatas, jika program dijalankan maka akan mencetak string <code class=\"language-plaintext highlighter-rouge\">\"Saya akan libur\"</code>.</p>\n', 1, '2022-10-03 15:04:40', 1, '2023-08-03 09:19:09', 1),
(76, 'Looping Python', NULL, NULL, 4, 1, 8, NULL, 4, '', NULL, NULL, 1, '2022-10-03 15:06:33', 1, '2023-08-03 09:19:09', 1),
(77, 'Looping Python', NULL, NULL, 1, 2, 8, 76, 4, 'materi pembelajaran', NULL, '<h2>Loop Python</h2>\r\n<p>Secara umum, pernyataan pada bahasa pemrograman akan dieksekusi secara berurutan. Pernyataan pertama dalam sebuah fungsi dijalankan pertama, diikuti oleh yang kedua, dan seterusnya. Tetapi akan ada situasi dimana Anda harus menulis banyak kode, dimana kode tersebut sangat banyak. Jika dilakukan secara manual maka Anda hanya akan membuang-buang tenaga dengan menulis beratus-ratus bahkan beribu-ribu kode. Untuk itu Anda perlu menggunakan pengulangan di dalam bahasa pemrograman Python.</p>\r\n\r\n<p>Di dalam bahasa pemrograman Python pengulangan dibagi menjadi 3 bagian, yaitu :</p>\r\n<ul>\r\n  <li>While Loop</li>\r\n  <li>For Loop</li>\r\n  <li>Nested Loop</li>\r\n</ul>\r\n\r\n<h3 id=\"while-loop\">While Loop</h3>\r\n<p>Pengulangan While Loop di dalam bahasa pemrograman Python dieksesusi statement berkali-kali selama kondisi bernilai benar atau <code class=\"language-plaintext highlighter-rouge\">True</code>.</p>\r\n\r\n<p>Dibawah ini adalah contoh penggunaan pengulangan While Loop.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh penggunaan While Loop\r\n#Catatan: Penentuan ruang lingkup di Python bisa menggunakan tab alih-alih menggunakan tanda kurung\r\n</span>\r\n<span class=\"n\">count</span> <span class=\"o\">=</span> <span class=\"mi\">0</span>\r\n<span class=\"k\">while</span> <span class=\"p\">(</span><span class=\"n\">count</span> <span class=\"o\">&lt;</span> <span class=\"mi\">9</span><span class=\"p\">):</span>\r\n    <span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"The count is: \"</span><span class=\"p\">,</span> <span class=\"n\">count</span><span class=\"p\">)</span>\r\n    <span class=\"n\">count</span> <span class=\"o\">=</span> <span class=\"n\">count</span> <span class=\"o\">+</span> <span class=\"mi\">1</span>\r\n\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Good bye!\"</span><span class=\"p\">)</span></code></pre></figure>\r\n\r\n<h3 id=\"for-loop\">For Loop</h3>\r\n<p>Pengulangan <code class=\"language-plaintext highlighter-rouge\">for</code> pada Python memiliki kemampuan untuk mengulangi item dari urutan apapun, seperti <code class=\"language-plaintext highlighter-rouge\">list</code> atau <code class=\"language-plaintext highlighter-rouge\">string</code>.</p>\r\n\r\n<p>Dibawah ini adalah contoh penggunaan pengulangan For Loop.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh pengulangan for sederhana\r\n</span><span class=\"n\">angka</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">,</span><span class=\"mi\">2</span><span class=\"p\">,</span><span class=\"mi\">3</span><span class=\"p\">,</span><span class=\"mi\">4</span><span class=\"p\">,</span><span class=\"mi\">5</span><span class=\"p\">]</span>\r\n<span class=\"k\">for</span> <span class=\"n\">x</span> <span class=\"ow\">in</span> <span class=\"n\">angka</span><span class=\"p\">:</span>\r\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">x</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Contoh pengulangan for\r\n</span><span class=\"n\">buah</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\"nanas\"</span><span class=\"p\">,</span> <span class=\"s\">\"apel\"</span><span class=\"p\">,</span> <span class=\"s\">\"jeruk\"</span><span class=\"p\">]</span>\r\n<span class=\"k\">for</span> <span class=\"n\">makanan</span> <span class=\"ow\">in</span> <span class=\"n\">buah</span><span class=\"p\">:</span>\r\n    <span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Saya suka makan\"</span><span class=\"p\">,</span> <span class=\"n\">makanan</span><span class=\"p\">)</span></code></pre></figure>\r\n\r\n<h3 id=\"nested-loop\">Nested Loop</h3>\r\n<p>Bahasa pemrograman Python memungkinkan penggunaan satu lingkaran di dalam loop lain. Bagian berikut menunjukkan beberapa contoh untuk menggambarkan konsep tersebut.</p>\r\n\r\n<p>Dibawah ini adalah contoh penggunaan Nested Loop.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh penggunaan Nested Loop\r\n#Catatan: Penggunaan modulo pada kondisional mengasumsikan nilai selain nol sebagai True(benar) dan nol sebagai False(salah)\r\n</span>\r\n<span class=\"n\">i</span> <span class=\"o\">=</span> <span class=\"mi\">2</span>\r\n<span class=\"k\">while</span><span class=\"p\">(</span><span class=\"n\">i</span> <span class=\"o\">&lt;</span> <span class=\"mi\">100</span><span class=\"p\">):</span>\r\n    <span class=\"n\">j</span> <span class=\"o\">=</span> <span class=\"mi\">2</span>\r\n    <span class=\"k\">while</span><span class=\"p\">(</span><span class=\"n\">j</span> <span class=\"o\">&lt;=</span> <span class=\"p\">(</span><span class=\"n\">i</span><span class=\"o\">/</span><span class=\"n\">j</span><span class=\"p\">)):</span>\r\n        <span class=\"k\">if</span> <span class=\"ow\">not</span><span class=\"p\">(</span><span class=\"n\">i</span><span class=\"o\">%</span><span class=\"n\">j</span><span class=\"p\">):</span> <span class=\"k\">break</span>\r\n        <span class=\"n\">j</span> <span class=\"o\">=</span> <span class=\"n\">j</span> <span class=\"o\">+</span> <span class=\"mi\">1</span>\r\n    <span class=\"k\">if</span> <span class=\"p\">(</span><span class=\"n\">j</span> <span class=\"o\">&gt;</span> <span class=\"n\">i</span><span class=\"o\">/</span><span class=\"n\">j</span><span class=\"p\">)</span> <span class=\"p\">:</span> <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">i</span><span class=\"p\">,</span> <span class=\"s\">\" is prime\"</span><span class=\"p\">)</span>\r\n    <span class=\"n\">i</span> <span class=\"o\">=</span> <span class=\"n\">i</span> <span class=\"o\">+</span> <span class=\"mi\">1</span>\r\n\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Good bye!\"</span><span class=\"p\">)</span></code></pre></figure>', 1, '2022-10-03 15:06:33', 1, '2023-08-03 09:19:09', 1),
(78, 'List pada Python', NULL, NULL, 5, 1, 8, NULL, 5, '', NULL, NULL, 1, '2022-10-03 15:09:37', 1, '2023-08-03 09:19:09', 1),
(79, 'List pada Python', NULL, NULL, 1, 2, 8, 78, 5, 'materi pembelajaran', NULL, '<h2>List Python</h2>\r\n<p>Dalam bahasa pemrograman Python, struktur data yang paling dasar adalah urutan atau lists. Setiap elemen-elemen berurutan akan diberi nomor posisi atau indeksnya. Indeks pertama dalam list adalah nol, indeks kedua adalah satu dan seterusnya.</p>\r\n\r\n<p>Python memiliki enam jenis urutan built-in, namun yang paling umum adalah list dan tuple. Ada beberapa hal yang dapat Anda lakukan dengan semua jenis list. Operasi ini meliputi pengindeksan, pengiris, penambahan, perbanyak, dan pengecekan keanggotaan. Selain itu, Python memiliki fungsi built-in untuk menemukan panjang list dan untuk menemukan elemen terbesar dan terkecilnya.</p>\r\n\r\n<h3 id=\"membuat-list-python\">Membuat List Python</h3>\r\n\r\n<p>List adalah tipe data yang paling serbaguna yang tersedia dalam bahasa Python, yang dapat ditulis sebagai daftar nilai yang dipisahkan koma (item) antara tanda kurung siku. Hal penting tentang daftar adalah item dalam list tidak boleh sama jenisnya.</p>\r\n\r\n<p>Membuat list sangat sederhana, tinggal memasukkan berbagai nilai yang dipisahkan koma di antara tanda kurung siku. Dibawah ini adalah contoh sederhana pembuatan list dalam bahasa Python.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh sederhana pembuatan list pada bahasa pemrograman python\r\n</span><span class=\"n\">list1</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n<span class=\"n\">list2</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">,</span> <span class=\"mi\">2</span><span class=\"p\">,</span> <span class=\"mi\">3</span><span class=\"p\">,</span> <span class=\"mi\">4</span><span class=\"p\">,</span> <span class=\"mi\">5</span> <span class=\"p\">]</span>\r\n<span class=\"n\">list3</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\"a\"</span><span class=\"p\">,</span> <span class=\"s\">\"b\"</span><span class=\"p\">,</span> <span class=\"s\">\"c\"</span><span class=\"p\">,</span> <span class=\"s\">\"d\"</span><span class=\"p\">]</span></code></pre></figure>\r\n\r\n<h3 id=\"akses-nilai-dalam-list-python\">Akses Nilai Dalam List Python</h3>\r\n\r\n<p>Untuk mengakses nilai dalam list python, gunakan tanda kurung siku untuk mengiris beserta indeks atau indeks untuk mendapatkan nilai yang tersedia pada indeks tersebut.</p>\r\n\r\n<p>Berikut adalah contoh cara mengakses nilai di dalam list python :</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Cara mengakses nilai di dalam list Python\r\n</span>\r\n<span class=\"n\">list1</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n<span class=\"n\">list2</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">,</span> <span class=\"mi\">2</span><span class=\"p\">,</span> <span class=\"mi\">3</span><span class=\"p\">,</span> <span class=\"mi\">4</span><span class=\"p\">,</span> <span class=\"mi\">5</span><span class=\"p\">,</span> <span class=\"mi\">6</span><span class=\"p\">,</span> <span class=\"mi\">7</span> <span class=\"p\">]</span>\r\n\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"list1[0]: \"</span><span class=\"p\">,</span> <span class=\"n\">list1</span><span class=\"p\">[</span><span class=\"mi\">0</span><span class=\"p\">])</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"list2[1:5]: \"</span><span class=\"p\">,</span> <span class=\"n\">list2</span><span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">:</span><span class=\"mi\">5</span><span class=\"p\">])</span></code></pre></figure>\r\n\r\n<p>Setelah Anda mengeksekusi kode diatas, hasilnya akan seperti dibawah ini :</p>\r\n\r\n<p><code class=\"language-plaintext highlighter-rouge\">list1[0]: fisika</code>\r\n<code class=\"language-plaintext highlighter-rouge\">list2[1:5]: [2, 3, 4, 5]</code></p>\r\n\r\n<h3 id=\"update-nilai-dalam-list-python\">Update Nilai Dalam List Python</h3>\r\n\r\n<p>Anda dapat memperbarui satu atau beberapa nilai di dalam list dengan memberikan potongan di sisi kiri operator penugasan, dan Anda dapat menambahkan nilai ke dalam list dengan metode append (). Sebagai contoh :</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"nb\">list</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Nilai ada pada index 2 : \"</span><span class=\"p\">,</span> <span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">])</span>\r\n\r\n<span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"mi\">2001</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Nilai baru ada pada index 2 : \"</span><span class=\"p\">,</span> <span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">])</span></code></pre></figure>\r\n\r\n<h3 id=\"hapus-nilai-dalam-list-python\">Hapus Nilai Dalam List Python</h3>\r\n\r\n<p>Untuk menghapus nilai di dalam list python, Anda dapat menggunakan salah satu pernyataan del jika Anda tahu persis elemen yang Anda hapus. Anda dapat menggunakan metode remove() jika Anda tidak tahu persis item mana yang akan dihapus. Sebagai contoh :</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh cara menghapus nilai pada list python\r\n</span>\r\n<span class=\"nb\">list</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"nb\">list</span><span class=\"p\">)</span>\r\n<span class=\"k\">del</span> <span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">]</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Setelah dihapus nilai pada index 2 : \"</span><span class=\"p\">,</span> <span class=\"nb\">list</span><span class=\"p\">)</span></code></pre></figure>\r\n\r\n<h3 id=\"operasi-dasar-pada-list-python\">Operasi Dasar Pada List Python</h3>\r\n\r\n<p>List Python merespons operator + dan * seperti string; Itu artinya penggabungan dan pengulangan di sini juga berlaku, kecuali hasilnya adalah list baru, bukan sebuah String.</p>\r\n\r\n<p>Sebenarnya, list merespons semua operasi urutan umum yang kami gunakan pada String di bab sebelumnya. Dibawah ini adalah tabel daftar operasi dasar pada list python.</p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Expression</th>\r\n      <th>Hasil</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">len([1, 2, 3, 4])</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">4</code></td>\r\n      <td>Length</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[1, 2, 3] + [4, 5, 6]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[1, 2, 3, 4, 5, 6]</code></td>\r\n      <td>Concatenation</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'Halo!\'] * 4</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'Halo!\', \'Halo!\', \'Halo!\', \'Halo!\']</code></td>\r\n      <td>Repetition</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 in [1, 2, 3]</code></td>\r\n      <td>`	True`</td>\r\n      <td>Membership</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">for x in [1,2,3] : print (x,end = \' \')</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 2 3</code></td>\r\n      <td>Iteration</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<h3 id=\"indexing-slicing-dan-matrix-pada-list-python\">Indexing, Slicing dan Matrix Pada List Python</h3>\r\n\r\n<p>Karena list adalah urutan, pengindeksan dan pengiris bekerja dengan cara yang sama untuk list seperti yang mereka lakukan untuk String.</p>\r\n\r\n<p>Dengan asumsi input berikut :</p>\r\n\r\n<p><code class=\"language-plaintext highlighter-rouge\">L = [\'C++\'\', \'Java\', \'Python\']</code></p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Expression</th>\r\n      <th>Hasil</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">L[2]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">\'Python\'</code></td>\r\n      <td>Offset mulai dari nol</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">L[-2]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">\'Java\'</code></td>\r\n      <td>Negatif: hitung dari kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[1:]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'Java\', \'Python\']</code></td>\r\n      <td>Slicing mengambil bagian</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<h3 id=\"method-dan-fungsi-build-in-pada-list-python\">Method dan Fungsi Build-in Pada List Python</h3>\r\n\r\n<p>Python menyertakan fungsi built-in sebagai berikut :</p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Function</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>cmp(list1, list2)	#</td>\r\n      <td>Tidak lagi tersedia dengan Python 3</td>\r\n    </tr>\r\n    <tr>\r\n      <td>len(list)</td>\r\n      <td>Memberikan total panjang list.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>max(list)</td>\r\n      <td>Mengembalikan item dari list dengan nilai maks.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>min(list)</td>\r\n      <td>Mengembalikan item dari list dengan nilai min.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list(seq)</td>\r\n      <td>Mengubah tuple menjadi list.</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<p>Python menyertakan methods built-in sebagai berikut</p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Methods</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>list.append(obj)</td>\r\n      <td>Menambahkan objek obj ke list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.count(obj)</td>\r\n      <td>Jumlah pengembalian berapa kali obj terjadi dalam list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.extend(seq)</td>\r\n      <td>Tambahkan isi seq ke list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.index(obj)</td>\r\n      <td>Mengembalikan indeks terendah dalam list yang muncul obj</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.insert(index, obj)</td>\r\n      <td>Sisipkan objek obj ke dalam list di indeks offset</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.pop(obj = list[-1])</td>\r\n      <td>Menghapus dan mengembalikan objek atau obj terakhir dari list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.remove(obj)</td>\r\n      <td>Removes object obj from list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.reverse()</td>\r\n      <td>Membalik list objek di tempat</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.sort([func])</td>\r\n      <td>Urutkan objek list, gunakan compare func jika diberikan</td>\r\n    </tr>\r\n  </tbody>\r\n</table>', 1, '2022-10-03 15:09:37', 1, '2023-08-03 09:19:09', 1),
(80, 'Fungsi pada Python', NULL, NULL, 6, 1, 8, NULL, 6, '', NULL, NULL, 1, '2022-10-03 15:20:58', 1, '2023-08-03 09:19:09', 1);
INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(81, 'Fungsi pada Python', NULL, NULL, 1, 2, 8, 80, 6, 'materi pembelajaran', NULL, '<h2>Cara Membuat Fungsi pada Python</h2>\r\n<p>Fungsi pada Python, dibuat dengan kata kunci <code>def</code> kemudian diikuti dengan\r\nnama fungsinya.</p>\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">nama_fungsi</span>():\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Hello ini Fungsi\"</span></span></span></code></pre></div></div></div>\r\n<p>Sama seperti blok kode yang lain, kita juga harus memberikan\r\nidentasi (tab atau spasi 2x) untuk menuliskan isi fungsi.</p>\r\n<p>Setelah kita buat fungsinya, lalu apa?</p>\r\n<p>Setelah kita buat, kita bisa memanggilnya seperti ini:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span>nama_fungsi()</span></span></code></pre></div></div></div>\r\n<p>Sebagai contoh, coba tulis kode program berikut:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># Membuat Fungsi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">salam</span>():\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Hello, Selamat Pagi\"</span>\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\">## Pemanggilan Fungsi</span>\r\n</span></span><span style=\"display:flex\"><span>salam()</span></span></code></pre></div></div></div>\r\n<p>Hasilnya:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span>Hello, Selamat Pagi</span></span></code></pre></div></div></div>\r\n\r\n<h2>Fungsi dengan Parameter</h2>\r\n<p>Sekarang, bagaimana kalau kita ingin memberikan input nilai ke dalam fungsi?</p>\r\n<p>Kita bisa manfaatkan parameter.</p>\r\n<p>Apa itu parameter?</p>\r\n<p>Parameter adalah variabel yang menampung nilai untuk diproses di dalam fungsi.</p>\r\n\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">salam</span>(ucapan):\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span>(ucapan)</span></span></code></pre></div></div></div>\r\n<p>Pada contoh diatas, kita membuat fungsi dengan parameter <code>ucapan</code>.</p>\r\n<p>Lalu bagaimana cara memanggilnya?</p>\r\n<p>Cara pemanggilan fungsi yang memiliki parameter adalah seperti ini:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span>salam(<span style=\"color:#f1fa8c\">\"Selamat siang\"</span>)</span></span></code></pre></div></div></div>\r\n<p><code>\"Selamat siang\"</code> adalah nilai parameter yang kita berikan.</p>\r\n<p>Lalu bagaimana kalau parameternya lebih dari satu?</p>\r\n<p>Kita bisa menggunakan tanda koma (<code>,</code>) untuk memisahnya.</p>\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># Membuat fungsi dengan parameter</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">luas_segitiga</span>(alas, tinggi):\r\n</span></span><span style=\"display:flex\"><span>    luas <span style=\"color:#ff79c6\">=</span> (alas <span style=\"color:#ff79c6\">*</span> tinggi) <span style=\"color:#ff79c6\">/</span> <span style=\"color:#bd93f9\">2</span>\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Luas segitiga: </span><span style=\"color:#f1fa8c\">%f</span><span style=\"color:#f1fa8c\">\"</span> <span style=\"color:#ff79c6\">%</span> luas;\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># Pemanggilan fungsi</span>\r\n</span></span><span style=\"display:flex\"><span>luas_segitiga(<span style=\"color:#bd93f9\">4</span>, <span style=\"color:#bd93f9\">6</span>)</span></span></code></pre></div></div></div>\r\n<p>Hasilnya:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-bash\" data-lang=\"bash\"><span style=\"display:flex\"><span>Luas segitiga: 12.000000</span></span></code></pre></div></div></div>\r\n<h2>Fungsi yang Mengembalikan Nilai</h2>\r\n<p>Fungsi yang tidak mengembalikan nilai biasanya disebut dengan prosedur.</p>\r\n<p>Namun, kadang kita butuh hasil proses dari fungsi untuk\r\ndigunakan pada proses berikutnya.</p>\r\n<p>Maka fungsi harus mengembalikan nilai dari hasil pemrosesannya.</p>\r\n<p>Cara mengembalikan nilai adalah menggunkan kata kunci <code>return</code>\r\nlalu diikuti dengan nilai atau variabel yang akan dikembalikan.</p>\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">luas_persegi</span>(sisi):\r\n</span></span><span style=\"display:flex\"><span>    luas <span style=\"color:#ff79c6\">=</span> sisi <span style=\"color:#ff79c6\">*</span> sisi\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#ff79c6\">return</span> luas\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># pemanggilan fungsi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Luas persegi: </span><span style=\"color:#f1fa8c\">%d</span><span style=\"color:#f1fa8c\">\"</span> <span style=\"color:#ff79c6\">%</span> luas_persegi(<span style=\"color:#bd93f9\">6</span>)</span></span></code></pre></div></div></div>\r\n<p>Hasilnya:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-bash\" data-lang=\"bash\"><span style=\"display:flex\"><span>Luas persegi: <span style=\"color:#bd93f9\">36</span></span></span></code></pre></div></div></div>\r\n<p>Apa bedanya dengan fungsi <code>luas_segitiga()</code> yang tadi?</p>\r\n<p>Pada fungsi <code>luas_segitiga()</code> kita melakukan <code>print</code> dari\r\nhasil pemrosesan secara langsung di dalam fungsinya.</p>\r\n<p>Sedangkan fungsi <code>luas_persegi()</code>, kita melakukan <code>print</code> pada saat pemanggilannya.</p>\r\n<p>Jadi, fungsi <code>luas_persegi()</code> akan bernilai sesuai dengan hasil yang\r\ndikembalikan.</p>\r\n<p>Sehingga kita dapat memanfaatkannya untuk pemerosesan berikutnya.</p>\r\n<p>Misalnya seperti ini:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># rumus: sisi x sisi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">luas_persegi</span>(sisi):\r\n</span></span><span style=\"display:flex\"><span>    luas <span style=\"color:#ff79c6\">=</span> sisi <span style=\"color:#ff79c6\">*</span> sisi\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#ff79c6\">return</span> luas\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># rumus: sisi x sisi x sisi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">volume_persegi</span>(sisi):\r\n</span></span><span style=\"display:flex\"><span>    volume <span style=\"color:#ff79c6\">=</span> luas_persegi(sisi) <span style=\"color:#ff79c6\">*</span> sisi</span></span></code></pre></div></div></div>\r\n<p>Pada contoh di atas, kita melakukan pemanggilan fungsi\r\n<code>luas_persegi()</code> untuk menghitung volume persegi.</p>', 1, '2022-10-03 15:20:58', 1, '2023-08-03 09:19:09', 1),
(82, 'Communication', NULL, NULL, 1, 1, 9, NULL, 1, NULL, NULL, '<ul><li>&nbsp;- Theory basic of communication related with Sosmed Platform </li><li>&nbsp;- Basic Visual Communication </li><li>&nbsp;- Basic Typography </li><li>&nbsp;- Writing Fundamental </li><li>&nbsp;- Advanced Visual Communication </li><li>&nbsp;- Creative Writing ( copy writing for Commercial use ) </li></ul>', 0, '2023-02-24 12:17:59', 0, '2023-08-25 16:01:14', 0),
(83, 'Digital Media', NULL, NULL, 2, 1, 0, NULL, NULL, NULL, NULL, '<ul><li>&nbsp;- Content Production Basic </li><li>&nbsp;- Create Content Video </li><li>&nbsp;- Create Content Photograph </li><li>&nbsp;- Create Audio Visual combine with Video and Photograph </li><li>&nbsp;- Ethic and Behaviour of Content </li></ul>\n', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:47:26', 0),
(84, 'Streaming', NULL, NULL, 3, 1, 0, NULL, NULL, NULL, NULL, '<ul><li>&nbsp;- Advance Content Production </li><li>&nbsp;- Digital Video and Live Streaming </li><li>&nbsp;- Report and Interview Techinique </li><li>&nbsp;- Motion Graphis </li></ul>', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:47:26', 0),
(85, 'Business Through Digital', NULL, NULL, 4, 1, 0, NULL, NULL, NULL, NULL, '<ul><li>&nbsp;- Tik Tok Platform Trending </li><li>&nbsp;- Instagram Platform Trending </li><li>&nbsp;- You tube Platfrom Trending </li><li>&nbsp;- How to make business and trending digital platform (IMPLEMENTATION for some period) </li></ul>\n', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:47:26', 0),
(86, 'Paid Channel Deep Dive', NULL, NULL, 1, 1, 14, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-11 09:48:02', 0, '2023-09-08 14:47:26', 0),
(87, 'Social Media Fundamentals', NULL, NULL, 2, 1, 14, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-11 09:48:02', 0, '2023-09-08 14:47:26', 0),
(88, 'Social Media Deep Dive', NULL, NULL, 3, 1, 14, NULL, NULL, NULL, NULL, '<div>(a) Meta</div>\n <div>(b) TikTok</div>', 0, '2023-05-11 09:48:02', 0, '2023-09-08 14:47:26', 0),
(89, 'Google Ads Fundamental', NULL, NULL, 4, 1, 14, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-11 09:48:03', 0, '2023-09-08 14:47:26', 0),
(90, 'Paid Channel Deep Dive', NULL, NULL, 1, 1, 14, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-11 09:48:03', 0, '2023-09-08 14:47:26', 0),
(91, 'Social Media Fundamentals', NULL, NULL, 2, 1, 14, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-11 09:48:03', 0, '2023-09-08 14:47:26', 0),
(92, 'Social Media Deep Dive', NULL, NULL, 3, 1, 14, NULL, NULL, NULL, NULL, '<div>(a) Meta</div>\n <div>(b) TikTok</div>', 0, '2023-05-11 09:48:03', 0, '2023-09-08 14:47:26', 0),
(93, 'Google Ads Fundamental', NULL, NULL, 4, 1, 14, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-11 09:48:03', 0, '2023-09-08 14:47:26', 0),
(94, 'Database Overview and Clean Database Making Using PHPMyAdmin', NULL, NULL, 1, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Mampu melakukan operasi dasar penarikan, penyimpanan, pengubahan,\ndan penghapusan data pada database</div><div>(b) Memahami bukan saja konsep,\ntetapi kapan harus menggunakan operasi-operasi yang ada dalam\nmanipulasi database</div><div>(c) Mampu merancang database sesuai kebutuhan\nsecara cepat dan mengetahui bagaimana best practices membangun database secara utuh dan berkelanjutan</div><div>(d) Mampu membuat\ndokumentasi seperti Data Dictionary secara cepat</div>', 1, '2023-05-29 09:40:56', 1, '2023-09-08 14:47:26', 1),
(95, 'Rapid Application Development using Laravel on Master Data', NULL, NULL, 2, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Memahami bagaimana struktur programming menggunakan framework\nMVC (Model - View - Controller)</div><div>(b) Memahami best practices dalam\nmenggunakan Framework Laravel sehingga dapat menerapkan Rapid\nApplication Development (RAD) menggunakan Framework Laravel untuk\npembuatan backend</div><div>(c) Mampu mengintegrasikan Template / Theme\nBackend yang berupa HTML CSS ke dalam Framework Laravel</div><div>(d)\nMemahami best practices dan mampu membuat Authentication, User\nManagement, dan Permission Management di Laravel</div><div>(e) Memahami best\npractices dalam pembuatan CRUD Management untuk Master Data dan\nbagaimana membuatnya secara cepat.</div>', 1, '2023-05-29 09:57:37', 1, '2023-09-08 14:47:26', 1),
(96, 'Rapid Application Development using Laravel on Transaction Data', NULL, NULL, 3, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Memahami best practices dalam pembuatan CRUD Management untuk\nTransaction Data (Master-Detail Type) dan bagaimana membuatnya\nsecara cepat</div><div>(b) Mampu membuat validasi multi data dan rollback\ntransaction data ketika terjadi error di tengah memasukkan transaction\ndata</div><div>(c) Mampu membuat Read (View) data yang dapat dicetak dengan baik\npada printer (tanpa Header, Navbar/Sidebar, dan Footer)</div>', 1, '2023-05-29 09:57:37', 1, '2023-09-08 14:47:26', 1),
(97, 'Bootstrap 4 and SemanticUI', NULL, NULL, 4, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Memahami prinsip dasar penggunaan Bootstrap 4 dan SemanticUI 2</div><div>(b)\nMampu menggunakan komponen pada Bootstrap 4 dan SemanticUI 2 yang dapat digunakan untuk mempercepat proses beautification tampilan\nBackend</div>', 1, '2023-05-29 09:57:37', 1, '2023-09-08 14:47:26', 1),
(98, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, 5, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Mampu menggunakan JQuery dalam melakukan manipulasi DOM dan\nAJAX</div><div>(b) Mampu menggunakan widget yang sering berhubungan dengan\nBackend seperti Autocomplete, Datepicker, Spinner, dan Tooltip</div><div>(c) Mampu\nmenggunakan LeafletJS untuk solusi geolocation</div>', 1, '2023-05-29 09:57:37', 1, '2023-09-08 14:47:26', 1),
(99, 'Implement DataTable on Backend\r\n', NULL, NULL, 6, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Mampu menggunakan DataTables client dan server side</div><div>(b) Mampu\nmenggunakan extensions yang sering digunakan bersama dengan\nDataTables untuk Backend seperti Buttons, ColReorder, Scroller,\nSearchBuilder, ColVis, dsb.</div>', 1, '2023-05-29 09:57:37', 1, '2023-09-08 14:47:26', 1),
(100, 'Impelement ChartJS on Backend', NULL, NULL, 7, 1, 15, NULL, NULL, NULL, NULL, '<div>(b) Mampu menggunakan ChartJS untuk dashboard dan reporting</div><div>(b) Mampu menggunakan beberapa API yang penting dalam melakukan manipulasi ChartJS</div>', 1, '2023-05-29 09:57:37', 1, '2023-09-08 14:47:26', 1),
(101, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, 8, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Mampu membuat Facebook dan Google Auth - Mampu menggunakan Re-Captcha</div><div>(b) Memahami basic SEO dan bagaimana menerapkan dalam pembuatan struktur database dan setting Backend.</div>', 1, '2023-05-29 10:05:33', 1, '2023-09-08 14:47:26', 1),
(102, 'Implement PHPSpreadsheet', NULL, NULL, 9, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Mampu membuat otomasi pembacaan dokumen CSV, XLS, XLSX dengan menggunakan PHPSpreadsheet</div><div>(b) Mampu membuat XLS dan XLSX dengan menggunakan PHPSpreadsheet</div><div>(c) Mampu membuat graph dan formula di dalam XLS dan XLSX secara programatically</div>', 1, '2023-05-29 10:05:33', 1, '2023-09-08 14:47:26', 1),
(103, 'Working on Report', NULL, NULL, 10, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Memahami best practices dalam pembuatan report</div><div>(b) Mampu membuat executive summary dalam reporting</div><div>(c) Mampu membuat pivot table untuk\nanalisis</div>', 1, '2023-05-29 10:05:33', 1, '2023-09-08 14:47:26', 1),
(104, 'Web Services using Lumen\r\n', NULL, NULL, 11, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Mampu membuat REST API menggunakan Micro-Framework Lumen</div><div>(b) Mampu membuat OAuth, Authorization, dan best practices validasi dalam Lumen - Mampu membuat pengiriman mail di Backend</div>', 1, '2023-05-29 10:05:33', 1, '2023-09-08 14:47:26', 1),
(105, 'Backend for CMS', NULL, NULL, 12, 1, 15, NULL, NULL, NULL, NULL, '<div>(a) Memahami prinsip dasar dan cepat pembuatan CMS untuk dynamic\nwebsite</div><div>(b) Mampu membuat survey menggunakan survey.jS</div>', 1, '2023-05-29 10:05:33', 1, '2023-09-08 14:47:26', 1),
(111, 'Transaction data and validation data with database', NULL, NULL, 1, 2, 1, 3, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(112, 'Try-catch transaction and try-catch database', NULL, NULL, 2, 2, 1, 3, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(113, 'Rollback and Commit Process', NULL, NULL, 3, 2, 1, 3, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(114, 'Printable View (read) creation', NULL, NULL, 4, 2, 1, 3, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(115, 'Basic principles of Bootstrap 4 and SemanticUI 2', NULL, NULL, 1, 2, 1, 4, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:05:45', 1, '2023-09-08 14:40:11', 1),
(116, 'Able to use components on Bootstrap 4 and SemanticUI 2', NULL, NULL, 2, 2, 1, 4, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:05:45', 1, '2023-09-08 14:40:11', 1),
(117, 'Manipulating the DOM and AJAX', NULL, NULL, 1, 2, 1, 5, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:55:46', 1, '2023-09-08 14:40:11', 1),
(118, 'Able to use widgets on JQuery', NULL, NULL, 2, 2, 1, 5, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:55:46', 1, '2023-09-08 14:40:11', 1),
(119, 'Be able to use LeafletJS for geolocation features', NULL, NULL, 3, 2, 1, 5, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:55:46', 1, '2023-09-08 14:40:11', 1),
(120, 'Able to use DataTables client and server side', NULL, NULL, 1, 2, 1, 6, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:59:34', 1, '2023-09-08 14:40:11', 1),
(121, 'Extensions to DataTables like ColVis, ColReorder, SearchBuilder, etc', NULL, NULL, 2, 2, 1, 6, NULL, NULL, NULL, NULL, 1, '2023-06-30 10:59:34', 1, '2023-09-08 14:40:11', 1),
(122, 'ChartJS for Dashboards and Reporting', NULL, NULL, 1, 2, 1, 7, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:02:52', 1, '2023-09-08 14:40:11', 1),
(123, 'Important APIs in ChartJS for manipulation', NULL, NULL, 2, 2, 1, 7, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:02:52', 1, '2023-09-08 14:40:11', 1),
(124, 'Facebook and Google Authentication', NULL, NULL, 1, 2, 1, 130, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:05:46', 1, '2023-09-08 14:40:11', 1),
(125, 'Able to use the Re-Captcha feature', NULL, NULL, 2, 2, 1, 130, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:05:46', 1, '2023-09-08 14:40:11', 1),
(126, 'Implement SEO in backend and database structure', NULL, NULL, 3, 2, 1, 130, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:05:46', 1, '2023-09-08 14:40:11', 1),
(127, 'Document reading automation for CSV, XLS, XLSX', NULL, NULL, 1, 2, 1, 131, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:12:50', 1, '2023-09-08 14:40:11', 1),
(128, 'Make XLS and XLSX using PHPSpreadsheet', NULL, NULL, 2, 2, 1, 131, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:12:50', 1, '2023-09-08 14:40:11', 1),
(129, 'Create graphs and formulas inside XLS and XLSX', NULL, NULL, 3, 2, 1, 131, NULL, NULL, NULL, NULL, 1, '2023-06-30 11:12:50', 1, '2023-09-08 14:40:11', 1),
(130, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, 8, 1, 1, NULL, NULL, NULL, NULL, 'Mampu membuat Facebook dan Google Auth - Mampu menggunakan Re-Captcha - Memahami basic SEO dan bagaimana menerapkan dalam\r\npembuatan struktur database dan setting Backend', 1, '2023-06-30 13:46:30', 1, '2023-09-08 14:47:26', 1),
(131, 'Implement PHPSpreadsheet', NULL, NULL, 9, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:46:30', 1, '2023-09-08 14:47:26', 1),
(132, 'Working on Report', NULL, NULL, 10, 1, 1, NULL, NULL, NULL, NULL, 'Memahami best practices dalam pembuatan report - Mampu membuat executive summary dalam reporting - Mampu membuat pivot table untuk analisis', 1, '2023-06-30 13:48:20', 1, '2023-09-08 14:47:26', 1),
(133, 'Web Services using Lumen', NULL, NULL, 11, 1, 1, NULL, NULL, NULL, NULL, 'Mampu membuat REST API menggunakan Micro-Framework Lumen - Mampu membuat OAuth, Authorization, dan best practices validasi dalam Lumen - Mampu membuat pengiriman mail di Backend', 1, '2023-06-30 13:48:20', 1, '2023-09-08 14:47:26', 1),
(134, 'Backend for CMS', NULL, NULL, 12, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:48:20', 1, '2023-09-08 14:47:26', 1),
(135, 'Best practices for reporting', NULL, NULL, 1, 2, 1, 132, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:53:56', 1, '2023-09-08 14:40:11', 1),
(136, 'Executive summary for reporting', NULL, NULL, 2, 2, 1, 132, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:53:56', 1, '2023-09-08 14:40:11', 1),
(137, 'Pivot table for analysis', NULL, NULL, 3, 2, 1, 132, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:53:56', 1, '2023-09-08 14:40:11', 1),
(138, 'REST API using Lumen Micro-Framework', NULL, NULL, 1, 2, 1, 133, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:56:51', 1, '2023-09-08 14:40:11', 1),
(139, 'Establish OAuth, authorization, and validation best practices', NULL, NULL, 2, 2, 1, 133, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:56:51', 1, '2023-09-08 14:40:11', 1),
(140, 'Mail', NULL, NULL, 3, 2, 1, 133, NULL, NULL, NULL, NULL, 1, '2023-06-30 13:56:51', 1, '2023-09-08 14:40:11', 1),
(141, 'Concept of CMS and dynamic website', NULL, NULL, 1, 2, 1, 134, NULL, NULL, NULL, NULL, 1, '2023-06-30 14:11:02', 1, '2023-09-08 14:40:11', 1),
(142, 'Create a survey with SurveyJs', NULL, NULL, 2, 2, 1, 134, NULL, NULL, NULL, NULL, 1, '2023-06-30 14:11:02', 1, '2023-09-08 14:40:11', 1),
(144, 'Framework7 Convert to Android', NULL, NULL, 9, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan Framework7 untuk mobile apps', 1, '2023-06-30 07:58:38', 1, '2023-09-08 14:47:26', 1),
(145, 'Using ChartJS', NULL, NULL, 10, 1, 2, NULL, NULL, NULL, NULL, 'Menggunakan ChartJS', 1, '2023-06-30 07:58:57', 1, '2023-09-08 14:47:26', 1),
(146, 'JQuery Popular Frontend Libraries', NULL, NULL, 11, 1, 2, NULL, NULL, NULL, NULL, 'Mengintegrasikan Popular Libraries ke dalam project', 1, '2023-06-30 07:59:41', 1, '2023-09-08 14:47:26', 1),
(147, 'Tracking Your Websites', NULL, NULL, 12, 1, 2, NULL, NULL, NULL, NULL, 'Mengintegrasikan Analytics and Report Tools - Mengetahui kekurangan halaman web yang dibuat', 1, '2023-06-30 08:00:11', 1, '2023-09-08 14:47:26', 1),
(148, 'Able to create standard HTML5 Pages, tags, elements, basic sections', NULL, NULL, 1, 2, 2, 8, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:04:34', 1, '2023-09-08 14:40:11', 1),
(149, 'Layouts in Bootstrap 4', NULL, NULL, 2, 2, 2, 8, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:05:16', 1, '2023-09-08 14:40:11', 1),
(150, 'Bootstrap 4 Templates for Backend', NULL, NULL, 1, 2, 2, 9, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:06:39', 1, '2023-09-08 14:40:11', 1),
(151, 'Bootstrap 4\'s Components related to JavaScript', NULL, NULL, 2, 2, 2, 9, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:23:23', 1, '2023-09-08 14:40:11', 1),
(152, 'JavaScript and JQuery to manipulate objects', NULL, NULL, 1, 2, 2, 10, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:24:26', 1, '2023-09-08 14:40:11', 1),
(153, 'Async Function', NULL, NULL, 2, 2, 2, 10, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:24:46', 1, '2023-09-08 14:40:11', 1),
(154, 'SemanticUI into the project', NULL, NULL, 1, 2, 2, 11, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:26:47', 1, '2023-09-08 14:40:11', 1),
(155, 'SemanticUI Layout', NULL, NULL, 2, 2, 2, 11, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:27:07', 1, '2023-09-08 14:40:11', 1),
(156, 'SemanticUI Element as a complement to Bootstrap 4 Component', NULL, NULL, 3, 2, 2, 11, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:27:37', 1, '2023-09-08 14:40:11', 1),
(157, 'AJAX Web Services', NULL, NULL, 1, 2, 2, 12, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:28:08', 1, '2023-09-08 14:40:11', 1),
(158, 'Framework7 for Progressive Web Apps', NULL, NULL, 1, 2, 2, 13, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:28:33', 1, '2023-09-08 14:40:11', 1),
(159, 'Framework7 for Authentication', NULL, NULL, 1, 2, 2, 14, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:29:09', 1, '2023-09-08 14:40:11', 1),
(160, 'Framework7 for Data Storing', NULL, NULL, 2, 2, 2, 14, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:29:26', 1, '2023-09-08 14:40:11', 1),
(161, 'Framework7 for Request Access mobile devices', NULL, NULL, 1, 2, 2, 15, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:29:50', 1, '2023-09-08 14:40:11', 1),
(162, 'Framework7 for mobile apps via Cordova', NULL, NULL, 1, 2, 2, 144, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:30:40', 1, '2023-09-08 14:40:11', 1),
(163, 'Line/Bar Charts & Pie Charts', NULL, NULL, 1, 2, 2, 145, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:31:42', 1, '2023-09-08 14:40:11', 1),
(164, 'Using Parallax', NULL, NULL, 1, 2, 2, 146, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:32:15', 1, '2023-09-08 14:40:11', 1),
(165, 'Using Social Share', NULL, NULL, 2, 2, 2, 146, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:32:37', 1, '2023-09-08 14:40:11', 1),
(166, 'Using LeafletJS', NULL, NULL, 3, 2, 2, 146, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:32:54', 1, '2023-09-08 14:40:11', 1),
(167, 'Tawk.to third party', NULL, NULL, 4, 2, 2, 146, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:33:22', 1, '2023-09-08 14:40:11', 1),
(168, 'Analytics and Report Tools', NULL, NULL, 1, 2, 2, 147, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:42:49', 1, '2023-09-08 14:40:11', 1),
(169, 'Reporting using Facebook Pixel', NULL, NULL, 2, 2, 2, 147, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:43:21', 1, '2023-09-08 14:40:11', 1),
(170, 'Evaluate website quality using Web.Dev and Google Lighthouse', NULL, NULL, 3, 2, 2, 147, NULL, NULL, NULL, NULL, 1, '2023-06-30 08:44:09', 1, '2023-09-08 14:40:11', 1),
(171, 'How to use and mastering basic features in Figma', NULL, NULL, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:28:49', 1, '2023-09-08 14:47:26', 1),
(172, 'Mampu menguasai software figma', NULL, NULL, 1, 2, 3, 171, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:34:15', 1, '2023-09-08 14:40:11', 1),
(173, 'Mampu membuat dan men-design CV Portfolio', NULL, NULL, 2, 2, 3, 171, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:34:39', 1, '2023-09-08 14:40:11', 1),
(174, 'Analyzing UI/UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, 2, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:36:06', 1, '2023-09-08 14:47:26', 1),
(175, 'Mampu menganalisa fitur-fitur UI/ UX pada brand-brand di dalam industri yang sama', NULL, NULL, 1, 2, 3, 174, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:37:53', 1, '2023-09-08 14:40:11', 1),
(176, 'Mampu menggunakan plugin untuk membantu dalam rapid design', NULL, NULL, 2, 2, 3, 174, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:38:34', 1, '2023-09-08 14:40:11', 1),
(177, 'Wireframe 101', NULL, NULL, 3, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:39:00', 1, '2023-09-08 14:47:26', 1),
(178, 'Mampu memahami anatomi website backend dan frontend', NULL, NULL, 1, 2, 3, 177, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:39:56', 1, '2023-09-08 14:40:11', 1),
(179, 'Mampu membuat wireframe sebuah website maupun aplikasi', NULL, NULL, 2, 2, 3, 177, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:40:11', 1, '2023-09-08 14:40:11', 1),
(180, 'Putting on Top of Wireframe', NULL, NULL, 4, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:40:27', 1, '2023-09-08 14:47:26', 1),
(181, 'Mampu men-design dari wireframe yang telah dibuat', NULL, NULL, 1, 2, 3, 180, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:40:48', 1, '2023-09-08 14:40:11', 1),
(182, 'Wireframe for Landing Page', NULL, NULL, 5, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:41:00', 1, '2023-09-08 14:47:26', 1),
(183, 'Mampu membuat wireframe untuk sebuah Landing Page suatu website', NULL, NULL, 1, 2, 3, 182, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:41:25', 1, '2023-09-08 14:40:11', 1),
(184, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, 2, 2, 3, 182, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:41:46', 1, '2023-09-08 14:40:11', 1),
(185, 'Wireframe for News Portal (Mobile)', NULL, NULL, 6, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:42:16', 1, '2023-09-08 14:47:26', 1),
(186, 'Mampu membuat wireframe untuk sebuah aplikasi mobile News Portal', NULL, NULL, 1, 2, 3, 185, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:42:34', 1, '2023-09-08 14:40:11', 1),
(187, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, 2, 2, 3, 185, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:02', 1, '2023-09-08 14:40:11', 1),
(188, 'Wireframe for Marketplace (Mobile)', NULL, NULL, 7, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:17', 1, '2023-09-08 14:47:26', 1),
(189, 'Mampu membuat wireframe untuk sebuah aplikasi mobile Marketplace', NULL, NULL, 1, 2, 3, 188, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:39', 1, '2023-09-08 14:40:11', 1),
(190, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, 2, 2, 3, 188, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:55', 1, '2023-09-08 14:40:11', 1),
(191, 'Backend UI/ UX Design', NULL, NULL, 8, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:44:08', 1, '2023-09-08 14:47:26', 1),
(192, 'Mampu men-design website backend', NULL, NULL, 1, 2, 3, 191, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:44:25', 1, '2023-09-08 14:40:11', 1),
(193, 'Mampu menentukan menu beserta konten', NULL, NULL, 2, 2, 3, 191, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:44:42', 1, '2023-09-08 14:40:11', 1),
(194, 'Wireframe for Marketplace Payment Details', NULL, NULL, 9, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:45:37', 1, '2023-09-08 14:47:26', 1),
(195, 'Mampu membuat wireframe untuk sebuah alur aplikasi mobile Marketplace pada bagian Payment Details', NULL, NULL, 1, 2, 3, 194, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:45:57', 1, '2023-09-08 14:40:11', 1),
(196, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, 2, 2, 3, 194, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:46:12', 1, '2023-09-08 14:40:11', 1),
(197, 'Prototype + Animation in Figma', NULL, NULL, 10, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:46:30', 1, '2023-09-08 14:47:26', 1),
(198, 'Mampu membuat prototype dari UI Design sehingga menjadi UI/ UX Design', NULL, NULL, 1, 2, 3, 197, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:51:44', 1, '2023-09-08 14:40:11', 1),
(199, 'Mampu membuat prototype seinteraktif mungkin dengan animasi', NULL, NULL, 2, 2, 3, 197, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:02', 1, '2023-09-08 14:40:11', 1),
(200, 'UX Writing', NULL, NULL, 11, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:10', 1, '2023-09-08 14:47:26', 1),
(201, 'Mampu membuat user journey yang interaktif', NULL, NULL, 1, 2, 3, 200, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:27', 1, '2023-09-08 14:40:11', 1),
(202, 'Mampu membangun karakter sebuah brand melalui kata-kata yang digunakan pada aplikasi', NULL, NULL, 2, 2, 3, 200, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:50', 1, '2023-09-08 14:40:11', 1),
(203, 'Best Practice for Collaborative Works', NULL, NULL, 12, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:53:05', 1, '2023-09-08 14:47:26', 1),
(204, 'Mampu bekerja dalam tim', NULL, NULL, 1, 2, 3, 203, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:53:17', 1, '2023-09-08 14:40:11', 1),
(205, 'Mampu menentukan solusi saat bekerja dalam tim', NULL, NULL, 2, 2, 3, 175, NULL, NULL, NULL, NULL, 1, '2023-07-03 01:53:34', 1, '2023-09-08 14:40:11', 1),
(206, 'Digital Marketing Introduction', NULL, NULL, 1, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:05:24', 1, '2023-09-08 14:47:26', 1),
(207, 'Apa itu pemasaran digital dan mengapa itu penting', NULL, NULL, 1, 2, 14, 206, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:05:39', 1, '2023-09-08 14:40:11', 1),
(208, 'Lanskap Media Digital', NULL, NULL, 2, 2, 14, 206, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:05:57', 1, '2023-09-08 14:40:11', 1),
(209, 'Perilaku Konsumen Digital', NULL, NULL, 3, 2, 14, 206, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:06:10', 1, '2023-09-08 14:40:11', 1),
(210, 'Kerangka & Corong Pemasaran Digital (termasuk tujuan media yang terkait dengan setiap corong)', NULL, NULL, 4, 2, 14, 206, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:06:39', 1, '2023-09-08 14:40:11', 1),
(211, 'Ekosistem Media Digital (Dimiliki, Dibayar & Diperoleh)', NULL, NULL, 5, 2, 14, 206, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:07:04', 1, '2023-09-08 14:40:11', 1),
(212, 'Paid Channel Deep Dive', NULL, NULL, 2, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:34:19', 1, '2023-09-08 14:47:26', 1),
(213, 'Pengenalan ke saluran berbayar (Media Sosial, Google, dll.)', NULL, NULL, 1, 2, 14, 212, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:34:46', 1, '2023-09-08 14:40:11', 1),
(214, 'Penggunaan Saluran Berbayar dalam Tahapan Corong Pemasaran Digital', NULL, NULL, 2, 2, 14, 212, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:35:00', 1, '2023-09-08 14:40:11', 1),
(215, 'Jenis tujuan kampanye', NULL, NULL, 3, 2, 14, 212, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:35:11', 1, '2023-09-08 14:40:11', 1),
(216, 'Jenis - jenis pembelian', NULL, NULL, 4, 2, 14, 212, NULL, NULL, NULL, NULL, 1, '2023-07-03 02:35:25', 1, '2023-09-08 14:40:11', 1),
(217, 'Metrik berbayar Digital', NULL, NULL, 5, 2, 14, 212, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:32:30', 1, '2023-09-08 14:40:11', 1),
(218, 'Social Media Fundamentals', NULL, NULL, 3, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:37:18', 1, '2023-09-08 14:47:26', 1),
(219, 'Lanskap Media Sosial', NULL, NULL, 1, 2, 14, 218, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:37:36', 1, '2023-09-08 14:40:11', 1),
(220, 'Pengantar Meta Ads Platform (termasuk BM,  Tujuan & pembuatan kampanye)', NULL, NULL, 2, 2, 14, 218, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:09', 1, '2023-09-08 14:40:11', 1),
(221, 'Audiens (Audiens Inti & Audiens Kustom)', NULL, NULL, 3, 2, 14, 218, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:21', 1, '2023-09-08 14:40:11', 1),
(222, 'Sinyal (Pixel, SDK & CAPI)', NULL, NULL, 4, 2, 14, 218, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:38', 1, '2023-09-08 14:40:11', 1),
(223, 'Materi iklan (Format iklan & praktik terbaikmateri iklan)', NULL, NULL, 5, 2, 14, 218, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:52', 1, '2023-09-08 14:40:11', 1),
(224, 'Social Media Deep Dive - Meta', NULL, NULL, 4, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:17', 1, '2023-09-08 14:47:26', 1),
(225, 'Dasar Meta Briliant', NULL, NULL, 1, 2, 14, 224, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:28', 1, '2023-09-08 14:40:11', 1),
(226, 'Solusi Video Meta', NULL, NULL, 2, 2, 14, 224, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:38', 1, '2023-09-08 14:40:11', 1),
(227, 'Solusi Perdagangan Meta', NULL, NULL, 3, 2, 14, 224, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:50', 1, '2023-09-08 14:40:11', 1),
(228, 'Solusi Aplikasi Meta', NULL, NULL, 4, 2, 14, 224, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:02', 1, '2023-09-08 14:40:11', 1),
(229, 'Pengukuran (Pelaporan, Analitik & Studi Iklan)', NULL, NULL, 5, 2, 14, 224, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:17', 1, '2023-09-08 14:40:11', 1),
(230, 'Social Media Deep Dive - TikTok', NULL, NULL, 5, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:35', 1, '2023-09-08 14:47:26', 1),
(231, 'Pengantar Platform Iklan TikTok', NULL, NULL, 1, 2, 14, 230, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:48', 1, '2023-09-08 14:40:11', 1),
(232, 'Pembuatan Kampanye Iklan TikTok(Termasuk Tujuan & pembuatan kampanye)', NULL, NULL, 2, 2, 14, 230, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:02', 1, '2023-09-08 14:40:11', 1),
(233, 'Format Iklan TikTok', NULL, NULL, 3, 2, 14, 230, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:11', 1, '2023-09-08 14:40:11', 1),
(234, 'PraktikTerbaik Kreatif TikTok - Pengukuran (Pelaporan & Studi)', NULL, NULL, 4, 2, 14, 230, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:39', 1, '2023-09-08 14:40:11', 1),
(235, 'Google Ads Fundamentals', NULL, NULL, 6, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:53', 1, '2023-09-08 14:47:26', 1),
(236, 'Mengenal Google Ads (Pengantar Google Ads Display, Video, Search,Shopping & App)', NULL, NULL, 1, 2, 14, 235, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:45:20', 1, '2023-09-08 14:40:11', 1),
(237, 'Pengantar Google Adwords (Dasbor Demo)', NULL, NULL, 2, 2, 14, 235, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:45:32', 1, '2023-09-08 14:40:11', 1),
(238, 'Penargetan, Penawaran & Format Iklan', NULL, NULL, 3, 2, 14, 235, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:45:51', 1, '2023-09-08 14:40:11', 1),
(239, 'Cara merencanakan kampanyeAnda dengan Google Ads - Ukur Performa Kampanye Google Ads Anda', NULL, NULL, 4, 2, 14, 235, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:13', 1, '2023-09-08 14:40:11', 1),
(240, 'Google Ads Platform Deep Dive', NULL, NULL, 7, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:23', 1, '2023-09-08 14:47:26', 1),
(241, 'Iklan Bergambar Google', NULL, NULL, 1, 2, 14, 240, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:36', 1, '2023-09-08 14:40:11', 1),
(242, 'Iklan Video Google', NULL, NULL, 2, 2, 14, 240, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:45', 1, '2023-09-08 14:40:11', 1),
(243, 'Iklan Belanja Google', NULL, NULL, 3, 2, 14, 240, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:55', 1, '2023-09-08 14:40:11', 1),
(244, 'Kampanye Performa Maksimal Google', NULL, NULL, 4, 2, 14, 240, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:47:19', 1, '2023-09-08 14:40:11', 1),
(245, 'Pelacakan Konversi Google Pengelola Tag', NULL, NULL, 5, 2, 14, 240, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:47:41', 1, '2023-09-08 14:40:11', 1),
(246, 'Influencer Marketing / KOL', NULL, NULL, 8, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:48:13', 1, '2023-09-08 14:47:26', 1),
(247, 'Pengantar Pemasaran Influencer', NULL, NULL, 1, 2, 14, 246, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:48:29', 1, '2023-09-08 14:40:11', 1),
(248, 'Jenis Pemasaran Influencer', NULL, NULL, 2, 2, 14, 246, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:05:31', 1, '2023-09-08 14:40:11', 1),
(249, 'Bagaimanamengembangkan strategi Influencer Marketing', NULL, NULL, 3, 2, 14, 246, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:05:44', 1, '2023-09-08 14:40:11', 1),
(250, 'Bagaimana menemukaninfluencer yang tepat dan relevan Metrik sukses', NULL, NULL, 4, 2, 14, 246, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:04', 1, '2023-09-08 14:40:11', 1),
(251, 'eCommerce On-Platform', NULL, NULL, 9, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:13', 1, '2023-09-08 14:47:26', 1),
(252, 'Pengantar eCommerce On-Platform', NULL, NULL, 1, 2, 14, 251, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:24', 1, '2023-09-08 14:40:11', 1),
(253, 'Solusi Periklanan Tokopedia', NULL, NULL, 2, 2, 14, 251, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:35', 1, '2023-09-08 14:40:11', 1),
(254, 'Solusi Pemasaran Lazada', NULL, NULL, 3, 2, 14, 251, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:46', 1, '2023-09-08 14:40:11', 1),
(255, 'Solusi Pemasaran Shopee', NULL, NULL, 4, 2, 14, 251, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:56', 1, '2023-09-08 14:40:11', 1),
(256, 'Whatsapp for Business', NULL, NULL, 10, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:07:23', 1, '2023-09-08 14:47:26', 1),
(257, 'Mengapa WhatsApp Business API', NULL, NULL, 1, 2, 14, 256, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:07:46', 1, '2023-09-08 14:40:11', 1),
(258, 'Cara Kerja WhatsApp Bisnis', NULL, NULL, 2, 2, 14, 256, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:06', 1, '2023-09-08 14:40:11', 1),
(259, 'Bagaimana cara memulai', NULL, NULL, 3, 2, 14, 256, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:15', 1, '2023-09-08 14:40:11', 1),
(260, 'Terhubung dengan Penyedia Solusi WhatsApp Business API', NULL, NULL, 4, 2, 14, 256, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:31', 1, '2023-09-08 14:40:11', 1),
(261, 'SEO (Search engine optimization)', NULL, NULL, 11, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:45', 1, '2023-09-08 14:47:26', 1),
(262, 'Pengantar SEO (termasuk SERP, SEO vs SEM, faktor SEO & kerangka kerja SEO)', NULL, NULL, 1, 2, 14, 261, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:56', 1, '2023-09-08 14:40:11', 1),
(263, 'Riset Kata Kunci dan Pesaing', NULL, NULL, 2, 2, 14, 261, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:03', 1, '2023-09-08 14:40:11', 1),
(264, 'Panduan SEO On-Page, SEO Off-Page & Google SEO (termasuk alatnya)', NULL, NULL, 3, 2, 14, 261, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:22', 1, '2023-09-08 14:40:11', 1),
(265, 'Strategi & Rencana SEO', NULL, NULL, 4, 2, 14, 261, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:45', 1, '2023-09-08 14:40:11', 1),
(266, 'Pengukuran SEO', NULL, NULL, 5, 2, 14, 261, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:56', 1, '2023-09-08 14:40:11', 1),
(267, 'Content Marketing', NULL, NULL, 12, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:10:41', 1, '2023-09-08 14:47:26', 1),
(268, 'PR Digital & Pemasaran Konten Berbasis Data', NULL, NULL, 1, 2, 14, 267, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:10:51', 1, '2023-09-08 14:40:11', 1),
(269, 'Konten Media Sosial (termasuk alat untuk penerbitan, penjadwalan & analitik)', NULL, NULL, 2, 2, 14, 267, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:06', 1, '2023-09-08 14:40:11', 1),
(270, 'Riset Audiens &Konten', NULL, NULL, 3, 2, 14, 267, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:21', 1, '2023-09-08 14:40:11', 1),
(271, 'Ideasi & Produksi Konten', NULL, NULL, 4, 2, 14, 267, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:32', 1, '2023-09-08 14:40:11', 1),
(272, 'Distribusi & Evaluasi Konten', NULL, NULL, 5, 2, 14, 267, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:41', 1, '2023-09-08 14:40:11', 1),
(273, 'Email Marketing', NULL, NULL, 13, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:56', 1, '2023-09-08 14:47:26', 1),
(274, 'Pengantar Pemasaran Email', NULL, NULL, 1, 2, 14, 273, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:12:48', 1, '2023-09-08 14:40:11', 1),
(275, 'Alat/Platform Pemasaran Email', NULL, NULL, 2, 2, 14, 273, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:12:58', 1, '2023-09-08 14:40:11', 1),
(276, 'Pembuatan Kampanye Pemasaran Email sebagai CRM, rujukan, dan strategi menghasilkan pendapatan', NULL, NULL, 3, 2, 14, 273, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:13:13', 1, '2023-09-08 14:40:11', 1),
(277, 'Memimpin Generasi & Manajemen', NULL, NULL, 4, 2, 14, 273, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:13:24', 1, '2023-09-08 14:40:11', 1),
(278, 'Customer relationship management (CRM)', NULL, NULL, 14, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:13:34', 1, '2023-09-08 14:47:26', 1),
(279, 'Siklus Hidup & Perjalanan Pelanggan', NULL, NULL, 1, 2, 14, 278, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:14:46', 1, '2023-09-08 14:40:11', 1),
(280, 'Pemasaran Otomasi untuk Retensi', NULL, NULL, 2, 2, 14, 278, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:03', 1, '2023-09-08 14:40:11', 1),
(281, 'Kerangka RFM', NULL, NULL, 3, 2, 14, 278, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:10', 1, '2023-09-08 14:40:11', 1),
(282, 'Metrik & Data CRM', NULL, NULL, 4, 2, 14, 278, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:19', 1, '2023-09-08 14:40:11', 1),
(283, 'Alat CRM', NULL, NULL, 5, 2, 14, 278, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:31', 1, '2023-09-08 14:40:11', 1),
(284, 'Digital Paid Media Planning', NULL, NULL, 15, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:55', 1, '2023-09-08 14:47:26', 1),
(285, 'Kembangkan Strategi & Rencana Media Berbayar Digital', NULL, NULL, 1, 2, 14, 284, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:17:33', 1, '2023-09-08 14:40:11', 1),
(286, 'Kembangkan struktur kampanye untuk setiap saluran', NULL, NULL, 2, 2, 14, 284, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:17:45', 1, '2023-09-08 14:40:11', 1),
(287, 'Implementasi (melaksanakan rencana)', NULL, NULL, 3, 2, 14, 284, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:17:57', 1, '2023-09-08 14:40:11', 1),
(288, 'Evaluasi kampanye Anda di setiap saluran', NULL, NULL, 4, 2, 14, 284, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:18:06', 1, '2023-09-08 14:40:11', 1),
(289, 'Bangun rekomendasi & pembelajaran / agenda pengukuran', NULL, NULL, 5, 2, 14, 284, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:18:34', 1, '2023-09-08 14:40:11', 1),
(290, 'Digital Paid Media Implementation', NULL, NULL, 16, 1, 14, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:18:54', 1, '2023-09-08 14:47:26', 1),
(291, 'Kembangkan Strategi & Rencana Media Berbayar Digital', NULL, NULL, 1, 2, 14, 290, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:03', 1, '2023-09-08 14:40:11', 1),
(292, 'Kembangkan struktur kampanye untuk setiap saluran', NULL, NULL, 2, 2, 14, 290, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:16', 1, '2023-09-08 14:40:11', 1),
(293, 'Implementasi (melaksanakan rencana)', NULL, NULL, 3, 2, 14, 290, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:31', 1, '2023-09-08 14:40:11', 1),
(294, 'Evaluasi kampanye Anda di setiap saluran', NULL, NULL, 4, 2, 14, 290, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:51', 1, '2023-09-08 14:40:11', 1),
(295, 'Bangun rekomendasi & pembelajaran / agenda pengukuran', NULL, NULL, 5, 2, 14, 290, NULL, NULL, NULL, NULL, 1, '2023-07-03 04:20:07', 1, '2023-09-08 14:40:11', 1),
(296, 'Digital Marketing Introduction', NULL, NULL, 1, 1, 21, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:23:19', 1, '2023-09-08 14:41:44', 1),
(297, 'Digital Media Landscape', NULL, NULL, 1, 2, 21, 296, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(298, 'Digital Consumer Behavior', NULL, NULL, 2, 2, 21, 296, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(299, 'Digital Marketing Funnels & Framework', NULL, NULL, 3, 2, 21, 296, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(300, 'Digital Media Ecosystem (Owned, Paid & Earned)', NULL, NULL, 4, 2, 21, 296, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(301, 'Paid Channel Deep Dive', NULL, NULL, 2, 1, 21, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:41:44', 1),
(302, 'Campaign Objectives and Buying Types', NULL, NULL, 1, 2, 21, 301, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(303, 'Digital Paid Metrics', NULL, NULL, 2, 2, 21, 301, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(304, 'Social Media Fundamentals', NULL, NULL, 3, 1, 21, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:41:44', 1),
(305, 'Intro to Meta Ads Platform (Including BM, Objectives & campaign creation)', NULL, NULL, 1, 2, 21, 304, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(306, 'Audience and Signals', NULL, NULL, 2, 2, 21, 304, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(307, 'Creative Ads', NULL, NULL, 3, 2, 21, 304, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(319, 'Onboarding', NULL, NULL, 0, 2, 9, 82, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:48:47', 1, '2023-08-25 15:59:28', 1),
(320, 'Introduction to Content Creation', NULL, NULL, 2, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(321, 'Instagram Basics', NULL, NULL, 3, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(322, 'Instagram Content Creation', NULL, NULL, 4, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(323, 'Instagram Storytelling', NULL, NULL, 5, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(324, 'Instagram Strategy and Analytics', NULL, NULL, 6, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(325, 'Introduction to Tiktok', NULL, NULL, 7, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(326, 'Tiktok Content Creation', NULL, NULL, 8, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1);
INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(327, 'TikTok Trends and Challenges', NULL, NULL, 9, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(328, 'TikTok Strategy and Analytics', NULL, NULL, 10, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(329, 'Conclusion and Next Steps', NULL, NULL, 11, 1, 9, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 13:52:34', 1, '2023-09-08 14:41:44', 1),
(330, 'Signing NDA and Ethical Hacking', NULL, NULL, 1, 1, 20, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:30:17', 1, '2023-09-08 14:41:44', 1),
(331, 'Web Fundamental', NULL, NULL, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:30:17', 1, '2023-09-08 14:41:44', 1),
(332, 'Scraping Web (Normal and JSON)', NULL, NULL, 1, 2, 20, 331, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:30:17', 1, '2023-09-08 14:40:11', 1),
(333, 'Exercises (Study Case: MercuryFM News Portal Scrap)', NULL, NULL, 2, 2, 20, 331, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:30:17', 1, '2023-09-08 14:40:11', 1),
(334, 'Authentication Bypass', NULL, NULL, 3, 1, 20, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:41:44', 1),
(335, 'Web Browser BOT Making (Study Case: FarmRPG)', NULL, NULL, 1, 2, 20, 334, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(336, 'Exercises (Study Case: FarmRPG Fishing and Explore Area)', NULL, NULL, 2, 2, 20, 334, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(337, 'Puppeter Introduction', NULL, NULL, 4, 1, 20, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:41:44', 1),
(338, 'Automation with Puppeter (Study Case: Discord BOT on Fishing Game) Gitlab:', NULL, NULL, 1, 2, 20, 337, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(339, 'Exercises (Study Case: Discord Game)', NULL, NULL, 2, 2, 20, 337, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(340, 'Android Hack Introduction', NULL, NULL, 5, 1, 20, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:41:44', 1),
(341, 'Sniffing Android Tools: Packet Capture', NULL, NULL, 1, 2, 20, 340, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:40:11', 1),
(342, 'Autoclicker for BOT / Macro (Study Case: Idle TD Evolved) Tools: Auto Clicker - Automatic Tap (Basic) Click Assistant - Auto Clicker (Basic+) Macrorify (Intermediate) Hiro Macro (Pro - ROOT)\r\n', NULL, NULL, 2, 2, 20, 340, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:40:11', 1),
(343, 'Exercises (Study Case: Idle RPG)', NULL, NULL, 3, 2, 20, 340, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:40:11', 1),
(344, 'Android MOD Introduction', NULL, NULL, 6, 1, 20, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:41:44', 1),
(345, 'Remove Cert and Making Unsigned APKTools: Android Multitool', NULL, NULL, 1, 2, 20, 344, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:40:11', 1),
(346, 'VMOS for Rooted Android', NULL, NULL, 2, 2, 20, 344, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:40:11', 1),
(347, 'Exercises (Study Case)', NULL, NULL, 3, 2, 20, 344, NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:40:11', 1),
(348, 'Solusi saat bekerja dalam tim', NULL, NULL, 2, 2, 3, 203, NULL, NULL, NULL, NULL, 1, '2023-07-05 14:42:42', 1, '2023-09-08 14:40:11', 1),
(360, 'CV and Cover Letter', NULL, NULL, 5, 1, 1, NULL, 1, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(361, 'Tips and Trick for CV and Cover Letter', NULL, NULL, 1, 2, 1, 360, 1, 'materi pembelajaran', 'Maxy_Resumes  Cover Letter.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(362, 'CV and Cover Letter', NULL, NULL, 2, 2, 1, 360, 1, 'assignment', NULL, 'Please submit your CV and Cover letter in the column below.', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(363, 'Backend Learning', NULL, NULL, 6, 1, 1, NULL, 2, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(364, 'Purchasing Cyle', NULL, NULL, 1, 2, 1, 363, 2, 'materi pembelajaran', 'Day 2 - Database Overview.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(365, 'Day 2', NULL, NULL, 2, 2, 1, 363, 2, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui SQL yang dihasilkan apakah sudah memenuhi best practices dalam pembuatan SQL, dan mentor yang menilai dapat memahami secara gambaran besar apa kira-kira maksud dari masing-masing tabel secara cepat. Jika ada sesuatu yang tidak dipahami oleh mentor, penilaian juga dilakukan melalui hasil dokumentasi database yang dihasilkan oleh peserta.', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(366, 'Backend Learning', NULL, NULL, 7, 1, 1, NULL, 3, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pengintegrasian Template HTML Backend ke dalam Laravel\r\n\r\n- Pembuatan authentication, user management, dan permission management\r\n\r\n- Pembuatan CRUD Management untuk Master Data dan proses validasi data yang dimasukkan dalam database.', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(367, 'Purchasing Cyle', NULL, NULL, 1, 2, 1, 366, 3, 'video pembelajaran', 'https://www.youtube.com/watch?v=PiAUqNttj1g', 'Tutorial Video PHP Overview', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(368, 'Day 2', NULL, NULL, 2, 2, 1, 366, 3, 'assignment', NULL, 'Membuat Source code yang dihasilkan:\r\n\r\n- Penamaan Class\r\n\r\n- Pembagian View\r\n\r\n- Clean Code\r\n\r\n- Basic security melalui authentication dan permission\r\n\r\n- Proses validasi yang dilakukan disesuaikan dengan kebutuhan data', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(369, 'Backend Learning', NULL, NULL, 8, 1, 1, NULL, 4, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. \r\n\r\nDalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: \r\n\r\n- Pembuatan CRUD Management untuk Transaction Data dan proses validasi data yang dimasukkan dalam database \r\n\r\n- Pembuatan try-catch transaction dan try-catch database serta rollback/commit process \r\n\r\n- Pembuatan Read (View) yang printable.', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(370, 'Master - Detail Relationship with Laravel', NULL, NULL, 1, 2, 4, 369, 1, 'video pembelajaran', 'https://www.youtube.com/watch?v=d0FT3IL8vrg', 'Rapid Application Development using Laravel on Transaction Data', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(371, 'Source Code', NULL, NULL, 2, 2, 1, 369, 4, 'materi pembelajaran', 'Day 4 Source Code.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(372, 'Rapid Development Using Laravel on Transaction Data', NULL, NULL, 2, 2, 1, 369, 4, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penamaan Class\r\n\r\n- Clean Code\r\n\r\n- Basic security melalui authentication dan permission\r\n\r\n- Proses validasi (multi validation) yang dilakukan disesuaikan dengan kebutuhan data', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(373, 'Backend Learning', NULL, NULL, 9, 1, 1, NULL, 5, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum.\r\n\r\nPada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir.\r\n\r\nDalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n- Pembuatan Form menggunakan Bootstrap 4 untuk responsive form\r\n- Penggunaan komponen pendukung Bootstrap 4 seperti Button, Button Group, Close Button, Modal, dll untuk mendukung pembuatan Backend\r\n- Penggunaan Statistic, Feed, Card, dsb pada SemanticUI yang dapat membantu beautification form dan report.', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(374, 'Bootstrap 4 and Sematic UI', NULL, NULL, 1, 2, 1, 373, 5, 'video pembelajaran', 'https://www.youtube.com/watch?v=OYSfSRcnb2g', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(375, 'Bootstrap 4 and Sematic UI', NULL, NULL, 2, 2, 1, 373, 5, 'materi pembelajaran', 'Day_5_boostrap_dan_semantic.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(376, 'Bootstrap 4 and Sematic UI 2', NULL, NULL, 3, 2, 1, 373, 5, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Responsive Design\r\n\r\n- Clean Form', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(377, 'Backend Learning', NULL, NULL, 10, 1, 1, NULL, 6, NULL, NULL, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan/Update Transaction Data CRUD (Ex: Point of Sales) menggunakan Autocomplete, Datepicker, dan Tooltip\r\n\r\n- Penggunaan Async AJAX untuk memanggil data\r\n\r\n- Pembuatan form dengan menggunakan LeafletJS untuk location picker dan reverse geocoding', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(378, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, 1, 2, 1, 377, 6, 'video pembelajaran', 'https://www.youtube.com/watch?v=wCeXN5m7KtM', 'Implement JQuery UI (Form Components) and LeafletJS', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(379, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, 2, 2, 1, 377, 6, 'materi pembelajaran', 'Day_6_laeflet_dan_jquery_ui.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(380, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, 3, 2, 1, 377, 6, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan JQuery UI widgets atau komponen penyetara\r\n\r\n- Penggunaan AJAX\r\n\r\n- Penggunaan LeafletJS atau geocoding picker lainnya.\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(381, 'Backend Learning', NULL, NULL, 11, 1, 1, NULL, 7, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: \r\n\r\n- Pembuatan CRUD Management Table menggunakan DataTables Server Side \r\n\r\n- Penggunaan extensions Buttons, ColReorder, Scroller, SearchBuilder, ColVis, dsb. \r\n\r\n- Penggunaan plugins sebagai tambahan untuk melakukan manipulasi data', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(382, 'Implement DataTable on Backend', NULL, NULL, 1, 2, 1, 381, 7, 'video pembelajaran', 'https://www.youtube.com/watch?v=9BxbsmlDhfA', 'Implement Data Table on Backend', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(383, 'DataTbale', NULL, NULL, 2, 2, 1, 381, 7, 'materi pembelajaran', 'Day 7 datatable.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(384, 'Implement DataTable on Backend', NULL, NULL, 3, 2, 1, 381, 7, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan DataTables\r\n\r\n- Penggunaan DataTables extension', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(385, 'Backend Learning', NULL, NULL, 12, 1, 1, NULL, 8, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan bar chart, line chart, dan pie chart untuk menampilkan data sederhana pada reporting\r\n\r\n- Pembuatan stacked bar chart, scatter chart, dan multi varian chart untuk Dashboard\r\n\r\n- Pembuatan Scriptable Options pada ChartJS untuk Dashboard\r\n\r\n- Pembuatan Animations, Data Decimation, dan Programmatic Event Triggers pada ChartJS untuk Dashboard dan Report', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(386, 'Implement ChartJS on Backend', NULL, NULL, 1, 2, 1, 385, 8, 'video pembelajaran', 'https://www.youtube.com/watch?v=tYjN83va47I', 'IMplement ChartJS on Backend', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(387, 'Implement ChartJS on Backend', NULL, NULL, 2, 2, 1, 385, 8, 'materi pembelajaran', 'Day_8_ChartJS.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(388, 'Implement ChartJS on Backend', NULL, NULL, 3, 2, 1, 385, 8, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan ChartJS pada Dashboard dan Report\r\n\r\n- Penggunaan Scriptable Options pada ChartJS\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(389, 'Backend Learning', NULL, NULL, 13, 1, 1, NULL, 9, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan halaman login dan register menggunakan Facebook dan Google Auth yang diperkuat dengan Re-Captcha 2/3\r\n\r\n- Pembuatan Two Factor Authentication menggunakan Google Authenticator\r\n\r\n- Pembuatan halaman untuk setting SEO di Backend\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(390, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, 1, 2, 1, 389, 9, 'video pembelajaran', 'https://www.youtube.com/watch?v=n9-onRluf-w', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(391, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, 2, 2, 1, 389, 9, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Social Oauth\r\n\r\n- Penggunaan Two Factor Authentication\r\n\r\n- Adanya SEO management di Backend', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(392, 'Backend Learning', NULL, NULL, 14, 1, 1, NULL, 10, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan fitur bulk upload\r\n\r\n- Pembuatan fitur Export to CSV, XLS, dan XLSX\r\n\r\n- Pembuatan fitur Export with graph and formula to XLSX', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(393, 'Implement PHPSpreadssheet', NULL, NULL, 1, 2, 1, 392, 10, 'video pembelajaran', 'https://www.youtube.com/watch?v=GbD_gBhI4cc', 'Implement PHP Spreadsheet', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(394, 'Implement PHPSpreadssheet', NULL, NULL, 2, 2, 1, 392, 10, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Adanya fitur bulk upload\r\n\r\n- Adanya fitur Export with Formula (normal export sudah dicover oleh DataTables Button)', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(395, 'Backend Learning', NULL, NULL, 15, 1, 1, NULL, 11, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan fitur reporting dengan filter dan sorting (penggunaan beberapa komponen tambahan seperti DateRangePicker, Select2, dsb)\r\n\r\n- Pembuatan executive summary (statistic)\r\n\r\n- Penggabungan chart.js dengan reporting\r\n\r\n- Pembuatan pivot table menggunakan pivot.js', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(396, 'Working on Report', NULL, NULL, 1, 2, 1, 395, 11, 'video pembelajaran', 'https://www.youtube.com/watch?v=VBjivRsBbP0', 'Working on Report', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(397, 'Working on Report', NULL, NULL, 2, 2, 1, 395, 11, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui source code yang dihasilkan:\r\n\r\n- Fitur reporting dengan filter, sort, dan executive summary\r\n\r\n- Fitur what-if analysis menggunakan pivot table', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(398, 'Backend Learning', NULL, NULL, 16, 1, 1, NULL, 12, NULL, NULL, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait: \r\n\r\n- Pembuatan REST API menggunakan Micro-Framework Lumen dan hubungannya dengan database \r\n\r\n- Pembuatan Authentication, Authorization, Caching \r\n\r\n- Best practices dalam berbagai validasi dan return code \r\n\r\n- Setting Encryption dan Logging untuk Error Debugging \r\n\r\n- Pengiriman mail melalui Lumen menggunakan GMail \r\n\r\n- Pembuatan dokumentasi API melalui Postman', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(399, 'Web Service Using Lumen', NULL, NULL, 1, 2, 1, 398, 12, 'video pembelajaran', 'https://www.youtube.com/watch?v=_XFmtmYOKS0', 'Web Services Using Lumen', 1, '2023-02-24 12:17:59', 0, '2023-08-01 11:31:05', 0),
(400, 'Web Service Using Lumen', NULL, NULL, 2, 2, 1, 398, 12, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- REST API dan response yang diberikan (pengujian akan dilakukan melalui dokumentasi Postman yang disubmit)', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(401, 'Backend Learning', NULL, NULL, 17, 1, 1, NULL, 13, NULL, NULL, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan master data dan halaman/blog yang berhubungan dengan corporate web\r\n\r\n- Pembuatan dynamic SEO untuk masing-masing halaman\r\n\r\n- Pembuatan SurveyJS creator untuk Backend', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(402, 'Backend For CMS', NULL, NULL, 1, 2, 1, 401, 13, 'video pembelajaran', 'https://www.youtube.com/watch?v=Kg6bicBpiow', 'Backend for CMS', 1, '2023-02-24 12:17:59', 0, '2023-08-01 11:31:31', 0),
(403, 'Web Service Using Lumen', NULL, NULL, 2, 2, 1, 401, 13, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- CMS yang komponen-komponennya SEO-friendly\r\n\r\n- Pengaplikasian SurveyJS Creator\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(404, 'CV and Cover Letter', NULL, NULL, 1, 1, 2, NULL, 1, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(405, 'Tips and Trick for CV and Cover Letter', NULL, NULL, 1, 2, 2, 404, 1, 'materi pembelajaran', 'Maxy_Resumes  Cover Letter.pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(406, 'CV and Cover Letter', NULL, NULL, 2, 2, 2, 404, 1, 'assignment', NULL, 'Please submit your CV and Cover letter in the column below ', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(407, 'Frontend Learning', NULL, NULL, 2, 1, 2, NULL, 2, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(408, 'HTML CSS Overview', NULL, NULL, 1, 2, 2, 407, 2, 'video pembelajaran', 'https://youtu.be/PXW4yE-ekbk', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Memahami kebutuhan client dan menerjemahkan menjadi Frontend\r\n\r\n- Membuat wireframe menggunakan Grid dan Layout yang disediakan Bootstrap 4\r\n\r\n- Menggunakan fonts yang disupport langsung oleh Bootstrap 4\r\n\r\n- Membuat mockup menggunakan component dan utilities yang disediakan oleh Bootstrap 4\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(409, 'HTML CSS Overview and CSS Framework using Bootstrap 4', NULL, NULL, 2, 2, 2, 404, 2, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Responsive Layout\r\n\r\n- Penggunaan Bootstrap 4 Components\r\n\r\n- Penggunaan Bootstrap 4 Utilities', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(410, 'Frontend Learning', NULL, NULL, 3, 1, 2, NULL, 4, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(411, 'Javascript adn Query Object Manipulation', NULL, NULL, 1, 2, 2, 410, 1, 'video pembelajaran', 'https://youtu.be/7Cmb2NMXeDc', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan JavaScript untuk debugging\r\n\r\n- Menggunakan JavaScript untuk manipulasi object yang ada dalam halaman website\r\n\r\n- Menggunakan JQuery sebagai shortcut untuk manipulasi object dan element yang ada dalam halaman website', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(412, 'Javascript adn Query Object Manipulation', NULL, NULL, 2, 2, 2, 410, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan debugging\r\n\r\n- Penggunaan JavaScript/JQuery untuk melakukan manipulasi dan bukan saja untuk init component', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(413, 'Frontend Learning', NULL, NULL, 4, 1, 2, NULL, 5, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(414, 'Sematic UI for Bootstrap Alternative', NULL, NULL, 1, 2, 2, 413, 1, 'video pembelajaran', 'https://youtu.be/m1p18xOZwBo', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan SemanticUI Basic Layouting\r\n\r\n- Menggunakan SemanticUI element, collections, dan view\r\n\r\n- Menggunakan SemanticUI modules\r\n\r\n- Memanggil modules melalui JavaScript', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(415, 'Sematic UI for Bootstrap Alternative', NULL, NULL, 2, 2, 2, 413, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan SemanticUI elements dan modules untuk melengkapi dan mempercantik tampilan\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(416, 'Frontend Learning', NULL, NULL, 5, 1, 2, NULL, 6, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(417, 'AJAX and Web Service', NULL, NULL, 1, 2, 2, 416, 1, 'video pembelajaran', 'https://youtu.be/--NoHEH8hAY', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Widget (iframe)\r\n\r\n- Menggunakan AJAX untuk menampilkan simple data yang berasal dari API / Web Services (weather, finances, etc)\r\n\r\n- Menggunakan AJAX untuk mengolah dan menampilkan data yang membutuhkan Authentication (JWT dsb)', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(418, 'AJAX and Web Service', NULL, NULL, 2, 2, 2, 416, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Widget\r\n\r\n- Penggunaan third party API untuk mendapatkan, mengolah, dan manampilkan data eksternal', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(419, 'Frontend Learning', NULL, NULL, 6, 1, 2, NULL, 7, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(420, 'Mobile web Apps Using framework7', NULL, NULL, 1, 2, 2, 419, 1, 'video pembelajaran', 'https://youtu.be/bN_rhyaCM88', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Instalasi Framework7\r\n\r\n- Belajar melalui Kitchen Sink\r\n\r\n- Menggunakan components dan class yang telah disediakan oleh Framework7\r\n\r\n- Menggunakan navigasi pada Framework7', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(421, 'Mobile web Apps Using framework7', NULL, NULL, 2, 2, 2, 419, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Framework7\r\n\r\n- Penggunaan Framework7 components', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(422, 'Frontend Learning', NULL, NULL, 7, 1, 2, NULL, 8, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(423, 'Framework7 Authentication and Data Storing', NULL, NULL, 1, 2, 2, 422, 1, 'video pembelajaran', 'https://youtu.be/a6uV2aQn7F0', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Firebase Authentication\r\n\r\n- Menghubungkan Framework7 dengan Firebase Authentication\r\n\r\n- Membuat Database pada Firebase\r\n\r\n- Menyimpan data secara lokal dan penggunaan constant\r\n\r\n- Menyimpan data pada Firebase menggunakan Framework7', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(424, 'Framework7 Authentication and Data Storing', NULL, NULL, 2, 2, 2, 422, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Firebase Authentication\r\n\r\n- Penggunaan Database Firebase', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(425, 'Frontend Learning', NULL, NULL, 8, 1, 2, NULL, 9, NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Request Location\r\n\r\n- Menggunakan Request Camera\r\n\r\n- Upload data dari internal storage dan camera\r\n\r\n- Menggunakan Push Notification\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(426, 'Framework7 Request Access', NULL, NULL, 1, 2, 2, 425, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Request Access\r\n\r\n- Penggunaan Push Notification\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(427, 'Frontend Learning', NULL, NULL, 9, 1, 2, NULL, 10, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(428, 'Framework7 Convert to Andorid', NULL, NULL, 1, 2, 2, 427, 1, 'video pembelajaran', 'https://youtu.be/deY8nXsT2d4', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Instalasi Cordova\r\n\r\n- Integrasi Cordova dengan Framework7\r\n\r\n- Konversi Framework7 ke Android App melalui Cordova\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(429, 'Framework7 Convert to Andorid', NULL, NULL, 2, 2, 2, 427, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Konversi Framework7 ke Android App', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(430, 'Frontend Learning', NULL, NULL, 10, 1, 2, NULL, 11, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(431, 'Using ChartJS', NULL, NULL, 1, 2, 2, 427, 1, 'video pembelajaran', 'https://youtu.be/JmqyP7mIcoc', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Line/Bar Chart\r\n\r\n- Menggunakan Pie Chart', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(432, 'Using ChartJS', NULL, NULL, 2, 2, 2, 427, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Menggunakan Chart', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(433, 'Frontend Learning', NULL, NULL, 11, 1, 2, NULL, 13, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(434, 'Tracking Your Websites', NULL, NULL, 1, 2, 2, 433, 1, 'video pembelajaran', 'https://youtu.be/V4PH-zYLwQY', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menghubungkan dan Reporting menggunakan Google Analytics\r\n\r\n- Menghubungkan dan Reporting menggunakan Facebook Pixel\r\n\r\n- Menghubungkan Google Tag Manager ke Google Analytics\r\n\r\n- Menilai kualitas website yang dibuat menggunakan popular tools seperti Web.Dev dan Google Lighthouse\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(435, 'Tracking Your Websites', NULL, NULL, 2, 2, 2, 433, 1, 'assignment', NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menghubungkan dan Reporting menggunakan Google Analytics\r\n\r\n- Menghubungkan dan Reporting menggunakan Facebook Pixel\r\n\r\n- Menghubungkan Google Tag Manager ke Google Analytics\r\n\r\n- Menilai kualitas website yang dibuat menggunakan popular tools seperti Web.Dev dan Google Lighthouse', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(436, 'Frontend Learning', NULL, NULL, 12, 1, 2, NULL, 3, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(437, 'Bootstrap 4 for Backend View', NULL, NULL, 1, 2, 2, 407, 3, 'video pembelajaran', 'https://youtu.be/7Cmb2NMXeDc', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan JavaScript untuk debugging\r\n\r\n- Menggunakan JavaScript untuk manipulasi object yang ada dalam halaman website\r\n\r\n- Menggunakan JQuery sebagai shortcut untuk manipulasi object dan element yang ada dalam halaman website', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(438, 'Bootstrap 4 for Backend View', NULL, NULL, 2, 2, 2, 407, 3, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan debugging\r\n\r\n- Penggunaan JavaScript/JQuery untuk melakukan manipulasi dan bukan saja untuk init component', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(439, 'Frontend Learning', NULL, NULL, 13, 1, 2, NULL, 12, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(440, 'JQuery Popular Frontend Libaries', NULL, NULL, 1, 2, 2, 430, 1, 'video pembelajaran', 'https://youtu.be/MRzMX6M-rTk', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Parallax\r\n\r\n- Menggunakan Social Share\r\n\r\n- Menggunakan LeafletJS\r\n\r\n- Menggunakan Tawk.to dan third party sejenisnya\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(441, 'JQuery Popular Frontend Libaries', NULL, NULL, 2, 2, 2, 430, 1, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Menggunakan popular libraries di luar Bootstrap dan Semantic UI\r\n\r\n- Menggunakan third party widgets', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(443, 'UI/UX Learning', NULL, NULL, 1, 1, 3, NULL, 2, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(444, 'Get Started with Figma', NULL, NULL, 1, 2, 3, 443, 2, 'video pembelajaran', 'https://youtu.be/x6KJNNovCv8', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat Frame\r\n\r\n- Membuat Object (Shape dan Text)\r\n\r\n- Meng-edit Object (Shape dan Text)\r\n\r\n- Mengelompokkan Object (Shape dan Text)', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(445, 'Create your own CV', NULL, NULL, 2, 2, 3, 443, 4, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui UI/ UX CV yang dihasilkan:\r\n\r\n- Curriculum Vitae dibuat menggunakan Figma\r\n\r\n- Objek-objek yang digunakan tidak monoton\r\n\r\n- Kelengkapan unsur-unsur dalam CV yang dihasilkan terutama sesuai kaedah Harvard Style\r\n\r\nNote: Jika sudah selesai. Masukan link hasil CV anda di jawaban box yang dibawah ini:', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(446, 'UI/UX Learning', NULL, NULL, 2, 1, 3, NULL, 3, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(447, 'Analyzing UI/ UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, 1, 2, 3, 446, 2, 'video pembelajaran', 'https://youtu.be/yQTgsEGJUEI', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan Competitor Analysis\r\n\r\n- Rapid Design dengan menggunakan plugin-plugin yang disediakan oleh Figma\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(448, 'Analyzing UI/ UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, 2, 2, 3, 446, 4, 'assignment', NULL, 'Pilih 2 brand terkenal yang bisa dianalisa untuk UI/UX mereka\r\n\r\nKedalaman dan kelengkapan competitor Analysis yang dihasilkan\r\n\r\nPresent penggunaan Figma Plugin di dalam portfolio', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(449, 'UI/UX Learning', NULL, NULL, 3, 1, 3, NULL, 4, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(450, 'Wireframe 101', NULL, NULL, 1, 2, 3, 449, 4, 'video pembelajaran', 'https://youtu.be/zGMQIdMtOAQ', 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint dari sebuah website\r\n\r\n- Membuat section untuk setiap fitur yang sudah ditentukan', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(451, 'Wireframe 101', NULL, NULL, 2, 2, 3, 449, 4, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Konsistensi design wireframe yang dihasilkan\r\n\r\n- Penggunaan font dan element yang sesuai dengan konsep produk dan kebutuhan client', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(452, 'UI/UX Learning', NULL, NULL, 4, 1, 3, NULL, 5, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(453, 'Putting Design on Top of Wireframe', NULL, NULL, 1, 2, 3, 452, 5, 'video pembelajaran', 'https://youtu.be/TA0gpoiQh5A', 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum.\r\n\r\nPada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir.\r\n\r\nDalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Penambahan elemen visual agar menjadi sebuah design website\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep website', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(454, 'Putting Design on Top of Wireframe', NULL, NULL, 2, 2, 3, 452, 5, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Kesesuaian antara UI Design website dan wireframe yang sudah dibuat\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Penggunaan warna yang kontras disesuaikan dengan kebutuhan', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(455, 'UI/UX Learning', NULL, NULL, 5, 1, 3, NULL, 6, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(456, 'Putting Design on Top of Wireframe', NULL, NULL, 1, 2, 3, 455, 6, 'video pembelajaran', 'https://youtu.be/p3JqUZqV_rA', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah website landing page\r\n\r\n- Mendesign dan menambahkan elemen visual agar menjadi sebuah design website landing page\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep website - Menentukan font yang sesuai dengan konsep website', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(457, 'Putting Design on Top of Wireframe', NULL, NULL, 2, 2, 3, 455, 6, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dan element dengan konsep produk Dari design yang dihasilkan', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(458, 'UI/UX Learning', NULL, NULL, 6, 1, 3, NULL, 7, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(459, 'Wireframe for News Portal (Mobile)', NULL, NULL, 1, 2, 3, 458, 7, 'video pembelajaran', 'https://youtu.be/Gbq9LyIKzNY', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah aplikasi news portal\r\n\r\n- Mendesign dan menambahkan elemen visual agar menjadi sebuah design website news portal\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep mobile app\r\n\r\n- Menentukan font yang sesuai dengan konsep mobile app', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(460, 'Wireframe for News Portal (Mobile)', NULL, NULL, 2, 2, 3, 458, 7, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(461, 'UI/UX Learning', NULL, NULL, 7, 1, 3, NULL, 8, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(462, 'Wireframe for News Portal (Mobile)', NULL, NULL, 1, 2, 3, 461, 8, 'video pembelajaran', 'https://youtu.be/wiL4diC9j5w', 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah design mobile app marketplace\r\n\r\n- Mendesign dan menambahkan elemen visual agar menjadi sebuah design mobile app Marketplace -\r\n\r\nMenentukan color pallete yang sesuai dengan konsep mobile app -\r\n\r\nMenentukan font yang sesuai dengan konsep mobile app\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(463, 'Wireframe for News Portal (Mobile)', NULL, NULL, 2, 2, 3, 461, 8, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras - Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(464, 'UI/UX Learning', NULL, NULL, 8, 1, 3, NULL, 9, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(465, 'Backend UI/ UX Design', NULL, NULL, 1, 2, 3, 464, 9, 'video pembelajaran', 'https://youtu.be/UYJVEUzfNxg', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat UI/ UX Design untuk website backend\r\n\r\n- Membuat design Table untuk konten pada setiap menu', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(466, 'Backend UI/ UX Design', NULL, NULL, 2, 2, 3, 464, 9, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- UI design backend Marketplace\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(467, 'UI/UX Learning', NULL, NULL, 9, 1, 3, NULL, 10, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(468, 'Wireframe for Marketplace Payment Details', NULL, NULL, 1, 2, 3, 467, 10, 'video pembelajaran', 'https://youtu.be/JG7h9FwxGss', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah alur payment details pada aplikasi marketplace\r\n\r\n- Membuat UI Design untuk sebuah alur payment details pada aplikasi marketplace - Menentukan color pallete yang sesuai dengan konsep mobile app\r\n\r\n- Menentukan font yang sesuai dengan konsep mobile app\r\n\r\n', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(469, 'Wireframe for Marketplace Payment Details', NULL, NULL, 2, 2, 3, 467, 10, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(470, 'UI/UX Learning', NULL, NULL, 10, 1, 3, NULL, 11, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(471, 'Wireframe for Marketplace Payment Details', NULL, NULL, 1, 2, 3, 470, 11, 'video pembelajaran', 'https://youtu.be/vl2hPdsNEVQ', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menjadikan beberapa UI design untuk sebuah prototype\r\n\r\n- Menganimasikan prototype\r\n\r\n- Menentukan animasi yang tepat dalam prototype', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(472, 'Wireframe for Marketplace Payment Details', NULL, NULL, 2, 2, 3, 470, 11, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Workflow yang mudah dipahami\r\n\r\n- Simplisitas dalam menganimasikan prototype\r\n', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0);
INSERT INTO `course_module` (`id`, `name`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(473, 'UI/UX Learning', NULL, NULL, 11, 1, 3, NULL, 12, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(474, 'UX Writing', NULL, NULL, 1, 2, 3, 473, 12, 'video pembelajaran', 'https://youtu.be/cyFjJVA6X2g', 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembangunan karakter sebuah produk melalui Diction Filtering', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(475, 'UX Writing', NULL, NULL, 2, 2, 3, 473, 12, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- UI design tentang login dan signup untuk salah satu dari marketplace atau news portal, dengan cara membuat ux writing juga untuk bagian login dan sign up.', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(476, 'UI/UX Learning', NULL, NULL, 12, 1, 3, NULL, 13, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(477, 'Best Practices for Figma on Teams', NULL, NULL, 1, 2, 3, 476, 13, 'video pembelajaran', 'https://youtu.be/raFf0oJO6vM', 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan UI/ UX Design sebuah website atau mobile app dari studi kasus yang diberikan\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep website atau mobile app\r\n\r\n- Menentukan font yang sesuai dengan konsep website atau mobile app', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(478, 'Best Practices for Figma on Teams', NULL, NULL, 2, 2, 3, 476, 13, 'assignment', NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI/ UX Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk\r\n\r\n- Workflow yang mudah dipahami\r\n\r\n- Simplisitas dalam menganimasikan prototype Dari design yang dihasilkan', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(479, 'CV and Cover Letter', NULL, NULL, 13, 1, 3, NULL, 1, NULL, NULL, 'Here we provide you with a structured course that will teach you all you need to make your own CV and Cover letter. Work through each section, learning new skills (or improving existing ones) as you go along.', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(480, 'CV and Cover Letter', NULL, NULL, 1, 2, 3, 479, 1, 'assignment', NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(481, 'Onboarding Hacking not Cracking', NULL, NULL, 7, 1, 20, NULL, 1, NULL, NULL, 'https://discord.gg/RfRdtRZh', 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(482, 'Introduction Hacking not Cracking', NULL, NULL, 1, 2, 20, 481, 1, 'video pembelajaran', 'https://youtu.be/48J4NTrbp08', 'Hai Maxians, selamat datang di mini bootcamp hacking Maxy Academy. Disini kita akan belajar mulai dari basic mengenai hacking dan kita tidak hanya belajar teori pastinya tapi langsung praktek bersama teman-teman tutor dari Maxy Academy. \r\nSebelum mengikuti bootcamp, teman-teman diharapkan mengisi form pernyataan untuk mengikuti bootcamp hacking secara etis dan tidak melakukan hal yang bukan semestinya, jika ada celah maka data yang diubah harus dikembalikan seperti semula. \r\nSelamat Belajar Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(483, 'References Cyber Security', NULL, NULL, 2, 2, 20, 481, 1, 'video pembelajaran', 'https://www.youtube.com/watch?v=9XSiyWm7-rY', NULL, 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(484, 'Scraping Web', NULL, NULL, 8, 1, 20, NULL, 2, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(485, 'Web Fundamental', NULL, NULL, 1, 2, 20, 484, 2, 'video pembelajaran', 'https://youtu.be/FKpmpg7VKoA', 'Hi Maxians! Pada pertemuan kali ini, kita akan membahas mengenai Web Fundamental. Materi ini akan mencakup metode untuk mencari celah keamanan, scraping data dengan berbagai cara, dan autentikasi dalam celah keamanan. Setelah memahami web fundamental, mari kita belajar mengenai web scraping pada sesi kedua. \r\nSelamat belajar Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-08-02 17:00:35', 0),
(486, 'Web Fundamental', NULL, NULL, 2, 2, 20, 484, 2, 'materi pembelajaran', 'Maxy Mini Bootcamp Security Day 1_Web Fundamental (1).pdf', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-02 17:00:42', 0),
(487, 'Web Fundamental', NULL, NULL, 3, 2, 20, 484, 2, 'video pembelajaran', 'https://youtu.be/PL8eVtmmPF4', 'Hi Maxians! Pada sesi ini kita akan mencoba langsung scraping data menggunakan php. Target kita adalah portal berita bernama kapanlagi (kapanlagi.com). Cari celah keamanannya dan serang website nya!!! Eits tapi jangan sampai jadi black hat hacker yaa. \r\nSelamat belajar Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-08-02 17:00:48', 0),
(488, 'Additional function for scraping data', NULL, NULL, 4, 2, 20, 484, 2, 'materi pembelajaran', NULL, '<?php\r\nfunction _retriever($url, $data = NULL, $header = NULL, $method = \'GET\')\r\n{\r\n    $cookie_file_path = dirname(__FILE__) . \"/cookie/techinasia.txt\";\r\n    $datas[\'http_code\'] = 0;\r\n    if ($url == \"\")\r\n        return $datas;\r\n    $data_string = \'\';\r\n    if ($data != NULL) {\r\n        if (is_array($data)) {\r\n            foreach ($data as $key => $value) {\r\n                $data_string .= $key . \'=\' . $value . \'&\';\r\n            }\r\n        } else {\r\n            $data_string = $data;\r\n        }\r\n    }\r\n\r\n    $ch = curl_init();\r\n    if ($header != NULL)\r\n        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);\r\n    curl_setopt($ch, CURLOPT_HEADER, false);\r\n    curl_setopt($ch, CURLOPT_NOBODY, false);\r\n    curl_setopt($ch, CURLOPT_URL, $url);\r\n    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);\r\n\r\n    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);\r\n    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);\r\n    curl_setopt(\r\n        $ch,\r\n        CURLOPT_USERAGENT,\r\n        \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\"\r\n    );\r\n    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);\r\n    curl_setopt($ch, CURLOPT_REFERER, $_SERVER[\'REQUEST_URI\']);\r\n    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);\r\n    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);\r\n    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);\r\n\r\n    if ($data != NULL) {\r\n        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);\r\n        // curl_setopt($ch, CURLOPT_POST, count($data));\r\n        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);\r\n    }\r\n\r\n    $html = curl_exec($ch);\r\n    //echo curl_getinfo($ch, CURLINFO_HTTP_CODE);\r\n    //echo $html;\r\n    if (!curl_errno($ch)) {\r\n        $datas[\'http_code\'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);\r\n        if ($datas[\'http_code\'] == 200) {\r\n            $datas[\'result\'] = $html;\r\n        }\r\n    }\r\n    curl_close($ch);\r\n    return $datas;\r\n?>', 1, '2023-02-24 12:17:59', 0, '2023-08-02 17:00:45', 0),
(489, 'Assignment Day 2', NULL, NULL, 5, 2, 20, 484, 2, 'assignment', NULL, 'Setalah memahami cara melakukan scraping data, tugas untuk hari ini adalah melakukan scraping berita-berita yang ada pada MercuryFM. Ambil judul, tanggal terbit, penulis, gambar, dan konten dari berita-berita yang ada di homepage MercuryFM. Tampilkan dalam bentuk table dan upload hasil coding dalam bentuk zip. \r\nSelamat mengerjakan tugasnya Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(490, 'Authentication Bypass', NULL, NULL, 9, 1, 20, NULL, 3, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(491, 'Authentication Bypass & BOT making', NULL, NULL, 1, 2, 20, 490, 3, 'video pembelajaran', 'https://youtu.be/DK5Xfu50eU0', 'Hi Maxians! Setelah memahami dasar-dasar website dan scraping, selanjutnya kita akan mempelajari cara membuat sistem otomatisasi pada website. Dalam materi kali ini, kita akan mempelajari cara menembus autentikasi lalu membuat BOT otomatisasi dalam bermain game browser bernama FarmRPG. \r\nSelamat belajar Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(492, 'Assignment Day 3', NULL, NULL, 2, 2, 20, 490, 3, 'assignment', NULL, 'Hi Maxians!\r\nTugas kalian untuk hari ini adalah membuat BOT otomatisasi untuk Fishing dan Explore Area pada FarmRPG. Upload file tugas kalian dengan format nama Nama_Day2\r\n\r\ndalam bentuk Zip.\r\nSelamat mengerjakan Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(493, 'Automation', NULL, NULL, 10, 1, 20, NULL, 4, NULL, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-09-08 14:41:44', 0),
(494, 'Automation & Puppeteer Introduction', NULL, NULL, 1, 2, 20, 493, 4, 'video pembelajaran', 'https://youtu.be/XU34h9N79fU', 'Hi Maxians! Dalam melakukan otomatisasi, macro dapat membantu kita melakukan otomatisasi fungsi secara berulang. Puppeteer menjadi salah satu library di Node.js yang dapat melakukan otomatisasi. Materi kali ini akan membahas bagaimana menggunakan puppeteer dalam melakukan otomatisasi. \r\nSelamat belajar Maxians!', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(495, 'Automation with Puppeteer', NULL, NULL, 2, 2, 20, 493, 4, 'video pembelajaran', 'https://youtu.be/7Vm0ei6Wvro', 'Hi Maxians! Sudah tahu kan apa itu puppeteer? Sekarang kita akan langsung mencoba menggunakan puppeteer untuk melakukan otomatisasi pada Discord. Simak video berikut dan selamat belajar Maxians!!', 1, '2023-02-24 12:17:59', 0, '2023-07-31 14:49:18', 0),
(496, 'Assignment Day 4', NULL, NULL, 3, 2, 20, 493, 4, 'assignment', NULL, 'Sudah paham menggunakan puppeteer? Sekarang tugas kalian adalah menggabungkan apa yang telah kalian pelajari dengan konsep dasar looping supaya puppeteer dapat secara otomatis mengetik /fish terus menerus. Tambahkan checking yang menurut kalian akan diperlukan supaya puppeteer dapat berjalan dengan lancar. Selamat mengerjakan Maxians!!', 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(508, 'What is content creation?', NULL, NULL, 1, 2, 9, 320, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:35:43', 1, '2023-08-25 16:35:43', 1),
(509, 'Understanding the importance of creating engaging content', NULL, NULL, 2, 2, 9, 320, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:35:43', 1, '2023-08-25 16:35:43', 1),
(510, 'Introduction to the different types of content (e.g. photos, videos, graphics, etc.)', NULL, NULL, 3, 2, 9, 320, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:35:43', 1, '2023-08-25 16:35:43', 1),
(511, 'Setting up an Instagram account and optimizing your profile\r\n', NULL, NULL, 1, 2, 9, 321, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:40:36', 1, '2023-08-25 16:40:36', 1),
(512, 'Understanding Instagrams algorithm and how it affects post visibility', NULL, NULL, 2, 2, 9, 321, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:40:36', 1, '2023-08-25 16:40:36', 1),
(513, 'Creating an Instagram profile that stands out and reflects your brand', NULL, NULL, 3, 2, 9, 321, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:40:36', 1, '2023-08-25 16:40:36', 1),
(514, 'Best practices for creating Instagram content\r\n\r\n', NULL, NULL, 1, 2, 9, 322, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:41:49', 1, '2023-08-25 16:41:49', 1),
(515, 'Understanding Instagrams visual aesthetic and how to use it to your advantage\r\n', NULL, NULL, 2, 2, 9, 322, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:41:49', 1, '2023-08-25 16:41:49', 1),
(516, 'Creating effective captions that engage your audience\n', NULL, NULL, 3, 2, 9, 322, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:41:49', 1, '2023-08-25 16:43:45', 1),
(517, 'Understanding the importance of storytelling on Instagram\r\n\r\n\r\n', NULL, NULL, 1, 2, 9, 323, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:45:10', 1, '2023-08-25 16:45:10', 1),
(518, 'Creating Instagram stories that engage your audience\r\n\r\n', NULL, NULL, 2, 2, 9, 323, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:45:10', 1, '2023-08-25 16:45:10', 1),
(519, 'Using Instagram story features (e.g. polls, questions, etc.) to increase engagement and\r\ncreate interactive content\r\n', NULL, NULL, 3, 2, 9, 323, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:45:10', 1, '2023-08-25 16:45:10', 1),
(520, 'Developing an Instagram content strategy\r\n\r\n\r\n\r\n', NULL, NULL, 1, 2, 9, 324, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:05', 1, '2023-08-25 16:46:05', 1),
(521, 'Understanding Instagram analytics and how to use them to improve your content\r\nstrategy\r\n\r\n', NULL, NULL, 2, 2, 9, 324, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:05', 1, '2023-08-25 16:46:05', 1),
(522, 'How to collaborate with brands on Instagram and leverage partnerships to grow your\r\naudience\r\n', NULL, NULL, 3, 2, 9, 324, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:05', 1, '2023-08-25 16:46:05', 1),
(523, 'What is TikTok?\r\n\r\n', NULL, NULL, 1, 2, 9, 325, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:57', 1, '2023-08-25 16:46:57', 1),
(524, 'Understanding TikToks algorithm and how it affects post visibility\r\n\r\n\r\n', NULL, NULL, 2, 2, 9, 325, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:57', 1, '2023-08-25 16:46:57', 1),
(525, 'How to set up a TikTok account\n\n', NULL, NULL, 3, 2, 9, 325, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:57', 1, '2023-08-25 16:48:46', 1),
(526, 'Best practices for creating TikTok content that is visually appealing and engaging\r\n\r\n\r\n', NULL, NULL, 1, 2, 9, 326, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:47:52', 1, '2023-08-25 16:47:52', 1),
(527, 'Understanding TikToks visual aesthetic and how to use it to your advantage\r\n\r\n\r\n\r\n', NULL, NULL, 2, 2, 9, 326, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:47:52', 1, '2023-08-25 16:47:52', 1),
(528, 'Creating effective captions that engage your audience\r\n\r\n', NULL, NULL, 3, 2, 9, 326, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:47:52', 1, '2023-08-25 16:47:52', 1),
(529, 'Understanding TikTok trends and challenges and how they can help increase your reach\r\nand engagement\r\n\r\n\r\n', NULL, NULL, 1, 2, 9, 327, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:49:45', 1, '2023-08-25 16:49:45', 1),
(530, 'How to participate in TikTok trends and challenges and create content that aligns with\r\nyour brand messaging\r\n\r\n\r\n\r\n', NULL, NULL, 2, 2, 9, 327, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:49:45', 1, '2023-08-25 16:49:45', 1),
(531, 'Creating your own TikTok trends and challenges to help grow your audience and\r\nengagement\r\n\r\n\r\n', NULL, NULL, 3, 2, 9, 327, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:49:45', 1, '2023-08-25 16:49:45', 1),
(532, 'Developing a TikTok content strategy that aligns with your brands goals and target\r\naudience\r\n\r\n\r\n', NULL, NULL, 1, 2, 9, 328, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:50:34', 1, '2023-08-25 16:50:34', 1),
(533, 'Understanding TikTok analytics and how to use them to improve your content strategy\r\n\r\n\r\n\r\n\r\n', NULL, NULL, 2, 2, 9, 328, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:50:34', 1, '2023-08-25 16:50:34', 1),
(534, 'How to collaborate with brands on TikTok and leverage partnerships to grow your\r\naudience\r\n\r\n', NULL, NULL, 3, 2, 9, 328, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:50:34', 1, '2023-08-25 16:50:34', 1),
(535, 'Review key concepts and skills covered throughout the bootcamp\r\n\r\n\r\n\r\n', NULL, NULL, 1, 2, 9, 329, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:51:23', 1, '2023-08-25 16:51:23', 1),
(536, 'Provide participants with actionable steps for continuing to improve their content creation\r\nskills on Instagram and TikTok\r\n\r\n\r\n\r\n\r\n\r\n', NULL, NULL, 2, 2, 9, 329, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:51:23', 1, '2023-08-25 16:51:23', 1),
(537, 'Offer resources and tools for participants to continue learning and growing their skills as\r\ncontent creators\r\n\r\n', NULL, NULL, 3, 2, 9, 329, NULL, NULL, NULL, NULL, 1, '2023-08-25 16:51:23', 1, '2023-08-25 16:51:23', 1),
(538, 'Sekilas Budaya dan dasar bahasa Jepang', NULL, NULL, 1, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:41:09', 1, '2023-09-08 14:41:44', 1),
(539, 'Hiragana deret 1', NULL, NULL, 2, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:44:28', 1, '2023-09-08 14:41:44', 1),
(540, 'Hiragana deret 2', NULL, NULL, 3, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:45:04', 1, '2023-09-08 14:41:44', 1),
(541, 'Hiragana deret 3', NULL, NULL, 4, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:45:18', 1, '2023-09-08 14:41:44', 1),
(542, 'dakuon', NULL, NULL, 5, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:46:36', 1, '2023-09-08 14:41:44', 1),
(543, 'Bunyi panjang, konsonan berganda, Katakana', NULL, NULL, 6, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:47:10', 1, '2023-09-08 14:41:44', 1),
(544, 'Bab 1, tema: Negara, warga Negara, bahasa', NULL, NULL, 7, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:47:36', 1, '2023-09-08 14:41:44', 1),
(545, 'Bab 2, tema: Nama keluarga', NULL, NULL, 8, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:47:56', 1, '2023-09-08 14:41:44', 1),
(546, 'Bab 3, tema:  Toko serba ada', NULL, NULL, 9, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:48:25', 1, '2023-09-08 14:41:44', 1),
(547, 'Bab 4, Tema: Telepon dan surat', NULL, NULL, 10, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:48:45', 1, '2023-09-08 14:41:44', 1),
(548, 'Bab 5,  Tema: Hari libur nasional', NULL, NULL, 11, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:49:04', 1, '2023-09-08 14:41:44', 1),
(549, 'Bab 6,  Tema: Makanan', NULL, NULL, 12, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:49:25', 1, '2023-09-08 14:41:44', 1),
(550, 'Bab 7,  Tema: Keluarga', NULL, NULL, 13, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:49:45', 1, '2023-09-08 14:41:44', 1),
(551, 'Bab 8,  Tema: Warna, rasa makanan', NULL, NULL, 14, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:50:02', 1, '2023-09-08 14:41:44', 1),
(552, 'Bab 9,  tema: Musik, olahraga, film', NULL, NULL, 15, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:50:23', 1, '2023-09-08 14:41:44', 1),
(553, 'Bab 10,  tema: Di dalam Rumah', NULL, NULL, 16, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:50:39', 1, '2023-09-08 14:41:44', 1),
(554, 'Bab 11,  tema: Menu', NULL, NULL, 17, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:50:56', 1, '2023-09-08 14:41:44', 1),
(555, 'Bab 12,  tema: Pesta, Tempat terkenal', NULL, NULL, 18, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:51:17', 1, '2023-09-08 14:41:44', 1),
(556, 'Bab 13,  tema: di kota', NULL, NULL, 19, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:51:36', 1, '2023-09-08 14:41:44', 1),
(557, 'Bab 14,  Tema: Stasiun', NULL, NULL, 20, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:52:02', 1, '2023-09-08 14:41:44', 1),
(558, 'Bab 15,  Tema: Pekerjaan', NULL, NULL, 21, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:52:22', 1, '2023-09-08 14:41:44', 1),
(559, 'Bab 16,  tema: Cara mengambil uang melalui ATM', NULL, NULL, 22, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:52:41', 1, '2023-09-08 14:41:44', 1),
(560, 'Bab 17,  tema: Badan, penyakit', NULL, NULL, 23, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:52:59', 1, '2023-09-08 14:41:44', 1),
(561, 'Bab 18,  tema: Pergerakan', NULL, NULL, 24, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:53:20', 1, '2023-09-08 14:41:44', 1),
(562, 'Bab 19,  tema: Kebudayaan tradisional dan hiburan', NULL, NULL, 25, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:53:35', 1, '2023-09-08 14:41:44', 1),
(563, 'Bab 20,  tema: cara memanggil orang', NULL, NULL, 26, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:53:53', 1, '2023-09-08 14:41:44', 1),
(564, 'Bab 21,  tema: nama nama jabatan', NULL, NULL, 27, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:54:14', 1, '2023-09-08 14:41:44', 1),
(565, 'Bab 22,  tema: Pakaian', NULL, NULL, 28, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:54:30', 1, '2023-09-08 14:41:44', 1),
(566, 'Bab 23, tema: jalan, lalu lintas', NULL, NULL, 29, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:54:49', 1, '2023-09-08 14:41:44', 1),
(567, 'Bab 24,  tema: Kebiasaan tukar menukar benda/hadiah', NULL, NULL, 30, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:55:09', 1, '2023-09-08 14:41:44', 1),
(568, 'Bab 25, Tema: Kehidupan seseorang', NULL, NULL, 31, 1, 18, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-31 09:55:26', 1, '2023-09-08 14:41:44', 1),
(569, 'Bowing culture, Budaya yang unik di Jepang, jenis huruf yang dipakai dan kegunaannya. Perkenalan diri dan etikanya.', NULL, NULL, 1, 2, 18, 538, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:02:24', 1, '2023-08-31 10:02:24', 1),
(570, 'Hiragana a, i, u, e, o – ka, ki, ku, ke, ko – sa, shi su, se, so', NULL, NULL, 1, 2, 18, 539, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:06:38', 1, '2023-08-31 10:06:38', 1),
(571, 'Hiragana ta, chi, tsu, te, to – na, ni, nu, ne, no – ha, hi, fu, he, ho', NULL, NULL, 1, 2, 18, 540, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:07:26', 1, '2023-08-31 10:07:26', 1),
(572, 'Ma, mi, mu, me, mo – ya, yu, yo- ra, ri, ru, re, ro – wa, n', NULL, NULL, 1, 2, 18, 541, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:08:03', 1, '2023-08-31 10:08:03', 1),
(573, 'Fungsi dakuon, deret huruf yang bisa diberi dakuon. [“], [?]', NULL, NULL, 1, 2, 18, 542, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:08:37', 1, '2023-08-31 10:08:37', 1),
(574, 'Fungsi dan cara menggunakan bunyin panjang; konsonan berganda, deret huruf katakana dan contoh pemakaian', NULL, NULL, 1, 2, 18, 543, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:09:11', 1, '2023-08-31 10:09:11', 1),
(575, 'pola kalimat: …. desu; ……..ja arimasen, introduction to Kanji', NULL, NULL, 1, 2, 18, 544, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:09:36', 1, '2023-08-31 10:09:36', 1),
(576, 'Pola kalimat: …ka…ka; …no…desu.\r\nKarakter kanji yang berasal dari benda sekitar.\r\n', NULL, NULL, 1, 2, 18, 545, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:10:18', 1, '2023-08-31 10:10:18', 1),
(577, 'Pola kalimat: koko-soko-asoko…desu.\r\nGoresan dasar kanji dan arah goresannya.', NULL, NULL, 1, 2, 18, 546, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:10:52', 1, '2023-08-31 10:10:52', 1),
(578, 'Pola kalimat: …masen; ….masendeshita\r\nBagian kanji', NULL, NULL, 1, 2, 18, 547, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:11:19', 1, '2023-08-31 10:11:19', 1),
(579, 'Pola kalimat: ……desuyo; …………masuyo\r\nMengenali bagian-bagian kanji', NULL, NULL, 1, 2, 18, 548, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:11:54', 1, '2023-08-31 10:11:54', 1),
(580, 'Pola kalimat: ….masenka?; ………..masuyo\r\n10 kanji dasar', NULL, NULL, 1, 2, 18, 549, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:12:42', 1, '2023-08-31 10:12:42', 1),
(581, 'Pola kalimat: …..ni moraimasu\r\nKanji angka dan harga, satuan uang', NULL, NULL, 1, 2, 18, 550, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:13:08', 1, '2023-08-31 10:13:08', 1),
(582, 'Pola kalimat: …..dou desuka? ; donna…\r\nKanji berhubungan dengan profesi', NULL, NULL, 1, 2, 18, 551, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:13:32', 1, '2023-08-31 10:13:32', 1),
(583, 'Pola kalimat: penggunaan yoku, daitai, takusan\r\nKanji tentang waktu', NULL, NULL, 1, 2, 18, 552, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:14:53', 1, '2023-08-31 10:14:53', 1),
(584, 'Pola kalimat: arimasu/imasu.\r\nKanji tentang kendaraan dan tempat umum', NULL, NULL, 1, 2, 18, 553, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:15:46', 1, '2023-08-31 10:15:46', 1),
(585, 'Pola kalimat: menghitung satuan benda\r\nKanji tentang warna dan ukuran', NULL, NULL, 1, 2, 18, 554, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:16:08', 1, '2023-08-31 10:16:08', 1),
(586, 'Pola kalimat: …ni…kai\r\nKanji tentang makanan dan orangtua', NULL, NULL, 1, 2, 18, 555, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:16:33', 1, '2023-08-31 10:16:33', 1),
(587, 'Pola kalimat: …hoshii desu/…tai desu.\r\nKanji laki-laki-perempuan, lokasi.', NULL, NULL, 1, 2, 18, 556, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:16:57', 1, '2023-08-31 10:16:57', 1),
(588, 'Pola kalimat: …te kudasai/te imasu\r\nKanji berhubungan dengan kata kerja', NULL, NULL, 1, 2, 18, 557, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:17:31', 1, '2023-08-31 10:17:31', 1),
(589, 'Pola kalimat: …temo iidesu/te wa ikemasen.\r\nKanji kata benda sehari-hari', NULL, NULL, 1, 2, 18, 558, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:17:57', 1, '2023-08-31 10:17:57', 1),
(590, 'Pola kalimat: ..te kara.\r\nKanji kata kerja (bagian 2)', NULL, NULL, 1, 2, 18, 559, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:18:21', 1, '2023-08-31 10:18:21', 1),
(591, 'Pola kalimat: nakereba narimasen, nakutemo iidesu.\r\nKanji kata kerja (bagian 3)\r\n', NULL, NULL, 1, 2, 18, 560, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:18:44', 1, '2023-08-31 10:18:44', 1),
(592, 'Pola kalimat: ..ga dekimasu, ..mae ni\r\nKanji kata sifat', NULL, NULL, 1, 2, 18, 561, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:19:08', 1, '2023-08-31 10:19:08', 1),
(593, 'Pola kalimat: …ta koto ga arimasu.\r\nKanji kata sifat 2', NULL, NULL, 1, 2, 18, 562, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:19:28', 1, '2023-08-31 10:19:28', 1),
(594, 'Pola kalimat: bahasa bertingkat  untuk bentuk sopan dan biasa\r\nKanji arah mata angin', NULL, NULL, 1, 2, 18, 563, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:19:49', 1, '2023-08-31 10:19:49', 1),
(595, 'Pola kalimat: …to omoimasu; …to iimasu.\r\nKanji kata kerja (bagian 4)', NULL, NULL, 1, 2, 18, 564, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:20:09', 1, '2023-08-31 10:20:09', 1),
(596, 'Pola kalimat: kata kerja bentuk kamus\r\nKanji nama tempat umum', NULL, NULL, 1, 2, 18, 565, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:20:31', 1, '2023-08-31 10:20:31', 1),
(597, 'pola kalimat: ….toki\r\nKanji  musim, fasilitas umum\r\n', NULL, NULL, 1, 2, 18, 566, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:20:54', 1, '2023-08-31 10:20:54', 1),
(598, 'Pola kalimat: agemasu/moraimasu/kuremasu\r\nKanji hubungan persaudaraan', NULL, NULL, 1, 2, 18, 567, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:21:17', 1, '2023-08-31 10:21:17', 1),
(599, 'Pola kalimat: ..tara\r\nKanji Kata kerja (bagian 5)', NULL, NULL, 1, 2, 18, 568, NULL, NULL, NULL, NULL, 1, '2023-08-31 10:21:38', 1, '2023-08-31 10:21:38', 1),
(600, 'coba add child yg keduaaaaa', NULL, NULL, 1, 2, 1, 1, NULL, NULL, NULL, 'halo saya coba addd di backend , EDITTTTT DI CMSS', 1, '2023-09-08 08:13:58', 1, '2023-09-11 06:45:51', 1),
(602, 'COBAAAAAAA PARENTTTTTT ADDD DI BACKEND', NULL, NULL, 10, 1, 1, NULL, NULL, NULL, NULL, 'COBAAAAAA ADDD PERTAMAAAAAAA DI BACKKKENDDDDD , EDITTTT DR CMSSS', 0, '2023-09-08 08:50:22', 1, '2023-09-11 06:45:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_module_discussion`
--

CREATE TABLE `course_module_discussion` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_module_id` int(11) NOT NULL,
  `course_module_discussion_id` int(11) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_package`
--

CREATE TABLE `course_package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fake_price` int(11) NOT NULL,
  `price` double NOT NULL,
  `payment_link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_package`
--

INSERT INTO `course_package` (`id`, `name`, `fake_price`, `price`, `payment_link`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Paket 1', 0, 2000000, NULL, '', 0, '2022-09-26 11:02:01', 1, '2023-08-28 15:07:36', 1),
(2, 'Paket 1', 0, 9000000, 'https://invoice.xendit.co/od/bcp-p01', '', 1, '2022-09-26 11:02:35', 1, '2023-08-28 15:07:40', 1),
(3, 'Paket 2', 0, 25000000, 'https://invoice.xendit.co/od/bcp-p02', '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:07:44', 1),
(4, 'COBAAAA', 1, 1, NULL, 'COBAAAAA ADD DARI CMSSS , EDITTTTT DARI CMS', 0, '2023-09-11 03:53:40', 1, '2023-09-11 03:54:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_package_benefit`
--

CREATE TABLE `course_package_benefit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_package_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_package_benefit`
--

INSERT INTO `course_package_benefit` (`id`, `name`, `course_package_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(8, 'Lebih dari 60 sesi pembelajaran total (pembelajaran mandiri dan langsung)', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:08:32', 1),
(9, 'Sesi karir dan softskill yang intensif', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:08:53', 1),
(10, 'Akses belajar tanpa batas', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:09:07', 1),
(11, '4 Proyek nyata untuk portofolio Anda', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:09:23', 1),
(12, '\nPenilaian Profiler Karir', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:09:54', 1),
(13, 'Service Job-Connector seumur hidup', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:10:55', 1),
(14, 'Lebih dari 60 sesi pembelajaran total (pembelajaran mandiri dan langsung)', 1, '', 1, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:14', 1),
(15, 'Sesi karir dan softskill yang intensif', 1, '', 1, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:24', 1),
(16, 'Akses belajar tanpa batas', 1, '', 1, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:36', 1),
(17, '4 Proyek nyata untuk portofolio Anda', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:45', 1),
(18, '\nPenilaian Profiler Karir', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:55', 1),
(19, 'Service Job-Connector seumur hidup', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-08-28 15:12:06', 1),
(20, 'Lebih dari 60 sesi pembelajaran total (pembelajara...', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:25', 1),
(21, 'Sesi karir dan softskill yang intensif', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:33', 1),
(22, 'Akses belajar tanpa batas', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:42', 1),
(23, '4 Proyek nyata untuk portofolio Anda', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:50', 1),
(24, '\nPenilaian Profiler Karir', 2, '', 0, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:58', 1),
(25, 'Service Job-Connector seumur hidup', 2, '', 0, '2022-09-26 14:04:51', 1, '2023-08-28 15:13:08', 1),
(26, 'COBAAAAAAAAAAAAA', 4, 'COBAAAAA ADDDD DARIII CMSSSS , EDITTTTT DRRRR CMSSSS', 0, '2023-09-11 03:54:26', 1, '2023-09-11 04:03:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_tutor`
--

CREATE TABLE `course_tutor` (
  `course_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tutor`
--

INSERT INTO `course_tutor` (`course_id`, `users_id`) VALUES
(1, 20),
(1, 20),
(1, 20),
(1, 20),
(3, 15),
(3, 15),
(3, 15),
(3, 15),
(3, 21),
(3, 21),
(3, 21),
(3, 21),
(14, 16),
(14, 16),
(14, 16),
(14, 16),
(18, 17),
(18, 17),
(18, 17),
(18, 17),
(19, 14),
(19, 14),
(19, 14),
(19, 14),
(19, 18),
(19, 18),
(19, 18),
(19, 18);

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `name`, `value`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'nama_lengkap', 'Maxy Academy', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(2, 'nama_singkat', 'Maxy', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(3, 'alamat_lengkap', 'Woodland 9 No 19, Surabaya', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(4, 'alamat', 'Woodland 9 No 19', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(5, 'alamat2', 'Surabaya, Jawa Timur', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(6, 'alamat3', 'Indonesia', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(7, 'nama_contact', 'magangku', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(8, 'telepon', '628113955599', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(9, 'logo', '/img/maxy.png', NULL, 1, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(10, 'email', 'people@maxy.academy', NULL, 1, '2023-05-11 15:01:54', 1, '2022-09-14 08:42:06', 1),
(12, 'facebook', 'https://www.facebook.com/maxy.academy', NULL, 1, '2023-05-11 15:01:54', 1, '2022-09-15 07:27:42', 1),
(13, 'instagram', 'http://www.instagram.com/maxy.academy', NULL, 1, '2023-05-11 15:01:54', 1, '2022-09-15 07:27:42', 1),
(14, 'twitter', 'https://twitter.com/maxy_academy', NULL, 1, '2023-05-11 15:01:54', 1, '2022-09-15 07:27:42', 1),
(15, 'pesan_wa', 'https://wa.me/628113955599/?text=Hi%20Maxy%20Academy%21%20Mau%20nanya-nanya%20dong..%0D%0A%0D%0ANama%3A%0D%0AEmail%3A%0D%0AUniversitas%3A%0D%0ASemester%3A%0D%0AJurusan%3A%0D%0A%0D%0AThank%20you%21', NULL, 1, '2023-05-11 15:01:54', 1, '2023-01-26 09:02:00', 1),
(16, 'icon', 'uploads/general/e3c245477d20e5f0f3f00fa34b09e0a9.png', NULL, 0, '2023-05-11 15:01:54', 1, '2023-01-30 11:47:00', 1),
(17, 'tiktok', 'https://www.tiktok.com/@maxy.academy?_t=8XjFgVmDMOY&_r=1', NULL, 1, '2023-05-11 15:01:54', 1, '2023-02-10 09:36:00', 1),
(18, 'alamat_footer', '<p><span class=\"fw-semibold\">Jakarta HQ</span><br /> Pakuwon Tower 26-J<br /> Jl. Casablanca Raya No.88<br /> Jakarta Selatan, DKI Jakarta 12960<br /> <br /> <span class=\"fw-semibold\">Surabaya</span><br /> Ciputra World Office 15(15-16)<br /> Jl. Mayjen Sungkono Kav.89<br /> Surabaya, Jawa Timur 60224</p>', NULL, 0, '2023-05-11 15:01:54', 1, '2023-02-10 09:36:00', 1),
(19, 'linkedin', 'https://www.linkedin.com/company/maxyacademy/', NULL, 1, '2023-05-11 15:01:54', 1, '2023-02-10 09:36:00', 1),
(20, 'nama_badan_usaha', 'PT Linkdataku Solusi Indonesia', NULL, 0, '2023-05-11 15:01:54', 1, '2023-02-10 09:36:00', 1),
(21, 'alamat_sby', 'Surabaya HQ', NULL, 1, NULL, 1, '2023-06-26 08:59:50', 1),
(22, 'alamat_sby_lengkap', '<br>\nCiputra World Office 15(15-16) <br>\nJl. Mayjen Sungkono Kav.89 <br>\nSurabaya, Jawa Timur 60224</p>', NULL, 1, NULL, 1, '2023-06-26 09:02:03', 1),
(23, 'alamat_jkt', 'Jakarta HQ', NULL, 1, NULL, 1, '2023-06-26 09:02:03', 1),
(24, 'alamat_jkt_lengkap', '<br>\r\nPakuwon Tower 26-J\r\n<br>\r\nJl. Casablanca Raya No.88 <br>\r\nJakarta Selatan, DKI Jakarta 12960', NULL, 1, NULL, 1, '2023-06-26 09:02:03', 1),
(25, 'maxyurl', 'https://www.maxy.academy', NULL, 1, NULL, 1, '2023-06-28 03:18:52', 1),
(26, 'COBAAAAAAAA', 'COBAAAAAAAAAA', 'COBAAAAAAAAA ADDD DR CMSSSSS , EDITTTTTT DR CMSSS', 0, '2023-09-11 04:30:17', 1, '2023-09-11 04:30:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `external_id` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `method` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `channel` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `merchant_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `net_amount` int(11) DEFAULT NULL,
  `currency` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `payer_email` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `payment_destination` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_id` int(11) DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `external_id`, `method`, `channel`, `merchant_name`, `amount`, `net_amount`, `currency`, `payer_email`, `payment_destination`, `paid_at`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(6436, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'QR_CODE', 'QRIS', 'Maxy Academy', 99000, 99000, 'IDR', 'elvynawelda04@gmail.com', '-', '2023-04-12 09:05:00', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6437, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'BANK_TRANSFER', 'BNI', 'Maxy Academy', 99000, 99000, 'IDR', 'gaapgwayan@gmail.com', '8930323489556145', '2023-04-12 23:59:16', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6436, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'QR_CODE', 'QRIS', 'Maxy Academy', 99000, 99000, 'IDR', 'elvynawelda04@gmail.com', '-', '2023-04-12 09:05:00', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6437, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'BANK_TRANSFER', 'BNI', 'Maxy Academy', 99000, 99000, 'IDR', 'gaapgwayan@gmail.com', '8930323489556145', '2023-04-12 23:59:16', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6436, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'QR_CODE', 'QRIS', 'Maxy Academy', 99000, 99000, 'IDR', 'elvynawelda04@gmail.com', '-', '2023-04-12 09:05:00', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6437, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'BANK_TRANSFER', 'BNI', 'Maxy Academy', 99000, 99000, 'IDR', 'gaapgwayan@gmail.com', '8930323489556145', '2023-04-12 23:59:16', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6436, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'QR_CODE', 'QRIS', 'Maxy Academy', 99000, 99000, 'IDR', 'elvynawelda04@gmail.com', '-', '2023-04-12 09:05:00', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1),
(6437, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'BANK_TRANSFER', 'BNI', 'Maxy Academy', 99000, 99000, 'IDR', 'gaapgwayan@gmail.com', '8930323489556145', '2023-04-12 23:59:16', NULL, 1, '2023-05-17 03:36:17', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maxy_talk`
--

CREATE TABLE `maxy_talk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `register_link` varchar(255) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `maxy_talk_parent_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maxy_talk`
--

INSERT INTO `maxy_talk` (`id`, `name`, `img`, `start_date`, `end_date`, `register_link`, `priority`, `users_id`, `maxy_talk_parent_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Personal Finance Management', NULL, '2023-07-03 06:53:32', '2023-07-03 06:53:32', NULL, 0, 1, NULL, NULL, 0, '2023-07-03 11:57:26', 1, '2023-07-03 11:57:26', 1),
(2, 'Setting Financial Goals', NULL, '2023-07-03 06:53:32', '2023-07-03 06:53:32', NULL, 1, 1, 1, NULL, 0, '2023-07-03 11:57:26', 1, '2023-07-06 15:13:34', 1),
(3, 'Creating a Budget', NULL, '2023-07-03 06:53:32', '2023-07-03 06:53:32', NULL, 2, 1, 1, 'Creating a budget is an essential part of managing personal finances. Students can be taught how to create a\r\nbudget, how to track their expenses, and how to adjust their budget based on changes in income or expenses', 0, '2023-07-03 11:57:26', 1, '2023-07-06 15:13:34', 1),
(4, 'Saving for Emergencies', NULL, '2023-07-03 06:53:32', '2023-07-03 06:53:32', NULL, 3, 1, 1, NULL, 0, '2023-07-03 11:57:26', 1, '2023-07-06 15:13:34', 1),
(5, 'Investing', NULL, '2023-07-03 06:53:32', '2023-07-03 06:53:32', NULL, 4, 1, 1, NULL, 0, '2023-07-03 11:57:26', 1, '2023-07-06 15:13:34', 1),
(7, 'How to speak Javanese like a Local!', NULL, '2023-07-06 16:23:00', '2023-07-06 18:24:00', NULL, 1, 4, NULL, NULL, 0, '2023-07-06 09:24:07', 1, '2023-07-06 09:24:07', 1),
(8, 'How to speak Javanese like a Local 2!', NULL, '2023-07-06 16:27:00', '2023-07-07 16:27:00', NULL, 2, 4, NULL, NULL, 1, '2023-07-06 09:27:40', 1, '2023-07-06 09:27:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_certification`
--

CREATE TABLE `member_certification` (
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_credential` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_credential` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_education`
--

CREATE TABLE `member_education` (
  `name` varchar(255) NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `fields_of_study` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_education`
--

INSERT INTO `member_education` (`name`, `degree`, `fields_of_study`, `score`, `start_date`, `end_date`, `user_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
('Universitas Dinamika', '-', 'Information Technology', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas', '-', 'Computer Science', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas Dinamika', '-', 'Information Technology', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas', '-', 'Computer Science', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas Dinamika', '-', 'Information Technology', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas', '-', 'Computer Science', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas Dinamika', '-', 'Information Technology', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Universitas', '-', 'Computer Science', '4', '2023-01-25', '2023-01-25', 24, '', 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_experience`
--

CREATE TABLE `member_experience` (
  `name` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_organization`
--

CREATE TABLE `member_organization` (
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_parent`
--

CREATE TABLE `member_parent` (
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `job` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_parent`
--

INSERT INTO `member_parent` (`name`, `phone`, `job`, `address`, `user_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
('Adi', '085', 'CTO', 'Jl. Gunung Sari', 15, NULL, 1, '2023-01-23 09:06:43', 1, '2023-01-23 09:06:43', 1),
('Lia', '087', 'PNS', 'Jl. Gunung Sari', 15, NULL, 1, '2023-01-23 09:06:43', 1, '2023-01-23 09:06:43', 1),
('Karyo', '789', 'PNS', 'Jl. Manukan', 16, NULL, 1, '2023-01-23 10:52:18', 1, '2023-01-23 10:52:18', 1),
('Poppyy', '8989', 'PNS', 'Jl. Manukan', 16, NULL, 1, '2023-01-23 10:52:18', 1, '2023-01-23 10:52:18', 1),
('Adi', '085', 'PNS', 'Jl. Sukodono', 18, NULL, 1, '2023-01-24 19:56:44', 1, '2023-01-24 19:56:44', 1),
('Tya', '089', 'PNS', 'Jl. Sukodono', 18, NULL, 1, '2023-01-24 19:56:44', 1, '2023-01-24 19:56:44', 1),
('Adi', '085', 'PNS', 'Jl. Sukodono', 17, NULL, 1, '2023-01-24 19:57:11', 1, '2023-01-24 19:57:11', 1),
('Tya', '089', 'PNS', 'Jl. Sukodono', 17, NULL, 1, '2023-01-24 19:57:11', 1, '2023-01-24 19:57:11', 1),
('Bayu', '123456', 'Staff IT', 'Jl. Dukuh Menanggal', 19, NULL, 1, '2023-01-24 20:00:03', 1, '2023-01-24 20:00:03', 1),
('Windy', '12345678', 'PNS', 'Jl. Dukuh Menanggal', 19, NULL, 1, '2023-01-24 20:00:03', 1, '2023-01-24 20:00:03', 1),
('Oki', '12345', 'PNS', 'Jl. Pagesangan', 20, NULL, 1, '2023-01-25 00:47:48', 1, '2023-01-25 00:47:48', 1),
('Oki 2', '123456', 'PNS', 'Jl. Pagesangan', 20, NULL, 1, '2023-01-25 00:47:48', 1, '2023-01-25 00:47:48', 1),
('Oki', '12345', 'PNS', 'Jl. Pagesangan', 21, NULL, 1, '2023-01-25 00:48:32', 1, '2023-01-25 00:48:32', 1),
('Oki 2', '123456', 'PNS', 'Jl. Pagesangan', 21, NULL, 1, '2023-01-25 00:48:32', 1, '2023-01-25 00:48:32', 1),
('Oki', '12345', 'PNS', 'Jl. Pagesangan', 22, NULL, 1, '2023-01-25 00:48:51', 1, '2023-01-25 00:48:51', 1),
('Oki 2', '123456', 'PNS', 'Jl. Pagesangan', 22, NULL, 1, '2023-01-25 00:48:51', 1, '2023-01-25 00:48:51', 1),
('Oki', '12345', 'PNS', 'Jl. Pagesangan', 23, NULL, 1, '2023-01-25 00:49:33', 1, '2023-01-25 00:49:33', 1),
('Oki 2', '123456', 'PNS', 'Jl. Pagesangan', 23, NULL, 1, '2023-01-25 00:49:33', 1, '2023-01-25 00:49:33', 1),
('Oki', '12345', 'PNS', 'Jl. Pagesangan', 24, NULL, 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1),
('Oki 2', '123456', 'PNS', 'Jl. Pagesangan', 24, NULL, 1, '2023-01-25 00:50:20', 1, '2023-01-25 00:50:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_portfolio`
--

CREATE TABLE `member_portfolio` (
  `name` varchar(255) NOT NULL,
  `url_portfolio` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_skill`
--

CREATE TABLE `member_skill` (
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_skill`
--

INSERT INTO `member_skill` (`name`, `user_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
('PHP', 18, '', 1, '2023-01-24 19:56:44', 1, '2023-01-24 19:56:44', 1),
('JAVA', 18, '', 0, '2023-01-24 19:56:44', 1, '2023-01-24 19:56:44', 1),
('Javascript', 18, '', 0, '2023-01-24 19:56:44', 1, '2023-01-24 19:56:44', 1),
('PHP', 17, '', 1, '2023-01-24 19:57:11', 1, '2023-01-24 19:57:11', 1),
('Laravel', 19, '', 1, '2023-01-24 20:00:03', 1, '2023-01-24 20:00:03', 1),
('Vanilla JS', 19, '', 1, '2023-01-24 20:00:03', 1, '2023-01-24 20:00:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_submission`
--

CREATE TABLE `member_submission` (
  `name` varchar(255) NOT NULL,
  `activity_status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `course_class_module_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_testimonial`
--

CREATE TABLE `member_testimonial` (
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status_highlight` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member_testimonial`
--

INSERT INTO `member_testimonial` (`id`, `stars`, `role`, `status_highlight`, `user_id`, `course_id`, `course_class_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 'Backend Developer Intern', 0, 2, 0, 1, 'Metode belajarnya tidak membosankan karena pengajarnya dari praktisi data di perusahaan besar, sehingga business case dan insight data-nya sangat relate banget sama waktu sekarang.', NULL, '2022-09-26 11:29:21', '2023-01-18 11:32:44'),
(3, 5, 'Frontend Developer Intern', 0, 3, 0, 2, 'Di Magangku, saya selalu menemukan hal baru untuk dipelajari dan bisa langsung mengaplikasikannya di dalam pekerjaan saya saat ini. Setelah lulus, saya lebih percaya diri ketika melihat kualifikasi yang diminta perusahaan, sehingga percaya diri untuk apply di beberapa job posting. Berbekal pengetahuan dari bootcamp, saya jadi paham apa yang harus dikerjakan saat technical test dari recruiter dan terbukti, akhirnya saya berhasil sebagai lulusan psikologi mendapat offer di salah satu perusahaan di Indonesia sebagai Frontend Engineer.', NULL, '2022-09-26 11:29:21', '2023-01-18 11:32:44'),
(6, 5, 'Backend Developer Intern', 0, 1, 0, 1, 'Selama ikut bootcamp, aku cukup puas karena materinya cukup lengkap dan langsung dijelaskan oleh expert dibidangnya, proses pembelajaran di kelas juga learning by doing karena langsung dipraktekan. Bahkan ada fasilitas kelas untuk pembuatan cv dan bisa dapat portofolio dengan final project.', NULL, '2022-09-28 09:24:22', '2023-01-18 11:32:44'),
(7, 5, 'Alumni Bootcamp Rapid UI/UX Batch 4', 1, 44, 3, 3, 'Overall saya suka selama mengikuti program UI/UX dan banyak insight baru yang aku tau terkait UI/UX. Pokoknya terima kasih banyak untuk MinMax dan mentor yang selalu respon ketika dihubungi via chat. Video pembelajarannya menarik dan materinya kepake banget saat aku magang sekarang. Walaupun durasi videonya cukup panjang tapi penjelasan step by-stepnya mudah dipahami.', 1, '2023-07-03 15:40:32', '2023-07-03 15:42:28'),
(8, 5, 'Alumni Bootcamp Rapid UI/UX Batch 4', 1, 45, 3, 3, 'Awalnya aku gatau tentang UI/UX sama sekali, aku terbantu setelah mengikuti Bootcamp UI/UX di maxy academy karena jadi tau progress membuat website sampai membuat aplikasi menggunakan Figma.', 1, '2023-07-03 15:40:32', '2023-07-03 15:42:28'),
(9, 5, 'Alumni Bootcamp Rapid UI/UX Batch 4', 1, 46, 3, 3, 'Kebetulan dari dulu aku udah pengen belajar UI/UX. Awalnya aku gatau tentang UI/UX,tapi banyak pengetahuan yang bisa aku ambil melalui bootcamp maxy academy. Pokonya seru banget selama 12 hari itu, kita juga dapet Internship jadi belajar real case langsung.', 1, '2023-07-03 15:40:32', '2023-07-03 16:26:00'),
(10, 5, 'COBAAAAAAAAAAAAAAAA', 0, 66, 1, 1, 'COBAAAAAAAAA ADDDDD DI CMSSSS , EDITTTT DI CMSSSS', 0, '2023-09-11 04:16:33', '2023-09-11 11:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `member_transcript`
--

CREATE TABLE `member_transcript` (
  `name` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_transcript`
--

INSERT INTO `member_transcript` (`name`, `score`, `user_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
('Pemrograman Dasar', '90', 14, '', 1, '2023-01-19 10:38:17', 1, '2023-01-19 10:38:17', 1),
('Pemrograman Mobile', '79', 14, '', 1, '2023-01-19 10:38:17', 1, '2023-01-19 10:38:17', 1),
('UI/UX', '87', 15, '', 0, '2023-01-23 09:06:43', 1, '2023-01-23 09:06:43', 1),
('Database', '78', 15, '', 1, '2023-01-23 09:06:43', 1, '2023-01-23 09:06:43', 1),
('Data Mining', '89', 16, '', 1, '2023-01-23 10:52:18', 1, '2023-01-23 10:52:18', 1),
('Data Quality', '89', 18, '', 0, '2023-01-24 19:56:44', 1, '2023-01-24 19:56:44', 1),
('Data Quality', '89', 17, '', 0, '2023-01-24 19:57:11', 1, '2023-01-24 19:57:11', 1),
('UI/UX', '80', 19, '', 1, '2023-01-24 20:00:03', 1, '2023-01-24 20:00:03', 1);

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
(3, '2023_01_18_020722_alter_company_table', 2),
(6, '2023_01_18_014754_create_m_content_carousel_table', 3),
(7, '2023_01_18_042720_alter_member_testimonial_table', 4),
(8, '2014_10_12_000000_create_users_table', 5),
(9, '2014_10_12_100000_create_password_resets_table', 5),
(10, '2019_08_19_000000_create_failed_jobs_table', 5),
(12, '2023_01_19_082526_create_m_section_table', 7),
(13, '2023_01_19_082702_create_m_program_step_table', 8),
(14, '2023_01_19_083003_create_m_button_step_table', 9),
(15, '2023_01_19_074731_create_member_transcript_table', 10),
(16, '2023_01_20_033912_add_support_data_company_table', 11),
(17, '2023_01_20_074844_create_member_parent_table', 12),
(18, '2023_01_20_080612_create_member_skill_table', 13),
(19, '2023_01_20_080447_create_member_education_table', 14),
(20, '2023_01_20_080701_create_member_experience_table', 15),
(21, '2023_01_29_082331_create_member_organization_table', 16),
(22, '2023_01_29_082756_create_member_certification_table', 17),
(23, '2023_01_29_084032_create_member_portfolio_table', 18),
(24, '2023_01_31_022917_create_m_faq_detail_table', 19),
(25, '2023_01_31_022736_create_m_faq_table', 20),
(26, '2023_01_31_072319_create_m_content_carousel_button', 21),
(27, '2023_01_31_073809_delete_column_table_content_carousel', 22),
(28, '2023_02_01_061927_change_table_section_to_page', 23),
(29, '2023_02_02_080757_create_course_module_discussion_table', 24),
(30, '2023_02_02_081040_create_member_post_like_table', 25),
(31, '2023_02_02_080953_create_member_post_table', 26),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 27),
(33, '2023_05_30_044305_add_remember_token_to_member', 27),
(34, '2023_07_06_031438_create_verify_members_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `m_bank`
--

CREATE TABLE `m_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_bank`
--

INSERT INTO `m_bank` (`id`, `name`, `code`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'BANK BRI', '002', '', 1, '2017-10-04 00:00:00', 1, '2022-08-10 11:09:18', 1),
(2, 'BANK EKSPOR INDONESIA', '003', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(3, 'BANK MANDIRI', '008', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(4, 'BANK BNI', '009', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(5, 'BANK DANAMON', '011', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(6, 'PERMATA BANK', '013', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(7, 'BANK BCA', '014', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(8, 'BANK BII', '016', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(9, 'BANK PANIN', '019', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(10, 'BANK ARTA NIAGA KENCANA', '020', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(11, 'BANK NIAGA', '022', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(12, 'BANK BUANA IND', '023', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(13, 'BANK LIPPO', '026', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(14, 'BANK NISP', '028', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(15, 'AMERICAN EXPRESS BANK LTD', '030', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(16, 'CITIBANK N.A.', '031', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(17, 'JP. MORGAN CHASE BANK, N.A.', '032', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(18, 'BANK OF AMERICA, N.A', '033', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(19, 'ING INDONESIA BANK', '034', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(20, 'BANK MULTICOR TBK.', '036', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(21, 'BANK ARTHA GRAHA', '037', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(22, 'BANK CREDIT AGRICOLE INDOSUEZ', '039', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(23, 'THE BANGKOK BANK COMP. LTD', '040', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(24, 'THE HONGKONG & SHANGHAI B.C.', '041', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(25, 'THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(26, 'BANK SUMITOMO MITSUI INDONESIA', '045', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(27, 'BANK DBS INDONESIA', '046', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(28, 'BANK RESONA PERDANIA', '047', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(29, 'BANK MIZUHO INDONESIA', '048', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(30, 'STANDARD CHARTERED BANK', '050', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(31, 'BANK ABN AMRO', '052', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(32, 'BANK KEPPEL TATLEE BUANA', '053', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(33, 'BANK CAPITAL INDONESIA, TBK.', '054', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(34, 'BANK BNP PARIBAS INDONESIA', '057', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(35, 'BANK UOB INDONESIA', '058', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(36, 'KOREA EXCHANGE BANK DANAMON', '059', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(37, 'RABOBANK INTERNASIONAL INDONESIA', '060', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(38, 'ANZ PANIN BANK', '061', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(39, 'DEUTSCHE BANK AG.', '067', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(40, 'BANK WOORI INDONESIA', '068', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(41, 'BANK OF CHINA LIMITED', '069', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(42, 'BANK BUMI ARTA', '076', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(43, 'BANK EKONOMI', '087', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(44, 'BANK ANTARDAERAH', '088', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(45, 'BANK HAGA', '089', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(46, 'BANK IFI', '093', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(47, 'BANK CENTURY, TBK.', '095', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(48, 'BANK MAYAPADA', '097', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(49, 'BANK JABAR', '110', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(50, 'BANK DKI', '111', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(51, 'BPD DIY', '112', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(52, 'BANK JATENG', '113', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(53, 'BANK JATIM', '114', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(54, 'BPD JAMBI', '115', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(55, 'BPD ACEH', '116', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(56, 'BANK SUMUT', '117', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(57, 'BANK NAGARI', '118', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(58, 'BANK RIAU', '119', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(59, 'BANK SUMSEL', '120', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(60, 'BANK LAMPUNG', '121', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(61, 'BPD KALSEL', '122', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(62, 'BPD KALIMANTAN BARAT', '123', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(63, 'BPD KALTIM', '124', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(64, 'BPD KALTENG', '125', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(65, 'BPD SULSEL', '126', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(66, 'BANK SULUT', '127', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(67, 'BPD NTB', '128', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(68, 'BPD BALI', '129', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(69, 'BANK NTT', '130', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(70, 'BANK MALUKU', '131', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(71, 'BPD PAPUA', '132', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(72, 'BANK BENGKULU', '133', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(73, 'BPD SULAWESI TENGAH', '134', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(74, 'BANK SULTRA', '135', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(75, 'BANK NUSANTARA PARAHYANGAN', '145', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(76, 'BANK SWADESI', '146', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(77, 'BANK MUAMALAT', '147', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(78, 'BANK MESTIKA', '151', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(79, 'BANK METRO EXPRESS', '152', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(80, 'BANK SHINTA INDONESIA', '153', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(81, 'BANK MASPION', '157', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(82, 'BANK HAGAKITA', '159', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(83, 'BANK GANESHA', '161', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(84, 'BANK WINDU KENTJANA', '162', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(85, 'HALIM INDONESIA BANK', '164', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(86, 'BANK HARMONI INTERNATIONAL', '166', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(87, 'BANK KESAWAN', '167', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(88, 'BANK TABUNGAN NEGARA (PERSERO)', '200', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(89, 'BANK HIMPUNAN SAUDARA 1906, TBK .', '212', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(90, 'BANK TABUNGAN PENSIUNAN NASIONAL', '213', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(91, 'BANK SWAGUNA', '405', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(92, 'BANK JASA ARTA', '422', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(93, 'BANK MEGA', '426', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(94, 'BANK JASA JAKARTA', '427', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(95, 'BANK BUKOPIN', '441', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(96, 'BANK SYARIAH MANDIRI', '451', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(97, 'BANK BISNIS INTERNASIONAL', '459', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(98, 'BANK SRI PARTHA', '466', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(99, 'BANK JASA JAKARTA', '472', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(100, 'BANK BINTANG MANUNGGAL', '484', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(101, 'BANK BUMIPUTERA', '485', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(102, 'BANK YUDHA BHAKTI', '490', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(103, 'BANK MITRANIAGA', '491', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(104, 'BANK AGRO NIAGA', '494', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(105, 'BANK INDOMONEX', '498', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(106, 'BANK ROYAL INDONESIA', '501', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(107, 'BANK ALFINDO', '503', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(108, 'BANK SYARIAH MEGA', '506', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(109, 'BANK INA PERDANA', '513', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(110, 'BANK HARFA', '517', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(111, 'PRIMA MASTER BANK', '520', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(112, 'BANK PERSYARIKATAN INDONESIA', '521', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(113, 'BANK AKITA', '525', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(114, 'LIMAN INTERNATIONAL BANK', '526', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(115, 'ANGLOMAS INTERNASIONAL BANK', '531', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(116, 'BANK DIPO INTERNATIONAL', '523', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(117, 'BANK KESEJAHTERAAN EKONOMI', '535', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(118, 'BANK UIB', '536', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(119, 'BANK ARTOS IND', '542', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(120, 'BANK PURBA DANARTA', '547', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(121, 'BANK MULTI ARTA SENTOSA', '548', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(122, 'BANK MAYORA', '553', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(123, 'BANK INDEX SELINDO', '555', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(124, 'BANK VICTORIA INTERNATIONAL', '566', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(125, 'BANK EKSEKUTIF', '558', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(126, 'CENTRATAMA NASIONAL BANK', '559', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(127, 'BANK FAMA INTERNASIONAL', '562', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(128, 'BANK SINAR HARAPAN BALI', '564', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(129, 'BANK HARDA', '567', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(130, 'BANK FINCONESIA', '945', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(131, 'BANK MERINCORP', '946', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(132, 'BANK MAYBANK INDOCORP', '947', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(133, 'BANK OCBC – INDONESIA', '948', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(134, 'BANK CHINA TRUST INDONESIA', '949', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(135, 'BANK COMMONWEALTH', '950', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_bank_account`
--

CREATE TABLE `m_bank_account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `m_bank_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_bank_account`
--

INSERT INTO `m_bank_account` (`id`, `account_name`, `account_number`, `m_bank_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'toro', '111', 7, '', 1, '2022-09-13 10:36:57', 1, '2022-09-13 10:36:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_content_carousel`
--

CREATE TABLE `m_content_carousel` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_content_carousel`
--

INSERT INTO `m_content_carousel` (`id`, `name`, `content`, `image`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Jadikan internship kamu momen percepatan karir bersama Maxy Academy', '<p>-</p>', '9312659aa94d6cc375480faec161dd0e.jpg', '<p>Persiapkan internship semester akhirmu dengan magang di perusahaan pilihan dan dapatkan mentorship langsung dari para profesional di bidang yang kamu minati.</p>', 1, '2023-01-18 11:16:00', 1, '2023-02-16 02:21:33', 1),
(2, 'Jadikan internship kamu momen percepatan karir bersama Maxy Academy', '<p>-</p>', '3538eb389c53bd2d78ddbb723df88371.jpg', '<p>Persiapkan internship semester akhirmu dengan magang di perusahaan pilihan dan dapatkan mentorship langsung dari para profesional di bidang yang kamu minati.</p>', 1, '2023-01-18 11:16:00', 1, '2023-02-06 08:25:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_content_carousel_button`
--

CREATE TABLE `m_content_carousel_button` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` text DEFAULT NULL,
  `style` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `content_carousel_id` int(11) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_content_carousel_button`
--

INSERT INTO `m_content_carousel_button` (`id`, `name`, `icon`, `style`, `url`, `content_carousel_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(4, 'Programs', '', 'outline-primary-c', '#modalCarousel', 1, '', 0, '2023-02-06 08:25:40', 1, '2023-02-06 08:25:40', 1),
(5, 'Contact Us', '', 'primary-c', 'https://api.whatsapp.com/send?phone=628113955599&text=Hi%20MinMax!%F0%9F%99%8B%F0%9F%8F%BB%E2%80%8D%E2%99%80%0AMau%20nanya%20caranya%20ikut%20bootcamp%20di%20Maxy%C2%A0Academy%C2%A0dong', 1, '', 1, '2023-02-06 08:25:40', 1, '2023-02-06 08:25:40', 1),
(6, 'Programs', '', 'outline-primary-c', '#modalCarousel', 1, '', 1, '2023-02-16 02:21:33', 1, '2023-02-16 02:21:33', 1),
(7, 'Contact Us', '', 'primary-c', 'https://api.whatsapp.com/send?phone=628113955599&text=Hi%20MinMax!%F0%9F%99%8B%F0%9F%8F%BB%E2%80%8D%E2%99%80%0AMau%20nanya%20caranya%20ikut%20bootcamp%20di%20Maxy%C2%A0Academy%C2%A0dong', 1, '', 1, '2023-02-16 02:21:33', 1, '2023-02-16 02:21:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_content_faq`
--

CREATE TABLE `m_content_faq` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` enum('title','parent','child') NOT NULL,
  `content_faq_id` int(11) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_content_faq`
--

INSERT INTO `m_content_faq` (`id`, `name`, `type`, `content_faq_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Bootcamp', 'title', NULL, '', 1, '2023-01-31 03:49:39', 1, '2023-01-31 04:05:42', 1),
(2, 'Magang', 'title', NULL, '', 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(3, 'Pendaftaran', 'title', NULL, '', 1, '2023-01-31 03:54:35', 1, '2023-01-31 03:54:35', 1),
(4, 'Pembayaran', 'title', NULL, '', 1, '2023-01-31 03:55:56', 1, '2023-01-31 04:34:22', 1),
(5, '<p>Setelah menyelesaikan bootcamp, apakah saya akan dibantu mendapatkan magang?</p>', 'parent', 2, '', 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(6, '<p>Apakah saya bisa memilih magang secara onsite atau online?</p>', 'parent', 2, '', 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(7, '<p>Apakah saya bisa memilih perusahaan partner Maxy Academy untuk magang?</p>', 'parent', 2, '', 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(8, '<p>Setelah menyelesaikan magang, apakah saya akan dibantu mendapatkan full time job?</p>', 'parent', 2, '', 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(9, '<p>Bagaimana cara mendaftar bootcamp di Maxy Academy?</p>', 'parent', 3, '', 1, '2023-01-31 03:54:35', 1, '2023-01-31 03:54:35', 1),
(10, '<p>Bagaimana caranya saya bisa mendapatkan scholarship up to 100%?</p>', 'parent', 3, '', 1, '2023-01-31 03:54:35', 1, '2023-01-31 03:54:35', 1),
(11, '<p>Saya masih dibawah semester 5, bisa join Maxy Academy nggak ya?</p>', 'parent', 3, '', 0, '2023-01-31 03:54:35', 1, '2023-01-31 03:54:35', 1),
(12, '<p>Apa itu bootcamp Maxy Academy?</p>', 'parent', 1, '', 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(13, '<p>Siapa yang bisa ikut Maxy Academy?</p>', 'parent', 1, '', 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(15, '<p>Apa saja yang dipelajari di bootcamp Maxy Academy ini?</p>', 'parent', 1, '', 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(16, '<p>Bagaimana tahapan bootcamp di Maxy Academy?</p>', 'parent', 1, '', 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(17, '<p>Apakah saya harus punya latar belakang IT?</p>', 'parent', 1, '', 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(18, '<p>Berapa lama bootcamp di Maxy Academy?</p>', 'parent', 1, '', 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(19, '<p>Apa saja metode pembayarannya?</p>', 'parent', 4, '', 0, '2023-01-31 04:34:22', 1, '2023-01-31 04:34:22', 1),
(20, '<p>Cara pembayarannya bisa melalui apa saja?</p>', 'parent', 4, '', 0, '2023-01-31 04:34:22', 1, '2023-01-31 04:34:22', 1),
(21, '<p>Apakah ada program cicilan?</p>', 'parent', 4, '', 1, '2023-01-31 04:34:22', 1, '2023-01-31 04:34:22', 1),
(22, '<p>Ya, kamu akan dibantu mendapatkan magang di perusahaan partner Maxy Academy apabila mengambil paket bootcamp Coaching atau Mentoring.</p>', 'child', 5, NULL, 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(23, '<p>Pelaksanaan magang secara onsite atau online tergantung pada kebijakan masing-masing perusahaan.</p>', 'child', 6, NULL, 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(24, '<p>Mahasiswa harus mengikuti proses matchmaking terlebih dahulu yang akan dilakukan dalam proses bootcamp.</p>', 'child', 7, NULL, 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(25, '<p>Iya, namun terdapat biaya tambahan. Untuk detail lebih lanjut silahkan hubungi kami.</p>', 'child', 8, NULL, 1, '2023-01-31 03:53:35', 1, '2023-01-31 03:53:35', 1),
(26, '<p>Registrasi melalui website https://maxy.academy atau Whatsapp Maxy Academy (https://wa.me/628113955599) dan isi form pendaftaran kami. Selanjutnya, team Maxy Academy akan menghubungi lebih lanjut untuk proses setelah pendaftaran,</p>', 'child', 9, NULL, 1, '2023-01-31 03:54:35', 1, '2023-01-31 03:54:35', 1),
(27, '<p>Kamu bisa mengikuti placement test secara online terlebih dahulu, waktu pengerjaan 60 menit. Hubungi Whatsapp Maxy Academy (https://wa.me/628113955599) untuk mengikuti placement test.</p>', 'child', 10, NULL, 1, '2023-01-31 03:54:35', 1, '2023-01-31 03:54:35', 1),
(28, '<p>Program pelatihan technology dan digital yang dilakukan secara intensif selama 1 bulan untuk mempersiapkan mahasiswa yang mampu menjawab kebutuhan industri.</p>', 'child', 12, NULL, 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(29, '<p>Mahasiswa semester 5 hingga fresh graduate.</p>', 'child', 13, NULL, 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(30, '<p>Mahasiswa bisa belajar Backend, Frontend, UI/UX, Digital Marketing, Product Management, dan Data Science di Maxy Academy.</p>', 'child', 15, NULL, 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(31, '<p>Mahasiswa akan mengikuti bootcamp selama 1 bulan dengan durasi 2 jam setiap harinya pada hari Senin hingga Jumat. Setiap akhir materi pembelajaran, mahasiswa akan diberikan assessment untuk mempraktekkan ilmu yang diperoleh. Pada 2 minggu pertama bootcamp, mahasiswa akan melakukan matchmaking dengan perusahaan. Kemudian pada minggu ke-3, mahasiswa telah mendapat list perusahaan mana yang cocok dan ingin menjadikan intern. Setelah menyelesaikan bootcamp di minggu ke-4, mahasiswa dapat memulai magang di perusahaan.</p>', 'child', 16, NULL, 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(32, '<p>Untuk kelas Backend dan Frontend disarankan memiliki latar belakang IT.</p>', 'child', 17, NULL, 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(33, '<p>Mahasiswa akan mengikuti bootcamp secara intensif selama 1 bulan.</p>', 'child', 18, NULL, 1, '2023-01-31 04:05:42', 1, '2023-01-31 04:05:42', 1),
(34, '<p>Ada, menggunakan Edufund program cicilan hingga 12x dengan bunga yang terjangkau.</p>', 'child', 21, NULL, 1, '2023-01-31 04:34:22', 1, '2023-01-31 04:34:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_content_page`
--

CREATE TABLE `m_content_page` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_content_page`
--

INSERT INTO `m_content_page` (`id`, `name`, `heading`, `title`, `slug`, `type`, `meta_keyword`, `meta_description`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'featured_class', 'Kelas Unggulan', NULL, NULL, 'SECTION', NULL, NULL, '<p>Cek program kami yang telah terbukti membantu siswa dalam mendapatkan pekerjaan impian</p>', 1, '2023-01-19 15:49:00', 1, '2023-01-19 15:49:00', 1),
(2, 'why', 'Kenapa harus Maxy Academy?', NULL, NULL, 'SECTION', NULL, NULL, '<p>Praktek magang melalui Maxy Academy tidak hanya sekedar untuk memenuhi tuntutan kuliah, namun dirancang untuk menjadi gerbang menuju karir impian. Melalui fitur Online Bootcamp Academy, calon intern akan mendapatkan pelatihan dengan mentor profesional sebelum praktek magang. Selama magang, kamu juga akan dibimbing untuk menjadikan pengalaman kamu sebagai portfolio kamu dalam mendapatkan karir impian.</p>', 1, '2023-01-19 15:49:00', 1, '2023-01-19 15:49:00', 1),
(3, 'company', '', NULL, NULL, 'SECTION', NULL, NULL, '<p>Kami menjamin posisi magang di berbagai perusahaan ternama seperti:</p>', 1, '2023-01-20 09:37:25', 1, '2023-01-20 09:37:25', 1),
(4, 'partner', ' ', NULL, NULL, 'SECTION', NULL, NULL, '<p>Maxy Academy juga berpartner dengan beberapa organisasi pemerintah, pendidikan, dan teknologi untuk menyediakan mentor profesional:</p>', 1, '2023-01-20 09:39:06', 1, '2023-01-20 09:39:06', 1),
(5, 'step', 'Lewat Maxy Academy, kamu akan melalui tiga tahapan program berikut:', NULL, NULL, 'SECTION', NULL, NULL, NULL, 1, '2023-01-20 09:39:44', 1, '2023-01-20 09:39:44', 1),
(6, 'certificate', 'Sertifikasi kami', NULL, NULL, 'SECTION', NULL, NULL, '<p>Maxy Academy menyediakan NFT Certificate untuk program bootcamp serta NFT Certificate untuk workplace dan mentor bagi para intern yang menjalani program magang. Sertifikasi yang diterima para intern ini dapat menjadi bekal untuk membangun resume profesional untuk karir masa depan.</p>', 1, '2023-01-20 09:40:38', 1, '2023-02-03 05:52:56', 1),
(7, 'package', 'Paket yang bisa kamu pilih', NULL, NULL, 'SECTION', NULL, NULL, NULL, 1, '2023-01-20 09:41:09', 1, '2023-01-20 09:41:09', 1),
(8, 'university', ' ', NULL, NULL, 'SECTION', NULL, NULL, '<p>Lewat kerjasama dengan beberapa universitas unggulan berikut, posisi magang di perusahaan terpilih terjamin bagi para mahasiswa</p>', 1, '2023-01-20 09:41:31', 1, '2023-02-03 05:50:58', 1),
(9, 'testimonial', 'Apa Kata Alumni Maxy Academy?', NULL, NULL, 'SECTION', NULL, NULL, NULL, 1, '2023-01-20 09:42:08', 1, '2023-01-20 09:42:08', 1),
(10, 'section_testing', 'Heading Testing', NULL, NULL, 'SECTION', NULL, NULL, '<div class=\"row text-danger\">\n<div class=\"col-md-12\">aaaa</div>\n</div>', 1, '2023-02-01 08:46:29', 1, '2023-02-01 08:46:29', 1),
(11, 'page_testing', NULL, 'Page Testing', 'page-testing', 'PAGE', 'Page Testing', 'Ini adalah page testing', '<p>Tesss</p>', 1, '2023-02-01 08:47:45', 1, '2023-02-01 08:47:45', 1),
(12, 'faq_testing', NULL, 'FAQ', 'faq-testing', 'PAGE', 'FaQ', 'FaQ seputar Maxy Academy', '<div class=\"row justify-content-between\">\n<div class=\"col-12\">\n<h2 class=\"mb-5 color-primary fw-bold\">FAQ</h2>\n</div>\n<div class=\"col-md-12\">\n<div id=\"accordionFaq\" class=\"accordion\">\n<div class=\"accordion-item\">\n<h2 id=\"heading-1\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button  collapsed \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-1\" aria-expanded=\"true\" aria-controls=\"collapse-1\"> Bootcamp </a></h2>\n<div id=\"collapse-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-1\" data-bs-parent=\"#accordionFaq\">\n<div class=\"accordion-body\">\n<div id=\"accordion-1\" class=\"accordion\">\n<div class=\"accordion-item\">\n<p>Apa itu bootcamp Maxy Academy?</p>\n<div id=\"collapse-1-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-1-1\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Program pelatihan technology dan digital yang dilakukan secara intensif selama 1 bulan untuk mempersiapkan mahasiswa yang mampu menjawab kebutuhan industri.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Siapa yang bisa ikut Maxy Academy?</p>\n<div id=\"collapse-1-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-2\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa semester 5 hingga fresh graduate.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apa saja yang dipelajari di bootcamp Maxy Academy ini?</p>\n<div id=\"collapse-1-3\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-3\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa bisa belajar Backend, Frontend, UI/UX, Digital Marketing, Product Management, dan Data Science di Maxy Academy.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Bagaimana tahapan bootcamp di Maxy Academy?</p>\n<div id=\"collapse-1-4\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-4\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa akan mengikuti bootcamp selama 1 bulan dengan durasi 2 jam setiap harinya pada hari Senin hingga Jumat. Setiap akhir materi pembelajaran, mahasiswa akan diberikan assessment untuk mempraktekkan ilmu yang diperoleh. Pada 2 minggu pertama bootcamp, mahasiswa akan melakukan matchmaking dengan perusahaan. Kemudian pada minggu ke-3, mahasiswa telah mendapat list perusahaan mana yang cocok dan ingin menjadikan intern. Setelah menyelesaikan bootcamp di minggu ke-4, mahasiswa dapat memulai magang di perusahaan.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apakah saya harus punya latar belakang IT?</p>\n<div id=\"collapse-1-5\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-5\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Untuk kelas Backend dan Frontend disarankan memiliki latar belakang IT.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Berapa lama bootcamp di Maxy Academy?</p>\n<div id=\"collapse-1-6\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-6\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa akan mengikuti bootcamp secara intensif selama 1 bulan.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"heading-2\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-2\" aria-expanded=\"true\" aria-controls=\"collapse-2\"> Magang </a></h2>\n<div id=\"collapse-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2\" data-bs-parent=\"#accordionFaq\">\n<div class=\"accordion-body\">\n<div id=\"accordion-2\" class=\"accordion\">\n<div class=\"accordion-item\">\n<p>Setelah menyelesaikan bootcamp, apakah saya akan dibantu mendapatkan magang?</p>\n<div id=\"collapse-2-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-2-1\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Ya, kamu akan dibantu mendapatkan magang di perusahaan partner Maxy Academy apabila mengambil paket bootcamp Coaching atau Mentoring.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apakah saya bisa memilih magang secara onsite atau online?</p>\n<div id=\"collapse-2-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2-2\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Pelaksanaan magang secara onsite atau online tergantung pada kebijakan masing-masing perusahaan.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apakah saya bisa memilih perusahaan partner Maxy Academy untuk magang?</p>\n<div id=\"collapse-2-3\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2-3\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Mahasiswa harus mengikuti proses matchmaking terlebih dahulu yang akan dilakukan dalam proses bootcamp.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Setelah menyelesaikan magang, apakah saya akan dibantu mendapatkan full time job?</p>\n<div id=\"collapse-2-4\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2-4\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Iya, namun terdapat biaya tambahan. Untuk detail lebih lanjut silahkan hubungi kami.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"heading-3\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-3\" aria-expanded=\"true\" aria-controls=\"collapse-3\"> Pendaftaran </a></h2>\n<div id=\"collapse-3\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-3\" data-bs-parent=\"#accordionFaq\">\n<div class=\"accordion-body\">\n<div id=\"accordion-3\" class=\"accordion\">\n<div class=\"accordion-item\">\n<p>Bagaimana cara mendaftar bootcamp di Maxy Academy?</p>\n<div id=\"collapse-3-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-3-1\" data-bs-parent=\"#accordion-3\">\n<div class=\"accordion-body\">\n<p>Registrasi melalui website https://maxy.academy atau Whatsapp Maxy Academy (https://wa.me/628113955599) dan isi form pendaftaran kami. Selanjutnya, team Maxy Academy akan menghubungi lebih lanjut untuk proses setelah pendaftaran,</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Bagaimana caranya saya bisa mendapatkan scholarship up to 100%?</p>\n<div id=\"collapse-3-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-3-2\" data-bs-parent=\"#accordion-3\">\n<div class=\"accordion-body\">\n<p>Kamu bisa mengikuti placement test secara online terlebih dahulu, waktu pengerjaan 60 menit. Hubungi Whatsapp Maxy Academy (https://wa.me/628113955599) untuk mengikuti placement test.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"heading-4\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-4\" aria-expanded=\"true\" aria-controls=\"collapse-4\"> Pembayaran </a></h2>\n<div id=\"collapse-4\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-4\" data-bs-parent=\"#accordionFaq\"> </div>\n</div>\n</div>\n</div>\n</div>', 1, '2023-02-02 01:53:10', 1, '2023-02-06 09:59:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_content_program_step`
--

CREATE TABLE `m_content_program_step` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `style` text NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_content_program_step`
--

INSERT INTO `m_content_program_step` (`id`, `name`, `style`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Ikuti training intensif selama 1 bulan bersama mentor profesional', 'step', '<p>Pilih bidang yang ingin kamu ikuti</p>', 1, '2023-01-19 15:49:00', 1, '2023-01-31 04:07:45', 1),
(2, 'Jalani program magang selama 3 bulan di perusahaan partner Maxy Academy', 'step', '', 1, '2023-01-19 15:49:00', 1, '2023-01-19 15:49:00', 1),
(3, 'Jaminan mendapat pekerjaan melalui konseling karir dan jaringan partner bisnis Maxy Academy', 'step', '', 1, '2023-01-20 10:03:20', 1, '2023-01-20 10:03:20', 1),
(4, 'Di akhir periode magang, Maxy Academy membantu kamu untuk kembali ke<br>jalur skripsi dan <span class=\"highlight\">langsung mendapatkan pekerjaan</span> sesuai bidang kamu pasca lulus.', 'footer', '', 1, '2023-01-20 10:15:41', 1, '2023-01-20 10:15:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_content_program_step_button`
--

CREATE TABLE `m_content_program_step_button` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` text DEFAULT NULL,
  `style` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `program_step_id` int(11) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_content_program_step_button`
--

INSERT INTO `m_content_program_step_button` (`id`, `name`, `icon`, `style`, `url`, `program_step_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(3, 'UI/UX', 'majesticons:ux-circle-line', 'outline-primary-c', 'class/ui-ux', 1, '', 1, '2023-01-20 10:21:24', 1, '2023-01-20 10:21:24', 1),
(4, 'Back End', 'ci:window-code-block', 'primary-c', 'class/backend', 1, '', 1, '2023-01-31 04:07:45', 1, '2023-01-31 04:07:45', 1),
(5, 'Front End', 'fa6-brands:instagram', 'outline-primary-c', 'class/frontend', 1, '', 1, '2023-01-31 04:07:45', 1, '2023-01-31 04:07:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_course_type`
--

CREATE TABLE `m_course_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_course_type`
--

INSERT INTO `m_course_type` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Bootcamp', '', 1, '2022-09-20 10:11:47', 1, '2022-09-20 10:11:47', 1),
(2, 'Rapid Onboarding', '', 1, '2022-09-20 10:12:01', 1, '2022-09-20 10:12:40', 1),
(3, 'Mini Bootcamp', NULL, 1, '2023-03-29 13:18:05', 1, '2023-03-29 13:18:05', 1),
(4, 'Hackathon', NULL, 1, '2023-03-29 13:18:05', 1, '2023-03-29 13:18:05', 1),
(5, 'Prakerja', NULL, 1, '2023-05-29 08:31:42', 1, '2023-05-29 08:31:42', 1),
(6, 'MSIB', NULL, 1, '2023-05-29 08:31:42', 1, '2023-05-29 08:31:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_difficulty_type`
--

CREATE TABLE `m_difficulty_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_difficulty_type`
--

INSERT INTO `m_difficulty_type` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Beginner', '', 1, '2022-09-12 10:51:10', 1, '2022-09-12 10:51:10', 1),
(2, 'Intermediate', '', 1, '2022-09-20 09:59:17', 1, '2022-09-20 09:59:17', 1),
(3, 'Advance', '', 1, '2022-09-20 09:59:27', 1, '2022-09-20 10:00:12', 1),
(4, 'Test', '', 1, '2023-01-25 09:22:44', 1, '2023-01-25 09:22:44', 1),
(5, 'COBA', 'COBAAA ADDD DARI CMSSS , EDITTTT DR CMSSS', 0, '2023-09-11 04:04:20', 1, '2023-09-11 04:04:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `no_generator`
--

CREATE TABLE `no_generator` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `no_generator`
--

INSERT INTO `no_generator` (`id`, `month`, `year`, `value`, `type`) VALUES
(1, 9, 2022, 10, 'ORDER'),
(2, 9, 2022, 6, 'CONFIRM'),
(3, 10, 2022, 2, 'ORDER'),
(4, 1, 2023, 5, 'ORDER'),
(5, 1, 2023, 1, 'CONFIRM'),
(6, 2, 2023, 3, 'ORDER');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_person` text NOT NULL,
  `logo` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_highlight` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `name`, `type`, `url`, `address`, `phone`, `email`, `contact_person`, `logo`, `description`, `status`, `status_highlight`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(9, 'Universitas Brawijaya', 'UNIVERSITY', 'google.com', '-', '-', 'test@mail.com', '', 'ub.png', '', 1, 1, '2023-01-30 06:31:09', 1, '2023-07-17 16:34:31', 1),
(10, 'Institut Pertanian Bogor', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'ipb.png', '', 0, 1, '2023-01-30 06:31:51', 1, '2023-09-01 15:14:06', 1),
(11, 'Institut Teknologi Bandung', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'itb.png', '', 0, 1, '2023-01-30 06:32:38', 1, '2023-09-01 15:13:10', 1),
(12, 'Universitas Udayana', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'udayana.png', '', 0, 1, '2023-01-30 06:33:15', 1, '2023-09-01 15:13:52', 1),
(13, 'Universitas Diponegoro', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'undip.png', '', 1, 1, '2023-01-30 06:33:47', 1, '2023-06-26 15:13:58', 1),
(14, 'Universitas Kristen Maranatha', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'univ_kristen_maranatha.png', '', 1, 1, '2023-01-30 06:34:29', 1, '2023-06-26 15:13:58', 1),
(15, 'Universitas Kristen Petra', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'ukp.png', '', 1, 1, '2023-01-30 06:35:05', 1, '2023-06-26 15:13:58', 1),
(16, 'Universitas AKI', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unaki.png', '', 1, 1, '2023-01-30 06:40:06', 1, '2023-06-26 15:13:58', 1),
(17, 'Universitas Airlangga', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unair.png', '', 1, 1, '2023-01-30 06:41:28', 1, '2023-06-26 15:13:58', 1),
(18, 'Institut Teknologi Adhi Tama Surabaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'itats.png', '', 0, 1, '2023-01-30 06:44:05', 1, '2023-09-01 15:14:31', 1),
(19, 'Universitas Katolik Widya Mandala Surabaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'ukwm.png', '', 0, 1, '2023-01-30 06:45:06', 1, '2023-09-01 15:14:48', 1),
(20, 'Kedaireka', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '', 'kedai-reka.png', '', 1, 1, '2023-01-30 07:06:42', 1, '2023-06-26 16:56:12', 1),
(21, 'APTIKOM', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '', 'Aptikom.png', '', 1, 1, '2023-01-30 07:07:24', 1, '2023-06-26 16:56:12', 1),
(22, 'Kementrian Pendidikan', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '', 'Kemendikbud.png', '', 1, 1, '2023-01-30 07:07:48', 1, '2023-06-27 08:22:29', 1),
(23, 'RISTEKDIKTI', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '', 'ristekdikti.png', '', 1, 1, '2023-01-30 07:08:15', 1, '2023-06-27 08:23:00', 1),
(24, 'MSIB', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '', 'MSIB.png', '', 1, 1, '2023-01-30 07:08:36', 1, '2023-06-26 16:56:12', 1),
(25, 'Kampus Merdeka', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '', 'kampus-merdeka.png', '', 1, 1, '2023-01-30 07:09:01', 1, '2023-06-26 16:56:12', 1),
(26, 'Jennyhouse', 'COMPANY', 'https://www.jennyhouse.id', '-', '-', 'test@mail.com', '', 'jennyhouse.png', '', 1, 1, '2023-01-30 07:29:11', 1, '2023-06-26 14:57:31', 1),
(27, 'Triputra Group', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'triputra.png', '', 1, 1, '2023-01-30 07:29:34', 1, '2023-06-26 14:57:31', 1),
(28, 'ENABLR', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'enablr.png', '', 1, 1, '2023-01-30 07:30:07', 1, '2023-07-03 14:41:06', 1),
(29, 'Kawan Lama Group', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'kawanlama.png', '', 1, 1, '2023-01-30 07:30:30', 1, '2023-06-26 14:57:31', 1),
(30, 'D-NET', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'donet.png', '', 1, 1, '2023-01-30 07:30:58', 1, '2023-06-26 14:57:31', 1),
(31, 'Edufund', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'edufund.png', '', 1, 1, '2023-01-30 07:35:02', 1, '2023-06-27 14:15:50', 1),
(32, 'Ituloh!', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'ituloh.png', '', 1, 1, '2023-01-30 07:35:32', 1, '2023-06-26 14:57:31', 1),
(33, 'Schneider Electric', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'schneider.png', '', 1, 1, '2023-01-30 07:36:05', 1, '2023-06-26 14:57:31', 1),
(34, 'Kedai Sayur', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'kedaisayur.png', '', 1, 1, '2023-01-30 07:36:29', 1, '2023-06-26 14:53:41', 1),
(35, 'Anteraja', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'anteraja.png', '', 1, 1, '2023-01-30 07:36:51', 1, '2023-06-26 14:53:41', 1),
(36, 'indocyber', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'indocyber.png', '', 1, 1, '2023-01-30 07:37:25', 1, '2023-06-26 14:53:41', 1),
(37, 'PT. Tata Sarana Mandiri', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'tsm.png', '', 1, 1, '2023-01-30 07:38:15', 1, '2023-06-26 14:53:41', 1),
(38, 'Universitas Surabaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'univ_surabaya.png', '', 1, 1, '2023-02-06 02:40:31', 1, '2023-06-26 15:58:26', 1),
(39, 'Universitas Ciputra', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'uciputra.png', '', 0, 1, '2023-02-06 03:04:24', 1, '2023-09-01 15:15:04', 1),
(40, 'Institut Sains dan Teknologi Terpadu Surabaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'istts.png', '', 0, 1, '2023-02-06 03:05:15', 1, '2023-09-01 15:15:28', 1),
(41, 'Loreal', 'COMPANY', '#', '', '', '', '', NULL, NULL, 0, 0, '2023-02-24 12:05:24', 0, '2023-08-30 21:18:41', 0),
(42, 'Skintific', 'COMPANY', '#', '', '', '', '', NULL, NULL, 0, 0, '2023-02-24 12:07:49', 0, '2023-08-30 21:18:45', 0),
(43, 'NPure', 'COMPANY', '#', '', '', '', '', NULL, NULL, 0, 0, '2023-02-24 12:07:49', 0, '2023-08-30 21:18:54', 0),
(44, 'Scarlett', 'COMPANY', '#', '', '', '', '', NULL, NULL, 0, 0, '2023-02-24 12:07:49', 0, '2023-08-30 21:18:58', 0),
(45, 'Maybelline', 'COMPANY', '#', '', '', '', '', NULL, NULL, 0, 0, '2023-02-24 12:07:49', 0, '2023-08-30 21:19:01', 0),
(46, 'Prettystar', 'COMPANY', '#', '', '', '', '', NULL, NULL, 0, 0, '2023-02-24 12:07:49', 0, '2023-08-30 21:19:04', 0),
(47, 'Alibaba', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:24:05', 1, '2023-08-30 21:19:07', 1),
(48, 'babybright', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'babybright.png', NULL, 1, 0, '2023-06-26 14:24:05', 1, '2023-06-26 14:24:05', 1),
(49, 'BOTI Europe', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:24:05', 1, '2023-08-30 21:19:20', 1),
(50, 'CSX', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:24:05', 1, '2023-08-30 21:19:23', 1),
(51, 'DSLaunchpad', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'dslaunchpad.png', NULL, 1, 0, '2023-06-26 14:24:05', 1, '2023-06-26 14:24:05', 1),
(52, 'Dvoretsky Group', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:30:00', 1, '2023-08-30 21:19:30', 1),
(53, 'DWP Group', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'dwpgroup.jpg', NULL, 1, 0, '2023-06-26 14:30:00', 1, '2023-06-26 14:30:00', 1),
(54, 'experian', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:30:00', 1, '2023-08-30 21:19:36', 1),
(55, 'Fujitsu', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:30:00', 1, '2023-08-30 21:19:39', 1),
(56, 'Google Partner', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'googlepartner.jpg', NULL, 1, 0, '2023-06-26 14:30:00', 1, '2023-06-26 14:30:00', 1),
(57, 'PT Inti Sinergi Teknologi', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:30:00', 1, '2023-08-30 21:19:51', 1),
(58, 'K2', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:47:39', 1, '2023-08-30 21:19:56', 1),
(59, 'PT. Kedai Pangan Sejahtera', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'kedaipangan.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:48:23', 1),
(60, 'KewMann', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:47:39', 1, '2023-08-30 21:20:06', 1),
(61, 'Klique', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'klique.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(62, 'Koding Next', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'kodingnext.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(63, 'Microsoft Partner', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', NULL, NULL, 0, 0, '2023-06-26 14:47:39', 1, '2023-08-30 21:20:17', 1),
(64, 'PT. Mitra Automation', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'mitraautomation.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-07-05 11:27:21', 1),
(65, 'Oracle Gold Partner', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'oraclegoldpartner.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(66, 'Qualcomm', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'qualcomm.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(67, 'Samsung', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'samsung.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(68, 'Tableau', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'tableau.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(69, 'Telkomsel Enterprise', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'telkomselenterprise.svg', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(70, 'TESS International', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'tess.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(71, 'TIBCO Software', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'tibco.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-26 14:47:39', 1),
(73, 'UiPath', 'COMPANY', '#', '-', '-', 'test@mail.com', '-', 'uipath.png', NULL, 1, 0, '2023-06-26 14:47:39', 1, '2023-06-27 08:12:32', 1),
(123, 'AMIKOM Purwokerto', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'amikom_purwokerto.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(124, 'AMIKOM Yogyakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'amikom_yogya.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(125, 'Duta Wacana', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'duta_wacana.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(126, 'Universitas Gunadarma', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'gundar.png', NULL, 0, 0, '2023-06-26 16:36:19', 1, '2023-09-01 15:15:45', 1),
(127, 'Institut Seni Indonesia Padang Panjang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'institut_seni_Indonesia_padang.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-27 14:30:34', 1),
(128, 'Institut Teknologi PLN', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'itpln.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(129, 'Institut Teknologi Sepuluh Nopember', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'its.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(130, 'Mikroskill', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'mikroskil.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(131, 'Politeknik Elektronika Negeri Surabaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'pens.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(132, 'Politeknik Negeri Jember', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'politeknik_negeri_jember.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(133, 'Politeknik Negeri Malang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'politeknik_negeri_malang.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(134, 'STMIK Amik Riau', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'stmik_amik_riau.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(135, 'STMIK Sinar Nusantara', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'stmik_sinar_nusantara.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(136, 'STMIK Mardira Indonesia', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'stmik_mardira_Indonesia.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(137, 'Sekolah Tinggi Teknologi Terpadu Nurul Fikri', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'sttnf.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(138, 'Universitas Telkom', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'telkom.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(139, 'Universitas Budi Luhur', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'ubl.png', NULL, 1, 0, '2023-06-26 16:36:19', 1, '2023-06-26 16:36:19', 1),
(140, 'Universitas Negeri Surabaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'univ_surabaya.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(141, 'Universitas Komputer Indonesia', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'unikom.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(142, 'Universitas Multi Data Palembang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'univ_mdp.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(143, 'Universitas Sari Mutiara', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'univ_sari_mutiara_Indonesia.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-27 14:32:27', 1),
(144, 'Universitas Negeri Semarang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'unnes.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(145, 'Universitas Prima Indonesia', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'unpri.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(146, 'Universitas Jenderal Soedirman', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'unsoed.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(147, 'Universitas Pelita Harapan', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'uph.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(148, 'UPN \"Veteran\" Jakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'upnvj.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-27 14:34:14', 1),
(149, 'UPN \"Veteran\" Jawa Timur', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'upnvjt.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-27 14:34:14', 1),
(150, 'Universitas Satya Negara Indonesia', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'usni.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(151, 'Vokasi Universitas Brawijaya', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '-', 'vokasi_ub.png', NULL, 1, 0, '2023-06-26 16:46:18', 1, '2023-06-26 16:46:18', 1),
(152, 'PGRI', 'GOVERNMENT', '#', '-', '-', 'test@mail.com', '-', 'PGRI.png', NULL, 1, 0, '2023-06-26 16:54:48', 1, '2023-06-26 16:54:48', 1),
(153, 'GGF', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'GGF.png', NULL, 1, 1, '2023-08-31 15:42:12', 1, '2023-08-31 15:43:41', 1),
(154, 'HiDigi', 'COMPANY', '#', '-', '-', 'test@mail.com', '', 'hidigi.jpeg', NULL, 1, 1, '2023-08-31 15:42:53', 1, '2023-08-31 15:43:35', 1),
(155, 'Universitas Pancasila', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'pancasila.png', NULL, 1, 1, '2023-09-01 14:09:53', 1, '2023-09-01 14:09:53', 1),
(156, 'STMIK Jakarta STI&K', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'STMIK_Jakarta.png', NULL, 1, 1, '2023-09-01 14:20:13', 1, '2023-09-01 14:23:02', 1),
(157, 'Universitas 17 Agustus 1945 Jakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'untag_jakarta.png', NULL, 1, 1, '2023-09-01 14:22:17', 1, '2023-09-01 14:22:17', 1),
(158, 'Politeknik Negeri Jakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'pnj.png', NULL, 1, 1, '2023-09-01 14:25:05', 1, '2023-09-01 14:25:05', 1),
(159, 'Universitas Dian Nusantara', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'udn.png', NULL, 1, 1, '2023-09-01 14:25:30', 1, '2023-09-01 14:25:30', 1),
(160, 'Institut Teknologi Nasional Bandung', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'itenas.png', NULL, 1, 1, '2023-09-01 14:26:45', 1, '2023-09-01 14:26:45', 1),
(161, 'Universitas Indonesia Membangun', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'inaba.png', NULL, 1, 1, '2023-09-01 14:27:15', 1, '2023-09-01 14:27:15', 1),
(162, 'STT Wastukancana', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'stt_wastukancana.png', NULL, 1, 1, '2023-09-01 14:28:23', 1, '2023-09-01 14:28:23', 1),
(163, 'Institut Pendidikan Indonesia Garut', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'ipi.png', NULL, 1, 1, '2023-09-01 14:30:42', 1, '2023-09-01 14:30:42', 1),
(164, 'Institut Teknologi Garut', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'itg.png', NULL, 1, 1, '2023-09-01 14:31:38', 1, '2023-09-01 14:31:38', 1),
(165, 'Universitas Sebelas April', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unsap.png', NULL, 1, 1, '2023-09-01 14:32:13', 1, '2023-09-01 14:32:13', 1),
(166, 'Universitas Galuh', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'galuh.png', NULL, 1, 1, '2023-09-01 14:36:53', 1, '2023-09-01 14:36:53', 1),
(167, 'Universitas Singaperbangsa Karawang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'singaperbangsa.png', NULL, 1, 1, '2023-09-01 14:37:41', 1, '2023-09-01 14:37:41', 1),
(168, 'Universitas Kristen Duta Wacana', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'duta_wacana.png', NULL, 1, 1, '2023-09-01 14:38:21', 1, '2023-09-01 14:38:21', 1),
(169, 'Universitas PGRI Yogyakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'pgri_yogyakarta.png', NULL, 1, 1, '2023-09-01 14:39:22', 1, '2023-09-01 14:39:22', 1),
(170, 'Universitas Ahmad Dahlan', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'ahmaddahlan.png', NULL, 1, 1, '2023-09-01 14:49:07', 1, '2023-09-01 14:49:07', 1),
(171, 'Universitas Mercu Buana Yogyakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'mercubuana.png', NULL, 1, 1, '2023-09-01 14:52:22', 1, '2023-09-01 14:52:22', 1),
(172, 'Universitas Teknologi Digital Indonesia', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'utdi.png', NULL, 1, 1, '2023-09-01 14:53:27', 1, '2023-09-01 14:53:27', 1),
(173, 'Universitas Alma Ata Yogyakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'alma_ata.png', NULL, 1, 1, '2023-09-01 14:54:01', 1, '2023-09-01 14:54:01', 1),
(174, 'Universitas Nahdlatul Ulama Al Ghazali', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'nahdlatul.png', NULL, 1, 1, '2023-09-01 14:54:36', 1, '2023-09-01 14:54:36', 1),
(175, 'Universitas Muhadi Setiabudi', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'umus.png', NULL, 1, 1, '2023-09-01 14:55:07', 1, '2023-09-01 14:55:07', 1),
(176, 'STMIK Widya Pratama', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'stmik_wp.png', NULL, 1, 1, '2023-09-01 14:55:32', 1, '2023-09-01 14:55:32', 1),
(177, 'Universitas AKI', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unaki.png', NULL, 1, 1, '2023-09-01 14:55:55', 1, '2023-09-01 14:55:55', 1),
(178, 'Politeknik Negeri Semarang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'polines.png', NULL, 1, 1, '2023-09-01 14:56:23', 1, '2023-09-01 14:56:23', 1),
(179, 'Universitas Slamet Riyadi', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unisri.png', NULL, 1, 1, '2023-09-01 14:56:55', 1, '2023-09-01 14:56:55', 1),
(180, 'Universitas Muhammadiyah Surakarta', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'ums.png', NULL, 1, 1, '2023-09-01 14:58:23', 1, '2023-09-01 14:58:23', 1),
(181, 'Politeknik Negeri Jember', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'polije.png', NULL, 1, 1, '2023-09-01 14:58:45', 1, '2023-09-01 14:58:45', 1),
(182, 'Universitas Muhammadiyah Gresik', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'umg.png', NULL, 1, 1, '2023-09-01 14:59:10', 1, '2023-09-01 14:59:10', 1),
(183, 'Universitas Trunojoyo Madura', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'utm.png', NULL, 1, 1, '2023-09-01 14:59:30', 1, '2023-09-01 14:59:30', 1),
(184, 'STT STIKMA Internasional Malang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'stikma.png', NULL, 1, 1, '2023-09-01 14:59:52', 1, '2023-09-01 14:59:52', 1),
(185, 'Universitas Merdeka Malang', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unmer.png', NULL, 1, 1, '2023-09-01 15:00:17', 1, '2023-09-01 15:00:17', 1),
(186, 'Universitas Maarif Hasyim Latif', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'umaha.png', NULL, 1, 1, '2023-09-01 15:00:41', 1, '2023-09-01 15:00:41', 1),
(187, 'Universitas Nusantara PGRI Kediri', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unp.png', NULL, 1, 1, '2023-09-01 15:01:04', 1, '2023-09-01 15:01:04', 1),
(188, 'Universitas Islam Kadiri', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'uik.png', NULL, 1, 1, '2023-09-01 15:01:24', 1, '2023-09-01 15:01:24', 1),
(189, 'Universitas PGRI Madiun', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unipma.png', NULL, 1, 1, '2023-09-01 15:01:47', 1, '2023-09-01 15:01:47', 1),
(190, 'COBAAAAAAAAAA', 'COBAAAAAAAAAA', 'COBAAAAAAAAAAAAA', 'COAAAAAAAAAAAAAAAAAAA', '2134565789023', 'COBAAAAAAAAA', '1', NULL, 'COBAAAAA ADDDDD DR CMSSSSS ,EDITTTTTT DR CMSSSSSS', 0, 0, '2023-09-11 04:50:39', 1, '2023-09-11 11:51:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner_university_detail`
--

CREATE TABLE `partner_university_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ref` int(11) DEFAULT NULL,
  `type` enum('faculty','major') NOT NULL,
  `partner_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partner_university_detail`
--

INSERT INTO `partner_university_detail` (`id`, `name`, `ref`, `type`, `partner_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(4, 'COBAAAAAAAAAAAAA', NULL, 'faculty', 190, 'COBAAAAAAAAAAAAA ADDDDDD DR CMSSSSS , EDITTTTTTTTTTTT DR CMSSSSS', 0, '2023-09-11 04:52:32', 1, '2023-09-11 11:56:23', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') NOT NULL,
  `discount` varchar(255) NOT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_course`
--

CREATE TABLE `promotion_course` (
  `id_course` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_api`
--

CREATE TABLE `temp_api` (
  `id` int(32) NOT NULL,
  `title` varchar(225) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_description` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `company_email` varchar(225) NOT NULL,
  `company_website` varchar(225) NOT NULL,
  `category` varchar(255) NOT NULL,
  `isRemote` int(2) NOT NULL,
  `salaryEstimateMinAmount` int(11) NOT NULL,
  `salaryEstimateMaxAmount` int(32) NOT NULL,
  `minYearsOfExperience` int(10) NOT NULL,
  `maxYearsOfExperience` int(10) NOT NULL,
  `source_id` int(32) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_api`
--

INSERT INTO `temp_api` (`id`, `title`, `company_name`, `company_description`, `city`, `country`, `company_email`, `company_website`, `category`, `isRemote`, `salaryEstimateMinAmount`, `salaryEstimateMaxAmount`, `minYearsOfExperience`, `maxYearsOfExperience`, `source_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(63, 'Interior Designer', 'PT Sistem Manajemen Dewarangga', '', 'Bekasi', 'Indonesia', 'PT Sistem Manajemen Dewarangga', 'PT Sistem Manajemen Dewarangga', 'Design', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(64, 'Graphic Design Intern', 'PT. Pillar Brite Care', '', 'Jakarta', 'Indonesia', 'PT. Pillar Brite Care', 'PT. Pillar Brite Care', 'Design', 0, 0, 0, 0, 1, 4, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(65, 'Content Creator (Paid Internship)', 'PT. Pillar Brite Care', '', 'Jakarta', 'Indonesia', 'PT. Pillar Brite Care', 'PT. Pillar Brite Care', 'Business Development / Sales', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(66, 'Editor and Photographer Intern', 'PT. Pillar Brite Care', '', 'Jakarta', 'Indonesia', 'PT. Pillar Brite Care', 'PT. Pillar Brite Care', 'Media & Communications', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(67, 'Sales And Marketing Intern', 'PT. Pillar Brite Care', '', 'Jakarta', 'Indonesia', 'PT. Pillar Brite Care', 'PT. Pillar Brite Care', 'Business Development / Sales', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(68, 'Product Intern (Pharmacogenomics)', 'Nalagenetics', '', 'Jakarta', 'Indonesia', 'Nalagenetics', 'Nalagenetics', 'Product Management', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(69, 'QA Tester Intern', 'PT. Super Giga Generasi', '', 'Jakarta', 'Indonesia', 'PT. Super Giga Generasi', 'PT. Super Giga Generasi', 'Software Engineering', 1, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(70, 'Content Creator Intern', 'Clabstream', '', 'Jakarta', 'Indonesia', 'Clabstream', 'Clabstream', 'Media & Communications', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(71, 'Internship Ecommerce Brand Manager and Content Marketing', 'Una Brands', '', 'Jakarta', 'Indonesia', 'Una Brands', 'Una Brands', 'Marketing', 0, 0, 0, 0, 1, 3, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(72, 'Flutter Front End Templating Intern Magang', 'PT TOURIN WISATA GLOBAL', '', 'Jakarta', 'Indonesia', 'PT TOURIN WISATA GLOBAL', 'PT TOURIN WISATA GLOBAL', 'Software Engineering', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(73, 'Account Management Intern', 'Magnus Digital Indonesia', '', 'Jakarta', 'Indonesia', 'Magnus Digital Indonesia', 'Magnus Digital Indonesia', 'Business Development / Sales', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(74, 'Google Ads Account Executive', 'PT Sistem Manajemen Dewarangga', '', 'Depok', 'Indonesia', 'PT Sistem Manajemen Dewarangga', 'PT Sistem Manajemen Dewarangga', 'Business Development / Sales', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(75, 'Magang / Internship HRD', 'Pt Tns Raksasa Indonesia', '', 'Tangerang', 'Indonesia', 'Pt Tns Raksasa Indonesia', 'Pt Tns Raksasa Indonesia', 'Human Resource', 0, 0, 0, 0, 1, 676, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(76, 'Brand Graphic Designer', 'Turnkey Group', '', 'Tangerang', 'Indonesia', 'Turnkey Group', 'Turnkey Group', 'Design', 1, 0, 0, 0, 1, 44, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(77, 'Frontend Engineer Intern', 'Turnkey Group', '', 'Yogyakarta', 'Indonesia', 'Turnkey Group', 'Turnkey Group', 'Software Engineering', 1, 0, 0, 0, 1, 69, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(78, 'WEB SPECIALIST', 'PT GLOBAL MAKMUR INDAHTAMA', '', 'Jakarta', 'Indonesia', 'PT GLOBAL MAKMUR INDAHTAMA', 'PT GLOBAL MAKMUR INDAHTAMA', 'Software Engineering', 0, 0, 0, 0, 1, 91, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(79, 'Intern Human Resources (Recruitment)', 'PT Prima Inovasindo Sukses', '', 'Jakarta', 'Indonesia', 'PT Prima Inovasindo Sukses', 'PT Prima Inovasindo Sukses', 'Human Resource', 0, 0, 0, 0, 1, 7, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(80, 'Management Trainee', 'PT Alpha Teknologi Bersama', '', 'Jakarta', 'Indonesia', 'PT Alpha Teknologi Bersama', 'PT Alpha Teknologi Bersama', 'Finance', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(81, 'Customer Service Intern', 'Keeppack Indonesia', '', 'Jakarta', 'Indonesia', 'Keeppack Indonesia', 'Keeppack Indonesia', 'Business Development / Sales', 0, 0, 0, 0, 1, 9, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(82, 'Partnership Intern', 'Keeppack Indonesia', '', 'Jakarta', 'Indonesia', 'Keeppack Indonesia', 'Keeppack Indonesia', 'Marketing', 0, 0, 0, 0, 1, 2, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(83, 'Content Creator Intern', 'Keeppack Indonesia', '', 'Jakarta', 'Indonesia', 'Keeppack Indonesia', 'Keeppack Indonesia', 'Marketing', 0, 0, 0, 0, 1, 6, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(84, 'Intern Graphic Designer', 'PT. Living Fitness Indonesia', '', 'Jakarta', 'Indonesia', 'PT. Living Fitness Indonesia', 'PT. Living Fitness Indonesia', 'Design', 0, 0, 0, 0, 1, 863368, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(85, 'Internship - HR Development', 'Bintang Delapan Group', '', 'Jakarta', 'Indonesia', 'Bintang Delapan Group', 'Bintang Delapan Group', 'Human Resource', 0, 0, 0, 0, 1, 4, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(86, 'SOSMED ADMIN INTERN', 'PT Semesta Edukasi Kreatif', '', 'Jakarta', 'Indonesia', 'PT Semesta Edukasi Kreatif', 'PT Semesta Edukasi Kreatif', 'Other', 0, 0, 0, 0, 1, 2, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(87, 'Sales Support Intern', 'Quipper', '', 'Jakarta', 'Indonesia', 'Quipper', 'Quipper', 'Administrative', 0, 0, 0, 0, 1, 9, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(88, 'Intern Accounting', 'Skystar Capital', '', 'Jakarta', 'Indonesia', 'Skystar Capital', 'Skystar Capital', 'Administrative', 0, 0, 0, 0, 1, 2151, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(89, 'Content Creator Internship', 'PT. Multifortuna Sinardelta', '', 'Jakarta', 'Indonesia', 'PT. Multifortuna Sinardelta', 'PT. Multifortuna Sinardelta', 'Media & Communications', 0, 0, 0, 0, 1, 96, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(90, 'Graphic Design Internship', 'PT. Multifortuna Sinardelta', '', 'Jakarta', 'Indonesia', 'PT. Multifortuna Sinardelta', 'PT. Multifortuna Sinardelta', 'Design', 0, 0, 0, 0, 1, 0, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(91, 'UI UX Designer Internship', 'PT. Folarium Innotek Indonesia', '', 'Jakarta', 'Indonesia', 'PT. Folarium Innotek Indonesia', 'PT. Folarium Innotek Indonesia', 'Design', 0, 0, 0, 0, 1, 825, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35'),
(92, 'Commercial Intern', 'Eden Kitchens', '', 'Jakarta', 'Indonesia', 'Eden Kitchens', 'Eden Kitchens', 'Business Development / Sales', 1, 0, 0, 0, 1, 358, 'Job', 1, '2023-02-21 02:44:35', '2023-02-21 02:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `total_after_discount` double NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0 = Not Completed, \r\n1 = Completed, \r\n2 = Partial, \r\n3 = Canceled',
  `course_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_package_id` int(11) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `forced_at` datetime DEFAULT NULL,
  `forced_comment` text DEFAULT NULL,
  `user_forced_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trans_order`
--

INSERT INTO `trans_order` (`id`, `order_number`, `date`, `total`, `discount`, `total_after_discount`, `payment_status`, `course_id`, `course_class_id`, `user_id`, `course_package_id`, `promotion_id`, `forced_at`, `forced_comment`, `user_forced_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'ORDER/2022/09/001', '2022-09-26 04:31:42', 5000000, NULL, 5000000, 0, 2, 2, 3, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 04:31:42', 1, '2022-09-26 04:31:42', 1),
(2, 'ORDER/2022/09/002', '2022-09-26 04:32:28', 2000000, NULL, 2000000, 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 04:32:28', 1, '2022-09-26 04:32:28', 1),
(3, 'ORDER/2022/09/003', '2022-09-26 04:33:11', 5000000, NULL, 5000000, 0, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 04:33:11', 1, '2022-09-26 04:33:11', 1),
(4, 'ORDER/2022/09/004', '2022-09-26 07:45:55', 0, NULL, 0, 1, 5, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 07:45:55', 1, '2022-09-26 07:45:55', 1),
(5, 'ORDER/2022/09/005', '2022-09-29 02:34:55', 0, NULL, 0, 1, 6, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-29 02:34:55', 1, '2022-09-29 02:34:55', 1),
(6, 'ORDER/2022/09/006', '2022-09-30 01:45:57', 2000000, NULL, 2000000, 2, 2, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-30 01:45:57', 1, '2022-09-30 03:35:35', 1),
(7, 'ORDER/2022/09/007', '2022-09-30 03:40:52', 2000000, NULL, 2000000, 1, 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-30 03:40:52', 1, '2022-09-30 10:42:21', 1),
(8, 'ORDER/2022/09/008', '2022-09-30 03:47:43', 5000000, NULL, 5000000, 2, 2, 2, 4, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-30 03:47:43', 1, '2022-09-30 03:48:04', 1),
(9, 'ORDER/2022/09/009', '2022-09-30 04:02:41', 5000000, NULL, 5000000, 0, 2, 2, 4, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-30 04:02:41', 1, '2022-09-30 04:02:41', 1),
(10, 'ORDER/2022/09/010', '2022-09-30 04:24:51', 5000000, NULL, 5000000, 0, 4, 4, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-30 04:24:51', 1, '2022-09-30 04:24:51', 1),
(11, 'ORDER/2022/10/001', '2022-10-03 06:05:13', 0, NULL, 0, 1, 7, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-10-03 06:05:13', 1, '2022-10-03 06:05:13', 1),
(12, 'ORDER/2022/10/002', '2022-10-03 09:04:34', 0, NULL, 0, 1, 8, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-10-03 09:04:34', 1, '2022-10-03 09:04:34', 1),
(13, 'ORDER/2023/01/001', '2023-01-27 04:19:40', 5000000, NULL, 5000000, 0, 3, 3, 25, 2, NULL, NULL, NULL, NULL, NULL, 1, '2023-01-27 04:19:40', 1, '2023-01-27 04:19:40', 1),
(14, 'ORDER/2023/02/001', '2023-02-02 01:07:24', 0, NULL, 0, 1, 5, 5, 25, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-02 01:07:24', 1, '2023-02-02 01:07:24', 1),
(15, 'ORDER/2023/03/001', '2023-03-02 03:51:54', 0, NULL, 0, 1, 8, 8, 66, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-02 03:51:54', 1, '2023-07-20 14:21:37', 1),
(16, 'ORDER/2023/03/002', '2023-03-02 03:54:08', 0, NULL, 0, 1, 7, 7, 66, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-02 03:54:08', 1, '2023-07-20 14:21:57', 1),
(17, 'COBAAAAAA/9999/99/999', '2023-09-13 11:40:00', 1e29, 100, 0, 0, 1, 1, 66, 1, NULL, NULL, NULL, NULL, 'COBAAAAAAAA ADDDD DR CMSSSS , EDITTTTTTTTTTTT DR CMSSSSSS', 0, '2023-09-11 04:42:13', 1, '2023-09-11 11:49:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_order_confirm`
--

CREATE TABLE `trans_order_confirm` (
  `id` int(11) NOT NULL,
  `order_confirm_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `sender_account_name` varchar(255) DEFAULT NULL,
  `sender_account_number` varchar(255) DEFAULT NULL,
  `sender_bank` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `image` text DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verified_comment` text DEFAULT NULL,
  `verified_id` int(11) DEFAULT NULL,
  `trans_order_id` int(11) NOT NULL,
  `m_bank_account_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_class_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `referal` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `telp_number` varchar(20) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `linked_in` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `type` enum('admin','tutor','member') DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `access_group_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `exp` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `email_verified` int(11) NOT NULL DEFAULT 0,
  `partner_university_detail_id` int(11) DEFAULT NULL,
  `provider_id` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `referal`, `date_of_birth`, `telp_number`, `university`, `major`, `semester`, `linked_in`, `request`, `signature`, `email`, `password`, `profile_picture`, `type`, `partner_id`, `access_group_id`, `description`, `status`, `exp`, `level`, `created_at`, `created_id`, `updated_at`, `updated_id`, `phone`, `address`, `provider`, `email_verified`, `partner_university_detail_id`, `provider_id`, `email_verified_at`, `remember_token`) VALUES
(1, 'toro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'toro@mail.com', '$2y$10$bADbRS70xYSWFUM8eF.LCu1s3rY/HDNYybH3siwPdH7/LEzHj0HIG', NULL, 'admin', 34, 1, NULL, 0, 0, 1, '2022-09-09 07:46:26', 1, '2022-09-09 07:46:26', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(4, 'akbar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'akbar@mail.com', '$2y$10$csNiP2KxUw1WGNyjxQMq0eLY0Cyp8m7T9J2bmHxw9CZTUUB8OJTG.', NULL, NULL, NULL, 1, NULL, 1, 0, 1, '2023-06-09 02:36:42', 1, '2023-06-09 02:36:42', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(14, 'William Christoper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anonim@mail.com', '$2y$10$eJkoxsg/rac1s3XUjFjKtunkFkLWzuDB8ZYGDle6T8ATvymR5O/JG', 'william.png', 'tutor', NULL, 1, 'Full-stack Developer Maxy Academy', 1, 0, 1, '2023-07-03 06:40:43', 1, '2023-07-03 06:40:43', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(15, 'Daniel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'daniel@mail.com', '$2y$10$ZwGPVjikXqWg/HVYI5ZM8OslJgcyku7MhAUnxpOVWNSBsntc2KWhe', 'daniel.png', 'tutor', NULL, 1, 'Product Designer Ruparupa', 1, 0, 1, '2023-07-03 06:41:54', 1, '2023-07-03 06:41:54', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(16, 'Florencia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'florencia@mail.com', '$2y$10$QvMJGgLx7FkbxEiZU4.HguqO9ksoRpm7iRq6Opg2GUz5FN6XLoaCq', 'florencia.png', 'tutor', NULL, 1, 'Digital Marketer Djoeragan Sego', 1, 0, 1, '2023-07-03 06:42:15', 1, '2023-07-03 06:42:15', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(17, 'Selvia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selvia@mail.com', '$2y$10$PZGpbWAO5XLCDd1HNE9Mw.2QkQgf8rHsIPN27F.sYKXoBapjDOW..', 'selvia.jpg', 'tutor', NULL, 1, 'Mentor Maxy Academy', 0, 0, 1, '2023-07-03 06:43:07', 1, '2023-07-03 06:43:07', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-30 09:37:10', NULL),
(18, 'Andy Febrico Bintoro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'toro1@mail.com', '$2y$10$yh8nzzKt6LJpCzfwxOEh8ewQmcs8DqqIpCOjMtyrrZekRRTKEXg4i', 'toro.png', 'tutor', NULL, 1, 'CTO Maxy Academy', 1, 0, 1, '2023-07-03 06:46:28', 1, '2023-07-03 06:46:28', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(19, 'Widy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'widy@mail.com', '$2y$10$D6sfDKWtiWFKTykhweO2OefpfV9DW9wWhpl/lIBzGcPWxPrnEzTmG', NULL, 'tutor', NULL, 1, NULL, 0, 0, 1, '2023-07-03 06:48:22', 1, '2023-07-03 06:48:22', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(20, 'Khoerurrizal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rizal@mail.com', '$2y$10$IYUlWzTo33GGp6NR/B7f5uONGmjbJa96D8JMs.GtXPIH6T/YHBuQa', 'rizal.png', 'tutor', NULL, 1, 'Senior Fullstack Engineer SourceSage Holding, Pte Ltd', 0, 0, 1, '2023-07-03 06:49:17', 1, '2023-07-03 06:49:17', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-30 09:37:42', NULL),
(21, 'Arabi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arabi@mail.com', '$2y$10$nxhfLEYHT7LBRZFFd8tMIecNMA3o/H4wMUuemE9rfifib2KnONWMi', 'arabi.png', 'tutor', NULL, 1, 'Mentor Maxy Academy', 0, 0, 1, '2023-07-03 06:49:43', 1, '2023-07-03 06:49:43', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-30 09:37:57', NULL),
(22, 'Marcel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'marcel@mail.com', '$2y$10$8dXna3uajYsRX9Ai7frvHOgtLl6/uwHe7vWKn8ZXF3c.yApaHi7le', NULL, 'tutor', NULL, 1, NULL, 0, 0, 1, '2023-07-03 06:50:01', 1, '2023-07-03 06:50:01', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:33:02', NULL),
(23, 'Budi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'budi@mail.com', '$2y$10$aUFJ6wrXFB7PE3Sc5yiYA.n.upAhU3lLGDy.OCKbYY/deifEpQocS', '335dab35b98c84693e844963fafe5dff.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2022-09-26 04:21:34', 0, '2022-09-30 07:46:01', 0, NULL, 'Jl. Rumah Budi 321', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(24, 'Hendra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hendra@mail.com', '$2y$10$fzRM8rnt4sxdobABBaafZemD4YbClQlsWVb15EnqcmLcgjDye8HnK', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2022-09-26 04:27:02', 0, '2022-09-26 04:27:02', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(25, 'Jess', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jess@mail.com', '$2y$10$1O1jN.14dAc/KXwakFtnaOUohX6IaXx7qHe./jtyIbkjGo2YxLgoq', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2022-09-26 04:27:21', 0, '2022-09-26 04:27:21', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(26, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@mail.com', '$2y$10$D2C6iqT1tiLZqYwQFmLmve5LITup9.ubrQpBizipUDQ3aSYNLb7HW', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2022-09-30 03:40:31', 0, '2022-09-30 03:40:31', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(27, 'Fransiscus Hartanto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fransiscush03@gmail.com', '', '8c55b75a3b9eabd628c2f6f8481f3a47.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2022-09-30 07:07:05', 0, '2022-09-30 07:45:29', 0, NULL, NULL, 'google', 0, NULL, '103664336090217179743', '2023-07-20 04:50:50', NULL),
(28, 'Fransiscus Hartanto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fransiscush03@gmail.com', '', 'https://graph.facebook.com/v3.3/102425155985278/picture?type=normal', 'member', NULL, 0, NULL, 1, 0, 1, '2022-10-03 01:47:36', 0, '2022-10-03 01:47:36', 0, NULL, NULL, 'facebook', 0, NULL, '102425155985278', '2023-07-20 04:50:50', NULL),
(29, 'Qowiyyu A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowi@mail.com', '$2y$10$QdhFxiJyHTGFKm/UbZ0xh.LekPNdBK7yxPOibNFu0JsaLFCJ8yFo.', '59b5b57875265916d30986cdaab26a1e.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-19 10:38:17', 0, '2023-01-19 10:38:17', 0, '123456789', 'Jl. Tunjungan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(30, 'Qo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qo@mail.com', '$2y$10$.NYBSDzOauGKq.nZn6qMSOUyLqGQDaObHOXY/VdmN45s7BorHTXHC', '8cf1d0fab27df9757dd1b97805af9314.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-19 10:40:36', 0, '2023-01-23 09:06:43', 0, '12456789', 'Jl. Gunung Sari', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(31, 'Tyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tyo@gmail.com', '$2y$10$dmwkRFzwi3AuoP2e8Gm6nOsSd4pZvkwM.FIweoDy36WCGhQf2r4iK', '45736b4ccc123354bd0dfe1cb2351228.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-23 10:52:18', 0, '2023-01-23 10:52:18', 0, '12456789', 'Jl. Manukan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(32, 'Qowi Skill', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowi.skill@mail.com', '$2y$10$cLNlt8i2YkX9WVPFSEmv1ez4fhwjcLVqS1HMDm314uT5rkgA8Pvve', 'e45a88b7b7922cd028f1634ea985a259.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-24 19:56:00', 0, '2023-01-24 19:57:11', 0, '12345678', 'Jl. Sukodono', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(33, 'Qowi Skill', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowi.skill@mail.com', '$2y$10$pY7apvzQ3mBhzBvU3Bg8puvWHW8lYW9gExoOynkivaLqrehiYTJq.', '76fe96893c76e3dee55366885ab6190f.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-24 19:56:44', 0, '2023-01-24 19:56:44', 0, '12345678', 'Jl. Sukodono', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(34, 'Qowi SK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowi.sk@mail.com', '$2y$10$1KFwslgZpMAmLYew4GvmEe8x08C6uK0q3pARtggQ0NLq7Bvr1ab3C', 'f09c5924bb8aaec40f1c1ef534dc8531.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-24 19:59:11', 0, '2023-01-24 20:00:03', 0, '12345678', 'Jl. Dukuh Menanggal', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(35, 'Qowiyyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowiyyu@mail.com', '$2y$10$4TMkxZWvXklzDCEUDsyKeOK2x37aAakVYKbx5VjhTd2pEWUReqrM.', 'f7adeab12ce5f1afb16a14f80067d3b8.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-25 00:47:48', 0, '2023-01-25 00:47:48', 0, '123456789', 'Jl. Pagesangan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(36, 'Qowiyyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowiyyu@mail.com', '$2y$10$iGFSZHCKqEXbwgO8L3i7He9meSf/cIr1DJr/JGCqcmsDdKbYfhekO', '99c25199e6ba355c0e0e8cad5783d6db.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-25 00:48:32', 0, '2023-01-25 00:48:32', 0, '123456789', 'Jl. Pagesangan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(37, 'Qowiyyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowiyyu@mail.com', '$2y$10$8VHQEZ6mQHrPmo8m2tmnKeZNk7T4l.JYe.KMAjKjRZl3Hh4EfXKLq', '722201aefa359485e1fb253b23fa6d02.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-25 00:48:51', 0, '2023-01-25 00:48:51', 0, '123456789', 'Jl. Pagesangan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(38, 'Qowiyyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowiyyu@mail.com', '$2y$10$dfMLQH2mG1CcIew1Y0XWRemzDXkkFVabUzquJJqITt/Nfs7rntbIi', 'a743091723e160246d574d12e3db8013.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-25 00:49:33', 0, '2023-01-25 00:49:33', 0, '123456789', 'Jl. Pagesangan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(39, 'Qowiyyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowiyyu@mail.com', '$2y$10$WAf3am0O1Dyxv/.MX64uqeR5B2uKXg7shqhH3Y1X5ygA2Ew.jG2du', 'e6b5c69723ff83d97a2af3dc0c4f9b2a.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-25 00:50:20', 0, '2023-01-25 00:50:20', 0, '123456789', 'Jl. Pagesangan', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(40, 'Safira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'safira@mail.com', '$2y$10$BQ.P5Qr.lR8YR0obC2G9xeP0BWIw9Cgcfx.N0sOA.umy.OoZLuUgu', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-01-27 04:19:11', 0, '2023-01-27 04:19:11', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(41, 'Qowiyyu Adzkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowi.test@mail.com', '$2y$10$MuVa5XMt65ozmRlXZCdZHuEIflNRIn74zGQa6YxF1S8q2Mt9tER.2', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-09 08:40:19', 0, '2023-02-09 08:41:22', 0, '088217711609', 'Surabaya', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(42, 'Sofi Aisya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sofi.aisya01@gmail.com', '$2y$10$lIBlq1KwrLmEyIGw58MPXuGnFka8/pIOQizkfMkcd/FHtKkwO0R8G', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-11 18:33:21', 0, '2023-02-11 18:33:21', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(43, 'Aditya Kurnia Pratama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adityacaspo@gmail.com', '$2y$10$MaVSZM6oSowVrFL5DbaYT.oms4hE7RH6zCA4T/pKOW/8fGzm04DoC', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-12 00:00:43', 0, '2023-02-12 00:00:43', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(44, 'Andhi Nursahara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'archane8853@gmail.com', '', 'andhi.png', 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-14 07:52:22', 0, '2023-02-14 07:52:22', 0, NULL, NULL, 'google', 0, NULL, '105445141736736745221', '2023-09-01 08:18:16', NULL),
(45, 'Mirhan Sahira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mirhansahira1@gmail.com', '$2y$10$ImkgM6mFLgK7UI6phg6bDeZF9cW1yiBXUATNXXi.oRqXCRxeGJRIi', 'cecylia.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-17 02:55:20', 0, '2023-02-17 02:55:20', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-01 08:18:23', NULL),
(46, 'Nur Almahdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20102108@ittelkom-pwt.ac.id', '$2y$10$n6IIOMTZdtgxPjXUI9vV5uKw4.yuvHpQb/Qj3V.cLFf5xN7.YVNda', 'nadhira.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-17 02:56:54', 0, '2023-02-17 02:56:54', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-30 09:30:11', NULL),
(47, 'Azril Bagas Erlangga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20102286@ittelkom-pwt.ac.id', '$2y$10$1Q9IK88.fi9eKxcmH5YpC.fF2knJeTEtGabr9rLTxthzOeSvLwA9.', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-02-17 02:59:37', 0, '2023-02-17 02:59:37', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(48, 'Nur Mufrih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nurmufrih@gmail.com', '$2y$10$UB.pbzfW7JqxvnlGeGOtZu6w/4aI2Y3213ZEx46IUS2mO3pcVvFzy', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-03-02 03:36:23', 0, '2023-03-02 03:36:23', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(49, 'ww', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ww@gmail.com', '$2y$10$U3M0lvM2JtE6JqXF/ecwju5LpZwcswQ1d5EjndU3pyPa8JoXvmFDe', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-03-02 03:50:51', 0, '2023-03-02 03:50:51', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(50, 'diponh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dipo.nabhan@gmail.com', '$2y$10$id.LL0VgbZlQHSQ5hpy0.u/bJ00i0btwMPM36B5kbpgGWNsJm04j6', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-03-09 07:58:15', 0, '2023-03-09 07:58:15', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(51, 'Hansen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lukitohansen0123@gmail.com', '$2y$10$xL5Gq8GH6b4Xm8UvQR4lkOLtQY0JFQ8PixqDID9ZhhlU56XR0AnM2', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-03-16 02:15:41', 0, '2023-03-16 02:15:41', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(52, 'yandri ikwan huavis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yandriikwan@gmail.com', '$2y$10$z1Il/bNEyiYQ1yoiT9pbp.bna4eFeDK6f7fOOfwHMO7jAgIpGGL9S', 'c1dc12f2590426598e747fe3047c1bca.jpeg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-03-24 06:20:25', 0, '2023-03-24 06:20:46', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(53, 'Aditya Puspita S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adityapuspitasari0@gmail.com', '$2y$10$1aliAV13lu99TfFs.qm1CO44xvkU5ntE0l3ZmCfhW7HGWXC90p6V6', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-03-31 06:05:00', 0, '2023-03-31 06:05:00', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(54, 'Kuncoro Ariadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kuncoroariadi@gmail.com', '$2y$10$nyxp4eaBbVauodVefE0Z1uPv4WLmJxf3WHsoUc3h1p4XmXrSl4fKO', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-04-08 07:56:57', 0, '2023-04-08 07:56:57', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(55, 'Dara Jewutha Nuramalin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'darajewutha2002@gmail.com', '$2y$10$EvEacVltKBnyJHG6.qqOouvsCh6uSbSnOJ6yQktkRIy1nk3NI07aa', '5491000bf4737fdc4d663b0eaf90742f.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-05-10 01:19:10', 0, '2023-05-10 01:22:28', 0, '(+62) 88802941382', 'Jalan benda barat 15 blok B 17 nomor 9, Pamulang 2  Kec. Pamulang, Kota/Kab. Tangerang Selatan  Banten, 15416', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(56, 'Sulamit Manullang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sulamit.manullang@gmail.com', '$2y$10$F7Y5F3qOuFl3MGPHHjgVTuZsrZorOyyZpfb9Qd9HrxUlY2/NIW9Ra', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-05-17 06:41:54', 0, '2023-05-17 06:41:54', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(57, 'vika', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vika.maxy.academy@gmail.com', '$2y$10$CrCBxt1x0uzYpsqcPjwcmOwi9BCEdAKGrtPssjxNPmAGs./YXoopK', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-05-19 06:57:37', 0, '2023-05-19 06:57:37', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(58, 'Aditya Dewa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adityadewa386@gmail.com', '$2y$10$SXg1HWZXCPoyS9Nn0zz9iOf6VIvJUJuBEPnx5N0Hm8yd5NuuY65ue', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-05-25 08:09:40', 0, '2023-05-25 08:10:37', 0, NULL, 'Perumahan Kalirejo Permai Blok F-8, Rt02/Rw04, Desa Kalirejo, kecamatan Dringu, Kab. Probolinggo', NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(59, 'Andhi Nursahara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'andhi@mail.com', '', 'andhi.png', 'member', NULL, 0, '', 1, 0, 1, '2023-07-03 15:34:48', 1, '2023-07-03 15:34:48', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(60, 'Nadhira Salsabilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nadhira@mail.com', '', 'nadhira.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-07-03 15:34:48', 1, '2023-07-03 15:34:48', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(61, 'Cecylia Putri Gianti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cecylia@mail.com', '', 'cecylia.jpg', 'member', NULL, 0, NULL, 1, 0, 1, '2023-07-03 15:34:48', 1, '2023-07-03 16:25:41', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(62, 'testMaxy1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tester@gmail.com', '$2y$10$AOzC7aTuwASgeqWdTR73UOYXGsbj1VdGDFjJCXrQSSOIKXi0kCAqW', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-07-06 07:10:22', 0, '2023-07-06 07:10:22', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(63, 'testMaxy1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tester8@gmail.com', '$2y$10$luHuvnOzNq0e3Lqf4cEU3Ornf5svxxhWgJ3SjPLPy62jpw0ud7fnO', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-07-06 07:12:40', 0, '2023-07-06 07:12:40', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(64, 'Ardimas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ardims@maxyacademy.com', '$2y$10$v0XIgwIDUYm/LNi88nnvxO1vJPsmJKiSUa4XYAmocCiSIw6xeETdW', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-07-06 07:29:17', 0, '2023-07-06 07:29:17', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(65, 'testMaxy1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tester1@gmail.com', '$2y$10$9V./C1bnde/h3PATEkVugO5Lzo0q5doECu1F2OtN7TnQUY4WQM0Du', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-07-06 07:48:35', 0, '2023-07-06 07:48:35', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-20 04:50:50', NULL),
(66, 'CB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'coba@gmail.com', '$2y$10$Ca0mq8MlwrBGOrkuD0Y8xeRlSR/qQYQPuPUdrcGi7qffAL9N68/gW', NULL, 'member', NULL, 1, 'halo\r\n', 1, 700, 45, '2023-07-18 01:34:53', 0, '2023-09-03 04:06:27', 0, NULL, 'ada deh', NULL, 0, NULL, NULL, '2023-09-07 04:02:03', NULL),
(67, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'h@gmail.com', '$2y$10$Qz.ctCCHlt.e.ebUWbjFvuxjn31qbefAqV2yPX2wTs480/arvZOUG', NULL, 'member', NULL, 0, NULL, NULL, 0, 1, '2023-07-22 07:31:49', 0, '2023-07-22 07:31:49', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-23 18:11:38', NULL),
(87, 'Jovan Thezar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jovan.maxy.academy@gmail.com', '$2y$10$Y8y21r4BFzMl7t6Bnxeu7uo/nF9osPn2oKe0naP5Skf6xe9g6NzJ6', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-08-08 02:17:29', 1, '2023-08-08 02:17:29', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-08 02:17:29', NULL),
(88, 'N A L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nabellleo@gmail.com', '$2y$10$NYGR8VF7.k7iT3MDFwrqd.cVA163xZZG4DNtvDLxBXIvHS1B.iApK', NULL, 'member', NULL, 0, NULL, 1, 0, 1, '2023-08-15 02:04:57', 1, '2023-08-15 02:04:57', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-15 02:04:57', NULL),
(89, 'bk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bk@gmail.com', '$2y$10$SXaMaQJf7Cusk1GT.o3LSO.D20dJKcHGKKjvdbtiT6qgqAmwWEQLi', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-08-31 02:11:31', 0, '2023-08-31 02:11:31', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-31 02:11:31', NULL),
(90, 'hana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hana@gmail.com', '$2y$10$3vztKvVWtc1oKKW1xKpDE.dHySd2OXZHaGOc5vhZpKLiACa2eIkbi', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-08-31 02:18:18', 0, '2023-08-31 02:18:18', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-31 02:18:18', NULL),
(92, 'Harry Winston', 'harry', 'TikTok', '2023-08-27', '081284671234', 'UKP', 'Tech Industry', 6, NULL, 'vrsbr', NULL, 'harry@gmail.com', '$2y$10$zr9EslAhHrM1VRLBFENvDuU4y3W4AXfYja6y7r5kIj4embpjN642a', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-09-04 04:10:11', 0, '2023-09-04 04:10:11', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-04 04:10:11', NULL),
(93, 'william willy', 'willy', 'FB', '2023-09-01', '089512347865', 'UC', 'Tech Industry', 4, NULL, 'halo', NULL, 'willy@gmail.com', '$2y$10$MDL7vh0UL8rHU9MPpdFFd.Z.9odO0aNRfxlwRF4z7y/WvuvgfzuT.', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-09-05 01:33:53', 0, '2023-09-05 01:33:53', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-05 01:33:53', NULL),
(94, 'jisooya', 'soo', 'TikTok', '2023-08-27', '081212123412', 'UC', 'Tech Industry', 3, NULL, 'test', NULL, 'sooya@gmail.com', '$2y$10$WZ8DNHe9880rqjN5aFVTxeFSyBN91AeEG2CIzND/3.OKME74wMiUa', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-09-05 04:18:51', 0, '2023-09-05 04:18:51', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-05 04:18:51', NULL),
(95, 'Berlin Chandra', 'Berlin', 'TikTok', '2023-06-28', '081212121212', 'ITS', 'Tech Industry', 6, NULL, 'gugugaga', '1693893649.png', 'berlin@gmail.com', '$2y$10$YxgG2xcwAbBnE3HTWhwyH.DyrriYtlmdX2tOIR.tZ4TrsCBs/wzVi', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-09-05 06:02:03', 0, '2023-09-05 06:02:03', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-05 06:02:03', NULL),
(96, 'k', 'k', 'TikTok', '2023-08-31', '1', '1', '1', 1, '1', '1', '1693896544.png', 'k@gmail.com', '$2y$10$k4I2g0QNw3rl.Eb3xHB9mOkSiVdv5LpCUMmo0rvC8ua1jR1wF/MGa', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, '2023-09-05 06:49:38', 0, '2023-09-05 06:49:38', 0, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-05 06:49:38', NULL),
(97, 'CONAAAAAAAAAAAAAAAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CCCCCCCC@gmail.com', '$2y$10$2XpdpieviIMnBmp8PGYCQueMEK4LmsezJ/1/W6PTtuggC2QjgG1D6', NULL, 'admin', NULL, 1, 'COBAAAA ADDDDD DR CMSSSSS EDITT DR CMSSSS', 0, 0, 1, '2023-09-11 04:59:50', 1, '2023-09-11 06:31:21', 1, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-11 06:36:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_failed_attempts`
--

CREATE TABLE `users_failed_attempts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `ip`, `users_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, '127.0.0.1', 1, 'User toro created access_master id 166', 0, '2023-01-24 06:46:46', 1, '2023-01-24 06:46:46', 1),
(2, '127.0.0.1', 1, 'User toro created access_master id 167', 0, '2023-01-24 06:47:04', 1, '2023-01-24 06:47:04', 1),
(3, '127.0.0.1', 1, 'User toro created access_master id 168', 0, '2023-01-24 06:47:17', 1, '2023-01-24 06:47:17', 1),
(4, '127.0.0.1', 1, 'User toro created access_master id 169', 0, '2023-01-24 06:47:40', 1, '2023-01-24 06:47:40', 1),
(5, '127.0.0.1', 1, 'User toro created access_master id 170', 0, '2023-01-24 06:47:57', 1, '2023-01-24 06:47:57', 1),
(6, '127.0.0.1', 1, 'User toro created access_master id 171', 0, '2023-01-24 06:54:12', 1, '2023-01-24 06:54:12', 1),
(7, '127.0.0.1', 1, 'User toro created access_master id 172', 0, '2023-01-24 06:54:29', 1, '2023-01-24 06:54:29', 1),
(8, '127.0.0.1', 1, 'User toro created access_master id 173', 0, '2023-01-24 06:54:42', 1, '2023-01-24 06:54:42', 1),
(9, '127.0.0.1', 1, 'User toro created access_master id 174', 0, '2023-01-24 06:55:03', 1, '2023-01-24 06:55:03', 1),
(10, '127.0.0.1', 1, 'User toro created access_master id 175', 0, '2023-01-24 06:55:16', 1, '2023-01-24 06:55:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verify_members`
--

CREATE TABLE `verify_members` (
  `member_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_group`
--
ALTER TABLE `access_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `access_group_detail`
--
ALTER TABLE `access_group_detail`
  ADD KEY `id_access_group` (`access_group_id`,`access_master_id`),
  ADD KEY `id_access_master` (`access_master_id`);

--
-- Indexes for table `access_master`
--
ALTER TABLE `access_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_m_course_type` (`m_course_type_id`,`m_difficulty_type_id`,`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `id_m_difficulty_type` (`m_difficulty_type_id`),
  ADD KEY `id_course_package` (`course_package_id`),
  ADD KEY `m_course_type_id` (`m_course_type_id`,`course_package_id`,`m_difficulty_type_id`);

--
-- Indexes for table `course_class`
--
ALTER TABLE `course_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`course_id`,`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_class_member`
--
ALTER TABLE `course_class_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans_order` (`trans_order_id`),
  ADD KEY `id_course_class` (`course_class_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `user_id` (`user_id`,`course_class_id`,`trans_order_id`) USING BTREE,
  ADD KEY `id_user` (`user_id`,`course_class_id`,`trans_order_id`) USING BTREE;

--
-- Indexes for table `course_class_member_history`
--
ALTER TABLE `course_class_member_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course_class_member` (`course_class_member_id`,`course_module_id`),
  ADD KEY `id_course_module` (`course_module_id`);

--
-- Indexes for table `course_class_module`
--
ALTER TABLE `course_class_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course_class` (`course_class_id`,`course_module_id`),
  ADD KEY `id_course_module` (`course_module_id`),
  ADD KEY `created_id` (`created_id`,`updated_id`);

--
-- Indexes for table `course_company`
--
ALTER TABLE `course_company`
  ADD KEY `id_course` (`course_id`,`company_id`),
  ADD KEY `id_company` (`company_id`);

--
-- Indexes for table `course_module`
--
ALTER TABLE `course_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`course_id`,`course_module_parent_id`,`created_id`,`updated_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_course_module_parent` (`course_module_parent_id`);

--
-- Indexes for table `course_module_discussion`
--
ALTER TABLE `course_module_discussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `id_course_module` (`course_module_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_course_module_discussion` (`course_module_discussion_id`),
  ADD KEY `id_user` (`user_id`,`course_module_id`,`course_module_discussion_id`) USING BTREE;

--
-- Indexes for table `course_package`
--
ALTER TABLE `course_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `course_package_benefit`
--
ALTER TABLE `course_package_benefit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `id_course_price` (`course_package_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `course_tutor`
--
ALTER TABLE `course_tutor`
  ADD KEY `id_course` (`course_id`,`users_id`),
  ADD KEY `id_m_tutor` (`users_id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `maxy_talk`
--
ALTER TABLE `maxy_talk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `maxy_talk_parent` (`maxy_talk_parent_id`);

--
-- Indexes for table `member_certification`
--
ALTER TABLE `member_certification`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_education`
--
ALTER TABLE `member_education`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_experience`
--
ALTER TABLE `member_experience`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_organization`
--
ALTER TABLE `member_organization`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_parent`
--
ALTER TABLE `member_parent`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_portfolio`
--
ALTER TABLE `member_portfolio`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_skill`
--
ALTER TABLE `member_skill`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_submission`
--
ALTER TABLE `member_submission`
  ADD KEY `id_course_class_module` (`course_class_module_id`),
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_testimonial`
--
ALTER TABLE `member_testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course_class` (`course_class_id`),
  ADD KEY `id_course` (`course_id`),
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `member_transcript`
--
ALTER TABLE `member_transcript`
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bank`
--
ALTER TABLE `m_bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `m_bank_account`
--
ALTER TABLE `m_bank_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_m_bank` (`m_bank_id`);

--
-- Indexes for table `m_content_carousel`
--
ALTER TABLE `m_content_carousel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `m_content_carousel_button`
--
ALTER TABLE `m_content_carousel_button`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_content_carousel` (`content_carousel_id`);

--
-- Indexes for table `m_content_faq`
--
ALTER TABLE `m_content_faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_content_faq` (`content_faq_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `m_content_page`
--
ALTER TABLE `m_content_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `m_content_program_step`
--
ALTER TABLE `m_content_program_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `m_content_program_step_button`
--
ALTER TABLE `m_content_program_step_button`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_program_step` (`program_step_id`);

--
-- Indexes for table `m_course_type`
--
ALTER TABLE `m_course_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `m_difficulty_type`
--
ALTER TABLE `m_difficulty_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `no_generator`
--
ALTER TABLE `no_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `partner_university_detail`
--
ALTER TABLE `partner_university_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_partner` (`partner_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`,`updated_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `promotion_course`
--
ALTER TABLE `promotion_course`
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_promotion` (`id_promotion`);

--
-- Indexes for table `temp_api`
--
ALTER TABLE `temp_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`course_id`,`course_class_id`,`user_id`,`course_package_id`,`promotion_id`,`user_forced_id`,`created_id`,`updated_id`),
  ADD KEY `id_promotion` (`promotion_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `id_course_class` (`course_class_id`),
  ADD KEY `id_course_price` (`course_package_id`),
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indexes for table `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans_order` (`trans_order_id`,`m_bank_account_id`,`created_id`,`updated_id`),
  ADD KEY `id_m_bank_account` (`m_bank_account_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `created_id` (`created_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_company` (`partner_id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_access_group` (`access_group_id`);

--
-- Indexes for table `users_failed_attempts`
--
ALTER TABLE `users_failed_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`),
  ADD KEY `id_user` (`users_id`,`created_id`,`updated_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_group`
--
ALTER TABLE `access_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `access_master`
--
ALTER TABLE `access_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `course_class`
--
ALTER TABLE `course_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_class_member`
--
ALTER TABLE `course_class_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `course_class_member_history`
--
ALTER TABLE `course_class_member_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `course_class_module`
--
ALTER TABLE `course_class_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `course_module`
--
ALTER TABLE `course_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT for table `course_module_discussion`
--
ALTER TABLE `course_module_discussion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_package`
--
ALTER TABLE `course_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_package_benefit`
--
ALTER TABLE `course_package_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `maxy_talk`
--
ALTER TABLE `maxy_talk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member_testimonial`
--
ALTER TABLE `member_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `m_bank`
--
ALTER TABLE `m_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `m_bank_account`
--
ALTER TABLE `m_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_content_carousel`
--
ALTER TABLE `m_content_carousel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_content_carousel_button`
--
ALTER TABLE `m_content_carousel_button`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_content_faq`
--
ALTER TABLE `m_content_faq`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `m_content_page`
--
ALTER TABLE `m_content_page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_content_program_step`
--
ALTER TABLE `m_content_program_step`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_content_program_step_button`
--
ALTER TABLE `m_content_program_step_button`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_course_type`
--
ALTER TABLE `m_course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_difficulty_type`
--
ALTER TABLE `m_difficulty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `no_generator`
--
ALTER TABLE `no_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `partner_university_detail`
--
ALTER TABLE `partner_university_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_api`
--
ALTER TABLE `temp_api`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users_failed_attempts`
--
ALTER TABLE `users_failed_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_group`
--
ALTER TABLE `access_group`
  ADD CONSTRAINT `access_group_ibfk_1` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `access_group_ibfk_2` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `access_group_detail`
--
ALTER TABLE `access_group_detail`
  ADD CONSTRAINT `access_group_detail_ibfk_1` FOREIGN KEY (`access_group_id`) REFERENCES `access_group` (`id`),
  ADD CONSTRAINT `access_group_detail_ibfk_2` FOREIGN KEY (`access_master_id`) REFERENCES `access_master` (`id`);

--
-- Constraints for table `access_master`
--
ALTER TABLE `access_master`
  ADD CONSTRAINT `access_master_ibfk_1` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `access_master_ibfk_2` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`m_course_type_id`) REFERENCES `m_course_type` (`id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`m_difficulty_type_id`) REFERENCES `m_difficulty_type` (`id`);

--
-- Constraints for table `course_tutor`
--
ALTER TABLE `course_tutor`
  ADD CONSTRAINT `course_tutor_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `course_tutor_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `maxy_talk`
--
ALTER TABLE `maxy_talk`
  ADD CONSTRAINT `maxy_talk_ibfk_1` FOREIGN KEY (`maxy_talk_parent_id`) REFERENCES `maxy_talk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
