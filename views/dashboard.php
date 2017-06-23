<?php session_start();

  if(!isset($_SESSION['login'])){
    header("Location: ../error.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Administration</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css"/>
    <link rel="stylesheet" type="text/css" href="../css/card.css"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../js/dashboard.js"></script>
    <script type="text/javascript" src="../js/ajaxbasic.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>

  </head>

  <body>
    <!-- WRAPPER CLASS -->
  	<div id="wrapper">

	    <!-- HEADER CLASS -->
	    <?php
        include '../views/viewModule/navbar.php';
	    ?>

      <div id="content">

        <div class="grid">
          <div class="cell emptyCell" id="11"></div>
          <div class="cell emptyCell" id="12"></div>
          <div class="cell emptyCell" id="13"></div>
          <div class="cell emptyCell" id="21"></div>
          <div class="cell emptyCell" id="22"></div>
          <div class="cell emptyCell" id="23"></div>
          <div class="cell emptyCell" id="31"></div>
          <div class="cell emptyCell" id="32"></div>
          <div class="cell emptyCell" id="33"></div>
        </div>

      </div>

			<!-- FOOTER CLASS -->
	  	<?php
	      include '../views/viewModule/footer.php';
	   	?>

		<!-- END WRAPPER CLASS -->
	  </div>

  </body>
</html>
