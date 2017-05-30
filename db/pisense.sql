-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2017 a las 02:45:02
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `identity` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `forAdmin` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cards`
--

INSERT INTO `cards` (`id`, `identity`, `name`, `forAdmin`) VALUES
(1, 'G-STATIONS', 'Get Stations Info', 1),
(2, 'S-MEASURE', 'Set Measure on Slot', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellboard`
--

CREATE TABLE `cellboard` (
  `cellId` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cellboard`
--

INSERT INTO `cellboard` (`cellId`) VALUES
('11'),
('12'),
('13'),
('21'),
('22'),
('23'),
('31'),
('32'),
('33');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favorites`
--

INSERT INTO `favorites` (`id`, `idUser`, `idRoom`) VALUES
(24, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measurelogs`
--

CREATE TABLE `measurelogs` (
  `roomslotid` int(11) NOT NULL,
  `measuretrack` varchar(16) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `measurelogs`
--

INSERT INTO `measurelogs` (`roomslotid`, `measuretrack`, `date`) VALUES
(1, '1234567890abcdef', '2017-04-27 19:10:58'),
(2, 'abcdef1234567890', '2017-04-27 19:23:16'),
(5, 'THN1-2017-05-14', '2017-05-06 17:45:07'),
(9, 'THN2-2017-05-14', '2017-05-06 17:45:07'),
(13, 'THN3-2017-05-14', '2017-05-06 17:45:07'),
(17, 'THN4-2017-05-14', '2017-05-06 17:45:07'),
(21, 'THN5-2017-05-14', '2017-05-06 17:45:07'),
(25, 'THN6-2017-05-14', '2017-05-06 17:45:07'),
(29, 'THN7-2017-05-14', '2017-05-06 17:45:07'),
(33, 'THN8-2017-05-14', '2017-05-06 17:45:07'),
(37, 'THN9-2017-05-14', '2017-05-06 17:45:07'),
(41, 'THN10-2017-05-14', '2017-05-06 17:45:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measures`
--

CREATE TABLE `measures` (
  `id` int(11) NOT NULL,
  `track` varchar(16) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stationname` varchar(20) NOT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `humidity` decimal(3,1) DEFAULT NULL,
  `noise` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `measures`
--

INSERT INTO `measures` (`id`, `track`, `Date`, `stationname`, `temperature`, `humidity`, `noise`) VALUES
(1, '1234567890abcdef', '2017-04-27 18:21:49', 'testacion1', '20.0', '40.0', 15),
(2, '1234567890abcdef', '2017-04-27 19:21:49', 'testacion1', '22.0', '38.0', 12),
(3, 'abcdef1234567890', '2017-04-27 18:24:40', 'testacion2', '18.0', '45.0', NULL),
(4, 'abcdef1234567890', '2017-04-27 19:24:40', 'testacion2', '17.0', '48.0', NULL),
(5, 'abcdef1234567890', '2017-04-27 18:25:39', 'testacion2', '20.0', '43.0', NULL),
(6, '1234567890abcdef', '2017-04-28 08:00:00', 'testacion1', '21.0', '35.0', 7),
(7, '1234567890abcdef', '2017-04-29 08:00:00', 'testacion1', '20.5', '32.0', 6),
(8, '1234567890abcdef', '2017-04-30 08:00:00', 'testacion1', '19.0', '30.0', 7),
(9, '1234567890abcdef', '2017-05-01 08:00:00', 'testacion1', '18.0', '29.0', 8),
(10, '1234567890abcdef', '2017-05-02 08:00:00', 'testacion1', '19.5', '31.0', 7),
(11, '1234567890abcdef', '2017-05-03 08:00:00', 'testacion1', '20.5', '27.0', 6),
(12, '1234567890abcdef', '2017-05-04 08:00:00', 'testacion1', '19.0', '29.0', 7),
(13, '1234567890abcdef', '2017-05-05 08:00:00', 'testacion1', '17.0', '42.5', 6),
(16, '1234567890abcdef', '2017-05-14 12:59:56', 'testacion1', '25.0', '42.0', 12),
(17, '1234567890abcdef', '2017-05-14 13:03:12', 'testacion1', '24.0', '41.0', 2),
(18, 'THN1-2017-05-14', '2017-05-07 12:00:00', 'THN1', '18.0', '28.0', 1),
(19, 'THN1-2017-05-14', '2017-05-08 12:00:00', 'THN1', '20.0', '35.0', 12),
(20, 'THN1-2017-05-14', '2017-05-09 12:00:00', 'THN1', '18.0', '36.0', 13),
(21, 'THN1-2017-05-14', '2017-05-10 12:00:00', 'THN1', '17.0', '34.0', 13),
(22, 'THN1-2017-05-14', '2017-05-11 12:00:00', 'THN1', '19.0', '35.0', 12),
(23, 'THN1-2017-05-14', '2017-05-12 12:00:00', 'THN1', '20.0', '31.0', 10),
(24, 'THN1-2017-05-14', '2017-05-13 12:00:00', 'THN1', '16.0', '42.0', 2),
(25, 'THN1-2017-05-14', '2017-05-14 12:00:00', 'THN1', '20.0', '31.0', 1),
(26, 'THN2-2017-05-14', '2017-05-07 12:00:00', 'THN2', '17.0', '29.0', 0),
(27, 'THN2-2017-05-14', '2017-05-08 12:00:00', 'THN2', '19.0', '34.0', 10),
(28, 'THN2-2017-05-14', '2017-05-09 12:00:00', 'THN2', '18.0', '32.0', 12),
(29, 'THN2-2017-05-14', '2017-05-10 12:00:00', 'THN2', '16.0', '30.0', 12),
(30, 'THN2-2017-05-14', '2017-05-11 12:00:00', 'THN2', '18.0', '34.0', 11),
(31, 'THN2-2017-05-14', '2017-05-12 12:00:00', 'THN2', '19.0', '28.0', 13),
(32, 'THN2-2017-05-14', '2017-05-13 12:00:00', 'THN2', '19.0', '32.0', 0),
(33, 'THN2-2017-05-14', '2017-05-14 12:00:00', 'THN2', '16.0', '39.0', 1),
(34, 'THN3-2017-05-14', '2017-05-07 12:00:00', 'THN3', '18.0', '32.0', 2),
(35, 'THN3-2017-05-14', '2017-05-08 12:00:00', 'THN3', '21.0', '30.0', 11),
(36, 'THN3-2017-05-14', '2017-05-09 12:00:00', 'THN3', '20.0', '31.0', 12),
(37, 'THN3-2017-05-14', '2017-05-10 12:00:00', 'THN3', '17.0', '33.0', 13),
(38, 'THN3-2017-05-14', '2017-05-11 12:00:00', 'THN3', '18.0', '32.0', 15),
(39, 'THN3-2017-05-14', '2017-05-12 12:00:00', 'THN3', '19.0', '29.0', 12),
(40, 'THN3-2017-05-14', '2017-05-13 12:00:00', 'THN3', '20.0', '30.0', 4),
(41, 'THN3-2017-05-14', '2017-05-14 12:00:00', 'THN3', '17.0', '35.0', 3),
(42, 'THN4-2017-05-14', '2017-05-07 12:00:00', 'THN4', '19.0', '30.0', 2),
(43, 'THN4-2017-05-14', '2017-05-08 12:00:00', 'THN4', '22.0', '30.0', 15),
(44, 'THN4-2017-05-14', '2017-05-09 12:00:00', 'THN4', '19.0', '28.0', 14),
(45, 'THN4-2017-05-14', '2017-05-10 12:00:00', 'THN4', '18.0', '30.0', 16),
(46, 'THN4-2017-05-14', '2017-05-11 12:00:00', 'THN4', '19.0', '31.0', 14),
(47, 'THN4-2017-05-14', '2017-05-12 12:00:00', 'THN4', '21.0', '27.0', 13),
(48, 'THN4-2017-05-14', '2017-05-13 12:00:00', 'THN4', '17.0', '32.0', 5),
(49, 'THN4-2017-05-14', '2017-05-14 12:00:00', 'THN4', '18.0', '40.0', 4),
(50, 'THN5-2017-05-14', '2017-05-07 12:00:00', 'THN5', '18.0', '29.0', 2),
(51, 'THN5-2017-05-14', '2017-05-08 12:00:00', 'THN5', '21.0', '34.0', 16),
(52, 'THN5-2017-05-14', '2017-05-09 12:00:00', 'THN5', '18.0', '29.0', 12),
(53, 'THN5-2017-05-14', '2017-05-10 12:00:00', 'THN5', '21.0', '31.0', 15),
(54, 'THN5-2017-05-14', '2017-05-11 12:00:00', 'THN5', '18.0', '33.0', 16),
(55, 'THN5-2017-05-14', '2017-05-12 12:00:00', 'THN5', '19.0', '34.0', 19),
(56, 'THN5-2017-05-14', '2017-05-13 12:00:00', 'THN5', '19.0', '36.0', 4),
(57, 'THN5-2017-05-14', '2017-05-14 12:00:00', 'THN5', '20.0', '45.0', 3),
(58, 'THN6-2017-05-14', '2017-05-07 12:00:00', 'THN6', '22.0', '32.0', 5),
(59, 'THN6-2017-05-14', '2017-05-08 12:00:00', 'THN6', '20.0', '42.0', 27),
(60, 'THN6-2017-05-14', '2017-05-09 12:00:00', 'THN6', '20.0', '35.0', 25),
(61, 'THN6-2017-05-14', '2017-05-10 12:00:00', 'THN6', '22.0', '36.0', 26),
(62, 'THN6-2017-05-14', '2017-05-11 12:00:00', 'THN6', '20.0', '37.0', 22),
(63, 'THN6-2017-05-14', '2017-05-12 12:00:00', 'THN6', '18.0', '39.0', 32),
(64, 'THN6-2017-05-14', '2017-05-13 12:00:00', 'THN6', '17.0', '42.0', 6),
(65, 'THN6-2017-05-14', '2017-05-14 12:00:00', 'THN6', '19.0', '49.0', 5),
(66, 'THN7-2017-05-14', '2017-05-07 12:00:00', 'THN7', '20.0', '30.0', 9),
(67, 'THN7-2017-05-14', '2017-05-08 12:00:00', 'THN7', '21.0', '25.0', 20),
(68, 'THN7-2017-05-14', '2017-05-09 12:00:00', 'THN7', '21.0', '28.0', 19),
(69, 'THN7-2017-05-14', '2017-05-10 12:00:00', 'THN7', '18.0', '29.0', 25),
(70, 'THN7-2017-05-14', '2017-05-11 12:00:00', 'THN7', '19.0', '25.0', 26),
(71, 'THN7-2017-05-14', '2017-05-12 12:00:00', 'THN7', '20.0', '31.0', 24),
(72, 'THN7-2017-05-14', '2017-05-13 12:00:00', 'THN7', '16.0', '36.0', 8),
(73, 'THN7-2017-05-14', '2017-05-14 12:00:00', 'THN7', '18.0', '30.0', 6),
(74, 'THN8-2017-05-14', '2017-05-07 12:00:00', 'THN8', '24.0', '28.0', 8),
(75, 'THN8-2017-05-14', '2017-05-08 12:00:00', 'THN8', '25.0', '27.0', 34),
(76, 'THN8-2017-05-14', '2017-05-09 12:00:00', 'THN8', '25.0', '35.0', 42),
(77, 'THN8-2017-05-14', '2017-05-10 12:00:00', 'THN8', '23.0', '42.0', 47),
(78, 'THN8-2017-05-14', '2017-05-11 12:00:00', 'THN8', '21.0', '44.0', 39),
(79, 'THN8-2017-05-14', '2017-05-12 12:00:00', 'THN8', '24.0', '46.0', 25),
(80, 'THN8-2017-05-14', '2017-05-13 12:00:00', 'THN8', '19.0', '39.0', 12),
(81, 'THN8-2017-05-14', '2017-05-14 12:00:00', 'THN8', '17.0', '25.0', 10),
(82, 'THN9-2017-05-14', '2017-05-07 12:00:00', 'THN9', '20.0', '34.0', 10),
(83, 'THN9-2017-05-14', '2017-05-08 12:00:00', 'THN9', '21.0', '36.0', 12),
(84, 'THN9-2017-05-14', '2017-05-09 12:00:00', 'THN9', '24.0', '41.0', 14),
(85, 'THN9-2017-05-14', '2017-05-10 12:00:00', 'THN9', '19.0', '46.0', 15),
(86, 'THN9-2017-05-14', '2017-05-11 12:00:00', 'THN9', '17.0', '47.0', 12),
(87, 'THN9-2017-05-14', '2017-05-12 12:00:00', 'THN9', '19.0', '42.0', 16),
(88, 'THN9-2017-05-14', '2017-05-13 12:00:00', 'THN9', '16.0', '45.0', 17),
(89, 'THN9-2017-05-14', '2017-05-14 12:00:00', 'THN9', '14.0', '39.0', 12),
(90, 'THN10-2017-05-14', '2017-05-07 12:00:00', 'THN10', '21.0', '31.0', 10),
(91, 'THN10-2017-05-14', '2017-05-08 12:00:00', 'THN10', '22.0', '34.0', 10),
(92, 'THN10-2017-05-14', '2017-05-09 12:00:00', 'THN10', '25.0', '40.0', 12),
(93, 'THN10-2017-05-14', '2017-05-10 12:00:00', 'THN10', '22.0', '43.0', 13),
(94, 'THN10-2017-05-14', '2017-05-11 12:00:00', 'THN10', '19.0', '45.0', 11),
(95, 'THN10-2017-05-14', '2017-05-12 12:00:00', 'THN10', '21.0', '37.0', 15),
(96, 'THN10-2017-05-14', '2017-05-13 12:00:00', 'THN10', '17.0', '39.0', 12),
(97, 'THN10-2017-05-14', '2017-05-14 12:00:00', 'THN10', '15.0', '39.0', 10),
(98, '1234567890abcdef', '2017-05-16 19:38:16', 'testacion1', '25.0', '43.0', 22),
(99, '1234567890abcdef', '2017-05-15 12:00:00', 'testacion1', '26.0', '32.0', 16),
(100, 'THN1-2017-05-14', '2017-05-15 12:00:00', 'THN1', '24.0', '30.0', 16),
(101, 'THN2-2017-05-14', '2017-05-15 12:00:00', 'THN2', '25.0', '32.0', 12),
(102, 'THN3-2017-05-14', '2017-05-15 12:00:00', 'THN3', '24.0', '27.0', 10),
(103, 'THN4-2017-05-14', '2017-05-15 12:00:00', 'THN4', '25.0', '31.0', 17),
(104, 'THN5-2017-05-14', '2017-05-15 12:00:00', 'THN5', '25.0', '30.0', 21),
(105, 'THN6-2017-05-14', '2017-05-15 12:00:00', 'THN6', '24.0', '35.0', 10),
(106, 'THN7-2017-05-14', '2017-05-15 12:00:00', 'THN7', '23.0', '28.0', 14),
(107, 'THN8-2017-05-14', '2017-05-15 12:00:00', 'THN8', '24.0', '35.0', 25),
(108, 'THN9-2017-05-14', '2017-05-15 12:00:00', 'THN9', '23.0', '31.0', 16),
(109, 'THN10-2017-05-14', '2017-05-15 12:00:00', 'THN10', '22.0', '36.0', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `visits`) VALUES
(1, 'Cafetería', 14),
(2, 'Aula 1', 3),
(3, 'Aula 2', 1),
(4, 'Aula 3', 0),
(5, 'Aula 4', 2),
(6, 'Aula 5', 3),
(7, 'Sala de conferencias', 0),
(8, 'Delegación de alumnos', 2),
(9, 'Pasillos', 0),
(10, 'W.C norte', 1),
(11, 'W.C sur', 1),
(12, 'W.C biblioteca', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roomslots`
--

CREATE TABLE `roomslots` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `slot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roomslots`
--

INSERT INTO `roomslots` (`id`, `roomid`, `slot`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 6, 1),
(22, 6, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 1),
(26, 7, 2),
(27, 7, 3),
(28, 7, 4),
(29, 8, 1),
(30, 8, 2),
(31, 8, 3),
(32, 8, 4),
(33, 9, 1),
(34, 9, 2),
(35, 9, 3),
(36, 9, 4),
(37, 10, 1),
(38, 10, 2),
(39, 10, 3),
(40, 10, 4),
(41, 11, 1),
(42, 11, 2),
(43, 11, 3),
(44, 11, 4),
(45, 12, 1),
(46, 12, 2),
(47, 12, 3),
(48, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `currentTrack` varchar(16) DEFAULT NULL,
  `currentTrackSince` datetime DEFAULT CURRENT_TIMESTAMP,
  `operative` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stations`
--

INSERT INTO `stations` (`id`, `name`, `currentTrack`, `currentTrackSince`, `operative`) VALUES
(1, 'testacion1', '1234567890abcdef', '2017-04-27 19:04:23', 1),
(2, 'testacion2', 'abcdef1234567890', '2017-04-27 19:04:23', 1),
(3, 'THN1', 'THN1-2017-05-14', '2017-05-14 17:35:23', 1),
(4, 'THN2', 'THN2-2017-05-14', '2017-05-14 17:35:23', 1),
(5, 'THN3', 'THN3-2017-05-14', '2017-05-14 17:35:23', 1),
(6, 'THN4', 'THN4-2017-05-14', '2017-05-14 17:35:23', 1),
(7, 'THN5', 'THN5-2017-05-14', '2017-05-14 17:35:23', 1),
(8, 'THN6', 'THN6-2017-05-14', '2017-05-14 17:35:23', 1),
(9, 'THN7', 'THN7-2017-05-14', '2017-05-14 17:35:23', 1),
(10, 'THN8', 'THN8-2017-05-14', '2017-05-14 17:35:23', 1),
(11, 'THN9', 'THN9-2017-05-14', '2017-05-14 17:35:23', 1),
(12, 'THN10', 'THN10-2017-05-14', '2017-05-14 17:35:23', 1),
(13, 'abandonHadware', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `sinceDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` mediumblob,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `pw`, `nick`, `isadmin`, `sinceDate`, `avatar`, `id`) VALUES
('secalero@ucm.es', '$2y$12$8b0w73wqoKGU4zzXa/uKfuAdkhvu/KmOyvD1bGycOQK9MUs6A7B3W', 'secalero', 1, '2017-04-25 00:00:00', NULL, 1),
('dvalbuen@ucm.es', '$2y$12$1QNtTDsbcMVkk7C6WrSuC.8C54kUEBG4cHnRDLaUE6A2YP.pS/nwO', 'dvalbuen', 0, '2017-04-25 00:00:00', NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identity` (`identity`);

--
-- Indices de la tabla `cellboard`
--
ALTER TABLE `cellboard`
  ADD UNIQUE KEY `cellId` (`cellId`);

--
-- Indices de la tabla `dashboardprofiles`
--
ALTER TABLE `dashboardprofiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userEmail` (`userEmail`),
  ADD KEY `cardId` (`cardIdentity`),
  ADD KEY `cell` (`cell`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idRoom` (`idRoom`);

--
-- Indices de la tabla `measurelogs`
--
ALTER TABLE `measurelogs`
  ADD PRIMARY KEY (`roomslotid`,`measuretrack`),
  ADD KEY `measuretrack` (`measuretrack`);

--
-- Indices de la tabla `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `track` (`track`),
  ADD KEY `stationname` (`stationname`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roomslots`
--
ALTER TABLE `roomslots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomid` (`roomid`);

--
-- Indices de la tabla `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `currentTrack` (`currentTrack`),
  ADD KEY `name_2` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dashboardprofiles`
--
ALTER TABLE `dashboardprofiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `measures`
--
ALTER TABLE `measures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `roomslots`
--
ALTER TABLE `roomslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `measurelogs`
--
ALTER TABLE `measurelogs`
  ADD CONSTRAINT `measurelogs_ibfk_1` FOREIGN KEY (`roomslotid`) REFERENCES `roomslots` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `measures`
--
ALTER TABLE `measures`
  ADD CONSTRAINT `measures_ibfk_1` FOREIGN KEY (`track`) REFERENCES `measurelogs` (`measuretrack`) ON UPDATE CASCADE,
  ADD CONSTRAINT `measures_ibfk_2` FOREIGN KEY (`stationname`) REFERENCES `stations` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `roomslots`
--
ALTER TABLE `roomslots`
  ADD CONSTRAINT `roomslots_ibfk_1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
