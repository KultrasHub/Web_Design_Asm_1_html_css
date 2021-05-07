function LoadLogInformation()
{
    var emailTextBox=document.getElementById("email");
    var emailData=window.localStorage.getItem("userEmail");
    if(emailData!=null)
    {
    emailTextBox.innerHTML=emailData;
    }
}
window.onload=function(){
    LoadLogInformation();
}