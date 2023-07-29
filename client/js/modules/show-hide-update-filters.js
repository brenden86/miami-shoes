
const updateButton = document.querySelector('.filter-submit-button');
const formFilters = document.querySelector('#product-filters-form');
const checkboxInputs = formFilters.querySelectorAll('input[type="checkbox"]');
const textInputs = formFilters.querySelectorAll('input[type="text"]');

/*

-- SAVE --
this shows update button if any inputs are active but does not
work with persisting inputs.

let selectedInputs = [];

// add/remove 'show' class from submit button
function checkSubmitClass() {
  if(selectedInputs.length < 1) {
    if(updateButton.classList.contains('show')) {
      updateButton.classList.remove('show');
    }
  } else {
    if(!updateButton.classList.contains('show')) {
      updateButton.classList.add('show');
    }
  }
}

// add/remove selected input IDs from array
function handleCheckboxInput(e) {
  if(e.target.checked) {
    // add to selected inputs array if not already in array
    if(!selectedInputs.includes(e.target.id)) {
      selectedInputs.push(e.target.id);
    }
  } else {
    if(selectedInputs.includes(e.target.id)) {
      let index = selectedInputs.indexOf(e.target.id);
      selectedInputs.splice(index, 1); // remove from array
    }
  }
  
  checkSubmitClass();

}

// add/remove input IDs from array
function handleTextInput(e) {
  if(e.target.value.length > 0) {
    if(!selectedInputs.includes(e.target.id)) {
      selectedInputs.push(e.target.id);
    }
  } else {
    if(selectedInputs.includes(e.target.id)) {
      let index = selectedInputs.indexOf(e.target.id);
      selectedInputs.splice(index, 1); // remove from array
    }
  }

  checkSubmitClass();
  
}

// event listeners
checkboxInputs.forEach(input => {
  input.addEventListener('change', (e) => {
    handleCheckboxInput(e);
  }) 
})

textInputs.forEach(input => {
  input.addEventListener('keyup', (e) => {
    handleTextInput(e);
  })
})

*/
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
