<?php
    //apertura de conexión con BD
    $connection = mysqli_connect('127.0.0.1','root','','pisense')
    or die(header("Location: ../views/error.php"));
    mysqli_set_charset( $connection, 'utf8');
?>