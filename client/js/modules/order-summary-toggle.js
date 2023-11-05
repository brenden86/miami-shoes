
const orderSummaryToggle = document.querySelector('.order-summary-toggle');

export function toggleOrderSummary() {
  orderSummaryToggle.classList.toggle('show');
}

orderSummaryToggle?.addEventListener('click', () => {
  toggleOrderSummary();
})