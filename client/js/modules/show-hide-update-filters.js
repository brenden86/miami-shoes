
const updateButton = document.querySelector('.filter-submit-button');
const formFilters = document.querySelector('#product-filters-form');
const checkboxInputs = formFilters.querySelectorAll('input[type="checkbox"]');
const textInputs = formFilters.querySelectorAll('input[type="text"]');


function showUpdateButton() {
  
  if(!updateButton.classList.contains('show')) {
    updateButton.classList.add('show');
  }

}

checkboxInputs.forEach(input => {
  input.addEventListener('change', () => {
    showUpdateButton();
  }) 
})

textInputs.forEach(input => {
  input.addEventListener('keyup', () => {
    showUpdateButton();
  })
})
