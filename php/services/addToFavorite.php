<?php
  include '../DBconnection.php';

  $roomName = $_REQUEST['roomName'];
  $nickname = $_REQUEST['userNick'];

  $sql= "INSERT INTO favorites (`idUser`, `idRoom`)
          VALUES (
            ( SELECT id FROM users WHERE nick = '".$nickname."'),
            ( SELECT id FROM rooms WHERE name = '".$roomName."')
            )";
  mysqli_query($connection,$sql)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);
?>
