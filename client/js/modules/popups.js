
let lastPageUrl;
if(document.referrer.match(/product-search/)) {
  lastPageUrl = document.referrer
} else {
  lastPageUrl = '/product-search.php';
}

const addToCartHTML = `
<div class="popup-icon">
  <i class="bi-cart-check"></i>
  <h1>Item added to cart!</h1>
</div>

<div class="popup-buttons">
  <a href="${lastPageUrl}" class="text-button">Continue Shopping</a>
  <a href="/my-cart.php" class="button next">
    Go To Cart
    <i class="bi-caret-right-fill"></i>
  </a>
</div>
`

const outOfStockHTML = `
<div class="popup-icon">
  <i class="bi-exclamation-circle"></i>
  <h1>Oops!</h1>
  <p>Sorry, this product is no longer in stock.</p>
</div>
`;



function showPopup(type) {
  const root = document.querySelector('#root');
  // set the popup content
  let popupContent;

  if(type === 'addToCart') {
    popupContent = addToCartHTML;
  } else if(type === 'outOfStock') {
    popupContent = outOfStockHTML;
  }
  // create popup HTML
  let popup = document.createElement('div');
  popup.classList.add('popup-container');
  popup.innerHTML = `
  <div class="popup">
    <div class="popup-wrapper">

      <div class="popup-close">
        <div class="icon-link" onclick="closePopup()">
          <i class="bi-x-lg"></i>
        </div>
      </div>

      <div class="popup-content">${popupContent}</div>

    </div>
  </div>
  `;
  root.append(popup);
}

function closePopup() {
  let popup = document.querySelector('.popup-container');
  popup.remove();
}

document.addEventListener('click', e => {
  if(e.target.classList.contains('popup-container')) {
    e.target.remove();
  }
})
