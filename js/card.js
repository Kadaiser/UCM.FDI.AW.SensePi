window.onload = function() {
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

  //Chart initialization
  google.charts.load('current', {'packages':['corechart','bar']});
  google.charts.setOnLoadCallback(drawChart);

}
/*DIRECT METHODS*/



/* INSIDE METHODS*/

  var dataFromDB = [
    ['Position', 'Percentage', {role: 'annotation'}],
    [1, 44, "Cafetería"],
    [2, 31, "Aula 1"],
    [3, 12, "Sala de conferencias"],
    [4, 10, "Pasillos"],
    [5, 2, 'WC biblioteca'],
    [, 1, 'Others']
  ];

function drawChart() {

  var data = google.visualization.arrayToDataTable(dataFromDB);

  var options = { 

    //title: 'ALL-TIME TOP 5 queries',
    width: 300,
    height: 180,  

    legend: {
      position: 'none',
    },

    /*chart: {
      title: 'ALL-TIME TOP 5 queries',
      subtitle: 'popularity by percentage'
    },*/

    bars: 'horizontal', // Required for Material Bar Charts.

    axes: {
      x: {
        0: { side: 'top'} // Top x-axis.
      }
    },

    bar: {
      groupWidth: "90%"
    },

    animation: {
      startup: true,
      easing: 'inAndOut',
    },

    annotations: {
      highContrast: true,
      stem:{

      },
      style: {

      },
      textStyle: {

      },
      datum: {

      },
      domain: {

      },
      boxStyle: {

      }
    },

  };

  var chart = new google.charts.Bar(document.getElementById('top_x_div'));
  chart.draw(data, options);
};