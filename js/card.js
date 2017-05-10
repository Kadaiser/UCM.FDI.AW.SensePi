window.onload = function() {
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

  //Chart initialization
  google.charts.load('current', {'packages':['corechart','bar']});
  google.charts.setOnLoadCallback(drawStuff);

}
/*DIRECT METHODS*/



/* INSIDE METHODS*/

function drawStuff() {
  var data = new google.visualization.arrayToDataTable([
    ['Room', 'Percentage'],
    ["Cafetería", 44],
    ["Aula 1", 31],
    ["Sala de conferencias", 12],
    ["Pasillos", 10],
    ['WC biblioteca', 3]
  ]);

  var options = { 
    title: 'Chess opening moves',
    width: 900,
    legend: { position: 'none' },
    chart: { title: 'Chess opening moves',
              subtitle: 'popularity by percentage' },
    bars: 'horizontal', // Required for Material Bar Charts.
    axes: {
      x: {
        0: { side: 'top', label: 'Percentage'} // Top x-axis.
      }
    },
    bar: { groupWidth: "90%" }
  };

  var chart = new google.charts.Bar(document.getElementById('top_x_div'));
  chart.draw(data, options);
};