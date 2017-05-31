<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PiSense Portal</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/ajaxbasic.js"></script>
    <script type="text/javascript" src="../js/annoy.js"></script>
    <script type="text/javascript" src="../js/canvas.js"></script>
    <script type="text/javascript" src="../js/home.js"></script>
  </head>

  <body>
    <div id="firstVisit">
      <div class="tutorial" id="tutorial1">
        <h1>Welcome To PiSense Project</h1>
        <p>It seems it´s your first visit to our site... Nice! What you have here is a map of the fisrt floor of the FDI!! </p>
          <h2>Let me introduce you our features:</h2>
        <ul>
          <li>
          Click on the rooms to kwon the temperature and humidity, even a nice graph of the last week.
          </li>
          <li>
          Whenever you open a room, if you're register as user, you can add a room to your favorite list.
          </li>
          <li>
          The span appears when you click on a room, you can return to the map with the close button on the corner...
          </li>
          <li>
          Or clicking on that fog on the background.
          </li>
          <li>
          Feel free to explore our proyect section to know more about us.
          </li>
          <li>
          Oh Yeah! the contact secction is not working yet ok? But we have the intention!
          </li>
        </ul>
        <div id="next" onclick="toggleTutorial()" title="Show me more"></div>
      </div>

      <div class="tutorial" id="tutorial2">
        <h1>Your DashBoard... Your Way!</h1>
        <p>Whenever you log in our web, you will get redirect to your dashboard, a prety nice configurable set of 9 spaces, ready to be fullfiled with your personal needs </p>
          <h2>How to do it??</h2>
        <ul>
          <li>
          Click on a clear space, it will show you the list of cards
          </li>
          <li>
          Fullfill as many spaces you want with the cards.
          </li>
          <li>
          Confirm the config and save it. Settel, it will be memorize on the system the next time you come
          </li>
          <li>
          We really are waiting for you to yoin us!
          </li>
        </ul>
        <div id="last" onclick="toggleTutorial()" title="return"></div>
      </div>

      <div class="closeSpam" onclick="tutorialBox()" title="Close tutorial"></div>
    </div>

    <canvas id='canvasBorderArea'></canvas>

    <!-- FOG SPAN-->
    <div class="fog" id="Fog" onclick='mySpanHide()'>
    </div>

  	<!-- WRAPPER CLASS -->
  	<div id="wrapper">

      <!-- HEADER CLASS & SIDEBAR CLASS -->
      <?php
        include '../views/viewModule/navbar.php';
        include '../views/viewModule/sideBarButtonFloor.php';
       ?>

      <!-- CONTENT CLASS -->
      <div id="content">

        <div class="viewSelector">
         <label>Map</label>
          <label class="switch">
            <input type="checkbox" onclick="switchBetweenView()">
            <div class="slider round"></div>
          </label>
          <label>Gallery</label>
        </div>

        <?php
          include '../views/viewModule/span.php';
          include '../views/viewModule/mapContainer.php';
          include '../views/viewModule/galleryBlock.php';
         ?>

      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../views/viewModule/footer.php';
      ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
