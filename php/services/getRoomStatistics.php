<?php
  include '../DBconnection.php';

  $sqlStats = "SELECT id,name,visits
               FROM rooms
               ORDER BY visits DESC
               LIMIT 5
              ";

  $sqlTotalVisits = "SELECT SUM(visits)
               FROM rooms
              ";

  $queryForStats = mysqli_query($connection,$sqlStats)
  or die(header("Location: ../../views/error.php"));
  
  $queryForTotalVisits = mysqli_query($connection,$sqlTotalVisits)
  or die(header("Location: ../../views/error.php"));

  mysqli_close($connection);

  $stats = (object)array();
  $stats->stats = $queryForStats->fetch_all(MYSQLI_ASSOC);
  $stats->total = $queryForTotalVisits->fetch_all(MYSQLI_ASSOC);
  echo json_encode($stats);
  header("Content-type: application/json");
?>