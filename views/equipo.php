<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css" />
    <link rel="stylesheet" type="text/css" href="../css/equipo.css"/>
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/equipo.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
    <title id="webTitle"></title>
	<?php $recibe_pagina=$_GET['pagina']; ?>
  </head>

  <body>

    <div class="">
      <h1 id="webHeader"></h1>
    </div>
    <div class="">
      <h2 id="arduinoRasPiHeader"></h2>
    </div>
    <div id="MenuBar">
      <ul>
        <li>
          <a id="navHome" href="../index.html"></a>
        </li>
        <li>
          <a id="navTeam" href="#"></a>
        </li>
        <li>
          <a id="navDetails" href="../views/details.html"></a>
        </li>
        <li>
          <a id="navLog" href="../views/bitacora.html"></a>
        </li>
        <li>
          <a id="navContact" href="../views/contacto.html"></a>
        </li>
        <li>
          <a id="navLogIn" href="../views/login.html"></a>
        </li>
      </ul>
    </div>

    
<td > <div ><a href="equipo.php?pagina=link1">Diego</a></div></td>
<td ><div ><a href="equipo.php?pagina=link2" >Azahara</a></div></td>
<td ><div ><a href="equipo.php?pagina=link3" >Sergio</a></div></td>
<td ><div ><a href="equipo.php?pagina=link4" >Javier</a></div></td>
<td ><div ><a href="equipo.php?pagina=link5" >Enrique Julio</a></div></td>
<div id="informacion"><?php  switch ($recibe_pagina){ 
 case "link1":
   include ("diego.html"); 
break;
case "link2":
  include ("azahara.html"); 
break; 
case "link3":
  include ("sergio.html"); 
break; 
case "link4":
  include ("javier.html"); 
break; 
case "link5":
  include ("julio.html"); 
break; 
default:
include ("defecto.html");
}
 ?></div>
  </body>
  

  <footer>
    <a href="https://www.mundocero.tech/" target="_self"><img src="../images/icons/zero.png"></a>
    <p><a id="footerLink" href="https://www.mundocero.tech/views/bitacora.html"></a><a id="footerSentence" href="https://informatica.ucm.es/" target="_blank"></a></p>
  </footer>

</html>