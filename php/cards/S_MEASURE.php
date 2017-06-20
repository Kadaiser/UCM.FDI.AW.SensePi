<div class="cardContainer">

  <form class="injector" method="post" action="../php/services/setMeasureOnStation.php">

    <div class="group">
      <label>Room</label>
      <select onchange="populateRoomSlots(this.value)" class="mesureTrackSelect" name="Room" id="RoomDropdown">
        <option disabled selected value>-- select an option --</option>
      </select>
    </div>

    <div class="group">
      <label>Slot ID</label>
      <select onchange="showImput()" class="mesureTrackSelect" name="MeasureTrack" id="slotDropDown">
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