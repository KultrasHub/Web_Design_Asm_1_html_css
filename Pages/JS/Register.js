
function infoFunc(){
  //var emailCheck =/email/;
  //var phoneCheck =/phone/;

  //Condition for password
  var passCheck =/^(?=.{8,20})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;

  //Getting values for password/retype inputs
  var passValue = document.getElementById("passVeri").value;
  var rePassValue = document.getElementById("rePassVeri").value;

  //conditions for the password/retype field
  if(passCheck.test(passValue) == true){
    if(rePassValue != passValue){
			alert("You retyped it wrong.");
      return false;
		}
	}else{
		alert("The password requires 8-20 characters including an uppercase, lowercase, atleast one special character and digit.");
    return false;
	}

	//testing/debugging command: alert(passValue + ":" + passResult);


  //Moving on to first/last name, address and city
  var allCheck =/(?=.{3,})/;

  //Getting values for each part
  var firstValue = document.getElementById("firstVeri").value;
  var lastValue = document.getElementById("lastVeri").value;
  var cityValue = document.getElementById("cityVeri").value;
  var addressValue = document.getElementById("addressVeri").value;

  //Condition for the info above (I made it detailly to let user know where they got it wrong)
  if(allCheck.test(firstValue) == false){
    alert("First name needs to be 3 characters or more.");
  }else if(allCheck.test(lastValue) == false){
    alert("Last name needs to be 3 characters or more.");
  }else if(allCheck.test(cityValue) == false){
    alert("City needs to be 3 characters or more.");
  }else if(allCheck.test(addressValueValue) == false){
    alert("Address needs to be 3 characters or more.");
  }

  //Zip value
  var zipCheck=/(?=.{4,6})/;

  //Getting Values for Zipcode
  var zipValue = document.getElementById("zipVeri").value;

  //checking alert(zipValue + ": " + zipCheck.test(zipValue));

  //Condition and alerting
  if(zipCheck.test(zipValue) == false){
    alert("Zip needs to contain between 4-6 digits.");
  }
}