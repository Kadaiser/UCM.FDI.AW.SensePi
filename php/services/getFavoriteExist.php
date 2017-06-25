<?php
  include '../DBconnection.php';

  $roomName = $_REQUEST['roomName'];
  $userNick = $_REQUEST['userNick'];


  $sql= "SELECT * FROM favorites WHERE idUser = (SELECT id
                                                FROM users
                                                WHERE nick = '".$userNick."')
                                  AND idRoom = (SELECT id
                                                FROM rooms
                                                WHERE name = '".$roomName."')
        ";

  $result = mysqli_query($connection,$sql) or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
  echo json_encode(mysqli_num_rows($result));
  header("Content-type: application/json");
  exit();
?>