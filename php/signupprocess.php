<?php
  $nicks = array();

  $userEmail=htmlspecialchars(trim(strip_tags($_POST['userEmail'])));
  $userPassword = htmlspecialchars(trim(strip_tags($_POST['userPassword'])));

  if(filter_var($userEmail, FILTER_VALIDATE_EMAIL) !== false){

  }else{

  }

  //apertura de conexión con BD
  $DBconnection = mysqli_connect('127.0.0.1','root','','pruebaaw');
  //string de request
  $sqlSelect = "
                SELECT EXISTS
                FROM usuarios
                WHERE email='".$userEmail."'
                ";

  //lanzar request a la BD
  $query = mysqli_query($DBconnection,$sqlSelect);

  //cierre de conexión con BD
  mysqli_close($DBconnection);

  //tratamiento de la query recibida
  if(mysqli_num_rows($query)!=0){
    header("Location: ../views/signupfail.php");
  }else{
    //registro del usuario
    $sqlInsert = "
                  INSERT INTO usuarios (email, password)
                  VALUES ($userEmail, $userPassword);
                 ";
    header("Location: ../views/signupsuccess.php");
  }


?>