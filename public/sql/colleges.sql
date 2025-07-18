-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 13:48:18
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
-- Volcado de datos para la tabla `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `businessname`, `ruc`, `address`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Universidad de Lima', 'UNIVERSIDAD DE LIMA', '20107798049', 'Av. Javier Prado Este Nro. 4600 - Urb. Fundo Monterrico Chico - Santiago de Surco', '(01) 4376767', NULL, NULL, NULL),
(2, 'Universidad Peruana de Ciencias Aplicadas (UPC)', 'UNIVERSIDAD PERUANA DE CIENCIAS APLICADAS S.A.C.', '20211614545', 'Prolongación Primavera 2390, Lima 15023 - Urb. Monterrico - Santiago de Surco', '(01) 6303333', NULL, NULL, NULL),
(3, 'Instituto Peruano de Publicidad (IPP)', 'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO PRIVADO \"INSTITUTO PERUANO DE PUBLICIDAD\"', '20109733092', 'Av. Juan de Aliaga Nro. 421 - Magdalena del Mar', '(01) 2727695', NULL, NULL, NULL),
(4, 'Universidad ESAN', 'UNIVERSIDAD ESAN', '20136507720', 'Jr. Alonso de Molina 1652 - Urb. Monterrico chico - Santiago de Surco', '(01) 3177200', NULL, NULL, '2022-04-05 18:00:37'),
(5, 'Instituto Toulouse Lautrec', 'INSTITUCIONES TOULOUSE LAUTREC DE EDUCACION SUPERIOR S.A.C. - ITLS S.A.C.', '20520869655', 'Av. Primavera Nro. 607 (Oficina 508) - San Borja', '(01) 6172400', NULL, NULL, NULL),
(6, 'Pontificia Universidad Católica del Perú (PUCP)', 'PONTIFICIA UNIVERSIDAD CATOLICA DEL PERU', '20155945860', 'Av. Universitaria Nro. 1801 - Urb. Pando - San Miguel', '(01) 6262000', NULL, NULL, NULL),
(7, 'Universidad de Ciencias y Artes de América Latina (UCAL)', 'UNIVERSIDAD DE CIENCIAS Y ARTES DE AMERICA LATINA S.A.C. - UCAL S.A.C.', '20537886618', 'Av. La Molina 3755, Urb. Sol de La Molina - La Molina', '(01) 6222222', NULL, NULL, NULL),
(8, 'Universidad del Pacífico', 'UNIVERSIDAD DEL PACIFICO', '20109705129', 'Jr. Gral. Luis M. Sánchez Cerro Nro. 2141 - Jesús María', '(01) 2190100', NULL, NULL, NULL),
(9, 'Universidad Católica de Santa María', 'UNIVERSIDAD CATOLICA DE SANTA MARIA', '20141637941', 'Urb. San José s/n Umacollo', '054-382038', NULL, NULL, NULL),
(31, 'Universidad Privada del Norte (UPN)', 'UNIVERSIDAD PRIVADA DEL NORTE S.A.C.', '20215276024', 'Av. Alfredo Mendiola 6062, Los Olivos.', '(01) 625-9600', NULL, NULL, NULL),
(32, 'Universidad San Martín de Porres (USMP)', 'UNIVERSIDAD DE SAN MARTIN DE PORRES', '20138149022', 'Jr. Las Calandrias N° 151 – 291 Santa Anita, Lima - Perú.', '(511) 317-2130', NULL, NULL, NULL),
(33, 'Universidad San Ignacio de Loyola (USIL)', 'UNIVERSIDAD SAN IGNACIO DE LOYOLA S.A.', '20297868790', 'Av. Industrial 3484, Urb. Industrial Panamericana Norte -  Independencia.', '(511) 317-1023', NULL, NULL, NULL),
(34, 'Universidad Continental (UC)', 'UNIVERSIDAD CONTINENTAL SOCIEDAD ANONIMA CERRADA', '20319363221', 'Av. Alfredo Mendiola 5210, Los Olivos.', '(01) 2132760', NULL, NULL, NULL),
(35, 'Universidad Científica del Sur', 'UNIVERSIDAD CIENTIFICA DEL SUR S.A.C.', '20421239275', 'Carr. Panamericana Sur 19, Villa EL Salvador 15067', '(+51) 981 855 630', NULL, NULL, NULL),
(36, 'Universidad de Piura (UDEP)', 'UNIVERSIDAD DE PIURA', '20172627421', 'Calle Mártir José Olaya 162, Miraflores.', '(01) 2139600', NULL, NULL, NULL),
(37, 'Universidad Privada Antenor Orrego (UPAO)', 'UNIVERSIDAD PRIVADA ANTENOR ORREGO', '20141878477', 'Sector Norte, Parcela 03 (carretera a, Los Ejidos, Piura 20009', '(073) 607777', NULL, NULL, NULL),
(38, 'Instituto San Ignacio de Loyola (ISIL)', '', '', '', '', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
