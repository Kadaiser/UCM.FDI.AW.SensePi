<?php

include '../php/DBconnection.php';

$roomId = $_POST['roomId'];

$sql = "SELECT roomslotid, measuretrack
                  FROM  roomslots JOIN measurelogs
                  ON roomslots.id = measurelogs.roomslotid
                  WHERE roomslots.roomid = '".$roomId."'
                ";

$result = mysqli_query($connection,$sql)
or die(header("Location: ../views/error.php"));

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
  $array[] = $row;
}
mysqli_close($connection);
echo json_encode($array);
header("Content-type: application/json");
exit();

 ?>
