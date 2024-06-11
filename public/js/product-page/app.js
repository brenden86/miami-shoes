import { checkUserDataConsent } from '/js/modules/data-consent.js';
import { toggleNav, toggleBrands } from '../../js/modules/header-nav-toggle.js';
import { checkImagesLoaded } from '../../js/modules/image-fallback.js';
import { selectSize } from '../../js/modules/select-size.js';
import { selectImage } from '../../js/modules/product-image-gallery.js';
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
