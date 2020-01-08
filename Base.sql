-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 08, 2020 at 07:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `salasittg`
--
CREATE DATABASE IF NOT EXISTS `salasittg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `salasittg`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `proyector` tinyint(1) NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sala_id` bigint(20) UNSIGNED DEFAULT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `projector_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_sala_id_foreign` (`sala_id`),
  KEY `events_usuario_id_foreign` (`usuario_id`),
  KEY `events_status_id_foreign` (`status_id`),
  KEY `events_projector_id_foreign` (`projector_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nombre`, `descripcion`, `fecha`, `hora_inicio`, `hora_final`, `proyector`, `estado`, `activo`, `created_at`, `updated_at`, `sala_id`, `usuario_id`, `status_id`, `projector_id`) VALUES
(1, 'nuevo ch', 'ejemplo', '2020-01-08', '10:00:00', '15:00:00', 1, 'confirmado', 1, '2020-01-08 06:00:00', '2020-01-07 16:22:38', 1, 1, 4, 1),
(12, 'Proyecto X', 'aaa', '2020-01-08', '10:20:15', '11:05:15', 0, 'no confirmado', 0, '2020-01-07 15:21:42', '2020-01-08 06:12:30', 1, 1, 3, NULL),
(13, 'Modificado', 'Modificado', '2020-01-09', '10:40:45', '11:40:45', 0, 'no confirmado', 1, '2020-01-07 15:38:23', '2020-01-08 06:13:16', 1, 1, 7, NULL),
(14, 'aaaa', 'aaa', '2020-01-06', '08:50:45', '14:50:45', 0, 'no confirmado', 0, '2020-01-07 16:48:23', '2020-01-08 06:46:06', 1, 1, 2, NULL),
(15, 'aa', 'aaa', '2020-01-06', '11:00:00', '17:00:00', 0, '', 1, '2020-01-08 06:00:00', '2019-12-30 06:00:00', 1, 1, 2, 1),
(16, 'aaaa', 'aaa', '2020-01-15', '18:45:00', '19:45:00', 0, 'no confirmado', 1, '2020-01-08 06:45:34', '2020-01-08 06:52:24', 4, 1, 3, NULL),
(17, 'aaaa', 'aaa', '2020-01-15', '09:55:00', '10:55:00', 0, 'no confirmado', 1, '2020-01-08 06:57:18', '2020-01-08 06:57:18', 4, 3, 2, NULL),
(18, 'Evento Borraz', 'Conferencia del inge Borraz', '2020-01-08', '09:00:00', '12:00:00', 0, 'no confirmado', 1, '2020-01-08 08:37:42', '2020-01-08 08:37:42', 4, 4, 2, NULL),
(19, 'Evento azu', 'Descripción', '2020-01-30', '12:00:00', '18:00:00', 1, 'no confirmado', 1, '2020-01-08 08:44:19', '2020-01-08 08:49:49', 1, 5, 2, NULL),
(20, 'ejemplo', 'ejemplo', '2020-01-10', '11:40:45', '15:40:45', 1, 'no confirmado', 1, '2020-01-08 15:38:23', '2020-01-08 15:39:50', 4, 6, 2, NULL),
(21, 'Evento Nuevo 2021', 'Evento Nuevo 2020', '2020-01-20', '13:00:00', '14:00:00', 0, 'no confirmado', 1, '2020-01-09 00:59:16', '2020-01-09 01:03:34', 4, 1, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evento_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_evento_id_foreign` (`evento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `url`, `activo`, `created_at`, `updated_at`, `evento_id`) VALUES
(1, 'dfsfkdls', 1, '2020-01-08 06:00:00', '2019-12-30 06:00:00', 1),
(10, 'http://127.0.0.1:8000/imgupload/eventos/A4LOc0DWoJdyY78T2SygzWtEoIvIQr7BPsLHQWfa.png', 1, '2020-01-08 01:46:28', '2020-01-08 01:46:28', 15);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(90, '2014_10_12_000000_create_users_table', 1),
(91, '2014_10_12_100000_create_password_resets_table', 1),
(92, '2019_08_19_000000_create_failed_jobs_table', 1),
(93, '2020_01_03_053543_create_tokens_table', 1),
(94, '2020_01_03_092707_create_salas_table', 1),
(95, '2020_01_05_010906_create_statuses_table', 1),
(96, '2020_01_05_011129_create_projectors_table', 1),
(97, '2020_01_05_013904_create_events_table', 1),
(98, '2020_01_05_014154_create_galleries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectors`
--

CREATE TABLE IF NOT EXISTS `projectors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projectors`
--

INSERT INTO `projectors` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'primer', 'proyector 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edificio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salas`
--

INSERT INTO `salas` (`id`, `nombre`, `edificio`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Sala I', 'I', 1, '2020-01-05 08:10:06', '2020-01-08 16:10:07'),
(2, 'Sala D1', 'Edificio D1', 0, '2020-01-08 06:25:57', '2020-01-08 06:43:57'),
(4, 'Sala Z', 'Z', 1, '2020-01-08 06:44:23', '2020-01-08 06:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 'No Confirmado', 'Este estado pertenece al evento cuando no esta confirmado por el administrador.', '2020-01-04 12:16:34', '2020-01-10 06:00:00'),
(3, 'Confirmado', 'Este estado pertenece al evento confirmado por el administrador.', '2020-01-08 06:00:00', '2020-01-09 06:00:00'),
(4, 'Cancelado', 'Este estado pertenece al evento cancelado por el administrador o por el usuario que creó el evento.', '2020-01-10 06:00:00', '2020-01-11 06:00:00'),
(5, 'En Proceso', 'Este estado pertenece al evento que se encuentre en proceso.', '2020-01-12 06:00:00', '2020-01-13 06:00:00'),
(6, 'Concluido', 'Este estado pertenece al evento que concluyó el uso de la sala.', '2020-01-14 06:00:00', '2020-01-15 06:00:00'),
(7, 'Rechazado', 'El administrador a declinado su solicitud para su evento', '2020-01-07 06:00:00', '2020-01-07 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tokens_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `created_at`, `updated_at`, `token`, `activo`, `user_id`) VALUES
(1, '2020-01-09 01:04:34', '2020-01-09 01:05:00', '1oQAAx', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` enum('admin','general') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `apellido_paterno`, `apellido_materno`, `edad`, `telefono`, `email`, `email_verified_at`, `password`, `activo`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'zincri', 'm', 'l', 22, '12345', 'zincri@gmail.com', NULL, '$2y$10$Lv31R7L4PjWDu1AnPWSq7eSPQZoQ4o7UuWChqhRu1gqBVTZ/1CJ4u', 1, NULL, '2020-01-05 09:26:26', '2020-01-05 09:26:26', 'general'),
(2, 'Admin', 'Admin', 'Admin', 23, '9765432113', 'admin@gmail.com', NULL, '$2y$10$KpPAjFa37tOMJdPqNrKzvOyDmM0Mh6iNvw4AaYpGFSuYTEBMJv8BS', 1, NULL, '2020-01-08 02:50:25', '2020-01-08 02:50:25', 'admin'),
(3, 'jhoana', 'd', 'a', 22, '1234', 'jhoana@gmail.com', NULL, '$2y$10$FRrt84fApmDtHCm5P7n1aO4BWVmJ/g4ZnHA5ogM8DTaf97oFKxaP6', 1, NULL, '2020-01-08 06:53:53', '2020-01-08 06:53:53', 'general'),
(4, 'Jose', 'Borraz', 'Juarez', 22, '123456', 'jose@gmail.com', NULL, '$2y$10$OwrV836cBYhX0PPM6sfZjuNuYNUdy0M6.UVPDnK8LnHwv8nzmtr.K', 1, NULL, '2020-01-08 08:16:39', '2020-01-08 08:16:39', 'general'),
(5, 'Azucena', 'Giron', 'De la cruz', 22, '9611503033', 'Azu@gmail.com', NULL, '$2y$10$dIxvrugFqKl6WmN7ausH4uY3BNO0jEtkglPwTXz8kYzRbTRngjkdC', 1, NULL, '2020-01-08 08:26:30', '2020-01-08 08:26:30', 'general'),
(6, 'luis', 'v', 'a', 22, '123456', 'luis@gmail.com', NULL, '$2y$10$Dsqn2Fd3WzlEfcc65/eN0.k6NFLD3XA/6CGhLh9z5OTp9My5lO55e', 1, NULL, '2020-01-08 15:36:05', '2020-01-08 15:36:05', 'general');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_projector_id_foreign` FOREIGN KEY (`projector_id`) REFERENCES `projectors` (`id`),
  ADD CONSTRAINT `events_sala_id_foreign` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`),
  ADD CONSTRAINT `events_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `events_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
