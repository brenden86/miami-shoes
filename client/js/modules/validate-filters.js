
const filtersForm = document.getElementById('product-filters-form');

// 
const priceMin = document.getElementById('filter-price-min')
const priceMax = document.getElementById('filter-price-max')



// only allow typing numbers into price inputs
priceMin.addEventListener('keypress', (e) => {
  if(!e.key.match(/\d+/)) {
    e.preventDefault();
  }
})

priceMax.addEventListener('keypress', (e) => {
  if(!e.key.match(/\d+/)) {
    e.preventDefault();
  }
})

// run validation before submitting
function validateProductFilters() {
  
  // VALIDATE PRICE
  if (priceMin.value > priceMax.value) {
    alert(`Minimum price must be less than maximum price.`);
    return false;
  }

  // passed all checks, submit form
  filtersForm.submit();

}