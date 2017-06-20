window.onload = function() {
  this.init(/*param1,param2*/);
};

var dashboard = {
  selectedRoom : null,
  selectedSlot : null,
  selectedTrack : null
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
  ajax.post('../php/sessionRetriever.php',{},setSessionDashboard,true);
}

//Parse session variables and get the user dashboard profile
function setSessionDashboard(sessionVariables){
  var obj = JSON.parse(sessionVariables);
  userEmail = obj.userEmail;
  userNick = obj.nick;
  ajax.post('../php/services/getUserDashboard.php',{email: userEmail},setUserDashboard,true);
}

//Use the user dashboard profile to load both js and php cards into right cells
function setUserDashboard(cardsProfile){
  var cellCardList = JSON.parse(cardsProfile);
  cellCardList.forEach(function(cellCard) {
    addCardJSScript(cellCard.cardIdentity);
    placeCardInCell(cellCard.cardIdentity,cellCard.cell);
  }, this);
}

//Load needed card js
function addCardJSScript(cardId){
  var newScript = document.createElement('script');
  newScript.setAttribute("type","text/javascript");
  newScript.setAttribute("src","../js/cards/".concat(cardId,".js"));
  newScript.setAttribute("onload","init_".concat(cardId,"()"));
  //get all script elements
  var allScriptsArray = document.getElementsByTagName("script");
  //get last script
  var currentLastScript = allScriptsArray[allScriptsArray.length-1];
  //append newScript after that one
  currentLastScript.insertAdjacentElement('afterend',newScript);
}

//get respective cell
function placeCardInCell(cardId,cell){
  var dashboardCell = document.getElementById(cell);
  dashboardCell.style.backgroundColor = '#999';
  var cardPHPURL = '../php/cards/'.concat(cardId,'.php');
  ajax.post(cardPHPURL,{},appendCard,true);

  function appendCard(cardPHP){
    var cardDiv = document.createElement('div');
    cardDiv.innerHTML=cardPHP;
    dashboardCell.appendChild(cardDiv);
  }
}

var userEmail, userNick;

/*DIRECT METHODS*/


/* INSIDE METHODS*/
