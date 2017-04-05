window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

}

/*DIRECT METHODS*/
function switchProjectClick(selectedProject) {

  switch(selectedProject){
    case 'Hardware':
      document.getElementById("Hardware").style.display="block";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="none";
      break;
    case 'Servicios':
	  document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="block";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="none";
      break;
    case 'Configuraciones':
      document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="block";
      document.getElementById("Tecnologias").style.display="none";
      break;
    case 'Tecnologias':
      document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="block";
      break;
  
    default:
      document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="none";
  }
}
