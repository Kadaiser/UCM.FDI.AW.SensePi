<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Injector para vagos</title>
  </head>

  <?php
  $tempErr = $humErr = $noiseErr = "";
  $temp = $hum = $noise = "";
  $measureTracks  = 'SELECT measuretrack FROM measurelogs';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['temp'])) {
      $tempErr="No se ha asignado valores de temperatura";
      $temp = test_input($_POST["temp"]);

    if (empty($_POST['hum'])) {
      $humErr = "No se ha asignado valores de humedad";
    }

    if (empty($_POST['noise'])) {
      $noiseErr = "No se ha asignado valores de ruido";
    }
      $noise = test_input($_POST["noise"]);
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <body>
    <form class="injector" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

      <select class="mesureTrackSelect" name="Measure Track">
        <option value=""></option>
      </select>

      <label for="temp">Temperatura Cº </label>
      <input type="number" name="temp" min="-50" max="80">

      <label for="hum">Humedad % </label>
      <input type="number" name="hum" min="0" max="100">

      <label for="noise">Noise dB </label>
      <input type="number" name="noise" min="0" max="100">

      <input type="submit" name="" value="Process">

    </form>
    <?php

     ?>

  </body>
</html>
