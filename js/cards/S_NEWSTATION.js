function init_S_NEWSTATION(){

}

function registerStation(){
  var stationName = document.getElementById('stationName').value;
  if(stationName){
    ajax.post('../php/services/setNewStation.php',{stationName: stationName},stationRegister,true);
  }else{
    alert("Please, fill in a station ID");
  }
  return false;
}

function stationRegister(rawResponse){
  var field = document.getElementById('stationConfirmation');
  if(rawResponse=='false'){
    alert("There is already another station with that ID.");
    field.innerHTML = "Given ID is not available.";
  }else{
    field.innerHTML = "Station registered correctly";
  }
}