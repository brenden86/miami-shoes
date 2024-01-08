
// select sort method on product search page

import { filtersForm } from "./validate-filters.js";
const sortInput = document.querySelector('#sort-input');

export function changeSortOrder(sortOption) {
  sortInput.value = sortOption.getAttribute('data-sort')
  // from validate-filters.js; submit the selected filters after choosing a new sort method
  filtersForm.submit();
}

document.addEventListener('click', (e) => {
  if(e.target.classList.contains('sort-option')) {
    changeSortOrder(e.target)
  }
})