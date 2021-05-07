function CreateCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + value + expires + "; path=/";
}
function readCookie(cname) {
    var name = cname + "=";
    var decodedCookie=decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){ 
            c = c.substring(1, c.length);
        }
        if (c.indexOf(name) == 0){ 
            return c.substring(name.length, c.length)
        };
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
function checkCookie()
{
    var user =getCookie("username");
    if(user!="")
    {
        //do nothing
    }
    else{
        //ask for a cookie
    }
}