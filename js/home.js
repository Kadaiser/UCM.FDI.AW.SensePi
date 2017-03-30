window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
}


/*DIRECT METHODS*/

/* INSIDE METHODS*/

var dataFromDB = [
    ['Hora', 'Temperatura', 'Humedad'],
    [06,          10,         0.78],
    [07,          09,         0.79],
    [08,          09,         0.80],
    [09,          09,         0.80],
    [10,          11,         0.73],
    [11,          13,         0.63],
    [12,          14,         0.55],
    [13,          16,         0.48],
    [14,          17,         0.42],
    [15,          17,         0.37],
    [16,          18,         0.44],
    [17,          18,         0.39],
    [18,          17,         0.35],
    [19,          17,         0.35],
    [20,          15,         0.42],
    [21,          14,         0.48],
    [22,          12,         0.54],
    [23,          11,         0.59]
  ];

function drawChart() {

  var data = google.visualization.arrayToDataTable(dataFromDB);

  var options = {
    //DISPLAY options
    title: 'Ambiente de la sala',
    titleTextStyle: {color: '#bfbfbf'},
    legend: 'none',
    legendTextStyle: { color: '#bfbfbf' },

    hAxis: {
      title: 'Hora',
      titleTextStyle: {color: '#bfbfbf'},
      textStyle:{color: '#bfbfbf'},
      viewWindow:{ max:6, min:23 },
      gridlines: {color: '#bfbfbf', count: 9},
      format:"#h"
    },

    vAxes: {
      0: {
        title: 'Temperatura',
        titleTextStyle: {color: '#bfbfbf'},
        textStyle:{color: '#bfbfbf'},
        viewWindowMode:'explicit',
        viewWindow:{ max:40, min:0 },
        gridlines: {color: '#606060', count: 10},
        format:"#°"
      },
      1: {
        title: 'Humedad',
        titleTextStyle: {color: '#BBBBEE'},
        textStyle:{color: '#bfbfbf  '},
        viewWindow:{ max:1, min:0 },
        gridlines: {color: '#606060', count: 12},
        format:"#%"
      },
      
    },
    series: {
      0: {color: '#FF3333', lineWidth: 5, targetAxisIndex:0},
      1: {color: '#3366FF', lineWidth: 1, targetAxisIndex:1},
    },

    //STYLE options
    backgroundColor: 'transparent',
  };

  var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}