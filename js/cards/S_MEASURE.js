function init_S_MEASURE(){
  ajax.post('../php/services/getRooms.php',null,populateRoomDropdown,true);
}

function populateRoomDropdown(rawRooms){
  var dropDown = document.getElementById('RoomDropdown');
  var obj = JSON.parse(rawRooms);
  for(var i = 0; i< obj.length; i++){
    dropDown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
  }
  populateRoomSlots(dropDown.options[0].value);
}

function populateRoomSlots(roomId){
  var dropDown = document.getElementById("RoomDropdown");
  //var IdRoom = dropDown.options[dropDown.selectedIndex].value;
  ajax.post('../php/services/getSlotsIdAndTracks.php',{roomId: roomId},populateSlotsDropdown,true);
}

function populateSlotsDropdown(rawSlotsAndTracks){
  var dropDown = document.getElementById('slotDropDown');
  while (dropDown.options.length > 0) {
    dropDown.remove(0);
  }
  var obj = JSON.parse(rawSlotsAndTracks);
  for(var i = 0; i< obj.length; i++){
    //falta sacar la informacion del objeto y rellenar la creacion del option (text, value)
    dropDown.options[i]= new Option(obj[i]['roomslotid'],obj[i]['measuretrack']);
  }
}

function showImput(){
  //document.getElementById("measureSetDiv").style.visibility = "visible";
}