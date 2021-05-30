
var elem;//warning menu
var emailText = document.getElementById("emailInput");
var passwordText = document.getElementById("passwordInput");
function Login()
{
  var valid=CheckValidity();
  if(valid)
  {
    window.location.replace("MyAccount-Logged.php");
  }
}
function CheckValidity() {
  //password
  var defaultPassword = "password";
  //pattern
  //only email pattern check for this page -- fun :D
  var emailPat = /^(([a-zA-Z0-9]+[.]?)+[a-zA-Z0-9]*){3,}@(([a-zA-Z0-9]+[.]?)*[a-zA-Z0-9]+)+([.]{1}[a-zA-Z0-9]{2,})+$/;
  // var passPat='';
  //input Box
  var inputBox = document.getElementsByClassName("inputBox");
  //input
  var emailText = document.getElementById("emailInput");
  var passwordText = document.getElementById("passwordInput");
  //warning message set up
  elem = document.createElement('div');
  elem.id = 'notify';
  elem.style.display = 'none';
  //start checking
  if (!emailPat.test(emailText.value)) {
    inputBox[0].appendChild(elem);
    emailText.className = 'invalid';
    elem.textContent = "[name]@[domain] no special character allowed, domain must contain a dot,name must be longer than 3 characters"
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }
  //now checking password
  if (passwordText.value == defaultPassword) {
    //login successfully
  }
  else {
    //wrong password
    inputBox[1].appendChild(elem);
    passwordText.className = 'invalid';
    elem.textContent = "Oopsie wrong password!? did you forget it? try 'forgot password' section"
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }
  //save email
  window.localStorage.setItem('userEmail',emailText.value);
  window.localStorage.setItem('logStatus',true);
  return true;
  //remove notify
}
emailText.addEventListener("input",function(){
  emailText.className="";
  elem.style.display="none";
});
passwordText.addEventListener("input",function(){
  passwordText.className = ''; 
  elem.style.display="none";
});