<script>
  function populateMeasure(id){
    var dropDown = document.getElementById("RoomDropdown");
    var IdRoom = dropDown.options[dropDown.selectedIndex].value;

    ajax.post('../php/getSlotsIdAndTracks.php',{roomId: IdRoom},fullfillOptions,true);
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

  function populateRoomDropdown(rawMeasuresTrack){
    var dropDown = document.getElementById('RoomDropdown');
    var obj = JSON.parse(rawMeasuresTrack);
    for(var i = 0; i< obj.length; i++){
      dropDown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
    }
  }

  function showImput(){
    //document.getElementById("measureSetDiv").style.visibility = "visible";
  }
</script>


  </head>

  <div onload="ajax.post('../php/getRooms.php',null,populateRoomDropdown,true);">


    <form class="injector" method="post" action="../php/setMeasureOnStation.php">

      <div class="group">
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

        <div class="group">
          <input type="number" name="temp" min="-50" max="80">
          <span class="highlight"></span><span class="bar"></span>
          <label>Temperatura (Cº)</label>
        </div>

        <div class="group">
          <input type="number" name="hum" min="0" max="100">
          <span class="highlight"></span><span class="bar"></span>
          <label>Humedad (%)</label>
        </div>

        <div class="group">
          <input type="number" name="noise" min="0" max="100">
          <span class="highlight"></span><span class="bar"></span>
          <label>Ruido (dB)</label>
        </div>

        <div class="group">
          <input type="submit" value="Process">
        </div>
      </div>

    </form>
  </div>
