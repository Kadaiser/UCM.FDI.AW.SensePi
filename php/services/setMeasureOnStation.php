<?php
  $room = htmlspecialchars(trim(strip_tags($_REQUEST['Room'])));
  $track = htmlspecialchars(trim(strip_tags($_REQUEST['MeasureTrack'])));
  $temp = htmlspecialchars(trim(strip_tags($_REQUEST['temp'])));
  $hum = htmlspecialchars(trim(strip_tags($_REQUEST['hum'])));
  $noise = htmlspecialchars(trim(strip_tags($_REQUEST['noise'])));

  include '../DBconnection.php';

  $sqlRoomId  = "SELECT roomslotid FROM measurelogs WHERE measuretrack = '".$track."'";

  $resultSlotid = mysqli_query($connection,$sqlRoomId)
  or die(header("Location: ../../views/error.php"));

  $sqlName = "SELECT name FROM stations JOIN assignments
          ON stations.id = assignments.stationid
          WHERE assignments.roomslotid ='".mysqli_fetch_object($resultSlotid)->roomslotid."'
          ";

  $resultname = mysqli_query($connection,$sqlName)
  or die(header("Location: ../views/error.php"));

  $name = mysqli_fetch_object($resultname)->name;

  $sqlMeasure="INSERT INTO measures (`id`, `track`, `Date`, `stationname`, `temperature`, `humidity`, `noise`)
        VALUES (NULL, '$track', CURRENT_TIMESTAMP, '$name', '$temp', '$hum', '$noise')
  ";

  $name = mysqli_query($connection,$sqlMeasure)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
  header("Location: ../dashboard.php");
?>
