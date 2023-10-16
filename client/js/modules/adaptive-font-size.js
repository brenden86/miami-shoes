const cardProductNames = document.querySelectorAll('.product-name');

cardProductNames.forEach(name => {
  if(name.textContent.length > 16) {
    name.style.fontSize = '1.35rem';
  }
});