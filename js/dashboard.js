window.onload = function() {
  this.init(/*param1,param2*/);
};

/*ON DOCUMENT LOAD*/
function init(/*param1,param2*/){
  ajax.post('../php/sessionRetriever.php',{},setSessionDashboard,true);

  //Parse session variables and get the user dashboard profile
  function setSessionDashboard(sessionVariables){
    var obj = JSON.parse(sessionVariables);
    userEmail = obj.email;
    userNick = obj.nick;
    ajax.post('../php/getUserDashboard.php',{email: userEmail},setUserDashboard,true);
  }

  //Use the user dashboard profile to load both js and php cards into right cells
  function setUserDashboard(cardsProfile){
    var obj = JSON.parse(cardsProfile);
    var cellCardList = obj[1];
    cellCardList.forEach(function(cellCard) {
      addCardJSScript(cellCard.cardId);
      placeCardToCell(cellCard.cardId,cellCard.cell);
    }, this);
  }

  //Load needed card js
  function addCardJSScript(cardId){
    var newScript = document.createElement('script');
    newScript.setAttribute("type","text/javascript");
    newScript.setAttribute("src","../js/cards/card-".concat(cardId).concat(".js"));
  }

  //get respective cell 
  function placeCardToCell(cardId,cell){
    var dashboardCell = document.getElementById(cell);
    var cardPHPURL = '../php/cards/card-'.concat(cardId).concat('.php');
    ajax.post(cardPHPURL,{},appendCard,true);

    function appendCard(cardPHP){
      var cardElem = document.createElement(cardPHP);
      dashboardCell.appendChild(cardElem);
    }
  }
}

var userEmail, userNick;

/*DIRECT METHODS*/


/* INSIDE METHODS*/
