import { filtersForm, validateProductFilters } from "./validate-filters.js";

const applyFiltersButton = document.querySelector('.filter-submit-button');
const formFilters = document.querySelector('#product-filters-form');
const checkboxInputs = formFilters?.querySelectorAll('input[type="checkbox"]');
const textInputs = formFilters?.querySelectorAll('input[type="text"]');
const filterToggle = document.querySelector('.filter-icon');
const sortToggle = document.querySelector('.sort-icon');
const sortOptions = document.querySelector('.sort-options-wrapper');
const accessibleApplyFilters = document.querySelector('.apply-filters-accessible');


export function showUpdateButton() {
  
  if(!applyFiltersButton.classList.contains('show')) {
    applyFiltersButton.classList.add('show');
  }

}

checkboxInputs.forEach(input => {
  input.addEventListener('change', showUpdateButton) 
})

textInputs.forEach(input => {
  input.addEventListener('keyup', showUpdateButton);
})

filterToggle.addEventListener('click', () => {
  filtersForm.classList.toggle('show');
  if (filtersForm.classList.contains('show')) {
    filtersForm.classList.remove('show');
    filterToggle.setAttribute('aria-expanded', 'false')
  } else {
    filtersForm.classList.add('show');
    filterToggle.setAttribute('aria-expanded', 'true');
  }
})

applyFiltersButton.addEventListener('click', validateProductFilters)
accessibleApplyFilters.addEventListener('click', validateProductFilters)

sortToggle.addEventListener('click', () => {
  if(sortOptions.classList.contains('show')) {
    sortOptions.classList.remove('show');
    sortToggle.setAttribute('aria-expanded', 'false');
  } else {
    sortOptions.classList.add('show');
    sortToggle.setAttribute('aria-expanded', 'true');
  }
})



