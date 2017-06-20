function init_S_MEASURE(){

}

function submitMeasure(){
  if(dashboard.selectedRoom && dashboard.selectedTrack){
    var tempInput = document.getElementById(measureTemp).value;
    var humInput = document.getElementById(measureHum).value;
    var noiseInput = document.getElementById(measureNoise).value;
    ajax.post('../php/services/setMeasureOnStation.php',
    {
      Room: dashboard.selectedRoom,
      MeasureTrack: dashboard.selectedTrack,
      temp: tempInput,
      hum: humInput,
      noise: noiseInput
    },
    measureSubmitted,true);
  }else{
    alert('Please, first select a room and a slot');
  }

}

function measureSubmitted(rawResponse){
  //TODO: format Response?
  alert("value was submitted correctly (or not)");
}