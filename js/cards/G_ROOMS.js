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
  $('#roomDropdown').on('change',updateSelectedRoom);

  function updateSelectedRoom(){
    dashboard.selectedSlot = null;
    topRoomsChart.setSelection(null);
    dashboard.selectedRoom = null;
    dashboard.selectedRoom = roomDropdown.value;
  }
}

// The select handler. Call the chart's getSelection() method
function selectedRoomAtChart() {  
  var selectedItem = topRoomsChart.getSelection()[0];
  if (selectedItem) {
    var roomId = dashboard.topVisitedRooms[selectedItem.row+1][2];
    var roomDropdown = document.getElementById('roomDropdown');
    roomDropdown.selectedIndex = roomId;
    $('#roomDropdown').trigger('change');
  }
}