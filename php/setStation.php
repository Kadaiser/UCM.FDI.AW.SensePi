<?php  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css"/>
    <script type="text/javascript" src="../js/ajaxbasic.js"></script>
    <script>

      function populationStationDropdown(rawMeasuresTrack){
        var dropDown = document.getElementById('stationDropdown');
        var obj = JSON.parse(rawMeasuresTrack);
        for(var i = 0; i< obj.length; i++){
          dropDown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
        }
      }
    </script>
  </head>


  <body onload="ajax.post('../php/getStations.php',null,populationStationDropdown,true);">

    <form class="injector" method="post" action="#">

      <div class="group">
        <h1 id="test"></h1>
        <label>Station</label>
        <select  class="mesureTrackSelect" name="Room" id="stationDropdown">
          <option disabled selected value>-- select device --</option>
        </select>
        <input type="submit">
      </div>


    </form>

  </body>
</html>
