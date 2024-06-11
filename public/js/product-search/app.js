import { checkUserDataConsent } from '/js/modules/data-consent.js';
import { toggleNav, toggleBrands } from '../../js/modules/header-nav-toggle.js';
import { checkImagesLoaded } from '../../js/modules/image-fallback.js';
import { changeSortOrder } from '../../js/modules/select-sort.js';
import { showUpdateButton } from '../../js/modules/show-hide-filters.js';
import { validateProductFilters } from '../../js/modules/validate-filters.js';
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