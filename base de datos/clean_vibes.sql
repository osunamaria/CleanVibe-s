-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2022 a las 16:33:44
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clean_vibes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contabilidad`
--

CREATE TABLE `contabilidad` (
  `gasto_evento` int(5) NOT NULL,
  `gasto_instalacion` int(5) NOT NULL,
  `gasto_otro` int(5) NOT NULL,
  `ingreso_cuotas` int(5) NOT NULL COMMENT 'Mensualidad de los clientes',
  `ingreso_reservas` int(5) NOT NULL COMMENT 'Alquiler de pistas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_noticia`
--

CREATE TABLE `evento_noticia` (
  `id` int(2) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `publicacion` enum('evento','noticia') NOT NULL,
  `tipo` enum('publico','privado') NOT NULL,
  `contenido` varchar(100) NOT NULL,
  `fecha` date NOT NULL COMMENT 'Fecha de publicación'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` int(2) NOT NULL,
  `tipo` enum('padel','tenis','futbol','baloncesto','barbacoa') NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `localizacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_instalacion` int(2) NOT NULL,
  `id_socio` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `num_socios` int(2) NOT NULL,
  `num_no_socios` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(4) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `tipo` set('socio','presidente','administrador') NOT NULL DEFAULT 'socio' COMMENT 'Mínimo un rol',
  `correo` varchar(30) NOT NULL,
  `telefono` int(9) NOT NULL,
  `fecnac` date NOT NULL COMMENT 'Mayores de 14 (salvo autorización)',
  `num_miembros` int(2) NOT NULL DEFAULT 1,
  `cuota` int(2) NOT NULL DEFAULT 60 COMMENT 'Entre 2 y 5 = 70; entre 6 y 10 = 85; más de 10 = 90'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento_noticia`
--
ALTER TABLE `evento_noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD KEY `id_instalacion` (`id_instalacion`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento_noticia`
--
ALTER TABLE `evento_noticia`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_instalacion`) REFERENCES `instalaciones` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
