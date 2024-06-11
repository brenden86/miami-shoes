import { toggleNav, toggleBrands } from '../../js/modules/header-nav-toggle.js';
import { checkImagesLoaded } from '../../js/modules/image-fallback.js';
import { showPopup, closePopup } from '../../js/modules/popups.js';
import { getCookie, setCookie } from '../../js/modules/cookie-functions.js';
import {
  updateCartCookie,
  updateCartCount,
  updateHeaderCartCount,
  getQtyInStock,
  addToCart,
  removeFromCart,
  clearCart
} from '../../js/modules/cart-functions.js';
