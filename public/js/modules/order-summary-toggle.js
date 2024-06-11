
// show/hide order summary drawer on mobile layout

const orderSummaryToggle = document.querySelector('.order-summary-toggle');

export function toggleOrderSummary() {
  if(orderSummaryToggle.classList.contains('show')) {
    orderSummaryToggle.classList.remove('show');
    orderSummaryToggle.setAttribute('aria-expanded', 'false');
  } else {
    orderSummaryToggle.classList.add('show');
    orderSummaryToggle.setAttribute('aria-expanded', 'true');
  }
}

orderSummaryToggle.addEventListener('click', toggleOrderSummary);