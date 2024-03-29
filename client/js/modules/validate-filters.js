
// validate inputs on product search filter sidebar

export const filtersForm = document.getElementById('product-filters-form');

const priceMinInput = document.getElementById('filter-price-min');
const priceMaxInput = document.getElementById('filter-price-max');

// only allow typing numbers into price inputs
priceMinInput.addEventListener('keypress', (e) => {
  if(!e.key.match(/\d+/)) {
    e.preventDefault();
  }
})

priceMaxInput.addEventListener('keypress', (e) => {
  if(!e.key.match(/\d+/)) {
    e.preventDefault();
  }
})

// run validation before submitting
export function validateProductFilters() {
  
  // VALIDATE PRICE
  if (parseInt(priceMinInput.value) > parseInt(priceMaxInput.value)) {
    alert(`Minimum price must be less than maximum price.`);
    return false;
  }

  // remove price inputs if empty before submitting form;
  // to prevent them from still appearing in the query string
  if(!priceMinInput.value) {
    priceMinInput.remove();
  }
  if(!priceMaxInput.value) {
    priceMaxInput.remove();
  }

  // passed all checks, submit form
  filtersForm.submit();

}

