    <script>
      var obj;

      function populationStationDropdown(rawMeasuresTrack){
        var dropDown = document.getElementById('stationDropdown');
        obj = JSON.parse(rawMeasuresTrack);
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
    </script>


  <div onload="ajax.post('../php/getStations.php',null,populationStationDropdown,true);">

    <form class="injector" method="post" action="#">

      <div class="group">
        <Span>Station</Span>
        <select onchange="report(this.value)"  class="mesureTrackSelect" name="Room" id="stationDropdown">
          <option disabled selected value>select device</option>
        </select>
        <div class="StationInfo" id="stationInfo"></div>
<!--
        <input type="submit">
-->
      </div>


    </form>

  </div>
