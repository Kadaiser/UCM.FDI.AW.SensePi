<?php
  session_start();

  function loginProcess($userEmail,$userPassword) {

    include '../php/DBconnection.php';

    if($DBconnection) {
      //string de request
      $sqlString = "SELECT nick, isadmin, avatar,pw
                    FROM users
                    WHERE email='".$userEmail."'
                    ";

      //lanzar request a la BD
      $query = mysqli_query($DBconnection,$sqlString);
      if($query){
        //cierre de conexión con BD
        mysqli_close($DBconnection);

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

      }else{
        mysqli_close($DBconnection);
        header("Location: ../views/error.php");
      }
    }else{
      mysqli_close($DBconnection);
      header("Location: ../views/error.php");
    }

  }

?>
