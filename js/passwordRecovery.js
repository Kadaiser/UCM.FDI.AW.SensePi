window.onload = function() {
  this.recoverDisabled = false;
  var isInputLocked = false;
  var userEmail = "";
};

/*DIRECT METHODS*/

function userRecoverEmail() {
  this.inputLock();
  this.checkCredentials();
}

/* INSIDE METHODS*/

function checkCredentials() {
  if(!this.recoverDisabled){
    /*DB QUERY WITH EMAIL*/
    if(/*EMAIL SUCCESSFUL QUERY*/true){
      //SEND RECOVER@MAIL TO GIVEN EMAIL
    }
    document.getElementById("resultMessage").value=sentRecoverMessage;
    this.recoverDisabled = true;
  }
  document.getElementById("resultMessage").value=alreadySentRecoverMessage;
}

function inputLock() {
  document.getElementById("userRecoverEmail").disabled=true;
}
