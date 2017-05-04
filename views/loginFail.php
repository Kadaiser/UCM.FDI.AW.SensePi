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

  <body>

  	<!-- WRAPPER CLASS -->
  	<div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
      include '../php/navbar.php';
       ?>

  		<!-- CONTENT CLASS -->
  		<div id="content">

        <form class="loginForm" action="../php/loginProcess.php" method="post">
          <div class="group">
            <input type="text"
                  name="userEmail" id="userEmail" class="field"
                  required autofocus>
            <span class="highlight"></span><span class="bar"></span>
            <label id="emailLabel">Email</label>
          </div>

          <div class="group">
            <input type="password"
                  name="userPassword" id="userPassword" class="field"
                  required>
            <span class="highlight"></span><span class="bar"></span>
            <label id="passwordLabel">Password</label>
          </div>

          <div class="group">
            <p>Wrong username email and/or password.</p>
            <p>Try again.</p>
          </div>

          <div class="group">
            <input type="submit"
                    class="button buttonGrey"
                    id="mainButton"
                    value="Log in">
              <span class="ripples ripplesCircle"></span>
            </input>
          </div>

          <div class="group">
            <p id="accountMessage">No account yet?</p>
          </div>

          <div class="group">
            <button type="button"
                    class="button backgroundButton buttonOrange "
                    onclick="switchForms()"
                    id="alternativeButton">
                    Sign up
              <span class="ripples ripplesCircle"></span>
            </button>
          </div>

          <div class="group">
            <p id="warningMessage"><a id="passwordRecover" href="./passwordRecovery.html">Recover your password here.</a></p>
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
