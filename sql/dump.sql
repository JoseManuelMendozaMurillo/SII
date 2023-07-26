-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db_correcaminos
-- Generation Time: Jul 25, 2023 at 07:24 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `control_escolar`
--
DROP DATABASE IF EXISTS `control_escolar`;
CREATE DATABASE IF NOT EXISTS `control_escolar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `control_escolar`;

-- --------------------------------------------------------

--
-- Table structure for table `Alumnos`
--

DROP TABLE IF EXISTS `Alumnos`;
CREATE TABLE `Alumnos` (
  `id_alumno` int NOT NULL COMMENT 'Idnetificador del alumno',
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Nombre del alumno',
  `num_control` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Numero de control del alumno',
  `id_carrera` int NOT NULL,
  `semestre` int NOT NULL,
  `id_grupo` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `Alumnos`
--

INSERT INTO `Alumnos` (`id_alumno`, `nombre`, `num_control`, `id_carrera`, `semestre`, `id_grupo`) VALUES
(1, 'Jose Manuel Mendoza Murillo', '19630306', 2, 4, 11),
(2, 'Israel Ruíz Torres', '19630356', 1, 2, 5),
(9, 'Jose Manuel', '11111111', 3, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id_alumno` int UNSIGNED NOT NULL,
  `no_control` varchar(9) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `id_reticula` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(3, 5, 'bossdepartment', '2023-06-19 20:51:58'),
(4, 6, 'superadmin', '2023-06-19 21:15:13'),
(5, 7, 'master', '2023-06-19 21:16:18'),
(6, 8, 'student', '2023-06-19 21:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `auth_identities`
--

DROP TABLE IF EXISTS `auth_identities`;
CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(5, 5, 'email_password', NULL, 'L19630306@ocotlan.tecnm.mx', '$2y$10$CkjzkRwvl7cFmOP8/Ij7pO5fZ/wCLl.2WWg61zyTsLwhAuTl1QceS', NULL, NULL, 0, '2023-06-24 01:23:17', '2023-06-19 20:51:58', '2023-06-24 01:23:17'),
(6, 6, 'email_password', NULL, 'trokillox.x@gmail.com', '$2y$10$f8myOA4IbWu2pnGI0g3HheUZyi6aJXS1t46tlQQv1fQOoxIeF765i', NULL, NULL, 0, '2023-06-30 22:02:50', '2023-06-19 21:15:13', '2023-06-30 22:02:50'),
(7, 7, 'email_password', NULL, '19630306@itocotlan.com', '$2y$10$0KpiYhFVnTNJctaHPwoGDeUNwSCDAukHiTnnKEqUq8DZSUY2tibPm', NULL, NULL, 0, '2023-06-27 06:01:26', '2023-06-19 21:16:18', '2023-06-27 06:01:26'),
(8, 8, 'email_password', NULL, 'jose.manuel.mendoza.murillo@gmail.com', '$2y$10$iyeWuy8EMq.xTRxMBFgttOBaB4T.yat1GGB1X0DFAJxh2QfWYvwGC', NULL, NULL, 0, '2023-06-27 06:21:52', '2023-06-19 21:23:42', '2023-06-27 06:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 1, '2023-06-18 20:05:53', 1),
(2, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 1, '2023-06-18 20:06:17', 1),
(3, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'L19630306@ocotlan.tecnm.mx', 5, '2023-06-19 21:12:32', 1),
(4, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'L19630306@ocotlan.tecnm.mx', 5, '2023-06-19 21:14:33', 1),
(5, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-19 21:15:28', 1),
(6, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'L19630306@ocotlan.tecnm.mx', 5, '2023-06-19 21:15:39', 1),
(7, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', '19630306@itocotlan.com', 7, '2023-06-19 21:16:31', 1),
(8, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-19 21:23:59', 1),
(9, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-19 21:39:50', 1),
(10, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-19 21:57:44', 1),
(11, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-19 22:09:30', 1),
(12, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-19 22:10:34', 1),
(13, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-20 16:18:12', 1),
(14, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-20 16:23:55', 1),
(15, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-20 16:25:47', 1),
(16, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-20 16:27:25', 1),
(17, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-20 16:34:29', 1),
(18, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-20 16:56:20', 1),
(19, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-20 17:08:55', 1),
(20, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-20 17:15:34', 1),
(21, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'L19630306@ocotlan.tecnm.mx', 5, '2023-06-20 17:33:27', 1),
(22, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-20 17:34:00', 1),
(23, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', '19630306@itocotlan.com', 7, '2023-06-20 17:34:30', 1),
(24, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-20 17:35:20', 1),
(25, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-20 21:34:34', 1),
(26, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-22 13:30:09', 1),
(27, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-22 13:48:20', 1),
(28, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-22 13:52:21', 0),
(29, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-22 13:55:51', 0),
(30, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-22 13:56:06', 1),
(31, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-22 13:56:18', 0),
(32, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-22 14:00:13', 0),
(33, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-22 14:00:23', 1),
(34, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-22 14:00:43', 1),
(35, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-22 14:10:40', 1),
(36, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', '19630306@itocotlan.com', 7, '2023-06-22 14:13:06', 1),
(37, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-22 14:17:08', 1),
(38, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-22 14:17:39', 1),
(39, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-24 01:13:22', 0),
(40, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-24 01:13:32', 1),
(41, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', '19630306@itocotlan.com', 7, '2023-06-24 01:16:46', 1),
(42, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-24 01:21:33', 1),
(43, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', '19630306@itocotlan.com', 7, '2023-06-24 01:22:37', 1),
(44, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'L19630306@ocotlan.tecnm.mx', 5, '2023-06-24 01:23:17', 1),
(45, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-24 01:24:07', 1),
(46, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-27 05:14:43', 1),
(47, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 05:15:22', 1),
(48, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 05:22:46', 1),
(49, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-27 05:23:06', 0),
(50, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-27 05:23:21', 0),
(51, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-27 05:23:37', 1),
(52, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 05:46:28', 1),
(53, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-27 05:47:24', 1),
(54, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', '19630306@itocotlan.com', 7, '2023-06-27 06:01:26', 1),
(55, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 06:04:27', 1),
(56, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 06:04:57', 1),
(57, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 06:06:43', 1),
(58, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-27 06:20:51', 1),
(59, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', NULL, '2023-06-27 06:21:30', 0),
(60, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'jose.manuel.mendoza.murillo@gmail.com', 8, '2023-06-27 06:21:52', 1),
(61, '172.18.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'email_password', 'trokillox.x@gmail.com', 6, '2023-06-30 22:02:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions_users`
--

DROP TABLE IF EXISTS `auth_permissions_users`;
CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_remember_tokens`
--

DROP TABLE IF EXISTS `auth_remember_tokens`;
CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token_logins`
--

DROP TABLE IF EXISTS `auth_token_logins`;
CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `Carreras`
--

DROP TABLE IF EXISTS `Carreras`;
CREATE TABLE `Carreras` (
  `id_carrera` int NOT NULL COMMENT 'Identificador de la carrera',
  `carrera` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Nombre de la carrera',
  `semestres` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Semestres de la carrera'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `Carreras`
--

INSERT INTO `Carreras` (`id_carrera`, `carrera`, `semestres`) VALUES
(1, 'Ingeniería en Sistemas Computacionales', '9'),
(2, 'Ingeniería en Logistica', '9'),
(3, 'Ingeniería en Electromecanica', '9'),
(4, 'Ingeniería Industrial', '9'),
(5, 'Ingeniería en Gestion Empresarial', '9'),
(6, 'Contador Publico', '9');

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE `carreras` (
  `id_carrera` int UNSIGNED NOT NULL,
  `nombre_carrera` varchar(255) NOT NULL,
  `clave_oficial` char(8) NOT NULL,
  `clave` varchar(8) DEFAULT NULL,
  `siglas` varchar(3) DEFAULT NULL,
  `carga_maxima` int DEFAULT NULL,
  `carga_minima` int DEFAULT NULL,
  `creditos_totales` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `clave_oficial`, `clave`, `siglas`, `carga_maxima`, `carga_minima`, `creditos_totales`) VALUES
(1, 'Ingeniería en Sistemas Computacionales', 'ISCTEC', 'ISCTECNM', 'ISC', 200, 35, 45),
(2, 'Ingeniería Logística', 'ILTEC', 'ILTECNM', 'IL', 200, 15, 45),
(3, 'Ingeniería Electromecánica', 'IETEC', 'IETECNM', 'IE', 200, 35, 65),
(4, 'Ingeniería Gestión Empresarial', 'IGETEC', 'IGETECNM', 'IGE', 200, 35, 45),
(5, 'Ingeniería Industrial', 'IITEC', 'IITECNM', 'II', 200, 35, 85),
(6, 'Contador publico', 'LCTEC', 'LCTECNM', 'LC', 200, 25, 55);

-- --------------------------------------------------------

--
-- Table structure for table `combalidaciones`
--

DROP TABLE IF EXISTS `combalidaciones`;
CREATE TABLE `combalidaciones` (
  `id_materia` int UNSIGNED DEFAULT NULL,
  `id_materia_combalidada` int UNSIGNED DEFAULT NULL,
  `porcentaje` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `combalidaciones`
--

INSERT INTO `combalidaciones` (`id_materia`, `id_materia_combalidada`, `porcentaje`) VALUES
(47, 57, 91);

-- --------------------------------------------------------

--
-- Stand-in structure for view `datos_alumnos`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `datos_alumnos`;
CREATE TABLE `datos_alumnos` (
`id` int
,`nombre` varchar(50)
,`num_control` varchar(9)
,`carrera` varchar(50)
,`semestre` int
,`grupo` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades` (
  `id_especialidad` int UNSIGNED NOT NULL,
  `nombre_especialidad` varchar(255) DEFAULT NULL,
  `clave` char(1) DEFAULT NULL,
  `clave_oficial` char(1) DEFAULT NULL,
  `creditos_totales` int DEFAULT NULL,
  `nombre_reducido` char(1) DEFAULT NULL,
  `siglas` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre_especialidad`, `clave`, `clave_oficial`, `creditos_totales`, `nombre_reducido`, `siglas`) VALUES
(1, 'Desarrollo para la Web y Aplicaciones para Dispositivos Móviles', '1', '1', 45, '1', 'WYM'),
(2, 'Analisis de datos', '2', '2', 45, '2', 'AD');

-- --------------------------------------------------------

--
-- Table structure for table `Grupos`
--

DROP TABLE IF EXISTS `Grupos`;
CREATE TABLE `Grupos` (
  `id_grupo` int NOT NULL COMMENT 'Identificador del grupo',
  `id_carrera` int NOT NULL COMMENT 'Clave foranea',
  `semestre` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Semestre del grupo',
  `identificador` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Identificador del grupo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `Grupos`
--

INSERT INTO `Grupos` (`id_grupo`, `id_carrera`, `semestre`, `identificador`) VALUES
(1, 1, '8', 'Unico'),
(2, 1, '6', 'Unico'),
(3, 1, '4', 'A'),
(4, 1, '4', 'B'),
(5, 1, '2', 'A'),
(6, 1, '2', 'B'),
(7, 2, '8', 'A'),
(8, 2, '8', 'B'),
(9, 2, '6', 'A'),
(10, 2, '6', 'B'),
(11, 2, '4', 'A'),
(12, 2, '4', 'B'),
(13, 2, '2', 'A'),
(14, 2, '2', 'B'),
(15, 3, '8', 'Unico'),
(16, 3, '6', 'Unico'),
(17, 3, '4', 'A'),
(18, 3, '4', 'B'),
(19, 3, '2', 'A'),
(20, 3, '2', 'B'),
(21, 4, '8', 'Unico'),
(22, 4, '6', 'Unico'),
(23, 4, '4', 'A'),
(24, 4, '4', 'B'),
(25, 4, '2', 'A'),
(26, 4, '2', 'B'),
(27, 5, '8', 'Unico'),
(28, 5, '6', 'A'),
(29, 5, '6', 'B'),
(30, 5, '4', 'A'),
(31, 5, '4', 'B'),
(32, 5, '2', 'A'),
(33, 5, '2', 'B'),
(34, 6, '8', 'Unico'),
(35, 6, '6', 'A'),
(36, 6, '6', 'B'),
(37, 6, '4', 'A'),
(38, 6, '4', 'B'),
(39, 6, '2', 'A'),
(40, 6, '2', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE `materias` (
  `id_materia` int UNSIGNED NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `nombre_abreviado_materia` varchar(255) DEFAULT NULL,
  `id_tipo_materia` int UNSIGNED NOT NULL,
  `asociada_carrera` int UNSIGNED DEFAULT NULL,
  `asociada_especialidad` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `nombre_abreviado_materia`, `id_tipo_materia`, `asociada_carrera`, `asociada_especialidad`) VALUES
(1, 'Cálculo Diferencial', 'CD', 1, NULL, NULL),
(2, 'Fundamentos de Programación', 'FP', 2, 1, NULL),
(3, 'Taller de Ética', 'TE', 1, NULL, NULL),
(4, 'Matemáticas Discretas', 'MD', 2, 1, NULL),
(5, 'Taller de Administración', 'TA', 1, NULL, NULL),
(6, 'Fundamentos de Investigación', 'FI', 1, NULL, NULL),
(7, 'Cálculo Integral', 'CI', 1, NULL, NULL),
(8, 'Programación Orientada a Objetos', 'POO', 2, 1, NULL),
(9, 'Contabilidad Financiera', 'CF', 1, NULL, NULL),
(10, 'Química', 'Q', 1, NULL, NULL),
(11, 'Algebra Lineal', 'AL', 1, NULL, NULL),
(12, 'Probabilidad y Estadística', 'PE', 1, NULL, NULL),
(13, 'Cálculo Vectorial', 'CV', 1, NULL, NULL),
(14, 'Estructuras de Datos', 'ED', 2, 1, NULL),
(15, 'Cultura Empresarial', 'CE', 1, NULL, NULL),
(16, 'Investigacion de Operaciones', 'IO Sis', 2, 1, NULL),
(17, 'Desarrollo Sustentable', 'DS', 1, NULL, NULL),
(18, 'Física General', 'FG', 1, NULL, NULL),
(19, 'Ecuaciones Diferenciales', 'ED', 1, NULL, NULL),
(20, 'Métodos Númericos', 'MN', 1, NULL, NULL),
(21, 'Tópicos Avanzados de Programación', 'TAP', 2, 1, NULL),
(22, 'Fundamentos de Bases de Datos', 'FBD', 2, 1, NULL),
(23, 'Simulación', 'SM', 1, NULL, NULL),
(24, 'Principios Electricos y Aplicaciones Digitales', 'PEAD', 2, 1, NULL),
(25, 'Arquitectura de Computadoras', 'AC', 2, 1, NULL),
(26, 'Graficación', 'GR', 2, 1, NULL),
(27, 'Lenguajes y Automatas 1', 'LA1', 2, 1, NULL),
(28, 'Programación Lógica y Funcional', 'PLF', 2, 1, NULL),
(29, 'Fundamentos de Telecomunicaciones', 'FT', 2, 1, NULL),
(30, 'Sistemas Operativos', 'SO', 2, 1, NULL),
(31, 'Taller de Bases de Datos', 'TBD', 2, 1, NULL),
(32, 'Fundamentos de Ingeniería de Software', 'FIS', 2, 1, NULL),
(33, 'Tecnologias de Desarrollo para Dispositivos Moviles', 'TDDM', 3, NULL, 2),
(34, 'Lenguajes y Automatas 2', 'LA2	', 2, 1, NULL),
(35, 'Redes de Computadoras', 'RC', 2, 1, NULL),
(36, 'Taller de Sistemas Operativos', 'TSO', 2, 1, NULL),
(37, 'Administración de Bases de Datos', 'ABD', 2, 1, NULL),
(38, 'Ingeniería de Software', 'IS', 2, 1, NULL),
(39, 'Lenguajes de Interfaz', 'LI', 2, 1, NULL),
(40, 'Computación en la Nube', 'CN', 3, NULL, 2),
(41, 'Inteligencia Artificial', 'IA', 2, 1, NULL),
(42, 'Programación Web', 'PWEB', 2, 1, NULL),
(43, 'Conmutación y Enrutamiento en Redes de Datos', 'CERD', 2, 1, NULL),
(44, 'Taller de Investigación 1', 'TI1', 1, NULL, NULL),
(45, 'Gestión de Proyectos de Software', 'GPS', 2, 1, NULL),
(46, 'Sistemas Programables', 'SP', 2, 1, NULL),
(47, 'Sistemas de Gestión de Contenidos de Software Libre', 'SGCSL', 3, NULL, 2),
(48, 'Herramientas Emergentes para Desarrollo en la Web', 'HEDW', 3, NULL, 2),
(49, 'Ingeniería de los Datos', 'ID', 3, NULL, 2),
(50, 'Administración de Redes', 'AR', 2, 1, NULL),
(51, 'Taller de Investigación 2', 'TI2', 1, NULL, NULL),
(52, 'Residencias Profesionales', 'RP', 1, NULL, NULL),
(53, 'Servicio Social', 'SS', 1, NULL, NULL),
(54, 'Actividades Complementarias', 'AC', 1, NULL, NULL),
(55, 'Taller de programación de dispositivos móviles con Android', 'TPDMA', 3, NULL, 1),
(56, 'Tópicos Avanzados de Programación con Dispositivos Móviles e Interfaces', 'TAPDMI', 3, NULL, 1),
(57, 'Gestores  de  contenido  CMS  de  software libre', 'CMS', 3, NULL, 1),
(58, 'Programación Web para Dispositivos Móviles', 'PWDM', 3, NULL, 1),
(59, 'Herramientas Emergentes para la Web', 'HEW', 3, NULL, 1),
(60, 'Investigacion de Operaciones Induatrial', 'IO Indus', 2, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materias_reticula`
--

DROP TABLE IF EXISTS `materias_reticula`;
CREATE TABLE `materias_reticula` (
  `id_reticula` int UNSIGNED DEFAULT NULL,
  `id_materia` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materias_reticula`
--

INSERT INTO `materias_reticula` (`id_reticula`, `id_materia`) VALUES
(1, 1),
(1, 2),
(1, 3),
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
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 55),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 54),
(2, 56),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 57),
(2, 59),
(2, 58),
(2, 50),
(2, 51),
(2, 53),
(2, 52);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1686888187, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1686888187, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1686888187, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reticulas`
--

DROP TABLE IF EXISTS `reticulas`;
CREATE TABLE `reticulas` (
  `id_reticula` int UNSIGNED NOT NULL,
  `nombre_reticula` varchar(255) DEFAULT NULL,
  `id_carrera` int UNSIGNED DEFAULT NULL,
  `id_especialidad` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reticulas`
--

INSERT INTO `reticulas` (`id_reticula`, `nombre_reticula`, `id_carrera`, `id_especialidad`) VALUES
(1, 'Sistemas DWADM', 1, 2),
(2, 'Sistemas AD', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_materia`
--

DROP TABLE IF EXISTS `tipos_materia`;
CREATE TABLE `tipos_materia` (
  `id_tipo_materia` int UNSIGNED NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipos_materia`
--

INSERT INTO `tipos_materia` (`id_tipo_materia`, `Descripcion`) VALUES
(1, 'Universal'),
(2, 'Carrera'),
(3, 'Especialidad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Werin', NULL, NULL, 1, NULL, '2023-06-19 20:51:58', '2023-06-19 20:51:58', NULL),
(6, 'Jose', NULL, NULL, 1, NULL, '2023-06-19 21:15:13', '2023-06-19 21:15:13', NULL),
(7, 'Octavio', NULL, NULL, 1, NULL, '2023-06-19 21:16:18', '2023-06-19 21:16:18', NULL),
(8, 'Charraz', NULL, NULL, 1, NULL, '2023-06-19 21:23:42', '2023-06-19 21:23:42', NULL);

-- --------------------------------------------------------

--
-- Structure for view `datos_alumnos`
--
DROP TABLE IF EXISTS `datos_alumnos`;

DROP VIEW IF EXISTS `datos_alumnos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `datos_alumnos`  AS SELECT `a`.`id_alumno` AS `id`, `a`.`nombre` AS `nombre`, `a`.`num_control` AS `num_control`, `c`.`carrera` AS `carrera`, `a`.`semestre` AS `semestre`, `g`.`identificador` AS `grupo` FROM ((`Alumnos` `a` join `Carreras` `c` on((`c`.`id_carrera` = `a`.`id_carrera`))) join `Grupos` `g` on((`g`.`id_grupo` = `a`.`id_grupo`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `num_control` (`num_control`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `no_control` (`no_control`),
  ADD KEY `fk_alum_idesp_rets_idesp` (`id_reticula`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Carreras`
--
ALTER TABLE `Carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`),
  ADD UNIQUE KEY `clave_oficial` (`clave_oficial`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `siglas` (`siglas`);

--
-- Indexes for table `combalidaciones`
--
ALTER TABLE `combalidaciones`
  ADD KEY `fk_comb_idmat_mats_idmat` (`id_materia`),
  ADD KEY `fk_comb_idmatcom_mats_idmat` (`id_materia_combalidada`);

--
-- Indexes for table `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indexes for table `Grupos`
--
ALTER TABLE `Grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `fk_mats_idtipmat_tipsmat_idtipmat` (`id_tipo_materia`),
  ADD KEY `fk_mats_asocarr_carrs_idcarr` (`asociada_carrera`),
  ADD KEY `fk_mats_asoesp_esps_idesp` (`asociada_especialidad`);

--
-- Indexes for table `materias_reticula`
--
ALTER TABLE `materias_reticula`
  ADD KEY `fk_matsret_idret_rets_idret` (`id_reticula`),
  ADD KEY `fk_matsret_idmat_mats_idmat` (`id_materia`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reticulas`
--
ALTER TABLE `reticulas`
  ADD PRIMARY KEY (`id_reticula`),
  ADD KEY `fk_rets_idcarr_carrs_idcarr` (`id_carrera`),
  ADD KEY `fk_rets_idesp_esps_idesp` (`id_especialidad`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos_materia`
--
ALTER TABLE `tipos_materia`
  ADD PRIMARY KEY (`id_tipo_materia`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Alumnos`
--
ALTER TABLE `Alumnos`
  MODIFY `id_alumno` int NOT NULL AUTO_INCREMENT COMMENT 'Idnetificador del alumno', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Carreras`
--
ALTER TABLE `Carreras`
  MODIFY `id_carrera` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la carrera', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Grupos`
--
ALTER TABLE `Grupos`
  MODIFY `id_grupo` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del grupo', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reticulas`
--
ALTER TABLE `reticulas`
  MODIFY `id_reticula` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_materia`
--
ALTER TABLE `tipos_materia`
  MODIFY `id_tipo_materia` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alum_idesp_rets_idesp` FOREIGN KEY (`id_reticula`) REFERENCES `reticulas` (`id_reticula`);

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `combalidaciones`
--
ALTER TABLE `combalidaciones`
  ADD CONSTRAINT `fk_comb_idmat_mats_idmat` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `fk_comb_idmatcom_mats_idmat` FOREIGN KEY (`id_materia_combalidada`) REFERENCES `materias` (`id_materia`);

--
-- Constraints for table `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `fk_mats_asocarr_carrs_idcarr` FOREIGN KEY (`asociada_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `fk_mats_asoesp_esps_idesp` FOREIGN KEY (`asociada_especialidad`) REFERENCES `especialidades` (`id_especialidad`),
  ADD CONSTRAINT `fk_mats_idtipmat_tipsmat_idtipmat` FOREIGN KEY (`id_tipo_materia`) REFERENCES `tipos_materia` (`id_tipo_materia`);

--
-- Constraints for table `materias_reticula`
--
ALTER TABLE `materias_reticula`
  ADD CONSTRAINT `fk_matsret_idmat_mats_idmat` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `fk_matsret_idret_rets_idret` FOREIGN KEY (`id_reticula`) REFERENCES `reticulas` (`id_reticula`);

--
-- Constraints for table `reticulas`
--
ALTER TABLE `reticulas`
  ADD CONSTRAINT `fk_rets_idcarr_carrs_idcarr` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `fk_rets_idesp_esps_idesp` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
