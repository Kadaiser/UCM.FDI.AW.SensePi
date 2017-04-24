window.onload = function() {
  basicLoad();
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(){

  this.tryNumber = 0;
  this.loginMatch = false;
  this.loginDisabled = false;
  this.isInputLocked = false;
  this.isSignUpForm = false;

  this.userPhone = "";
  this.userEmail = "";
  this.userPassword = "";
  this.userConfirmPassword = "";
  //TODO: User and password must be requested to user DB.
  this.dbUser = "prueba1";
  this.dbPassword = "prueba1pw";
  //TODO: Phone number and email are not required ftm.
}


/*DIRECT METHODS*/

function switchForms() {
    window.location.href="./login.php";
}


/* INSIDE METHODS*/

function userLogin() {
  //this.inputLock();
  //TODO: Don't check credentials for this sprint ("only" views html & css)
  //this.checkCredentials();
  //if(!this.loginDisabled) this.inputUnlock();
  if(document.getElementById("userEmail").value=="admin"){
    window.location.href="./adminview.php";
  }else{
    window.location.href="./userview.php";
  }
}

function userSignUp() {
  //this.inputLock();
  //TODO: Don't check field data for this sprint ("only" views html & css)
  //this.checkFieldData();
  //this.inputUnlock();
}

function checkCredentials() {
  var identifiedAccount = false;
  if(!this.loginDisabled){
    /*DB QUERY WITH USER*/
    if(/*USER SUCCESSFUL QUERY*/true){
      //REGISTER USER PARAMETERS, ONLY CHECK PASSWORD
      identifiedAccount = true;
    }else{
    /*DB QUERY WITH EMAIL*/
      if(/*EMAIL SUCCESSFUL QUERY*/true){
      //REGISTER USER PARAMETERS, ONLY CHECK PASSWORD
      identifiedAccount = true;
      }
    }
    if(identifiedAccount && this.userPassword == this.dbPassword){
      this.loginMatch = true;
      document.getElementById("resultMessage").value=loginSuccess;
    }else{
      this.loginMatch = false;
      switch(this.tryNumber){
        case 0:
          document.getElementById("resultMessage").value=loginFail1;
          break;
        case 1:
          document.getElementById("resultMessage").value=loginFail2;
          break;
        default:
          this.warningLockForm();
      }
      this.tryNumber++;
    }
  }else{
    //Further failed attempts control.
  }
}

function checkFieldData() {
  //Store temp values
  var newPasswordInput = this.userPassword;
  var newConfirmPasswordInput = this.userConfirmPassword;
  var newEmail = this.userEmail;

  //Check password and confirmation
  if(newPasswordInput == newConfirmPasswordInput){
    if(validateEmail(newEmail)){
      /*DB QUERY FOR USER AND EMAIL*/
      if(true){
        /*DB REQUEST FOR REGISTERING USER, EMAIL AND PASSWORD*/
        document.getElementById("resultMessage").value=signUpSuccess;
      }else{
        document.getElementById("resultMessage").value=signUpFail;
      }
    }else{
      document.getElementById("resultMessage").value=signUpWrongEmail;
    }
  }else{
    document.getElementById("resultMessage").value=signUpWrongPassword;
  }
}

function validateEmail(emailString){
  var isEmailValid = false;
  //Check the email: SHOULD ONLY DO IT THROUGH PHP?
  if(true){
    isEmailValid = true;
  }
  return isEmailValid;
}

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

function warningLockForm(){
  this.inputLock();
  this.loginDisabled = true;
    document.getElementById("warningMessage").style.display="block";
    document.getElementById("warningMessage").innerHTML=warningMessageText;
  document.getElementById("resultMessage").value=loginFail3;
}
