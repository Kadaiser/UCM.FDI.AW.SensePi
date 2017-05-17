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

            ajax.post('../php/getSlotsIdAndTracks.php',{roomId: IdRoom},fullfillOptions,true);
            //retorna [{"roomslotid":"1","measuretrack":"1234567890abcdef"},{"roomslotid":"2","measuretrack":"abcdef1234567890"}] para idRoom = 1;
          }

          function fullfillOptions(rawMeasuresTrack){
            var dropDown = document.getElementById('trackDropDown');
            while (dropDown.options.length > 0) {
              dropDown.remove(0);
            }
            var obj = JSON.parse(rawMeasuresTrack);
            for(var i = 0; i< obj.length; i++){
              //falta sacar la informacion del objeto y rellenar la creacion del option (text, value)
              dropDown.options[i]= new Option(obj[i]['roomslotid'],obj[i]['measuretrack']);
            }
          }

          function fullfillOptions2(rawMeasuresTrack){
            var dropDown = document.getElementById('RoomDropdown');
            var obj = JSON.parse(rawMeasuresTrack);
            for(var i = 0; i< obj.length; i++){
              dropDown.options[i]= new Option(obj[i]['id'],obj[i]['name']);
            }
          }

          function showImput(){
            //document.getElementById("measureSetDiv").style.visibility = "visible";
          }
        </script>


  </head>

  <body onload="ajax.post('../php/getRooms.php',null,fullfillOptions2,true);">

    <?php

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
        $result  = "Se ha procesado el registro con valores Temp: ".$temp." Hum: ".$hum." Noise: ".$noise.
                    " en la sala: ".$_POST['Room']." para el track: ".$_POST['MeasureTrack']; //con fecha ".$_POST['datetime'];
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>


    <form class="injector" method="post" action="../php/setMeasureOnStation.php">

      <div class="group">
        <h1 id="test"></h1>
        <label>Room</label>
        <select onchange="populateMeasure(this.value)" class="mesureTrackSelect" name="Room" id="RoomDropdown">
          <option disabled selected value>-- select an option --</option>
        </select>
      </div>

      <div class="group">
        <label>Slot ID</label>
        <select onchange="showImput()" class="mesureTrackSelect" name="MeasureTrack" id="trackDropDown">
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
