
const addToCartButton = document.querySelector('#add-to-cart');

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

function updateCartCookie(sku) {

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

}

async function getQtyInStock(sku) {
  const res = await fetch(`http://localhost:3000/get-stock.php?sku=${sku}`);
  const result = await res.json();
  return result.data.qty;
}

async function addToCart(sku) {
  if(!addToCartButton.classList.contains('disabled')) {
    // selectedItem value defined in select-size.js
    if(selectedItem) {
      let qty = await getQtyInStock(sku);
      if(qty > 1) {
        updateCartCookie(selectedItem);
        showPopup("addToCart");
      } else {
        showPopup("outOfStock");
      }
    } else {
      alert('Please select a size.');
    }
    // do nothing if disabled
  } 
}


// ADD TO CART button click handler

if(addToCartButton) {
  addToCartButton.addEventListener('click', (e) => {
    addToCart(selectedItem);
  })
}



function removeFromCart(item) {
  // remove item from cart cookie
  let cartCookie = JSON.parse(getCookie('cart-items'));
  let itemIndex = parseInt(item.getAttribute('data-index'));
  cartCookie.splice(itemIndex, 1);
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
  



