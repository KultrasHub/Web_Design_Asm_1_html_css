var modalWindow=document.getElementById("modalWindow");
var mainPhoto=document.getElementById("mainPhoto");
var clickImgs=document.getElementsByClassName("clickImg");
function ShowModalWindow(index)
{
    //get link
    var link=clickImgs[index].getAttribute('src');
    //turn on modalWindow and assign link
    modalWindow.style.display="flex";
    mainPhoto.setAttribute("src",link);
    //disable scrolling
    window.addEventListener('scroll', noScroll);
}
function HideModalWindow()
{
    modalWindow.style.display="none";
    //activate scrolling
    window.removeEventListener('scroll', noScroll);
}
function noScroll() {
    window.scrollTo(0, 0);
  }
  
clickImgs[0].onclick=function(){ShowModalWindow(0);}
clickImgs[1].onclick=function(){ShowModalWindow(1);}
clickImgs[2].onclick=function(){ShowModalWindow(2);}
modalWindow.addEventListener("click",function(){
HideModalWindow();
})
mainPhoto.addEventListener("click",function(e){
    e.stopPropagation();
})
