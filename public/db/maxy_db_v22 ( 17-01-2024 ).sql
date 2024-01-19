-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2024 pada 04.44
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxy_db_v22`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_group`
--

CREATE TABLE `access_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `access_group`
--

INSERT INTO `access_group` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'super', 'fixed', 1, '2022-09-20 09:01:02', 1, '2023-11-17 11:24:41', 1),
(2, 'member', 'fixed, for members', 1, '2023-11-09 13:58:58', 1, '2023-11-09 13:58:58', 1),
(3, 'mentor', 'fixed, for mentors', 1, '2023-11-09 13:58:58', 1, '2023-11-09 13:58:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_group_detail`
--

CREATE TABLE `access_group_detail` (
  `access_group_id` int(11) NOT NULL,
  `access_master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `access_group_detail`
--

INSERT INTO `access_group_detail` (`access_group_id`, `access_master_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 166),
(1, 167),
(1, 168),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 184),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 183),
(1, 3),
(1, 185),
(1, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_master`
--

CREATE TABLE `access_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `access_master`
--

INSERT INTO `access_master` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'access_group_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-17 13:26:39', 1),
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
(31, 'course_class_member_grading_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-09 10:41:24', 1),
(32, 'course_class_member_grading_update', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-09 13:48:58', 1),
(33, 'course_class_member_grading_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-09 13:49:25', 1),
(34, 'course_class_member_log_read', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-09 13:49:59', 1),
(35, 'course_class_member_log_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-09 13:50:10', 1),
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
(56, 'm_general_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:48:00', 1),
(57, 'm_general_create', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:48:06', 1),
(58, 'm_general_read', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:48:11', 1),
(59, 'm_general_update', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:48:16', 1),
(60, 'm_general_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:48:20', 1),
(61, 'member_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(62, 'member_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(63, 'member_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(64, 'member_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(65, 'member_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(66, 'user_testimonial_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:22:00', 1),
(67, 'user_testimonial_create', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:22:12', 1),
(68, 'user_testimonial_read', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:22:17', 1),
(69, 'user_testimonial_update', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:22:23', 1),
(70, 'user_testimonial_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2023-11-08 23:22:30', 1),
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
(106, 'm_promo_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(107, 'm_promo_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(108, 'm_promo_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(109, 'm_promo_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(110, 'm_promo_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(111, 'promo_course_manage', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(112, 'promo_course_create', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(113, 'promo_course_read', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(114, 'promo_course_update', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(115, 'promo_course_delete', NULL, 0, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
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
(186, 'course_package_manage', NULL, 0, '2023-06-07 04:56:07', 1, '2023-06-07 11:57:28', 1),
(187, 'm_partner_manage', NULL, 0, '2023-06-21 02:37:02', 1, '2023-06-21 02:37:02', 1),
(188, 'm_partner_create', NULL, 0, '2023-06-21 02:37:13', 1, '2023-06-21 02:37:13', 1),
(189, 'm_partner_update', NULL, 0, '2023-06-21 02:37:19', 1, '2023-06-21 02:37:19', 1),
(190, 'partner_university_detail_manage', NULL, 0, '2023-06-21 02:37:30', 1, '2023-06-21 02:37:30', 1),
(191, 'partner_university_detail_create', NULL, 0, '2023-06-21 02:37:39', 1, '2023-06-21 02:37:39', 1),
(192, 'partner_university_detail_update', NULL, 0, '2023-06-21 02:37:45', 1, '2023-06-21 02:37:45', 1),
(193, 'maxy_talk_manage', NULL, 0, '2023-07-06 08:49:50', 1, '2023-07-06 08:49:50', 1),
(194, 'maxy_talk_create', NULL, 0, '2023-07-06 08:49:57', 1, '2023-07-06 08:49:57', 1),
(195, 'maxy_talk_update', NULL, 0, '2023-07-06 08:50:04', 1, '2023-07-06 08:50:04', 1),
(196, 'trans_voucher_manage', NULL, 1, '2023-11-06 16:00:18', 1, '2023-11-06 16:00:18', 1),
(197, 'trans_voucher_create', NULL, 1, '2023-11-06 16:00:56', 1, '2023-11-06 16:00:56', 1),
(198, 'trans_voucher_update', NULL, 1, '2023-11-06 16:00:56', 1, '2023-11-06 16:00:56', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fake_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `short_description` text NOT NULL COMMENT 'description shown at cards (course list)',
  `image` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `target` text NOT NULL COMMENT 'split with ;;',
  `payment_link` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `m_course_type_id` int(11) NOT NULL,
  `course_package_id` int(11) DEFAULT NULL,
  `m_difficulty_type_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id`, `name`, `fake_price`, `price`, `short_description`, `image`, `preview`, `target`, `payment_link`, `slug`, `m_course_type_id`, `course_package_id`, `m_difficulty_type_id`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Backend', NULL, NULL, '<p>Explore pemrograman backend dengan Laravel dan dapatkan pemahaman mendalam tentang pengembangan aplikasi web modern. Kursus ini dirancang untuk membimbing Anda melalui konsep-konsep inti Laravel, termasuk routing, model, dan kontroler.</p>', 'backend.png', '', '', 'abcd', 'backend', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Backend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', '<p>Explore pemrograman backend dengan Laravel dan dapatkan pemahaman mendalam tentang pengembangan aplikasi web modern. Kursus ini dirancang untuk membimbing Anda melalui konsep-konsep inti Laravel, termasuk routing, model, dan kontroler.</p>\r\n<p>Dengan fokus pada praktik terbaik dan pengalaman praktis, Anda akan membangun aplikasi web dinamis dan efisien. Dari manajemen basis data hingga otentikasi pengguna, Anda akan menguasai alat-alat penting dalam ekosistem Laravel.</p>\r\n<p>Tingkatkan keterampilan Anda dalam pembuatan API dengan Laravel Passport dan eksplorasi konsep-konsep lanjutan seperti pengujian dan optimasi performa. Dengan kursus ini, Anda siap untuk menjadi pengembang backend yang handal menggunakan Laravel.</p>', 1, '2022-09-26 10:56:03', 1, '2024-01-02 11:05:08', 1),
(2, 'Frontend', NULL, NULL, '<p>Temukan keindahan tampilan aplikasi web dengan kursus Pengembangan Frontend. Pelajari teknologi terkini seperti HTML, CSS, dan JavaScript untuk menciptakan antarmuka pengguna yang menakjubkan dan responsif.</p>', 'frontend.png', '', '', '', 'frontend', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Frontend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2022-09-26 10:56:27', 1, '2023-12-27 23:33:19', 1),
(3, 'UI/UX', NULL, NULL, '<p>Raih keterampilan desain terbaik dengan kursus Desain Antarmuka Pengguna (UI/UX). Pelajari prinsip-proinsip desain yang mendalam dan aplikasikan pengetahuan Anda untuk menciptakan pengalaman pengguna yang luar biasa.</p>', 'uiux.png', '', '', '', 'ui-ux', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai UI/UX Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2022-09-26 10:56:54', 1, '2023-12-27 23:33:19', 1),
(4, 'Entrepreneur', NULL, NULL, '<p>Jelajahi dunia kewirausahaan dengan kursus ini. Dengan menggunakan pendekatan praktis, Anda akan belajar mengembangkan ide bisnis, merancang model bisnis yang sukses, dan membimbing perusahaan Anda menuju kesuksesan.</p>', 'enterpreneur.jpg', '', '', '', 'entrepreneur', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Entrepreneur dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 0, '2022-09-26 10:57:28', 1, '2023-12-27 23:33:19', 1),
(5, 'Knockout JS', NULL, NULL, '<p>Kuasai KnockoutJS dengan mudah melalui kursus ini. Dengan teknologi pemrograman terkini, Anda akan belajar cara membangun aplikasi web yang dinamis dan interaktif dengan mudah.</p>', 'k.jpg', '', '', '', 'knockout-js', 2, NULL, 1, '<p>Knockout is a JavaScript library that helps you to create rich, responsive display and editor user interfaces with a clean underlying data model. Any time you have sections of UI that update dynamically (e.g., changing depending on the user’s actions or when an external data source changes), KO can help you implement it more simply and maintainably.</p>', NULL, 1, '2022-09-26 10:58:16', 1, '2023-12-27 23:33:19', 1),
(6, 'PHP', NULL, NULL, '<p>Menjadi ahli dalam bahasa pemrograman PHP dengan kursus ini. Pelajari dasar-dasar bahasa pemrograman dan praktik terbaik pengembangan web dengan PHP, membuka peluang baru di dunia pengembangan perangkat lunak.</p>', 'php.jpg', '', '', '', 'php', 2, NULL, 1, '<p>PHP is an HTML-embedded scripting language. Much of its syntax is borrowed from C, Java and Perl with a couple of unique PHP-specific features thrown in. The goal of the language is to allow web developers to write dynamically generated pages quickly.</p>', NULL, 1, '2022-09-28 16:42:00', 1, '2023-12-27 23:33:19', 1),
(7, 'Javascript', NULL, NULL, '<p>Penuhi potensi JavaScript Anda melalui kursus ini. Dari dasar-dasar hingga konsep lanjutan, Anda akan menguasai JavaScript dan memahami cara membangun aplikasi web modern yang dinamis dan efisien.</p>', 'js.jpg', '', '', '', 'javascript', 2, NULL, 1, '<p><strong>JavaScript,</strong> often abbreviated to <strong>JS</strong>, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use JavaScript on the client side for webpage behavior, often incorporating third-party libraries. All major web browsers have a dedicated JavaScript engine to execute the code on users\' devices.</p>\n<p>JavaScript is a high-level, often just-in-time compiled language that conforms to the ECMAScript standard. It has dynamic typing, prototype-based object-orientation, and first-class functions. It is multi-paradigm, supporting event-driven, functional, and imperative programming styles. It has application programming interfaces (APIs) for working with text, dates, regular expressions, standard data structures, and the Document Object Model (DOM).</p>\n<p>The ECMAScript standard does not include any input/output (I/O), such as networking, storage, or graphics facilities. In practice, the web browser or other runtime system provides JavaScript APIs for I/O.</p>', NULL, 1, '2022-10-03 12:58:33', 1, '2023-12-27 23:33:19', 1),
(8, 'Python', NULL, NULL, '<p>Pelajari dasar-dasar bahasa pemrograman Python dan asah keterampilan pengkodean Anda. Kursus ini akan membimbing Anda melalui pemahaman mendalam tentang Python, membuka pintu menuju pengembangan aplikasi yang efisien.</p>', 'python.png', '', '', '', 'python', 2, NULL, 1, '<p>Python is an interpreted, interactive, object-oriented programming language. It incorporates modules, exceptions, dynamic typing, very high level dynamic data types, and classes. It supports multiple programming paradigms beyond object-oriented programming, such as procedural and functional programming. Python combines remarkable power with very clear syntax. It has interfaces to many system calls and libraries, as well as to various window systems, and is extensible in C or C++. It is also usable as an extension language for applications that need a programmable interface. Finally, Python is portable: it runs on many Unix variants including Linux and macOS, and on Windows.</p>', NULL, 1, '2022-10-03 15:50:14', 1, '2023-12-27 23:33:19', 1),
(9, 'Digital Content Creator', 3000000, 299000, '<p>Sekarang semua bisa berkarir menjadi Tiktok Content Creator!</p>', 'digital_content_creator.jpg', '', '', 'https://invoice.xendit.co/od/mbcp-cc-b04', 'digital-content-creator-mbc', 3, NULL, 1, 'Mau jadi Tiktok Content Creator tapi bingung mulai dari mana dan followers masih sedikit?\nJoin Mini Bootcamp Digital Content Creator Academy sekarang!\n\nTimeline:\n- 2 weeks Coaching', NULL, 1, '2023-02-24 11:43:52', 1, '2023-08-25 15:46:48', 1),
(10, 'Hybrid Apps', NULL, 1200000, '<p>Belajar membuat website dan aplikasi dengan Framework 7 - 8 jam pembelajaran</p>', 'final_yoo seung ho-1701000784926-0748-b49764a1-0573-4e9d-8a98-27cb99d74877-3110.jpg', '', '', 'https://invoice.xendit.co/od/hybrid-apps', 'hybrid-apps', 3, NULL, 1, NULL, 'test', 0, '2023-03-24 08:42:03', 1, '2023-12-28 09:10:33', 1),
(11, 'Laravel Web Application Framework', NULL, 1500000, '<p>Belajar Laravel Web Application Framework dalam mengembangkan website selama 10 jam pembelajaran</p>', 'Prakerja-Hybrid_1.jpg', '', '', 'https://invoice.xendit.co/od/laravel-web', 'laravel-web-application-framework', 3, NULL, 1, NULL, NULL, 0, '2023-03-24 08:42:03', 1, '2023-07-04 14:19:28', 1),
(12, 'UI/UX Design With Figma', NULL, 1500000, '<p>Belajar mendesign UI/UX website design dengan Figma dalam 12jam</p>', 'Prakerja-Hybrid_1.jpg', '', '', 'https://invoice.xendit.co/od/miniBootcamp-UIUX', 'ui-ux-design-with-figma', 3, NULL, 1, NULL, NULL, 0, '2023-03-24 08:42:03', 1, '2023-07-04 14:19:14', 1),
(13, 'Hackathon - Improve Sales for Medium to High International Cosmetic Brand', NULL, NULL, '', '', '', '', '', 'improve-sales-jennyhouse', 4, NULL, 1, 'Jenny House, with the largest number of top makeup artists in Korea, Jenny House Cosmetics is an all-Green grade natural derma cosmetic brand. All products are\nformulated with the finest natural ingredients and designed to give innovative dermatologic efficacies. Natural yet dermatologic, the two key concepts, are Maximized for Jenny House Cosmetics. Currently, Jenny House has existed in Indonesia to make it easier for our loyal customers to get our best products.', NULL, 1, '2023-03-29 13:16:50', 1, '2024-01-04 09:21:57', 1),
(14, 'Digital Marketing', NULL, NULL, '<p>Kenali potensi pemasaran digital dengan kursus ini. Dengan menggali berbagai strategi dan alat-alat digital, Anda akan dapat merancang kampanye pemasaran yang sukses untuk mendukung pertumbuhan bisnis Anda.</p>', 'digital_marketing.png', '', '', '', 'digital-marketing', 1, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Digital Marketing dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2023-05-11 09:38:43', 0, '2023-12-27 23:33:19', 0),
(15, 'Rapid Backend Development Bootcamp', NULL, 9000000, 'MSIB Bootcamp - Rapid Backend Development Bootcamp', 'MSIB.png', '', '', '', 'msib-backend', 6, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Backend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2023-05-29 08:38:11', 1, '2023-07-05 15:08:57', 1),
(16, 'Rapid Frontend Development Bootcamp', NULL, 9000000, 'MSIB Bootcamp - Rapid Frontend Development Bootcamp', 'MSIB.png', '', '', '', 'msib-frontend', 6, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Frontend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2023-05-29 08:38:11', 1, '2023-07-05 15:08:57', 1),
(17, 'Rapid UI/UX Development Bootcamp', NULL, 9000000, 'MSIB UI/UX - Rapid UI/UX Development Bootcamp', 'MSIB.png', '', '', '', 'msib-uiux', 6, NULL, 1, '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai UI/UX Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2023-05-29 08:44:59', 1, '2023-07-05 15:08:57', 1),
(18, 'Speak Japanese Like a Local', 2000000, 299000, 'Mau ke Jepang? Belajar bahasanya dulu, yuk!', 'speak_japanese_like_local.jpg', '-', '-', '', 'speak-japanese-like-a-local', 3, NULL, 1, '<p>Kami dapat membantumu mendapatkan keahlian Berbahasa Jepang seperti Warga Lokal dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', NULL, 1, '2023-06-28 11:59:53', 1, '2023-12-09 23:10:36', 1),
(19, 'Cyber Security', 0, 0, '<p>Melindungi aplikasi web Anda dari ancaman siber dengan memahami konsep keamanan Laravel. Dalam kursus ini, Anda akan belajar cara mengamankan proyek Laravel Anda agar tetap terlindungi dari potensi risiko keamanan.</p>', 'no.jpg', '0', '0', '0', 'cyber-security', 1, 1, 2, NULL, NULL, 0, '2023-07-03 06:54:47', 1, '2023-12-27 23:33:19', 1),
(20, 'Hacking is not Cracking', 2000000, 299000, 'Belajar hacking dalam waktu hitungan bulan!', 'hacking_not_cracking.jpg', '-', '-', 'https://invoice.xendit.co/od/mbcp-cs-b03', 'hacking-is-not-cracking', 3, NULL, 1, '<p>Hacking dan cracking adalah dua hal yang berbeda.<p> Hacking adalah proses mencari celah keamanan dalam sistem komputer atau jaringan komputer dengan tujuan untuk meningkatkan keamanan sistem tersebut.</p><p>Sedangkan cracking adalah proses mencari celah keamanan dalam sistem komputer atau jaringan komputer dengan tujuan untuk merusak atau mengambil alih sistem tersebut.</p></p>', NULL, 1, '2023-07-04 14:18:46', 1, '2023-12-09 23:10:36', 1),
(21, 'Digital Marketing', 2000000, 299000, 'Kami dapat membantumu digital marketing Expert dalam hitungan bulan!', 'digital_marketing.jpg', '-', '-', 'https://invoice.xendit.co/od/mbcp-dm-b01', 'min-digital-marketing', 3, NULL, 1, 'Belajar digital marketing dapat membantu Anda memahami bagaimana cara memasarkan produk atau layanan Anda secara online. Dalam era digital saat ini, belajar digital marketing sangat penting untuk meningkatkan penjualan dan menjangkau pasar yang lebih luas. Selain itu, Anda juga dapat mempelajari cara membuat konten yang menarik dan efektif untuk menarik perhatian pelanggan potensial.', NULL, 1, '2023-07-04 14:18:46', 1, '2023-12-09 23:10:36', 1),
(23, 'Desain UI/UX website Tingkat Dasar', NULL, 1500000, '', 'lowongan1.png', '', '', 'https://pintar.co/desain-ui-ux-website-dengan-figma-tingkat-dasar ', 'desain-ui-ux-website-tingkat-dasar', 5, NULL, 2, 'Desain UI/UX website Tingkat Menengah', NULL, 1, '2023-09-12 11:48:23', 1, '2023-12-27 18:17:43', 1),
(25, 'Teknik Memasarkan Produk untuk Spesialis Pemasaran', NULL, 1500000, '', 'lowongan2.png', '', '', '', 'teknik-memasarkan-produk-untuk-spesialis-pemasaran', 5, NULL, 1, 'Teknik Memasarkan Produk untuk Spesialis Pemasaran', NULL, 1, '2023-09-13 16:17:44', 1, '2023-12-09 23:10:36', 1),
(26, 'Mengenal Media Digital Marketing bagi Spesialis Pemasaran', NULL, 1500000, '', 'lowongan3.png', '', '', '', 'mengenal-media-digital-marketing-bagi-spesialis-pemasaran', 5, NULL, 1, 'Mengenal Media Digital Marketing bagi Spesialis Pemasaran', NULL, 1, '2023-09-13 16:17:44', 1, '2023-12-09 23:10:36', 1),
(27, 'Digital Marketing 101: Sosial Media Marketing', NULL, 1500000, '', 'lowongan4.png', '', '', '', 'digital-marketing-101-sosial-media-marketing', 5, NULL, 1, 'Digital Marketing 101: Sosial Media Marketing', NULL, 1, '2023-09-13 16:17:44', 1, '2023-12-09 23:10:36', 1),
(28, 'Menguasai Marketing Sosial Media untuk Social Media Specialist', NULL, 1500000, '', 'lowongan5.png', '', '', '', 'menguasai-marketing-sosial-media-untuk-social-media-specialist', 5, NULL, 1, 'Menguasai Marketing Sosial Media untuk Social Media Specialist', NULL, 1, '2023-09-13 16:17:44', 1, '2023-12-09 23:10:36', 1),
(29, 'Desain UI/UX Webiste dengan Tingkat Menengah', NULL, 1500000, '', 'lowongan6.png', '', '', 'https://pintar.co/desain-ui-ux-website-dengan-figma-tingkat-menengah', 'desain-uiux-webiste-dengan-tingkat-dasar', 5, NULL, 1, 'Desain UI/UX Webiste dengan Tingkat Dasar', NULL, 1, '2023-09-13 16:17:44', 1, '2023-12-09 23:10:35', 1),
(35, 'Web Administrasi Tingkat Dasar Menggunakan PHP Laravel', NULL, 1500000, '', 'lowongan2.png', '', '', '', 'web-administrasi-tingkat-dasar-menggunakan-php-laravel', 5, NULL, 1, 'Web Administrasi Tingkat Dasar Menggunakan PHP Laravel', NULL, 1, '2023-09-14 10:57:45', 1, '2023-12-09 23:10:36', 1),
(37, 'Hybrid Apps Menggunakan Framework7', NULL, 1500000, '', 'lowongan3.png', '', '', '', 'hybrid-apps-menggunakan-framework7', 5, NULL, 1, 'Hybrid Apps Menggunakan Framework7', NULL, 1, '2023-09-14 10:57:45', 1, '2023-12-09 23:10:36', 1),
(39, 'Membuat Website untuk Pemula', NULL, 1500000, '', 'lowongan7.png', '', '', '', 'membuat-website-untuk-pemula', 5, NULL, 1, 'Membuat Website untuk Pemula', NULL, 1, '2023-09-14 10:58:08', 1, '2023-12-09 23:10:36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_class`
--

CREATE TABLE `course_class` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quota` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Unlimited',
  `course_id` int(11) NOT NULL,
  `announcement` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_class`
--

INSERT INTO `course_class` (`id`, `batch`, `start_date`, `end_date`, `quota`, `course_id`, `announcement`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 1, '0000-00-00', '0000-00-00', 0, 1, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli di Backend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', 'fixed, default course_class', 1, '2023-11-09 13:58:58', 1, '2024-01-10 08:55:46', 1),
(2, 1, '2022-09-26', '2022-12-29', 0, 20, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Hacking is Not Cracking. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', '', 1, '2023-11-07 08:58:32', 1, '2024-01-10 08:59:12', 1),
(3, 1, '2022-09-26', '2022-12-29', 0, 5, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Knockout JS. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', '', 1, '2023-11-07 09:03:49', 1, '2024-01-10 08:59:12', 1),
(4, 1, '2022-09-26', '2022-12-29', 0, 6, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar PHP. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', '', 1, '2023-11-07 09:15:07', 1, '2024-01-10 08:59:12', 1),
(5, 1, '2022-09-26', '2022-12-29', 0, 7, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Javascript. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', '', 1, '2023-11-07 09:15:07', 1, '2024-01-10 08:59:12', 1),
(6, 1, '2022-09-26', '2022-12-29', 0, 8, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Python. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', '', 1, '2023-11-07 09:15:07', 1, '2024-01-10 08:59:12', 1),
(7, 1, '2022-09-26', '2022-12-29', 0, 23, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini, kami memberi Anda kursus terstruktur yang dirancang untuk mengajarkan Anda semua yang perlu Anda ketahui tentang Desain Situs Web UI/UX Tingkat Dasar. Kemajuan melalui setiap bagian, peroleh keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring Anda melanjutkan. Setiap bagian menggabungkan latihan dan penilaian untuk mengukur pemahaman Anda sebelum Anda melanjutkan lebih jauh.</p>', '', 1, '2023-11-07 11:34:18', 1, '2024-01-10 08:59:12', 1),
(8, 1, '0000-00-00', '0000-00-00', 0, 3, 'Jangan Lupa Mengerjakan Assignment\r\n', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar UI/UX. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 14:31:51', 1, '2024-01-10 08:59:12', 1),
(9, 1, '0000-00-00', '0000-00-00', 0, 4, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Wirausaha. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 0, '2023-11-20 15:02:20', 1, '2024-01-10 08:59:12', 1),
(10, 1, '0000-00-00', '0000-00-00', 0, 9, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Pembuat Konten Digital. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda sebelum melanjutkan.</p>', NULL, 1, '2023-11-20 15:05:03', 1, '2024-01-10 08:59:12', 1),
(11, 1, '0000-00-00', '0000-00-00', 0, 10, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Aplikasi Hybrid. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:05:03', 1, '2024-01-10 08:59:12', 1),
(12, 1, '0000-00-00', '0000-00-00', 0, 11, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Kerangka Aplikasi Web Laravel. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:09:01', 1, '2024-01-10 08:59:12', 1),
(13, 1, '0000-00-00', '0000-00-00', 0, 12, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Desain UI/UX Dengan Figma. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:09:01', 1, '2024-01-10 08:59:12', 1),
(14, 1, '0000-00-00', '0000-00-00', 0, 13, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli di Backend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda sebelum melanjutkan.</p>', NULL, 1, '2023-11-20 15:09:01', 1, '2024-01-10 08:59:12', 1),
(15, 1, '0000-00-00', '0000-00-00', 0, 14, 'Jangan Lupa Mengerjakan Assignment\r\n', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Pemasaran Digital. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda sebelum melanjutkan.</p>', NULL, 1, '2023-11-20 15:09:01', 1, '2024-01-10 09:00:46', 1),
(16, 1, '0000-00-00', '0000-00-00', 0, 15, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Pengembangan Backend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:09:01', 1, '2024-01-10 09:00:46', 1),
(17, 1, '0000-00-00', '0000-00-00', 0, 2, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli di Frontend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:12:20', 1, '2024-01-10 09:00:46', 1),
(18, 1, '0000-00-00', '0000-00-00', 0, 16, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Pengembangan Frontend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:14:35', 1, '2024-01-10 09:00:46', 1),
(19, 1, '0000-00-00', '0000-00-00', 0, 17, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Pengembangan UI/UX. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:14:35', 1, '2024-01-10 09:00:46', 1),
(20, 1, '0000-00-00', '0000-00-00', 0, 18, '\r\nJangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Bahasa Jepang. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:14:35', 1, '2024-01-10 09:00:46', 1),
(21, 1, '0000-00-00', '0000-00-00', 0, 19, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Keamanan Cyber. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:14:35', 1, '2024-01-10 09:01:57', 1),
(22, 1, '0000-00-00', '0000-00-00', 0, 21, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Pemasaran Digital. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:01:57', 1),
(23, 1, '2022-09-26', '2022-12-29', 0, 25, 'Jangan Lupa Mengerjakan Assignment\r\n', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Teknik Pemasaran Produk untuk Spesialis Pemasaran. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:01:57', 1),
(24, 1, '0000-00-00', '0000-00-00', 0, 26, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Media Pemasaran Digital untuk Spesialis Pemasaran. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:01:57', 1),
(25, 1, '0000-00-00', '0000-00-00', 0, 27, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam Pemasaran Media Sosial. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:01:57', 1),
(26, 1, '0000-00-00', '0000-00-00', 0, 28, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Pemasaran Media Sosial untuk Spesialis Media Sosial. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>\r\n', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:03:26', 1),
(27, 1, '0000-00-00', '0000-00-00', 0, 29, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Desain UI/UX Situs Web Tingkat Menengah. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:03:26', 1),
(28, 1, '0000-00-00', '0000-00-00', 0, 35, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Administrasi Dasar Situs Web menggunakan PHP Laravel. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:03:26', 1),
(29, 1, '0000-00-00', '0000-00-00', 0, 37, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Membuat Aplikasi Hybrid menggunakan Framework7. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:03:26', 1),
(30, 1, '0000-00-00', '0000-00-00', 0, 39, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar Membuat Situs Web untuk Pemula. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2023-11-20 15:21:17', 1, '2024-01-10 09:03:26', 1),
(31, 2, '2023-11-24', '2023-11-24', 0, 1, 'Jangan Lupa Mengerjakan Assignment', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli di Backend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', 'fixed, default course_class', 1, '2023-11-24 02:15:42', 1, '2024-01-10 09:03:26', 1),
(32, 9, '2024-01-12', '2024-01-13', 0, 1, 'Backend - Batch 9', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli di Backend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2024-01-12 10:27:05', 1, '2024-01-12 10:50:25', 1),
(33, 9, '2024-01-15', '2024-01-15', 0, 2, 'Frontend - Batch 9', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli di Frontend. Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu. Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda.</p>', NULL, 1, '2024-01-15 10:58:44', 1, '2024-01-15 10:58:44', 1),
(34, 9, '2024-01-17', '2024-01-17', 0, 3, 'UI/UX Design - Batch 9', '<p>Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menguasai dasar-dasar UI/UX. Kerjakan setiap bagian, pelajari keterampilan baru (atau sempurnakan keterampilan yang sudah ada) seiring kemajuan Anda. Setiap bagian mencakup latihan dan penilaian untuk mengevaluasi pemahaman Anda sebelum melanjutkan lebih jauh.</p>', NULL, 1, '2024-01-17 09:31:49', 1, '2024-01-17 09:31:49', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_class_member`
--

CREATE TABLE `course_class_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_class_member`
--

INSERT INTO `course_class_member` (`id`, `user_id`, `course_class_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 66, 1, NULL, 1, '2023-11-06 16:23:04', 1, '2023-11-06 16:23:04', 1),
(2, 66, 2, NULL, 1, '2023-11-07 08:59:20', 1, '2023-11-07 08:59:20', 1),
(3, 66, 3, NULL, 1, '2023-11-07 09:04:20', 1, '2023-11-07 09:04:20', 1),
(4, 66, 4, NULL, 1, '2023-11-07 09:17:25', 1, '2023-11-07 09:17:25', 1),
(5, 66, 5, NULL, 1, '2023-11-07 09:17:25', 1, '2023-11-07 09:17:25', 1),
(6, 66, 6, NULL, 1, '2023-11-07 09:17:25', 1, '2023-11-07 09:17:25', 1),
(7, 66, 7, NULL, 1, '2023-11-07 11:34:36', 1, '2023-11-07 11:34:36', 1),
(8, 66, 8, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(9, 66, 9, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(10, 66, 10, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(11, 66, 11, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(12, 66, 12, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(13, 66, 13, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(14, 66, 14, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(15, 66, 15, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(16, 66, 16, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:19:17', 1),
(17, 66, 17, NULL, 1, '2023-11-20 15:28:36', 1, '2023-11-20 16:53:49', 1),
(18, 66, 18, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(19, 66, 19, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(20, 66, 20, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(21, 66, 21, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(22, 66, 22, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(23, 66, 23, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(24, 66, 24, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(25, 66, 25, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(26, 66, 26, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(27, 66, 27, NULL, 1, '2023-11-20 15:34:47', 1, '2023-11-20 16:19:17', 1),
(28, 66, 28, NULL, 1, '2023-11-20 15:35:39', 1, '2023-11-20 16:19:17', 1),
(29, 66, 29, NULL, 1, '2023-11-20 15:35:39', 1, '2023-11-20 16:19:17', 1),
(30, 66, 30, NULL, 1, '2023-11-20 15:35:39', 1, '2023-11-20 16:19:17', 1),
(31, 66, 31, NULL, 1, '2023-11-24 02:16:21', 1, '2023-11-24 02:16:21', 1),
(32, 66, 32, NULL, 1, '2024-01-12 10:28:28', 1, '2024-01-12 10:28:28', 1),
(33, 66, 33, NULL, 1, '2024-01-15 10:59:46', 1, '2024-01-15 10:59:46', 1),
(34, 66, 34, NULL, 1, '2024-01-17 09:32:42', 1, '2024-01-17 09:32:42', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_class_member_grading`
--

CREATE TABLE `course_class_member_grading` (
  `id` int(11) NOT NULL,
  `submitted_file` varchar(250) DEFAULT NULL,
  `js` text DEFAULT NULL,
  `html` text DEFAULT NULL,
  `python` text DEFAULT NULL,
  `python_input` text DEFAULT NULL,
  `php` text DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `course_class_module_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `package_type` varchar(255) DEFAULT NULL,
  `paket_soal` varchar(255) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `max_grade` int(11) DEFAULT NULL,
  `graded_at` datetime DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `tutor_comment` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_class_member_grading`
--

INSERT INTO `course_class_member_grading` (`id`, `submitted_file`, `js`, `html`, `python`, `python_input`, `php`, `comment`, `user_id`, `course_class_module_id`, `description`, `package_type`, `paket_soal`, `grade`, `max_grade`, `graded_at`, `tutor_id`, `tutor_comment`, `created_at`, `updated_at`) VALUES
(80, 'campuscoder-poster-2.png', NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet</p>', 66, 73, NULL, NULL, NULL, 100, 100, '2024-01-03 22:08:47', 14, 'Kerja bagus', '2023-12-31 22:38:39', '2024-01-03 15:08:47'),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-02 21:47:45', '2024-01-02 21:47:45'),
(82, 'campuscoder-poster-2.png', NULL, NULL, NULL, NULL, NULL, '<p>adsdssadsdad</p>', 66, 77, NULL, NULL, NULL, 50, NULL, '2024-01-03 22:14:44', NULL, 'Masih ada yang salah tuh', '2024-01-03 10:54:38', '2024-01-03 15:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_class_member_log`
--

CREATE TABLE `course_class_member_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_class_module_id` int(11) DEFAULT NULL,
  `log_type` varchar(255) NOT NULL COMMENT 'course_class, profile',
  `status_log` int(11) DEFAULT NULL COMMENT '1 : Create, 2 : Read, 3 : Update, 4 :Delete',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_class_member_log`
--

INSERT INTO `course_class_member_log` (`id`, `user_id`, `course_class_module_id`, `log_type`, `status_log`, `created_at`, `updated_at`) VALUES
(830, 66, 184, 'course_class', 2, '2024-01-02 00:30:20', '2024-01-02 00:30:20'),
(831, 66, 187, 'course_class', 2, '2024-01-02 00:31:15', '2024-01-02 00:31:15'),
(833, 66, 187, 'course_class', 2, '2024-01-02 00:34:09', '2024-01-02 00:34:09'),
(834, 66, 184, 'course_class', 2, '2024-01-02 00:36:25', '2024-01-02 00:36:25'),
(835, 66, 184, 'course_class', 2, '2024-01-02 00:37:12', '2024-01-02 00:37:12'),
(836, 66, 184, 'course_class', 2, '2024-01-02 00:44:18', '2024-01-02 00:44:18'),
(837, 66, 187, 'course_class', 2, '2024-01-02 00:44:21', '2024-01-02 00:44:21'),
(838, 66, 187, 'course_class', 2, '2024-01-02 00:46:03', '2024-01-02 00:46:03'),
(839, 66, 187, 'course_class', 2, '2024-01-02 00:46:18', '2024-01-02 00:46:18'),
(840, 66, 187, 'course_class', 2, '2024-01-02 00:46:36', '2024-01-02 00:46:36'),
(841, 66, 187, 'course_class', 2, '2024-01-02 00:47:24', '2024-01-02 00:47:24'),
(843, 66, 187, 'course_class', 2, '2024-01-02 00:47:45', '2024-01-02 00:47:45'),
(844, 66, 3, 'course_class', 2, '2024-01-02 00:50:57', '2024-01-02 00:50:57'),
(845, 66, 3, 'course_class', 2, '2024-01-02 00:51:40', '2024-01-02 00:51:40'),
(846, 66, 3, 'course_class', 2, '2024-01-02 09:13:59', '2024-01-02 09:13:59'),
(847, 66, 3, 'course_class', 2, '2024-01-02 09:20:27', '2024-01-02 09:20:27'),
(848, 66, 3, 'course_class', 2, '2024-01-02 09:21:23', '2024-01-02 09:21:23'),
(849, 66, 69, 'course_class', 2, '2024-01-02 09:21:32', '2024-01-02 09:21:32'),
(850, 66, 72, 'course_class', 2, '2024-01-02 09:21:57', '2024-01-02 09:21:57'),
(851, 66, 73, 'course_class', 2, '2024-01-02 09:22:06', '2024-01-02 09:22:06'),
(852, 66, 73, 'course_class', 4, '2024-01-02 09:22:20', '2024-01-02 09:22:20'),
(853, 66, 73, 'course_class', 2, '2024-01-02 09:22:20', '2024-01-02 09:22:20'),
(854, 66, 73, 'course_class', 3, '2024-01-02 09:22:41', '2024-01-02 09:22:41'),
(855, 66, 73, 'course_class', 2, '2024-01-02 09:22:42', '2024-01-02 09:22:42'),
(856, 66, 73, 'course_class', 2, '2024-01-02 09:22:43', '2024-01-02 09:22:43'),
(857, 66, 73, 'course_class', 2, '2024-01-02 16:10:54', '2024-01-02 16:10:54'),
(858, 66, 73, 'course_class', 2, '2024-01-02 21:42:15', '2024-01-02 21:42:15'),
(859, 66, 73, 'course_class', 2, '2024-01-02 21:45:13', '2024-01-02 21:45:13'),
(860, 66, 81, 'course_class', 2, '2024-01-02 21:47:45', '2024-01-02 21:47:45'),
(861, 66, 81, 'course_class', 2, '2024-01-02 21:48:29', '2024-01-02 21:48:29'),
(862, 66, 81, 'course_class', 2, '2024-01-02 21:50:13', '2024-01-02 21:50:13'),
(863, 66, 81, 'course_class', 2, '2024-01-02 21:51:03', '2024-01-02 21:51:03'),
(864, 66, 81, 'course_class', 2, '2024-01-02 21:51:26', '2024-01-02 21:51:26'),
(865, 66, 73, 'course_class', 3, '2024-01-02 21:54:58', '2024-01-02 21:54:58'),
(866, 66, 73, 'course_class', 2, '2024-01-02 21:54:58', '2024-01-02 21:54:58'),
(867, 66, 73, 'course_class', 2, '2024-01-02 21:57:30', '2024-01-02 21:57:30'),
(868, 66, 73, 'course_class', 2, '2024-01-02 21:59:00', '2024-01-02 21:59:00'),
(869, 66, 73, 'course_class', 2, '2024-01-02 21:59:40', '2024-01-02 21:59:40'),
(870, 66, 73, 'course_class', 2, '2024-01-02 22:00:43', '2024-01-02 22:00:43'),
(871, 66, 73, 'course_class', 2, '2024-01-02 22:01:02', '2024-01-02 22:01:02'),
(872, 66, 73, 'course_class', 2, '2024-01-02 22:02:28', '2024-01-02 22:02:28'),
(873, 66, 73, 'course_class', 2, '2024-01-02 22:47:58', '2024-01-02 22:47:58'),
(874, 66, 73, 'course_class', 2, '2024-01-03 08:18:43', '2024-01-03 08:18:43'),
(875, 66, 73, 'course_class', 2, '2024-01-03 08:19:28', '2024-01-03 08:19:28'),
(876, 66, 73, 'course_class', 2, '2024-01-03 08:20:17', '2024-01-03 08:20:17'),
(877, 66, 73, 'course_class', 2, '2024-01-03 08:23:23', '2024-01-03 08:23:23'),
(878, 66, 73, 'course_class', 2, '2024-01-03 08:24:22', '2024-01-03 08:24:22'),
(879, 66, 73, 'course_class', 2, '2024-01-03 08:24:52', '2024-01-03 08:24:52'),
(880, 66, 73, 'course_class', 2, '2024-01-03 08:25:23', '2024-01-03 08:25:23'),
(881, 66, 73, 'course_class', 2, '2024-01-03 08:25:40', '2024-01-03 08:25:40'),
(882, 66, 73, 'course_class', 2, '2024-01-03 08:26:11', '2024-01-03 08:26:11'),
(883, 66, 73, 'course_class', 2, '2024-01-03 08:26:37', '2024-01-03 08:26:37'),
(884, 66, 73, 'course_class', 2, '2024-01-03 08:29:08', '2024-01-03 08:29:08'),
(885, 66, 73, 'course_class', 2, '2024-01-03 08:29:12', '2024-01-03 08:29:12'),
(886, 66, 73, 'course_class', 2, '2024-01-03 08:29:16', '2024-01-03 08:29:16'),
(887, 66, 73, 'course_class', 2, '2024-01-03 08:47:38', '2024-01-03 08:47:38'),
(888, 66, 73, 'course_class', 3, '2024-01-03 08:47:53', '2024-01-03 08:47:53'),
(889, 66, 73, 'course_class', 2, '2024-01-03 08:47:53', '2024-01-03 08:47:53'),
(890, 66, 73, 'course_class', 2, '2024-01-03 08:52:17', '2024-01-03 08:52:17'),
(891, 66, 73, 'course_class', 2, '2024-01-03 08:52:24', '2024-01-03 08:52:24'),
(892, 66, 73, 'course_class', 2, '2024-01-03 08:54:29', '2024-01-03 08:54:29'),
(893, 66, 73, 'course_class', 2, '2024-01-03 09:19:04', '2024-01-03 09:19:04'),
(894, 66, 73, 'course_class', 2, '2024-01-03 09:19:12', '2024-01-03 09:19:12'),
(895, 66, 73, 'course_class', 2, '2024-01-03 09:21:32', '2024-01-03 09:21:32'),
(896, 66, 73, 'course_class', 2, '2024-01-03 09:22:52', '2024-01-03 09:22:52'),
(897, 66, 73, 'course_class', 2, '2024-01-03 09:24:52', '2024-01-03 09:24:52'),
(898, 66, 77, 'course_class', 2, '2024-01-03 09:26:50', '2024-01-03 09:26:50'),
(899, 66, 77, 'course_class', 2, '2024-01-03 09:29:53', '2024-01-03 09:29:53'),
(900, 66, 73, 'course_class', 2, '2024-01-03 09:30:00', '2024-01-03 09:30:00'),
(901, 66, 73, 'course_class', 2, '2024-01-03 09:31:33', '2024-01-03 09:31:33'),
(902, 66, 73, 'course_class', 2, '2024-01-03 09:31:45', '2024-01-03 09:31:45'),
(903, 66, 73, 'course_class', 2, '2024-01-03 09:32:41', '2024-01-03 09:32:41'),
(904, 66, 73, 'course_class', 2, '2024-01-03 09:33:02', '2024-01-03 09:33:02'),
(905, 66, 73, 'course_class', 2, '2024-01-03 09:33:25', '2024-01-03 09:33:25'),
(906, 66, 73, 'course_class', 2, '2024-01-03 09:33:44', '2024-01-03 09:33:44'),
(907, 66, 73, 'course_class', 2, '2024-01-03 09:34:26', '2024-01-03 09:34:26'),
(908, 66, 73, 'course_class', 2, '2024-01-03 09:35:46', '2024-01-03 09:35:46'),
(909, 66, 73, 'course_class', 2, '2024-01-03 09:36:11', '2024-01-03 09:36:11'),
(910, 66, 73, 'course_class', 2, '2024-01-03 09:36:28', '2024-01-03 09:36:28'),
(911, 66, 73, 'course_class', 2, '2024-01-03 09:38:03', '2024-01-03 09:38:03'),
(912, 66, 73, 'course_class', 2, '2024-01-03 09:38:17', '2024-01-03 09:38:17'),
(913, 66, 73, 'course_class', 2, '2024-01-03 09:42:11', '2024-01-03 09:42:11'),
(914, 66, 73, 'course_class', 2, '2024-01-03 09:42:17', '2024-01-03 09:42:17'),
(915, 66, 73, 'course_class', 2, '2024-01-03 09:54:38', '2024-01-03 09:54:38'),
(916, 66, 73, 'course_class', 2, '2024-01-03 09:54:50', '2024-01-03 09:54:50'),
(917, 66, 73, 'course_class', 2, '2024-01-03 09:55:14', '2024-01-03 09:55:14'),
(918, 66, 73, 'course_class', 2, '2024-01-03 09:55:24', '2024-01-03 09:55:24'),
(919, 66, 73, 'course_class', 2, '2024-01-03 09:56:16', '2024-01-03 09:56:16'),
(920, 66, 73, 'course_class', 2, '2024-01-03 09:56:29', '2024-01-03 09:56:29'),
(921, 66, 73, 'course_class', 2, '2024-01-03 09:56:35', '2024-01-03 09:56:35'),
(922, 66, 73, 'course_class', 2, '2024-01-03 09:56:58', '2024-01-03 09:56:58'),
(923, 66, 73, 'course_class', 2, '2024-01-03 09:57:41', '2024-01-03 09:57:41'),
(924, 66, 73, 'course_class', 2, '2024-01-03 09:58:36', '2024-01-03 09:58:36'),
(925, 66, 73, 'course_class', 2, '2024-01-03 09:58:41', '2024-01-03 09:58:41'),
(926, 66, 73, 'course_class', 2, '2024-01-03 10:00:59', '2024-01-03 10:00:59'),
(927, 66, 73, 'course_class', 2, '2024-01-03 10:01:04', '2024-01-03 10:01:04'),
(928, 66, 73, 'course_class', 2, '2024-01-03 10:01:31', '2024-01-03 10:01:31'),
(929, 66, 73, 'course_class', 2, '2024-01-03 10:03:46', '2024-01-03 10:03:46'),
(930, 66, 73, 'course_class', 4, '2024-01-03 10:03:54', '2024-01-03 10:03:54'),
(931, 66, 73, 'course_class', 2, '2024-01-03 10:03:54', '2024-01-03 10:03:54'),
(932, 66, 73, 'course_class', 2, '2024-01-03 10:03:58', '2024-01-03 10:03:58'),
(933, 66, 73, 'course_class', 2, '2024-01-03 10:04:50', '2024-01-03 10:04:50'),
(934, 66, 73, 'course_class', 2, '2024-01-03 10:04:52', '2024-01-03 10:04:52'),
(935, 66, 73, 'course_class', 3, '2024-01-03 10:05:02', '2024-01-03 10:05:02'),
(936, 66, 73, 'course_class', 2, '2024-01-03 10:05:02', '2024-01-03 10:05:02'),
(937, 66, 73, 'course_class', 2, '2024-01-03 10:05:03', '2024-01-03 10:05:03'),
(938, 66, 73, 'course_class', 4, '2024-01-03 10:05:09', '2024-01-03 10:05:09'),
(939, 66, 73, 'course_class', 2, '2024-01-03 10:05:09', '2024-01-03 10:05:09'),
(940, 66, 73, 'course_class', 3, '2024-01-03 10:05:15', '2024-01-03 10:05:15'),
(941, 66, 73, 'course_class', 2, '2024-01-03 10:05:16', '2024-01-03 10:05:16'),
(942, 66, 73, 'course_class', 2, '2024-01-03 10:05:17', '2024-01-03 10:05:17'),
(943, 66, 73, 'course_class', 2, '2024-01-03 10:09:14', '2024-01-03 10:09:14'),
(944, 66, 73, 'course_class', 4, '2024-01-03 10:09:17', '2024-01-03 10:09:17'),
(945, 66, 73, 'course_class', 2, '2024-01-03 10:09:17', '2024-01-03 10:09:17'),
(946, 66, 73, 'course_class', 2, '2024-01-03 10:10:03', '2024-01-03 10:10:03'),
(947, 66, 73, 'course_class', 2, '2024-01-03 10:11:39', '2024-01-03 10:11:39'),
(948, 66, 73, 'course_class', 2, '2024-01-03 10:12:17', '2024-01-03 10:12:17'),
(949, 66, 73, 'course_class', 2, '2024-01-03 10:12:47', '2024-01-03 10:12:47'),
(950, 66, 73, 'course_class', 2, '2024-01-03 10:12:49', '2024-01-03 10:12:49'),
(951, 66, 73, 'course_class', 2, '2024-01-03 10:12:55', '2024-01-03 10:12:55'),
(952, 66, 73, 'course_class', 3, '2024-01-03 10:13:05', '2024-01-03 10:13:05'),
(953, 66, 73, 'course_class', 2, '2024-01-03 10:13:05', '2024-01-03 10:13:05'),
(954, 66, 73, 'course_class', 2, '2024-01-03 10:13:06', '2024-01-03 10:13:06'),
(955, 66, 73, 'course_class', 2, '2024-01-03 10:13:28', '2024-01-03 10:13:28'),
(956, 66, 73, 'course_class', 3, '2024-01-03 10:13:44', '2024-01-03 10:13:44'),
(957, 66, 73, 'course_class', 2, '2024-01-03 10:13:45', '2024-01-03 10:13:45'),
(958, 66, 73, 'course_class', 2, '2024-01-03 10:14:06', '2024-01-03 10:14:06'),
(959, 66, 73, 'course_class', 2, '2024-01-03 10:19:37', '2024-01-03 10:19:37'),
(960, 66, 73, 'course_class', 2, '2024-01-03 10:20:09', '2024-01-03 10:20:09'),
(961, 66, 73, 'course_class', 2, '2024-01-03 10:20:16', '2024-01-03 10:20:16'),
(962, 66, 73, 'course_class', 2, '2024-01-03 10:20:38', '2024-01-03 10:20:38'),
(963, 66, 73, 'course_class', 2, '2024-01-03 10:20:43', '2024-01-03 10:20:43'),
(964, 66, 73, 'course_class', 2, '2024-01-03 10:22:11', '2024-01-03 10:22:11'),
(965, 66, 73, 'course_class', 2, '2024-01-03 10:22:20', '2024-01-03 10:22:20'),
(966, 66, 73, 'course_class', 2, '2024-01-03 10:43:24', '2024-01-03 10:43:24'),
(967, 66, 73, 'course_class', 2, '2024-01-03 10:44:18', '2024-01-03 10:44:18'),
(968, 66, 94, 'course_class', 2, '2024-01-03 10:44:24', '2024-01-03 10:44:24'),
(969, 66, 187, 'course_class', 2, '2024-01-03 10:45:46', '2024-01-03 10:45:46'),
(970, 66, 94, 'course_class', 2, '2024-01-03 10:51:24', '2024-01-03 10:51:24'),
(971, 66, 94, 'course_class', 2, '2024-01-03 10:52:09', '2024-01-03 10:52:09'),
(972, 66, 94, 'course_class', 2, '2024-01-03 10:52:43', '2024-01-03 10:52:43'),
(973, 66, 94, 'course_class', 2, '2024-01-03 10:52:58', '2024-01-03 10:52:58'),
(974, 66, 95, 'course_class', 2, '2024-01-03 10:53:07', '2024-01-03 10:53:07'),
(975, 66, 94, 'course_class', 2, '2024-01-03 10:53:11', '2024-01-03 10:53:11'),
(976, 66, 95, 'course_class', 2, '2024-01-03 10:53:13', '2024-01-03 10:53:13'),
(977, 66, 97, 'course_class', 2, '2024-01-03 10:53:16', '2024-01-03 10:53:16'),
(978, 66, 97, 'course_class', 2, '2024-01-03 10:53:36', '2024-01-03 10:53:36'),
(979, 66, 73, 'course_class', 2, '2024-01-03 10:53:59', '2024-01-03 10:53:59'),
(980, 66, 77, 'course_class', 2, '2024-01-03 10:54:31', '2024-01-03 10:54:31'),
(981, 66, 77, 'course_class', 2, '2024-01-03 10:54:32', '2024-01-03 10:54:32'),
(982, 66, 77, 'course_class', 1, '2024-01-03 10:54:39', '2024-01-03 10:54:39'),
(983, 66, 77, 'course_class', 2, '2024-01-03 10:54:39', '2024-01-03 10:54:39'),
(984, 66, 77, 'course_class', 2, '2024-01-03 10:54:40', '2024-01-03 10:54:40'),
(985, 66, 73, 'course_class', 2, '2024-01-03 10:57:52', '2024-01-03 10:57:52'),
(986, 66, 73, 'course_class', 2, '2024-01-03 11:08:42', '2024-01-03 11:08:42'),
(987, 66, 101, 'course_class', 2, '2024-01-03 11:08:47', '2024-01-03 11:08:47'),
(988, 66, 73, 'course_class', 2, '2024-01-03 11:08:56', '2024-01-03 11:08:56'),
(989, 66, 73, 'course_class', 2, '2024-01-03 11:15:25', '2024-01-03 11:15:25'),
(990, 66, 73, 'course_class', 2, '2024-01-03 11:15:41', '2024-01-03 11:15:41'),
(991, 66, 73, 'course_class', 2, '2024-01-03 11:16:41', '2024-01-03 11:16:41'),
(992, 66, 73, 'course_class', 2, '2024-01-03 11:24:23', '2024-01-03 11:24:23'),
(993, 66, 73, 'course_class', 2, '2024-01-03 21:06:20', '2024-01-03 21:06:20'),
(994, 66, 73, 'course_class', 2, '2024-01-03 22:01:15', '2024-01-03 22:01:15'),
(995, 66, 73, 'course_class', 2, '2024-01-03 22:02:23', '2024-01-03 22:02:23'),
(996, 66, 73, 'course_class', 3, '2024-01-03 22:02:41', '2024-01-03 22:02:41'),
(997, 66, 73, 'course_class', 2, '2024-01-03 22:02:41', '2024-01-03 22:02:41'),
(998, 66, 73, 'course_class', 2, '2024-01-03 22:07:21', '2024-01-03 22:07:21'),
(999, 66, 73, 'course_class', 3, '2024-01-03 22:07:33', '2024-01-03 22:07:33'),
(1000, 66, 73, 'course_class', 2, '2024-01-03 22:07:33', '2024-01-03 22:07:33'),
(1001, 66, 70, 'course_class', 2, '2024-01-03 22:07:49', '2024-01-03 22:07:49'),
(1002, 66, 73, 'course_class', 2, '2024-01-03 22:08:56', '2024-01-03 22:08:56'),
(1003, 66, 73, 'course_class', 2, '2024-01-03 22:11:27', '2024-01-03 22:11:27'),
(1004, 66, 73, 'course_class', 2, '2024-01-03 22:13:44', '2024-01-03 22:13:44'),
(1005, 66, 73, 'course_class', 2, '2024-01-03 22:14:04', '2024-01-03 22:14:04'),
(1006, 66, 77, 'course_class', 2, '2024-01-03 22:14:11', '2024-01-03 22:14:11'),
(1007, 66, 77, 'course_class', 2, '2024-01-03 22:14:51', '2024-01-03 22:14:51'),
(1008, 66, 77, 'course_class', 2, '2024-01-03 22:15:02', '2024-01-03 22:15:02'),
(1009, 66, 77, 'course_class', 2, '2024-01-03 22:15:11', '2024-01-03 22:15:11'),
(1010, 66, 77, 'course_class', 2, '2024-01-03 22:16:14', '2024-01-03 22:16:14'),
(1011, 66, 77, 'course_class', 2, '2024-01-03 22:16:16', '2024-01-03 22:16:16'),
(1012, 66, 77, 'course_class', 2, '2024-01-03 22:16:55', '2024-01-03 22:16:55'),
(1013, 66, 77, 'course_class', 2, '2024-01-03 22:17:27', '2024-01-03 22:17:27'),
(1014, 66, 77, 'course_class', 2, '2024-01-03 22:17:41', '2024-01-03 22:17:41'),
(1015, 66, 77, 'course_class', 2, '2024-01-03 22:28:02', '2024-01-03 22:28:02'),
(1016, 66, 77, 'course_class', 2, '2024-01-04 09:36:30', '2024-01-04 09:36:30'),
(1017, 66, NULL, 'profile', 3, '2024-01-04 14:49:08', '2024-01-04 14:49:08'),
(1018, 66, 77, 'course_class', 2, '2024-01-04 14:51:19', '2024-01-04 14:51:19'),
(1019, 66, 3, 'course_class', 2, '2024-01-04 14:51:26', '2024-01-04 14:51:26'),
(1020, 66, 66, 'course_class', 2, '2024-01-04 14:51:28', '2024-01-04 14:51:28'),
(1021, 66, 69, 'course_class', 2, '2024-01-04 14:51:31', '2024-01-04 14:51:31'),
(1022, 66, 69, 'course_class', 2, '2024-01-04 14:51:46', '2024-01-04 14:51:46'),
(1023, 66, 75, 'course_class', 2, '2024-01-04 14:52:05', '2024-01-04 14:52:05'),
(1024, 66, 75, 'course_class', 2, '2024-01-04 14:53:16', '2024-01-04 14:53:16'),
(1025, 66, 75, 'course_class', 2, '2024-01-04 14:53:34', '2024-01-04 14:53:34'),
(1026, 66, 75, 'course_class', 2, '2024-01-04 15:17:06', '2024-01-04 15:17:06'),
(1027, 66, 76, 'course_class', 2, '2024-01-04 15:17:12', '2024-01-04 15:17:12'),
(1028, 66, 76, 'course_class', 2, '2024-01-04 15:17:49', '2024-01-04 15:17:49'),
(1029, 66, 75, 'course_class', 2, '2024-01-04 15:17:58', '2024-01-04 15:17:58'),
(1030, 66, 75, 'course_class', 2, '2024-01-04 15:26:59', '2024-01-04 15:26:59'),
(1031, 66, NULL, 'profile', 3, '2024-01-04 16:24:34', '2024-01-04 16:24:34'),
(1032, 66, NULL, 'profile', 3, '2024-01-04 16:24:58', '2024-01-04 16:24:58'),
(1033, 66, 75, 'course_class', 2, '2024-01-04 16:52:11', '2024-01-04 16:52:11'),
(1034, 66, 75, 'course_class', 2, '2024-01-04 22:09:48', '2024-01-04 22:09:48'),
(1035, 66, 75, 'course_class', 2, '2024-01-05 08:35:28', '2024-01-05 08:35:28'),
(1036, 66, 122, 'course_class', 2, '2024-01-05 09:06:59', '2024-01-05 09:06:59'),
(1037, 66, NULL, 'profile', 3, '2024-01-05 13:31:23', '2024-01-05 13:31:23'),
(1038, 66, 75, 'course_class', 2, '2024-01-07 13:45:04', '2024-01-07 13:45:04'),
(1039, 66, 187, 'course_class', 2, '2024-01-07 13:46:31', '2024-01-07 13:46:31'),
(1040, 66, 188, 'course_class', 2, '2024-01-07 13:50:51', '2024-01-07 13:50:51'),
(1041, 66, 75, 'course_class', 2, '2024-01-09 15:01:37', '2024-01-09 15:01:37'),
(1042, 66, 3, 'course_class', 2, '2024-01-09 15:01:46', '2024-01-09 15:01:46'),
(1043, 66, 3, 'course_class', 2, '2024-01-09 15:06:10', '2024-01-09 15:06:10'),
(1044, 66, 66, 'course_class', 2, '2024-01-09 15:16:37', '2024-01-09 15:16:37'),
(1045, 66, 66, 'course_class', 2, '2024-01-09 15:19:44', '2024-01-09 15:19:44'),
(1046, 66, 67, 'course_class', 2, '2024-01-09 15:20:46', '2024-01-09 15:20:46'),
(1047, 66, 72, 'course_class', 2, '2024-01-09 15:21:06', '2024-01-09 15:21:06'),
(1048, 66, 76, 'course_class', 2, '2024-01-09 16:06:09', '2024-01-09 16:06:09'),
(1049, 66, 76, 'course_class', 2, '2024-01-09 16:12:05', '2024-01-09 16:12:05'),
(1050, 66, 72, 'course_class', 2, '2024-01-09 16:12:18', '2024-01-09 16:12:18'),
(1051, 66, 66, 'course_class', 2, '2024-01-09 16:12:26', '2024-01-09 16:12:26'),
(1052, 66, 80, 'course_class', 2, '2024-01-09 16:13:53', '2024-01-09 16:13:53'),
(1053, 66, 80, 'course_class', 2, '2024-01-09 16:20:50', '2024-01-09 16:20:50'),
(1054, 66, 84, 'course_class', 2, '2024-01-09 16:21:30', '2024-01-09 16:21:30'),
(1055, 66, 84, 'course_class', 2, '2024-01-09 16:26:31', '2024-01-09 16:26:31'),
(1056, 66, 122, 'course_class', 2, '2024-01-09 16:32:12', '2024-01-09 16:32:12'),
(1057, 66, 123, 'course_class', 2, '2024-01-09 16:32:28', '2024-01-09 16:32:28'),
(1058, 66, 124, 'course_class', 2, '2024-01-09 16:32:33', '2024-01-09 16:32:33'),
(1059, 66, 127, 'course_class', 2, '2024-01-09 16:32:39', '2024-01-09 16:32:39'),
(1060, 66, 128, 'course_class', 2, '2024-01-09 16:32:43', '2024-01-09 16:32:43'),
(1061, 66, 129, 'course_class', 2, '2024-01-09 16:32:46', '2024-01-09 16:32:46'),
(1062, 66, 132, 'course_class', 2, '2024-01-09 16:32:53', '2024-01-09 16:32:53'),
(1063, 66, 84, 'course_class', 2, '2024-01-09 21:38:21', '2024-01-09 21:38:21'),
(1064, 66, 66, 'course_class', 2, '2024-01-09 21:38:45', '2024-01-09 21:38:45'),
(1065, 66, 72, 'course_class', 2, '2024-01-09 21:39:03', '2024-01-09 21:39:03'),
(1066, 66, 3, 'course_class', 2, '2024-01-09 21:39:16', '2024-01-09 21:39:16'),
(1067, 66, 88, 'course_class', 2, '2024-01-09 21:39:37', '2024-01-09 21:39:37'),
(1068, 66, 88, 'course_class', 2, '2024-01-09 21:41:10', '2024-01-09 21:41:10'),
(1069, 66, 88, 'course_class', 2, '2024-01-10 08:30:25', '2024-01-10 08:30:25'),
(1070, 66, 88, 'course_class', 2, '2024-01-10 08:30:27', '2024-01-10 08:30:27'),
(1071, 66, 3, 'course_class', 2, '2024-01-10 08:30:32', '2024-01-10 08:30:32'),
(1072, 66, 3, 'course_class', 2, '2024-01-10 08:31:24', '2024-01-10 08:31:24'),
(1073, 66, 66, 'course_class', 2, '2024-01-10 08:31:32', '2024-01-10 08:31:32'),
(1074, 66, 3, 'course_class', 2, '2024-01-10 08:32:18', '2024-01-10 08:32:18'),
(1075, 66, 66, 'course_class', 2, '2024-01-10 08:32:24', '2024-01-10 08:32:24'),
(1076, 66, 66, 'course_class', 2, '2024-01-10 08:32:59', '2024-01-10 08:32:59'),
(1077, 66, 72, 'course_class', 2, '2024-01-10 08:33:12', '2024-01-10 08:33:12'),
(1078, 66, 72, 'course_class', 2, '2024-01-10 08:39:42', '2024-01-10 08:39:42'),
(1079, 66, 72, 'course_class', 2, '2024-01-10 08:41:24', '2024-01-10 08:41:24'),
(1080, 66, 76, 'course_class', 2, '2024-01-10 08:45:19', '2024-01-10 08:45:19'),
(1081, 66, 80, 'course_class', 2, '2024-01-10 08:45:36', '2024-01-10 08:45:36'),
(1082, 66, 80, 'course_class', 2, '2024-01-10 08:48:07', '2024-01-10 08:48:07'),
(1083, 66, 84, 'course_class', 2, '2024-01-10 08:48:16', '2024-01-10 08:48:16'),
(1084, 66, 84, 'course_class', 2, '2024-01-10 08:50:34', '2024-01-10 08:50:34'),
(1085, 66, 88, 'course_class', 2, '2024-01-10 08:52:25', '2024-01-10 08:52:25'),
(1086, 66, 88, 'course_class', 2, '2024-01-11 09:11:08', '2024-01-11 09:11:08'),
(1087, 66, 66, 'course_class', 2, '2024-01-11 09:12:42', '2024-01-11 09:12:42'),
(1088, 66, 66, 'course_class', 2, '2024-01-11 09:13:59', '2024-01-11 09:13:59'),
(1089, 66, 69, 'course_class', 2, '2024-01-11 09:14:04', '2024-01-11 09:14:04'),
(1090, 66, 69, 'course_class', 2, '2024-01-11 09:14:45', '2024-01-11 09:14:45'),
(1091, 66, 69, 'course_class', 2, '2024-01-11 10:02:43', '2024-01-11 10:02:43'),
(1092, 66, 69, 'course_class', 2, '2024-01-11 13:28:29', '2024-01-11 13:28:29'),
(1093, 66, 66, 'course_class', 2, '2024-01-11 13:28:46', '2024-01-11 13:28:46'),
(1094, 66, 69, 'course_class', 2, '2024-01-11 13:29:02', '2024-01-11 13:29:02'),
(1095, 66, 66, 'course_class', 2, '2024-01-11 13:29:11', '2024-01-11 13:29:11'),
(1096, 66, 66, 'course_class', 2, '2024-01-11 13:29:14', '2024-01-11 13:29:14'),
(1097, 66, 66, 'course_class', 2, '2024-01-11 13:31:38', '2024-01-11 13:31:38'),
(1098, 66, 67, 'course_class', 2, '2024-01-11 13:32:03', '2024-01-11 13:32:03'),
(1099, 66, 66, 'course_class', 2, '2024-01-11 13:32:13', '2024-01-11 13:32:13'),
(1100, 66, 70, 'course_class', 2, '2024-01-11 13:32:19', '2024-01-11 13:32:19'),
(1101, 66, 69, 'course_class', 2, '2024-01-11 13:32:33', '2024-01-11 13:32:33'),
(1102, 66, 72, 'course_class', 2, '2024-01-11 13:32:40', '2024-01-11 13:32:40'),
(1103, 66, 104, 'course_class', 2, '2024-01-11 13:33:09', '2024-01-11 13:33:09'),
(1104, 66, 104, 'course_class', 2, '2024-01-11 13:35:53', '2024-01-11 13:35:53'),
(1105, 66, 103, 'course_class', 2, '2024-01-11 13:36:04', '2024-01-11 13:36:04'),
(1106, 66, 104, 'course_class', 2, '2024-01-11 13:36:13', '2024-01-11 13:36:13'),
(1107, 66, 104, 'course_class', 2, '2024-01-11 13:36:33', '2024-01-11 13:36:33'),
(1108, 66, 103, 'course_class', 2, '2024-01-11 13:37:03', '2024-01-11 13:37:03'),
(1109, 66, 104, 'course_class', 2, '2024-01-11 13:37:10', '2024-01-11 13:37:10'),
(1110, 66, 104, 'course_class', 2, '2024-01-11 13:38:21', '2024-01-11 13:38:21'),
(1111, 66, 101, 'course_class', 2, '2024-01-11 13:38:33', '2024-01-11 13:38:33'),
(1112, 66, 104, 'course_class', 2, '2024-01-11 13:39:17', '2024-01-11 13:39:17'),
(1113, 66, 104, 'course_class', 2, '2024-01-11 13:39:43', '2024-01-11 13:39:43'),
(1114, 66, 67, 'course_class', 2, '2024-01-11 13:39:52', '2024-01-11 13:39:52'),
(1115, 66, 70, 'course_class', 2, '2024-01-11 13:40:01', '2024-01-11 13:40:01'),
(1116, 66, 73, 'course_class', 2, '2024-01-11 13:40:07', '2024-01-11 13:40:07'),
(1117, 66, 104, 'course_class', 2, '2024-01-11 13:40:29', '2024-01-11 13:40:29'),
(1118, 66, 104, 'course_class', 2, '2024-01-11 13:41:30', '2024-01-11 13:41:30'),
(1119, 66, 104, 'course_class', 2, '2024-01-11 13:43:37', '2024-01-11 13:43:37'),
(1120, 66, 103, 'course_class', 2, '2024-01-11 13:44:01', '2024-01-11 13:44:01'),
(1121, 66, 104, 'course_class', 2, '2024-01-11 13:44:21', '2024-01-11 13:44:21'),
(1122, 66, 104, 'course_class', 2, '2024-01-11 13:44:54', '2024-01-11 13:44:54'),
(1123, 66, 66, 'course_class', 2, '2024-01-11 13:45:29', '2024-01-11 13:45:29'),
(1124, 66, 67, 'course_class', 2, '2024-01-11 13:45:44', '2024-01-11 13:45:44'),
(1125, 66, 66, 'course_class', 2, '2024-01-11 13:46:52', '2024-01-11 13:46:52'),
(1126, 66, 67, 'course_class', 2, '2024-01-11 13:47:03', '2024-01-11 13:47:03'),
(1127, 66, 79, 'course_class', 2, '2024-01-11 13:47:27', '2024-01-11 13:47:27'),
(1128, 66, 80, 'course_class', 2, '2024-01-11 13:47:34', '2024-01-11 13:47:34'),
(1129, 66, 81, 'course_class', 2, '2024-01-11 13:47:41', '2024-01-11 13:47:41'),
(1130, 66, 66, 'course_class', 2, '2024-01-11 13:47:52', '2024-01-11 13:47:52'),
(1131, 66, 104, 'course_class', 2, '2024-01-11 13:49:55', '2024-01-11 13:49:55'),
(1132, 66, 103, 'course_class', 2, '2024-01-11 13:51:07', '2024-01-11 13:51:07'),
(1133, 66, 101, 'course_class', 2, '2024-01-11 13:51:54', '2024-01-11 13:51:54'),
(1134, 66, 103, 'course_class', 2, '2024-01-11 13:52:03', '2024-01-11 13:52:03'),
(1135, 66, 100, 'course_class', 2, '2024-01-11 13:55:16', '2024-01-11 13:55:16'),
(1136, 66, 91, 'course_class', 2, '2024-01-11 13:56:36', '2024-01-11 13:56:36'),
(1137, 66, 94, 'course_class', 2, '2024-01-11 13:59:25', '2024-01-11 13:59:25'),
(1138, 66, 94, 'course_class', 2, '2024-01-11 14:00:02', '2024-01-11 14:00:02'),
(1139, 66, 97, 'course_class', 2, '2024-01-11 14:01:08', '2024-01-11 14:01:08'),
(1140, 66, 100, 'course_class', 2, '2024-01-11 14:03:23', '2024-01-11 14:03:23'),
(1141, 66, 3, 'course_class', 2, '2024-01-11 14:07:53', '2024-01-11 14:07:53'),
(1142, 66, 100, 'course_class', 2, '2024-01-11 14:08:40', '2024-01-11 14:08:40'),
(1143, 66, 104, 'course_class', 2, '2024-01-11 14:37:08', '2024-01-11 14:37:08'),
(1144, 66, 101, 'course_class', 2, '2024-01-11 14:54:41', '2024-01-11 14:54:41'),
(1145, 66, 104, 'course_class', 2, '2024-01-11 14:55:04', '2024-01-11 14:55:04'),
(1146, 66, 104, 'course_class', 2, '2024-01-11 14:56:01', '2024-01-11 14:56:01'),
(1147, 66, 103, 'course_class', 2, '2024-01-11 14:56:08', '2024-01-11 14:56:08'),
(1148, 66, 100, 'course_class', 2, '2024-01-11 14:56:26', '2024-01-11 14:56:26'),
(1149, 66, 100, 'course_class', 2, '2024-01-11 14:58:04', '2024-01-11 14:58:04'),
(1150, 66, 104, 'course_class', 2, '2024-01-11 14:58:14', '2024-01-11 14:58:14'),
(1151, 66, 103, 'course_class', 2, '2024-01-11 14:59:00', '2024-01-11 14:59:00'),
(1152, 66, 104, 'course_class', 2, '2024-01-11 15:01:51', '2024-01-11 15:01:51'),
(1153, 66, 72, 'course_class', 2, '2024-01-11 15:12:39', '2024-01-11 15:12:39'),
(1154, 66, 76, 'course_class', 2, '2024-01-11 15:12:50', '2024-01-11 15:12:50'),
(1155, 66, 76, 'course_class', 2, '2024-01-11 15:14:08', '2024-01-11 15:14:08'),
(1156, 66, 73, 'course_class', 2, '2024-01-11 15:14:23', '2024-01-11 15:14:23'),
(1157, 66, 73, 'course_class', 2, '2024-01-11 15:15:23', '2024-01-11 15:15:23'),
(1158, 66, 70, 'course_class', 2, '2024-01-11 15:15:39', '2024-01-11 15:15:39'),
(1159, 66, 70, 'course_class', 2, '2024-01-11 15:17:53', '2024-01-11 15:17:53'),
(1160, 66, 67, 'course_class', 2, '2024-01-11 15:17:59', '2024-01-11 15:17:59'),
(1161, 66, 67, 'course_class', 2, '2024-01-11 15:19:02', '2024-01-11 15:19:02'),
(1162, 66, 103, 'course_class', 2, '2024-01-11 15:20:57', '2024-01-11 15:20:57'),
(1163, 66, 100, 'course_class', 2, '2024-01-11 15:21:04', '2024-01-11 15:21:04'),
(1164, 66, 101, 'course_class', 2, '2024-01-11 15:21:10', '2024-01-11 15:21:10'),
(1165, 66, 101, 'course_class', 2, '2024-01-12 09:15:12', '2024-01-12 09:15:12'),
(1166, 66, 1, 'course_class', 2, '2024-01-12 09:17:24', '2024-01-12 09:17:24'),
(1167, 66, 3, 'course_class', 2, '2024-01-12 09:17:28', '2024-01-12 09:17:28'),
(1168, 66, 3, 'course_class', 2, '2024-01-12 10:37:05', '2024-01-12 10:37:05'),
(1169, 66, 193, 'course_class', 2, '2024-01-12 15:02:53', '2024-01-12 15:02:53'),
(1170, 66, 193, 'course_class', 2, '2024-01-12 15:06:20', '2024-01-12 15:06:20'),
(1171, 66, 194, 'course_class', 2, '2024-01-12 15:06:26', '2024-01-12 15:06:26'),
(1172, 66, 193, 'course_class', 2, '2024-01-12 15:06:56', '2024-01-12 15:06:56'),
(1173, 66, 194, 'course_class', 2, '2024-01-12 15:07:00', '2024-01-12 15:07:00'),
(1174, 66, 194, 'course_class', 2, '2024-01-12 15:07:49', '2024-01-12 15:07:49'),
(1175, 66, 193, 'course_class', 2, '2024-01-12 15:23:24', '2024-01-12 15:23:24'),
(1176, 66, 193, 'course_class', 2, '2024-01-12 16:21:28', '2024-01-12 16:21:28'),
(1177, 66, 193, 'course_class', 2, '2024-01-12 16:36:27', '2024-01-12 16:36:27'),
(1178, 66, 193, 'course_class', 2, '2024-01-12 16:40:02', '2024-01-12 16:40:02'),
(1179, 66, 196, 'course_class', 2, '2024-01-12 16:40:13', '2024-01-12 16:40:13'),
(1180, 66, 197, 'course_class', 2, '2024-01-12 16:40:17', '2024-01-12 16:40:17'),
(1181, 66, 197, 'course_class', 2, '2024-01-13 07:35:24', '2024-01-13 07:35:24'),
(1182, 66, 197, 'course_class', 2, '2024-01-13 07:41:12', '2024-01-13 07:41:12'),
(1183, 66, 197, 'course_class', 2, '2024-01-13 08:05:25', '2024-01-13 08:05:25'),
(1184, 66, 199, 'course_class', 2, '2024-01-13 08:05:34', '2024-01-13 08:05:34'),
(1185, 66, 199, 'course_class', 2, '2024-01-13 08:07:25', '2024-01-13 08:07:25'),
(1186, 66, 200, 'course_class', 2, '2024-01-13 08:07:28', '2024-01-13 08:07:28'),
(1187, 66, 200, 'course_class', 2, '2024-01-13 08:20:22', '2024-01-13 08:20:22'),
(1188, 66, 201, 'course_class', 2, '2024-01-13 08:20:32', '2024-01-13 08:20:32'),
(1189, 66, 199, 'course_class', 2, '2024-01-13 08:20:41', '2024-01-13 08:20:41'),
(1190, 66, 199, 'course_class', 2, '2024-01-13 08:27:41', '2024-01-13 08:27:41'),
(1191, 66, 203, 'course_class', 2, '2024-01-13 08:27:47', '2024-01-13 08:27:47'),
(1192, 66, 201, 'course_class', 2, '2024-01-13 08:28:04', '2024-01-13 08:28:04'),
(1193, 66, 202, 'course_class', 2, '2024-01-13 08:28:09', '2024-01-13 08:28:09'),
(1194, 66, 203, 'course_class', 2, '2024-01-13 08:28:13', '2024-01-13 08:28:13'),
(1195, 66, 203, 'course_class', 2, '2024-01-13 08:28:14', '2024-01-13 08:28:14'),
(1196, 66, 203, 'course_class', 2, '2024-01-13 08:31:41', '2024-01-13 08:31:41'),
(1197, 66, 205, 'course_class', 2, '2024-01-13 08:31:45', '2024-01-13 08:31:45'),
(1198, 66, 206, 'course_class', 2, '2024-01-13 08:31:50', '2024-01-13 08:31:50'),
(1199, 66, 206, 'course_class', 2, '2024-01-13 08:35:23', '2024-01-13 08:35:23'),
(1200, 66, 206, 'course_class', 2, '2024-01-13 08:42:37', '2024-01-13 08:42:37'),
(1201, 66, 208, 'course_class', 2, '2024-01-13 08:42:44', '2024-01-13 08:42:44'),
(1202, 66, 209, 'course_class', 2, '2024-01-13 08:42:59', '2024-01-13 08:42:59'),
(1203, 66, 209, 'course_class', 2, '2024-01-13 08:46:15', '2024-01-13 08:46:15'),
(1204, 66, 210, 'course_class', 2, '2024-01-13 08:46:18', '2024-01-13 08:46:18'),
(1205, 66, 210, 'course_class', 2, '2024-01-13 08:50:33', '2024-01-13 08:50:33'),
(1206, 66, 212, 'course_class', 2, '2024-01-13 08:50:38', '2024-01-13 08:50:38'),
(1207, 66, 213, 'course_class', 2, '2024-01-13 08:50:45', '2024-01-13 08:50:45'),
(1208, 66, 213, 'course_class', 2, '2024-01-13 08:54:17', '2024-01-13 08:54:17'),
(1209, 66, 214, 'course_class', 2, '2024-01-13 08:54:22', '2024-01-13 08:54:22'),
(1210, 66, 215, 'course_class', 2, '2024-01-13 08:54:27', '2024-01-13 08:54:27'),
(1211, 66, 215, 'course_class', 2, '2024-01-13 08:57:32', '2024-01-13 08:57:32'),
(1212, 66, 216, 'course_class', 2, '2024-01-13 08:57:36', '2024-01-13 08:57:36'),
(1213, 66, 216, 'course_class', 2, '2024-01-13 08:59:38', '2024-01-13 08:59:38'),
(1214, 66, 216, 'course_class', 2, '2024-01-13 09:01:22', '2024-01-13 09:01:22'),
(1215, 66, 219, 'course_class', 2, '2024-01-13 09:01:26', '2024-01-13 09:01:26'),
(1216, 66, 219, 'course_class', 2, '2024-01-13 09:08:22', '2024-01-13 09:08:22'),
(1217, 66, 221, 'course_class', 2, '2024-01-13 09:08:55', '2024-01-13 09:08:55'),
(1218, 66, 221, 'course_class', 2, '2024-01-13 09:12:11', '2024-01-13 09:12:11'),
(1219, 66, 221, 'course_class', 2, '2024-01-13 09:14:56', '2024-01-13 09:14:56'),
(1220, 66, 222, 'course_class', 2, '2024-01-13 09:15:00', '2024-01-13 09:15:00'),
(1221, 66, 222, 'course_class', 2, '2024-01-13 09:15:02', '2024-01-13 09:15:02'),
(1222, 66, 222, 'course_class', 2, '2024-01-13 09:16:14', '2024-01-13 09:16:14'),
(1223, 66, 222, 'course_class', 2, '2024-01-13 09:20:42', '2024-01-13 09:20:42'),
(1224, 66, 225, 'course_class', 2, '2024-01-13 09:20:48', '2024-01-13 09:20:48'),
(1225, 66, 225, 'course_class', 2, '2024-01-13 09:22:25', '2024-01-13 09:22:25'),
(1226, 66, 224, 'course_class', 2, '2024-01-13 09:22:28', '2024-01-13 09:22:28'),
(1227, 66, 224, 'course_class', 2, '2024-01-13 09:26:23', '2024-01-13 09:26:23'),
(1228, 66, 227, 'course_class', 2, '2024-01-13 09:26:30', '2024-01-13 09:26:30'),
(1229, 66, 227, 'course_class', 2, '2024-01-13 09:27:34', '2024-01-13 09:27:34'),
(1230, 66, 229, 'course_class', 2, '2024-01-13 09:27:49', '2024-01-13 09:27:49'),
(1231, 66, 229, 'course_class', 2, '2024-01-13 09:29:20', '2024-01-13 09:29:20'),
(1232, 66, 229, 'course_class', 2, '2024-01-13 09:30:15', '2024-01-13 09:30:15'),
(1233, 66, 228, 'course_class', 2, '2024-01-13 09:30:20', '2024-01-13 09:30:20'),
(1234, 66, 228, 'course_class', 2, '2024-01-13 09:31:41', '2024-01-13 09:31:41'),
(1235, 66, 228, 'course_class', 2, '2024-01-13 09:34:00', '2024-01-13 09:34:00'),
(1236, 66, 228, 'course_class', 2, '2024-01-13 09:37:07', '2024-01-13 09:37:07'),
(1237, 66, 228, 'course_class', 2, '2024-01-13 09:38:10', '2024-01-13 09:38:10'),
(1238, 66, 232, 'course_class', 2, '2024-01-13 09:38:15', '2024-01-13 09:38:15'),
(1239, 66, 233, 'course_class', 2, '2024-01-13 09:38:22', '2024-01-13 09:38:22'),
(1240, 66, 233, 'course_class', 2, '2024-01-13 09:41:47', '2024-01-13 09:41:47'),
(1241, 66, 233, 'course_class', 2, '2024-01-13 09:43:55', '2024-01-13 09:43:55'),
(1242, 66, 233, 'course_class', 2, '2024-01-13 09:45:32', '2024-01-13 09:45:32'),
(1243, 66, 233, 'course_class', 2, '2024-01-13 09:47:32', '2024-01-13 09:47:32'),
(1244, 66, 233, 'course_class', 2, '2024-01-13 09:51:55', '2024-01-13 09:51:55'),
(1245, 66, 237, 'course_class', 2, '2024-01-13 09:52:01', '2024-01-13 09:52:01'),
(1246, 66, 237, 'course_class', 2, '2024-01-13 09:54:51', '2024-01-13 09:54:51'),
(1247, 66, 237, 'course_class', 2, '2024-01-13 09:57:29', '2024-01-13 09:57:29'),
(1248, 66, 237, 'course_class', 2, '2024-01-13 09:59:08', '2024-01-13 09:59:08'),
(1249, 66, 237, 'course_class', 2, '2024-01-13 10:04:08', '2024-01-13 10:04:08'),
(1250, 66, 242, 'course_class', 2, '2024-01-13 10:04:13', '2024-01-13 10:04:13'),
(1251, 66, 243, 'course_class', 2, '2024-01-13 10:04:18', '2024-01-13 10:04:18'),
(1252, 66, 243, 'course_class', 2, '2024-01-13 10:09:02', '2024-01-13 10:09:02'),
(1253, 66, 243, 'course_class', 2, '2024-01-13 10:11:48', '2024-01-13 10:11:48'),
(1254, 66, 245, 'course_class', 2, '2024-01-13 10:11:54', '2024-01-13 10:11:54'),
(1255, 66, 246, 'course_class', 2, '2024-01-13 10:12:00', '2024-01-13 10:12:00'),
(1256, 66, 246, 'course_class', 2, '2024-01-13 10:13:18', '2024-01-13 10:13:18'),
(1257, 66, 246, 'course_class', 2, '2024-01-13 10:16:34', '2024-01-13 10:16:34'),
(1258, 66, 248, 'course_class', 2, '2024-01-13 10:16:40', '2024-01-13 10:16:40'),
(1259, 66, 248, 'course_class', 2, '2024-01-13 10:19:59', '2024-01-13 10:19:59'),
(1260, 66, 248, 'course_class', 2, '2024-01-13 10:21:34', '2024-01-13 10:21:34'),
(1261, 66, 251, 'course_class', 2, '2024-01-13 10:21:42', '2024-01-13 10:21:42'),
(1262, 66, 252, 'course_class', 2, '2024-01-13 10:21:50', '2024-01-13 10:21:50'),
(1263, 66, 252, 'course_class', 2, '2024-01-13 10:29:44', '2024-01-13 10:29:44'),
(1264, 66, 254, 'course_class', 2, '2024-01-13 10:29:52', '2024-01-13 10:29:52'),
(1265, 66, 254, 'course_class', 2, '2024-01-13 10:31:27', '2024-01-13 10:31:27'),
(1266, 66, 254, 'course_class', 2, '2024-01-13 10:31:55', '2024-01-13 10:31:55'),
(1267, 66, 255, 'course_class', 2, '2024-01-13 10:31:59', '2024-01-13 10:31:59'),
(1268, 66, 255, 'course_class', 2, '2024-01-13 10:33:46', '2024-01-13 10:33:46'),
(1269, 66, 255, 'course_class', 2, '2024-01-13 10:38:20', '2024-01-13 10:38:20'),
(1270, 66, 258, 'course_class', 2, '2024-01-13 10:38:26', '2024-01-13 10:38:26'),
(1271, 66, 258, 'course_class', 2, '2024-01-13 12:15:56', '2024-01-13 12:15:56'),
(1272, 66, 258, 'course_class', 2, '2024-01-13 12:33:33', '2024-01-13 12:33:33'),
(1273, 66, 260, 'course_class', 2, '2024-01-13 12:33:41', '2024-01-13 12:33:41'),
(1274, 66, 261, 'course_class', 2, '2024-01-13 12:33:47', '2024-01-13 12:33:47'),
(1275, 66, 261, 'course_class', 2, '2024-01-13 12:35:26', '2024-01-13 12:35:26'),
(1276, 66, 261, 'course_class', 2, '2024-01-13 12:35:36', '2024-01-13 12:35:36'),
(1277, 66, 261, 'course_class', 2, '2024-01-13 12:37:16', '2024-01-13 12:37:16'),
(1278, 66, 261, 'course_class', 2, '2024-01-13 12:38:20', '2024-01-13 12:38:20'),
(1279, 66, 261, 'course_class', 2, '2024-01-13 12:42:46', '2024-01-13 12:42:46'),
(1280, 66, 264, 'course_class', 2, '2024-01-13 12:42:55', '2024-01-13 12:42:55'),
(1281, 66, 264, 'course_class', 2, '2024-01-13 12:47:01', '2024-01-13 12:47:01'),
(1282, 66, 264, 'course_class', 2, '2024-01-13 12:49:46', '2024-01-13 12:49:46'),
(1283, 66, 264, 'course_class', 2, '2024-01-13 12:52:06', '2024-01-13 12:52:06'),
(1284, 66, 264, 'course_class', 2, '2024-01-13 12:53:44', '2024-01-13 12:53:44'),
(1285, 66, 264, 'course_class', 2, '2024-01-13 12:57:47', '2024-01-13 12:57:47'),
(1286, 66, 264, 'course_class', 2, '2024-01-13 12:58:12', '2024-01-13 12:58:12'),
(1287, 66, 264, 'course_class', 2, '2024-01-13 12:58:36', '2024-01-13 12:58:36'),
(1288, 66, 274, 'course_class', 2, '2024-01-13 12:58:40', '2024-01-13 12:58:40'),
(1289, 66, 274, 'course_class', 2, '2024-01-13 13:03:19', '2024-01-13 13:03:19'),
(1290, 66, 274, 'course_class', 2, '2024-01-13 13:07:31', '2024-01-13 13:07:31'),
(1291, 66, 280, 'course_class', 2, '2024-01-13 13:07:39', '2024-01-13 13:07:39'),
(1292, 66, 280, 'course_class', 2, '2024-01-13 13:12:04', '2024-01-13 13:12:04'),
(1293, 66, 282, 'course_class', 2, '2024-01-13 13:12:10', '2024-01-13 13:12:10'),
(1294, 66, 283, 'course_class', 2, '2024-01-13 13:12:21', '2024-01-13 13:12:21'),
(1295, 66, 283, 'course_class', 2, '2024-01-13 13:15:02', '2024-01-13 13:15:02'),
(1296, 66, 283, 'course_class', 2, '2024-01-13 13:19:50', '2024-01-13 13:19:50'),
(1297, 66, 283, 'course_class', 2, '2024-01-13 13:20:54', '2024-01-13 13:20:54'),
(1298, 66, 287, 'course_class', 2, '2024-01-13 13:21:00', '2024-01-13 13:21:00'),
(1299, 66, 287, 'course_class', 2, '2024-01-13 13:24:38', '2024-01-13 13:24:38'),
(1300, 66, 287, 'course_class', 2, '2024-01-13 13:28:04', '2024-01-13 13:28:04'),
(1301, 66, 287, 'course_class', 2, '2024-01-13 13:31:35', '2024-01-13 13:31:35'),
(1302, 66, 287, 'course_class', 2, '2024-01-13 13:37:08', '2024-01-13 13:37:08'),
(1303, 66, 296, 'course_class', 2, '2024-01-13 13:37:17', '2024-01-13 13:37:17'),
(1304, 66, 287, 'course_class', 2, '2024-01-13 13:38:33', '2024-01-13 13:38:33'),
(1305, 66, 296, 'course_class', 2, '2024-01-13 13:38:39', '2024-01-13 13:38:39'),
(1306, 66, 297, 'course_class', 2, '2024-01-13 13:38:45', '2024-01-13 13:38:45'),
(1307, 66, 297, 'course_class', 2, '2024-01-13 13:40:21', '2024-01-13 13:40:21'),
(1308, 66, 297, 'course_class', 2, '2024-01-13 13:47:00', '2024-01-13 13:47:00'),
(1309, 66, 300, 'course_class', 2, '2024-01-13 13:47:09', '2024-01-13 13:47:09'),
(1310, 66, 301, 'course_class', 2, '2024-01-13 13:47:12', '2024-01-13 13:47:12'),
(1311, 66, 302, 'course_class', 2, '2024-01-13 13:47:23', '2024-01-13 13:47:23'),
(1312, 66, 302, 'course_class', 2, '2024-01-13 13:49:15', '2024-01-13 13:49:15'),
(1313, 66, 300, 'course_class', 2, '2024-01-13 13:49:22', '2024-01-13 13:49:22'),
(1314, 66, 302, 'course_class', 2, '2024-01-13 13:49:29', '2024-01-13 13:49:29'),
(1315, 66, 302, 'course_class', 2, '2024-01-13 13:54:42', '2024-01-13 13:54:42'),
(1316, 66, 304, 'course_class', 2, '2024-01-13 13:54:49', '2024-01-13 13:54:49'),
(1317, 66, 304, 'course_class', 2, '2024-01-13 13:58:44', '2024-01-13 13:58:44'),
(1318, 66, 304, 'course_class', 2, '2024-01-13 14:04:20', '2024-01-13 14:04:20'),
(1319, 66, 304, 'course_class', 2, '2024-01-13 14:08:04', '2024-01-13 14:08:04'),
(1320, 66, 304, 'course_class', 2, '2024-01-13 14:09:20', '2024-01-13 14:09:20'),
(1321, 66, 309, 'course_class', 2, '2024-01-13 14:09:28', '2024-01-13 14:09:28'),
(1322, 66, 309, 'course_class', 2, '2024-01-13 14:11:26', '2024-01-13 14:11:26'),
(1323, 66, 309, 'course_class', 2, '2024-01-13 16:03:42', '2024-01-13 16:03:42'),
(1324, 66, 309, 'course_class', 2, '2024-01-13 16:07:42', '2024-01-13 16:07:42'),
(1325, 66, 309, 'course_class', 2, '2024-01-13 16:10:35', '2024-01-13 16:10:35'),
(1326, 66, 317, 'course_class', 2, '2024-01-13 16:10:44', '2024-01-13 16:10:44'),
(1327, 66, 317, 'course_class', 2, '2024-01-13 16:15:37', '2024-01-13 16:15:37'),
(1328, 66, 321, 'course_class', 2, '2024-01-13 16:15:44', '2024-01-13 16:15:44'),
(1329, 66, 321, 'course_class', 2, '2024-01-13 16:17:11', '2024-01-13 16:17:11'),
(1330, 66, 321, 'course_class', 2, '2024-01-13 16:18:58', '2024-01-13 16:18:58'),
(1331, 66, 199, 'course_class', 2, '2024-01-13 16:19:10', '2024-01-13 16:19:10'),
(1332, 66, 201, 'course_class', 2, '2024-01-13 16:19:16', '2024-01-13 16:19:16'),
(1333, 66, 203, 'course_class', 2, '2024-01-13 16:19:25', '2024-01-13 16:19:25'),
(1334, 66, 203, 'course_class', 2, '2024-01-13 16:20:49', '2024-01-13 16:20:49'),
(1335, 66, 205, 'course_class', 2, '2024-01-13 16:20:54', '2024-01-13 16:20:54'),
(1336, 66, 208, 'course_class', 2, '2024-01-13 16:21:00', '2024-01-13 16:21:00'),
(1337, 66, 208, 'course_class', 2, '2024-01-13 16:21:09', '2024-01-13 16:21:09'),
(1338, 66, 208, 'course_class', 2, '2024-01-15 09:07:35', '2024-01-15 09:07:35'),
(1339, 66, 3, 'course_class', 2, '2024-01-15 09:08:42', '2024-01-15 09:08:42'),
(1340, 66, 208, 'course_class', 2, '2024-01-15 09:10:36', '2024-01-15 09:10:36'),
(1341, 66, 208, 'course_class', 2, '2024-01-15 09:13:45', '2024-01-15 09:13:45'),
(1342, 66, 210, 'course_class', 2, '2024-01-15 09:14:58', '2024-01-15 09:14:58'),
(1343, 66, 212, 'course_class', 2, '2024-01-15 09:15:08', '2024-01-15 09:15:08'),
(1344, 66, 214, 'course_class', 2, '2024-01-15 09:15:19', '2024-01-15 09:15:19'),
(1345, 66, 216, 'course_class', 2, '2024-01-15 09:15:28', '2024-01-15 09:15:28'),
(1346, 66, 208, 'course_class', 2, '2024-01-15 09:15:35', '2024-01-15 09:15:35'),
(1347, 66, 199, 'course_class', 2, '2024-01-15 09:18:11', '2024-01-15 09:18:11'),
(1348, 66, 201, 'course_class', 2, '2024-01-15 09:18:20', '2024-01-15 09:18:20'),
(1349, 66, 203, 'course_class', 2, '2024-01-15 09:18:28', '2024-01-15 09:18:28'),
(1350, 66, 205, 'course_class', 2, '2024-01-15 09:18:39', '2024-01-15 09:18:39'),
(1351, 66, 208, 'course_class', 2, '2024-01-15 09:18:52', '2024-01-15 09:18:52'),
(1352, 66, 208, 'course_class', 2, '2024-01-15 09:19:36', '2024-01-15 09:19:36'),
(1353, 66, 210, 'course_class', 2, '2024-01-15 09:19:46', '2024-01-15 09:19:46'),
(1354, 66, 211, 'course_class', 2, '2024-01-15 09:19:53', '2024-01-15 09:19:53'),
(1355, 66, 221, 'course_class', 2, '2024-01-15 09:20:19', '2024-01-15 09:20:19'),
(1356, 66, 224, 'course_class', 2, '2024-01-15 09:20:28', '2024-01-15 09:20:28'),
(1357, 66, 229, 'course_class', 2, '2024-01-15 09:20:35', '2024-01-15 09:20:35'),
(1358, 66, 232, 'course_class', 2, '2024-01-15 09:20:45', '2024-01-15 09:20:45'),
(1359, 66, 236, 'course_class', 2, '2024-01-15 09:21:26', '2024-01-15 09:21:26'),
(1360, 66, 236, 'course_class', 2, '2024-01-15 09:24:13', '2024-01-15 09:24:13'),
(1361, 66, 239, 'course_class', 2, '2024-01-15 09:24:23', '2024-01-15 09:24:23'),
(1362, 66, 239, 'course_class', 2, '2024-01-15 09:25:23', '2024-01-15 09:25:23'),
(1363, 66, 242, 'course_class', 2, '2024-01-15 09:25:30', '2024-01-15 09:25:30'),
(1364, 66, 243, 'course_class', 2, '2024-01-15 09:27:32', '2024-01-15 09:27:32'),
(1365, 66, 245, 'course_class', 2, '2024-01-15 09:27:55', '2024-01-15 09:27:55'),
(1366, 66, 248, 'course_class', 2, '2024-01-15 09:28:04', '2024-01-15 09:28:04'),
(1367, 66, 251, 'course_class', 2, '2024-01-15 09:28:20', '2024-01-15 09:28:20'),
(1368, 66, 254, 'course_class', 2, '2024-01-15 09:28:32', '2024-01-15 09:28:32'),
(1369, 66, 257, 'course_class', 2, '2024-01-15 09:28:41', '2024-01-15 09:28:41'),
(1370, 66, 260, 'course_class', 2, '2024-01-15 09:28:51', '2024-01-15 09:28:51'),
(1371, 66, 264, 'course_class', 2, '2024-01-15 09:29:07', '2024-01-15 09:29:07'),
(1372, 66, 273, 'course_class', 2, '2024-01-15 09:30:21', '2024-01-15 09:30:21'),
(1373, 66, 273, 'course_class', 2, '2024-01-15 09:32:40', '2024-01-15 09:32:40'),
(1374, 66, 276, 'course_class', 2, '2024-01-15 09:32:50', '2024-01-15 09:32:50'),
(1375, 66, 279, 'course_class', 2, '2024-01-15 09:33:35', '2024-01-15 09:33:35'),
(1376, 66, 282, 'course_class', 2, '2024-01-15 09:34:02', '2024-01-15 09:34:02'),
(1377, 66, 286, 'course_class', 2, '2024-01-15 09:34:20', '2024-01-15 09:34:20'),
(1378, 66, 289, 'course_class', 2, '2024-01-15 09:34:28', '2024-01-15 09:34:28'),
(1379, 66, 292, 'course_class', 2, '2024-01-15 09:34:36', '2024-01-15 09:34:36'),
(1380, 66, 293, 'course_class', 2, '2024-01-15 09:34:42', '2024-01-15 09:34:42'),
(1381, 66, 296, 'course_class', 2, '2024-01-15 09:34:51', '2024-01-15 09:34:51'),
(1382, 66, 300, 'course_class', 2, '2024-01-15 09:34:59', '2024-01-15 09:34:59'),
(1383, 66, 301, 'course_class', 2, '2024-01-15 09:35:07', '2024-01-15 09:35:07'),
(1384, 66, 304, 'course_class', 2, '2024-01-15 09:35:15', '2024-01-15 09:35:15'),
(1385, 66, 305, 'course_class', 2, '2024-01-15 09:35:24', '2024-01-15 09:35:24'),
(1386, 66, 306, 'course_class', 2, '2024-01-15 09:35:31', '2024-01-15 09:35:31'),
(1387, 66, 307, 'course_class', 2, '2024-01-15 09:35:37', '2024-01-15 09:35:37'),
(1388, 66, 306, 'course_class', 2, '2024-01-15 09:35:50', '2024-01-15 09:35:50'),
(1389, 66, 307, 'course_class', 2, '2024-01-15 09:36:21', '2024-01-15 09:36:21'),
(1390, 66, 308, 'course_class', 2, '2024-01-15 09:36:29', '2024-01-15 09:36:29'),
(1391, 66, 276, 'course_class', 2, '2024-01-15 09:39:21', '2024-01-15 09:39:21'),
(1392, 66, 279, 'course_class', 2, '2024-01-15 09:39:31', '2024-01-15 09:39:31'),
(1393, 66, 279, 'course_class', 2, '2024-01-15 09:40:29', '2024-01-15 09:40:29'),
(1394, 66, 282, 'course_class', 2, '2024-01-15 09:40:37', '2024-01-15 09:40:37'),
(1395, 66, 282, 'course_class', 2, '2024-01-15 09:41:47', '2024-01-15 09:41:47'),
(1396, 66, 286, 'course_class', 2, '2024-01-15 09:42:01', '2024-01-15 09:42:01'),
(1397, 66, 306, 'course_class', 2, '2024-01-15 09:42:30', '2024-01-15 09:42:30'),
(1398, 66, 306, 'course_class', 2, '2024-01-15 09:43:30', '2024-01-15 09:43:30'),
(1399, 66, 308, 'course_class', 2, '2024-01-15 09:44:21', '2024-01-15 09:44:21'),
(1400, 66, 239, 'course_class', 2, '2024-01-15 09:44:52', '2024-01-15 09:44:52'),
(1401, 66, 242, 'course_class', 2, '2024-01-15 09:45:01', '2024-01-15 09:45:01'),
(1402, 66, 242, 'course_class', 2, '2024-01-15 09:53:00', '2024-01-15 09:53:00'),
(1403, 66, 193, 'course_class', 2, '2024-01-15 09:53:10', '2024-01-15 09:53:10'),
(1404, 66, NULL, 'profile', 3, '2024-01-15 10:04:45', '2024-01-15 10:04:45'),
(1405, 66, 193, 'course_class', 2, '2024-01-15 10:12:27', '2024-01-15 10:12:27'),
(1406, 66, 196, 'course_class', 2, '2024-01-15 10:12:37', '2024-01-15 10:12:37'),
(1407, 66, 199, 'course_class', 2, '2024-01-15 10:12:46', '2024-01-15 10:12:46'),
(1408, 66, 200, 'course_class', 2, '2024-01-15 10:12:54', '2024-01-15 10:12:54'),
(1409, 66, 201, 'course_class', 2, '2024-01-15 10:13:03', '2024-01-15 10:13:03'),
(1410, 66, 202, 'course_class', 2, '2024-01-15 10:13:10', '2024-01-15 10:13:10'),
(1411, 66, 203, 'course_class', 2, '2024-01-15 10:13:17', '2024-01-15 10:13:17'),
(1412, 66, 242, 'course_class', 2, '2024-01-15 10:52:36', '2024-01-15 10:52:36'),
(1413, 66, 323, 'course_class', 2, '2024-01-15 13:03:40', '2024-01-15 13:03:40'),
(1414, 66, 324, 'course_class', 2, '2024-01-15 13:04:09', '2024-01-15 13:04:09'),
(1415, 66, 323, 'course_class', 2, '2024-01-15 13:04:16', '2024-01-15 13:04:16'),
(1416, 66, 323, 'course_class', 2, '2024-01-15 13:07:27', '2024-01-15 13:07:27'),
(1417, 66, 323, 'course_class', 2, '2024-01-15 13:10:12', '2024-01-15 13:10:12'),
(1418, 66, 323, 'course_class', 2, '2024-01-15 13:14:03', '2024-01-15 13:14:03'),
(1419, 66, 326, 'course_class', 2, '2024-01-15 13:14:09', '2024-01-15 13:14:09'),
(1420, 66, 326, 'course_class', 2, '2024-01-15 13:21:49', '2024-01-15 13:21:49'),
(1421, 66, 327, 'course_class', 2, '2024-01-15 13:21:55', '2024-01-15 13:21:55'),
(1422, 66, 328, 'course_class', 2, '2024-01-15 13:22:07', '2024-01-15 13:22:07'),
(1423, 66, 328, 'course_class', 2, '2024-01-15 13:26:28', '2024-01-15 13:26:28'),
(1424, 66, 329, 'course_class', 2, '2024-01-15 13:26:34', '2024-01-15 13:26:34'),
(1425, 66, 329, 'course_class', 2, '2024-01-15 13:30:00', '2024-01-15 13:30:00'),
(1426, 66, 330, 'course_class', 2, '2024-01-15 13:30:06', '2024-01-15 13:30:06'),
(1427, 66, 332, 'course_class', 2, '2024-01-15 13:30:15', '2024-01-15 13:30:15'),
(1428, 66, 332, 'course_class', 2, '2024-01-15 13:35:43', '2024-01-15 13:35:43'),
(1429, 66, 332, 'course_class', 2, '2024-01-15 13:46:14', '2024-01-15 13:46:14'),
(1430, 66, 332, 'course_class', 2, '2024-01-15 13:48:30', '2024-01-15 13:48:30'),
(1431, 66, 337, 'course_class', 2, '2024-01-15 13:48:39', '2024-01-15 13:48:39'),
(1432, 66, 337, 'course_class', 2, '2024-01-15 13:53:57', '2024-01-15 13:53:57'),
(1433, 66, 340, 'course_class', 2, '2024-01-15 13:54:03', '2024-01-15 13:54:03'),
(1434, 66, 340, 'course_class', 2, '2024-01-15 14:01:19', '2024-01-15 14:01:19'),
(1435, 66, 340, 'course_class', 2, '2024-01-15 14:05:29', '2024-01-15 14:05:29'),
(1436, 66, 345, 'course_class', 2, '2024-01-15 14:05:37', '2024-01-15 14:05:37'),
(1437, 66, 345, 'course_class', 2, '2024-01-15 14:10:22', '2024-01-15 14:10:22'),
(1438, 66, 348, 'course_class', 2, '2024-01-15 14:10:27', '2024-01-15 14:10:27'),
(1439, 66, 348, 'course_class', 2, '2024-01-15 14:16:16', '2024-01-15 14:16:16'),
(1440, 66, 350, 'course_class', 2, '2024-01-15 14:16:22', '2024-01-15 14:16:22'),
(1441, 66, 350, 'course_class', 2, '2024-01-15 14:23:50', '2024-01-15 14:23:50'),
(1442, 66, 350, 'course_class', 2, '2024-01-15 14:29:15', '2024-01-15 14:29:15'),
(1443, 66, 350, 'course_class', 2, '2024-01-15 14:38:07', '2024-01-15 14:38:07'),
(1444, 66, 350, 'course_class', 2, '2024-01-15 14:42:32', '2024-01-15 14:42:32'),
(1445, 66, 350, 'course_class', 2, '2024-01-15 14:49:35', '2024-01-15 14:49:35'),
(1446, 66, 350, 'course_class', 2, '2024-01-15 14:56:07', '2024-01-15 14:56:07'),
(1447, 66, 363, 'course_class', 2, '2024-01-15 14:56:16', '2024-01-15 14:56:16'),
(1448, 66, 363, 'course_class', 2, '2024-01-15 15:01:37', '2024-01-15 15:01:37'),
(1449, 66, 366, 'course_class', 2, '2024-01-15 15:01:52', '2024-01-15 15:01:52'),
(1450, 66, 366, 'course_class', 2, '2024-01-15 15:08:20', '2024-01-15 15:08:20'),
(1451, 66, 366, 'course_class', 2, '2024-01-15 15:10:12', '2024-01-15 15:10:12'),
(1452, 66, 370, 'course_class', 2, '2024-01-15 15:10:21', '2024-01-15 15:10:21'),
(1453, 66, 370, 'course_class', 2, '2024-01-15 15:11:50', '2024-01-15 15:11:50'),
(1454, 66, 370, 'course_class', 2, '2024-01-15 15:23:47', '2024-01-15 15:23:47'),
(1455, 66, 374, 'course_class', 2, '2024-01-15 15:23:53', '2024-01-15 15:23:53'),
(1456, 66, 374, 'course_class', 2, '2024-01-15 15:29:23', '2024-01-15 15:29:23'),
(1457, 66, 377, 'course_class', 2, '2024-01-15 15:29:29', '2024-01-15 15:29:29'),
(1458, 66, 377, 'course_class', 2, '2024-01-15 16:17:28', '2024-01-15 16:17:28'),
(1459, 66, 377, 'course_class', 2, '2024-01-15 16:22:20', '2024-01-15 16:22:20'),
(1460, 66, 377, 'course_class', 2, '2024-01-15 16:27:31', '2024-01-15 16:27:31');
INSERT INTO `course_class_member_log` (`id`, `user_id`, `course_class_module_id`, `log_type`, `status_log`, `created_at`, `updated_at`) VALUES
(1461, 66, 386, 'course_class', 2, '2024-01-15 16:27:46', '2024-01-15 16:27:46'),
(1462, 66, 386, 'course_class', 2, '2024-01-15 16:35:57', '2024-01-15 16:35:57'),
(1463, 66, 392, 'course_class', 2, '2024-01-15 16:36:17', '2024-01-15 16:36:17'),
(1464, 66, 392, 'course_class', 2, '2024-01-15 16:42:39', '2024-01-15 16:42:39'),
(1465, 66, 392, 'course_class', 2, '2024-01-15 16:50:08', '2024-01-15 16:50:08'),
(1466, 66, 392, 'course_class', 2, '2024-01-15 16:52:00', '2024-01-15 16:52:00'),
(1467, 66, 399, 'course_class', 2, '2024-01-15 16:52:11', '2024-01-15 16:52:11'),
(1468, 66, 399, 'course_class', 2, '2024-01-15 17:00:51', '2024-01-15 17:00:51'),
(1469, 66, 399, 'course_class', 2, '2024-01-16 08:28:06', '2024-01-16 08:28:06'),
(1470, 66, 406, 'course_class', 2, '2024-01-16 08:28:15', '2024-01-16 08:28:15'),
(1471, 66, 406, 'course_class', 2, '2024-01-16 08:32:29', '2024-01-16 08:32:29'),
(1472, 66, 406, 'course_class', 2, '2024-01-16 08:41:39', '2024-01-16 08:41:39'),
(1473, 66, 412, 'course_class', 2, '2024-01-16 08:41:46', '2024-01-16 08:41:46'),
(1474, 66, 412, 'course_class', 2, '2024-01-16 08:50:14', '2024-01-16 08:50:14'),
(1475, 66, 412, 'course_class', 2, '2024-01-16 09:00:51', '2024-01-16 09:00:51'),
(1476, 66, 242, 'course_class', 2, '2024-01-16 11:23:59', '2024-01-16 11:23:59'),
(1477, 66, 196, 'course_class', 2, '2024-01-16 11:24:06', '2024-01-16 11:24:06'),
(1478, 66, 197, 'course_class', 2, '2024-01-16 11:24:09', '2024-01-16 11:24:09'),
(1479, 66, 199, 'course_class', 2, '2024-01-16 11:24:15', '2024-01-16 11:24:15'),
(1480, 66, 201, 'course_class', 2, '2024-01-16 11:24:20', '2024-01-16 11:24:20'),
(1481, 66, 203, 'course_class', 2, '2024-01-16 11:24:25', '2024-01-16 11:24:25'),
(1482, 66, 205, 'course_class', 2, '2024-01-16 11:24:32', '2024-01-16 11:24:32'),
(1483, 66, 208, 'course_class', 2, '2024-01-16 11:24:37', '2024-01-16 11:24:37'),
(1484, 66, 210, 'course_class', 2, '2024-01-16 11:24:42', '2024-01-16 11:24:42'),
(1485, 66, 212, 'course_class', 2, '2024-01-16 11:24:47', '2024-01-16 11:24:47'),
(1486, 66, 216, 'course_class', 2, '2024-01-16 11:24:52', '2024-01-16 11:24:52'),
(1487, 66, 221, 'course_class', 2, '2024-01-16 11:25:01', '2024-01-16 11:25:01'),
(1488, 66, 224, 'course_class', 2, '2024-01-16 11:25:07', '2024-01-16 11:25:07'),
(1489, 66, 229, 'course_class', 2, '2024-01-16 11:25:15', '2024-01-16 11:25:15'),
(1490, 66, 232, 'course_class', 2, '2024-01-16 11:25:24', '2024-01-16 11:25:24'),
(1491, 66, 236, 'course_class', 2, '2024-01-16 11:25:33', '2024-01-16 11:25:33'),
(1492, 66, 239, 'course_class', 2, '2024-01-16 11:25:40', '2024-01-16 11:25:40'),
(1493, 66, 242, 'course_class', 2, '2024-01-16 11:25:45', '2024-01-16 11:25:45'),
(1494, 66, 245, 'course_class', 2, '2024-01-16 11:25:51', '2024-01-16 11:25:51'),
(1495, 66, 248, 'course_class', 2, '2024-01-16 11:25:58', '2024-01-16 11:25:58'),
(1496, 66, 251, 'course_class', 2, '2024-01-16 11:26:03', '2024-01-16 11:26:03'),
(1497, 66, 412, 'course_class', 2, '2024-01-16 11:27:11', '2024-01-16 11:27:11'),
(1498, 66, 323, 'course_class', 2, '2024-01-16 11:27:17', '2024-01-16 11:27:17'),
(1499, 66, 327, 'course_class', 2, '2024-01-16 11:35:53', '2024-01-16 11:35:53'),
(1500, 66, 329, 'course_class', 2, '2024-01-16 11:36:03', '2024-01-16 11:36:03'),
(1501, 66, 329, 'course_class', 2, '2024-01-16 15:17:39', '2024-01-16 15:17:39'),
(1502, 66, 421, 'course_class', 2, '2024-01-16 15:17:52', '2024-01-16 15:17:52'),
(1503, 66, 421, 'course_class', 2, '2024-01-16 15:18:24', '2024-01-16 15:18:24'),
(1504, 66, 421, 'course_class', 2, '2024-01-16 15:19:30', '2024-01-16 15:19:30'),
(1505, 66, 421, 'course_class', 2, '2024-01-16 15:20:59', '2024-01-16 15:20:59'),
(1506, 66, 421, 'course_class', 2, '2024-01-16 15:25:42', '2024-01-16 15:25:42'),
(1507, 66, 421, 'course_class', 2, '2024-01-16 15:46:30', '2024-01-16 15:46:30'),
(1508, 66, 421, 'course_class', 2, '2024-01-16 15:52:20', '2024-01-16 15:52:20'),
(1509, 66, 421, 'course_class', 2, '2024-01-16 16:08:45', '2024-01-16 16:08:45'),
(1510, 66, 421, 'course_class', 2, '2024-01-16 16:09:06', '2024-01-16 16:09:06'),
(1511, 66, 421, 'course_class', 2, '2024-01-16 16:12:36', '2024-01-16 16:12:36'),
(1512, 66, 421, 'course_class', 2, '2024-01-16 16:34:07', '2024-01-16 16:34:07'),
(1513, 66, 421, 'course_class', 2, '2024-01-16 16:44:29', '2024-01-16 16:44:29'),
(1514, 66, 421, 'course_class', 2, '2024-01-16 16:51:55', '2024-01-16 16:51:55'),
(1515, 66, 421, 'course_class', 2, '2024-01-16 16:53:24', '2024-01-16 16:53:24'),
(1516, 66, 421, 'course_class', 2, '2024-01-16 16:54:24', '2024-01-16 16:54:24'),
(1517, 66, 421, 'course_class', 2, '2024-01-16 17:02:04', '2024-01-16 17:02:04'),
(1518, 66, 421, 'course_class', 2, '2024-01-16 19:04:40', '2024-01-16 19:04:40'),
(1519, 66, 421, 'course_class', 2, '2024-01-16 19:06:15', '2024-01-16 19:06:15'),
(1520, 66, 421, 'course_class', 2, '2024-01-16 19:13:11', '2024-01-16 19:13:11'),
(1521, 66, 454, 'course_class', 2, '2024-01-16 19:13:19', '2024-01-16 19:13:19'),
(1522, 66, 454, 'course_class', 2, '2024-01-16 19:18:13', '2024-01-16 19:18:13'),
(1523, 66, 454, 'course_class', 2, '2024-01-16 19:23:45', '2024-01-16 19:23:45'),
(1524, 66, 454, 'course_class', 2, '2024-01-16 19:24:21', '2024-01-16 19:24:21'),
(1525, 66, 454, 'course_class', 2, '2024-01-16 19:33:55', '2024-01-16 19:33:55'),
(1526, 66, 323, 'course_class', 2, '2024-01-16 19:41:09', '2024-01-16 19:41:09'),
(1527, 66, 324, 'course_class', 2, '2024-01-16 19:41:13', '2024-01-16 19:41:13'),
(1528, 66, 326, 'course_class', 2, '2024-01-16 19:55:42', '2024-01-16 19:55:42'),
(1529, 66, 454, 'course_class', 2, '2024-01-16 19:56:10', '2024-01-16 19:56:10'),
(1530, 66, 454, 'course_class', 2, '2024-01-16 20:27:32', '2024-01-16 20:27:32'),
(1531, 66, 327, 'course_class', 2, '2024-01-16 20:27:39', '2024-01-16 20:27:39'),
(1532, 66, 329, 'course_class', 2, '2024-01-16 20:28:14', '2024-01-16 20:28:14'),
(1533, 66, 331, 'course_class', 2, '2024-01-16 20:28:17', '2024-01-16 20:28:17'),
(1534, 66, 335, 'course_class', 2, '2024-01-16 20:28:23', '2024-01-16 20:28:23'),
(1535, 66, 337, 'course_class', 2, '2024-01-16 20:28:26', '2024-01-16 20:28:26'),
(1536, 66, 339, 'course_class', 2, '2024-01-16 20:28:28', '2024-01-16 20:28:28'),
(1537, 66, 343, 'course_class', 2, '2024-01-16 20:28:32', '2024-01-16 20:28:32'),
(1538, 66, 345, 'course_class', 2, '2024-01-16 20:28:35', '2024-01-16 20:28:35'),
(1539, 66, 347, 'course_class', 2, '2024-01-16 20:28:39', '2024-01-16 20:28:39'),
(1540, 66, 353, 'course_class', 2, '2024-01-16 20:28:42', '2024-01-16 20:28:42'),
(1541, 66, 354, 'course_class', 2, '2024-01-16 20:28:47', '2024-01-16 20:28:47'),
(1542, 66, 358, 'course_class', 2, '2024-01-16 20:28:50', '2024-01-16 20:28:50'),
(1543, 66, 360, 'course_class', 2, '2024-01-16 20:28:53', '2024-01-16 20:28:53'),
(1544, 66, 362, 'course_class', 2, '2024-01-16 20:28:57', '2024-01-16 20:28:57'),
(1545, 66, 369, 'course_class', 2, '2024-01-16 20:29:03', '2024-01-16 20:29:03'),
(1546, 66, 395, 'course_class', 2, '2024-01-16 20:29:13', '2024-01-16 20:29:13'),
(1547, 66, 446, 'course_class', 2, '2024-01-16 20:29:40', '2024-01-16 20:29:40'),
(1548, 66, 446, 'course_class', 2, '2024-01-17 08:33:13', '2024-01-17 08:33:13'),
(1549, 66, 446, 'course_class', 2, '2024-01-17 08:38:44', '2024-01-17 08:38:44'),
(1550, 66, 446, 'course_class', 2, '2024-01-17 08:43:19', '2024-01-17 08:43:19'),
(1551, 66, 251, 'course_class', 2, '2024-01-17 09:00:04', '2024-01-17 09:00:04'),
(1552, 66, 251, 'course_class', 2, '2024-01-17 09:07:44', '2024-01-17 09:07:44'),
(1553, 66, 236, 'course_class', 2, '2024-01-17 09:09:06', '2024-01-17 09:09:06'),
(1554, 66, 236, 'course_class', 2, '2024-01-17 09:10:19', '2024-01-17 09:10:19'),
(1555, 66, 236, 'course_class', 2, '2024-01-17 09:13:07', '2024-01-17 09:13:07'),
(1556, 66, 469, 'course_class', 2, '2024-01-17 09:44:22', '2024-01-17 09:44:22'),
(1557, 66, 469, 'course_class', 2, '2024-01-17 09:45:05', '2024-01-17 09:45:05'),
(1558, 66, 470, 'course_class', 2, '2024-01-17 09:45:10', '2024-01-17 09:45:10'),
(1559, 66, 470, 'course_class', 2, '2024-01-17 09:54:05', '2024-01-17 09:54:05'),
(1560, 66, 470, 'course_class', 2, '2024-01-17 09:56:48', '2024-01-17 09:56:48'),
(1561, 66, 470, 'course_class', 2, '2024-01-17 10:08:30', '2024-01-17 10:08:30'),
(1562, 66, 470, 'course_class', 2, '2024-01-17 10:12:41', '2024-01-17 10:12:41'),
(1563, 66, 470, 'course_class', 2, '2024-01-17 10:21:49', '2024-01-17 10:21:49'),
(1564, 66, 470, 'course_class', 2, '2024-01-17 10:22:51', '2024-01-17 10:22:51'),
(1565, 66, 483, 'course_class', 2, '2024-01-17 10:23:01', '2024-01-17 10:23:01'),
(1566, 66, 483, 'course_class', 2, '2024-01-17 10:27:44', '2024-01-17 10:27:44'),
(1567, 66, 483, 'course_class', 2, '2024-01-17 10:32:37', '2024-01-17 10:32:37'),
(1568, 66, 483, 'course_class', 2, '2024-01-17 10:39:19', '2024-01-17 10:39:19'),
(1569, 66, 446, 'course_class', 2, '2024-01-17 10:43:10', '2024-01-17 10:43:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_class_module`
--

CREATE TABLE `course_class_module` (
  `id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `priority` int(11) NOT NULL COMMENT 'determine order of parent modules & child modules',
  `level` int(11) NOT NULL COMMENT 'determine level of module (1 = parent, 2 = submodule, 3 = child of submodule, etc)',
  `course_module_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_class_module`
--

INSERT INTO `course_class_module` (`id`, `start_date`, `end_date`, `priority`, `level`, `course_module_id`, `course_class_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, '2023-11-06 10:23:39', '2023-11-06 10:23:39', 2, 2, 362, 1, NULL, 1, '2023-11-06 16:27:48', 1, '2023-11-20 15:47:09', 1),
(2, '2023-11-06 10:23:39', '2023-11-06 10:23:39', 1, 1, 360, 1, NULL, 1, '2023-11-06 16:27:48', 1, '2023-11-20 15:47:11', 1),
(3, '2023-11-06 10:23:39', '2023-11-06 10:23:39', 1, 2, 361, 1, NULL, 1, '2023-11-06 16:27:48', 1, '2023-11-20 15:47:14', 1),
(8, '2023-11-09 07:31:58', '2023-11-09 07:31:58', 1, 1, 49, 4, NULL, 1, '2023-11-09 13:35:08', 1, '2023-11-20 15:47:46', 1),
(9, '2023-11-09 07:58:54', '2023-11-09 07:58:54', 2, 1, 51, 4, NULL, 1, '2023-11-09 13:59:18', 1, '2023-11-20 15:47:48', 1),
(10, '2023-11-09 07:59:54', '2023-11-09 07:59:54', 3, 1, 53, 4, NULL, 1, '2023-11-09 14:00:48', 1, '2023-11-20 15:47:50', 1),
(11, '2023-11-09 07:59:54', '2023-11-09 07:59:54', 4, 1, 55, 4, NULL, 1, '2023-11-09 14:00:48', 1, '2023-11-20 15:47:52', 1),
(12, '2023-11-09 07:59:54', '2023-11-09 07:59:54', 5, 1, 57, 4, NULL, 1, '2023-11-09 14:00:48', 1, '2023-11-20 15:47:54', 1),
(13, '2023-11-09 08:37:21', '2023-11-09 08:37:21', 1, 1, 21, 3, NULL, 1, '2023-11-09 14:38:28', 1, '2023-11-20 15:47:56', 1),
(14, '2023-11-09 08:37:21', '2023-11-09 08:37:21', 2, 1, 27, 3, NULL, 1, '2023-11-09 14:38:28', 1, '2023-11-20 15:47:59', 1),
(15, '2023-11-09 08:37:21', '2023-11-09 08:37:21', 3, 1, 33, 3, NULL, 1, '2023-11-09 14:38:28', 1, '2023-11-20 15:48:01', 1),
(16, '2023-11-09 08:37:21', '2023-11-09 08:37:21', 4, 1, 38, 3, NULL, 1, '2023-11-09 14:38:28', 1, '2023-11-20 15:48:02', 1),
(17, '2023-11-09 08:59:43', '2023-11-09 08:59:43', 1, 1, 59, 5, NULL, 1, '2023-11-09 15:00:51', 1, '2023-11-20 15:48:04', 1),
(18, '2023-11-09 08:59:43', '2023-11-09 08:59:43', 2, 1, 63, 5, NULL, 1, '2023-11-09 15:00:51', 1, '2023-11-20 15:48:06', 1),
(19, '2023-11-09 08:59:43', '2023-11-09 08:59:43', 3, 1, 67, 5, NULL, 1, '2023-11-09 15:00:51', 1, '2023-11-20 15:48:08', 1),
(20, '2023-11-09 10:13:54', '2024-11-27 16:14:13', 1, 2, 50, 4, NULL, 1, '2023-11-09 16:22:44', 1, '2023-11-09 16:22:44', 1),
(21, '2023-11-09 10:13:54', '2024-12-18 16:14:13', 2, 2, 52, 4, NULL, 1, '2023-11-09 16:22:44', 1, '2023-11-09 16:22:44', 1),
(22, '2023-11-09 10:13:54', '2024-11-13 16:14:13', 3, 2, 54, 4, NULL, 1, '2023-11-09 16:22:44', 1, '2023-11-09 16:22:44', 1),
(23, '2023-11-09 10:13:54', '2023-11-09 10:13:54', 4, 2, 56, 4, NULL, 1, '2023-11-09 16:22:44', 1, '2023-11-09 16:22:44', 1),
(24, '2023-11-09 10:13:54', '2024-11-13 16:14:13', 5, 2, 58, 4, NULL, 1, '2023-11-09 16:22:44', 1, '2023-11-09 16:22:44', 1),
(25, '2023-11-13 02:40:59', '2023-11-13 02:40:59', 1, 1, 69, 6, NULL, 1, '2023-11-13 08:41:23', 1, '2023-11-13 08:41:23', 1),
(26, '2023-11-13 02:44:20', '2023-11-13 02:44:20', 2, 1, 71, 6, NULL, 1, '2023-11-13 08:45:55', 1, '2023-11-13 08:45:55', 1),
(27, '2023-11-13 02:44:20', '2023-11-13 02:44:20', 3, 1, 74, 6, NULL, 1, '2023-11-13 08:45:55', 1, '2023-11-13 08:45:55', 1),
(28, '2023-11-13 02:44:20', '2023-11-13 02:44:20', 4, 1, 76, 6, NULL, 1, '2023-11-13 08:45:55', 1, '2023-11-13 08:45:55', 1),
(29, '2023-11-13 02:44:20', '2023-11-13 02:44:20', 5, 1, 78, 6, NULL, 1, '2023-11-13 08:45:55', 1, '2023-11-13 08:45:55', 1),
(30, '2023-11-13 02:44:20', '2023-11-13 02:44:20', 6, 1, 80, 6, NULL, 1, '2023-11-13 08:45:55', 1, '2023-11-13 08:45:55', 1),
(31, '2023-11-13 02:59:46', '2023-11-13 02:59:46', 1, 2, 72, 6, NULL, 1, '2023-11-13 09:00:14', 1, '2023-11-13 10:07:38', 1),
(32, '2023-11-13 02:59:46', '2023-11-13 02:59:46', 2, 2, 73, 6, NULL, 1, '2023-11-13 09:00:14', 1, '2023-11-13 10:07:40', 1),
(33, '2023-11-13 03:08:43', '2023-11-13 03:08:43', 1, 2, 70, 6, NULL, 1, '2023-11-13 09:10:22', 1, '2023-11-13 09:10:22', 1),
(34, '2023-11-13 03:08:43', '2023-11-13 03:08:43', 1, 2, 75, 6, NULL, 1, '2023-11-13 09:10:22', 1, '2023-11-13 10:07:58', 1),
(35, '2023-11-13 03:08:43', '2023-11-13 03:08:43', 1, 2, 77, 6, NULL, 1, '2023-11-13 09:10:22', 1, '2023-11-13 10:08:01', 1),
(36, '2023-11-13 03:08:43', '2023-11-13 03:08:43', 1, 2, 79, 6, NULL, 1, '2023-11-13 09:10:22', 1, '2023-11-13 10:08:07', 1),
(37, '2023-11-13 03:08:43', '2023-11-13 03:08:43', 1, 2, 81, 6, NULL, 1, '2023-11-13 09:10:22', 1, '2023-11-13 10:08:09', 1),
(38, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 1, 2, 22, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(39, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 2, 2, 23, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(40, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 3, 2, 24, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(41, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 4, 2, 25, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(42, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 5, 2, 26, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(43, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 1, 2, 28, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(44, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 2, 2, 29, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(45, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 3, 2, 30, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(46, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 4, 2, 31, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(47, '2023-11-13 04:08:26', '2023-11-13 04:08:26', 5, 2, 32, 3, NULL, 1, '2023-11-13 10:12:54', 1, '2023-11-13 10:12:54', 1),
(48, '2023-11-13 04:13:56', '2023-11-13 04:13:56', 1, 2, 34, 3, NULL, 1, '2023-11-13 10:15:11', 1, '2023-11-13 10:15:11', 1),
(49, '2023-11-13 04:13:56', '2023-11-13 04:13:56', 2, 2, 35, 3, NULL, 1, '2023-11-13 10:15:11', 1, '2023-11-13 10:15:11', 1),
(50, '2023-11-13 04:13:56', '2023-11-13 04:13:56', 3, 2, 36, 3, NULL, 1, '2023-11-13 10:15:11', 1, '2023-11-13 10:15:11', 1),
(51, '2023-11-13 04:13:56', '2023-11-13 04:13:56', 4, 2, 37, 3, NULL, 1, '2023-11-13 10:15:11', 1, '2023-11-13 10:15:11', 1),
(52, '2023-11-13 04:17:57', '2023-11-13 04:17:57', 1, 2, 39, 3, NULL, 1, '2023-11-13 10:20:33', 1, '2023-11-13 10:20:33', 1),
(53, '2023-11-13 04:17:57', '2023-11-13 04:17:57', 2, 2, 40, 3, NULL, 1, '2023-11-13 10:20:33', 1, '2023-11-13 10:20:33', 1),
(54, '2023-11-13 04:17:57', '2023-11-13 04:17:57', 3, 2, 41, 3, NULL, 1, '2023-11-13 10:20:33', 1, '2023-11-13 10:20:33', 1),
(55, '2023-11-13 04:17:57', '2023-11-13 04:17:57', 4, 2, 42, 3, NULL, 1, '2023-11-13 10:20:33', 1, '2023-11-13 10:20:33', 1),
(56, '2023-11-13 04:17:57', '2023-11-13 04:17:57', 5, 2, 43, 3, NULL, 1, '2023-11-13 10:20:33', 1, '2023-11-13 10:20:33', 1),
(57, '2023-11-13 10:16:58', '2023-11-13 10:16:58', 1, 2, 60, 5, NULL, 1, '2023-11-13 16:18:37', 1, '2023-11-13 16:18:37', 1),
(58, '2023-11-13 10:16:58', '2023-11-13 10:16:58', 2, 2, 61, 5, NULL, 1, '2023-11-13 16:18:37', 1, '2023-11-13 16:18:37', 1),
(59, '2023-11-13 10:16:58', '2023-11-13 10:16:58', 3, 2, 62, 5, NULL, 1, '2023-11-13 16:18:37', 1, '2023-11-13 16:18:37', 1),
(60, '2023-11-13 10:28:20', '2023-11-13 10:28:20', 1, 2, 64, 5, NULL, 1, '2023-11-13 16:29:43', 1, '2023-11-13 16:29:43', 1),
(61, '2023-11-13 10:28:20', '2023-11-13 10:28:20', 2, 2, 65, 5, NULL, 1, '2023-11-13 16:29:43', 1, '2023-11-13 16:29:43', 1),
(62, '2023-11-13 10:28:20', '2023-11-13 10:28:20', 3, 2, 66, 5, NULL, 1, '2023-11-13 16:29:43', 1, '2023-11-13 16:29:43', 1),
(63, '2023-11-13 10:28:20', '2023-11-13 10:28:20', 1, 2, 68, 5, NULL, 1, '2023-11-13 16:29:43', 1, '2023-11-13 16:29:43', 1),
(65, '2023-11-20 09:45:16', '2023-11-20 09:45:16', 2, 1, 363, 1, NULL, 1, '2023-11-20 15:46:16', 1, '2023-11-20 15:46:16', 1),
(66, '2023-11-20 09:48:13', '2023-11-20 09:48:13', 1, 2, 364, 1, NULL, 1, '2023-11-20 15:52:24', 1, '2023-11-20 15:52:24', 1),
(67, '2023-11-20 09:48:13', '2023-11-20 09:48:13', 2, 2, 365, 1, NULL, 1, '2023-11-20 15:52:24', 1, '2023-11-20 15:52:24', 1),
(68, '2023-11-20 09:53:44', '2023-11-20 09:53:44', 3, 1, 366, 1, NULL, 1, '2023-11-20 15:54:44', 1, '2023-11-20 15:54:44', 1),
(69, '2023-11-20 09:53:44', '2023-11-20 09:53:44', 1, 2, 367, 1, NULL, 1, '2023-11-20 15:54:44', 1, '2023-11-20 15:54:44', 1),
(70, '2023-11-20 09:53:44', '2023-11-20 09:53:44', 2, 2, 368, 1, NULL, 1, '2023-11-20 15:54:44', 1, '2023-11-20 15:54:44', 1),
(71, '2023-11-20 09:55:21', '2023-11-20 09:55:21', 4, 1, 369, 1, NULL, 1, '2023-11-20 15:58:16', 1, '2023-11-20 15:58:16', 1),
(72, '2023-11-20 09:55:21', '2023-11-20 09:55:21', 1, 2, 371, 1, NULL, 1, '2023-11-20 15:58:16', 1, '2023-11-20 15:58:16', 1),
(73, '2023-11-20 09:55:21', '2023-11-20 09:55:21', 2, 2, 372, 1, NULL, 1, '2023-11-20 15:58:16', 1, '2023-11-20 15:58:16', 1),
(74, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 5, 1, 373, 1, NULL, 1, '2023-11-20 15:59:38', 1, '2023-11-20 15:59:38', 1),
(75, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 1, 2, 374, 1, NULL, 1, '2023-11-20 15:59:38', 1, '2023-11-20 15:59:38', 1),
(76, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 2, 2, 375, 1, NULL, 1, '2023-11-20 15:59:38', 1, '2023-11-20 15:59:38', 1),
(77, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 3, 2, 376, 1, NULL, 1, '2023-11-20 15:59:38', 1, '2023-11-20 15:59:38', 1),
(78, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 6, 1, 377, 1, NULL, 1, '2023-11-20 16:01:18', 1, '2023-11-20 16:01:18', 1),
(79, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 1, 2, 378, 1, NULL, 1, '2023-11-20 16:01:18', 1, '2023-11-20 16:01:18', 1),
(80, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 2, 2, 379, 1, NULL, 1, '2023-11-20 16:01:18', 1, '2023-11-20 16:01:18', 1),
(81, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 3, 2, 380, 1, NULL, 1, '2023-11-20 16:01:18', 1, '2023-11-20 16:01:18', 1),
(82, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 7, 1, 381, 1, NULL, 1, '2023-11-20 16:02:41', 1, '2023-11-20 16:02:41', 1),
(83, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 1, 2, 382, 1, NULL, 1, '2023-11-20 16:02:41', 1, '2023-11-20 16:02:41', 1),
(84, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 2, 2, 383, 1, NULL, 1, '2023-11-20 16:02:41', 1, '2023-11-20 16:02:41', 1),
(85, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 3, 2, 384, 1, NULL, 1, '2023-11-20 16:02:41', 1, '2023-11-20 16:02:41', 1),
(86, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 8, 1, 385, 1, NULL, 1, '2023-11-20 16:04:25', 1, '2023-11-20 16:04:25', 1),
(87, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 1, 2, 386, 1, NULL, 1, '2023-11-20 16:04:25', 1, '2023-11-20 16:04:25', 1),
(88, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 2, 2, 387, 1, NULL, 1, '2023-11-20 16:04:25', 1, '2023-11-20 16:04:25', 1),
(89, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 3, 2, 388, 1, NULL, 1, '2023-11-20 16:04:25', 1, '2023-11-20 16:04:25', 1),
(90, '2023-11-20 10:04:27', '2023-11-20 10:04:27', 9, 1, 389, 1, NULL, 1, '2023-11-20 16:05:19', 1, '2023-11-20 16:05:19', 1),
(91, '2023-11-20 10:04:27', '2023-11-20 10:04:27', 1, 2, 390, 1, NULL, 1, '2023-11-20 16:05:19', 1, '2023-11-20 16:05:19', 1),
(92, '2023-11-20 10:04:27', '2023-11-20 10:04:27', 2, 2, 391, 1, NULL, 1, '2023-11-20 16:05:19', 1, '2023-11-20 16:05:19', 1),
(93, '2023-11-20 10:06:14', '2023-11-20 10:06:14', 10, 1, 392, 1, NULL, 1, '2023-11-20 16:07:13', 1, '2023-11-20 16:07:13', 1),
(94, '2023-11-20 10:06:14', '2023-11-20 10:06:14', 1, 2, 393, 1, NULL, 1, '2023-11-20 16:07:13', 1, '2023-11-20 16:07:13', 1),
(95, '2023-11-20 10:06:14', '2023-11-20 10:06:14', 2, 2, 394, 1, NULL, 1, '2023-11-20 16:07:13', 1, '2023-11-20 16:07:13', 1),
(96, '2023-11-20 10:07:20', '2023-11-20 10:07:20', 11, 1, 395, 1, NULL, 1, '2023-11-20 16:08:36', 1, '2023-11-20 16:08:36', 1),
(97, '2023-11-20 10:07:20', '2023-11-20 10:07:20', 1, 2, 396, 1, NULL, 1, '2023-11-20 16:08:36', 1, '2023-11-20 16:08:36', 1),
(98, '2023-11-20 10:07:20', '2023-11-20 10:07:20', 2, 2, 397, 1, NULL, 1, '2023-11-20 16:08:36', 1, '2023-11-20 16:13:57', 1),
(99, '2023-11-20 10:09:00', '2023-11-20 10:09:00', 12, 1, 398, 1, NULL, 1, '2023-11-20 16:10:00', 1, '2023-11-20 16:10:00', 1),
(100, '2023-11-20 10:09:00', '2023-11-20 10:09:00', 1, 2, 399, 1, NULL, 1, '2023-11-20 16:10:00', 1, '2023-11-20 16:10:00', 1),
(101, '2023-11-20 10:09:00', '2023-11-20 10:09:00', 2, 2, 400, 1, NULL, 1, '2023-11-20 16:10:00', 1, '2023-11-20 16:10:00', 1),
(102, '2023-11-20 00:00:00', '2023-11-20 00:00:00', 13, 1, 401, 1, NULL, 1, '2023-11-20 16:10:59', 1, '2024-01-11 07:57:25', 1),
(103, '2023-11-20 10:10:08', '2023-11-20 10:10:08', 1, 2, 402, 1, NULL, 1, '2023-11-20 16:10:59', 1, '2023-11-20 16:10:59', 1),
(104, '2023-11-20 10:10:08', '2023-11-20 10:10:08', 2, 2, 403, 1, NULL, 1, '2023-11-20 16:10:59', 1, '2023-11-20 16:10:59', 1),
(105, '2023-11-20 00:00:00', '2023-11-20 00:00:00', 1, 1, 405, 17, NULL, 1, '2023-11-20 16:35:42', 1, '2024-01-11 08:01:18', 1),
(106, '2023-11-20 10:34:37', '2023-11-20 10:34:37', 1, 2, 482, 17, NULL, 1, '2023-11-20 16:35:42', 1, '2023-11-20 16:35:42', 1),
(107, '2023-11-20 10:34:37', '2023-11-20 10:34:37', 2, 2, 483, 17, NULL, 1, '2023-11-20 16:35:42', 1, '2023-11-20 16:35:42', 1),
(108, '2023-11-20 00:00:00', '2023-11-20 00:00:00', 1, 1, 405, 17, NULL, 1, '2023-11-20 16:39:00', 1, '2024-01-11 08:02:41', 1),
(109, '2023-11-20 10:37:15', '2023-11-20 10:37:15', 1, 2, 485, 17, NULL, 1, '2023-11-20 16:39:00', 1, '2023-11-20 16:39:00', 1),
(110, '2023-11-20 10:37:15', '2023-11-20 10:37:15', 2, 2, 486, 17, NULL, 1, '2023-11-20 16:39:00', 1, '2023-11-20 16:39:00', 1),
(111, '2023-11-20 10:37:15', '2023-11-20 10:37:15', 3, 2, 487, 17, NULL, 1, '2023-11-20 16:39:00', 1, '2023-11-20 16:39:00', 1),
(112, '2023-11-20 10:37:15', '2023-11-20 10:37:15', 4, 2, 488, 17, NULL, 1, '2023-11-20 16:39:00', 1, '2023-11-20 16:39:00', 1),
(113, '2023-11-20 10:37:15', '2023-11-20 10:37:15', 5, 2, 489, 17, NULL, 1, '2023-11-20 16:39:00', 1, '2023-11-20 16:39:00', 1),
(114, '2023-11-20 10:39:29', '2023-11-20 10:39:29', 3, 1, 490, 17, NULL, 1, '2023-11-20 16:40:47', 1, '2023-11-20 16:40:47', 1),
(115, '2023-11-20 10:39:29', '2023-11-20 10:39:29', 1, 2, 491, 17, NULL, 1, '2023-11-20 16:40:47', 1, '2023-11-20 16:40:47', 1),
(116, '2023-11-20 10:39:29', '2023-11-20 10:39:29', 2, 2, 492, 17, NULL, 1, '2023-11-20 16:40:47', 1, '2023-11-20 16:40:47', 1),
(117, '2023-11-20 10:40:50', '2023-11-20 10:40:50', 4, 1, 493, 17, NULL, 1, '2023-11-20 16:42:14', 1, '2023-11-20 16:42:14', 1),
(118, '2023-11-20 10:40:50', '2023-11-20 10:40:50', 1, 2, 494, 17, NULL, 1, '2023-11-20 16:42:14', 1, '2023-11-20 16:42:14', 1),
(119, '2023-11-20 10:40:50', '2023-11-20 10:40:50', 2, 2, 495, 17, NULL, 1, '2023-11-20 16:42:14', 1, '2023-11-20 16:42:14', 1),
(120, '2023-11-20 10:40:50', '2023-11-20 10:40:50', 3, 2, 496, 17, NULL, 1, '2023-11-20 16:42:14', 1, '2023-11-20 16:42:14', 1),
(121, '2023-11-20 10:43:48', '2023-11-20 10:43:48', 1, 1, 600, 7, NULL, 1, '2023-11-20 16:45:29', 1, '2023-11-20 16:45:29', 1),
(122, '2023-11-20 10:43:48', '2023-11-20 10:43:48', 1, 2, 601, 7, NULL, 1, '2023-11-20 16:45:29', 1, '2023-11-20 16:45:29', 1),
(123, '2023-11-20 10:43:48', '2023-11-20 10:43:48', 2, 2, 603, 7, NULL, 1, '2023-11-20 16:45:29', 1, '2023-11-20 16:45:29', 1),
(124, '2023-11-20 10:43:48', '2023-11-20 10:43:48', 3, 2, 604, 7, NULL, 1, '2023-11-20 16:45:29', 1, '2023-11-20 16:45:29', 1),
(125, '2023-11-20 10:43:48', '2023-11-20 10:43:48', 4, 2, 605, 7, NULL, 1, '2023-11-20 16:45:29', 1, '2023-11-20 16:45:29', 1),
(126, '2023-11-20 10:45:44', '2023-11-20 10:45:44', 2, 1, 602, 7, NULL, 1, '2023-11-20 16:47:09', 1, '2023-11-20 16:47:09', 1),
(127, '2023-11-20 10:45:44', '2023-11-20 10:45:44', 1, 2, 608, 7, NULL, 1, '2023-11-20 16:47:09', 1, '2023-11-20 16:47:09', 1),
(128, '2023-11-20 10:45:44', '2023-11-20 10:45:44', 2, 2, 609, 7, NULL, 1, '2023-11-20 16:47:09', 1, '2023-11-20 16:47:09', 1),
(129, '2023-11-20 10:45:44', '2023-11-20 10:45:44', 3, 2, 610, 7, NULL, 1, '2023-11-20 16:47:09', 1, '2023-11-20 16:47:09', 1),
(130, '2023-11-20 10:45:44', '2023-11-20 10:45:44', 4, 2, 611, 7, NULL, 1, '2023-11-20 16:47:09', 1, '2023-11-20 16:47:09', 1),
(131, '2023-11-20 10:47:24', '2023-11-20 10:47:24', 3, 1, 613, 7, NULL, 1, '2023-11-20 16:48:35', 1, '2023-11-20 16:48:35', 1),
(132, '2023-11-20 10:47:24', '2023-11-20 10:47:24', 1, 2, 615, 7, NULL, 1, '2023-11-20 16:48:35', 1, '2023-11-20 16:48:35', 1),
(133, '2023-11-20 10:47:24', '2023-11-20 10:47:24', 2, 2, 616, 7, NULL, 1, '2023-11-20 16:48:35', 1, '2023-11-20 16:48:35', 1),
(134, '2023-11-20 10:48:41', '2023-11-20 10:48:41', 4, 1, 618, 7, NULL, 1, '2023-11-20 16:49:36', 1, '2023-11-20 16:49:36', 1),
(135, '2023-11-20 10:48:41', '2023-11-20 10:48:41', 1, 2, 619, 7, NULL, 1, '2023-11-20 16:49:36', 1, '2023-11-20 16:49:36', 1),
(136, '2023-11-20 10:48:41', '2023-11-20 10:48:41', 2, 2, 620, 7, NULL, 1, '2023-11-20 16:49:36', 1, '2023-11-20 16:49:36', 1),
(137, '2023-11-20 10:49:38', '2023-11-20 10:49:38', 5, 1, 623, 7, NULL, 1, '2023-11-20 16:51:37', 1, '2023-11-20 16:51:37', 1),
(138, '2023-11-20 10:49:38', '2023-11-20 10:49:38', 1, 2, 627, 7, NULL, 1, '2023-11-20 16:51:37', 1, '2023-11-20 16:51:37', 1),
(139, '2023-11-20 10:49:38', '2023-11-20 10:49:38', 2, 2, 668, 7, NULL, 1, '2023-11-20 16:51:37', 1, '2023-11-20 16:51:37', 1),
(140, '2023-11-20 10:49:38', '2023-11-20 10:49:38', 3, 2, 669, 7, NULL, 1, '2023-11-20 16:51:37', 1, '2023-11-20 16:51:37', 1),
(141, '2023-11-20 10:49:38', '2023-11-20 10:49:38', 4, 2, 670, 7, NULL, 1, '2023-11-20 16:51:37', 1, '2023-11-20 16:51:37', 1),
(142, '2023-11-06 10:23:39', '2023-11-06 10:23:39', 2, 2, 362, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(143, '2023-11-06 10:23:39', '2023-11-06 10:23:39', 1, 1, 360, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(144, '2023-11-06 10:23:39', '2023-11-06 10:23:39', 1, 2, 361, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(149, '2023-11-20 09:45:16', '2023-11-20 09:45:16', 2, 1, 363, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(150, '2023-11-20 09:48:13', '2023-11-20 09:48:13', 1, 2, 364, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(151, '2023-11-20 09:48:13', '2023-11-20 09:48:13', 2, 2, 365, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(152, '2023-11-20 09:53:44', '2023-11-20 09:53:44', 3, 1, 366, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(153, '2023-11-20 09:53:44', '2023-11-20 09:53:44', 1, 2, 367, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(154, '2023-11-20 09:53:44', '2023-11-20 09:53:44', 2, 2, 368, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(155, '2023-11-20 09:55:21', '2023-11-20 09:55:21', 4, 1, 369, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(156, '2023-11-20 09:55:21', '2023-11-20 09:55:21', 1, 2, 371, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(157, '2023-11-20 09:55:21', '2023-11-20 09:55:21', 2, 2, 372, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(158, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 5, 1, 373, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(159, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 1, 2, 374, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(160, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 2, 2, 375, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(161, '2023-11-20 09:58:34', '2023-11-20 09:58:34', 3, 2, 376, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(162, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 6, 1, 377, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(163, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 1, 2, 378, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(164, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 2, 2, 379, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(165, '2023-11-20 10:00:18', '2023-11-20 10:00:18', 3, 2, 380, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(166, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 7, 1, 381, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(167, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 1, 2, 382, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(168, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 2, 2, 383, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(169, '2023-11-20 10:01:21', '2023-11-20 10:01:21', 3, 2, 384, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(170, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 8, 1, 385, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(171, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 1, 2, 386, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(172, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 2, 2, 387, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(173, '2023-11-20 10:03:13', '2023-11-20 10:03:13', 3, 2, 388, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(174, '2023-11-20 10:04:27', '2023-11-20 10:04:27', 9, 1, 389, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(175, '2023-11-20 10:04:27', '2023-11-20 10:04:27', 1, 2, 390, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(176, '2023-11-20 10:04:27', '2023-11-20 10:04:27', 2, 2, 391, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(177, '2023-11-20 10:06:14', '2023-11-20 10:06:14', 10, 1, 392, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(178, '2023-11-20 10:06:14', '2023-11-20 10:06:14', 1, 2, 393, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(179, '2023-11-20 10:06:14', '2023-11-20 10:06:14', 2, 2, 394, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(180, '2023-11-20 10:07:20', '2023-11-20 10:07:20', 11, 1, 395, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(181, '2023-11-20 10:07:20', '2023-11-20 10:07:20', 1, 2, 396, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(182, '2023-11-20 10:07:20', '2023-11-20 10:07:20', 2, 2, 397, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(183, '2023-11-20 10:09:00', '2023-11-20 10:09:00', 12, 1, 398, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(184, '2023-11-20 10:09:00', '2023-11-20 10:09:00', 1, 2, 399, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(185, '2023-11-20 10:09:00', '2023-11-20 10:09:00', 2, 2, 400, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(186, '2023-11-20 10:10:08', '2023-11-20 10:10:08', 13, 1, 401, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(187, '2023-11-20 10:10:08', '2023-11-20 10:10:08', 1, 2, 402, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(188, '2023-11-20 10:10:08', '2023-11-20 10:10:08', 2, 2, 403, 31, NULL, 1, '2023-11-24 02:15:42', 1, '2023-11-24 02:15:42', 1),
(189, '2024-01-11 00:00:00', '2024-01-12 00:00:00', 1, 1, 405, 17, 'Hallo', 1, '2024-01-11 08:05:58', 1, '2024-01-11 08:05:58', 1),
(190, '2024-01-11 00:00:00', '2024-01-11 00:00:00', 7, 7, 419, 17, '<p>HAHAY</p>', 0, '2024-01-11 08:09:22', 1, '2024-01-11 08:09:52', 1),
(191, '2024-01-11 00:00:00', '2024-01-12 00:00:00', 10, 1, 427, 17, '<p>Test</p>', 0, '2024-01-11 08:11:02', 1, '2024-01-11 08:11:02', 1),
(192, '2024-01-12 08:55:28', '2024-01-12 08:55:28', 1, 1, 360, 32, NULL, 1, '2024-01-12 14:56:32', 1, '2024-01-12 14:56:32', 1),
(193, '2024-01-12 08:58:23', '2024-01-12 08:58:23', 1, 2, 361, 32, NULL, 1, '2024-01-12 15:01:41', 1, '2024-01-12 15:01:41', 1),
(194, '2024-01-12 09:05:00', '2024-01-12 09:05:00', 2, 2, 362, 32, NULL, 1, '2024-01-12 15:06:13', 1, '2024-01-12 15:06:13', 1),
(195, '2024-01-12 10:35:52', '2024-01-12 10:35:52', 2, 1, 363, 32, NULL, 1, '2024-01-12 16:36:20', 1, '2024-01-12 16:36:20', 1),
(196, '2024-01-12 10:36:50', '2024-01-12 10:36:50', 1, 2, 364, 32, NULL, 1, '2024-01-12 16:39:47', 1, '2024-01-12 16:39:47', 1),
(197, '2024-01-12 10:36:50', '2024-01-12 10:36:50', 2, 2, 365, 32, NULL, 1, '2024-01-12 16:39:47', 1, '2024-01-12 16:39:47', 1),
(198, '2024-01-13 01:34:28', '2024-01-13 01:34:28', 3, 1, 366, 32, NULL, 1, '2024-01-13 07:41:00', 1, '2024-01-13 07:41:00', 1),
(199, '2024-01-13 02:04:35', '2024-01-13 02:04:35', 1, 2, 747, 32, NULL, 1, '2024-01-13 08:05:20', 1, '2024-01-13 08:05:20', 1),
(200, '2024-01-13 02:06:52', '2024-01-13 02:06:52', 2, 1, 748, 32, NULL, 1, '2024-01-13 08:07:20', 1, '2024-01-13 08:07:20', 1),
(201, '2024-01-13 02:16:11', '2024-01-13 02:16:11', 3, 2, 749, 32, NULL, 1, '2024-01-13 08:20:18', 1, '2024-01-13 08:20:18', 1),
(202, '2024-01-13 02:16:11', '2024-01-13 02:16:11', 4, 2, 750, 32, NULL, 1, '2024-01-13 08:20:18', 1, '2024-01-13 08:20:18', 1),
(203, '2024-01-13 02:26:43', '2024-01-13 02:26:43', 5, 2, 751, 32, NULL, 1, '2024-01-13 08:27:34', 1, '2024-01-13 08:27:34', 1),
(204, '2024-01-13 02:26:43', '2024-01-13 02:26:43', 6, 2, 752, 32, NULL, 1, '2024-01-13 08:27:34', 1, '2024-01-13 08:27:34', 1),
(205, '2024-01-13 02:30:48', '2024-01-13 02:30:48', 7, 2, 753, 32, NULL, 1, '2024-01-13 08:31:37', 1, '2024-01-13 08:31:37', 1),
(206, '2024-01-13 02:30:48', '2024-01-13 02:30:48', 8, 2, 754, 32, NULL, 1, '2024-01-13 08:31:37', 1, '2024-01-13 08:31:37', 1),
(207, '2024-01-13 02:34:09', '2024-01-13 02:34:09', 4, 1, 369, 32, NULL, 1, '2024-01-13 08:35:19', 1, '2024-01-13 08:35:19', 1),
(208, '2024-01-13 02:41:51', '2024-01-13 02:41:51', 1, 2, 755, 32, NULL, 1, '2024-01-13 08:42:33', 1, '2024-01-13 08:42:33', 1),
(209, '2024-01-13 02:41:51', '2024-01-13 02:41:51', 2, 2, 756, 32, NULL, 1, '2024-01-13 08:42:33', 1, '2024-01-13 08:42:33', 1),
(210, '2024-01-13 02:45:29', '2024-01-13 02:45:29', 3, 2, 757, 32, NULL, 1, '2024-01-13 08:46:11', 1, '2024-01-13 08:46:11', 1),
(211, '2024-01-13 02:45:30', '2024-01-13 02:45:30', 4, 2, 758, 32, NULL, 1, '2024-01-13 08:46:11', 1, '2024-01-13 08:46:11', 1),
(212, '2024-01-13 02:49:31', '2024-01-13 02:49:31', 5, 2, 759, 32, NULL, 1, '2024-01-13 08:50:28', 1, '2024-01-13 08:50:28', 1),
(213, '2024-01-13 02:49:31', '2024-01-13 02:49:31', 6, 2, 760, 32, NULL, 1, '2024-01-13 08:50:28', 1, '2024-01-13 08:50:28', 1),
(214, '2024-01-13 02:53:41', '2024-01-13 02:53:41', 7, 2, 761, 32, NULL, 1, '2024-01-13 08:54:13', 1, '2024-01-13 08:54:13', 1),
(215, '2024-01-13 02:53:41', '2024-01-13 02:53:41', 8, 2, 762, 32, NULL, 1, '2024-01-13 08:54:13', 1, '2024-01-13 08:54:13', 1),
(216, '2024-01-13 02:56:47', '2024-01-13 02:56:47', 9, 2, 763, 32, NULL, 1, '2024-01-13 08:57:28', 1, '2024-01-13 08:57:28', 1),
(217, '2024-01-13 02:56:47', '2024-01-13 02:56:47', 10, 2, 764, 32, NULL, 1, '2024-01-13 08:57:28', 1, '2024-01-13 08:57:28', 1),
(218, '2024-01-13 02:57:59', '2024-01-13 02:57:59', 5, 1, 373, 32, NULL, 1, '2024-01-13 08:59:10', 1, '2024-01-13 08:59:10', 1),
(219, '2024-01-13 03:00:56', '2024-01-13 03:00:56', 1, 2, 765, 32, NULL, 1, '2024-01-13 09:01:15', 1, '2024-01-13 09:01:15', 1),
(220, '2024-01-13 03:01:41', '2024-01-13 03:01:41', 6, 1, 377, 32, NULL, 1, '2024-01-13 09:02:37', 1, '2024-01-13 09:02:37', 1),
(221, '2024-01-13 03:02:53', '2024-01-13 03:02:53', 1, 2, 374, 32, NULL, 1, '2024-01-13 09:08:17', 1, '2024-01-13 09:08:17', 1),
(222, '2024-01-13 03:14:32', '2024-01-13 03:14:32', 2, 2, 770, 32, NULL, 1, '2024-01-13 09:14:51', 1, '2024-01-13 09:14:51', 1),
(223, '2024-01-13 03:15:19', '2024-01-13 03:15:19', 7, 1, 381, 32, NULL, 1, '2024-01-13 09:16:10', 1, '2024-01-13 09:16:10', 1),
(224, '2024-01-13 03:19:39', '2024-01-13 03:19:39', 1, 2, 771, 32, NULL, 1, '2024-01-13 09:20:38', 1, '2024-01-13 09:20:38', 1),
(225, '2024-01-13 03:19:39', '2024-01-13 03:19:39', 2, 2, 772, 32, NULL, 1, '2024-01-13 09:20:38', 1, '2024-01-13 09:20:38', 1),
(226, '2024-01-13 03:22:42', '2024-01-13 03:22:42', 8, 1, 385, 32, NULL, 1, '2024-01-13 09:23:27', 1, '2024-01-13 09:23:27', 1),
(227, '2024-01-13 03:23:44', '2024-01-13 03:23:44', 1, 2, 387, 32, NULL, 0, '2024-01-13 09:26:18', 1, '2024-01-13 09:29:14', 1),
(228, '2024-01-13 03:23:44', '2024-01-13 03:23:44', 2, 2, 388, 32, NULL, 1, '2024-01-13 09:26:18', 1, '2024-01-13 09:26:18', 1),
(229, '2024-01-13 03:23:44', '2024-01-13 03:23:44', 1, 2, 386, 32, NULL, 1, '2024-01-13 09:27:30', 1, '2024-01-13 09:27:30', 1),
(231, '2024-01-13 03:30:33', '2024-01-13 03:30:33', 8, 1, 389, 32, NULL, 1, '2024-01-13 09:31:07', 1, '2024-01-13 09:31:07', 1),
(232, '2024-01-13 03:31:49', '2024-01-13 03:31:49', 1, 2, 378, 32, NULL, 1, '2024-01-13 09:33:56', 1, '2024-01-13 09:33:56', 1),
(233, '2024-01-13 03:31:49', '2024-01-13 03:31:49', 2, 2, 380, 32, NULL, 1, '2024-01-13 09:33:56', 1, '2024-01-13 09:33:56', 1),
(234, '2024-01-13 03:41:24', '2024-01-13 03:41:24', 10, 1, 773, 32, NULL, 1, '2024-01-13 09:41:44', 1, '2024-01-13 09:45:20', 1),
(235, '2024-01-13 03:45:50', '2024-01-13 03:45:50', 11, 1, 774, 32, NULL, 1, '2024-01-13 09:47:28', 1, '2024-01-13 09:47:28', 1),
(236, '2024-01-13 03:50:56', '2024-01-13 03:50:56', 1, 2, 775, 32, NULL, 1, '2024-01-13 09:51:51', 1, '2024-01-13 09:51:51', 1),
(237, '2024-01-13 03:50:56', '2024-01-13 03:50:56', 2, 2, 776, 32, NULL, 1, '2024-01-13 09:51:51', 1, '2024-01-13 09:51:51', 1),
(238, '2024-01-13 03:54:23', '2024-01-13 03:54:23', 12, 1, 779, 32, NULL, 1, '2024-01-13 09:54:48', 1, '2024-01-13 09:54:48', 1),
(239, '2024-01-13 03:56:53', '2024-01-13 03:56:53', 1, 2, 780, 32, NULL, 1, '2024-01-13 09:57:25', 1, '2024-01-13 09:57:25', 1),
(240, '2024-01-13 03:56:53', '2024-01-13 03:56:53', 2, 2, 781, 32, NULL, 1, '2024-01-13 09:57:25', 1, '2024-01-13 09:57:25', 1),
(241, '2024-01-13 03:58:45', '2024-01-13 03:58:45', 13, 1, 782, 32, NULL, 1, '2024-01-13 09:59:04', 1, '2024-01-13 09:59:04', 1),
(242, '2024-01-13 03:59:27', '2024-01-13 03:59:27', 1, 2, 783, 32, NULL, 1, '2024-01-13 10:04:04', 1, '2024-01-13 10:04:04', 1),
(243, '2024-01-13 03:59:27', '2024-01-13 03:59:27', 2, 2, 784, 32, NULL, 1, '2024-01-13 10:04:04', 1, '2024-01-13 10:04:04', 1),
(244, '2024-01-13 04:07:48', '2024-01-13 04:07:48', 14, 1, 785, 32, NULL, 1, '2024-01-13 10:08:57', 1, '2024-01-13 10:08:57', 1),
(245, '2024-01-13 04:11:08', '2024-01-13 04:11:08', 1, 2, 786, 32, NULL, 1, '2024-01-13 10:11:43', 1, '2024-01-13 10:11:43', 1),
(246, '2024-01-13 04:11:08', '2024-01-13 04:11:08', 2, 2, 787, 32, NULL, 1, '2024-01-13 10:11:43', 1, '2024-01-13 10:11:43', 1),
(247, '2024-01-13 04:12:53', '2024-01-13 04:12:53', 15, 1, 788, 32, NULL, 1, '2024-01-13 10:13:14', 1, '2024-01-13 10:13:14', 1),
(248, '2024-01-13 04:15:56', '2024-01-13 04:15:56', 1, 2, 789, 32, NULL, 1, '2024-01-13 10:16:27', 1, '2024-01-13 10:16:27', 1),
(249, '2024-01-13 04:15:56', '2024-01-13 04:15:56', 2, 2, 790, 32, NULL, 1, '2024-01-13 10:16:27', 1, '2024-01-13 10:16:27', 1),
(250, '2024-01-13 04:19:25', '2024-01-13 04:19:25', 16, 1, 791, 32, NULL, 1, '2024-01-13 10:19:53', 1, '2024-01-13 10:19:53', 1),
(251, '2024-01-13 04:19:25', '2024-01-13 04:19:25', 1, 2, 792, 32, NULL, 1, '2024-01-13 10:19:53', 1, '2024-01-13 10:19:53', 1),
(252, '2024-01-13 04:21:10', '2024-01-13 04:21:10', 2, 2, 793, 32, NULL, 1, '2024-01-13 10:21:28', 1, '2024-01-13 10:21:28', 1),
(253, '2024-01-13 04:29:07', '2024-01-13 04:29:07', 17, 1, 794, 32, NULL, 1, '2024-01-13 10:29:40', 1, '2024-01-13 10:29:40', 1),
(254, '2024-01-13 04:29:07', '2024-01-13 04:29:07', 1, 2, 795, 32, NULL, 1, '2024-01-13 10:29:40', 1, '2024-01-13 10:29:40', 1),
(255, '2024-01-13 04:31:36', '2024-01-13 04:31:36', 2, 2, 796, 32, NULL, 1, '2024-01-13 10:31:51', 1, '2024-01-13 10:31:51', 1),
(256, '2024-01-13 04:33:21', '2024-01-13 04:33:21', 18, 1, 797, 32, NULL, 1, '2024-01-13 10:33:42', 1, '2024-01-13 10:33:42', 1),
(257, '2024-01-13 04:33:53', '2024-01-13 04:33:53', 1, 2, 798, 32, NULL, 1, '2024-01-13 10:38:16', 1, '2024-01-13 10:38:16', 1),
(258, '2024-01-13 04:33:53', '2024-01-13 04:33:53', 2, 2, 799, 32, NULL, 1, '2024-01-13 10:38:16', 1, '2024-01-13 10:38:16', 1),
(259, '2024-01-13 06:32:16', '2024-01-13 06:32:16', 19, 1, 800, 32, NULL, 1, '2024-01-13 12:33:28', 1, '2024-01-13 12:33:28', 1),
(260, '2024-01-13 06:32:16', '2024-01-13 06:32:16', 1, 2, 801, 32, NULL, 1, '2024-01-13 12:33:28', 1, '2024-01-13 12:33:28', 1),
(261, '2024-01-13 06:32:16', '2024-01-13 06:32:16', 2, 2, 802, 32, NULL, 1, '2024-01-13 12:33:28', 1, '2024-01-13 12:33:28', 1),
(262, '2024-01-13 06:35:06', '2024-01-13 06:35:06', 20, 1, 803, 32, NULL, 1, '2024-01-13 12:35:23', 1, '2024-01-13 16:18:54', 1),
(263, '2024-01-13 06:37:55', '2024-01-13 06:37:55', 21, 1, 804, 32, NULL, 1, '2024-01-13 12:38:14', 1, '2024-01-13 12:38:14', 1),
(264, '2024-01-13 06:42:20', '2024-01-13 06:42:20', 1, 2, 805, 32, NULL, 1, '2024-01-13 12:42:40', 1, '2024-01-13 12:42:40', 1),
(265, '2024-01-13 06:43:14', '2024-01-13 06:43:14', 22, 1, 806, 32, NULL, 1, '2024-01-13 12:46:55', 1, '2024-01-13 12:46:55', 1),
(266, '2024-01-13 06:43:15', '2024-01-13 06:43:15', 1, 2, 807, 32, NULL, 1, '2024-01-13 12:46:55', 1, '2024-01-13 12:46:55', 1),
(267, '2024-01-13 06:49:11', '2024-01-13 06:49:11', 23, 1, 808, 32, NULL, 1, '2024-01-13 12:49:40', 1, '2024-01-13 12:49:40', 1),
(268, '2024-01-13 06:49:11', '2024-01-13 06:49:11', 1, 2, 809, 32, NULL, 1, '2024-01-13 12:49:40', 1, '2024-01-13 12:49:40', 1),
(269, '2024-01-13 06:51:31', '2024-01-13 06:51:31', 24, 1, 810, 32, NULL, 1, '2024-01-13 12:52:01', 1, '2024-01-13 12:52:01', 1),
(270, '2024-01-13 06:51:31', '2024-01-13 06:51:31', 1, 2, 811, 32, NULL, 1, '2024-01-13 12:52:01', 1, '2024-01-13 12:52:01', 1),
(271, '2024-01-13 06:53:24', '2024-01-13 06:53:24', 25, 1, 812, 32, NULL, 1, '2024-01-13 12:53:41', 1, '2024-01-13 12:53:41', 1),
(272, '2024-01-13 06:57:27', '2024-01-13 06:57:27', 26, 1, 813, 32, NULL, 1, '2024-01-13 12:57:43', 1, '2024-01-13 12:57:43', 1),
(273, '2024-01-13 06:57:54', '2024-01-13 06:57:54', 1, 2, 814, 32, NULL, 1, '2024-01-13 12:58:09', 1, '2024-01-13 12:58:09', 1),
(274, '2024-01-13 06:58:20', '2024-01-13 06:58:20', 2, 2, 815, 32, NULL, 1, '2024-01-13 12:58:33', 1, '2024-01-13 12:58:33', 1),
(275, '2024-01-13 07:02:35', '2024-01-13 07:02:35', 27, 1, 816, 32, NULL, 1, '2024-01-13 13:03:15', 1, '2024-01-13 13:03:15', 1),
(276, '2024-01-13 07:02:35', '2024-01-13 07:02:35', 1, 2, 817, 32, NULL, 1, '2024-01-13 13:03:15', 1, '2024-01-13 13:03:15', 1),
(277, '2024-01-13 07:02:35', '2024-01-13 07:02:35', 2, 2, 818, 32, NULL, 1, '2024-01-13 13:03:15', 1, '2024-01-13 13:03:15', 1),
(278, '2024-01-13 07:06:37', '2024-01-13 07:06:37', 28, 1, 819, 32, NULL, 1, '2024-01-13 13:07:27', 1, '2024-01-13 13:07:27', 1),
(279, '2024-01-13 07:06:37', '2024-01-13 07:06:37', 1, 2, 820, 32, NULL, 1, '2024-01-13 13:07:27', 1, '2024-01-13 13:07:27', 1),
(280, '2024-01-13 07:06:37', '2024-01-13 07:06:37', 2, 2, 821, 32, NULL, 1, '2024-01-13 13:07:27', 1, '2024-01-13 13:07:27', 1),
(281, '2024-01-13 07:11:17', '2024-01-13 07:11:17', 29, 1, 822, 32, NULL, 1, '2024-01-13 13:12:01', 1, '2024-01-13 13:12:01', 1),
(282, '2024-01-13 07:11:17', '2024-01-13 07:11:17', 1, 2, 823, 32, NULL, 1, '2024-01-13 13:12:01', 1, '2024-01-13 13:12:01', 1),
(283, '2024-01-13 07:11:17', '2024-01-13 07:11:17', 2, 2, 824, 32, NULL, 1, '2024-01-13 13:12:01', 1, '2024-01-13 13:12:01', 1),
(284, '2024-01-13 07:14:45', '2024-01-13 07:14:45', 30, 1, 825, 32, NULL, 1, '2024-01-13 13:14:58', 1, '2024-01-13 13:14:58', 1),
(285, '2024-01-13 07:18:55', '2024-01-13 07:18:55', 31, 1, 826, 32, NULL, 1, '2024-01-13 13:19:46', 1, '2024-01-13 13:19:46', 1),
(286, '2024-01-13 07:18:56', '2024-01-13 07:18:56', 1, 2, 827, 32, NULL, 1, '2024-01-13 13:19:46', 1, '2024-01-13 13:19:46', 1),
(287, '2024-01-13 07:18:56', '2024-01-13 07:18:56', 2, 2, 828, 32, NULL, 1, '2024-01-13 13:19:46', 1, '2024-01-13 13:20:50', 1),
(288, '2024-01-13 07:23:54', '2024-01-13 07:23:54', 32, 1, 829, 32, NULL, 1, '2024-01-13 13:24:35', 1, '2024-01-13 13:24:35', 1),
(289, '2024-01-13 07:23:54', '2024-01-13 07:23:54', 1, 2, 830, 32, NULL, 1, '2024-01-13 13:24:35', 1, '2024-01-13 13:24:35', 1),
(290, '2024-01-13 07:23:54', '2024-01-13 07:23:54', 2, 2, 831, 32, NULL, 1, '2024-01-13 13:24:35', 1, '2024-01-13 13:24:35', 1),
(291, '2024-01-13 07:27:27', '2024-01-13 07:27:27', 33, 1, 832, 32, NULL, 1, '2024-01-13 13:28:01', 1, '2024-01-13 13:28:01', 1),
(292, '2024-01-13 07:27:27', '2024-01-13 07:27:27', 1, 2, 833, 32, NULL, 1, '2024-01-13 13:28:01', 1, '2024-01-13 13:28:01', 1),
(293, '2024-01-13 07:30:55', '2024-01-13 07:30:55', 2, 2, 834, 32, NULL, 1, '2024-01-13 13:31:29', 1, '2024-01-13 13:31:29', 1),
(294, '2024-01-13 07:30:55', '2024-01-13 07:30:55', 3, 2, 835, 32, NULL, 1, '2024-01-13 13:31:29', 1, '2024-01-13 13:31:29', 1),
(295, '2024-01-13 07:36:20', '2024-01-13 07:36:20', 34, 1, 836, 32, NULL, 1, '2024-01-13 13:37:03', 1, '2024-01-13 13:37:03', 1),
(296, '2024-01-13 07:36:20', '2024-01-13 07:36:20', 1, 2, 837, 32, NULL, 1, '2024-01-13 13:37:03', 1, '2024-01-13 13:37:03', 1),
(297, '2024-01-13 07:36:20', '2024-01-13 07:36:20', 2, 2, 838, 32, NULL, 1, '2024-01-13 13:37:03', 1, '2024-01-13 13:37:03', 1),
(298, '2024-01-13 07:40:01', '2024-01-13 07:40:01', 35, 1, 839, 32, NULL, 1, '2024-01-13 13:40:18', 1, '2024-01-13 13:40:18', 1),
(299, '2024-01-13 07:45:46', '2024-01-13 07:45:46', 36, 1, 840, 32, NULL, 1, '2024-01-13 13:46:56', 1, '2024-01-13 13:46:56', 1),
(300, '2024-01-13 07:45:46', '2024-01-13 07:45:46', 1, 2, 841, 32, NULL, 1, '2024-01-13 13:46:56', 1, '2024-01-13 13:46:56', 1),
(301, '2024-01-13 07:45:46', '2024-01-13 07:45:46', 2, 2, 842, 32, NULL, 1, '2024-01-13 13:46:56', 1, '2024-01-13 13:46:56', 1),
(302, '2024-01-13 07:45:46', '2024-01-13 07:45:46', 3, 2, 843, 32, NULL, 1, '2024-01-13 13:46:56', 1, '2024-01-13 13:46:56', 1),
(303, '2024-01-13 07:54:04', '2024-01-13 07:54:04', 37, 1, 844, 32, NULL, 1, '2024-01-13 13:54:38', 1, '2024-01-13 13:54:38', 1),
(304, '2024-01-13 07:54:04', '2024-01-13 07:54:04', 1, 2, 845, 32, NULL, 1, '2024-01-13 13:54:38', 1, '2024-01-13 13:54:38', 1),
(305, '2024-01-13 07:58:01', '2024-01-13 07:58:01', 2, 2, 846, 32, NULL, 1, '2024-01-13 13:58:40', 1, '2024-01-13 13:58:40', 1),
(306, '2024-01-13 07:58:01', '2024-01-13 07:58:01', 3, 2, 847, 32, NULL, 1, '2024-01-13 13:58:40', 1, '2024-01-13 13:58:40', 1),
(307, '2024-01-13 08:02:53', '2024-01-13 08:02:53', 4, 2, 848, 32, NULL, 1, '2024-01-13 14:04:16', 1, '2024-01-13 14:04:16', 1),
(308, '2024-01-13 08:02:53', '2024-01-13 08:02:53', 5, 2, 849, 32, NULL, 1, '2024-01-13 14:04:16', 1, '2024-01-13 14:04:16', 1),
(309, '2024-01-13 08:02:53', '2024-01-13 08:02:53', 6, 2, 850, 32, NULL, 1, '2024-01-13 14:04:16', 1, '2024-01-13 14:04:16', 1),
(310, '2024-01-13 08:07:07', '2024-01-13 08:07:07', 38, 1, 851, 32, NULL, 1, '2024-01-13 14:07:58', 1, '2024-01-13 14:07:58', 1),
(311, '2024-01-13 08:07:07', '2024-01-13 08:07:07', 39, 1, 852, 32, NULL, 1, '2024-01-13 14:07:58', 1, '2024-01-13 14:07:58', 1),
(312, '2024-01-13 08:08:57', '2024-01-13 08:08:57', 40, 1, 853, 32, NULL, 1, '2024-01-13 14:09:17', 1, '2024-01-13 14:09:17', 1),
(313, '2024-01-13 08:10:59', '2024-01-13 08:10:59', 41, 1, 854, 32, NULL, 1, '2024-01-13 14:11:21', 1, '2024-01-13 14:11:21', 1),
(314, '2024-01-13 10:06:57', '2024-01-13 10:06:57', 42, 1, 855, 32, NULL, 1, '2024-01-13 16:07:36', 1, '2024-01-13 16:07:36', 1),
(315, '2024-01-13 10:06:57', '2024-01-13 10:06:57', 1, 2, 856, 32, NULL, 1, '2024-01-13 16:07:36', 1, '2024-01-13 16:07:36', 1),
(316, '2024-01-13 10:09:51', '2024-01-13 10:09:51', 43, 1, 857, 32, NULL, 1, '2024-01-13 16:10:31', 1, '2024-01-13 16:10:31', 1),
(317, '2024-01-13 10:09:51', '2024-01-13 10:09:51', 1, 2, 858, 32, NULL, 1, '2024-01-13 16:10:31', 1, '2024-01-13 16:10:31', 1),
(318, '2024-01-13 10:12:39', '2024-01-13 10:12:39', 44, 1, 859, 32, NULL, 1, '2024-01-13 16:13:08', 1, '2024-01-13 16:13:08', 1),
(319, '2024-01-13 10:12:39', '2024-01-13 10:12:39', 1, 2, 860, 32, NULL, 1, '2024-01-13 16:13:08', 1, '2024-01-13 16:13:08', 1),
(320, '2024-01-13 10:14:58', '2024-01-13 10:14:58', 45, 1, 861, 32, NULL, 1, '2024-01-13 16:15:31', 1, '2024-01-13 16:15:31', 1),
(321, '2024-01-13 10:14:58', '2024-01-13 10:14:58', 1, 2, 862, 32, NULL, 1, '2024-01-13 16:15:31', 1, '2024-01-13 16:15:31', 1),
(322, '2024-01-15 05:05:48', '2024-01-15 05:05:48', 1, 1, 863, 33, NULL, 1, '2024-01-15 11:15:28', 1, '2024-01-15 11:15:28', 1),
(323, '2024-01-15 05:05:48', '2024-01-15 05:05:48', 1, 2, 864, 33, NULL, 1, '2024-01-15 11:15:28', 1, '2024-01-15 11:15:28', 1),
(324, '2024-01-15 05:05:48', '2024-01-15 05:05:48', 2, 2, 865, 33, NULL, 1, '2024-01-15 11:15:28', 1, '2024-01-15 11:15:28', 1),
(325, '2024-01-15 07:07:14', '2024-01-15 07:07:14', 1, 1, 866, 33, NULL, 1, '2024-01-15 13:13:56', 1, '2024-01-15 13:13:56', 1),
(326, '2024-01-15 07:07:14', '2024-01-15 07:07:14', 1, 2, 867, 33, NULL, 1, '2024-01-15 13:13:56', 1, '2024-01-15 13:13:56', 1),
(327, '2024-01-15 07:21:02', '2024-01-15 07:21:02', 2, 2, 868, 33, NULL, 1, '2024-01-15 13:21:44', 1, '2024-01-15 13:21:44', 1),
(328, '2024-01-15 07:21:02', '2024-01-15 07:21:02', 3, 2, 869, 33, NULL, 1, '2024-01-15 13:21:44', 1, '2024-01-15 13:21:44', 1),
(329, '2024-01-15 07:25:50', '2024-01-15 07:25:50', 4, 2, 870, 33, NULL, 1, '2024-01-15 13:26:22', 1, '2024-01-15 13:26:22', 1),
(330, '2024-01-15 07:25:50', '2024-01-15 07:25:50', 5, 2, 871, 33, NULL, 1, '2024-01-15 13:26:22', 1, '2024-01-15 13:26:22', 1),
(331, '2024-01-15 07:29:16', '2024-01-15 07:29:16', 6, 2, 872, 33, NULL, 1, '2024-01-15 13:29:54', 1, '2024-01-15 13:29:54', 1),
(332, '2024-01-15 07:29:17', '2024-01-15 07:29:17', 7, 2, 873, 33, NULL, 1, '2024-01-15 13:29:54', 1, '2024-01-15 13:29:54', 1),
(333, '2024-01-15 07:34:48', '2024-01-15 07:34:48', 3, 1, 874, 33, NULL, 1, '2024-01-15 13:35:38', 1, '2024-01-15 13:35:38', 1),
(334, '2024-01-15 07:34:49', '2024-01-15 07:34:49', 1, 2, 875, 33, NULL, 1, '2024-01-15 13:35:38', 1, '2024-01-15 13:35:38', 1),
(335, '2024-01-15 07:44:40', '2024-01-15 07:44:40', 2, 2, 876, 33, NULL, 1, '2024-01-15 13:46:03', 1, '2024-01-15 13:46:03', 1),
(336, '2024-01-15 07:44:40', '2024-01-15 07:44:40', 3, 2, 877, 33, NULL, 1, '2024-01-15 13:46:03', 1, '2024-01-15 13:46:03', 1),
(337, '2024-01-15 07:44:40', '2024-01-15 07:44:40', 4, 2, 878, 33, NULL, 1, '2024-01-15 13:46:03', 1, '2024-01-15 13:46:03', 1),
(338, '2024-01-15 07:52:54', '2024-01-15 07:52:54', 5, 2, 879, 33, NULL, 1, '2024-01-15 13:53:53', 1, '2024-01-15 13:53:53', 1),
(339, '2024-01-15 07:52:54', '2024-01-15 07:52:54', 6, 2, 880, 33, NULL, 1, '2024-01-15 13:53:53', 1, '2024-01-15 13:53:53', 1),
(340, '2024-01-15 07:52:54', '2024-01-15 07:52:54', 7, 2, 881, 33, NULL, 1, '2024-01-15 13:53:53', 1, '2024-01-15 13:53:53', 1),
(341, '2024-01-15 08:00:25', '2024-01-15 08:00:25', 4, 1, 882, 33, NULL, 1, '2024-01-15 14:01:15', 1, '2024-01-15 14:01:15', 1),
(342, '2024-01-15 08:00:25', '2024-01-15 08:00:25', 1, 2, 883, 33, NULL, 1, '2024-01-15 14:01:15', 1, '2024-01-15 14:01:15', 1),
(343, '2024-01-15 08:00:25', '2024-01-15 08:00:25', 2, 2, 884, 33, NULL, 1, '2024-01-15 14:01:15', 1, '2024-01-15 14:01:15', 1),
(344, '2024-01-15 08:04:43', '2024-01-15 08:04:43', 3, 2, 885, 33, NULL, 1, '2024-01-15 14:05:18', 1, '2024-01-15 14:05:18', 1),
(345, '2024-01-15 08:04:43', '2024-01-15 08:04:43', 4, 2, 886, 33, NULL, 1, '2024-01-15 14:05:18', 1, '2024-01-15 14:05:18', 1),
(346, '2024-01-15 08:09:25', '2024-01-15 08:09:25', 5, 2, 887, 33, NULL, 1, '2024-01-15 14:10:17', 1, '2024-01-15 14:10:17', 1),
(347, '2024-01-15 08:09:25', '2024-01-15 08:09:25', 6, 2, 888, 33, NULL, 1, '2024-01-15 14:10:17', 1, '2024-01-15 14:10:17', 1),
(348, '2024-01-15 08:09:25', '2024-01-15 08:09:25', 7, 2, 889, 33, NULL, 1, '2024-01-15 14:10:17', 1, '2024-01-15 14:10:17', 1),
(349, '2024-01-15 08:15:19', '2024-01-15 08:15:19', 5, 1, 890, 33, NULL, 1, '2024-01-15 14:16:11', 1, '2024-01-15 14:16:11', 1),
(350, '2024-01-15 08:15:19', '2024-01-15 08:15:19', 1, 2, 891, 33, NULL, 1, '2024-01-15 14:16:11', 1, '2024-01-15 14:16:11', 1),
(351, '2024-01-15 08:22:56', '2024-01-15 08:22:56', 6, 1, 892, 33, NULL, 1, '2024-01-15 14:23:46', 1, '2024-01-15 14:23:46', 1),
(352, '2024-01-15 08:22:56', '2024-01-15 08:22:56', 1, 2, 893, 33, NULL, 1, '2024-01-15 14:23:46', 1, '2024-01-15 14:23:46', 1),
(353, '2024-01-15 08:22:56', '2024-01-15 08:22:56', 2, 2, 894, 33, NULL, 1, '2024-01-15 14:23:46', 1, '2024-01-15 14:23:46', 1),
(354, '2024-01-15 08:28:34', '2024-01-15 08:28:34', 3, 2, 895, 33, NULL, 1, '2024-01-15 14:29:10', 1, '2024-01-15 14:29:10', 1),
(355, '2024-01-15 08:28:34', '2024-01-15 08:28:34', 4, 2, 896, 33, NULL, 1, '2024-01-15 14:29:10', 1, '2024-01-15 14:29:10', 1),
(356, '2024-01-15 08:41:18', '2024-01-15 08:41:18', 7, 1, 897, 33, NULL, 1, '2024-01-15 14:42:17', 1, '2024-01-15 14:42:17', 1),
(357, '2024-01-15 08:41:18', '2024-01-15 08:41:18', 1, 2, 898, 33, NULL, 1, '2024-01-15 14:42:17', 1, '2024-01-15 14:42:17', 1),
(358, '2024-01-15 08:41:18', '2024-01-15 08:41:18', 2, 2, 899, 33, NULL, 1, '2024-01-15 14:42:17', 1, '2024-01-15 14:42:17', 1),
(359, '2024-01-15 08:48:59', '2024-01-15 08:48:59', 3, 2, 900, 33, NULL, 1, '2024-01-15 14:49:31', 1, '2024-01-15 14:49:31', 1),
(360, '2024-01-15 08:48:59', '2024-01-15 08:48:59', 4, 2, 901, 33, NULL, 1, '2024-01-15 14:49:31', 1, '2024-01-15 14:49:31', 1),
(361, '2024-01-15 08:54:46', '2024-01-15 08:54:46', 5, 2, 902, 33, NULL, 1, '2024-01-15 14:55:35', 1, '2024-01-15 14:55:35', 1),
(362, '2024-01-15 08:54:46', '2024-01-15 08:54:46', 6, 2, 903, 33, NULL, 1, '2024-01-15 14:55:35', 1, '2024-01-15 14:55:35', 1),
(363, '2024-01-15 08:54:46', '2024-01-15 08:54:46', 7, 2, 904, 33, NULL, 1, '2024-01-15 14:55:35', 1, '2024-01-15 14:55:35', 1),
(364, '2024-01-15 09:00:48', '2024-01-15 09:00:48', 8, 1, 905, 33, NULL, 1, '2024-01-15 15:01:33', 1, '2024-01-15 15:01:33', 1),
(365, '2024-01-15 09:00:48', '2024-01-15 09:00:48', 1, 2, 906, 33, NULL, 1, '2024-01-15 15:01:33', 1, '2024-01-15 15:01:33', 1),
(366, '2024-01-15 09:00:48', '2024-01-15 09:00:48', 2, 2, 907, 33, NULL, 1, '2024-01-15 15:01:33', 1, '2024-01-15 15:01:33', 1),
(367, '2024-01-15 09:06:58', '2024-01-15 09:06:58', 9, 1, 908, 33, NULL, 1, '2024-01-15 15:08:14', 1, '2024-01-15 15:08:14', 1),
(368, '2024-01-15 09:06:58', '2024-01-15 09:06:58', 1, 2, 909, 33, NULL, 1, '2024-01-15 15:08:14', 1, '2024-01-15 15:08:14', 1),
(369, '2024-01-15 09:06:58', '2024-01-15 09:06:58', 2, 2, 910, 33, NULL, 1, '2024-01-15 15:08:14', 1, '2024-01-15 15:08:14', 1),
(370, '2024-01-15 09:09:38', '2024-01-15 09:09:38', 3, 2, 911, 33, NULL, 1, '2024-01-15 15:10:04', 1, '2024-01-15 15:10:04', 1),
(371, '2024-01-15 09:11:31', '2024-01-15 09:11:31', 10, 1, 912, 33, NULL, 1, '2024-01-15 15:11:46', 1, '2024-01-15 15:11:46', 1),
(372, '2024-01-15 09:23:02', '2024-01-15 09:23:02', 11, 1, 913, 33, NULL, 1, '2024-01-15 15:23:43', 1, '2024-01-15 15:23:43', 1),
(373, '2024-01-15 09:23:02', '2024-01-15 09:23:02', 1, 2, 914, 33, NULL, 1, '2024-01-15 15:23:43', 1, '2024-01-15 15:23:43', 1),
(374, '2024-01-15 09:23:02', '2024-01-15 09:23:02', 2, 2, 915, 33, NULL, 1, '2024-01-15 15:23:43', 1, '2024-01-15 15:23:43', 1),
(375, '2024-01-15 09:28:27', '2024-01-15 09:28:27', 12, 1, 916, 33, NULL, 1, '2024-01-15 15:29:17', 1, '2024-01-15 15:29:17', 1),
(376, '2024-01-15 09:28:27', '2024-01-15 09:28:27', 1, 2, 917, 33, NULL, 1, '2024-01-15 15:29:17', 1, '2024-01-15 15:29:17', 1),
(377, '2024-01-15 09:28:27', '2024-01-15 09:28:27', 2, 2, 918, 33, NULL, 1, '2024-01-15 15:29:17', 1, '2024-01-15 15:29:17', 1),
(378, '2024-01-15 09:38:46', '2024-01-15 09:38:46', 13, 1, 919, 33, NULL, 1, '2024-01-15 16:17:21', 1, '2024-01-15 16:17:21', 1),
(379, '2024-01-15 09:38:46', '2024-01-15 09:38:46', 1, 2, 920, 33, NULL, 1, '2024-01-15 16:17:21', 1, '2024-01-15 16:17:21', 1),
(380, '2024-01-15 09:38:46', '2024-01-15 09:38:46', 2, 2, 921, 33, NULL, 1, '2024-01-15 16:17:21', 1, '2024-01-15 16:17:21', 1),
(381, '2024-01-15 10:21:24', '2024-01-15 10:21:24', 14, 1, 922, 33, NULL, 1, '2024-01-15 16:22:13', 1, '2024-01-15 16:22:13', 1),
(382, '2024-01-15 10:21:24', '2024-01-15 10:21:24', 1, 2, 923, 33, NULL, 1, '2024-01-15 16:22:13', 1, '2024-01-15 16:22:13', 1),
(383, '2024-01-15 10:21:24', '2024-01-15 10:21:24', 2, 2, 924, 33, NULL, 1, '2024-01-15 16:22:13', 1, '2024-01-15 16:23:15', 1),
(384, '2024-01-15 10:26:32', '2024-01-15 10:26:32', 15, 1, 925, 33, NULL, 1, '2024-01-15 16:27:21', 1, '2024-01-15 16:27:21', 1),
(385, '2024-01-15 10:26:32', '2024-01-15 10:26:32', 1, 2, 926, 33, NULL, 1, '2024-01-15 16:27:21', 1, '2024-01-15 16:27:21', 1),
(386, '2024-01-15 10:26:32', '2024-01-15 10:26:32', 2, 2, 927, 33, NULL, 1, '2024-01-15 16:27:21', 1, '2024-01-15 16:27:21', 1),
(387, '2024-01-15 10:30:41', '2024-01-15 10:30:41', 16, 1, 928, 33, NULL, 1, '2024-01-15 16:31:26', 1, '2024-01-15 16:31:26', 1),
(388, '2024-01-15 10:30:42', '2024-01-15 10:30:42', 1, 2, 929, 33, NULL, 1, '2024-01-15 16:31:26', 1, '2024-01-15 16:31:26', 1),
(389, '2024-01-15 10:30:42', '2024-01-15 10:30:42', 2, 2, 930, 33, NULL, 1, '2024-01-15 16:31:26', 1, '2024-01-15 16:31:26', 1),
(390, '2024-01-15 10:34:57', '2024-01-15 10:34:57', 17, 1, 931, 33, NULL, 1, '2024-01-15 16:35:41', 1, '2024-01-15 16:35:41', 1),
(391, '2024-01-15 10:34:57', '2024-01-15 10:34:57', 1, 2, 932, 33, NULL, 1, '2024-01-15 16:35:41', 1, '2024-01-15 16:35:41', 1),
(392, '2024-01-15 10:34:57', '2024-01-15 10:34:57', 2, 2, 933, 33, NULL, 1, '2024-01-15 16:35:41', 1, '2024-01-15 16:35:41', 1),
(393, '2024-01-15 10:40:47', '2024-01-15 10:40:47', 18, 1, 934, 33, NULL, 1, '2024-01-15 16:41:49', 1, '2024-01-15 16:41:49', 1),
(394, '2024-01-15 10:40:48', '2024-01-15 10:40:48', 1, 2, 935, 33, NULL, 1, '2024-01-15 16:41:49', 1, '2024-01-15 16:41:49', 1),
(395, '2024-01-15 10:40:48', '2024-01-15 10:40:48', 2, 2, 936, 33, NULL, 1, '2024-01-15 16:41:49', 1, '2024-01-15 16:41:49', 1),
(396, '2024-01-15 10:40:48', '2024-01-15 10:40:48', 3, 2, 937, 33, NULL, 1, '2024-01-15 16:41:49', 1, '2024-01-15 16:41:49', 1),
(397, '2024-01-15 10:48:55', '2024-01-15 10:48:55', 19, 1, 938, 33, NULL, 1, '2024-01-15 16:50:02', 1, '2024-01-15 16:50:02', 1),
(398, '2024-01-15 10:48:55', '2024-01-15 10:48:55', 1, 2, 939, 33, NULL, 1, '2024-01-15 16:50:02', 1, '2024-01-15 16:50:02', 1),
(399, '2024-01-15 10:48:55', '2024-01-15 10:48:55', 2, 2, 940, 33, NULL, 1, '2024-01-15 16:50:02', 1, '2024-01-15 16:50:02', 1),
(400, '2024-01-15 10:51:34', '2024-01-15 10:51:34', 20, 1, 941, 33, NULL, 1, '2024-01-15 16:51:54', 1, '2024-01-15 16:51:54', 1),
(401, '2024-01-15 10:58:31', '2024-01-15 10:58:31', 21, 1, 942, 33, NULL, 1, '2024-01-15 17:00:26', 1, '2024-01-15 17:00:26', 1),
(402, '2024-01-15 10:58:31', '2024-01-15 10:58:31', 1, 2, 943, 33, NULL, 1, '2024-01-15 17:00:26', 1, '2024-01-15 17:00:26', 1),
(403, '2024-01-15 10:58:31', '2024-01-15 10:58:31', 22, 1, 944, 33, NULL, 1, '2024-01-15 17:00:26', 1, '2024-01-15 17:00:26', 1);
INSERT INTO `course_class_module` (`id`, `start_date`, `end_date`, `priority`, `level`, `course_module_id`, `course_class_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(404, '2024-01-15 10:58:31', '2024-01-15 10:58:31', 1, 2, 945, 33, NULL, 1, '2024-01-15 17:00:26', 1, '2024-01-15 17:00:26', 1),
(405, '2024-01-16 02:21:05', '2024-01-16 02:21:05', 23, 1, 946, 33, NULL, 1, '2024-01-16 08:23:28', 1, '2024-01-16 08:23:28', 1),
(406, '2024-01-16 02:21:05', '2024-01-16 02:21:05', 1, 2, 947, 33, NULL, 1, '2024-01-16 08:23:28', 1, '2024-01-16 08:23:28', 1),
(407, '2024-01-16 02:30:25', '2024-01-16 02:30:25', 24, 1, 948, 33, NULL, 1, '2024-01-16 08:31:14', 1, '2024-01-16 08:31:14', 1),
(408, '2024-01-16 02:30:25', '2024-01-16 02:30:25', 1, 2, 949, 33, NULL, 1, '2024-01-16 08:31:14', 1, '2024-01-16 08:31:14', 1),
(409, '2024-01-16 02:32:07', '2024-01-16 02:32:07', 25, 1, 950, 33, NULL, 1, '2024-01-16 08:32:25', 1, '2024-01-16 08:32:25', 1),
(410, '2024-01-16 02:40:43', '2024-01-16 02:40:43', 26, 1, 951, 33, NULL, 1, '2024-01-16 08:41:34', 1, '2024-01-16 08:41:34', 1),
(411, '2024-01-16 02:40:43', '2024-01-16 02:40:43', 1, 2, 952, 33, NULL, 1, '2024-01-16 08:41:34', 1, '2024-01-16 08:41:34', 1),
(412, '2024-01-16 02:40:43', '2024-01-16 02:40:43', 2, 2, 953, 33, NULL, 1, '2024-01-16 08:41:34', 1, '2024-01-16 08:41:34', 1),
(413, '2024-01-16 02:49:11', '2024-01-16 02:49:11', 27, 1, 954, 33, NULL, 1, '2024-01-16 08:49:54', 1, '2024-01-16 08:49:54', 1),
(414, '2024-01-16 02:49:11', '2024-01-16 02:49:11', 1, 2, 955, 33, NULL, 1, '2024-01-16 08:49:54', 1, '2024-01-16 08:49:54', 1),
(415, '2024-01-16 02:49:11', '2024-01-16 02:49:11', 2, 2, 956, 33, NULL, 1, '2024-01-16 08:49:54', 1, '2024-01-16 08:49:54', 1),
(416, '2024-01-16 02:59:52', '2024-01-16 02:59:52', 28, 1, 957, 33, NULL, 1, '2024-01-16 09:00:45', 1, '2024-01-16 09:00:45', 1),
(417, '2024-01-16 02:59:52', '2024-01-16 02:59:52', 1, 2, 958, 33, NULL, 1, '2024-01-16 09:00:45', 1, '2024-01-16 09:00:45', 1),
(418, '2024-01-16 02:59:52', '2024-01-16 02:59:52', 2, 2, 959, 33, NULL, 1, '2024-01-16 09:00:45', 1, '2024-01-16 09:00:45', 1),
(419, '2024-01-16 09:11:50', '2024-01-16 09:11:50', 29, 1, 960, 33, NULL, 1, '2024-01-16 15:16:49', 1, '2024-01-16 15:16:49', 1),
(420, '2024-01-16 09:11:50', '2024-01-16 09:11:50', 1, 2, 961, 33, NULL, 1, '2024-01-16 15:16:49', 1, '2024-01-16 15:16:49', 1),
(421, '2024-01-16 09:11:50', '2024-01-16 09:11:50', 2, 2, 962, 33, NULL, 1, '2024-01-16 15:16:49', 1, '2024-01-16 15:16:49', 1),
(422, '2024-01-16 09:20:38', '2024-01-16 09:20:38', 30, 1, 963, 33, NULL, 1, '2024-01-16 15:20:56', 1, '2024-01-16 15:20:56', 1),
(423, '2024-01-16 09:23:56', '2024-01-16 09:23:56', 31, 1, 964, 33, NULL, 1, '2024-01-16 15:25:37', 1, '2024-01-16 15:25:37', 1),
(424, '2024-01-16 09:23:56', '2024-01-16 09:23:56', 1, 2, 965, 33, NULL, 1, '2024-01-16 15:25:37', 1, '2024-01-16 15:25:37', 1),
(425, '2024-01-16 09:23:56', '2024-01-16 09:23:56', 2, 2, 966, 33, NULL, 1, '2024-01-16 15:25:37', 1, '2024-01-16 15:25:37', 1),
(426, '2024-01-16 09:43:40', '2024-01-16 09:43:40', 32, 1, 967, 33, NULL, 1, '2024-01-16 15:46:26', 1, '2024-01-16 15:46:26', 1),
(427, '2024-01-16 09:43:40', '2024-01-16 09:43:40', 1, 2, 968, 33, NULL, 1, '2024-01-16 15:46:26', 1, '2024-01-16 15:46:26', 1),
(428, '2024-01-16 09:43:40', '2024-01-16 09:43:40', 2, 2, 969, 33, NULL, 1, '2024-01-16 15:46:26', 1, '2024-01-16 15:46:26', 1),
(429, '2024-01-16 09:51:09', '2024-01-16 09:51:09', 33, 1, 970, 33, NULL, 1, '2024-01-16 15:52:11', 1, '2024-01-16 15:52:11', 1),
(430, '2024-01-16 09:51:10', '2024-01-16 09:51:10', 1, 2, 971, 33, NULL, 1, '2024-01-16 15:52:11', 1, '2024-01-16 15:52:11', 1),
(431, '2024-01-16 09:51:10', '2024-01-16 09:51:10', 2, 2, 972, 33, NULL, 1, '2024-01-16 15:52:11', 1, '2024-01-16 15:52:11', 1),
(432, '2024-01-16 09:57:26', '2024-01-16 09:57:26', 34, 1, 973, 33, NULL, 1, '2024-01-16 15:59:08', 1, '2024-01-16 15:59:08', 1),
(433, '2024-01-16 09:57:26', '2024-01-16 09:57:26', 1, 2, 974, 33, NULL, 1, '2024-01-16 15:59:08', 1, '2024-01-16 15:59:08', 1),
(434, '2024-01-16 09:57:26', '2024-01-16 09:57:26', 2, 2, 975, 33, NULL, 1, '2024-01-16 15:59:08', 1, '2024-01-16 15:59:08', 1),
(435, '2024-01-16 10:12:03', '2024-01-16 10:12:03', 35, 1, 976, 33, NULL, 1, '2024-01-16 16:12:26', 1, '2024-01-16 16:12:26', 1),
(436, '2024-01-16 10:33:22', '2024-01-16 10:33:22', 36, 1, 977, 33, NULL, 1, '2024-01-16 16:34:02', 1, '2024-01-16 16:34:02', 1),
(437, '2024-01-16 10:33:22', '2024-01-16 10:33:22', 1, 2, 978, 33, NULL, 1, '2024-01-16 16:34:02', 1, '2024-01-16 16:34:02', 1),
(438, '2024-01-16 10:33:22', '2024-01-16 10:33:22', 2, 2, 979, 33, NULL, 1, '2024-01-16 16:34:02', 1, '2024-01-16 16:34:02', 1),
(439, '2024-01-16 10:42:30', '2024-01-16 10:42:30', 37, 1, 980, 33, NULL, 1, '2024-01-16 16:43:30', 1, '2024-01-16 16:43:30', 1),
(440, '2024-01-16 10:42:30', '2024-01-16 10:42:30', 1, 2, 981, 33, NULL, 1, '2024-01-16 16:43:30', 1, '2024-01-16 16:43:30', 1),
(441, '2024-01-16 10:42:30', '2024-01-16 10:42:30', 2, 2, 982, 33, NULL, 1, '2024-01-16 16:43:30', 1, '2024-01-16 16:43:30', 1),
(442, '2024-01-16 10:42:30', '2024-01-16 10:42:30', 3, 2, 983, 33, NULL, 1, '2024-01-16 16:43:30', 1, '2024-01-16 16:43:30', 1),
(443, '2024-01-16 10:50:02', '2024-01-16 10:50:02', 38, 1, 984, 33, NULL, 1, '2024-01-16 16:51:42', 1, '2024-01-16 16:53:52', 1),
(444, '2024-01-16 10:50:02', '2024-01-16 10:50:02', 1, 2, 985, 33, NULL, 1, '2024-01-16 16:51:42', 1, '2024-01-16 16:53:59', 1),
(445, '2024-01-16 10:50:02', '2024-01-16 10:50:02', 2, 2, 986, 33, NULL, 1, '2024-01-16 16:51:42', 1, '2024-01-16 16:54:06', 1),
(446, '2024-01-16 10:50:02', '2024-01-16 10:50:02', 3, 2, 987, 33, NULL, 1, '2024-01-16 16:51:42', 1, '2024-01-16 16:54:12', 1),
(447, '2024-01-16 10:50:02', '2024-01-16 10:50:02', 4, 2, 988, 33, NULL, 1, '2024-01-16 16:51:42', 1, '2024-01-16 16:54:18', 1),
(448, '2024-01-16 11:00:00', '2024-01-16 11:00:00', 39, 1, 989, 33, NULL, 1, '2024-01-16 17:02:00', 1, '2024-01-16 17:02:00', 1),
(449, '2024-01-16 11:00:00', '2024-01-16 11:00:00', 1, 2, 990, 33, NULL, 1, '2024-01-16 17:02:00', 1, '2024-01-16 17:02:00', 1),
(450, '2024-01-16 11:00:00', '2024-01-16 11:00:00', 2, 2, 991, 33, NULL, 1, '2024-01-16 17:02:00', 1, '2024-01-16 17:02:00', 1),
(451, '2024-01-16 11:00:00', '2024-01-16 11:00:00', 3, 2, 992, 33, NULL, 1, '2024-01-16 17:02:00', 1, '2024-01-16 17:02:00', 1),
(452, '2024-01-16 13:05:10', '2024-01-16 13:05:10', 40, 1, 993, 33, NULL, 1, '2024-01-16 19:06:11', 1, '2024-01-16 19:06:11', 1),
(453, '2024-01-16 13:12:24', '2024-01-16 13:12:24', 41, 1, 994, 33, NULL, 1, '2024-01-16 19:13:08', 1, '2024-01-16 19:13:08', 1),
(454, '2024-01-16 13:12:24', '2024-01-16 13:12:24', 1, 2, 995, 33, NULL, 1, '2024-01-16 19:13:08', 1, '2024-01-16 19:13:08', 1),
(455, '2024-01-16 13:12:24', '2024-01-16 13:12:24', 2, 2, 996, 33, NULL, 1, '2024-01-16 19:13:08', 1, '2024-01-16 19:13:08', 1),
(456, '2024-01-16 13:15:15', '2024-01-16 13:15:15', 42, 1, 997, 33, NULL, 1, '2024-01-16 19:15:42', 1, '2024-01-16 19:15:42', 1),
(457, '2024-01-16 13:15:15', '2024-01-16 13:15:15', 1, 2, 998, 33, NULL, 1, '2024-01-16 19:15:42', 1, '2024-01-16 19:15:42', 1),
(458, '2024-01-16 13:17:37', '2024-01-16 13:17:37', 43, 1, 999, 33, NULL, 1, '2024-01-16 19:18:10', 1, '2024-01-16 19:18:10', 1),
(459, '2024-01-16 13:17:37', '2024-01-16 13:17:37', 1, 2, 1000, 33, NULL, 1, '2024-01-16 19:18:10', 1, '2024-01-16 19:18:10', 1),
(460, '2024-01-16 13:22:55', '2024-01-16 13:22:55', 44, 1, 1001, 33, NULL, 1, '2024-01-16 19:23:41', 1, '2024-01-16 19:23:41', 1),
(461, '2024-01-16 13:22:55', '2024-01-16 13:22:55', 1, 2, 1002, 33, NULL, 1, '2024-01-16 19:23:41', 1, '2024-01-16 19:23:41', 1),
(462, '2024-01-16 13:22:55', '2024-01-16 13:22:55', 45, 1, 1003, 33, NULL, 1, '2024-01-16 19:23:41', 1, '2024-01-16 19:23:41', 1),
(463, '2024-01-16 13:24:07', '2024-01-16 13:24:07', 1, 2, 1004, 33, NULL, 1, '2024-01-16 19:24:17', 1, '2024-01-16 19:24:17', 1),
(464, '2024-01-17 02:19:54', '2024-01-17 02:19:54', 1, 2, 1005, 33, NULL, 1, '2024-01-17 08:31:05', 1, '2024-01-17 08:31:05', 1),
(465, '2024-01-17 02:19:54', '2024-01-17 02:19:54', 1, 2, 1006, 33, NULL, 1, '2024-01-17 08:31:05', 1, '2024-01-17 08:31:05', 1),
(466, '2024-01-17 02:32:54', '2024-01-17 02:32:54', 1, 2, 1007, 33, NULL, 1, '2024-01-17 08:33:04', 1, '2024-01-17 08:33:04', 1),
(467, '2024-01-17 02:38:19', '2024-01-17 02:38:19', 1, 2, 1008, 33, NULL, 1, '2024-01-17 08:38:40', 1, '2024-01-17 08:38:40', 1),
(468, '2024-01-17 03:42:01', '2024-01-17 03:42:01', 1, 1, 1009, 34, NULL, 1, '2024-01-17 09:42:39', 1, '2024-01-17 09:42:39', 1),
(469, '2024-01-17 03:42:01', '2024-01-17 03:42:01', 1, 2, 1010, 34, NULL, 1, '2024-01-17 09:42:39', 1, '2024-01-17 09:42:39', 1),
(470, '2024-01-17 03:44:47', '2024-01-17 03:44:47', 2, 2, 1011, 34, NULL, 1, '2024-01-17 09:45:01', 1, '2024-01-17 09:45:01', 1),
(471, '2024-01-17 03:52:56', '2024-01-17 03:52:56', 2, 1, 1012, 34, NULL, 1, '2024-01-17 09:54:00', 1, '2024-01-17 09:54:00', 1),
(472, '2024-01-17 03:52:56', '2024-01-17 03:52:56', 1, 2, 1013, 34, NULL, 1, '2024-01-17 09:54:00', 1, '2024-01-17 09:54:00', 1),
(473, '2024-01-17 03:52:56', '2024-01-17 03:52:56', 2, 2, 1014, 34, NULL, 1, '2024-01-17 09:54:00', 1, '2024-01-17 09:54:00', 1),
(474, '2024-01-17 03:56:02', '2024-01-17 03:56:02', 3, 1, 1015, 34, NULL, 1, '2024-01-17 09:56:43', 1, '2024-01-17 09:56:43', 1),
(475, '2024-01-17 03:56:02', '2024-01-17 03:56:02', 1, 2, 1016, 34, NULL, 1, '2024-01-17 09:56:43', 1, '2024-01-17 09:56:43', 1),
(476, '2024-01-17 04:07:32', '2024-01-17 04:07:32', 4, 1, 1017, 34, NULL, 1, '2024-01-17 10:08:23', 1, '2024-01-17 10:08:23', 1),
(477, '2024-01-17 04:07:33', '2024-01-17 04:07:33', 1, 2, 1018, 34, NULL, 1, '2024-01-17 10:08:23', 1, '2024-01-17 10:08:23', 1),
(478, '2024-01-17 04:07:33', '2024-01-17 04:07:33', 2, 2, 1019, 34, NULL, 1, '2024-01-17 10:08:23', 1, '2024-01-17 10:08:23', 1),
(479, '2024-01-17 04:11:51', '2024-01-17 04:11:51', 5, 1, 1020, 34, NULL, 1, '2024-01-17 10:12:34', 1, '2024-01-17 10:12:34', 1),
(480, '2024-01-17 04:11:52', '2024-01-17 04:11:52', 1, 2, 1021, 34, NULL, 1, '2024-01-17 10:12:34', 1, '2024-01-17 10:12:34', 1),
(481, '2024-01-17 04:20:29', '2024-01-17 04:20:29', 6, 1, 1022, 34, NULL, 1, '2024-01-17 10:21:29', 1, '2024-01-17 10:21:29', 1),
(482, '2024-01-17 04:20:29', '2024-01-17 04:20:29', 1, 2, 1023, 34, NULL, 1, '2024-01-17 10:21:29', 1, '2024-01-17 10:21:29', 1),
(483, '2024-01-17 04:20:29', '2024-01-17 04:20:29', 2, 2, 1024, 34, NULL, 1, '2024-01-17 10:21:29', 1, '2024-01-17 10:21:29', 1),
(484, '2024-01-17 04:26:45', '2024-01-17 04:26:45', 7, 1, 1025, 34, NULL, 1, '2024-01-17 10:27:37', 1, '2024-01-17 10:27:37', 1),
(485, '2024-01-17 04:26:45', '2024-01-17 04:26:45', 1, 2, 1026, 34, NULL, 1, '2024-01-17 10:27:37', 1, '2024-01-17 10:27:37', 1),
(486, '2024-01-17 04:26:45', '2024-01-17 04:26:45', 2, 2, 1027, 34, NULL, 1, '2024-01-17 10:27:37', 1, '2024-01-17 10:27:37', 1),
(487, '2024-01-17 04:31:41', '2024-01-17 04:31:41', 8, 1, 1028, 34, NULL, 1, '2024-01-17 10:32:29', 1, '2024-01-17 10:32:29', 1),
(488, '2024-01-17 04:31:41', '2024-01-17 04:31:41', 1, 2, 1029, 34, NULL, 1, '2024-01-17 10:32:29', 1, '2024-01-17 10:32:29', 1),
(489, '2024-01-17 04:31:41', '2024-01-17 04:31:41', 2, 2, 1030, 34, NULL, 1, '2024-01-17 10:32:29', 1, '2024-01-17 10:32:29', 1),
(490, '2024-01-17 04:36:37', '2024-01-17 04:36:37', 9, 1, 1031, 34, NULL, 1, '2024-01-17 10:37:25', 1, '2024-01-17 10:37:25', 1),
(491, '2024-01-17 04:36:37', '2024-01-17 04:36:37', 1, 2, 1032, 34, NULL, 1, '2024-01-17 10:37:25', 1, '2024-01-17 10:37:25', 1),
(492, '2024-01-17 04:36:37', '2024-01-17 04:36:37', 2, 2, 1033, 34, NULL, 1, '2024-01-17 10:37:25', 1, '2024-01-17 10:37:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_class_module_soal`
--

CREATE TABLE `course_class_module_soal` (
  `id` int(11) NOT NULL,
  `m_bank_soal_id` int(11) NOT NULL,
  `course_class_module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_class_module_soal`
--

INSERT INTO `course_class_module_soal` (`id`, `m_bank_soal_id`, `course_class_module_id`) VALUES
(1, 121, 77),
(2, 122, 77),
(3, 123, 77),
(4, 124, 77),
(5, 125, 77),
(6, 126, 78),
(7, 127, 78),
(8, 128, 78),
(9, 129, 78),
(10, 130, 78),
(11, 131, 81),
(12, 132, 81),
(13, 133, 81),
(14, 134, 81),
(15, 135, 81),
(16, 136, 82),
(17, 137, 82),
(18, 138, 82),
(19, 139, 82),
(20, 140, 82),
(21, 141, 83),
(22, 142, 83),
(23, 143, 83),
(24, 144, 83),
(25, 145, 83),
(26, 61, 122),
(27, 62, 122),
(28, 63, 122),
(29, 64, 122),
(30, 65, 122),
(31, 66, 122),
(32, 67, 122),
(33, 68, 122),
(34, 69, 122),
(35, 70, 122),
(36, 71, 122),
(37, 72, 122),
(38, 73, 122),
(39, 74, 122),
(40, 75, 122),
(41, 76, 122),
(42, 77, 122),
(43, 78, 122),
(44, 79, 122),
(45, 80, 122),
(46, 81, 122),
(47, 82, 122),
(48, 83, 122),
(49, 84, 122),
(50, 85, 122),
(51, 86, 122),
(52, 87, 122),
(53, 88, 122),
(54, 89, 122),
(55, 90, 122),
(56, 91, 122),
(57, 92, 122),
(58, 93, 122),
(59, 94, 122),
(60, 95, 122),
(61, 96, 122),
(62, 97, 122),
(63, 98, 122),
(64, 99, 122),
(65, 100, 122),
(66, 101, 122),
(67, 102, 122),
(68, 103, 122),
(69, 104, 122),
(70, 105, 122),
(71, 106, 122),
(72, 107, 122),
(73, 108, 122),
(74, 109, 122),
(75, 110, 122),
(76, 111, 122),
(77, 112, 122),
(78, 113, 122),
(79, 114, 122),
(80, 115, 122),
(81, 116, 122),
(82, 117, 122),
(83, 118, 122),
(84, 119, 122),
(85, 120, 122);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_module`
--

CREATE TABLE `course_module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `html` text DEFAULT NULL,
  `js` text DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_module_parent_id` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `material` varchar(1000) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_module`
--

INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Database Overview and Clean Database Making Using PHPMyAdmin', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:05:09', 1, '2024-01-12 09:53:14', 1),
(2, 'Rapid Application Development using Laravel on Master Data', NULL, NULL, NULL, 2, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:05:48', 1, '2024-01-12 09:53:14', 1),
(3, 'Rapid Application Development using Laravel on Transaction Data', NULL, NULL, NULL, 3, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:06:16', 1, '2024-01-12 09:53:14', 1),
(4, 'Bootstrap 4 and SemanticUI', NULL, NULL, NULL, 4, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:06:32', 1, '2024-01-12 09:53:14', 1),
(5, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, NULL, 5, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:06:52', 1, '2024-01-12 09:53:14', 1),
(6, 'Implement DataTabel on Backend', NULL, NULL, NULL, 6, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:07:09', 1, '2024-01-12 09:53:14', 1),
(7, 'Implement ChartJS on Backend', NULL, NULL, NULL, 7, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:07:32', 1, '2024-01-12 09:53:14', 1),
(8, 'HTML CSS Overview and CSS Framework using Bootstrap 4\r\n', NULL, NULL, NULL, 1, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:05:09', 1, '2024-01-12 09:53:14', 1),
(9, 'Bootstrap 4 for Backend View', NULL, NULL, NULL, 2, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:05:48', 1, '2024-01-12 09:53:14', 1),
(10, 'JavaScript and JQuery Object Manipulation', NULL, NULL, NULL, 3, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:06:16', 1, '2024-01-12 09:53:14', 1),
(11, 'SemanticUI for Bootstrap Alternative', NULL, NULL, NULL, 4, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:09:32', 1, '2024-01-12 09:53:14', 1),
(12, 'AJAX and Web Services', NULL, NULL, NULL, 5, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:06:32', 1, '2024-01-12 09:53:14', 1),
(13, 'Mobile Web Apps Using Framework7', NULL, NULL, NULL, 6, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:06:52', 1, '2024-01-12 09:53:14', 1),
(14, 'Framework7 Authentication and Data Storing', NULL, NULL, NULL, 7, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:07:32', 1, '2024-01-12 09:53:14', 1),
(15, 'Framework7 Request Access', NULL, NULL, NULL, 8, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2022-09-26 11:11:16', 1, '2024-01-12 09:53:14', 1),
(16, 'Introduction to UI-UX Design', NULL, NULL, NULL, 1, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 0, '2022-09-26 11:14:12', 1, '2024-01-12 09:53:14', 1),
(17, 'Intro to Design Thinking', NULL, NULL, NULL, 2, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 0, '2022-09-26 11:14:12', 1, '2024-01-12 09:53:14', 1),
(18, 'User and Product Research', NULL, NULL, NULL, 3, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 0, '2022-09-26 11:14:12', 1, '2024-01-12 09:53:14', 1),
(19, 'Flow and Wireframe', NULL, NULL, NULL, 4, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 0, '2022-09-26 11:14:12', 1, '2024-01-12 09:53:14', 1),
(20, 'Visual Design', NULL, NULL, NULL, 5, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 0, '2022-09-26 11:14:12', 1, '2024-01-12 09:53:14', 1),
(21, 'Introduction', NULL, NULL, NULL, 1, 1, 5, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2022-09-12 15:23:36', 1, '2024-01-12 09:59:54', 1),
(22, 'Introduction', NULL, '<!-- This is a *view* - HTML markup that defines the appearance of your UI -->\\n        <p>First name: <strong>todo</strong></p>\\n        <p>Last name: <strong>todo</strong></p>', '// This is a simple *viewmodel* - JavaScript that defines the data and behavior of your UI\\nfunction AppViewModel() {\\nthis.firstName = \\\'Bert\\\';\\nthis.lastName = \\\'Bertington\\\';\\n}\\n// Activates knockout.js\\nko.applyBindings(new AppViewModel());', 1, 2, 5, 21, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Selamat Datang!</h2>\r\n\r\n                            <p>pada tutorial ini anda akan belajar beberapa hal dasar dalam membangun UI website\r\n                                <em>Model-View-ViewModel</em> (MVVM) menggunakan knockout.js\r\n                            </p>\r\n\r\n                            <p>Anda akan belajar bagaimana mendefinisikan tampilan UI menggunakan <strong>views</strong> dan\r\n                                <strong>declarative bindings</strong>, ata dan perilakunya menggunakan <strong>viewmodels</strong> dan\r\n                                <strong>observables</strong>,\r\n                                dan bagaimana semuanya tetap sinkron secara otomatis dengan bantuan Knockouts <strong>dependency\r\n                                    tracking</strong>\r\n                            </p>\r\n\r\n                            <h3>Menggunakan bindings di view</h3>\r\n\r\n                            <p>Di sudut kanan bawah, anda dapat melihat <em>viewmodel</em> yang berisi data orang. Di sudut kanan atas, Anda memiliki <em>view</em> yang seharusnya menampilkan data orang. Saat ini hanya menampilkan \"<em>todo</em>\", jadi mari kita perbaiki itu.</p>\r\n\r\n                            <p>Ubah dua elemen <code>&lt;strong&gt;</code> dalam tampilan, tambahkan attribute <code>data-bind</code> untuk menampilkan nama orang:\r\n                            </p>\r\n\r\n                            <pre><code><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>First name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: firstName\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                            </code></pre>\r\n                            <pre><code><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Last name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: lastName\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                            </code></pre>\r\n\r\n\r\n                            <p>attribute <code>data-bind</code> adalah bagaimana knockout memungkinkan anda secara deklaratif mengaitkan viewmodel properties dengan DOM element kamu baru saja menggunakan <code>text</code> binding untuk menetapkan text ke DOM elemen.</p>', NULL, 1, '2022-09-22 08:58:43', 1, '2023-12-27 08:23:56', 1),
(23, 'Introduction', NULL, NULL, NULL, 2, 2, 5, 21, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Membuat data bisa diedit</h2>\r\n\r\n                            <p>Anda tidak dibatasi untuk menampilkan data statis. Mari gunakan <code>value</code> binding,  bersama dengan beberapa  <code>&lt;input&gt;</code> HTML biasa, untuk membuat data dapat diedit.</p>\r\n\r\n                            <p>Tambahkan markup berikut ke bagian bawah tampilan Anda (biarkan markup yang ada tetap di atasnya):</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>First name: <span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: firstName\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                                                                                    </code></pre>\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Last name: <span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: lastName\"</span>/&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span></code></pre>\r\n\r\n\r\n                            <p>Sekarang jalankan aplikasinya. Apa yang terjadi ketika Anda mengedit teks di salah satu kotak teks?</p>\r\n\r\n                            <p>Hmm... ternyata tidak terjadi apa-apa. Mari kita perbaiki itu...</p>\r\n                            <h3>Pengenalan Observables</h3>\r\n\r\n                            <p>Sebenarnya, saat anda mengedit salah satu dari text box, itu akan memperbarui data viewmodelnya. Tetapi karena properti viewmodel hanyalah string JavaScript biasa, mereka tidak memiliki cara untuk memberi tahu siapa pun bahwa mereka telah berubah, sehingga UI tetap statis. Itu sebabnya Knockout memiliki konsep <strong>observables</strong> - ini adalah properti yang secara otomatis akan mengeluarkan pemberitahuan setiap kali nilainya berubah.</p>\r\n\r\n                            <p>Ubah viewmodel anda untuk membuat isi dari <code>firstName</code> dan <code>lastName</code> <em>observable</em> menggunakan <code>ko.observable</code>:</p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">AppViewModel</span><span class=\"params\">()</span>{</span>\r\n    <span class=\"keyword\">this</span>.firstName = <span class=\"highlight\">ko.observable(<span class=\"string\">\"Bert\"</span>)</span>;\r\n    <span class=\"keyword\">this</span>.lastName = <span class=\"highlight\">ko.observable(<span class=\"string\">\"Bertington\"</span>)</span>;\r\n        }\r\n                                            </code></pre>\r\n\r\n                            <p>Sekarang jalankan kembali aplikasi dan edit kotak teks. Kali ini Anda tidak hanya akan melihat bahwa data model tampilan yang mendasarinya diperbarui saat Anda mengedit, tetapi semua UI terkait juga diperbarui secara sinkron dengannya. </p>', NULL, 1, '2022-09-22 09:00:09', 1, '2023-12-27 08:23:56', 1),
(24, 'Introduction', NULL, NULL, NULL, 3, 2, 5, 21, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Mendefinisikan nilai yang dihitung</h2>\r\n\r\n                            <p>seringkali, anda ingin menggabungkan atau mengubah banyak observables values untuk membuat yang lain, pada contoh ini anda mungkin ingin mendefinisikan <em>full name</em> sebagain\r\n                                <em>first name</em> plus <em>space</em> plus <em>last name</em>.\r\n                            </p>\r\n\r\n                            <p>Untuk menangani ini, Knockout memiliki konsep <strong>computed properties</strong> -\r\n                                ini adalah <em>observable</em> (yaitu, mereka memberi tahu tentang perubahan) dan dihitung berdasarkan nilai dari observables lainnya.</p>\r\n\r\n                            <p>Tambahkan <code>fullName</code> ke view model anda, dengan menambahkan kode berikut di dalam AppViewModel, setelah namaDepan dan namaBelakang dideklarasikan:\r\n\r\n                                <code>AppViewModel</code>, after <code>firstName</code> and <code>lastName</code>\r\n                                are\r\n                                declared:\r\n                            </p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"keyword\">this</span>.fullName = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"keyword\">return</span> <span class=\"keyword\">this</span>.firstName() + <span class=\"string\">\" \"</span> + <span class=\"keyword\">this</span>.lastName();\r\n    }, <span class=\"keyword\">this</span>);\r\n                                                            </code></pre>\r\n\r\n                            <p>Seperti yang bisa anda lihat, kami meneruskan fungsi panggilan balik ke <code>ko.computed</code>\r\n                                yang menentukan bagaimana seharusnya menghitung nilainya. Selanjutnya, tampilkan nilai \r\n <code>fullName</code> di UI Anda dengan menambahkan markup di bagian bawah tampilan Anda:</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Full name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: fullName\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                                                                                    </code></pre>\r\n\r\n                            <p>Jika Anda menjalankan aplikasi sekarang dan mengedit kotak teks, Anda akan melihat bahwa semua elemen UI (termasuk tampilan nama lengkap) tetap sinkron dengan data yang mendasarinya.</p>\r\n\r\n                            <h3>Bagaimana cara kerjanya?</h3>\r\n\r\n                            <p>Segalanya tetap sinkron karena pelacakan ketergantungan otomatis:\r\n                                <code>&lt;strong&gt;</code> terakhir di sana bergantung pada <code>fullName</code>, yang bergantung pada <code>firstName</code>\r\n                                dan <code>lastName</code>, dan salah satu dari keduanya dapat diubah dengan mengedit textbox.\r\n                            </p>', NULL, 1, '2022-09-22 09:02:03', 1, '2023-12-27 08:23:56', 1),
(25, 'Introduction', NULL, NULL, NULL, 4, 2, 5, 21, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Menambahkan lebih banyak behavior</h2>\r\n\r\n                            <p>Untuk menyelesaikan contoh ini, mari tambahkan satu behavior lagi. Yaitu button yang membuat value namaBelakang berubah menjadi huruf kapital.\r\n                            </p>\r\n\r\n                            <h3>Memperbarui view model</h3>\r\n\r\n                            <p>Pertama, tambahkan fungsi <code>capitalizeLastName</code>ke viewmodel untuk mengimplementasikan behavior ini:</p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">AppViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave firstName, lastName, and fullName unchanged here ...</span>\r\n    <span class=\"keyword\">this</span>.capitalizeLastName = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n        <span class=\"keyword\">var</span> currentVal = <span class=\"keyword\">this</span>.lastName();        <span class=\"comment\">// Read the current value</span>\r\n        <span class=\"keyword\">this</span>.lastName(currentVal.toUpperCase()); <span class=\"comment\">// Write back a modified value</span>\r\n    };\r\n    }\r\n                            </code></pre>\r\n\r\n                            <p>Perhatikan bahwa, untuk membaca atau menulis nilai observables, Anda memanggilnya sebagai fungsi.</p>\r\n\r\n                            <h3>Memperbarui tampilan</h3>\r\n\r\n                            <p>Selanjutnya, tambahkan tombol ke tampilan, menggunakan pengikatan klik untuk mengaitkan klik dengan fungsi model tampilan yang baru saja Anda tambahkan:</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: capitalizeLastName\"</span>&gt;</span>Go caps<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n                            </code></pre>\r\n\r\n                            <p>Jika kamu menjalankan ini sekarang dan klik tombol \"Go Caps\", anda akan melihat semua bagian UI yang relevan diperbarui agar sesuai dengan status model tampilan yang diubah.</p>', NULL, 1, '2022-09-22 09:02:40', 1, '2023-12-27 08:23:56', 1),
(26, 'Introduction', NULL, NULL, NULL, 5, 2, 5, 21, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Kerja yang baik!</h2>\r\n\r\n                            <p>Ini adalah contoh yang sangat mendasar, tetapi itu menggambarkan beberapa poin kunci dari MVVM:</p>\r\n\r\n                            <ul>\r\n                                <li>Anda sudah mempelajari object-oriented representasi dari data UI dan behaviour anda (viewmodel)</li>\r\n                                <li>Secara terpisah, Anda memiliki representasi deklaratif tentang bagaimana itu harus ditampilkan secara visual(pandangan Anda)</li>\r\n                                <li>Anda dapat menerapkan behavior canggih hanya dengan memperbarui objek viewmodel. Anda tidak perlu khawatir tentang elemen DOM mana yang perlu diubah/ditambahkan/dihapus - Framework dapat menangani sinkronisasi untuk Anda.</li>\r\n                            </ul>\r\n\r\n                            <p>Tutorial selanjutnya akan membawa Anda lebih dalam :)</p>', NULL, 1, '2022-09-22 09:03:59', 1, '2023-12-27 08:23:56', 1),
(27, 'Working with list and collection', NULL, NULL, NULL, 2, 1, 5, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2022-09-22 09:06:43', 1, '2024-01-12 09:59:54', 1),
(28, 'Working with list and collection', NULL, '<h2>Your seat reservations</h2>\\n                        <table>\\n                            <thead><tr>\\n                                <th>Passenger name</th><th>Meal</th><th>Surcharge</th><th></th>\\n                            </tr></thead>\\n                            <!-- Todo: Generate table body -->\\n                            <tbody></tbody>\\n                        </table>', '// Class to represent a row in the seat reservations grid\\nfunction SeatReservation(name, initialMeal) {\\n    var self = this;\\n    self.name = name;\\n    self.meal = ko.observable(initialMeal);\\n}\\n\\n// Overall viewmodel for this screen, along with initial state\\nfunction ReservationsViewModel() {\\n    var self = this;\\n\\n    // Non-editable catalog data - would come from the server\\n    self.availableMeals = [\\n        { mealName: \\\'Standard (sandwich)\\\', price: 0 },\\n        { mealName: \\\'Premium (lobster)\\\', price: 34.95 },\\n        { mealName: \\\'Ultimate (whole zebra)\\\', price: 290 }\\n    ];\\n\\n    // Editable data\\n    self.seats = ko.observableArray([\\n        new SeatReservation(\\\'Steve\\\', self.availableMeals[0]),\\n        new SeatReservation(\\\'Bert\\\', self.availableMeals[0])\\n    ]);\\n}\\n\\nko.applyBindings(new ReservationsViewModel());', 1, 2, 5, 27, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Bekerja dengan Lists dan Collection</h2>\r\n                            \r\n                                <p>Seringkali , Anda ingin membuat blok elemen UI yang berulang, terutama saat menampilkan list dimana user dapat menambahkan dan menghapus elemen. Knockout memungkinkan Anda melakukannya dengan mudah, menggunakan <em>observable arrays</em> dan <code>foreach</code> binding. </p>\r\n                            \r\n                                <h3>Getting started</h3>\r\n                            \r\n                                <p>Dalam beberapa menit kedepan anda akan membangun UI dinamis untuk reservasi kursi dan makanan - ini bisa menjadi salah satu langkah dalam proses pemesanan maskapai. Di panel kanan bawah, Anda sudah mendapatkan:</p>\r\n                            \r\n                                <ul>\r\n                                    <li><code>SeatReservation</code>, konstruktor kelas JavaScript sederhana yang menyimpan nama penumpang dengan pilihan makanan</li>\r\n                                    <li><code>ReservationsViewModel</code>, kelas viewmodel yang menampung:\r\n                                        <ul>\r\n                                            <li><code>availableMeals</code>, objek JavaScript yang menyediakan data makanan</li>\r\n                                            <li><code>seats</code>, sebuah array yang menyimpan koleksi awal instans SeatReservation. Perhatikan bahwa ini adalah <code>ko.observableArray</code> - tidak mengherankan, itu setara dengan array biasa, yang berarti dapat secara otomatis     memicu pembaruan UI setiap kali item ditambahkan atau dihapus.\r\n</li>\r\n                                        </ul>\r\n                                    </li>\r\n                                </ul>\r\n                            \r\n                                <p>Tampilan (panel kanan atas) belum menampilkan data reservasi, jadi mari kita perbaiki. Perbarui element <code>&lt;tbody&gt;</code> untuk menggunakan <code>foreach</code> binding, sehingga akan membuat salinan child elemennya untuk setiap entri dalam array <code>seats</code>:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>dan kemudian isi element <code>&lt;tbody&gt;</code> dengan beberapa markup untuk mengatakan bahwa Anda menginginkan baris tabel (<code>&lt;tr&gt;</code>) untuk setiap entri:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span>&gt;</span>\r\n                                <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: name\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().mealName\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().price\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>    \r\n                            <span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>Perhatikan bahwa, karena properti <code>meal</code> adalah <em>observable</em>, penting untuk memanggil <code>meal()</code> sebagai fungsi (untuk mendapatkan nilai saat ini) sebelum mencoba membaca sub-properti. Dengan kata lain, tulis <code>meal().price</code>, <em>bukan</em>\r\n                                    <code>meal.price</code>.</p>\r\n                            \r\n                                <p>Hasil? Jika Anda menjalankan aplikasi sekarang, Anda akan melihat tabel sederhana informasi reservasi kursi.</p>\r\n                            \r\n                                <p><code>foreach</code> adalah bagian dari keluarga <em>control flow bindings</em> yang mencakup\r\n                                    <a href=\"http://knockoutjs.com/documentation/foreach-binding.html\"><code>foreach</code></a>,\r\n                                    <a href=\"http://knockoutjs.com/documentation/if-binding.html\"><code>if</code></a>,\r\n                                    <a href=\"http://knockoutjs.com/documentation/ifnot-binding.html\"><code>ifnot</code></a>, dan\r\n                                    <a href=\"http://knockoutjs.com/documentation/with-binding.html\"><code>with</code></a>. Ini memungkinkan untuk membangun segala jenis UI berulang, bersyarat, atau bersarang berdasarkan viewmodel dinamis Anda.\r\n                                </p>', NULL, 1, '2022-09-22 09:14:16', 1, '2023-12-27 08:23:56', 1),
(29, 'Working with list and collection', NULL, NULL, NULL, 2, 2, 5, 27, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Menambahkan item</h2>\r\n                            \r\n                                <p>Mengikuti pola MVVM membuatnya sangat mudah untuk bekerja dengan grafik objek yang dapat diubah seperti array dan hierarki. Anda memperbarui data yang mendasarinya, dan UI secara otomatis diperbarui secara sinkron.</p>\r\n                            \r\n                                <h3>Menambahkan seat reservation</h3>\r\n                            \r\n                                <p>Tambahkan tombol ke tampilan Anda, menggunakan binding click untuk mengaitkan kliknya dengan fungsi pada viewmodel anda:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: addSeat\"</span>&gt;</span>Reserve another seat<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>kemudian implementasi fungsi addSeat, membuatnya mendorong entri tambahan ke dalam array <code>seats</code>:</p>\r\n                            \r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">ReservationsViewModel</span><span class=\"params\">()</span> {</span>\r\n                                <span class=\"comment\">// ... leave all the rest unchanged ...</span>\r\n                            \r\n                                <span class=\"comment\">// Operations</span>\r\n                                self.addSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n                                    self.seats.push(<span class=\"keyword\">new</span> SeatReservation(<span class=\"string\">\"\"</span>, self.availableMeals[<span class=\"number\">0</span>]));\r\n                                }\r\n                            }\r\n                            </code></pre>\r\n                            \r\n                                <p>Cobalah - sekarang ketika Anda mengklik \"Reserve seat\", UI diperbarui agar sesuai. Ini karena <code>seats</code> adalah observable array, jadi menambahkan atau menghapus item akan memicu pembaruan UI secara otomatis.\r\n</p>\r\n                            \r\n                                <p>Perhatikan bahwa menambahkan baris <em>tidak</em> melibatkan pembuatan ulang seluruh UI. Untuk efisiensi, Knockout melacak apa yang telah berubah di model tampilan Anda, dan melakukan serangkaian pembaruan DOM minimal untuk dicocokkan. Ini berarti Anda dapat meningkatkan hingga UI yang sangat besar atau canggih, dan dapat tetap tajam dan responsif bahkan pada perangkat seluler kelas bawah.</p>', NULL, 1, '2022-09-22 09:15:25', 1, '2023-12-27 08:23:56', 1),
(30, 'Working with list and collection', NULL, NULL, NULL, 3, 2, 5, 27, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Membuat data dapat diedit</h2>\r\n\r\n                                <p>Anda bisa menggunakan binding di dalam block <code>foreach</code> sama seperti di tempat lain, jadi cukup mudah untuk mengupgrade apa yang kita miliki menjadi editor data lengkap. Perbarui tampilan Anda:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                                <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n                                <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n                                <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().price\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>    \r\n                        <span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                        </code></pre>\r\n\r\n                                <p>Kode ini menggunakan dua binding baru, <code>options</code> dan <code>optionsText</code>, yang bersama-sama mengontrol kumpulan item yang tersedia dalam daftar dropdown, dan properti objek mana ((dalam hal ini, <code>mealName</code>) yang digunakan untuk mewakili setiap item di layar.</p>\r\n                                <p>Cobalah - sekarang Anda dapat memilih dari makanan yang tersedia, dan hal itu akan menyebabkan baris yang sesuai (hanya) di-refresh untuk menampilkan harga makanan tersebut.</p>\r\n\r\n                                <h2>Memformat harga</h2>\r\n\r\n                                <p>Kami memiliki representasi berorientasi objek yang bagus dari data kami, sehingga kami dapat dengan mudah menambahkan properti dan fungsi tambahan di mana saja di grafik objek. Mari berikan kelas <code>SeatReservation</code> kemampuan untuk memformat data harganya sendiri menggunakan beberapa logika khusus.\r\n</p>\r\n\r\n                                <p>Karena harga yang diformat akan dihitung berdasarkan makanan yang dipilih, kami dapat mewakilinya menggunakan <code>ko.computed</code> (sehingga akan diperbarui secara otomatis setiap kali pilihan makanan berubah):</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">SeatReservation</span><span class=\"params\">(name, initialMeal)</span> {</span>\r\n                            <span class=\"keyword\">var</span> self = <span class=\"keyword\">this</span>;\r\n                            self.name = name;\r\n                            self.meal = ko.observable(initialMeal);\r\n                        \r\n                            self.formattedPrice = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n                                <span class=\"keyword\">var</span> price = self.meal().price;\r\n                                <span class=\"keyword\">return</span> price ? <span class=\"string\">\"$\"</span> + price.toFixed(<span class=\"number\">2</span>) : <span class=\"string\">\"None\"</span>;        \r\n                            });\r\n                        }\r\n                        </code></pre>\r\n\r\n                                <p>Sekarang Anda dapat memperbarui tampilan untuk menggunakan <code>formattedPrice</code> pada setiap instance <code>SeatReservation</code>:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: <span class=\"highlight\">formattedPrice</span>\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                        <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>\r\n                        </code></pre>', NULL, 1, '2022-09-22 09:31:34', 1, '2023-12-27 08:23:56', 1),
(31, 'Working with list and collection', NULL, NULL, NULL, 4, 2, 5, 27, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Menghapus item dan menunjukkan total biaya tambahan</h2>\r\n\r\n                                <p>Karena Anda dapat menambahkan item, Anda juga harus dapat menghapusnya, bukan? Seperti yang Anda harapkan, ini hanyalah masalah memperbarui data yang mendasarinya.</p>\r\n\r\n                                <p>Perbarui tampilan Anda sehingga menampilkan tautan \"remove\" di sebelah setiap item:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: formattedPrice\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">a</span> <span class=\"attribute\">href</span>=<span class=\"value\">\"#\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: $root.removeSeat\"</span>&gt;</span>Remove<span class=\"tag\">&lt;/<span class=\"title\">a</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>         \r\n</code></pre>\r\n\r\n                                <p>Perhatikan bahwa <code>$root.</code> prefix menyebabkan Knockout mencari handler <code>removeSeat</code> removeSeat pada model tampilan tingkat atas Anda alih-alih pada instance <code>SeatReservation</code> yang terikat --- itu adalah tempat yang lebih baik untuk menempatkan <code>removeSeat</code> dalam contoh ini. Jadi, tambahkan fungsi <code>removeSeat</code> yang sesuai ke kelas root viewmodel Anda, <code>ReservationsViewModel</code>:</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">ReservationsViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave the rest unchanged ...</span>\r\n\r\n    <span class=\"comment\">// Operations</span>\r\n    self.addSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> <span class=\"comment\">/* ... leave unchanged ... */</span> }\r\n    <span class=\"highlight\">self.removeSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(seat)</span> {</span> self.seats.remove(seat) }</span>\r\n}    \r\n</code></pre>\r\n\r\n                                <p>Sekarang jika anda jalankan aplikasinya, anda akan dapat menghapus dan menambahkan item.</p>\r\n\r\n                                <h3>Menampilkan total biaya</h3>\r\n\r\n                                <p>Akan menyenangkan untuk memberi tahu pelanggan berapa yang akan mereka bayar, bukan? Tidak mengherankan, kita dapat mendefinisikan total sebagai <em>computed property</em>, dan membiarkan kerangka kerja mengetahui kapan harus menghitung ulang dan menyegarkan tampilan.</p>\r\n\r\n                                <p>Tambahkan properti <code>ko.computed</code> berikut di dalam <code>ReservationsViewModel</code>:</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\">self.totalSurcharge = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n   <span class=\"keyword\">var</span> total = <span class=\"number\">0</span>;\r\n   <span class=\"keyword\">for</span> (<span class=\"keyword\">var</span> i = <span class=\"number\">0</span>; i &lt; self.seats().length; i++)\r\n       total += self.seats()[i].meal().price;\r\n   <span class=\"keyword\">return</span> total;\r\n});\r\n</code></pre>\r\n\r\n                                <p>Sekali lagi, perhatikan bahwa karena <code>seats</code> dan <code>meal</code> keduanya adalah observables, kami memanggilnya sebagai fungsi untuk membaca nilainya saat ini ((mis., <code>self.seats().length</code>).</p>\r\n\r\n                                <p>Tampilkan total biaya tambahan dengan menambahkan elemen <code>&lt;h3&gt;</code> berikut ke bagian bawah tampilan Anda:\r\n</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h3</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"visible: totalSurcharge() &gt; 0\"</span>&gt;</span>\r\n    Total surcharge: $<span class=\"tag\">&lt;<span class=\"title\">span</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: totalSurcharge().toFixed(2)\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">span</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">h3</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Cuplikan ini menunjukkan dua poin baru:</p>\r\n\r\n                                <ul>\r\n                                    <li><code>visible</code> binding membuat elemen terlihat atau tidak terlihat saat data Anda berubah (secara internal, ini mengubah gaya tampilan CSS elemen). Dalam hal ini, kami memilih untuk menampilkan informasi \"biaya tambahan   total\" hanya jika lebih besar dari nol.</li>\r\n                                    <li>Anda dapat menggunakan <strong>ekspresi JavaScript arbitrer</strong> di dalam binding deklaratif. Di sini, kami menggunakan <code>totalSurcharge() &gt; 0</code> dan\r\n                                        <code>totalSurcharge().toFixed(2)</code>. Secara internal, ini sebenarnya mendefinisikan properti   yang dihitung untuk mewakili output dari ekspresi itu. Ini hanya alternatif sintaksis yang sangat ringan dan   nyaman.                                    </li>\r\n                                </ul>\r\n\r\n                                <p>Sekarang jika Anda menjalankan kode, Anda akan melihat \"biaya tambahan total\" muncul dan menghilang sebagaimana mestinya, dan berkat pelacakan ketergantungan, ia tahu kapan harus menghitung ulang nilainya sendiri — Anda tidak perlu memasukkan kode apa pun di \"tambah\" Anda atau fungsi \"hapus\" untuk memaksa dependensi memperbarui secara manual.</p>', NULL, 1, '2022-09-22 09:32:07', 1, '2023-12-27 08:23:56', 1),
(32, 'Working with list and collection', NULL, NULL, NULL, 5, 2, 5, 27, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Tips terakhir</h2>\r\n\r\n                                <p>Setelah mengikuti pola MVVM dan mendapatkan representasi berorientasi objek dari data dan perilaku UI, Anda berada dalam posisi yang bagus untuk menggunakan behavior ekstra dengan cara yang nyaman.</p>\r\n\r\n                                <p>Misalnya, jika Anda diminta untuk menampilkan jumlah total kursi yang dipesan, Anda dapat menerapkannya hanya di satu tempat, dan Anda tidak perlu menulis kode tambahan untuk memperbarui jumlah kursi saat Anda menambah atau menghapus item. Cukup perbarui <code>&lt;h2&gt;</code> \r\ndi bagian atas tampilan Anda:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h2</span>&gt;</span>Your seat reservations <span class=\"highlight\">(<span class=\"tag\">&lt;<span class=\"title\">span</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: seats().length\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">span</span>&gt;</span>)</span><span class=\"tag\">&lt;/<span class=\"title\">h2</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Trivial.</p>\r\n\r\n                                <p>Mirip, jika anda diminta untuk menaruh limit pada jumlah kursi yang dapat di pesan, katakanlah, Anda dapat membuat UI menyatakannya dengan menggunakan <code>enable</code> binding:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: addSeat<span class=\"highlight\">, enable: seats().length &lt; 5</span>\"</span>&gt;</span>Reserve another seat<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Tombol akan dinonaktifkan ketika batas kursi tercapai. Anda tidak perlu menulis kode apa pun untuk mengaktifkannya kembali saat pengguna menghapus beberapa kursi (mengacaukan logika \"hapus\" Anda), karena ekspresi akan secara otomatis dievaluasi ulang oleh Knockout saat data terkait berubah.</p>\r\n\r\n                                <p>Jika Anda ingin mempelajari cara menyimpan kembali data yang diperbarui ke server, lihat tutorial Memuat dan Menyimpan Data.</p>', NULL, 1, '2022-09-22 09:32:38', 1, '2023-12-27 08:23:56', 1),
(33, 'Create custom binding', NULL, NULL, NULL, 3, 1, 5, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2022-09-22 10:23:19', 1, '2024-01-12 09:59:54', 1),
(34, 'Create custom binding', NULL, '<h3 data-bind=\\\'text: question\\\'></h3>\\n<p>Please distribute <b data-bind=\\\'text: pointsBudget\\\'></b> points between the following options.</p>\\n\\n<table>\\n    <thead><tr><th>Option</th><th>Importance</th></tr></thead>\\n    <tbody data-bind=\\\'foreach: answers\\\'>\\n        <tr>\\n            <td data-bind=\\\'text: answerText\\\'></td>\\n            <td><select data-bind=\\\'options: [1,2,3,4,5], value: points\\\'></select></td>\\n        </tr>\\n    </tbody>\\n</table>\\n\\n<h3 data-bind=\\\'visible: pointsUsed() > pointsBudget\\\'>You\\\'ve used too many points! Please remove some.</h3>\\n<p>You\\\'ve got <b data-bind=\\\'text: pointsBudget - pointsUsed()\\\'></b> points left to use.</p>\\n<button data-bind=\\\'enable: pointsUsed() <= pointsBudget, click: save\\\'>Finished</button>', 'function Answer(text) { this.answerText = text; this.points = ko.observable(1); }\\n\\nfunction SurveyViewModel(question, pointsBudget, answers) {\\n    this.question = question;\\n    this.pointsBudget = pointsBudget;\\n    this.answers = $.map(answers, function(text) { return new Answer(text) });\\n    this.save = function() { alert(\\\'To do\\\') };\\n\\n    this.pointsUsed = ko.computed(function() {\\n        var total = 0;\\n        for (var i = 0; i < this.answers.length; i++)\\n            total += this.answers[i].points();\\n        return total;\\n    }, this);\\n}\\n\\nko.applyBindings(new SurveyViewModel(\\\'Which factors affect your technology choices?\\\', 10, [\\n   \\\'Functionality, compatibility, pricing - all that boring stuff\\\',\\n   \\\'How often it is mentioned on Hacker News\\\',\\n   \\\'Number of gradients/dropshadows on project homepage\\\',\\n   \\\'Totally believable testimonials on project homepage\\\'\\n]));', 1, 2, 5, 33, 3, 'materi_pembelajaran', NULL, NULL, '<h2>Membuat binding khusus</h2>\r\n\r\n<p>Dalam interpretasi Knockout tentang MVVM, <em>bindings</em> adalah yang menyatukan tampilan dan viewmodel Anda. Binding adalah perantara; mereka melakukan pembaruan di kedua arah:</p>\r\n\r\n<ul>\r\n    <li>Binding melihat <strong>perubahan viewmodel</strong> dan memperbarui <strong>tampilan DOM</strong></li>\r\n    <li>Binding menangkap <strong>event DOM</strong> dan memperbarui <strong>properti viewmodel</strong></li>\r\n</ul>\r\n\r\n<p>Knockout memiliki kumpulan binding bawaan yang fleksibel dan komprehensif (misalnya, text, click, foreach), tetapi tidak berhenti di situ - Anda dapat membuat binding khusus hanya dalam beberapa baris kode. Dalam aplikasi realistis apa pun, Anda akan merasa manfaat merangkum pola UI umum di dalam binding, sehingga pola tersebut dapat digunakan kembali dengan mudah di banyak tempat. Misalnya, situs web ini menggunakan custom binding untuk merangkum pendekatannya terhadap dialog, panel yang dapat diseret, editor kode, dan bahkan untuk merender teks yang Anda baca.\r\n</p>\r\n\r\n<h3>Oke, mari kita buat sendiri</h3>\r\n\r\n<p>Anda sudah mendapatkan beberapa kode yang mewakili halaman survei yang tidak menarik tetapi berfungsi. Cobalah menggunakannya. Sekarang mari kita tingkatkan tampilan dan nuansa dalam tiga cara:</p>\r\n\r\n<ul>\r\n    <li>... dengan transisi animasi pada peringatan \"<em>Anda telah menggunakan terlalu banyak poin</em>\"</li>\r\n    <li>... dengan gaya yang ditingkatkan pada tombol Selesai</li>\r\n    <li>... dengan tampilan peringkat bintang yang menyenangkan untuk digunakan untuk menetapkan poin, alih-alih daftar drop-down yang mengganggu</li>\r\n</ul>', NULL, 1, '2022-09-22 10:24:42', 1, '2023-12-27 08:23:56', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(35, 'Create custom binding', NULL, NULL, NULL, 2, 2, 5, 33, 3, 'materi_pembelajaran', NULL, NULL, '<h2>Menerapkan transisi animasi</h2>\r\n\r\n<p>Ketika pengunjung memberikan terlalu banyak poin, peringatan \"<em>You\'ve used too many points</em>\" akan langsung terlihat, karena tampilannya dikontrol menggunakan <code>visible</code> binding.\r\n    Jika Anda ingin membuatnya memudar masuk dan keluar dengan lancar, Anda bisa menulis custom binding yang cepat dan dapat digunakan kembali yang secara internal menggunakan fungsi <code>fade</code> jQuery untuk mengimplementasikan animasi.</p>\r\n\r\n<p>Anda dapat menentukan binding khusus dengan menetapkan properti baru ke objek <code>ko.bindingHandlers</code>. Properti Anda dapat mengekspos dua fungsi panggilan balik:</p>\r\n\r\n<ul>\r\n    <li><code>init</code>, untuk dipanggil saat binding pertama kali terjadi (berguna untuk mengatur status awal atau mendaftarkan event handler)</li>\r\n    <li><code>update</code>, untuk dipanggil setiap kali data terkait diperbarui (sehingga Anda dapat memperbarui DOM agar sesuai)</li>\r\n</ul>\r\n\r\n<p>Mulai tentukan binding <code>fadeVisible</code> dengan menambahkan kode berikut di bagian atas panel viewmodel:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.fadeVisible = {\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// On update, fade in/out</span>\r\n        <span class=\"keyword\">var</span> shouldDisplay = valueAccessor();\r\n        shouldDisplay ? $(element).fadeIn() : $(element).fadeOut();\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Seperti yang Anda lihat, <code>update</code> handler diberikan elemen yang terikat padanya, dan fungsi yang mengembalikan nilai saat ini dari data terkait. Berdasarkan nilai saat ini, Anda dapat menggunakan jQuery untuk memudarkan elemen masuk atau keluar.</p>\r\n\r\n<p>Untuk menggunakan custom binding Anda, cukup ubah peringatan \"<em>You\'ve used too many points</em>\" sehingga menggunakan <code>fadeVisible</code> alih-alih <code>visible</code>:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h3</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">fadeVisible</span>: pointsUsed() &gt; pointsBudget\"</span>&gt;</span>You\'ve used too many points! Please remove some.<span class=\"tag\">&lt;/<span class=\"title\">h3</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Coba jalankan - behavior sudah hampir sempurna. Peringatan akan memudar masuk dan keluar dengan lancar sesuai kebutuhan.</p>\r\n\r\n<h2>Mengatur status awal elemen</h2>\r\n\r\n<p>Ada satu hal yang tidak beres: saat halaman pertama kali dimuat, peringatan tersebut untuk sementara mulai terlihat dan segera menghilang (klik Jalankan beberapa kali jika Anda perlu melihatnya terjadi). Anda harus menggunakan <code>handler</code> untuk memastikan status awal elemen cocok dengan data viewmodel awal.</p>\r\n\r\n<p>Itu cukup mudah - tambahkan <code>init</code> handler ke custom binding Anda:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.fadeVisible = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// Start visible/invisible according to initial value</span>\r\n        <span class=\"keyword\">var</span> shouldDisplay = valueAccessor();\r\n        $(element).toggle(shouldDisplay);\r\n    },\r\n    update: <span class=\"comment\">// ... leave the \"update\" handler unchanged ...</span>\r\n};\r\n</code></pre>\r\n\r\n<p>Itu memperbaikinya! Sekarang animasi hanya terjadi ketika viewmodel berubah.</p>\r\n\r\n<p>Membuat binding <code>fadeVisible</code> mungkin tampak seperti sedikit pekerjaan, tetapi ini adalah kode yang sepenuhnya dapat digunakan kembali, sehingga Anda dapat menyimpannya dalam file JavaScript \"bindings\" yang terpisah dan kemudian menggunakannya sebagai pengganti <code>visible</code> di mana saja di aplikasi Anda.</p>\r\n', NULL, 1, '2022-09-22 10:26:10', 1, '2023-12-27 08:23:56', 1),
(36, 'Create custom binding', NULL, NULL, NULL, 3, 2, 5, 33, 3, 'materi_pembelajaran', NULL, NULL, '<h2>Mengintegrasikan dengan komponen pihak ketiga</h2>\r\n\r\n<p>Jika Anda ingin tampilan Anda berisi komponen dari library JavaScript eksternal (misalnya, jQuery UI atau YUI) dan mengikatnya ke properti viewmodel, teknik termudah adalah membuat custom binding. binding Anda akan menjadi perantara antara viewmodel Anda dan komponen pihak ketiga.</p>\r\n\r\n<p>Sebagai contoh, mari gunakan <a href=\"http://jqueryui.com/demos/button/\">widget \"Button\" jQuery UI</a> untuk meningkatkan tampilan dan nuansa tombol \"Finished\".</p>\r\n\r\n<p>Memulai cukup mudah. Definisikan <code>jqButton</code> binding dengan menambahkan kode berikut di bagian atas panel viewmodel:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.jqButton = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element)</span> {</span>\r\n       $(element).button(); <span class=\"comment\">// Turns the element into a jQuery UI button</span>\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Untuk menggunakan binding, perbarui tombol \"<em>Finished</em>\" di view:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">jqButton: true,</span> enable: pointsUsed() &lt;= pointsBudget, click: save\"</span>&gt;</span>Finished<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Cobalah - ini sudah cukup berhasil. Tampilan tombol ditingkatkan, dan mengkliknya masih berfungsi sama</p>\r\n\r\n<h3>Toggling status \"disabled\" tombol</h3>\r\n\r\n<p>Tombol Anda tidak lagi terlihat dinonaktifkan ketika pengunjung telah melebihi anggaran poin mereka. <code>enable</code>\r\n    binding tidak berfungsi secara langsung dengan tombol UI jQuery, karena tombol UI jQuery tidak secara otomatis merespons atribut \"<code>disabled</code>\" HTML biasa. Sebagai gantinya, tombol jQuery UI memiliki API khusus untuk mengontrol tampilan yang enabled/disabled\r\n</p>\r\n\r\n<p>Itu tidak masalah: Anda dapat menggunakan <code>update</code> handler untuk memberi tahu tombol kapan harus mengaktifkan/menonaktifkan sendiri:\r\n</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.jqButton = {\r\n    init: <span class=\"comment\">/* ... leave \"init\" unchanged ... */</span>,\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"keyword\">var</span> currentValue = valueAccessor();\r\n        <span class=\"comment\">// Here we just update the \"disabled\" state, but you could update other properties too</span>\r\n        $(element).button(<span class=\"string\">\"option\"</span>, <span class=\"string\">\"disabled\"</span>, currentValue.enable === <span class=\"literal\">false</span>);\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Untuk menggunakan ini, perbarui tombol \"<em>Finished</em>\" sehingga Anda meneruskan properti <code>enable</code> ke dalam <code>jqButton</code> binding:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">jqButton: { enable: pointsUsed() &lt;= pointsBudget }</span>, click: save\"</span>&gt;</span>Finished<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Sekarang tombol akan terlihat abu-abu jika pengunjung melebihi anggaran poin mereka.</p>\r\n\r\n<p>Sekali lagi, <code>jqButton</code> binding dapat digunakan kembali pada tombol mana saja di aplikasi Anda, memungkinkan Anda secara deklaratif mengaitkan status tombol yang enabled/disabled dengan kondisi model tampilan apa pun. Anda juga dapat meningkatkan pengikatan untuk mengontrol secara deklaratif properti tombol UI jQuery lainnya juga, seperti ikon mana yang muncul di tombol.\r\n</p>\r\n', NULL, 1, '2022-09-22 10:26:35', 1, '2023-12-27 08:23:56', 1),
(37, 'Create custom binding', NULL, NULL, NULL, 4, 2, 5, 33, 3, 'materi_pembelajaran', NULL, NULL, '    <h2>Menerapkan widget khusus</h2>\r\n\r\n    <p>Untuk menyelesaikan tutorial ini, mari lakukan sesuatu yang sedikit lebih menarik. Mari kita ganti dropdown \"importance\" dengan sistem peringkat bintang yang lebih baik untuk digunakan. Anda dapat melakukan ini hanya dalam beberapa baris kode dengan membuat binding untuk membungkus widget peringkat bintang yang ada (contoh) tetapi demi pembelajaran, mari kita buat sepenuhnya dari awal.\r\n    </p>\r\n\r\n    <p>Untuk memulai, tentukan pengikatan <code>starRating</code> dengan menambahkan yang berikut ini ke bagian atas panel viewmodel:\r\n    </p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\" data-second_best=\"[object Object]\">ko.bindingHandlers.starRating = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        $(element).addClass(<span class=\"string\">\"starRating\"</span>);\r\n        <span class=\"keyword\">for</span> (<span class=\"keyword\">var</span> i = <span class=\"number\">0</span>; i &lt; <span class=\"number\">5</span>; i++)\r\n           $(<span class=\"string\">\"&lt;span&gt;\"</span>).appendTo(element);\r\n    }\r\n};\r\n</code></pre>\r\n\r\n    <p>Kode ini hanya menyisipkan serangkaian element <code>&lt;span&gt;</code> Sudah ada beberapa CSS yang disiapkan untuk Anda tampilkan sebagai bintang. Untuk menggunakannya, perbarui tampilan Anda, singkirkan <code>&lt;select&gt;</code> dropdowns:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: answers\"</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n        <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: answerText\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n        <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"starRating: points\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n    <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <h3>Menampilkan rating saat ini</h3>\r\n\r\n    <p>Anda ingin peringkat bintang diperbarui secara otomatis setiap kali data model tampilan yang mendasarinya berubah, sehingga Anda dapat menggunakan <code>update</code> handler untuk menetapkan kelas CSS yang sesuai bergantung pada data saat ini:\r\n    </p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.starRating = {\r\n    init: <span class=\"comment\">/* ... leave \"init\" unchanged ... */</span>,\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// Give the first x stars the \"chosen\" class, where x &lt;= rating</span>\r\n        <span class=\"keyword\">var</span> observable = valueAccessor();\r\n        $(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n            $(<span class=\"keyword\">this</span>).toggleClass(<span class=\"string\">\"chosen\"</span>, index &lt; observable());\r\n        });\r\n    }\r\n};\r\n</code></pre>\r\n\r\n    <p>Karena alokasi poin awal semuanya 1, Anda harus mendapatkan satu bintang yang disorot untuk setiap jawaban.</p>\r\n\r\n    <h3>Highlighting saat mouse hover</h3>\r\n\r\n    <p>Saat pengunjung mengarahkan mouse ke bintang, ada baiknya untuk menyorot bintang yang akan mereka pilih. Status \"highlight\" tidak benar-benar perlu ditautkan ke model tampilan karena Anda tidak menyimpan data itu dengan cara apa pun, jadi opsi termudah adalah mengontrol highlighting dengan beberapa kode jQuery mentah.</p>\r\n\r\n    <p>Anda dapat menggunakan fungsi <code>hover</code> jQuery untuk menangkap acara hover-in dan hover-out, mengatur kelas CSS yang sesuai pada bintang yang terpengaruh:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n    <span class=\"comment\">// ... leave existing code unchanged ... </span>\r\n\r\n    <span class=\"comment\">// Handle mouse events on the stars</span>\r\n    $(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n        $(<span class=\"keyword\">this</span>).hover(\r\n            <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).addClass(<span class=\"string\">\"hoverChosen\"</span>) },\r\n            <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).removeClass(<span class=\"string\">\"hoverChosen\"</span>) }\r\n        );\r\n    });\r\n},\r\n</code></pre>\r\n\r\n    <p>Sekarang saat Anda menggerakkan mouse, Anda akan melihat bintang-bintang menyala.</p>\r\n\r\n    <h3>Menulis data kembali ke viewmodel</h3>\r\n\r\n    <p>Saat pengunjung mengeklik bintang, Anda ingin menyimpan peringkat mereka yang diperbarui dalam model tampilan yang mendasarinya, sehingga UI lainnya dapat diupdate secara otomatis. Ini cukup mudah dilakukan: gunakan <code>click</code> fucntion jQuery untuk menangkap click tersebut:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"comment\">// Handle mouse events on the stars</span>\r\n$(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n    $(<span class=\"keyword\">this</span>).hover(\r\n        <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).addClass(<span class=\"string\">\"hoverChosen\"</span>) },\r\n        <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).removeClass(<span class=\"string\">\"hoverChosen\"</span>) }\r\n    )<span class=\"highlight\">.click(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> </span>\r\n    <span class=\"highlight\">   <span class=\"keyword\">var</span> observable = valueAccessor(); </span> <span class=\"comment\">// Get the associated observable</span>\r\n    <span class=\"highlight\">   observable(index+<span class=\"number\">1</span>);              </span> <span class=\"comment\">// Write the new rating to it</span>\r\n    <span class=\"highlight\"> }); </span>\r\n});\r\n</code></pre>\r\n\r\n    <p>Cobalah - sistem peringkat bintang Anda sekarang harus berfungsi penuh! UI sekarang semua pembaruan sinkron dengan peringkat pengunjung.</p>\r\n\r\n    <h3>Ringkasan</h3>\r\n\r\n    <p><code>starRating</code> binding sama rumitnya dengan ikatan yang biasanya didapat. Ini menggambarkan bagaimana binding sering kali menjadi tempat kode Anda turun di bawah lapisan MVVM deklaratif yang berorientasi objek dengan baik dan ke dalam lapisan manipulasi DOM tingkat rendah yang lebih mentah untuk membuat pembaruan UI yang diperlukan. Apakah ini nyaman dan mudah bagi Anda atau tidak tergantung pada keahlian Anda dengan jQuery atau perpustakaan DOM lainnya ...</p>\r\n\r\n    <p>Seperti biasa, <code>starRating</code> benar-benar dapat digunakan kembali di mana saja di aplikasi Anda di mana Anda ingin menampilkan properti model tampilan numerik karena beberapa bintang di layar, secara otomatis menyegarkan tampilan setiap kali data model tampilan berubah. Ini dengan rapi memisahkan bisnis menampilkan bintang dari logika model tampilan apa pun yang berkaitan dengan pilihan pengunjung.\r\n    </p>\r\n', NULL, 1, '2022-09-22 11:00:42', 1, '2023-12-27 08:23:56', 1),
(38, 'Loading and saving data', NULL, NULL, NULL, 4, 1, 5, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2022-09-22 11:02:05', 1, '2024-01-12 09:59:54', 1),
(39, 'Loading and saving data', NULL, '<h3>Tasks</h3>\\n\\n<form data-bind=\\\"submit: addTask\\\">\\n    Add task: <input data-bind=\\\"value: newTaskText\\\" placeholder=\\\"What needs to be done?\\\" />\\n    <button type=\\\"submit\\\">Add</button>\\n</form>\\n\\n<ul data-bind=\\\"foreach: tasks, visible: tasks().length > 0\\\">\\n    <li>\\n        <input type=\\\"checkbox\\\" data-bind=\\\"checked: isDone\\\" />\\n        <input data-bind=\\\"value: title, disable: isDone\\\" />\\n        <a href=\\\"#\\\" data-bind=\\\"click: $parent.removeTask\\\">Delete</a>\\n    </li>\\n</ul>\\n\\nYou have <b data-bind=\\\"text: incompleteTasks().length\\\">&nbsp;</b> incomplete task(s)\\n<span data-bind=\\\"visible: incompleteTasks().length == 0\\\"> - it\\\'s beer time!</span>', 'function Task(data) {\\n    this.title = ko.observable(data.title);\\n    this.isDone = ko.observable(data.isDone);\\n}\\n\\nfunction TaskListViewModel() {\\n    // Data\\n    var self = this;\\n    self.tasks = ko.observableArray([]);\\n    self.newTaskText = ko.observable();\\n    self.incompleteTasks = ko.computed(function() {\\n        return ko.utils.arrayFilter(self.tasks(), function(task) { return !task.isDone() });\\n    });\\n\\n    // Operations\\n    self.addTask = function() {\\n        self.tasks.push(new Task({ title: this.newTaskText() }));\\n        self.newTaskText(\\\"\\\");\\n    };\\n    self.removeTask = function(task) { self.tasks.remove(task) };\\n}\\n\\nko.applyBindings(new TaskListViewModel());', 1, 2, 5, 38, 4, 'materi_pembelajaran', NULL, NULL, '<h2>Memuat dan menyimpan data</h2>\r\n\r\n<p>Sekarang, Anda telah memiliki pemahaman yang baik tentang bagaimana pola MVVM membantu Anda mengatur kode sisi klien dengan rapi untuk UI dinamis, dan bagaimana\r\n    Knockout\'s <em>observables</em>, <em>bindings</em>, and <em>dependency tracking</em> membuatnya bekerja. Di hampir semua aplikasi web, Anda juga perlu mendapatkan data dari server, dan mengirim kembali data yang dimodifikasi.\r\n</p>\r\n\r\n<p>Karena Knockout adalah perpustakaan sisi klien murni, ia memiliki fleksibilitas untuk bekerja dengan teknologi sisi server apa pun (mis., ASP.NET, Rails, PHP, dll.), dan pola arsitektur apa pun, basis data, apa pun. Selama kode sisi server Anda dapat mengirim dan menerima data JSON — tugas sepele untuk teknologi web yang setengah-layak — Anda akan dapat menggunakan teknik yang ditunjukkan dalam tutorial ini.\r\n</p>\r\n\r\n<h3>Skenario untuk tutorial ini</h3>\r\n\r\n<p>Semua perpustakaan JavaScript diwajibkan secara hukum untuk menawarkan contoh \"daftar tugas\" (catatan: itu lelucon) jadi ini dia. Luangkan waktu sejenak untuk memainkannya - tambahkan dan hapus beberapa tugas - dan baca kode untuk memahami cara kerjanya. Ini cukup mendasar dan dapat diprediksi. Selanjutnya, Anda akan memuat beberapa daftar tugas awal dari server, dan kemudian melihat dua cara berbeda untuk menyimpan data yang dimodifikasi kembali ke server\r\n</p>\r\n', NULL, 1, '2022-09-22 11:06:24', 1, '2023-12-27 08:23:56', 1),
(40, 'Loading and saving data', NULL, NULL, NULL, 2, 2, 5, 38, 4, 'materi_pembelajaran', NULL, NULL, '<h2>Memuat data dari server</h2>\r\n\r\n<p>Cara termudah untuk mendapatkan data JSON dari server adalah dengan membuat permintaan Ajax. Dalam tutorial ini, Anda akan menggunakan fungsi <code>$.getJSON</code> and <code>$.ajax</code> jQuery\r\n    untuk melakukannya. Setelah Anda mendapatkan datanya, Anda dapat menggunakannya untuk memperbarui model tampilan Anda, dan membiarkan UI memperbarui dirinya sendiri secara otomatis.\r\n</p>\r\n\r\n<p>Di server ini, ada beberapa kode yang menangani permintaan ke URL <code>/tasks</code>, dan merespons dengan data JSON. Tambahkan kode ke akhir <code>TaskListViewModel</code>\r\n    untuk meminta data tersebut dan menggunakannya untuk mengisi array <code>tasks</code>:\r\n</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">TaskListViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave the existing code unchanged ...</span>\r\n\r\n    <span class=\"comment\">// Load initial state from server, convert it to Task instances, then populate self.tasks</span>\r\n    $.getJSON(<span class=\"string\">\"/tasks\"</span>, <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(allData)</span> {</span>\r\n        <span class=\"keyword\">var</span> mappedTasks = $.map(allData, <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(item)</span> {</span> <span class=\"keyword\">return</span> <span class=\"keyword\">new</span> Task(item) });\r\n        self.tasks(mappedTasks);\r\n    });\r\n}\r\n</code></pre>\r\n\r\n<p><em><strong>Catatan penting!</strong> Perhatikan bahwa Anda <strong>tidak</strong> memanggil <code>ko.applyBindings</code> setelah memuat data. Banyak pendatang baru Knockout membuat kesalahan dengan mencoba mengikat ulang UI tmereka setiap kali mereka memuat beberapa data, tetapi itu tidak berguna. Tidak ada alasan untuk mengikat ulang - cukup memperbarui model tampilan yang ada sudah cukup untuk membuat seluruh UI diperbarui.\r\n    </em></p>\r\n\r\n<p>Kode ini mengambil data mentah array yang dikembalikan oleh server dan menggunakan helper jQuery <code>$.map</code> untuk membuat instance <code>Task</code> dari setiap entri mentah. Hasil array objek <code>Task</code> kemudia didorong ke dalam array <code>tasks</code>, yang menyebabkan UI diperbarui karena dia observables.</p>\r\n\r\n', NULL, 1, '2022-09-22 11:06:24', 1, '2023-12-27 08:23:56', 1),
(41, 'Loading and saving data', NULL, NULL, NULL, 3, 2, 5, 38, 4, 'materi_pembelajaran', NULL, NULL, '\r\n    <h2>Mengirim data kembali ke server: metode 1</h2>\r\n\r\n    <p>Tentu saja, Anda juga dapat menggunakan permintaan Ajax untuk mengirim data kembali ke server.\r\n        Tetapi sebelum kita sampai pada itu, ada alternatif yang mungkin lebih sederhana untuk dipertimbangkan.</p>\r\n\r\n    <p>Jika Anda memiliki beberapa representasi data model Anda di dalam <code>&lt;form&gt;</code>, HTML biasa, maka Anda cukup membiarkan pengguna memposting formulir itu ke server Anda.\r\n        Ini sangat mudah untuk dilakukan. Misalnya, tambahkan markup formulir berikut di bagian bawah tampilan Anda:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">form</span> <span class=\"attribute\">action</span>=<span class=\"value\">\"/tasks/saveform\"</span> <span class=\"attribute\">method</span>=<span class=\"value\">\"post\"</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">textarea</span> <span class=\"attribute\">name</span>=<span class=\"value\">\"tasks\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: ko.toJSON(tasks)\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">textarea</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"submit\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">form</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <p>Cuplikan ini menggunakan <code>&lt;textarea&gt;</code> agar Anda dapat melihat apa yang terjadi di balik layar. Cobalah: saat pengunjung mengedit data di UI, pelacakan ketergantungan akan menyebabkan representasi JSON di area teks diperbarui secara otomatis. Saat pengunjung mengirimkan formulir, kode sisi server Anda akan menerima data JSON tersebut.\r\n    </p>\r\n\r\n    <p>Anda tidak benar-benar ingin menampilkan <code>&lt;textarea&gt;</code> yang terlihat kepada pengunjung sebenarnya, jadi gantilah dengan kontrol input hidden:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">form</span> <span class=\"attribute\">action</span>=<span class=\"value\">\"/tasks/saveform\"</span> <span class=\"attribute\">method</span>=<span class=\"value\">\"post\"</span>&gt;</span>\r\n    <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"hidden\"</span> <span class=\"attribute\">name</span>=<span class=\"value\">\"tasks\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: ko.toJSON(tasks)\"</span> /&gt;</span></span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"submit\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">form</span>&gt;</span>\r\n</code></pre>\r\n\r\n', NULL, 1, '2022-09-22 11:06:24', 1, '2023-12-27 08:23:56', 1),
(42, 'Loading and saving data', NULL, NULL, NULL, 4, 2, 5, 38, 4, 'materi_pembelajaran', NULL, NULL, '<div data-bind=\"markdown: currentTutorialStep() &amp;&amp; currentTutorialStep().Instructions\">\r\n    <h2>Mengirim data kembali ke server: metode 2</h2>\r\n\r\n    <p>Sebagai alternatif dari posting <code>&lt;form&gt;</code> HTML lengkap, Anda tentu saja dapat mengirim data model Anda ke server menggunakan request Ajax. misalnya,\r\n        <em>hapus</em> <code>&lt;form&gt;</code> yang baru saja Anda tambahkan di langkah sebelumnya, dan ganti dengan <code>&lt;button&gt;</code> sederhana:\r\n    </p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: save\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <p>... lalu implementasikan <code>save</code> fungsi simpan dengan menambahkan fungsi tambahan ke <code>TaskListViewModel</code>:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">TaskListViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave all the existing code unchanged ...  </span>\r\n\r\n    self.save = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n        $.ajax(<span class=\"string\">\"/tasks\"</span>, {\r\n            data: ko.toJSON({ tasks: self.tasks }),\r\n            type: <span class=\"string\">\"post\"</span>, contentType: <span class=\"string\">\"application/json\"</span>,\r\n            success: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(result)</span> {</span> alert(result) }\r\n        });\r\n    };\r\n}\r\n</code></pre>\r\n\r\n    <p>Dalam contoh ini, <code>success</code> handler hanya <code>memberitahu</code> apa pun yang ditanggapi server, hanya agar Anda dapat melihat server benar-benar menerima dan memahami data. Dalam aplikasi nyata, Anda akan lebih cenderung menampilkan pesan flash \"tersimpan\" atau mengalihkan ke halaman lain.\r\n    </p>\r\n</div>\r\n', NULL, 1, '2022-09-22 11:06:24', 1, '2023-12-27 08:23:56', 1),
(43, 'Loading and saving data', NULL, NULL, NULL, 5, 2, 5, 38, 4, 'materi_pembelajaran', NULL, NULL, '    <h2>Pelacakan penghapusan</h2>\r\n\r\n    <p>Jika pengguna telah menghapus beberapa data pada klien, bagaimana server tahu untuk menghapus catatan database yang sesuai? Salah satu kemungkinannya adalah server harus memeriksa kumpulan data yang masuk, membandingkannya dengan apa yang ada di database, dan menyimpulkan catatan mana yang dihapus. Tapi itu cukup canggung - jauh lebih baik jika klien mengirimkan data yang secara eksplisit menyatakan catatan mana yang dihapus.</p>\r\n\r\n    <p>Saat memanipulasi observable array, Anda dapat dengan mudah melacak penghapusan dengan menggunakan fungsi <code>destroy</code> untuk menghapus item.\r\n        Misalnya, perbarui fungsi <code>removeTask</code> anda:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">self.removeTask = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(task)</span> {</span> self.tasks.<span class=\"highlight\">destroy</span>(task) };\r\n</code></pre>\r\n\r\n    <p>Apa fungsinya? Yah, itu tidak lagi benar-benar menghapus instansi <code>Task</code> dari <code>tasks</code> array - sebagai gantinya, itu hanya menambahkan properti <code>_destroy</code>\r\n        ke instance <code>Task</code> dengan nilai. <code>true</code>. Ini sama persis dengan konvensi Ruby on Rails menggunakan <code>_destroy</code> untuk menunjukkan bahwa item yang dikirimkan harus dihapus.\r\n        <code>foreach</code> binding mengetahui hal ini, dan tidak akan menampilkan item apa pun dengan nilai properti itu (itulah sebabnya item menghilang saat dihancurkan).\r\n    </p>\r\n\r\n    <h3>Bagaimana server menangani ini?</h3>\r\n\r\n    <p>Jika Anda menyimpan data sekarang, Anda akan melihat bahwa server masih menerima item yang dihancurkan, dan server dapat mengetahui item mana yang ingin Anda hapus\r\n        (karena mereka memiliki properti <code>_destroy</code> yang disetel ke <code>true</code>).</p>\r\n\r\n    <ul>\r\n        <li>Jika Anda menggunakan fitur parsing JSON otomatis di Rails, ActiveRecord akan mengetahui bahwa Anda ingin menghapus item terkait.</li>\r\n        <li>Untuk teknologi lain, Anda dapat menambahkan sedikit kode sisi server untuk menemukan <code>_destroy</code> dan menghapus item tersebut.</li>\r\n    </ul>\r\n\r\n    <p>Jika Anda ingin melihat lebih jelas data apa yang diterima server dalam contoh ini, coba ganti tombol \"Save\" dengan ajax dengan teknik form-HTML dari langkah 3 dalam tutorial ini.\r\n        .</p>\r\n\r\n    <h3>Hei, penghitung tugas saya tidak lagi berfungsi!</h3>\r\n\r\n    <p>Perhatikan bahwa keterangan \"<em>You have x incomplete task(s)</em>\" tidak lagi memfilter item yang dihapus, arena properti <code>incompleteTasks</code> computed\r\n        tidak mengetahui apa pun tentang flag <code>_destroy</code> Perbaiki ini dengan memfilter tugas yang dihancurkan:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">self.incompleteTasks = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"keyword\">return</span> ko.utils.arrayFilter(self.tasks(), <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(task)</span> {</span> <span class=\"keyword\">return</span> !task.isDone() <span class=\"highlight\">&amp;&amp; !task._destroy</span> });\r\n});\r\n</code></pre>\r\n\r\n    <p>Sekarang UI akan secara konsisten melihat <code>_destroy</code>ed tasks tidak ada, meskipun mereka masih dilacak secara internal.</p>\r\n', NULL, 1, '2022-09-22 11:06:24', 1, '2023-12-27 08:23:56', 1),
(44, 'Introduction Database', NULL, NULL, NULL, 1, 2, 1, 1, NULL, '', NULL, NULL, '', NULL, 1, '2022-09-28 10:20:47', 1, '2023-09-08 14:40:11', 1),
(45, 'Build and Modify Database', NULL, NULL, NULL, 2, 2, 1, 1, NULL, '', NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/lJnvq0A_7WQ\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 1, '2022-09-28 10:23:03', 1, '2023-09-08 14:40:11', 1),
(46, 'Understand the concept of MVC (Model, View, Controller)', NULL, NULL, NULL, 1, 2, 1, 2, NULL, '', NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/Q0nfLi-4GBg\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 1, '2022-09-28 10:24:01', 1, '2023-09-08 14:40:11', 1),
(47, 'Authentication, User Management, and Permission Management', NULL, NULL, NULL, 2, 2, 1, 2, NULL, '', NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/Q0prVO3DCtU\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 1, '2022-09-28 10:46:47', 1, '2023-09-08 14:40:11', 1),
(48, 'CRUD Management for Data Master', NULL, NULL, NULL, 3, 2, 1, 2, NULL, '', NULL, NULL, '<p><iframe src=\"//www.youtube.com/embed/4r6WdaY3SOA\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 1, '2022-09-28 10:49:05', 1, '2023-09-08 14:40:11', 1),
(49, 'Operator dan variabel', NULL, NULL, NULL, 1, 1, 6, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2022-09-28 12:17:41', 1, '2024-01-12 09:59:54', 1),
(50, 'Operator dan variabel', NULL, NULL, NULL, 1, 2, 6, 49, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Variabel PHP</h2>\n<h4>Sintaks Perintah Membuat Variabel</h4>\nSuatu variabel digunakan untuk menyimpan suatu nilai, dapat berupa teks, angka, atau array.\nVariabel dalam PHP menggunakan simbol ‘$’ di awal namanya. Sintaks perintah membuat variabel:\n$nama_var = nilai;\n<h4>Tipe Data dari Variabel</h4>\nTipe data variabel tidak perlu didekalarasikan, PHP akan otomatis mengkonversi atau menentukan\ntipe data variabel berdasarkan nilai yang disimpannya. Contoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"tag\">$<span class=\"title\">nama</span> <span class=\"attribute\">= \'Alvina Khansa\';</span>\n    <span class=\"tag\">$<span class=\"title\">nilai</span> <span class=\"attribute\">= 90;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nVariabel nama diatas otomatis akan bertipe string, variabel nilai akan bertipe integer. \n<br>\nAturan Pemberian Nama Variabel\n<br>\n• Harus dimulai dengan huruf atau garis bawah (underscore) ‘_’.\n<br>\n• Hanya dapat menggunakan karakter alphanumeric dan underscore\n<br>\n• (A?Z / a?z / 0 ? 9, dan _)\n<br>\n• Sebaiknya tidak menggunakan spasi, jika nama variabel terdiri lebih dari satu kata, pisahkan\ndengan underscore ($nama_depan, $nilai_tugas) atau kapitalisasi ($namaDepan, $nilaiTugas)\n<br>\n<h4>Scope Variabel</h4>\nScope atau ruang lingkup variabel adalah bagian dari skrip yang dapat mereferensikan variabel\ntersebut. Ada 3 scope variabel dalam PHP:\n<h4>Scope Local</h4>\nSuatu variabel yang dibuat pada suatu fungsi akan menjadi variabel lokal (memiliki scope local)\ndan hanya bisa diakses di dalam fungsi. Nama variabel yang sama dapat dibuat dalam fungsi\nyang berbeda, sebab variabel lokal hanya dikenali oleh fungsi yang membentuk variabel\ntersebut. Variabel lokal akan dihapus setelah fungsi usai dieksekusi. Contoh:\n<br>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"tag\">function(){</span>\n       <span class=\"title\">$lokal</span> <span class=\"attribute\">= ’Saya hanya bisa diakses dari fungsi dimana saya berada’;</span>\n       <span class=\"title\">echo</span> <span class=\"attribute\">$lokal; //mencetak variable lokal</span>\n    <span class=\"tag\">}</span>\n    <span class=\"title\">echo</span> <span class=\"attribute\">$lokal; //akan terjadi error</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>Scope Global</h4>\nScope global dimiliki oleh variabel yang dibuat diluar fungsi. Variabel dengan scope global\ndapat diakses dari bagian manapun dari program selama perintah tersebut ditulis diluar suatu\nfungsi. Variabel global dapat diakses dari dalam suatu fungsi dengan menggunakan kata kunci\n‘global’. Contoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"tag\">$a = 10;</span>\n    <span class=\"tag\">function myTest(){</span>\n       <span class=\"attribute\">//mengacu ke variable scoper global</span>\n       <span class=\"title\">echo</span> <span class=\"attribute\">global $a;</span>\n    <span class=\"tag\">}</span>\n    <span class=\"title\">myTest()</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n\n<h4>Scope Statik</h4>\nKetika suatu fungsi selesai digunakan, secara normal semua variabelnya akan dihapus. Jika\ndiinginkan variabel?variabel tersebut tidak dihapus ketika fungsi selesai dipakai, gunakan kata kunci ‘static’ saat membuat variabel. Contoh pembuatan variabel statik :\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">static</span> <span class=\"attribute\">$varStatik;</span>\n<span class=\"title\">?</span>&gt;</span>\n<span class=\"title\">variabel $varStatik sekarang menjadi variabel statik. </span>\n</code></pre>\n<h2>Operator</h2>\nOperator digunakan untuk mengolah nilai. PHP memiliki beberapa kategori operator sebagai\nberikut:\n<br>\nOperator Hitung \n<br>\n+ Pertambahan \n<br>\n? Pengurangan  \n<br>\n* Perkalian\n<br> \n/ Pembagian \n<br>\n% Sisa hasil bagi  \n<br>\n++ Inkremen\n<br>\n?? dekremen\nContoh 1:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">//menghitung penjualan bersih</span>\n    <span class=\"title\">$jual = 100000;</span>\n    <span class=\"title\">$potongan = 0.1;</span>\n    <span class=\"title\">$net = $jual-($jual*$potongan);</span>\n    <span class=\"title\">echo \"Penjualan bersih = Rp $net,00\";</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh 2:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">//penggunaan operator modulus/sisa hasil bagi</span>\n    <span class=\"title\">$hal=10;</span>\n    <span class=\"title\">if ($hal % 2 == 0)</span>\n       <span class=\"title\">echo ‘Halaman genap’;</span>\n    <span class=\"title\">else</span>\n       <span class=\"title\">echo ‘Halaman ganjil’;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh 3:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">//penggunaan inkremen</span>\n    <span class=\"title\">for($i=1;$i<=100;$i++){</span>\n       <span class=\"title\">echo “$i ”;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>Operator Penugasan</h4>\n= sama dengan\n<br>\n+= tambah sama dengan contoh: a+=b artinya a=a+b\n<br>\n?= kurang sama dengan contoh: a-=b artinya a=a-b\n<br>\n*= kali sama dengan contoh: a*=b artinya a=a*b\n<br>\n/= bagi sama dengan contoh: a/=b artinya a=a/b\n<br>\n%= modulo(sisa hasil bagi) sama dengan contoh: a%=b artinya a=a%b\n<h4>Operator Perbandingan</h4>\n==  sama dengan  5==8 mengembalikan nilai false\n<br>\n!=  tidak sama dengan  5!=8 mengembalikan nilai true\n<br>\n<>  tidak sama dengan  5<>8 mengembalikan nilai true\n<br>\n>  lebih besar dari  5>8 mengembalikan nilai false\n<br>\n<  lebih kecil dari  5<8 mengembalikan nilai true\n<br>\n>=  lebih besar dari atau sama dengan 5>=8 mengembalikan nilai false\n<br>\n<=  lebih kecil dari atau sama dengan 5<=8 mengembalikan nilai true\n<br>\n<h4>Operator Logika</h4>\n&&(and)  contoh: x=6; y=3; (x < 10 && y > 1) mengembalikan true\n<br>\n||(or) contoh: x=6; y=3; (x==5 || y==5) mengembalikan false\n<br>\n!(not) contoh: x=6; y=3; !(x==y) mengembalikan true\n', NULL, 1, '2022-09-28 12:19:58', 1, '2023-12-27 08:23:56', 1),
(51, 'Conditional if', NULL, NULL, NULL, 2, 1, 6, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2022-09-28 12:20:50', 1, '2024-01-12 09:59:54', 1),
(52, 'Conditional if', NULL, NULL, NULL, 2, 2, 6, 51, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Struktur Kendali</h2>\nSeringkali alur eksekusi suatu program tidak berjalan lurus dari baris kode pertama sampai baris\nterakhir. Kadang?kadang pada suatu baris tertentu alur program bercabang (struktur keputusan). \nDi lain baris alur program akan kembali ke baris kode sebelumnya untuk mengulangi sekelompok\nperintah (struktur perulangan). \nStruktur keputusan dalam PHP mengenal struktur if dan switch. Untuk menerapkan suatu\nperulangan baris?baris kode program menggunakan struktur for, while, do...while, dan foreach.\nBerikut ini penjelasan masing?masing struktur tersebut.\n<h4>Struktur Keputusan</h4>\nKetika Anda menulis kode program, suatu saat Anda perlu menggunakan mekanisme percabangan\nsehingga berdasarkan kondisi program Anda akan melakukan aksi yang berbeda. Misalnya saja\nAnda ingin membuat program yang dapat menampilkan salam yang berbeda tergantung jenis hari\npada saat itu, maka kode programnya akan seperti ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n    <span class=\"attribute\">else</span>\n       <span class=\"attribute\">echo “Selamat bekerja dan berkarya”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nJika program diatas dijalankan pada hari Minggu, maka Anda akan memperoleh ucapan ‘Selamat\nberlibur’, tapi jika dijalankan selain hari Minggu akan memperoleh ucapan ‘Selamat bekerja dan\nberkarya’.\nYa, contoh diatas adalah salah satu penggunaan struktur kondisi (if) yang dimiliki PHP. Struktur if\nmempunyai beberapa format, berikut penjelasannya. \n<h4>If</h4>\nStruktur ini memiliki 3 jenis format pemakaian, yaitu:\n\n<h5>• Pertama, bila struktur ini hanya akan mengeksekusi beberapa kode program hanya jika nilai\nkondisi true, maka format yang digunakan:\n<pre>\n<span class=\"attribute\">if (kondisi_1)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_true;</span>\n</pre>\nContoh:</h5>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h5>• Kedua, baik nilai kondisi if true atau false akan sama?sama mengeksekusi suatu kode program,\nmaka format yang digunakan:\n<pre>\n<span class=\"attribute\">if (kondisi_1)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_true;</span>\n<span class=\"attribute\">else</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_false;</span>\n</pre>\nContoh:</h5>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n    <span class=\"attribute\">else</span>\n       <span class=\"attribute\">echo “Selamat bekerja dan berkarya”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h5>• Ketiga, bila ada beberapa kondisi yang perlu dievaluasi, maka format yang digunakan:\n<pre>\n<span class=\"attribute\">if (kondisi_1)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_true;</span>\n<span class=\"attribute\">elseif (kondisi_2)</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_2_true;</span>\n<span class=\"attribute\">else</span>\n  <span class=\"attribute\">kode_yang_akan dieksekusi_bila_nilai_kondisi_1_dan_2_false;</span>\n</pre>\nContoh:</h5>\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”)</span>\n       <span class=\"attribute\">echo “Selamat berlibur”;</span>\n    <span class=\"attribute\">elseif ($hari==”Sat”)</span>\n       <span class=\"attribute\">echo “Selamat libur panjang”;</span>\n    <span class=\"attribute\">else</span>\n       <span class=\"attribute\">echo “Selamat bekerja dan berkarya”;</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nJika kode program yang akan dieksekusi dalam if lebih dari satu, maka kode?kode program tersebut\nharus dikurung dengan tanda kurung kurawal buka dan tutup seperti ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$hari=date(“D”);</span>\n    <span class=\"attribute\">if ($hari==”Mon”){</span>\n       <span class=\"attribute\">echo “Hai coy,<br />”;</span>\n       <span class=\"attribute\">echo “Selamat berlibur<br />”;</span>\n       <span class=\"attribute\">echo “Jangan lupa pesenanku ya”;</span>\n    <span class=\"attribute\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>Switch</h4>\nJika dalam program ada banyak pilihan, maka lebih baik menggunakan switch. Sintaksnya:\n<pre>\n<span class=\"attribute\">switch(n){</span>\n  <span class=\"attribute\">case label_1 : pernyataan_yg_dieksekusi_jika_n=label_1;</span>\n  <span class=\"attribute\">break;</span>\n  <span class=\"attribute\">case label_2 : pernyataan_yg_dieksekusi_jika_n=label_2;</span>\n  <span class=\"attribute\">break;</span>\n  <span class=\"attribute\">default : dieksekusi_bila_nilai_n_bukan_label2_atau_label_1;</span>\n<span class=\"attribute\">}</span>\n</pre>\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"attribute\">$x=1;</span>\n    <span class=\"attribute\">switch ($x){</span>\n      <span class=\"attribute\">case 1:</span>\n      <span class=\"attribute\">echo \"Number 1\";;</span>\n      <span class=\"attribute\">break;</span>\n      <span class=\"attribute\">case 2:</span>\n      <span class=\"attribute\">echo \"Number 2\";;</span>\n      <span class=\"attribute\">break;</span>\n      <span class=\"attribute\">case 3:</span>\n      <span class=\"attribute\">echo \"Number 3\";;</span>\n      <span class=\"attribute\">break;</span>\n      <span class=\"attribute\">default :</span>       \n      <span class=\"attribute\">echo \"No number between 1 and 3\";</span>\n    <span class=\"attribute\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>', NULL, 1, '2022-09-28 12:21:38', 1, '2023-12-27 08:23:56', 1),
(53, 'Looping', NULL, NULL, NULL, 3, 1, 6, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2022-09-28 12:22:40', 1, '2024-01-12 09:59:54', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(54, 'Looping', NULL, NULL, NULL, 3, 2, 6, 53, 3, 'materi_pembelajaran', NULL, NULL, '<h2>Struktur Perulangan (Loop)</h2>\n<h4>PHP mempunyai beberapa struktur perulangan:</h4>\n<h4>for</h4>\nFor merupakan struktur perulangan yang sering digunakan dalam pemrograman. Sintaksnya:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">for (inisialisasi; kondisi; inkremen){</span>\n       <span class=\"title\">kode yang akan ndieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nTiga parameternya:\ninisialisasi  :  nilai awal konter\n<br>\nkondisi   :  parameter yang akan dievaluasi pada setiap  iterasi  perulangan.  Jika  hasil evaluasi true, perulangan akan dilanjutkan, bila false perulangan akan dihentikan\n<br>\ninkremen  :  nilai pertambahan konter setiap satu iterasi perulangan diselesaikan. Setiap parameter di atas bersifat opsional.\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">for($i=1;$i<=100;$i++){</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh for tanpa parameter kondisi:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">for($i=1;;$i++){</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n       <span class=\"title\"> if ($i>=5) exit;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>foreach</h4>\nPerulangan ini disediakan PHP untuk memudahkan kita mengakses elemen?elemen suatu array.\nSintaks:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">foreach ($array as $value){</span>\n       <span class=\"title\">kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nPada setiap iterasi perulangan, nilai dari elemen array yang sedang ditunjuk oleh pointer akan\ndiletakkan ke variabel $value kemudian pointer akan bergerak menunjuk elemen array berikutnya\nsehingga pada iterasi selanjutnya, elemen array berikutnya yang akan diolah.\nContoh berikut akan mencetak nilai “satu”, “dua”, dan “tiga” secara berturut?turut:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">$x=array(\"satu\",\"dua\",\"tiga\");</span>\n    <span class=\"title\">foreach ($x as $value){</span>\n       <span class=\"title\">echo $value . \"<br />\";</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\n<h4>While</h4>\n\nPerulangan while akan menjalankan suatu blok kode (sekelompok kode) selama kondisinya bernilai\ntrue. Sintaks perulangan ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">while(condition){</span>\n       <span class=\"title\">kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">$i=1;</span>\n    <span class=\"title\">while($i<=5){</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n       <span class=\"title\">$i++;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh while di atas akan terus menjalankan blok kodenya selama nilai dari variabel $i lebih kecil\natau sama dengan 5. Dan pada setiap iterasinya, nilai variabel $i akan bertambah 1 ($i++)\n<h4>Do...while</h4>\nSatu yang unik dari perulangan ini adalah, dia pasti akan melakukan iterasi, minimal satu kali,\nmeskipun nilai kondisinya tidak pernah true. Hal ini disebabkan struktur perulangan yang\nmenyebabkan blok kode akan dijalankan lebih dulu, lalu kondisinya dievaluasi belakangan. Sintaks\nperulangan ini:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">do{</span>\n       <span class=\"title\">kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span><span class=\"title\">while(kondisi);</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">$i=1;</span>\n    <span class=\"title\">do{</span>\n       <span class=\"title\">$i++;</span>\n       <span class=\"title\">echo \"Bilangan ke?$i:  \" . $i . \"<br />\";</span>\n    <span class=\"title\">}</span><span class=\"title\">while ($i<=5);</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nContoh di atas akan menjalankan kode $i++ dan echo \"Bilangan ke?$i:  \" . $i . \"<br />\"; terlebih dahulu,\nsetelah itu baru kondisinya dievaluasi.', NULL, 1, '2022-09-28 12:22:40', 1, '2023-12-27 08:23:56', 1),
(55, 'Function', NULL, NULL, NULL, 4, 1, 6, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2022-09-28 12:25:14', 1, '2024-01-12 09:59:54', 1),
(56, 'Function', NULL, NULL, NULL, 4, 2, 6, 55, 4, 'materi_pembelajaran', NULL, NULL, '<h2>Fungsi</h2>\nSebuah fungsi dibuat dengan aturan sintaks:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">function namaFungsi() {</span>\n       <span class=\"title\">kode?kode yang akan dieksekusi;</span>\n    <span class=\"title\">}</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nBeberapa petunjuk dalam membuat sebuah fungsi:\n<br>\n• Namai fungsi yang menggambarkan fungsinya\n<br>\n• Nama fungsi dimulai dengan huruf atau garis bawah (underscore), tidak boleh angka.\n<br>\n<h4>Pemanggilan Fungsi</h4>\nKetika fungsi sudah dibuat, dia dapat dijalankan dengan cara dipanggil. Pemanggilan suatu fungsi\nmengikuti pola: nama fungsi lalu diikuti tanda kurung dan nilai parameter jika ada. Contoh:\n<br>\n<b>tambah(10,20);</b>\n<br>\nMemanggil sebuah fungsi bernama tambah dengan nilai parameter 10 dan 20. Jika tidak ada nilai\nparameter, maka pemanggilan fungsi:\n<br>\n<b>cetak();</b>\n<h4>Parameter Fungsi</h4>\nUntuk menambah daya guna fungsi dapat ditambahkan parameter fungsi yang tidak lain adalah\nserupa variabel. Parameter ini dituliskan sesudah nama fungsi didalam tanda kurung. Dengan\nparameter ini, hasil dari fungsi dapat diatur sesuai dengan keinginan.\nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">function namaProg ($fprogram) {</span>\n       <span class=\"title\">  echo $fname . “<br />”</span>\n    <span class=\"title\">}</span>\n    <span class=\"title\">echo “Bahasa membuat struktur dan konten adalah ”.namaProg(“HTML”);</span>\n    <span class=\"title\">echo “Unsur interaktif diberikan oleh ”.namaProg(“Javascript”);</span>\n    <span class=\"title\">echo “Memperindah tampilan fungsi dari ”.namaProg(“CSS”);</span>\n    <span class=\"title\">echo “Aplikasi web pengolahan data menggunakan ”.namaProg(“PHP”);</span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nHasil dari fungsi diatas (nama program) dapat diubah?ubah dengan memberi nilai berbeda pada\nparameter $fprogram saat pemanggilan fungsi.\n<h4>Nilai Balik Fungsi</h4>\nFungsi dapat diatur agar mengembalikan hasil berupa nilai dengan cara menggunakan kata kunci\nreturn. \nContoh:\n<pre><code>\n<span class=\"tag\">&lt;<span class=\"title\">?php</span>\n    <span class=\"title\">function tambah(){</span>\n       <span class=\"title\">$total = $x + $y;</span>\n       <span class=\"title\">return $total;</span>\n    <span class=\"title\">}</span>\n    <span class=\"title\">echo “$x + $y = ” . tambah(5,20);  </span>\n<span class=\"title\">?</span>&gt;</span>\n</code></pre>\nNilai yang dikembalikan pada fungsi diatas adalah jumlah dari nilai variabel $x dan $y yang  ada\ndidalam variabel $total. Hasil di layar browser adalah tampilan 5 + 20 = 25', NULL, 1, '2022-09-28 12:25:14', 1, '2023-12-27 08:23:56', 1),
(57, 'Array', NULL, NULL, NULL, 5, 1, 6, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2022-09-28 12:26:55', 1, '2024-01-12 09:59:54', 1),
(58, 'Array', NULL, NULL, NULL, 5, 2, 6, 57, 5, 'materi_pembelajaran', NULL, NULL, '<h2>Array</h2>\nArray adalah jenis tipe data khusus yang menyimpan sejumlah nilai data dalam sebuah variabel.\nNilai?nilai data tersebut, yang disebut elemen array, memiliki indeks yang menunjukkan urutannya\ndalam  array. Elemen array pertama akan memiliki indeks 0, elemen kedua berindeks 1, dan\nseterusnya.\n<br>\nDengan array, proses pencarian data tertentu akan mudah dilakukan. Misalkan Anda memiliki data\nnama barang elektronik yang disimpan dalam variabel tunggal seperti ini:\n<br>\n  $brg1=”DVD”;<br>\n  $brg2=”Televisi”;<br>\n  $brg3=”Lemari es”;<br>\nBagaimana jika kita ingin mencari barang elektronik tertentu dengan menggunakan perulangan\nterhadap kelompok variabel tersebut? Tentu akan repot dengan berbagai kode yang harus kita buat\nuntuk menentukan nomor urut variabel tersebut terlebih dahulu dan sebagainya. Lain halnya jika\nmenggunakan array, kita hanya perlu menggunakan indeks array untuk menemukan barang\nelektronik yang kita cari. \n<h4>Membuat Array</h4>\nMembuat array dalam PHP menggunakan fungsi array().\nContoh:\n<br>\n$brg = array (“DVD”,”Televisi”,”Lemari es”);\nUntuk mengakses elemen array tersebut dengan menggunakan indeksnya. Nilai data “Televisi”\ndapat diakses dengan kode $brg[1]. Misalnya dicetak, maka perintahnya adalah:\n<br>\necho “Elemen array kedua adalah : ” . $brg[1];\n<br>\nArray juga dapat dibuat dengan cara menentukan indeksnya langsung seperti:\n<br>\n  $brg[0]=”DVD”;\n<br>\n  $brg[1]=”Televisi”;\n<br>\n  $brg[2]=”Lemari es”;\n<br>\n<h4>Jenis Array</h4>\nDalam PHP terdapat 3 jenis array, yaitu\n<h5>array numerik (indexed arrays)</h5>\n<h5>array assosiatif  (associative array)</h5>\n<h5>array multidimensi (multidimensional array)</h5>\n\n<h4>Array numerik</h4>\nJenis array yang berindeks numeris seperti contoh sebelumnya.\n<h4>Array assosiatif</h4>\nJenis array yang memiliki indeks berupa string.\n<h4>Array multidimensi</h4>\nJenis arary yang indeksnya juga array. Artinya, elemen dari array jenis ini berupa suatu array juga.\nContoh:\n<br>\n$mhs = array (\n<br>\n    array (‘A12.2010.04567’, ’Anita Larasati’, 3.5);\n<br>\n    array (‘A12.2010.05678’, ’Dude Harmono’, 3);\n<br>\n    array (‘A12.2010.06789’, ’Ernawati Listyani’, 2.75);\n<br>\n)\n<br>\nUntuk mengakses elemen array multidimensi, misalkan akan dicetak, maka kodenya:\n<br>\n  echo “NIM : “ . $mhs[0][0]. “Nama : ” . $mhs[0][1] . “IPK : ” . $mhs[0][2] . “<br />”;\n<br>\n  echo “NIM : “ . $mhs[1][0]. “Nama : ” . $mhs[1][1] . “IPK : ” . $mhs[1][2]; . “<br />”;\n<br>\n  echo “NIM : “ . $mhs[2][0]. “Nama : ” . $mhs[2][1] . “IPK : ” . $mhs[2][2];\n<br>\n<h4>Mencari Panjang Suatu Array</h4>\nSeperti diketahui array terdiri dari sejumlah elemen array. Untuk mengetahui jumlah elemen dalam\nsuatu array atau panjang suatu array dapat menggunakan fungsi count().\nContoh:\n<br>\n  $mobil = array (“Volvo”,”Jaguar”, “Mercedez”);\n<br>\n  echo “Panjang array adalah : ” . count($mobil);\n<br>\nFungsi count() diatas akan mengembalikan nilai panjang array yaitu 3.\n<h4>Mencetak Seluruh Elemen Array</h4>\nUntuk mencetak seluruh elemen array dapat digunakan suatu perulangan for sebagai berikut:\n<br>\n  $mobil = array (“Volvo”,”Jaguar”, “Mercedez”);\n<br>\n  $jum = count($mobil);\n<br>\n  for ($i=0; $i<$jum; $i++) {\n<br>\n    echo $mobil[$i] . ‘<br />’;\n<br>\n  }\n<br>\n<h4>Array Assosiatif</h4>\nPenulisan indeks untuk jenis array ini bagi Anda yang tidak terbiasa akan terbilang ganjil.  Tetapi\njika sudah terbiasa tidak akan menjadi masalah. Kode pembuatan array jenis ini jika menggunakan\nfungsi array() tampak seperti berikut ini:\n<br>\n  $umur = array (“Joni”=>”17”, “Indra”=>”18”, “Susi”=>”16”);\n<br>\n  echo “Joni berusia “ . $umur(“Joni”) . “ tahun”;\n<br>\nTampak dalam menentukan elemen?elemen array diatas menggunakan simbol “=>” yang dibuat\ndengan simbol sama dengan (“=”) dikombinasikan dengan simbol lebih besar (“>”).\nUntuk mencetak seluruh nilai elemen array jenis ini dapat menggunakan perulangan foreach,\nseperti ini:\n<br>\n  $umur = array (“Joni”=>”17”, “Indra”=>”18”, “Susi”=>”16”);\n<br>\n  foreach ($umur as $x=>$nilaiX) {\n<br>\n    echo “Indeks “ . $x . “ bernilai “ . $nilaiX . “<br />”;\n<br>\n  }\n<br>\n\n', NULL, 1, '2022-09-28 12:26:55', 1, '2023-12-27 08:23:56', 1),
(59, 'Introduction', NULL, NULL, NULL, 1, 1, 7, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 11:06:36', 1, '2024-01-12 09:59:54', 1),
(60, 'introduction', NULL, NULL, NULL, 1, 2, 7, 59, 1, 'materi_pembelajaran', NULL, NULL, '\r\n<style>\r\n/* (A) CONTAINER */\r\n#grid-layout {\r\n  /* (A1) GRID LAYOUT */\r\n  display: grid;\r\n  grid-gap: 10px;\r\n \r\n  /* (A2) DESIGN YOUR GRID TEMPLATE */\r\n  grid-template-areas:\r\n  \"head head head head\"\r\n  \"main main side side\"\r\n  \"foot foot side side \";\r\n}\r\n\r\n/* (B) GRID CELLS */\r\n.cell { padding: 10px; }\r\n \r\n/* (C) ASSIGN THE AREAS */\r\n.head {\r\n  grid-area: head;\r\n  background: #ffe5db;\r\n}\r\n.main {\r\n  grid-area: main;\r\n  background: #e3ffdb;\r\n}\r\n.side {\r\n  grid-area: side;\r\n  background: #dbf8ff;\r\n}\r\n.foot {\r\n  grid-area: foot;\r\n  background: #ebebeb;\r\n}\r\n</style>\r\n<h1>KENAPA BELAJAR JAVASCRIPT ?</h1>\r\n<ul>\r\n<li>Javascript Mudah untuk Dipelajari</li>\r\n<li>Javascript adalah bahasa yang populer</li>\r\n<li>Javascript sudah tertanam di browser sehingga bisa secara langsung digunakan </li>\r\n</ul>\r\n\r\n<h2>Bagaimana cara Inisialisasi di javascript ?</h2>\r\n\r\n<div id=\"grid-layout\">\r\n  <div class=\"cell head\"><strong>Pengenalan Variabel dan Sifatnya</strong>\r\n<br>\r\n<p>Note:Console Log akan menprint value yang ada di dalama console browser anda , cara mengecek console browser adalah dengan menekan CTR+SHIFT+I secara bersamaan </p>\r\n<br>\r\n</div>\r\n  <div class=\"cell main\">\r\n\r\n&lt;script&gt; &lt;-- file script masukan ke dalam kolom JS \r\n<hr>\r\nlet&nbsp;x;\r\n<br>\r\nx&nbsp;=&nbsp;5;\r\n<br>\r\nconsole.log(x)\r\n<hr>\r\nlet&nbsp;x&nbsp;=&nbsp;5;\r\nlet&nbsp;y&nbsp;=&nbsp;6;\r\n<br>\r\nconsole.log(x,y)\r\n<hr>\r\nlet&nbsp;x&nbsp;=&nbsp;5,&nbsp;y&nbsp;=&nbsp;6,&nbsp;z&nbsp;=&nbsp;7;\r\n<br>\r\nconsole.log(x,y,z)\r\n<hr>\r\n&lt;/script&gt\r\n</div>\r\n  <div class=\"cell side\">\r\nvariabel tidak bisa di mulai dengan angka \r\n<br>\r\nContoh :\r\nLet&nbsp;1a&nbsp;=&nbsp;&#39;hello&#39;;\r\n<hr>\r\nPada kasus sensitive pemberian nama variable  semisal x dan X \r\ndianggap berbeda\r\n<br>\r\n<br>\r\nlet&nbsp;x&nbsp;=&nbsp;&quot;hellow&quot;;\r\n<br>\r\nlet&nbsp;X&nbsp;=&nbsp;123;\r\n<br>\r\n<br>\r\nconsole.log(x);&nbsp;\r\nconsole.log(X);&nbsp;\r\n<hr>\r\nconst&nbsp;x&nbsp;=&nbsp;5;\r\nx&nbsp;=&nbsp;10;&nbsp;&nbsp;//&nbsp;ERROR constant dimana variable yang sudah deklarasi tidak bisa di ganti-ganti \r\n<br>\r\nconsole.log(x)\r\n<hr>\r\nBisa di ganti dengan tipe variable yang berbeda .\r\n<br>\r\nvar x = \"Hanya Variabel\";\r\n<br>\r\nx=123;\r\n<br>\r\nconsole.log(x);\r\n<br>\r\n\r\n\r\n  </div>\r\n  <div class=\"cell foot\">\r\n\r\nselain itu kita juga bisa menggabungkan string dengan string \r\n<br>\r\nconst&nbsp;greet&nbsp;=&nbsp;&#39;Hello&#39;;\r\n<br>\r\nconst&nbsp;name&nbsp;=&nbsp;&#39;Jack&#39;;\r\n<br>\r\nconsole.log(greet&nbsp;+&nbsp;&#39;&nbsp;&#39;&nbsp;+&nbsp;name)\r\n<hr>\r\nPemanggilan Variable String \r\n<br>\r\nconst&nbsp;name&nbsp;=&nbsp;&#39;ram&#39;;\r\n<br>\r\nconst&nbsp;name1&nbsp;=&nbsp;&quot;hari&quot;;\r\n<br>\r\nconst&nbsp;result&nbsp;=&nbsp;`The&nbsp;names&nbsp;are&nbsp;${name}&nbsp;and&nbsp;${name1}`;\r\n<br>\r\nconsole.log(result);\r\n<br>\r\n</div>\r\n</div>\r\n\r\n\r\n  \r\n', NULL, 1, '2022-10-03 11:09:11', 1, '2023-12-27 08:23:56', 1),
(61, 'introduction', NULL, NULL, NULL, 2, 2, 7, 59, 1, 'materi_pembelajaran', NULL, NULL, ' \r\n<h1>HTML DOM </h1>\r\n<p> Ketika browser loaded, browser membuat <b>D</b>ocument <b>O</b>bject <b>M</b>odel di Web-Browsernya</p>\r\n\r\nHal Paling simple untuk menerangkan HTML DOM itu apa coba lah ketik nama kalian pada\r\nkotak di bawah ini\r\n<hr>\r\n<html>\r\n<label for=\"message\">Message:</label>\r\n    <input type=\"text\" class=\"inputDemo\" id=\"messageDemo\" name=\"messageDemo\">\r\n    <p id=\"resultDemo\"></p>\r\n</html>\r\n\r\n<script>\r\n let inputDemo = document.querySelector(\'.inputDemo\');\r\n        let resultDemo = document.querySelector(\'#resultDemo\');\r\n        inputDemo.addEventListener(\'keyup\', function () {\r\n            resultDemo.textContent = this.value;\r\n        });\r\n</script>\r\n<hr>\r\n\r\n\r\n<br>\r\n<p><strong>Apa yang terjadi ?</strong>. Konten-nya ter-update secara dinamik ,secara simple</p>\r\n<p><strong>Jadi Apa itu DOM ?</strong> adalah platform antar muka yang memungkinkan progam dan skrip untuk mengakses konten, struktur, dan gaya dokumen secara dinamis.</p>\r\n<br>\r\n<p>HTML:</p>\r\n&nbsp;&lt;label&nbsp;for=&quot;message&quot;&gt;Message:&lt;/label&gt;\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type=&quot;text&quot;&nbsp;class=&quot;input\r\n&quot;&nbsp;id=&quot;message&quot;&nbsp;name=&quot;message&quot;&gt;\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&nbsp;id=&quot;result&quot;&gt;&lt;/p&gt;\r\n<br>\r\n<br>\r\n<p>JS:</p>\r\n&nbsp;&nbsp;&nbsp;let&nbsp;input&nbsp;=&nbsp;document.querySelector(&#39;.input&#39;);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;let&nbsp;result&nbsp;=&nbsp;document.querySelector(&#39;#result&#39;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;input.addEventListener(&#39;keyup&#39;,&nbsp;function&nbsp;()&nbsp;{<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;result.textContent&nbsp;=&nbsp;this.value;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;});\r\n\r\n<hr>\r\nInisialisasi <b>input</b> dengan <b>class input</b> :\r\n<br>\r\nlet&nbsp;<strong>input</strong>&nbsp;=&nbsp;document.querySelector(&#39;<b>.input&#39;</b>);\r\n<br><br>\r\nInisialisasi <b>result</b> dengan <b>id result</b> :\r\nlet result = document.querySelector(\'#result\');\r\n<br>\r\n<p>Note: Pemanggilan class menggunakan <b>(.)</b> sedangkan pemanggilan id menggunakan <b>(#)</b>.</p>\r\n<br>\r\n\r\n\r\n\r\n', NULL, 1, '2022-10-03 11:10:45', 1, '2023-12-27 08:23:56', 1),
(62, 'introduction', NULL, NULL, NULL, 3, 2, 7, 59, 1, 'materi_pembelajaran', NULL, NULL, ' \r\n<div align=\"center\"><h1>Classes </h1></div>\r\n<br><br>\r\n\r\n<p> \r\n\r\n <b>Class</b> adalah template untuk membuat objek. Class merangkum data dengan kode .Class di JS dibangun dengan struktur tertentu yang dimana memiliki beberapa sintaks .\r\n</p>\r\nIni adalah cara Inisialisas Suatu Class di JavaScript :\r\n<br>\r\nclass name {&#10; <br>\r\n &nbsp;constructor() {&#10;  <br>    \r\n &nbsp;this.firstname =\"Kentaro\";&#10;     <br>\r\n &nbsp;this.lastname = \"Madison\";&#10;  }&#10; <br>\r\nget&nbsp;name(){<br>\r\n&nbsp;return&nbsp;this.firstname&nbsp;+&nbsp;&quot;&nbsp;&quot;+this.lastname<br>\r\n&nbsp;}<br>\r\n}  <br>  <br>\r\n\r\nvar nama=new name()\r\n<br>\r\n\r\nconsole.log(nama.name)\r\n<br>\r\n\r\n<hr>\r\n<br>\r\n<hr>\r\nSekarang Kalian bisa Lihat di console kalian (CTRL + SHIFT + I) .Apa yang tertulis di sana ? gabungan antara properti firstname dan lastname . <br><br>\r\nSekarang Coba Tambahkan :<br>\r\nDi HTML :\r\n<br>\r\n&lt;p&nbsp;id=&quot;fullname&quot;&gt;&lt;/p&gt; \r\n<br>\r\nDi JavaScript :\r\n<br>\r\ndocument.getElementById(&quot;fullname&quot;).innerHTML&nbsp;=&nbsp;nama.name\r\n<br>\r\n<br>\r\nMaka Akan Program Akan di Tampilkan di Suatu Paragraph dengan inisialisasi ID nya\r\n\r\n<hr>\r\nKasus Memperbaiki Huruf Yang tidak Kapital seperti firtname di sini :\r\n<br>\r\nclass&nbsp;name&nbsp;{ <br>\r\n&nbsp;constructor()&nbsp;{<br>\r\n&nbsp;this.firstname&nbsp;=&quot;bento&quot;;<br>\r\n&nbsp;this.lastname&nbsp;=&nbsp;&quot;Madison&quot;;<br>\r\nthis.up&nbsp;=&nbsp;this.firstname.charAt(0).toUpperCase()+this.firstname.slice(1);<br>&nbsp;<br>\r\n<br>}\r\n\r\n\r\nget&nbsp;name(){<br>\r\n&nbsp;return&nbsp;this.up&nbsp;+&nbsp;&quot;&nbsp;&quot;+this.lastname<br>\r\n&nbsp;}<br>\r\n}<br>\r\nvar&nbsp;nama=new&nbsp;name()<br>\r\nconsole.log(nama.name)<br>\r\ndocument.getElementById(&quot;fullname&quot;).innerHTML&nbsp;=&nbsp;nama.name<br>\r\n<br>\r\n <br>  <br>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', NULL, 1, '2022-10-03 11:13:21', 1, '2023-12-27 08:23:56', 1),
(63, 'List And Collection', NULL, NULL, NULL, 2, 1, 7, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 11:15:11', 1, '2024-01-12 09:59:54', 1),
(64, 'list and collection ', NULL, NULL, NULL, 2, 2, 7, 63, 2, 'materi_pembelajaran', NULL, NULL, '\r\n<h1>List</h1>\r\n<h3>Di Dalam Javascript List secara stuktur dan desain  dapat di modifikasi \r\nsehingga menghasilkan suatu bentuk list yang dynamic ,untuk menambah pemahaman kalian terkait list ,saya sudah menyiapkan code yang dapat kalian coba seperti pada di bawah ini: </h3><br>\r\n<br>\r\n\r\n\r\n\r\n  <div class=\"row\">\r\n    <div class=\"col\"> \r\n\r\n    &lt;div class=\"container\"&gt;<br>\r\n    &lt;div class=\"wrap\"&gt;<br>\r\n        &lt;h2&gt;Add Dynamic Input Field&lt;/h2&gt;<br>\r\n        &lt;button  class=\"add\"&gt;&amp;plus;&lt;/button&gt;<br>\r\n        &lt;div class=\"inp-group\"&gt;<br>\r\n        &lt;/div&gt;<br>\r\n    &lt;/div&gt;<br>\r\n&lt;/div&gt;<br>\r\n\r\n\r\n    </div>\r\n    <div class=\"col\">\r\nconst addBtn = document.querySelector(\".add\");<br>\r\nconst input =  document.querySelector(\".inp-group\");<br>\r\n<br>\r\n<br>\r\nfunction removeInput(){<br>\r\n<br>\r\n    this.parentElement.remove();<br>\r\n}<br>\r\nfunction addInput() {<br>\r\n    const name=document.createElement(\"input\");<br>\r\n    name.type=\"text\";<br>\r\n    name.placeholder=\"enter your name\";<br>\r\n<br>\r\n    const email =document.createElement(\"input\");<br>\r\n    email.type=email;<br>\r\n    email.placeholder=\"Enter Your Email\";<br>\r\n<br>\r\n    const  btn=document.createElement(\"button\");<br>\r\n    btn.className= \"delete\";<br>\r\n    btn.innerHTML=\"&amp;times\";<br>\r\n<br>\r\n    btn.addEventListener(\"click\",removeInput);<br>\r\n<br>\r\n    const flex=document.createElement(\"div\");<br>\r\n    flex.className=\"flex\";<br>\r\n<br>\r\n    input.appendChild(flex);<br>\r\n    flex.appendChild(name);<br>\r\n    flex.appendChild(email);<br>\r\n    flex.appendChild(btn);<br>\r\n<br>\r\n<br>\r\n}<br>\r\naddBtn.addEventListener(\"click\",addInput)<br>\r\n    </div>\r\n  </div>\r\n\r\n\r\n\r\n\r\n\r\n', NULL, 1, '2022-10-03 11:17:07', 1, '2023-12-27 08:23:56', 1),
(65, 'list and collection ', NULL, NULL, NULL, 1, 2, 7, 63, 2, 'materi_pembelajaran', NULL, NULL, '\r\n<h1 align=\"center\">LIST</h1><br>\r\nKita tahu javascript bisa mengontrol berbagai elements agar tampilan-Nya Terlihat lebih interaktif dan dinamis,saya akan mencontohkan salah satunya adalah List. Sebagai contoh Nya dapat kalian lihat di bawah ini :<br>\r\ncukup gunakan html ini saja tapi ganti javascriptnya :\r\n&lt;p id=\"demo\"&gt;&lt;/p&gt;\r\n\r\n<br>\r\n<br>\r\nmembuat list langsung di HTML udah biasa, tapi banyangin kalau list kalian udah mencapai tahap puluhan / ratusan (aku rasa kalian akan kelamaan dalam coding dan dirasa kurang flexible).<br>\r\nMaka Cobalah code ini :<br>\r\nconst people = [\"andi\", \"dinda\", \"tira\", <br>\"lily\",\"jimmy\",\"keli\",\"samsul\",\"koley\"];<br>\r\nlet pLen = people.length;<br>\r\n<br>\r\nlet text = \"&lt;ul&gt;\";<br>\r\nfor (let i = 0; i &lt; pLen; i++) {<br>\r\n  text += \"&lt;li&gt;\" + people[i] + \"&lt;/li&gt;\";<br>\r\n}<br>\r\ntext += \"&lt;/ul&gt;\";<br>\r\n<br>\r\ndocument.getElementById(\"demo\").innerHTML = text;<br>\r\n\r\n\r\n\r\n', NULL, 1, '2022-10-03 11:20:38', 1, '2023-12-27 08:23:56', 1),
(66, 'list and collection ', NULL, NULL, NULL, 3, 2, 7, 63, 2, 'materi_pembelajaran', NULL, NULL, '<h1>Mau Yang Lebih menantang ?</h1>\r\n<h3>Perhatikan Code di bawah ini :</h3>\r\n<br>\r\n<br>\r\n<p>javascript:</p>\r\n<br>\r\nconst addBtn = document.querySelector(\".add\");<br>\r\nconst input =  document.querySelector(\".inp-group\");<br>\r\nconst manusia = [\"andi\", \"dinda\", \"tira\",<br>\r\n\"lily\",\"jimmy\",\"keli\",\"samsul\",\"koley\"];<br>\r\n<br>\r\nfunction removeInput(){<br>\r\n<br>\r\n    this.parentElement.remove();<br>\r\n}<br>\r\nfunction addInput() {<br>\r\n    const name=document.createElement(\"input\");<br>\r\n    name.type=\"text\";<br>\r\n    name.placeholder=\"enter your name\";<br>\r\n<br>\r\n    const inisials=document.createElement(\"select\");<br>\r\n    inisials.innerHTML = \"\";<br>\r\n    <br>\r\n<br>\r\n    for(let i=0 ; i&lt;manusia.length;i++){<br>\r\n    const inisial=document.createElement(\"option\");<br>\r\n    inisial.textContent=manusia[i];<br>\r\n    inisial.value=manusia[i];<br>\r\n    inisials.appendChild(inisial)<br>\r\n    }<br>\r\n    <br>\r\n<br>\r\n    const  btn=document.createElement(\"button\");<br>\r\n    btn.className= \"delete\";<br>\r\n    btn.innerHTML=\"&amp;times\";<br>\r\n<br>\r\n    btn.addEventListener(\"click\",removeInput);<br>\r\n<br>\r\n    const flex=document.createElement(\"div\");<br>\r\n    flex.className=\"flex\";<br>\r\n\r\n    input.appendChild(flex);<br>\r\n    flex.appendChild(name);<br>\r\n    flex.appendChild(inisials);<br>\r\n    flex.appendChild(btn);<br>\r\n<br>\r\n<br>\r\n}<br>\r\naddBtn.addEventListener(\"click\",addInput)<br>\r\n<br>\r\n\r\nHTML: <br>\r\n<br>\r\n&lt;div class=\"container\"&gt;<br>\r\n    &lt;div class=\"wrap\"&gt;<br>\r\n        &lt;h2&gt;Add Dynamic Input Field&lt;/h2&gt;<br>\r\n        &lt;button  class=\"add\"&gt;&amp;plus;&lt;/button&gt;<br>\r\n        &lt;div class=\"inp-group\"&gt;<br>\r\n<br>\r\n        &lt;/div&gt;<br>\r\n    &lt;/div&gt;<br>\r\n&lt;/div&gt;<br>\r\n\r\n', NULL, 1, '2022-10-03 11:22:22', 1, '2023-12-27 08:23:56', 1),
(67, 'Custom Bindings', NULL, NULL, NULL, 3, 1, 7, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 11:24:05', 1, '2024-01-12 09:59:54', 1),
(68, 'custom bindings', NULL, NULL, NULL, 1, 2, 7, 67, 3, 'materi_pembelajaran', NULL, NULL, '<h1 align=\"center\">Sistem Pendataan Nilai Siswa</h1>\r\n<p>Bagaimana Jadinya Jika kita Memerlukan suatu sistem yang flexible yang bisa menghadle semua nilai siswa yang ada, cara paling simple untuk menjelaskannya bisa kalian liat code di bawah ini:</p>\r\n\r\n<br>\r\nJavascript:<br>\r\n\r\n\r\nconst&nbsp;addBtn&nbsp;=&nbsp;document.querySelector(&quot;.add&quot;);<br>\r\nconst&nbsp;input&nbsp;=&nbsp;&nbsp;document.querySelector(&quot;.inp&#45;group&quot;);<br>\r\n<br>\r\nfunction&nbsp;removeInput(){<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;this.parentElement.remove();<br>\r\n}<br>\r\nfunction&nbsp;addInput()&nbsp;{<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;name=document.createElement(&quot;input&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;name.type=&quot;text&quot;;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;name.placeholder=&quot;enter&nbsp;your&nbsp;name&quot;;<br>\r\n<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;nilais=document.createElement(&quot;select&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilais.innerHTML&nbsp;=&nbsp;&quot;&quot;;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;for(let&nbsp;i=0&nbsp;;&nbsp;i&lt;11;i++){<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;nilai=document.createElement(&quot;option&quot;)<br>;\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilai.textContent=i;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilai.value=i;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;nilais.appendChild(nilai)<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;}<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;&nbsp;btn=document.createElement(&quot;button&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;btn.className=&nbsp;&quot;delete&quot;;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;btn.innerHTML=&quot;&amp;times&quot;;<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;btn.addEventListener(&quot;click&quot;,removeInput);<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;const&nbsp;flex=document.createElement(&quot;div&quot;);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.className=&quot;flex&quot;;<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;input.appendChild(flex);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.appendChild(name);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.appendChild(nilais);<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;flex.appendChild(btn);<br>\r\n<br>\r\n<br>\r\n}<br>\r\naddBtn.addEventListener(&quot;click&quot;,addInput)<br>\r\n<br>\r\nHTML:<br>\r\n<br>\r\n&lt;div&nbsp;class=&quot;container&quot;&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class=&quot;wrap&quot;&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;Add&nbsp;Dynamic&nbsp;Input&nbsp;Field&lt;/h2&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;&nbsp;class=&quot;add&quot;&gt;&amp;plus;&lt;/button&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class=&quot;inp&#45;group&quot;&gt;<br>\r\n<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>\r\n&lt;/div&gt;<br>\r\n', NULL, 1, '2022-10-03 11:34:12', 1, '2023-12-27 08:23:56', 1),
(69, 'Tipe Data Python', NULL, NULL, NULL, 1, 1, 8, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 14:50:09', 1, '2024-01-12 09:59:54', 1),
(70, 'Tipe Data Python', NULL, NULL, NULL, 1, 2, 8, 69, 1, 'materi_pembelajaran', NULL, NULL, '<h2>Tipe Data Python</h2>\r\n<p>Tipe data adalah suatu media atau memori pada komputer yang digunakan untuk menampung informasi.\r\n\r\nPython sendiri mempunyai tipe data yang cukup unik bila kita bandingkan dengan bahasa pemrograman yang lain.\r\n\r\nBerikut adalah tipe data dari bahasa pemrograman Python :</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr><th>Tipe Data</th>\r\n    <th>Contoh</th>\r\n    <th>Penjelasan</th>\r\n  </tr></thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Boolean</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">True</code> atau <code class=\"language-plaintext highlighter-rouge\">False</code></td>\r\n      <td>Menyatakan benar <code class=\"language-plaintext highlighter-rouge\">True</code> yang bernilai <code class=\"language-plaintext highlighter-rouge\">1</code>, atau salah <code class=\"language-plaintext highlighter-rouge\">False</code> yang bernilai <code class=\"language-plaintext highlighter-rouge\">0</code></td>\r\n    </tr>\r\n    <tr>\r\n      <td>String</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">\"Ayo belajar Python\"</code></td>\r\n      <td>Menyatakan karakter/kalimat bisa berupa huruf angka, dll (diapit tanda <code class=\"language-plaintext highlighter-rouge\">\"</code> atau <code class=\"language-plaintext highlighter-rouge\">\'</code>)</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Integer</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">25</code> atau <code class=\"language-plaintext highlighter-rouge\">1209</code></td>\r\n      <td>Menyatakan bilangan bulat</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Float</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">3.14</code> atau <code class=\"language-plaintext highlighter-rouge\">0.99</code></td>\r\n      <td>Menyatakan bilangan yang mempunyai koma</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Hexadecimal</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">9a</code> atau <code class=\"language-plaintext highlighter-rouge\">1d3</code></td>\r\n      <td>Menyatakan bilangan dalam format heksa (bilangan berbasis 16)</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Complex</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 + 5j  </code></td>\r\n      <td>Menyatakan pasangan angka real dan imajiner</td>\r\n    </tr>\r\n    <tr>\r\n      <td>List</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'xyz\', 786, 2.23]</code></td>\r\n      <td>Data untaian yang menyimpan berbagai tipe data dan isinya bisa diubah-ubah</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tuple</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">(\'xyz\', 768, 2.23)</code></td>\r\n      <td>Data untaian yang menyimpan berbagai tipe data tapi isinya tidak bisa diubah</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Dictionary</td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">{\'nama\': \'adi\',\'id\':2}</code></td>\r\n      <td>Data untaian yang menyimpan berbagai tipe data berupa pasangan penunjuk dan nilai</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<p>Untuk mencoba berbagai macam tipe data, silahkan coba script Python dibawah ini.</p>\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#tipe data Boolean\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"bp\">True</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data String\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Ayo belajar Python\"</span><span class=\"p\">)</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\'Belajar Python Sangat Mudah\'</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Integer\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">20</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Float\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mf\">3.14</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Hexadecimal\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">9</span><span class=\"n\">a</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data Complex\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mf\">5j</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#tipe data List\r\n</span><span class=\"k\">print</span><span class=\"p\">([</span><span class=\"mi\">1</span><span class=\"p\">,</span><span class=\"mi\">2</span><span class=\"p\">,</span><span class=\"mi\">3</span><span class=\"p\">,</span><span class=\"mi\">4</span><span class=\"p\">,</span><span class=\"mi\">5</span><span class=\"p\">])</span>\r\n<span class=\"k\">print</span><span class=\"p\">([</span><span class=\"s\">\"satu\"</span><span class=\"p\">,</span> <span class=\"s\">\"dua\"</span><span class=\"p\">,</span> <span class=\"s\">\"tiga\"</span><span class=\"p\">])</span>\r\n\r\n<span class=\"c1\">#tipe data Tuple\r\n</span><span class=\"k\">print</span><span class=\"p\">((</span><span class=\"mi\">1</span><span class=\"p\">,</span><span class=\"mi\">2</span><span class=\"p\">,</span><span class=\"mi\">3</span><span class=\"p\">,</span><span class=\"mi\">4</span><span class=\"p\">,</span><span class=\"mi\">5</span><span class=\"p\">))</span>\r\n<span class=\"k\">print</span><span class=\"p\">((</span><span class=\"s\">\"satu\"</span><span class=\"p\">,</span> <span class=\"s\">\"dua\"</span><span class=\"p\">,</span> <span class=\"s\">\"tiga\"</span><span class=\"p\">))</span>\r\n\r\n<span class=\"c1\">#tipe data Dictionary\r\n</span><span class=\"k\">print</span><span class=\"p\">({</span><span class=\"s\">\"nama\"</span><span class=\"p\">:</span><span class=\"s\">\"Budi\"</span><span class=\"p\">,</span> <span class=\"s\">\'umur\'</span><span class=\"p\">:</span><span class=\"mi\">20</span><span class=\"p\">})</span>\r\n<span class=\"c1\">#tipe data Dictionary dimasukan ke dalam variabel biodata\r\n</span><span class=\"n\">biodata</span> <span class=\"o\">=</span> <span class=\"p\">{</span><span class=\"s\">\"nama\"</span><span class=\"p\">:</span><span class=\"s\">\"Andi\"</span><span class=\"p\">,</span> <span class=\"s\">\'umur\'</span><span class=\"p\">:</span><span class=\"mi\">21</span><span class=\"p\">}</span> <span class=\"c1\">#proses inisialisasi variabel biodata\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">biodata</span><span class=\"p\">)</span> <span class=\"c1\">#proses pencetakan variabel biodata yang berisi tipe data Dictionary\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"nb\">type</span><span class=\"p\">(</span><span class=\"n\">biodata</span><span class=\"p\">))</span> <span class=\"c1\">#fungsi untuk mengecek jenis tipe data. akan tampil &lt;class \'dict\'&gt; yang berarti dict adalah tipe data dictionary</span></code></pre></figure>', NULL, 1, '2022-10-03 14:50:09', 1, '2023-12-27 08:23:56', 1),
(71, 'Variable dan Operator python', NULL, NULL, NULL, 2, 1, 8, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 15:01:23', 1, '2024-01-12 09:59:54', 1),
(72, 'Variable dan Operator python', NULL, NULL, NULL, 1, 2, 8, 71, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Variable</h2>\r\n<p>Variabel adalah lokasi memori yang dicadangkan untuk menyimpan nilai-nilai. Ini berarti bahwa ketika Anda membuat sebuah variabel Anda memesan beberapa ruang di memori. Variabel menyimpan data yang dilakukan selama program dieksekusi, yang nantinya isi dari variabel tersebut dapat diubah oleh operasi - operasi tertentu pada program yang menggunakan variabel.</p>\r\n<p>Variabel dapat menyimpan berbagai macam tipe data. Di dalam pemrograman Python, variabel mempunyai sifat yang dinamis, artinya variabel Python tidak perlu didekralasikan tipe data tertentu dan variabel Python dapat diubah saat program dijalankan.</p>\r\n<p>Penulisan variabel Python sendiri juga memiliki aturan tertentu, yaitu :</p>\r\n<ol>\r\n  <li>Karakter pertama harus berupa huruf atau garis bawah/underscore <code class=\"language-plaintext highlighter-rouge\">_</code></li>\r\n  <li>Karakter selanjutnya dapat berupa huruf, garis bawah/underscore <code class=\"language-plaintext highlighter-rouge\">_</code> atau angka</li>\r\n  <li>Karakter pada nama variabel bersifat sensitif (case-sensitif). Artinya huruf kecil dan huruf besar dibedakan. Sebagai contoh, variabel <code class=\"language-plaintext highlighter-rouge\">namaDepan</code> dan <code class=\"language-plaintext highlighter-rouge\">namadepan</code> adalah variabel yang berbeda.</li>\r\n</ol>\r\n<p>Untuk mulai membuat variabel di Python caranya sangat mudah, Anda cukup menuliskan variabel lalu mengisinya dengan suatu nilai dengan cara menambahkan tanda sama dengan <code class=\"language-plaintext highlighter-rouge\">=</code> diikuti dengan nilai yang ingin dimasukan.</p>\r\n<p>Dibawah ini adalah contoh penggunaan variabel dalam bahasa pemrograman Python</p>\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#proses memasukan data ke dalam variabel\r\n</span><span class=\"n\">nama</span> <span class=\"o\">=</span> <span class=\"s\">\"John Doe\"</span>\r\n<span class=\"c1\">#proses mencetak variabel\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">nama</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#nilai dan tipe data dalam variabel  dapat diubah\r\n</span><span class=\"n\">umur</span> <span class=\"o\">=</span> <span class=\"mi\">20</span>               <span class=\"c1\">#nilai awal\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>             <span class=\"c1\">#mencetak nilai umur\r\n</span><span class=\"nb\">type</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>              <span class=\"c1\">#mengecek tipe data umur\r\n</span><span class=\"n\">umur</span> <span class=\"o\">=</span> <span class=\"s\">\"dua puluh satu\"</span> <span class=\"c1\">#nilai setelah diubah\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>             <span class=\"c1\">#mencetak nilai umur\r\n</span><span class=\"nb\">type</span><span class=\"p\">(</span><span class=\"n\">umur</span><span class=\"p\">)</span>              <span class=\"c1\">#mengecek tipe data umur\r\n</span>\r\n<span class=\"n\">namaDepan</span> <span class=\"o\">=</span> <span class=\"s\">\"Budi\"</span>\r\n<span class=\"n\">namaBelakang</span> <span class=\"o\">=</span> <span class=\"s\">\"Susanto\"</span>\r\n<span class=\"n\">nama</span> <span class=\"o\">=</span> <span class=\"n\">namaDepan</span> <span class=\"o\">+</span> <span class=\"s\">\" \"</span> <span class=\"o\">+</span> <span class=\"n\">namaBelakang</span>\r\n<span class=\"n\">umur</span> <span class=\"o\">=</span> <span class=\"mi\">22</span>\r\n<span class=\"n\">hobi</span> <span class=\"o\">=</span> <span class=\"s\">\"Berenang\"</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Biodata</span><span class=\"se\">\\n</span><span class=\"s\">\"</span><span class=\"p\">,</span> <span class=\"n\">nama</span><span class=\"p\">,</span> <span class=\"s\">\"</span><span class=\"se\">\\n</span><span class=\"s\">\"</span><span class=\"p\">,</span> <span class=\"n\">umur</span><span class=\"p\">,</span> <span class=\"s\">\"</span><span class=\"se\">\\n</span><span class=\"s\">\"</span><span class=\"p\">,</span> <span class=\"n\">hobi</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#contoh variabel lainya\r\n</span><span class=\"n\">inivariabel</span> <span class=\"o\">=</span> <span class=\"s\">\"Halo\"</span>\r\n<span class=\"n\">ini_juga_variabel</span> <span class=\"o\">=</span> <span class=\"s\">\"Hai\"</span>\r\n<span class=\"n\">_inivariabeljuga</span> <span class=\"o\">=</span> <span class=\"s\">\"Hi\"</span>\r\n<span class=\"n\">inivariabel222</span> <span class=\"o\">=</span> <span class=\"s\">\"Bye\"</span> \r\n\r\n<span class=\"n\">panjang</span> <span class=\"o\">=</span> <span class=\"mi\">10</span>\r\n<span class=\"n\">lebar</span> <span class=\"o\">=</span> <span class=\"mi\">5</span>\r\n<span class=\"n\">luas</span> <span class=\"o\">=</span> <span class=\"n\">panjang</span> <span class=\"o\">*</span> <span class=\"n\">lebar</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">luas</span><span class=\"p\">)</span></code></pre></figure>', NULL, 1, '2022-10-03 15:01:23', 1, '2023-12-27 08:23:56', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(73, 'Operator dan Variable python', NULL, NULL, NULL, 2, 2, 8, 71, 2, 'materi_pembelajaran', NULL, NULL, '<h2>Operator Python</h2>\r\n<p>Operator adalah konstruksi yang dapat memanipulasi nilai dari operan.</p>\r\n<p>Sebagai contoh operasi 3 + 2 = 5. Disini <code class=\"language-plaintext highlighter-rouge\">3</code> dan <code class=\"language-plaintext highlighter-rouge\">2</code> adalah operan dan <code class=\"language-plaintext highlighter-rouge\">+</code> adalah operator.</p>\r\n<p>Bahasa pemrograman Python mendukung berbagai macam operator, diantaranya :</p>\r\n<h3 id=\"operator-aritmatika-\">Operator Aritmatika <a name=\"operator-aritmatika\"></a></h3>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Contoh</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Penjumlahan <code class=\"language-plaintext highlighter-rouge\">+</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 + 3 = 4</code></td>\r\n      <td>Menjumlahkan nilai dari masing-masing operan atau bilangan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pengurangan <code class=\"language-plaintext highlighter-rouge\">-</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">4 - 1 = 3</code></td>\r\n      <td>Mengurangi nilai operan di sebelah kiri menggunakan operan di sebelah kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Perkalian <code class=\"language-plaintext highlighter-rouge\">*</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 * 4 = 8</code></td>\r\n      <td>Mengalikan operan/bilangan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pembagian <code class=\"language-plaintext highlighter-rouge\">/</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">10 / 5 = 2</code></td>\r\n      <td>Untuk membagi operan di sebelah kiri menggunakan operan di sebelah kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Sisa Bagi <code class=\"language-plaintext highlighter-rouge\">%</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">11 % 2 = 1</code></td>\r\n      <td>Mendapatkan sisa pembagian dari operan di sebelah kiri operator ketika dibagi oleh operan di sebelah kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pangkat <code class=\"language-plaintext highlighter-rouge\">**</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">8 ** 2 = 64</code></td>\r\n      <td>Memangkatkan operan disebelah kiri operator dengan operan di sebelah kanan operator</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pembagian Bulat <code class=\"language-plaintext highlighter-rouge\">//</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">10 // 3 = 3</code></td>\r\n      <td>Sama seperti pembagian. Hanya saja angka dibelakang koma dihilangkan</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<p>Dibawah ini adalah contoh penggunaan Operator Aritmatika dalam bahasa pemrograman Python</p>\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#OPERATOR ARITMATIKA\r\n</span>\r\n<span class=\"c1\">#Penjumlahan\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">13</span> <span class=\"o\">+</span> <span class=\"mi\">2</span><span class=\"p\">)</span>\r\n<span class=\"n\">apel</span> <span class=\"o\">=</span> <span class=\"mi\">7</span>\r\n<span class=\"n\">jeruk</span> <span class=\"o\">=</span> <span class=\"mi\">9</span>\r\n<span class=\"n\">buah</span> <span class=\"o\">=</span> <span class=\"n\">apel</span> <span class=\"o\">+</span> <span class=\"n\">jeruk</span> <span class=\"c1\">#\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">buah</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pengurangan\r\n</span><span class=\"n\">hutang</span> <span class=\"o\">=</span> <span class=\"mi\">10000</span>\r\n<span class=\"n\">bayar</span> <span class=\"o\">=</span> <span class=\"mi\">5000</span>\r\n<span class=\"n\">sisaHutang</span> <span class=\"o\">=</span> <span class=\"n\">hutang</span> <span class=\"o\">-</span> <span class=\"n\">bayar</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sisa hutang Anda adalah \"</span><span class=\"p\">,</span> <span class=\"n\">sisaHutang</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Perkalian\r\n</span><span class=\"n\">panjang</span> <span class=\"o\">=</span> <span class=\"mi\">15</span>\r\n<span class=\"n\">lebar</span> <span class=\"o\">=</span> <span class=\"mi\">8</span>\r\n<span class=\"n\">luas</span> <span class=\"o\">=</span> <span class=\"n\">panjang</span> <span class=\"o\">*</span> <span class=\"n\">lebar</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">luas</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pembagian\r\n</span><span class=\"n\">kue</span> <span class=\"o\">=</span> <span class=\"mi\">16</span>\r\n<span class=\"n\">anak</span> <span class=\"o\">=</span> <span class=\"mi\">4</span>\r\n<span class=\"n\">kuePerAnak</span> <span class=\"o\">=</span> <span class=\"n\">kue</span> <span class=\"o\">/</span> <span class=\"n\">anak</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Setiap anak akan mendapatkan bagian kue sebanyak \"</span><span class=\"p\">,</span> <span class=\"n\">kuePerAnak</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Sisa Bagi / Modulus\r\n</span><span class=\"n\">bilangan1</span> <span class=\"o\">=</span> <span class=\"mi\">14</span>\r\n<span class=\"n\">bilangan2</span> <span class=\"o\">=</span> <span class=\"mi\">5</span>\r\n<span class=\"n\">hasil</span> <span class=\"o\">=</span> <span class=\"n\">bilangan1</span> <span class=\"o\">%</span> <span class=\"n\">bilangan2</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sisa bagi dari bilangan \"</span><span class=\"p\">,</span> <span class=\"n\">bilangan1</span><span class=\"p\">,</span> <span class=\"s\">\" dan \"</span><span class=\"p\">,</span> <span class=\"n\">bilangan2</span><span class=\"p\">,</span> <span class=\"s\">\" adalah \"</span><span class=\"p\">,</span> <span class=\"n\">hasil</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pangkat\r\n</span><span class=\"n\">bilangan3</span> <span class=\"o\">=</span> <span class=\"mi\">8</span>\r\n<span class=\"n\">bilangan4</span> <span class=\"o\">=</span> <span class=\"mi\">2</span>\r\n<span class=\"n\">hasilPangkat</span> <span class=\"o\">=</span> <span class=\"n\">bilangan3</span> <span class=\"o\">**</span> <span class=\"n\">bilangan4</span>\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">hasilPangkat</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Pembagian Bulat\r\n</span><span class=\"k\">print</span><span class=\"p\">(</span><span class=\"mi\">10</span><span class=\"o\">//</span><span class=\"mi\">3</span><span class=\"p\">)</span> \r\n<span class=\"c1\">#10 dibagi 3 adalah 3.3333. Karena dibulatkan maka akan menghasilkan nilai 3</span></code></pre></figure>\r\n<h3 id=\"operator-perbandingan-\">Operator Perbandingan <a name=\"operator-perbandingan\"></a></h3>\r\n<p>Operator perbandingan (comparison operators) digunakan untuk membandingkan suatu nilai dari masing-masing operan.</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Contoh</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Sama dengan <code class=\"language-plaintext highlighter-rouge\">==</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 == 1</code></td>\r\n      <td>bernilai True	Jika masing-masing operan memiliki nilai yang sama, maka kondisi bernilai benar atau True.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tidak sama dengan <code class=\"language-plaintext highlighter-rouge\">!=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 != 2</code></td>\r\n      <td>bernilai False	Akan menghasilkan nilai kebalikan dari kondisi sebenarnya.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tidak sama dengan <code class=\"language-plaintext highlighter-rouge\">&lt;&gt;</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 &lt;&gt; 2</code></td>\r\n      <td>bernilai False	Akan menghasilkan nilai kebalikan dari kondisi sebenarnya.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih besar dari <code class=\"language-plaintext highlighter-rouge\">&gt;</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &gt; 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih besar dari nilai operan kanan, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih kecil dari <code class=\"language-plaintext highlighter-rouge\">&lt;</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &lt; 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih kecil dari nilai operan kanan, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih besar atau sama dengan <code class=\"language-plaintext highlighter-rouge\">&gt;=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &gt;= 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih besar dari nilai operan kanan, atau sama, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Lebih kecil atau sama dengan <code class=\"language-plaintext highlighter-rouge\">&lt;=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">5 &lt;= 3</code></td>\r\n      <td>bernilai True	Jika nilai operan kiri lebih kecil dari nilai operan kanan, atau sama, maka kondisi menjadi benar.</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<h3 id=\"operator-penugasan-\">Operator Penugasan <a name=\"operator-penugasan\"></a></h3>\r\n<p>Operator penugasan digunakan untuk memberikan atau memodifikasi nilai ke dalam sebuah variabel.</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Contoh</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>Sama dengan <code class=\"language-plaintext highlighter-rouge\">=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a = 1</code></td>\r\n      <td>Memberikan nilai di kanan ke dalam variabel yang berada di sebelah kiri.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Tambah sama dengan <code class=\"language-plaintext highlighter-rouge\">+=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a += 2</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri ditambah dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Kurang sama dengan <code class=\"language-plaintext highlighter-rouge\">-=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a -= 2</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dikurangi dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Kali sama dengan <code class=\"language-plaintext highlighter-rouge\">*=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a *= 2</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dikali dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Bagi sama dengan <code class=\"language-plaintext highlighter-rouge\">/=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a /= 4</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dibagi dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Sisa bagi sama dengan <code class=\"language-plaintext highlighter-rouge\">%=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a %= 3</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dibagi dengan nilai di sebelah kanan. Yang diambil nantinya adalah sisa baginya.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pangkat sama dengan <code class=\"language-plaintext highlighter-rouge\">**=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a **= 3</code></td>\r\n      <td>Memberikan nilai variabel dengan nilai variabel itu sendiri dipangkatkan dengan nilai di sebelah kanan.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>Pembagian bulat sama dengan <code class=\"language-plaintext highlighter-rouge\">//=</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">a //= 3</code></td>\r\n      <td>Membagi bulat operan sebelah kiri operator dengan operan sebelah kanan operator kemudian hasilnya diisikan ke operan sebelah kiri.</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n<h3 id=\"prioritas-eksekusi-operator-di-python\">Prioritas Eksekusi Operator di Python</h3>\r\n<p>Dari semua operator diatas, masing-masing mempunyai urutan prioritas yang nantinya prioritas pertama akan dilakukan paling pertama, begitu seterusnya sampai dengan prioritas terakhir.</p>\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Operator</th>\r\n      <th>Keterangan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">**</code></td>\r\n      <td>Aritmatika</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">~, +, -</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">*, /, %, //</code></td>\r\n      <td>Aritmatika</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">+, -</code></td>\r\n      <td>Aritmatika</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&gt;&gt;, &lt;&lt;</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&amp;</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">^, |</code></td>\r\n      <td>Bitwise</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&lt;=, &lt;, &gt;, &gt;=</code></td>\r\n      <td>Perbandingan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">&lt;&gt; , ==, !=</code></td>\r\n      <td>Perbandingan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">=, %=, /=, //=, -=, +=, *=, **=</code></td>\r\n      <td>Penugasan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">is, is not</code></td>\r\n      <td>Identitas</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">in, not in</code></td>\r\n      <td>Membership (Keanggotaan)</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">not, or, and</code></td>\r\n      <td>Logika</td>\r\n    </tr>\r\n  </tbody>\r\n</table>', NULL, 1, '2022-10-03 15:01:23', 1, '2023-12-27 08:23:56', 1),
(74, 'Conditional IF python', NULL, NULL, NULL, 3, 1, 8, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 15:04:40', 1, '2024-01-12 09:59:54', 1),
(75, 'Conditional IF python', NULL, NULL, NULL, 1, 2, 8, 74, 3, 'materi_pembelajaran', NULL, NULL, '<h2>Kondisi Python</h2>\n<h3 id=\"kondisi-if\">Kondisi If</h3>\n\n<p>Pengambilan keputusan (kondisi if) digunakan untuk mengantisipasi kondisi yang terjadi saat jalanya program dan menentukan tindakan apa yang akan diambil sesuai dengan kondisi.</p>\n\n<p>Pada python ada beberapa statement/kondisi diantaranya adalah <code class=\"language-plaintext highlighter-rouge\">if</code>, <code class=\"language-plaintext highlighter-rouge\">else</code> dan <code class=\"language-plaintext highlighter-rouge\">elif</code> Kondisi <code class=\"language-plaintext highlighter-rouge\">if</code> digunakan untuk mengeksekusi kode jika kondisi bernilai benar <code class=\"language-plaintext highlighter-rouge\">True</code>.</p>\n\n<p>Jika kondisi bernilai salah <code class=\"language-plaintext highlighter-rouge\">False</code> maka statement/kondisi <code class=\"language-plaintext highlighter-rouge\">if</code> tidak akan di-eksekusi.</p>\n\n<p>Dibawah ini adalah contoh penggunaan kondisi if pada Python</p>\n\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Kondisi if adalah kondisi yang akan dieksekusi oleh program jika bernilai benar atau TRUE\n</span>\n<span class=\"n\">nilai</span> <span class=\"o\">=</span> <span class=\"mi\">9</span>\n\n<span class=\"c1\">#jika kondisi benar/TRUE maka program akan mengeksekusi perintah dibawahnya\n</span><span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">nilai</span> <span class=\"o\">&gt;</span> <span class=\"mi\">7</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sembilan Lebih Besar Dari Angka Tujuh\"</span><span class=\"p\">)</span> <span class=\"c1\"># Kondisi Benar, Dieksekusi\n</span>\n<span class=\"c1\">#jika kondisi salah/FALSE maka program tidak akan mengeksekusi perintah dibawahnya\n</span><span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">nilai</span> <span class=\"o\">&gt;</span> <span class=\"mi\">10</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Sembilan Lebih Besar Dari Angka Sepuluh\"</span><span class=\"p\">)</span> <span class=\"c1\"># Kondisi Salah, Maka tidak tereksekusi</span></code></pre></figure>\n\n<p>Dari contoh diatas, jika program dijalankan maka akan mencetak string <code class=\"language-plaintext highlighter-rouge\">\"Sembilan Lebih Besar Dari Angka Tujuh\"</code> sebanyak 1 kali yaitu pada if pertama. Di if kedua statement bernilai salah, jadi perintah <code class=\"language-plaintext highlighter-rouge\">print(\"Sembilan Lebih Besar Dari Angka Sepuluh\")</code> tidak akan dieksekusi.</p>\n\n<h3 id=\"kondisi-if-else\">Kondisi If Else</h3>\n<p>Pengambilan keputusan (kondisi if else) tidak hanya digunakan untuk menentukan tindakan apa yang akan diambil sesuai dengan kondisi, tetapi juga digunakan untuk menentukan tindakan apa yang akan diambil/dijalankan jika kondisi tidak sesuai.</p>\n\n<p>Pada python ada beberapa statement/kondisi diantaranya adalah if, else dan elif Kondisi if digunakan untuk mengeksekusi kode jika kondisi bernilai benar.</p>\n\n<p>Kondisi if else adalah kondisi dimana jika pernyataan benar <code class=\"language-plaintext highlighter-rouge\">True</code> maka kode dalam if akan dieksekusi, tetapi jika bernilai salah <code class=\"language-plaintext highlighter-rouge\">False</code> maka akan mengeksekusi kode di dalam else.</p>\n\n<p>Dibawah ini adalah contoh penggunaan kondisi if else pada Python</p>\n\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Kondisi if else adalah jika kondisi bernilai TRUE maka akan dieksekusi pada if, tetapi jika bernilai FALSE maka akan dieksekusi kode pada else\n</span>\n<span class=\"n\">nilai</span> <span class=\"o\">=</span> <span class=\"mi\">3</span>\n<span class=\"c1\">#Jika pernyataan pada if bernilai TRUE maka if akan dieksekusi, tetapi jika FALSE kode pada else yang akan dieksekusi.\n</span><span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">nilai</span> <span class=\"o\">&gt;</span> <span class=\"mi\">7</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Selamat Anda Lulus\"</span><span class=\"p\">)</span>\n<span class=\"k\">else</span><span class=\"p\">:</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Maaf Anda Tidak Lulus\"</span><span class=\"p\">)</span></code></pre></figure>\n\n<p>Pada contoh diatas, jika program dijalankan maka akan mencetak string <code class=\"language-plaintext highlighter-rouge\">\"Maaf Anda Tidak Lulus\"</code> karena pernyataan pada if bernilai <code class=\"language-plaintext highlighter-rouge\">False</code></p>\n\n<h3 id=\"kondisi-elif\">Kondisi Elif</h3>\n\n<p>Pengambilan keputusan (kondisi if elif) merupakan lanjutan/percabangan logika dari “kondisi if”. Dengan elif kita bisa membuat kode program yang akan menyeleksi beberapa kemungkinan yang bisa terjadi. Hampir sama dengan kondisi “else”, bedanya kondisi “elif” bisa banyak dan tidak hanya satu.</p>\n\n<p>Dibawah ini adalah contoh penggunaan kondisi elif pada Python</p>\n\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh penggunaan kondisi elif\n</span>\n<span class=\"n\">hari_ini</span> <span class=\"o\">=</span> <span class=\"s\">\"Minggu\"</span>\n\n<span class=\"k\">if</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Senin\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Selasa\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Rabu\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Kamis\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Jumat\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Sabtu\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan kuliah\"</span><span class=\"p\">)</span>\n<span class=\"k\">elif</span><span class=\"p\">(</span><span class=\"n\">hari_ini</span> <span class=\"o\">==</span> <span class=\"s\">\"Minggu\"</span><span class=\"p\">):</span>\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Saya akan libur\"</span><span class=\"p\">)</span></code></pre></figure>\n\n<p>Pada contoh diatas, jika program dijalankan maka akan mencetak string <code class=\"language-plaintext highlighter-rouge\">\"Saya akan libur\"</code>.</p>\n', NULL, 1, '2022-10-03 15:04:40', 1, '2023-12-27 08:23:56', 1),
(76, 'Looping Python', NULL, NULL, NULL, 4, 1, 8, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 15:06:33', 1, '2024-01-12 09:59:54', 1),
(77, 'Looping Python', NULL, NULL, NULL, 1, 2, 8, 76, 4, 'materi_pembelajaran', NULL, NULL, '<h2>Loop Python</h2>\r\n<p>Secara umum, pernyataan pada bahasa pemrograman akan dieksekusi secara berurutan. Pernyataan pertama dalam sebuah fungsi dijalankan pertama, diikuti oleh yang kedua, dan seterusnya. Tetapi akan ada situasi dimana Anda harus menulis banyak kode, dimana kode tersebut sangat banyak. Jika dilakukan secara manual maka Anda hanya akan membuang-buang tenaga dengan menulis beratus-ratus bahkan beribu-ribu kode. Untuk itu Anda perlu menggunakan pengulangan di dalam bahasa pemrograman Python.</p>\r\n\r\n<p>Di dalam bahasa pemrograman Python pengulangan dibagi menjadi 3 bagian, yaitu :</p>\r\n<ul>\r\n  <li>While Loop</li>\r\n  <li>For Loop</li>\r\n  <li>Nested Loop</li>\r\n</ul>\r\n\r\n<h3 id=\"while-loop\">While Loop</h3>\r\n<p>Pengulangan While Loop di dalam bahasa pemrograman Python dieksesusi statement berkali-kali selama kondisi bernilai benar atau <code class=\"language-plaintext highlighter-rouge\">True</code>.</p>\r\n\r\n<p>Dibawah ini adalah contoh penggunaan pengulangan While Loop.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh penggunaan While Loop\r\n#Catatan: Penentuan ruang lingkup di Python bisa menggunakan tab alih-alih menggunakan tanda kurung\r\n</span>\r\n<span class=\"n\">count</span> <span class=\"o\">=</span> <span class=\"mi\">0</span>\r\n<span class=\"k\">while</span> <span class=\"p\">(</span><span class=\"n\">count</span> <span class=\"o\">&lt;</span> <span class=\"mi\">9</span><span class=\"p\">):</span>\r\n    <span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"The count is: \"</span><span class=\"p\">,</span> <span class=\"n\">count</span><span class=\"p\">)</span>\r\n    <span class=\"n\">count</span> <span class=\"o\">=</span> <span class=\"n\">count</span> <span class=\"o\">+</span> <span class=\"mi\">1</span>\r\n\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Good bye!\"</span><span class=\"p\">)</span></code></pre></figure>\r\n\r\n<h3 id=\"for-loop\">For Loop</h3>\r\n<p>Pengulangan <code class=\"language-plaintext highlighter-rouge\">for</code> pada Python memiliki kemampuan untuk mengulangi item dari urutan apapun, seperti <code class=\"language-plaintext highlighter-rouge\">list</code> atau <code class=\"language-plaintext highlighter-rouge\">string</code>.</p>\r\n\r\n<p>Dibawah ini adalah contoh penggunaan pengulangan For Loop.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh pengulangan for sederhana\r\n</span><span class=\"n\">angka</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">,</span><span class=\"mi\">2</span><span class=\"p\">,</span><span class=\"mi\">3</span><span class=\"p\">,</span><span class=\"mi\">4</span><span class=\"p\">,</span><span class=\"mi\">5</span><span class=\"p\">]</span>\r\n<span class=\"k\">for</span> <span class=\"n\">x</span> <span class=\"ow\">in</span> <span class=\"n\">angka</span><span class=\"p\">:</span>\r\n    <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">x</span><span class=\"p\">)</span>\r\n\r\n<span class=\"c1\">#Contoh pengulangan for\r\n</span><span class=\"n\">buah</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\"nanas\"</span><span class=\"p\">,</span> <span class=\"s\">\"apel\"</span><span class=\"p\">,</span> <span class=\"s\">\"jeruk\"</span><span class=\"p\">]</span>\r\n<span class=\"k\">for</span> <span class=\"n\">makanan</span> <span class=\"ow\">in</span> <span class=\"n\">buah</span><span class=\"p\">:</span>\r\n    <span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Saya suka makan\"</span><span class=\"p\">,</span> <span class=\"n\">makanan</span><span class=\"p\">)</span></code></pre></figure>\r\n\r\n<h3 id=\"nested-loop\">Nested Loop</h3>\r\n<p>Bahasa pemrograman Python memungkinkan penggunaan satu lingkaran di dalam loop lain. Bagian berikut menunjukkan beberapa contoh untuk menggambarkan konsep tersebut.</p>\r\n\r\n<p>Dibawah ini adalah contoh penggunaan Nested Loop.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh penggunaan Nested Loop\r\n#Catatan: Penggunaan modulo pada kondisional mengasumsikan nilai selain nol sebagai True(benar) dan nol sebagai False(salah)\r\n</span>\r\n<span class=\"n\">i</span> <span class=\"o\">=</span> <span class=\"mi\">2</span>\r\n<span class=\"k\">while</span><span class=\"p\">(</span><span class=\"n\">i</span> <span class=\"o\">&lt;</span> <span class=\"mi\">100</span><span class=\"p\">):</span>\r\n    <span class=\"n\">j</span> <span class=\"o\">=</span> <span class=\"mi\">2</span>\r\n    <span class=\"k\">while</span><span class=\"p\">(</span><span class=\"n\">j</span> <span class=\"o\">&lt;=</span> <span class=\"p\">(</span><span class=\"n\">i</span><span class=\"o\">/</span><span class=\"n\">j</span><span class=\"p\">)):</span>\r\n        <span class=\"k\">if</span> <span class=\"ow\">not</span><span class=\"p\">(</span><span class=\"n\">i</span><span class=\"o\">%</span><span class=\"n\">j</span><span class=\"p\">):</span> <span class=\"k\">break</span>\r\n        <span class=\"n\">j</span> <span class=\"o\">=</span> <span class=\"n\">j</span> <span class=\"o\">+</span> <span class=\"mi\">1</span>\r\n    <span class=\"k\">if</span> <span class=\"p\">(</span><span class=\"n\">j</span> <span class=\"o\">&gt;</span> <span class=\"n\">i</span><span class=\"o\">/</span><span class=\"n\">j</span><span class=\"p\">)</span> <span class=\"p\">:</span> <span class=\"k\">print</span><span class=\"p\">(</span><span class=\"n\">i</span><span class=\"p\">,</span> <span class=\"s\">\" is prime\"</span><span class=\"p\">)</span>\r\n    <span class=\"n\">i</span> <span class=\"o\">=</span> <span class=\"n\">i</span> <span class=\"o\">+</span> <span class=\"mi\">1</span>\r\n\r\n<span class=\"k\">print</span><span class=\"p\">(</span><span class=\"s\">\"Good bye!\"</span><span class=\"p\">)</span></code></pre></figure>', NULL, 1, '2022-10-03 15:06:33', 1, '2023-12-27 08:23:56', 1),
(78, 'List pada Python', NULL, NULL, NULL, 5, 1, 8, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 15:09:37', 1, '2024-01-12 09:59:54', 1),
(79, 'List pada Python', NULL, NULL, NULL, 1, 2, 8, 78, 5, 'materi_pembelajaran', NULL, NULL, '<h2>List Python</h2>\r\n<p>Dalam bahasa pemrograman Python, struktur data yang paling dasar adalah urutan atau lists. Setiap elemen-elemen berurutan akan diberi nomor posisi atau indeksnya. Indeks pertama dalam list adalah nol, indeks kedua adalah satu dan seterusnya.</p>\r\n\r\n<p>Python memiliki enam jenis urutan built-in, namun yang paling umum adalah list dan tuple. Ada beberapa hal yang dapat Anda lakukan dengan semua jenis list. Operasi ini meliputi pengindeksan, pengiris, penambahan, perbanyak, dan pengecekan keanggotaan. Selain itu, Python memiliki fungsi built-in untuk menemukan panjang list dan untuk menemukan elemen terbesar dan terkecilnya.</p>\r\n\r\n<h3 id=\"membuat-list-python\">Membuat List Python</h3>\r\n\r\n<p>List adalah tipe data yang paling serbaguna yang tersedia dalam bahasa Python, yang dapat ditulis sebagai daftar nilai yang dipisahkan koma (item) antara tanda kurung siku. Hal penting tentang daftar adalah item dalam list tidak boleh sama jenisnya.</p>\r\n\r\n<p>Membuat list sangat sederhana, tinggal memasukkan berbagai nilai yang dipisahkan koma di antara tanda kurung siku. Dibawah ini adalah contoh sederhana pembuatan list dalam bahasa Python.</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh sederhana pembuatan list pada bahasa pemrograman python\r\n</span><span class=\"n\">list1</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n<span class=\"n\">list2</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">,</span> <span class=\"mi\">2</span><span class=\"p\">,</span> <span class=\"mi\">3</span><span class=\"p\">,</span> <span class=\"mi\">4</span><span class=\"p\">,</span> <span class=\"mi\">5</span> <span class=\"p\">]</span>\r\n<span class=\"n\">list3</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\"a\"</span><span class=\"p\">,</span> <span class=\"s\">\"b\"</span><span class=\"p\">,</span> <span class=\"s\">\"c\"</span><span class=\"p\">,</span> <span class=\"s\">\"d\"</span><span class=\"p\">]</span></code></pre></figure>\r\n\r\n<h3 id=\"akses-nilai-dalam-list-python\">Akses Nilai Dalam List Python</h3>\r\n\r\n<p>Untuk mengakses nilai dalam list python, gunakan tanda kurung siku untuk mengiris beserta indeks atau indeks untuk mendapatkan nilai yang tersedia pada indeks tersebut.</p>\r\n\r\n<p>Berikut adalah contoh cara mengakses nilai di dalam list python :</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Cara mengakses nilai di dalam list Python\r\n</span>\r\n<span class=\"n\">list1</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n<span class=\"n\">list2</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">,</span> <span class=\"mi\">2</span><span class=\"p\">,</span> <span class=\"mi\">3</span><span class=\"p\">,</span> <span class=\"mi\">4</span><span class=\"p\">,</span> <span class=\"mi\">5</span><span class=\"p\">,</span> <span class=\"mi\">6</span><span class=\"p\">,</span> <span class=\"mi\">7</span> <span class=\"p\">]</span>\r\n\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"list1[0]: \"</span><span class=\"p\">,</span> <span class=\"n\">list1</span><span class=\"p\">[</span><span class=\"mi\">0</span><span class=\"p\">])</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"list2[1:5]: \"</span><span class=\"p\">,</span> <span class=\"n\">list2</span><span class=\"p\">[</span><span class=\"mi\">1</span><span class=\"p\">:</span><span class=\"mi\">5</span><span class=\"p\">])</span></code></pre></figure>\r\n\r\n<p>Setelah Anda mengeksekusi kode diatas, hasilnya akan seperti dibawah ini :</p>\r\n\r\n<p><code class=\"language-plaintext highlighter-rouge\">list1[0]: fisika</code>\r\n<code class=\"language-plaintext highlighter-rouge\">list2[1:5]: [2, 3, 4, 5]</code></p>\r\n\r\n<h3 id=\"update-nilai-dalam-list-python\">Update Nilai Dalam List Python</h3>\r\n\r\n<p>Anda dapat memperbarui satu atau beberapa nilai di dalam list dengan memberikan potongan di sisi kiri operator penugasan, dan Anda dapat menambahkan nilai ke dalam list dengan metode append (). Sebagai contoh :</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"nb\">list</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Nilai ada pada index 2 : \"</span><span class=\"p\">,</span> <span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">])</span>\r\n\r\n<span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"mi\">2001</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Nilai baru ada pada index 2 : \"</span><span class=\"p\">,</span> <span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">])</span></code></pre></figure>\r\n\r\n<h3 id=\"hapus-nilai-dalam-list-python\">Hapus Nilai Dalam List Python</h3>\r\n\r\n<p>Untuk menghapus nilai di dalam list python, Anda dapat menggunakan salah satu pernyataan del jika Anda tahu persis elemen yang Anda hapus. Anda dapat menggunakan metode remove() jika Anda tidak tahu persis item mana yang akan dihapus. Sebagai contoh :</p>\r\n\r\n<figure class=\"highlight\"><pre><code class=\"language-python\" data-lang=\"python\"><span class=\"c1\">#Contoh cara menghapus nilai pada list python\r\n</span>\r\n<span class=\"nb\">list</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s\">\'fisika\'</span><span class=\"p\">,</span> <span class=\"s\">\'kimia\'</span><span class=\"p\">,</span> <span class=\"mi\">1993</span><span class=\"p\">,</span> <span class=\"mi\">2017</span><span class=\"p\">]</span>\r\n\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"nb\">list</span><span class=\"p\">)</span>\r\n<span class=\"k\">del</span> <span class=\"nb\">list</span><span class=\"p\">[</span><span class=\"mi\">2</span><span class=\"p\">]</span>\r\n<span class=\"k\">print</span> <span class=\"p\">(</span><span class=\"s\">\"Setelah dihapus nilai pada index 2 : \"</span><span class=\"p\">,</span> <span class=\"nb\">list</span><span class=\"p\">)</span></code></pre></figure>\r\n\r\n<h3 id=\"operasi-dasar-pada-list-python\">Operasi Dasar Pada List Python</h3>\r\n\r\n<p>List Python merespons operator + dan * seperti string; Itu artinya penggabungan dan pengulangan di sini juga berlaku, kecuali hasilnya adalah list baru, bukan sebuah String.</p>\r\n\r\n<p>Sebenarnya, list merespons semua operasi urutan umum yang kami gunakan pada String di bab sebelumnya. Dibawah ini adalah tabel daftar operasi dasar pada list python.</p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Expression</th>\r\n      <th>Hasil</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">len([1, 2, 3, 4])</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">4</code></td>\r\n      <td>Length</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[1, 2, 3] + [4, 5, 6]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[1, 2, 3, 4, 5, 6]</code></td>\r\n      <td>Concatenation</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'Halo!\'] * 4</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'Halo!\', \'Halo!\', \'Halo!\', \'Halo!\']</code></td>\r\n      <td>Repetition</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">2 in [1, 2, 3]</code></td>\r\n      <td>`	True`</td>\r\n      <td>Membership</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">for x in [1,2,3] : print (x,end = \' \')</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">1 2 3</code></td>\r\n      <td>Iteration</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<h3 id=\"indexing-slicing-dan-matrix-pada-list-python\">Indexing, Slicing dan Matrix Pada List Python</h3>\r\n\r\n<p>Karena list adalah urutan, pengindeksan dan pengiris bekerja dengan cara yang sama untuk list seperti yang mereka lakukan untuk String.</p>\r\n\r\n<p>Dengan asumsi input berikut :</p>\r\n\r\n<p><code class=\"language-plaintext highlighter-rouge\">L = [\'C++\'\', \'Java\', \'Python\']</code></p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Expression</th>\r\n      <th>Hasil</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">L[2]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">\'Python\'</code></td>\r\n      <td>Offset mulai dari nol</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">L[-2]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">\'Java\'</code></td>\r\n      <td>Negatif: hitung dari kanan</td>\r\n    </tr>\r\n    <tr>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[1:]</code></td>\r\n      <td><code class=\"language-plaintext highlighter-rouge\">[\'Java\', \'Python\']</code></td>\r\n      <td>Slicing mengambil bagian</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<h3 id=\"method-dan-fungsi-build-in-pada-list-python\">Method dan Fungsi Build-in Pada List Python</h3>\r\n\r\n<p>Python menyertakan fungsi built-in sebagai berikut :</p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Function</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>cmp(list1, list2)	#</td>\r\n      <td>Tidak lagi tersedia dengan Python 3</td>\r\n    </tr>\r\n    <tr>\r\n      <td>len(list)</td>\r\n      <td>Memberikan total panjang list.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>max(list)</td>\r\n      <td>Mengembalikan item dari list dengan nilai maks.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>min(list)</td>\r\n      <td>Mengembalikan item dari list dengan nilai min.</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list(seq)</td>\r\n      <td>Mengubah tuple menjadi list.</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n\r\n<p>Python menyertakan methods built-in sebagai berikut</p>\r\n\r\n<table class=\"ui celled table\">\r\n  <thead>\r\n    <tr>\r\n      <th>Python Methods</th>\r\n      <th>Penjelasan</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>list.append(obj)</td>\r\n      <td>Menambahkan objek obj ke list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.count(obj)</td>\r\n      <td>Jumlah pengembalian berapa kali obj terjadi dalam list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.extend(seq)</td>\r\n      <td>Tambahkan isi seq ke list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.index(obj)</td>\r\n      <td>Mengembalikan indeks terendah dalam list yang muncul obj</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.insert(index, obj)</td>\r\n      <td>Sisipkan objek obj ke dalam list di indeks offset</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.pop(obj = list[-1])</td>\r\n      <td>Menghapus dan mengembalikan objek atau obj terakhir dari list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.remove(obj)</td>\r\n      <td>Removes object obj from list</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.reverse()</td>\r\n      <td>Membalik list objek di tempat</td>\r\n    </tr>\r\n    <tr>\r\n      <td>list.sort([func])</td>\r\n      <td>Urutkan objek list, gunakan compare func jika diberikan</td>\r\n    </tr>\r\n  </tbody>\r\n</table>', NULL, 1, '2022-10-03 15:09:37', 1, '2023-12-27 08:23:56', 1),
(80, 'Fungsi pada Python', NULL, NULL, NULL, 6, 1, 8, NULL, 6, 'parent', NULL, NULL, '', NULL, 1, '2022-10-03 15:20:58', 1, '2024-01-12 09:59:54', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(81, 'Fungsi pada Python', NULL, NULL, NULL, 1, 2, 8, 80, 6, 'materi_pembelajaran', NULL, NULL, '<h2>Cara Membuat Fungsi pada Python</h2>\r\n<p>Fungsi pada Python, dibuat dengan kata kunci <code>def</code> kemudian diikuti dengan\r\nnama fungsinya.</p>\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">nama_fungsi</span>():\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Hello ini Fungsi\"</span></span></span></code></pre></div></div></div>\r\n<p>Sama seperti blok kode yang lain, kita juga harus memberikan\r\nidentasi (tab atau spasi 2x) untuk menuliskan isi fungsi.</p>\r\n<p>Setelah kita buat fungsinya, lalu apa?</p>\r\n<p>Setelah kita buat, kita bisa memanggilnya seperti ini:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span>nama_fungsi()</span></span></code></pre></div></div></div>\r\n<p>Sebagai contoh, coba tulis kode program berikut:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># Membuat Fungsi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">salam</span>():\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Hello, Selamat Pagi\"</span>\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\">## Pemanggilan Fungsi</span>\r\n</span></span><span style=\"display:flex\"><span>salam()</span></span></code></pre></div></div></div>\r\n<p>Hasilnya:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span>Hello, Selamat Pagi</span></span></code></pre></div></div></div>\r\n\r\n<h2>Fungsi dengan Parameter</h2>\r\n<p>Sekarang, bagaimana kalau kita ingin memberikan input nilai ke dalam fungsi?</p>\r\n<p>Kita bisa manfaatkan parameter.</p>\r\n<p>Apa itu parameter?</p>\r\n<p>Parameter adalah variabel yang menampung nilai untuk diproses di dalam fungsi.</p>\r\n\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">salam</span>(ucapan):\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span>(ucapan)</span></span></code></pre></div></div></div>\r\n<p>Pada contoh diatas, kita membuat fungsi dengan parameter <code>ucapan</code>.</p>\r\n<p>Lalu bagaimana cara memanggilnya?</p>\r\n<p>Cara pemanggilan fungsi yang memiliki parameter adalah seperti ini:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span>salam(<span style=\"color:#f1fa8c\">\"Selamat siang\"</span>)</span></span></code></pre></div></div></div>\r\n<p><code>\"Selamat siang\"</code> adalah nilai parameter yang kita berikan.</p>\r\n<p>Lalu bagaimana kalau parameternya lebih dari satu?</p>\r\n<p>Kita bisa menggunakan tanda koma (<code>,</code>) untuk memisahnya.</p>\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># Membuat fungsi dengan parameter</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">luas_segitiga</span>(alas, tinggi):\r\n</span></span><span style=\"display:flex\"><span>    luas <span style=\"color:#ff79c6\">=</span> (alas <span style=\"color:#ff79c6\">*</span> tinggi) <span style=\"color:#ff79c6\">/</span> <span style=\"color:#bd93f9\">2</span>\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Luas segitiga: </span><span style=\"color:#f1fa8c\">%f</span><span style=\"color:#f1fa8c\">\"</span> <span style=\"color:#ff79c6\">%</span> luas;\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># Pemanggilan fungsi</span>\r\n</span></span><span style=\"display:flex\"><span>luas_segitiga(<span style=\"color:#bd93f9\">4</span>, <span style=\"color:#bd93f9\">6</span>)</span></span></code></pre></div></div></div>\r\n<p>Hasilnya:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-bash\" data-lang=\"bash\"><span style=\"display:flex\"><span>Luas segitiga: 12.000000</span></span></code></pre></div></div></div>\r\n<h2>Fungsi yang Mengembalikan Nilai</h2>\r\n<p>Fungsi yang tidak mengembalikan nilai biasanya disebut dengan prosedur.</p>\r\n<p>Namun, kadang kita butuh hasil proses dari fungsi untuk\r\ndigunakan pada proses berikutnya.</p>\r\n<p>Maka fungsi harus mengembalikan nilai dari hasil pemrosesannya.</p>\r\n<p>Cara mengembalikan nilai adalah menggunkan kata kunci <code>return</code>\r\nlalu diikuti dengan nilai atau variabel yang akan dikembalikan.</p>\r\n<p>Contoh:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">luas_persegi</span>(sisi):\r\n</span></span><span style=\"display:flex\"><span>    luas <span style=\"color:#ff79c6\">=</span> sisi <span style=\"color:#ff79c6\">*</span> sisi\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#ff79c6\">return</span> luas\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># pemanggilan fungsi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#8be9fd;font-style:italic\">print</span> <span style=\"color:#f1fa8c\">\"Luas persegi: </span><span style=\"color:#f1fa8c\">%d</span><span style=\"color:#f1fa8c\">\"</span> <span style=\"color:#ff79c6\">%</span> luas_persegi(<span style=\"color:#bd93f9\">6</span>)</span></span></code></pre></div></div></div>\r\n<p>Hasilnya:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-bash\" data-lang=\"bash\"><span style=\"display:flex\"><span>Luas persegi: <span style=\"color:#bd93f9\">36</span></span></span></code></pre></div></div></div>\r\n<p>Apa bedanya dengan fungsi <code>luas_segitiga()</code> yang tadi?</p>\r\n<p>Pada fungsi <code>luas_segitiga()</code> kita melakukan <code>print</code> dari\r\nhasil pemrosesan secara langsung di dalam fungsinya.</p>\r\n<p>Sedangkan fungsi <code>luas_persegi()</code>, kita melakukan <code>print</code> pada saat pemanggilannya.</p>\r\n<p>Jadi, fungsi <code>luas_persegi()</code> akan bernilai sesuai dengan hasil yang\r\ndikembalikan.</p>\r\n<p>Sehingga kita dapat memanfaatkannya untuk pemerosesan berikutnya.</p>\r\n<p>Misalnya seperti ini:</p>\r\n<div><div class=\"codeblock--content\"><div class=\"highlight\"><pre tabindex=\"0\" style=\"color:#f8f8f2;background-color:#282a36;-moz-tab-size:2;-o-tab-size:2;tab-size:2\"><code class=\"language-python\" data-lang=\"python\"><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># rumus: sisi x sisi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">luas_persegi</span>(sisi):\r\n</span></span><span style=\"display:flex\"><span>    luas <span style=\"color:#ff79c6\">=</span> sisi <span style=\"color:#ff79c6\">*</span> sisi\r\n</span></span><span style=\"display:flex\"><span>    <span style=\"color:#ff79c6\">return</span> luas\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#6272a4\"># rumus: sisi x sisi x sisi</span>\r\n</span></span><span style=\"display:flex\"><span><span style=\"color:#ff79c6\">def</span> <span style=\"color:#50fa7b\">volume_persegi</span>(sisi):\r\n</span></span><span style=\"display:flex\"><span>    volume <span style=\"color:#ff79c6\">=</span> luas_persegi(sisi) <span style=\"color:#ff79c6\">*</span> sisi</span></span></code></pre></div></div></div>\r\n<p>Pada contoh di atas, kita melakukan pemanggilan fungsi\r\n<code>luas_persegi()</code> untuk menghitung volume persegi.</p>', NULL, 1, '2022-10-03 15:20:58', 1, '2023-12-27 08:23:56', 1),
(82, 'Communication', NULL, NULL, NULL, 1, 1, 9, NULL, 1, 'parent', NULL, NULL, '', NULL, 0, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(86, 'Paid Channel Deep Dive', NULL, NULL, NULL, 1, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:02', 0, '2024-01-12 09:59:54', 0),
(87, 'Social Media Fundamentals', NULL, NULL, NULL, 2, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:02', 0, '2024-01-12 09:59:54', 0),
(88, 'Social Media Deep Dive', NULL, NULL, NULL, 3, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:02', 0, '2024-01-12 09:59:54', 0),
(89, 'Google Ads Fundamental', NULL, NULL, NULL, 4, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:03', 0, '2024-01-12 09:59:54', 0),
(90, 'Paid Channel Deep Dive', NULL, NULL, NULL, 1, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:03', 0, '2024-01-12 09:59:54', 0),
(91, 'Social Media Fundamentals', NULL, NULL, NULL, 2, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:03', 0, '2024-01-12 09:59:54', 0),
(92, 'Social Media Deep Dive', NULL, NULL, NULL, 3, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:03', 0, '2024-01-12 09:59:54', 0),
(93, 'Google Ads Fundamental', NULL, NULL, NULL, 4, 1, 14, NULL, NULL, 'parent', NULL, NULL, '', NULL, 0, '2023-05-11 09:48:03', 0, '2024-01-12 09:59:54', 0),
(94, 'Database Overview and Clean Database Making Using PHPMyAdmin', NULL, NULL, NULL, 1, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:40:56', 1, '2024-01-12 09:59:54', 1),
(95, 'Rapid Application Development using Laravel on Master Data', NULL, NULL, NULL, 2, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:57:37', 1, '2024-01-12 09:59:54', 1),
(96, 'Rapid Application Development using Laravel on Transaction Data', NULL, NULL, NULL, 3, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:57:37', 1, '2024-01-12 09:59:54', 1),
(97, 'Bootstrap 4 and SemanticUI', NULL, NULL, NULL, 4, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:57:37', 1, '2024-01-12 09:59:54', 1),
(98, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, NULL, 5, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:57:37', 1, '2024-01-12 09:59:54', 1),
(99, 'Implement DataTable on Backend\r\n', NULL, NULL, NULL, 6, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:57:37', 1, '2024-01-12 09:59:54', 1),
(100, 'Impelement ChartJS on Backend', NULL, NULL, NULL, 7, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 09:57:37', 1, '2024-01-12 09:59:54', 1),
(101, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, NULL, 8, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 10:05:33', 1, '2024-01-12 09:59:54', 1),
(102, 'Implement PHPSpreadsheet', NULL, NULL, NULL, 9, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 10:05:33', 1, '2024-01-12 09:59:54', 1),
(103, 'Working on Report', NULL, NULL, NULL, 10, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 10:05:33', 1, '2024-01-12 09:59:54', 1),
(104, 'Backend For CMS', NULL, NULL, NULL, 11, 1, 1, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 10:05:33', 1, '2024-01-12 09:59:54', 1),
(105, 'Backend for CMS', NULL, NULL, NULL, 12, 1, 15, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-05-29 10:05:33', 1, '2024-01-12 09:59:54', 1),
(111, 'Transaction data and validation data with database', NULL, NULL, NULL, 1, 2, 1, 3, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(112, 'Try-catch transaction and try-catch database', NULL, NULL, NULL, 2, 2, 1, 3, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(113, 'Rollback and Commit Process', NULL, NULL, NULL, 3, 2, 1, 3, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(114, 'Printable View (read) creation', NULL, NULL, NULL, 4, 2, 1, 3, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:02:38', 1, '2023-09-08 14:40:11', 1),
(115, 'Basic principles of Bootstrap 4 and SemanticUI 2', NULL, NULL, NULL, 1, 2, 1, 4, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:05:45', 1, '2023-09-08 14:40:11', 1),
(116, 'Able to use components on Bootstrap 4 and SemanticUI 2', NULL, NULL, NULL, 2, 2, 1, 4, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:05:45', 1, '2023-09-08 14:40:11', 1),
(117, 'Manipulating the DOM and AJAX', NULL, NULL, NULL, 1, 2, 1, 5, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:55:46', 1, '2023-09-08 14:40:11', 1),
(118, 'Able to use widgets on JQuery', NULL, NULL, NULL, 2, 2, 1, 5, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:55:46', 1, '2023-09-08 14:40:11', 1),
(119, 'Be able to use LeafletJS for geolocation features', NULL, NULL, NULL, 3, 2, 1, 5, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:55:46', 1, '2023-09-08 14:40:11', 1),
(120, 'Able to use DataTables client and server side', NULL, NULL, NULL, 1, 2, 1, 6, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:59:34', 1, '2023-09-08 14:40:11', 1),
(121, 'Extensions to DataTables like ColVis, ColReorder, SearchBuilder, etc', NULL, NULL, NULL, 2, 2, 1, 6, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 10:59:34', 1, '2023-09-08 14:40:11', 1),
(122, 'ChartJS for Dashboards and Reporting', NULL, NULL, NULL, 1, 2, 1, 7, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:02:52', 1, '2023-09-08 14:40:11', 1),
(123, 'Important APIs in ChartJS for manipulation', NULL, NULL, NULL, 2, 2, 1, 7, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:02:52', 1, '2023-09-08 14:40:11', 1),
(124, 'Facebook and Google Authentication', NULL, NULL, NULL, 1, 2, 1, 130, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:05:46', 1, '2023-09-08 14:40:11', 1),
(125, 'Able to use the Re-Captcha feature', NULL, NULL, NULL, 2, 2, 1, 130, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:05:46', 1, '2023-09-08 14:40:11', 1),
(126, 'Implement SEO in backend and database structure', NULL, NULL, NULL, 3, 2, 1, 130, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:05:46', 1, '2023-09-08 14:40:11', 1),
(127, 'Document reading automation for CSV, XLS, XLSX', NULL, NULL, NULL, 1, 2, 1, 131, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:12:50', 1, '2023-09-08 14:40:11', 1),
(128, 'Make XLS and XLSX using PHPSpreadsheet', NULL, NULL, NULL, 2, 2, 1, 131, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:12:50', 1, '2023-09-08 14:40:11', 1),
(129, 'Create graphs and formulas inside XLS and XLSX', NULL, NULL, NULL, 3, 2, 1, 131, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 11:12:50', 1, '2023-09-08 14:40:11', 1),
(130, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, NULL, 8, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 13:46:30', 1, '2024-01-12 09:53:14', 1),
(131, 'Implement PHPSpreadsheet', NULL, NULL, NULL, 9, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 13:46:30', 1, '2024-01-12 09:53:14', 1),
(132, 'Working on Report', NULL, NULL, NULL, 10, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 13:48:20', 1, '2024-01-12 09:53:14', 1),
(133, 'Web Services using Lumen', NULL, NULL, NULL, 11, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 13:48:20', 1, '2024-01-12 09:53:14', 1),
(134, 'Backend for CMS', NULL, NULL, NULL, 12, 1, 1, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 13:48:20', 1, '2024-01-12 09:53:14', 1),
(135, 'Best practices for reporting', NULL, NULL, NULL, 1, 2, 1, 132, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 13:53:56', 1, '2023-09-08 14:40:11', 1),
(136, 'Executive summary for reporting', NULL, NULL, NULL, 2, 2, 1, 132, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 13:53:56', 1, '2023-09-08 14:40:11', 1),
(137, 'Pivot table for analysis', NULL, NULL, NULL, 3, 2, 1, 132, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 13:53:56', 1, '2023-09-08 14:40:11', 1),
(138, 'REST API using Lumen Micro-Framework', NULL, NULL, NULL, 1, 2, 1, 133, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 13:56:51', 1, '2023-09-08 14:40:11', 1),
(139, 'Establish OAuth, authorization, and validation best practices', NULL, NULL, NULL, 2, 2, 1, 133, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 13:56:51', 1, '2023-09-08 14:40:11', 1),
(140, 'Mail', NULL, NULL, NULL, 3, 2, 1, 133, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 13:56:51', 1, '2023-09-08 14:40:11', 1),
(141, 'Concept of CMS and dynamic website', NULL, NULL, NULL, 1, 2, 1, 134, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 14:11:02', 1, '2023-09-08 14:40:11', 1),
(142, 'Create a survey with SurveyJs', NULL, NULL, NULL, 2, 2, 1, 134, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 14:11:02', 1, '2023-09-08 14:40:11', 1),
(144, 'Framework7 Convert to Android', NULL, NULL, NULL, 9, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 07:58:38', 1, '2024-01-12 09:53:14', 1),
(145, 'Using ChartJS', NULL, NULL, NULL, 10, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 07:58:57', 1, '2024-01-12 09:53:14', 1),
(146, 'JQuery Popular Frontend Libraries', NULL, NULL, NULL, 11, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 07:59:41', 1, '2024-01-12 09:53:14', 1),
(147, 'Tracking Your Websites', NULL, NULL, NULL, 12, 1, 2, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-06-30 08:00:11', 1, '2024-01-12 09:53:14', 1),
(148, 'Able to create standard HTML5 Pages, tags, elements, basic sections', NULL, NULL, NULL, 1, 2, 2, 8, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:04:34', 1, '2023-09-08 14:40:11', 1),
(149, 'Layouts in Bootstrap 4', NULL, NULL, NULL, 2, 2, 2, 8, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:05:16', 1, '2023-09-08 14:40:11', 1),
(150, 'Bootstrap 4 Templates for Backend', NULL, NULL, NULL, 1, 2, 2, 9, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:06:39', 1, '2023-09-08 14:40:11', 1),
(151, 'Bootstrap 4\'s Components related to JavaScript', NULL, NULL, NULL, 2, 2, 2, 9, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:23:23', 1, '2023-09-08 14:40:11', 1),
(152, 'JavaScript and JQuery to manipulate objects', NULL, NULL, NULL, 1, 2, 2, 10, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:24:26', 1, '2023-09-08 14:40:11', 1),
(153, 'Async Function', NULL, NULL, NULL, 2, 2, 2, 10, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:24:46', 1, '2023-09-08 14:40:11', 1),
(154, 'SemanticUI into the project', NULL, NULL, NULL, 1, 2, 2, 11, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:26:47', 1, '2023-09-08 14:40:11', 1),
(155, 'SemanticUI Layout', NULL, NULL, NULL, 2, 2, 2, 11, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:27:07', 1, '2023-09-08 14:40:11', 1),
(156, 'SemanticUI Element as a complement to Bootstrap 4 Component', NULL, NULL, NULL, 3, 2, 2, 11, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:27:37', 1, '2023-09-08 14:40:11', 1),
(157, 'AJAX Web Services', NULL, NULL, NULL, 1, 2, 2, 12, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:28:08', 1, '2023-09-08 14:40:11', 1),
(158, 'Framework7 for Progressive Web Apps', NULL, NULL, NULL, 1, 2, 2, 13, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:28:33', 1, '2023-09-08 14:40:11', 1),
(159, 'Framework7 for Authentication', NULL, NULL, NULL, 1, 2, 2, 14, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:29:09', 1, '2023-09-08 14:40:11', 1),
(160, 'Framework7 for Data Storing', NULL, NULL, NULL, 2, 2, 2, 14, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:29:26', 1, '2023-09-08 14:40:11', 1),
(161, 'Framework7 for Request Access mobile devices', NULL, NULL, NULL, 1, 2, 2, 15, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:29:50', 1, '2023-09-08 14:40:11', 1),
(162, 'Framework7 for mobile apps via Cordova', NULL, NULL, NULL, 1, 2, 2, 144, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:30:40', 1, '2023-09-08 14:40:11', 1),
(163, 'Line/Bar Charts & Pie Charts', NULL, NULL, NULL, 1, 2, 2, 145, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:31:42', 1, '2023-09-08 14:40:11', 1),
(164, 'Using Parallax', NULL, NULL, NULL, 1, 2, 2, 146, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:32:15', 1, '2023-09-08 14:40:11', 1),
(165, 'Using Social Share', NULL, NULL, NULL, 2, 2, 2, 146, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:32:37', 1, '2023-09-08 14:40:11', 1),
(166, 'Using LeafletJS', NULL, NULL, NULL, 3, 2, 2, 146, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:32:54', 1, '2023-09-08 14:40:11', 1),
(167, 'Tawk.to third party', NULL, NULL, NULL, 4, 2, 2, 146, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:33:22', 1, '2023-09-08 14:40:11', 1),
(168, 'Analytics and Report Tools', NULL, NULL, NULL, 1, 2, 2, 147, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:42:49', 1, '2023-09-08 14:40:11', 1),
(169, 'Reporting using Facebook Pixel', NULL, NULL, NULL, 2, 2, 2, 147, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:43:21', 1, '2023-09-08 14:40:11', 1),
(170, 'Evaluate website quality using Web.Dev and Google Lighthouse', NULL, NULL, NULL, 3, 2, 2, 147, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-06-30 08:44:09', 1, '2023-09-08 14:40:11', 1),
(171, 'How to use and mastering basic features in Figma', NULL, NULL, NULL, 1, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:28:49', 1, '2024-01-12 09:53:14', 1),
(172, 'Mampu menguasai software figma', NULL, NULL, NULL, 1, 2, 3, 171, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:34:15', 1, '2023-09-08 14:40:11', 1),
(173, 'Mampu membuat dan men-design CV Portfolio', NULL, NULL, NULL, 2, 2, 3, 171, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:34:39', 1, '2023-09-08 14:40:11', 1),
(174, 'Analyzing UI/UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, NULL, 2, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:36:06', 1, '2024-01-12 09:53:14', 1),
(175, 'Mampu menganalisa fitur-fitur UI/ UX pada brand-brand di dalam industri yang sama', NULL, NULL, NULL, 1, 2, 3, 174, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:37:53', 1, '2023-09-08 14:40:11', 1),
(176, 'Mampu menggunakan plugin untuk membantu dalam rapid design', NULL, NULL, NULL, 2, 2, 3, 174, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:38:34', 1, '2023-09-08 14:40:11', 1),
(177, 'Wireframe 101', NULL, NULL, NULL, 3, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:39:00', 1, '2024-01-12 09:53:14', 1),
(178, 'Mampu memahami anatomi website backend dan frontend', NULL, NULL, NULL, 1, 2, 3, 177, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:39:56', 1, '2023-09-08 14:40:11', 1),
(179, 'Mampu membuat wireframe sebuah website maupun aplikasi', NULL, NULL, NULL, 2, 2, 3, 177, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:40:11', 1, '2023-09-08 14:40:11', 1),
(180, 'Putting on Top of Wireframe', NULL, NULL, NULL, 4, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:40:27', 1, '2024-01-12 09:53:14', 1),
(181, 'Mampu men-design dari wireframe yang telah dibuat', NULL, NULL, NULL, 1, 2, 3, 180, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:40:48', 1, '2023-09-08 14:40:11', 1),
(182, 'Wireframe for Landing Page', NULL, NULL, NULL, 5, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:41:00', 1, '2024-01-12 09:53:14', 1),
(183, 'Mampu membuat wireframe untuk sebuah Landing Page suatu website', NULL, NULL, NULL, 1, 2, 3, 182, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:41:25', 1, '2023-09-08 14:40:11', 1),
(184, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, NULL, 2, 2, 3, 182, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:41:46', 1, '2023-09-08 14:40:11', 1),
(185, 'Wireframe for News Portal (Mobile)', NULL, NULL, NULL, 6, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:42:16', 1, '2024-01-12 09:53:14', 1),
(186, 'Mampu membuat wireframe untuk sebuah aplikasi mobile News Portal', NULL, NULL, NULL, 1, 2, 3, 185, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:42:34', 1, '2023-09-08 14:40:11', 1),
(187, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, NULL, 2, 2, 3, 185, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:02', 1, '2023-09-08 14:40:11', 1),
(188, 'Wireframe for Marketplace (Mobile)', NULL, NULL, NULL, 7, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:43:17', 1, '2024-01-12 09:53:14', 1),
(189, 'Mampu membuat wireframe untuk sebuah aplikasi mobile Marketplace', NULL, NULL, NULL, 1, 2, 3, 188, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:39', 1, '2023-09-08 14:40:11', 1),
(190, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, NULL, 2, 2, 3, 188, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:43:55', 1, '2023-09-08 14:40:11', 1),
(191, 'Backend UI/ UX Design', NULL, NULL, NULL, 8, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:44:08', 1, '2024-01-12 09:53:14', 1),
(192, 'Mampu men-design website backend', NULL, NULL, NULL, 1, 2, 3, 191, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:44:25', 1, '2023-09-08 14:40:11', 1),
(193, 'Mampu menentukan menu beserta konten', NULL, NULL, NULL, 2, 2, 3, 191, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:44:42', 1, '2023-09-08 14:40:11', 1),
(194, 'Wireframe for Marketplace Payment Details', NULL, NULL, NULL, 9, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:45:37', 1, '2024-01-12 09:53:14', 1),
(195, 'Mampu membuat wireframe untuk sebuah alur aplikasi mobile Marketplace pada bagian Payment Details', NULL, NULL, NULL, 1, 2, 3, 194, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:45:57', 1, '2023-09-08 14:40:11', 1),
(196, 'Mampu men-design dari wireframe yang sudah dibuat', NULL, NULL, NULL, 2, 2, 3, 194, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:46:12', 1, '2023-09-08 14:40:11', 1),
(197, 'Prototype + Animation in Figma', NULL, NULL, NULL, 10, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:46:30', 1, '2024-01-12 09:53:14', 1),
(198, 'Mampu membuat prototype dari UI Design sehingga menjadi UI/ UX Design', NULL, NULL, NULL, 1, 2, 3, 197, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:51:44', 1, '2023-09-08 14:40:11', 1),
(199, 'Mampu membuat prototype seinteraktif mungkin dengan animasi', NULL, NULL, NULL, 2, 2, 3, 197, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:02', 1, '2023-09-08 14:40:11', 1),
(200, 'UX Writing', NULL, NULL, NULL, 11, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:52:10', 1, '2024-01-12 09:53:14', 1),
(201, 'Mampu membuat user journey yang interaktif', NULL, NULL, NULL, 1, 2, 3, 200, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:27', 1, '2023-09-08 14:40:11', 1),
(202, 'Mampu membangun karakter sebuah brand melalui kata-kata yang digunakan pada aplikasi', NULL, NULL, NULL, 2, 2, 3, 200, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:52:50', 1, '2023-09-08 14:40:11', 1),
(203, 'Best Practice for Collaborative Works', NULL, NULL, NULL, 12, 1, 3, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 01:53:05', 1, '2024-01-12 09:53:14', 1),
(204, 'Mampu bekerja dalam tim', NULL, NULL, NULL, 1, 2, 3, 203, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:53:17', 1, '2023-09-08 14:40:11', 1),
(205, 'Mampu menentukan solusi saat bekerja dalam tim', NULL, NULL, NULL, 2, 2, 3, 175, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 01:53:34', 1, '2023-09-08 14:40:11', 1),
(206, 'Digital Marketing Introduction', NULL, NULL, NULL, 1, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 02:05:24', 1, '2024-01-12 09:53:14', 1),
(207, 'Apa itu pemasaran digital dan mengapa itu penting', NULL, NULL, NULL, 1, 2, 14, 206, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:05:39', 1, '2023-09-08 14:40:11', 1),
(208, 'Lanskap Media Digital', NULL, NULL, NULL, 2, 2, 14, 206, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:05:57', 1, '2023-09-08 14:40:11', 1),
(209, 'Perilaku Konsumen Digital', NULL, NULL, NULL, 3, 2, 14, 206, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:06:10', 1, '2023-09-08 14:40:11', 1),
(210, 'Kerangka & Corong Pemasaran Digital (termasuk tujuan media yang terkait dengan setiap corong)', NULL, NULL, NULL, 4, 2, 14, 206, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:06:39', 1, '2023-09-08 14:40:11', 1),
(211, 'Ekosistem Media Digital (Dimiliki, Dibayar & Diperoleh)', NULL, NULL, NULL, 5, 2, 14, 206, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:07:04', 1, '2023-09-08 14:40:11', 1),
(212, 'Paid Channel Deep Dive', NULL, NULL, NULL, 2, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 02:34:19', 1, '2024-01-12 09:53:14', 1),
(213, 'Pengenalan ke saluran berbayar (Media Sosial, Google, dll.)', NULL, NULL, NULL, 1, 2, 14, 212, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:34:46', 1, '2023-09-08 14:40:11', 1),
(214, 'Penggunaan Saluran Berbayar dalam Tahapan Corong Pemasaran Digital', NULL, NULL, NULL, 2, 2, 14, 212, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:35:00', 1, '2023-09-08 14:40:11', 1),
(215, 'Jenis tujuan kampanye', NULL, NULL, NULL, 3, 2, 14, 212, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:35:11', 1, '2023-09-08 14:40:11', 1),
(216, 'Jenis - jenis pembelian', NULL, NULL, NULL, 4, 2, 14, 212, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 02:35:25', 1, '2023-09-08 14:40:11', 1),
(217, 'Metrik berbayar Digital', NULL, NULL, NULL, 5, 2, 14, 212, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:32:30', 1, '2023-09-08 14:40:11', 1),
(218, 'Social Media Fundamentals', NULL, NULL, NULL, 3, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 03:37:18', 1, '2024-01-12 09:53:14', 1),
(219, 'Lanskap Media Sosial', NULL, NULL, NULL, 1, 2, 14, 218, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:37:36', 1, '2023-09-08 14:40:11', 1),
(220, 'Pengantar Meta Ads Platform (termasuk BM,  Tujuan & pembuatan kampanye)', NULL, NULL, NULL, 2, 2, 14, 218, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:09', 1, '2023-09-08 14:40:11', 1),
(221, 'Audiens (Audiens Inti & Audiens Kustom)', NULL, NULL, NULL, 3, 2, 14, 218, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:21', 1, '2023-09-08 14:40:11', 1),
(222, 'Sinyal (Pixel, SDK & CAPI)', NULL, NULL, NULL, 4, 2, 14, 218, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:38', 1, '2023-09-08 14:40:11', 1),
(223, 'Materi iklan (Format iklan & praktik terbaikmateri iklan)', NULL, NULL, NULL, 5, 2, 14, 218, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:38:52', 1, '2023-09-08 14:40:11', 1),
(224, 'Social Media Deep Dive - Meta', NULL, NULL, NULL, 4, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 03:39:17', 1, '2024-01-12 09:53:14', 1),
(225, 'Dasar Meta Briliant', NULL, NULL, NULL, 1, 2, 14, 224, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:28', 1, '2023-09-08 14:40:11', 1),
(226, 'Solusi Video Meta', NULL, NULL, NULL, 2, 2, 14, 224, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:38', 1, '2023-09-08 14:40:11', 1),
(227, 'Solusi Perdagangan Meta', NULL, NULL, NULL, 3, 2, 14, 224, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:39:50', 1, '2023-09-08 14:40:11', 1),
(228, 'Solusi Aplikasi Meta', NULL, NULL, NULL, 4, 2, 14, 224, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:02', 1, '2023-09-08 14:40:11', 1),
(229, 'Pengukuran (Pelaporan, Analitik & Studi Iklan)', NULL, NULL, NULL, 5, 2, 14, 224, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:17', 1, '2023-09-08 14:40:11', 1),
(230, 'Social Media Deep Dive - TikTok', NULL, NULL, NULL, 5, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 03:40:35', 1, '2024-01-12 09:53:14', 1),
(231, 'Pengantar Platform Iklan TikTok', NULL, NULL, NULL, 1, 2, 14, 230, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:40:48', 1, '2023-09-08 14:40:11', 1),
(232, 'Pembuatan Kampanye Iklan TikTok(Termasuk Tujuan & pembuatan kampanye)', NULL, NULL, NULL, 2, 2, 14, 230, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:02', 1, '2023-09-08 14:40:11', 1),
(233, 'Format Iklan TikTok', NULL, NULL, NULL, 3, 2, 14, 230, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:11', 1, '2023-09-08 14:40:11', 1),
(234, 'PraktikTerbaik Kreatif TikTok - Pengukuran (Pelaporan & Studi)', NULL, NULL, NULL, 4, 2, 14, 230, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:41:39', 1, '2023-09-08 14:40:11', 1),
(235, 'Google Ads Fundamentals', NULL, NULL, NULL, 6, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 03:41:53', 1, '2024-01-12 09:53:14', 1),
(236, 'Mengenal Google Ads (Pengantar Google Ads Display, Video, Search,Shopping & App)', NULL, NULL, NULL, 1, 2, 14, 235, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:45:20', 1, '2023-09-08 14:40:11', 1),
(237, 'Pengantar Google Adwords (Dasbor Demo)', NULL, NULL, NULL, 2, 2, 14, 235, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:45:32', 1, '2023-09-08 14:40:11', 1),
(238, 'Penargetan, Penawaran & Format Iklan', NULL, NULL, NULL, 3, 2, 14, 235, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:45:51', 1, '2023-09-08 14:40:11', 1),
(239, 'Cara merencanakan kampanyeAnda dengan Google Ads - Ukur Performa Kampanye Google Ads Anda', NULL, NULL, NULL, 4, 2, 14, 235, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:13', 1, '2023-09-08 14:40:11', 1),
(240, 'Google Ads Platform Deep Dive', NULL, NULL, NULL, 7, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 03:46:23', 1, '2024-01-12 09:53:14', 1),
(241, 'Iklan Bergambar Google', NULL, NULL, NULL, 1, 2, 14, 240, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:36', 1, '2023-09-08 14:40:11', 1),
(242, 'Iklan Video Google', NULL, NULL, NULL, 2, 2, 14, 240, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:45', 1, '2023-09-08 14:40:11', 1),
(243, 'Iklan Belanja Google', NULL, NULL, NULL, 3, 2, 14, 240, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:46:55', 1, '2023-09-08 14:40:11', 1),
(244, 'Kampanye Performa Maksimal Google', NULL, NULL, NULL, 4, 2, 14, 240, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:47:19', 1, '2023-09-08 14:40:11', 1),
(245, 'Pelacakan Konversi Google Pengelola Tag', NULL, NULL, NULL, 5, 2, 14, 240, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:47:41', 1, '2023-09-08 14:40:11', 1),
(246, 'Influencer Marketing / KOL', NULL, NULL, NULL, 8, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 03:48:13', 1, '2024-01-12 09:53:14', 1),
(247, 'Pengantar Pemasaran Influencer', NULL, NULL, NULL, 1, 2, 14, 246, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 03:48:29', 1, '2023-09-08 14:40:11', 1),
(248, 'Jenis Pemasaran Influencer', NULL, NULL, NULL, 2, 2, 14, 246, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:05:31', 1, '2023-09-08 14:40:11', 1),
(249, 'Bagaimanamengembangkan strategi Influencer Marketing', NULL, NULL, NULL, 3, 2, 14, 246, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:05:44', 1, '2023-09-08 14:40:11', 1),
(250, 'Bagaimana menemukaninfluencer yang tepat dan relevan Metrik sukses', NULL, NULL, NULL, 4, 2, 14, 246, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:04', 1, '2023-09-08 14:40:11', 1),
(251, 'eCommerce On-Platform', NULL, NULL, NULL, 9, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:06:13', 1, '2024-01-12 09:53:14', 1),
(252, 'Pengantar eCommerce On-Platform', NULL, NULL, NULL, 1, 2, 14, 251, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:24', 1, '2023-09-08 14:40:11', 1),
(253, 'Solusi Periklanan Tokopedia', NULL, NULL, NULL, 2, 2, 14, 251, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:35', 1, '2023-09-08 14:40:11', 1),
(254, 'Solusi Pemasaran Lazada', NULL, NULL, NULL, 3, 2, 14, 251, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:46', 1, '2023-09-08 14:40:11', 1),
(255, 'Solusi Pemasaran Shopee', NULL, NULL, NULL, 4, 2, 14, 251, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:06:56', 1, '2023-09-08 14:40:11', 1),
(256, 'Whatsapp for Business', NULL, NULL, NULL, 10, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:07:23', 1, '2024-01-12 09:53:14', 1),
(257, 'Mengapa WhatsApp Business API', NULL, NULL, NULL, 1, 2, 14, 256, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:07:46', 1, '2023-09-08 14:40:11', 1),
(258, 'Cara Kerja WhatsApp Bisnis', NULL, NULL, NULL, 2, 2, 14, 256, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:06', 1, '2023-09-08 14:40:11', 1),
(259, 'Bagaimana cara memulai', NULL, NULL, NULL, 3, 2, 14, 256, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:15', 1, '2023-09-08 14:40:11', 1),
(260, 'Terhubung dengan Penyedia Solusi WhatsApp Business API', NULL, NULL, NULL, 4, 2, 14, 256, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:31', 1, '2023-09-08 14:40:11', 1),
(261, 'SEO (Search engine optimization)', NULL, NULL, NULL, 11, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:08:45', 1, '2024-01-12 09:53:14', 1),
(262, 'Pengantar SEO (termasuk SERP, SEO vs SEM, faktor SEO & kerangka kerja SEO)', NULL, NULL, NULL, 1, 2, 14, 261, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:08:56', 1, '2023-09-08 14:40:11', 1),
(263, 'Riset Kata Kunci dan Pesaing', NULL, NULL, NULL, 2, 2, 14, 261, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:03', 1, '2023-09-08 14:40:11', 1),
(264, 'Panduan SEO On-Page, SEO Off-Page & Google SEO (termasuk alatnya)', NULL, NULL, NULL, 3, 2, 14, 261, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:22', 1, '2023-09-08 14:40:11', 1),
(265, 'Strategi & Rencana SEO', NULL, NULL, NULL, 4, 2, 14, 261, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:45', 1, '2023-09-08 14:40:11', 1),
(266, 'Pengukuran SEO', NULL, NULL, NULL, 5, 2, 14, 261, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:09:56', 1, '2023-09-08 14:40:11', 1),
(267, 'Content Marketing', NULL, NULL, NULL, 12, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:10:41', 1, '2024-01-12 09:53:14', 1),
(268, 'PR Digital & Pemasaran Konten Berbasis Data', NULL, NULL, NULL, 1, 2, 14, 267, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:10:51', 1, '2023-09-08 14:40:11', 1),
(269, 'Konten Media Sosial (termasuk alat untuk penerbitan, penjadwalan & analitik)', NULL, NULL, NULL, 2, 2, 14, 267, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:06', 1, '2023-09-08 14:40:11', 1),
(270, 'Riset Audiens &Konten', NULL, NULL, NULL, 3, 2, 14, 267, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:21', 1, '2023-09-08 14:40:11', 1),
(271, 'Ideasi & Produksi Konten', NULL, NULL, NULL, 4, 2, 14, 267, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:32', 1, '2023-09-08 14:40:11', 1),
(272, 'Distribusi & Evaluasi Konten', NULL, NULL, NULL, 5, 2, 14, 267, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:11:41', 1, '2023-09-08 14:40:11', 1),
(273, 'Email Marketing', NULL, NULL, NULL, 13, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:11:56', 1, '2024-01-12 09:53:14', 1),
(274, 'Pengantar Pemasaran Email', NULL, NULL, NULL, 1, 2, 14, 273, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:12:48', 1, '2023-09-08 14:40:11', 1),
(275, 'Alat/Platform Pemasaran Email', NULL, NULL, NULL, 2, 2, 14, 273, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:12:58', 1, '2023-09-08 14:40:11', 1),
(276, 'Pembuatan Kampanye Pemasaran Email sebagai CRM, rujukan, dan strategi menghasilkan pendapatan', NULL, NULL, NULL, 3, 2, 14, 273, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:13:13', 1, '2023-09-08 14:40:11', 1),
(277, 'Memimpin Generasi & Manajemen', NULL, NULL, NULL, 4, 2, 14, 273, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:13:24', 1, '2023-09-08 14:40:11', 1),
(278, 'Customer relationship management (CRM)', NULL, NULL, NULL, 14, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:13:34', 1, '2024-01-12 09:53:14', 1),
(279, 'Siklus Hidup & Perjalanan Pelanggan', NULL, NULL, NULL, 1, 2, 14, 278, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:14:46', 1, '2023-09-08 14:40:11', 1),
(280, 'Pemasaran Otomasi untuk Retensi', NULL, NULL, NULL, 2, 2, 14, 278, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:03', 1, '2023-09-08 14:40:11', 1),
(281, 'Kerangka RFM', NULL, NULL, NULL, 3, 2, 14, 278, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:10', 1, '2023-09-08 14:40:11', 1),
(282, 'Metrik & Data CRM', NULL, NULL, NULL, 4, 2, 14, 278, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:19', 1, '2023-09-08 14:40:11', 1),
(283, 'Alat CRM', NULL, NULL, NULL, 5, 2, 14, 278, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:15:31', 1, '2023-09-08 14:40:11', 1),
(284, 'Digital Paid Media Planning', NULL, NULL, NULL, 15, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:15:55', 1, '2024-01-12 09:53:14', 1),
(285, 'Kembangkan Strategi & Rencana Media Berbayar Digital', NULL, NULL, NULL, 1, 2, 14, 284, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:17:33', 1, '2023-09-08 14:40:11', 1),
(286, 'Kembangkan struktur kampanye untuk setiap saluran', NULL, NULL, NULL, 2, 2, 14, 284, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:17:45', 1, '2023-09-08 14:40:11', 1),
(287, 'Implementasi (melaksanakan rencana)', NULL, NULL, NULL, 3, 2, 14, 284, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:17:57', 1, '2023-09-08 14:40:11', 1),
(288, 'Evaluasi kampanye Anda di setiap saluran', NULL, NULL, NULL, 4, 2, 14, 284, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:18:06', 1, '2023-09-08 14:40:11', 1),
(289, 'Bangun rekomendasi & pembelajaran / agenda pengukuran', NULL, NULL, NULL, 5, 2, 14, 284, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:18:34', 1, '2023-09-08 14:40:11', 1),
(290, 'Digital Paid Media Implementation', NULL, NULL, NULL, 16, 1, 14, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-03 04:18:54', 1, '2024-01-12 09:53:14', 1),
(291, 'Kembangkan Strategi & Rencana Media Berbayar Digital', NULL, NULL, NULL, 1, 2, 14, 290, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:03', 1, '2023-09-08 14:40:11', 1),
(292, 'Kembangkan struktur kampanye untuk setiap saluran', NULL, NULL, NULL, 2, 2, 14, 290, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:16', 1, '2023-09-08 14:40:11', 1),
(293, 'Implementasi (melaksanakan rencana)', NULL, NULL, NULL, 3, 2, 14, 290, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:31', 1, '2023-09-08 14:40:11', 1),
(294, 'Evaluasi kampanye Anda di setiap saluran', NULL, NULL, NULL, 4, 2, 14, 290, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:19:51', 1, '2023-09-08 14:40:11', 1),
(295, 'Bangun rekomendasi & pembelajaran / agenda pengukuran', NULL, NULL, NULL, 5, 2, 14, 290, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-03 04:20:07', 1, '2023-09-08 14:40:11', 1),
(296, 'Digital Marketing Introduction', NULL, NULL, NULL, 1, 1, 21, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:23:19', 1, '2024-01-12 09:53:14', 1),
(297, 'Digital Media Landscape', NULL, NULL, NULL, 1, 2, 21, 296, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(298, 'Digital Consumer Behavior', NULL, NULL, NULL, 2, 2, 21, 296, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(299, 'Digital Marketing Funnels & Framework', NULL, NULL, NULL, 3, 2, 21, 296, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(300, 'Digital Media Ecosystem (Owned, Paid & Earned)', NULL, NULL, NULL, 4, 2, 21, 296, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(301, 'Paid Channel Deep Dive', NULL, NULL, NULL, 2, 1, 21, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:30:29', 1, '2024-01-12 09:53:14', 1),
(302, 'Campaign Objectives and Buying Types', NULL, NULL, NULL, 1, 2, 21, 301, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(303, 'Digital Paid Metrics', NULL, NULL, NULL, 2, 2, 21, 301, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(304, 'Social Media Fundamentals', NULL, NULL, NULL, 3, 1, 21, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:30:29', 1, '2024-01-12 09:53:14', 1),
(305, 'Intro to Meta Ads Platform (Including BM, Objectives & campaign creation)', NULL, NULL, NULL, 1, 2, 21, 304, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(306, 'Audience and Signals', NULL, NULL, NULL, 2, 2, 21, 304, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(307, 'Creative Ads', NULL, NULL, NULL, 3, 2, 21, 304, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:30:29', 1, '2023-09-08 14:40:11', 1),
(319, 'Onboarding', NULL, NULL, NULL, 0, 2, 9, 82, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 13:48:47', 1, '2023-08-25 15:59:28', 1),
(320, 'Introduction to Content Creation', NULL, NULL, NULL, 2, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(321, 'Instagram Basics', NULL, NULL, NULL, 3, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(322, 'Instagram Content Creation', NULL, NULL, NULL, 4, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(323, 'Instagram Storytelling', NULL, NULL, NULL, 5, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(324, 'Instagram Strategy and Analytics', NULL, NULL, NULL, 6, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(325, 'Introduction to Tiktok', NULL, NULL, NULL, 7, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(326, 'Tiktok Content Creation', NULL, NULL, NULL, 8, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(327, 'TikTok Trends and Challenges', NULL, NULL, NULL, 9, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(328, 'TikTok Strategy and Analytics', NULL, NULL, NULL, 10, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(329, 'Conclusion and Next Steps', NULL, NULL, NULL, 11, 1, 9, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 13:52:34', 1, '2024-01-12 09:53:14', 1),
(330, 'Signing NDA and Ethical Hacking', NULL, NULL, NULL, 1, 1, 20, NULL, NULL, 'parent', NULL, NULL, '', NULL, 1, '2023-07-04 14:30:17', 1, '2024-01-12 09:59:54', 1),
(331, 'Web Fundamental', NULL, NULL, NULL, 2, 1, 20, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 14:30:17', 1, '2024-01-12 09:53:14', 1),
(332, 'Scraping Web (Normal and JSON)', NULL, NULL, NULL, 1, 2, 20, 331, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:30:17', 1, '2023-09-08 14:40:11', 1),
(333, 'Exercises (Study Case: MercuryFM News Portal Scrap)', NULL, NULL, NULL, 2, 2, 20, 331, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:30:17', 1, '2023-09-08 14:40:11', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(334, 'Authentication Bypass', NULL, NULL, NULL, 3, 1, 20, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 14:34:34', 1, '2024-01-12 09:53:14', 1),
(335, 'Web Browser BOT Making (Study Case: FarmRPG)', NULL, NULL, NULL, 1, 2, 20, 334, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(336, 'Exercises (Study Case: FarmRPG Fishing and Explore Area)', NULL, NULL, NULL, 2, 2, 20, 334, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(337, 'Puppeter Introduction', NULL, NULL, NULL, 4, 1, 20, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 14:34:34', 1, '2024-01-12 09:53:14', 1),
(338, 'Automation with Puppeter (Study Case: Discord BOT on Fishing Game) Gitlab:', NULL, NULL, NULL, 1, 2, 20, 337, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(339, 'Exercises (Study Case: Discord Game)', NULL, NULL, NULL, 2, 2, 20, 337, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:34:34', 1, '2023-09-08 14:40:11', 1),
(340, 'Android Hack Introduction', NULL, NULL, NULL, 5, 1, 20, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 14:37:39', 1, '2024-01-12 09:53:14', 1),
(341, 'Sniffing Android Tools: Packet Capture', NULL, NULL, NULL, 1, 2, 20, 340, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:40:11', 1),
(342, 'Autoclicker for BOT / Macro (Study Case: Idle TD Evolved) Tools: Auto Clicker - Automatic Tap (Basic) Click Assistant - Auto Clicker (Basic+) Macrorify (Intermediate) Hiro Macro (Pro - ROOT)\r\n', NULL, NULL, NULL, 2, 2, 20, 340, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:40:11', 1),
(343, 'Exercises (Study Case: Idle RPG)', NULL, NULL, NULL, 3, 2, 20, 340, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:37:39', 1, '2023-09-08 14:40:11', 1),
(344, 'Android MOD Introduction', NULL, NULL, NULL, 6, 1, 20, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-07-04 14:39:45', 1, '2024-01-12 09:53:14', 1),
(345, 'Remove Cert and Making Unsigned APKTools: Android Multitool', NULL, NULL, NULL, 1, 2, 20, 344, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:40:11', 1),
(346, 'VMOS for Rooted Android', NULL, NULL, NULL, 2, 2, 20, 344, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:40:11', 1),
(347, 'Exercises (Study Case)', NULL, NULL, NULL, 3, 2, 20, 344, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-04 14:39:45', 1, '2023-09-08 14:40:11', 1),
(348, 'Solusi saat bekerja dalam tim', NULL, NULL, NULL, 2, 2, 3, 203, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-07-05 14:42:42', 1, '2023-09-08 14:40:11', 1),
(360, 'CV and Cover Letter', NULL, NULL, NULL, 5, 1, 1, NULL, 1, 'company_profile', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:53:14', 0),
(361, 'Tips and Trick for CV and Cover Letter', NULL, NULL, NULL, 1, 2, 1, 360, 1, 'materi_pembelajaran', 'Maxy_Resumes  Cover Letter.pdf', NULL, '<p>Halo Maxians!</p>\n\n<p>Pada materi ini, kalian akan memperoleh pemahaman mendalam tentang bagaimana cara menonjolkan keunggulan diri, menyusun konten yang relevan, dan menarik perhatian pemberi kerja dengan cara yang efektif. Selain itu, kami juga akan membagikan contoh-contoh nyata yang sukses dalam dunia kerja, sehingga Anda bisa mempelajari apa yang sebaiknya dilakukan dan apa yang sebaiknya dihindari. Yuk, siapkan diri untuk langkah lebih maju dalam karier Anda! </p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-15 13:09:01', 0),
(362, 'CV and Cover Letter', NULL, NULL, NULL, 2, 2, 1, 360, 1, 'assignment', NULL, NULL, 'Please submit your CV and Cover letter in the column below.', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(363, 'Database Overview', NULL, NULL, NULL, 6, 1, 1, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 08:59:48', 0),
(364, 'Database Overview', NULL, NULL, NULL, 1, 2, 1, 363, 2, 'materi_pembelajaran', 'Day 2 - Database Overview.pdf', NULL, '<p>Halo Maxians!</p>\r\n<p>Pada hari ini, kita akan belajar tentang pengenalan database dan cara membuat database bersih menggunakan PHPMyAdmin. Kita akan belajar bagaimana melakukan operasi dasar pada database, merancang database sesuai kebutuhan. Selamat belajar!</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 13:31:24', 0),
(365, 'Database Overview', NULL, NULL, NULL, 2, 2, 1, 363, 2, 'assignment', NULL, NULL, '<p>Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui SQL yang dihasilkan apakah sudah memenuhi best practices dalam pembuatan SQL, dan mentor yang menilai dapat memahami secara gambaran besar apa kira-kira maksud dari masing-masing tabel secara cepat. Jika ada sesuatu yang tidak dipahami oleh mentor, penilaian juga dilakukan melalui hasil dokumentasi database yang dihasilkan oleh peserta.</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 08:18:48', 1),
(366, 'HTML CSS Session 1 Dasar HTML dan CSS\n', NULL, NULL, NULL, 7, 1, 1, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:00:24', 0),
(367, 'Purchasing Cycle', NULL, NULL, NULL, 1, 2, 1, 366, 3, 'video_pembelajaran', 'https://www.youtube.com/watch?v=PiAUqNttj1g', 2, 'Tutorial Video PHP Overview', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 09:14:34', 0),
(368, 'Purchasing Cycle', NULL, NULL, NULL, 2, 2, 1, 366, 3, 'assignment', NULL, NULL, '<p>Membuat Source code yang dihasilkan: - Penamaan Class - Pembagian View - Clean Code - Basic security melalui authentication dan permission - Proses validasi yang dilakukan disesuaikan dengan kebutuhan data</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 08:17:36', 1),
(369, 'Sesi 2 : HTML and CSS Advanced', NULL, NULL, NULL, 8, 1, 1, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:00:34', 0),
(370, 'Master - Detail Relationship with Laravel', NULL, NULL, NULL, 1, 2, 4, 369, 1, 'video_pembelajaran', 'https://www.youtube.com/watch?v=d0FT3IL8vrg', 17, 'Rapid Application Development using Laravel on Transaction Data', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:48:39', 0),
(371, 'Rapid Development Using Laravel on Transaction Data', NULL, NULL, NULL, 2, 2, 1, 369, 4, 'materi_pembelajaran', 'Day 4 Source Code.pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada materi ini, kalian akan belajar membuat transaction data menggunakan Laravel. Yuk, langsung klik materi di bawah.</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 08:15:13', 1),
(372, 'Rapid Development Using Laravel on Transaction Data', NULL, NULL, NULL, 2, 2, 1, 369, 4, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penamaan Class\r\n\r\n- Clean Code\r\n\r\n- Basic security melalui authentication dan permission\r\n\r\n- Proses validasi (multi validation) yang dilakukan disesuaikan dengan kebutuhan data', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(373, 'Portofolio Day', NULL, NULL, NULL, 9, 1, 1, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:00:52', 0),
(374, 'Bootstrap 4 and Sematic UI', NULL, NULL, NULL, 1, 2, 1, 377, 5, 'video_pembelajaran', 'https://www.youtube.com/watch?v=OYSfSRcnb2g', 32, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-13 09:12:07', 0),
(375, 'Bootstrap 4 and Semantic UI', NULL, NULL, NULL, 2, 2, 1, 373, 5, 'materi_pembelajaran', 'Day_5_boostrap_dan_semantic.pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada pertemuan kali ini para Maxians akan belajar menggunakan Bootstrap 4 dan Semantic UI. Dimulai dari penginstallan sampai pemanfaatan Bootstrap dan Semantic UI yang akan kalian implementasikan dalam pembuatan form untuk menambahkan data mahasiswa.</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-10 08:45:05', 0),
(376, 'Bootstrap 4 and Sematic UI 2', NULL, NULL, NULL, 3, 2, 1, 373, 5, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Responsive Design\r\n\r\n- Clean Form', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(377, 'Bootstrap and Semantic UI for Backend (CSS Components)', NULL, NULL, NULL, 10, 1, 1, NULL, 6, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:01:03', 0),
(378, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, NULL, 1, 2, 1, 389, 9, 'video_pembelajaran', 'https://www.youtube.com/watch?v=wCeXN5m7KtM', 22, 'Implement JQuery UI (Form Components) and LeafletJS', NULL, 1, '2023-02-24 12:17:59', 1, '2024-01-13 09:37:02', 1),
(379, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, NULL, 2, 2, 1, 377, 6, 'materi_pembelajaran', 'Day_6_laeflet_dan_jquery_ui.pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada pembelajaran pada hari ini, Maxians akan belajar tentang Leaflet dan JQuery UI. yang di mana JQuery UI merupakan API yang akan membantu kita dalam membuat calender datepicker,\r\nautocomplete, spinner dan juga tooltip. Leaflet JS itu sendiri merupakan sebuah library yang digunakan menampilkan peta interaktif pada halaman web. So, tunggu apalagi? langsung saja klik materi di bawah untuk belajar lebih lanjut!</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-10 08:48:00', 0),
(380, 'Implement JQuery UI and LeafletJS on Backend', NULL, NULL, NULL, 3, 2, 1, 389, 9, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan JQuery UI widgets atau komponen penyetara\r\n\r\n- Penggunaan AJAX\r\n\r\n- Penggunaan LeafletJS atau geocoding picker lainnya.\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 1, '2024-01-13 09:38:03', 1),
(381, 'JavaScript Introduction', NULL, NULL, NULL, 11, 1, 1, NULL, 7, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:01:16', 0),
(382, 'Implement DataTable on Backend', NULL, NULL, NULL, 1, 2, 1, 381, 7, 'video_pembelajaran', 'https://www.youtube.com/watch?v=9BxbsmlDhfA', 33, 'Implement Data Table on Backend', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:49:22', 0),
(383, 'Implement DataTable on Backend', NULL, NULL, NULL, 2, 2, 1, 381, 7, 'materi_pembelajaran', 'Day 7 datatable.pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada pembelajaran hari ini, kita akan belajar tentang DataTable. Kira-kira maxians tau ngga sih apa fungsi DataTable? kalau belum tau, Yuk langsung saja klik materi di bawah ini.</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 08:13:58', 1),
(384, 'Implement DataTable on Backend', NULL, NULL, NULL, 3, 2, 1, 381, 7, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan DataTables\r\n\r\n- Penggunaan DataTables extension', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(385, 'Implement ChartJS', NULL, NULL, NULL, 12, 1, 1, NULL, 8, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:01:27', 0),
(386, 'Implement ChartJS on Backend', NULL, NULL, NULL, 1, 2, 1, 385, 8, 'video_pembelajaran', 'https://www.youtube.com/watch?v=tYjN83va47I', 9, 'IMplement ChartJS on Backend', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:49:33', 0),
(387, 'Implement ChartJS on Backend', NULL, NULL, NULL, 2, 2, 1, 385, 8, 'materi_pembelajaran', 'Day_8_ChartJS.pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada pembelajaran hari ini, kalian akan belajar tentang ChartJS. Kira-kira maxians sudah tau apa itu ChartJS? kalau belum, Yuk langsung saja kita belajar melalui materi di bawah ini.</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-10 08:52:14', 0),
(388, 'Implement ChartJS on Backend', NULL, NULL, NULL, 3, 2, 1, 385, 8, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan ChartJS pada Dashboard dan Report\r\n\r\n- Penggunaan Scriptable Options pada ChartJS\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(389, 'Implement JQuery UI (Form Components) and LeafletJS', NULL, NULL, NULL, 13, 1, 1, NULL, 9, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:01:37', 0),
(390, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, NULL, 1, 2, 1, 389, 9, 'video_pembelajaran', 'https://www.youtube.com/watch?v=n9-onRluf-w', 64, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:49:46', 0),
(391, 'Implement Social OAuth, Two Factor Authentication, and SEO Management on Backend', NULL, NULL, NULL, 2, 2, 1, 389, 9, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Social Oauth\r\n\r\n- Penggunaan Two Factor Authentication\r\n\r\n- Adanya SEO management di Backend', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(392, 'Communication and Public Speaking Skill', NULL, NULL, NULL, 14, 1, 1, NULL, 10, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:02:20', 0),
(393, 'Implement PHPSpreadssheet', NULL, NULL, NULL, 1, 2, 1, 392, 10, 'video_pembelajaran', 'https://www.youtube.com/watch?v=GbD_gBhI4cc', 10, 'Implement PHP Spreadsheet', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:49:58', 0),
(394, 'Implement PHPSpreadssheet', NULL, NULL, NULL, 2, 2, 1, 392, 10, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Adanya fitur bulk upload\r\n\r\n- Adanya fitur Export with Formula (normal export sudah dicover oleh DataTables Button)', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(395, 'SQL Session 1', NULL, NULL, NULL, 15, 1, 1, NULL, 11, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:01:52', 0),
(396, 'Working on Report', NULL, NULL, NULL, 1, 2, 1, 395, 11, 'video_pembelajaran', 'https://www.youtube.com/watch?v=VBjivRsBbP0', 46, 'Working on Report', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:50:08', 0),
(397, 'Working on Report', NULL, NULL, NULL, 2, 2, 1, 395, 11, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui source code yang dihasilkan:\r\n\r\n- Fitur reporting dengan filter, sort, dan executive summary\r\n\r\n- Fitur what-if analysis menggunakan pivot table', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(398, '	\nSQL Session 2', NULL, NULL, NULL, 16, 1, 1, NULL, 12, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:02:32', 0),
(399, 'Web Service Using Lumen', NULL, NULL, NULL, 1, 2, 1, 398, 12, 'video_pembelajaran', 'https://www.youtube.com/watch?v=_XFmtmYOKS0', 68, 'Web Services Using Lumen', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:50:22', 0),
(400, 'Web Service Using Lumen', NULL, NULL, NULL, 2, 2, 1, 398, 12, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- REST API dan response yang diberikan (pengujian akan dilakukan melalui dokumentasi Postman yang disubmit)', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(401, '	\nSQL Session 3', NULL, NULL, NULL, 17, 1, 1, NULL, 13, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-17 09:02:37', 0),
(402, 'Backend For CMS', NULL, NULL, NULL, 1, 2, 1, 401, 13, 'video_pembelajaran', 'https://www.youtube.com/watch?v=Kg6bicBpiow', 25, 'Backend for CMS', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:50:35', 0),
(403, 'Backend For CMS', NULL, NULL, NULL, 2, 2, 1, 401, 13, 'assignment', NULL, NULL, '<p>Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan: - CMS yang komponen-komponennya SEO-friendly - Pengaplikasian SurveyJS Creator</p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-11 07:57:55', 1),
(404, 'CV and Cover Letter', NULL, NULL, NULL, 1, 1, 2, NULL, 1, 'company_profile', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:53:14', 0),
(405, 'Tips and Trick for CV and Cover Letter', NULL, NULL, NULL, 1, 2, 2, 404, 1, 'materi_pembelajaran', 'Maxy_Resumes  Cover Letter.pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada materi ini, kalian akan memperoleh pemahaman mendalam tentang bagaimana cara menonjolkan keunggulan diri, menyusun konten yang relevan, dan menarik perhatian pemberi kerja dengan cara yang efektif. Selain itu, kami juga akan membagikan contoh-contoh nyata yang sukses dalam dunia kerja, sehingga Anda bisa mempelajari apa yang sebaiknya dilakukan dan apa yang sebaiknya dihindari. Yuk, siapkan diri untuk langkah lebih maju dalam karier Anda! </p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-10 08:53:23', 0),
(406, 'CV and Cover Letter', NULL, NULL, NULL, 2, 2, 2, 404, 1, 'assignment', NULL, NULL, 'Please submit your CV and Cover letter in the column below ', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(407, 'Frontend Learning', NULL, NULL, NULL, 2, 1, 2, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(408, 'HTML CSS Overview', NULL, NULL, NULL, 1, 2, 2, 407, 2, 'video_pembelajaran', 'https://youtu.be/PXW4yE-ekbk', 78, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Memahami kebutuhan client dan menerjemahkan menjadi Frontend\r\n\r\n- Membuat wireframe menggunakan Grid dan Layout yang disediakan Bootstrap 4\r\n\r\n- Menggunakan fonts yang disupport langsung oleh Bootstrap 4\r\n\r\n- Membuat mockup menggunakan component dan utilities yang disediakan oleh Bootstrap 4\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:50:46', 0),
(409, 'HTML CSS Overview and CSS Framework using Bootstrap 4', NULL, NULL, NULL, 2, 2, 2, 404, 2, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Responsive Layout\r\n\r\n- Penggunaan Bootstrap 4 Components\r\n\r\n- Penggunaan Bootstrap 4 Utilities', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(410, 'Frontend Learning', NULL, NULL, NULL, 3, 1, 2, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(411, 'Javascript adn Query Object Manipulation', NULL, NULL, NULL, 1, 2, 2, 410, 1, 'video_pembelajaran', 'https://youtu.be/7Cmb2NMXeDc', 58, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan JavaScript untuk debugging\r\n\r\n- Menggunakan JavaScript untuk manipulasi object yang ada dalam halaman website\r\n\r\n- Menggunakan JQuery sebagai shortcut untuk manipulasi object dan element yang ada dalam halaman website', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:50:55', 0),
(412, 'Javascript adn Query Object Manipulation', NULL, NULL, NULL, 2, 2, 2, 410, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan debugging\r\n\r\n- Penggunaan JavaScript/JQuery untuk melakukan manipulasi dan bukan saja untuk init component', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(413, 'Frontend Learning', NULL, NULL, NULL, 4, 1, 2, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(414, 'Sematic UI for Bootstrap Alternative', NULL, NULL, NULL, 1, 2, 2, 413, 1, 'video_pembelajaran', 'https://youtu.be/m1p18xOZwBo', 80, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan SemanticUI Basic Layouting\r\n\r\n- Menggunakan SemanticUI element, collections, dan view\r\n\r\n- Menggunakan SemanticUI modules\r\n\r\n- Memanggil modules melalui JavaScript', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:51:07', 0),
(415, 'Sematic UI for Bootstrap Alternative', NULL, NULL, NULL, 2, 2, 2, 413, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan SemanticUI elements dan modules untuk melengkapi dan mempercantik tampilan\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(416, 'Frontend Learning', NULL, NULL, NULL, 5, 1, 2, NULL, 6, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(417, 'AJAX and Web Service', NULL, NULL, NULL, 1, 2, 2, 416, 1, 'video_pembelajaran', 'https://youtu.be/--NoHEH8hAY', 45, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Widget (iframe)\r\n\r\n- Menggunakan AJAX untuk menampilkan simple data yang berasal dari API / Web Services (weather, finances, etc)\r\n\r\n- Menggunakan AJAX untuk mengolah dan menampilkan data yang membutuhkan Authentication (JWT dsb)', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:51:17', 0),
(418, 'AJAX and Web Service', NULL, NULL, NULL, 2, 2, 2, 416, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Widget\r\n\r\n- Penggunaan third party API untuk mendapatkan, mengolah, dan manampilkan data eksternal', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(419, 'Frontend Learning', NULL, NULL, NULL, 6, 1, 2, NULL, 7, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(420, 'Mobile web Apps Using framework7', NULL, NULL, NULL, 1, 2, 2, 419, 1, 'video_pembelajaran', 'https://youtu.be/bN_rhyaCM88', 16, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Instalasi Framework7\r\n\r\n- Belajar melalui Kitchen Sink\r\n\r\n- Menggunakan components dan class yang telah disediakan oleh Framework7\r\n\r\n- Menggunakan navigasi pada Framework7', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:51:31', 0),
(421, 'Mobile web Apps Using framework7', NULL, NULL, NULL, 2, 2, 2, 419, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Framework7\r\n\r\n- Penggunaan Framework7 components', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(422, 'Frontend Learning', NULL, NULL, NULL, 7, 1, 2, NULL, 8, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(423, 'Framework7 Authentication and Data Storing', NULL, NULL, NULL, 1, 2, 2, 422, 1, 'video_pembelajaran', 'https://youtu.be/a6uV2aQn7F0', 29, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Firebase Authentication\r\n\r\n- Menghubungkan Framework7 dengan Firebase Authentication\r\n\r\n- Membuat Database pada Firebase\r\n\r\n- Menyimpan data secara lokal dan penggunaan constant\r\n\r\n- Menyimpan data pada Firebase menggunakan Framework7', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:51:41', 0),
(424, 'Framework7 Authentication and Data Storing', NULL, NULL, NULL, 2, 2, 2, 422, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Firebase Authentication\r\n\r\n- Penggunaan Database Firebase', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(425, 'Frontend Learning', NULL, NULL, NULL, 8, 1, 2, NULL, 9, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(426, 'Framework7 Request Access', NULL, NULL, NULL, 1, 2, 2, 425, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan Request Access\r\n\r\n- Penggunaan Push Notification\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(427, 'Frontend Learning', NULL, NULL, NULL, 9, 1, 2, NULL, 10, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(428, 'Framework7 Convert to Andorid', NULL, NULL, NULL, 1, 2, 2, 427, 1, 'video_pembelajaran', 'https://youtu.be/deY8nXsT2d4', 12, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Instalasi Cordova\r\n\r\n- Integrasi Cordova dengan Framework7\r\n\r\n- Konversi Framework7 ke Android App melalui Cordova\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:51:53', 0),
(429, 'Framework7 Convert to Andorid', NULL, NULL, NULL, 2, 2, 2, 427, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Konversi Framework7 ke Android App', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(430, 'Frontend Learning', NULL, NULL, NULL, 10, 1, 2, NULL, 11, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(431, 'Using ChartJS', NULL, NULL, NULL, 1, 2, 2, 427, 1, 'video_pembelajaran', 'https://youtu.be/JmqyP7mIcoc', 55, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Line/Bar Chart\r\n\r\n- Menggunakan Pie Chart', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:52:10', 0),
(432, 'Using ChartJS', NULL, NULL, NULL, 2, 2, 2, 427, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Menggunakan Chart', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(433, 'Frontend Learning', NULL, NULL, NULL, 11, 1, 2, NULL, 13, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(434, 'Tracking Your Websites', NULL, NULL, NULL, 1, 2, 2, 433, 1, 'video_pembelajaran', 'https://youtu.be/V4PH-zYLwQY', 21, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menghubungkan dan Reporting menggunakan Google Analytics\r\n\r\n- Menghubungkan dan Reporting menggunakan Facebook Pixel\r\n\r\n- Menghubungkan Google Tag Manager ke Google Analytics\r\n\r\n- Menilai kualitas website yang dibuat menggunakan popular tools seperti Web.Dev dan Google Lighthouse\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:52:26', 0),
(435, 'Tracking Your Websites', NULL, NULL, NULL, 2, 2, 2, 433, 1, 'assignment', NULL, NULL, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menghubungkan dan Reporting menggunakan Google Analytics\r\n\r\n- Menghubungkan dan Reporting menggunakan Facebook Pixel\r\n\r\n- Menghubungkan Google Tag Manager ke Google Analytics\r\n\r\n- Menilai kualitas website yang dibuat menggunakan popular tools seperti Web.Dev dan Google Lighthouse', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(436, 'Frontend Learning', NULL, NULL, NULL, 12, 1, 2, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(437, 'Bootstrap 4 for Backend View', NULL, NULL, NULL, 1, 2, 2, 407, 3, 'video_pembelajaran', 'https://youtu.be/7Cmb2NMXeDc', 58, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan JavaScript untuk debugging\r\n\r\n- Menggunakan JavaScript untuk manipulasi object yang ada dalam halaman website\r\n\r\n- Menggunakan JQuery sebagai shortcut untuk manipulasi object dan element yang ada dalam halaman website', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:52:38', 0),
(438, 'Bootstrap 4 for Backend View', NULL, NULL, NULL, 2, 2, 2, 407, 3, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Penggunaan debugging\r\n\r\n- Penggunaan JavaScript/JQuery untuk melakukan manipulasi dan bukan saja untuk init component', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(439, 'Frontend Learning', NULL, NULL, NULL, 13, 1, 2, NULL, 12, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(440, 'JQuery Popular Frontend Libaries', NULL, NULL, NULL, 1, 2, 2, 430, 1, 'video_pembelajaran', 'https://youtu.be/MRzMX6M-rTk', 48, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menggunakan Parallax\r\n\r\n- Menggunakan Social Share\r\n\r\n- Menggunakan LeafletJS\r\n\r\n- Menggunakan Tawk.to dan third party sejenisnya\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:52:48', 0),
(441, 'JQuery Popular Frontend Libaries', NULL, NULL, NULL, 2, 2, 2, 430, 1, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penialain dilakukan melalui source code yang dihasilkan:\r\n\r\n- Menggunakan popular libraries di luar Bootstrap dan Semantic UI\r\n\r\n- Menggunakan third party widgets', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(443, 'UI/UX Learning', NULL, NULL, NULL, 1, 1, 3, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(444, 'Get Started with Figma', NULL, NULL, NULL, 1, 2, 3, 443, 2, 'video_pembelajaran', 'https://youtu.be/x6KJNNovCv8', 44, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat Frame\r\n\r\n- Membuat Object (Shape dan Text)\r\n\r\n- Meng-edit Object (Shape dan Text)\r\n\r\n- Mengelompokkan Object (Shape dan Text)', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:52:58', 0),
(445, 'Create your own CV', NULL, NULL, NULL, 2, 2, 3, 443, 4, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui UI/ UX CV yang dihasilkan:\r\n\r\n- Curriculum Vitae dibuat menggunakan Figma\r\n\r\n- Objek-objek yang digunakan tidak monoton\r\n\r\n- Kelengkapan unsur-unsur dalam CV yang dihasilkan terutama sesuai kaedah Harvard Style\r\n\r\nNote: Jika sudah selesai. Masukan link hasil CV anda di jawaban box yang dibawah ini:', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(446, 'UI/UX Learning', NULL, NULL, NULL, 2, 1, 3, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(447, 'Analyzing UI/ UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, NULL, 1, 2, 3, 446, 2, 'video_pembelajaran', 'https://youtu.be/yQTgsEGJUEI', 22, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan Competitor Analysis\r\n\r\n- Rapid Design dengan menggunakan plugin-plugin yang disediakan oleh Figma\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:53:08', 0),
(448, 'Analyzing UI/ UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, NULL, 2, 2, 3, 446, 4, 'assignment', NULL, NULL, 'Pilih 2 brand terkenal yang bisa dianalisa untuk UI/UX mereka\r\n\r\nKedalaman dan kelengkapan competitor Analysis yang dihasilkan\r\n\r\nPresent penggunaan Figma Plugin di dalam portfolio', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(449, 'UI/UX Learning', NULL, NULL, NULL, 3, 1, 3, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(450, 'Wireframe 101', NULL, NULL, NULL, 1, 2, 3, 449, 4, 'video_pembelajaran', 'https://youtu.be/zGMQIdMtOAQ', 51, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint dari sebuah website\r\n\r\n- Membuat section untuk setiap fitur yang sudah ditentukan', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:53:19', 0),
(451, 'Wireframe 101', NULL, NULL, NULL, 2, 2, 3, 449, 4, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Konsistensi design wireframe yang dihasilkan\r\n\r\n- Penggunaan font dan element yang sesuai dengan konsep produk dan kebutuhan client', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(452, 'UI/UX Learning', NULL, NULL, NULL, 4, 1, 3, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(453, 'Putting Design on Top of Wireframe', NULL, NULL, NULL, 1, 2, 3, 452, 5, 'video_pembelajaran', 'https://youtu.be/TA0gpoiQh5A', 60, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum.\r\n\r\nPada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir.\r\n\r\nDalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Penambahan elemen visual agar menjadi sebuah design website\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep website', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:53:38', 0),
(454, 'Putting Design on Top of Wireframe', NULL, NULL, NULL, 2, 2, 3, 452, 5, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Kesesuaian antara UI Design website dan wireframe yang sudah dibuat\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Penggunaan warna yang kontras disesuaikan dengan kebutuhan', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(455, 'UI/UX Learning', NULL, NULL, NULL, 5, 1, 3, NULL, 6, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(456, 'Putting Design on Top of Wireframe', NULL, NULL, NULL, 1, 2, 3, 455, 6, 'video_pembelajaran', 'https://youtu.be/p3JqUZqV_rA', 102, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah website landing page\r\n\r\n- Mendesign dan menambahkan elemen visual agar menjadi sebuah design website landing page\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep website - Menentukan font yang sesuai dengan konsep website', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:53:52', 0),
(457, 'Putting Design on Top of Wireframe', NULL, NULL, NULL, 2, 2, 3, 455, 6, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dan element dengan konsep produk Dari design yang dihasilkan', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(458, 'UI/UX Learning', NULL, NULL, NULL, 6, 1, 3, NULL, 7, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(459, 'Wireframe for News Portal (Mobile)', NULL, NULL, NULL, 1, 2, 3, 458, 7, 'video_pembelajaran', 'https://youtu.be/Gbq9LyIKzNY', 122, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah aplikasi news portal\r\n\r\n- Mendesign dan menambahkan elemen visual agar menjadi sebuah design website news portal\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep mobile app\r\n\r\n- Menentukan font yang sesuai dengan konsep mobile app', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:54:03', 0),
(460, 'Wireframe for News Portal (Mobile)', NULL, NULL, NULL, 2, 2, 3, 458, 7, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(461, 'UI/UX Learning', NULL, NULL, NULL, 7, 1, 3, NULL, 8, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(462, 'Wireframe for News Portal (Mobile)', NULL, NULL, NULL, 1, 2, 3, 461, 8, 'video_pembelajaran', 'https://youtu.be/wiL4diC9j5w', 80, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah design mobile app marketplace\r\n\r\n- Mendesign dan menambahkan elemen visual agar menjadi sebuah design mobile app Marketplace -\r\n\r\nMenentukan color pallete yang sesuai dengan konsep mobile app -\r\n\r\nMenentukan font yang sesuai dengan konsep mobile app\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:54:12', 0),
(463, 'Wireframe for News Portal (Mobile)', NULL, NULL, NULL, 2, 2, 3, 461, 8, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras - Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(464, 'UI/UX Learning', NULL, NULL, NULL, 8, 1, 3, NULL, 9, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(465, 'Backend UI/ UX Design', NULL, NULL, NULL, 1, 2, 3, 464, 9, 'video_pembelajaran', 'https://youtu.be/UYJVEUzfNxg', 75, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat UI/ UX Design untuk website backend\r\n\r\n- Membuat design Table untuk konten pada setiap menu', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:54:23', 0),
(466, 'Backend UI/ UX Design', NULL, NULL, NULL, 2, 2, 3, 464, 9, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- UI design backend Marketplace\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(467, 'UI/UX Learning', NULL, NULL, NULL, 9, 1, 3, NULL, 10, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(468, 'Wireframe for Marketplace Payment Details', NULL, NULL, NULL, 1, 2, 3, 467, 10, 'video_pembelajaran', 'https://youtu.be/JG7h9FwxGss', 81, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Membuat kerangka atau blueprint untuk sebuah alur payment details pada aplikasi marketplace\r\n\r\n- Membuat UI Design untuk sebuah alur payment details pada aplikasi marketplace - Menentukan color pallete yang sesuai dengan konsep mobile app\r\n\r\n- Menentukan font yang sesuai dengan konsep mobile app\r\n\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:54:32', 0),
(469, 'Wireframe for Marketplace Payment Details', NULL, NULL, NULL, 2, 2, 3, 467, 10, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk Dari design yang dihasilkan\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(470, 'UI/UX Learning', NULL, NULL, NULL, 10, 1, 3, NULL, 11, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(471, 'Wireframe for Marketplace Payment Details', NULL, NULL, NULL, 1, 2, 3, 470, 11, 'video_pembelajaran', 'https://youtu.be/vl2hPdsNEVQ', 39, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Menjadikan beberapa UI design untuk sebuah prototype\r\n\r\n- Menganimasikan prototype\r\n\r\n- Menentukan animasi yang tepat dalam prototype', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:54:43', 0),
(472, 'Wireframe for Marketplace Payment Details', NULL, NULL, NULL, 2, 2, 3, 470, 11, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Workflow yang mudah dipahami\r\n\r\n- Simplisitas dalam menganimasikan prototype\r\n', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(473, 'UI/UX Learning', NULL, NULL, NULL, 11, 1, 3, NULL, 12, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(474, 'UX Writing', NULL, NULL, NULL, 1, 2, 3, 473, 12, 'video_pembelajaran', 'https://youtu.be/cyFjJVA6X2g', 19, 'Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembangunan karakter sebuah produk melalui Diction Filtering', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:54:52', 0),
(475, 'UX Writing', NULL, NULL, NULL, 2, 2, 3, 473, 12, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- UI design tentang login dan signup untuk salah satu dari marketplace atau news portal, dengan cara membuat ux writing juga untuk bagian login dan sign up.', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(476, 'UI/UX Learning', NULL, NULL, NULL, 12, 1, 3, NULL, 13, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(477, 'Best Practices for Figma on Teams', NULL, NULL, NULL, 1, 2, 3, 476, 13, 'video_pembelajaran', 'https://youtu.be/raFf0oJO6vM', 101, 'Learning Details:\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada project akhir, setiap tim akan berdiskusi dengan mentor, dan mempelajari dari berbagai dokumen dan studi kasus yang disediakan oleh mitra proyek akhir. Dalam kegiatan-kegiatan tersebut, langkah yang dilakukan dalam pembelajaran terkait:\r\n\r\n- Pembuatan UI/ UX Design sebuah website atau mobile app dari studi kasus yang diberikan\r\n\r\n- Menentukan color pallete yang sesuai dengan konsep website atau mobile app\r\n\r\n- Menentukan font yang sesuai dengan konsep website atau mobile app', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:55:01', 0),
(478, 'Best Practices for Figma on Teams', NULL, NULL, NULL, 2, 2, 3, 476, 13, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Wireframe yang dihasilkan\r\n\r\n- UI/ UX Design yang dihasilkan dan kesesuaian dengan wireframe\r\n\r\n- Penggunaan warna yang kontras\r\n\r\n- Penggunaan aset yang sesuai dengan konsep website\r\n\r\n- Konsistensi design\r\n\r\n- Penggunaan font dengan konsep produk\r\n\r\n- Workflow yang mudah dipahami\r\n\r\n- Simplisitas dalam menganimasikan prototype Dari design yang dihasilkan', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(479, 'CV and Cover Letter', NULL, NULL, NULL, 13, 1, 3, NULL, 1, 'company_profile', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:22:24', 0),
(480, 'CV and Cover Letter', NULL, NULL, NULL, 1, 2, 3, 479, 1, 'assignment', NULL, NULL, 'Please submit your CV and Cover letter in the column below ', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:22:45', 0),
(481, 'Onboarding Hacking not Cracking', NULL, NULL, NULL, 7, 1, 20, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(482, 'Introduction Hacking not Cracking', NULL, NULL, NULL, 1, 2, 20, 481, 1, 'video_pembelajaran', 'https://youtu.be/48J4NTrbp08', 11, 'Hai Maxians, selamat datang di mini bootcamp hacking Maxy Academy. Disini kita akan belajar mulai dari basic mengenai hacking dan kita tidak hanya belajar teori pastinya tapi langsung praktek bersama teman-teman tutor dari Maxy Academy. \r\nSebelum mengikuti bootcamp, teman-teman diharapkan mengisi form pernyataan untuk mengikuti bootcamp hacking secara etis dan tidak melakukan hal yang bukan semestinya, jika ada celah maka data yang diubah harus dikembalikan seperti semula. \r\nSelamat Belajar Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:55:10', 0),
(483, 'References Cyber Security', NULL, NULL, NULL, 2, 2, 20, 481, 1, 'video_pembelajaran', 'https://www.youtube.com/watch?v=9XSiyWm7-rY', 47, NULL, NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:55:20', 0),
(484, 'Scraping Web', NULL, NULL, NULL, 8, 1, 20, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(485, 'Web Fundamental', NULL, NULL, NULL, 1, 2, 20, 484, 2, 'video_pembelajaran', 'https://youtu.be/FKpmpg7VKoA', 12, 'Hi Maxians! Pada pertemuan kali ini, kita akan membahas mengenai Web Fundamental. Materi ini akan mencakup metode untuk mencari celah keamanan, scraping data dengan berbagai cara, dan autentikasi dalam celah keamanan. Setelah memahami web fundamental, mari kita belajar mengenai web scraping pada sesi kedua. \r\nSelamat belajar Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:59:50', 0),
(486, 'Web Fundamental', NULL, NULL, NULL, 2, 2, 20, 484, 2, 'materi_pembelajaran', 'Maxy Mini Bootcamp Security Day 1_Web Fundamental (1).pdf', NULL, '<p>Halo Maxians!</p>\r\n\r\n<p>Pada sesi \"Web Fundamental\" hari ini, kita akan mempelajari dasar-dasar keamanan web. Tunggu apalagi? yuk langsung saja klik materi di bawah ini. </p>', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-10 08:54:57', 0),
(487, 'Web Fundamental', NULL, NULL, NULL, 3, 2, 20, 484, 2, 'video_pembelajaran', 'https://youtu.be/PL8eVtmmPF4', 45, 'Hi Maxians! Pada sesi ini kita akan mencoba langsung scraping data menggunakan php. Target kita adalah portal berita bernama kapanlagi (kapanlagi.com). Cari celah keamanannya dan serang website nya!!! Eits tapi jangan sampai jadi black hat hacker yaa. \r\nSelamat belajar Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 15:59:59', 0),
(488, 'Additional function for scraping data', NULL, NULL, NULL, 4, 2, 20, 484, 2, 'materi_pembelajaran', NULL, NULL, '<?php\r\nfunction _retriever($url, $data = NULL, $header = NULL, $method = \'GET\')\r\n{\r\n    $cookie_file_path = dirname(__FILE__) . \"/cookie/techinasia.txt\";\r\n    $datas[\'http_code\'] = 0;\r\n    if ($url == \"\")\r\n        return $datas;\r\n    $data_string = \'\';\r\n    if ($data != NULL) {\r\n        if (is_array($data)) {\r\n            foreach ($data as $key => $value) {\r\n                $data_string .= $key . \'=\' . $value . \'&\';\r\n            }\r\n        } else {\r\n            $data_string = $data;\r\n        }\r\n    }\r\n\r\n    $ch = curl_init();\r\n    if ($header != NULL)\r\n        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);\r\n    curl_setopt($ch, CURLOPT_HEADER, false);\r\n    curl_setopt($ch, CURLOPT_NOBODY, false);\r\n    curl_setopt($ch, CURLOPT_URL, $url);\r\n    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);\r\n\r\n    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);\r\n    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);\r\n    curl_setopt(\r\n        $ch,\r\n        CURLOPT_USERAGENT,\r\n        \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\"\r\n    );\r\n    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);\r\n    curl_setopt($ch, CURLOPT_REFERER, $_SERVER[\'REQUEST_URI\']);\r\n    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);\r\n    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);\r\n    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);\r\n\r\n    if ($data != NULL) {\r\n        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);\r\n        // curl_setopt($ch, CURLOPT_POST, count($data));\r\n        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);\r\n    }\r\n\r\n    $html = curl_exec($ch);\r\n    //echo curl_getinfo($ch, CURLINFO_HTTP_CODE);\r\n    //echo $html;\r\n    if (!curl_errno($ch)) {\r\n        $datas[\'http_code\'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);\r\n        if ($datas[\'http_code\'] == 200) {\r\n            $datas[\'result\'] = $html;\r\n        }\r\n    }\r\n    curl_close($ch);\r\n    return $datas;\r\n?>', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 08:23:56', 0),
(489, 'Assignment Day 2', NULL, NULL, NULL, 5, 2, 20, 484, 2, 'assignment', NULL, NULL, 'Setalah memahami cara melakukan scraping data, tugas untuk hari ini adalah melakukan scraping berita-berita yang ada pada MercuryFM. Ambil judul, tanggal terbit, penulis, gambar, dan konten dari berita-berita yang ada di homepage MercuryFM. Tampilkan dalam bentuk table dan upload hasil coding dalam bentuk zip. \r\nSelamat mengerjakan tugasnya Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(490, 'Authentication Bypass', NULL, NULL, NULL, 9, 1, 20, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(491, 'Authentication Bypass & BOT making', NULL, NULL, NULL, 1, 2, 20, 490, 3, 'video_pembelajaran', 'https://youtu.be/DK5Xfu50eU0', 54, 'Hi Maxians! Setelah memahami dasar-dasar website dan scraping, selanjutnya kita akan mempelajari cara membuat sistem otomatisasi pada website. Dalam materi kali ini, kita akan mempelajari cara menembus autentikasi lalu membuat BOT otomatisasi dalam bermain game browser bernama FarmRPG. \r\nSelamat belajar Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 16:00:11', 0),
(492, 'Assignment Day 3', NULL, NULL, NULL, 2, 2, 20, 490, 3, 'assignment', NULL, NULL, 'Hi Maxians!\r\nTugas kalian untuk hari ini adalah membuat BOT otomatisasi untuk Fishing dan Explore Area pada FarmRPG. Upload file tugas kalian dengan format nama Nama_Day2\r\n\r\ndalam bentuk Zip.\r\nSelamat mengerjakan Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(493, 'Automation', NULL, NULL, NULL, 10, 1, 20, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-02-24 12:17:59', 0, '2024-01-12 09:59:54', 0),
(494, 'Automation & Puppeteer Introduction', NULL, NULL, NULL, 1, 2, 20, 493, 4, 'video_pembelajaran', 'https://youtu.be/XU34h9N79fU', 3, 'Hi Maxians! Dalam melakukan otomatisasi, macro dapat membantu kita melakukan otomatisasi fungsi secara berulang. Puppeteer menjadi salah satu library di Node.js yang dapat melakukan otomatisasi. Materi kali ini akan membahas bagaimana menggunakan puppeteer dalam melakukan otomatisasi. \r\nSelamat belajar Maxians!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 16:00:24', 0),
(495, 'Automation with Puppeteer', NULL, NULL, NULL, 2, 2, 20, 493, 4, 'video_pembelajaran', 'https://youtu.be/7Vm0ei6Wvro', 48, 'Hi Maxians! Sudah tahu kan apa itu puppeteer? Sekarang kita akan langsung mencoba menggunakan puppeteer untuk melakukan otomatisasi pada Discord. Simak video berikut dan selamat belajar Maxians!!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-12-27 16:00:36', 0),
(496, 'Assignment Day 4', NULL, NULL, NULL, 3, 2, 20, 493, 4, 'assignment', NULL, NULL, 'Sudah paham menggunakan puppeteer? Sekarang tugas kalian adalah menggabungkan apa yang telah kalian pelajari dengan konsep dasar looping supaya puppeteer dapat secara otomatis mengetik /fish terus menerus. Tambahkan checking yang menurut kalian akan diperlukan supaya puppeteer dapat berjalan dengan lancar. Selamat mengerjakan Maxians!!', NULL, 1, '2023-02-24 12:17:59', 0, '2023-08-09 11:55:58', 0),
(508, 'What is content creation?', NULL, NULL, NULL, 1, 2, 9, 320, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:35:43', 1, '2023-08-25 16:35:43', 1),
(509, 'Understanding the importance of creating engaging content', NULL, NULL, NULL, 2, 2, 9, 320, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:35:43', 1, '2023-08-25 16:35:43', 1),
(510, 'Introduction to the different types of content (e.g. photos, videos, graphics, etc.)', NULL, NULL, NULL, 3, 2, 9, 320, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:35:43', 1, '2023-08-25 16:35:43', 1),
(511, 'Setting up an Instagram account and optimizing your profile\r\n', NULL, NULL, NULL, 1, 2, 9, 321, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:40:36', 1, '2023-08-25 16:40:36', 1),
(512, 'Understanding Instagrams algorithm and how it affects post visibility', NULL, NULL, NULL, 2, 2, 9, 321, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:40:36', 1, '2023-08-25 16:40:36', 1),
(513, 'Creating an Instagram profile that stands out and reflects your brand', NULL, NULL, NULL, 3, 2, 9, 321, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:40:36', 1, '2023-08-25 16:40:36', 1),
(514, 'Best practices for creating Instagram content\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 322, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:41:49', 1, '2023-08-25 16:41:49', 1),
(515, 'Understanding Instagrams visual aesthetic and how to use it to your advantage\r\n', NULL, NULL, NULL, 2, 2, 9, 322, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:41:49', 1, '2023-08-25 16:41:49', 1),
(516, 'Creating effective captions that engage your audience\n', NULL, NULL, NULL, 3, 2, 9, 322, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:41:49', 1, '2023-08-25 16:43:45', 1),
(517, 'Understanding the importance of storytelling on Instagram\r\n\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 323, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:45:10', 1, '2023-08-25 16:45:10', 1),
(518, 'Creating Instagram stories that engage your audience\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 323, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:45:10', 1, '2023-08-25 16:45:10', 1),
(519, 'Using Instagram story features (e.g. polls, questions, etc.) to increase engagement and\r\ncreate interactive content\r\n', NULL, NULL, NULL, 3, 2, 9, 323, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:45:10', 1, '2023-08-25 16:45:10', 1),
(520, 'Developing an Instagram content strategy\r\n\r\n\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 324, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:05', 1, '2023-08-25 16:46:05', 1),
(521, 'Understanding Instagram analytics and how to use them to improve your content\r\nstrategy\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 324, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:05', 1, '2023-08-25 16:46:05', 1),
(522, 'How to collaborate with brands on Instagram and leverage partnerships to grow your\r\naudience\r\n', NULL, NULL, NULL, 3, 2, 9, 324, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:05', 1, '2023-08-25 16:46:05', 1),
(523, 'What is TikTok?\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 325, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:57', 1, '2023-08-25 16:46:57', 1),
(524, 'Understanding TikToks algorithm and how it affects post visibility\r\n\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 325, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:57', 1, '2023-08-25 16:46:57', 1),
(525, 'How to set up a TikTok account\n\n', NULL, NULL, NULL, 3, 2, 9, 325, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:46:57', 1, '2023-08-25 16:48:46', 1),
(526, 'Best practices for creating TikTok content that is visually appealing and engaging\r\n\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 326, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:47:52', 1, '2023-08-25 16:47:52', 1),
(527, 'Understanding TikToks visual aesthetic and how to use it to your advantage\r\n\r\n\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 326, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:47:52', 1, '2023-08-25 16:47:52', 1),
(528, 'Creating effective captions that engage your audience\r\n\r\n', NULL, NULL, NULL, 3, 2, 9, 326, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:47:52', 1, '2023-08-25 16:47:52', 1),
(529, 'Understanding TikTok trends and challenges and how they can help increase your reach\r\nand engagement\r\n\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 327, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:49:45', 1, '2023-08-25 16:49:45', 1),
(530, 'How to participate in TikTok trends and challenges and create content that aligns with\r\nyour brand messaging\r\n\r\n\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 327, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:49:45', 1, '2023-08-25 16:49:45', 1),
(531, 'Creating your own TikTok trends and challenges to help grow your audience and\r\nengagement\r\n\r\n\r\n', NULL, NULL, NULL, 3, 2, 9, 327, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:49:45', 1, '2023-08-25 16:49:45', 1),
(532, 'Developing a TikTok content strategy that aligns with your brands goals and target\r\naudience\r\n\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 328, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:50:34', 1, '2023-08-25 16:50:34', 1),
(533, 'Understanding TikTok analytics and how to use them to improve your content strategy\r\n\r\n\r\n\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 328, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:50:34', 1, '2023-08-25 16:50:34', 1),
(534, 'How to collaborate with brands on TikTok and leverage partnerships to grow your\r\naudience\r\n\r\n', NULL, NULL, NULL, 3, 2, 9, 328, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:50:34', 1, '2023-08-25 16:50:34', 1),
(535, 'Review key concepts and skills covered throughout the bootcamp\r\n\r\n\r\n\r\n', NULL, NULL, NULL, 1, 2, 9, 329, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:51:23', 1, '2023-08-25 16:51:23', 1),
(536, 'Provide participants with actionable steps for continuing to improve their content creation\r\nskills on Instagram and TikTok\r\n\r\n\r\n\r\n\r\n\r\n', NULL, NULL, NULL, 2, 2, 9, 329, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:51:23', 1, '2023-08-25 16:51:23', 1),
(537, 'Offer resources and tools for participants to continue learning and growing their skills as\r\ncontent creators\r\n\r\n', NULL, NULL, NULL, 3, 2, 9, 329, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-25 16:51:23', 1, '2023-08-25 16:51:23', 1),
(538, 'Sekilas Budaya dan dasar bahasa Jepang', NULL, NULL, NULL, 1, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:41:09', 1, '2024-01-12 09:53:14', 1),
(539, 'Hiragana deret 1', NULL, NULL, NULL, 2, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:44:28', 1, '2024-01-12 09:53:14', 1),
(540, 'Hiragana deret 2', NULL, NULL, NULL, 3, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:45:04', 1, '2024-01-12 09:53:14', 1),
(541, 'Hiragana deret 3', NULL, NULL, NULL, 4, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:45:18', 1, '2024-01-12 09:53:14', 1),
(542, 'dakuon', NULL, NULL, NULL, 5, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:46:36', 1, '2024-01-12 09:53:14', 1),
(543, 'Bunyi panjang, konsonan berganda, Katakana', NULL, NULL, NULL, 6, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:47:10', 1, '2024-01-12 09:53:14', 1),
(544, 'Bab 1, tema: Negara, warga Negara, bahasa', NULL, NULL, NULL, 7, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:47:36', 1, '2024-01-12 09:53:14', 1),
(545, 'Bab 2, tema: Nama keluarga', NULL, NULL, NULL, 8, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:47:56', 1, '2024-01-12 09:53:14', 1),
(546, 'Bab 3, tema:  Toko serba ada', NULL, NULL, NULL, 9, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:48:25', 1, '2024-01-12 09:53:14', 1),
(547, 'Bab 4, Tema: Telepon dan surat', NULL, NULL, NULL, 10, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:48:45', 1, '2024-01-12 09:53:14', 1),
(548, 'Bab 5,  Tema: Hari libur nasional', NULL, NULL, NULL, 11, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:49:04', 1, '2024-01-12 09:53:14', 1),
(549, 'Bab 6,  Tema: Makanan', NULL, NULL, NULL, 12, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:49:25', 1, '2024-01-12 09:53:14', 1),
(550, 'Bab 7,  Tema: Keluarga', NULL, NULL, NULL, 13, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:49:45', 1, '2024-01-12 09:53:14', 1),
(551, 'Bab 8,  Tema: Warna, rasa makanan', NULL, NULL, NULL, 14, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:50:02', 1, '2024-01-12 09:53:14', 1),
(552, 'Bab 9,  tema: Musik, olahraga, film', NULL, NULL, NULL, 15, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:50:23', 1, '2024-01-12 09:53:14', 1),
(553, 'Bab 10,  tema: Di dalam Rumah', NULL, NULL, NULL, 16, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:50:39', 1, '2024-01-12 09:53:14', 1),
(554, 'Bab 11,  tema: Menu', NULL, NULL, NULL, 17, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:50:56', 1, '2024-01-12 09:53:14', 1),
(555, 'Bab 12,  tema: Pesta, Tempat terkenal', NULL, NULL, NULL, 18, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:51:17', 1, '2024-01-12 09:53:14', 1),
(556, 'Bab 13,  tema: di kota', NULL, NULL, NULL, 19, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:51:36', 1, '2024-01-12 09:53:14', 1),
(557, 'Bab 14,  Tema: Stasiun', NULL, NULL, NULL, 20, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:52:02', 1, '2024-01-12 09:53:14', 1),
(558, 'Bab 15,  Tema: Pekerjaan', NULL, NULL, NULL, 21, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:52:22', 1, '2024-01-12 09:53:14', 1),
(559, 'Bab 16,  tema: Cara mengambil uang melalui ATM', NULL, NULL, NULL, 22, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:52:41', 1, '2024-01-12 09:53:14', 1),
(560, 'Bab 17,  tema: Badan, penyakit', NULL, NULL, NULL, 23, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:52:59', 1, '2024-01-12 09:53:14', 1),
(561, 'Bab 18,  tema: Pergerakan', NULL, NULL, NULL, 24, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:53:20', 1, '2024-01-12 09:53:14', 1),
(562, 'Bab 19,  tema: Kebudayaan tradisional dan hiburan', NULL, NULL, NULL, 25, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:53:35', 1, '2024-01-12 09:53:14', 1),
(563, 'Bab 20,  tema: cara memanggil orang', NULL, NULL, NULL, 26, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:53:53', 1, '2024-01-12 09:53:14', 1),
(564, 'Bab 21,  tema: nama nama jabatan', NULL, NULL, NULL, 27, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:54:14', 1, '2024-01-12 09:53:14', 1),
(565, 'Bab 22,  tema: Pakaian', NULL, NULL, NULL, 28, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:54:30', 1, '2024-01-12 09:53:14', 1),
(566, 'Bab 23, tema: jalan, lalu lintas', NULL, NULL, NULL, 29, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:54:49', 1, '2024-01-12 09:53:14', 1),
(567, 'Bab 24,  tema: Kebiasaan tukar menukar benda/hadiah', NULL, NULL, NULL, 30, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:55:09', 1, '2024-01-12 09:53:14', 1),
(568, 'Bab 25, Tema: Kehidupan seseorang', NULL, NULL, NULL, 31, 1, 18, NULL, NULL, 'company_profile', NULL, NULL, '', NULL, 1, '2023-08-31 09:55:26', 1, '2024-01-12 09:53:14', 1),
(569, 'Bowing culture, Budaya yang unik di Jepang, jenis huruf yang dipakai dan kegunaannya. Perkenalan diri dan etikanya.', NULL, NULL, NULL, 1, 2, 18, 538, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:02:24', 1, '2023-08-31 10:02:24', 1),
(570, 'Hiragana a, i, u, e, o – ka, ki, ku, ke, ko – sa, shi su, se, so', NULL, NULL, NULL, 1, 2, 18, 539, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:06:38', 1, '2023-08-31 10:06:38', 1),
(571, 'Hiragana ta, chi, tsu, te, to – na, ni, nu, ne, no – ha, hi, fu, he, ho', NULL, NULL, NULL, 1, 2, 18, 540, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:07:26', 1, '2023-08-31 10:07:26', 1),
(572, 'Ma, mi, mu, me, mo – ya, yu, yo- ra, ri, ru, re, ro – wa, n', NULL, NULL, NULL, 1, 2, 18, 541, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:08:03', 1, '2023-08-31 10:08:03', 1),
(573, 'Fungsi dakuon, deret huruf yang bisa diberi dakuon. [“], [?]', NULL, NULL, NULL, 1, 2, 18, 542, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:08:37', 1, '2023-08-31 10:08:37', 1),
(574, 'Fungsi dan cara menggunakan bunyin panjang; konsonan berganda, deret huruf katakana dan contoh pemakaian', NULL, NULL, NULL, 1, 2, 18, 543, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:09:11', 1, '2023-08-31 10:09:11', 1),
(575, 'pola kalimat: …. desu; ……..ja arimasen, introduction to Kanji', NULL, NULL, NULL, 1, 2, 18, 544, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:09:36', 1, '2023-08-31 10:09:36', 1),
(576, 'Pola kalimat: …ka…ka; …no…desu.\r\nKarakter kanji yang berasal dari benda sekitar.\r\n', NULL, NULL, NULL, 1, 2, 18, 545, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:10:18', 1, '2023-08-31 10:10:18', 1),
(577, 'Pola kalimat: koko-soko-asoko…desu.\r\nGoresan dasar kanji dan arah goresannya.', NULL, NULL, NULL, 1, 2, 18, 546, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:10:52', 1, '2023-08-31 10:10:52', 1),
(578, 'Pola kalimat: …masen; ….masendeshita\r\nBagian kanji', NULL, NULL, NULL, 1, 2, 18, 547, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:11:19', 1, '2023-08-31 10:11:19', 1),
(579, 'Pola kalimat: ……desuyo; …………masuyo\r\nMengenali bagian-bagian kanji', NULL, NULL, NULL, 1, 2, 18, 548, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:11:54', 1, '2023-08-31 10:11:54', 1),
(580, 'Pola kalimat: ….masenka?; ………..masuyo\r\n10 kanji dasar', NULL, NULL, NULL, 1, 2, 18, 549, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:12:42', 1, '2023-08-31 10:12:42', 1),
(581, 'Pola kalimat: …..ni moraimasu\r\nKanji angka dan harga, satuan uang', NULL, NULL, NULL, 1, 2, 18, 550, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:13:08', 1, '2023-08-31 10:13:08', 1),
(582, 'Pola kalimat: …..dou desuka? ; donna…\r\nKanji berhubungan dengan profesi', NULL, NULL, NULL, 1, 2, 18, 551, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:13:32', 1, '2023-08-31 10:13:32', 1),
(583, 'Pola kalimat: penggunaan yoku, daitai, takusan\r\nKanji tentang waktu', NULL, NULL, NULL, 1, 2, 18, 552, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:14:53', 1, '2023-08-31 10:14:53', 1),
(584, 'Pola kalimat: arimasu/imasu.\r\nKanji tentang kendaraan dan tempat umum', NULL, NULL, NULL, 1, 2, 18, 553, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:15:46', 1, '2023-08-31 10:15:46', 1),
(585, 'Pola kalimat: menghitung satuan benda\r\nKanji tentang warna dan ukuran', NULL, NULL, NULL, 1, 2, 18, 554, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:16:08', 1, '2023-08-31 10:16:08', 1),
(586, 'Pola kalimat: …ni…kai\r\nKanji tentang makanan dan orangtua', NULL, NULL, NULL, 1, 2, 18, 555, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:16:33', 1, '2023-08-31 10:16:33', 1),
(587, 'Pola kalimat: …hoshii desu/…tai desu.\r\nKanji laki-laki-perempuan, lokasi.', NULL, NULL, NULL, 1, 2, 18, 556, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:16:57', 1, '2023-08-31 10:16:57', 1),
(588, 'Pola kalimat: …te kudasai/te imasu\r\nKanji berhubungan dengan kata kerja', NULL, NULL, NULL, 1, 2, 18, 557, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:17:31', 1, '2023-08-31 10:17:31', 1),
(589, 'Pola kalimat: …temo iidesu/te wa ikemasen.\r\nKanji kata benda sehari-hari', NULL, NULL, NULL, 1, 2, 18, 558, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:17:57', 1, '2023-08-31 10:17:57', 1),
(590, 'Pola kalimat: ..te kara.\r\nKanji kata kerja (bagian 2)', NULL, NULL, NULL, 1, 2, 18, 559, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:18:21', 1, '2023-08-31 10:18:21', 1),
(591, 'Pola kalimat: nakereba narimasen, nakutemo iidesu.\r\nKanji kata kerja (bagian 3)\r\n', NULL, NULL, NULL, 1, 2, 18, 560, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:18:44', 1, '2023-08-31 10:18:44', 1),
(592, 'Pola kalimat: ..ga dekimasu, ..mae ni\r\nKanji kata sifat', NULL, NULL, NULL, 1, 2, 18, 561, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:19:08', 1, '2023-08-31 10:19:08', 1),
(593, 'Pola kalimat: …ta koto ga arimasu.\r\nKanji kata sifat 2', NULL, NULL, NULL, 1, 2, 18, 562, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:19:28', 1, '2023-08-31 10:19:28', 1),
(594, 'Pola kalimat: bahasa bertingkat  untuk bentuk sopan dan biasa\r\nKanji arah mata angin', NULL, NULL, NULL, 1, 2, 18, 563, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:19:49', 1, '2023-08-31 10:19:49', 1),
(595, 'Pola kalimat: …to omoimasu; …to iimasu.\r\nKanji kata kerja (bagian 4)', NULL, NULL, NULL, 1, 2, 18, 564, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:20:09', 1, '2023-08-31 10:20:09', 1),
(596, 'Pola kalimat: kata kerja bentuk kamus\r\nKanji nama tempat umum', NULL, NULL, NULL, 1, 2, 18, 565, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:20:31', 1, '2023-08-31 10:20:31', 1),
(597, 'pola kalimat: ….toki\r\nKanji  musim, fasilitas umum\r\n', NULL, NULL, NULL, 1, 2, 18, 566, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:20:54', 1, '2023-08-31 10:20:54', 1),
(598, 'Pola kalimat: agemasu/moraimasu/kuremasu\r\nKanji hubungan persaudaraan', NULL, NULL, NULL, 1, 2, 18, 567, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:21:17', 1, '2023-08-31 10:21:17', 1),
(599, 'Pola kalimat: ..tara\r\nKanji Kata kerja (bagian 5)', NULL, NULL, NULL, 1, 2, 18, 568, NULL, '', NULL, NULL, NULL, NULL, 1, '2023-08-31 10:21:38', 1, '2023-08-31 10:21:38', 1),
(600, 'Pengenalan UI/UX dan Membuat Daftar Riwayat Hidup (CV) yang Menarik bagi Pembaca', NULL, NULL, NULL, 1, 1, 23, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-12 14:00:14', 0, '2024-01-12 09:59:54', 0),
(601, 'Pre Test', NULL, NULL, NULL, 1, 2, 23, 600, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-12 14:03:55', 0, '2023-09-14 09:21:01', 0),
(602, 'Mengenal Figma dan Fitur Dasarnya dan Menganalisa UI/UX dari berbagai situs', NULL, NULL, NULL, 2, 1, 23, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-13 10:24:26', 0, '2024-01-12 09:59:54', 0),
(603, 'Pengenalan UI/UX', NULL, NULL, NULL, 2, 2, 23, 600, 1, 'materi_pembelajaran', NULL, 120, NULL, NULL, 1, '2023-09-13 10:26:45', 0, '2023-12-27 08:23:56', 0),
(604, 'Membuat Daftar Riwayat Hidup (CV) yang Menarik bagi Pembaca', NULL, NULL, NULL, 3, 2, 23, 600, 1, 'materi_pembelajaran', NULL, 60, NULL, NULL, 1, '2023-09-13 10:29:01', 0, '2023-12-27 08:23:56', 0),
(605, 'Kuis 1', NULL, NULL, NULL, 4, 2, 23, 600, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-13 11:22:54', 0, '2023-09-14 09:21:17', 0),
(608, 'Menganalisis UI/UX dari Merk Terkenal', NULL, NULL, NULL, 1, 2, 23, 602, 2, 'materi_pembelajaran', NULL, 60, NULL, NULL, 1, '2023-09-13 11:41:09', 0, '2023-12-27 08:23:56', 0),
(609, 'Mengenal Figma dan Fitur Dasarnya', NULL, NULL, NULL, 2, 2, 23, 602, 2, 'materi_pembelajaran', NULL, 60, NULL, NULL, 1, '2023-09-13 11:43:17', 0, '2023-12-27 08:23:56', 0),
(610, 'Menganalisa Situs Marketplace dan Melakukan Cloning pada Figma', NULL, NULL, NULL, 3, 2, 23, 602, 2, 'materi_pembelajaran', NULL, 60, NULL, NULL, 1, '2023-09-13 11:43:17', 0, '2023-12-27 08:23:56', 0),
(611, 'Kuis 2', NULL, NULL, NULL, 4, 2, 23, 602, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-13 11:45:21', 0, '2023-09-14 09:21:32', 0),
(613, 'Kerangka Produk (Wireframe) Menggunakan Figma', NULL, NULL, NULL, 3, 1, 23, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-13 11:47:38', 0, '2024-01-12 09:59:54', 0),
(615, 'Kerangka Produk (Wireframe) Menggunakan Figma', NULL, NULL, NULL, 1, 2, 23, 613, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-13 11:50:21', 0, '2023-12-27 08:23:56', 0),
(616, 'Kuis 3', NULL, NULL, NULL, 2, 2, 23, 613, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-13 11:51:47', 0, '2023-09-14 09:21:39', 0),
(618, 'Meletakkan Desain di atas Kerangka Produk', NULL, NULL, NULL, 4, 1, 23, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-13 11:53:06', 0, '2024-01-12 09:59:54', 0),
(619, 'Meletakkan Desain di atas Kerangka Produk', NULL, NULL, NULL, 1, 2, 23, 618, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-13 11:55:47', 0, '2023-12-27 08:23:56', 0),
(620, 'Kuis 4', NULL, NULL, NULL, 2, 2, 23, 618, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-13 11:55:47', 0, '2023-09-14 09:20:38', 0),
(623, 'Kerangka Produk untuk Landing Page', NULL, NULL, NULL, 5, 1, 23, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-13 12:01:01', 0, '2024-01-12 09:59:54', 0),
(627, 'Kerangka Produk untuk Landing Page', NULL, NULL, NULL, 1, 2, 23, 623, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-13 12:03:49', 0, '2023-12-27 08:23:56', 0),
(631, 'D1', NULL, NULL, NULL, 1, 1, 29, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 09:37:35', 0, '2024-01-12 09:59:54', 0),
(632, 'Pre Test', NULL, NULL, NULL, 1, 2, 29, 631, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-15 09:37:35', 0, '2023-09-15 09:37:35', 0),
(633, 'Membuat Kerangka Produk / Wireframe untuk Portal Berita', NULL, NULL, NULL, 2, 2, 29, 631, 1, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 09:37:35', 0, '2023-12-27 08:23:56', 0),
(634, 'Kuis 1', NULL, NULL, NULL, 3, 2, 29, 631, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 09:37:35', 0, '2023-09-15 09:37:35', 0),
(635, 'D2', NULL, NULL, NULL, 2, 1, 29, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 09:42:40', 0, '2024-01-12 09:59:54', 0),
(636, 'Membuat Kerangka Produk / Wireframe untuk Marketplace', NULL, NULL, NULL, 1, 2, 29, 635, 2, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 09:42:40', 0, '2023-12-27 08:23:56', 0),
(637, 'Kuis 2', NULL, NULL, NULL, 2, 2, 29, 635, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 09:42:40', 0, '2023-09-15 09:42:40', 0),
(638, 'D3', NULL, NULL, NULL, 3, 1, 29, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 09:45:39', 0, '2024-01-12 09:59:54', 0),
(639, 'Backend UI/ UX Design', NULL, NULL, NULL, 1, 2, 29, 638, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 09:45:39', 0, '2023-12-27 08:23:56', 0),
(640, 'Kuis 3', NULL, NULL, NULL, 2, 2, 29, 638, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 09:45:39', 0, '2023-09-15 09:45:39', 0),
(641, 'D4', NULL, NULL, NULL, 4, 1, 29, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 09:47:53', 0, '2024-01-12 09:59:54', 0),
(642, 'Kerangka Produk / Wireframe untuk Detail pembayaran pada Marketplace ', NULL, NULL, NULL, 1, 2, 29, 641, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 09:47:53', 0, '2023-12-27 08:23:56', 0),
(643, 'Kuis 4', NULL, NULL, NULL, 2, 2, 29, 641, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 09:47:53', 0, '2023-09-15 09:52:31', 0),
(644, 'D5', NULL, NULL, NULL, 5, 1, 29, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 09:55:27', 0, '2024-01-12 09:59:54', 0),
(645, 'Prototype dan Animasi menggunakan Figma', NULL, NULL, NULL, 1, 2, 29, 644, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 09:55:27', 0, '2023-12-27 08:23:56', 0),
(646, 'Kuis 5', NULL, NULL, NULL, 2, 2, 29, 644, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 09:55:27', 0, '2023-09-15 09:55:27', 0),
(648, 'D1', NULL, NULL, NULL, 1, 1, 27, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:22:32', 0, '2024-01-12 09:59:54', 0),
(649, 'Pre Test', NULL, NULL, NULL, 1, 2, 27, 648, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:22:32', 0, '2023-09-15 10:22:32', 0),
(650, 'Perkenalan Dasar-dasar Digital Marketing', NULL, NULL, NULL, 2, 2, 27, 648, 1, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:22:32', 0, '2023-12-27 08:23:56', 0),
(651, 'Kuis 1', NULL, NULL, NULL, 3, 2, 27, 648, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:22:32', 0, '2023-09-15 10:22:32', 0),
(652, 'D2', NULL, NULL, NULL, 2, 1, 27, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:25:19', 0, '2024-01-12 09:59:54', 0),
(653, 'Perkenalan Dasar-dasar Sosial Media dan Meta Ads Platform', NULL, NULL, NULL, 1, 2, 27, 652, 2, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:25:19', 0, '2023-12-27 08:23:56', 0),
(654, 'Kuis 2', NULL, NULL, NULL, 2, 2, 27, 652, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:25:19', 0, '2023-09-15 10:25:19', 0),
(655, 'D3', NULL, NULL, NULL, 3, 1, 27, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:28:12', 0, '2024-01-12 09:59:54', 0),
(656, 'Dasar- Dasar Meta Brilliant / Meta Ads Platform', NULL, NULL, NULL, 1, 2, 27, 655, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:28:12', 0, '2023-12-27 08:23:56', 0),
(657, 'Kuis 3', NULL, NULL, NULL, 2, 2, 27, 655, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:28:12', 0, '2023-09-15 10:28:12', 0),
(658, 'D4', NULL, NULL, NULL, 4, 1, 27, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:31:30', 0, '2024-01-12 09:59:54', 0),
(659, 'Mengenal Sosial Media - TikTok', NULL, NULL, NULL, 1, 2, 27, 658, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:31:30', 0, '2023-12-27 08:23:56', 0),
(660, 'Kuis 4', NULL, NULL, NULL, 2, 2, 27, 658, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:31:30', 0, '2023-09-15 10:31:30', 0),
(661, 'D5', NULL, NULL, NULL, 5, 1, 27, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:41:04', 0, '2024-01-12 09:59:54', 0),
(662, 'Mengenal Dasar-dasar media Google Ads', NULL, NULL, NULL, 1, 2, 27, 661, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:41:04', 0, '2023-12-27 08:23:56', 0),
(663, 'Kuis 5', NULL, NULL, NULL, 2, 2, 27, 661, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:41:04', 0, '2023-09-15 10:43:01', 0),
(664, 'Post Test', NULL, NULL, NULL, 3, 2, 27, 661, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:41:04', 0, '2023-09-15 10:43:03', 0),
(665, 'Unjuk Keterampilan: ', NULL, NULL, NULL, 4, 2, 27, 661, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:41:04', 0, '2023-09-15 10:43:05', 0),
(666, 'Post Test', NULL, NULL, NULL, 3, 2, 29, 644, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:46:06', 0, '2023-09-15 10:46:06', 0),
(667, 'Unjuk Keterampilan : Membuat kerangka produk dan desain UI/UX untuk e-commerce', NULL, NULL, NULL, 4, 2, 29, 644, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:47:50', 0, '2023-09-15 10:47:50', 0),
(668, 'Kuis 5', NULL, NULL, NULL, 2, 2, 23, 623, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:51:20', 0, '2023-09-15 10:51:20', 0),
(669, 'Post Test', NULL, NULL, NULL, 3, 2, 23, 623, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:51:20', 0, '2023-09-15 10:51:20', 0),
(670, 'Unjuk Keterampilan : Membuat Landing Page untuk Produk Kecantikan', NULL, NULL, NULL, 4, 2, 23, 623, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:51:20', 0, '2023-09-15 10:51:20', 0),
(671, 'D1', NULL, NULL, NULL, 1, 1, 26, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:56:59', 0, '2024-01-12 09:59:54', 0),
(672, 'Pre Test', NULL, NULL, NULL, 1, 2, 26, 671, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:56:59', 0, '2023-09-15 10:56:59', 0),
(673, 'Mengenal Lebih dalam tentang Google Ads ', NULL, NULL, NULL, 2, 2, 26, 671, 1, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:56:59', 0, '2023-12-27 08:23:56', 0),
(674, 'Kuis 1', NULL, NULL, NULL, 3, 2, 26, 671, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:56:59', 0, '2023-09-15 10:56:59', 0),
(675, 'D2', NULL, NULL, NULL, 2, 1, 26, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 10:59:34', 0, '2024-01-12 09:59:54', 0),
(676, 'Influencer Marketing & Key Opinion Leader ', NULL, NULL, NULL, 1, 2, 26, 675, 2, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 10:59:34', 0, '2023-12-27 08:23:56', 0),
(677, 'Kuis 2', NULL, NULL, NULL, 2, 2, 26, 675, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 10:59:34', 0, '2023-09-15 10:59:34', 0),
(678, 'D3', NULL, NULL, NULL, 3, 1, 26, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 11:03:23', 0, '2024-01-12 09:59:54', 0),
(679, 'Platform E-commerce & Marketplace ', NULL, NULL, NULL, 1, 2, 26, 678, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 11:03:23', 0, '2023-12-27 08:23:56', 0),
(680, 'Kuis 3', NULL, NULL, NULL, 2, 2, 26, 678, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:03:23', 0, '2023-09-15 11:03:23', 0),
(681, 'D4', NULL, NULL, NULL, 4, 1, 26, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 11:51:32', 0, '2024-01-12 09:59:54', 0),
(682, 'Whatsapp for Business', NULL, NULL, NULL, 1, 2, 26, 681, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 11:51:32', 0, '2023-12-27 08:23:56', 0),
(683, 'Kuis 4', NULL, NULL, NULL, 2, 2, 26, 681, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:51:32', 0, '2023-09-15 11:51:32', 0),
(684, 'D5', NULL, NULL, NULL, 5, 1, 26, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 11:54:40', 0, '2024-01-12 09:59:54', 0),
(685, 'Dasar-Dasar Search Engine Optimization (SEO)', NULL, NULL, NULL, 1, 2, 26, 684, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 11:54:40', 0, '2023-12-27 08:23:56', 0),
(686, 'Kuis 5', NULL, NULL, NULL, 2, 2, 26, 684, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:54:40', 0, '2023-09-15 11:54:40', 0),
(687, 'Post Test', NULL, NULL, NULL, 3, 2, 26, 684, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:54:40', 0, '2023-09-15 11:54:40', 0),
(688, 'Unjuk Keterampilan: ', NULL, NULL, NULL, 4, 2, 26, 684, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:54:40', 0, '2023-09-15 11:54:40', 0),
(689, 'D1', NULL, NULL, NULL, 1, 1, 35, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 11:58:34', 0, '2024-01-12 09:59:54', 0),
(690, 'Pre Test', NULL, NULL, NULL, 1, 2, 35, 689, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:58:34', 0, '2023-09-15 11:58:34', 0),
(691, 'Pembuatan Clean Database Menggunakan MySQL dan PHPMyAdmin', NULL, NULL, NULL, 2, 2, 35, 689, 1, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-15 11:58:34', 0, '2023-12-27 08:23:56', 0),
(692, 'Kuis 1', NULL, NULL, NULL, 3, 2, 35, 689, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 11:58:34', 0, '2023-09-15 11:58:34', 0),
(693, 'D2', NULL, NULL, NULL, 2, 1, 35, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-15 12:01:31', 0, '2024-01-12 09:59:54', 0),
(694, 'PHP secara Umum', NULL, NULL, NULL, 1, 2, 35, 693, 2, 'materi_pembelajaran', NULL, 30, NULL, NULL, 1, '2023-09-15 12:01:31', 0, '2023-12-27 08:23:56', 0),
(695, 'Instalasi Laravel dan Gentelela Alella dan Pembuatan Master Data', NULL, NULL, NULL, 2, 2, 35, 693, 2, 'materi_pembelajaran', NULL, 150, NULL, NULL, 1, '2023-09-15 12:01:31', 0, '2023-12-27 08:23:56', 0),
(696, 'Kuis 2', NULL, NULL, NULL, 3, 2, 35, 693, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-15 12:01:31', 0, '2023-09-15 12:01:31', 0),
(697, 'D3', NULL, NULL, NULL, 3, 1, 35, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 10:36:28', 0, '2024-01-12 09:59:54', 0),
(698, 'Pembuatan Relasi Master-Detail Menggunakan Laravel', NULL, NULL, NULL, 1, 2, 35, 697, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 10:36:28', 0, '2023-12-27 08:23:56', 0),
(699, 'Kuis 3', NULL, NULL, NULL, 2, 2, 35, 697, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:36:28', 0, '2023-09-18 10:36:28', 0),
(700, 'D4', NULL, NULL, NULL, 4, 1, 35, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 10:42:19', 0, '2024-01-12 09:59:54', 0),
(701, 'Bootstrap dan SemanticUI sebagai CSS Framework', NULL, NULL, NULL, 1, 2, 35, 700, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 10:42:19', 0, '2023-12-27 08:23:56', 0),
(702, 'Kuis 4', NULL, NULL, NULL, 2, 2, 35, 700, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:42:19', 0, '2023-09-18 10:42:19', 0),
(703, 'D5', NULL, NULL, NULL, 5, 1, 35, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 10:45:56', 0, '2024-01-12 09:59:54', 0),
(704, 'Implementasi JQueryUI dan LeafletJS untuk Membantu dalam Pembuatan Form', NULL, NULL, NULL, 1, 2, 35, 703, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 10:45:56', 0, '2023-12-27 08:23:56', 0),
(705, 'Kuis 5', NULL, NULL, NULL, 2, 2, 35, 703, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:45:56', 0, '2023-09-18 10:45:56', 0),
(706, 'Post Test', NULL, NULL, NULL, 3, 2, 35, 703, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:45:56', 0, '2023-09-18 10:45:56', 0),
(707, 'Unjuk Keterampilan: Membuat Point of Sale Menggunakan Laravel', NULL, NULL, NULL, 4, 2, 35, 703, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:45:56', 0, '2023-09-18 10:45:56', 0),
(708, 'D1', NULL, NULL, NULL, 1, 1, 39, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 10:52:09', 0, '2024-01-12 09:59:54', 0),
(709, 'Pre Test', NULL, NULL, NULL, 1, 2, 39, 708, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:52:09', 0, '2023-09-18 10:52:09', 0),
(710, 'Pengenalan HTML dan CSS', NULL, NULL, NULL, 2, 2, 39, 708, 1, 'materi_pembelajaran', NULL, 60, NULL, NULL, 1, '2023-09-18 10:52:09', 0, '2023-12-27 08:23:56', 0),
(711, 'Bootstrap sebagai CSS Framework', NULL, NULL, NULL, 3, 2, 39, 708, 1, 'materi_pembelajaran', NULL, 120, NULL, NULL, 1, '2023-09-18 10:52:09', 0, '2023-12-27 08:23:56', 0),
(712, 'Kuis 1', NULL, NULL, NULL, 4, 2, 39, 708, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:52:09', 0, '2023-09-18 10:52:09', 0),
(713, 'D2', NULL, NULL, NULL, 2, 1, 39, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 10:55:35', 0, '2024-01-12 09:59:54', 0),
(714, 'Bootstrap 4 untuk Backend Menggunakan AdminLTE', NULL, NULL, NULL, 1, 2, 39, 713, 2, 'materi_pembelajaran', NULL, 60, NULL, NULL, 1, '2023-09-18 10:55:35', 0, '2023-12-27 08:23:56', 0),
(715, 'Komponen dan Library pada Bootstrap', NULL, NULL, NULL, 2, 2, 39, 713, 2, 'materi_pembelajaran', NULL, 120, NULL, NULL, 1, '2023-09-18 10:55:35', 0, '2023-12-27 08:23:56', 0),
(716, 'Kuis 2', NULL, NULL, NULL, 3, 2, 39, 713, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:55:35', 0, '2023-09-18 10:55:35', 0),
(717, 'D3', NULL, NULL, NULL, 3, 1, 39, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 10:58:21', 0, '2024-01-12 09:59:54', 0),
(718, 'JavaScript dan JQuery untuk Manipulasi Objek', NULL, NULL, NULL, 1, 2, 39, 717, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 10:58:21', 0, '2023-12-27 08:23:56', 0),
(719, 'Kuis 3', NULL, NULL, NULL, 2, 2, 39, 717, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 10:58:21', 0, '2023-09-18 10:58:21', 0),
(720, 'D4', NULL, NULL, NULL, 4, 1, 39, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:00:03', 0, '2024-01-12 09:59:54', 0),
(721, 'SemanticUI sebagai Alternatif dan Komplementer Bootstrap', NULL, NULL, NULL, 1, 2, 39, 720, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 11:00:03', 0, '2023-12-27 08:23:56', 0),
(722, 'Kuis 4', NULL, NULL, NULL, 2, 2, 39, 720, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:00:03', 0, '2023-09-18 11:00:03', 0),
(723, 'D5', NULL, NULL, NULL, 5, 1, 39, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:03:19', 0, '2024-01-12 09:59:54', 0),
(724, 'AJAX dan Penggunaan Web Services', NULL, NULL, NULL, 1, 2, 39, 723, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 11:03:19', 0, '2023-12-27 08:23:56', 0),
(725, 'Kuis 5', NULL, NULL, NULL, 2, 2, 39, 723, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:03:19', 0, '2023-09-18 11:03:19', 0),
(726, 'Post Test', NULL, NULL, NULL, 3, 2, 39, 723, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:03:19', 0, '2023-09-18 11:03:19', 0),
(727, 'Unjuk Keterampilan: Membuat Landing Page dan Formulir Call-To-Action', NULL, NULL, NULL, 4, 2, 39, 723, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:03:19', 0, '2023-09-18 11:03:19', 0),
(728, 'D1', NULL, NULL, NULL, 1, 1, 37, NULL, 1, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:13:37', 0, '2024-01-12 09:59:54', 0),
(729, 'Pre Test', NULL, NULL, NULL, 1, 2, 37, 728, 1, 'pretest', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:13:37', 0, '2023-09-18 11:13:37', 0),
(730, 'Pengenalan Framework7', NULL, NULL, NULL, 2, 2, 37, 728, 1, 'materi_pembelajaran', NULL, 30, NULL, NULL, 1, '2023-09-18 11:13:37', 0, '2023-12-27 08:23:56', 0),
(731, 'Menggunakan Komponen Framework7', NULL, NULL, NULL, 3, 2, 37, 728, 1, 'materi_pembelajaran', NULL, 150, NULL, NULL, 1, '2023-09-18 11:13:37', 0, '2023-12-27 08:23:56', 0),
(732, 'Kuis 1', NULL, NULL, NULL, 4, 2, 37, 728, 1, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:13:37', 0, '2023-09-18 11:13:37', 0),
(733, 'D2', NULL, NULL, NULL, 2, 1, 37, NULL, 2, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:16:17', 0, '2024-01-12 09:59:54', 0),
(734, 'Autentikasi dan Penyimpanan Data pada Framework7', NULL, NULL, NULL, 1, 2, 37, 733, 2, 'materi_pembelejaran', NULL, 180, NULL, NULL, 1, '2023-09-18 11:16:17', 0, '2023-12-27 08:23:56', 0),
(735, 'Kuis 2', NULL, NULL, NULL, 2, 2, 37, 733, 2, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:16:17', 0, '2023-09-18 11:16:17', 0),
(736, 'D3', NULL, NULL, NULL, 3, 1, 37, NULL, 3, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:18:51', 0, '2024-01-12 09:59:54', 0),
(737, 'Permintaan Akses terhadap Device Eksternal (Lokasi, Kamera, dsb)', NULL, NULL, NULL, 1, 2, 37, 736, 3, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 11:18:51', 0, '2023-12-27 08:23:56', 0),
(738, 'Kuis 3', NULL, NULL, NULL, 2, 2, 37, 736, 3, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:18:51', 0, '2023-09-18 11:18:51', 0),
(739, 'D4', NULL, NULL, NULL, 4, 1, 37, NULL, 4, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:21:00', 0, '2024-01-12 09:59:54', 0),
(740, 'Konversi Framework7 ke Aplikasi Android', NULL, NULL, NULL, 1, 2, 37, 739, 4, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 11:21:00', 0, '2023-12-27 08:23:56', 0),
(741, 'Kuis 4', NULL, NULL, NULL, 2, 2, 37, 739, 4, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:21:00', 0, '2023-09-18 11:21:00', 0),
(742, 'D5', NULL, NULL, NULL, 6, 1, 37, NULL, 5, 'parent', NULL, NULL, '', NULL, 1, '2023-09-18 11:26:59', 1, '2024-01-12 09:59:54', 1),
(743, 'Penggunaan ChartJS dan Library Luar', NULL, NULL, NULL, 1, 2, 37, 742, 5, 'materi_pembelajaran', NULL, 180, NULL, NULL, 1, '2023-09-18 11:26:59', 0, '2023-12-27 08:23:56', 1),
(744, 'Kuis 5', NULL, NULL, NULL, 2, 2, 37, 742, 5, 'quiz', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:26:59', 0, '2023-09-18 11:26:59', 0),
(745, 'Post Test', NULL, NULL, NULL, 3, 2, 37, 742, 5, 'posttest', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:26:59', 0, '2023-09-18 11:26:59', 0),
(746, 'Unjuk Keterampilan: Membuat Aplikasi Android dan Web Apps untuk E-Commerce', NULL, NULL, NULL, 4, 2, 37, 742, 5, 'unjukketerampilan', NULL, NULL, NULL, NULL, 1, '2023-09-18 11:26:59', 0, '2023-09-18 11:26:59', 0),
(747, 'Pengenalan HTML', NULL, NULL, NULL, 1, 2, 1, 366, 3, 'video_pembelajaran', 'https://youtu.be/uKYgiHQm_BI ', 34, '<p><b>Hello Maxians ! 😁</b></p>\r\n\r\n<p>Selamat datang di Bootcamp Backend Programming Batch 9 Day 3 Lesson 1.</p>\r\n\r\n<p>Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:<p> \r\n\r\n<p>Pengenalan HTML<p>\r\n<ul>\r\n<li>Memahami struktur dasar HTML, tag, dan atribut.</li>\r\n<li>Mampu membuat elemen-elemen dasar seperti teks, gambar, hyperlink, dan daftar menggunakan HTML.</li>', NULL, 1, '2024-01-13 08:03:55', 1, '2024-01-13 08:03:55', 1),
(748, 'Pengenalan HTML', NULL, NULL, NULL, 2, 2, 1, 366, 3, 'assignment', NULL, NULL, '<p><b>Hello Maxians ! 😁</b></p>\r\n\r\n<p>Gimana, kalian sudah selesai nonton videonya kan?😄</p>\r\n\r\n<p>Sekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti : </p>\r\n\r\n<ul>\r\n<li>Struktur dasar situs web portofolio pribadi yang dibuat peserta.</li>\r\n<li>Penggunaan tag-tag penting dalam HTML.</li>\r\n<li>Membuat struktur dasar situs web menggunakan HTML.</li>\r\n</ul>\r\n<p><b>Tugas: Membuat Situs Web Portofolio Pribadi</b><p>', NULL, 1, '2024-01-13 08:03:55', 1, '2024-01-13 08:03:55', 1),
(749, 'Pengenalan CSS', NULL, NULL, NULL, 1, 3, 1, 366, 3, 'video_pembelajaran', 'https://youtu.be/jemDx1Qf3Yc', 30, '<p><b>Hello Maxians ! 😁</b></p>\r\n\r\n<p>Selamat datang di Bootcamp Backend Programming Batch 9 Day 3 Lesson 2.</p>\r\n\r\n<p>Pada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:</p>\r\n<ul>\r\n<li>Pengenalan CSS</li>\r\n<li>Memahami konsep dasar CSS, termasuk selektor, properti, dan nilai.</li> \r\n<li>Mampu menerapkan gaya dasar pada elemen-elemen HTML menggunakan CSS.</li>\r\n</ul>', NULL, 1, '2024-01-13 08:16:04', 1, '2024-01-13 08:16:04', 1),
(750, 'Pengenalan CSS', NULL, NULL, NULL, 2, 3, 1, 366, 3, 'assignment', NULL, NULL, '<p><b>Hello Maxians ! 😁</b></p>\r\n\r\n<p>Gimana, kalian sudah selesai nonton videonya kan?😄</p>\r\n\r\n<p>Sekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :</p>\r\n<ul>\r\n<li>Menghubungkan CSS dengan HTML dalam pembuatan website perusahaan sederhana</li>\r\n<li>Penggunaan sintaks dan selektor CSS.</li>\r\n</ul>\r\n\r\n<p><b>Tugas: Membuat Website Perusahaan Sederhana</b></p>', NULL, 1, '2024-01-13 08:16:04', 1, '2024-01-13 08:16:04', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(751, 'Layout HTML', NULL, NULL, NULL, 5, 2, 1, 366, 3, 'video_pembelajaran', 'https://youtu.be/l_5h2LV1M_M', 37, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 3 Lesson 3.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\nPembuatan Layout HTML \r\nMemahami konsep tata letak (layout) dalam pengembangan web. \r\n\r\nMampu membuat struktur tata letak dasar menggunakan tag-tag HTML seperti div dan section.', NULL, 1, '2024-01-13 08:26:37', 1, '2024-01-13 16:20:44', 1),
(752, 'Layout HTML', NULL, NULL, NULL, 6, 2, 1, 366, 3, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Layout halaman web restoran yang telah dibuat \r\n\r\n- Penggunaan elemen-elemen HTML seperti header, main, dan footer. \r\n\r\nTugas: Membuat Halaman Web Restoran ', NULL, 1, '2024-01-13 08:26:37', 1, '2024-01-13 08:26:37', 1),
(753, 'Styling Dasar CSS', NULL, NULL, NULL, 7, 2, 1, 366, 3, 'video_pembelajaran', 'https://youtu.be/3D0DisM6uKE', 23, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 3 Lesson 4.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\nStyling Dasar CSS \r\nMampu menerapkan gaya dasar pada tata letak HTML menggunakan CSS, seperti pengaturan warna, ukuran teks, dan pengaturan margin dan padding. \r\n\r\nMemahami konsep penggunaan kelas dan ID dalam CSS untuk memberikan gaya spesifik pada elemen.', NULL, 1, '2024-01-13 08:30:42', 1, '2024-01-13 08:30:42', 1),
(754, 'Styling Dasar CSS', NULL, NULL, NULL, 8, 2, 1, 366, 3, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Menerapkan styling dasar menggunakan CSS pada halaman web untuk event atau festival. \r\n- Penggunaan warna, font, dan background dalam halaman web yang dibuat peserta\r\n\r\nTugas: Membuat Halaman Web untuk Event atau Festival ', NULL, 1, '2024-01-13 08:30:42', 1, '2024-01-13 08:30:42', 1),
(755, 'Form dan Tabel', NULL, NULL, NULL, 1, 2, 1, 369, 4, 'video_pembelajaran', 'https://youtu.be/BA8xA-nj1cc ', 30, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 4 Lesson 1.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Struktur Dasar Html\r\n- Pengenalan tentang form dalam HTML dan penggunaan tag-tag\r\n- Penggunaan tag-tag HTML', NULL, 1, '2024-01-13 08:41:47', 1, '2024-01-15 09:19:30', 1),
(756, 'Form dan Tabel', NULL, NULL, NULL, 2, 2, 1, 369, 4, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Struktur dan fungsionalitas form pendaftaran konferensi yang dibuat peserta, termasuk validasi data.\r\n- Fungsionalitas tabel yang menampilkan informasi terkait dengan konferensi seperti tanggal, lokasi, dan detail acara\r\n\r\nTugas: Buat halaman web untuk sistem pendaftaran konferensi.', NULL, 1, '2024-01-13 08:41:47', 1, '2024-01-13 08:41:47', 1),
(757, 'CSS Lanjutan', NULL, NULL, NULL, 3, 2, 1, 369, 4, 'video_pembelajaran', 'https://youtu.be/q8teXDQMi4k', 22, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 4 Lesson 2.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pemahaman tentang konsep box model dalam CSS, termasuk padding, border, margin, dan width/height. \r\n\r\n- Penggunaan CSS untuk positioning seperti relative, absolute, fixed, dan sticky. Pengenalan dan penerapan flexbox dalam desain tata letak responsif.', NULL, 1, '2024-01-13 08:45:26', 1, '2024-01-13 08:45:26', 1),
(758, 'CSS Lanjutan', NULL, NULL, NULL, 4, 2, 1, 369, 4, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Menggunakan box model, positioning, dan flexbox untuk mereplikasi bendera Inggris dengan detail yang akurat.\r\n- Penggunaan konsep CSS lanjutan', NULL, 1, '2024-01-13 08:45:26', 1, '2024-01-13 08:45:26', 1),
(759, 'Animasi dan Transisi dengan CSS', NULL, NULL, NULL, 5, 2, 1, 369, 4, 'video_pembelajaran', 'https://youtu.be/YKr0ga-JY6Q', 15, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 4 Lesson 3.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Penggunaan CSS untuk membuat animasi sederhana seperti perubahan warna, pergerakan, dan transformasi. \r\n\r\n- Penerapan transisi pada elemen-elemen HTML menggunakan CSS untuk menciptakan efek perubahan yang mulus.', NULL, 1, '2024-01-13 08:49:17', 1, '2024-01-13 08:49:17', 1),
(760, 'Animasi dan Transisi dengan CSS', NULL, NULL, NULL, 6, 2, 1, 369, 4, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Penggunaan animasi dan transisi dengan CSS dalam halaman web interaktif produk.\r\n- Keselarasan antara animasi/transisi yang diterapkan dengan konten produk yang ditampilkan. \r\n\r\nTugas: Buat halaman web interaktif yang menampilkan daftar produk.', NULL, 1, '2024-01-13 08:49:17', 1, '2024-01-13 08:49:17', 1),
(761, 'Responsif Design dengan Media Queries', NULL, NULL, NULL, 7, 2, 1, 369, 4, 'video_pembelajaran', 'https://youtu.be/sHknLLrZslw', 15, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 4 Lesson 4.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pengenalan tentang media queries dalam CSS dan cara menggunakannya untuk menyesuaikan tampilan berdasarkan ukuran layar. \r\n\r\n- Pendekatan mobile-first dalam desain responsif untuk memastikan tampilan yang baik di berbagai perangkat.', NULL, 1, '2024-01-13 08:53:29', 1, '2024-01-13 08:53:29', 1),
(762, 'Responsif Design dengan Media Queries', NULL, NULL, NULL, 8, 2, 1, 369, 4, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Responsif design situs web profil dengan menggunakan media queries untuk penyesuaian tampilan berdasarkan ukuran layar.\r\n- Tampilan situs web di berbagai perangkat, termasuk desktop, tablet, dan smartphone.\r\n\r\nTugas: Buat situs web yang menampilkan profil, termasuk foto, bio, dan daftar proyek yang telah kerjakan.', NULL, 1, '2024-01-13 08:53:29', 1, '2024-01-13 08:53:29', 1),
(763, 'Pengenalan ke CSS Libraries', NULL, NULL, NULL, 9, 2, 1, 369, 4, 'video_pembelajaran', 'https://youtu.be/HMoOcqAeft0', 24, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 4 Lesson 5.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pengenalan tentang beberapa CSS libraries populer seperti Bootstrap, Bulma, atau Tailwind CSS. \r\n\r\n- Integrasi dan penerapan komponen-komponen yang disediakan oleh CSS libraries dalam proyek web.', NULL, 1, '2024-01-13 08:56:41', 1, '2024-01-13 08:56:41', 1),
(764, 'Pengenalan ke CSS Libraries', NULL, NULL, NULL, 10, 2, 1, 369, 4, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Penggunaan CSS libraries dalam pembuatan situs web e-commerce\r\n- Tampilan dan fungsionalitas situs web e-commerce yang mencerminkan penerapan CSS libraries dengan baik\r\n\r\nTugas: Buat situs web e-commerce yang menampilkan daftar produk.', NULL, 1, '2024-01-13 08:56:41', 1, '2024-01-13 08:56:41', 1),
(765, 'Portofolio Day', NULL, NULL, NULL, 1, 2, 1, 373, 5, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nYuk, waktunya untuk menampilkan bakat dan karya-karya terbaikmu! Buatlah portofolio profesionalmu dan tunjukkan kepada dunia apa yang bisa kamu lakukan. \r\n\r\nSilahkan kumpulkan portofolio Anda di kolom yang sudah disediakan.', NULL, 1, '2024-01-13 09:00:52', 1, '2024-01-13 09:00:52', 1),
(770, 'Bootstrap 4 dan Semantic UI', NULL, NULL, NULL, 2, 2, 1, 377, 6, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Responsive Design\r\n- Clean Form', NULL, 1, '2024-01-13 09:14:27', 1, '2024-01-13 09:14:27', 1),
(771, 'Introduction Javascript', NULL, NULL, NULL, 1, 2, 1, 381, 7, 'video_pembelajaran', 'https://youtu.be/eYjj93LqKp0', 7, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 7.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Arrow function\r\n- Desctructuring\r\n- Array Method', NULL, 1, '2024-01-13 09:19:07', 1, '2024-01-13 09:22:19', 1),
(772, 'Introduction Javascript', NULL, NULL, NULL, 2, 2, 1, 381, 7, 'assignment', NULL, NULL, NULL, NULL, 1, '2024-01-13 09:19:07', 1, '2024-01-13 09:19:07', 1),
(773, 'Communication and Public Speaking Skill', NULL, NULL, NULL, 10, 1, 1, NULL, 10, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-13 09:41:19', 1, '2024-01-13 09:43:50', 1),
(774, 'SQL Session 1', NULL, NULL, NULL, 11, 1, 1, NULL, 11, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-13 09:47:09', 1, '2024-01-17 09:13:03', 1),
(775, 'SQL Session 1', NULL, NULL, NULL, 1, 2, 1, 774, 11, 'video_pembelajaran', 'https://youtu.be/Gd9Dxq6OzY8 ', 57, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 11.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Konsep pengelolaan data base, DDL, DML, DCL \r\n\r\n- Conditional expression dalam SQL digunakan untuk mengevaluasi, IF-THEN-ELSE, CASE \r\n\r\n- Join, INNER JOIN, LEFT JOIN, RIGHT JOIN, FULL JOIN', NULL, 1, '2024-01-13 09:50:51', 1, '2024-01-15 09:24:08', 1),
(776, 'SQL Session 1', NULL, NULL, NULL, 2, 2, 1, 774, 11, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\nGimana, udah pada nonton videonya kan?\r\nSekarang Saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah kalian tonton sebelumnya!😄\r\n\r\nBuatlah tabel : (Tentukan mana yang menjadi primary key dan foreign key)\r\n- Customers yang isi kolomnya yaitu : id, name dan city\r\n- Salesman yang isi kolomnya yaitu : id, name, city, dan commision\r\n- Orders yang isi kolomnya yaitu : id, date, amount\r\n\r\nSoal\r\n1. Tentukanlah pelanggan yang tidak pernah membuat pesanan!\r\n2. Tentukan total banyak pembelian yang dilakukan oleh setiap pelanggan!\r\n3. Tentukan nama pelanggan beserta total banyak pesanan yang dilakukan!\r\n4. Cari nilai max, min dan rata-rata dari amountnya!', NULL, 1, '2024-01-13 09:50:51', 1, '2024-01-13 09:50:51', 1),
(779, '	\nSQL Session 2', NULL, NULL, NULL, 12, 1, 1, NULL, 12, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 09:54:15', 1, '2024-01-17 09:03:46', 1),
(780, 'SQL Session 2', NULL, NULL, NULL, 1, 2, 1, 779, 12, 'video_pembelajaran', 'https://youtu.be/yo_pXULGYB0 ', 42, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 12.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Subquery \r\n\r\n- Struktur Subquery \r\n\r\n- Aturan Subquery In, Any, Some, All, Exist, Not Exist \r\n\r\n- Jenis - jenis Subquery, Single row subquery, Multiple row subquery, Correlated subquery, Nested subqueries \r\n\r\n- Penggunaan Subquery Dengan From, INSERT, Update, dan Delete', NULL, 1, '2024-01-13 09:56:47', 1, '2024-01-15 09:25:18', 1),
(781, 'SQL Session 2', NULL, NULL, NULL, 2, 2, 1, 779, 12, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\nGimana, udah pada nonton videonya kan?\r\nSekarang Saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah kalian tonton sebelumnya!😄\r\n\r\nBuatlah tabel : (Tentukan mana yang menjadi primary key dan foreign key)\r\n- Mahasiswa yang isi kolomnya yaitu : id, NIM. name dan alamat\r\n- Mata Kuliah yang isi kolomnya yaitu : id, name, sks\r\n- Ambil_MK yang isi kolomnya yaitu : id, nilai\r\n\r\nSoal\r\n1. Buatkan nama mahasiswa dan nilai mata kuliah yang memiliki nilai tertinggi dalam mata kuliah ‘A03’.\r\n2. Dari data mahasiswa yang terdaftar, siapa sajakah mahasiswa yang tidak mengambil matakuliah ‘A01’?\r\n3. Berapakah nilai terendah dari mahasiswa yang bernama Viyella?\r\n4. Jelaskan secara singkat tentang jenis-jenis subquery serta berikan contoh penggunaannya', NULL, 1, '2024-01-13 09:56:47', 1, '2024-01-13 09:56:47', 1),
(782, '	\nSQL Session 3', NULL, NULL, NULL, 13, 1, 1, NULL, 13, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 09:58:41', 1, '2024-01-17 09:03:56', 1),
(783, 'SQL: Triggers & Store Procedure', NULL, NULL, NULL, 1, 2, 1, 782, 13, 'video_pembelajaran', 'https://youtu.be/vAMy6P-mIDo ', 40, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 13.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Implementasi TRIGGERS & STORE PROCEDURE \r\n\r\n- Implementasi DML Trigger - Implementasi DDL Trigger \r\n\r\n- Statement Penyusunan Stored Procedure', NULL, 1, '2024-01-13 10:03:23', 1, '2024-01-15 10:52:03', 1),
(784, 'SQL: Triggers & Store Procedure', NULL, NULL, NULL, 2, 2, 1, 782, 13, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\nGimana, udah pada nonton videonya kan?\r\nSekarang Saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah kalian tonton sebelumnya!😄\r\n\r\nBuatlah tabel : (Tentukan mana yang menjadi primary key)\r\n- Siswa yang isi kolomnya yaitu : id, NIS, nama, TTL, gender, alamat\r\n- Nilai yang isi kolomnya yaitu : id, nilai_IPA, nilai_IPS, nilai_MTK\r\n\r\nSoal\r\n1. Buatlah sebuah procedure dengan nama “getSiswaByBorn” yang digunakan menampilkan data siswa pada tabel “datasiswa” berdasarkan kriteria input tempat lahir!\r\n2. Buatlah sebuah function dengan nama “getJmlByGender” untuk menghitung jumlah siswa pada tabel “datasiswa” berdasarkan kriteria input gender! Triggers Instruksi :\r\n\r\nBuatlah tabel : (Tentukan mana yang menjadi primary key dan foreign key)\r\n- products yang isi kolomnya yaitu : id,nama,harga\r\n- stock yang isi kolomnya yaitu : id, quantity\r\n\r\nSoal\r\n3. Buatlah sebuah trigger yang akan memastikan bahwa setiap kali sebuah produk baru ditambahkan ke dalam tabel Products, informasi terkait produk tersebut juga otomatis dimasukkan ke dalam tabel Stocks dengan nilai awal stok 0. Tuliskan perintah SQL untuk membuat trigger yang memenuhi permintaan tersebut.\r\n4. Sebagai seorang pengembang database, Anda telah membuat sebuah trigger yang akan mengecek stok setiap kali ada perubahan data pada tabel Stocks. Trigger tersebut akan menampilkan pesan peringatan jika stok kurang dari 10. Tuliskan perintah SQL untuk membuat trigger yang mencapai fungsi tersebut.', NULL, 1, '2024-01-13 10:03:23', 1, '2024-01-13 10:03:23', 1),
(785, 'PHP Session 1 Introduction', NULL, NULL, NULL, 14, 1, 1, NULL, 14, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 10:07:36', 1, '2024-01-17 09:04:08', 1),
(786, 'Pengenalan PHP', NULL, NULL, NULL, 1, 2, 1, 785, 14, 'video_pembelajaran', 'https://youtu.be/Htht-t10JPw', 10, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 14.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\nMengenal PHP \r\n- Mengenal Variabel yang ada dalam PHP, Variabel Lokal, Variabel Global, Variabel Superglobal, Variabel Statik, Array, Objek \r\n\r\n- Mengenal Kondisi dalam PHP, IF, ELSE, ELSEIF, SWITCH', NULL, 1, '2024-01-13 10:11:01', 1, '2024-01-13 10:11:01', 1),
(787, 'Pengenalan PHP', NULL, NULL, NULL, 2, 2, 1, 785, 14, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nTugas : Sistem Manajemen Perpustakaan Sederhana, \r\nBerikut adalah beberapa fitur yang bisa kamu tambahkan: \r\n\r\n1. Daftar Buku: Buat array yang berisi daftar buku di perpustakaan. Gunakan loop untuk menampilkan daftar ini kepada pengguna. \r\n\r\n2. Peminjaman Buku: Izinkan pengguna untuk meminjam buku. Saat buku dipinjam, hapus dari daftar buku. \r\n\r\n3. Pengembalian Buku: Izinkan pengguna untuk mengembalikan buku. Saat buku dikembalikan, tambahkan kembali ke daftar buku. \r\n\r\n4. Menu: Buat menu sederhana menggunakan switch yang memungkinkan pengguna untuk memilih antara melihat daftar buku, meminjam buku, atau mengembalikan buku.', NULL, 1, '2024-01-13 10:11:01', 1, '2024-01-13 10:11:01', 1),
(788, 'Repetition (Loop)', NULL, NULL, NULL, 15, 1, 1, NULL, 15, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 10:12:47', 1, '2024-01-17 09:04:18', 1),
(789, 'PHP Loop & Function', NULL, NULL, NULL, 1, 2, 1, 788, 15, 'video_pembelajaran', 'https://youtu.be/1lvb58iEwU4', 31, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 15.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Loop For\r\n- Loop While\r\n- Loop Do / While\r\n- Loop Foreach\r\n- Loop Bersarang\r\n- Fungsi dengan Parameter\r\n- Fungsi yang mengembalikan nilai\r\n- Memanggil Fungsi dalam Fungsi\r\n- Fungsi Rekursif', NULL, 1, '2024-01-13 10:15:46', 1, '2024-01-13 10:15:46', 1),
(790, 'PHP Loop & Function', NULL, NULL, NULL, 2, 2, 1, 788, 15, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan Fungsi\r\n- Penggunaan Loop\r\n\r\nTugas : Membuat Sistem Penilaian Siswa', NULL, 1, '2024-01-13 10:15:46', 1, '2024-01-13 10:15:46', 1),
(791, 'PHP Session 2', NULL, NULL, NULL, 16, 1, 1, NULL, 16, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 10:19:12', 1, '2024-01-17 09:04:29', 1),
(792, 'PHP File Upload & Download', NULL, NULL, NULL, 1, 2, 1, 791, 16, 'video_pembelajaran', 'https://youtu.be/COFUMirZn00', 44, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 16.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- PHP Class OOP\r\n- PHP SUBJECT OOP\r\n- OOP Constructor and Comment', NULL, 1, '2024-01-13 10:19:12', 1, '2024-01-13 10:19:12', 1),
(793, 'PHP File Upload & Download', NULL, NULL, NULL, 2, 2, 1, 791, 16, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya!\r\n\r\nBuatlah sebuah sistem sederhana untuk mengelola data buku di perpustakaan dengan menggunakan OOP di PHP. Sistem ini harus memenuhi kriteria berikut yaitu :\r\n\r\n1. Buatlah kelas Buku dengan properti judul, pengarang, tahunTerbit, dan genre. Gunakan constructor untuk menginisialisasi properti-properti ini.\r\n2. Buatlah metode getDetailBuku() yang akan mengembalikan detail buku dalam format string.\r\n3. Buatlah kelas Perpustakaan yang memiliki properti lokasi dan daftarBuku (array untuk menyimpan objek-objek dari kelas Buku). Gunakan constructor untuk menginisialisasi properti lokasi.\r\n4. Buatlah metode tambahBuku($buku) di kelas Perpustakaan untuk menambahkan objek Buku ke dalam daftarBuku.\r\n5. Buatlah metode getDaftarBuku() di kelas Perpustakaan untuk mencetak daftar buku yang tersedia di perpustakaan.\r\n6. Buatlah beberapa objek Buku dan tambahkan ke dalam objek Perpustakaan. Cetak daftar buku di perpustakaan', NULL, 1, '2024-01-13 10:21:05', 1, '2024-01-13 10:21:05', 1),
(794, 'PHP Session 3', NULL, NULL, NULL, 17, 1, 1, NULL, 17, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 10:28:49', 1, '2024-01-17 09:04:39', 1),
(795, 'PHP CRUD dan Free Web Hosting', NULL, NULL, NULL, 1, 2, 1, 794, 17, 'video_pembelajaran', 'https://youtu.be/ruOtcVnpW6Q', 55, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 17.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Membuat DataBase\r\n- Connect DataBase\r\n- FORM INDEX DATA\r\n- INPUT Data PHP MYSQL\r\n- Delete Data\r\n- Free Web Hosting', NULL, 1, '2024-01-13 10:28:49', 1, '2024-01-13 10:31:21', 1),
(796, 'PHP CRUD dan Free Web Hosting', NULL, NULL, NULL, 2, 2, 1, 794, 17, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nStudy Case : Crud and Free Web Hosting and Phpmyadmin :\r\n- Membuat crud membuat data pasien rumah sakit lalu upload ke web hosting dengan nama domain rumah sakit\r\n', NULL, 1, '2024-01-13 10:28:49', 1, '2024-01-13 10:28:49', 1),
(797, 'Laravel & Gentella Arela', NULL, NULL, NULL, 18, 1, 1, NULL, 18, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 10:33:15', 1, '2024-01-17 09:04:49', 1),
(798, 'Rapid Application Development Using Laravel on Master Data', NULL, NULL, NULL, 1, 2, 1, 797, 18, 'video_pembelajaran', 'https://youtu.be/d0FT3IL8vrg', 17, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 18\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pengintegrasian Template HTML Backend ke dalam Laravel\r\n- Pembuatan authentication, user management, dan permission management\r\n- Pembuatan CRUD Management untuk Master Data dan proses validasi data yang dimasukkan dalam database', NULL, 1, '2024-01-13 10:37:49', 1, '2024-01-13 10:37:49', 1),
(799, 'Rapid Application Development Using Laravel on Master Data', NULL, NULL, NULL, 2, 2, 1, 797, 18, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penamaan Class\r\n- Pembagian View\r\n- Clean Code\r\n- Basic security melalui authentication dan permission\r\n- Proses validasi yang dilakukan disesuaikan dengan kebutuhan data\r\n\r\nStudy Case: Sales + Purchasing Cycle Menus, Master Data, and Permission', NULL, 1, '2024-01-13 10:37:49', 1, '2024-01-13 10:37:49', 1),
(800, 'Rapid Application Development using Laravel on Transaction Data', NULL, NULL, NULL, 19, 1, 1, NULL, 19, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:32:10', 1, '2024-01-17 09:04:59', 1),
(801, 'Rapid Application Development Using Laravel on Transaction Data', NULL, NULL, NULL, 1, 2, 1, 800, 19, 'video_pembelajaran', 'https://youtu.be/PiAUqNttj1g', 142, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 19.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan CRUD Management untuk Transaction Data dan proses validasi data yang dimasukkan dalam database\r\n- Pembuatan try-catch transaction dan try-catch database serta rollback/commit process\r\n- Pembuatan Read (View) yang printable', NULL, 1, '2024-01-13 12:32:10', 1, '2024-01-13 12:32:10', 1),
(802, 'Rapid Application Development Using Laravel on Transaction Data', NULL, NULL, NULL, 2, 2, 1, 800, 19, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penamaan Class\r\n- Clean Code\r\n- Basic security melalui authentication dan permission\r\n- Proses validasi (multi validation) yang dilakukan disesuaikan dengan kebutuhan data\r\n\r\nStudy Case: Sales + Purchasing Cycle Transaction', NULL, 1, '2024-01-13 12:32:10', 1, '2024-01-13 12:32:10', 1),
(803, 'Personal Branding', NULL, NULL, NULL, 20, 1, 1, NULL, 20, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:35:00', 1, '2024-01-13 12:35:00', 1),
(804, '1st Hackathon Day 1', NULL, NULL, NULL, 21, 1, 1, NULL, 21, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:37:49', 1, '2024-01-13 12:37:49', 1),
(805, 'Bukti Record Meeting Hackathon', NULL, NULL, NULL, 1, 2, 1, 804, 21, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-13 12:42:12', 1, '2024-01-13 12:42:12', 1),
(806, '1st Hackathon Day 2', NULL, NULL, NULL, 22, 1, 1, NULL, 22, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:46:01', 1, '2024-01-13 12:46:01', 1),
(807, 'Bukti Record Meeting Hackathon', NULL, NULL, NULL, 1, 2, 1, 806, 22, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁\r\n\r\n', NULL, 1, '2024-01-13 12:46:01', 1, '2024-01-13 12:46:01', 1),
(808, '1st Hackathon Day 3', NULL, NULL, NULL, 23, 1, 1, NULL, 23, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:49:08', 1, '2024-01-13 12:49:08', 1),
(809, 'Bukti Record Meeting Hackathon', NULL, NULL, NULL, 1, 2, 1, 808, 23, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁\r\n\r\n', NULL, 1, '2024-01-13 12:49:08', 1, '2024-01-13 12:49:08', 1),
(810, 'Demo Day', NULL, NULL, NULL, 24, 1, 1, NULL, 24, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:51:25', 1, '2024-01-13 12:51:25', 1),
(811, 'Record Demo Day Program', NULL, NULL, NULL, 1, 2, 1, 810, 24, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Demo Day nih, gimana udah pada selesai kan projectnya ? 😄\r\n\r\nTugasnya untuk Demo Day ini yaitu kumpulkan bukti Record Demo Program yang telah dibuat bersama kelompoknya.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-13 12:51:25', 1, '2024-01-13 12:51:25', 1),
(812, 'Group Affiliation', NULL, NULL, NULL, 25, 1, 1, NULL, 25, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:53:21', 1, '2024-01-13 12:53:21', 1),
(813, 'Implement DataTables Server Side + Button Export + Column Visibility', NULL, NULL, NULL, 26, 1, 1, NULL, 26, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 12:57:03', 1, '2024-01-17 09:05:20', 1),
(814, 'Implement DataTable on Backend', NULL, NULL, NULL, 1, 2, 1, 813, 26, 'video_pembelajaran', 'https://youtu.be/9BxbsmlDhfA ', 33, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 26.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan CRUD Management Table menggunakan DataTables Server Side\r\n- Penggunaan extensions Buttons, ColReorder, Scroller, SearchBuilder, ColVis, dsb.\r\n- Penggunaan plugins sebagai tambahan untuk melakukan manipulasi data', NULL, 1, '2024-01-13 12:57:03', 1, '2024-01-15 09:32:30', 1),
(815, 'Implement DataTable on Backend', NULL, NULL, NULL, 2, 2, 1, 813, 26, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan DataTables\r\n- Penggunaan DataTables extension\r\n\r\nTugas :\r\n- Buatlah sebuah proyek Laravel baru.\r\n- Buatlah sebuah model bernama Product.\r\n- Buatlah sebuah migration untuk membuat tabel products.\r\n- Buatlah sebuah seeder untuk mengisi tabel products dengan data dummy.\r\n- Buatlah sebuah controller bernama ProductsController.\r\n- Buatlah sebuah view bernama products.index.\r\n- Buatlah sebuah form untuk menambahkan produk baru.\r\n- Buatlah sebuah form untuk memperbarui produk yang sudah ada.\r\n- Buatlah sebuah form untuk menghapus produk.', NULL, 1, '2024-01-13 12:57:03', 1, '2024-01-13 12:57:03', 1),
(816, 'Implement Social OAuth, Two Factor Authentication, and SEO Management', NULL, NULL, NULL, 27, 1, 1, NULL, 27, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:02:24', 1, '2024-01-17 09:05:34', 1),
(817, 'Implement Social OAuth, Two Factor Authentication, and SEO Management', NULL, NULL, NULL, 1, 2, 1, 816, 27, 'video_pembelajaran', 'https://youtu.be/n9-onRluf-w ', 64, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 27.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan halaman login dan register menggunakan Facebook dan Google Auth yang diperkuat dengan Re-Captcha 2/3\r\n- Pembuatan Two Factor Authentication menggunakan Google Authenticator\r\n- Pembuatan halaman untuk setting SEO di Backend', NULL, 1, '2024-01-13 13:02:24', 1, '2024-01-15 09:39:06', 1),
(818, 'Implement Social OAuth, Two Factor Authentication, and SEO Management', NULL, NULL, NULL, 2, 2, 1, 816, 27, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya ke studi kasus.\r\n\r\nPerusahaan “ABC” ingin membangun platform blog di mana pengguna dapat membuat, mengelola, dan membaca posting blog. Mereka harus dapat masuk dan mendaftar menggunakan email/kata sandi atau OAuth sosial (misalnya, Google, Facebook). Otentikasi Dua Faktor (2FA) yang aman harus opsional untuk keamanan tambahan. Terakhir, platform harus dioptimalkan untuk mesin pencari (SEO) untuk menarik lalu lintas organik.\r\n\r\nLakukan :\r\nOtentikasi Pengguna dan OAuth Sosial\r\n- Gunakan sistem otentikasi Laravel untuk login dan pendaftaran email/kata sandi.\r\n- Integrasikan perpustakaan OAuth sosial yang dipilih untuk memungkinkan pengguna masuk/mendaftar dengan akun sosial mereka.\r\n- Tangani pengambilan data pengguna sosial dan simpan informasi yang relevan di database.\r\n\r\nOtentikasi Dua Faktor (2FA) \r\n- Pilih perpustakaan 2FA seperti Laravel Sanctum dan integrasikan dengan akun pengguna.\r\n- Biarkan pengguna mengaktifkan/menonaktifkan 2FA melalui pengaturan profil mereka.\r\n- Implementasikan metode 2FA yang berbeda seperti Time-based One-Time Passwords (TOTP) atau verifikasi SMS.\r\n\r\nManajemen SEO \r\n- Instal paket SEO seperti Laravel SEO untuk mengelola tag meta, sitemap, dan markup skema.\r\n- Optimalkan posting blog individual dengan kata kunci yang relevan dalam judul, deskripsi, dan konten.\r\n- Buat sitemap XML dan kirimkan ke mesin pencari untuk indeksasi yang lebih baik.\r\n- Implementasikan markup data terstruktur untuk meningkatkan visibilitas SERP (Halaman Hasil Pencarian Mesin).\r\n\r\nFitur Tambahan \r\n- Implementasikan antarmuka pengguna yang ramah pengguna untuk membuat, mengedit, dan mengelola posting blog.\r\n- Tambahkan kategori dan tag untuk mengkategorikan posting blog dan meningkatkan keterandalan.\r\n- Biarkan komentar pada posting blog untuk menumbuhkan keterlibatan pengguna.\r\n- Implementasikan fungsi pencarian untuk memungkinkan pengguna menemukan posting blog tertentu.\r\n- Pertimbangkan untuk menambahkan tombol berbagi sosial dan langganan email untuk jangkauan yang lebih luas.', NULL, 1, '2024-01-13 13:02:24', 1, '2024-01-13 13:02:24', 1),
(819, 'Implement PHPSpreadsheet (formerly known as PHPExcel)', NULL, NULL, NULL, 28, 1, 1, NULL, 28, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:06:31', 1, '2024-01-17 09:05:44', 1),
(820, 'Implement PHPSpreadsheet', NULL, NULL, NULL, 1, 2, 1, 819, 28, 'video_pembelajaran', 'https://youtu.be/GbD_gBhI4cc', 10, '', NULL, 1, '2024-01-13 13:06:31', 1, '2024-01-15 09:40:21', 1),
(821, 'Implement PHPSpreadsheet', NULL, NULL, NULL, 2, 2, 1, 819, 28, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton ke dalam Studi Kasus.\r\n\r\nBuatlah aplikasi data penduduk yang dapat digunakan untuk menyimpan dan memanipulasi data penduduk. Aplikasi ini harus dapat menyimpan data penduduk, seperti nama, usia, alamat, dan pekerjaan. Aplikasi ini juga harus dapat menampilkan data penduduk dalam berbagai format, seperti tabel, grafik, dan laporan.\r\n\r\nLangkah-langkah\r\n- Buat proyek PHP baru\r\n- Instal PHPSpreadsheet\r\n- Import PHPSpreadsheet ke proyek Anda\r\n- Buat objek Spreadsheet\r\n- Buat lembar kerja baru\r\n- Tambahkan data penduduk ke lembar kerja\r\n- Simpan lembar kerja ke file CSV\r\n\r\nFile CSV data_penduduk.csv akan berisi data berikut:\r\n- Nama\r\n- Usia\r\n- Alamat\r\n- Pekerjaan\r\n\r\nTask\r\n- Ubah kode untuk menambahkan fitur pencarian data penduduk.\r\n- Ubah kode untuk menambahkan fitur ekspor data penduduk ke format lain, seperti XLS atau XLSX.', NULL, 1, '2024-01-13 13:06:31', 1, '2024-01-13 13:06:31', 1),
(822, 'Working on Report', NULL, NULL, NULL, 29, 1, 1, NULL, 29, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:11:13', 1, '2024-01-17 09:05:56', 1),
(823, 'Working on Report', NULL, NULL, NULL, 1, 2, 1, 822, 29, 'video_pembelajaran', 'https://www.youtube.com/watch?v=VBjivRsBbP0', 46, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 29.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan fitur reporting dengan filter dan sorting (penggunaan beberapa komponen tambahan seperti DateRangePicker, Select2, dsb)\r\n- Pembuatan executive summary (statistic)\r\n- Penggabungan chart.js dengan reporting\r\n- Pembuatan pivot table menggunakan pivot.js', NULL, 1, '2024-01-13 13:11:13', 1, '2024-01-15 09:41:40', 1),
(824, 'Working on Report', NULL, NULL, NULL, 2, 2, 1, 822, 29, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Fitur reporting dengan filter, sort, dan executive summary\r\n- Fitur what-if analysis menggunakan pivot table\r\n', NULL, 1, '2024-01-13 13:11:13', 1, '2024-01-13 13:11:13', 1),
(825, 'Speak Up Stand Out', NULL, NULL, NULL, 30, 1, 1, NULL, 30, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:13:40', 1, '2024-01-13 13:14:37', 1),
(826, 'Web Services using Lumen', NULL, NULL, NULL, 31, 1, 1, NULL, 31, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:18:04', 1, '2024-01-17 09:06:10', 1),
(827, 'Web Services using Lumen', NULL, NULL, NULL, 1, 2, 1, 826, 31, 'video_pembelajaran', 'https://youtu.be/_XFmtmYOKS0 ', 68, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 31.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan REST API menggunakan Micro-Framework Lumen dan hubungannya dengan database\r\n- Pembuatan Authentication, Authorization, Caching\r\n- Best practices dalam berbagai validasi dan return code\r\n- Setting Encryption dan Logging untuk Error Debugging\r\n- Pengiriman mail melalui Lumen menggunakan GMail\r\n- Pembuatan dokumentasi API melalui Postman', NULL, 1, '2024-01-13 13:18:04', 1, '2024-01-13 13:18:04', 1),
(828, 'Web Services using Lumen', NULL, NULL, NULL, 2, 2, 1, 826, 31, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- REST API dan response yang diberikan (pengujian akan dilakukan melalui dokumentasi Postman yang disubmit)\r\n\r\nTugas\r\n\r\nMembangun Layanan Web untuk Aplikasi E-commerce \r\n\r\nIntegrasi Layanan Pembayaran ke dalam Aplikasi E-commerce \r\n\r\nImplementasi Sistem Otentikasi dan Otorisasi', NULL, 1, '2024-01-13 13:18:52', 1, '2024-01-13 13:18:52', 1),
(829, 'Backend for CMS (Best Practices in 30 minutes)', NULL, NULL, NULL, 32, 1, 1, NULL, 32, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:23:15', 1, '2024-01-17 09:06:20', 1),
(830, 'Backend for CMS', NULL, NULL, NULL, 1, 2, 1, 829, 32, 'video_pembelajaran', 'https://youtu.be/Kg6bicBpiow ', 25, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 32.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan master data dan halaman/blog yang berhubungan dengan corporate web\r\n- Pembuatan dynamic SEO untuk masing-masing halaman\r\n- Pembuatan SurveyJS creator untuk Backend', NULL, 1, '2024-01-13 13:23:15', 1, '2024-01-13 13:23:15', 1),
(831, 'Backend for CMS', NULL, NULL, NULL, 2, 2, 1, 829, 32, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- CMS yang komponen-komponennya SEO-friendly\r\n- Pengaplikasian SurveyJS Creator\r\n', NULL, 1, '2024-01-13 13:23:51', 1, '2024-01-13 13:23:51', 1),
(832, 'Web Fundamental & Web Scraping', NULL, NULL, NULL, 33, 1, 1, NULL, 33, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:27:22', 1, '2024-01-17 09:06:29', 1),
(833, 'Web Fundamental', NULL, NULL, NULL, 1, 2, 1, 832, 33, 'video_pembelajaran', 'https://youtu.be/FKpmpg7VKoA ', 12, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 33.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan master data dan halaman/blog yang berhubungan dengan corporate web\r\n- Pembuatan dynamic SEO untuk masing-masing halaman\r\n- Pembuatan SurveyJS creator untuk Backend', NULL, 1, '2024-01-13 13:27:22', 1, '2024-01-13 13:27:22', 1),
(834, 'Web Scraping', NULL, NULL, NULL, 2, 2, 1, 832, 33, 'video_pembelajaran', 'https://youtu.be/PL8eVtmmPF4 ', 45, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 33.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Pembuatan master data dan halaman/blog yang berhubungan dengan corporate web\r\n- Pembuatan dynamic SEO untuk masing-masing halaman\r\n- Pembuatan SurveyJS creator untuk Backend', NULL, 1, '2024-01-13 13:30:51', 1, '2024-01-13 13:30:51', 1),
(835, 'Web Fundamental', NULL, NULL, NULL, 3, 2, 1, 832, 33, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- CMS yang komponen-komponennya SEO-friendly\r\n- Pengaplikasian SurveyJS Creator', NULL, 1, '2024-01-13 13:30:51', 1, '2024-01-13 13:30:51', 1),
(836, 'Authentication Bypass', NULL, NULL, NULL, 34, 1, 1, NULL, 34, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:35:07', 1, '2024-01-17 09:06:38', 1),
(837, 'Authentication Bypass', NULL, NULL, NULL, 1, 2, 1, 836, 34, 'video_pembelajaran', 'https://youtu.be/DK5Xfu50eU0 ', 54, 'Authentication Bypass', NULL, 1, '2024-01-13 13:35:07', 1, '2024-01-13 13:38:19', 1),
(838, 'Authentication Bypass', NULL, NULL, NULL, 2, 2, 1, 836, 34, 'assignment', NULL, NULL, 'Authentication Bypass', NULL, 1, '2024-01-13 13:35:07', 1, '2024-01-13 13:35:07', 1),
(839, 'Unlocking Inter-Generational Communication', NULL, NULL, NULL, 35, 1, 1, NULL, 35, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:39:55', 1, '2024-01-13 13:39:55', 1),
(840, '	\nAutomation and Puppeteer Introduction & Automation with Puppeteer', NULL, NULL, NULL, 36, 1, 1, NULL, 36, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:45:07', 1, '2024-01-17 09:06:51', 1),
(841, 'Automation and Puppeteer Introduction', NULL, NULL, NULL, 1, 2, 1, 840, 36, 'video_pembelajaran', 'https://youtu.be/DK5Xfu50eU0 ', 54, 'Hi Maxians! 😄\r\n\r\nDalam melakukan otomatisasi, macro dapat membantu kita melakukan otomatisasi fungsi secara berulang. Puppeteer menjadi salah satu library di Node.js yang dapat melakukan otomatisasi.\r\n\r\nMateri kali ini akan membahas bagaimana menggunakan puppeteer dalam melakukan otomatisasi.\r\n\r\nSelamat belajar Maxians! 😄', NULL, 1, '2024-01-13 13:45:07', 1, '2024-01-13 13:49:07', 1),
(842, 'Automation and Puppeteer', NULL, NULL, NULL, 2, 2, 1, 840, 36, 'video_pembelajaran', 'https://youtu.be/7Vm0ei6Wvro ', 48, 'Hi Maxians!\r\n\r\nSudah tahu kan apa itu puppeteer? Sekarang kita akan langsung mencoba menggunakan puppeteer untuk melakukan otomatisasi pada Discord.\r\n\r\nSimak video berikut dan selamat belajar Maxians!', NULL, 1, '2024-01-13 13:45:07', 1, '2024-01-13 13:45:07', 1),
(843, 'Automation and Puppeteer', NULL, NULL, NULL, 3, 2, 1, 840, 36, 'assignment', NULL, NULL, 'Automation and Puppeteer', NULL, 1, '2024-01-13 13:45:07', 1, '2024-01-13 13:45:07', 1),
(844, 'Basic Python 1', NULL, NULL, NULL, 37, 1, 1, NULL, 37, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 13:53:56', 1, '2024-01-17 09:07:04', 1),
(845, 'Python Introduction', NULL, NULL, NULL, 1, 2, 1, 844, 37, 'video_pembelajaran', 'https://youtu.be/LrhO0ghUXGI ', NULL, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 37 Lesson 1.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait Memahami Python dan sejarah singkat\r\n\r\nSelamat belajar Maxians! 😄', NULL, 1, '2024-01-13 13:53:56', 1, '2024-01-13 13:53:56', 1),
(846, 'Python Variables', NULL, NULL, NULL, 2, 2, 1, 844, 37, 'video_pembelajaran', 'https://youtu.be/7S1pL8JboPw ', NULL, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 37 Lesson 2.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait Implementasi Variables (string, boolean, numbers) dan juga operatorSelamat belajar Maxians! 😄', NULL, 1, '2024-01-13 13:57:49', 1, '2024-01-13 13:57:49', 1),
(847, 'Python Variables 2', NULL, NULL, NULL, 3, 2, 1, 844, 37, 'video_pembelajaran', 'https://youtu.be/2gc_DB2J6hY', 4, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 37 Lesson 3.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait Implementasi Variables (string, boolean, numbers) dan juga operatorSelamat belajar Maxians! 😄', NULL, 1, '2024-01-13 13:57:49', 1, '2024-01-15 09:43:20', 1),
(848, 'Python Conditional', NULL, NULL, NULL, 4, 2, 1, 844, 37, 'video_pembelajaran', 'https://youtu.be/NtOSRN5MRHI ', NULL, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 37 Lesson 4.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait Implementasi conditional (kondisi)Selamat belajar Maxians! 😄', NULL, 1, '2024-01-13 14:02:29', 1, '2024-01-13 14:02:29', 1),
(849, 'Python Loop', NULL, NULL, NULL, 5, 2, 1, 844, 37, 'video_pembelajaran', 'https://youtu.be/EqAzDz5dXe4', 7, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Backend Programming Batch 9 Day 37 Lesson 5.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait Implementasi loop (pengulangan)Selamat belajar Maxians! 😄', NULL, 1, '2024-01-13 14:02:29', 1, '2024-01-15 09:44:06', 1),
(850, 'Basic Python 1', NULL, NULL, NULL, 6, 2, 1, 844, 37, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton videonya kan?😄\r\n\r\nSekarang kalian melakukan implementasinya, yaitu :\r\n\r\nBuatlah sebuah program kalkulator sederhana \r\nExample:0 ----------------- \r\n\r\nPilih Menu \r\n\r\n0 – Masukan angka \r\n\r\n1 – Penjumlahan \r\n\r\n2 – Pengurangan \r\n\r\n3 – Pengalian \r\n\r\n4 – Pembagian \r\n\r\n5,6,7…dll \r\n\r\nInput()', NULL, 1, '2024-01-13 14:02:29', 1, '2024-01-13 14:02:29', 1),
(851, 'Basic Python 2', NULL, NULL, NULL, 38, 1, 1, NULL, 38, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 14:07:02', 1, '2024-01-17 09:07:15', 1),
(852, 'Basic Data Mining with Python 1', NULL, NULL, NULL, 39, 1, 1, NULL, 39, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 14:07:02', 1, '2024-01-17 09:07:26', 1),
(853, 'Personal Finance', NULL, NULL, NULL, 40, 1, 1, NULL, 40, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 14:08:54', 1, '2024-01-13 14:08:54', 1),
(854, 'Basic Data Mining with Python 2', NULL, NULL, NULL, 41, 1, 1, NULL, 41, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 14:10:54', 1, '2024-01-17 09:07:37', 1),
(855, '2nd Hackathon Day 1', NULL, NULL, NULL, 42, 1, 1, NULL, 42, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 16:06:52', 1, '2024-01-13 16:06:52', 1),
(856, 'Rekaman Zoom Hackathon Day 1', NULL, NULL, NULL, 1, 2, 1, 855, 42, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki 2nd Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-13 16:06:52', 1, '2024-01-13 16:06:52', 1),
(857, '2nd Hackathon Day 2', NULL, NULL, NULL, 43, 1, 1, NULL, 43, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 16:09:47', 1, '2024-01-13 16:09:47', 1),
(858, 'Rekaman Zoom Hackathon Day 2', NULL, NULL, NULL, 1, 2, 1, 857, 43, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki 2nd Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-13 16:09:47', 1, '2024-01-13 16:09:47', 1),
(859, '2nd Hackathon Day 3', NULL, NULL, NULL, 44, 1, 1, NULL, 44, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 16:12:35', 1, '2024-01-13 16:12:35', 1),
(860, 'Rekaman Zoom Hackathon Day 3', NULL, NULL, NULL, 1, 2, 1, 859, 43, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki 2nd Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-13 16:12:35', 1, '2024-01-13 16:12:35', 1),
(861, 'Demo Day', NULL, NULL, NULL, 45, 1, 1, NULL, 45, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-13 16:14:55', 1, '2024-01-13 16:14:55', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(862, 'Rekaman Demo Program Hackathon', NULL, NULL, NULL, 1, 2, 1, 861, 45, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Demo Day 2nd Hackathon nih, gimana udah pada selesai kan projectnya ? 😄\r\n\r\nTugasnya untuk Demo Day ini yaitu kumpulkan bukti Record Demo Program yang telah dibuat bersama kelompoknya.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-13 16:14:55', 1, '2024-01-13 16:14:55', 1),
(863, 'CV and Cover Letter', NULL, NULL, NULL, 1, 1, 2, NULL, 1, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 11:14:33', 1, '2024-01-15 11:14:33', 1),
(864, 'Tips & Tricks for CV and Cover Letter', NULL, NULL, NULL, 1, 2, 2, 863, 1, 'materi_pembelajaran', 'Maxy_Resumes  Cover Letter.pdf', NULL, '<p>Halo Maxians!</p>\n\n<p>Pada materi ini, kalian akan memperoleh pemahaman mendalam tentang bagaimana cara menonjolkan keunggulan diri, menyusun konten yang relevan, dan menarik perhatian pemberi kerja dengan cara yang efektif. Selain itu, kami juga akan membagikan contoh-contoh nyata yang sukses dalam dunia kerja, sehingga Anda bisa mempelajari apa yang sebaiknya dilakukan dan apa yang sebaiknya dihindari. Yuk, siapkan diri untuk langkah lebih maju dalam karier Anda! </p>', NULL, 1, '2024-01-15 11:14:33', 1, '2024-01-15 13:10:01', 1),
(865, 'CV and Cover Letter', NULL, NULL, NULL, 2, 2, 2, 863, 1, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\n\nGimana, kalian sudah lihat tips&trick membuat CV dan surat lamaran kerja kan?😄\n\nSekarang saatnya kalian untuk membuat 2 hal tersebut ya, ikuti tips & tricknya.\n\nJika sudah selesai, mohon untuk mengunggah CV (Curriculum Vitae) dan surat lamaran kerja Anda di kolom yang tersedia di bawah ini.', NULL, 1, '2024-01-15 11:14:33', 1, '2024-01-17 09:41:28', 1),
(866, 'HTML CSS Session 1 Dasar HTML dan CSS', NULL, NULL, NULL, 2, 1, 2, NULL, 2, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 13:13:18', 1, '2024-01-16 19:26:48', 1),
(867, 'Pengenalan HTML', NULL, NULL, NULL, 1, 2, 2, 866, 2, 'video_pembelajaran', 'https://youtu.be/uKYgiHQm_BI', 34, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 day 2 Lesson 1.\r\n\r\nDalam pembelajaran individu, peserta akan mempelajari pengenalan HTML, termasuk struktur dasar dan tag-tag penting yang digunakan dalam pembuatan halaman web. \r\n\r\nMateri ini penting karena menjadi dasar dalam memahami cara membuat dan mengatur konten di dalam sebuah halaman web menggunakan bahasa pemrograman HTML\r\n\r\n', NULL, 1, '2024-01-15 13:13:18', 1, '2024-01-15 13:13:18', 1),
(868, 'Pengenalan HTML', NULL, NULL, NULL, 2, 2, 2, 866, 2, 'materi_pembelajaran', 'Lesson_1.pptx', NULL, '<p>Materi Pengenalan HTML</p>', NULL, 1, '2024-01-15 13:20:56', 1, '2024-01-15 13:20:56', 1),
(869, 'Pengenalan CSS', NULL, NULL, NULL, 3, 2, 2, 866, 2, 'video_pembelajaran', 'https://youtu.be/jemDx1Qf3Yc ', 30, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 2 Lesson 2.\r\n\r\nDalam pembelajaran individu, peserta akan memperdalam pengetahuan mereka tentang CSS, termasuk pemahaman tentang sintaks, pemilihan selektor, dan bagaimana cara menghubungkannya dengan HTML.\r\n\r\nMateri ini menjadi penting karena CSS merupakan bahasa pemrograman yang digunakan untuk mengatur tampilan dan gaya dari halaman web, yang sangat relevan untuk mengembangkan keterampilan dalam desain dan pengembangan web.', NULL, 1, '2024-01-15 13:20:56', 1, '2024-01-15 13:20:56', 1),
(870, 'Pengenalan CSS', NULL, NULL, NULL, 4, 2, 2, 866, 2, 'materi_pembelajaran', 'Lesson_2.pptx', NULL, '<p> Materi Pengenalan CSS </p>', NULL, 1, '2024-01-15 13:25:44', 1, '2024-01-15 13:25:44', 1),
(871, 'Membuat Layout Dasar', NULL, NULL, NULL, 5, 2, 2, 866, 2, 'video_pembelajaran', 'https://youtu.be/l_5h2LV1M_M ', 37, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 2 Lesson 3.\r\n\r\nDalam pembelajaran individu, peserta akan belajar bagaimana membuat layout dasar halaman web dengan menggunakan HTML, yang mencakup pembuatan struktur header, main content, dan footer.\r\n\r\nMateri ini penting karena layout merupakan fondasi dari tampilan sebuah halaman web, yang memengaruhi pengalaman pengguna dan navigasi di dalamnya.', NULL, 1, '2024-01-15 13:25:44', 1, '2024-01-15 13:25:44', 1),
(872, 'Membuat Layout Dasar', NULL, NULL, NULL, 6, 2, 2, 866, 2, 'materi_pembelajaran', 'Lesson_3.pptx', NULL, '<p> Materi Membuat Layout Dasar </p>', NULL, 1, '2024-01-15 13:29:11', 1, '2024-01-15 13:29:11', 1),
(873, 'HTML CSS Session 1 Dasar HTML dan CSS', NULL, NULL, NULL, 7, 2, 2, 866, 2, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Penggunaan Struktur dasar dan tag\r\n\r\n- Penggunaan Sintaks, selektor 5 Components\r\n\r\n- Penggunaan layout halaman web\r\n\r\nStudi kasus yang diberikan adalah membuat halaman web untuk sebuah restoran, yang menuntut kreativitas dan pemahaman mendalam tentang tata letak dan desain yang menarik untuk menciptakan pengalaman pengguna yang optimal.', NULL, 1, '2024-01-15 13:29:11', 1, '2024-01-15 13:29:11', 1),
(874, 'Basics Styling with CSS —> Colour, font, and background.', NULL, NULL, NULL, 3, 1, 2, NULL, 3, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 13:34:42', 1, '2024-01-16 19:27:03', 1),
(875, 'Styling Dasar dengan CSS', NULL, NULL, NULL, 1, 2, 2, 874, 3, 'video_pembelajaran', 'https://youtu.be/3D0DisM6uKE ', 23, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 3 Lesson 1.\r\n\r\nDalam pembelajaran individu, peserta akan memperoleh pemahaman mendalam tentang pengenalan styling dasar CSS yang berkaitan dengan pengaturan warna, font, dan latar belakang (background).\r\n\r\nMateri ini akan membekali peserta dengan keterampilan untuk mengubah tampilan visual dari elemen-elemen di halaman web, mulai dari pengaturan warna teks dan latar belakang hingga pemilihan jenis huruf yang tepat.\r\n\r\nPemahaman yang kuat tentang styling dasar ini menjadi kunci dalam menciptakan tata letak yang menarik dan estetis dalam desain web.', NULL, 1, '2024-01-15 13:34:42', 1, '2024-01-15 13:34:42', 1),
(876, 'Styling Dasar dengan CSS', NULL, NULL, NULL, 2, 2, 2, 874, 3, 'materi_pembelajaran', 'Lesson_4.pptx', NULL, 'Materi Styling Dasar dengan CSS', NULL, 1, '2024-01-15 13:44:07', 1, '2024-01-15 13:44:07', 1),
(877, 'Pengenalan Bootstrap 5', NULL, NULL, NULL, 3, 2, 2, 874, 3, 'video_pembelajaran', 'https://youtu.be/hO3bfe5e_-4 ', 58, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 3 Lesson 2.\r\n\r\nDalam pembelajaran individu, peserta akan memperdalam pemahaman mereka tentang styling dasar CSS yang berkaitan dengan Framework Bootstrap 5. Mulai dari fitur-fitur yang disediakan, sampai cara implementasinya.', NULL, 1, '2024-01-15 13:44:07', 1, '2024-01-15 13:47:58', 1),
(878, 'Pengenalan Bootstrap 5', NULL, NULL, NULL, 4, 2, 2, 874, 3, 'materi_pembelajaran', 'Lesson_5_Bootstrap.pptx', NULL, 'Materi Pengenalan Bootstrap 5', NULL, 1, '2024-01-15 13:44:07', 1, '2024-01-15 13:47:35', 1),
(879, 'Pengenalan AdminLTE', NULL, NULL, NULL, 5, 2, 2, 874, 3, 'video_pembelajaran', 'https://youtu.be/o7aJmAU9zDY ', 29, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 3 Lesson 3.\r\n\r\nDalam pembelajaran individu, peserta akan memperdalam pemahaman mereka tentang framework AdminLTE mulai dari fitur-fitur sampai implementasinya', NULL, 1, '2024-01-15 13:52:46', 1, '2024-01-15 13:52:46', 1),
(880, 'Pengenalan AdminLTE', NULL, NULL, NULL, 6, 2, 2, 874, 3, 'materi_pembelajaran', 'Lesson_5_AdminLTE.pptx', NULL, 'Materi Pengenalan AdminLTE', NULL, 1, '2024-01-15 13:52:46', 1, '2024-01-16 11:31:08', 1),
(881, 'HTML CSS Session 1', NULL, NULL, NULL, 7, 2, 2, 874, 3, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- Penggunaan Responsive Layout\r\n\r\n- Penggunaan Bootstrap 5 Components\r\n\r\n- Penggunaan Bootstrap 5 Utilities\r\n\r\nStudi kasus yang diberikan adalah membuat halaman web untuk sebuah event atau festival, yang menuntut kreativitas dan keahlian dalam merancang tampilan yang menarik dan responsif untuk menarik perhatian pengguna.', NULL, 1, '2024-01-15 13:52:46', 1, '2024-01-15 13:52:46', 1),
(882, 'Sesi 2 : HTML and CSS advanced', NULL, NULL, NULL, 4, 1, 2, NULL, 4, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 13:59:18', 1, '2024-01-16 19:27:22', 1),
(883, 'HTML CSS Form & Table', NULL, NULL, NULL, 1, 2, 2, 882, 4, 'video_pembelajaran', 'https://youtu.be/BA8xA-nj1cc', 30, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 4 Lesson 1.\r\n\r\nDalam pembelajaran individu, peserta akan belajar tentang penggunaan form dan table dalam pembuatan halaman web. \r\n\r\nMateri ini penting karena form digunakan untuk mengumpulkan data dari pengguna, seperti formulir kontak atau pendaftaran, sementara table digunakan untuk menyajikan data dalam format yang terstruktur dan mudah dibaca. \r\n\r\nDengan memahami penggunaan kedua elemen ini, peserta akan dapat memperkaya halaman web dengan fitur-fitur interaktif yang dapat meningkatkan pengalaman pengguna.', NULL, 1, '2024-01-15 13:59:18', 1, '2024-01-15 14:00:16', 1),
(884, 'HTML CSS Form & Table', NULL, NULL, NULL, 2, 2, 2, 882, 4, 'materi_pembelajaran', 'Lesson_1_FormTable.pptx', NULL, 'Materi HTML CSS Form & Table', NULL, 1, '2024-01-15 13:59:18', 1, '2024-01-15 13:59:18', 1),
(885, 'CSS Lanjutan: Box model, positioning, dan flexbox.', NULL, NULL, NULL, 3, 2, 2, 882, 4, 'video_pembelajaran', 'https://youtu.be/q8teXDQMi4k ', 22, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 4 Lesson 2.\r\n\r\nDalam pembelajaran individu, peserta akan diajak untuk memahami konsep-konsep penting dalam desain web, seperti Box Model, Positioning, dan Flexbox. \r\n\r\nMateri ini akan membantu peserta memahami bagaimana elemen-elemen pada halaman web diatur dalam kotak (Box Model), bagaimana posisi elemen-elemen tersebut diatur dalam tata letak halaman (Positioning), serta bagaimana menggunakan Flexbox untuk mengatur tata letak secara fleksibel dan responsif. \r\n\r\nPemahaman yang kuat terhadap konsep-konsep ini akan membekali peserta dengan keterampilan yang diperlukan dalam merancang tata letak halaman web yang efektif dan menarik.', NULL, 1, '2024-01-15 14:04:37', 1, '2024-01-15 14:04:37', 1),
(886, 'CSS Lanjutan: Box model, positioning, dan flexbox.', NULL, NULL, NULL, 4, 2, 2, 882, 4, 'materi_pembelajaran', 'Lesson_2_CSSLanjutan.pptx', NULL, 'Materi CSS Lanjutan: Box model, positioning, dan flexbox.', NULL, 1, '2024-01-15 14:04:37', 1, '2024-01-16 11:30:43', 1),
(887, 'CSS Lanjutan: Animasi dan Transisi dengan CSS', NULL, NULL, NULL, 5, 2, 2, 882, 4, 'video_pembelajaran', 'https://youtu.be/YKr0ga-JY6Q ', 15, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 4 Lesson 3.\r\n\r\nDalam pembelajaran individu, peserta akan belajar bagaimana membuat animasi dan transisi menggunakan CSS. \r\n\r\nMateri ini akan membekali peserta dengan keterampilan untuk menambahkan efek visual yang dinamis dan menarik pada halaman web mereka. \r\n\r\nDengan memahami cara menggunakan CSS untuk mengatur animasi dan transisi, peserta akan dapat meningkatkan pengalaman pengguna dengan menambahkan elemen interaktif yang menyenangkan dan memikat.', NULL, 1, '2024-01-15 14:09:15', 1, '2024-01-15 14:09:15', 1),
(888, 'CSS Lanjutan: Animasi dan Transisi dengan CSS', NULL, NULL, NULL, 6, 2, 2, 882, 4, 'materi_pembelajaran', 'Lesson_3_CSSLanjutan2.pptx', NULL, 'Materi CSS Lanjutan: Animasi dan Transisi dengan CSS', NULL, 1, '2024-01-15 14:09:15', 1, '2024-01-16 11:33:59', 1),
(889, 'HTML CSS Session 2', NULL, NULL, NULL, 7, 2, 2, 882, 4, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- penggunaan CSS dalam form, tabel, dan Box Model\r\n- kemampuan dalam membuat animasi. \r\nStudi kasus melibatkan pembuatan halaman web untuk sistem pendaftaran konferensi, pembuatan bendera Inggris menggunakan CSS, dan pembuatan halaman web interaktif', NULL, 1, '2024-01-15 14:09:15', 1, '2024-01-15 14:09:15', 1),
(890, 'Portofolio day', NULL, NULL, NULL, 5, 1, 2, NULL, 5, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 14:15:06', 1, '2024-01-17 10:42:41', 1),
(891, 'Portofolio Day', NULL, NULL, NULL, 1, 2, 2, 890, 5, 'assignment', NULL, NULL, NULL, NULL, 1, '2024-01-15 14:15:06', 1, '2024-01-15 14:15:06', 1),
(892, 'Responsif Design with Media Queries.', NULL, NULL, NULL, 6, 1, 2, NULL, 6, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 14:22:00', 1, '2024-01-16 19:27:56', 1),
(893, 'Responsif Design dengan Media Queries & CSS Libraries', NULL, NULL, NULL, 1, 2, 2, 892, 6, 'video_pembelajaran', 'https://youtu.be/sHknLLrZslw ', 15, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 6.\r\n\r\nDalam pembelajaran individu, peserta akan mempelajari konsep-konsep penting dalam desain responsif menggunakan CSS.\r\n\r\nMateri ini mencakup pengenalan terhadap media queries, pemahaman tentang ciri-ciri desain responsif, serta penggunaan CSS libraries untuk mendukung pembuatan desain yang responsif dan adaptif.\r\n\r\nDengan memahami konsep-konsep ini, peserta akan mampu membuat desain web yang responsif, menyesuaikan tampilan halaman dengan baik di berbagai perangkat dan layar.', NULL, 1, '2024-01-15 14:22:00', 1, '2024-01-15 14:22:43', 1),
(894, 'Responsif Design dengan Media Queries', NULL, NULL, NULL, 2, 2, 2, 892, 6, 'materi_pembelajaran', 'Lesson_4_Responsif.pptx', NULL, 'Materi Responsif Design dengan Media Queries', NULL, 1, '2024-01-15 14:22:00', 1, '2024-01-16 11:31:17', 1),
(895, 'CSS Libraries', NULL, NULL, NULL, 3, 2, 2, 892, 6, 'materi_pembelajaran', 'Lesson_5_CSSLibraries.pptx', NULL, 'Materi CSS Libraries', NULL, 1, '2024-01-15 14:28:28', 1, '2024-01-15 14:28:28', 1),
(896, 'Responsif Design dengan Media Queries. & CSS Libraries', NULL, NULL, NULL, 4, 2, 2, 892, 6, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n\r\n- kemampuan membuat daftar produk menggunakan CSS Libraries\r\n\r\n- kemampuan membuat desain profil yang responsif.', NULL, 1, '2024-01-15 14:28:28', 1, '2024-01-15 14:28:28', 1),
(897, 'HTML CSS Session 3 HTML and CSS Ekspert ', NULL, NULL, NULL, 7, 1, 2, NULL, 7, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 14:40:06', 1, '2024-01-16 19:28:10', 1),
(898, 'HTML 5', NULL, NULL, NULL, 1, 2, 2, 897, 7, 'video_pembelajaran', 'https://youtu.be/y6P3xKIqIAc', 38, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 7 Lesson 1.\r\n\r\nDalam pembelajaran individu, peserta akan belajar mengenal HTML5, standar terbaru dalam pengembangan halaman web yang menawarkan fitur-fitur baru dan lebih modern dibandingkan dengan versi sebelumnya.\r\n\r\nMateri ini penting karena HTML5 menjadi dasar dalam membangun konten web yang responsif dan kaya akan fitur.', NULL, 1, '2024-01-15 14:40:06', 1, '2024-01-15 14:41:07', 1),
(899, 'HTML 5', NULL, NULL, NULL, 2, 2, 2, 897, 7, 'materi_pembelajaran', 'Lesson_1_HTML5.pptx', NULL, 'Materi HTML 5', NULL, 1, '2024-01-15 14:40:06', 1, '2024-01-15 14:40:06', 1),
(900, 'CSS Grid', NULL, NULL, NULL, 3, 2, 2, 897, 7, 'video_pembelajaran', 'https://youtu.be/cv6HbL2u26o', 12, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 7 Lesson 2.\r\n\r\nPeserta akan mempelajari cara membuat layout web yang kompleks dengan mudah.\r\n\r\nMateri ini akan membekali mereka dengan keterampilan untuk merancang tata letak halaman web yang lebih kompleks dan menarik dengan lebih efisien.', NULL, 1, '2024-01-15 14:48:53', 1, '2024-01-15 14:48:53', 1),
(901, 'CSS Grid', NULL, NULL, NULL, 4, 2, 2, 897, 7, 'materi_pembelajaran', 'Lesson_2_CSSGrid.pptx', NULL, 'Materi CSS Grid', NULL, 1, '2024-01-15 14:48:53', 1, '2024-01-15 14:48:53', 1),
(902, 'Pengenalan ke CSS Frameworks', NULL, NULL, NULL, 5, 2, 2, 897, 7, 'video_pembelajaran', 'https://youtu.be/HMoOcqAeft0', 24, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 7 Lesson 3.\r\n\r\nDalam pembelajaran individu, peserta akan mempelajari pengenalan terhadap CSS Frameworks.\r\n\r\nMateri ini akan membekali peserta dengan pemahaman tentang penggunaan framework CSS untuk mempercepat dan menyederhanakan proses pengembangan tata letak halaman web.', NULL, 1, '2024-01-15 14:54:40', 1, '2024-01-15 14:54:40', 1),
(903, 'Pengenalan ke CSS Frameworks', NULL, NULL, NULL, 6, 2, 2, 897, 7, 'materi_pembelajaran', 'Lesson_3_CSSFrameworks.pptx', NULL, 'Materi Pengenalan CSS Frameworks', NULL, 1, '2024-01-15 14:54:40', 1, '2024-01-16 11:35:37', 1),
(904, 'HTML dan CSS Advance Learning', NULL, NULL, NULL, 7, 2, 2, 897, 7, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- pembuatan video dan lokasi pada web\r\n- pembuatan layout\r\n- penggunaan kerangka produk dengan CSS.\r\n\r\nStudi kasus yang diberikan mencakup pembuatan Aplikasi Review Tempat Berbasis Video dan Lokasi, Galeri Foto Interaktif Mentor Time dan Aplikasi Web Manajemen Mentor Time (To-Do List)', NULL, 1, '2024-01-15 14:54:40', 1, '2024-01-15 14:54:40', 1),
(905, 'Bootstrap 5 for Backend view (Study Case: AdminLTE) (Bootstrap 5)', NULL, NULL, NULL, 8, 1, 2, NULL, 8, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 15:00:00', 1, '2024-01-16 19:28:29', 1),
(906, 'Bootstrap 5 for Backend View', NULL, NULL, NULL, 1, 2, 2, 905, 8, 'video_pembelajaran', '', 58, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 8.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan melakukan pembelajaran terkait :\r\n- Menggunakan AdminLTE sebagai dasar template Backend\r\n- Mengembangkan AdminLTE sesuai dengan kebutuhan\r\n- Menggunakan Boostrap Component dan Utilities ke dalam template', NULL, 1, '2024-01-15 15:00:00', 1, '2024-01-15 15:00:37', 1),
(907, 'Bootstrap 5 for Backend View', NULL, NULL, NULL, 2, 2, 2, 905, 8, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan AdminLTE\r\n- Halaman-halaman AdminLTE yang sesuai dengan kebutuhan\r\n- Penggunaan Component AdminLTE yang terintegrasi dengan JavaScript', NULL, 1, '2024-01-15 15:00:00', 1, '2024-01-15 15:00:00', 1),
(908, 'Java Script Introduction, variable, data type, and debug', NULL, NULL, NULL, 9, 1, 2, NULL, 9, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 15:06:53', 1, '2024-01-16 19:28:43', 1),
(909, 'JavaScript Introduction', NULL, NULL, NULL, 1, 2, 2, 908, 9, 'video_pembelajaran', 'https://youtu.be/eYjj93LqKp0', 7, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 9.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Mengenal teknik debugging\r\n- mengenal perbedaan Let, const, dan var & pengaplikasiannya\r\n- Mengenal Data types: Object, null, undefine', NULL, 1, '2024-01-15 15:06:53', 1, '2024-01-15 15:06:53', 1),
(910, 'JavaScript Introduction', NULL, NULL, NULL, 2, 2, 2, 908, 9, 'materi_pembelajaran', 'ppt_javascript_intro.pdf', NULL, 'Materi JavaScript Introduction', NULL, 1, '2024-01-15 15:06:53', 1, '2024-01-15 15:06:53', 1),
(911, 'JavaScript Introduction', NULL, NULL, NULL, 3, 2, 2, 908, 9, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan Object, null, undefine\r\n- Penggunaan Let, const, dan var\r\n- Penggunaan Teknik Debugging\r\n\r\nTugas :\r\nBuatlah program JavaScript yang dapat menghitung luas lingkaran dengan jari-jari yang diberikan oleh pengguna.', NULL, 1, '2024-01-15 15:09:32', 1, '2024-01-15 15:09:32', 1),
(912, 'Communication with Public Speaking Skill', NULL, NULL, NULL, 10, 1, 2, NULL, 10, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 15:11:26', 1, '2024-01-15 15:11:26', 1),
(913, 'JavaScript debug & operator', NULL, NULL, NULL, 11, 1, 2, NULL, 11, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 15:22:54', 1, '2024-01-16 19:28:56', 1),
(914, 'JavaScript Debug & Operator', NULL, NULL, NULL, 1, 2, 2, 913, 11, 'video_pembelajaran', '', 11, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Mengenal operator pada Javascript\r\n- Mengenal debugger statetment & breakpoint', NULL, 1, '2024-01-15 15:22:54', 1, '2024-01-15 15:22:54', 1),
(915, 'JavaScript Debug & Operator', NULL, NULL, NULL, 2, 2, 2, 913, 11, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n - Program Javascript yang dihasilkan\r\n - Hasil perhitungan faktorial dengan Javascript\r\n\r\nTugas : \r\nBuatlah program JavaScript yang dapat menghitung faktorial dari sebuah bilangan bulat positif yang diberikan oleh pengguna.', NULL, 1, '2024-01-15 15:22:54', 1, '2024-01-15 15:22:54', 1),
(916, 'JavaScript string aray object json conditional', NULL, NULL, NULL, 12, 1, 2, NULL, 12, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 15:28:19', 1, '2024-01-16 19:29:08', 1),
(917, 'JavaScript String, Array, Object J.SON, Conditional', NULL, NULL, NULL, 1, 2, 2, 916, 12, 'video_pembelajaran', 'https://youtu.be/Jc_xpR5mego', 27, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 12.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n - JSON data, Name & value\r\n - JSON Object\r\n - JSON Array\r\n - convert JSON Text ke Javascript Object', NULL, 1, '2024-01-15 15:28:19', 1, '2024-01-15 15:28:19', 1),
(918, 'JavaScript String, Array, Object J.SON, Conditional', NULL, NULL, NULL, 2, 2, 2, 916, 12, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n - hasil pemograman Javascript\r\n - penggunaan JSON Data & text\r\n - hasil konversi dari JSON ke javascript\r\n\r\nTugas :\r\nBuatlah program JavaScript yang dapat mengubah array menjadi object JSON dengan indeks array sebagai kunci object.\r\n- Gunakan variabel untuk menyimpan nilai array dan object.\r\n- Gunakan metode Object.assign untuk menggabungkan array dengan object kosong.\r\n- Gunakan metode JSON.stringify untuk mengubah object menjadi string JSON.\r\n- Gunakan operator debug untuk menampilkan hasil.', NULL, 1, '2024-01-15 15:28:19', 1, '2024-01-15 15:28:19', 1),
(919, 'JavaScript Session 3 ', NULL, NULL, NULL, 13, 1, 2, NULL, 13, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 15:38:41', 1, '2024-01-16 19:29:18', 1),
(920, 'Conditional, Looping, Function & arrow function, String & string manipulation, Array & array method & object, Dom manipulation', NULL, NULL, NULL, 1, 2, 2, 919, 13, 'video_pembelajaran', 'https://youtu.be/7Cmb2NMXeDc', 58, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 13.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Switch-case statements\r\n- Penggunaan ternary operator dalam kondisi.\r\n- Metode String baru dalam ES6+\r\n- Object-oriented programming (OOP) dalam JavaScript\r\n- Destructuring pada array dan object.\r\n- Metode array seperti map, filter, reduce', NULL, 1, '2024-01-15 15:38:41', 1, '2024-01-15 15:38:41', 1),
(921, 'Conditional, Looping, Function & arrow function, String & string manipulation, Array & array method & object, Dom manipulation', NULL, NULL, NULL, 2, 2, 2, 919, 13, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- penggunaan Metode Array\r\n- penggunaan arrow function\r\n- Penggunaan string & string manipulation\r\n- Object conditional', NULL, 1, '2024-01-15 15:38:41', 1, '2024-01-15 15:38:41', 1),
(922, 'Javascript and JQuery for Object Manipulation', NULL, NULL, NULL, 14, 1, 2, NULL, 14, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:21:17', 1, '2024-01-16 19:29:32', 1),
(923, 'JavaScript and JQuery Object Manipulation', NULL, NULL, NULL, 1, 2, 2, 922, 14, 'video_pembelajaran', 'https://youtu.be/7Cmb2NMXeDc', 58, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 14.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Menggunakan JavaScript untuk debugging\r\n\r\n- Menggunakan JavaScript untuk manipulasi object yang ada dalam halaman website\r\n\r\n- Menggunakan JQuery sebagai shortcut untuk manipulasi object dan element yang ada dalam halaman website', NULL, 1, '2024-01-15 16:21:17', 1, '2024-01-15 16:21:17', 1),
(924, 'JavaScript and JQuery Object Manipulation', NULL, NULL, NULL, 2, 2, 2, 922, 14, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan JavaScript untuk debugging \r\n\r\n- Penggunaan JavaScript/JQuery untuk melakukan manipulasi dan bukan saja untuk init component', NULL, 1, '2024-01-15 16:21:17', 1, '2024-01-15 16:21:17', 1),
(925, 'Framework7 Authentication and Data Storing', NULL, NULL, NULL, 15, 1, 2, NULL, 15, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:26:27', 1, '2024-01-16 19:31:08', 1),
(926, 'Framework7 Authentication and Data Storing', NULL, NULL, NULL, 1, 2, 2, 925, 15, 'video_pembelajaran', 'https://youtu.be/a6uV2aQn7F0', 29, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 15.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Menggunakan Firebase Authentication\r\n- Menghubungkan Framework7 dengan Firebase Authentication\r\n- Membuat Database pada Firebase\r\n- Menyimpan data secara lokal dan penggunaan constant\r\n- Menyimpan data pada Firebase menggunakan Framework7', NULL, 1, '2024-01-15 16:26:27', 1, '2024-01-15 16:26:27', 1),
(927, 'Framework7 Authentication and Data Storing', NULL, NULL, NULL, 2, 2, 2, 925, 15, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan Firebase Authentication\r\n- Penggunaan Database Firebase', NULL, 1, '2024-01-15 16:26:27', 1, '2024-01-15 16:26:27', 1),
(928, 'Framework7 Request Access ', NULL, NULL, NULL, 16, 1, 2, NULL, 16, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:30:32', 1, '2024-01-16 19:31:08', 1),
(929, 'Framework7 Request Access', NULL, NULL, NULL, 1, 2, 2, 928, 16, 'video_pembelajaran', 'https://youtu.be/Ewf_VNvQ7ak', 20, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 16.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Menggunakan Request Location\r\n- Menggunakan Request Camera\r\n- Upload data dari internal storage dan camera\r\n- Menggunakan Push Notification', NULL, 1, '2024-01-15 16:30:32', 1, '2024-01-15 16:30:32', 1),
(930, 'Framework7 Request Access', NULL, NULL, NULL, 2, 2, 2, 928, 16, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan Request Access\r\n- Penggunaan Push Notification', NULL, 1, '2024-01-15 16:30:32', 1, '2024-01-15 16:30:32', 1),
(931, 'Semantic UI for Bootstrap Alternative', NULL, NULL, NULL, 17, 1, 2, NULL, 17, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:34:51', 1, '2024-01-16 19:31:08', 1),
(932, 'SemanticUI for Bootstrap Alternative', NULL, NULL, NULL, 1, 2, 2, 931, 17, 'video_pembelajaran', 'https://youtu.be/m1p18xOZwBo', 80, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 17.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Menggunakan SemanticUI Basic Layouting\r\n- Menggunakan SemanticUI element, collections, dan view\r\n- Menggunakan SemanticUI modules\r\n- Memanggil modules melalui JavaScript', NULL, 1, '2024-01-15 16:34:51', 1, '2024-01-15 16:34:51', 1),
(933, 'SemanticUI for Bootstrap Alternative', NULL, NULL, NULL, 2, 2, 2, 931, 17, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan SemanticUI elements dan modules untuk melengkapi dan mempercantik tampilan\r\n', NULL, 1, '2024-01-15 16:34:51', 1, '2024-01-15 16:34:51', 1),
(934, 'Tailwind CSS', NULL, NULL, NULL, 18, 1, 2, NULL, 18, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:40:38', 1, '2024-01-16 19:31:08', 1),
(935, 'Tailwind CSS', NULL, NULL, NULL, 1, 2, 2, 934, 18, 'video_pembelajaran', 'https://youtu.be/m1p18xOZwBo', 80, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 18.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Mengenal Tailwind CSS & Keuntungan menggunakan Tailwind CSS \r\n\r\n- Mempelajari tentang Tools pada Taiwind CSS \r\n\r\n- Mengenal konfigurasi CSS', NULL, 1, '2024-01-15 16:40:38', 1, '2024-01-15 16:40:38', 1),
(936, 'Tailwind CSS', NULL, NULL, NULL, 2, 2, 2, 934, 18, 'materi_pembelajaran', 'Tailwind.pptx', NULL, 'Materi Tailwind CSS', NULL, 1, '2024-01-15 16:40:38', 1, '2024-01-15 16:40:38', 1),
(937, 'Tailwind CSS', NULL, NULL, NULL, 3, 2, 2, 934, 18, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Pembuatan sistem management mentor dengan tools tailwind css', NULL, 1, '2024-01-15 16:40:38', 1, '2024-01-15 16:40:38', 1),
(938, 'AJAX and Using Web Services ', NULL, NULL, NULL, 19, 1, 2, NULL, 19, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:46:17', 1, '2024-01-16 19:31:08', 1),
(939, 'AJAX and Web Services', NULL, NULL, NULL, 1, 2, 2, 938, 19, 'video_pembelajaran', 'https://youtu.be/--NoHEH8hAY', 45, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 19.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n- Menggunakan Widget (iframe)\r\n\r\n- Menggunakan AJAX untuk menampilkan simple data yang berasal dari API / Web Services (weather, finances, etc) \r\n\r\n- Menggunakan AJAX untuk mengolah dan menampilkan data yang membutuhkan Authentication (JWT dsb)', NULL, 1, '2024-01-15 16:46:17', 1, '2024-01-15 16:46:17', 1),
(940, 'AJAX and Web Services', NULL, NULL, NULL, 2, 2, 2, 938, 19, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan Widget \r\n\r\n- Penggunaan third party API untuk mendapatkan, mengolah, dan manampilkan data eksternal', NULL, 1, '2024-01-15 16:46:17', 1, '2024-01-15 16:46:17', 1),
(941, 'Personal Branding', NULL, NULL, NULL, 20, 1, 2, NULL, 20, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:51:22', 1, '2024-01-15 16:51:22', 1),
(942, '1st Hackathon Day 1', NULL, NULL, NULL, 21, 1, 2, NULL, 21, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:57:30', 1, '2024-01-15 16:57:30', 1),
(943, 'Bukti Record Meeting Kelompok', NULL, NULL, NULL, 1, 2, 2, 942, 21, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-15 16:57:30', 1, '2024-01-15 16:58:21', 1),
(944, '1st Hackathon Day 2', NULL, NULL, NULL, 22, 1, 2, NULL, 22, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-15 16:57:30', 1, '2024-01-15 16:57:30', 1),
(945, 'Bukti Record Meeting Kelompok', NULL, NULL, NULL, 1, 2, 2, 944, 22, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-15 16:57:30', 1, '2024-01-15 16:57:30', 1),
(946, '1st Hackathon Day 3', NULL, NULL, NULL, 23, 1, 2, NULL, 23, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 08:22:53', 1, '2024-01-16 08:22:53', 1),
(947, 'Bukti Record Meeting Kelompok', NULL, NULL, NULL, 1, 2, 2, 946, 23, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-16 08:22:53', 1, '2024-01-16 08:22:53', 1),
(948, 'Demo Day', NULL, NULL, NULL, 24, 1, 2, NULL, 24, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 08:30:15', 1, '2024-01-16 08:30:15', 1),
(949, 'Record Demo Program', NULL, NULL, NULL, 1, 2, 2, 948, 24, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Demo Day nih, gimana udah pada selesai kan projectnya ? 😄\r\n\r\nTugasnya untuk Demo Day ini yaitu kumpulkan bukti Record Demo Program yang telah dibuat bersama kelompoknya.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-16 08:30:15', 1, '2024-01-16 08:30:15', 1),
(950, 'Group Affiliation', NULL, NULL, NULL, 25, 1, 2, NULL, 25, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 08:32:02', 1, '2024-01-16 08:32:02', 1),
(951, 'JQuery Popular Frontend Libraries ', NULL, NULL, NULL, 26, 1, 2, NULL, 26, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 08:40:39', 1, '2024-01-16 19:31:43', 1),
(952, 'JQuery Popular Frontend Libraries', NULL, NULL, NULL, 1, 2, 2, 951, 26, 'video_pembelajaran', 'https://youtu.be/MRzMX6M-rTk', 48, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 26.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait: \r\n\r\n- Menggunakan Parallax \r\n\r\n- Menggunakan Social Share \r\n\r\n- Menggunakan LeafletJS \r\n\r\n- Menggunakan Tawk.to dan third party sejenisnya', NULL, 1, '2024-01-16 08:40:39', 1, '2024-01-16 08:40:39', 1),
(953, 'JQuery Popular Frontend Libraries', NULL, NULL, NULL, 2, 2, 2, 951, 26, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Menggunakan popular libraries di luar Bootstrap dan Semantic UI \r\n\r\n- Menggunakan third party widgets', NULL, 1, '2024-01-16 08:40:39', 1, '2024-01-16 08:40:39', 1),
(954, 'Mobile Web App Using Framework7 ', NULL, NULL, NULL, 27, 1, 2, NULL, 27, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 08:49:02', 1, '2024-01-16 19:31:52', 1),
(955, 'Mobile Web Apps Using Framework7', NULL, NULL, NULL, 1, 2, 2, 954, 27, 'video_pembelajaran', 'https://youtu.be/bN_rhyaCM88 ', 16, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 27.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Instalasi Framework7 \r\n\r\n- Belajar melalui Kitchen Sink \r\n\r\n- Menggunakan components dan class yang telah disediakan oleh Framework7 \r\n\r\n- Menggunakan navigasi pada Framework7', NULL, 1, '2024-01-16 08:49:02', 1, '2024-01-16 08:49:02', 1),
(956, 'Mobile Web Apps Using Framework7', NULL, NULL, NULL, 2, 2, 2, 954, 27, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan Framework7 \r\n\r\n- Penggunaan Framework7 components', NULL, 1, '2024-01-16 08:49:02', 1, '2024-01-16 08:49:02', 1),
(957, 'React JS Session 1', NULL, NULL, NULL, 28, 1, 2, NULL, 28, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 08:59:44', 1, '2024-01-16 19:32:07', 1),
(958, 'React JS Introduction', NULL, NULL, NULL, 1, 2, 2, 957, 28, 'video_pembelajaran', 'https://youtu.be/mmb4nl_agkE ', 33, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 28.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Javascript XML/ Javascript Syntax Extension(JSX), \r\n\r\n - Model, View & Controller (MVC) \r\n\r\n - React Data Flow \r\n\r\n - React Event', NULL, 1, '2024-01-16 08:59:44', 1, '2024-01-16 08:59:44', 1),
(959, 'React JS Introduction', NULL, NULL, NULL, 2, 2, 2, 957, 28, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penulisan HTML pada React \r\n\r\n - MVC frameworks \r\n\r\n - Data flow yang dihasilkan\r\n\r\nBuatlah Aplikasi Penghitung Kata', NULL, 1, '2024-01-16 08:59:44', 1, '2024-01-16 08:59:44', 1),
(960, 'React JS Sesssion 2', NULL, NULL, NULL, 29, 1, 2, NULL, 29, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 15:15:50', 1, '2024-01-16 19:32:17', 1),
(961, 'React JS Session 2', NULL, NULL, NULL, 1, 2, 2, 960, 29, 'video_pembelajaran', 'https://youtu.be/W9xI1VBzKxM', 45, 'Hello Maxians ! 😁\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 29.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n - Mengenal React Hook & jenis-jenisnya \r\n\r\n - Mengenal React CSS Styling \r\n\r\n - Mengenal React Routing', NULL, 1, '2024-01-16 15:15:50', 1, '2024-01-16 15:15:50', 1),
(962, 'React JS Session 2', NULL, NULL, NULL, 2, 2, 2, 960, 29, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Penggunaan React Hook \r\n\r\n- Melakukan Style react dengan CSS\r\n\r\nStudy Case : Penghitung Karakter', NULL, 1, '2024-01-16 15:15:50', 1, '2024-01-16 15:15:50', 1),
(963, 'Speak Up Stand Out', NULL, NULL, NULL, 30, 1, 2, NULL, 30, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 15:20:32', 1, '2024-01-16 15:20:32', 1),
(964, 'React JS Sesssion 3', NULL, NULL, NULL, 31, 1, 2, NULL, 31, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 15:24:52', 1, '2024-01-16 19:32:32', 1),
(965, 'React JS Session 3', NULL, NULL, NULL, 1, 2, 2, 964, 31, 'video_pembelajaran', 'https://youtu.be/TlbIIwaFDzc', 12, 'Hello Maxians ! 😁\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 31.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Membuat simple kalkulator \r\n\r\n- Menggunakan variabel \r\n\r\n- variabel yang ada dalam react js', NULL, 1, '2024-01-16 15:24:52', 1, '2024-01-16 15:24:52', 1),
(966, 'React JS Session 3', NULL, NULL, NULL, 2, 2, 2, 964, 31, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Data Flow yang dihasilkan \r\n\r\n- Penggunaan variabel dan fungsi yang digunakan\r\n\r\nStudy Case : Simple Calculator', NULL, 1, '2024-01-16 15:24:52', 1, '2024-01-16 15:24:52', 1),
(967, '	\nNext JS Session 1', NULL, NULL, NULL, 32, 1, 2, NULL, 32, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 15:43:28', 1, '2024-01-16 19:32:41', 1),
(968, 'Next JS Session 1', NULL, NULL, NULL, 1, 2, 2, 967, 32, 'video_pembelajaran', 'https://youtu.be/yYHyfHi45Zc ', 7, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 32.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Pengenalan Next JS \r\n\r\n- Mengenal component next js', NULL, 1, '2024-01-16 15:43:28', 1, '2024-01-16 15:43:28', 1),
(969, 'Next JS Session 1', NULL, NULL, NULL, 2, 2, 2, 967, 32, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- penggunaan komponen NextJS yang terintegrasi dengan Javascript\r\n\r\nCase Study : membuat landing page bagian home', NULL, 1, '2024-01-16 15:43:28', 1, '2024-01-16 15:43:28', 1),
(970, '	\nNext JS Session 2', NULL, NULL, NULL, 33, 1, 2, NULL, 33, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 15:51:04', 1, '2024-01-16 19:32:52', 1),
(971, 'Next JS Session 2', NULL, NULL, NULL, 1, 2, 2, 970, 33, 'video_pembelajaran', 'https://youtu.be/BrPqY8URGMQ ', 45, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 33.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mempelajari cara pembuatan router \r\n\r\n- Mempelajari cara penambahan style \r\n\r\n- mempelajari penggunaan Tailwind', NULL, 1, '2024-01-16 15:51:04', 1, '2024-01-16 15:51:04', 1),
(972, 'Next JS Session 2', NULL, NULL, NULL, 2, 2, 2, 970, 33, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- pembuatan Styling \r\n\r\n - pembuatan router \r\n\r\n - Penggunaan conditional function\r\n\r\nCase Study : buat tampilan landing page dengan api gratis', NULL, 1, '2024-01-16 15:51:04', 1, '2024-01-16 15:51:04', 1),
(973, 'Next JS Session 3 ', NULL, NULL, NULL, 34, 1, 2, NULL, 34, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 15:57:20', 1, '2024-01-16 19:33:02', 1),
(974, 'Next JS Session 3', NULL, NULL, NULL, 1, 2, 2, 973, 34, 'video_pembelajaran', 'https://youtu.be/BrPqY8URGMQ', 38, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 33.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mempelajari cara pembuatan router \r\n\r\n- Mempelajari cara penambahan style \r\n\r\n- mempelajari penggunaan Tailwind', NULL, 1, '2024-01-16 15:57:20', 1, '2024-01-16 15:57:20', 1),
(975, 'Next JS Session 3', NULL, NULL, NULL, 2, 2, 2, 973, 34, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- pembuatan Styling \r\n\r\n - pembuatan router \r\n\r\n - Penggunaan conditional function\r\n\r\nCase Study : buat tampilan landing page dengan api gratis', NULL, 1, '2024-01-16 15:57:20', 1, '2024-01-16 15:57:20', 1),
(976, 'Unlocking Intergenerational Communication', NULL, NULL, NULL, 35, 1, 2, NULL, 35, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 16:11:47', 1, '2024-01-16 16:11:47', 1),
(977, '	\nTracking and Measure the Quality of your Website (Google Analytics and Lighthouse)', NULL, NULL, NULL, 36, 1, 2, NULL, 36, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 16:32:32', 1, '2024-01-16 19:33:11', 1),
(978, 'Tracking and Measure the Quality of your Website', NULL, NULL, NULL, 1, 2, 2, 977, 36, 'video_pembelajaran', 'https://youtu.be/V4PH-zYLwQY', 21, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 36.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Menghubungkan dan Reporting menggunakan Google Analytics \r\n\r\n- Menghubungkan dan Reporting menggunakan Facebook Pixel \r\n\r\n- Menghubungkan Google Tag Manager ke Google Analytics \r\n\r\n- Menilai kualitas website yang dibuat menggunakan popular tools seperti Web.Dev dan Google Lighthouse', NULL, 1, '2024-01-16 16:32:32', 1, '2024-01-16 16:32:32', 1),
(979, 'Tracking and Measure the Quality of your Website', NULL, NULL, NULL, 2, 2, 2, 977, 36, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Menggunakan Google Analytics dan reporting yang ditarik \r\n\r\n- Kualitas website yang dibuat pada Lighthouse minimal 60', NULL, 1, '2024-01-16 16:32:32', 1, '2024-01-16 16:32:32', 1),
(980, 'React Native Session 1', NULL, NULL, NULL, 37, 1, 2, NULL, 37, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 16:42:23', 1, '2024-01-16 19:33:22', 1),
(981, 'React Native Session 1 Lesson 1 & 2', NULL, NULL, NULL, 1, 2, 2, 980, 37, 'video_pembelajaran', 'https://youtu.be/y80BvKKwQwM', 23, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 37 Lesson 1&2.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mengenal React Native Library untuk Javascript\r\n- Mengenal komponen dasar (- View- Text- Image- Text Input- Button) \r\n- Mengenal struktur komponen dan penggunaannya', NULL, 1, '2024-01-16 16:42:23', 1, '2024-01-16 16:42:23', 1),
(982, 'React Native Session 1 Lesson 3', NULL, NULL, NULL, 2, 2, 2, 980, 37, 'video_pembelajaran', 'https://youtu.be/FHFKm3_4KxM', 46, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 37 Lesson 3.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mengenal React Native Library untuk Javascript\r\n- Mengenal komponen dasar (- View- Text- Image- Text Input- Button) \r\n- Mengenal struktur komponen dan penggunaannya\r\n', NULL, 1, '2024-01-16 16:42:23', 1, '2024-01-16 16:42:23', 1),
(983, 'React Native Session 1', NULL, NULL, NULL, 3, 2, 2, 980, 37, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Library yang digunakan\r\n- Komponen yang digunakan\r\n- user interface yang dihasilkan\r\n\r\nStudy Case: Buat Halaman Home Perusahaan', NULL, 1, '2024-01-16 16:42:23', 1, '2024-01-16 16:42:23', 1),
(984, '	\nReact Native Session 2', NULL, NULL, NULL, 38, 1, 2, NULL, 38, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 16:49:55', 1, '2024-01-16 19:33:31', 1);
INSERT INTO `course_module` (`id`, `name`, `slug`, `html`, `js`, `priority`, `level`, `course_id`, `course_module_parent_id`, `day`, `type`, `material`, `duration`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(985, 'React Native Session 2 Lesson 1', NULL, NULL, NULL, 1, 2, 2, 984, 38, 'video_pembelajaran', 'https://youtu.be/USkPynMg9C0', 41, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 38 Lesson 1.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mengenal penggunaan Stack Navigator\r\n- Mengenal cara penggunaan Tab Navigator\r\n', NULL, 1, '2024-01-16 16:49:55', 1, '2024-01-16 16:49:55', 1),
(986, 'React Native Session 2 Lesson 2', NULL, NULL, NULL, 2, 2, 2, 984, 38, 'video_pembelajaran', 'https://youtu.be/8fX1fy5-FeI', 10, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 38 Lesson 2.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mengenal penggunaan Stack Navigator\r\n- Mengenal cara penggunaan Tab Navigator', NULL, 1, '2024-01-16 16:49:55', 1, '2024-01-16 16:49:55', 1),
(987, 'React Native Session 2', NULL, NULL, NULL, 3, 2, 2, 984, 38, 'materi_pembelajaran', 'React_Native.pptx', NULL, 'Materi Pembelajaran React Native', NULL, 1, '2024-01-16 16:49:55', 1, '2024-01-16 16:49:55', 1),
(988, 'React Native Session 2', NULL, NULL, NULL, 4, 2, 2, 984, 38, 'assignment', '', NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- interface aplikasi\r\n- jenis navigator yang digunakan\r\n\r\nStudy Case : Buat aplikasi pengenalan diri atau portofolio', NULL, 1, '2024-01-16 16:49:55', 1, '2024-01-16 16:49:55', 1),
(989, 'React Native Session 3', NULL, NULL, NULL, 39, 1, 2, NULL, 39, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 16:59:55', 1, '2024-01-16 19:33:47', 1),
(990, 'React Native Session 3 Lesson 1', NULL, NULL, NULL, 1, 2, 2, 989, 39, 'video_pembelajaran', 'https://youtu.be/8fX1fy5-FeI', 10, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 39 Lesson 1.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mengenal dan mengelola State pada react native', NULL, 1, '2024-01-16 16:59:55', 1, '2024-01-16 16:59:55', 1),
(991, 'React Native Session 3 Lesson 2', NULL, NULL, NULL, 2, 2, 2, 989, 39, 'video_pembelajaran', 'https://youtu.be/z2b-TDYf3-M', 19, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 39 Lesson 2.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Mengenal dan mengelola State pada react native\r\n- Mengenal fetch API\r\n- Mempelajari cara mengambil data dari API\r\n- Mempelajari cara menampillkan data dari komponen', NULL, 1, '2024-01-16 16:59:55', 1, '2024-01-16 16:59:55', 1),
(992, 'React Native Session 3', NULL, NULL, NULL, 3, 2, 2, 989, 39, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Hasil pembuatan aplikasi kalkulator\r\n- Hasil pengambilan data dari API yang telah disediakan\r\n\r\nTugas : Buat aplikasi kalkulator dan BMI Kalkulator\r\nStudy Case : : Buat aplikasi informasi cuaca dengan api https://weather-api-tau-six.vercel.app/provinces\r\nsilahkan baca dokumentasi nya di https://weather-api-tau-six.vercel.app/api-docs/#/', NULL, 1, '2024-01-16 16:59:55', 1, '2024-01-16 16:59:55', 1),
(993, 'Personal Finance', NULL, NULL, NULL, 40, 1, 2, NULL, 40, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 19:05:38', 1, '2024-01-16 19:05:38', 1),
(994, 'React Native Session 4', NULL, NULL, NULL, 41, 1, 2, NULL, 41, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 19:12:13', 1, '2024-01-16 19:12:13', 1),
(995, 'React Native Session 4', NULL, NULL, NULL, 1, 2, 2, 994, 41, 'video_pembelajaran', 'https://youtu.be/_cotSeo3jUw ', 24, 'Hello Maxians ! 😁\r\n\r\nSelamat datang di Bootcamp Frontend Programming Batch 9 Day 41.\r\n\r\nPada pembelajaran individu, peserta akan mengikuti pembelajaran synchronus, asynchronus, dan praktikum. Pada pertemuan kali ini, peserta akan mengikuti pembelajaran terkait:\r\n\r\n- Implementasi React Native Menjadi Sebuah Aplikasi', NULL, 1, '2024-01-16 19:12:13', 1, '2024-01-16 19:12:13', 1),
(996, 'React Native Session 4', NULL, NULL, NULL, 2, 2, 2, 994, 41, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah selesai nonton video-videonya kan?😄\r\n\r\nSekarang saatnya kalian untuk mengimplementasi ilmu-ilmu yang sudah ditonton sebelumnya, seperti :\r\n- Komponen React yang dibuat\r\n- Cara pengelolaan state\r\n- Pengambilan data API yang digunakan\r\n- User interface yang dihasilkan\r\n\r\nTugas : Membuat Aplikasi Sederhana Proyek Akhir Mentor Time\r\nStudy Case :\r\nTo-Do List App\r\n- Membuat komponen\r\n- Menambahkan navigasi\r\n- Menambahkan pengelolaan state\r\n- Menggunakan API eksternal', NULL, 1, '2024-01-16 19:12:13', 1, '2024-01-16 19:12:13', 1),
(997, '2nd Hackathon Day 1', NULL, NULL, NULL, 42, 1, 2, NULL, 42, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 19:15:12', 1, '2024-01-16 19:15:12', 1),
(998, 'Bukti Record Meeting Kelompok', NULL, NULL, NULL, 1, 2, 2, 997, 42, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki 2nd Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-16 19:15:12', 1, '2024-01-16 19:15:12', 1),
(999, '2nd Hackathon Day 2', NULL, NULL, NULL, 43, 1, 2, NULL, 43, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 19:17:33', 1, '2024-01-16 19:17:33', 1),
(1000, 'Bukti Record Meeting Kelompok', NULL, NULL, NULL, 1, 2, 2, 999, 42, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki 2nd Hackathon Day nih, gimana udah pada persiapan belum sama kelompoknya ? 😄\r\n\r\nTugasnya untuk Hackathon ini yaitu kumpulkan bukti Record Meeting kelompok yang membahas tentang Hackathon.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-16 19:17:33', 1, '2024-01-16 19:17:33', 1),
(1001, '2nd Hackathon Day 3', NULL, NULL, NULL, 44, 1, 2, NULL, 44, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 19:22:51', 1, '2024-01-16 19:22:51', 1),
(1002, 'Bukti Record Meeting Kelompok', NULL, NULL, NULL, 1, 2, 2, 1001, 44, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Demo Day 2nd Hackathon nih, gimana udah pada selesai kan projectnya ? 😄\r\n\r\nTugasnya untuk Demo Day ini yaitu kumpulkan bukti Record Demo Program yang telah dibuat bersama kelompoknya.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-16 19:22:51', 1, '2024-01-16 19:22:51', 1),
(1003, 'Demo Day ', NULL, NULL, NULL, 45, 1, 2, NULL, 45, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-16 19:22:51', 1, '2024-01-16 19:22:51', 1),
(1004, 'Record Demo Program', NULL, NULL, NULL, 1, 2, 2, 1003, 45, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nSudah memasuki Demo Day 2nd Hackathon nih, gimana udah pada selesai kan projectnya ? 😄\r\n\r\nTugasnya untuk Demo Day ini yaitu kumpulkan bukti Record Demo Program yang telah dibuat bersama kelompoknya.\r\n\r\nSertakan link Google Drivenya\r\n\r\nSemangat Maxians ! 😁', NULL, 1, '2024-01-16 19:22:51', 1, '2024-01-16 19:22:51', 1),
(1005, 'Business Model You', NULL, NULL, NULL, 1, 2, 2, 941, 20, 'video_pembelajaran', 'https://youtu.be/Te4hGAts7lY', 22, 'Maxy Talks', NULL, 1, '2024-01-17 08:30:34', 1, '2024-01-17 08:30:34', 1),
(1006, 'Group Affiliation', NULL, NULL, NULL, 1, 2, 2, 950, 25, 'video_pembelajaran', 'https://youtu.be/i8KgAFi07ik', 42, 'Mentor Time', NULL, 1, '2024-01-17 08:30:34', 1, '2024-01-17 08:42:41', 1),
(1007, 'Unlocking Inter-Generational Communication', NULL, NULL, NULL, 1, 2, 2, 976, 35, 'video_pembelajaran', 'https://youtu.be/JSFnb3CYP_k', 35, 'Mentor Time', NULL, 1, '2024-01-17 08:32:50', 1, '2024-01-17 08:42:30', 1),
(1008, 'Speak Up Stand Out', NULL, NULL, NULL, 1, 2, 2, 963, 30, 'video_pembelajaran', 'https://youtu.be/K_GwI4byr-E ', 30, 'Mentor Time', NULL, 1, '2024-01-17 08:38:12', 1, '2024-01-17 08:38:12', 1),
(1009, 'CV and Cover Letter', NULL, NULL, NULL, 1, 1, 3, NULL, 1, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 09:41:43', 1, '2024-01-17 09:41:43', 1),
(1010, 'Tips & Tricks for CV and Cover Letter', NULL, NULL, NULL, 1, 2, 3, 1009, 1, 'materi_pembelajaran', 'Maxy_Resumes  Cover Letter.pdf', NULL, 'Materi CV and Cover Letter', NULL, 1, '2024-01-17 09:41:43', 1, '2024-01-17 09:41:43', 1),
(1011, 'CV and Cover Letter', NULL, NULL, NULL, 2, 2, 3, 1009, 1, 'assignment', NULL, NULL, 'Hello Maxians ! 😁\r\n\r\nGimana, kalian sudah lihat tips&trick membuat CV dan surat lamaran kerja kan?😄\r\n\r\nSekarang saatnya kalian untuk membuat 2 hal tersebut ya, ikuti tips & tricknya.\r\n\r\nJika sudah selesai, mohon untuk mengunggah CV (Curriculum Vitae) dan surat lamaran kerja Anda di kolom yang tersedia di bawah ini.', NULL, 1, '2024-01-17 09:41:43', 1, '2024-01-17 09:41:43', 1),
(1012, 'Intro to UI/UX (How to Figma)', NULL, NULL, NULL, 2, 1, 3, NULL, 2, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 09:52:41', 1, '2024-01-17 09:52:41', 1),
(1013, 'Get Started in Figma', NULL, NULL, NULL, 1, 2, 3, 1012, 2, 'video_pembelajaran', 'https://youtu.be/x6KJNNovCv8', 44, 'Hello Maxians! 😁\r\nSelamat Datang di Hari Ke-2 Bootcamp UI/UX Design Batch 9.\r\n\r\nPada pembelajaran individu, kita akan menjelajahi dunia desain dengan mengikuti pendekatan yang beragam dan menyeluruh. Pembelajaran yang disajikan tidak hanya materi secara langsung, tetapi juga memberikan ruang bagi setiap peserta untuk mengembangkan pemahaman kalian melalui pembelajaran synchronous, asynchronous, dan praktikum. Pada tahap akhir pembelajaran ini, kalian akan mendapatkan kesempatan untuk berkolaborasi dalam tim, berdiskusi dengan mentor, dan mempelajari pengalaman nyata melalui proyek akhir. \r\n\r\nKegiatan pembelajaran yang akan kita lakukan pada hari ini yaitu :\r\n\r\nMembuat Frame\r\n- Membuat Object (Shape dan Text)\r\n- Meng-edit Object (Shape dan Text)\r\n- Mengelompokkan Object (Shape dan Text)\r\n- Semoga kalian dapat mengikuti \r\n\r\npembelajaran hari ini dengan baik. Selamat Belajar!', NULL, 1, '2024-01-17 09:52:41', 1, '2024-01-17 09:52:41', 1),
(1014, 'Create your own CV', NULL, NULL, NULL, 2, 2, 3, 1012, 2, 'assignment', NULL, NULL, 'Create your own CV:\r\n\r\nUntuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui UI/ UX CV yang dihasilkan:\r\n\r\n- Curriculum Vitae dibuat menggunakan Figma\r\n\r\n- Objek-objek yang digunakan tidak monoton\r\n\r\n- Kelengkapan unsur-unsur dalam CV yang dihasilkan terutama sesuai kaedah Harvard Style\r\n\r\nNote: Jika sudah selesai. Masukan link hasil CV anda di jawaban box yang dibawah ini:', NULL, 1, '2024-01-17 09:52:41', 1, '2024-01-17 09:52:41', 1),
(1015, 'Visual hierarchy', NULL, NULL, NULL, 3, 1, 3, NULL, 3, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 09:55:47', 1, '2024-01-17 09:55:47', 1),
(1016, 'Visual hierarchy', NULL, NULL, NULL, 1, 2, 3, 1015, 3, 'assignment', NULL, NULL, 'Meningkatkan Visual Hierarchy pada Laman Web\r\n\r\nPilih satu laman web yang Anda minati. Analisis visual hierarchy yang ada pada laman web tersebut. Identifikasi masalah-masalah yang ada pada visual hierarchy tersebut. Kembangkan solusi untuk masalah-masalah tersebut. Implementasikan solusi Anda pada laman web tersebut.', NULL, 1, '2024-01-17 09:55:47', 1, '2024-01-17 09:55:47', 1),
(1017, 'Analyzing UI/ UX of Famous Brands', NULL, NULL, NULL, 4, 1, 3, NULL, 4, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:07:11', 1, '2024-01-17 10:07:11', 1),
(1018, 'Analyzing UI/ UX of Famous Brands & getting to know Figma Plugin', NULL, NULL, NULL, 1, 2, 3, 1017, 4, 'video_pembelajaran', 'https://youtu.be/yQTgsEGJUEI', 22, 'Hello Maxians! \r\nSelamat datang di Hari Ke-4 Bootcamp UI/UX Design Batch 9.\r\n\r\nKami sangat senang melihat semangat dan komitmen kalian selama perjalanan bootcamp di Maxy Academy.\r\nKegiatan pembelajaran yang akan kita lakukan pada hari ini yaitu :\r\n\r\nPembuatan Competitor Analysis\r\nRapid Design dengan menggunakan plugin-plugin yang disediakan oleh Figma\r\nKami harap kalian dapat mengikuti pembelajaran hari ini dengan baik. Jangan ragu untuk bertanya dan berinteraksi selama proses pembelajaran. Selamat Belajar! 😁', NULL, 1, '2024-01-17 10:07:11', 1, '2024-01-17 10:07:11', 1),
(1019, 'Analyzing UI/UX of famous brands & getting to know Figma Plugin', NULL, NULL, NULL, 2, 2, 3, 1017, 4, 'assignment', NULL, NULL, 'Pilih 2 brand terkenal yang bisa dianalisa untuk UI/UX mereka\r\n\r\nKedalaman dan kelengkapan competitor Analysis yang dihasilkan\r\n\r\nPresent penggunaan Figma Plugin di dalam portfolio', NULL, 1, '2024-01-17 10:07:11', 1, '2024-01-17 10:07:11', 1),
(1020, 'Portofolio day', NULL, NULL, NULL, 5, 1, 3, NULL, 5, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:11:46', 1, '2024-01-17 10:11:46', 1),
(1021, 'Portofolio Day', NULL, NULL, NULL, 1, 2, 3, 1020, 5, 'assignment', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:11:46', 1, '2024-01-17 10:11:46', 1),
(1022, 'Product Thinking', NULL, NULL, NULL, 6, 1, 3, NULL, 6, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:20:15', 1, '2024-01-17 10:22:38', 1),
(1023, 'Product Thinking', NULL, NULL, NULL, 1, 2, 3, 1022, 6, 'materi_pembelajaran', 'Product_Thinking_Maxy_Academy.pdf', NULL, NULL, NULL, 1, '2024-01-17 10:20:15', 1, '2024-01-17 10:22:44', 1),
(1024, 'Product Thinking', NULL, NULL, NULL, 2, 2, 3, 1022, 6, 'assignment', NULL, NULL, 'Meningkatkan Pengalaman Pengguna Aplikasi E-Commerce\r\n\r\n- Pilih satu e- comerce yang paling Anda minati.\r\n- Lakukan riset pengguna untuk memahami kebutuhan dan keinginan pengguna aplikasi e-commerce.\r\n- Analisis data yang Anda kumpulkan dari riset pengguna.\r\n- Kembangkan solusi berdasarkan analisis data.', NULL, 1, '2024-01-17 10:20:15', 1, '2024-01-17 10:20:15', 1),
(1025, 'Animation', NULL, NULL, NULL, 7, 1, 3, NULL, 7, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:26:29', 1, '2024-01-17 10:26:29', 1),
(1026, 'Web Animation', NULL, NULL, NULL, 1, 2, 3, 1025, 7, 'video_pembelajaran', 'https://www.youtube.com/watch?v=2mZJVkQ_OWQ ', 48, 'Hello Maxians! \r\nSelamat datang di Hari Ke-7 Bootcamp UI/UX Design Batch 9.\r\n\r\nKami sangat senang melihat semangat dan komitmen kalian selama perjalanan bootcamp di Maxy Academy.\r\nKegiatan pembelajaran yang akan kita lakukan pada hari ini yaitu :\r\n\r\nMemahami kebutuhan animasi pada website\r\nImplementasi animasi pada elemen di figma\r\nKami harap kalian dapat mengikuti pembelajaran hari ini dengan baik. Jangan ragu untuk bertanya dan berinteraksi selama proses pembelajaran. Selamat Belajar! 😁', NULL, 1, '2024-01-17 10:26:29', 1, '2024-01-17 10:26:29', 1),
(1027, 'Web Animation', NULL, NULL, NULL, 2, 2, 3, 1025, 7, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui analisis yang dihasilkan: - Penggunaan animasi - Penggunaan animasi sesuai konsep website\r\n\r\nStudy Case : Buatlah sebuah carousel yang berisi sebuah produk. Saat produk lainnya diklik akan meng-highlight produk yang ditekan dan mengganti warna serta elemen dalam carousel. Contoh carouselnya seperti source dan buat sesuai imajinasi dan ide kreatif masing-masing. \r\n\r\nSource : https://www.youtube.com/shorts/xg7UMrx3yaw ', NULL, 1, '2024-01-17 10:26:29', 1, '2024-01-17 10:26:29', 1),
(1028, 'Userflow Using Figjam', NULL, NULL, NULL, 8, 1, 3, NULL, 8, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:31:25', 1, '2024-01-17 10:31:25', 1),
(1029, 'Userflow Using Figjam', NULL, NULL, NULL, 1, 2, 3, 1028, 8, 'video_pembelajaran', 'https://www.youtube.com/watch?v=OUS0iiqKhFg', 63, 'Hello Maxians! \r\nSelamat datang di Hari Ke-8 Bootcamp UI/UX Design Batch 9.\r\n\r\nKami sangat senang melihat semangat dan komitmen kalian selama perjalanan bootcamp di Maxy Academy.\r\nKegiatan pembelajaran yang akan kita lakukan pada hari ini yaitu :\r\n\r\nPembuatan Pembuatan userflow diagram\r\nPenggunaan Figjjam\r\nElemen desain seperti Shape, Color, Icon, Text\r\nKami harap kalian dapat mengikuti pembelajaran hari ini dengan baik. Jangan ragu untuk bertanya dan berinteraksi selama proses pembelajaran. Selamat Belajar! 😁', NULL, 1, '2024-01-17 10:31:25', 1, '2024-01-17 10:31:25', 1),
(1030, 'Userflow Using Figjam', NULL, NULL, NULL, 2, 2, 3, 1028, 8, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui analisis yang dihasilkan:\r\n\r\n- Penggunaan diagram\r\n- Penggunaan elemen desain\r\n\r\nBuatlah user flow untuk pemesanan barang online (contoh Shopee, Tokopedia, dll) dari user mendaftarkan akun, proses pemesanan barang, diskon barang dan penggunaan voucher, pembayaran, pengembalian barang, sampai ulasan.', NULL, 1, '2024-01-17 10:31:25', 1, '2024-01-17 10:31:25', 1),
(1031, 'Wireframe 101', NULL, NULL, NULL, 9, 1, 3, NULL, 9, 'parent', NULL, NULL, NULL, NULL, 1, '2024-01-17 10:36:31', 1, '2024-01-17 10:36:31', 1),
(1032, 'Wireframe 101', NULL, NULL, NULL, 1, 2, 3, 1031, 9, 'video_pembelajaran', 'https://youtu.be/zGMQIdMtOAQ', 51, 'Hello Maxians! 😁\r\nSelamat datang di Hari Ke-9 Bootcamp UI/UX Design Batch 9.\r\n\r\nKegiatan pembelajaran yang akan kita lakukan pada hari ini yaitu :\r\n\r\n- Membuat kerangka atau blueprint dari sebuah website\r\n- Membuat section untuk setiap fitur yang sudah ditentukan\r\n\r\nSemoga kalian dapat mengikuti pembelajaran hari ini dengan baik. Selamat Belajar!', NULL, 1, '2024-01-17 10:36:31', 1, '2024-01-17 10:36:31', 1),
(1033, 'Wireframe 101', NULL, NULL, NULL, 2, 2, 3, 1031, 9, 'assignment', NULL, NULL, 'Untuk pembelajaran individu, hackathon, dan proyek akhir, penilaian dilakukan melalui design yang dihasilkan:\r\n\r\n- Konsistensi design wireframe yang dihasilkan\r\n\r\n- Penggunaan font dan element yang sesuai dengan konsep produk dan kebutuhan client', NULL, 1, '2024-01-17 10:36:31', 1, '2024-01-17 10:36:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_module_discussion`
--

CREATE TABLE `course_module_discussion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_module_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_package`
--

CREATE TABLE `course_package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fake_price` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `payment_link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_package`
--

INSERT INTO `course_package` (`id`, `name`, `fake_price`, `price`, `payment_link`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Paket 1', NULL, 2000000, NULL, '', 0, '2022-09-26 11:02:01', 1, '2024-01-12 13:40:06', 1),
(2, 'Bootcamp Only', 0, 5000000, 'https://invoice-staging.xendit.co/od/bcp01-new', '', 1, '2022-09-26 11:02:35', 1, '2024-01-12 14:28:05', 1),
(3, 'Bootcamp + Internship', NULL, 9000000, 'https://invoice.xendit.co/od/bcp-p02', '', 1, '2022-09-26 11:03:22', 1, '2024-01-12 14:27:57', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_package_benefit`
--

CREATE TABLE `course_package_benefit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_package_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_package_benefit`
--

INSERT INTO `course_package_benefit` (`id`, `name`, `course_package_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(8, 'Lebih dari 60 sesi pembelajaran total (pembelajaran mandiri dan langsung)', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:08:32', 1),
(9, 'Sesi karir dan softskill yang intensif', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:08:53', 1),
(10, 'Akses belajar tanpa batas', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:09:07', 1),
(11, '4 Proyek nyata untuk portofolio Anda', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:09:23', 1),
(12, '\nPenilaian Profiler Karir', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:09:54', 1),
(13, 'Service Job-Connector seumur hidup', 3, '', 1, '2022-09-26 11:03:22', 1, '2023-08-28 15:10:55', 1),
(14, 'Lebih dari 60 sesi pembelajaran total (pembelajaran mandiri dan langsung)', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-09-06 16:53:49', 1),
(15, 'Sesi karir dan softskill yang intensif', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-09-06 16:53:49', 1),
(16, 'Akses belajar tanpa batas', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-09-06 16:53:49', 1),
(17, '4 Proyek nyata untuk portofolio Anda', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:45', 1),
(18, '\nPenilaian Profiler Karir', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-08-28 15:11:55', 1),
(19, 'Service Job-Connector seumur hidup', 1, '', 0, '2022-09-26 14:04:26', 1, '2023-08-28 15:12:06', 1),
(20, 'Lebih dari 60 sesi pembelajaran total (pembelajaran mandiri dan langsung)', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-11-24 11:23:25', 1),
(21, 'Sesi karir dan softskill yang intensif', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:33', 1),
(22, 'Akses belajar tanpa batas', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:42', 1),
(23, '4 Proyek nyata untuk portofolio Anda', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-08-28 15:12:50', 1),
(24, '\nPenilaian Profiler Karir', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-09-19 09:54:20', 1),
(25, 'Service Job-Connector seumur hidup', 2, '', 1, '2022-09-26 14:04:51', 1, '2023-09-19 09:54:23', 1),
(26, 'Mentoring Session Private (1-on-1)\r\n', 3, NULL, 1, '2023-09-20 10:24:21', 1, '2023-09-20 10:24:21', 1),
(27, 'Prioritas disalurkan magang', 3, NULL, 1, '2023-09-20 10:24:21', 1, '2023-09-20 10:24:21', 1),
(28, 'Mentoring Session Private (1-on-1)\r\n', 2, NULL, 1, '2023-09-20 10:25:29', 1, '2023-09-20 10:25:29', 1),
(29, 'Prioritas disalurkan magang', 2, NULL, 1, '2023-09-20 10:25:29', 1, '2023-09-20 10:25:29', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_partner`
--

CREATE TABLE `course_partner` (
  `course_id` int(11) NOT NULL,
  `m_partner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_tutor`
--

CREATE TABLE `course_tutor` (
  `course_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_tutor`
--

INSERT INTO `course_tutor` (`course_id`, `users_id`) VALUES
(1, 20),
(1, 20),
(3, 15),
(3, 15),
(3, 21),
(3, 21),
(14, 16),
(14, 16),
(18, 17),
(18, 17),
(19, 14),
(19, 14),
(19, 18),
(19, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `maxy_talk`
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
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_bank`
--

CREATE TABLE `m_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_bank`
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
-- Struktur dari tabel `m_bank_account`
--

CREATE TABLE `m_bank_account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `m_bank_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_bank_soal`
--

CREATE TABLE `m_bank_soal` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `pilihan` varchar(2550) DEFAULT NULL,
  `kunci_jawaban` varchar(255) DEFAULT NULL,
  `img_soal` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_bank_soal`
--

INSERT INTO `m_bank_soal` (`id`, `nama`, `pilihan`, `kunci_jawaban`, `img_soal`, `type`, `paket`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(61, 'Pernyataan yang mana yang benar dalam cerita berikut:\n\"Sebagai user, saya ingin dapat login ke Facebook supaya saya dapat berbagi macam-macam kejadian ke teman-teman saya dan dapat mengakses profil saya di seluruh perangkat saya\"', 'cerita dapat diterima, karena memiliki jenis user, tugas yang perlu dilakukan, dan target yang perlu dicapai;;cerita terlalu luas dan perlu dipecah ke cerita-cerita yang lebih kecil;;cerita harus menyatakan perangkan apa yang akan digunakan;;cerita tidak perlu menyebutkan target kedua', 'cerita dapat diterima, karena memiliki jenis user, tugas yang perlu dilakukan, dan target yang perlu dicapai', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(62, 'Shortcut untuk menggeser Canvas secara besar menggunakan keyboard?', 'Shift + P + anak panah;;P + anak panah;;Shift + Z + anak panah;;Z + anak panah', 'Shift + Z + anak panah', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(63, 'Apa itu \'vector editing\' dalam Figma?', 'a) Mengedit teks pada desain;;b) Mengubah ukuran gambar dengan bebas tanpa kehilangan kualitas;;c) Memotong bagian yang tidak diinginkan dari gambar;;d) Mengaplikasikan filter dan efek pada gambar', 'b) Mengubah ukuran gambar dengan bebas tanpa kehilangan kualitas', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(64, 'Apa perbedaan mengubah ukuran suatu frame dan suatu grup?', 'grup : ikatan berubah ukuran secara independen dari anak-anak grup\nframe : anak objek akan berubah berskala secara proporsional;;grup : anak objek mengikuti pembatas yang sudah ditetapkan\nframe : ikatan berubah ukuran secara independen dari anak-anak frame;;grup : anak objek akan berubah berskala secara proporsional\nframe : anak objek mengikuti pembatas yang sudah ditetapkan;;tidak ada perbedaan substansial pada keduanya', 'grup : anak objek akan berubah berskala secara proporsional\nframe : anak objek mengikuti pembatas yang sudah ditetapkan', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(65, 'Bagaimana cara menggabungkan objek dalam Figma?', 'a) Menggunakan fitur \'Merge\' untuk menggabungkan objek secara visual;;b) Mengelompokkan objek dan menggunakan fitur \'Union\' untuk menggabungkannya;;c) Menggunakan fitur \'Export\' untuk menggabungkan objek menjadi satu file;;d) Tidak mungkin menggabungkan objek dalam Figma', 'b) Mengelompokkan objek dan menggunakan fitur \'Union\' untuk menggabungkannya', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(66, 'Apa yang dimaksud desain pengalaman pengguna?', 'Pendekatan untuk mendesain sistem agar pengguna dapat beli barang secara online dengan aman;;Istilah modern untuk desain web dan desain grafik;;Aturan yang meliputi seluruh interaksi dan event, secara fisik maupun digital, antara pengguna/pelanggan dengan suatu produk, layanan, atau organisasi;;Serangkaian teknik yang diselesaikan di awal mulai suatu projek', 'Aturan yang meliputi seluruh interaksi dan event, secara fisik maupun digital, antara pengguna/pelanggan dengan suatu produk, layanan, atau organisasi', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(67, 'berikut ini adalah kerugian jika pengalaman pengguna pada suatu produk kurang bagus, kecuali…', 'memudahkan pengguna;;menghasilkan tampilan pengguna yang bagus;;menarik minat pengguna;;kalah dalam persaingan produk', 'kalah dalam persaingan produk', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(68, 'salah satu karakteristik tampilan pengguna adalah desain yang responsif, artinya…', 'desain jelas dan ringkas serta tidak berantakan;;penuh dengan informasi yang tidak tumpang tindih;;pengunjung dapat mengakses website di berbagai perangkat;;tampilan website mudah dipahami', 'pengunjung dapat mengakses website di berbagai perangkat', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(69, 'Apa itu \'stakeholder\' dalam wireframing?', 'a) Pihak-pihak yang terlibat dalam proses pembuatan wireframe;;b) Efek transisi animasi antara elemen desain pada wireframe;;c) Tampilan visual akhir dari wireframe;;d) Tidak ada hubungannya dengan wireframing', 'a) Pihak-pihak yang terbat dalam proses pembuatan wireframe', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(70, 'Apa yang dimaksud dengan \'high-fidelity\' wireframe?', 'a) Wireframe dengan tampilan visual yang lengkap dan detail;;b) Wireframe dengan sketsa kasar tanpa detail visual yang rinci;;c) Wireframe dengan efek transisi dan animasi yang kompleks;;d) Tidak ada perbedaan antara \'low-fidelity\' dan \'high-fidelity\' wireframe', 'a) Wireframe dengan tampilan visual yang lengkap dan detail', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(71, 'Apa yang anda lakukan ketika terdapat konflik antara kebutuhan bisnis dengan kebutuhan pengguna?', 'Mencoba mencari bukti yang terdukung oleh hasil riset untuk mendukung suatu penyelesaian dengan memperhatikan konfilk dalam aktivitas user-centered design;;Semua benar;;Memastikan client terlibat dalam aktivitas user-centered design untuk memahami sepenuhnya dan menghargai kebutuhan pengguna;;Tergantung dengan dampak pada pengguna akhir, terkadang perlu fleksibel dan menentukan kapan harus mementingkan kebutuhan bisnis diatas kebutuhan pengguna', 'Semua benar', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:13', NULL, '2023-09-15 14:12:13', NULL),
(72, 'Pengguna dapat mencari dan menyimpan plugins pada menu…', 'pencarian;;draft;;komunitas;;profil', 'komunitas', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(73, 'Properti mana yang tidak termasuk sebagai gaya teks?', 'warna teks;;tinggi baris;;fitur Open Type;;penjarakkan paragraf', 'fitur Open Type', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(74, 'Bagaimana aktivitas dan aturan lain dapat diuntungkan oleh pengetahuan pengalaman pengguna?', 'pengalaman pengguna memastikan seluruh produk dan layanan terlihat sama sehingga orang-orang mengerti cara menggunakannya;;pengalaman pengguna adalah pendekatan yang sangat mudah yang memastikan tingkat kesuksesan 100%;;tidak bisa. pengalaman pengguna tidak menawarkan keuntungan apapun pada aturan/aktivitas lain;;pengetahuan pengalaman pengguna dapat meningkatkan hasil dan perkembangan seluruh produk dan layanan yang menghadapi dengan pengguna/pelanggan', 'pengetahuan pengalaman pengguna dapat meningkatkan hasil dan perkembangan seluruh produk dan layanan yang menghadapi dengan pengguna/pelanggan', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(75, 'setelah melakukan riset, tahap selanjutnya untuk membangun pengalaman pengguna adalah', 'pengembangan;;desain tampilan pengguna;;analisa;;evaluasi', 'analisa', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(76, 'cara kerja pengalaman pengguna untuk mendapatkan produk berkualitas adalah', 'analisa - riset - membangun desain pengalaman pengguna - pengembangan - evaluasi;;riset - analisa - membangun desain pengalaman pengguna - evaluasi - pengembangan;;riset - analisa - membangun desain pengalaman pengguna - pengembangan - evaluasi;;analisa - riset - membangun desain pengalaman pengguna - evaluasi - pengembangan', 'riset - analisa - membangun desain pengalaman pengguna - pengembangan - evaluasi', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(77, 'salah satu cara untuk membuat tampilan pengguna dengan informasi yang terstruktur adalah dengan..', 'memilih jenis dan warna font yang senada;;memilih ukuran font yang sama untuk seluruh karakter;;memilih jenis dan warna font yang sama untuk seluruh karakter;;memasukkan banyak elemen baik yang penting atau tidak', 'memilih jenis dan warna font yang senada', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(78, 'Format warna apa yang tidak didukung oleh Figma?', 'CMYK;;CSS Keywords;;Hex;;RGB', 'CMYK', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(79, 'informasi apa yang diperlukan dalam riset untuk membangun pengalaman pengguna…', 'kebutuhan pengguna dan produk yang membuat pengguna puas;;kebutuhan pengembang dalam menggunakan aplikasi;;aplikasi yang bagus;;aplikasi yang menarik', 'kebutuhan pengguna dan produk yang membuat pengguna puas', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(80, 'Apa yang dimaksud dengan desain yang berfokus pada pengguna (user-centered design)?', 'teknik dimana pengguna yang bertanggungjawab untuk mendesain website/sistem;;cara bebasis riset untuk mengumpulkan persyaratan pengguna untuk suatu website/sitem;;serangkaian teknik yang harus diikuti untuk memastikan website/sistem dapat digunakan;;cara yang fleksibel yang juga mengikutsertakan riset, desain, dan evaluasi teknik untuk memastikan sebuah website/sistem yang ramah pengguna', 'cara yang fleksibel yang juga mengikutsertakan riset, desain, dan evaluasi teknik untuk memastikan sebuah website/sistem yang ramah pengguna', NULL, 'test', 'A', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:12:14', NULL, '2023-09-15 14:12:14', NULL),
(81, 'Anda memiliki 4 placeholder dan ingin upload 4 gambar secara bersamaan menggunakan bulk image upload. Gambar-gambar tersebut akan muncul dalam urutan seperti apa?', 'sesuai urutan pemilihan : gambar pertama yang dipilih akan menjadi gambar pertama yang muncul;;sesuai urutan alfabet;;berkebalikan dengan urutan pemilihan : gambar pertama yang dipilih akan menjadi gambar terakhir yang muncul;;sesuai urutan tanggal pembuatan', 'sesuai urutan pemilihan : gambar pertama yang dipilih akan menjadi gambar pertama yang muncul', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(82, 'Berapa px pergeseran kecil dan besar secara default?', '1px dan 10px;;10px dan 20px;;2px dan 8px;;16px dan 32px', '1px dan 10px', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(83, 'Apa fungsi \'libraries\' dalam Figma?', 'a) Menyimpan file desain secara offline;;b) Mengelompokkan proyek-proyek yang terkait secara terorganisir;;c) Memiliki akses ke komponen dan gaya yang dapat digunakan ulang;;d) Membagikan desain kepada orang lain melalui tautan', 'c) Memiliki akses ke komponen dan gaya yang dapat digunakan ulang', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(84, 'Kondisi apa yang tidak direkomendasikan menggunakan grup dalam Figma?', 'ketika menginginkan kebiasaan nested scrolling pada prototipe;;ketika ingin menggabungkan beberapa objek menjadi 1 layer yang dapat dikendalikan/diatur;;ketika ingin pengikat grup otomatis beradaptasi ke anak objek saat dimanipulasi/diubah;;ketika ingin beberapa objek mempertahankan hubungan yang tetap (fixed) ketika diubah berskala', 'ketika ingin beberapa objek mempertahankan hubungan yang tetap (fixed) ketika diubah berskala', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(85, 'Bagaimana cara mengatur \'component\' dalam Figma?', 'a) Menggunakan alat pemodelan 3D;;b) Menggunakan fitur drag-and-drop;;c) Mengelompokkan elemen desain dan membuatnya reusable;;d) Menggunakan efek transisi antara halaman desain', 'c) Mengelompokkan elemen desain dan membuatnya reusable', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(86, 'Apa itu Figma?', 'a) Sebuah jenis alat pemodelan 3D;;b) Sebuah platform kolaborasi desain grafis;;c) Sebuah aplikasi pengedit foto;;d) Sebuah bahasa pemrograman', 'b) Sebuah platform kolaborasi desain grafis', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(87, 'Salah satu fungsi produk dengan pengalaman pengguna yang baik adalah', 'mendapatkan informasi pengguna;;mempercepat kerja suatu aplikasi;;meningkatkan persaingan;;memudahkan pengguna mencapai tujuan', 'memudahkan pengguna mencapai tujuan', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(88, 'Apa yang dimaksud dengan desain informasi?', 'bagaimana suatu konten website terstruktur, terlabel, terkelompokkan, dan terelasi pada konten lainnya di satu website tersebut;;cara paragraf-paragraf dirangkai untuk membentuk suatu web page;;cara kalimat-kalimat dirangkai untuk membentuk paragraf yang berarti dalam suatu webpage;;istilah lain untuk penulisan konten di website', 'bagaimana suatu konten website terstruktur, terlabel, terkelompokkan, dan terelasi pada konten lainnya di satu website tersebut', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(89, 'Apa itu \'wireflow\' dalam wireframing dengan Figma?', 'a) Kombinasi antara wireframe dan flowchart;;b) Alur kerja desainer dalam membuat wireframe;;c) Gaya tipografi yang umum digunakan dalam wireframe;;d) Tidak ada hubungannya dengan wireframing', 'a) Kombinasi antara wireframe dan flowchart', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(90, 'Bagaimana wireframe dapat membantu dalam proses desain antarmuka yang efektif?', 'a) Mempercepat waktu produksi desain akhir;;b) Mengidentifikasi kebutuhan dan tata letak antarmuka;;c) Memberikan tampilan visual yang menarik pada desain;;d) Tidak ada manfaat yang diberikan oleh wireframe pada proses desain antarmuka', 'b) Mengidentifikasi kebutuhan dan tata letak antarmuka', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(91, 'On Tap pada prototipe figma sama fungsinya dengan…', '*On Drag*;;While Pressing;;*Navigate To*;;On Click', 'On Click', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(92, 'Frame, shape, dan text dapat dibuat melalui menu…', 'options;;canvas;;menu;;tools', 'tools', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:38', NULL, '2023-09-15 14:16:38', NULL),
(93, 'Shortcut Shift + V dan Shift + H pada Figma jika digunakan pada gambar maka…', 'memutar objek secara horizontal dan vertikal;;melakukan pengaturan ulang ukuran pada objek (shift + v semakin besar, shift + h semakin kecil);;memutar objek 90-360 derajat;;menyalin dan menempelkan objek', 'memutar objek secara horizontal dan vertikal', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(94, 'Agar desain website terlihat tidak terlalu panjang dan berantakan maka suatu desain harus memiliki salah satu karakteristik tampilan pengguna yaitu..', 'jelas dan ringkas;;intuitif;;responsif;;impulsif', 'jelas dan ringkas', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(95, 'Salah satu langkah yang dilakukan oleh pengembang suatu aplikasi untuk memenangkan persaingan adalah', 'memperbarui aplikasi;;membuat banyak tampilan pada aplikasi;;menampilkan kebutuhan;;membuat banyak menu pada aplikasi', 'memperbarui aplikasi', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(96, 'Apa yang membuat praktisi pengalaman pengguna yang baik?', 'orang yang telah mempelajari teknologi informasi dalam perkuliahan dan memahami website;;orang yang memiliki latar belakang dalam industri / desain grafik;;orang dengan pemikiran terbuka yang memahami pentingnya desain untuk pengguna akhir (end user);;orang yang memahami bagaimana pengguna menggunakan internet dan mengetahui cara membangun suatu webpage', 'orang dengan pemikiran terbuka yang memahami pentingnya desain untuk pengguna akhir (end user)', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(97, 'Menu pada halaman utama Figma yang memudahkan pengguna untuk berinteraksi dengan pengguna lainya adalah', 'pencarian;;komunitas;;profil;;draft', 'komunitas', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(98, 'Yang mana di bawah ini yang termasuk komponen pengalaman pengguna secara general?', 'nada dan suara;;keinteraktifan;;semua benar;;branding', 'semua benar', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(99, 'Yang mana di bawah ini yang bukan merupakan tipe persona yang umum?', 'pengguna utama;;pengguna secondary;;pendesain;;pembeli/influencer', 'pendesain', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(100, 'Dibawah ini merupakan kerugian yang akan muncul apabila tampilan suatu website jual beli online berantakan, kecuali', 'pembeli tidak tertarik pada produk;;pembeli menikmati karya desain website;;pembeli bingung memilih produk;;pembeli tidak tertarik untuk membeli produk', 'pembeli menikmati karya desain website', NULL, 'test', 'B', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:16:39', NULL, '2023-09-15 14:16:39', NULL),
(101, 'Tampilan pengguna dan pengalaman pengguna adalah 2 hal yang tidak dapat dipisahkan, tampilan pengguna bertanggungjawab pada', 'kepuasan pengguna;;kebutuhan pengguna;;fungsi produk;;tampilan produk', 'tampilan produk', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:09', NULL, '2023-09-15 14:19:09', NULL),
(102, 'Ketika import file kerangka, apa yang tidak dapat dikonversi oleh Figma secara otomatis?', 'halaman;;simbol;;gaya (style);;font lokal', 'gaya (style)', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:09', NULL, '2023-09-15 14:19:09', NULL),
(103, 'Apa itu \'team library\' dalam Figma?', 'a) Tempat penyimpanan file desain yang hanya dapat diakses oleh tim tertentu;;b) Mode kerja khusus yang memungkinkan tim berkolaborasi secara real-time;;c) Fitur untuk menggabungkan beberapa tim dalam satu proyek desain;;d) Kumpulan komponen dan gaya desain yang dibagikan kepada tim', 'd) Kumpulan komponen dan gaya desain yang dibagikan kepada tim', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(104, 'Bagaimana breadcrumbs digunakan?', 'muncul setelah suatu aksi yang signifikan dijalankan;;secara periodik saat diinginkan;;sebagai cara untuk menavigasi secara cepat ke bagian setelah/sebelum dari suatu site;;bertindak seperti tooltips dan mengandung informasi tambahan;;di dalam footer suatu website, didekat tentang kami (about us) dan kontak (contact)', 'sebagai cara untuk menavigasi secara cepat ke bagian setelah/sebelum dari suatu site', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(105, 'Bagaimana cara mengunduh desain dari Figma?', 'a) Mengklik tombol \'Download\' pada antarmuka Figma;;b) Menggunakan fitur \'Export\' untuk mengonversi desain ke format lain;;c) Mengirimkan desain melalui email kepada diri sendiri;;d) Tidak mungkin mengunduh desain dari Figma', 'b) Menggunakan fitur \'Export\' untuk mengonversi desain ke format lain', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(106, 'Pengalaman pengguna saat memakai atau berinteraksi menggunakan sebuah produk digital adalah pengertian dari…', 'pengalaman penguna;;desain pengalaman pengguna;;tampilan pengguna;;desain tampilan pengguna', 'pengalaman penguna', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(107, 'Dibawah ini yang bukan merupakan karakteristik tampilan pengguna yang baik adalah', 'konsisten;;intuitif;;terstruktur;;impulsif', 'impulsif', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(108, 'Dalam membangun pengalaman pengguna, riset adalah hal yang penting, karena dengan melakukan riset…', 'pengguna merasa puas;;memperbanyak pengguna;;didapatkan informasi yang dibutuhkan untuk membuat user puas;;pengguna terlayani dengan baik', 'didapatkan informasi yang dibutuhkan untuk membuat user puas', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(109, 'Apa yang dimaksud dengan \'low-fidelity\' wireframe?', 'a) Wireframe dengan tampilan visual yang lengkap dan detail;;b) Wireframe dengan sketsa kasar tanpa detail visual yang rinci;;c) Wireframe dengan efek transisi dan animasi yang kompleks;;d) Tidak ada perbedaan antara \'low-fidelity\' dan \'high-fidelity\' wireframe', 'b) Wireframe dengan sketsa kasar tanpa detail visual yang rinci', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(110, 'Bagaimana cara mendapatkan umpan balik dari stakeholder pada wireframe yang dibuat dengan Figma?', 'a) Menggunakan fitur komentar dan kolaborasi berbasis cloud di Figma;;b) Mengimpor wireframe ke alat lain yang mendukung komentar;;c) Mengirimkan wireframe melalui email dan meminta umpan balik;;d) Tidak mungkin mendapatkan umpan balik dari stakeholder pada wireframe di Figma', 'a) Menggunakan fitur komentar dan kolaborasi berbasis cloud di Figma', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(111, 'Berikut merupakan fitur yang ada di Figma, kecuali', 'fitur desain;;fitur prototipe;;fitur kolaborasi;;fitur conference', 'fitur conference', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(112, 'Menu yang digunakan untuk melakukan \'explore plugin\' atau mencari template dari para desainer di Figma adalah', 'pencarian;;komunitas;;plugin;;draft', 'komunitas', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:10', NULL, '2023-09-15 14:19:10', NULL),
(113, 'Apa yang kemungkinan \'typeface\' yang tidak dapat diterima untuk salinan \'body\'?', 'Impact;;Helvetica;;Verdana;;Georgia', 'Impact', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(114, 'Apa yang dimaksud dengan \'faceted search\'?', 'pencarian yang memunculkan hasil yang dipersonalisasi berdasarkan sejarah browsing pengguna;;cara untuk mencari dengan gaya yang linier;;cara pencarian yang memperbolehkan penguna untuk memberi filter supaya hasilnya lebih spesifik;;teknik mencari menggunakan kata kunci', 'cara pencarian yang memperbolehkan penguna untuk memberi filter supaya hasilnya lebih spesifik', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(115, 'Aksi \'Navigate To\' pada interaksi prototipe Figma digunakan untuk…', 'menampilkan frame lain diatas frame yang sedang ditampilkan;;memindah satu frame ke frame lainnya;;melakukan scroll secara otomatis pada satu frame saja;;mengganti satu frame dengan yang lain', 'memindah satu frame ke frame lainnya', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(116, 'Apa yang cenderung terjadi ketika pengguna lebih terfokus ke suatu bagian konten secara spesifik?', 'Pembayangan saat orang lain melihat konten tersebut;;Konten berbeda secara visual dibandingkan sekitarnya;;Konten terletak di bagian paling atas halaman;;Semua benar', 'Semua benar', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(117, 'Pengalaman pengguna bertanggungjawab pada', 'kepuasan pengguna;;pengelolaan visualisasi website;;tampilan produk;;fungsi produk', 'kepuasan pengguna', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(118, 'Menu prototipe yang terdapat pada \'inspector\' digunakan untuk…', 'membuat desain;;melihat kode dari tampilan pengguna yang telah dibuat;;menambahkan interaksi;;tidak ada menu prototipe', 'menambahkan interaksi', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(119, 'Dua hal yang perlu disiapkan dalam memulai membangun desain pengalaman pengguna yaitu', 'riset dan analisa;;analisa dan wireframe;;riset dan prototipe;;prototipe dan wariframe', 'prototipe dan wariframe', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(120, 'Bagaimana fokus terhadap pengalaman pengguna berubah dari tahun ke tahun?', 'tidak berubah sama sekali;;kurang mengenai pengguna, lebih ke apa yang bisnis inginkan;;telah mengerucut secara spesifik mengenai internet;;telah melebar mengenai hal-hal fisik dan digital yang berinteraksi dengan orang', 'telah melebar mengenai hal-hal fisik dan digital yang berinteraksi dengan orang', NULL, 'test', 'C', 'course : Desain UI/UX website Tingkat Dasar', 1, '2023-09-15 14:19:11', NULL, '2023-09-15 14:19:11', NULL),
(121, 'Apa yang dimaksud pengalaman pengguna?', 'seberapa bagus sebuah produk/sistem beroperasi didalam suatu browser desktop atau perangkat seluler;;Jumlah fitur yang dimiliki sebuah produk/sistem;;Cara sebuah produk/sistem bekerja dalam level teknis;;Pandangan seseorang dan pengalaman secara keseluruhan dalam kegunaan dan kemudahan penggunaan suatu produk/sistem', 'Pandangan seseorang dan pengalaman secara keseluruhan dalam kegunaan dan kemudahan penggunaan suatu produk/sistem', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:38:12', NULL, '2023-09-18 09:38:12', NULL),
(122, 'Pesan error yang mana yang lebih baik untuk pengguna manusia?', 'Numeric values not allowed in database column!;;Text strings should not contain Numeric values!;;Oops looks like you tried to enter a number in your name. Please use letters only!;;Character 3 at position 7 is not allowed!', 'Text strings should not contain Numeric values!', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:38:12', NULL, '2023-09-18 09:38:12', NULL),
(123, 'Apa yang dimaksud dengan usability?', 'seberapa efisien sebuah tampilan berbicara ke perangkat keras dan perangkat-perangkat yang membantu menjalankan sebuah website;;teknik untuk memastikan website akan disukai oleh end-user;;berhubungan dengan seberapa mudah, efisien, dan puas sebuah produk digunakan oleh seseorang untuk mencapai tujuan mereka dengan konteks penggunaan yang spesifik;;seberapa cepat seorang pengguna dapat menggunakan website untuk melakukan tugasnya', 'berhubungan dengan seberapa mudah, efisien, dan puas sebuah produk digunakan oleh seseorang untuk mencapai tujuan mereka dengan konteks penggunaan yang spesifik', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:38:12', NULL, '2023-09-18 09:38:12', NULL),
(124, 'Tujuan utama dari pengalaman pengguna adalah:', 'meningkatkan penghasilan dari suatu website;;membuat website menjadi agnostik;;membantu user mencapai tujuan dengan mudah tanpa ada rasa frustasi;;membantu pengguna dengan disabilitas dalam menggunakan website', 'membantu user mencapai tujuan dengan mudah tanpa ada rasa frustasi', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:38:12', NULL, '2023-09-18 09:38:12', NULL),
(125, 'Apa perbedaan sorting dan filtering?', 'sorting: mengatur ulang urutan konten, filtering: menyelesaikan query pengguna secara otomatis;;sorting: secara alfabet, filtering: secara numerik;;sorting: menampilkan/menyembunyikan konten berdasarkan pemilihan pengguna, filtering: mengatur ulang urutan konten;;sorting: mengatur ulang urutan konten, filtering: menampilkan/menyembunyikan konten berdasarkan pemilihan pengguna', 'sorting: mengatur ulang urutan konten, filtering: menampilkan/menyembunyikan konten berdasarkan pemilihan pengguna', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:38:13', NULL, '2023-09-18 09:38:13', NULL),
(126, 'Apakah dapat memasukkan GIF ke prototipe?', 'Ya, namun hanya berputar di editor;;Ya, namun hanya berputar di mode presentasi;;Tidak, figma tidak mendukung animasi GIF;;Ya, dapat berputar di editor dan mode presentasi', 'Ya, dapat berputar di editor dan mode presentasi', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:55:22', NULL, '2023-09-18 09:55:22', NULL),
(127, 'Tombol apa yang dapat digunakan untuk menggeser elemen lebih besar?', 'z;;spasi;;ctrl;;shift', 'shift', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:55:22', NULL, '2023-09-18 09:55:22', NULL),
(128, 'Berapa banyak tata letak grid yang dapat ditambahkan ke dalam sebuah frame?', 'tidak terbatas;;1;;256;;3', 'tidak terbatas', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:55:22', NULL, '2023-09-18 09:55:22', NULL),
(129, 'Apa shortcut untuk mengakses quick action bar?', 'Alt / atau Alt P;;Ctrl / atau Ctrl P;;Alt  atau Alt /;;Ctrl  atau Ctrl /', 'Ctrl / atau Ctrl P', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:55:23', NULL, '2023-09-18 09:55:23', NULL),
(130, 'Apa shortcut untuk membuat hyperlink?', 'Ctrl L;;Shift K;;Ctrl K;;Shift I', 'Ctrl K', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:55:23', NULL, '2023-09-18 09:55:23', NULL),
(131, 'Figma memfasilitasi kolaborasi dengan pengguna lain agar :', 'saling memberikan umpan balik terhadap proyek yang sedang dikerjakan;;Saling meniru desain;;Mempercepat waktu pekerjaan;;Bisa membuat komponen desain yang bagus', 'saling memberikan umpan balik terhadap proyek yang sedang dikerjakan', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:59:42', NULL, '2023-09-18 09:59:42', NULL),
(132, 'Selain prototipe yang perlu disiapkan untuk membangun desain pengalaman pengguna adalah', 'frame;;wireframe;;page;;element', 'wireframe', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:59:42', NULL, '2023-09-18 09:59:42', NULL),
(133, 'Logo berikut merupakan fitur…', 'Slicer;;Frame;;Grid;;Move', 'Frame', 'ADA', 'quiz', NULL, NULL, 0, '2023-09-18 09:59:42', NULL, '2023-09-18 09:59:42', NULL),
(134, 'Apa nama dari objek ini?', 'artboard;;asset;;frame;;layer', 'frame', 'ADA', 'quiz', NULL, NULL, 0, '2023-09-18 09:59:42', NULL, '2023-09-18 09:59:42', NULL),
(135, 'Apa maksud dari branches?', 'File kembar dari suatu file yang ada pada workspace baru;;Struktur pohon hirarki dari layer pada suatu halaman;;Struktur pohon hirarki dari halaman pada suatu workspace;;Ruang untuk coba-coba ide baru secara aman tanpa mengubah file utama', 'Ruang untuk coba-coba ide baru secara aman tanpa mengubah file utama', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 09:59:42', NULL, '2023-09-18 09:59:42', NULL),
(136, 'Pada saat melakukan masking, objek yang mana yang akan menjadi penutupnya?', 'objek paling atas;;objek paling bawah;;objek pertama dari pemilihan objek;;objek terakhir dari pemilihan objek', 'objek paling atas', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:44:25', NULL, '2023-09-18 10:44:25', NULL),
(137, 'Apa shortcut untuk menyimpan versi terbaru dari dokumen ke sejarah versi (version history)?', 'Ctrl + Alt + S;;Alt + S;;Ctrl + S;;Tidak dapat menyimpan sejarah versi secara manual', 'Ctrl + Alt + S', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:44:25', NULL, '2023-09-18 10:44:25', NULL),
(138, 'Yang bukan merupakan menu pada halaman utama figma adalah', 'pencarian;;draft;;komunitas;;plugins', 'draft', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:44:25', NULL, '2023-09-18 10:44:25', NULL),
(139, 'Yang merupakan ikon untuk menggunakan fitur pembuatan frame adalah', 'GAMBAR;;GAMBAR;;GAMBAR;;GAMBAR', 'a', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:44:25', NULL, '2023-09-18 10:44:25', NULL),
(140, 'Logo berikut merupakan fitur…', 'coloring pencil;;spidol;;pensil;;pen', 'pen', 'ADA', 'quiz', NULL, NULL, 0, '2023-09-18 10:44:25', NULL, '2023-09-18 10:44:25', NULL),
(141, 'Perhatikan langkah - langkah di bawah ini!\r\n    1. copy frame dan paste frame\r\n    2. jalankan prototipe\r\n    3. pada frame yang lama, hapus bagian objek yang berisikan pilihan menunya\r\n    4. buat frame dengan menambahkan 2 objek yang berisikan ikon side', 'a-c-d-f-e-b;;d-a-e-f-c-b;;d-a-c-e-f-b;;a-d-c-f-e-b', 'd-a-c-e-f-b', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:52:22', NULL, '2023-09-18 10:52:22', NULL),
(142, 'Apa tujuan fitur \'prototype\' pada Figma?', 'mengatur aset desain;;kolaborasi dengan tim pada suatu proyek desain;;membuat desain yang high-fidelity untuk presentasi;;menganimasi dan menambahkan elemen-elemen interaktif pada desain', 'membuat desain yang high-fidelity untuk presentasi', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:52:22', NULL, '2023-09-18 10:52:22', NULL),
(143, 'Elemen apa yang penting untuk mendesain tampilan pengguna yang baik?', 'desain interaksi dan desain visual, namun bukan desain informasi;;desain informasi dan desain visual, namun bukan desain interaksi;;desain informasi, desain visual, dan desain interaksi;;desain interaksi dan desain informasi, namun bukan desain visual', 'desain informasi, desain visual, dan desain interaksi', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:52:22', NULL, '2023-09-18 10:52:22', NULL),
(144, 'Plugin yang dapat dipakai untuk \'map generator\' adalah...', 'icons8;;image palette;;pexels;;map maker', 'map maker', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:52:22', NULL, '2023-09-18 10:52:22', NULL),
(145, 'Bagian pada navigasi yang berguna untuk menampilkan informasi setiap objek pada canvas adalah...', 'layers;;menu;;tools;;inspector', 'layers', NULL, 'quiz', NULL, NULL, 0, '2023-09-18 10:52:22', NULL, '2023-09-18 10:52:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_content_carousel`
--

CREATE TABLE `m_content_carousel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_content_carousel`
--

INSERT INTO `m_content_carousel` (`id`, `name`, `content`, `image`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Jadikan internship kamu momen percepatan karir bersama Maxy Academy', '<p>-</p>', '9312659aa94d6cc375480faec161dd0e.jpg', '<p>Persiapkan internship semester akhirmu dengan magang di perusahaan pilihan dan dapatkan mentorship langsung dari para profesional di bidang yang kamu minati.</p>', 1, '2023-01-18 11:16:00', 1, '2023-02-16 02:21:33', 1),
(2, 'Jadikan internship kamu momen percepatan karir bersama Maxy Academy', '<p>-</p>', '3538eb389c53bd2d78ddbb723df88371.jpg', '<p>Persiapkan internship semester akhirmu dengan magang di perusahaan pilihan dan dapatkan mentorship langsung dari para profesional di bidang yang kamu minati.</p>', 1, '2023-01-18 11:16:00', 1, '2023-02-06 08:25:40', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_content_carousel_button`
--

CREATE TABLE `m_content_carousel_button` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` text DEFAULT NULL,
  `style` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `content_carousel_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_content_carousel_button`
--

INSERT INTO `m_content_carousel_button` (`id`, `name`, `icon`, `style`, `url`, `content_carousel_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(4, 'Programs', '', 'outline-primary-c', '#modalCarousel', 1, '', 0, '2023-02-06 08:25:40', 1, '2023-02-06 08:25:40', 1),
(5, 'Contact Us', '', 'primary-c', 'https://api.whatsapp.com/send?phone=628113955599&text=Hi%20MinMax!%F0%9F%99%8B%F0%9F%8F%BB%E2%80%8D%E2%99%80%0AMau%20nanya%20caranya%20ikut%20bootcamp%20di%20Maxy%C2%A0Academy%C2%A0dong', 1, '', 1, '2023-02-06 08:25:40', 1, '2023-02-06 08:25:40', 1),
(6, 'Programs', '', 'outline-primary-c', '#modalCarousel', 1, '', 1, '2023-02-16 02:21:33', 1, '2023-02-16 02:21:33', 1),
(7, 'Contact Us', '', 'primary-c', 'https://api.whatsapp.com/send?phone=628113955599&text=Hi%20MinMax!%F0%9F%99%8B%F0%9F%8F%BB%E2%80%8D%E2%99%80%0AMau%20nanya%20caranya%20ikut%20bootcamp%20di%20Maxy%C2%A0Academy%C2%A0dong', 1, '', 1, '2023-02-16 02:21:33', 1, '2023-02-16 02:21:33', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_content_faq`
--

CREATE TABLE `m_content_faq` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` enum('title','parent','child') NOT NULL,
  `content_faq_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_content_faq`
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
-- Struktur dari tabel `m_content_page`
--

CREATE TABLE `m_content_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_content_page`
--

INSERT INTO `m_content_page` (`id`, `name`, `heading`, `title`, `slug`, `type`, `meta_keyword`, `meta_description`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'featured_class', 'Kelas Unggulan', NULL, NULL, 'SECTION', NULL, NULL, '<p>Cek program kami yang telah terbukti membantu siswa dalam mendapatkan pekerjaan impian</p>', NULL, 1, '2023-01-19 15:49:00', 1, '2023-01-19 15:49:00', 1),
(2, 'why', 'Kenapa harus Maxy Academy?', NULL, NULL, 'SECTION', NULL, NULL, '<p>Praktek magang melalui Maxy Academy tidak hanya sekedar untuk memenuhi tuntutan kuliah, namun dirancang untuk menjadi gerbang menuju karir impian. Melalui fitur Online Bootcamp Academy, calon intern akan mendapatkan pelatihan dengan mentor profesional sebelum praktek magang. Selama magang, kamu juga akan dibimbing untuk menjadikan pengalaman kamu sebagai portfolio kamu dalam mendapatkan karir impian.</p>', NULL, 1, '2023-01-19 15:49:00', 1, '2023-01-19 15:49:00', 1),
(3, 'company', '', NULL, NULL, 'SECTION', NULL, NULL, '<p>Kami menjamin posisi magang di berbagai perusahaan ternama seperti:</p>', NULL, 1, '2023-01-20 09:37:25', 1, '2023-01-20 09:37:25', 1),
(4, 'partner', ' ', NULL, NULL, 'SECTION', NULL, NULL, '<p>Maxy Academy juga berpartner dengan beberapa organisasi pemerintah, pendidikan, dan teknologi untuk menyediakan mentor profesional:</p>', NULL, 1, '2023-01-20 09:39:06', 1, '2023-01-20 09:39:06', 1),
(5, 'step', 'Lewat Maxy Academy, kamu akan melalui tiga tahapan program berikut:', NULL, NULL, 'SECTION', NULL, NULL, NULL, NULL, 1, '2023-01-20 09:39:44', 1, '2023-01-20 09:39:44', 1),
(6, 'certificate', 'Sertifikasi kami', NULL, NULL, 'SECTION', NULL, NULL, '<p>Maxy Academy menyediakan NFT Certificate untuk program bootcamp serta NFT Certificate untuk workplace dan mentor bagi para intern yang menjalani program magang. Sertifikasi yang diterima para intern ini dapat menjadi bekal untuk membangun resume profesional untuk karir masa depan.</p>', NULL, 1, '2023-01-20 09:40:38', 1, '2023-02-03 05:52:56', 1),
(7, 'package', 'Paket yang bisa kamu pilih', NULL, NULL, 'SECTION', NULL, NULL, NULL, NULL, 1, '2023-01-20 09:41:09', 1, '2023-01-20 09:41:09', 1),
(8, 'university', ' ', NULL, NULL, 'SECTION', NULL, NULL, '<p>Lewat kerjasama dengan beberapa universitas unggulan berikut, posisi magang di perusahaan terpilih terjamin bagi para mahasiswa</p>', NULL, 1, '2023-01-20 09:41:31', 1, '2023-02-03 05:50:58', 1),
(9, 'testimonial', 'Apa Kata Alumni Maxy Academy?', NULL, NULL, 'SECTION', NULL, NULL, NULL, NULL, 1, '2023-01-20 09:42:08', 1, '2023-01-20 09:42:08', 1),
(10, 'section_testing', 'Heading Testing', NULL, NULL, 'SECTION', NULL, NULL, '<div class=\"row text-danger\">\n<div class=\"col-md-12\">aaaa</div>\n</div>', NULL, 1, '2023-02-01 08:46:29', 1, '2023-02-01 08:46:29', 1),
(11, 'page_testing', NULL, 'Page Testing', 'page-testing', 'PAGE', 'Page Testing', 'Ini adalah page testing', '<p>Tesss</p>', NULL, 1, '2023-02-01 08:47:45', 1, '2023-02-01 08:47:45', 1),
(12, 'faq_testing', NULL, 'FAQ', 'faq-testing', 'PAGE', 'FaQ', 'FaQ seputar Maxy Academy', '<div class=\"row justify-content-between\">\n<div class=\"col-12\">\n<h2 class=\"mb-5 color-primary fw-bold\">FAQ</h2>\n</div>\n<div class=\"col-md-12\">\n<div id=\"accordionFaq\" class=\"accordion\">\n<div class=\"accordion-item\">\n<h2 id=\"heading-1\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button  collapsed \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-1\" aria-expanded=\"true\" aria-controls=\"collapse-1\"> Bootcamp </a></h2>\n<div id=\"collapse-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-1\" data-bs-parent=\"#accordionFaq\">\n<div class=\"accordion-body\">\n<div id=\"accordion-1\" class=\"accordion\">\n<div class=\"accordion-item\">\n<p>Apa itu bootcamp Maxy Academy?</p>\n<div id=\"collapse-1-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-1-1\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Program pelatihan technology dan digital yang dilakukan secara intensif selama 1 bulan untuk mempersiapkan mahasiswa yang mampu menjawab kebutuhan industri.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Siapa yang bisa ikut Maxy Academy?</p>\n<div id=\"collapse-1-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-2\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa semester 5 hingga fresh graduate.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apa saja yang dipelajari di bootcamp Maxy Academy ini?</p>\n<div id=\"collapse-1-3\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-3\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa bisa belajar Backend, Frontend, UI/UX, Digital Marketing, Product Management, dan Data Science di Maxy Academy.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Bagaimana tahapan bootcamp di Maxy Academy?</p>\n<div id=\"collapse-1-4\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-4\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa akan mengikuti bootcamp selama 1 bulan dengan durasi 2 jam setiap harinya pada hari Senin hingga Jumat. Setiap akhir materi pembelajaran, mahasiswa akan diberikan assessment untuk mempraktekkan ilmu yang diperoleh. Pada 2 minggu pertama bootcamp, mahasiswa akan melakukan matchmaking dengan perusahaan. Kemudian pada minggu ke-3, mahasiswa telah mendapat list perusahaan mana yang cocok dan ingin menjadikan intern. Setelah menyelesaikan bootcamp di minggu ke-4, mahasiswa dapat memulai magang di perusahaan.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apakah saya harus punya latar belakang IT?</p>\n<div id=\"collapse-1-5\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-5\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Untuk kelas Backend dan Frontend disarankan memiliki latar belakang IT.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Berapa lama bootcamp di Maxy Academy?</p>\n<div id=\"collapse-1-6\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-1-6\" data-bs-parent=\"#accordion-1\">\n<div class=\"accordion-body\">\n<p>Mahasiswa akan mengikuti bootcamp secara intensif selama 1 bulan.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"heading-2\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-2\" aria-expanded=\"true\" aria-controls=\"collapse-2\"> Magang </a></h2>\n<div id=\"collapse-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2\" data-bs-parent=\"#accordionFaq\">\n<div class=\"accordion-body\">\n<div id=\"accordion-2\" class=\"accordion\">\n<div class=\"accordion-item\">\n<p>Setelah menyelesaikan bootcamp, apakah saya akan dibantu mendapatkan magang?</p>\n<div id=\"collapse-2-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-2-1\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Ya, kamu akan dibantu mendapatkan magang di perusahaan partner Maxy Academy apabila mengambil paket bootcamp Coaching atau Mentoring.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apakah saya bisa memilih magang secara onsite atau online?</p>\n<div id=\"collapse-2-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2-2\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Pelaksanaan magang secara onsite atau online tergantung pada kebijakan masing-masing perusahaan.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Apakah saya bisa memilih perusahaan partner Maxy Academy untuk magang?</p>\n<div id=\"collapse-2-3\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2-3\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Mahasiswa harus mengikuti proses matchmaking terlebih dahulu yang akan dilakukan dalam proses bootcamp.</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Setelah menyelesaikan magang, apakah saya akan dibantu mendapatkan full time job?</p>\n<div id=\"collapse-2-4\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-2-4\" data-bs-parent=\"#accordion-2\">\n<div class=\"accordion-body\">\n<p>Iya, namun terdapat biaya tambahan. Untuk detail lebih lanjut silahkan hubungi kami.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"heading-3\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-3\" aria-expanded=\"true\" aria-controls=\"collapse-3\"> Pendaftaran </a></h2>\n<div id=\"collapse-3\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-3\" data-bs-parent=\"#accordionFaq\">\n<div class=\"accordion-body\">\n<div id=\"accordion-3\" class=\"accordion\">\n<div class=\"accordion-item\">\n<p>Bagaimana cara mendaftar bootcamp di Maxy Academy?</p>\n<div id=\"collapse-3-1\" class=\"accordion-collapse collapse  show \" aria-labelledby=\"heading-3-1\" data-bs-parent=\"#accordion-3\">\n<div class=\"accordion-body\">\n<p>Registrasi melalui website https://maxy.academy atau Whatsapp Maxy Academy (https://wa.me/628113955599) dan isi form pendaftaran kami. Selanjutnya, team Maxy Academy akan menghubungi lebih lanjut untuk proses setelah pendaftaran,</p>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<p>Bagaimana caranya saya bisa mendapatkan scholarship up to 100%?</p>\n<div id=\"collapse-3-2\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-3-2\" data-bs-parent=\"#accordion-3\">\n<div class=\"accordion-body\">\n<p>Kamu bisa mengikuti placement test secara online terlebih dahulu, waktu pengerjaan 60 menit. Hubungi Whatsapp Maxy Academy (https://wa.me/628113955599) untuk mengikuti placement test.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"heading-4\" class=\"accordion-header\"><a class=\"mb-0 color-black fw-bold h5 accordion-button \" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-4\" aria-expanded=\"true\" aria-controls=\"collapse-4\"> Pembayaran </a></h2>\n<div id=\"collapse-4\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading-4\" data-bs-parent=\"#accordionFaq\"> </div>\n</div>\n</div>\n</div>\n</div>', NULL, 1, '2023-02-02 01:53:10', 1, '2023-02-06 09:59:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_content_program_step`
--

CREATE TABLE `m_content_program_step` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `style` text NOT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_content_program_step`
--

INSERT INTO `m_content_program_step` (`id`, `name`, `style`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Ikuti training intensif selama 1 bulan bersama mentor profesional', 'step', '<p>Pilih bidang yang ingin kamu ikuti</p>', NULL, 1, '2023-01-19 15:49:00', 1, '2023-01-31 04:07:45', 1),
(2, 'Jalani program magang selama 3 bulan di perusahaan partner Maxy Academy', 'step', '', NULL, 1, '2023-01-19 15:49:00', 1, '2023-01-19 15:49:00', 1),
(3, 'Jaminan mendapat pekerjaan melalui konseling karir dan jaringan partner bisnis Maxy Academy', 'step', '', NULL, 1, '2023-01-20 10:03:20', 1, '2023-01-20 10:03:20', 1),
(4, 'Di akhir periode magang, Maxy Academy membantu kamu untuk kembali ke<br>jalur skripsi dan <span class=\"highlight\">langsung mendapatkan pekerjaan</span> sesuai bidang kamu pasca lulus.', 'footer', '', NULL, 1, '2023-01-20 10:15:41', 1, '2023-01-20 10:15:41', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_content_program_step_button`
--

CREATE TABLE `m_content_program_step_button` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` text DEFAULT NULL,
  `style` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `program_step_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_content_program_step_button`
--

INSERT INTO `m_content_program_step_button` (`id`, `name`, `icon`, `style`, `url`, `program_step_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(3, 'UI/UX', 'majesticons:ux-circle-line', 'outline-primary-c', 'class/ui-ux', 1, '', 1, '2023-01-20 10:21:24', 1, '2023-01-20 10:21:24', 1),
(4, 'Back End', 'ci:window-code-block', 'primary-c', 'class/backend', 1, '', 1, '2023-01-31 04:07:45', 1, '2023-01-31 04:07:45', 1),
(5, 'Front End', 'fa6-brands:instagram', 'outline-primary-c', 'class/frontend', 1, '', 1, '2023-01-31 04:07:45', 1, '2023-01-31 04:07:45', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_course_type`
--

CREATE TABLE `m_course_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_course_type`
--

INSERT INTO `m_course_type` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Bootcamp', 'bootcamp', NULL, 1, '2022-09-20 10:11:47', 1, '2023-12-27 17:23:07', 1),
(2, 'Rapid Onboarding', 'rapid-onboarding', NULL, 1, '2022-09-20 10:12:01', 1, '2023-12-27 17:23:07', 1),
(3, 'Mini Bootcamp', 'mini-bootcamp', NULL, 1, '2023-03-29 13:18:05', 1, '2023-12-11 00:13:12', 1),
(4, 'Hackathon', 'hackathon', NULL, 1, '2023-03-29 13:18:05', 1, '2023-12-11 00:13:12', 1),
(5, 'Prakerja', 'prakerja', NULL, 1, '2023-05-29 08:31:42', 1, '2023-12-11 00:13:12', 1),
(6, 'MSIB', 'msib', NULL, 1, '2023-05-29 08:31:42', 1, '2023-12-11 00:13:13', 1),
(7, 'Upskilling', 'upskilling', NULL, 1, '2023-12-27 17:23:07', 1, '2023-12-27 17:23:07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_difficulty_type`
--

CREATE TABLE `m_difficulty_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_difficulty_type`
--

INSERT INTO `m_difficulty_type` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Beginner', '', 1, '2022-09-12 10:51:10', 1, '2022-09-12 10:51:10', 1),
(2, 'Intermediate', '', 1, '2022-09-20 09:59:17', 1, '2022-09-20 09:59:17', 1),
(3, 'Advance', '', 1, '2022-09-20 09:59:27', 1, '2022-09-20 10:00:12', 1),
(4, 'Test', '', 1, '2023-01-25 09:22:44', 1, '2023-01-25 09:22:44', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_general`
--

CREATE TABLE `m_general` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_general`
--

INSERT INTO `m_general` (`id`, `name`, `value`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'nama_lengkap', 'Maxy Academy', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(2, 'nama_singkat', 'Maxy', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(3, 'alamat_lengkap', 'Woodland 9 No 19, Surabaya', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(4, 'alamat', 'Woodland 9 No 19', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(5, 'alamat2', 'Surabaya, Jawa Timur', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(6, 'alamat3', 'Indonesia', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(7, 'nama_contact', 'magangku', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(8, 'telepon', '628113955599', NULL, 0, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
(9, 'logo', 'LogoMaxy.png', NULL, 1, '2023-05-11 15:01:54', 1, '2022-09-12 08:57:58', 1),
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
(21, 'alamat_sby', 'Surabaya Office', NULL, 1, NULL, 1, '2023-06-26 08:59:50', 1),
(22, 'alamat_sby_lengkap', '<br>\r\nVieLoft SOHO Ciputra World 1220<br>\r\nJl. Mayjen Sungkono Kav. 89<br>\r\nSurabaya, 60224</p>', NULL, 1, NULL, 1, '2023-06-26 09:02:03', 1),
(23, 'alamat_jkt', 'Jakarta Office', NULL, 1, NULL, 1, '2023-06-26 09:02:03', 1),
(24, 'alamat_jkt_lengkap', '<br>\r\nPakuwon Tower 26-J\r\n<br>\r\nJl. Casablanca Raya No.88 <br>\r\nJakarta Selatan, DKI Jakarta 12960', NULL, 1, NULL, 1, '2023-06-26 09:02:03', 1),
(25, 'maxyurl', 'https://www.maxy.academy', NULL, 1, NULL, 1, '2023-06-28 03:18:52', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_partner`
--

CREATE TABLE `m_partner` (
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
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `status_highlight` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_partner`
--

INSERT INTO `m_partner` (`id`, `name`, `type`, `url`, `address`, `phone`, `email`, `contact_person`, `logo`, `description`, `status`, `status_highlight`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
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
(189, 'Universitas PGRI Madiun', 'UNIVERSITY', '#', '-', '-', 'test@mail.com', '', 'unipma.png', NULL, 1, 1, '2023-09-01 15:01:47', 1, '2023-09-01 15:01:47', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_promo`
--

CREATE TABLE `m_promo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') NOT NULL,
  `discount` varchar(255) NOT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_promo`
--

INSERT INTO `m_promo` (`id`, `name`, `code`, `start_date`, `end_date`, `discount_type`, `discount`, `max_discount`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'SYDNEY500', 'SYDNEY500', '2023-09-18 06:53:34', '2023-11-30 06:53:34', 'FIXED', '51', 500000, NULL, 1, '2023-09-18 11:54:49', 1, '2023-11-17 07:37:35', 1),
(2, 'MAXYANNIV10', 'MAXYANNIV10', '2023-09-19 11:28:57', '2023-11-30 16:28:57', 'FIXED', '10', 100000, NULL, 1, '2023-09-19 16:30:27', 1, '2023-10-24 14:03:01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_province`
--

CREATE TABLE `m_province` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_province`
--

INSERT INTO `m_province` (`id`, `name`, `keterangan`, `created`, `created_id`, `updated`, `updated_id`) VALUES
(11, 'ACEH', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(12, 'SUMATERA UTARA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(13, 'SUMATERA BARAT', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(14, 'RIAU', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(15, 'JAMBI', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(16, 'SUMATERA SELATAN', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(17, 'BENGKULU', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(18, 'LAMPUNG', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(19, 'KEPULAUAN BANGKA BELITUNG', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(21, 'KEPULAUAN RIAU', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(31, 'DKI JAKARTA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(32, 'JAWA BARAT', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(33, 'JAWA TENGAH', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(34, 'DI YOGYAKARTA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(35, 'JAWA TIMUR', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(36, 'BANTEN', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(51, 'BALI', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(52, 'NUSA TENGGARA BARAT', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(53, 'NUSA TENGGARA TIMUR', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(61, 'KALIMANTAN BARAT', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(62, 'KALIMANTAN TENGAH', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(63, 'KALIMANTAN SELATAN', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(64, 'KALIMANTAN TIMUR', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(65, 'KALIMANTAN UTARA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(71, 'SULAWESI UTARA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(72, 'SULAWESI TENGAH', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(73, 'SULAWESI SELATAN', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(74, 'SULAWESI TENGGARA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(75, 'GORONTALO', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(76, 'SULAWESI BARAT', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(81, 'MALUKU', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(82, 'MALUKU UTARA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(91, 'PAPUA BARAT', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0),
(94, 'PAPUA', NULL, '2015-12-18 01:53:38', 0, '2015-12-18 01:53:38', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_skill`
--

CREATE TABLE `m_skill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_skill`
--

INSERT INTO `m_skill` (`id`, `name`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'UI Designer', '2024-01-14 20:00:31', 1, '2024-01-14 20:00:34', 1),
(2, 'UX Designer', '2024-01-14 20:00:44', 1, '2024-01-14 20:00:46', 1),
(3, 'Animator', '2024-01-14 20:01:17', 1, '2024-01-14 20:01:20', 1),
(4, 'User Research', '2024-01-14 20:01:17', 1, '2024-01-14 20:01:20', 1),
(5, 'Website Design', '2024-01-14 20:01:17', 1, '2024-01-14 20:01:20', 1),
(6, 'Programmer', '2024-01-14 20:01:17', 1, '2024-01-14 20:01:20', 1),
(7, 'Fullstack Developer', '2024-01-14 20:52:25', NULL, '2024-01-14 20:52:25', NULL),
(8, 'Data Scientist', '2024-01-14 20:52:26', NULL, '2024-01-14 20:52:26', NULL),
(9, 'Data Analyst', '2024-01-14 20:58:00', NULL, '2024-01-14 20:58:00', NULL),
(10, 'PHP', '2024-01-14 20:58:00', NULL, '2024-01-14 20:58:00', NULL),
(11, 'HTML', '2024-01-14 20:58:00', NULL, '2024-01-14 20:58:00', NULL),
(12, 'Laravel', '2024-01-14 20:58:01', NULL, '2024-01-14 20:58:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `no_generator`
--

CREATE TABLE `no_generator` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `no_generator`
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
-- Struktur dari tabel `partner_university_detail`
--

CREATE TABLE `partner_university_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ref` int(11) DEFAULT NULL,
  `type` enum('faculty','major') NOT NULL,
  `m_partner_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo_course`
--

CREATE TABLE `promo_course` (
  `course_id` int(11) NOT NULL,
  `m_promo_id` int(11) NOT NULL,
  `payment_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `promo_course`
--

INSERT INTO `promo_course` (`course_id`, `m_promo_id`, `payment_link`) VALUES
(14, 1, 'https://invoice-staging.xendit.co/od/ddm02'),
(14, 2, 'https://invoice-staging.xendit.co/od/ddm01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `redeem_code`
--

CREATE TABLE `redeem_code` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quota` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Not Available, 1 = Available',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `redeem_code`
--

INSERT INTO `redeem_code` (`id`, `name`, `code`, `quota`, `description`, `type`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Prakerja', 'fefwrgwrgeh', 0, 'btedh', 'prakerja', 0, '2023-11-23 16:15:54', 1, '2023-11-23 16:15:54', 1),
(2, 'Upskilling', 'maxyupskilling', 998, 'Bootcamp + Upskilling', 'upskilling', 1, '2023-12-29 13:52:27', 1, '2024-01-04 13:47:54', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_invoice`
--

CREATE TABLE `trans_invoice` (
  `id` int(11) NOT NULL,
  `external_id` varchar(45) DEFAULT NULL,
  `payment_method` varchar(45) DEFAULT NULL,
  `payment_channel` varchar(45) DEFAULT NULL,
  `merchant_name` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `payer_email` varchar(45) DEFAULT NULL,
  `payment_destination` varchar(45) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_id` int(11) DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_invoice`
--

INSERT INTO `trans_invoice` (`id`, `external_id`, `payment_method`, `payment_channel`, `merchant_name`, `amount`, `paid_amount`, `currency`, `payer_email`, `payment_destination`, `paid_at`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(6436, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'QR_CODE', 'QRIS', 'Maxy Academy', 99000, 99000, 'IDR', 'elvynawelda04@gmail.com', '-', '2023-04-12 02:05:00', NULL, 1, '2023-05-16 20:36:17', 1, NULL, 1),
(6437, 'maxyac-eb89c066e77544ad-b5058937f19ee02e-1681', 'BANK_TRANSFER', 'BNI', 'Maxy Academy', 99000, 99000, 'IDR', 'gaapgwayan@gmail.com', '8930323489556145', '2023-04-12 16:59:16', NULL, 1, '2023-05-16 20:36:17', 1, NULL, 1),
(6438, 'invoice_123124123', 'BANK_TRANSFER', 'PERMATA', 'Xendit', 50000, 50000, 'IDR', 'wildan@xendit.co', '888888888888', '2016-10-12 01:15:03', 'This is a description', 1, '2023-11-13 00:00:58', 1, '2023-11-13 00:00:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `total_after_discount` double NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0 = Not Completed, \r\n1 = Completed, \r\n2 = Partial, \r\n3 = Canceled',
  `course_id` int(11) DEFAULT NULL,
  `course_class_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `course_package_id` int(11) DEFAULT NULL,
  `m_promo_id` int(11) DEFAULT NULL,
  `forced_at` datetime DEFAULT NULL,
  `forced_comment` text DEFAULT NULL,
  `user_forced_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order`
--

INSERT INTO `trans_order` (`id`, `order_number`, `date`, `total`, `discount`, `total_after_discount`, `payment_status`, `course_id`, `course_class_id`, `user_id`, `course_package_id`, `m_promo_id`, `forced_at`, `forced_comment`, `user_forced_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(4, 'ORDER/1641825420', '2024-01-10 13:57:46', 5000000, NULL, 5000000, 0, NULL, NULL, 99, 2, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-12 08:37:14', 1, '2024-01-12 08:37:14', 1),
(5, 'ORDER/1641782940', '2024-01-10 07:49:42', 5000000, NULL, 5000000, 0, NULL, NULL, 100, 2, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-12 08:38:18', 1, '2024-01-12 08:38:18', 1),
(6, 'ORDER/1641706980', '2024-01-09 17:03:29', 5000000, NULL, 5000000, 0, NULL, NULL, 101, 2, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-12 08:38:18', 1, '2024-01-12 08:38:18', 1),
(7, 'ORDER/1641692700', '2024-01-09 13:45:26', 5000000, NULL, 5000000, 0, NULL, NULL, 102, 2, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-12 08:38:18', 1, '2024-01-12 08:38:18', 1),
(8, 'ORDER/1641684360', '2024-01-09 11:26:41', 5000000, NULL, 5000000, 0, NULL, NULL, 103, 2, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-12 08:38:18', 1, '2024-01-12 08:38:18', 1),
(9, 'ORDER/1641682080', '2024-01-09 11:08:37', 5000000, NULL, 5000000, 0, NULL, NULL, 104, 2, NULL, NULL, NULL, NULL, NULL, 1, '2024-01-12 08:38:18', 1, '2024-01-12 08:38:18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_confirm`
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
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `referal` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `personal_summary` text DEFAULT NULL,
  `m_province_id` int(11) DEFAULT NULL,
  `linked_in` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `type` enum('admin','tutor','member') DEFAULT NULL,
  `m_partner_id` int(11) DEFAULT NULL,
  `access_group_id` int(11) NOT NULL,
  `exp` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 1,
  `email_verified` int(11) NOT NULL DEFAULT 0,
  `partner_university_detail_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `parents_name` varchar(255) DEFAULT NULL,
  `ipk` decimal(4,2) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `referal`, `date_of_birth`, `phone`, `address`, `university`, `major`, `semester`, `city`, `country`, `postal_code`, `personal_summary`, `m_province_id`, `linked_in`, `request`, `email`, `password`, `profile_picture`, `type`, `m_partner_id`, `access_group_id`, `exp`, `level`, `email_verified`, `partner_university_detail_id`, `email_verified_at`, `remember_token`, `description`, `no_ktp`, `parents_name`, `ipk`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'toro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'toro@mail.com', '$2y$10$bADbRS70xYSWFUM8eF.LCu1s3rY/HDNYybH3siwPdH7/LEzHj0HIG', NULL, 'admin', 34, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, NULL, NULL, NULL, NULL, 0, '2022-09-09 07:46:26', 1, '2022-09-09 07:46:26', 1),
(4, 'akbar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'akbar@mail.com', '$2y$10$csNiP2KxUw1WGNyjxQMq0eLY0Cyp8m7T9J2bmHxw9CZTUUB8OJTG.', NULL, NULL, NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, NULL, NULL, NULL, NULL, 1, '2023-06-09 02:36:42', 1, '2023-06-09 02:36:42', 1),
(14, 'William Christoper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anonim@mail.com', '$2y$10$eJkoxsg/rac1s3XUjFjKtunkFkLWzuDB8ZYGDle6T8ATvymR5O/JG', 'william.png', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, 'Full-stack Developer Maxy Academy', NULL, NULL, NULL, 1, '2023-07-03 06:40:43', 1, '2023-07-03 06:40:43', 1),
(15, 'Daniel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'daniel@mail.com', '$2y$10$ZwGPVjikXqWg/HVYI5ZM8OslJgcyku7MhAUnxpOVWNSBsntc2KWhe', 'daniel.png', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, 'Product Designer Ruparupa', NULL, NULL, NULL, 1, '2023-07-03 06:41:54', 1, '2023-07-03 06:41:54', 1),
(16, 'Florencia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'florencia@mail.com', '$2y$10$QvMJGgLx7FkbxEiZU4.HguqO9ksoRpm7iRq6Opg2GUz5FN6XLoaCq', 'florencia.png', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, 'Digital Marketer Djoeragan Sego', NULL, NULL, NULL, 1, '2023-07-03 06:42:15', 1, '2023-07-03 06:42:15', 1),
(17, 'Selvia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'selvia@mail.com', '$2y$10$PZGpbWAO5XLCDd1HNE9Mw.2QkQgf8rHsIPN27F.sYKXoBapjDOW..', 'selvia.jpg', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-08-29 19:37:10', NULL, 'Mentor Maxy Academy', NULL, NULL, NULL, 0, '2023-07-03 06:43:07', 1, '2023-07-03 06:43:07', 1),
(18, 'Andy Febrico Bintoro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'toro1@mail.com', '$2y$10$yh8nzzKt6LJpCzfwxOEh8ewQmcs8DqqIpCOjMtyrrZekRRTKEXg4i', 'toro.png', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, 'CTO Maxy Academy', NULL, NULL, NULL, 1, '2023-07-03 06:46:28', 1, '2023-07-03 06:46:28', 1),
(19, 'Widy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'widy@mail.com', '$2y$10$D6sfDKWtiWFKTykhweO2OefpfV9DW9wWhpl/lIBzGcPWxPrnEzTmG', NULL, 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, NULL, NULL, NULL, NULL, 0, '2023-07-03 06:48:22', 1, '2023-07-03 06:48:22', 1),
(20, 'Khoerurrizal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rizal@mail.com', '$2y$10$IYUlWzTo33GGp6NR/B7f5uONGmjbJa96D8JMs.GtXPIH6T/YHBuQa', 'rizal.png', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-08-29 19:37:42', NULL, 'Senior Fullstack Engineer SourceSage Holding, Pte Ltd', NULL, NULL, NULL, 0, '2023-07-03 06:49:17', 1, '2023-07-03 06:49:17', 1),
(21, 'Arabi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arabi@mail.com', '$2y$10$nxhfLEYHT7LBRZFFd8tMIecNMA3o/H4wMUuemE9rfifib2KnONWMi', 'arabi.png', 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-08-29 19:37:57', NULL, 'Mentor Maxy Academy', NULL, NULL, NULL, 0, '2023-07-03 06:49:43', 1, '2023-07-03 06:49:43', 1),
(22, 'Marcel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'marcel@mail.com', '$2y$10$8dXna3uajYsRX9Ai7frvHOgtLl6/uwHe7vWKn8ZXF3c.yApaHi7le', NULL, 'tutor', NULL, 1, 0, 1, 0, NULL, '2023-07-19 14:33:02', NULL, NULL, NULL, NULL, NULL, 0, '2023-07-03 06:50:01', 1, '2023-07-03 06:50:01', 1),
(23, 'Budi', NULL, NULL, NULL, NULL, 'Jl. Rumah Budi 321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'budi@mail.com', '$2y$10$aUFJ6wrXFB7PE3Sc5yiYA.n.upAhU3lLGDy.OCKbYY/deifEpQocS', '335dab35b98c84693e844963fafe5dff.jpg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 04:21:34', 0, '2022-09-30 07:46:01', 0),
(24, 'Hendra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hendra@mail.com', '$2y$10$fzRM8rnt4sxdobABBaafZemD4YbClQlsWVb15EnqcmLcgjDye8HnK', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 04:27:02', 0, '2022-09-26 04:27:02', 0),
(25, 'Jess', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jess@mail.com', '$2y$10$1O1jN.14dAc/KXwakFtnaOUohX6IaXx7qHe./jtyIbkjGo2YxLgoq', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-26 04:27:21', 0, '2022-09-26 04:27:21', 0),
(40, 'Safira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'safira@mail.com', '$2y$10$BQ.P5Qr.lR8YR0obC2G9xeP0BWIw9Cgcfx.N0sOA.umy.OoZLuUgu', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-01-27 04:19:11', 0, '2023-01-27 04:19:11', 0),
(41, 'Qowiyyu Adzkar', NULL, NULL, NULL, '088217711609', 'Surabaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qowi.test@mail.com', '$2y$10$MuVa5XMt65ozmRlXZCdZHuEIflNRIn74zGQa6YxF1S8q2Mt9tER.2', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-02-09 08:40:19', 0, '2023-02-09 08:41:22', 0),
(42, 'Sofi Aisya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sofi.aisya01@gmail.com', '$2y$10$lIBlq1KwrLmEyIGw58MPXuGnFka8/pIOQizkfMkcd/FHtKkwO0R8G', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-02-11 18:33:21', 0, '2023-02-11 18:33:21', 0),
(43, 'Aditya Kurnia Pratama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adityacaspo@gmail.com', '$2y$10$MaVSZM6oSowVrFL5DbaYT.oms4hE7RH6zCA4T/pKOW/8fGzm04DoC', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-02-12 00:00:43', 0, '2023-02-12 00:00:43', 0),
(44, 'Andhi Nursahara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'archane8853@gmail.com', '', 'andhi.png', 'member', NULL, 2, 0, 1, 0, NULL, '2023-08-31 18:18:16', NULL, 'utk testimonial', NULL, NULL, NULL, 1, '2023-02-14 07:52:22', 0, '2023-02-14 07:52:22', 0),
(45, 'Mirhan Sahira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mirhansahira1@gmail.com', '$2y$10$ImkgM6mFLgK7UI6phg6bDeZF9cW1yiBXUATNXXi.oRqXCRxeGJRIi', 'cecylia.jpg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-08-31 18:18:23', NULL, 'utk testimonial', NULL, NULL, NULL, 1, '2023-02-17 02:55:20', 0, '2023-02-17 02:55:20', 0),
(46, 'Nur Almahdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20102108@ittelkom-pwt.ac.id', '$2y$10$n6IIOMTZdtgxPjXUI9vV5uKw4.yuvHpQb/Qj3V.cLFf5xN7.YVNda', 'nadhira.jpg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-08-29 19:30:11', NULL, 'utk testimonial', NULL, NULL, NULL, 1, '2023-02-17 02:56:54', 0, '2023-02-17 02:56:54', 0),
(47, 'Azril Bagas Erlangga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20102286@ittelkom-pwt.ac.id', '$2y$10$1Q9IK88.fi9eKxcmH5YpC.fF2knJeTEtGabr9rLTxthzOeSvLwA9.', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-02-17 02:59:37', 0, '2023-02-17 02:59:37', 0),
(48, 'Nur Mufrih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nurmufrih@gmail.com', '$2y$10$UB.pbzfW7JqxvnlGeGOtZu6w/4aI2Y3213ZEx46IUS2mO3pcVvFzy', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-02 03:36:23', 0, '2023-03-02 03:36:23', 0),
(49, 'ww', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ww@gmail.com', '$2y$10$U3M0lvM2JtE6JqXF/ecwju5LpZwcswQ1d5EjndU3pyPa8JoXvmFDe', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-02 03:50:51', 0, '2023-03-02 03:50:51', 0),
(50, 'diponh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dipo.nabhan@gmail.com', '$2y$10$id.LL0VgbZlQHSQ5hpy0.u/bJ00i0btwMPM36B5kbpgGWNsJm04j6', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-09 07:58:15', 0, '2023-03-09 07:58:15', 0),
(51, 'Hansen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lukitohansen0123@gmail.com', '$2y$10$xL5Gq8GH6b4Xm8UvQR4lkOLtQY0JFQ8PixqDID9ZhhlU56XR0AnM2', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 02:15:41', 0, '2023-03-16 02:15:41', 0),
(52, 'yandri ikwan huavis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yandriikwan@gmail.com', '$2y$10$z1Il/bNEyiYQ1yoiT9pbp.bna4eFeDK6f7fOOfwHMO7jAgIpGGL9S', 'c1dc12f2590426598e747fe3047c1bca.jpeg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-24 06:20:25', 0, '2023-03-24 06:20:46', 0),
(53, 'Aditya Puspita S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adityapuspitasari0@gmail.com', '$2y$10$1aliAV13lu99TfFs.qm1CO44xvkU5ntE0l3ZmCfhW7HGWXC90p6V6', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-03-31 06:05:00', 0, '2023-03-31 06:05:00', 0),
(54, 'Kuncoro Ariadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kuncoroariadi@gmail.com', '$2y$10$nyxp4eaBbVauodVefE0Z1uPv4WLmJxf3WHsoUc3h1p4XmXrSl4fKO', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-04-08 07:56:57', 0, '2023-04-08 07:56:57', 0),
(55, 'Dara Jewutha Nuramalin', NULL, NULL, NULL, '(+62) 88802941382', 'Jalan benda barat 15 blok B 17 nomor 9, Pamulang 2  Kec. Pamulang, Kota/Kab. Tangerang Selatan  Banten, 15416', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'darajewutha2002@gmail.com', '$2y$10$EvEacVltKBnyJHG6.qqOouvsCh6uSbSnOJ6yQktkRIy1nk3NI07aa', '5491000bf4737fdc4d663b0eaf90742f.jpg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-10 01:19:10', 0, '2023-05-10 01:22:28', 0),
(56, 'Sulamit Manullang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sulamit.manullang@gmail.com', '$2y$10$F7Y5F3qOuFl3MGPHHjgVTuZsrZorOyyZpfb9Qd9HrxUlY2/NIW9Ra', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-17 06:41:54', 0, '2023-05-17 06:41:54', 0),
(58, 'Aditya Dewa', NULL, NULL, NULL, NULL, 'Perumahan Kalirejo Permai Blok F-8, Rt02/Rw04, Desa Kalirejo, kecamatan Dringu, Kab. Probolinggo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adityadewa386@gmail.com', '$2y$10$SXg1HWZXCPoyS9Nn0zz9iOf6VIvJUJuBEPnx5N0Hm8yd5NuuY65ue', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-05-25 08:09:40', 0, '2023-05-25 08:10:37', 0),
(59, 'Andhi Nursahara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'andhi@mail.com', '', 'andhi.png', 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, '', NULL, NULL, NULL, 1, '2023-07-03 15:34:48', 1, '2023-07-03 15:34:48', 1),
(60, 'Nadhira Salsabilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nadhira@mail.com', '', 'nadhira.jpg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 15:34:48', 1, '2023-07-03 15:34:48', 1),
(61, 'Cecylia Putri Gianti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cecylia@mail.com', '', 'cecylia.jpg', 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 15:34:48', 1, '2023-07-03 16:25:41', 1),
(64, 'Ardimas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ardims@maxyacademy.com', '$2y$10$v0XIgwIDUYm/LNi88nnvxO1vJPsmJKiSUa4XYAmocCiSIw6xeETdW', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-07-19 14:50:50', NULL, NULL, NULL, NULL, NULL, 1, '2023-07-06 07:29:17', 0, '2023-07-06 07:29:17', 0),
(66, 'Agraditya Putra', NULL, NULL, NULL, '08121498148', 'Jl Ujung Menteng', 'Jakarta Veteran National Development University', 'Teknik Informatika', NULL, 'Jakarta', 'Indonesia', 17610, 'I am a dedicated Graphic and UI Designer located in Jakarta with a wealth of experience in thriving startup environments. Currently, I am contributing my creative expertise as a Creative Designer at Maxy Academy, concurrently serving as a part-time UI Designer at Supirin.id ', 31, 'linkedin.com/in/agradityaputra/', NULL, 'coba@gmail.com', '$2y$10$Ca0mq8MlwrBGOrkuD0Y8xeRlSR/qQYQPuPUdrcGi7qffAL9N68/gW', 'profile/66-1705287885.png', 'member', NULL, 2, 100, 68, 0, NULL, '2024-01-15 03:04:45', NULL, 'halo\r\n', '3211020601020987', 'Jamaludin', '4.00', 1, '2023-07-18 01:34:53', 0, '2024-01-15 10:04:45', 0),
(87, 'Jovan Thezar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jovan.maxy.academy@gmail.com', '$2y$10$Y8y21r4BFzMl7t6Bnxeu7uo/nF9osPn2oKe0naP5Skf6xe9g6NzJ6', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-08-07 12:17:29', NULL, NULL, NULL, NULL, NULL, 1, '2023-08-08 02:17:29', 1, '2023-08-08 02:17:29', 1),
(88, 'N A L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nabellleo@gmail.com', '$2y$10$NYGR8VF7.k7iT3MDFwrqd.cVA163xZZG4DNtvDLxBXIvHS1B.iApK', NULL, 'member', NULL, 2, 0, 1, 0, NULL, '2023-08-14 12:04:57', NULL, NULL, NULL, NULL, NULL, 1, '2023-08-15 02:04:57', 1, '2023-08-15 02:04:57', 1),
(89, 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tes@t.t', '$2y$10$otfDR5kCBrwOmS4xj4auR.3RV5ex2QTNn92WCqBrlK0TuX98JGrEq', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2023-11-13 01:42:40', NULL, NULL, NULL, NULL, NULL, 1, '2023-11-13 01:42:40', 0, '2023-11-13 01:42:40', 0),
(90, 'SeeMeCV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'seemecv@mail.com', '$2y$10$oN5dC9wfLOvhIQ8D2DU67O3DDHFvhdw3aigV0.eCvCTk6rZOnioSa', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2023-11-24 02:22:46', NULL, NULL, NULL, NULL, NULL, 1, '2023-11-24 02:22:46', 0, '2023-11-24 02:22:46', 0),
(91, 'Bernard', NULL, NULL, NULL, '25263636', 'brtyhryh', NULL, NULL, NULL, 'bfgnf', 'ntyjntyn', 1313, NULL, 36, NULL, NULL, 'bernard@gmail.com', '$2y$10$xE8GqBrsFXgWENbm8lUjQ.7guXHF9xEgAcHj775DA/m3lBqI1G61u', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2023-11-24 09:36:40', NULL, NULL, NULL, NULL, NULL, 1, '2023-11-24 03:23:37', 0, '2023-11-24 09:36:40', 0),
(92, 'Bro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bro@gmail.com', '$2y$10$vYttmsfwJWv9RM4oie0vLO6uOTmL9ZAlMXL7vCzSHCLyxzlvIbx22', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2023-11-28 01:51:19', NULL, NULL, NULL, NULL, NULL, 1, '2023-11-28 01:51:19', 0, '2023-11-28 01:51:19', 0),
(93, 'Aulia El Ihza Fariz Rafiqi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rafiqthegamers@gmail.com', '$2y$10$J1AB32ABOFOKuxq/kqUGduh3Z3gZLkpPwtisRgcnTPGdjaR30DVE2', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2023-11-28 16:33:39', NULL, NULL, NULL, NULL, NULL, 1, '2023-11-28 16:33:39', 0, '2023-11-28 16:33:39', 0),
(99, 'aliifakamilia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aliifakamilia@gmail.com', '$2y$10$403I.RSTIzq4fdHkuBJbj.y4dUHIZ0HuOp4mwFkeGOB9WzJTofZiO', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2024-01-11 09:29:20', NULL, 'recovery', NULL, NULL, NULL, 1, '2024-01-11 16:26:35', 0, '2024-01-11 16:26:35', 0),
(100, 'chochoirul08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chochoirul08@gmail.com', '$2y$10$JhFv08z8ufiwGHknGHpc6.idblQ1UMPktqwS2fUsy3T/HzqgnnFye', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2024-01-11 09:29:20', NULL, 'recovery', NULL, NULL, NULL, 1, '2024-01-11 16:27:02', 0, '2024-01-11 16:27:02', 0),
(101, 'wildanafriqil09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wildanafriqil09@gmail.com', '$2y$10$/iU7crd/xAAaU94TX4C0JuttZ3Zk8NHvNvtWFnl0KKgqh1Nc64BwO', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2024-01-11 09:29:20', NULL, 'recovery', NULL, NULL, NULL, 1, '2024-01-11 16:27:21', 0, '2024-01-11 16:27:21', 0),
(102, 'syarahnfadlila01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'syarahnfadlila01@gmail.com', '$2y$10$Ig98NFhn4xy8QGyTBRQSIePKvxnmESADXRRnCBQA2SrIj8x82IoPO', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2024-01-11 09:29:20', NULL, 'recovery', NULL, NULL, NULL, 1, '2024-01-11 16:27:33', 0, '2024-01-11 16:27:33', 0),
(103, 'fajarirfnd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fajarirfnd@students.unnes.ac.id', '$2y$10$7XcI2uDqzwmmPeQXXccEEuBRDeCLg/g3QEF/D4HAk37x3QyDcX3Yi', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2024-01-11 09:29:20', NULL, 'recovery', NULL, NULL, NULL, 1, '2024-01-11 16:27:50', 0, '2024-01-11 16:27:50', 0),
(104, 'graceciames', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'graceciames@gmail.com', '$2y$10$nIH6qh.BjAqtVkE7.XkHd.WRZskNPafhmyA.5w5gMlXdPRwRZSQyW', NULL, NULL, NULL, 2, 0, 1, 0, NULL, '2024-01-11 09:29:20', NULL, 'recovery', NULL, NULL, NULL, 1, '2024-01-11 16:28:02', 0, '2024-01-11 16:28:02', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_certification`
--

CREATE TABLE `user_certification` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `id_credential` varchar(255) DEFAULT NULL,
  `url_credential` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_education`
--

CREATE TABLE `user_education` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `fields_of_study` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_education`
--

INSERT INTO `user_education` (`id`, `name`, `degree`, `fields_of_study`, `score`, `start_date`, `end_date`, `user_id`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Trisakti University', 'S. Ds.', 'Visual Communication Design', '3.40', '2013-09-01', '2017-07-31', 66, '<ul><li><span style=\"white-space:pre-wrap;\">Majoring Visual communication</span></li><li><span style=\"white-space:pre-wrap;\">Studied Printing Design, Hand Drawing &amp; Graphic Design</span></li></ul>', 1, '2024-01-06 15:10:34', 66, '2024-01-06 15:10:34', 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_experience`
--

CREATE TABLE `user_experience` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_experience`
--

INSERT INTO `user_experience` (`id`, `name`, `job_type`, `company`, `industry`, `location`, `start_date`, `end_date`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Visual Creative', 'Full Time', 'Maxy Academy', 'tech', 'Jakarta', '2023-01-01', NULL, 66, '<ul><li>Responsible for UI in designing apps</li><li>Work with the brand team to produce new ideas for  company branding, promotional campaigns, and marketing</li><li>Direct brainstorming meetings and creative sessions.</li></ul>', 1, '2024-01-05 16:32:17', '2024-01-05 16:32:18'),
(2, 'UI Designer', 'Full Time', 'Supirin.id', 'service', 'Jakarta', '2021-11-01', NULL, 66, '<ul><li>Responsible for UI in designing apps</li><li>Work with the brand team to produce new ideas for&nbsp;<span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\" id=\"isPasted\">enhancing the visual identity and overall aesthetics of the applications, aligning them with the company\'s brand guidelines and user expectations.</span></li></ul>', 1, '2024-01-06 14:25:04', '2024-01-06 14:25:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_organization`
--

CREATE TABLE `user_organization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_parent`
--

CREATE TABLE `user_parent` (
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `job` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_portfolio`
--

CREATE TABLE `user_portfolio` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_portfolio` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_redeem_code`
--

CREATE TABLE `user_redeem_code` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `redeem_code_id` int(11) NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_redeem_code`
--

INSERT INTO `user_redeem_code` (`id`, `user_id`, `redeem_code_id`, `is_used`, `created_at`, `updated_at`) VALUES
(2, 66, 2, 1, '2024-01-04 13:43:54', '2024-01-05 09:04:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_resume`
--

CREATE TABLE `user_resume` (
  `id` bigint(20) NOT NULL,
  `url_resume` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_skill`
--

CREATE TABLE `user_skill` (
  `id` int(11) NOT NULL,
  `m_skill_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_skill`
--

INSERT INTO `user_skill` (`id`, `m_skill_id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(11, 10, 66, NULL, 1, '2024-01-15 10:59:55', '2024-01-15 10:59:55'),
(12, 11, 66, NULL, 1, '2024-01-15 10:59:55', '2024-01-15 10:59:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_testimonial`
--

CREATE TABLE `user_testimonial` (
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status_highlight` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_class_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_testimonial`
--

INSERT INTO `user_testimonial` (`id`, `stars`, `role`, `status_highlight`, `user_id`, `course_class_id`, `content`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(7, 5, 'Alumni Bootcamp Rapid UI/UX Batch 4', 1, 44, 1, 'Overall saya suka selama mengikuti program UI/UX dan banyak insight baru yang aku tau terkait UI/UX. Pokoknya terima kasih banyak untuk MinMax dan mentor yang selalu respon ketika dihubungi via chat. Video pembelajarannya menarik dan materinya kepake banget saat aku magang sekarang. Walaupun durasi videonya cukup panjang tapi penjelasan step by-stepnya mudah dipahami.', NULL, 1, '2023-07-03 15:40:32', 1, '2023-07-03 15:42:28', 1),
(8, 5, 'Alumni Bootcamp Rapid UI/UX Batch 4', 1, 45, 1, 'Awalnya aku gatau tentang UI/UX sama sekali, aku terbantu setelah mengikuti Bootcamp UI/UX di maxy academy karena jadi tau progress membuat website sampai membuat aplikasi menggunakan Figma.', NULL, 1, '2023-07-03 15:40:32', 1, '2023-07-03 15:42:28', 1),
(9, 5, 'Alumni Bootcamp Rapid UI/UX Batch 4', 1, 46, 1, 'Kebetulan dari dulu aku udah pengen belajar UI/UX. Awalnya aku gatau tentang UI/UX,tapi banyak pengetahuan yang bisa aku ambil melalui bootcamp maxy academy. Pokonya seru banget selama 12 hari itu, kita juga dapet Internship jadi belajar real case langsung.', NULL, 1, '2023-07-03 15:40:32', 1, '2023-07-03 16:26:00', 1),
(10, 1, 'aadadadadadad', 0, 4, 1, 'aa;,dadadad', 'am lsmc;sdalmd', 0, '2023-11-16 08:16:35', 1, '2023-11-16 15:22:13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_transcript`
--

CREATE TABLE `user_transcript` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = not active, 1 = active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_group`
--
ALTER TABLE `access_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `access_group_detail`
--
ALTER TABLE `access_group_detail`
  ADD KEY `fk_access_group_id_access_group_detail` (`access_group_id`),
  ADD KEY `fk_access_master_id_access_group_detail` (`access_master_id`);

--
-- Indeks untuk tabel `access_master`
--
ALTER TABLE `access_master`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_m_course_type_id_course` (`m_course_type_id`),
  ADD KEY `fk_course_package_id_course` (`course_package_id`),
  ADD KEY `fk_m_difficulty_type_id_course` (`m_difficulty_type_id`);

--
-- Indeks untuk tabel `course_class`
--
ALTER TABLE `course_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_id_course_class` (`course_id`);

--
-- Indeks untuk tabel `course_class_member`
--
ALTER TABLE `course_class_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_course_class_member` (`user_id`),
  ADD KEY `fk_course_class_id_course_class_member` (`course_class_id`);

--
-- Indeks untuk tabel `course_class_member_grading`
--
ALTER TABLE `course_class_member_grading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_class_member_id_course_class_member_grading` (`user_id`),
  ADD KEY `fk_course_class_module_id_course_class_member_grading` (`course_class_module_id`),
  ADD KEY `course_class_member_grading_users_id_fk` (`tutor_id`);

--
-- Indeks untuk tabel `course_class_member_log`
--
ALTER TABLE `course_class_member_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_course_class_module_id` (`course_class_module_id`);

--
-- Indeks untuk tabel `course_class_module`
--
ALTER TABLE `course_class_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_module_id_course_class_module` (`course_module_id`),
  ADD KEY `fk_course_class_id_course_class_module` (`course_class_id`);

--
-- Indeks untuk tabel `course_class_module_soal`
--
ALTER TABLE `course_class_module_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_module`
--
ALTER TABLE `course_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_id_course_module` (`course_id`);

--
-- Indeks untuk tabel `course_module_discussion`
--
ALTER TABLE `course_module_discussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_module_id_course_module_discussion` (`course_module_id`);

--
-- Indeks untuk tabel `course_package`
--
ALTER TABLE `course_package`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_package_benefit`
--
ALTER TABLE `course_package_benefit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_package_id_course_package_benefit` (`course_package_id`);

--
-- Indeks untuk tabel `course_partner`
--
ALTER TABLE `course_partner`
  ADD KEY `fk_course_id_course_partner` (`course_id`),
  ADD KEY `fk_company_id_course_partner` (`m_partner_id`);

--
-- Indeks untuk tabel `course_tutor`
--
ALTER TABLE `course_tutor`
  ADD KEY `fk_course_id_course_tutor` (`course_id`),
  ADD KEY `fk_users_id_course_tutor` (`users_id`);

--
-- Indeks untuk tabel `maxy_talk`
--
ALTER TABLE `maxy_talk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_maxy_talk` (`users_id`);

--
-- Indeks untuk tabel `m_bank`
--
ALTER TABLE `m_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_bank_account`
--
ALTER TABLE `m_bank_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_m_bank_account_bank` (`m_bank_id`);

--
-- Indeks untuk tabel `m_bank_soal`
--
ALTER TABLE `m_bank_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_content_carousel`
--
ALTER TABLE `m_content_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_content_carousel_button`
--
ALTER TABLE `m_content_carousel_button`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_m_content_carousel_id_button` (`content_carousel_id`);

--
-- Indeks untuk tabel `m_content_faq`
--
ALTER TABLE `m_content_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_content_page`
--
ALTER TABLE `m_content_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_content_program_step`
--
ALTER TABLE `m_content_program_step`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_content_program_step_button`
--
ALTER TABLE `m_content_program_step_button`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_course_type`
--
ALTER TABLE `m_course_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `m_course_type_slug_unique` (`slug`);

--
-- Indeks untuk tabel `m_difficulty_type`
--
ALTER TABLE `m_difficulty_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_general`
--
ALTER TABLE `m_general`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_partner`
--
ALTER TABLE `m_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_promo`
--
ALTER TABLE `m_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_province`
--
ALTER TABLE `m_province`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_skill`
--
ALTER TABLE `m_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_users_id_fk` (`created_id`),
  ADD KEY `skills_users_id_fk2` (`updated_id`);

--
-- Indeks untuk tabel `no_generator`
--
ALTER TABLE `no_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partner_university_detail`
--
ALTER TABLE `partner_university_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_m_partner_id_partner_university_detail` (`m_partner_id`);

--
-- Indeks untuk tabel `promo_course`
--
ALTER TABLE `promo_course`
  ADD KEY `fk_course_id_promo_course` (`course_id`),
  ADD KEY `fk_m_promo_id_promo_course` (`m_promo_id`);

--
-- Indeks untuk tabel `redeem_code`
--
ALTER TABLE `redeem_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `updated_id` (`updated_id`);

--
-- Indeks untuk tabel `trans_invoice`
--
ALTER TABLE `trans_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trans_order_course_trans_order` (`course_id`),
  ADD KEY `fk_trans_order_course_class_trans_order` (`course_class_id`),
  ADD KEY `fk_trans_order_user_trans_order` (`user_id`),
  ADD KEY `fk_trans_order_course_package_trans_order` (`course_package_id`),
  ADD KEY `fk_trans_order_m_promo_trans_order` (`m_promo_id`);

--
-- Indeks untuk tabel `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trans_order_confirm_trans_order_confirm` (`trans_order_id`),
  ADD KEY `fk_trans_order_confirm_m_bank_account_trans_order_confirm` (`m_bank_account_id`),
  ADD KEY `fk_trans_order_confirm_course_trans_order_confirm` (`course_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_partner_users` (`m_partner_id`),
  ADD KEY `fk_users_access_group_users` (`access_group_id`),
  ADD KEY `fk_m_province_id_users` (`m_province_id`);

--
-- Indeks untuk tabel `user_certification`
--
ALTER TABLE `user_certification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_certification` (`user_id`);

--
-- Indeks untuk tabel `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_education` (`user_id`);

--
-- Indeks untuk tabel `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_experience` (`user_id`);

--
-- Indeks untuk tabel `user_organization`
--
ALTER TABLE `user_organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_organization` (`user_id`);

--
-- Indeks untuk tabel `user_parent`
--
ALTER TABLE `user_parent`
  ADD KEY `fk_users_id_user_parent` (`user_id`);

--
-- Indeks untuk tabel `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_portfolio` (`user_id`);

--
-- Indeks untuk tabel `user_redeem_code`
--
ALTER TABLE `user_redeem_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_redeem_code_course_class_redeem_code_id_fk` (`redeem_code_id`),
  ADD KEY `user_redeem_code_users_id_fk` (`user_id`);

--
-- Indeks untuk tabel `user_resume`
--
ALTER TABLE `user_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_resume_users_id_fk` (`user_id`);

--
-- Indeks untuk tabel `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_skill` (`user_id`),
  ADD KEY `user_skill_m_skill_id_fk` (`m_skill_id`);

--
-- Indeks untuk tabel `user_testimonial`
--
ALTER TABLE `user_testimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_testimonial` (`user_id`),
  ADD KEY `fk_course_class_id_user_testimonial` (`course_class_id`);

--
-- Indeks untuk tabel `user_transcript`
--
ALTER TABLE `user_transcript`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id_user_transcript` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_group`
--
ALTER TABLE `access_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `access_master`
--
ALTER TABLE `access_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `course_class`
--
ALTER TABLE `course_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `course_class_member`
--
ALTER TABLE `course_class_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `course_class_member_grading`
--
ALTER TABLE `course_class_member_grading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `course_class_member_log`
--
ALTER TABLE `course_class_member_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1570;

--
-- AUTO_INCREMENT untuk tabel `course_class_module`
--
ALTER TABLE `course_class_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT untuk tabel `course_class_module_soal`
--
ALTER TABLE `course_class_module_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `course_module`
--
ALTER TABLE `course_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT untuk tabel `course_module_discussion`
--
ALTER TABLE `course_module_discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `course_package`
--
ALTER TABLE `course_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `course_package_benefit`
--
ALTER TABLE `course_package_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `maxy_talk`
--
ALTER TABLE `maxy_talk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_bank`
--
ALTER TABLE `m_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `m_bank_account`
--
ALTER TABLE `m_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_bank_soal`
--
ALTER TABLE `m_bank_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `m_content_carousel`
--
ALTER TABLE `m_content_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_content_carousel_button`
--
ALTER TABLE `m_content_carousel_button`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_content_faq`
--
ALTER TABLE `m_content_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `m_content_page`
--
ALTER TABLE `m_content_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `m_content_program_step`
--
ALTER TABLE `m_content_program_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_content_program_step_button`
--
ALTER TABLE `m_content_program_step_button`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_course_type`
--
ALTER TABLE `m_course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_difficulty_type`
--
ALTER TABLE `m_difficulty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_general`
--
ALTER TABLE `m_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `m_partner`
--
ALTER TABLE `m_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT untuk tabel `m_promo`
--
ALTER TABLE `m_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_province`
--
ALTER TABLE `m_province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `m_skill`
--
ALTER TABLE `m_skill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `no_generator`
--
ALTER TABLE `no_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `partner_university_detail`
--
ALTER TABLE `partner_university_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `redeem_code`
--
ALTER TABLE `redeem_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `trans_invoice`
--
ALTER TABLE `trans_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6439;

--
-- AUTO_INCREMENT untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `user_certification`
--
ALTER TABLE `user_certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_portfolio`
--
ALTER TABLE `user_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_redeem_code`
--
ALTER TABLE `user_redeem_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_resume`
--
ALTER TABLE `user_resume`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_skill`
--
ALTER TABLE `user_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_testimonial`
--
ALTER TABLE `user_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_transcript`
--
ALTER TABLE `user_transcript`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `access_group_detail`
--
ALTER TABLE `access_group_detail`
  ADD CONSTRAINT `fk_access_group_id_access_group_detail` FOREIGN KEY (`access_group_id`) REFERENCES `access_group` (`id`),
  ADD CONSTRAINT `fk_access_master_id_access_group_detail` FOREIGN KEY (`access_master_id`) REFERENCES `access_master` (`id`);

--
-- Ketidakleluasaan untuk tabel `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_package_id_course` FOREIGN KEY (`course_package_id`) REFERENCES `course_package` (`id`),
  ADD CONSTRAINT `fk_m_course_type_id_course` FOREIGN KEY (`m_course_type_id`) REFERENCES `m_course_type` (`id`),
  ADD CONSTRAINT `fk_m_difficulty_type_id_course` FOREIGN KEY (`m_difficulty_type_id`) REFERENCES `m_difficulty_type` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_class`
--
ALTER TABLE `course_class`
  ADD CONSTRAINT `fk_course_id_course_class` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_class_member`
--
ALTER TABLE `course_class_member`
  ADD CONSTRAINT `fk_course_class_id_course_class_member` FOREIGN KEY (`course_class_id`) REFERENCES `course_class` (`id`),
  ADD CONSTRAINT `fk_user_id_course_class_member` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_class_member_grading`
--
ALTER TABLE `course_class_member_grading`
  ADD CONSTRAINT `course_class_member_grading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_class_member_grading_users_id_fk` FOREIGN KEY (`tutor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_course_class_module_id_course_class_member_grading` FOREIGN KEY (`course_class_module_id`) REFERENCES `course_class_module` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `course_class_member_log`
--
ALTER TABLE `course_class_member_log`
  ADD CONSTRAINT `fk_course_class_module_id` FOREIGN KEY (`course_class_module_id`) REFERENCES `course_class_module` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_class_module`
--
ALTER TABLE `course_class_module`
  ADD CONSTRAINT `fk_course_class_id_course_class_module` FOREIGN KEY (`course_class_id`) REFERENCES `course_class` (`id`),
  ADD CONSTRAINT `fk_course_module_id_course_class_module` FOREIGN KEY (`course_module_id`) REFERENCES `course_module` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_module`
--
ALTER TABLE `course_module`
  ADD CONSTRAINT `fk_course_id_course_module` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_module_discussion`
--
ALTER TABLE `course_module_discussion`
  ADD CONSTRAINT `fk_course_module_id_course_module_discussion` FOREIGN KEY (`course_module_id`) REFERENCES `course_module` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_package_benefit`
--
ALTER TABLE `course_package_benefit`
  ADD CONSTRAINT `fk_course_package_id_course_package_benefit` FOREIGN KEY (`course_package_id`) REFERENCES `course_package` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_partner`
--
ALTER TABLE `course_partner`
  ADD CONSTRAINT `fk_company_id_course_partner` FOREIGN KEY (`m_partner_id`) REFERENCES `m_partner` (`id`),
  ADD CONSTRAINT `fk_course_id_course_partner` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_tutor`
--
ALTER TABLE `course_tutor`
  ADD CONSTRAINT `fk_course_id_course_tutor` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_users_id_course_tutor` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `maxy_talk`
--
ALTER TABLE `maxy_talk`
  ADD CONSTRAINT `fk_users_id_maxy_talk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `m_bank_account`
--
ALTER TABLE `m_bank_account`
  ADD CONSTRAINT `fk_m_bank_account_bank` FOREIGN KEY (`m_bank_id`) REFERENCES `m_bank` (`id`);

--
-- Ketidakleluasaan untuk tabel `m_content_carousel_button`
--
ALTER TABLE `m_content_carousel_button`
  ADD CONSTRAINT `fk_m_content_carousel_id_button` FOREIGN KEY (`content_carousel_id`) REFERENCES `m_content_carousel` (`id`);

--
-- Ketidakleluasaan untuk tabel `m_skill`
--
ALTER TABLE `m_skill`
  ADD CONSTRAINT `skills_users_id_fk` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `skills_users_id_fk2` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `partner_university_detail`
--
ALTER TABLE `partner_university_detail`
  ADD CONSTRAINT `fk_m_partner_id_partner_university_detail` FOREIGN KEY (`m_partner_id`) REFERENCES `m_partner` (`id`);

--
-- Ketidakleluasaan untuk tabel `promo_course`
--
ALTER TABLE `promo_course`
  ADD CONSTRAINT `fk_course_id_promo_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_m_promo_id_promo_course` FOREIGN KEY (`m_promo_id`) REFERENCES `m_promo` (`id`);

--
-- Ketidakleluasaan untuk tabel `redeem_code`
--
ALTER TABLE `redeem_code`
  ADD CONSTRAINT `redeem_code_ibfk_1` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `redeem_code_ibfk_2` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD CONSTRAINT `fk_trans_order_course_class_trans_order` FOREIGN KEY (`course_class_id`) REFERENCES `course_class` (`id`),
  ADD CONSTRAINT `fk_trans_order_course_package_trans_order` FOREIGN KEY (`course_package_id`) REFERENCES `course_package` (`id`),
  ADD CONSTRAINT `fk_trans_order_course_trans_order` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_trans_order_m_promo_trans_order` FOREIGN KEY (`m_promo_id`) REFERENCES `m_promo` (`id`),
  ADD CONSTRAINT `fk_trans_order_user_trans_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
  ADD CONSTRAINT `fk_trans_order_confirm_course_trans_order_confirm` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_trans_order_confirm_m_bank_account_trans_order_confirm` FOREIGN KEY (`m_bank_account_id`) REFERENCES `m_bank_account` (`id`),
  ADD CONSTRAINT `fk_trans_order_confirm_trans_order_confirm` FOREIGN KEY (`trans_order_id`) REFERENCES `trans_order` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_m_province_id_users` FOREIGN KEY (`m_province_id`) REFERENCES `m_province` (`id`),
  ADD CONSTRAINT `fk_users_access_group_users` FOREIGN KEY (`access_group_id`) REFERENCES `access_group` (`id`),
  ADD CONSTRAINT `fk_users_partner_users` FOREIGN KEY (`m_partner_id`) REFERENCES `m_partner` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_certification`
--
ALTER TABLE `user_certification`
  ADD CONSTRAINT `fk_users_id_user_certification` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `fk_users_id_user_education` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_experience`
--
ALTER TABLE `user_experience`
  ADD CONSTRAINT `fk_users_id_user_experience` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_organization`
--
ALTER TABLE `user_organization`
  ADD CONSTRAINT `fk_users_id_user_organization` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_parent`
--
ALTER TABLE `user_parent`
  ADD CONSTRAINT `fk_users_id_user_parent` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD CONSTRAINT `fk_users_id_user_portfolio` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_redeem_code`
--
ALTER TABLE `user_redeem_code`
  ADD CONSTRAINT `user_redeem_code_course_class_redeem_code_id_fk` FOREIGN KEY (`redeem_code_id`) REFERENCES `redeem_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_redeem_code_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_resume`
--
ALTER TABLE `user_resume`
  ADD CONSTRAINT `user_resume_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `fk_users_id_user_skill` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_skill_m_skill_id_fk` FOREIGN KEY (`m_skill_id`) REFERENCES `m_skill` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_testimonial`
--
ALTER TABLE `user_testimonial`
  ADD CONSTRAINT `fk_course_class_id_user_testimonial` FOREIGN KEY (`course_class_id`) REFERENCES `course_class` (`id`),
  ADD CONSTRAINT `fk_users_id_user_testimonial` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_transcript`
--
ALTER TABLE `user_transcript`
  ADD CONSTRAINT `fk_users_id_user_transcript` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
