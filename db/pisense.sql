-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2017 a las 13:05:31
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
-- Estructura de tabla para la tabla `assignments`
--

CREATE TABLE `assignments` (
  `roomslotid` int(11) NOT NULL,
  `stationid` int(11) NOT NULL,
  `assignedbyemail` varchar(30) NOT NULL,
  `sincedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `assignments`
--

INSERT INTO `assignments` (`roomslotid`, `stationid`, `assignedbyemail`, `sincedate`) VALUES
(1, 1, 'dvalbuen@ucm.es', '2017-04-27 19:00:24'),
(2, 2, 'dvalbuen@ucm.es', '2017-04-27 19:00:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `useremail` varchar(30) NOT NULL,
  `roomid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favorites`
--

INSERT INTO `favorites` (`useremail`, `roomid`) VALUES
('dvalbuen@ucm.es', 1),
('dvalbuen@ucm.es', 10),
('dvalbuen@ucm.es', 11),
('secalero@ucm.es', 12);

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
(97, 'THN10-2017-05-14', '2017-05-14 12:00:00', 'THN10', '15.0', '39.0', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `name`) VALUES
(1, 'cafetería'),
(2, 'aula 1'),
(3, 'aula 2'),
(4, 'aula 3'),
(5, 'aula 4'),
(6, 'aula 5'),
(7, 'sala de conferencias'),
(8, 'delegación de alumnos'),
(9, 'pasillos'),
(10, 'wc norte'),
(11, 'wc sur'),
(12, 'wc biblioteca');

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
  `currentTrackSince` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(12, 'THN10', 'THN10-2017-05-14', '2017-05-14 17:35:23', 1);

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
-- Indices de la tabla `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`roomslotid`,`stationid`),
  ADD KEY `stationid` (`stationid`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`useremail`,`roomid`),
  ADD KEY `roomid` (`roomid`);

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
-- AUTO_INCREMENT de la tabla `measures`
--
ALTER TABLE `measures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`roomslotid`) REFERENCES `roomslots` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`stationid`) REFERENCES `stations` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`useremail`) REFERENCES `users` (`email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON UPDATE CASCADE;

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
