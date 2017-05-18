window.onresize = function(){
  imageCanvasBorderArea(document.getElementById('PBMap'),document.getElementById('canvasBorderArea'),'#cc6600','8');
}

window.onload = function() {
  this.init(/*param1,param2*/);
  imageCanvasBorderArea(document.getElementById('PBMap'),document.getElementById('canvasBorderArea'),'#cc6600','8');
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
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


var mapView = true;

function switchBetweenView(){
  if(mapView){switchToGalleryView();}
  else {switchToMapView();}
  mapView = !mapView;
}

/* INSIDE METHODS*/


function switchToMapView() {
  document.getElementById("mapContainer").style.display = "block";
  document.getElementById("galleryBlock").style.display = "none";
}

function switchToGalleryView() {
  document.getElementById("galleryBlock").style.display = "block";
  document.getElementById("mapContainer").style.display = "none";
}

var dataFromDB = [
    [{type: 'date', label: 'Día'}, 'Temperatura', 'Humedad'],
];
/*  [new Date('2017-03-08'),          16,         0.18],
    [new Date('2017-03-09'),          16,         0.29],
    [new Date('2017-03-10'),          16,         0.30],
*/

function measuresFormatting(rawMeasures){
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
  //VISUAL EFFECT
  var fog = document.getElementById('Fog');
  fog.style.visibility = "visible";
  fog.style.transition = "opacity 0.4s ease-out";
  var div = document.getElementById("Span");
  div.style.visibility = "visible";
  div.style.transition = "opacity 0.7s ease-out";
  div.style.opacity = "1";

  document.getElementById("Area").innerHTML = str;

  //TODO: Arreglar la fecha según necesitemos. get selected time range? mapa clave-valor con intervalo de fechas y/o frecuencias?
  //2017-05-01 19:10:58
  ajax.post('../php/getMeasure.php',{roomName: str, sinceDate: '2017-05-01 19:10:58'},measuresFormatting,true);

}

function mySpanHide()
{
  var fog = document.getElementById('Fog');
  fog.style.visibility = "collapse";
  var div = document.getElementById("Span");
  div.style.opacity = "0";
  div.style.visibility = "hidden";
}


function AddToFavorite(){

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
