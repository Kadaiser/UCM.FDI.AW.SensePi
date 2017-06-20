function init_G_SLOTS(){
  var radios = document.forms["slotsForm"].elements["slot"];
  for(var i = 0, max = radios.length; i < max; i++) {
    radios[i].onclick = function() {
      if(this.value!='on' && this.value!='off'){
        dashboard.selectedSlot = this.value;
        dashboard.selectedTrack = this.measuretrack;
      }else{
        alert("Please, first select a room");
      }
    }
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
  }
}

function loadSlot(slotId){
  alert('Selected slot ' + slotId);
}