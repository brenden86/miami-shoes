
const root = document.querySelector('#root');

let lastPageUrl;
if(document.referrer.match(/product-search/)) {
  lastPageUrl = document.referrer
} else {
  lastPageUrl = '/client/product-search.php';
}
const addToCartPopupHTML = `
<div class="popup">
  <div class="popup-wrapper">

    <div class="popup-close">
      <div id="popup-close-button" class="icon-link" onclick="closeCartPopup()">
        <i class="bi-x-lg"></i>
      </div>
    </div>

    <div class="popup-content">
      <div class="popup-icon">
        <i class="bi-cart-check"></i>
      </div>
      <h1>Item added to cart!</h1>
    </div>

    <div class="popup-buttons">
      <a
        href="${lastPageUrl}"
        class="text-button">Continue Shopping</a>
      <a href="/client/my-cart.php" class="button next">
        Go To Cart
        <i class="bi-caret-right-fill"></i>
      </a>
    </div>

  </div>
</div>
`

function showCartPopup() {
  let alert = document.createElement('div');
  alert.classList.add('popup-container');
  alert.innerHTML = addToCartPopupHTML;
  root.append(alert);
}

function closeCartPopup() {
  let alert = document.querySelector('.popup-container');
  alert.remove();
}

document.addEventListener('click', e => {
  console.log(e.target)
  if(e.target.classList.contains('popup-container')) {
    e.target.remove();
  }
})
