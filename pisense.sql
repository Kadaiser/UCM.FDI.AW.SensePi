-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2017 a las 18:11:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pisense`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dashboardprofiles`
--

CREATE TABLE `dashboardprofiles` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `cell` varchar(2) NOT NULL,
  `cardIdentity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dashboardprofiles`
--

INSERT INTO `dashboardprofiles` (`id`, `userEmail`, `cell`, `cardIdentity`) VALUES
(5, 'secalero@ucm.es', '11', 'G-STATIONS'),
(6, 'secalero@ucm.es', '22', 'S-MEASURE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dashboardprofiles`
--
ALTER TABLE `dashboardprofiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userEmail` (`userEmail`),
  ADD KEY `cardId` (`cardIdentity`),
  ADD KEY `cell` (`cell`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dashboardprofiles`
--
ALTER TABLE `dashboardprofiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dashboardprofiles`
--
ALTER TABLE `dashboardprofiles`
  ADD CONSTRAINT `dashboardprofiles_ibfk_2` FOREIGN KEY (`userEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dashboardprofiles_ibfk_3` FOREIGN KEY (`cell`) REFERENCES `cellboard` (`cellId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dashboardprofiles_ibfk_4` FOREIGN KEY (`cardIdentity`) REFERENCES `cards` (`identity`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
