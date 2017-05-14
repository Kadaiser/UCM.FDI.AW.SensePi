<?php

$room = htmlspecialchars(trim(strip_tags($_POST['Room'])));
$track = htmlspecialchars(trim(strip_tags($_POST['MeasureTrack'])));
$temp = htmlspecialchars(trim(strip_tags($_POST['temp'])));
$hum = htmlspecialchars(trim(strip_tags($_POST['hum'])));
$noise = htmlspecialchars(trim(strip_tags($_POST['noise'])));

$connection = mysqli_connect('127.0.0.1','root','','pisense') or die("Error " . mysqli_error($connection));

if($connection) {

  $sqlRoomId  = "SELECT roomslotid FROM measurelogs WHERE measuretrack = '".$track."'";

  $resultSlotid = mysqli_query($connection,$sqlRoomId) or die("Error in Selecting " . mysqli_error($connection));

  $sqlName = "SELECT name FROM stations JOIN assignments
          ON stations.id = assignments.stationid
          WHERE assignments.roomslotid ='".mysqli_fetch_object($resultSlotid)->roomslotid."'
          ";

  $resultname = mysqli_query($connection,$sqlName) or die("Error in Selecting " . mysqli_error($connection));
  $name = mysqli_fetch_object($resultname)->name;

  $sqlMeasure="INSERT INTO measures (`id`, `track`, `Date`, `stationname`, `temperature`, `humidity`, `noise`)
        VALUES (NULL, '$track', CURRENT_TIMESTAMP, '$name', '$temp', '$hum', '$noise')
  ";

  $name = mysqli_query($connection,$sqlMeasure) or die("Error in Selecting " . mysqli_error($connection));
  mysqli_close($connection);
  header("Location: ../php/setMeasure.php");

}else{
  mysqli_close($connection);
  echo 'GRAN CAGADA '.mysqli_error();
}
 ?>
