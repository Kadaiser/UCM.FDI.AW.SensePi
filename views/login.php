<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Login</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

    <?php

      include '../php/loginprocess.php';

      $tempEmailErr = $tempPWErr = "";
      $tempEmail = $tempPW = "";
      $formReady = TRUE;

      if($_SERVER["REQUEST_METHOD"] == "POST") {

        $tempEmail = test_input($_POST['userEmail']);
        $tempPW = test_input($_POST['userPassword']);

        if (!preg_match("/^[a-z0-9](\.?[a-z0-9_-]){0,}@([a-z]{3}\.)?ucm\.es$/",$tempEmail)) {
          $tempEmailErr = "Introduce tu cuenta institucional";
          $formReady = FALSE;
        }else{
          $tempEmailErr = "";
        }

        $userEmail = $tempEmail;
        $userPassword = $tempPW;

        if($formReady){
          loginProcess($userEmail,$userPassword);
        }
      }

      function test_input($input) {
        $data=htmlspecialchars(stripslashes(trim(strip_tags($input))));
        return $data;
      }
    ?>

  <body>

  	<!-- WRAPPER CLASS -->
  	<div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
        include '../views/viewModule/navbar.php';
      ?>

  		<!-- CONTENT CLASS -->
  		<div id="content">

        <form class="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="group">
            <input type="text"
                  name="userEmail" id="userEmail" class="field"
                  required autofocus>
            <span class="highlight"></span><span class="bar"></span>
            <label id="emailLabel">Email</label>
            <span class="error"><?php echo $tempEmailErr;?></span>
          </div>

          <div class="group">
            <input type="password"
                  name="userPassword" id="userPassword" class="field"
                  required>
            <span class="highlight"></span><span class="bar"></span>
            <label id="passwordLabel">Password</label>
          </div>

          <?php
            if(isset($_GET['event']) && $_GET['event']=='fail'){
          ?>

          <div class="group">
            <p>Wrong username email and/or password.</p>
            <p>Try again.</p>
          </div>

          <?php
            };
          ?>

          <div class="group">
            <input type="submit"
                    class="button buttonGrey field"
                    id="mainButton"
                    value="Log in">
              <span class="ripples ripplesCircle"></span>
          </div>

          <div class="group">
            <p id="resultMessage"></p>
          </div>

          <div class="group">
            <p id="accountMessage">No account yet?</p>
          </div>

          <div class="group">
            <button type="button"
                    class="button backgroundButton buttonOrange field"
                    onclick="switchForms()"
                    id="alternativeButton">
                    Sign up
              <span class="ripples ripplesCircle"></span>
            </button>
          </div>

          <div class="group field">
            <p id="warningMessage"><a id="passwordRecover" href="./passwordRecovery.php" target="_blank">Recover your password here.</a></p>
          </div>
        </form>

      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../views/viewModule/footer.php';
      ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
