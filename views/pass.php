<?php
/*
$pass = "dvalbuen123";
$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
$passh = crypt($pass, '$6$'.$salt);
echo  $passh;
*/


$password = "dvalbuen123";
$hashToStoreInDb = password_hash($password, PASSWORD_BCRYPT);
echo $hashToStoreInDb;
/*;
$isPasswordCorrect = password_verify($password, $existingHashFromDb);
*/
?>
