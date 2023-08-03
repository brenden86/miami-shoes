

// DOM elements for the size buttons are already declared in 'select-size.js'

function updateHeaderCartCount(count) {
  let headerCartCount = document.querySelector('#header-cart-count');
  if(count > 0) {
    headerCartCount.textContent = `(${count})`;
  } else {
    headerCartCount.textContent = ``;
  }
}

function updateCartCount(count) {
  let cartCount = document.querySelector('#cart-count');
  if(count > 0) {
    cartCount.textContent = `(${count})`;
  } else {
    cartCount.textContent = ``;
  }
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
if(addToCartButton) {
  addToCartButton.addEventListener('click', () => {
    if(selectedItem) {
      addToCart(selectedItem);
    } else {
      alert(`please select a size.`);
    }
  })
}



function removeFromCart(item) {
  // remove SKU from cart cookie
  let cartCookie = JSON.parse(getCookie('cart-items'));
  let sku = item.getAttribute('data-sku');
  let skuIndex = cartCookie.indexOf(sku)
  cartCookie.splice(skuIndex, skuIndex + 1);
  setCookie('cart-items', JSON.stringify(cartCookie));
  location.reload();

}

// REMOVE ITEM FROM CART click handler

let cartItems = document.querySelectorAll('.cart-item')
cartItems.forEach(item => {
  let removeFromCartButton = item.querySelector('.remove-item');
  removeFromCartButton.addEventListener('click', () => {
    removeFromCart(item);
  })
})

// CLEAR CART

function clearCart() {
  // check cart cookie
  let cartCookie = JSON.parse(getCookie('cart-items'));
  if(cartCookie.length < 1) {
    alert('cart is already empty.');
  } else {
    cartCookie = [];
    setCookie('cart-items', JSON.stringify(cartCookie));
    location.reload();
  }
}

const clearCartButton = document.querySelector('#clear-cart-button')
if(clearCartButton) {
  clearCartButton.addEventListener('click', () => {
    clearCart();
  })
}
  



