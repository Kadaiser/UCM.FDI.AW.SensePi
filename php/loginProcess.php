<?php
  session_start();

  function loginProcess($userEmail,$userPassword) {

    include '../php/DBconnection.php';

    //string de request
    $sqlString = "SELECT nick, isadmin, avatar,pw
                  FROM users
                  WHERE email='".$userEmail."'
                  ";

    //lanzar request a la BD
    $query = mysqli_query($connection,$sqlString)
    or die(header("Location: ../views/error.php"));

    //cierre de conexión con BD
    mysqli_close($connection);

    $user=mysqli_fetch_object($query);

    if (password_verify($userPassword,$user->pw)) {
      if(mysqli_num_rows($query)!==0){
        $_SESSION['login']=true;
        $_SESSION['isAdmin']=$user->isadmin;
        $_SESSION['nick']=$user->nick;
        $_SESSION['userEmail']=$userEmail;
        $_SESSION['userAvatar']=$user->avatar;
        unset($user);

        if($_SESSION['isAdmin']==1) {
          header("Location: ../views/adminView.php");
        }else{
          header("Location: ../views/userview.php");
        }
      }else{
        header("Location: ../views/login.php?event=fail");
      }
    }else{
      unset($user);
      header("Location: ../views/login.php?event=fail");
    }

  }

?>
