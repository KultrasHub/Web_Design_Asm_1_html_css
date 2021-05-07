
function infoFunc(){

  //var for checking
  var emailCheck =/^(([a-zA-Z0-9]+[.]?)+[a-zA-Z0-9]*){3,}@(([a-zA-Z0-9]+[.]?)*[a-zA-Z0-9]+)+([.]{1}[a-zA-Z0-9]{2,})+$/;

  var phoneCheck =/^([0-9][-.]?){9,11}$/;

  var passCheck =/^(?=.{8,20})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;

  var allCheck =/(?=.{3,})/;

  var zipCheck=/[0-9](?=.{4,6})/;

  //values
  var emailValue = document.getElementById("emailVeri").value;

  var phoneValue = document.getElementById("phoneVeri").value;

  var passValue = document.getElementById("passVeri").value;

  var rePassValue = document.getElementById("rePassVeri").value;

  var firstValue = document.getElementById("firstVeri").value;

  var lastValue = document.getElementById("lastVeri").value;

  var cityValue = document.getElementById("cityVeri").value;

  var addressValue = document.getElementById("addressVeri").value;

  var zipValue = document.getElementById("zipVeri").value;

  //Conditions
  if(!emailCheck.test(emailValue)){
    alert("Please recheck your email as is it not in the correct format.");
    return false;
  }

  if(!phoneCheck.test(phoneValue)){
    alert("Please recheck your phone as is it not in the correct format.");
    return false;
  }

  if(passCheck.test(passValue) == true){
    if(rePassValue != passValue){
			alert("You retyped it wrong.");
      return false;
    }
  } else {
    alert("The password requires 8-20 characters including an uppercase, lowercase, atleast one special character and digit.");
    return false;
  }

  if(allCheck.test(firstValue) == false){
    alert("First name needs to be 3 characters or more.");
  } else if (allCheck.test(lastValue) == false) {
    alert("Last name needs to be 3 characters or more.");
  } else if (allCheck.test(cityValue) == false) {
    alert("City needs to be 3 characters or more.");
  } else if (allCheck.test(addressValueValue) == false) {
    alert("Address needs to be 3 characters or more.");
  }

  if(zipCheck.test(zipValue) == false){
    alert("Zip needs to contain between 4-6 digits.");
  }
  return true;
}
