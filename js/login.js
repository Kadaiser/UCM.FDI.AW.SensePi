window.onload = function() {
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(){

  var mainButton = document.getElementById("mainButton");

  mainButton.addEventListener("submit", () => inputLock());
}

/*DIRECT METHODS*/

function switchForms() {
    window.location.href="./signup.php";
}

/* INSIDE METHODS*/

function inputLock() {
  var fields = document.getElementsByClassName("field");
  fields = [].slice.call(fields);
  fields.forEach(function(field) {
    field.disabled=true;
  }, this);
}

function inputUnlock() {
  var fields = document.getElementsByClassName("field");
  fields = [].slice.call(fields);
  fields.forEach(function(field) {
    field.disabled=false;
  }, this);
}
