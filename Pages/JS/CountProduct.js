let carts = document.querySelectorAll('.proButt');

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
        name:'Cute Emotional Octopus',
        tag:'octo',
        price: 10.99,
        inCart: 0
    },
]

for (let i=0; i<carts.length; i++){
  carts[i].addEventListener('click',() => {
    cartNumbers();
  })
}

function cartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    localStorage.setItem('cartNumbers', 1);
}
