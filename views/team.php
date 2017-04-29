<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Team</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png" />
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/team.css">
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/team.js"></script>
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

			<div id="barraImagenes">
				<ul>
          <li>
            <div class="photo" onclick="loadText('2')">
								<img id="sergio">
	          </div>
					</li>
					<li>
            <div class="photo" onclick="loadText('1')">
								<img id="diego">
	          </div>
					</li>
          <li>
            <div class="photo" onclick="loadText('0')">
								<img id="azahara">
	          </div>
					</li>
          <li>
            <div class="photo" onclick="loadText('3')">
								<img id="julio">
	          </div>
					</li>
          <li>
            <div class="photo" onclick="loadText('Javier')">
								<img id="javier">
	          </div>
					</li>
				</ul>
			</div>


      <div id="info" class="descripcionPersonal">
      </div>

		</div>


      <!-- FOOTER CLASS -->
      <?php
        include '../php/footer.php';
       ?>

	<!-- END WRAPPER CLASS -->
	</div>

	</body>
</html>
