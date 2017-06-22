<?php
  include '../DBconnection.php';

  $stationName = htmlspecialchars(trim(strip_tags($_REQUEST['stationName'])));

  $sqlSelect = "SELECT name
                FROM stations
                WHERE name='".$stationName."'
                ";

  $query = mysqli_query($connection,$sqlSelect)
  or die(header("Location: ../views/error.php"));

  if(mysqli_num_rows($query)!=0){
    mysqli_close($connection);
    echo json_encode(false);
    header("Content-type: application/json");
  }else{
    $sql= "INSERT INTO `stations` (`id`, `currentTrack`, `name`, `operative`)
          VALUES (NULL, NULL, '".$stationName."', '0')
          ";

    mysqli_query($connection,$sql)
    or die(header("Location: ../../views/error.php"));

    mysqli_close($connection);
  }
?>
