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
            <div class="photo" onclick="loadText('0')">
								<img id="sergio">
	          </div>
					</li>
					<li>
            <div class="photo" onclick="loadText('1')">
								<img id="diego">
	          </div>
					</li>
          <li>
            <div class="photo" onclick="loadText('2')">
								<img id="azahara">
	          </div>
					</li>
          <li>
            <div class="photo" onclick="loadText('3')">
								<img id="julio">
	          </div>
					</li>
          <li>
            <div class="photo" onclick="loadText('4')">
								<img id="javier">
	          </div>
					</li>
				</ul>
			</div>

			<div  class="descripcionPersonal">
			    <div id="info">
			      <h1>Nuestro equipo humano de desarrollo en PiSense</h1>
			        <p>Gente innovadora y con recursos. Miden las cosas en 'C0' [Coolitos], y para
			          esta página esperan alcanzar los 14 C0/vista. Para ello han investigado
			          tecnologías y técnicas mas allá de la docencia de la facultad, consiguiendo
			          este Site con una combinación nueva e interesante, todo a mano y con mucho
			          mimo, como no podía ser menos!!</p>
				</div>
			      <ul class="contactIcons">
					<li>
						<a id="github" href="https://github.com/" target="_blank">
							<img src="../images/icons/git_icon.png" alt="GitHub">
						</a>
					</li>
					<li>
						<a id="facebook" href="https://www.facebook.com/" target="_blank">
							<img src="../images/icons/fb_icon.png" alt="Facebook">
						</a>
					</li>
				</ul>
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
