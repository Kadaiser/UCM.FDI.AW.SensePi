<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Signup</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/signup.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

    <?php

      include '../php/signupprocess.php';

      $tempEmailErr = $tempPWErr = $tempPWConfirmErr = "";
      $tempEmail = $tempPW = $tempPWConfirm = "";
      $formReady = TRUE;

      if($_SERVER["REQUEST_METHOD"] == "POST") {

        $tempEmail = test_input($_POST['userEmail']);
        $tempPW = test_input($_POST['userPassword']);
        $tempPWConfirm = test_input($_POST['userConfirmPassword']);
        
        if (!preg_match("/
        ^[a-z0-9](\.?[a-z0-9_-]){0,}@([a-z]{3}\.)?ucm\.es$
        /",$tempEmail)) {
          $tempEmailErr = "Introduce tu cuenta institucional";
          $formReady = FALSE;
        }else{
          $tempEmailErr = "";
        }

        if (!preg_match("/
        [a-zA-Z ]*$
        /",$tempPW)) {
          $tempPWErr = "Tu contraseña debe cumplir los siguientes requisitos:</br>
          Entre x y z carácteres</br>
          De los cuáles al menos dos números</br>
          Y al menos un símbolo de entre los siguientes: []
          Sin ninguno de los siguientes: []</br></br>";
          $formReady = FALSE;
        }else{
          $tempPWErr = "";
        }

        if ($tempPW != $tempPWConfirm) {
          $tempPWConfirmErr = "Confirma correctamente tu password";
          $formReady = FALSE;
        }else{
          $tempPWConfirmErr = "";
        }

        $userEmail = $tempEmail;
        $userPassword = $tempPW;

        signUpProcess();
      }

      function test_input($input) {
        $data=htmlspecialchars(stripslashes(trim(strip_tags($input))));
        return $data;
      }
    ?>

  	<!-- WRAPPER CLASS -->
  	<div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
      include '../php/navbar.php';
       ?>

  		<!-- CONTENT CLASS -->
  		<div id="content">

        <form class="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="group">
            <input type="text"
                  name="userEmail" id="userEmail" class="field"
                  required autofocus>
            <span class="highlight"></span><span class="bar"></span>
            <label id="emailLabel">Enter your email:</label>
            <span class="error"><?php echo $tempEmailErr;?></span>
          </div>

          <div class="group">
            <input type="password"
                  name="userPassword" id="userPassword" class="field"
                  required>
            <span class="highlight"></span><span class="bar"></span>
            <label id="passwordLabel">Enter a new password:</label>
            <span class="error"><?php echo $tempPWErr;?></span>
          </div>

          <div id="confirmPasswordDiv" class="group">
            <input type="password"
                  name="userConfirmPassword" id="userConfirmPassword" class="field"
                  required>
            <span class="highlight"></span><span class="bar"></span>
            <label id="confirmPasswordLabel">Confirm password:</label>
            <span class="error"><?php echo $tempPWConfirmErr;?></span>
          </div>

          <div class="group">
            <input type="submit"
                    class="button buttonGrey"
                    id="mainButton"
                    value="Sign up">
              <span class="ripples ripplesCircle"></span>
            </input>
          </div>

          <div class="group">
            <p id="resultMessage"></p>
          </div>

          <div class="group">
            <p id="accountMessage">Already have an account?</p>
          </div>

          <div class="group">
            <button type="button"
                    class="button backgroundButton buttonOrange "
                    onclick="switchForms()"
                    id="alternativeButton">
                    Log in
              <span class="ripples ripplesCircle"></span>
            </button>
          </div>

          <div class="group">
            <p id="warningMessage"><a id="passwordRecover" href="./passwordrecovery.php" target="_blank">Recover your password here.</a></p>
          </div>
        </form>

      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../php/footer.php';
       ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
