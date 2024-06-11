
// functions for manipulating cart information

import { getCookie, setCookie } from "./cookie-functions.js";
import { showPopup, closePopup } from "./popups.js";
import { selectedItem } from "./select-size.js";

const addToCartButton = document.querySelector('#add-to-cart');

// DOM elements for the size buttons are already declared in 'select-size.js'

export function updateHeaderCartCount(count) {

  // updates cart items count in header

  let headerCartCount = document.querySelector('#header-cart-count');
  if(count > 0) {
    headerCartCount.textContent = `(${count})`;
  } else {
    headerCartCount.textContent = ``;
  }
}

export function updateCartCount(count) {

  // updates cart item count on cart page

  let cartCount = document.querySelector('#cart-count');
  if(count > 0) {
    cartCount.textContent = `(${count})`;
  } else {
    cartCount.textContent = ``;
  }
}

export function updateCartCookie(sku) {

  // stores SKUs of products added to cart in a cookie
  
  let cartCookie = getCookie('cart-items');
  // create cart cookie if it does not exist.
  if(!cartCookie) {
    setCookie('cart-items', JSON.stringify([sku]), 30);
    // set cart count in header
    updateHeaderCartCount(1);
  } else {
    // parse cart cookie to array and push next item
    let cartArray = JSON.parse(cartCookie);
    cartArray.push(sku);
    // update cart cookie
    setCookie('cart-items', JSON.stringify(cartArray), 30);
    // update cart count in header
    updateHeaderCartCount(cartArray.length);
  }
  
}

export async function getQtyInStock(sku) {

  // queries DB for quantity of SKU in stock

  try {
    const res = await fetch(`/ajax/get-stock.php?sku=${sku}`);
    const result = await res.json();
    return result.data.qty;
  } catch(err) {
    console.error(err)
  }
}

export async function addToCart(sku) {

  // add SKU to user's cart

  if(!addToCartButton.classList.contains('disabled')) {
    if(selectedItem) {
      // check if item is in stock before adding to cart
      let qty = await getQtyInStock(sku);
      if(qty > 1) {
        updateCartCookie(selectedItem);
        showPopup("addToCart");
      } else {
        showPopup("outOfStock");
      }
    } else {
      showPopup('selectSize');
    }
    // do nothing if disabled
  } 
}


// ADD TO CART button click handler

addToCartButton?.addEventListener('click', (e) => {
  addToCart(selectedItem);
})

export function removeFromCart(item) {
  // remove item from cart cookie
  let cartCookie = JSON.parse(getCookie('cart-items'));
  let itemIndex = parseInt(item.getAttribute('data-index'));
  cartCookie.splice(itemIndex, 1);
  setCookie('cart-items', JSON.stringify(cartCookie));
  location.reload();
  
}

// REMOVE ITEM FROM CART (trash icon) click handler

let cartItems = document.querySelectorAll('.cart-item')
cartItems.forEach(item => {
  let removeFromCartButton = item.querySelector('.remove-item');
  removeFromCartButton?.addEventListener('click', () => {
    removeFromCart(item);
  })
})

export function clearCart() {

  // clear all items from cart cookie

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

clearCartButton?.addEventListener('click', clearCart);

  


