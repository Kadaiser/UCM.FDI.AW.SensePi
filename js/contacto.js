window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
  document.getElementById("nickLabel").innerHTML=NickText;
  document.getElementById("emailLabel").innerHTML=EmailText;
  document.getElementById("evaluation").innerHTML=evaluation;
  document.getElementById("suggest").innerHTML=suggest;
  document.getElementById("review").innerHTML=review;
  document.getElementById("accordance").innerHTML=accordance;
  document.getElementById("textArea").innerHTML=texAreaContact;
}

var isAccordance = false;


/*DIRECT METHODS*/


/* INSIDE METHODS*/
