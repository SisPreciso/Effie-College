-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 14:39:31
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
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `code`, `title`, `description`, `edition_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021S1', 'Sección 1: Reto, contexto y objetivos (25% del puntaje total)', 'Esta sección proporciona a los jueces los antecedentes de tu desafío y objetivos. En esta sección, se evalúa si capturaste el contexto necesario sobre la marca, los competidores y el mercado para entender la propuesta y el grado de desafío representado en tus objetivos. Se recomienda a los participantes que vayan más allá de repetir la información proporcionada en el brief del cliente.', 3, NULL, NULL, NULL),
(2, '2021S2', 'Sección 2: Insights e idea estratégica (25% del puntaje total)', 'Esta sección te pide explicar tu proceso de pensamiento para llegar a la idea estratégica. Los jueces evaluarán cuán creativa y eficaz es la idea y la estrategia para hacer frente al desafío planteado.', 3, NULL, NULL, NULL),
(3, '2021S3', 'Sección 3: Ejecución (25% del puntaje total)', 'En esta sección, debes brindar los detalles de cómo y dónde llevarás tu idea a la vida, incluyendo tus estrategias creativas, de comunicaciones y de medios y el trabajo en sí. Los jueces buscan entender por qué eligió tales medios y cómo se relacionan con su estrategia y audiencia. Los jueces proporcionarán su puntuación para esta sección en función de la información que proporciones en las dos primeras preguntas y el trabajo creativo que se presenta en el video. Entre los ejemplos creativos y tu respuesta a esta pregunta, los jueces deben tener una comprensión clara del trabajo creativo que experimentaría tu audiencia y cómo los elementos creativos trabajaron juntos para lograr tus objetivos.', 3, NULL, NULL, NULL),
(4, '2021S4', 'Sección 4: Metodología de medición (25% del puntaje total)', 'Esta sección se refiere a los \"resultados\". Asegúrate de explicar la importancia de tus resultados en relación con la marca. Enlaza los objetivos descritos en la tercera pregunta de la primera sección con los KPI’s que los medirán. Se permiten gráficos para mostrar datos.', 3, NULL, NULL, NULL),
(5, '2021S5', 'Sección 5: Reel y formularios de aceptación', 'REEL CREATIVO: Los participantes deben presentar una compilación que muestre la creatividad que da vida a la gran idea.  Los elementos creativos y de comunicación deben relacionarse directamente con sus objetivos estratégicos. Muestre el \"cómo y cuándo\" planea conectarse con su público objetivo. No incluya música, vídeos o imágenes sin licencia. Se permiten las imágenes/músicas libres/en stock.\r\nOTROS ARCHIVOS: Formulario y Declaración de Autorización firmado por el asesor del equipo.', 3, NULL, NULL, NULL),
(6, '2022S1', 'SECCIÓN 1: DESAFÍO, CONTEXTO Y OBJETIVOS (25% DEL PUNTAJE TOTAL)', 'Esta sección proporciona a los jueces los antecedentes de su desafío y objetivos.  En esta sección, evalúan si capturaron el contexto necesario sobre la marca, los competidores y el mercado para entender su propuesta. También evalúan el grado de desafío representado en sus objetivos. Se recomienda a los participantes que vayan más allá de repetir la información proporcionada en el brief de la marca.', 4, NULL, NULL, NULL),
(7, '2022S2', 'SECCIÓN 2: INSIGHT E IDEA ESTRATEGICA (25% DEL PUNTAJE TOTAL)', 'Esta sección te pide que explique tu proceso de pensamiento y las ideas formaron la idea estratégica de tu propuesta. Los jueces evaluarán cuán creativa y eficaz es la idea y la estrategia para hacer frente al desafío planteado.', 4, NULL, NULL, NULL),
(8, '2022S3', 'SECCIÓN 3: DAR VIDA A LA IDEA (25% DEL PUNTAJE TOTAL)', 'En esta sección brinden los detalles de cómo y dónde llevarán su idea a la vida, incluidas sus estrategias creativas, de comunicaciones y de medios; es decir, la ejecución en sí.  Los jueces buscan entender por qué eligieron tales medios y cómo se relacionan con su estrategia, objetivos y audiencia.  Los jueces proporcionarán su puntuación para esta sección en función de la información que proporcionen en las preguntas 3A, 3B y el trabajo creativo que se presenta en el reel (PASO 5).  Con las respuestas a esta sección y el reel creativo, los jueces deben tener una comprensión clara de los elementos creativos/acciones que experimentaría su audiencia y cómo dichos elementos trabajaran juntos para lograr sus objetivos.', 4, NULL, NULL, NULL),
(9, '2022S4', 'SECCIÓN 4: MEDICIÓN DE RESULTADOS (25% DEL PUNTAJE TOTAL)', 'Asegúrense de explicar la importancia de sus resultados con relación a la marca. Enlace a los objetivos descritos en Sección 1 (pregunta 1C.) con los KPI’s que los medirán.  Se permiten gráficos o tablas para mostrar proyecciones.', 4, NULL, NULL, NULL),
(10, '2022S5', 'SECCIÓN 5: REEL Y FORMULARIO DE AUTORIZACIÓN', 'REEL CREATIVO: Los participantes deben presentar una compilación que muestre la creatividad que da vida a la gran idea.  Los elementos creativos y de comunicación deben relacionarse directamente con sus objetivos estratégicos. No incluya música, vídeos o imágenes sin licencia. Se permiten las imágenes/músicas libres/en stock.\r\nEl trabajo creativo se revisa como parte de la Sección 3: Ejecución, junto con sus respuestas a las preguntas 3A y 3B.\r\nOTROS ARCHIVOS: Formulario de Autorización, Confidencialidad y Cesión de derechos firmado por el tutor del equipo.', 4, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
