<?php
session_start();

include '../php/DBconnection.php';

$roomName = $_POST['roomName'];
$nickname = $_POST['userNick'];

$sql= "INSERT INTO favorites (`idUser`, `idRoom`)
        VALUES (
          ( SELECT id FROM users WHERE nick = '".$nickname."'),
          ( SELECT id FROM rooms WHERE name = '".$roomName."')
          )";
$result = mysqli_query($connection,$sql) or die(header("Location: ../views/error.php"));

mysqli_close($connection);

echo json_encode("Added to favorite");
header("Content-type: application/json");
?>
