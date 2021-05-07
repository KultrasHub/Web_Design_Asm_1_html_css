
function CreateCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value +";"+ expires + ";path=/";
}
function ReadCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){ 
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0){ 
            return c.substring(name.length, c.length)
        };
    }
    return "";
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
function CheckCookie()
{
    var user =ReadCookie("username");
    

    if(user!=""&&user!=null)
    {
        //do nothing
        console.log('cookies found');
    }
    else{
        //ask for a cookie
        console.log('cookies unfound'+user);
        ShowCookie();
    }
}
function ShowCookie()
{
    var cookiesMenu=document.getElementById("cookies");
    //open Cookies
    cookiesMenu.style.display="flex";
    cookiesMenu.style.bottom="0";
}
//NOTICE
//Hide Cookie should be in Create Cookie function but not Create Cookie is called in HideCookie()
//becase HideCookie() is the one get called on cookie menu
//not fixed;
function HideCookie()
{
    user = prompt("Please enter your name:","");
    CreateCookie("username",user,7);
    var cookiesMenu=document.getElementById("cookies");
    //open Cookies
    cookiesMenu.style.display="none";
    cookiesMenu.style.bottom="-40px";
}
setTimeout(function(){
    CheckCookie();
},5000);