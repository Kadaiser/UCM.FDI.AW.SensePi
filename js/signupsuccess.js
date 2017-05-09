window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(){
  setTimeout(function(){redirectToHome();}, 8000);
}

/*DIRECT METHODS*/

function redirectToHome() {
    window.location.href="./login.php";
}

/* INSIDE METHODS*/