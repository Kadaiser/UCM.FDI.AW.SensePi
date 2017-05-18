<?php

include '../php/DBconnection.php';

$roomName = $_POST['roomName'];
$sinceDate = $_POST['sinceDate'];

$sqlroomslotid = "SELECT roomslots.id
                  FROM rooms JOIN roomslots
                  ON rooms.id = roomslots.roomId
                  WHERE rooms.name = '".$roomName."'
                  ";

$queryForRoomSlots = mysqli_query($connection,$sqlroomslotid)
or die(header("Location: ../views/error.php"));

$slotsArray = $queryForRoomSlots->fetch_all(MYSQLI_ASSOC);

for ($x = 0; $x < 1/*count($slotsArray)*/; $x++) {
  $tempSlotId = $slotsArray[$x]["id"];

  $sqlmeasures = "SELECT Date, temperature, humidity, noise
                  FROM measures
                  WHERE Date > '".$sinceDate."' AND track IN (
                        SELECT measureTrack
                        FROM measureLogs
                        WHERE roomslotid = ".$tempSlotId." AND date >= (
                              SELECT date
                              FROM measureLogs
                              WHERE roomslotid = ".$tempSlotId." AND date < '".$sinceDate."'
                              ORDER BY date DESC
                              LIMIT 1
                              )
                        )
                  ";

  $queryForMeasures = mysqli_query($connection,$sqlmeasures)
  or die(header("Location: ../views/error.php"));

  mysqli_close($connection);

  $measuresArray[$tempSlotId] = $queryForMeasures->fetch_all(MYSQLI_ASSOC);
}

echo json_encode($measuresArray);
header("Content-type: application/json");

?>
