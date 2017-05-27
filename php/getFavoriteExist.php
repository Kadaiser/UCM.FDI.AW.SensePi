<?php

include '../php/DBconnection.php';


$roomName = $_POST['roomName'];
$userNick = $_POST['usernick'];
/*
$roomName = "Aula 1";
$userNick = "secalero";
*/
$response;

$sql= "SELECT EXISTS(
                    SELECT * FROM favorites WHERE idUser = (
                                                          SELECT id
                                                          FROM users
                                                          WHERE nick = '".$userNick."')
                                            AND idRoom = (
                                                          SELECT id
                                                          FROM rooms
                                                          WHERE name = '".$roomName."')
        )";

$result = mysqli_query($connection,$sql) or die(header("Location: ../views/error.php"));

if (mysqli_num_rows($result) < 1) {
  $response = false;
}else{
  $response = true;
}

mysqli_close($connection);
echo json_encode($response);
header("Content-type: application/json");
exit();
?>
