window.onload = function() {
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

  // get the target image
  var img = byId('PBMap');

  var x,y, w,h;

  // get it's position and width+height
  x = img.offsetLeft;
  y = img.offsetTop;
  w = img.clientWidth;
  h = img.clientHeight;

  // move the canvas, so it's contained by the same parent as the image
  var imgParent = img.parentNode;
  var can = byId('myCanvas');
  imgParent.appendChild(can);

  // place the canvas in front of the image
  can.style.zIndex = 1;

  // position it over the image
  can.style.left = x+'px';
  can.style.top = y+'px';

  // make same size as the image
  can.setAttribute('width', w+'px');
  can.setAttribute('height', h+'px');

  // get it's context
  hdc = can.getContext('2d');

  // set the 'default' values for the colour/width of fill/stroke operations
  hdc.fillStyle = '#ff7a05';
  hdc.strokeStyle = '#ff7a05';
  hdc.lineWidth = 8;

  //Chart initialization
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

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

function switchToMapView() {
  document.getElementById("PBMap").style.display = "block";
  document.getElementById("PB").style.display = "block";
  document.getElementById("galleryBlock").style.display = "none";
}

function switchToGalleryView() {
  document.getElementById("galleryBlock").style.display = "block";
  document.getElementById("PBMap").style.display = "none";
  document.getElementById("PB").style.display = "none";
}

/* INSIDE METHODS*/

var dataFromDB = [
    [{type: 'date', label: 'Día'}, 'Temperatura', 'Humedad'],
    [new Date('2017-03-08'),          16,         0.18],
    [new Date('2017-03-09'),          16,         0.29],
    [new Date('2017-03-10'),          16,         0.30],
    [new Date('2017-03-11'),          15,         0.40],
    [new Date('2017-03-12'),          16,         0.23],
    [new Date('2017-03-13'),          15,         0.33],
    [new Date('2017-03-14'),          16,         0.20],
    [new Date('2017-03-15'),          17,         0.10],
    [new Date('2017-03-16'),          18,         0.10],
    [new Date('2017-03-17'),          18,         0.15],
    [new Date('2017-03-18'),          18,         0.13],
    [new Date('2017-03-19'),          18,         0.29],
    [new Date('2017-03-20'),          17,         0.40],
    [new Date('2017-03-21'),          18,         0.30],
    [new Date('2017-03-22'),          19,         0.35],
    [new Date('2017-03-23'),          19,         0.22],
    [new Date('2017-03-24'),          20,         0.20],
    [new Date('2017-03-25'),          23,         0.13],
    [new Date('2017-03-26'),          20,         0.29],
    [new Date('2017-03-27'),          20,         0.30],
    [new Date('2017-03-28'),          19,         0.24],
    [new Date('2017-03-29'),          20,         0.15],
    [new Date('2017-03-30'),          21,         0.13],
    [new Date('2017-04-01'),          23,         0.17],
    [new Date('2017-04-02'),          24,         0.16],
    [new Date('2017-04-03'),          25,         0.12],
    [new Date('2017-04-04'),          22,         0.11],
    [new Date('2017-04-05'),          22,         0.10],
    [new Date('2017-04-06'),          21,         0.15],
    [new Date('2017-04-07'),          22,         0.18],
  ];

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

// stores the device context of the canvas we use to draw the outlines
// initialized in myInit, used in myHover and myLeave
var hdc;

// shorthand func
function byId(e){return document.getElementById(e);}

// takes a string that contains coords eg - "227,307,261,309, 339,354, 328,371, 240,331"
// draws a line from each co-ord pair to the next - assumes starting point needs to be repeated as ending point.
function drawPoly(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var i, n;
    n = mCoords.length;

    hdc.beginPath();
    hdc.moveTo(mCoords[0], mCoords[1]);
    for (i=2; i<n; i+=2)
    {
        hdc.lineTo(mCoords[i], mCoords[i+1]);
    }
    hdc.lineTo(mCoords[0], mCoords[1]);
    hdc.stroke();
}

function drawRect(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    hdc.lineWidth = 0;
    var top, left, bot, right;
    left = mCoords[0];
    top = mCoords[1];
    right = mCoords[2];
    bot = mCoords[3];
    for (var i = 0; i < 8; i++) {
      hdc.lineWidth = i;
      setTimeout(hdc.strokeRect(left,top,right-left,bot-top), 1000);
    }
}

function myHover(element)
{
    var hoveredElement = element;
    var coordStr = element.getAttribute('coords');
    var areaType = element.getAttribute('shape');

    switch (areaType)
    {
        case 'polygon':
        case 'poly':
            drawPoly(coordStr);
            break;

        case 'rect':
            drawRect(coordStr);
    }
}


function myLeave()
{
    var canvas = byId('myCanvas');
    hdc.clearRect(0, 0, canvas.width, canvas.height);
}

function mySpanAppear()
{
  var fog = document.getElementById('Fog');
  fog.style.visibility = "visible";
  fog.style.transition = "opacity 0.4s ease-out";
  var div = document.getElementById("Span");
  div.style.visibility = "visible";
  div.style.transition = "opacity 0.7s ease-out";
  div.style.opacity = "1";
}

function mySpanHide()
{
  var fog = document.getElementById('Fog');
  fog.style.visibility = "collapse";
  var div = document.getElementById("Span");
  div.style.opacity = "0";
  div.style.visibility = "hidden";
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

function myHoverImg(element){
  element.src= "./images/icons/xOn.png";
}

function myLeaveImg(element){
  element.src= "./images/icons/xOff.png";

}
