<?php
  include '../php/DBconnection.php';

  $roomName = $_POST['roomName'];
  $userNick = $_POST['userNick'];

  
//  $roomName = "Aula 1";
//$userNick = "dvalbuen";

  $sql= "SELECT * FROM favorites WHERE idUser = (SELECT id
                                                FROM users
                                                WHERE nick = '".$userNick."')
                                  AND idRoom = (SELECT id
                                                FROM rooms
                                                WHERE name = '".$roomName."')
          ";

  $result = mysqli_query($connection,$sql) or die(header("Location: ../views/error.php"));

  mysqli_close($connection);
  echo json_encode(mysqli_num_rows($result));
  header("Content-type: application/json");
  exit();
?>
