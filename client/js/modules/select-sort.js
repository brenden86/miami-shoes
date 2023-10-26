const sortInput = document.querySelector('#sort-input');

document.addEventListener('click', (e) => {
  if(e.target.classList.contains('sort-option')) {
    sortInput.value = e.target.getAttribute('data-sort')
    // from validate-filters.js
    filtersForm.submit();
  }
})