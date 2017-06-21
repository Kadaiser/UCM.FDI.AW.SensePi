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
        stationDropDown.value = this.station;
        report(this.station);
      }
    });
  }
}

function report(id){
  var div, p, label, labelState, i = 0;
  var field = document.getElementById('stationInfo');
  field.innerHTML = "";

  while(id != stationObject[i]['id']){
    i++;
  }

  label = document.createElement('span');
  label.appendChild(document.createTextNode("Operative: "));
  field.appendChild(label);

  labelState = document.createElement('span');
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