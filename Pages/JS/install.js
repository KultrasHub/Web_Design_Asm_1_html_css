var elem;
var repass=document.getElementById("rePasswordInput")
function CheckPassword()
{   //create warning message
    if(elem==null)
    {
        console.log("does this work");
        elem=document.createElement('div');
        elem.id='notify';
        elem.style.display='none';
    }
    let pass=document.getElementById("passwordInput");
    let repassBox=document.getElementById("retypePassBox");
    
    if(repass.value===pass.value)
    {
        //password accept 
        if(elem!=null)
        {

            repass.className='';
            elem.style.display='none';
        }
        return true;
    }else{

        //spawn a notification
        repassBox.appendChild(elem);
        repass.className='invalid';
        elem.textContent="It does not match with your given password";
        elem.className='error';
        elem.style.display='block';
        return false;
    }
}
repass.addEventListener('input',function(){
    CheckPassword();
})
function CheckOnSubmit(e)
{
    let valid=CheckPassword();
    if(valid)
    {
        return true;
    }
    else{
        //prevent default
        e.preventDefault();
        return false;
    }
}
