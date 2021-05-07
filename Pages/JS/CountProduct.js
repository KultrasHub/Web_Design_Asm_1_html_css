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
    cartNumbers();
  })
}

function onLoadCartNumbers(){
  let productNumbers = localStorage.getItem('cartNumbers');
  if (productNumbers) {
    document.querySelector('.cart span').textContent = productNumbers;
  }
}

function cartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    if (productNumbers) {
      localStorage.setItem('cartNumbers', productNumbers + 1);
      document.querySelector('.cart span').textContent = 1;
    } else {
      localStorage.setItem('cartNumbers', 1);
      document.querySelector('.cart span').textContent = 1;
    }
}
onLoadCartNumbers();
