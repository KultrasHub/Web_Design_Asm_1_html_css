var namePat=/[a-zA-z0-9]{3,}/;
function CheckValidity()
{
    let nameText=document.getElementById("nameText");
    if(namePat.test(nameText.value))
    {
        console.log("this works");
    }
    else{
        console.log("still works");
    }
}
