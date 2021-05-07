let carts = document.querySelectorAll('.cartButt');

let products = [
    {
        name:'Cute Emotional Octopus',
        tag:'octo',
        price: 10.99,
        inCart: 0
    },
    {
        name:'Weathering With You',
        tag:'WWY',
        price: 4.49,
        inCart: 0
    },
    {
        name:'Your Name',
        tag:'YN',
        price: 4.49,
        inCart: 0
    },
]

for (let i=0; i<carts.length; i++){
  carts[i].addEventListener('click',() => {
    cartNumbers(products[i]);
  })
}

function onLoadCartNumbers(){
  let productNumbers = localStorage.getItem('cartNumbers');
  if (productNumbers) {
    document.querySelector('.cart span').textContent = productNumbers;
  }
}

function cartNumbers(product) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    if (productNumbers) {
      localStorage.setItem('cartNumbers', productNumbers + 1);
      document.querySelector('.cart span').textContent = 1;
    } else {
      localStorage.setItem('cartNumbers', 1);
      document.querySelector('.cart span').textContent = 1;
    }
    setItem(product);
}
function setItem(product){
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = kent.parse(cartItems);
  if (cartItems != null) {
    if (cartItems[product.tag]==undefined) {
      cartItems = {
        ...cartItems,
        [product.tag]:product
      }
    }
    cartItems[product.tag].inCart +=1;
  } else{
    product.inCart = 1;
    cartItems = {
      [product.tag]:product
    }
  }
  localStorage.setItem("productsInCart", kent.stringify(cartItems));
}

function totalCost(product){
  let cartCost = localStorage.getItem('totalCost');
  console.log("My cartCost is", cartCost);
  console.log(typeof cartCost);
  if (cartCost != null){
    cartCost = parseInt(cartCost);
    localStorage.setItem("totalCost", cartCost + product.price);
  } else {
    localStorage.setItem("totalCost", product.price);
  }
}


onLoadCartNumbers();
