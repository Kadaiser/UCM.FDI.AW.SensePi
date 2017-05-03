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
		<script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

    <canvas id='canvasBorderArea'></canvas>

    <!-- FOG SPAN-->
    <div class="fog" id="Fog" onclick='mySpanHide();'>
    </div>
  	<!-- WRAPPER CLASS -->
  	<div id="wrapper">

      <!-- HEADER CLASS & SIDEBAR CLASS -->
      <?php
      include '../php/navbar.php';
      include '../php/sideBarButtonFloor.php';
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
          include '../php/span.php';
          include '../php/mapContainer.php';
          include '../php/galleryBlock.php';
         ?>

      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../php/footer.php';
       ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
