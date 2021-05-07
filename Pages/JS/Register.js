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
		if(rePassValue == passValue){
			alert("congrats");
		}else{
			alert("you retyped it wrong");
		}

	}else{
		alert("You did not meet the requirements for the password, please try again");
	}

	//testing/debugging command: alert(passValue + ":" + passResult);
}
