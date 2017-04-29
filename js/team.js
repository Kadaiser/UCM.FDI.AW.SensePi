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
  var x = xmlDoc.getElementsByTagName("name");
  info += "<h1>" + x[a].childNodes[0].nodeValue + "</h1>";
  info += "<p>" + x[a].childNodes[0].nodeValue + "</p>";
  document.getElementById("info").innerHTML = info;
}
