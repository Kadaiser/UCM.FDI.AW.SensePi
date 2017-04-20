<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title id="webTitle">User view</title>
    <link rel="icon" type="image/png" href="../images/icons/zero.png"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/userview.css"/>
    <script type="text/javascript" src="../js/userview.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

    <!-- WRAPPER CLASS -->
    <div id="wrapper">

      <!-- HEADER CLASS -->
      <?php
      include '../php/navbar.php';
       ?>

      <!-- SIDEBAR CLASS -->
      <div class="sidebarLeft">
      </div>
      <!-- SIDEBAR CLASS -->
      <div class="sidebarRight">
      </div>

      <!-- CONTENT CLASS -->
      <div id="content">
        <div class="sort">
            <label>Sort By:</label>
            <select id="sort">
                <option value="">Sort by</option>
                <option value="1">Favorites</option>
                <option value="2">Temp.</option>
                <option value="3">Hum.</option>
                <option value="4">Pop.</option>
                <option value="5">Last update</option>
            </select>
        </div>

        <div class="datatable">
            <table id="data">
                <thead>
                    <th>Favorites</th>
                    <th>Temp.</th>
                    <th>Hum.</th>
                    <th>Pop.</th>
                    <th>Last update</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="recomendations">
            <h3>Recomendations</h3>
            <div class="panel">
                <p>Deberias dejar la chaqueta en casa, parece que va hacer calor</p>
                <p>Una botellita de agua para esta tarde te ayudara a pasar mejor las horas en el Aula 8</p>
                <p>Hay un monton de gente en la cafeteria por la mañana...mmm huele a convención de Google!!</p>
                <p>La planta 1 de la biblioteca tiene poquisima gente hoy</p>
            </div>
            <span>Provided by EMMA</span>
        </div>

        <div class="search">
            <fieldset>
                <legend>Search</legend>
                <label>By</label>
                <select id="search">
                </select>
                <input type="text" name="filter">
            </fieldset>
        </div>

      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../php/footer.php';
       ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
