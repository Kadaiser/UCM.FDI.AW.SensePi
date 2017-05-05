//I create an ajax item (as this module item) on which will work most procedures we're coding next
var ajax = {};

//Anonymous function to execute a GET request
//   an URL
//   the data item to send
//   a callback function to call when it gets the answer back
//   boolean to launch asynchronous unless specified different
//And sends it with those settings through ajax.send method described later
ajax.get = function (url, data, callback, async) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async)
};

//Anonymous function to execute a POST request
//   an URL
//   the data item to send
//   a callback function to call when it gets the answer back
//   boolean to launch asynchronous unless specified different
//And sends it with those settings through ajax.send method described later
ajax.post = function (url, data, callback, async) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url, callback, 'POST', query.join('&'), async)
};

//Anonymous function that takes:
//   an URL
//   a callback function to call when it gets the answer back
//   the method get,post,etc.
//   the data item to send
//   boolean to launch asynchronous unless specified different
//And sends it with those settings through an XMLHttpRequest
ajax.send = function (url, callback, method, data, async) {
    if (async === undefined) {
        async = true;
    }
    //we create an XMLHttpRequest object and open it
    var x = ajax.x();
    x.open(method, url, async);
    x.onreadystatechange = function () {
        if (x.readyState == 4) {
            callback(x.responseText)
        }
    };
    if (method == 'POST') {
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    x.send(data)
};

//Anonymous function that returns a XMLHttpRequest object on the most recent possible version
ajax.x = function () {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }
    var versions = [
        "MSXML2.XmlHttp.6.0",
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < versions.length; i++) {
        try {
            xhr = new ActiveXObject(versions[i]);
            break;
        } catch (e) {
        }
    }
    return xhr;
};