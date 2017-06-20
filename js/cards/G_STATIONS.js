function init_G_STATIONS(){
  ajax.post('../php/services/getStations.php',null,populateStationDropdown,true);
}

function populateStationDropdown(rawStations){
  var stationDropDown = document.getElementById('stationDropdown');
  var obj = JSON.parse(rawStations);
  for(var i = 0; i< obj.length; i++){
    stationDropDown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
  }
}

function report(id){
  var div, p, label, labelState, i = 0;
  var field = document.getElementById('stationInfo');
  field.innerHTML = "";

  while(id != obj[i]['id']){
    i++;
  }

  label = document.createElement('span');
  label.appendChild(document.createTextNode("Operative: "));
  field.appendChild(label);

  labelState = document.createElement('span');
  if(parseInt(obj[i]['operative'])){
    labelState.appendChild(document.createTextNode("ENABLED"));
    labelState.id= "enable";
    field.appendChild(labelState);

    p = document.createElement('p');
    p.appendChild(document.createTextNode("Actual track: "));
    p.appendChild(document.createTextNode(obj[i]['currentTrack']));
    p.appendChild(document.createElement("br"))
    p.appendChild(document.createTextNode(" Working since: "));
    p.appendChild(document.createTextNode(obj[i]['currentTrackSince']));
    field.appendChild(p);
  }else{
    labelState.appendChild(document.createTextNode("DISABLED"));
    labelState.id= "disable";
    field.appendChild(labelState);
  }
  document.getElementById('stationInfo').appendChild(field);
}