-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2025 a las 03:06:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_limpio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(7) NOT NULL,
  `categoria_nombre` varchar(50) NOT NULL,
  `categoria_ubicacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`, `categoria_ubicacion`) VALUES
(1, 'Equipos de Sonido', 'Almacén Valencia'),
(4, 'Equipos de Video y Proyección', 'Almacén Valencia'),
(5, 'Equipos de Escenario y Mobiliario', 'Almacén Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int(11) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `eventoscalendar`
--

INSERT INTO `eventoscalendar` (`id`, `evento`, `color_evento`, `fecha_inicio`, `fecha_fin`) VALUES
(51, 'Mi Primera Prueba', 'teal', '2021-07-07', '2021-07-08'),
(52, 'Mi Segunda Prueba', 'amber', '2021-07-17', '2021-07-18'),
(53, 'Mi Tercera Prueba', 'orange', '2021-07-03', '2021-07-04'),
(63, 'F-Evento 4feb', '#FF5722', '2025-02-04', '2025-02-05'),
(57, 'F-Evento 3feb', '#FF5722', '2025-02-03', '2025-02-04'),
(61, 'F-Evento 1feb', '#FF5722', '2025-02-01', '2025-02-02'),
(59, 'F-Evento 29ene', '#FF5722', '2025-01-29', '2025-01-30'),
(64, 'Evento 28feb', '#2196F3', '2025-02-28', '2025-03-01'),
(62, 'Evento Dia 25 Al 26-01 (Coca Cola)', '#FF5722', '2025-01-25', '2025-01-27'),
(65, 'Evento Caracas-fest', '#2196F3', '2025-03-31', '2025-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `nombre_evento` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `equipos` text NOT NULL,
  `fecha` datetime NOT NULL,
  `categoria` varchar(100) NOT NULL DEFAULT 'social'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `titulo`, `nombre_evento`, `descripcion`, `equipos`, `fecha`, `categoria`) VALUES
(9, '25MAR-2025', 'Evento Coca Cola', 'Evento en el hotel Maracay de 8pm a 11pm', '<ul><li>Cornetas JBL 2,\r\nMicrófono Mackie 2,\r\nPantalla LCD 32 Pulgadas 1,\r\nPantalla LCD 42 Pulgadas 1.</li></ul>', '2025-02-21 04:17:43', 'business'),
(10, '26MAR-2025', 'Evento Venevision', 'Evento en las instalaciones de Venevision', '<ul><li>Proyector IBM 2,\r\nCornetas JBL 2,\r\nPantalla SONY 1.</li></ul>', '2025-02-21 18:51:46', 'business'),
(11, '19FEB-2025', 'Evento Venevision2', 'dsfdgfdgdfgwfrt', '<ul><li>Proyector 2,\r\nCámara 1.</li></ul>', '2025-02-21 19:50:52', 'business'),
(12, '29MAR-2025', '4thgdhdfg', 'ghfgdsfhfsdfgmnfsdgdfsghsfd', '<ul><li>1\r\n2\r\n3\r\n4\r\n</li></ul>', '2025-02-21 21:09:18', 'business'),
(13, '1MAY-2025', 'DGDGFGHGHYGHGFHFDGFDSG', 'DFGDDGDFGDFDFDGHDF', '<ul><li>322\r\n2\r\n1\r\n212\r\n\r\n1212\r\n</li></ul>', '2025-02-21 21:12:40', 'business'),
(15, '30MAR-2025', 'Evento Coca Cola 4', '7tfvgbhjklo9iyghykgitufutfgufgviok', '<ul><li>Altavoz Mackie mejorado 2.</li></ul>', '2025-02-21 22:22:01', 'business'),
(16, '31MAR-2025', 'Evento Caracas-fest', 'Evento en hotel Alba Caracas', '<ul><li>Altavoz SONY 2,\r\nMicrófono Mackie JBL 2,\r\nTarima - Móvil 2,\r\nTelevisor 42 pulgadas SONY 2.</li></ul>', '2025-02-23 02:56:50', 'social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(20) NOT NULL,
  `producto_codigo` varchar(70) NOT NULL,
  `producto_nombre` varchar(70) NOT NULL,
  `producto_precio` varchar(70) NOT NULL,
  `producto_stock` int(25) NOT NULL,
  `producto_foto` varchar(500) NOT NULL,
  `categoria_id` int(7) NOT NULL,
  `usuario_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `producto_codigo`, `producto_nombre`, `producto_precio`, `producto_stock`, `producto_foto`, `categoria_id`, `usuario_id`) VALUES
(10, '101', 'Tarima - Movíl', 'TAR1001', 8, 'Tarima___Movíl_51.jpg', 5, 2),
(11, '102', 'Televisor 32 pulgadas SONY', 'SONY100132', 10, 'Televisor_32_pulgadas_SONY_78.jpg', 4, 2),
(12, '103', 'Televisor 42 pulgadas SONY', 'SONY100142', 8, 'Televisor_42_pulgadas_SONY_54.jpg', 4, 2),
(13, '104', 'Microfono Mackie JBL', '104', 8, 'Microfono_Mackie_JBL_79.jpg', 1, 2),
(14, '105', 'Altavoz SONY', 'SRS-ULT1000', 8, 'Altavoz_SONY_0.png', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_apellido` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_clave` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_email` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_clave`, `usuario_email`) VALUES
(1, 'Administrador', 'Principal', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC', ''),
(2, 'Pedro', 'Perez', 'demo', '$2y$10$Xtr4BctVSvHP9OJNNWV3WeA48wly6s1BXnMn8u/5G75ybn4Lahi0W', 'demo@mail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
