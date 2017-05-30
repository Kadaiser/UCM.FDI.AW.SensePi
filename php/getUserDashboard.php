<?php
  include '../php/DBconnection.php';
  $userEmail = $_POST['email'];

  $sqlDashboardGrid = "SELECT cell,cardIdentity
                       FROM dashboardprofiles
                       WHERE userEmail = '".$userEmail."'
                       ";

$queryForDashboardGrid = mysqli_query($connection,$sqlDashboardGrid)
  or die(header("Location: ../views/error.php"));

  mysqli_close($connection);

  $cardsGrid = $queryForDashboardGrid->fetch_all(MYSQLI_ASSOC);
  echo json_encode($cardsGrid);
  header("Content-type: application/json");
?>
