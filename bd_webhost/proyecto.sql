-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 20:15:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigoscontra`
--

CREATE TABLE `codigoscontra` (
  `codigos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigoscontra`
--

INSERT INTO `codigoscontra` (`codigos`) VALUES
(321),
(334),
(335),
(385);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccionWeb` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoContra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id`, `nombre`, `descripcion`, `direccionWeb`, `usuario`, `codigoContra`) VALUES
(1, 'UBA - Universidad de Buenos Aires', 'Diario del pais en si.', 'https://uba.ar/#/', 'Juan654', 456),
(2, 'UBA - https://www.ingenieria.uba.ar/', 'Pagina oficial de la facultad de ingeniería de la UBA:', 'https://www.ingenieria.uba.ar/', 'mariano.suarez@gmail.com', 456),
(3, 'Vacunate PBA', 'Sitio web sobre vacunaciones COVID.', 'https://vacunatepba.gba.gob.ar/', '57894552', 345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccionWeb` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `codigoContra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `direccionWeb`, `usuario`, `codigoContra`) VALUES
(81, 'Universidad de Buenos Aires', 'Pagina oficial de la Universidad de Buenos Aires.', 'https://uba.ar/', 12, 335),
(82, 'Facultad de Ingenieria', 'Esta la web oficial de Ingeniería de la UBA.', 'https://www.ingenieria.uba.ar/', 13, 334),
(96, 'Biblioteca Nacional', 'Biblioteca Nacional Campus para ingresar a la misma.', 'https://www.bn.gov.ar/', 14, 321),
(97, 'Banco Galicia', 'Pagina oficial del Banco Galicia.', 'https://www.bancogalicia.com/', 12, 321),
(98, 'Vacunate PBA', 'Plataforma web para el registro y notificaciones de vacunación.', 'https://vacunatepba.gba.gob.ar/', 13, 334),
(100, 'Universidad de Quilmes', 'Campus Virtual de la Facultad de Quilmes.', 'http://www.unq.edu.ar/', 13, 321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `usuario`) VALUES
(12, 'Juana2020'),
(13, 'MartinCapo'),
(14, 'Veronica14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigoscontra`
--
ALTER TABLE `codigoscontra`
  ADD PRIMARY KEY (`codigos`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
