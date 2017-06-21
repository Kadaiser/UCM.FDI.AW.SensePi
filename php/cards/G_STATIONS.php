<div class="cardContainer">

  <form class="injector" method="post" action="#">

    <div class="group">
      <Span>Station</Span>
      <select onchange="report(this.value)"  class="mesureTrackSelect" name="Room" id="stationDropdown">
        <option disabled selected value>-- Select a station --</option>
      </select>
      <div class="StationInfo" id="stationInfo"></div>
    </div>

  </form>

  <div class="group">
    <button type="button" onclick="disableStation()">Disable station</button>
  </div>

  <div class="group">
    <button type="button" onclick="addStationToSlot()">Add to current room slot</button>
  </div>

</div>
