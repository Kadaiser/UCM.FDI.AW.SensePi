<?php
  $connection = mysqli_connect('127.0.0.1','pisense','Firlollito21.12','pisense')
  or die(header("Location: ../views/error.php"));
  mysqli_set_charset( $connection, 'utf8');
?>
