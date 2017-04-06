window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){

}

/*DIRECT METHODS*/
function switchProjectClick(selectedProject) {
  nombre=selectedProject;
      num=0;
      document.getElementById('Hardware').style.opacity=0;
      document.getElementById('Servicios').style.opacity=0;
      document.getElementById('Configuraciones').style.opacity=0;
      document.getElementById('Tecnologias').style.opacity=0;
      

  switch(selectedProject){
    case 'Hardware':
      document.getElementById("Hardware").style.display="block";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="none";
      a=setInterval(open,30);
      break;
    case 'Servicios':
	  document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="block";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="none";
      a=setInterval(open,30);
      break;
    case 'Configuraciones':
      document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="block";
      document.getElementById("Tecnologias").style.display="none";
      a=setInterval(open,30);
      break;
    case 'Tecnologias':
      document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="block";
      a=setInterval(open,30);
      break;
  
    default:
      document.getElementById("Hardware").style.display="none";     
      document.getElementById("Servicios").style.display="none";
      document.getElementById("Configuraciones").style.display="none";
      document.getElementById("Tecnologias").style.display="none";
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