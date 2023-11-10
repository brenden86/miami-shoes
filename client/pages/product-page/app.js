import { toggleNav, toggleBrands } from '../../js/modules/header-nav-toggle.js';
import { checkImagesLoaded } from '../../js/modules/image-fallback.js';
import { selectSize } from '../../js/modules/select-size.js';
import { nextSlide, prevSlide, resetTimer } from '../../js/modules/slider.js';
import { featureBlockObserver } from '../../js/modules/feature-blocks.js';
import { changeSortOrder } from '../../js/modules/select-sort.js';
import { showUpdateButton } from '../../js/modules/show-hide-filters.js';
import { validateProductFilters } from '../../js/modules/validate-filters.js';
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
import { showCheckoutInput } from '../../js/modules/show-additional-fields.js';
import { formatPhoneNumber, formatCardNumber, formatCardExp } from '../../js/modules/checkout-validation.js';
import { toggleOrderSummary } from '../../js/modules/order-summary-toggle.js';
import { toggleAccordion } from '../../js/modules/accordion.js';