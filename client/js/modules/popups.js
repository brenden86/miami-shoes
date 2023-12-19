
let lastPageUrl;
let lastActiveElement;

if(document.referrer.match(/product-search/)) {
  lastPageUrl = document.referrer
} else {
  lastPageUrl = '/products';
}

const addToCartHTML = `
<div class="popup-icon">
  <i class="bi-cart-check" role="presentation"></i>
  <h1 id="popup-title">Item added to cart!</h1>
</div>

<div class="popup-buttons">
  <a href="${lastPageUrl}" class="text-button">Continue Shopping</a>
  <a href="/cart" class="button next">
    Go To Cart
    <i class="bi-caret-right-fill" role="presentation"></i>
  </a>
</div>
`

const outOfStockHTML = `
<div class="popup-icon">
  <i class="bi-exclamation-circle" role="presentation"></i>
  <h1 id="popup-title">Oops!</h1>
  <p id="popup-description">Sorry, this product is no longer in stock.</p>
</div>
`;

const dataConsentHTML = `
  <div class="popup-icon">
    <i class="bi-exclamation-circle" role="presentation"></i>
    <h1 id="popup-title">This is a demo site.</h1>
    <p id="popup-description">Any data collected on this site is for demonstration purposes only. Please do NOT enter any personal information on this site.</p>
  </div>

  <div class="popup-buttons">
    <button class="data-consent-button">I Understand</button>
  </div>
`;

const selectSizeHTML = `
  <div class="popup-icon">
    <i class="bi-exclamation-circle" role="presentation"></i>
    <h1 id="popup-title">Please select a size.</h1>
  </div>
`



export function showPopup(type, noClose = false) {

  lastActiveElement = document.activeElement;

  const root = document.querySelector('#root');
  // set the popup content
  let popupContent = '';
  let popupClose = '';
  let closeClass = 'no-close';

  if(!noClose) {
    popupClose = `
      <div class="popup-close" role="button" tabindex=0 >
        <div class="icon-link">
          <i class="bi-x-lg" role="presentation"></i>
        </div>
      </div>
    `;
    closeClass = '';
  }

  if(type === 'addToCart') {
    popupContent = addToCartHTML;
  } else if(type === 'outOfStock') {
    popupContent = outOfStockHTML;
  } else if(type === 'dataConsent') {
    popupContent = dataConsentHTML;
  } else if(type === 'selectSize') {
    popupContent = selectSizeHTML;
  }
  // create popup HTML
  let popup = document.createElement('div');
  popup.classList.add('popup-container');
  popup.setAttribute('tabindex', "-1");
  if(noClose) {
    popup.classList.add('no-close');
  }
  popup.innerHTML = `
  <div class="popup" role="dialog" aria-labelledby="popup-title" aria-describedby="popup-description">
    <div class="popup-wrapper">

      ${popupClose}

      <div class="popup-content">${popupContent}</div>

    </div>
  </div>
  `;

  root.insertBefore(popup, root.firstChild);
  popup.focus();

  // add listener to close button
  let popupCloseButton = document.querySelector('.popup-close');
  popupCloseButton?.addEventListener('click', () => {
    closePopup();
  })

}

export function closePopup() {
  let popup = document.querySelector('.popup-container');
  popup.remove();
}

// clicking outside popup closes it
document.addEventListener('click', e => {
  if(e.target.classList.contains('popup-container') && !e.target.classList.contains('no-close')) {
    closePopup();
  }
})
