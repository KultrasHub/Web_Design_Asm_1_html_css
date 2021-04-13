var id=null;
function HamDisplay(){
    var nav=document.getElementById("navigationBar");
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
  