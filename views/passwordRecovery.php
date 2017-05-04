<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Password Recovery</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/passwordrecovery.js"></script>
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

          <form>
            <div class="group">
              <input type="text"
                    id="userRecoverEmail" class="field"
                    required>
              <span class="highlight"></span><span class="bar"></span>
              <label id="emailLabel"></label>
            </div>

           <div class="group">
              <button type="button"
                      class="button buttonGrey"
                      onclick="userRecoverEmail()"
                      id="mainButton">
                <span class="ripples ripplesCircle"></span>
              </button>
            </div>

            <div class="group">
              <p id="resultMessage"></p>
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
