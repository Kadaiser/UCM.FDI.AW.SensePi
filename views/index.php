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
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/canvas.js"></script>
    <script type="text/javascript" src="../js/home.js"></script>
    <script type="text/javascript" src="../js/ajaxbasic.js"></script>
		<script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

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
