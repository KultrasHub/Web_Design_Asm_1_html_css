//TOS
var textBox=document.getElementById("textBox");
textBox.style.display="none";
var editibleBox=document.getElementById("contentTOS").getElementsByTagName("p");
var polBoxes=document.getElementById("contentPol").getElementsByTagName("p");
console.log("pol AMount:"+polBoxes.length);
console.log("boxAMount:"+editibleBox.length);
var currentBox;
for(let i =0;i<editibleBox.length;i++)
{
    editibleBox[i].addEventListener("click",function()
    {
        let tosCheckBox=document.getElementById("TOSCheckBox");
        tosCheckBox.checked=true;
        if(textBox.style.display==="none")
        {
            currentBox=i;
            //text box is offline
            textBox.style.display="flex";
            let editBox=document.getElementById("editBox");
            editBox.value=editibleBox[i].innerHTML;
        }
        else{
            //text box is online 
            //cancel action
        }
    })
}
function CancelTextBox()
{
    if(textBox.style.display!=="none")
    {
        //text box is offline
        textBox.style.display="none";
    }
}
function SaveTextBox()
{
    if(textBox.style.display!=="none")
    {
    //assign the current selected textBox
    let editBox=document.getElementById("editBox");
    let content=editBox.value;
    content=content.replace(/\n/g,'<br>\n');
    editibleBox[currentBox].innerHTML=content;
    textBox.style.display="none";
    }
}
function CollectTOS(){
    let collector="";
    for(let i =0;i<editibleBox.length;i++)
    {
        collector+=editibleBox[i].innerHTML+"-----";
    }
    let hiddenTOS=document.getElementById("hiddenTOS");

    hiddenTOS.value=collector;
}
//privacy Policy
for(let i =0;i<polBoxes.length;i++)
{
    polBoxes[i].addEventListener("click",function()
    {
        let tosCheckBox=document.getElementById("TOSCheckBox");
        tosCheckBox.checked=false;// unused
        if(textBox.style.display==="none")
        {
            currentBox=i;
            //text box is offline
            textBox.style.display="flex";
            let editBox=document.getElementById("editBox");
            editBox.value=polBoxes[i].innerHTML;
        }
        else{
            //text box is online 
            //cancel action
        }
    })
}
function SaveTextBox()
{
    if(textBox.style.display!=="none")
    {
    //assign the current selected textBox
    let editBox=document.getElementById("editBox");
    let content=editBox.value;
    content=content.replace(/\n/g,'<br>\n');
    polBoxes[currentBox].innerHTML=content;
    textBox.style.display="none";
    }
}
function CollectPol(){
    let collector="";
    for(let i =0;i<polBoxes.length;i++)
    {
        collector+=polBoxes[i].innerHTML+"-----";
    }
    let hiddenPol=document.getElementById("hiddenPol");

    hiddenPol.value=collector;
}