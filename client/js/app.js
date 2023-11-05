import { toggleNav, toggleBrands } from './modules/header-nav-toggle.js';
import { checkImagesLoaded } from './modules/image-fallback.js';
import { nextSlide, prevSlide, resetTimer } from './modules/slider.js';
import { scrollCarouselLeft, scrollCarouselRight } from './modules/carousel-scroll.js';
import { featureBlockObserver } from './modules/feature-blocks.js';
import { changeSortOrder } from './modules/select-sort.js';
import { showUpdateButton } from './modules/show-hide-filters.js';
import { validateProductFilters } from './modules/validate-filters.js';
import { selectImage } from './modules/product-image-gallery.js';
import { showPopup, closePopup } from './modules/popups.js';
import { getCookie, setCookie } from './modules/cookie-functions.js';
import {
  updateCartCookie,
  updateCartCount,
  updateHeaderCartCount,
  getQtyInStock,
  addToCart,
  removeFromCart,
  clearCart
} from './modules/cart-functions.js';
import { showCheckoutInput } from './modules/show-additional-fields.js';
import { formatPhoneNumber, formatCardNumber, formatCardExp } from './modules/checkout-validation.js';
import { toggleOrderSummary } from './modules/order-summary-toggle.js';