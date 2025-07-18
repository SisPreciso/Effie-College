-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 14:25:21
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
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `edition_id`, `brand_id`, `description`, `brief`, `audio`, `visual`, `whole`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'https://www.entel.pe/', '', '', '', '', NULL, NULL, NULL),
(2, 1, 2, 'https://www.sodimac.com.pe/', '', '', '', '', NULL, NULL, NULL),
(3, 1, 3, 'https://www.unacem.com.pe/', '', '', '', '', NULL, NULL, NULL),
(4, 1, 5, 'https://www.pilsentrujillo.com.pe/', '', '', '', '', NULL, NULL, NULL),
(5, 1, 6, 'https://www.viabcp.com/', '', '', '', '', NULL, NULL, NULL),
(6, 2, 1, 'https://www.entel.pe/', 'pdf (1781 KB)', 'zip (810 KB)', 'pdf (4 MB)', 'zip (6 MB)', NULL, NULL, NULL),
(7, 2, 3, 'https://www.unacem.com.pe/', 'pdf (562 KB)', 'mp4 (141 MB)', 'zip (463 KB)', 'zip (136 MB)', NULL, NULL, NULL),
(8, 2, 4, 'https://www.alicorp.com.pe/pe/es/', 'pdf (384 KB)', 'mp4 (96 MB)', 'zip (1706 KB)', 'zip (90 MB)', NULL, NULL, NULL),
(9, 3, 1, 'https://www.entel.pe/', 'pdf (741 KB)', 'mp4 (698 MB)', '', 'zip (1032 MB)', NULL, NULL, NULL),
(10, 3, 7, 'https://www.mibanco.com.pe/', 'pdf (1448 KB)', 'mp4 (963 MB)', '', 'zip (962 MB)', NULL, NULL, NULL),
(11, 3, 8, 'https://www.tottus.com.pe/', 'pdf (631 KB)', 'mp4 (935 MB)', '', 'zip (861 MB)', NULL, NULL, NULL),
(17, 4, 12, 'https://www.alicorp.com.pe/pe/es/productos/salsas/alacena/', 'pdf (458 KB)', '', '', 'zip (67 MB)', NULL, NULL, NULL),
(18, 4, 13, 'https://www.alicorp.com.pe/pe/es/productos/cuidado-de-la-ropa/bolivar/', 'pdf (443 KB)', '', '', 'zip (177 MB)', NULL, NULL, NULL),
(19, 4, 14, 'https://www.tottus.com.pe/dento/c/', 'pdf (495 KB)', '', '', 'zip (121 MB)', NULL, NULL, NULL),
(20, 4, 1, 'https://www.entel.pe/', 'pdf (259 KB)', '', '', 'zip (327 MB)', NULL, NULL, NULL),
(21, 4, 15, 'https://inkafarma.pe/', 'pdf (205 KB)', '', '', 'zip (106 MB)', NULL, NULL, NULL),
(22, 4, 10, 'https://kusimayo.org/', 'pdf (204 KB)', '', '', 'zip (264 MB)', NULL, NULL, NULL),
(23, 4, 11, 'http://www.sostenibilidadspsa.pe/', 'pdf (283 KB)', '', '', 'zip (258 MB)', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
