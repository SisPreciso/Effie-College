-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 14:32:35
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
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_lastname`, `teacher_email`, `teacher_document_type_id`, `teacher_document`, `teacher_mobile`, `teacher_profession`, `teacher_college_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'José Antonio', 'Chumpitaz', 'ricardo_jbl2011@hotmail.com', 1, '12348497', '987 458 785', 'Docente universitario', 6, '2020-07-29 15:28:12', '2021-04-09 14:19:49', NULL),
(5, 'Juan José', 'Tirado Gamarra', 'jtirado@ipp.pe', 1, '07810981', '964 735 308', 'Publicista', 3, '2020-07-29 15:28:13', '2022-04-14 16:57:59', NULL),
(10, 'Ricardo Casimiro', 'Majka', 'rmajka@ipp.pe', 2, '000221573', '999 008 188', 'Publicista', 3, '2020-07-29 15:28:13', '2022-04-12 16:34:57', NULL),
(16, 'Ana María', 'Barbero', 'anabarbero@hotmail.com', 1, '29641932', '', '', 2, '2020-07-29 15:28:13', '2020-07-29 15:28:13', NULL),
(26, 'Luis Fernando', 'Terry', 'lterry@ulima.edu.pe', 1, '41722250', '', '', 1, '2020-07-29 15:28:14', '2020-07-29 15:28:14', NULL),
(30, 'Juan Miguel', 'Coriat', 'jcoriat@ulima.edu.pe', 1, '08194108', '', '', 1, '2020-07-29 15:28:14', '2020-07-29 15:28:14', NULL),
(38, 'Ángela Nelly', 'Domínguez Vergara', 'adominguezv@pucp.edu.pe', 1, '45862920', '994695686', 'Comunicación Social', 6, '2020-07-29 15:28:15', '2020-08-20 22:54:33', NULL),
(44, 'Anaís Consuelo', 'Gonzales Vilela', 'anais.gonzales@pucp.pe', 1, '47548501', '955346970', 'Publicista', 6, '2020-07-29 15:28:15', '2020-08-19 09:48:09', NULL),
(50, 'Luis Ernesto', 'Velezmoro Morales', 'lvelezmo@ulima.edu.pe', 1, '10545162', '997921629', 'Docente Universitario', 1, '2020-07-29 15:28:15', '2020-08-21 09:50:51', NULL),
(56, 'Carlos Enrique', 'Mory Olivares', 'pcadcmor@upc.edu.pe', 1, '10341734', '995076426', 'Licenciado en administración y marketing', 2, '2020-07-29 15:28:16', '2020-08-21 23:49:12', NULL),
(63, 'Iván', 'Quiquia', 'ivan.quiquia@pucp.edu.pe', 1, '42230002', '979345787', 'Marketing', 6, '2020-07-29 15:28:16', '2020-08-20 06:03:27', NULL),
(69, 'Nilda', 'Manco', 'pcamnman@upc.edu.pe', 1, '45462088', '', '', 2, '2020-07-29 15:28:16', '2020-07-29 15:28:16', NULL),
(79, 'Carlos', 'Bernal Arredondo', 'carlos.bernal@gmail.com', 1, '40332432', '992575743', 'Publicista', 2, '2020-08-13 09:27:42', '2020-08-13 09:27:42', NULL),
(83, 'Miguel', 'Jopen', 'mjopen@gmail.com', 1, '07261893', '939282501', 'Administrador', 2, '2020-08-15 00:27:16', '2020-08-22 07:00:08', NULL),
(89, 'Claudia', 'Aguilar Iparraguirre', 'claudia@orekan.pe', 1, '40954910', '993473344', 'Managing Director', 1, '2020-08-15 03:07:51', '2020-08-15 03:07:51', NULL),
(94, 'Daniel', 'Cárdenas', 'dcardena@aloe.ulima.edu.pe', 1, '10809160', '947 488 257', 'Docente de comunicación', 1, '2020-08-15 09:02:43', '2022-04-10 00:37:48', NULL),
(100, 'Aldo', 'Arata Farach', 'aldoarata7@gmail.com', 1, '40303188', '996792661', 'Ingeniería Industrial', 1, '2020-08-15 22:41:46', '2020-08-15 22:41:46', NULL),
(104, 'Vicky Inés', 'Montero Mattos', 'vmonteromattos@gmail.com', 1, '47537655', '951711195', 'Publicista', 6, '2020-08-16 03:41:20', '2020-08-16 03:41:20', NULL),
(110, 'Karla Diana', 'Chen Ramos', 'karla.chen@pucp.pe', 1, '70897302', '946548952', 'Publicidad', 6, '2020-08-16 04:40:04', '2020-08-16 04:40:04', NULL),
(121, 'Carmen Roxane', 'Rodriguez Daneri', 'crodriguez@pucp.pe', 1, '07390801', '982553062', 'Maestría en Sociología concluida y docente', 6, '2020-08-17 00:59:01', '2020-08-17 00:59:01', NULL),
(127, 'Javier Augusto', 'Andrade Borda', 'Jandradeb@pucp.edu.pe', 1, '43332863', '992705449', 'Publicista', 6, '2020-08-17 06:11:20', '2020-08-17 06:11:20', NULL),
(138, 'José', 'Olivar', 'joseolivar@gmail.com', 1, 'vvvvvvvv', '999999999', 'Profesor', 6, '2020-08-17 20:13:15', '2020-08-21 05:18:37', NULL),
(143, 'Marissa Esther', 'Pozo García', 'marissa.pozo@havasmg.com', 1, '07970530', '967704254', 'Ingeniería Estadística', 6, '2020-08-17 21:09:09', '2020-08-20 04:39:19', NULL),
(149, 'Rodolfo', 'Muente', 'rmuente@ulima.edu.pe', 1, '07778185', '959791642', 'Profesor de la Universidad de Lima', 1, '2020-08-17 21:55:02', '2020-08-17 21:55:02', NULL),
(161, 'fksahk', 'lkfdlkfdjs', 'e@gmail.com', 1, 'kkkkkkk1', '998493228', 'Profesor', 5, '2020-08-18 02:20:40', '2020-08-18 02:20:40', NULL),
(171, 'Ricardo', 'Ramos', 'ricardo@gmail.com', 1, 'mmmmmmm1', '999999999', 'Marketing', 8, '2020-08-18 02:34:43', '2020-08-18 02:34:43', NULL),
(178, 'Gary', 'Méndez Salvador', 'gamedor@gmail.com', 1, '43344585', '987716569', 'Publicista redactor creativo', 6, '2020-08-18 03:41:16', '2020-08-18 03:41:16', NULL),
(186, 'Patricia', 'Díaz Murillo', 'pdiazm@pucp.edu.pe', 1, '07634286', '987421332', 'Comunicación Audiovisual', 6, '2020-08-18 05:34:13', '2020-08-18 05:34:13', NULL),
(191, 'Rafael', 'Penny de Armero', 'rafael@insight.pe', 1, '40561845', '991714533', 'Administrador de Empresas', 1, '2020-08-18 05:54:39', '2020-08-18 05:54:39', NULL),
(198, 'Marybel', 'Mollo Flores', 'mmollo@ulima.edu.pe', 1, '42421724', '987187569', 'Marketing', 1, '2020-08-19 03:57:40', '2020-08-19 03:57:40', NULL),
(227, 'Laura Sara', 'Caro Vela', 'lcaro@ulima.edu.pe', 1, '07967572', '986 959 256', 'Comunicadora', 1, '2020-08-20 06:11:28', '2022-04-13 02:25:56', NULL),
(232, 'Angela Nessy', 'Valdivia Murgueytio', 'avaldivia@talento.tls.edu.pe', 1, '40912755', '987 928 181', 'Comunicadora / Publicidad', 5, '2020-08-20 07:34:10', '2022-04-14 00:13:50', NULL),
(241, 'Jorge', 'Jara Salas', 'jjara@qimic.pe', 1, '08146081', '986604140', 'Publicista', 2, '2020-08-21 01:00:25', '2020-08-21 01:00:25', NULL),
(255, 'Willy César', 'Chero Salazar', 'willy.chero@usil.pe', 1, '40589142', '997 134 164', 'Comunicador - Publicidad', 33, '2020-08-21 06:06:00', '2022-04-09 05:06:59', NULL),
(261, 'Maria del Carmen', 'Rodriguez Rossi', 'mariadelcarmen.rossi@upn.pe', 1, '41133926', '994 668 848', 'Magister en Dirección de marketing y gestión comer', 31, '2020-08-21 07:45:08', '2022-04-15 01:55:06', NULL),
(279, 'Joela', 'Alva Vergara', 'pccmjoal@upc.edu.pe', 1, '40153438', '997368218', 'Administracion', 2, '2020-08-21 22:10:46', '2020-08-21 22:10:46', NULL),
(290, 'Héctor', 'Mendoza Cuéllar', 'hmendozac@gmail.com', 1, '06805496', '988009979', 'Publicista', 6, '2020-08-21 23:21:20', '2020-08-21 23:21:20', NULL),
(296, 'Marta Cecilia', 'Vásquez Llerena', 'pcammvas@upc.edu.pe', 1, '09541140', '989 256 169', 'Marketing', 2, '2020-08-21 23:34:53', '2022-04-18 22:31:48', NULL),
(302, 'Carla Eloisa', 'Arriola Alvarado', 'carla.arriola@usil.pe', 1, '41161858', '997313977', 'Marketing', 9, '2020-08-21 23:40:45', '2020-08-21 23:40:45', NULL),
(332, 'Ana María', 'Cano Lanza', 'am.canol@up.edu.pe', 1, '07259394', '995226390', 'Administración/ Marketing', 8, '2020-08-22 03:32:43', '2020-08-22 03:32:43', NULL),
(356, 'Rendo', 'Salazar Sánez', 'rsalazar@ipp.pe', 1, '08156977', '934 245 691', 'Publicista - Redacción creativa', 3, '2020-08-22 04:32:30', '2022-04-13 21:48:48', NULL),
(366, 'Karina Janeth', 'García Bravo', 'pcpukgab@upc.edu.pe', 1, '40240548', '999 443 181', 'Magíster en Marketing', 2, '2020-08-22 04:39:49', '2022-04-14 05:45:08', NULL),
(381, 'Jenny', 'Vega Mondragon', 'pcamjveg@upc.edu.pe', 1, '10559021', '987 111 388', 'Marketing', 2, '2020-08-22 05:21:09', '2022-04-16 05:48:27', NULL),
(396, 'Patricio Alfonso', 'Corrales Dextre', 'patricio.corrales@upc.pe', 1, '10263834', '997 919 342', 'Administrador', 2, '2020-08-22 05:32:54', '2022-04-14 01:07:40', NULL),
(427, 'Daniel', 'Varela Llanos', 'pcimdvar@upc.edu.pe', 1, '40387036', '933 491 915', 'Comunicador maestría en Dirección de marketing', 2, '2020-08-22 06:57:12', '2022-04-13 23:57:05', NULL),
(460, 'Melva Inés', 'Tamayo Huamán', 'melva.tamayo@gmail.com', 1, '43162520', '963763248', 'Publicidad', 6, '2020-08-24 16:55:53', '2020-08-24 16:55:53', NULL),
(467, 'Jorge Jannick', 'Eulert Bello', 'jeulert@ulima.edu.pe', 1, '45940463', '986 647 289', 'Director Marketing Digital - Docente', 1, '2020-10-15 23:30:42', '2022-04-12 20:13:11', NULL),
(468, 'Jhonatan Yunior', 'Portocarrero Mendoza', 'jportocarrero@preciso.pe', 1, '12345678', '987 654 321', 'Ingeniería de Sistemas Computacionales', 32, '2021-03-19 23:31:42', '2022-04-25 16:54:16', NULL),
(475, 'Andrés', 'Linares', 'bejar.ricardo@pucp.pe', 1, '00000005', '999 999 999', 'Programador freelance', 3, '2021-04-10 05:23:07', '2021-04-10 05:23:07', NULL),
(487, 'Christopher', 'Gatjens Caceres', 'cgatjens@ulima.edu.pe', 1, '41189317', '993 503 140', 'Comunicador', 1, '2022-04-09 00:40:42', '2022-04-09 00:40:42', NULL),
(488, 'Pedro Iván Martín', 'Córdova Piscoya', 'pcordova@usil.edu.pe', 1, '10310241', '989 081 462', 'Lic en Ciencias de la Comunicación - Publicidad', 33, '2022-04-09 04:31:05', '2022-04-09 04:31:05', NULL),
(489, 'Rosario Marcela', 'Vidurrizaga Costa', 'RVIDURRI@ulima.edu.pe', 1, '10265102', '993 503 679', 'Comunicadora y MBA', 1, '2022-04-10 22:15:23', '2022-04-12 15:46:40', NULL),
(490, 'Luis Felipe', 'Lazo Rivera', 'llazor@ulima.edu.pe', 1, '09537325', '997 915 321', 'Economista- Marketing', 1, '2022-04-11 05:48:03', '2022-04-11 20:18:25', NULL),
(492, 'Claudio Santiago', 'Huamán de Los Heros Combe', 'chuamandh@usil.edu.pe', 1, '40126671', '945 202 428', 'Comunicador - Marketing', 33, '2022-04-11 22:08:18', '2022-04-11 22:08:18', NULL),
(493, 'Florinda', 'Consigliere Ruiz', 'fconsigl@ulima.edu.pe', 1, '42765504', '965 693 080', 'Comunicadora', 1, '2022-04-12 20:50:24', '2022-04-12 20:50:24', NULL),
(494, 'Yolanda', 'Pun Lam', 'ypun@ulima.edu.pe', 1, '09429135', '991 664 885', 'Comunicadora Social', 1, '2022-04-12 22:57:51', '2022-04-12 22:57:51', NULL),
(495, 'Daniel', 'Saavedra Barrientos', 'dsaavedra@pucp.pe', 1, '44699983', '997 932 443', 'Publicista - Creatividad', 6, '2022-04-13 02:24:10', '2022-04-13 02:24:10', NULL),
(496, 'Nicolás', 'Ortiz Esaine', 'nortize@ulima.edu.pe', 1, '40394717', '999 053 753', 'Marketing', 1, '2022-04-13 05:40:59', '2022-04-13 05:40:59', NULL),
(497, 'María Rocío', 'Trigoso Barentzen', 'rtrigoso@pucp.edu.pe', 1, '07247669', '954 778 602', 'Publicista', 6, '2022-04-13 18:17:58', '2022-04-13 18:17:58', NULL),
(498, 'JULIO RICARDO', 'FONSECA RIOS', 'a19989089@pucp.edu.pe', 1, '40682123', '995 888 038', 'Comunicador Audiovisual / MBA', 6, '2022-04-13 18:56:30', '2022-04-13 18:56:30', NULL),
(499, 'Carolina', 'Tello Giusti', 'carolina.tello@pucp.edu.pe', 1, '43644367', '997 894 202', 'Publicista', 6, '2022-04-13 19:17:58', '2022-04-13 19:17:58', NULL),
(500, 'Nilton Carlos', 'Suarez Rivas', 'nsuarez@ulima.edu.pe', 1, '06751432', '996 597 987', 'Licenciado en Comunicaciones', 1, '2022-04-13 20:55:53', '2022-04-13 20:55:53', NULL),
(501, 'Flavia', 'Posada Maldonado', 'pcmpfpos@upc.edu.pe', 1, '22273906', '999 125 136', 'Marketing', 2, '2022-04-13 22:11:13', '2022-04-13 22:11:13', NULL),
(502, 'Jorge Giancarlo', 'Navarro Rache', 'jorge.navarro@upn.pe', 1, '10278360', '976 995 415', 'Comunicador social', 31, '2022-04-13 22:56:49', '2022-04-13 22:56:49', NULL),
(503, 'Mauricio', 'Villanueva Neyra', 'mvillanueva@talento.tls.edu.pe', 1, '46509095', '980 914 431', 'Comunicador Social / Publicidad y relaciones públi', 5, '2022-04-13 23:13:26', '2022-04-13 23:13:26', NULL),
(504, 'Carlos Alfredo', 'Fuller Olortegui', 'cfuller@talento.tls.edu.pe', 1, '06966584', '999 202 333', 'Publicista', 5, '2022-04-13 23:39:37', '2022-04-13 23:39:37', NULL),
(505, 'Jessica Patricia', 'Guerrero Jarama', 'jguerrero@talento.tls.edu.pe', 1, '41397491', '997 362 747', 'Consultora, formadora y conferencista de Marketing', 5, '2022-04-13 23:50:36', '2022-04-13 23:50:36', NULL),
(506, 'Ariana', 'Granados La Torre', 'pccmagra@upc.edu.pe', 2, '40059566', '987 113 273', 'Administradora', 2, '2022-04-13 23:56:26', '2022-04-16 03:39:56', NULL),
(507, 'Dennis Pavel', 'Gutiérrez Zamora', 'dgutierrez@talento.tls.edu.pe', 1, '41835471', '922 607 264', 'Publicista', 5, '2022-04-13 23:59:18', '2022-04-13 23:59:18', NULL),
(508, 'Leyla', 'Montes de Oca Fernandéz', 'l.montesdeocaf@up.edu.pe', 1, '70272852', '922 756 346', 'Marketing', 8, '2022-04-14 00:06:46', '2022-04-14 00:06:46', NULL),
(509, 'Janeth Viviane', 'Laos Hope', 'pcpujlao@upc.edu.pe', 1, '07261891', '997 387 050', 'Marketing', 2, '2022-04-14 00:09:29', '2022-04-14 00:09:29', NULL),
(510, 'Diego Víctor', 'Lerma Goméz', 'dlerma@talento.tls.edu.pe', 1, '43488555', '902 707 126', 'Administrador de empresas / Publicista', 5, '2022-04-14 00:30:23', '2022-04-14 00:30:23', NULL),
(511, 'Natalia Miryam', 'Elias Vassallo', 'nelias@talento.tls.edu.pe', 1, '42398330', '910 195 262', 'Comunicación  Marketing Digital', 5, '2022-04-14 00:55:55', '2022-04-14 00:55:55', NULL),
(512, 'Ricardo Renatto', 'Arce Ruiz', 'rarcer@talento.tls.edu.pe', 1, '70381509', '971 062 235', 'Publicista Marketing de Contenidos', 5, '2022-04-14 01:14:07', '2022-04-14 01:14:07', NULL),
(513, 'Jorge Luis', 'Bohorquez Villalta', 'pcamjboh@upc.edu.pe', 1, '10554617', '981 174 156', 'Administrador - Marketing', 2, '2022-04-14 01:22:23', '2022-04-14 01:22:23', NULL),
(514, 'Keyla Aida Johanna', 'Sánchez Rasmussen', 'ksanchezr@talento.tls.edu.pe', 1, '41254601', '962 447 523', 'Comunicadora  Marketing Digital', 5, '2022-04-14 01:27:43', '2022-04-14 01:27:43', NULL),
(515, 'Renzo Daniel', 'Chumpen Espinoza', 'rchumpen@talento.tls.edu.pe', 1, '70004884', '951 809 496', 'Publicista', 5, '2022-04-14 01:51:05', '2022-04-14 01:51:05', NULL),
(516, 'Jorge Luis', 'Linares Weilg', 'pcmsjlin@upc.edu.pe', 1, '09582184', '999 669 807', 'Publicidad - Neurociencia', 2, '2022-04-14 03:05:43', '2022-04-14 03:05:43', NULL),
(517, 'Freddy', 'Linares', 'linares_f@up.edu.pe', 1, '40377503', '997 378 646', 'Administración', 8, '2022-04-14 04:08:57', '2022-04-14 04:08:57', NULL),
(518, 'Norka del Pilar', 'Segura Carmona', 'norka.segura@upn.pe', 1, '41163071', '997 700 337', 'Comunicaciones - Publicidad', 31, '2022-04-14 04:09:24', '2022-04-14 04:09:24', NULL),
(519, 'Eduardo Javier', 'Landauro Cerf', 'eduardo.landauro@upn.edu.pe', 1, '10202480', '942 779 763', 'Comunicaciones - Publicidad', 31, '2022-04-14 04:19:05', '2022-04-14 04:19:05', NULL),
(520, 'Jean Pierre D', 'Gálvez Castañeda', 'jean.galvez@upn.edu.pe', 1, '45143983', '993 832 395', 'Comunicaciones - Publicidad', 31, '2022-04-14 04:27:53', '2022-04-14 04:27:53', NULL),
(521, 'Orlando Walter', 'Alegre Gonzales', 'oalegre@pucp.edu.pe', 1, '42398323', '950 844 200', 'Comunicador con especialización en Publicidad', 6, '2022-04-14 04:30:16', '2022-04-14 04:30:16', NULL),
(522, 'Marco Antonio', 'Gutiérrez Canales', 'n00193387@upn.pe', 1, '44699875', '975 981 415', 'Comunicaciones - Publicidad', 31, '2022-04-14 04:33:56', '2022-04-14 04:33:56', NULL),
(523, 'Alan', 'Suárez Cóndor', 'alan.suarez@upn.pe', 1, '41171417', '989 323 000', 'Comunicaciones - Publicidad', 31, '2022-04-14 04:50:16', '2022-04-14 04:50:16', NULL),
(524, 'Luis Erick', 'Valdivia Huarcaya', 'erick.valdivia@pucp.edu.pe', 1, '40848058', '998 599 887', 'Publicista', 6, '2022-04-14 05:55:39', '2022-04-14 05:55:39', NULL),
(525, 'Jhoselyn Jhoana', 'Bernal Mendoza', 'jhoselyn.bernal@pucp.pe', 1, '47520127', '920 597 569', 'Publicista', 6, '2022-04-14 17:16:06', '2022-04-14 17:16:06', NULL),
(526, 'Myriam Elena', 'Silvy D Alessio', 'pcmpmsil@upc.edu.pe', 1, '08235524', '996 599 889', 'Administradora de Empresas', 2, '2022-04-14 22:19:42', '2022-04-14 22:19:42', NULL),
(527, 'Jorge Luis', 'Muñoz', 'pccmjomu@upc.edu.pe', 1, '10609283', '990 473 559', 'Docente', 2, '2022-04-15 05:04:27', '2022-04-18 02:43:07', NULL),
(528, 'Vania María', 'Falla Urbina', 'vfalla@upc.edu.pe', 1, '40116357', '982 708 120', 'Publicista', 2, '2022-04-15 23:00:47', '2022-04-15 23:00:47', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
