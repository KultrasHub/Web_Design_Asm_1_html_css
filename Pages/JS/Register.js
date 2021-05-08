var elem;
function FormValidate() {
  var valid = infoFunc();
  if (valid) {

    window.location.replace("Register_Image.html");
  }
}
window.onload = function () {
  var email = document.getElementById("emailVeri");
  var phone = document.getElementById("phoneVeri");
  var pass = document.getElementById("passVeri");
  var rePass = document.getElementById("rePassVeri");
  var first = document.getElementById("firstVeri");
  var last = document.getElementById("lastVeri");
  var city = document.getElementById("cityVeri");
  var address = document.getElementById("addressVeri");
  var zip = document.getElementById("zipVeri");

  email.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  phone.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  pass.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  rePass.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  first.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  last.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  city.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  address.addEventListener("input", function () {
    if (elem != null) {
      elem.style.display = 'none';
    }
  })
  zip.addEventListener("input", function () {
    if(elem!=null)
    {
    elem.style.display = 'none';
    }
  })

}
function infoFunc() {

  //var for checking
  var emailCheck = /^(([a-zA-Z0-9]+[.]?)+[a-zA-Z0-9]*){3,}@(([a-zA-Z0-9]+[.]?)*[a-zA-Z0-9]+)+([.]{1}[a-zA-Z0-9]{2,})+$/;
  var phoneCheck = /^([0-9][-.]?){9,11}$/;
  var passCheck = /^(?=.{8,20})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;
  var allCheck = /(?=.{3,})/;
  var zipCheck = /^[0-9]{4,6}$/;

  //Create warning message
  elem = document.createElement('div');
  elem.id = "notify";
  elem.style.display = "none";

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
  //inputBox
  let inputBoxes = document.getElementsByClassName('inputBox');
  //Conditions
  if (!zipCheck.test(zipValue)) {
    inputBoxes[8].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "4 to 6 digits only";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }
  if (!emailCheck.test(emailValue)) {
    inputBoxes[3].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "[name]@[domain] no special characters allowed in name and domain, domain must contain a dot";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }

  if (!phoneCheck.test(phoneValue)) {
    inputBoxes[2].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "9 to 11 digits with only -. allowed";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }

  if (passCheck.test(passValue) == true) {
    if (rePassValue != passValue) {
      inputBoxes[5].appendChild(elem);
      //nameText.className='invalid';
      elem.textContent = "not match with the original password";
      elem.className = 'error';
      elem.style.display = 'block';
      return false;
    }
  } else {
    inputBoxes[4].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "The password requires 8-20 characters including an uppercase, lowercase, atleast one special character and digit.";
    elem.className = 'error';
    elem.style.display = 'block';

    return false;
  }

  if (!allCheck.test(firstValue)) {
    inputBoxes[0].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "At least 3 characters";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }
  if (!allCheck.test(lastValue)) {
    inputBoxes[1].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "At least 3 characters";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }
  if (!allCheck.test(cityValue)) {
    inputBoxes[7].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "At least 3 characters";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }
  if (!allCheck.test(addressValue)) {
    inputBoxes[6].appendChild(elem);
    //nameText.className='invalid';
    elem.textContent = "At least 3 characters";
    elem.className = 'error';
    elem.style.display = 'block';
    return false;
  }

  return true;
}
