var dropCookie = true;
var cookieDuration = 14;
var cookieName = 'complianceCookie';
var cookieValue = 'on';

function createDiv(){
    var bodytag = document.getElementsByTagName('body')[0];
    var div = document.createElement('div');
    div.setAttribute("id","cookie-law");
    div.innerHTML = '<p>Our website uses cookies. By continuing we assume your permission to deploy cookies, as detailed in our <a href="../privacy-cookies-policy.php" rel="nofollow" title="Privacy &amp; Cookies Policy">privacy and cookies policy</a>. <a class="close-cookie-banner" href="javascript:void(0);" onclick="removeMe();"><span>X</span></a></p>';

    bodytag.appendChild(div); // Adds the Cookie Law Banner just before the closing </body> tag
    bodytag.insertBefore(div,bodytag.firstChild); // Adds the Cookie Law Banner just after the opening <body> tag
    //document.getElementsByTagName('body')[0].className+=' cookiebanner'; //Adds a class tothe <body> tag when the banner is visible
    createCookie(window.cookieName,window.cookieValue, window.cookieDuration); // Create the cookie
}

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    if(window.dropCookie) {
        document.cookie = name+"="+value+expires+"; path=/";
    }
}

function checkCookie(name) {
  var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0)
          return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}

window.onload = function(){
    if(checkCookie(window.cookieName) != window.cookieValue){ //coment for tensting
        createDiv();
    }
}

function removeMe(){
  var element = document.getElementById('cookie-law');
  element.parentNode.removeChild(element);
}
