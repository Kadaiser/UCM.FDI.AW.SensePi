<?php

include '../php/DBconnection.php';

$userEmail = $_POST['email'];

$sqlDashboardGrid = "SELECT cell,cardId
                        FROM dashboardprofile
                        WHERE userEmail = '".$userEmail."'
                        ";

$queryForDashboardGrid = mysqli_query($connection,$sqlDashboardGrid)
or die(header("Location: ../views/error.php"));

mysqli_close($connection);

$cardsGrid = $queryForDashboardGrid->fetch_all(MYSQLI_ASSOC);

var_dump(cardsGrid);

echo json_encode($cardsGrid);
header("Content-type: application/json");

?>
