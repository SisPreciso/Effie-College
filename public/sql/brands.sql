-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 13:50:47
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
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Entel Perú', 'images/entel2.png', 'Como empresa, comunicamos constantemente. Tenemos dos públicos: cliente y no cliente. Desde nuestro lanzamiento, nos hemos enfocado en comunicar al no cliente. Hoy contamos con una gran base de clientes, ahora tenemos la gran oportunidad de comunicarnos con ellos de una manera distinta. El desafío es definir una estrategia de comunicación a la base de clientes que sirva de manera transversal para todos los frentes del negocio para poder generar mayor conexión con el cliente.', NULL, NULL, NULL),
(2, 'Sodimac', 'images/logo-sodimac.png', '', NULL, NULL, NULL),
(3, 'UNACEM', 'images/logo-unacem.png', '', NULL, NULL, NULL),
(4, 'Alicorp', 'images/logo-alicorp.png', '', NULL, NULL, NULL),
(5, 'Pilsen Trujillo', 'images/logo-pilsen.png', '', NULL, NULL, NULL),
(6, 'BCP', 'images/logo-bcp.png', '', NULL, NULL, NULL),
(7, 'Mibanco', 'images/mibanco.png', '', NULL, NULL, NULL),
(8, 'Tottus', 'images/tottus.jpg', '', NULL, NULL, NULL),
(9, 'Farmacias Peruanas', 'images/farmacias-peruanas.png', '', NULL, NULL, NULL),
(10, 'Kusimayo', 'images/kusimayo.png', 'Premios Effie Perú este año esta contribuyendo con la ONG Kusimayo con donación en dinero y otorgándole la oportunidad de contar con una campaña de comunicación diseñada por los participantes de Effie College. La campaña tiene como objetivo la sensibilización para maximizar las donaciones para Casa Caliente Limpia y lograr la meta de equipar 120 casas en Puno. Únete al reto de ayudar en esta obra de bien social.', NULL, NULL, NULL),
(11, 'Eureka', 'images/eureka2.png', 'La categoría de supermercados en el Perú desde hace varios años se caracteriza por ser muy dinámica y competitiva comercialmente.\r\nPLAZAVEA supermercado líder del Perú es el único en ofrecer a sus clientes PRECIOS BAJOS TODOS LOS DÍAS, donde no necesitas esperar una oferta o descuento para poder pagar menos. Pero además de ser un supermercado tenemos el reto de construir que somos un lugar de destino y de compra para productos de textil, sobre todo infantil.\r\n¿Cómo posicionar nuestra marca de ropa Eureka, como la mejor marca de supermercados?\r\n¿Te unes a nuestro reto?', NULL, NULL, NULL),
(12, 'AlaCena', 'images/alacena.png', 'A los peruanos nos encanta comer rico y AlaCena tiene las salsas más ricas del mercado, pero no siempre le ponemos salsas a todos nuestros platos o no las disfrutamos en tantas ocasiones como podríamos. El desafío consiste en diseñar una estrategia de comunicación que nos ayude a incrementar el consumo per cápita de salsas AlaCena para así aportar más sabor a la vida de los peruanos. ¡Se parte de este gran reto!', NULL, NULL, NULL),
(13, 'Bolívar', 'images/bolivar.png', 'Bolívar es la marca de lavandería más querida por los hogares peruanos; sin embargo, desde hace unos meses ha perdido participación de mercado debido al contexto económico que ha incrementado la preferencia por marcas más económicas. Necesitamos recuperar usuarios apalancándonos en nuestra amplia trayectoria en el mundo de lavandería y nuestro posicionamiento de cuidado integral, más allá de la ropa.', NULL, NULL, NULL),
(14, 'Dento', 'images/dento2.png', 'Dento es la marca de dentífrico con la mejor ecuación de valor en el mercado: máxima calidad, a un precio más accesible y para toda la familia; sin embargo, esto no esta claro en la mente del consumidor. Necesitamos reposicionar la marca a través de una prueba ciega que alcance un impacto masivo para evidenciar la mejora de fórmula y parity performance con las marcas más caras. Dento, máxima calidad, máximo ahorro.', NULL, NULL, NULL),
(15, 'Inkafarma', 'images/inkafarma2.png', 'Inkafarma es la marca líder del mercado en su rubro, tras la compra de MiFarma empezó a difundirse, a través de los distintos medios de comunicación, que se había gestado un monopolio en el sector farmacéutico, cuando en realidad la gran mayoría en este mercado son boticas independientes y mini cadenas. El reto aquí es cómo combatir esa idea de “Monopolio” asociado a nuestra marca y el impacto negativo en el sentimento de la marca.', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
