var stationObject = {};

function init_G_STATIONS(){
  ajax.post('../php/services/getStations.php',null,populateStationDropdown,true);
}

function populateStationDropdown(rawStations){
  var stationDropDown = document.getElementById('stationDropdown');
  stationObject = JSON.parse(rawStations);
  for(var i = 0; i< stationObject.length; i++){
    stationDropDown.options[i+1]= new Option(stationObject[i]['name'],stationObject[i]['id']);
  }
  var radios = document.forms["slotsForm"].elements["slot"];
  for(var i = 0, max = radios.length; i < max; i++) {
    radios[i].addEventListener("click",function(){
      if(dashboard.selectedRoom!=null){
        stationDropDown.value = null;
        stationDropDown.value = this.station;
        if(this.station!=null){
          report(this.station);
        }else{
          report(null);
        }
      }
    });
  }
}

function report(id){
  var div, p, label, labelState, i = 0;
  var field = document.getElementById('stationInfo');
  field.innerHTML = "";

  label = document.createElement('span');
  label.appendChild(document.createTextNode("Operative: "));
  field.appendChild(label);

  labelState = document.createElement('span');

  if(id!=null){

    while(id != stationObject[i]['id']){
      i++;
    }
    dashboard.selectedStation = stationObject[i];

    if(parseInt(stationObject[i].operative)){
      labelState.appendChild(document.createTextNode("ENABLED"));
      labelState.id= "enable";
      field.appendChild(labelState);

      p = document.createElement('p');
      p.appendChild(document.createTextNode("Actual track: "));
      p.appendChild(document.createTextNode(stationObject[i]['currentTrack']));
      p.appendChild(document.createElement("br"))
      p.appendChild(document.createTextNode("Working since: "));
      p.appendChild(document.createTextNode(stationObject[i]['currentTrackSince']));
      field.appendChild(p);
    }else{
      labelState.appendChild(document.createTextNode("DISABLED"));
      labelState.id= "disable";
      field.appendChild(labelState);
    }
    
  }
  else{
    labelState.appendChild(document.createTextNode("NO STATION"));
    labelState.id= "noStation";
    field.appendChild(labelState);
  }
}

function disableStation(){
  if(!!parseInt(dashboard.selectedStation.operative)){
    if(confirm("Are you sure you want to disable this station? This will prevent from getting new measures from current slot.")){
      var id = dashboard.selectedStation.id;
      ajax.post('../php/services/setDisabledStation.php',{stationId : id},stationDisabled(id),true);
      dashboard.selectedStation.operative = '0';
    }
  }else{
    alert('This station is already disabled.');
  }
}

function stationDisabled(){
  alert('Station ' + id + ' disabled');
  location.reload();
}

function addStationToSlot(){

  if(dashboard.selectedStation){
    if(dashboard.selectedRoom){
      if(!!parseInt(dashboard.selectedStation.operative)==false){
        if(dashboard.selectedSlotIsOperative!=undefined){
          if(dashboard.selectedSlotIsOperative!=true){
            if(confirm("Are you sure you want to add this station to current slot?")){

              var newTrack = generateNewTrack(); //Un nuevo track entre 10^18 posibilidades. Se asume irrepetible.

              ajax.post('../php/services/setStationInSlot.php',
                {
                  slotId: dashboard.selectedSlot,
                  measureTrack: newTrack,
                  stationId: dashboard.selectedStation.id,
                },
                stationAssignment,true);

            }
          }else{
            alert('The selected slot already has a station in it. First disable that station.');
          }
        }else{
          alert('Please, First select a slot.');
        }
      }else{
        alert('The selected station is already in use.');
      }
    }else{
      alert('Please, first select a room.');
    }
  }else{
    alert('Please, first select a station.');
  }

}

function stationAssignment(rawResults){
  alert("Station assigned correctly.");
  location.reload();
}

function generateNewTrack(){
  var alphabet = '0123456789abcdef';
  var generatedTrack = '';
  for (var i = 0; i < 16; ++i) {
    var random= Math.floor((Math.random() * 16));
    var charToAdd = alphabet.charAt(random);
    generatedTrack += charToAdd;
  }
  return generatedTrack;
}