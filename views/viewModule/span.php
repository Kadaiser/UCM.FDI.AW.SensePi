<div class="span" id="Span">

  <div class="closeSpam" onclick='mySpanHide()' title="Close"></div>
  <h1 id="Area"></h1>
  <p id="Temp"></p>
  <p id="Hum"></p>
  <p id="Noise"></p>

  <div id="chart_div"></div>

  <?php if (isset($_SESSION['login'])){ ?>
    <div class="favoriteMark" id="favoriteArea">
    </div>
  <?php }?>
</div>
