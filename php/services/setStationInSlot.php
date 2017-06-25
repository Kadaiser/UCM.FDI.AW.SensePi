<?php
  include '../DBconnection.php';

  $slotId = htmlspecialchars(trim(strip_tags($_REQUEST['slotId'])));
  $track = htmlspecialchars(trim(strip_tags($_REQUEST['measureTrack'])));
  $stationId  = htmlspecialchars(trim(strip_tags($_REQUEST['stationId'])));

  //TODO:-insertar nuevo measureLog con ese roomslotid y generatedTrack
  //TODO:-actualizar station con el generatedTrack

  $sqlMeasure= "INSERT INTO `measurelogs` (`roomslotid`, `measuretrack`)
                VALUES ('".$slotId."', '".$track."')
               ";

  mysqli_query($connection,$sqlMeasure)
  or die(header("Location: ../../views/error.php"));

  $sqlUpdate= "UPDATE stations
               SET operative = '1', currentTrack = '".$track."'
               WHERE id ='".$stationId."'
              ";

  mysqli_query($connection,$sqlUpdate)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
?>
