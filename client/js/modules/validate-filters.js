
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

  // CHECK IF A COLOR FILTER IS SELECTED
  const colorInputs = document.querySelectorAll('.filter-color');
  colorInputs.forEach(color => {
    if(color.querySelector('input').checked) {
      // create hidden input to pass query param
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'color-filter-selected';
      input.value = true;
      document.querySelector('#color-selected').append(input);
      return;
    }
  })

  // CHECK IF A BRAND FILTER IS SELECTED
  const brandInputs = document.querySelectorAll('.brand-input');
  brandInputs.forEach(brand => {
    if(brand.querySelector('input').checked) {
      // create hidden input to pass query param
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'brand-selected';
      input.value = true;
      document.querySelector('#brand-selected').append(input);
      return;
    }
  })
  
  // CHECK IF A SHOE TYPE FILTER IS SELECTED
  const typeInputs = document.querySelectorAll('.shoe-type-input');
  typeInputs.forEach(type => {
    if(type.querySelector('input').checked) {
      // create hidden input to pass query param
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'shoe-type-selected';
      input.value = true;
      document.querySelector('#shoe-type-selected').append(input);
      return;
    }
  })

  // passed all checks, submit form
  filtersForm.submit();

}