//Extrae el perfil de favoritos
//Planta una gráfica en cada card
var favChart1, favChart2, favChart3;
var favChart1Ready = false, favChart2Ready = false, favChart3Ready = false;

function init_G_FAVORITE(){

  //Chart initialization
  google.charts.load('current', {'packages':['corechart']});
  var favCharts = document.getElementsByClassName("favChart");
  if(favCharts.length==3){
    userFavorites.forEach(function(favorite,index) {
      favCharts[index].id = "favChart".concat(userFavorites[index].idRoom);
      favCharts[index].measuresFormatting = function(answer){
        measuresFormatting(favCharts[index].id,answer);
      };
    }, this);
  }
  if(favCharts[0] && favCharts[0].id!="" && !favChart1Ready){
    favChart1Ready = true;
    dataFromDBFavCharts[favCharts[0].id] = [];
    setupChart(userFavorites[0],favCharts[0]);
  }
  if(favCharts[1] && favCharts[1].id!="" && !favChart2Ready){
    favChart2Ready = true;
    dataFromDBFavCharts[favCharts[1].id] = [];
    setupChart(userFavorites[1],favCharts[1]);
  }
  if(favCharts[2] && favCharts[2].id!="" && !favChart3Ready){
    favChart3Ready = true;
    dataFromDBFavCharts[favCharts[2].id] = [];
    setupChart(userFavorites[2],favCharts[2]);
  }
}

function setupChart(userFav,favChart){
  ajax.post('../php/services/getMeasure.php',{roomName: userFav.name, sinceDate: '2017-06-15 12:00:00'},favChart.measuresFormatting,true);
  //setup favChart1Ready = true;
}

var measureHeader = [{type: 'date', label: 'Día'}, 'Temperatura', 'Humedad'];
/*
    [new Date('2017-03-08'),          16,         0.18],
    [new Date('2017-03-09'),          16,         0.29],
    [new Date('2017-03-10'),          16,         0.30],
*/
var dataFromDBFavCharts = {};

function measuresFormatting(favChartId,rawMeasures){
  dataFromDBFavCharts[favChartId] = [];
  dataFromDBFavCharts[favChartId].push(measureHeader);
  var measuresMatrix = JSON.parse(rawMeasures);
  var slotLists = [
    slot1List = measuresMatrix[Object.keys(measuresMatrix)[0]],
    slot2List = measuresMatrix[Object.keys(measuresMatrix)[1]],
    slot3List = measuresMatrix[Object.keys(measuresMatrix)[2]],
    slot4List = measuresMatrix[Object.keys(measuresMatrix)[3]]
  ];

  //Current version uses the default most used slot to get the overall measure of the room.
  slot1List.forEach(function(measure, index) {
    var tempArray=[];
    splittedDate = measure.Date.split(" ");
    splittedDate = splittedDate[0].replace(/"/,"'");
    tempArray[0]=new Date(splittedDate);
    tempArray[1]=parseFloat(measure.temperature);
    tempArray[2]=parseFloat(measure.humidity)/100;
    dataFromDBFavCharts[favChartId].push(tempArray);
  }, this);

  google.charts.setOnLoadCallback(drawChart(favChartId));
}

function drawChart(favChartId) {

  var data = google.visualization.arrayToDataTable(dataFromDBFavCharts[favChartId]);

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

  var chart = new google.visualization.AreaChart(document.getElementById(favChartId));
  chart.draw(data, options);

}