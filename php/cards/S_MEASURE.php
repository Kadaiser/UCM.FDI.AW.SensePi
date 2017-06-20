<div class="cardContainer">

  <form class="injector" method="post" onsubmit="submitMeasure()" action="#">

    <div id="measureSetDiv">

      <div class="group">
        <input type="number" id="measureTemp" name="measureTemp" min="-50" max="80">
        <span class="highlight"></span><span class="bar"></span>
        <label>Temperatura (Cº)</label>
      </div>

      <div class="group">
        <input type="number" id="measureHum" name="measureHum" min="0" max="100">
        <span class="highlight"></span><span class="bar"></span>
        <label>Humedad (%)</label>
      </div>

      <div class="group">
        <input type="number" id="measureNoise" name="measureNoise" min="0" max="100">
        <span class="highlight"></span><span class="bar"></span>
        <label>Ruido (dB)</label>
      </div>

      <div class="group">
        <input type="submit" value="Process">
      </div>

    </div>

  </form>

</div>