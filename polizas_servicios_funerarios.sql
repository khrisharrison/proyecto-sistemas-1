-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-07-2023 a las 21:00:22
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `polizas_servicios_funerarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

DROP TABLE IF EXISTS `beneficiario`;
CREATE TABLE IF NOT EXISTS `beneficiario` (
  `CEDULA_beneficiario` int NOT NULL,
  `PARTIDA_NACIMIENTO` varchar(10) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `FECHA_DECESO` date DEFAULT NULL,
  `CAUSA_MUERTE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CEDULA_beneficiario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarioxpoliza`
--

DROP TABLE IF EXISTS `beneficiarioxpoliza`;
CREATE TABLE IF NOT EXISTS `beneficiarioxpoliza` (
  `CEDULA_beneficiario` int NOT NULL,
  `NUMERO` int NOT NULL,
  PRIMARY KEY (`CEDULA_beneficiario`,`NUMERO`),
  KEY `fk_BENEFICIARIO_has_POLIZA_POLIZA1_idx` (`NUMERO`),
  KEY `fk_BENEFICIARIO_has_POLIZA_BENEFICIARIO1_idx` (`CEDULA_beneficiario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cementerio`
--

DROP TABLE IF EXISTS `cementerio`;
CREATE TABLE IF NOT EXISTS `cementerio` (
  `RIF_cementerio` int NOT NULL,
  `TIPO` varchar(20) NOT NULL,
  PRIMARY KEY (`RIF_cementerio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cementerioxpoliza`
--

DROP TABLE IF EXISTS `cementerioxpoliza`;
CREATE TABLE IF NOT EXISTS `cementerioxpoliza` (
  `Rif_Cem` int NOT NULL,
  `Nro_poliza` int NOT NULL,
  PRIMARY KEY (`Rif_Cem`,`Nro_poliza`),
  KEY `fk_CEMENTERIO_has_POLIZA_POLIZA1_idx` (`Nro_poliza`),
  KEY `fk_CEMENTERIO_has_POLIZA_CEMENTERIO1_idx` (`Rif_Cem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `CODIGO_CIUDAD` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_CIUDAD` varchar(30) NOT NULL,
  `CODIGO_PARROQUIA` int NOT NULL,
  PRIMARY KEY (`CODIGO_CIUDAD`),
  KEY `fk_CIUDAD_PARROQUIA1_idx` (`CODIGO_PARROQUIA`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`CODIGO_CIUDAD`, `NOMBRE_CIUDAD`, `CODIGO_PARROQUIA`) VALUES
(1, 'Porlamar', 713),
(2, 'La Plaza de Paraguachí', 699),
(3, 'La Asunción', 700),
(4, 'El Valle del Espíritu Santo', 701),
(5, 'Villa Rosa', 702),
(6, 'El Maco', 703),
(7, 'Tacarigua', 704),
(8, 'Pedro González', 705),
(9, 'Santa Ana', 706),
(10, 'Altagracia', 707),
(11, 'El Pilar (Los Robles)', 708),
(12, 'Pampatar', 709),
(13, 'Los Millanes', 710),
(14, 'Juangriego', 711),
(15, 'Boca del Pozo', 714),
(16, 'Boca del Río', 715),
(17, 'Punta de Piedras', 716),
(18, 'El Guamache', 717),
(19, 'Güinima', 718),
(20, 'San Pedro de Coche', 719),
(21, 'San Juan Bautista', 720),
(22, 'La Guardia', 721);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_juridica`
--

DROP TABLE IF EXISTS `entidad_juridica`;
CREATE TABLE IF NOT EXISTS `entidad_juridica` (
  `RIF` int NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `Cod_ciudad_Ju` int NOT NULL,
  PRIMARY KEY (`RIF`),
  KEY `fk_ENTIDAD_JURIDICA_CIUDAD1_idx` (`Cod_ciudad_Ju`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `CODIGO_ESTADO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_ESTADO` varchar(20) NOT NULL,
  PRIMARY KEY (`CODIGO_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`CODIGO_ESTADO`, `NOMBRE_ESTADO`) VALUES
(1, 'Amazonas'),
(2, 'Anzoátegui'),
(3, 'Apure'),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolívar'),
(7, 'Carabobo'),
(8, 'Cojedes'),
(9, 'Delta Amacuro'),
(10, 'Falcón'),
(11, 'Guárico'),
(12, 'Lara'),
(13, 'Mérida'),
(14, 'Miranda'),
(15, 'Monagas'),
(16, 'Nueva Esparta'),
(17, 'Portuguesa'),
(18, 'Sucre'),
(19, 'Táchira'),
(20, 'Trujillo'),
(21, 'La Guaira'),
(22, 'Yaracuy'),
(23, 'Zulia'),
(24, 'Distrito Capital'),
(25, 'Dependencias Federal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_pago`
--

DROP TABLE IF EXISTS `factura_pago`;
CREATE TABLE IF NOT EXISTS `factura_pago` (
  `NUMERO_FACTURA` int NOT NULL,
  `NUMERO_POLIZA` int NOT NULL,
  `FECHA_EMISION` date NOT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  PRIMARY KEY (`NUMERO_FACTURA`,`NUMERO_POLIZA`),
  KEY `fk_FACTURA_PAGO_POLIZA1_idx` (`NUMERO_POLIZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funeraria`
--

DROP TABLE IF EXISTS `funeraria`;
CREATE TABLE IF NOT EXISTS `funeraria` (
  `RIF_funeraria` int NOT NULL,
  `TIPO` varchar(20) NOT NULL,
  PRIMARY KEY (`RIF_funeraria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funerariaxservicio`
--

DROP TABLE IF EXISTS `funerariaxservicio`;
CREATE TABLE IF NOT EXISTS `funerariaxservicio` (
  `RIF_funeraria` int NOT NULL,
  `CODIGO_SERVICIO` int NOT NULL,
  PRIMARY KEY (`RIF_funeraria`,`CODIGO_SERVICIO`),
  KEY `fk_SERVICIO_FUNERARIO_has_FUNERARIA_FUNERARIA1_idx` (`RIF_funeraria`),
  KEY `fk_SERVICIO_FUNERARIO_has_FUNERARIA_SERVICIO_FUNERARIO1_idx` (`CODIGO_SERVICIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juridicoxpoliza`
--

DROP TABLE IF EXISTS `juridicoxpoliza`;
CREATE TABLE IF NOT EXISTS `juridicoxpoliza` (
  `RIF_juridico` int NOT NULL,
  `NUMERO_POLIZA` int NOT NULL,
  PRIMARY KEY (`RIF_juridico`,`NUMERO_POLIZA`),
  KEY `fk_POLIZA_has_RESPONSABLE_JURIDICO_RESPONSABLE_JURIDICO1_idx` (`RIF_juridico`),
  KEY `fk_POLIZA_has_RESPONSABLE_JURIDICO_POLIZA1_idx` (`NUMERO_POLIZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `CODIGO_MUNICIPIO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_MUNICIPIO` varchar(20) NOT NULL,
  `CODIGO_ESTADO` int NOT NULL,
  PRIMARY KEY (`CODIGO_MUNICIPIO`),
  KEY `CODIGO_ESTADO_idx` (`CODIGO_ESTADO`) INVISIBLE
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`CODIGO_MUNICIPIO`, `NOMBRE_MUNICIPIO`, `CODIGO_ESTADO`) VALUES
(1, 'Alto Orinoco', 1),
(2, 'Atabapo', 1),
(3, 'Atures', 1),
(4, 'Autana', 1),
(5, 'Manapiare', 1),
(6, 'Maroa', 1),
(7, 'Río Negro', 1),
(8, 'Anaco', 2),
(9, 'Aragua', 2),
(10, 'Manuel Ezequiel Bruz', 2),
(11, 'Diego Bautista Urban', 2),
(12, 'Fernando Peñalver', 2),
(13, 'Francisco Del Carmen', 2),
(14, 'General Sir Arthur M', 2),
(15, 'Guanta', 2),
(16, 'Independencia', 2),
(17, 'José Gregorio Monaga', 2),
(18, 'Juan Antonio Sotillo', 2),
(19, 'Juan Manuel Cajigal', 2),
(20, 'Libertad', 2),
(21, 'Francisco de Miranda', 2),
(22, 'Pedro María Freites', 2),
(23, 'Píritu', 2),
(24, 'San José de Guanipa', 2),
(25, 'San Juan de Capistra', 2),
(26, 'Santa Ana', 2),
(27, 'Simón Bolívar', 2),
(28, 'Simón Rodríguez', 2),
(29, 'Achaguas', 3),
(30, 'Biruaca', 3),
(31, 'Muñóz', 3),
(32, 'Páez', 3),
(33, 'Pedro Camejo', 3),
(34, 'Rómulo Gallegos', 3),
(35, 'San Fernando', 3),
(36, 'Atanasio Girardot', 4),
(37, 'Bolívar', 4),
(38, 'Camatagua', 4),
(39, 'Francisco Linares Al', 4),
(40, 'José Ángel Lamas', 4),
(41, 'José Félix Ribas', 4),
(42, 'José Rafael Revenga', 4),
(43, 'Libertador', 4),
(44, 'Mario Briceño Iragor', 4),
(45, 'Ocumare de la Costa ', 4),
(46, 'San Casimiro', 4),
(47, 'San Sebastián', 4),
(48, 'Santiago Mariño', 4),
(49, 'Santos Michelena', 4),
(50, 'Sucre', 4),
(51, 'Tovar', 4),
(52, 'Urdaneta', 4),
(53, 'Zamora', 4),
(54, 'Alberto Arvelo Torre', 5),
(55, 'Andrés Eloy Blanco', 5),
(56, 'Antonio José de Sucr', 5),
(57, 'Arismendi', 5),
(58, 'Barinas', 5),
(59, 'Bolívar', 5),
(60, 'Cruz Paredes', 5),
(61, 'Ezequiel Zamora', 5),
(62, 'Obispos', 5),
(63, 'Pedraza', 5),
(64, 'Rojas', 5),
(65, 'Sosa', 5),
(66, 'Caroní', 6),
(67, 'Cedeño', 6),
(68, 'El Callao', 6),
(69, 'Gran Sabana', 6),
(70, 'Heres', 6),
(71, 'Piar', 6),
(72, 'Angostura (Raúl Leon', 6),
(73, 'Roscio', 6),
(74, 'Sifontes', 6),
(75, 'Sucre', 6),
(76, 'Padre Pedro Chien', 6),
(77, 'Bejuma', 7),
(78, 'Carlos Arvelo', 7),
(79, 'Diego Ibarra', 7),
(80, 'Guacara', 7),
(81, 'Juan José Mora', 7),
(82, 'Libertador', 7),
(83, 'Los Guayos', 7),
(84, 'Miranda', 7),
(85, 'Montalbán', 7),
(86, 'Naguanagua', 7),
(87, 'Puerto Cabello', 7),
(88, 'San Diego', 7),
(89, 'San Joaquín', 7),
(90, 'Valencia', 7),
(91, 'Anzoátegui', 8),
(92, 'Tinaquillo', 8),
(93, 'Girardot', 8),
(94, 'Lima Blanco', 8),
(95, 'Pao de San Juan Baut', 8),
(96, 'Ricaurte', 8),
(97, 'Rómulo Gallegos', 8),
(98, 'San Carlos', 8),
(99, 'Tinaco', 8),
(100, 'Antonio Díaz', 9),
(101, 'Casacoima', 9),
(102, 'Pedernales', 9),
(103, 'Tucupita', 9),
(104, 'Acosta', 10),
(105, 'Bolívar', 10),
(106, 'Buchivacoa', 10),
(107, 'Cacique Manaure', 10),
(108, 'Carirubana', 10),
(109, 'Colina', 10),
(110, 'Dabajuro', 10),
(111, 'Democracia', 10),
(112, 'Falcón', 10),
(113, 'Federación', 10),
(114, 'Jacura', 10),
(115, 'José Laurencio Silva', 10),
(116, 'Los Taques', 10),
(117, 'Mauroa', 10),
(118, 'Miranda', 10),
(119, 'Monseñor Iturriza', 10),
(120, 'Palmasola', 10),
(121, 'Petit', 10),
(122, 'Píritu', 10),
(123, 'San Francisco', 10),
(124, 'Sucre', 10),
(125, 'Tocópero', 10),
(126, 'Unión', 10),
(127, 'Urumaco', 10),
(128, 'Zamora', 10),
(129, 'Camaguán', 11),
(130, 'Chaguaramas', 11),
(131, 'El Socorro', 11),
(132, 'José Félix Ribas', 11),
(133, 'José Tadeo Monagas', 11),
(134, 'Juan Germán Roscio', 11),
(135, 'Julián Mellado', 11),
(136, 'Las Mercedes', 11),
(137, 'Leonardo Infante', 11),
(138, 'Pedro Zaraza', 11),
(139, 'Ortíz', 11),
(140, 'San Gerónimo de Guay', 11),
(141, 'San José de Guaribe', 11),
(142, 'Santa María de Ipire', 11),
(143, 'Sebastián Francisco ', 11),
(144, 'Andrés Eloy Blanco', 12),
(145, 'Crespo', 12),
(146, 'Iribarren', 12),
(147, 'Jiménez', 12),
(148, 'Morán', 12),
(149, 'Palavecino', 12),
(150, 'Simón Planas', 12),
(151, 'Torres', 12),
(152, 'Urdaneta', 12),
(179, 'Alberto Adriani', 13),
(180, 'Andrés Bello', 13),
(181, 'Antonio Pinto Salina', 13),
(182, 'Aricagua', 13),
(183, 'Arzobispo Chacón', 13),
(184, 'Campo Elías', 13),
(185, 'Caracciolo Parra Olm', 13),
(186, 'Cardenal Quintero', 13),
(187, 'Guaraque', 13),
(188, 'Julio César Salas', 13),
(189, 'Justo Briceño', 13),
(190, 'Libertador', 13),
(191, 'Miranda', 13),
(192, 'Obispo Ramos de Lora', 13),
(193, 'Padre Noguera', 13),
(194, 'Pueblo Llano', 13),
(195, 'Rangel', 13),
(196, 'Rivas Dávila', 13),
(197, 'Santos Marquina', 13),
(198, 'Sucre', 13),
(199, 'Tovar', 13),
(200, 'Tulio Febres Cordero', 13),
(201, 'Zea', 13),
(223, 'Acevedo', 14),
(224, 'Andrés Bello', 14),
(225, 'Baruta', 14),
(226, 'Brión', 14),
(227, 'Buroz', 14),
(228, 'Carrizal', 14),
(229, 'Chacao', 14),
(230, 'Cristóbal Rojas', 14),
(231, 'El Hatillo', 14),
(232, 'Guaicaipuro', 14),
(233, 'Independencia', 14),
(234, 'Lander', 14),
(235, 'Los Salias', 14),
(236, 'Páez', 14),
(237, 'Paz Castillo', 14),
(238, 'Pedro Gual', 14),
(239, 'Plaza', 14),
(240, 'Simón Bolívar', 14),
(241, 'Sucre', 14),
(242, 'Urdaneta', 14),
(243, 'Zamora', 14),
(258, 'Acosta', 15),
(259, 'Aguasay', 15),
(260, 'Bolívar', 15),
(261, 'Caripe', 15),
(262, 'Cedeño', 15),
(263, 'Ezequiel Zamora', 15),
(264, 'Libertador', 15),
(265, 'Maturín', 15),
(266, 'Piar', 15),
(267, 'Punceres', 15),
(268, 'Santa Bárbara', 15),
(269, 'Sotillo', 15),
(270, 'Uracoa', 15),
(271, 'Antolín del Campo', 16),
(272, 'Arismendi', 16),
(273, 'García', 16),
(274, 'Gómez', 16),
(275, 'Maneiro', 16),
(276, 'Marcano', 16),
(277, 'Mariño', 16),
(278, 'Península de Macanao', 16),
(279, 'Tubores', 16),
(280, 'Villalba', 16),
(281, 'Díaz', 16),
(282, 'Agua Blanca', 17),
(283, 'Araure', 17),
(284, 'Esteller', 17),
(285, 'Guanare', 17),
(286, 'Guanarito', 17),
(287, 'Monseñor José Vicent', 17),
(288, 'Ospino', 17),
(289, 'Páez', 17),
(290, 'Papelón', 17),
(291, 'San Genaro de Bocono', 17),
(292, 'San Rafael de Onoto', 17),
(293, 'Santa Rosalía', 17),
(294, 'Sucre', 17),
(295, 'Turén', 17),
(296, 'Andrés Eloy Blanco', 18),
(297, 'Andrés Mata', 18),
(298, 'Arismendi', 18),
(299, 'Benítez', 18),
(300, 'Bermúdez', 18),
(301, 'Bolívar', 18),
(302, 'Cajigal', 18),
(303, 'Cruz Salmerón Acosta', 18),
(304, 'Libertador', 18),
(305, 'Mariño', 18),
(306, 'Mejía', 18),
(307, 'Montes', 18),
(308, 'Ribero', 18),
(309, 'Sucre', 18),
(310, 'Valdéz', 18),
(341, 'Andrés Bello', 19),
(342, 'Antonio Rómulo Costa', 19),
(343, 'Ayacucho', 19),
(344, 'Bolívar', 19),
(345, 'Cárdenas', 19),
(346, 'Córdoba', 19),
(347, 'Fernández Feo', 19),
(348, 'Francisco de Miranda', 19),
(349, 'García de Hevia', 19),
(350, 'Guásimos', 19),
(351, 'Independencia', 19),
(352, 'Jáuregui', 19),
(353, 'José María Vargas', 19),
(354, 'Junín', 19),
(355, 'Libertad', 19),
(356, 'Libertador', 19),
(357, 'Lobatera', 19),
(358, 'Michelena', 19),
(359, 'Panamericano', 19),
(360, 'Pedro María Ureña', 19),
(361, 'Rafael Urdaneta', 19),
(362, 'Samuel Darío Maldona', 19),
(363, 'San Cristóbal', 19),
(364, 'Seboruco', 19),
(365, 'Simón Rodríguez', 19),
(366, 'Sucre', 19),
(367, 'Torbes', 19),
(368, 'Uribante', 19),
(369, 'San Judas Tadeo', 19),
(370, 'Andrés Bello', 20),
(371, 'Boconó', 20),
(372, 'Bolívar', 20),
(373, 'Candelaria', 20),
(374, 'Carache', 20),
(375, 'Escuque', 20),
(376, 'José Felipe Márquez ', 20),
(377, 'Juan Vicente Campos ', 20),
(378, 'La Ceiba', 20),
(379, 'Miranda', 20),
(380, 'Monte Carmelo', 20),
(381, 'Motatán', 20),
(382, 'Pampán', 20),
(383, 'Pampanito', 20),
(384, 'Rafael Rangel', 20),
(385, 'San Rafael de Carvaj', 20),
(386, 'Sucre', 20),
(387, 'Trujillo', 20),
(388, 'Urdaneta', 20),
(389, 'Valera', 20),
(390, 'Vargas', 21),
(391, 'Arístides Bastidas', 22),
(392, 'Bolívar', 22),
(407, 'Bruzual', 22),
(408, 'Cocorote', 22),
(409, 'Independencia', 22),
(410, 'José Antonio Páez', 22),
(411, 'La Trinidad', 22),
(412, 'Manuel Monge', 22),
(413, 'Nirgua', 22),
(414, 'Peña', 22),
(415, 'San Felipe', 22),
(416, 'Sucre', 22),
(417, 'Urachiche', 22),
(418, 'José Joaquín Veroes', 22),
(441, 'Almirante Padilla', 23),
(442, 'Baralt', 23),
(443, 'Cabimas', 23),
(444, 'Catatumbo', 23),
(445, 'Colón', 23),
(446, 'Francisco Javier Pul', 23),
(447, 'Páez', 23),
(448, 'Jesús Enrique Losada', 23),
(449, 'Jesús María Semprún', 23),
(450, 'La Cañada de Urdanet', 23),
(451, 'Lagunillas', 23),
(452, 'Machiques de Perijá', 23),
(453, 'Mara', 23),
(454, 'Maracaibo', 23),
(455, 'Miranda', 23),
(456, 'Rosario de Perijá', 23),
(457, 'San Francisco', 23),
(458, 'Santa Rita', 23),
(459, 'Simón Bolívar', 23),
(460, 'Sucre', 23),
(461, 'Valmore Rodríguez', 23),
(462, 'Libertador', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naturalxpoliza`
--

DROP TABLE IF EXISTS `naturalxpoliza`;
CREATE TABLE IF NOT EXISTS `naturalxpoliza` (
  `CEDULA_natural` int NOT NULL,
  `NUMERO_POLIZA` int NOT NULL,
  PRIMARY KEY (`CEDULA_natural`,`NUMERO_POLIZA`),
  KEY `fk_POLIZA_has_RESPONSABLE_NATURAL_RESPONSABLE_NATURAL1_idx` (`CEDULA_natural`),
  KEY `fk_POLIZA_has_RESPONSABLE_NATURAL_POLIZA1_idx` (`NUMERO_POLIZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

DROP TABLE IF EXISTS `parroquia`;
CREATE TABLE IF NOT EXISTS `parroquia` (
  `CODIGO_PARROQUIA` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_PARROQUIA` varchar(20) NOT NULL,
  `CODIGO_MUNICIPIO` int NOT NULL,
  PRIMARY KEY (`CODIGO_PARROQUIA`),
  KEY `CODIGO_MUNICIPIO_idx` (`CODIGO_MUNICIPIO`)
) ENGINE=InnoDB AUTO_INCREMENT=1139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`CODIGO_PARROQUIA`, `NOMBRE_PARROQUIA`, `CODIGO_MUNICIPIO`) VALUES
(1, 'Alto Orinoco', 1),
(2, 'Huachamacare Acanaña', 1),
(3, 'Marawaka Toky Shaman', 1),
(4, 'Mavaka Mavaka', 1),
(5, 'Sierra Parima Parima', 1),
(6, 'Ucata Laja Lisa', 2),
(7, 'Yapacana Macuruco', 2),
(8, 'Caname Guarinuma', 2),
(9, 'Fernando Girón Tovar', 3),
(10, 'Luis Alberto Gómez', 3),
(11, 'Pahueña Limón de Par', 3),
(12, 'Platanillal Platanil', 3),
(13, 'Samariapo', 4),
(14, 'Sipapo', 4),
(15, 'Munduapo', 4),
(16, 'Guayapo', 4),
(17, 'Alto Ventuari', 5),
(18, 'Medio Ventuari', 5),
(19, 'Bajo Ventuari', 5),
(20, 'Victorino', 6),
(21, 'Comunidad', 6),
(22, 'Casiquiare', 7),
(23, 'Cocuy', 7),
(24, 'San Carlos de Río Ne', 7),
(25, 'Solano', 7),
(26, 'Anaco', 8),
(27, 'San Joaquín', 8),
(28, 'Cachipo', 9),
(29, 'Aragua de Barcelona', 9),
(30, 'Lechería', 11),
(31, 'El Morro', 11),
(32, 'Puerto Píritu', 12),
(33, 'San Miguel', 12),
(34, 'Sucre', 12),
(35, 'Valle de Guanape', 13),
(36, 'Santa Bárbara', 13),
(37, 'El Chaparro', 14),
(38, 'Tomás Alfaro', 14),
(39, 'Calatrava', 14),
(40, 'Guanta', 15),
(41, 'Chorrerón', 15),
(42, 'Mamo', 16),
(43, 'Soledad', 16),
(44, 'Mapire', 17),
(45, 'Piar', 17),
(46, 'Santa Clara', 17),
(47, 'San Diego de Cabruti', 17),
(48, 'Uverito', 17),
(49, 'Zuata', 17),
(50, 'Puerto La Cruz', 18),
(51, 'Pozuelos', 18),
(52, 'Onoto', 19),
(53, 'San Pablo', 19),
(54, 'San Mateo', 20),
(55, 'El Carito', 20),
(56, 'Santa Inés', 20),
(57, 'La Romereña', 20),
(58, 'Atapirire', 21),
(59, 'Boca del Pao', 21),
(60, 'El Pao', 21),
(61, 'Pariaguán', 21),
(62, 'Cantaura', 22),
(63, 'Libertador', 22),
(64, 'Santa Rosa', 22),
(65, 'Urica', 22),
(66, 'Píritu', 23),
(67, 'San Francisco', 23),
(68, 'San José de Guanipa', 24),
(69, 'Boca de Uchire', 25),
(70, 'Boca de Chávez', 25),
(71, 'Pueblo Nuevo', 26),
(72, 'Santa Ana', 26),
(73, 'Bergantín', 27),
(74, 'Caigua', 27),
(75, 'El Carmen', 27),
(76, 'El Pilar', 27),
(77, 'Naricual', 27),
(78, 'San Crsitóbal', 27),
(79, 'Edmundo Barrios', 28),
(80, 'Miguel Otero Silva', 28),
(81, 'Achaguas', 29),
(82, 'Apurito', 29),
(83, 'El Yagual', 29),
(84, 'Guachara', 29),
(85, 'Mucuritas', 29),
(86, 'Queseras del medio', 29),
(87, 'Biruaca', 30),
(88, 'Bruzual', 31),
(89, 'Mantecal', 31),
(90, 'Quintero', 31),
(91, 'Rincón Hondo', 31),
(92, 'San Vicente', 31),
(93, 'Guasdualito', 32),
(94, 'Aramendi', 32),
(95, 'El Amparo', 32),
(96, 'San Camilo', 32),
(97, 'Urdaneta', 32),
(98, 'San Juan de Payara', 33),
(99, 'Codazzi', 33),
(100, 'Cunaviche', 33),
(101, 'Elorza', 34),
(102, 'La Trinidad', 34),
(103, 'San Fernando', 35),
(104, 'El Recreo', 35),
(105, 'Peñalver', 35),
(106, 'San Rafael de Atamai', 35),
(107, 'Pedro José Ovalles', 36),
(108, 'Joaquín Crespo', 36),
(109, 'José Casanova Godoy', 36),
(110, 'Madre María de San J', 36),
(111, 'Andrés Eloy Blanco', 36),
(112, 'Los Tacarigua', 36),
(113, 'Las Delicias', 36),
(114, 'Choroní', 36),
(115, 'Bolívar', 37),
(116, 'Camatagua', 38),
(117, 'Carmen de Cura', 38),
(118, 'Santa Rita', 39),
(119, 'Francisco de Miranda', 39),
(120, 'Moseñor Feliciano Go', 39),
(121, 'Santa Cruz', 40),
(122, 'José Félix Ribas', 41),
(123, 'Castor Nieves Ríos', 41),
(124, 'Las Guacamayas', 41),
(125, 'Pao de Zárate', 41),
(126, 'Zuata', 41),
(127, 'José Rafael Revenga', 42),
(128, 'Palo Negro', 43),
(129, 'San Martín de Porres', 43),
(130, 'El Limón', 44),
(131, 'Caña de Azúcar', 44),
(132, 'Ocumare de la Costa', 45),
(133, 'San Casimiro', 46),
(134, 'Güiripa', 46),
(135, 'Ollas de Caramacate', 46),
(136, 'Valle Morín', 46),
(137, 'San Sebastían', 47),
(138, 'Turmero', 48),
(139, 'Arevalo Aponte', 48),
(140, 'Chuao', 48),
(141, 'Samán de Güere', 48),
(142, 'Alfredo Pacheco Mira', 48),
(143, 'Santos Michelena', 49),
(144, 'Tiara', 49),
(145, 'Cagua', 50),
(146, 'Bella Vista', 50),
(147, 'Tovar', 51),
(148, 'Urdaneta', 52),
(149, 'Las Peñitas', 52),
(150, 'San Francisco de Car', 52),
(151, 'Taguay', 52),
(152, 'Zamora', 53),
(153, 'Magdaleno', 53),
(154, 'San Francisco de Así', 53),
(155, 'Valles de Tucutunemo', 53),
(156, 'Augusto Mijares', 53),
(157, 'Sabaneta', 54),
(158, 'Juan Antonio Rodrígu', 54),
(159, 'El Cantón', 55),
(160, 'Santa Cruz de Guacas', 55),
(161, 'Puerto Vivas', 55),
(162, 'Ticoporo', 56),
(163, 'Nicolás Pulido', 56),
(164, 'Andrés Bello', 56),
(165, 'Arismendi', 57),
(166, 'Guadarrama', 57),
(167, 'La Unión', 57),
(168, 'San Antonio', 57),
(169, 'Barinas', 58),
(170, 'Alberto Arvelo Larri', 58),
(171, 'San Silvestre', 58),
(172, 'Santa Inés', 58),
(173, 'Santa Lucía', 58),
(174, 'Torumos', 58),
(175, 'El Carmen', 58),
(176, 'Rómulo Betancourt', 58),
(177, 'Corazón de Jesús', 58),
(178, 'Ramón Ignacio Méndez', 58),
(179, 'Alto Barinas', 58),
(180, 'Manuel Palacio Fajar', 58),
(181, 'Juan Antonio Rodrígu', 58),
(182, 'Dominga Ortiz de Páe', 58),
(183, 'Barinitas', 59),
(184, 'Altamira de Cáceres', 59),
(185, 'Calderas', 59),
(186, 'Barrancas', 60),
(187, 'El Socorro', 60),
(188, 'Mazparrito', 60),
(189, 'Santa Bárbara', 61),
(190, 'Pedro Briceño Méndez', 61),
(191, 'Ramón Ignacio Méndez', 61),
(192, 'José Ignacio del Pum', 61),
(193, 'Obispos', 62),
(194, 'Guasimitos', 62),
(195, 'El Real', 62),
(196, 'La Luz', 62),
(197, 'Ciudad Bolívia', 63),
(198, 'José Ignacio Briceño', 63),
(199, 'José Félix Ribas', 63),
(200, 'Páez', 63),
(201, 'Libertad', 64),
(202, 'Dolores', 64),
(203, 'Santa Rosa', 64),
(204, 'Palacio Fajardo', 64),
(205, 'Ciudad de Nutrias', 65),
(206, 'El Regalo', 65),
(207, 'Puerto Nutrias', 65),
(208, 'Santa Catalina', 65),
(209, 'Cachamay', 66),
(210, 'Chirica', 66),
(211, 'Dalla Costa', 66),
(212, 'Once de Abril', 66),
(213, 'Simón Bolívar', 66),
(214, 'Unare', 66),
(215, 'Universidad', 66),
(216, 'Vista al Sol', 66),
(217, 'Pozo Verde', 66),
(218, 'Yocoima', 66),
(219, '5 de Julio', 66),
(220, 'Cedeño', 67),
(221, 'Altagracia', 67),
(222, 'Ascensión Farreras', 67),
(223, 'Guaniamo', 67),
(224, 'La Urbana', 67),
(225, 'Pijiguaos', 67),
(226, 'El Callao', 68),
(227, 'Gran Sabana', 69),
(228, 'Ikabarú', 69),
(229, 'Catedral', 70),
(230, 'Zea', 70),
(231, 'Orinoco', 70),
(232, 'José Antonio Páez', 70),
(233, 'Marhuanta', 70),
(234, 'Agua Salada', 70),
(235, 'Vista Hermosa', 70),
(236, 'La Sabanita', 70),
(237, 'Panapana', 70),
(238, 'Andrés Eloy Blanco', 71),
(239, 'Pedro Cova', 71),
(240, 'Raúl Leoni', 72),
(241, 'Barceloneta', 72),
(242, 'Santa Bárbara', 72),
(243, 'San Francisco', 72),
(244, 'Roscio', 73),
(245, 'Salóm', 73),
(246, 'Sifontes', 74),
(247, 'Dalla Costa', 74),
(248, 'San Isidro', 74),
(249, 'Sucre', 75),
(250, 'Aripao', 75),
(251, 'Guarataro', 75),
(252, 'Las Majadas', 75),
(253, 'Moitaco', 75),
(254, 'Padre Pedro Chien', 76),
(255, 'Río Grande', 76),
(256, 'Bejuma', 77),
(257, 'Canoabo', 77),
(258, 'Simón Bolívar', 77),
(259, 'Güigüe', 78),
(260, 'Carabobo', 78),
(261, 'Tacarigua', 78),
(262, 'Mariara', 79),
(263, 'Aguas Calientes', 79),
(264, 'Ciudad Alianza', 80),
(265, 'Guacara', 80),
(266, 'Yagua', 80),
(267, 'Morón', 81),
(268, 'Yagua', 81),
(269, 'Tocuyito', 82),
(270, 'Independencia', 82),
(271, 'Los Guayos', 83),
(272, 'Miranda', 84),
(273, 'Montalbán', 85),
(274, 'Naguanagua', 86),
(275, 'Bartolomé Salóm', 87),
(276, 'Democracia', 87),
(277, 'Fraternidad', 87),
(278, 'Goaigoaza', 87),
(279, 'Juan José Flores', 87),
(280, 'Unión', 87),
(281, 'Borburata', 87),
(282, 'Patanemo', 87),
(283, 'San Diego', 88),
(284, 'San Joaquín', 89),
(285, 'Candelaria', 90),
(286, 'Catedral', 90),
(287, 'El Socorro', 90),
(288, 'Miguel Peña', 90),
(289, 'Rafael Urdaneta', 90),
(290, 'San Blas', 90),
(291, 'San José', 90),
(292, 'Santa Rosa', 90),
(293, 'Negro Primero', 90),
(294, 'Cojedes', 91),
(295, 'Juan de Mata Suárez', 91),
(296, 'Tinaquillo', 92),
(297, 'El Baúl', 93),
(298, 'Sucre', 93),
(299, 'La Aguadita', 94),
(300, 'Macapo', 94),
(301, 'El Pao', 95),
(302, 'El Amparo', 96),
(303, 'Libertad de Cojedes', 96),
(304, 'Rómulo Gallegos', 97),
(305, 'San Carlos de Austri', 98),
(306, 'Juan Ángel Bravo', 98),
(307, 'Manuel Manrique', 98),
(308, 'General en Jefe José', 99),
(309, 'Curiapo', 100),
(310, 'Almirante Luis Brión', 100),
(311, 'Francisco Aniceto Lu', 100),
(312, 'Manuel Renaud', 100),
(313, 'Padre Barral', 100),
(314, 'Santos de Abelgas', 100),
(315, 'Imataca', 101),
(316, 'Cinco de Julio', 101),
(317, 'Juan Bautista Arisme', 101),
(318, 'Manuel Piar', 101),
(319, 'Rómulo Gallegos', 101),
(320, 'Pedernales', 102),
(321, 'Luis Beltrán Prieto ', 102),
(322, 'San José (Delta Amac', 103),
(323, 'José Vidal Marcano', 103),
(324, 'Juan Millán', 103),
(325, 'Leonardo Ruíz Pineda', 103),
(326, 'Mariscal Antonio Jos', 103),
(327, 'Monseñor Argimiro Ga', 103),
(328, 'San Rafael (Delta Am', 103),
(329, 'Virgen del Valle', 103),
(330, 'Clarines', 10),
(331, 'Guanape', 10),
(332, 'Sabana de Uchire', 10),
(333, 'Capadare', 104),
(334, 'La Pastora', 104),
(335, 'Libertador', 104),
(336, 'San Juan de los Cayo', 104),
(337, 'Aracua', 105),
(338, 'La Peña', 105),
(339, 'San Luis', 105),
(340, 'Bariro', 106),
(341, 'Borojó', 106),
(342, 'Capatárida', 106),
(343, 'Guajiro', 106),
(344, 'Seque', 106),
(345, 'Zazárida', 106),
(346, 'Valle de Eroa', 106),
(347, 'Cacique Manaure', 107),
(348, 'Norte', 108),
(349, 'Carirubana', 108),
(350, 'Santa Ana', 108),
(351, 'Urbana Punta Cardón', 108),
(352, 'La Vela de Coro', 109),
(353, 'Acurigua', 109),
(354, 'Guaibacoa', 109),
(355, 'Las Calderas', 109),
(356, 'Macoruca', 109),
(357, 'Dabajuro', 110),
(358, 'Agua Clara', 111),
(359, 'Avaria', 111),
(360, 'Pedregal', 111),
(361, 'Piedra Grande', 111),
(362, 'Purureche', 111),
(363, 'Adaure', 112),
(364, 'Adícora', 112),
(365, 'Baraived', 112),
(366, 'Buena Vista', 112),
(367, 'Jadacaquiva', 112),
(368, 'El Vínculo', 112),
(369, 'El Hato', 112),
(370, 'Moruy', 112),
(371, 'Pueblo Nuevo', 112),
(372, 'Agua Larga', 113),
(373, 'El Paují', 113),
(374, 'Independencia', 113),
(375, 'Mapararí', 113),
(376, 'Agua Linda', 114),
(377, 'Araurima', 114),
(378, 'Jacura', 114),
(379, 'Tucacas', 115),
(380, 'Boca de Aroa', 115),
(381, 'Los Taques', 116),
(382, 'Judibana', 116),
(383, 'Mene de Mauroa', 117),
(384, 'San Félix', 117),
(385, 'Casigua', 117),
(386, 'Guzmán Guillermo', 118),
(387, 'Mitare', 118),
(388, 'Río Seco', 118),
(389, 'Sabaneta', 118),
(390, 'San Antonio', 118),
(391, 'San Gabriel', 118),
(392, 'Santa Ana', 118),
(393, 'Boca del Tocuyo', 119),
(394, 'Chichiriviche', 119),
(395, 'Tocuyo de la Costa', 119),
(396, 'Palmasola', 120),
(397, 'Cabure', 121),
(398, 'Colina', 121),
(399, 'Curimagua', 121),
(400, 'San José de la Costa', 122),
(401, 'Píritu', 122),
(402, 'San Francisco', 123),
(403, 'Sucre', 124),
(404, 'Pecaya', 124),
(405, 'Tocópero', 125),
(406, 'El Charal', 126),
(407, 'Las Vegas del Tuy', 126),
(408, 'Santa Cruz de Bucara', 126),
(409, 'Bruzual', 127),
(410, 'Urumaco', 127),
(411, 'Puerto Cumarebo', 128),
(412, 'La Ciénaga', 128),
(413, 'La Soledad', 128),
(414, 'Pueblo Cumarebo', 128),
(415, 'Zazárida', 128),
(416, 'Churuguara', 113),
(417, 'Camaguán', 129),
(418, 'Puerto Miranda', 129),
(419, 'Uverito', 129),
(420, 'Chaguaramas', 130),
(421, 'El Socorro', 131),
(422, 'Tucupido', 132),
(423, 'San Rafael de Laya', 132),
(424, 'Altagracia de Orituc', 133),
(425, 'San Rafael de Orituc', 133),
(426, 'San Francisco Javier', 133),
(427, 'Paso Real de Macaira', 133),
(428, 'Carlos Soublette', 133),
(429, 'San Francisco de Mac', 133),
(430, 'Libertad de Orituco', 133),
(431, 'Cantaclaro', 134),
(432, 'San Juan de los Morr', 134),
(433, 'Parapara', 134),
(434, 'El Sombrero', 135),
(435, 'Sosa', 135),
(436, 'Las Mercedes', 136),
(437, 'Cabruta', 136),
(438, 'Santa Rita de Manapi', 136),
(439, 'Valle de la Pascua', 137),
(440, 'Espino', 137),
(441, 'San José de Unare', 138),
(442, 'Zaraza', 138),
(443, 'San José de Tiznados', 139),
(444, 'San Francisco de Tiz', 139),
(445, 'San Lorenzo de Tizna', 139),
(446, 'Ortiz', 139),
(447, 'Guayabal', 140),
(448, 'Cazorla', 140),
(449, 'San José de Guaribe', 141),
(450, 'Uveral', 141),
(451, 'Santa María de Ipire', 142),
(452, 'Altamira', 142),
(453, 'El Calvario', 143),
(454, 'El Rastro', 143),
(455, 'Guardatinajas', 143),
(456, 'Capital Urbana Calab', 143),
(457, 'Quebrada Honda de Gu', 144),
(458, 'Pío Tamayo', 144),
(459, 'Yacambú', 144),
(460, 'Fréitez', 145),
(461, 'José María Blanco', 145),
(462, 'Catedral', 146),
(463, 'Concepción', 146),
(464, 'El Cují', 146),
(465, 'Juan de Villegas', 146),
(466, 'Santa Rosa', 146),
(467, 'Tamaca', 146),
(468, 'Unión', 146),
(469, 'Aguedo Felipe Alvara', 146),
(470, 'Buena Vista', 146),
(471, 'Juárez', 146),
(472, 'Juan Bautista Rodríg', 147),
(473, 'Cuara', 147),
(474, 'Diego de Lozada', 147),
(475, 'Paraíso de San José', 147),
(476, 'San Miguel', 147),
(477, 'Tintorero', 147),
(478, 'José Bernardo Dorant', 147),
(479, 'Coronel Mariano Pera', 147),
(480, 'Bolívar', 148),
(481, 'Anzoátegui', 148),
(482, 'Guarico', 148),
(483, 'Hilario Luna y Luna', 148),
(484, 'Humocaro Alto', 148),
(485, 'Humocaro Bajo', 148),
(486, 'La Candelaria', 148),
(487, 'Morán', 148),
(488, 'Cabudare', 149),
(489, 'José Gregorio Bastid', 149),
(490, 'Agua Viva', 149),
(491, 'Sarare', 150),
(492, 'Buría', 150),
(493, 'Gustavo Vegas León', 150),
(494, 'Trinidad Samuel', 151),
(495, 'Antonio Díaz', 151),
(496, 'Camacaro', 151),
(497, 'Castañeda', 151),
(498, 'Cecilio Zubillaga', 151),
(499, 'Chiquinquirá', 151),
(500, 'El Blanco', 151),
(501, 'Espinoza de los Mont', 151),
(502, 'Lara', 151),
(503, 'Las Mercedes', 151),
(504, 'Manuel Morillo', 151),
(505, 'Montaña Verde', 151),
(506, 'Montes de Oca', 151),
(507, 'Torres', 151),
(508, 'Heriberto Arroyo', 151),
(509, 'Reyes Vargas', 151),
(510, 'Altagracia', 151),
(511, 'Siquisique', 152),
(512, 'Moroturo', 152),
(513, 'San Miguel', 152),
(514, 'Xaguas', 152),
(515, 'Presidente Betancour', 179),
(516, 'Presidente Páez', 179),
(517, 'Presidente Rómulo Ga', 179),
(518, 'Gabriel Picón Gonzál', 179),
(519, 'Héctor Amable Mora', 179),
(520, 'José Nucete Sardi', 179),
(521, 'Pulido Méndez', 179),
(522, 'La Azulita', 180),
(523, 'Santa Cruz de Mora', 181),
(524, 'Mesa Bolívar', 181),
(525, 'Mesa de Las Palmas', 181),
(526, 'Aricagua', 182),
(527, 'San Antonio', 182),
(528, 'Canagua', 183),
(529, 'Capurí', 183),
(530, 'Chacantá', 183),
(531, 'El Molino', 183),
(532, 'Guaimaral', 183),
(533, 'Mucutuy', 183),
(534, 'Mucuchachí', 183),
(535, 'Fernández Peña', 184),
(536, 'Matriz', 184),
(537, 'Montalbán', 184),
(538, 'Acequias', 184),
(539, 'Jají', 184),
(540, 'La Mesa', 184),
(541, 'San José del Sur', 184),
(542, 'Tucaní', 185),
(543, 'Florencio Ramírez', 185),
(544, 'Santo Domingo', 186),
(545, 'Las Piedras', 186),
(546, 'Guaraque', 187),
(547, 'Mesa de Quintero', 187),
(548, 'Río Negro', 187),
(549, 'Arapuey', 188),
(550, 'Palmira', 188),
(551, 'San Cristóbal de Tor', 189),
(552, 'Torondoy', 189),
(553, 'Antonio Spinetti Din', 190),
(554, 'Arias', 190),
(555, 'Caracciolo Parra Pér', 190),
(556, 'Domingo Peña', 190),
(557, 'El Llano', 190),
(558, 'Gonzalo Picón Febres', 190),
(559, 'Jacinto Plaza', 190),
(560, 'Juan Rodríguez Suáre', 190),
(561, 'Lasso de la Vega', 190),
(562, 'Mariano Picón Salas', 190),
(563, 'Milla', 190),
(564, 'Osuna Rodríguez', 190),
(565, 'Sagrario', 190),
(566, 'El Morro', 190),
(567, 'Los Nevados', 190),
(568, 'Andrés Eloy Blanco', 191),
(569, 'La Venta', 191),
(570, 'Piñango', 191),
(571, 'Timotes', 191),
(572, 'Eloy Paredes', 192),
(573, 'San Rafael de Alcáza', 192),
(574, 'Santa Elena de Arena', 192),
(575, 'Santa María de Capar', 193),
(576, 'Pueblo Llano', 194),
(577, 'Cacute', 195),
(578, 'La Toma', 195),
(579, 'Mucuchíes', 195),
(580, 'Mucurubá', 195),
(581, 'San Rafael', 195),
(582, 'Gerónimo Maldonado', 196),
(583, 'Bailadores', 196),
(584, 'Tabay', 197),
(585, 'Chiguará', 198),
(586, 'Estánquez', 198),
(587, 'Lagunillas', 198),
(588, 'La Trampa', 198),
(589, 'Pueblo Nuevo del Sur', 198),
(590, 'San Juan', 198),
(591, 'El Amparo', 199),
(592, 'El Llano', 199),
(593, 'San Francisco', 199),
(594, 'Tovar', 199),
(595, 'Independencia', 200),
(596, 'María de la Concepci', 200),
(597, 'Nueva Bolivia', 200),
(598, 'Santa Apolonia', 200),
(599, 'Caño El Tigre', 201),
(600, 'Zea', 201),
(601, 'Aragüita', 223),
(602, 'Arévalo González', 223),
(603, 'Capaya', 223),
(604, 'Caucagua', 223),
(605, 'Panaquire', 223),
(606, 'Ribas', 223),
(607, 'El Café', 223),
(608, 'Marizapa', 223),
(609, 'Cumbo', 224),
(610, 'San José de Barloven', 224),
(611, 'El Cafetal', 225),
(612, 'Las Minas', 225),
(613, 'Nuestra Señora del R', 225),
(614, 'Higuerote', 226),
(615, 'Curiepe', 226),
(616, 'Tacarigua de Brión', 226),
(617, 'Mamporal', 227),
(618, 'Carrizal', 228),
(619, 'Chacao', 229),
(620, 'Charallave', 230),
(621, 'Las Brisas', 230),
(622, 'El Hatillo', 231),
(623, 'Altagracia de la Mon', 232),
(624, 'Cecilio Acosta', 232),
(625, 'Los Teques', 232),
(626, 'El Jarillo', 232),
(627, 'San Pedro', 232),
(628, 'Tácata', 232),
(629, 'Paracotos', 232),
(630, 'Cartanal', 233),
(631, 'Santa Teresa del Tuy', 233),
(632, 'La Democracia', 234),
(633, 'Ocumare del Tuy', 234),
(634, 'Santa Bárbara', 234),
(635, 'San Antonio de los A', 235),
(636, 'Río Chico', 236),
(637, 'El Guapo', 236),
(638, 'Tacarigua de la Lagu', 236),
(639, 'Paparo', 236),
(640, 'San Fernando del Gua', 236),
(641, 'Santa Lucía del Tuy', 237),
(642, 'Cúpira', 238),
(643, 'Machurucuto', 238),
(644, 'Guarenas', 239),
(645, 'San Antonio de Yare', 240),
(646, 'San Francisco de Yar', 240),
(647, 'Leoncio Martínez', 241),
(648, 'Petare', 241),
(649, 'Caucagüita', 241),
(650, 'Filas de Mariche', 241),
(651, 'La Dolorita', 241),
(652, 'Cúa', 242),
(653, 'Nueva Cúa', 242),
(654, 'Guatire', 243),
(655, 'Bolívar', 243),
(656, 'San Antonio de Matur', 258),
(657, 'San Francisco de Mat', 258),
(658, 'Aguasay', 259),
(659, 'Caripito', 260),
(660, 'El Guácharo', 261),
(661, 'La Guanota', 261),
(662, 'Sabana de Piedra', 261),
(663, 'San Agustín', 261),
(664, 'Teresen', 261),
(665, 'Caripe', 261),
(666, 'Areo', 262),
(667, 'Capital Cedeño', 262),
(668, 'San Félix de Cantali', 262),
(669, 'Viento Fresco', 262),
(670, 'El Tejero', 263),
(671, 'Punta de Mata', 263),
(672, 'Chaguaramas', 264),
(673, 'Las Alhuacas', 264),
(674, 'Tabasca', 264),
(675, 'Temblador', 264),
(676, 'Alto de los Godos', 265),
(677, 'Boquerón', 265),
(678, 'Las Cocuizas', 265),
(679, 'La Cruz', 265),
(680, 'San Simón', 265),
(681, 'El Corozo', 265),
(682, 'El Furrial', 265),
(683, 'Jusepín', 265),
(684, 'La Pica', 265),
(685, 'San Vicente', 265),
(686, 'Aparicio', 266),
(687, 'Aragua de Maturín', 266),
(688, 'Chaguamal', 266),
(689, 'El Pinto', 266),
(690, 'Guanaguana', 266),
(691, 'La Toscana', 266),
(692, 'Taguaya', 266),
(693, 'Cachipo', 267),
(694, 'Quiriquire', 267),
(695, 'Santa Bárbara', 268),
(696, 'Barrancas', 269),
(697, 'Los Barrancos de Faj', 269),
(698, 'Uracoa', 270),
(699, 'Antolín del Campo', 271),
(700, 'Arismendi', 272),
(701, 'García', 273),
(702, 'Francisco Fajardo', 273),
(703, 'Bolívar', 274),
(704, 'Guevara', 274),
(705, 'Matasiete', 274),
(706, 'Santa Ana', 274),
(707, 'Sucre', 274),
(708, 'Aguirre', 275),
(709, 'Maneiro', 275),
(710, 'Adrián', 276),
(711, 'Juan Griego', 276),
(712, 'Yaguaraparo', 276),
(713, 'Porlamar', 277),
(714, 'San Francisco de Mac', 278),
(715, 'Boca de Río', 278),
(716, 'Tubores', 279),
(717, 'Los Baleales', 279),
(718, 'Vicente Fuentes', 280),
(719, 'Villalba', 280),
(720, 'San Juan Bautista', 281),
(721, 'Zabala', 281),
(722, 'Capital Araure', 283),
(723, 'Río Acarigua', 283),
(724, 'Capital Esteller', 284),
(725, 'Uveral', 284),
(726, 'Guanare', 285),
(727, 'Córdoba', 285),
(728, 'San José de la Monta', 285),
(729, 'San Juan de Guanagua', 285),
(730, 'Virgen de la Coromot', 285),
(731, 'Guanarito', 286),
(732, 'Trinidad de la Capil', 286),
(733, 'Divina Pastora', 286),
(734, 'Monseñor José Vicent', 287),
(735, 'Peña Blanca', 287),
(736, 'Capital Ospino', 288),
(737, 'Aparición', 288),
(738, 'La Estación', 288),
(739, 'Páez', 289),
(740, 'Payara', 289),
(741, 'Pimpinela', 289),
(742, 'Ramón Peraza', 289),
(743, 'Papelón', 290),
(744, 'Caño Delgadito', 290),
(745, 'San Genaro de Bocono', 291),
(746, 'Antolín Tovar', 291),
(747, 'San Rafael de Onoto', 292),
(748, 'Santa Fe', 292),
(749, 'Thermo Morles', 292),
(750, 'Santa Rosalía', 293),
(751, 'Florida', 293),
(752, 'Sucre', 294),
(753, 'Concepción', 294),
(754, 'San Rafael de Palo A', 294),
(755, 'Uvencio Antonio Velá', 294),
(756, 'San José de Saguaz', 294),
(757, 'Villa Rosa', 294),
(758, 'Turén', 295),
(759, 'Canelones', 295),
(760, 'Santa Cruz', 295),
(761, 'San Isidro Labrador', 295),
(762, 'Mariño', 296),
(763, 'Rómulo Gallegos', 296),
(764, 'San José de Aerocuar', 297),
(765, 'Tavera Acosta', 297),
(766, 'Río Caribe', 298),
(767, 'Antonio José de Sucr', 298),
(768, 'El Morro de Puerto S', 298),
(769, 'Puerto Santo', 298),
(770, 'San Juan de las Gald', 298),
(771, 'El Pilar', 299),
(772, 'El Rincón', 299),
(773, 'General Francisco An', 299),
(774, 'Guaraúnos', 299),
(775, 'Tunapuicito', 299),
(776, 'Unión', 299),
(777, 'Santa Catalina', 300),
(778, 'Santa Rosa', 300),
(779, 'Santa Teresa', 300),
(780, 'Bolívar', 300),
(781, 'Maracapana', 300),
(782, 'Libertad', 302),
(783, 'El Paujil', 302),
(784, 'Yaguaraparo', 302),
(785, 'Cruz Salmerón Acosta', 303),
(786, 'Chacopata', 303),
(787, 'Manicuare', 303),
(788, 'Tunapuy', 304),
(789, 'Campo Elías', 304),
(790, 'Irapa', 305),
(791, 'Campo Claro', 305),
(792, 'Maraval', 305),
(793, 'San Antonio de Irapa', 305),
(794, 'Soro', 305),
(795, 'Mejía', 306),
(796, 'Cumanacoa', 307),
(797, 'Arenas', 307),
(798, 'Aricagua', 307),
(799, 'Cogollar', 307),
(800, 'San Fernando', 307),
(801, 'San Lorenzo', 307),
(802, 'Villa Frontado (Muel', 308),
(803, 'Catuaro', 308),
(804, 'Rendón', 308),
(805, 'San Cruz', 308),
(806, 'Santa María', 308),
(807, 'Altagracia', 309),
(808, 'Santa Inés', 309),
(809, 'Valentín Valiente', 309),
(810, 'Ayacucho', 309),
(811, 'San Juan', 309),
(812, 'Raúl Leoni', 309),
(813, 'Gran Mariscal', 309),
(814, 'Cristóbal Colón', 310),
(815, 'Bideau', 310),
(816, 'Punta de Piedras', 310),
(817, 'Güiria', 310),
(818, 'Andrés Bello', 341),
(819, 'Antonio Rómulo Costa', 342),
(820, 'Ayacucho', 343),
(821, 'Rivas Berti', 343),
(822, 'San Pedro del Río', 343),
(823, 'Bolívar', 344),
(824, 'Palotal', 344),
(825, 'General Juan Vicente', 344),
(826, 'Isaías Medina Angari', 344),
(827, 'Cárdenas', 345),
(828, 'Amenodoro Ángel Lamu', 345),
(829, 'La Florida', 345),
(830, 'Córdoba', 346),
(831, 'Fernández Feo', 347),
(832, 'Alberto Adriani', 347),
(833, 'Santo Domingo', 347),
(834, 'Francisco de Miranda', 348),
(835, 'García de Hevia', 349),
(836, 'Boca de Grita', 349),
(837, 'José Antonio Páez', 349),
(838, 'Guásimos', 350),
(839, 'Independencia', 351),
(840, 'Juan Germán Roscio', 351),
(841, 'Román Cárdenas', 351),
(842, 'Jáuregui', 352),
(843, 'Emilio Constantino G', 352),
(844, 'Monseñor Miguel Anto', 352),
(845, 'José María Vargas', 353),
(846, 'Junín', 354),
(847, 'La Petrólea', 354),
(848, 'Quinimarí', 354),
(849, 'Bramón', 354),
(850, 'Libertad', 355),
(851, 'Cipriano Castro', 355),
(852, 'Manuel Felipe Rugele', 355),
(853, 'Libertador', 356),
(854, 'Doradas', 356),
(855, 'Emeterio Ochoa', 356),
(856, 'San Joaquín de Navay', 356),
(857, 'Lobatera', 357),
(858, 'Constitución', 357),
(859, 'Michelena', 358),
(860, 'Panamericano', 359),
(861, 'La Palmita', 359),
(862, 'Pedro María Ureña', 360),
(863, 'Nueva Arcadia', 360),
(864, 'Delicias', 361),
(865, 'Pecaya', 361),
(866, 'Samuel Darío Maldona', 362),
(867, 'Boconó', 362),
(868, 'Hernández', 362),
(869, 'La Concordia', 363),
(870, 'San Juan Bautista', 363),
(871, 'Pedro María Morantes', 363),
(872, 'San Sebastián', 363),
(873, 'Dr. Francisco Romero', 363),
(874, 'Seboruco', 364),
(875, 'Simón Rodríguez', 365),
(876, 'Sucre', 366),
(877, 'Eleazar López Contre', 366),
(878, 'San Pablo', 366),
(879, 'Torbes', 367),
(880, 'Uribante', 368),
(881, 'Cárdenas', 368),
(882, 'Juan Pablo Peñalosa', 368),
(883, 'Potosí', 368),
(884, 'San Judas Tadeo', 369),
(885, 'Araguaney', 370),
(886, 'El Jaguito', 370),
(887, 'La Esperanza', 370),
(888, 'Santa Isabel', 370),
(889, 'Boconó', 371),
(890, 'El Carmen', 371),
(891, 'Mosquey', 371),
(892, 'Ayacucho', 371),
(893, 'Burbusay', 371),
(894, 'General Ribas', 371),
(895, 'Guaramacal', 371),
(896, 'Vega de Guaramacal', 371),
(897, 'Monseñor Jáuregui', 371),
(898, 'Rafael Rangel', 371),
(899, 'San Miguel', 371),
(900, 'San José', 371),
(901, 'Sabana Grande', 372),
(902, 'Cheregüé', 372),
(903, 'Granados', 372),
(904, 'Arnoldo Gabaldón', 373),
(905, 'Bolivia', 373),
(906, 'Carrillo', 373),
(907, 'Cegarra', 373),
(908, 'Chejendé', 373),
(909, 'Manuel Salvador Ullo', 373),
(910, 'San José', 373),
(911, 'Carache', 374),
(912, 'La Concepción', 374),
(913, 'Cuicas', 374),
(914, 'Panamericana', 374),
(915, 'Santa Cruz', 374),
(916, 'Escuque', 375),
(917, 'La Unión', 375),
(918, 'Santa Rita', 375),
(919, 'Sabana Libre', 375),
(920, 'El Socorro', 376),
(921, 'Los Caprichos', 376),
(922, 'Antonio José de Sucr', 376),
(923, 'Campo Elías', 377),
(924, 'Arnoldo Gabaldón', 377),
(925, 'Santa Apolonia', 378),
(926, 'El Progreso', 378),
(927, 'La Ceiba', 378),
(928, 'Tres de Febrero', 378),
(929, 'El Dividive', 379),
(930, 'Agua Santa', 379),
(931, 'Agua Caliente', 379),
(932, 'El Cenizo', 379),
(933, 'Valerita', 379),
(934, 'Monte Carmelo', 380),
(935, 'Buena Vista', 380),
(936, 'Santa María del Horc', 380),
(937, 'Motatán', 381),
(938, 'El Baño', 381),
(939, 'Jalisco', 381),
(940, 'Pampán', 382),
(941, 'Flor de Patria', 382),
(942, 'La Paz', 382),
(943, 'Santa Ana', 382),
(944, 'Pampanito', 383),
(945, 'La Concepción', 383),
(946, 'Pampanito II', 383),
(947, 'Betijoque', 384),
(948, 'José Gregorio Hernán', 384),
(949, 'La Pueblita', 384),
(950, 'Los Cedros', 384),
(951, 'Carvajal', 385),
(952, 'Campo Alegre', 385),
(953, 'Antonio Nicolás Bric', 385),
(954, 'José Leonardo Suárez', 385),
(955, 'Sabana de Mendoza', 386),
(956, 'Junín', 386),
(957, 'Valmore Rodríguez', 386),
(958, 'El Paraíso', 386),
(959, 'Andrés Linares', 387),
(960, 'Chiquinquirá', 387),
(961, 'Cristóbal Mendoza', 387),
(962, 'Cruz Carrillo', 387),
(963, 'Matriz', 387),
(964, 'Monseñor Carrillo', 387),
(965, 'Tres Esquinas', 387),
(966, 'Cabimbú', 388),
(967, 'Jajó', 388),
(968, 'La Mesa de Esnujaque', 388),
(969, 'Santiago', 388),
(970, 'Tuñame', 388),
(971, 'La Quebrada', 388),
(972, 'Juan Ignacio Montill', 389),
(973, 'La Beatriz', 389),
(974, 'La Puerta', 389),
(975, 'Mendoza del Valle de', 389),
(976, 'Mercedes Díaz', 389),
(977, 'San Luis', 389),
(978, 'Caraballeda', 390),
(979, 'Carayaca', 390),
(980, 'Carlos Soublette', 390),
(981, 'Caruao Chuspa', 390),
(982, 'Catia La Mar', 390),
(983, 'El Junko', 390),
(984, 'La Guaira', 390),
(985, 'Macuto', 390),
(986, 'Maiquetía', 390),
(987, 'Naiguatá', 390),
(988, 'Urimare', 390),
(989, 'Arístides Bastidas', 391),
(990, 'Bolívar', 392),
(991, 'Chivacoa', 407),
(992, 'Campo Elías', 407),
(993, 'Cocorote', 408),
(994, 'Independencia', 409),
(995, 'José Antonio Páez', 410),
(996, 'La Trinidad', 411),
(997, 'Manuel Monge', 412),
(998, 'Salóm', 413),
(999, 'Temerla', 413),
(1000, 'Nirgua', 413),
(1001, 'San Andrés', 414),
(1002, 'Yaritagua', 414),
(1003, 'San Javier', 415),
(1004, 'Albarico', 415),
(1005, 'San Felipe', 415),
(1006, 'Sucre', 416),
(1007, 'Urachiche', 417),
(1008, 'El Guayabo', 418),
(1009, 'Farriar', 418),
(1010, 'Isla de Toas', 441),
(1011, 'Monagas', 441),
(1012, 'San Timoteo', 442),
(1013, 'General Urdaneta', 442),
(1014, 'Libertador', 442),
(1015, 'Marcelino Briceño', 442),
(1016, 'Pueblo Nuevo', 442),
(1017, 'Manuel Guanipa Matos', 442),
(1018, 'Ambrosio', 443),
(1019, 'Carmen Herrera', 443),
(1020, 'La Rosa', 443),
(1021, 'Germán Ríos Linares', 443),
(1022, 'San Benito', 443),
(1023, 'Rómulo Betancourt', 443),
(1024, 'Jorge Hernández', 443),
(1025, 'Punta Gorda', 443),
(1026, 'Arístides Calvani', 443),
(1027, 'Encontrados', 444),
(1028, 'Udón Pérez', 444),
(1029, 'Moralito', 445),
(1030, 'San Carlos del Zulia', 445),
(1031, 'Santa Cruz del Zulia', 445),
(1032, 'Santa Bárbara', 445),
(1033, 'Urribarrí', 445),
(1034, 'Carlos Quevedo', 446),
(1035, 'Francisco Javier Pul', 446),
(1036, 'Simón Rodríguez', 446),
(1037, 'Guamo-Gavilanes', 446),
(1038, 'La Concepción', 448),
(1039, 'San José', 448),
(1040, 'Mariano Parra León', 448),
(1041, 'José Ramón Yépez', 448),
(1042, 'Jesús María Semprún', 449),
(1043, 'Barí', 449),
(1044, 'Concepción', 450),
(1045, 'Andrés Bello', 450),
(1046, 'Chiquinquirá', 450),
(1047, 'El Carmelo', 450),
(1048, 'Potreritos', 450),
(1049, 'Libertad', 451),
(1050, 'Alonso de Ojeda', 451),
(1051, 'Venezuela', 451),
(1052, 'Eleazar López Contre', 451),
(1053, 'Campo Lara', 451),
(1054, 'Bartolomé de las Cas', 452),
(1055, 'Libertad', 452),
(1056, 'Río Negro', 452),
(1057, 'San José de Perijá', 452),
(1058, 'San Rafael', 453),
(1059, 'La Sierrita', 453),
(1060, 'Las Parcelas', 453),
(1061, 'Luis de Vicente', 453),
(1062, 'Monseñor Marcos Serg', 453),
(1063, 'Ricaurte', 453),
(1064, 'Tamare', 453),
(1065, 'Antonio Borjas Romer', 454),
(1066, 'Bolívar', 454),
(1067, 'Cacique Mara', 454),
(1068, 'Carracciolo Parra Pé', 454),
(1069, 'Cecilio Acosta', 454),
(1070, 'Cristo de Aranza', 454),
(1071, 'Coquivacoa', 454),
(1072, 'Chiquinquirá', 454),
(1073, 'Francisco Eugenio Bu', 454),
(1074, 'Idelfonzo Vásquez', 454),
(1075, 'Juana de Ávila', 454),
(1076, 'Luis Hurtado Higuera', 454),
(1077, 'Manuel Dagnino', 454),
(1078, 'Olegario Villalobos', 454),
(1079, 'Raúl Leoni', 454),
(1080, 'Santa Lucía', 454),
(1081, 'Venancio Pulgar', 454),
(1082, 'San Isidro', 454),
(1083, 'Altagracia', 455),
(1084, 'Faría', 455),
(1085, 'Ana María Campos', 455),
(1086, 'San Antonio', 455),
(1087, 'San José', 455),
(1088, 'Donaldo García', 456),
(1089, 'El Rosario', 456),
(1090, 'Sixto Zambrano', 456),
(1091, 'San Francisco', 457),
(1092, 'El Bajo', 457),
(1093, 'Domitila Flores', 457),
(1094, 'Francisco Ochoa', 457),
(1095, 'Los Cortijos', 457),
(1096, 'Marcial Hernández', 457),
(1097, 'Santa Rita', 458),
(1098, 'El Mene', 458),
(1099, 'Pedro Lucas Urribarr', 458),
(1100, 'José Cenobio Urribar', 458),
(1101, 'Rafael Maria Baralt', 459),
(1102, 'Manuel Manrique', 459),
(1103, 'Rafael Urdaneta', 459),
(1104, 'Bobures', 460),
(1105, 'Gibraltar', 460),
(1106, 'Heras', 460),
(1107, 'Monseñor Arturo Álva', 460),
(1108, 'Rómulo Gallegos', 460),
(1109, 'El Batey', 460),
(1110, 'Rafael Urdaneta', 461),
(1111, 'La Victoria', 461),
(1112, 'Raúl Cuenca', 461),
(1113, 'Sinamaica', 447),
(1114, 'Alta Guajira', 447),
(1115, 'Elías Sánchez Rubio', 447),
(1116, 'Guajira', 447),
(1117, 'Altagracia', 462),
(1118, 'Antímano', 462),
(1119, 'Caricuao', 462),
(1120, 'Catedral', 462),
(1121, 'Coche', 462),
(1122, 'El Junquito', 462),
(1123, 'El Paraíso', 462),
(1124, 'El Recreo', 462),
(1125, 'El Valle', 462),
(1126, 'La Candelaria', 462),
(1127, 'La Pastora', 462),
(1128, 'La Vega', 462),
(1129, 'Macarao', 462),
(1130, 'San Agustín', 462),
(1131, 'San Bernardino', 462),
(1132, 'San José', 462),
(1133, 'San Juan', 462),
(1134, 'San Pedro', 462),
(1135, 'Santa Rosalía', 462),
(1136, 'Santa Teresa', 462),
(1137, 'Sucre (Catia)', 462),
(1138, '23 de enero', 462);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `CEDULA` int NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `TELEFONO` bigint NOT NULL,
  `CORREO` varchar(30) NOT NULL,
  `SEXO` varchar(1) NOT NULL,
  `DIRECCION` varchar(50) NOT NULL,
  `Cod_ciudad` int NOT NULL,
  PRIMARY KEY (`CEDULA`),
  KEY `fk_PERSONA_CIUDAD1_idx` (`Cod_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`CEDULA`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `CORREO`, `SEXO`, `DIRECCION`, `Cod_ciudad`) VALUES
(28308362, 'Khris', 'Harrison', 4248348912, 'khristianhfs06@gmail.com', 'M', 'ni e de tu incunvencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

DROP TABLE IF EXISTS `poliza`;
CREATE TABLE IF NOT EXISTS `poliza` (
  `NUMERO_POLIZA` int NOT NULL,
  `FECHA_APERTURA` date NOT NULL,
  `FECHA_CIERRE` date NOT NULL,
  `CUOTA_ANUAL` decimal(10,2) NOT NULL,
  `CUOTA_MENSUAL` decimal(10,2) NOT NULL,
  `OBSERVACIONES` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`NUMERO_POLIZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizaxfuneraria`
--

DROP TABLE IF EXISTS `polizaxfuneraria`;
CREATE TABLE IF NOT EXISTS `polizaxfuneraria` (
  `RIF_funeraria` int NOT NULL,
  `NUMERO_POLIZA` int NOT NULL,
  PRIMARY KEY (`RIF_funeraria`,`NUMERO_POLIZA`),
  KEY `fk_FUNERARIA_has_POLIZA_POLIZA1_idx` (`NUMERO_POLIZA`),
  KEY `fk_FUNERARIA_has_POLIZA_FUNERARIA1_idx` (`RIF_funeraria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizaxservicio`
--

DROP TABLE IF EXISTS `polizaxservicio`;
CREATE TABLE IF NOT EXISTS `polizaxservicio` (
  `NUMERO_POLIZA` int NOT NULL,
  `CODIGO_SERVICIO` int NOT NULL,
  PRIMARY KEY (`NUMERO_POLIZA`,`CODIGO_SERVICIO`),
  KEY `fk_POLIZA_has_SERVICIO_FUNERARIO_SERVICIO_FUNERARIO1_idx` (`CODIGO_SERVICIO`),
  KEY `fk_POLIZA_has_SERVICIO_FUNERARIO_POLIZA1_idx` (`NUMERO_POLIZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_pago`
--

DROP TABLE IF EXISTS `recibo_pago`;
CREATE TABLE IF NOT EXISTS `recibo_pago` (
  `NUMERO_RECIBO` int NOT NULL,
  `NUMERO_POLIZA` int NOT NULL,
  `FECHA_PAGO` date NOT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  PRIMARY KEY (`NUMERO_RECIBO`,`NUMERO_POLIZA`),
  KEY `fk_RECIBO_PAGO_POLIZA1_idx` (`NUMERO_POLIZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_juridico`
--

DROP TABLE IF EXISTS `responsable_juridico`;
CREATE TABLE IF NOT EXISTS `responsable_juridico` (
  `RIF_juridico` int NOT NULL,
  `RAZON_SOCIAL` varchar(20) NOT NULL,
  `DIRECCION` varchar(50) NOT NULL,
  `CORREO` varchar(30) NOT NULL,
  PRIMARY KEY (`RIF_juridico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_natural`
--

DROP TABLE IF EXISTS `responsable_natural`;
CREATE TABLE IF NOT EXISTS `responsable_natural` (
  `CEDULA_natural` int NOT NULL,
  PRIMARY KEY (`CEDULA_natural`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_funerario`
--

DROP TABLE IF EXISTS `servicio_funerario`;
CREATE TABLE IF NOT EXISTS `servicio_funerario` (
  `CODIGO_SERVICIO` int NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  PRIMARY KEY (`CODIGO_SERVICIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `CEDULA_usuario` int NOT NULL,
  `LOG_IN` varchar(20) NOT NULL,
  `CLAVE` varchar(20) NOT NULL,
  PRIMARY KEY (`CEDULA_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CEDULA_usuario`, `LOG_IN`, `CLAVE`) VALUES
(28308362, 'KhrisHDX', '24445');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `fk_BENEFICIARIO_PERSONA1` FOREIGN KEY (`CEDULA_beneficiario`) REFERENCES `persona` (`CEDULA`);

--
-- Filtros para la tabla `beneficiarioxpoliza`
--
ALTER TABLE `beneficiarioxpoliza`
  ADD CONSTRAINT `fk_BENEFICIARIO_has_POLIZA_BENEFICIARIO1` FOREIGN KEY (`CEDULA_beneficiario`) REFERENCES `beneficiario` (`CEDULA_beneficiario`),
  ADD CONSTRAINT `fk_BENEFICIARIO_has_POLIZA_POLIZA1` FOREIGN KEY (`NUMERO`) REFERENCES `poliza` (`NUMERO_POLIZA`);

--
-- Filtros para la tabla `cementerio`
--
ALTER TABLE `cementerio`
  ADD CONSTRAINT `fk_CEMENTERIO_ENTIDAD_JURIDICA1` FOREIGN KEY (`RIF_cementerio`) REFERENCES `entidad_juridica` (`RIF`);

--
-- Filtros para la tabla `cementerioxpoliza`
--
ALTER TABLE `cementerioxpoliza`
  ADD CONSTRAINT `fk_CEMENTERIO_has_POLIZA_CEMENTERIO1` FOREIGN KEY (`Rif_Cem`) REFERENCES `cementerio` (`RIF_cementerio`),
  ADD CONSTRAINT `fk_CEMENTERIO_has_POLIZA_POLIZA1` FOREIGN KEY (`Nro_poliza`) REFERENCES `poliza` (`NUMERO_POLIZA`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_CIUDAD_PARROQUIA1` FOREIGN KEY (`CODIGO_PARROQUIA`) REFERENCES `parroquia` (`CODIGO_PARROQUIA`);

--
-- Filtros para la tabla `entidad_juridica`
--
ALTER TABLE `entidad_juridica`
  ADD CONSTRAINT `fk_ENTIDAD_JURIDICA_CIUDAD1` FOREIGN KEY (`Cod_ciudad_Ju`) REFERENCES `ciudad` (`CODIGO_CIUDAD`);

--
-- Filtros para la tabla `factura_pago`
--
ALTER TABLE `factura_pago`
  ADD CONSTRAINT `fk_FACTURA_PAGO_POLIZA1` FOREIGN KEY (`NUMERO_POLIZA`) REFERENCES `poliza` (`NUMERO_POLIZA`);

--
-- Filtros para la tabla `funeraria`
--
ALTER TABLE `funeraria`
  ADD CONSTRAINT `fk_FUNERARIA_ENTIDAD_JURIDICA1` FOREIGN KEY (`RIF_funeraria`) REFERENCES `entidad_juridica` (`RIF`);

--
-- Filtros para la tabla `funerariaxservicio`
--
ALTER TABLE `funerariaxservicio`
  ADD CONSTRAINT `fk_SERVICIO_FUNERARIO_has_FUNERARIA_FUNERARIA1` FOREIGN KEY (`RIF_funeraria`) REFERENCES `funeraria` (`RIF_funeraria`),
  ADD CONSTRAINT `fk_SERVICIO_FUNERARIO_has_FUNERARIA_SERVICIO_FUNERARIO1` FOREIGN KEY (`CODIGO_SERVICIO`) REFERENCES `servicio_funerario` (`CODIGO_SERVICIO`);

--
-- Filtros para la tabla `juridicoxpoliza`
--
ALTER TABLE `juridicoxpoliza`
  ADD CONSTRAINT `fk_POLIZA_has_RESPONSABLE_JURIDICO_POLIZA1` FOREIGN KEY (`NUMERO_POLIZA`) REFERENCES `poliza` (`NUMERO_POLIZA`),
  ADD CONSTRAINT `fk_POLIZA_has_RESPONSABLE_JURIDICO_RESPONSABLE_JURIDICO1` FOREIGN KEY (`RIF_juridico`) REFERENCES `responsable_juridico` (`RIF_juridico`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `CODIGO_ESTADO` FOREIGN KEY (`CODIGO_ESTADO`) REFERENCES `estado` (`CODIGO_ESTADO`);

--
-- Filtros para la tabla `naturalxpoliza`
--
ALTER TABLE `naturalxpoliza`
  ADD CONSTRAINT `fk_POLIZA_has_RESPONSABLE_NATURAL_POLIZA1` FOREIGN KEY (`NUMERO_POLIZA`) REFERENCES `poliza` (`NUMERO_POLIZA`),
  ADD CONSTRAINT `fk_POLIZA_has_RESPONSABLE_NATURAL_RESPONSABLE_NATURAL1` FOREIGN KEY (`CEDULA_natural`) REFERENCES `responsable_natural` (`CEDULA_natural`);

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `CODIGO_MUNICIPIO` FOREIGN KEY (`CODIGO_MUNICIPIO`) REFERENCES `municipio` (`CODIGO_MUNICIPIO`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_PERSONA_CIUDAD1` FOREIGN KEY (`Cod_ciudad`) REFERENCES `ciudad` (`CODIGO_CIUDAD`);

--
-- Filtros para la tabla `polizaxfuneraria`
--
ALTER TABLE `polizaxfuneraria`
  ADD CONSTRAINT `fk_FUNERARIA_has_POLIZA_FUNERARIA1` FOREIGN KEY (`RIF_funeraria`) REFERENCES `funeraria` (`RIF_funeraria`),
  ADD CONSTRAINT `fk_FUNERARIA_has_POLIZA_POLIZA1` FOREIGN KEY (`NUMERO_POLIZA`) REFERENCES `poliza` (`NUMERO_POLIZA`);

--
-- Filtros para la tabla `polizaxservicio`
--
ALTER TABLE `polizaxservicio`
  ADD CONSTRAINT `fk_POLIZA_has_SERVICIO_FUNERARIO_POLIZA1` FOREIGN KEY (`NUMERO_POLIZA`) REFERENCES `poliza` (`NUMERO_POLIZA`),
  ADD CONSTRAINT `fk_POLIZA_has_SERVICIO_FUNERARIO_SERVICIO_FUNERARIO1` FOREIGN KEY (`CODIGO_SERVICIO`) REFERENCES `servicio_funerario` (`CODIGO_SERVICIO`);

--
-- Filtros para la tabla `recibo_pago`
--
ALTER TABLE `recibo_pago`
  ADD CONSTRAINT `fk_RECIBO_PAGO_POLIZA1` FOREIGN KEY (`NUMERO_POLIZA`) REFERENCES `poliza` (`NUMERO_POLIZA`);

--
-- Filtros para la tabla `responsable_juridico`
--
ALTER TABLE `responsable_juridico`
  ADD CONSTRAINT `fk_RESPONSABLE_JURIDICO_ENTIDAD_JURIDICA1` FOREIGN KEY (`RIF_juridico`) REFERENCES `entidad_juridica` (`RIF`);

--
-- Filtros para la tabla `responsable_natural`
--
ALTER TABLE `responsable_natural`
  ADD CONSTRAINT `fk_RESPONSABLE_NATURAL_PERSONA1` FOREIGN KEY (`CEDULA_natural`) REFERENCES `persona` (`CEDULA`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_PERSONA1` FOREIGN KEY (`CEDULA_usuario`) REFERENCES `persona` (`CEDULA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
