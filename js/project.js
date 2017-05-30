function loadText(a){

  var xhttp =new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      showInfo(this,a);
    }
  };
  //requerir como metodo asincrono a la carga de la pagina (true)
  xhttp.open("GET","../xml/project.xml",true);
  xhttp.send();
}

function showInfo(xml,a){
  var info = "";
  var xmlDoc = xml.responseXML;

  var name = xmlDoc.getElementsByTagName("about");
  info += "<h1>" + name[a].childNodes[0].nodeValue + "</h1>";
  var about = xmlDoc.getElementsByTagName("information");
  info += "<p>" + about[a].childNodes[0].nodeValue + "</p>";

  /*
  var x = xmlDoc.getElementsByTagName("person");
  var name = x[a].childNodes[0];
  info += "<h1>" + name.nodeValue + "</h1>";
  */
  document.getElementById("info").innerHTML = info;
}
