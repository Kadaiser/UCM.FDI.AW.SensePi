function init_G_ROOMS(){
  ajax.post('../php/services/getRooms.php',null,populateRoomDropdown,true);
}

function populateRoomDropdown(rawRooms){
  var roomDropdown = document.getElementById('roomDropdown');
  var obj = JSON.parse(rawRooms);
  for(var i = 0; i< obj.length; i++){
    roomDropdown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
  }
  roomDropdown.addEventListener("change",function(){
    dashboard.selectedRoom = roomDropdown.value;
  });
}