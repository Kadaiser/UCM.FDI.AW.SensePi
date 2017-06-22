<div class="cardContainer">

  <form class="injector" method="post" onsubmit="event.preventDefault(); registerStation(); return false">

    <div id="measureSetDiv">

      <div class="group">
        <input type"text" id="stationName" name="stationName"
        placeholder="Ej: ST67">
        <span class="highlight"></span><span class="bar"></span>
        <label>Station ID</label>
      </div>

      <div class="group">
        <input type="submit" value="Register station">
      </div>
      <div id="stationConfirmation"></div>

    </div>

  </form>

</div>