function init_G_SLOTS(){

  var radios = document.forms["slotsForm"].elements["slot"];
  for(var i = 0, max = radios.length; i < max; i++) {
    radios[i].addEventListener("click",function(){
      if(this.value!='on' && this.value!='off'){
        dashboard.selectedSlot = this.value;
        dashboard.selectedTrack = this.measuretrack;
        dashboard.selectedSlotIsOperative = this.operative ;
      }else{
        alert("Please, first select a room");
      }
    });
  }
  var roomDropDown = document.getElementById('roomDropdown');
  roomDropDown.addEventListener("change",function(){
    ajax.post('../php/services/getSlotsIdAndTracks.php',{roomId: roomDropDown.value},populateSlotsDropdown,true);
  });
}

function populateSlotsDropdown(rawSlotsAndTracks){

  var inputNW = document.getElementById('slotNW');
  var inputNE = document.getElementById('slotNE');
  var inputSW = document.getElementById('slotSW');
  var inputSE = document.getElementById('slotSE');
  
  var obj = JSON.parse(rawSlotsAndTracks);
  var tracksArray = [];

  for(var i = 0; i< obj.length; i++){
    var currentInput;
    switch(obj[i]['slot']){
      case '1':
        currentInput = inputNW;
        break;
      case '2':
        currentInput = inputNE;
        break;
      case '3':
        currentInput = inputSW;
        break;
      case '4':
        currentInput = inputSE;
        break;
      default:
        break;
    }
    currentInput.checked = false;
    currentInput.value = obj[i]['id'];
    currentInput.measuretrack = obj[i]['measuretrack'];
    tracksArray.push(obj[i]['measuretrack']);
  }

  ajax.post('../php/services/getOperativeSlots.php',{tracks: tracksArray},showOperativeIds,true);
}

function showOperativeIds(rawOperativeSlots){
  var operativeArray = JSON.parse(rawOperativeSlots);
  var inputNW = document.getElementById('slotNW');
  var inputNE = document.getElementById('slotNE');
  var inputSW = document.getElementById('slotSW');
  var inputSE = document.getElementById('slotSE');
  operativeArray.forEach(function(station,index) {
    var stationId = null;
    var operative = '0';
    var cssClass = 'noStation';
    if(station!=null){
      stationId = station.id;
      operative = !!(parseInt(station.operative));
      cssClass = !!(parseInt(station.operative))?'stationOn':'stationOff';
    }
    var currentInput;
    switch(index+1){
      case 1:
        currentInput = inputNW;
        break;
      case 2:
        currentInput = inputNE;
        break;
      case 3:
        currentInput = inputSW;
        break;
      case 4:
        currentInput = inputSE;
        break;
      default:
        break;
    }
    currentInput.station = stationId;
    currentInput.operative = operative;
    currentInput.className = cssClass;
  }, this);
}