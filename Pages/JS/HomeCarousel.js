//shop carousel
let shopCarousel = document.getElementsByClassName('container');
//button
let rightButton = document.getElementsByClassName('right-slider-button');
let leftButton = document.getElementsByClassName('left-slider-button');
let showAmount = 2;//change depends on the screen size
//speed priority
let l = 0;
let movePer = 1;
//shop box
var boxWidth = 200;
var boxspace = 40;
//product Box
var productSpace=20;
//control property
var scrollable = [false, false, false, false];
//trigger
var onLeftClick = false;
//intervals not working with array--do manually
var intervals=new Array(4);
//prevent from multiple run
var alreadyRun = [false, false, false, false];

//Mobile view
let mobView = window.matchMedia("(max-width: 425px)");
var autoScroll = true;
if (mobView.matches) {
    console.log("autoscroll disable");
    autoScroll = false;
}
//start
function Start() {
    // check each carousel if there is enough boxes to scroll
    for (var i = 0; i < shopCarousel.length; i++) {
        var productBoxes;
        if (i % 2 == 0) {
            productBoxes = shopCarousel[i].getElementsByClassName('box');
            var space=boxspace;
        }
        else {
            productBoxes = shopCarousel[i].getElementsByClassName('ProductBox');
            var space=productSpace;
        }
        var totalLength = productBoxes.length * (boxWidth + space);
        if (totalLength >= window.innerWidth) {
            scrollable[i] = true;
            Run(i);//auto scroll 
        }
        else {
            shopCarousel[i].style.justifyContent = "center";
        }
    }
    //rung right mover at start()
}
setTimeout(Start(), 0);

//Mobile click
var ResetTimeOut;
let leftClick = (index) => {

    var shopBoxes;
    if (index % 2 == 0) {
        shopBoxes = shopCarousel[index].getElementsByClassName('box');
        var space=boxspace;
    }
    else {
        shopBoxes = shopCarousel[index].getElementsByClassName('ProductBox');
        var space=productSpace;
    }
    movePer = (boxWidth + space);
    l = l + movePer;
    var maxMove = (boxWidth + space) * (shopBoxes.length + 3) / 2 - window.innerWidth;
    for (const i of shopBoxes) {
        if (l > maxMove) { l = l - movePer; }
        console.log("l is:" + l);
        i.style.left = l + 'px';
    }

}
let rightClick = (index) => {

    var shopBoxes
    if (index % 2 == 0) {
        shopBoxes = shopCarousel[index].getElementsByClassName('box');
        var space=boxspace;
    }
    else {
        shopBoxes = shopCarousel[index].getElementsByClassName('ProductBox');
        var space=productSpace;
    }
    movePer = (boxWidth + space);
    l = l - movePer;
    var maxMove = (boxWidth + space) * (shopBoxes.length + 3) / 2 - window.innerWidth;
    if (shopBoxes == 1) { l = 0; }
    for (const i of shopBoxes) {
        if (l < -maxMove) { l = l + movePer; }
        //console.log("l is:"+l);
        i.style.left = l + 'px';
    }
}
//autoscroll on larger device
var count = [0, 0, 0, 0];// used to move the first boxes to the last boxes; for four carousel

let rightMover = (index) => {
    if (index % 2 == 0) {
        var shopBoxes = shopCarousel[index].getElementsByClassName('box');
        var space=boxspace;
    }
    else {
        var shopBoxes = shopCarousel[index].getElementsByClassName('ProductBox');
        var space=productSpace;
    }
    movePer = (boxWidth + space);//speed

    if (shopBoxes == 1) { l = 0; }

    for (var i of shopBoxes) {
        let currentPos = i.style.left;
        if (currentPos == "") {
            i.style.left = '-' + movePer + 'px';
            //console.log("hwo many time this is caleld");
        }
        else {
            let rawCurrentPos = parseInt(currentPos, 10);
            rawCurrentPos -= movePer;
            i.style.transition = "all 300ms ease-in-out 0s";
            i.style.left = rawCurrentPos + 'px';
            //console.log("after shop boxes Pos:"+i.style.left);
        }
    }
    count[index] += 1;
    var result = (count[index] - 1) % shopBoxes.length;
    var goBackDistance = (boxWidth + space) * (shopBoxes.length);
    if (result >= 0) {
        let currentPosition = shopBoxes[result].style.left;
        let rawCurrentPos = parseInt(currentPosition, 10);
        rawCurrentPos += goBackDistance
        // console.log("current pos:"+rawCurrentPos);
        shopBoxes[result].style.transition = "unset";
        shopBoxes[result].style.left = rawCurrentPos + 'px';
        // console.log("shopBoexes pos:"+shopBoxes[result-2].style.left);
    }

}
//trigger
function Run(index) {
    if (!alreadyRun[index]) {
        if (autoScroll)//prevent auto scroll in mobile device
        {
            //only run if this it passed the check of the total length 
            if (scrollable[index]) {
                alreadyRun[index] = true;
                intervals[index] = setInterval(() => {
                    rightMover(index);
                }, 1000);//could do more to have more natural speed

            }
        }
    }
}

function Cancel(index) {

    //reset already run
    alreadyRun[index] = false;
    clearInterval(intervals[index]);
}
//button
leftButton[0].onclick = () => { leftClick(0) };
rightButton[0].onclick = () => { rightClick(0) };

leftButton[1].onclick = () => { leftClick(1) };
rightButton[1].onclick = () => { rightClick(1) };

leftButton[2].onclick = () => { leftClick(2) };
rightButton[2].onclick = () => { rightClick(2) };

leftButton[3].onclick = () => { leftClick(3) };
rightButton[3].onclick = () => { rightClick(3) };
//hover
shopCarousel[0].onmouseover = () => { Cancel(0) };
shopCarousel[0].onmouseout = () => { Run(0) };

shopCarousel[1].onmouseover = () => { Cancel(1) };
shopCarousel[1].onmouseout = () => { Run(1) };

shopCarousel[2].onmouseover = () => { Cancel(2) };
shopCarousel[2].onmouseout = () => { Run(2) };

shopCarousel[3].onmouseover = () => { Cancel(3) };
shopCarousel[3].onmouseout = () => { Run(3) };
