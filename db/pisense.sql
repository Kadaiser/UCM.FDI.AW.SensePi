SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `assignments` (
  `roomslotid` int(11) NOT NULL,
  `stationid` int(11) NOT NULL,
  `assignedbyemail` varchar(30) NOT NULL,
  `sincedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `assignments` (`roomslotid`, `stationid`, `assignedbyemail`, `sincedate`) VALUES
(1, 1, 'dvalbuen@ucm.es', '2017-04-27 19:00:24'),
(2, 2, 'dvalbuen@ucm.es', '2017-04-27 19:00:39');

CREATE TABLE `favorites` (
  `useremail` varchar(30) NOT NULL,
  `roomid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `favorites` (`useremail`, `roomid`) VALUES
('dvalbuen@ucm.es', 1),
('dvalbuen@ucm.es', 10),
('dvalbuen@ucm.es', 11),
('secalero@ucm.es', 12);

CREATE TABLE `measurelogs` (
  `roomslotid` int(11) NOT NULL,
  `measuretrack` varchar(16) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `measurelogs` (`roomslotid`, `measuretrack`, `date`) VALUES
(1, '1234567890abcde2', '2017-04-27 19:12:44'),
(1, '1234567890abcdef', '2017-04-27 19:10:58'),
(2, 'abcdef1234567890', '2017-04-27 19:23:16');

CREATE TABLE `measures` (
  `id` int(11) NOT NULL,
  `track` varchar(16) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stationname` varchar(20) NOT NULL,
  `temperature` decimal(3,1) DEFAULT NULL,
  `humidity` decimal(3,1) DEFAULT NULL,
  `noise` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `measures` (`id`, `track`, `Date`, `stationname`, `temperature`, `humidity`, `noise`) VALUES
(1, '1234567890abcdef', '2017-04-27 18:21:49', 'testacion1', '20.0', '40.0', 15),
(2, '1234567890abcdef', '2017-04-27 19:21:49', 'testacion1', '22.0', '38.0', 12),
(3, 'abcdef1234567890', '2017-04-27 18:24:40', 'testacion2', '18.0', '45.0', NULL),
(4, 'abcdef1234567890', '2017-04-27 19:24:40', 'testacion2', '17.0', '48.0', NULL),
(5, 'abcdef1234567890', '2017-04-27 18:25:39', 'testacion2', '20.0', '43.0', NULL);

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `roomslots` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `slot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `currentTrack` varchar(16) DEFAULT NULL,
  `currentTrackSince` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operative` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `stations` (`id`, `name`, `currentTrack`, `currentTrackSince`, `operative`) VALUES
(1, 'testacion1', '1234567890abcdef', '2017-04-27 19:04:23', 0),
(2, 'testacion2', 'abcdef1234567890', '2017-04-27 19:04:23', 0);

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `sinceDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` mediumblob,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `users` (`email`, `pw`, `nick`, `isadmin`, `sinceDate`, `avatar`, `id`) VALUES
('secalero@ucm.es', 'secalero123', 'secalero', 1, '2017-04-25 00:00:00', NULL, 1),
('dvalbuen@ucm.es', 'dvalbuen123', 'dvalbuen', 0, '2017-04-25 00:00:00', NULL, 2);


ALTER TABLE `assignments`
  ADD PRIMARY KEY (`roomslotid`,`stationid`),
  ADD KEY `stationid` (`stationid`);

ALTER TABLE `favorites`
  ADD PRIMARY KEY (`useremail`,`roomid`),
  ADD KEY `roomid` (`roomid`);

ALTER TABLE `measurelogs`
  ADD PRIMARY KEY (`roomslotid`,`measuretrack`),
  ADD KEY `measuretrack` (`measuretrack`);

ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `track` (`track`),
  ADD KEY `stationname` (`stationname`);

ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roomslots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomid` (`roomid`);

ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `currentTrack` (`currentTrack`),
  ADD KEY `name_2` (`name`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nick` (`nick`);


ALTER TABLE `measures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
ALTER TABLE `roomslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`roomslotid`) REFERENCES `roomslots` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`stationid`) REFERENCES `stations` (`id`) ON UPDATE CASCADE;

ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`useremail`) REFERENCES `users` (`email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON UPDATE CASCADE;

ALTER TABLE `measurelogs`
  ADD CONSTRAINT `measurelogs_ibfk_1` FOREIGN KEY (`roomslotid`) REFERENCES `roomslots` (`id`) ON UPDATE CASCADE;

ALTER TABLE `measures`
  ADD CONSTRAINT `measures_ibfk_1` FOREIGN KEY (`track`) REFERENCES `measurelogs` (`measuretrack`) ON UPDATE CASCADE,
  ADD CONSTRAINT `measures_ibfk_2` FOREIGN KEY (`stationname`) REFERENCES `stations` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `roomslots`
  ADD CONSTRAINT `roomslots_ibfk_1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
