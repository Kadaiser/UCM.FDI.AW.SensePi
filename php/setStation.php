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
      var obj;

      function populationStationDropdown(rawMeasuresTrack){
        var dropDown = document.getElementById('stationDropdown');
        obj = JSON.parse(rawMeasuresTrack);
        for(var i = 0; i< obj.length; i++){
          dropDown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
        }
      }

      function report(id){
        var field = document.getElementById('stationInfo');
        var i = 0;
        while(id != obj[i]['id']){
          i++;
        }
        var p = document.createElement('h1');
        var text = document.createTextNode(obj[i]['currentTrack']);
        p.appendChild(text);
        field.appendChild(p);
      }

    </script>
  </head>


  <body onload="ajax.post('../php/getStations.php',null,populationStationDropdown,true);">

    <form class="injector" method="post" action="#">

      <div class="group">
        <label>Station</label>
        <select onchange="report(this.value)"  class="mesureTrackSelect" name="Room" id="stationDropdown">
          <option disabled selected value>select device</option>
        </select>

          <div class="StationInfo" id="stationInfo">

          </div>
        <input type="submit">
      </div>


    </form>

  </body>
</html>
