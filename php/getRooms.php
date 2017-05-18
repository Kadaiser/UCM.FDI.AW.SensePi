<?php
$connection = mysqli_connect('127.0.0.1','root','','pisense')
or die("Error " . mysqli_error($connection));
mysqli_set_charset( $connection, 'utf8');


if($connection) {
  $sql= "SELECT * FROM rooms";
  $result = mysqli_query($connection,$sql) or die("Error in Selecting " . mysqli_error($connection));

  $array = array();
  /*
  while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
  }
  */
  while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
  }

  mysqli_close($connection);
  echo json_encode($array);
  header("Content-type: application/json");
  exit();

}else{
  mysqli_close($connection);
  echo 'GRAN CAGADA '.mysqli_error();
}

 ?>
