function init_G_SLOTS(){
  var radios = document.forms["slotsForm"].elements["slot"];
  for(var i = 0, max = radios.length; i < max; i++) {
    radios[i].addEventListener("click",function(){
      if(this.value!='on' && this.value!='off'){
        dashboard.selectedSlot = this.value;
        dashboard.selectedTrack = this.measuretrack;
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
    switch(obj[i]['slot']){
      case '1':
        inputNW.value = obj[i]['id'];
        inputNW.measuretrack = obj[i]['measuretrack'];
        break;
      case '2':
        inputNE.value = obj[i]['id'];
        inputNE.measuretrack = obj[i]['measuretrack'];
        break;
      case '3':
        inputSW.value = obj[i]['id'];
        inputSW.measuretrack = obj[i]['measuretrack'];
        break;
      case '4':
        inputSE.value = obj[i]['id'];
        inputSE.measuretrack = obj[i]['measuretrack'];
        break;
      default:
        break;
    }
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
      operative = station.operative;
      cssClass = (!!station.operative)?'stationOn':'stationOff';
    }
    switch(index+1){
      case 1:
        inputNW.station = stationId;
        inputNW.active = operative;
        inputNW.className = cssClass;
        break;
      case 2:
        inputNE.station = stationId
        inputNE.active = operative;
        inputNE.className = cssClass;
        break;
      case 3:
        inputSW.station = stationId
        inputSW.active = operative;
        inputSW.className = cssClass;
        break;
      case 4:
        inputSE.station = stationId;
        inputSE.active = operative;
        inputSE.className = cssClass;
        break;
      default:
        break;
    }
  }, this);
}

function loadSlot(slotId){
  alert('Selected slot ' + slotId);
}