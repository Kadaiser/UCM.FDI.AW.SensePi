<?php
$DBconnection = mysqli_connect('127.0.0.1','root','','pisense');
$roomId = $_POST['roomId'];

if($DBconnection) {

 $sqlMeasureTrack = "SELECT roomslotid, measuretrack
                   FROM  roomslots JOIN measurelogs
                   ON roomslots.id = measurelogs.roomslotid
                   WHERE roomslots.roomid = '".$roomId."'
                  ";

  $queryForSlotsTracks = mysqli_query($DBconnection,$sqlMeasureTrack);

  mysqli_close($DBconnection);
  echo json_encode($queryForSlotsTracks);
  header("Content-type: application/json");
  exit();

}else{
  mysqli_close($DBconnection);
  echo 'GRAN CAGADA '.mysqli_error();
}
 ?>
