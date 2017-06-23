var userlogged;
var userNick;

window.onresize = function(){
  imageCanvasBorderArea(document.getElementById('PBMap'),document.getElementById('canvasBorderArea'),'#cc6600','8');
}

window.onload = function() {

  imageCanvasBorderArea(document.getElementById('PBMap'),document.getElementById('canvasBorderArea'),'#cc6600','8');

  ajax.post('../php/sessionRetriever.php',{},setSessionDashboard,true);
  //Parse session variables and get the user  nick
  function setSessionDashboard(sessionVariables){
    var obj = JSON.parse(sessionVariables);
    userlogged = obj.login;
    userNick = obj.nick;
  }

  //Chart initialization
  google.charts.load('current', {'packages':['corechart']});

  //Gallery view floor state
  this.showFloor = {
    fpb: false,
    fp1: false,
    fp2: false,
    fp3: false,
    fp4: false,
  }
}

/*DIRECT METHODS*/

function switchBetweenView(){
  $('#mapContainer').toggle();
  $('#galleryBlock').toggle();
}

function tutorialBox() {
    $('#Fog').toggle();
    $('#firstVisit').toggle();

}

function toggleTutorial() {
  $('.tutorial').toggle();
}

/* INSIDE METHODS*/

var measureHeader = [{type: 'date', label: 'Día'}, 'Temperatura', 'Humedad'];
/*
    [new Date('2017-03-08'),          16,         0.18],
    [new Date('2017-03-09'),          16,         0.29],
    [new Date('2017-03-10'),          16,         0.30],
*/
var dataFromDB = [
];

function measuresFormatting(rawMeasures){
  dataFromDB = [];
  dataFromDB.push(measureHeader);
  var obj = JSON.parse(rawMeasures);
  var measureList = obj[1];
  measureList.forEach(function(measure) {
    var tempArray=[];
    var date_test = new Date("2011-07-14 11:23:00".replace(/-/g,"/"));
    splittedDate = measure.Date.split(" ");
    splittedDate = splittedDate[0].replace(/"/,"'");
    tempArray[0]=new Date(splittedDate);
    tempArray[1]=parseFloat(measure.temperature);
    tempArray[2]=parseFloat(measure.humidity)/100;
    dataFromDB.push(tempArray);
  }, this);

  google.charts.setOnLoadCallback(drawChart);
}

function drawChart() {

  var data = google.visualization.arrayToDataTable(dataFromDB);

  var options = {

    legend: 'none',
    backgroundColor: 'transparent',

    hAxis: {
      title: 'Día',
      titleTextStyle: {color: '#bfbfbf'},
      textStyle:{color: '#bfbfbf', fontSize: 8},
      gridlines: {color: '#808080', count: 30},
      format:"dd"
    },

    vAxes: {
      0: {
        title: 'Temperatura',
        titleTextStyle: {color: '#dd7777'},
        textStyle:{color: '#dd7777'},
        viewWindowMode:'explicit',
        viewWindow:{ max:40, min:0 },
        gridlines: {color: '#606060', count: 10},
        format:"#°"
      },
      1: {
        title: 'Humedad',
        titleTextStyle: {color: '#7799dd'},
        textStyle:{color: '#7799dd'},
        viewWindow:{ max:1, min:0 },
        gridlines: {color: '#808080', count: 12},
        format:"#%"
      },
    },

    series: {
      0: {color: '#FF3333', lineWidth: 5, targetAxisIndex:0},
      1: {color: '#3366FF', lineWidth: 1, targetAxisIndex:1},
    },
  };

  var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
  chart.draw(data, options);

}

/* INSIDE METHODS*/

function mySpanAppear(str)
{
  if(userlogged || str==="Pasillos" || str==="Cafetería")
  {
    document.getElementById("Area").innerHTML = str
    //Arreglar la fecha según necesitemos. get selected time range? mapa clave-valor con intervalo de fechas y/o frecuencias?
    //2017-05-01 19:10:58
    ajax.post('../php/services/getMeasure.php',{roomName: str, sinceDate: '2017-05-01 19:10:58'},measuresFormatting,true);

    if(userlogged)
    {
      ajax.post('../php/services/getFavoriteExist.php',{roomName: str, userNick: userNick},createFavoriteMark,true);
    }
    /*
    $('#Fog').animate({
      display: 'toggle'
    });
    $('#Span').animate({
      display: 'toggle'
    });
    */
    $('#Fog').toggle();
    $('#Span').toggle();

  }
  else
  {
    alert("Registrate si deseas consultar esta sala del plano");
  }
}

function createFavoriteMark(rawMeasures)
{
  var label, t, imgDiv;
  var elem = document.getElementById('favoriteArea');
  elem.innerHTML="";

  if(JSON.parse(rawMeasures) < 1)
  {
    label = document.createElement("LABEL");
    label.appendChild(document.createTextNode("Añadir a favoritos"));
    elem.appendChild(label);
    imgDiv = document.createElement("DIV");
    imgDiv.id="addFavoriteSpan";
    imgDiv.onclick = addToFavorite;
    elem.appendChild(imgDiv);
  }
  else
  {
    label = document.createElement("LABEL");
    label.appendChild(document.createTextNode("En favoritos"));
    elem.appendChild(label);
  }
}

function addToFavorite()
{
  var roomName = document.getElementById("Area").innerHTML;
  ajax.post('../php/services/addToFavorite.php',{roomName: roomName, userNick: userNick},verifyFavorite,true);
}

function verifyFavorite(){
  var elem = document.getElementById('favoriteArea');
  elem.innerHTML = ""
  elem.appendChild(document.createElement("LABEL").appendChild(document.createTextNode("Sala añadida a tus favoritos")));
}

function mySpanHide()
{
  $('#Span').toggle();
  $('#Fog').toggle();
}

function switchFloorState(chosenFloor) {
  var element = document.getElementById(chosenFloor);
  if(this.showFloor[chosenFloor]==false){
    this.showFloor[chosenFloor]=true;
    element.style.transition = "opacity 0.4s ease-out";
    element.style.opacity = "1";
  }else{
    this.showFloor[chosenFloor]=false;
    element.style.transition = "opacity 0.4s ease-out";
    element.style.opacity = "0";
  }
  if(this.showFloor[chosenFloor]==true){
    element.style.zIndex="1";
  }else{
    element.style.zIndex="-1";
  }
}
