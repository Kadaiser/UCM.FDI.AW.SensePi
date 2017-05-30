window.onload = function() {
  var mainButton = document.getElementById("mainButton");

  mainButton.addEventListener("submit", () => inputLock());
};


/*DIRECT METHODS*/

function switchForms() {
    window.location.href="./login.php";
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
