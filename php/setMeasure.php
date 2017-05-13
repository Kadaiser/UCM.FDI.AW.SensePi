<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Injector para vagos</title>
        <link rel="stylesheet" type="text/css" href="../css/basic.css">
        <link rel="stylesheet" type="text/css" href="../css/contact.css"/>
        <script type="text/javascript" src="../js/ajaxbasic.js"></script>

        <script>
          function populateMeasure(id){
            var dropDown = document.getElementById("RoomDropdown");
            var IdRoom = dropDown.options[dropDown.selectedIndex].value;
            //document.getElementById("test").innerHTML = IdRoom;

            ajax.post('../php/getSlotsIdAndTracks.php',{roomId: IdRoom},fullfillOptions,true);
          }
  //
          function fullfillOptions(rawMeasuresTrack){
            var obj = JSON.parse(rawMeasuresTrack);

            var trackList = obj[1];
            trackList.each(function(d){
              trackList('#emptyDropdown').append('<option value="' + d.measuretrack + '">' + d.roomslotid + '</option>');
              },this);
          }
  //
          function showImput(){
              document.getElementById("measureSetDiv").style.visibility = "visible";
          }
        </script>


  </head>

  <body>

    <?php
      $DBconnection = mysqli_connect('127.0.0.1','root','','pisense');

      if($DBconnection) {
        $sqlroom = 'SELECT id,name FROM rooms';
        $queryRoom = mysqli_query($DBconnection,$sqlroom);

        $optionRoom='';
        while ($row = $queryRoom->fetch_array()) {
          $optionRoom.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }

        mysqli_close($DBconnection);
      }else{
        mysqli_close($DBconnection);
        echo 'GRAN CAGADA '.mysqli_error();
      }

      $tempErr = $humErr = $noiseErr = $dateError = "";
      $temp = $hum = $noise = $result = $date = "";

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


        //$date = test_input($_POST['datetime']);

        /*debug*/
        $result  = "Se ha procesado el registro con valores Temp:".$temp." Hum:".$hum." Noise:".$noise.
                    " en la sala:".$_POST['Room']." para el track:".$_POST['MeasureTrack']; //con fecha ".$_POST['datetime'];
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <form class="injector" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <div class="group">
        <h1 id="test"></h1>
        <label>Room</label>
        <select onchange="populateMeasure(this.value)" class="mesureTrackSelect" name="Room" id="RoomDropdown">
          <?php echo $optionRoom;?>
        </select>
      </div>

      <div class="group">
        <label>Measure Track</label>
        <select onchange="showImput()" class="mesureTrackSelect" name="MeasureTrack" id="emptyDropdown">
        </select>
      </div>
      <br>

      <div id="measureSetDiv">

        <span class="error"><?php echo $tempErr;?></span>
        <div class="group">
          <input type="number" name="temp" min="-50" max="80">
          <span class="highlight"></span><span class="bar"></span>
          <label>Temperatura (Cº)</label>
        </div>

        <span class="error"><?php echo $humErr;?></span>
        <div class="group">
          <input type="number" name="hum" min="0" max="100">
          <span class="highlight"></span><span class="bar"></span>
          <label>Humedad (%)</label>
        </div>

        <span class="error"><?php echo $noiseErr;?></span>
        <div class="group">
          <input type="number" name="noise" min="0" max="100">
          <span class="highlight"></span><span class="bar"></span>
          <label>Ruido (dB)</label>
        </div>

        <div class="group">
          <input type="submit" value="Process">
          <span class="error"><?php echo $result;?></span>
        </div>

      </div>

    </form>
  </body>
</html>
