<?php
  include '../DBconnection.php';

  $userNick = $_REQUEST['userNick'];

  $sqlFav= "SELECT idRoom, name
            FROM favorites JOIN rooms
            ON rooms.id = favorites.idRoom
            WHERE idUser = (SELECT id
                            FROM users
                            WHERE nick = '".$userNick."')
        ";

  $queryForFav = mysqli_query($connection,$sqlFav)
  or die(header("Location: ../../views/error.php"));

  $userFavs = $queryForFav->fetch_all(MYSQLI_ASSOC);

  mysqli_close($connection);
  echo json_encode($userFavs);
  header("Content-type: application/json");
?>