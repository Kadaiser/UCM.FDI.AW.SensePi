<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Injector para vagos</title>
        <link rel="stylesheet" type="text/css" href="../css/basic.css">
        <link rel="stylesheet" type="text/css" href="../css/contact.css"/>

        <script>
        function populateMeasure(id){
          $('#mesureSelect').empty()
          var dropDown = document.getElementById("carId");
          var roomId = dropDown.options[dropDown.selectedIndex].value;
          $.ajax({
            type: "POST",
            url: "../php/getMeasureTracks.php",
            data: { 'roomId': roomId  },
            success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) {
                    // You will need to alter the below to get the right values from your json object.
                    $('#emptyDropdown').append('<option value="' + d.measuretrack + '">' + d.roomslotid + '</option>');
                });
            }
          });
        }
        </script>
  </head>

  <body>

    <?php
      $DBconnection = mysqli_connect('127.0.0.1','root','','pisense');
      $sqlroom = 'SELECT id,name FROM rooms';
      $queryRoom = mysqli_query($DBconnection,$sqlroom);

      $optionRoom='';
      while ($row = $queryRoom->fetch_array()) {
        $optionRoom.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
      }

      /*
      $sqlmeasureTrack  = 'SELECT roomslotid, measuretrack FROM measurelogs';
      $queryMeasureTrack = mysqli_query($DBconnection,$sqlmeasureTrack);

      $option='';
      while ($row = $queryMeasureTrack->fetch_array()) {
        $option.='<option value="'.$row['roomslotid'].'">'.$row['measuretrack'].'</option>';
      }
      */

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

        if (empty($_POST['datetime'])) {
          $dateError = "No se ha asignado una fecha";
        }
        $date = test_input($_POST['datetime']);

        /*debug*/
        $result  = "Se ha procesado el registro con valores Temp:".$temp." Hum:".$hum." Noise:".$noise.
                    " en la sala:".$_POST['Room']." para el track:".$_POST['MeasureTrack']." con fecha ".$_POST['datetime'];
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
        <label>Room</label>
        <select onchange="populateMeasure(this.value)" class="mesureTrackSelect" name="Room">
          <?php echo $optionRoom;?>
        </select>
      </div>

      <div class="group">
        <label>Measure Track</label>
        <select onchange="showImput()" id="mesureSelect" class="mesureTrackSelect" name="MeasureTrack">
          <?php echo $option;?>
        </select>
      </div>
      <br>

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

      <span class="error"><?php echo $dateError;?></span>
      <div class="group">
        <input type="datetime-local" name="datetime" min="2017-05-01" required >
        <span class="highlight"></span><span class="bar"></span>
        <label>Date Time: (dB)</label>
      </div>

      <div class="group">
        <input type="submit" value="Process">
        <span class="error"><?php echo $result;?></span>
      </div>

    </form>
  </body>
</html>
