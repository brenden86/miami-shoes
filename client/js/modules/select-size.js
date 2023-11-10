const sizeButtons = document.querySelectorAll('.size-button');
let selectedSize;
export let selectedItem;

export function selectSize(button) {
  let size = button.getAttribute('data-size');
  let sku = button.getAttribute('data-sku');
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
  // set selected SKU for addToCart()
  selectedItem = sku;

}


document.addEventListener('click', e => {
  if(
    !e.target.classList.contains('disabled') &&
    e.target.classList.contains('size-button')
  ) {
    selectSize(e.target);
  }
})