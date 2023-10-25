
const updateButton = document.querySelector('.filter-submit-button');
const formFilters = document.querySelector('#product-filters-form');
const checkboxInputs = formFilters.querySelectorAll('input[type="checkbox"]');
const textInputs = formFilters.querySelectorAll('input[type="text"]');
const filterToggle = document.querySelector('.filter-icon')
const sortToggle = document.querySelector('.sort-icon')
const sortOptions = document.querySelector('.sort-options-wrapper')


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


filterToggle.addEventListener('click', () => {
  filtersForm.classList.toggle('show');
})

sortToggle.addEventListener('click', () => {
  sortOptions.classList.toggle('show');
})

