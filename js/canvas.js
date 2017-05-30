// stores the device context of the canvas we use to draw the outlines
// initialized in imageCanvasBorderArea, used in myHover and myLeave
var canvasBorder;
var canvasLine;

function imageCanvasBorderArea(element,canvas,color,lineWidth)
{
    var x,y, w,h;
    // get it's position and width+height
    x = element.offsetLeft;
    y = element.offsetTop;
    w = element.clientWidth;
    h = element.clientHeight;

    // move the canvas, so it's contained by the same parent as the image
    var imgParent = element.parentNode;
    imgParent.appendChild(canvas);

    // place the canvas in front of the image
    canvas.style.zIndex = 1;

    // position it over the image
    canvas.style.left = x+'px';
    canvas.style.top = y+'px';

    // make same size as the image
    canvas.setAttribute('width', w+'px');
    canvas.setAttribute('height', h+'px');

    // get it's context
    canvasBorder = canvas.getContext('2d');

    // set the 'default' values for the colour/width of fill/stroke operations
    canvasBorder.fillStyle = color;
    canvasBorder.strokeStyle = color;
    canvasBorder.lineWidth = lineWidth;
}


//INNER METHODS

// shorthand func
function byId(e)
{
  return document.getElementById(e);
}


function drawPoly(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var i, n;
    n = mCoords.length;

    canvasBorder.beginPath();
    canvasBorder.moveTo(mCoords[0], mCoords[1]);
    for (i=2; i<n; i+=2)
    {
        canvasBorder.lineTo(mCoords[i], mCoords[i+1]);
    }
    canvasBorder.lineTo(mCoords[0], mCoords[1]);
    canvasBorder.stroke();
}

function drawRect(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var top, left, bot, right;
    left = mCoords[0];
    top = mCoords[1];
    right = mCoords[2];
    bot = mCoords[3];
    canvasBorder.strokeRect(left,top,right-left,bot-top);
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

function myLeave(element, canvas)
{
    canvasBorder.clearRect(0, 0, canvas.width, canvas.height);
}
