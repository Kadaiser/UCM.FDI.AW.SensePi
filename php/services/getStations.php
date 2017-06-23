<?php
  include '../DBconnection.php';

  $sql= "SELECT id,name,currentTrack,currentTrackSince,operative FROM stations";

  $result = mysqli_query($connection,$sql)
  or die(header("Location: ../../views/error.php"));

  $array = array();

  while ($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
  }

  mysqli_close($connection);
  echo json_encode($array);
  header("Content-type: application/json");
  exit();
?>
