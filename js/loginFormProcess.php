<?php
  session_start();

  //apertura de conexión con BD
  $DBconnection = mysqli_connect('127.0.0.1','root','','pruebaaw');
  //string de request
  $sqlString = "SELECT EXISTS (
                            SELECT nick
                            FROM usuarios 
                            #WHERE email='".$_SESSION['userEmail']."'
                            #AND password='".$_SESSION['userPassword']."'
                            #WHERE email='jefelol@ucm.es'
                            #AND password='jefelol'
                )";

  //lanzar request a la BD
  $query = mysqli_query($DBconnection,$sqlString);

  //ciere de conexión con BD
  mysqli_close($DBconnection);

  //tratamiento de la query recibida
  //$result = mysqli_fetch_array($query);
  while ($user=mysqli_fetch_object($query)){
      $nicks[]=$user->nick;
    };

  foreach($nicks as $wtf => $tempnick){
    echo "<p> $tempnick </p> ";
  }
?>