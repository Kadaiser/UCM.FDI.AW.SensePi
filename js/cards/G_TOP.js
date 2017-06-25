var topRoomsChart;
var topRoomsDataTable;

function init_G_TOP(){
  //Chart initialization
  google.charts.load('current', {'packages':['bar']});
  ajax.post('../php/services/getRoomStatistics.php',null,statsFormatting,true);


  var measureHeader = ['Position', 'Percentage', {role: 'annotation'}];

  dataFromDB = [
  ];

  function statsFormatting(rawStats){
    dataFromDB = [];
    dataFromDB.push(measureHeader);
    var obj = JSON.parse(rawStats);
    var roomListStats = obj.stats;
    var totalVisits = parseFloat(obj.total[0]['SUM(visits)']);
    roomListStats.forEach(function(room) {
      var tempArray=[];
      tempArray[0]=room.name;
      tempArray[1]=parseFloat(room.visits)/totalVisits;
      tempArray[2]=room.id;
      dataFromDB.push(tempArray);
    }, this);

    dashboard.topVisitedRooms = dataFromDB;
    google.charts.setOnLoadCallback(drawChart);
  }

  function drawChart() {

    topRoomsDataTable = google.visualization.arrayToDataTable(dataFromDB);

    var options = { 

      axes: {
        x: {
          0: { side: 'top',} // Top x-axis.
        }
      },

      //title: 'ALL-TIME TOP 5 queries',
      width: 300,
      height: 180,  

      legend: {
        position: 'none',
      },

      axisTitlesPosition: 'none',

      backgroundColor: {
        fill: '#bfbfbf',
      }, 
      chartArea: {
        backgroundColor: '#bfbfbf',
      },

      hAxis: {
        viewWindowMode: 'explicit',
        textPosition: 'none',
        textStyle:{color: 'red', fontSize: 0},
      },
      vAxis: {
        viewWindowMode: 'explicit',
        textPosition: 'none',
        textStyle:{color: 'red', fontSize: 0},
      },

      /*chart: {
        title: 'ALL-TIME TOP 5 queries',
        subtitle: 'popularity by percentage'
      },*/

      bars: 'horizontal', // Required for Material Bar Charts.

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

    topRoomsChart = new google.charts.Bar(document.getElementById('top_x_div'));
    // Listen for the 'select' event, and call my function selectedRoomAtChart() when
    // the user selects something on the chart.
    google.visualization.events.addListener(topRoomsChart, 'select', selectedRoomAtChart);
    topRoomsChart.draw(topRoomsDataTable, google.charts.Bar.convertOptions(options));
  };
}