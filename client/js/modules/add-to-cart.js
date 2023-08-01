

// DOM elements for the size buttons are already declared in 'select-size.js'

function updateHeaderCartCount(count) {
  let headerCartCount = document.querySelector('#header-cart-count');
  headerCartCount.textContent = `(${count})`;
}

function addToCart(sku) {
  let cartCookie = getCookie('cart-items');
  // create cart cookie if it does not exist.
  if(!cartCookie) {
    setCookie('cart-items', JSON.stringify([sku]), 30);
    // set cart count in header
    updateHeaderCartCount(1);
  } else {
    // parse cart cookie to array and push next item
    cartArray = JSON.parse(cartCookie);
    cartArray.push(sku);
    // update cart cookie
    setCookie('cart-items', JSON.stringify(cartArray), 30);
    // update cart count in header
    updateHeaderCartCount(cartArray.length);
  }

  console.log(`added sku ${sku} to cart.`);
}


// ADD TO CART button click handler

const addToCartButton = document.querySelector('#add-to-cart');
addToCartButton.addEventListener('click', () => {
  if(selectedItem) {
    addToCart(selectedItem);
  } else {
    alert(`please select a size.`);
  }
})