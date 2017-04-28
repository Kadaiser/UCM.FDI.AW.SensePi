window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

}

/*DIRECT METHODS*/
function switchMemberClick(selectedMember) {
    nombre="desc";
      num=0;
      document.getElementById('desc').style.opacity=0;
      document.getElementById('Diego').style.opacity=0;
      document.getElementById('Javier').style.opacity=0;
      document.getElementById('Julio').style.opacity=0;
      document.getElementById('Sergio').style.opacity=0;
  switch(selectedMember){
    case 'Azahara':
      document.getElementById("desc").style.display="block";     
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

function loadText(a){
  var xmlhttp;
   if (window.XMLHttpRequest){
     // Objeto para IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }else{
    // Objeto para IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
   
  // Abrimos el archivo que esta alojado en el servidor cd_catalog.xml
  xmlhttp.open("GET","../xml/team.xml",true);
  xmlhttp.send();

  // Obtenemos un objeto XMLDocument con el contenido del archivo xml del servidor
  xmlDoc=xmlhttp.responseXML;
 
  // Obtenemos todos los nodos denominados foro del archivo xml
  var names=xmlDoc.getElementsByTagName("name");
  var surnames=xmlDoc.getElementsByTagName("surname");

  var description=xmlDoc.getElementsByTagName("description");
  var i = 0;
  var ok = false;
  var text;

  while(i < names.length && !ok) {
    if(names[i] == a){
      text = "<h1>" + name[i] + surname[i] +"</h1>"+
                  "<p>" + description[i] +"</p>";
      ok = true;
    }
    document.getElementById("desc").innerHTML = text;
    i++;
  }

  switchMemberClick(a);
}