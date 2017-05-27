<div class="span" id="Span">

  <img class="staticImg" src="../images/icons/xOff.png">
  <img class="hoverImg" src="../images/icons/xOn.png" alt="Close" onclick='mySpanHide()'>
  <h1 id="Area"></h1>
  <p id="Temp"></p>
  <p id="Hum"></p>
  <p id="Noise"></p>

  <div id="chart_div"></div>

  <?php if (isset($_SESSION['login'])){ ?>
    <div class="favoriteMark">
      <label>Add to favorite </label>
      <img class="staticImg" src="../images/icons/slimStar.png" alt="Add to favorite">
      <img class="hoverImg" src="../images/icons/fatStar.png" alt="Add to favorite" onclick='addToFavorite()'>
      <label id="verifyFavorite"></label>
    </div>
  <?php }?>

</div>
