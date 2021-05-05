
var online=false;
function DisplayNavBar()
{
    var navBar=document.getElementById("navBar");
    if(!online)
    {
    navBar.classList.add('active');
    
    }
    else{
        navBar.classList.remove('active');
    }
    online=!online;
    
}
function todo(link)
{
    location.href=link;
    console.log("todo running");
    DisplayNavBar();
}