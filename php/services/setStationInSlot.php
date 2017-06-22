<?php
  include '../DBconnection.php';

  $slotId = htmlspecialchars(trim(strip_tags($_REQUEST['slotId'])));
  $track = htmlspecialchars(trim(strip_tags($_REQUEST['measureTrack'])));
  $  = htmlspecialchars(trim(strip_tags($_REQUEST['stationId'])));

  //TODO:-insertar nuevo measureLog con ese roomslotid y generatedTrack
  //TODO:-actualizar station con el generatedTrack

  $sqlUpdate= "INSERT INTO `measurelogs` (`roomslotid`, `measuretrack`)
         VALUES ('".$slotId."', '".$track."')
         UPDATE stations
         SET operative = '1' AND currentTrack = '".$track."'
         WHERE id ='".$stationId."'
        ";

  mysqli_query($connection,$sqlUpdate)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
?>
