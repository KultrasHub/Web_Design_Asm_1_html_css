let DashBoard=document.getElementById("DashBoard");//Block
let AboutUs=document.getElementById("AboutUs");//flex;
let TermOfService=document.getElementById("TermOfService");//block
let PrivacyPolicy=document.getElementById("PrivacyPolicy");
let Setting=document.getElementById("Setting");//flex;
//button
let sideButton=document.getElementsByClassName("sideButton");

function SideClick(index)
{
    if(index==0)
    {
        DashBoard.style.display="block";
        AboutUs.style.display="none";
        TermOfService.style.display="none";
        PrivacyPolicy.style.display="none";
        Setting.style.display="none";
    }
    
    if(index==1)
    {
        DashBoard.style.display="none";
        AboutUs.style.display="flex";
        TermOfService.style.display="none";
        PrivacyPolicy.style.display="none";
        Setting.style.display="none";
    }
    
    if(index==2)
    {
        DashBoard.style.display="none";
        AboutUs.style.display="none";
        TermOfService.style.display="block";
        PrivacyPolicy.style.display="none";
        Setting.style.display="none";
    }
    
    if(index==3)
    {
        DashBoard.style.display="none";
        AboutUs.style.display="none";
        TermOfService.style.display="none";
        PrivacyPolicy.style.display="block";
        Setting.style.display="none";
    }
    
    if(index==4)
    {
        DashBoard.style.display="none";
        AboutUs.style.display="none";
        TermOfService.style.display="none";
        PrivacyPolicy.style.display="none";
        Setting.style.display="flex";
    }
}
//apply functionn
for( let i =0;i<sideButton.length;i++)
{
    sideButton[i].addEventListener("click",function()
    {
        SideClick(i);
    });
}