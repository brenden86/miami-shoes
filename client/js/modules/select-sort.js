document.addEventListener('click', (e) => {
  if(e.target.classList.contains('sort-option')) {
    // add hidden element to include sort order in request,
    // then submit the filters form
    let sortInput = document.createElement('input');
    sortInput.name = 'sort';
    sortInput.type = 'hidden';
    sortInput.value = e.target.getAttribute('data-sort')
    filtersForm.append(sortInput);
    // from validate-filters.js
    filtersForm.submit();
  }
})