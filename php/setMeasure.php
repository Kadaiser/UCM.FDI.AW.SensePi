<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Injector para vagos</title>
        <link rel="stylesheet" type="text/css" href="../css/basic.css">
        <link rel="stylesheet" type="text/css" href="../css/contact.css"/>
  </head>

  <body>

    <?php
      $DBconnection = mysqli_connect('127.0.0.1','root','','pisense');
      $sqlroom = 'SELECT id,name FROM rooms';
      $queryRoom = mysqli_query($DBconnection,$sqlroom);
      $sqlmeasureTrack  = 'SELECT roomslotid, measuretrack FROM measurelogs';
      $queryMeasureTrack = mysqli_query($DBconnection,$sqlmeasureTrack);

      $optionRoom='';
      while ($row = $queryRoom->fetch_array()) {
        $optionRoom.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
      }

      $option='';
      while ($row = $queryMeasureTrack->fetch_array()) {
        $option.='<option value="'.$row['roomslotid'].'">'.$row['measuretrack'].'</option>';
      }

      $tempErr = $humErr = $noiseErr = "";
      $temp = $hum = $noise = $result = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['temp'])) {
          $tempErr="No se ha asignado valores de temperatura";
        }
        $temp = test_input($_POST['temp']);

        if (empty($_POST['hum'])) {
          $humErr = "No se ha asignado valores de humedad";
        }
        $hum = test_input($_POST['hum']);

        if (empty($_POST['noise'])) {
          $noiseErr = "No se ha asignado valores de ruido";
        }
        $noise = test_input($_POST['noise']);

        /*debug*/
        $result  = "Se ha procesado el registro con valores Temp:".$temp." Hum:".$hum." Noise:".$noise.
                    " en la sala:".$_POST['Room']." para el track:".$_POST['MeasureTrack'];
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <form class="injector" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <label for="Room">Room</label>
      <select class="mesureTrackSelect" name="Room">
        <?php echo $optionRoom;?>
      </select><br>

      <label for="MeasureTrack">Measure Track</label>
      <select class="mesureTrackSelect" name="MeasureTrack">
        <?php echo $option;?>
      </select><br>

      <label for="temp">Temperatura Cº </label>
      <input type="number" name="temp" min="-50" max="80">
      <span class="error"><?php echo $tempErr;?></span><br>

      <label for="hum">Humedad % </label>
      <input type="number" name="hum" min="0" max="100">
      <span class="error"><?php echo $humErr;?></span><br>

      <label for="noise">Noise dB </label>
      <input type="number" name="noise" min="0" max="100">
      <span class="error"><?php echo $noiseErr;?></span><br>

      <input type="submit" value="Process">
      <span class="error"><?php echo $result;?></span><br>

    </form>
  </body>
</html>
