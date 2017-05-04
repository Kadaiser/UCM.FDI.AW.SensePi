window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

}

/*DIRECT METHODS*/

/* INSIDE METHODS*/

function loadText(a){

  var xhttp =new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      showInfo(this,a);
    }
  };
  //requerir como metodo asincrono a la carga de la pagina (true)
  xhttp.open("GET","../xml/team.xml",true);
  xhttp.send();
}

function showInfo(xml,a){
  var info = "";
  var xmlDoc = xml.responseXML;

  var name = xmlDoc.getElementsByTagName("name");
  info += "<h1>" + name[a].childNodes[0].nodeValue + "</h1>";
  var about = xmlDoc.getElementsByTagName("about");
  info += "<p>" + about[a].childNodes[0].nodeValue + "</p>";
  var face = xmlDoc.getElementsByTagName("facebook");
  var gh = xmlDoc.getElementsByTagName("github");
  
  document.getElementById("facebook").href = face[a].childNodes[0].nodeValue;
  document.getElementById("github").href = gh[a].childNodes[0].nodeValue;

  /*
  var x = xmlDoc.getElementsByTagName("person");
  var name = x[a].childNodes[0];
  info += "<h1>" + name.nodeValue + "</h1>";
  */
  document.getElementById("info").innerHTML = info;
}
