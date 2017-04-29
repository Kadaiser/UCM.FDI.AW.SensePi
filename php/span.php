<?php

    class Measure{
      function Measure(){
        $this->Date = null;
        $this->Hum = null;
        $this->Temp = null;
        $this->Noise = null;
      }
    }

    $Info = new Measure();
?>


<div class="span" id="Span">


  <img class="staticImg" src="../images/icons/xOff.png">
  <img class="hoverImg" src="../images/icons/xOn.png" alt="Close" onclick='mySpanHide();'>
  <h1>CAFETERIA</h1>
  <p>Noise:           40dB</p>
  <div id="chart_div"></div>

  <div class="favoriteMark">
    <label>Add to favorite </label>
    <img class="staticImg" src="../images/icons/slimStar.png" alt="Add to favorite">
    <img class="hoverImg" src="../images/icons/fatStar.png">
  </div>

</div>
