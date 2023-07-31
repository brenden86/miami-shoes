const sizeButtons = document.querySelectorAll('.size-button');

let selectedSize;

function selectSize(button) {
  let size = button.getAttribute('data-value');
  if(size != selectSize) {
    selectedSize = size;
    // clear selected class from all other sizes
    sizeButtons.forEach(el => {
      if(el.classList.contains('selected')) {
        el.classList.remove('selected');
      }
    })
    // give selected class to selected button
    if(!button.classList.contains('selected')) {
      button.classList.add('selected');
    }
  }
}

sizeButtons.forEach(button => {
  button.addEventListener('click', () => {
    selectSize(button);
  })
})