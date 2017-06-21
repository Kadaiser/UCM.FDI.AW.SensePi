<div class="cardContainer">

  <form class="injector" method="post" action="#">

    <div class="group">
      <Span>Station</Span>
      <select onchange="report(this.value)"  class="mesureTrackSelect" name="Room" id="stationDropdown">
        <option disabled selected value>-- Select a station --</option>
      </select>
      <div class="StationInfo" id="stationInfo"></div>
      <!--
      <input type="submit">
      -->
    </div>


  </form>

</div>
