<?php

//INSERTAR USERS
INSERT INTO `users` (`email`, `pw`, `nick`, `isadmin`, `sinceDate`, `avatar`, `id`) VALUES ('secalero@ucm.es', 'secalero123', 'secalero', '1', '2017-04-25', NULL, NULL), ('dvalbuen@ucm.es', 'dvalbuen123', 'dvalbuen', '0', '2017-04-25', NULL, NULL);

//INSERTAR STATIONS
INSERT INTO `stations` (`id`, `currentTrack`, `name`) VALUES (NULL, '1234567890abcdef', 'testacion1'), (NULL, 'abcdef1234567890', 'testacion2');

//INSERTAR ROOMS
INSERT INTO `rooms` (`id`, `name`) VALUES (NULL, 'cafetería'), (NULL, 'aula 1'), (NULL, 'aula 2'), (NULL, 'aula 3'), (NULL, 'aula 4'), (NULL, 'aula 5'), (NULL, 'sala de conferencias'), (NULL, 'delegación de alumnos'), (NULL, 'pasillos'), (NULL, 'wc norte');

//INSERTAR ROOMSLOTS
INSERT INTO `roomslots` (`id`, `roomid`, `slot`) VALUES (NULL, '11', '1'), (NULL, '11', '2'), (NULL, '11', '3'), (NULL, '11', '4'), (NULL, '12', '1'), (NULL, '12', '2'), (NULL, '12', '3'), (NULL, '12', '4');

//INSERTAR ASSIGNMENTS
INSERT INTO `assignments` (`roomslotid`, `stationid`, `assignedbyemail`, `sincedate`) VALUES ('2', '2', 'dvalbuen@ucm.es', CURRENT_TIMESTAMP);

//INSERTAR MEASURELOGS
INSERT INTO `measurelogs` (`roomslotid`, `measuretrack`, `date`) VALUES ('1', '1234567890abcdef', CURRENT_TIMESTAMP);

//INSERTAR MEASURES
INSERT INTO `measures` (`id`, `track`, `Date`, `stationname`, `temperature`, `humidity`, `noise`) VALUES (NULL, 'abcdef1234567890', CURRENT_TIMESTAMP, 'testacion2', '20', '43', NULL);

//ejemplo de insertar valores date
INSERT INTO `sometable` VALUES (TIMESTAMPADD(HOUR, 7, TIMESTAMPADD(DAY, 1, CURDATE())))





0,'%Y-%m-%d-%k-%i','utc'

CREATE PROCEDURE myproc()
BEGIN
DECLARE i int DEFAULT 1;
WHILE (i <= 12) DO
INSERT INTO `roomslots` (`id`, `roomid`, `slot`) VALUES (NULL, i, '1'), (NULL, i, '2'), (NULL, i, '3'), (NULL, i, '4');
SET i = i + 1;
END WHILE;
END
?>