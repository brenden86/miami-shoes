
const filtersForm = document.getElementById('product-filters-form');

// 
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
function validateProductFilters() {
  
  // VALIDATE PRICE
  if (parseInt(priceMinInput.value) > parseInt(priceMaxInput.value)) {
    alert(`Minimum price must be less than maximum price.`);
    return false;
  }

  // passed all checks, submit form
  filtersForm.submit();

}