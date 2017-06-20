<?php

include '../DBconnection.php';

$roomId = $_REQUEST['roomId'];

$sql = "SELECT roomslots.id, measuretrack, slot
        FROM  roomslots LEFT OUTER JOIN measurelogs
        ON roomslots.id = measurelogs.roomslotid
        WHERE roomslots.roomid = '".$roomId."'
       ";

$result = mysqli_query($connection,$sql)
or die(header("Location: ../../views/error.php"));

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
  $array[] = $row;
}
mysqli_close($connection);
echo json_encode($array);
header("Content-type: application/json");

?>
