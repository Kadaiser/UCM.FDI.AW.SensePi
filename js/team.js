window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

}

/*DIRECT METHODS*/
function switchMemberClick(selectedMember) {
    nombre=selectedMember;
      num=0;
      document.getElementById('Azahara').style.opacity=0;
      document.getElementById('Diego').style.opacity=0;
      document.getElementById('Javier').style.opacity=0;
      document.getElementById('Julio').style.opacity=0;
      document.getElementById('Sergio').style.opacity=0;
  switch(selectedMember){
    case 'Azahara':
      document.getElementById("Azahara").style.display="block";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
      a=setInterval(open,30);
      break;
    case 'Diego':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="block";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
      a=setInterval(open,30);
      break;
    case 'Javier':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="block";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
          a=setInterval(open,30);
      break;
    case 'Julio':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="block";
      document.getElementById("Sergio").style.display="none";
      a=setInterval(open,30);
      break;
    case 'Sergio':
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="block";
      a=setInterval(open,30);
      break;
    default:
      document.getElementById("Azahara").style.display="none";     
      document.getElementById("Diego").style.display="none";
      document.getElementById("Javier").style.display="none";
      document.getElementById("Julio").style.display="none";
      document.getElementById("Sergio").style.display="none";
  }
}
function open(a){
    document.getElementById(nombre).style.opacity=num;
    num=num+0.03;
    if(num>=1)
        clear();
    
}
function clear(){
    clearInterval(a);
}
/* INSIDE METHODS*/