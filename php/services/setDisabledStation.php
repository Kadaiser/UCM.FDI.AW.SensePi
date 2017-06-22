<?php
  include '../DBconnection.php';

  $stationId = htmlspecialchars(trim(strip_tags($_REQUEST['stationId'])));

  $sqlUpdate = "UPDATE stations
                SET operative = '0'
                WHERE id ='".$stationId."'
               ";

  mysqli_query($connection,$sqlUpdate)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
?>
