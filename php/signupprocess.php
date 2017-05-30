<?php
  function signUpProcess($userEmail,$userPassword)
  {

    include '../php/DBconnection.php';

    $sqlSelect = "SELECT email
                  FROM users
                  WHERE email='".$userEmail."'
                  ";

    $query = mysqli_query($connection,$sqlSelect)
    or die(header("Location: ../views/error.php"));

    if(mysqli_num_rows($query)!=0)
    {
      mysqli_close($connection);
      header("Location: ../views/signup.php?event=fail");
    }
    else
    {
      $options = array(
                        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                        'cost' => 12,
                      );
      $password_hash = password_hash($userPassword, PASSWORD_BCRYPT, $options);

      $sqlInsert = "
                    INSERT INTO users (`email`, `pw`, `nick`, `isadmin`, `sinceDate`, `avatar`, `id`)
                    VALUES ('$userEmail', '$password_hash', '$userEmail', 0, CURRENT_TIMESTAMP, NULL, NULL);
                  ";
      $insertQuery = mysqli_query($connection,$sqlInsert)
      or die(header("Location: ../views/error.php"));

      mysqli_close($connection);
      header("Location: ../views/signupsuccess.php");
    }
  }
?>
