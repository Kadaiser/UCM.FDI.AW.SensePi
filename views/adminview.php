<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">Administration</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css" />
    <link rel="stylesheet" type="text/css" href="../css/adminView.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/adminView.js"></script>
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



<div id="content">
	<div id="search">
		<div id="peticion">
		<fieldset>
			<legend>SEARCH</legend>
			<p>
			   <select class="myStyle" name="numero">
				 <option>- N? SensePi -</option>
				  <option value="1">#1</option>
				 <option value="2">#2</option>
				 <option value="3">#3</option>
			   </select>
			</p>
			<p>
			   <select class="myStyle" name="nombre">
				 <option>- Location -</option>
				 <option value="cafeteria">CAFETERIA</option>
				 <option value="biblioteca">BIBLIOTECA</option>
				 <option value="hall">HALL</option>
			   </select>
			</p>
			<p>
			<input  onclick="getInfoClick()" type="submit" value="Search" />
			</p>
			</fieldset>
		</div>
		<div id="getInfo" style="display: none">
			<p>LOCATION: CAFETERIA</p>
			<p>SINCE: 21/03/2017</p>
			<p>MOVED BY: AZAHARA</p>
			<p>REGS X DAY: 2.5</p>
		</div>
	</div>
	<div id="register">
		<div id="nameRegister">
			<p>Register New SensePi</p>
			<p> Register By:	</p>
			<p> Location: </p>
			<p> Expected regs: </p>
			<p> Technical: </p>

		</div>
		<div id="getRegister">
			<pre> </pre>
			<p><input class="myStyle" type="text" name="nombreadmin"></p>
			<p><input class="myStyle" type="text" name="location"></p>
			<p><input class="myStyle" type="text" name="register"></p>
			<p><input class="myStyle" type="text" name="technical"></p>
		</div>
		<div id="submitRegister">
			<div id="processRegister">
				<input  onclick="registerClick()" type="submit" value="PROCESS" />
			</div>
			<div id="registerOk" style="display: none">
				<p>The SensePi has been registered</p>
			</div>
	  </div>

	</div>
	<div id="remove">
		<div id="nameRemove">
			<p>Remove SensePi</p>
			<p> Location: </p>
			<p> Number SensePi: </p>

		</div>
		<div id="getRemove">
			<pre> </pre>
			<p>
				<select class="myStyle" name="nombre">
				 <option value="cafeteria">CAFETERIA</option>
				 <option value="biblioteca">BIBLIOTECA</option>
				 <option value="hall">HALL</option>
			   </select>
			</p>
			<p>
			   <select class="myStyle" name="numero">
				 <option value="1">#1</option>
				 <option value="2">#2</option>
				 <option value="3">#3</option>
			   </select>
			</p>
		</div>
		<div id="submitRemove">
			<div id="processRemove">
				<input  onclick="removeClick()" type="submit" value="PROCESS" />
			</div>
			<div id="removeOk" style="display: none">
				<p>The SensePi has been removed</p>
>>>>>>> feature/adminView
			</div>
		</div>

	</div>
	<div id="actualizacion">
		<table class="tg">
		  <tr>
			<th class="t1">DASHBOARD</th>
			<th class="t1">LOCATION</th>
			<th class="t1">LAST UPDATE</th>
		  </tr>
		  <tr>
			<td class="t2">#1</td>
			<td class="t3">CAFETERIA</td>
			<td class="t4">18/03/2017 14:30</td>
		  </tr>
		  <tr>
			<td class="t2">#2</td>
			<td class="t3">AULA 8</td>
			<td class="t4">20/03/2017 11:00</td>
		  </tr>
		  <tr>
			<td class="t2">#3</td>
			<td class="t3">BIBLIOTECA P1</td>
			<td class="t4">19/03/2017 17:20</td>
		  </tr>
		  <tr>
			<td class="t2">#4</td>
			<td class="t3">PASILLOS</td>
			<td class="t4">17/03/2007 12:50</td>
		  </tr>
		</table>

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
