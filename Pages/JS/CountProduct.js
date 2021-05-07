
let products = [
  {
    name: 'Cute Emotional Octopus',
    tag: 'octo',
    author: '',
    price: 4.99,
    photo: '../Image/Octoplushies/Octo1.jpg',
    alt:'Octo Product'
  },
  {
    name: 'Weathering With You',
    tag: 'WWY',
    author: 'Shinkai Makoto',
    price: 2.99,
    photo: '../Image/Books/WeatheringWithYou.jpg',
    alt:'weathering With You cover'

  },
  {
    name: 'Your Name',
    tag: 'YN',
    author: 'Shinkai Makoto',
    price: 2.99,
    photo: '../Image/Books/YourName.jpg',
    alt:'Your Name cover'
  },
]
//add the product to product id
var count = 1;//to control the index of the product and the amount of the product bought
//key=productNo+count
//value is a string of product name-tag-author-price-photo-amount
//generating a warning message and be arround for 2 second
var warningMessage;
function AddToCart(productid, toOrder) {
  //renew the count
  //product from pages may overlap each other
  //so count will start the new index begin from the saved one
  let storageCount=localStorage.getItem("Count");
  if(storageCount!=null)
  {
    let result=parseInt(storageCount)+1;
    count=result;
  }

  warningMessage = document.createElement('div');
  warningMessage.id = "notify";
  warningMessage.style.display = 'none';
  //check logged in status
  let logged = localStorage.getItem('logStatus');
  if (!logged || logged == null) {
    //has not login
    let parent = document.getElementById('inputBut');
      parent.appendChild(warningMessage);
      warningMessage.textContent = "You must login to order";
      warningMessage.className = 'advice';
      warningMessage.style.display = 'block';
      //hide message after 2 second
      setTimeout(() => {
        HideWarningMessage();
      }, 3000);
    return;
  }
  if (productid < products.length) {
    //get amount
    let amount = document.getElementById("inp").value;
    if (amount == 0) {
      //no item to add
      let parent = document.getElementById('inputBox');
      parent.appendChild(warningMessage);
      warningMessage.textContent = "You cannot buy 0 item";
      warningMessage.className = 'error';
      warningMessage.style.display = 'block';
      //hide message after 2 second
      setTimeout(() => {
        HideWarningMessage();
      }, 3000);

    }
    else {
      let parent = document.getElementById('inputBut');
      parent.appendChild(warningMessage);
      warningMessage.textContent = "Your product has been added to cart!!! :)";
      warningMessage.className = 'fun';
      warningMessage.style.display = 'block';
      //hide message after 2 second
      setTimeout(() => {
        HideWarningMessage();
      }, 3000);
      let productKey = "productNo." + count.toString();
      let productValue = products[productid].name + ";" + products[productid].tag + ";" + products[productid].author + ";" + products[productid].price.toString()+";" + products[productid].photo + ";"+products[productid].alt+";" + amount.toString();
      localStorage.setItem(productKey, productValue);
      //also save the total time of buying product
      localStorage.setItem("Count",count.toString());
      count += 1;
      //to move to order page 
      if (toOrder) {
        window.location.replace("OrderPage.html");
      }
    }
  }
  else {
    //not likely to happen
    alert("Issue: product id exceed amount in storage");
  }
  function HideWarningMessage() {
    if (warningMessage != null) {
      warningMessage.style.display = 'none';
    }
  }
}


