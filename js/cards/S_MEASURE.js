function init_S_MEASURE(){

}

function submitMeasure(){
  if(dashboard.selectedRoom){
    if(dashboard.selectedTrack){
      if(dashboard.selectedSlotIsOperative){
        var tempInput = document.getElementById(measureTemp).value;
        var humInput = document.getElementById(measureHum).value;
        var noiseInput = document.getElementById(measureNoise).value;
        if(tempInput && humInput && noiseInput){
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
          alert("Please, fill all the fields");
        }
      }else{
        alert('The station in this slot is disabled');
      }
    }else{
      alert('Please, first select a slot with an operative station');
    }
  }else{
    alert('Please, first select a room');
  }
  return false;
}

function measureSubmitted(rawResponse){
  //TODO: format Response?
  alert("value was submitted correctly (or not)");
}