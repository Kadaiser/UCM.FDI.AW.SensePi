var roomsObject = {};

function init_G_ROOMS(){
  ajax.post('../php/services/getRooms.php',null,populateRoomDropdown,true);
}

function populateRoomDropdown(rawRooms){
  var roomDropdown = document.getElementById('roomDropdown');
  roomsObject = JSON.parse(rawRooms);
  for(var i = 0; i< roomsObject.length; i++){
    roomDropdown.options[i+1]= new Option(roomsObject[i]['name'],roomsObject[i]['id']);
  }
  roomDropdown.addEventListener("change",function(){
    dashboard.selectedRoom = roomDropdown.value;
  });
}