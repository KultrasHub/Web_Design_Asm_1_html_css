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

var x = window.matchMedia("(min-width: 1050px)");
myFunction(x) ;
function myFunction(x) {
    var nav=document.getElementById("navigationBar");

    if (x.matches) { // If media query matches

        nav.style.display="flex";
    }
  }

  myFunction(x) ;
<<<<<<< HEAD

=======
  x.addEventListener(myFunction)
>>>>>>> 51b56c08b114a2514831c7a32728894dfc83ec97
