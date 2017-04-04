window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
  var shownMember = 'Azahara';
}


/*DIRECT METHODS*/
function switchMemberClick(selectedMember) {

  switch(selectedMember){
    case 'Azahara':
      document.getElementById("Azahara").style.display="block";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
      break;
    case 'Diego':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="block";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
      break;
    case 'Javier':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="block";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
      break;
    case 'Julio':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="block";
      document.getElementById("Sergio").style.display="none";
      break;
    case 'Sergio':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="block";
      break;
    default:
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
  }
}

/* INSIDE METHODS*/