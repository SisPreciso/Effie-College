-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2023 a las 14:41:02
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
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `code`, `title`, `detail`, `remark`, `maxwrd`, `maxgrp`, `section_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Q2021S1A', 'Reto y contexto', '¿Cuáles son los desafíos u oportunidades específicas a los que se enfrenta la marca? Proporciona información sobre la categoría, marca, entorno competitivo que originó el desafío y tu respuesta hacia él. Asegúrate de proporcionar un contexto competitivo.', '(Máximo: 300 palabras y 3 gráficos)', 300, 3, 1, NULL, NULL, NULL),
(2, 'Q2021S1B', 'Público objetivo', 'Define el público al que intentas llegar. Proporciona una definición clara y una visión de tu público objetivo. Explica las actitudes y comportamientos de tu audiencia. Descríbelos usando datos demográficos, psicográficas, cultura, comportamientos mediáticos, etc. Incluye hábitos de consumo de actitud / comportamiento / medios de comunicación.', '(Máximo: 150 palabras y 3 gráficos)', 150, 3, 1, NULL, NULL, NULL),
(3, 'Q2021S1C', 'Objetivos e indicadores clave (KPIs)', '¿Cuáles son tus objetivos medibles y por qué son importantes para la marca? ¿Cuáles son los indicadores clave (KPI) para medir dichos objetivos? Tu propuesta puede tener uno o más objetivos relacionados a:\r\nA. Negocio\r\nB. Comportamiento\r\nC. Perceptual / Actitudinal (imagen)\r\nIndica el objetivo general y los objetivos específicos. Explica por qué estos objetivos son importantes para la marca. Proporciona un porcentaje de avance o un plazo para alcanzar los objetivos.', '(Máximo: 150 palabras y 3 gráficos)', 150, 3, 1, NULL, NULL, NULL),
(4, 'Q2021S1D', 'Fuentes utilizadas en esta sección', 'Proporciona la fuente de todos los datos y hechos presentados en esta sección del formulario.\r\nCITACIÓN SUGERIDA: Fuente, Tipo de Datos / Investigación, Cubertura (periodo, ámbito y target)', '(Máximo: 300 palabras)', 300, 0, 1, NULL, NULL, NULL),
(5, 'Q2021S2A', 'Idea estratégica (Big idea)', 'En una frase, indica tu idea estratégica. ¿Cuál es la idea principal que impulsará tu estrategia, es decir, cómo vas a guiar tu estrategia de comunicación?', '(Una frase de máximo 20 palabras)', 20, 0, 2, NULL, NULL, NULL),
(6, 'Q2021S2B', 'Insight', '¿Cuál fue el insight que te llevó a definir la idea y estrategia? ¿Qué observaciones te llevaron a identificar tu idea?\r\nExplica cómo la información del público objetivo, los medios, la oportunidad del mercado o las tendencias, así como otras informaciones relevantes, impulsaron tu idea. Detalla cualquier investigación que conduzca a validar tu idea.', '(Máximo: 200 palabras y 3 gráficos)', 200, 3, 2, NULL, NULL, NULL),
(7, 'Q2021S2C', 'Fuentes utilizadas en esta sección', 'Proporciona la fuente de todos los datos y hechos presentados en esta sección del formulario.\r\nCITACIÓN SUGERIDA: Fuente, Tipo de Datos / Investigación, Cubertura (periodo, ámbito y target)', '(Máximo: 300 palabras)', 300, 0, 2, NULL, NULL, NULL),
(8, 'Q2021S3A', 'Estrategia de comunicación y medios', '¿Cómo vas a dar vida a la idea? Explica tu idea y tu estrategia general de comunicación. Describe y proporciona razones para tal diseño de estrategia. Describe las opciones de medios y explica por qué las seleccionaste. Demuestre cómo sus ejecuciones creativas abordan el desafío. ¿Cómo funcionan juntas tus estrategias creativas y de medios para llegar a tu público objetivo?', '(Máximo: 400 palabras y 3 gráficos)', 400, 3, 3, NULL, NULL, NULL),
(9, 'Q2021S3B', 'Asignación presupuestaria', 'Enumera los principales puntos de contacto de comunicaciones para tu esfuerzo y calcula el porcentaje del presupuesto total que se asignará a cada uno.', '(Máximo: 100 palabras y 3 gráficos)', 100, 3, 3, NULL, NULL, NULL),
(10, 'Q2021S3C', 'Fuentes utilizadas en esta sección', 'Proporciona la fuente de todos los datos y hechos presentados en esta sección del formulario.\r\nCITACIÓN SUGERIDA: Fuente, Tipo de Datos / Investigación, Cubertura (periodo, ámbito y target)', '(Máximo: 300 palabras)', 300, 0, 3, NULL, NULL, NULL),
(11, 'Q2021S4A', 'Metodología de medición', '¿Cómo sabes que tu plan funcionará? Identifica la metodología de medición que se utilizará para determinar los resultados. Asegúrate de abordar la medición de todos los objetivos planteados en la tercera pregunta de la primera sección. Sustenta las razones para utilizar dichas metodologías.', '(Máximo: 200 palabras y 5 gráficos)', 200, 5, 4, NULL, NULL, NULL),
(12, 'Q2021S4B', 'Benchmarks', '¿Cuáles son tus puntos de referencia pre / post?', '(Máximo: 100 palabras y 5 gráficos)', 100, 5, 4, NULL, NULL, '2021-04-14 06:00:00'),
(13, 'Q2021S4C', 'Resultados potenciales', '¿Cuáles son los posibles resultados? ¿En qué basas tus proyecciones? Identifica variables internas o externas que podrían impactar en estos resultados. ¿Cómo planeas hacer la retroalimentación de tu idea estratégica en función de los resultados?', '(Máximo: 100 palabras y 5 gráficos)', 100, 5, 4, NULL, NULL, NULL),
(14, 'Q2021S4D', 'Fuentes utilizadas en esta sección', 'Proporciona la fuente de todos los datos y hechos presentados en esta sección del formulario.\r\nCITACIÓN SUGERIDA: Fuente, Tipo de Datos / Investigación, Cubertura (periodo, ámbito y target)', '(Máximo: 300 palabras)', 300, 0, 4, NULL, NULL, NULL),
(15, 'Q2021S5A', 'Carga de archivos', '', '(De obviar alguno de los puntos, el jurado podría descalificar a todo el equipo.)', 0, 0, 5, NULL, NULL, NULL),
(16, 'Q2021TTL', 'Título de la propuesta', 'Proporciona a tu campaña un título que será utilizado con fines publicitarios si tu caso es finalista o ganador.', '(Máximo 100 caracteres)', 100, 0, 5, NULL, NULL, NULL),
(17, 'Q2022S1A', 'CONTEXTO Y DESAFÍO DE LA MARCA', '¿Cuál es el desafío o las oportunidades específicas a los que se enfrenta la marca? ¿Cuál es el contexto sobre la categoría/mercado, la marca, el entorno competitivo o de consumo que creó este desafío u oportunidad para la marca? ', '(Máximo: 300 palabras)', 300, 3, 6, NULL, NULL, NULL),
(18, 'Q2022S1B', 'POBLACIÓN OBJETIVO', 'Definan el público al que se intenta llegar. Proporcionar una definición clara y una visión de su público objetivo. Hablen sobre las actitudes y comportamientos de su audiencia. Descríbanlos usando datos demográficos, hábitos de consumo, uso de medios, etc., toda la información relevante que esté relacionada con el desafío planteado y la propuesta frente a este.', '(Máximo: 150 palabras)', 150, 3, 6, NULL, NULL, NULL),
(19, 'Q2022S1C', 'OBJETIVOS E INDICADORES CLAVE (KPIs)', '¿Cuáles son los objetivos que esperan alcanzar? Los objetivos deben ser medibles. Indicar por qué estos objetivos son importantes para la marca. ¿Cuáles son los indicadores clave (KPI) para medir dichos objetivos? \r\nIndiquen el objetivo general y los específicos (sugerencia: no más de 4). Proporcione un % de avance o un plazo estimado para alcanzar dichos los objetivos.', '(Máximo: 150 palabras)', 150, 3, 6, NULL, NULL, NULL),
(20, 'Q2022S1D', 'FUENTES UTILIZADAS EN ESTA SECCIÓN', 'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario.\r\nCITA SUGERIDA: Fuente, Tipo de Datos/Investigación, Cubertura (periodo, ámbito, publico objetivo).\r\nIMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información.', '(Máximo: 300 palabras)', 300, 0, 6, NULL, NULL, NULL),
(21, 'Q2022S2A', 'INSIGHT', '¿Cuál fue el Insight que los llevó a definir la idea estrategia? ¿Qué observaciones llevaron a identificar esta idea? \r\nExpliquen cómo la información del público objetivo, los medios, la oportunidad del mercado o las tendencias, así como otras informaciones relevantes impulsaron su idea. Detallar cualquier investigación que condujera a validar su idea.', '(Máximo: 200 palabras)', 200, 3, 7, NULL, NULL, NULL),
(22, 'Q2022S2B', 'IDEA ESTRATÉGICA', 'En una frase, diga su idea estratégica. ¿Cuál es la idea principal que impulsará su propuesta?', '(Una frase de máximo 20 palabras)', 20, 0, 7, NULL, NULL, NULL),
(23, 'Q2022S2C', 'FUENTES UTILIZADAS EN ESTA SECCIÓN', 'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario.\r\nCITA SUGERIDA: Fuente, Tipo de Datos/Investigación, Cubertura (periodo, ámbito, publico objetivo).\r\nIMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información.', '(Máximo: 300 palabras)', 300, 0, 7, NULL, NULL, NULL),
(24, 'Q2022S3A', 'EJECUCIÓN DE LA IDEA ESTRATÉGICA', '¿Cómo vas a dar vida a la idea? Expliquen como su idea estrategia se llevará a cabo: elementos, medios, momentos, etc. Proporcionar razones para tal diseño y la selección de medios. Demuestre cómo sus ejecuciones creativas abordan el desafío, cómo funcionan juntas sus estrategias creativas y de medios para llegar a su público objetivo.', '(Máximo: 400 palabras)', 400, 3, 8, NULL, NULL, NULL),
(25, 'Q2022S3B', 'ASIGNACIÓN PRESUPUESTARIA', 'Enumeren los principales puntos de contacto para su propuesta y calculen el porcentaje (%) del presupuesto total que se asignará a cada uno. Justifique esta asignación.', '(Máximo: 100 palabras)', 100, 3, 8, NULL, NULL, NULL),
(26, 'Q2022S3C', 'FUENTES UTILIZADAS EN ESTA SECCIÓN', 'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario.\r\nCITA SUGERIDA: Fuente, Tipo de Datos/Investigación, Cubertura (periodo, ámbito, publico objetivo).\r\nIMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información.', '(Máximo: 300 palabras)', 300, 0, 8, NULL, NULL, NULL),
(27, 'Q2022S4A', 'METODOLOGÍA DE MEDICIÓN', '¿Cómo saben que su estrategia funcionará? Identificar la metodología de medición que se utilizará para determinar los resultados. Asegúrense de abordar la medición todos los objetivos planteados en 1C. Sustentar las razones para utilizar dichas metodologías.', '(Máximo: 200 palabras)', 200, 5, 9, NULL, NULL, NULL),
(28, 'Q2022S4B', 'RESULTADOS POTENCIALES', '¿Cuáles son los posibles resultados? ¿en qué basan sus proyecciones? ¿Cómo planean hacer la retroalimentación de su estrategia en función de los resultados? Además, es importante que mencionen variables internas o externas que podrían impactar en estos resultados.', '(Máximo: 100 palabras)', 100, 5, 9, NULL, NULL, '2021-04-14 06:00:00'),
(29, 'Q2022S4C', 'RESULTADOS POTENCIALES', '¿Cuáles son los posibles resultados? ¿en qué basan sus proyecciones? ¿Cómo planean hacer la retroalimentación de su estrategia en función de los resultados? Además, es importante que mencionen variables internas o externas que podrían impactar en estos resultados.', '(Máximo: 100 palabras)', 100, 5, 9, NULL, NULL, NULL),
(30, 'Q2022S4D', 'FUENTES UTILIZADAS EN ESTA SECCIÓN', 'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario.\r\nCITA SUGERIDA: Fuente, Tipo de Datos/Investigación, Cubertura (periodo, ámbito, publico objetivo).\r\nIMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información.', '(Máximo: 300 palabras)', 300, 0, 9, NULL, NULL, NULL),
(31, 'Q2022S5A', 'INSTRUCCIONES PARA CARGAR ARCHIVOS', '', '(De obviar alguno de los puntos, el jurado podría descalificar a todo el equipo.)', 0, 0, 10, NULL, NULL, NULL),
(32, 'Q2022TTL', 'Título de la propuesta', 'Proporciona a tu campaña un título que será utilizado con fines publicitarios si tu caso es finalista o ganador.', '(Máximo 100 caracteres)', 100, 0, 10, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
