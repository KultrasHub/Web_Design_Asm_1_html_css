var id=null;
var nav;

function HamDisplay(){
    nav=document.getElementById("navigationBar");
    var checkHam=document.getElementById("check");
    if(checkHam.checked)
    {
        nav.style.display="flex";
        nav.style.top="-500px";
        var pos = -500;
    clearInterval(id);
    id = setInterval(frame,1);
    function frame() {
        if (pos >= 80) {
          clearInterval(id);
          nav.style.top ='80px';
        } else {
          pos+=15;
          nav.style.top = pos + 'px';
        }
      }
    }
    else{
        var pos = 80;
         clearInterval(id);
     id = setInterval(frame,1);
        function frame() {
        if (pos <= -500) {
          clearInterval(id);
          nav.style.display="none";
        } else {
          pos-=45;
          nav.style.top = pos + 'px';
        }
      }
    }
}

function myFunction(x) {
    var nav=document.getElementById("navigationBar");

    if (x.matches) { // If media query matches

        nav.style.display="flex";
    }
  }

  var x = window.matchMedia("(min-width: 1050px)");
  myFunction(x) ;
  x.addEventListener(myFunction)

//javascript of new05 adding by Kent//
  function inputBox() {
   var password= new RegExp ('password')
   if (password.test(Password)) {
      return true
   }
   else {
      alert("Incorrect Password or Username")
   }
   var emailUser= new RegExp (/^[A-Za-z0-9_.]{2,100}+@[A-Za-z0-9.-]{2,100}+\.[A-Za-z]{2,100}$/)
   if (emailUser.test(User Email)) {
      return true
   }
   else {
      alert("Incorrect Password or Username")
   }
}
