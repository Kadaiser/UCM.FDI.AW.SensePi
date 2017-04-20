<?php
  session_start();
  $nicks = array();

  //apertura de conexión con BD
  $DBconnection = mysqli_connect('127.0.0.1','root','','pruebaaw');
  //string de request
  $sqlString = "
                SELECT nick
                FROM usuarios
                WHERE email='".$_POST['userEmail']."'
                AND password='".$_POST['userPassword']."'
                ";

  //lanzar request a la BD
  $query = mysqli_query($DBconnection,$sqlString);

  //cierre de conexión con BD
  mysqli_close($DBconnection);

  //tratamiento de la query recibida
  //$result = mysqli_fetch_array($query);
  if(mysqli_num_rows($query)!=0){
    $user=mysqli_fetch_object($query);
      $_SESSION['login']=true;
      $_SESSION['isAdmin']=false;
      $_SESSION['nick']=$user->nick;
      $_SESSION['userEmail']=$_POST['userEmail'];
      $_SESSION['userAvatar']=1;

      header("Location: ../views/userview.php");
  }else{
      echo "<p> tempnick </p> ";
  }


?>