//pattern
var namePat=/[a-zA-z0-9]{3,}/;
var emailPat=/^(([a-zA-Z0-9]+[.]?)+[a-zA-Z0-9]*){3,}@(([a-zA-Z0-9]+[.]?)*[a-zA-Z0-9]+)+([.]{1}[a-zA-Z0-9]{2,})+$/;
var phonePat=/^([0-9][-.]?){9,11}$/;
//document
var form =document.getElementById('form');
var inputBox=document.getElementsByClassName("inputBox");
var radioBox=document.getElementsByClassName("radioBox");
var checkBox=document.getElementsByClassName("checkBox");

//input 
var nameText=document.getElementById("nameText");
var emailText=document.getElementById("emailText");
var phoneText=document.getElementById("phoneText");

//radioBox
var phoneRadio=document.getElementById("Phone");
var emailRadio=document.getElementById('Email');
//check Box
var check_Boxes=checkBox[0].getElementsByTagName('input');
//message Box
var messageText=document.getElementById("messageBox");
var elem;//warning messagae;
//popUpMenu
var popUpMenu=document.getElementById("PopUp");
function PostChecking()
{
    var valid=CheckValidity();
    if(valid)
    {
        //display a pop up menu
        popUpMenu.style.display="flex";
    }
}
function HidePopUpMenu()
{
    popUpMenu.style.display="none";
}
function CheckValidity()
{
    //create warning message
         elem=document.createElement('div');
        elem.id='notify';
        elem.style.display='none';
    //check input box
    if(!namePat.test(nameText.value))
    {   inputBox[0].appendChild(elem);
        nameText.className='invalid';    
        elem.textContent="Username should contain at least 3 characters";
        elem.className='error';
        elem.style.display='block';
        return false;
    }if(!emailPat.test(emailText.value))
    {
        inputBox[1].appendChild(elem);
        emailText.className='invalid';
        elem.textContent="[name]@[domain] no '#$!%^&*()_+=- <>??/:,' allowed domain must contain a dot"
        elem.className='error';
        elem.style.display='block';
        return false;

    }if(!phonePat.test(phoneText.value))
    {
        inputBox[2].appendChild(elem);
        phoneText.className='invalid';
        elem.textContent="restricted to 9 to 11 digits, - and . are allowed"
        elem.className='error';
        elem.style.display='block';
        return false;
    }
    //check radio
    if(!phoneRadio.checked&&!emailRadio.checked){
        
        radioBox[0].appendChild(elem);
        elem.textContent="Please select one option!"
        elem.className='error';
        elem.style.display='block';
        return false;
    }
    //check check box
    //loop through all boxes if one is checked switch oneChecked to true
    //if(oneChecked is false) that means no check boxes are checked
    let oneChecked=false;
    for (var i=0;i<check_Boxes.length;i++)
    {
        if(check_Boxes[i].checked){
            oneChecked=true;
            break;
        }
    }
    if(!oneChecked){
        checkBox[0].appendChild(elem);
        elem.textContent="Please select at least one day!"
        elem.className='error';
        elem.style.display='block';
        return false;
    }
    //message Text
    var messageLength=messageText.value.length;
    if(messageLength<50)
    {
        inputBox[3].appendChild(elem);
        messageText.className='invalid';
        elem.textContent="zzz isn't it too short?!"
        elem.className='error';
        elem.style.display='block';
        return false;
    }
    else if(messageLength>=50 &&messageLength<=500)
    {
        inputBox[3].appendChild(elem);
        messageText.className='invalid';
        elem.textContent="try a bit more? it will helps us improve our service."
        elem.className='advice';
        elem.style.display='block';
    }
    else if(messageLength>500)
    {
        inputBox[3].appendChild(elem);
        messageText.className='invalid';
        elem.textContent="Hey! too long please go under 500 characters!"
        elem.className='error';
        elem.style.display='block';
        return false;
    }

    return true;
}
//remove notification on inputting
nameText.addEventListener('input',function(event){
    if(elem!=null)
    {
    if('block'===elem.style.display)
    {
        nameText.className='';
        elem.style.display='none';
    }
}
});
emailText.addEventListener('input',function(event){
    if(elem!=null)
    {
    if('block'===elem.style.display)
    {
        emailText.className='';
        elem.style.display='none';
    }
}
});
phoneText.addEventListener('input',function(event){
    if(elem!=null)
    {
    if('block'===elem.style.display)
    {
        phoneText.className='';
        elem.style.display='none';
    }
    }
});
//radio
phoneRadio.addEventListener('input',function(event){
    if(elem!=null)
    {
    if('block'===elem.style.display)
    {
        //phoneText.className='';
        elem.style.display='none';
    }
    }
});
emailRadio.addEventListener('input',function(event){
    if(elem!=null)
    {
    if('block'===elem.style.display)
    {
        //phoneText.className='';
        elem.style.display='none';
    }
    }
});
//checkBoxes
for(var i=0;i<check_Boxes.length;i++)
{
    check_Boxes[i].addEventListener('input',function(event){
        if(elem!=null)
        {
        if('block'===elem.style.display)
        {
            //phoneText.className='';
            elem.style.display='none';
        }
        }
    });
}
messageText.addEventListener('input',function(event){
    if(elem!=null)
    {
    if('block'===elem.style.display)
    {
        messageText.className='';
        elem.style.display='none';
    }
    }
});