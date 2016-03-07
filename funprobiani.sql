-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2016 a las 19:47:38
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `funprobiani`
--
CREATE DATABASE IF NOT EXISTS `funprobiani` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `funprobiani`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('Administrador','Usuario') COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `email`, `tipo`, `clave`) VALUES
(1, 'José Rengel', 'joserengel@mail.com', 'Administrador', 'abc123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

DROP TABLE IF EXISTS `adopciones`;
CREATE TABLE `adopciones` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `solicitud` datetime NOT NULL,
  `respuesta` datetime NOT NULL,
  `estado` enum('Espera','Aprobada','Rechazada','Cancelada') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

DROP TABLE IF EXISTS `donaciones`;
CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `tipo` enum('Material','Financiera') COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` float NOT NULL,
  `solicitud` datetime NOT NULL,
  `respuesta` datetime NOT NULL,
  `estado` enum('Rechazada','Aprobada','Espera','Cancelada') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevistas`
--

DROP TABLE IF EXISTS `entrevistas`;
CREATE TABLE `entrevistas` (
  `id` int(11) NOT NULL,
  `id_adopcion` int(11) NOT NULL,
  `interes` text COLLATE utf8_spanish_ci NOT NULL,
  `mascotas` text COLLATE utf8_spanish_ci NOT NULL,
  `esterilizacion` text COLLATE utf8_spanish_ci NOT NULL,
  `personas` text COLLATE utf8_spanish_ci NOT NULL,
  `casa` enum('Propia','Alquilada') COLLATE utf8_spanish_ci NOT NULL,
  `compromiso` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL,
  `atencion` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL,
  `economico` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL,
  `responsable` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL,
  `veterinario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vacacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `visitas` text COLLATE utf8_spanish_ci NOT NULL,
  `parametros` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` enum('Hembra','Macho') COLLATE utf8_spanish_ci NOT NULL,
  `peso` float NOT NULL,
  `especie` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vacunado` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL,
  `esterilizado` enum('Si','No') COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` enum('Fundacion','Adoptada') COLLATE utf8_spanish_ci NOT NULL,
  `feing` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `tipo` enum('Voluntario','Hogar temporal','Usuario') COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fenac` date NOT NULL,
  `edo_civil` enum('Soltero','Casado','Concubinato','Divorciado','Viudo') COLLATE utf8_spanish_ci NOT NULL,
  `tlf` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `dir` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `viv` enum('Propia','Alquilada','Opcion a compra','Invasion') COLLATE utf8_spanish_ci NOT NULL,
  `nro_casa` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `tlf_local` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dir_hogar` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`) USING BTREE;

--
-- Indices de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_adopcion` (`id_adopcion`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `adopciones_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD CONSTRAINT `entrevistas_ibfk_1` FOREIGN KEY (`id_adopcion`) REFERENCES `adopciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
