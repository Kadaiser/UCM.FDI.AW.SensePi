<?php

  //apertura de conexión con BD
  $DBconnection = mysqli_connect('127.0.0.1','root','','pisense');

  $roomName = $_POST['roomName'];
  $sinceDate = $_POST['sinceDate'];

  if($DBconnection) {

    $sqlroomslotid = "SELECT roomslots.id
                      FROM rooms JOIN roomslots
                      ON rooms.id = roomslots.roomId
                      WHERE rooms.name = '".$roomName."'
                     ";

    $queryForRoomSlots = mysqli_query($DBconnection,$sqlroomslotid);
 
    $slotsArray = $queryForRoomSlots->fetch_all(MYSQLI_ASSOC);
      
    for ($x = 0; $x < 1/*sizeof($slotsArray)*/; $x++) {
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
      
//2017-04-27 19:10:58

      $queryForMeasures = mysqli_query($DBconnection,$sqlmeasures);
      mysqli_close($DBconnection);

      $measuresArray[$tempSlotId] = $queryForMeasures->fetch_all(MYSQLI_ASSOC);
    }

    echo json_encode($measuresArray);
    header("Content-type: application/json");
    exit();    

  }else{
    mysqli_close($DBconnection);
    echo 'GRAN CAGADA '.mysqli_error();
  }

?>
