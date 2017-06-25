<?php
  $room = htmlspecialchars(trim(strip_tags($_REQUEST['Room'])));
  $track = htmlspecialchars(trim(strip_tags($_REQUEST['MeasureTrack'])));
  $stationName = htmlspecialchars(trim(strip_tags($_REQUEST['stationName'])));
  $temp = htmlspecialchars(trim(strip_tags($_REQUEST['temp'])));
  $hum = htmlspecialchars(trim(strip_tags($_REQUEST['hum'])));
  $noise = htmlspecialchars(trim(strip_tags($_REQUEST['noise'])));

  include '../DBconnection.php';

  $sqlRoomId  = "SELECT roomslotid FROM measurelogs WHERE measuretrack = '".$track."'";

  $resultSlotid = mysqli_query($connection,$sqlRoomId)
  or die(header("Location: ../../views/error.php"));

  $sqlMeasure="INSERT INTO measures (`id`, `track`, `Date`, `stationname`, `temperature`, `humidity`, `noise`)
        VALUES (NULL, '$track', CURRENT_TIMESTAMP, '$stationName', '$temp', '$hum', '$noise')
  ";

  $queryForMeasure = mysqli_query($connection,$sqlMeasure)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
?>
