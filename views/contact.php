<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Contact</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/contact.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

    <!-- WRAPPER CLASS -->
    <div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
      include '../php/navbar.php';
       ?>
      <!-- SIDEBAR CLASS -->
      <div class="sidebarLeft">
      </div>
      <!-- SIDEBAR CLASS -->
      <div class="sidebarRight">
      </div>

      <!-- CONTENT CLASS -->
      <div id="content">

        <form class="contactForm" action="mailto:dvalbuen@ucm.es" method="post">

          <div class="group">
            <fieldset>
             <legend>Personal information:</legend>
              <label id="nickLabel"></label>
              <input type="text" name="textNameContact" id="nameContac" class="field" required autofocus>
              <span class="highlight"></span><span class="bar"></span>

              <label id="emailLabel"></label>
              <input type="text" name="textEmailContact" id="emailContact" class="field" required>
              <span class="highlight"></span><span class="bar"></span>
            </fieldset>
          </div>

          <div class="groupType">
            <fieldset>
              <legend>Type of contact:</legend>
              <input type="radio" name="radioClass" class="field" value="male" checked><span id="evaluation"></span>
              <input type="radio" name="radioClass" class="field" value="male"><span id="suggest"></span>
              <input type="radio" name="radioClass" class="field" value="male"><span id="review"></span>
            </fieldset>
          </div>

          <div class="groupText">
            <textarea id="emailText" name="textEmailText" maxlength="300" rows="10" cols="30" placeholder="We want to read your opinion!"></textarea>
          </div>

          <div class="groupConform">
            <input type="checkbox" name="conform" value="conformity" required=""/><span id="accordance" ></span><br>
          </div>

          <div class="group">
            <input type="submit" value="Submit">
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
