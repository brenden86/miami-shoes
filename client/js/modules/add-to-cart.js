

// DOM elements for the size buttons are already declared in 'select-size.js'

function addToCart(sku) {
  if(!sku) {
    alert('Please select a size.');
  } else {
    alert(sku);
  }
}


// ADD TO CART button click handler

const addToCartButton = document.querySelector('#add-to-cart');
addToCartButton.addEventListener('click', () => {
  addToCart(selectedItem);
})