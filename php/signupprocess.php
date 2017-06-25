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

      $userNick = (preg_split('/@/', $userEmail))[0];

      $sqlNewUser = "
                    INSERT INTO users (`email`, `pw`, `nick`, `isadmin`, `sinceDate`, `avatar`, `id`)
                    VALUES ('$userEmail', '$password_hash', '$userNick', 0, CURRENT_TIMESTAMP, NULL, NULL);
                  ";

      $queryForNewUser = mysqli_query($connection,$sqlNewUser)
      or die(header("Location: ../views/error.php"));

      $sqlNewDashBoard = "
                          INSERT INTO `dashboardprofiles` (`userEmail`, `cell`, `cardIdentity`)
                          VALUES ('$userEmail', '11', 'G_FAVORITE'),
                                 ('$userEmail', '12', 'G_FAVORITE'),
                                 ('$userEmail', '13', 'G_FAVORITE'),
                                 ('$userEmail', '21', 'G_ROOMS'),
                                 ('$userEmail', '22', 'G_TOP');
                         ";

      $queryForNewDashboard = mysqli_query($connection,$sqlNewDashBoard)
      or die(header("Location: ../views/error.php"));

      mysqli_close($connection);
      header("Location: ../views/signupsuccess.php");
    }
  }
?>
