var id = null;
var nav;

function HamDisplay() {
  nav = document.getElementById("navigationBar");
  var checkHam = document.getElementById("check");
  if (checkHam.checked) {
    nav.style.display = "flex";
    nav.style.top = "-500px";
    var pos = -500;
    clearInterval(id);
    id = setInterval(frame, 1);
    function frame() {
      if (pos >= 80) {
        clearInterval(id);
        nav.style.top = '80px';
      } else {
        pos += 15;
        nav.style.top = pos + 'px';
      }
    }
  }
  else {
    var pos = 80;
    clearInterval(id);
    id = setInterval(frame, 1);
    function frame() {
      if (pos <= -500) {
        clearInterval(id);
        nav.style.display = "none";
      } else {
        pos -= 45;
        nav.style.top = pos + 'px';
      }
    }
  }
}

function MyAccount() {
  var logged = window.localStorage.getItem("logStatus");
  if (logged != null) {
    if (logged) {
      window.location.replace("MyAccount-Logged.html");
    }
    else {
      //not logged in
      window.location.replace("MyAccount-Login.html");
    }
  }
  else {
    //not logged in 
    window.location.replace("MyAccount-Login.html");
  }

}


