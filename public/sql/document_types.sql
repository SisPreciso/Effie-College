-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 14:26:31
-- Versión del servidor: 5.7.43
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupops6_effiecollege`
--

--
-- Volcado de datos para la tabla `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `code`, `length`, `is_number`, `is_exact`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Doc. Nacional de Identidad', '01', 8, 1, 1, NULL, NULL, NULL),
(2, 'Carnet de extranjería', '04', 12, 0, 0, NULL, NULL, NULL),
(3, 'Reg. Único de Contribuyente', '06', 11, 1, 1, NULL, NULL, '2021-03-09 07:00:00'),
(4, 'Pasaporte', '07', 12, 0, 0, NULL, NULL, NULL),
(5, 'Partida de nacimiento-identidad', '11', 15, 0, 0, NULL, NULL, '2021-03-13 07:00:00'),
(6, 'Otros', '99', 15, 0, 0, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
