<?php
  include '../DBconnection.php';

  $tracksArray = $_REQUEST['tracks'];
  $tracksArray = explode(',', $tracksArray);

  for ($x = 0; $x < count($tracksArray); $x++) {
    $tempMeasureTrack = $tracksArray[$x];

    if($tempMeasureTrack!=null){
      $sqlOperative = "SELECT id, operative
                       FROM stations
                       WHERE currentTrack = '".$tempMeasureTrack."'
                      ";

      $queryForOperative = mysqli_query($connection,$sqlOperative)
      or die(header("Location: ../../views/error.php"));

      $stationsArray[$x] = mysqli_fetch_assoc($queryForOperative);

    }else{
      $stationsArray[$x] = null;
    }
  }

  mysqli_close($connection);
  echo json_encode($stationsArray);
  header("Content-type: application/json");
?>
