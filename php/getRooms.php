 <?php
 $connection = mysqli_connect('127.0.0.1','root','','pisense')
 or die("Error " . mysqli_error($connection));

 if($connection) {
  $sql = "SELECT id,name FROM rooms";

   $result = mysqli_query($connection,$sql) or die("Error in Selecting " . mysqli_error($connection));
   $array = array();

   while ($row = mysqli_fetch_assoc($result)) {
     $array[] = $row;
   }
   mysqli_close($connection);
   /*
     //Alternativa al echo, escribir un Json file
     $fp = fopen('empdata.json', 'w');
     fwrite($fp, json_encode($array));
     fclose($fp);
   */
   echo json_encode($array);
   header("Content-type: application/json");
   exit();

 }else{
   mysqli_close($connection);
   echo 'GRAN CAGADA '.mysqli_error();
 }

  ?>
