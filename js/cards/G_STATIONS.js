function init_G_STATIONS(){
  ajax.post('../php/services/getStations.php',null,populationStationDropdown,true);
}

function populationStationDropdown(rawMeasuresTrack){
  var dropDown = document.getElementById('stationDropdown');
  var obj = JSON.parse(rawMeasuresTrack);
  for(var i = 0; i< obj.length; i++){
    dropDown.options[i]= new Option(obj[i]['name'],obj[i]['id']);
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