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

  	<!-- WRAPPER CLASS -->
  	<div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
      include '../php/navbar.php';
       ?>

  		<!-- CONTENT CLASS -->
  		<div id="content">

        <form class="loginForm" action="../php/signUpProcess.php" method="post">
          <div class="group">
            <input type="text"
                  name="userEmail" id="userEmail" class="field"
                  required autofocus>
            <span class="highlight"></span><span class="bar"></span>
            <label id="emailLabel">Enter your email:</label>
          </div>

          <div class="group">
            <input type="password"
                  name="userPassword" id="userPassword" class="field"
                  required>
            <span class="highlight"></span><span class="bar"></span>
            <label id="passwordLabel">Enter a new password:</label>
          </div>

          <div id="confirmPasswordDiv" class="group" style="display: none">
            <input type="password"
                  name="userConfirmPassword" id="userConfirmPassword" class="field"
                  required>
            <span class="highlight"></span><span class="bar"></span>
            <label id="confirmPasswordLabel">Confirm password:</label>
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
